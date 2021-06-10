<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class api_laporan_karyawan extends Controller
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
            $pengiriman = DB::table('laporan_karyawan')->get();
            return $pengiriman;
        } else {
            // dd($input);
            $pengiriman = DB::table('laporan_karyawan')->where($input)->get();
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
            $pengiriman = DB::table('laporan_karyawan')->where('id', '=', $id)->get();
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
