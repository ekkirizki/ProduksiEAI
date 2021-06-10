<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran as ModelsPengeluaran;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pengeluaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengeluaran = new ModelsPengeluaran;
        $hasil = $pengeluaran::paginate(5);
        // $users = DB::table('pengeluaran')->get();
        // dd($users[0]->nama_karyawan, $hasil[1]->nama_karyawan);
        return view('pengeluaran', ['datapeng' => $hasil]);
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
        $edit = DB::table('pengeluaran')->where('id', '=', $id)->get();        
        return view('edit_pengeluaran', ['edit'=>$edit]);
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
            'id_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'keperluan' => 'required',
            'total' => 'required',
            'tanggal' => 'required'
        ]);
        // dd($request);
        try{
            DB::table('pengeluaran')->where('id', $id)->update([
                'id_karyawan' => $request->id_karyawan,
                'nama_karyawan' => $request->nama_karyawan,                
                'keperluan' => $request->keperluan,
                'total_harga' => $request->total,
                'tanggal_permintaan' => $request->tanggal
            ]); 
            return redirect()->route('pengeluaran.index')->with('Berhasil', "Berhasil");
        }
        catch(Exception $e){
             return redirect()->route('pengeluaran.index')->with('Gagal', $e->getMessage());
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
    }
}
