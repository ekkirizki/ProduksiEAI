<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class api_gudang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $input = Request()->all(); //buat ngambil parameter -> setelah ? google/h?id=1

        if ($input == null) {
            $pengiriman = DB::table('gudang')->get();
            return $pengiriman;
        } else {
            // dd($input);
            $pengiriman = DB::table('gudang')->where($input)->get();
            return $pengiriman;
        }
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
        try{
            DB::table('gudang')->insert([
                'id_barang' => $request->Id_Barang,
                'nama_barang' => $request->Nama_Barang,
                'total_barang' => $request->Total_Barang,    
            ]);            
            $res['message'] = "Berhasil";            
            return response($res);
        }
        catch (Exception $e){
            $res['message'] = "Berhasil";            
            return response($res);
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
         try {
            $pengiriman = DB::table('gudang')->where('id', '=', $id)->get();
            return response()->json(
                $pengiriman,
                200
            );
        } catch (Exception $e) {
            $res = $e->getMessage();
            return response($res);
        }
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
        try{
            DB::table('gudang')->update([
                'id_barang' => $request->Id_Barang,
                'nama_barang' => $request->Nama_Barang,
                'total_barang' => $request->Total_Barang,    
            ]);            
            $res['message'] = "Berhasil";            
            return response($res);
        }
        catch (Exception $e){
            $res['message'] = "Berhasil";            
            return response($res);
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
            $res['message'] = "Berhasil";
            return response($res);
            
        } catch (Exception $e) {
            $res = $e->getMessage();
            return response($res);
        }
    }
}
