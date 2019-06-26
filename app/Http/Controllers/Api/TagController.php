<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = tag::all();
        if(count($tag)<=0){
        $response = [
         'success' => false,
         'data' => 'empty',
         'message' => 'tag tidak di temukan.'
           ];
           return response()->json($response,404);
       }
       $response = [  
           'succcess' => true,
           'data' => $tag,
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
            'nama' => 'required|unique:tags'
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
        $tag = new tag;
        $tag->nama = $request->nama;
        $tag->slug = str_slug($request->nama, '-');
        $tag->save();
                //buat fungsi untuk menghandle semua inputan -> dimasuklan ke table
        // $tag = tag::create($input);
        
        //menampilkan response
        $response =[
            'success' => true,
            'data' =>$tag,
            'message' =>'tag berhasih di tambah'
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
        $tag = tag::Find($id);
        if(!$tag){
           $response = [
               'success' => false,
               'data' => 'empty',
               'message' => 'tag tidak di temukan.'
           ];
           return response()->json($response,404);
       }

       $response = [
           'succcess' => true,
           'data' => $tag,
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
            'nama' => 'required|unique:tags'
        ]);
             if($validator->fails()){
            $response =[
                'success' => false,
                'data' => 'Validator Eror',
                'message' => $validator->errors()
            ];
            return response()->json($response,500);
        }
        $tag = new tag;
        $tag->nama = $request->nama;
        $tag->slug = str_slug($request->nama, '-');
        $tag->save();
        
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

        $tag = tag::Find($id);
         if(!$tag){
             $response = [
                 'success' => false,
                 'data' => 'Gagal Update.',
                 'message' => 'tag Tidak Ditemukan'
             ];
             return response()->json($response,404);
         }

         $tag->delete();
         $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'tag Tidak Ditemukan.'
         ];
         return response()->json($response,200);
        }
}
