<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Transaksi::all();

        return response()->json([
            'message' => 'Load Data Transaks Succes!',
            'data' => $table
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Transaksi::create([
            "nama_barang" => $request->nama_barang,
            "harga" => $request->harga,
            "jumlah_barang" => $request->jumlah_barang,
            "tanggal_pemesanan" => $request->tanggal_pemesanan,
        ]);

        return response()->json([
            'message'=>"Store Data Transaksi Sukses!",
            'transaksi'=>$table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Transaksi::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Data Transaksi Not Found!"];
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
        $table = Transaksi::find($id);
        if($table){
            $table->nama_barang = $request->nama_barang ? $request->nama_barang : $table->nama_barang;
            $table->harga = $request->harga ? $request->harga : $table->harga;
            $table->jumlah_barang = $request->jumlah_barang ? $request->jumlah_barang : $table->jumlah_barang;
            $table->tanggal_pemesanan = $request->tanggal_pemesanan ? $request->tanggal_pemesanan : $request->tanggal_pemesanan;
            $table->save();

            return $table;
        }else{
            return ["message"=>"Data Transaksi Not Found!"];
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
        $table = Transaksi::find($id);
        if($table){
            $table->delete();

            return ["message"=>"Delete Transaksi Success!"];
        }else{
            return ["message"=>"Transaksi Not Found!"];
        }
    }
}
