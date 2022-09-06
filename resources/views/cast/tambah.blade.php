@extends('layout.master')

@section('judul')
Halaman Tambah Cast
@endsection

@section('content')
<form action="/cast" method="POST">
    @csrf
    <div class="form-group">
      <label for="formGroupExampleInput">Nama</label>
      <input name="nama" type="text" value="{{ old('nama') }}" class="form-control">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label for="formGroupExampleInput2">Umur</label>
      <input name="umur" type="integer" value="{{ old('umur') }}" class="form-control">
    </div>
    @error('umur')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="formGroupExampleInput3">Bio</label>
        <textarea name="bio" class="form-control" value="{{ old('bio') }}" cols="30" row="30"></textarea>
    </div>
    @error('bio')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <button type="submit" class="btn btn-primary">submit</button>
  </form>

@endsection

