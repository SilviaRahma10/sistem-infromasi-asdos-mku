<?php

namespace App\Http\Controllers\API;

use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\Mata_kuliah_prodi;
use App\Http\Controllers\Controller;

class MkuProdiController extends Controller
{
    public function getMku(Request $request)
    {
        $id_prodi = $request->id;
        $mataKuliah = Mata_kuliah_prodi::where('id_prodi', $id_prodi)->with('mku')->get();

        return response()
            ->json([
                'success' => true,
                'data' => $mataKuliah
            ]);
    }

    public function getDosen(Request $request)
    {
        $dosen = Dosen::orderBy('name', 'ASC')->get();

        return response()
            ->json([
                'success' => true,
                'data' => $dosen
            ]);
    }

    public function getKelas(Request $request)
    {
        $id_prodi = $request->id_prodi;

        $kelas = Mata_kuliah_prodi::join('kelas', 'kelas.id_mata_kuliah_prodi', 'mata_kuliah_prodis.id')
            ->where('mata_kuliah_prodis.id_prodi', $id_prodi)
            ->get();

        return response()
            ->json([
                'success' => true,
                'data' => $kelas,
            ]);
    }
}
