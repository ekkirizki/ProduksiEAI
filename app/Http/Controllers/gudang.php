<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gudang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gud = DB::table('gudang')->paginate(5);
        return view('gudang', ['gud'=>$gud]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tambah_gudang');
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
            'Id_Barang' => 'required',
            'Nama_Barang' => 'required',            
            'Total_Barang' => 'required',            
        ]);
        try{
            DB::table('gudang')->insert([
                'id_barang' => $request->Id_Barang,
                'nama_barang' => $request->Nama_Barang,
                'total_barang' => $request->Total_Barang,    
            ]);            
            return redirect()->route('gudang.index')->with('Berhasil', "Berhasil");
        }
        catch (Exception $e){
            return redirect()->route('gudang.index')->with('Gagal', $e->getMessage());
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
        $edit = DB::table('gudang')->where('id', '=', $id)->get();        
        return view('edit_gudang', ['edit'=>$edit]);
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
            'Id_Barang' => 'required',
            'Nama_Barang' => 'required',            
            'Total_Barang' => 'required',            
        ]);
        try{
            DB::table('gudang')->update([
                'id_barang' => $request->Id_Barang,
                'nama_barang' => $request->Nama_Barang,
                'total_barang' => $request->Total_Barang,    
            ]);            
            return redirect()->route('gudang.index')->with('Berhasil', "Berhasil");
        }
        catch (Exception $e){
            return redirect()->route('gudang.index')->with('Gagal', $e->getMessage());
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
            DB::table('gudang')->where('id', '=', $id)->delete();
            return redirect()->route('gudang.index')->with('Berhasil', 'Berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('gudang.index')->with('Gagal', $e->getMessage());
        }
    }
}
