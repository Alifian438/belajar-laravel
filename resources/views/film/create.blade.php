@extends('layout.master')

@section('judul')
Halaman Tambah Film
@endsection

@section('content')
<form action="/film" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="formGroupExampleInput">Judul</label>
      <input name="judul" type="text" value="{{ old('judul') }}" class="form-control">
    </div>
    @error('judul')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label for="formGroupExampleInput2">Tahun</label>
      <input name="tahun" type="integer" value="{{ old('tahun') }}" class="form-control">
    </div>
    @error('tahun')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="formGroupExampleInput3">Ringkasan</label>
        <textarea name="ringkasan" class="form-control" value="{{ old('ringkasan') }}" cols="30" row="30"></textarea>
    </div>
    @error('ringkasan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Genre</label>
        <select name="genre_id" class="form-control" id="">
            <option value="">---Pilih Genre---</option>
            @forelse ($genre as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @empty
             Tidak ada Genre   
            @endforelse
        </select>
    </div>
    @error('genre_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="">Poster</label>
        <input type="file" name="poster">

    </div>
    @error('poster')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <a href="/film" class="btn btn-secondary">Kembali ke Film</a>
      <button type="submit" class="btn btn-primary">submit</button>
  </form>

@endsection

