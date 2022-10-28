<?php

use App\Models\Kelas;

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