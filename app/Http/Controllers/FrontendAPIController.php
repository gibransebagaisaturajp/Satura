<?php

// namespace App\Http\Controllers;

// use App\Artikel;
// use App\Kategori;
// use App\User;
// use Illuminate\Http\Request;

// class FrontendAPIController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $menu = Kategori::take(3)->get();
//         $top = Artikel::where('headline', 0)->orderBy('created_at', 'desc')->take(5)->get();
//         $headline = Artikel::where('headline', 1)->orderBy('created_at', 'desc')->take(3)->get();
//         $artikel = Artikel::select('artikels.title', 'artikels.slug', 'headline', 'image', 'categories.title as categories', 'users.name as author')
//             ->join('users', 'users.id', '=', 'artikels.user_id')
//             ->join('categories', 'categories.id', '=', 'artikels.kategori_id')
//             ->paginate(2);
//         $trending = Artikel::inRandomOrder()->take(3)->get();-
//         $latest = Artikel::orderBy('created_at', 'desc')->take(4)->get();

//         $response = [
//             'success' => true,
//             'data' => ['menu' => $menu, 'top' => $top, 'headline' => $headline, 'artikel' => $artikel, 'trending' => $trending, 'latest' => $latest],
//             'message' => 'Berhasil.'
//         ];

//         return response()->json($response, 200);
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Artikel  $artikel
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         $artikel = Artikel::where('slug', $id)->first();

//         if (!$artikel) {
//             $response = [
//                 'success' => false,
//                 'data' => 'Empty',
//                 'message' => 'Artikel tidak ditemukan.'
//             ];
//             return response()->json($response, 404);
//         }

//         $response = [
//             'success' => true,
//             'data' =>  $artikel,
//             'message' => 'Berhasil.'
//         ];

//         return response()->json($response, 200);
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Artikel  $artikel
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Artikel  $artikel
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }
