<table>
    <thead>
    <tr style="background-color: red">
            <th><b>ID</b></th>
            <th>Kelas</th>
            <th>Program Studi</th>
            <th>Mata Kuliah</th>
            <th>Dosen Pengampu</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
            <th>Nama Asisten</th>
            <th>NPM Asisten</th>
            <th>No. HP Asisten</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($asisten as $assistant)
        @if ($assistant->pendaftaran->program->tahun_ajaran->id == $idTahun)
         <tr>
           <td>{{ $assistant->id}}</td>
           <td>{{ $assistant->kelas->nama}}</td>
           <td>{{ $assistant->kelas->mku_prodi->prodi->nama }}</td>
           <td>{{ $assistant->kelas->mku_prodi->mku->nama }}</td>
           <td>
            @foreach ($assistant->kelas->dosen as $dosen)
                {{ $dosen->nama }} <br>
            @endforeach
           </td>

           <td>{{ $assistant->pendaftaran->program->tahun_ajaran->tahun}}</td>
           <td>
            @if($assistant->pendaftaran->program->tahun_ajaran->semester==1)
               Ganjil
            @else
              Genap
            @endif
          </td>

          <td>{{ $assistant->pendaftaran->mahasiswa->user->name}}</td>
          <td>{{ $assistant->pendaftaran->mahasiswa->npm}}</td>
          <td>{{ $assistant->pendaftaran->mahasiswa->no_hp}}</td>
          
           <td>
            <a href="{{ route('asisten.lihat', $assistant->id) }}"><button type="submit" class="btn btn-primary"> 
              <i class="fas fa-sharp fa-eye"></i>   
            </button> </a>
             <br><br>
           </td>

           <td>
            <a href="{{ route('asisten.edit', $assistant->id) }}"><button type="submit" class="btn btn-warning"> 
              <i class="fas fa-pencil-alt"></i>    
            </button> </a>
             <br><br>
           </td>

         </tr>
         @endif
         @endforeach
    </tbody>
</table>
