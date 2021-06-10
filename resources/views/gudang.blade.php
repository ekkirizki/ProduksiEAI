@extends('layouts.dasar')
@section('Judul', 'Gudang')
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
      <th scope="col">Id Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Total Barang</th>
      <th scope="col">Edit / Hapus </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($gud as $peng)
    <tr>
        <td>{{$peng->id_barang}}</td>
        <td>{{$peng->nama_barang}}</td>
        <td>{{$peng->total_barang}}</td>
        
        <td>
            <div class="btn-group" role="group">
            <form action="{{route('gudang.edit', $peng->id)}}">
            <span><button type="submit" class="btn btn-primary"> Edit </button> </span>
            </form>
            </div>
            <div class="btn-group" role="group">
            <form action="{{route("gudang.destroy", $peng->id)}}" method="POST">
                @csrf
                @method('delete')
            <span><button type="submit" class="btn btn-danger"> Hapus </button></span>
            </form>
        </td>
        </tr>
    @endforeach
    
</tbody>
</table>
{{ $gud->links() }}
<a href="{{route('gudang.create')}}" class="btn btn-primary btn-block"> Tambah </a>    

</div>
</div>

    
@endsection