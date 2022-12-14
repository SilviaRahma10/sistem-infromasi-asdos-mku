<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman';
        }

        .garping{
            /* width: 80px;
            height: 80px; */
            /* float: left; */
            margin: 20px;
            text-align: center;
            border: 12px groove #15246a; 
            padding : 20px;
            padding-bottom: 370px;
            
            
        }
        
        h4 {
            margin-bottom: -3px;
        }

        p, span {
            margin-bottom: -3px;
            font-size: 22px;
        }

        .table-borderless tr td {
            padding: 3px !important;
        }

        .table-bordered th, .table-bordered td{
            border: 1px solid #000 !important;
        }

        table tr td, table tr th {
            font-size: 20px;
        }

        table tr th{
            padding: 2px !important;
        }

        table tr td {
            padding: 16px !important;
        }
        .column p {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="garping">
        <div class="container" style="padding-left: 50px; padding-right: 50px;">
            <div class="row justify-content-center text-center mt-1">
                <div class="col-2">
                    <img src="{{ url('logo-unib.png') }}" alt="" srcset="" style=" width: 200px; margin-left: -200px;">
                </div>
                <div class="col-10 mt-4" style="margin-left: -120px;">
                    <h4>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN</h4>
                    <h4>RISET, DAN TEKNOLOGI</h4>
                    <h4 class="font-weight-bold" style=" margin-top: 2px; font-size: 20px;">UNIVERSITAS BENGKULU</h4>
                    <h4 class="font-weight-bold" style=" margin-top: 2px; font-size: 20px;">LEMBAGA PENJAMINAN MUTU DAN PENGEMBANGAN PEMBELAJARAN</h4>
                    <p style="font-size: 20px;">Jalan W.R Supratman Kandang Limun Bengkulu 38371A Lantai 2 Gedung B</p>
                    <p style="font-size: 20px;">Telepon : (0736) 21884 Faksimili : (0736 22105)</p>
                    <p style="font-size: 20px;">Laman : http://lpmpp.unib.ac.id E-mail : lpmpp@unib.ac.id</p>
                </div>
            </div>
            <hr style="border: 2px solid #000; margin-top: 6px;">
            <h5 class="text-center font-weight-bold" style="font-size: 36px;">
                SERTIFIKAT 
            </h5>
            <h5 class="text-center" style="font-size: 24px; margin-top: -10px;">
                NOMOR : 1189 / UN30.16 / EP / 2022
            </h5>
            <h5 class="text-center" style="font-size: 24px; margin-top: 50px;">
                Diberikan kepada :
            </h5>
            <h5 class="text-center font-weight-bold" style="font-size: 28px; margin-top: 80px;">
                {{ Auth::user()->name }} <br> {{ Auth::user()->mahasiswa->npm }}
            </h5>
            <h5 class="text-center" style="font-size: 28px; margin-top: 80px;">
                Telah Menjadi Asisten Praktikum untuk Mata Kuliah Umum
            </h5>
            <h5 class="text-center" style="font-size: 28px;">
                Praktikum {{ $item->mku->nama }} 
            </h5>
            <h5 class="text-center" style="font-size: 28px;">
                Tahun Ajaran {{ $item->program->tahun_ajaran->tahun }} Semester
                @if($item->program->tahun_ajaran->semester==1)
                    Ganjil
                @else
                    Genap
                @endif
            </h5>
          
            <div class="d-flex justify-content-between" style="margin-right: 70px; margin-top: 100px;">
                <div class="column">
                    
                </div> 
                <div class="column">
                    <p>Bengkulu, {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('d F Y') }}</p>                
                    <p>Ketua,</p>
                    <p style="margin-top: 100px;">Arsyadani Mishbahuddin, M.Pd.I</p>
                    <p>NIP. 198703112014041001</p>
                </div>            
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
    window.print();
</script>
</html>