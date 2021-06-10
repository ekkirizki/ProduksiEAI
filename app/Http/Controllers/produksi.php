<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class produksi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prod = DB::table('produksi')->paginate(5);
        return view('produksi', ['produksi'=>$prod]);
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
        $edit = DB::table('produksi')->where('id', '=', $id)->get();        
        return view('edit_produksi', ['edit'=>$edit]);
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
        $validasi = $request->validate([
            'IdProduksi' => 'required',
            'NamaProduksi' => 'required',            
            'TotalProduksi' => 'required',
            'Ukuran' => 'required',
            'PJ' => 'required',
            'Pabrik' => 'required',
            'Status' => 'required'
        ]);
        // dd($id);
        try{
            DB::table('produksi')->where('id', $id)->update([
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            DB::table('produksi')->where('id', '=', $id)->delete();
            return redirect()->route('produksi.index')->with('Berhasil', 'Berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('produksi.index')->with('Gagal', $e->getMessage());
        }
    }
}
