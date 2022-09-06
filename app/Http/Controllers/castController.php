<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class castController extends Controller
{
    public function create()
    {
        return view('cast.tambah');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'umur' => 'required',
                'bio' => 'required',

            ],
            [
                'nama.required' => 'Nama harus di isi tidak boleh kosong',
                'umur.required' => 'Umur harus di isi tidak boleh kosong',
                'bio.required' => 'Bio harus di isi tidak boleh kosong',
            ]
        );

        DB::table('cast')->insert([
            'nama' => $request['nama'],
            'umur' => $request['umur'],
            'bio' => $request['bio'],

        ]);

        return redirect('/cast');
    }

    public function index()
    {

        $cast = DB::table('cast')->get();

        return view('cast.index', ['cast' => $cast]);
    }

    public function show($id)
    {
        $cast = DB::table('cast')->where('id', $id)->first();
        return view('cast.detail', ['cast' => $cast]);
    }

    public function edit($id)
    {
        $cast = DB::table('cast')->where('id', $id)->first();
        return view('cast.edit', ['cast' => $cast]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'umur' => 'required',
                'bio' => 'required',

            ],
            [
                'nama.required' => 'Nama harus di isi tidak boleh kosong',
                'umur.required' => 'Umur harus di isi tidak boleh kosong',
                'bio.required' => 'Bio harus di isi tidak boleh kosong',
            ]
        );

        $cast = DB::table('cast')
            ->where('id', $id)
            ->update(
                [
                    'nama' => $request['nama'],
                    'umur' => $request['umur'],
                    'bio' => $request['bio'],
                ]
            );
        return redirect('/cast');
    }

    public function destroy($id)
    {
        DB::table('cast')->where('id', '=', $id)->delete();
        return redirect('/cast');
    }
}
