<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Siswa;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $siswa = Siswa::all();
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
        if($validator->fails()){
            $response =[
                'success' => false,
                'data' => 'Validator Eror',
                'message' => $validator->errors()
            ];
            return response()->json($response,500);
        }
        //buat fungsi untuk menghandle semua inputan -> dimasuklan ke table
        $siswa = Siswa::create($input);
        
        //menampilkan response
        $response =[
            'success' => true,
            'data' =>$siswa,
            'message' =>'siswa berhasih di tambah'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $siswa = Siswa::Find($id);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}