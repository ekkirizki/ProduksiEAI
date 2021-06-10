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
    <tr>      
      <th scope="col">No Document</th>
      <th scope="col">Nama Product</th>
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
        
        <td>{{$prod->documentNo}}</td>
        <td>{{$prod->productName}}</td>
        <td>{{$prod->productQty}}</td>
        <td>{{$prod->productSize}}</td>
        <td>{{$prod->productStatus}}</td>
        <td>{{$prod->productResponsible}}</td>
        <td>{{$prod->productFactory}}</td>
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

<script>
       function cari() {
           var input, filter, tabel, tr, td, i, txtvalue;
           input = document.getElementById("inputan");
           filter = input.value;
           tabel = document.getElementById("Produksi");
           tr = document.getElementsByTagName("tr");

           console.log(filter);
           for (i = 0; i < tr.length; i++) {
               td = tr[i].getElementsByTagName("td")[1]; //berdasarkan kolom, 0 nyari dari paling kiri.
               if (td) {
                   txtValue = td.textContent || td.innerText;
                   if (txtValue.indexOf(filter) > -1) {
                       tr[i].style.display = "";
                   } else {
                       tr[i].style.display = "none";
                   }
               }
           }
       }

   </script>

@endsection