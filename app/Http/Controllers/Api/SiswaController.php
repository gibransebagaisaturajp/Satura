<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\siswa;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $siswa = siswa::all();
       if(!$siswa){
        $response = [
         'success' => false,
         'data' => 'empty',
         'message' => 'siswa tidak di temukan.'
           ];
           return response()->json($response,404);
       }
       $response = [  
           'succcess' => true,
           'data' => $siswa,
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
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Tampung semua inputan ke dalam $input
        $input = $request->all();
        
        //buat validasi ditampung ke $validator
        $validator = validator::make($input,[
            'nama' => 'required|min:15'
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
        //buat fungsi untuk menghandle semua inputan -> dimasuklan ke table
        $siswa = siswa::create($input);
        
        //menampilkan response
        $response =[
            'success' => true,
            'data' =>$siswa,
            'message' =>'siswa berhasih di tambah'
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
    $siswa = siswa::Find($id);
       if(!$siswa){
           $response = [
               'success' => false,
               'data' => 'empty',
               'message' => 'siswa tidak di temukan.'
           ];
           return response()->json($response,404);
       }

       $response = [
           'succcess' => true,
           'data' => $siswa,
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
            'nama' => 'required|min:15'
        ]);
             if($validator->fails()){
            $response =[
                'success' => false,
                'data' => 'Validator Eror',
                'message' => $validator->errors()
            ];
            return response()->json($response,500);
        }
        $siswa->nama = $input['nama'];
        $siswa->save();

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
         $siswa = siswa::Find($id);
         if(!$siswa){
             $response = [
                 'success' => false,
                 'data' => 'Gagal Update.',
                 'message' => 'Siswa Tidak Ditemukan'
             ];
             return response()->json($response,404);
         }

         $siswa->delete();
         $response = [
            'success' => true,
            'data' => $siswa,
            'message' => 'Siswa Tidak Ditemukan.'
         ];
         return response()->json($response,200);
    }
}