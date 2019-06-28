<?php

// namespace App\Http\Controllers;

// use App\Artikel;
// use App\Http\Resources\ArtikelCollection;
// use App\Http\Resources\ArtikelResource;

// class ArtikelAPIController extends Controller
// {
//     public function index()
//     {
//         return new ArtikelCollection(Artikel::paginate());
//     }

//     public function show(Artikel $artikel)
//     {
//         return new ArtikelResource($artikel->load(['user', 'kategory']));
//     }

//     public function store(Request $request)
//     {
//         return new ArtikelResource(Artikel::create($request->all()));
//     }

//     public function update(Request $request, Artikel $artikel)
//     {
//         $artikel->update($request->all());

//         return new ArtikelResource($artikel);
//     }

//     public function destroy(Request $request, Artikel $artikel)
//     {
//         $artikel->delete();

//         return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
//     }
// }
