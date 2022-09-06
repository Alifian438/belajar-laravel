<?php

namespace App\Http\Controllers;

use App\Genre as AppGenre;
use App\Film as Film;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class controllerFilm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = Film::all();
        return view('film.index', ['film' => $film]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = AppGenre::all();
        return view('film.create', ['genre' => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required|min:2',
                'ringkasan' => 'required',
                'tahun' => 'required',
                'genre_id' => 'required',
                'poster' => 'required|mimes:jpg,jpeg,png|max:2048'

            ]
        );

        //digunakan untuk menyimpan gambar pada public
        $namaPoster = time() . '.' . $request->poster->extension();
        //jika ingin membuat nama gambar berdasarkan slug
        // $namaPoster = Str::slug($request->judul, '-') . '.' . $request->poster->extension();
        $request->poster->move(public_path('image'), $namaPoster);

        $film = new Film;
        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->poster = $namaPoster;
        $film->genre_id = $request->genre_id;
        $film->save();

        return redirect('/film');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::find($id);
        return view('film.detail', ['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = AppGenre::all();
        $film = Film::find($id);
        return view('film.edit', ['film' => $film, 'genre' => $genre]);
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
        $request->validate(
            [
                'judul' => 'required|min:2',
                'ringkasan' => 'required',
                'tahun' => 'required',
                'genre_id' => 'required',
                'poster' => 'mimes:jpg,jpeg,png|max:2048'

            ]
        );

        $film = Film::find($id);

        if ($request->has('poster')) {
            $path = 'image/';
            File::delete($path . $film->poster);

            $namaPoster = time() . '.' . $request->poster->extension();
            //jika ingin membuat nama gambar berdasarkan slug
            // $namaPoster = Str::slug($request->judul, '-') . '.' . $request->poster->extension();
            $request->poster->move(public_path('image'), $namaPoster);

            $film->poster = $namaPoster;

            $film->save();
        }

        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->genre_id = $request->genre_id;
        $film->save();

        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);

        $path = 'image/';
        File::delete($path . $film->poster);

        $film->delete();

        return redirect('/film');
    }
}
