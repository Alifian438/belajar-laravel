@extends('layout.master')

@section('judul')
Halaman Edit Cast
@endsection

@section('content')
<form action="/cast/{{ $cast->id }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="formGroupExampleInput">Nama</label>
      <input name="nama" type="text" value="{{ old('nama', $cast->nama) }}" class="form-control">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label for="formGroupExampleInput2">Umur</label>
      <input name="umur" type="integer" value="{{ old('umur', $cast->umur) }}" class="form-control">
    </div>
    @error('umur')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="formGroupExampleInput3">Bio</label>
        <textarea name="bio" class="form-control" cols="30" row="30">{{ old('bio', $cast->bio) }}</textarea>
    </div>
    @error('bio')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <button type="submit" class="btn btn-primary">submit</button>
  </form>

@endsection

