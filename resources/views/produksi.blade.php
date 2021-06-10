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

            <div class="form-group row" style="margin-bottom: 1em;">
               <label for="inputName" class="col-sm-1-12 col-form-label">Search</label>
               <div class="col">
                   <input type="text" class="form-control cari" name="inputName" placeholder="Nama Produk" id="inputan"
                       onkeyup="cari()">
               </div>
            </div>
<table class="table table-bordered text-center" id="Produksi">
  <thead>
      $table->string('id_produksi');
            $table->string('nama_produksi');
            $table->string('total_produksi');
            $table->string('ukuran');
            $table->string('penanggung_jawab');
            $table->string('pabrik');
    <tr>      
      <th scope="col">Id Produksi</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Kuantitas</th>
      <th scope="col">Ukuran</th>
      <th scope="col">Status</th>
      <th scope="col">Penanggung Jawab</th>
      <th scope="col">Pabrik</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($produksi as $prod)
    <tr>
        
        <td>{{$prod->id_produksi}}</td>
        <td>{{$prod->nama_produksi}}</td>
        <td>{{$prod->total_produksi}}</td>
        <td>{{$prod->ukuran}}</td>
        <td>{{$prod->status}}</td>
        <td>{{$prod->penanggung_jawab}}</td>
        <td>{{$prod->pabrik}}</td>
        {{-- <td>
            <span><a href="{{route('pengeluaran.edit', $peng->id)}}" class="btn btn-primary">Edit </a></span>
            <span><a href="{{route('pengeluaran.destroy', $peng->id)}}" class="btn btn-danger"> Hapus </a></span>
        </td> --}}
        </tr>
    @endforeach    
</tbody>
</table>
{{-- {{ $datapeng->links() }} --}}
{{-- <a href="{{route('produksi.index')}}" class="btn btn-primary btn-block"> Tambah </a>     --}}

</div>
</div>

@endsection