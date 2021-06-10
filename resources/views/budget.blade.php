@extends('layouts.dasar')
@section('Judul', 'Budget')
@section('Konten')

<div class="row align-items-center h-100">
        <div class="col mx-auto">          
            @if ($message = Session::get('Berhasil'))
                <div class="alert alert-success text-center">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('Gagal'))
                <div class="alert alert-danger text-center">
                    <p>{{ $message }}</p>
                </div>
            @endif
<table class="table table-bordered text-center">
  <thead>
    <tr>      
      <th scope="col">Evaluasi Budget</th>
      <th scope="col">Quartal</th>            
    </tr>
  </thead>
  <tbody>
    @foreach ($budget as $bud)
    @if (strtoupper($bud->nama_divisi) == "PRODUKSI")
    {{-- {{ dd(strtoupper($bud->nama_divisi)) }} --}}
   
    <tr>
        <td> {{$bud->evaluasi_budget}} </td>
        <td> {{$bud->quartal}} </td>
    </tr>    
        
    @endif   
    @endforeach
</tbody>
</table>
<a href="{{route('tambah_budget')}}" class="btn btn-primary btn-block"> Tambah </a>    

        </div>
</div>

@endsection