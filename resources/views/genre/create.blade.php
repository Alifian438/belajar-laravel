@extends('layout.master')

@section('judul')
Halaman Tambah Film
@endsection

@section('content')
<form action="/genre" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="formGroupExampleInput">nama</label>
      <input name="nama" type="text" value="{{ old('nama') }}" class="form-control">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <button type="submit" class="btn btn-primary">submit</button>
  </form>

@endsection

