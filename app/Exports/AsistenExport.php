<?php

namespace App\Exports;

use App\Models\Mata_kuliah;
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
    public function __construct(
        public int $idTahun
    )
    {
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

        return view('koordinator.kelas_asisstent.export', compact('asisten', 'generalsubjects', 'idTahun'));
    }   
}
