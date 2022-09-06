@extends('layout.master')

@section('judul')
Halaman Detail Film
@endsection

@section('content')
<h1 class="text-primary">{{ $film->judul }}</h1>
<img src="{{ asset('image/'. $film->poster) }}" alt="" width="100%">
<p>{{ $film->tahun }}</p>
<p>{{ $film->ringkasan }}</p>

<a href="/film" class="btn btn-primary">Kembali ke Daftar Film</a>


@endsection