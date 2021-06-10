<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tambah_produksi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('tambah_produksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'IdProduksi' => 'required',
            'NamaProduksi' => 'required',            
            'TotalProduksi' => 'required',
            'Ukuran' => 'required',
            'PJ' => 'required',
            'Pabrik' => 'required',
            'Status' => 'required'
        ]);

        try{
            DB::table('produksi')->insert([
                'id_produksi' => $request->IdProduksi,
                'nama_produksi' => $request->NamaProduksi,
                'total_produksi' => $request->TotalProduksi,
                'ukuran'=> $request->Ukuran,
                'penanggung_jawab'=>$request->PJ,
                'pabrik'=>$request->Pabrik,
                'status'=>$request->Status
            ]);
            return redirect()->route('produksi.index')->with('Berhasil', "Berhasil");
        }
        catch (Exception $e){
            return redirect()->route('produksi.index')->with('Gagal', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
