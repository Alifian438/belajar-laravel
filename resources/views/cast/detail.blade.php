@extends('layout.master')

@section('judul')
Halaman Detail Cast
@endsection

@section('content')
<h1 class="text-primary">{{ $cast->nama }}</h1>
<p>Umur {{ $cast->umur }} tahun</p>
<p>{{ $cast->bio }}</p>

<a href="/cast" class="btn btn-scondary">Kembali ke table cast</a>


@endsection