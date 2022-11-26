<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Koordinator;
use App\Models\Mata_kuliah;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKoordinatorRequest;
use App\Http\Requests\UpdateKoordinatorRequest;

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
            'password' => 'required',
            'no_hp' => 'required',
            'nip' => 'required'
        ]);

        $user = User::find(auth()->id());
        $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->password,
      
    ]);

    $user->koordinator->update([
        'no_hp'=> $request->no_hp,
        'nip' =>$request->nip,

    ]);

    return redirect()
    ->to(route('koordinator.profil'))
    ->withSuccess('success', 'Data berhasil diubah');

     }
    
    public function tambah()
    {
        $generalsubjects = Mata_kuliah::all();
        return view('koordinator.koordinator.tambah', compact('generalsubjects')); 
    }

    public function simpan(Request $request)
    {
        // $request->validate([
        //     'name' => 'required | string',
        //     'email' => 'required | email',
        //     'password' => 'required| min:8 | max |15',
        //     'id_mku' => 'required',
        //     'no_hp' => 'required | numeric',
        //     'nip' => 'required | numeric',
        // ], [
        //     'name.required' => 'Nama tidak boleh kosong',
        //     'name.string' => 'Nama harus berupa huruf',
        //     'email.required' => 'Email tidak boleh kosong',
        //     'password.max' => 'Password maksimal 15 karakter',
        //     'password.min' => 'Password minimal 8 karakter',
        //     'password.required' => 'Password tidak boleh kosong',
        //     'id_mku.required' => 'Mata Kuliah Umum tidak boleh kosong',
        //     'no_hp.required' => 'Nomor Handphone tidak boleh kosong',
        //     'no_hp.numeric' => 'Nomor Handphone berupa angka',
        //     'nip.required' => 'NIP tidak boleh kosong',
        //     'nip.numeric' => 'NIP berupa angka',    
        // ]);



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
        ->withSucces('Berhasil Menambahkan Koordinator');
    }

    public function lihat(Koordinator $koordinator)
    {
        $generalsubjects = Mata_kuliah::all();
    return view('koordinator.koordinator.lihat', compact('koordinator', 'generalsubjects'));
    }

    public function data()
    {
        $koordinators = Koordinator::paginate(10);
        return view('koordinator.koordinator.data', compact('koordinators'));
    }

    public function edit(Koordinator $koordinator){
        $generalsubjects = Mata_kuliah::all();
        return view('koordinator.koordinator.edit', compact('generalsubjects' , 'koordinator'));
    }

    public function update(Request $request, Koordinator $koordinator)
    {
        // $request->validate([
        //     'name' => 'required | string',
        //     'email' => 'required | email',
        //     'password' => 'required| min:8 | max |15',
        //     'id_mku' => 'required',
        //     'no_hp' => 'required | numeric',
        //     'nip' => 'required | numeric',
        // ], [
        //     'name.required' => 'Nama tidak boleh kosong',
        //     'email.required' => 'Email tidak boleh kosong',
        //     'password.max' => 'Password maksimal 15 karakter',
        //     'password.min' => 'Password minimal 8 karakter',

        //     'password.required' => 'Password tidak boleh kosong',
        //     'id_mku.required' => 'Mata Kuliah Umum tidak boleh kosong',
        //     'no_hp.required' => 'Nomor Handphone tidak boleh kosong',
        //     'no_hp.numeric' => 'Nomor Handphone berupa angka',
        //     'nip.required' => 'NIP tidak boleh kosong',
        //     'nip.numeric' => 'NIP berupa angka',    
        // ]);

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
