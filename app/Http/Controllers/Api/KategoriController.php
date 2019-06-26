<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\kategori;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::all();
        if(count($kategori)<=0){
        $response = [
         'success' => false,
         'data' => 'empty',
         'message' => 'kategori tidak di temukan.'
           ];
           return response()->json($response,404);
       }
       $response = [  
           'succcess' => true,
           'data' => $kategori,
           'message' => 'Berhasil.'
       ];
        return response()->json($response,200);
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
        $input = $request->all();
        
        //buat validasi ditampung ke $validator
        $validator = validator::make($input,[
            'nama' => 'required|unique:kategoris'
        ]);

        //cek validasi
        if($validator->fails()){
            $response =[
                'success' => false,
                'data' => 'Validator Eror',
                'message' => $validator->errors()
            ];
            return response()->json($response,500);
        }
        $kategori = new kategori;
        $kategori->nama = $request->nama;
        $kategori->slug = str_slug($request->nama, '-');
        $kategori->save();
                //buat fungsi untuk menghandle semua inputan -> dimasuklan ke table
        // $kategori = kategori::create($input);
        
        //menampilkan response
        $response =[
            'success' => true,
            'data' =>$kategori,
            'message' =>'kategori berhasih di tambah'
        ];
        //tampilkan hasil
         return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = kategori::Find($id);
       if(!$kategori){
           $response = [
               'success' => false,
               'data' => 'empty',
               'message' => 'kategori tidak di temukan.'
           ];
           return response()->json($response,404);
       }

       $response = [
           'succcess' => true,
           'data' => $kategori,
           'message' => 'Berhasil'
             ];
        return response()->json($response,200);
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
        $siswa = siswa::Find($id);
        $input = $request->all();
        if(!$siswa){
           $response = [
               'success' => false,
               'data' => 'empty',
               'message' => 'siswa tidak di temukan.'
           ];
           return response()->json($response,404);
       }

        $validator = validator::make($input,[
            'nama' => 'required|unique:kategoris'
        ]);
             if($validator->fails()){
            $response =[
                'success' => false,
                'data' => 'Validator Eror',
                'message' => $validator->errors()
            ];
            return response()->json($response,500);
        }
        $kategori = new kategori;
        $kategori->nama = $request->nama;
        $kategori->slug = str_slug($request->nama, '-');
        $kategori->save();
        
        $response = [
         'succcess' => true,
           'data' => $siswa,
           'message' => 'Berhasil'
             ];
        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 

        $kategori = kategori::Find($id);
         if(!$kategori){
             $response = [
                 'success' => false,
                 'data' => 'Gagal Update.',
                 'message' => 'kategori Tidak Ditemukan'
             ];
             return response()->json($response,404);
         }

         $kategori->delete();
         $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'kategori Tidak Ditemukan.'
         ];
         return response()->json($response,200);
        }
}
