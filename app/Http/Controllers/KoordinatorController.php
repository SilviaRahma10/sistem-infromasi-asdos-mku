<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Koordinator;
use App\Models\Mata_kuliah;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKoordinatorRequest;
use App\Http\Requests\UpdateKoordinatorRequest;
use App\Rules\IsMataKuliahHaveCoordinator;
use Illuminate\Validation\Rule;

class KoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profil()
    {
        
        return view('koordinator.profil.profil');
    }

    public function editProfil()
    {
        
        return view('koordinator.profil.editProfil');
      }


      public function updateProfil(Request $request)
     {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'nip' => 'required | numeric | min: 9 |max :18',
        ]);

        $user = User::find(auth()->id());
        $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      
    ]);

    $user->koordinator->update([
        'no_hp'=> $request->no_hp,
        'nip' =>$request->nip,

    ]);

    return redirect()
    ->to(route('koordinator.profil'))
    ->withSuccess('success', 'Data berhasil diubah');
     }

     
     public function ubahPassword()
     {
         
         return view('koordinator.profil.passwordKoordinator');
     }

     public function updatePassword(Request $request)
     {
        $request->validate([
            
            'password' => 'required',
        ]);

        $user = User::find(auth()->id());
        $user->update([
      'password' => bcrypt($request->password),
      
        ]);

        return redirect()
        ->to(route('koordinator.profil'))
        ->withSuccess('success', 'Password Baru Berhasil Disimpan');
     }

    
    public function tambah()
    {
        $generalsubjects = Mata_kuliah::all();

        return view('koordinator.koordinator.tambah', compact('generalsubjects')); 
    }

    public function simpan(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'id_mku' => ['required', new IsMataKuliahHaveCoordinator],
            'no_hp' => 'required|numeric',
            'nip' => 'required | unique:koordinators| numeric | min: 9 |max :18',
        ]);

        $user= new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'koordinator';
        $user->save();

        $koordinator = new Koordinator;
        $koordinator->user_id = $user->id;
        $koordinator->id_mku = $request->id_mku;
        $koordinator->no_hp = $request->no_hp;
        $koordinator->nip = $request->nip;
        $koordinator->save();

        return redirect()
        ->to(route('koordinator.lihat', $koordinator->id ))
        ->withSuccess('Berhasil Menambahkan Koordinator');
    }

    public function lihat(Koordinator $koordinator)
    {
        $generalsubjects = Mata_kuliah::all();
    return view('koordinator.koordinator.lihat', compact('koordinator', 'generalsubjects'));
    }

    public function data()
    {
        $koordinators = Koordinator::orderBy('id', 'DESC')
        ->paginate(10);
        return view('koordinator.koordinator.data', compact('koordinators'));
    }

    public function edit(Koordinator $koordinator){
        $generalsubjects = Mata_kuliah::all();
        return view('koordinator.koordinator.edit', compact('generalsubjects' , 'koordinator'));
    }

    public function update(Request $request, Koordinator $koordinator)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'id_mku' => 'required',
            'no_hp' => 'required|numeric',
            'nip' => 'required|numeric',
        ]);

        $koordinator->user->name = $request->name;
        $koordinator->user->email = $request->email;
      
        $koordinator->user->save();

        $koordinator->user_id = $koordinator->user->id;
        $koordinator->id_mku = $request->id_mku;
        $koordinator->no_hp = $request->no_hp;
        $koordinator->nip = $request->nip;
        $koordinator->save();


        return redirect()
        ->to(route('koordinator.lihat', $koordinator->id ))
        ->withSucces('Berhasil Mengubah Koordinator');

    }

    
   public function destroy(Koordinator $koordinator)
   {
       $koordinator->delete();
       return redirect()->to(route('koordinator.data'));
   }

   public function search(Request $request) {
    if($request->has('search')) {
       
        $koordinators = Koordinator::where('no_hp', 'like', '%'.$request->search.'%')
        ->orWhere('nip', 'like', '%'.$request->search.'%')
        ->orWhereHas('user', function($query) use ($request) {
            $query->where('name', 'like', '%'.$request->search.'%');
        })
        ->orWhereHas('user', function($query) use ($request) {
            $query->where('email', 'like', '%'.$request->search.'%');
        })
        ->orWhereHas('mku', function($query) use ($request) {
            $query->where('nama', 'like', '%'.$request->search.'%');
        })
        ->orWhereHas('mku', function($query) use ($request) {
            $query->where('kode', 'like', '%'.$request->search.'%');
        })
        ->paginate();
        // ->paginate(10);
    } else {
        $koordinators = Koordinator::paginate(10);
    }
    return view('koordinator.koordinator.data', compact('koordinators'));
  
}

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKoordinatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKoordinatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKoordinatorRequest  $request
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
 
}
