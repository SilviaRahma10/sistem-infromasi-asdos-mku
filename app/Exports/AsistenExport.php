<?php

namespace App\Exports;

use App\Models\Program;
use App\Models\Mata_kuliah;
use App\Models\Pendaftaran;
use App\Models\Asisten_kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class AsistenExport implements FromView, WithColumnFormatting, ShouldAutoSize
{
    public $idTahun;
    public function __construct($idTahun)
    {
        $this->idTahun = $idTahun;
    }

    public function columnFormats(): array
    {
        return [
            // 'J' => DataType::TYPE_NUMERIC
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $asisten = Asisten_kelas :: all();
        $generalsubjects = Mata_Kuliah::all();
        $idTahun = $this->idTahun;

            if(auth()->user()->role == 'admin'){
                $registrations = Pendaftaran::join('programs', 'programs.id', '=', 'pendaftarans.id_program') 
                ->where('programs.id_tahun_ajaran', $this->idTahun)
                ->where('status', '1')->get();
        
            }
            else{
              $idMku = auth()->user()->koordinator->id_mku;
        
              $registrations = Pendaftaran::join('programs', 'programs.id', '=', 'pendaftarans.id_program') 
              ->where('programs.id_tahun_ajaran', $this->idTahun)
              ->where('id_mata_kuliah', $idMku)
              ->where('status', '1')
              ->get();
            }

        return view('koordinator.asisten.export', compact( 'registrations', 'idTahun'));
    }   
}
