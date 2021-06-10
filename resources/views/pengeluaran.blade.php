@extends('layouts.dasar')
@section('Judul', 'Pengeluaran')
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
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Keperluan</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Tanggal Permintaan</th>
      <th scope="col">Edit / Hapus </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($datapeng as $peng)
    <tr>
        <td>{{$peng->id_karyawan}}</td>
        <td>{{$peng->nama_karyawan}}</td>
        <td>{{$peng->keperluan}}</td>
        <td>{{$peng->total_harga}}</td>
        <td>{{$peng->tanggal_permintaan}}</td>
        <td>
            <div class="btn-group" role="group">
            <form action="{{route('pengeluaran.edit', $peng->id)}}">
            <span><button type="submit" class="btn btn-primary"> Edit </button> </span>
            </form>
            </div>
            <div class="btn-group" role="group">
            <form action="{{route("pengeluaran.destroy", $peng->id)}}" method="POST">
                @csrf
                @method('delete')
            <span><button type="submit" class="btn btn-danger"> Hapus </button></span>
            </form>
        </td>
        </tr>
    @endforeach
    
</tbody>
</table>
{{ $datapeng->links() }}
<a href="{{route('tambah_pengeluaran.index')}}" class="btn btn-primary btn-block"> Tambah </a>    

</div>
</div>

@endsection