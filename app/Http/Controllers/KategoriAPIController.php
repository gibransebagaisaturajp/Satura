<?php

// namespace App\Http\Controllers;

// use App\Kategori;
// use App\Http\Resources\KategoriCollection;
// use App\Http\Resources\KategoriResource;
 
// class KategoriAPIController extends Controller
// {
//     public function index()
//     {
//         return new KategoriCollection(Kategori::paginate());
//     }
 
//     public function show(Kategori $kategori)
//     {
//         return new KategoriResource($kategori->load(['artikels']));
//     }

//     public function store(Request $request)
//     {
//         return new KategoriResource(Kategori::create($request->all()));
//     }

//     public function update(Request $request, Kategori $kategori)
//     {
//         $kategori->update($request->all());

//         return new KategoriResource($kategori);
//     }

//     public function destroy(Request $request, Kategori $kategori)
//     {
//         $kategori->delete();

//         return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
//     }
// }
