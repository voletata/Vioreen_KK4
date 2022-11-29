<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Barang::all();

        return response()->json([
            'message' => 'Load Data Barang Succes!',
            'data' => $table
        ], 200);
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
        $table = Barang::create([
            'barang' => $request->barang,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data tersimpan imut',
            'data' => $table
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
        $barang = barang::find($id);
        if ($barang) {
            return response()->json([
                'status' => 200,
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'gak ada'
            ], 404);
        }
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
        $barang = Barang::find($id);
        if($barang){
            $barang->barang = $request->barang ? $request->barang : $barang->barang;
            $barang->deskripsi = $request->deskripsi ? $request->deskripsi : $barang->deskripsi;
            $barang->harga = $request->harga ? $request->harga : $barang->harga;
            $barang->save();
            return response()->json([
                'status' => 200,
                'data' => $barang
            ], 200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id . 'gak ada'
            ],404);
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
        $barang = barang::where('id', $id)->first();
        if($barang){
            $barang->delete();
            return response()->json([
                'status' =>200,
                'data' => $barang
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' .  $id  . 'gak tau kemana'
            ],404);
        }
    }
}
