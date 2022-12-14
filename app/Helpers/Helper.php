<?php

use App\Models\Kelas;
use App\Models\Pendaftaran;

if ( ! function_exists('check_prodi_mku'))
{
    function check_prodi_mku($id_mku, $id_prodi)
    {
        $query = Kelas::where('id_prodi', $id_prodi)->where('id_mku', $id_mku)->first();

        return $query;
    }
}

if ( ! function_exists('check_dosen_mku'))
{
    function check_dosen_mku($id_mku, $id_dosen)
    {
        $query = Kelas::where('id_dosen_pengampu', $id_dosen)->where('id_mku', $id_mku)->first();

        return $query;
    }
}

//cek apakah mahasiswa sudah mendaftar di program yang aktif atau belum
if ( ! function_exists('check_mahasiswa_mku'))
{
    function check_mahasiswa_mku($id_mku, $id_mahasiswa)
    {
        $activeProgram = App\Models\Program::where('is_active', 1)->first();
        $query = Pendaftaran::where('id_program', $activeProgram->id)
            ->where('id_mahasiswa', $id_mahasiswa)
            // ->where('id_mata_kuliah', $id_mku)
            ->first();


        return $query;
    }
}