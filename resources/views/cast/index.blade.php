@extends('layout.master')

@section('judul')
Table Cast
@endsection

@push('scripts')
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
  } );
  </script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

@endpush

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
@endpush

@section('content')

<a href="/cast/create" class="btn btn-primary sm my-3">Tambah Cast</a><br>

<table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nama</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($cast as $key => $item)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $item->nama }}</td>
            <td>
                
                <form action="/cast/{{$item->id}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="/cast/{{$item->id}}" class="btn btn-primary btn-sm">Detail</a>
                    <a href="/cast/{{$item->id}}/edit" class="btn btn-info btn-sm">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">

                </form>
            </td>
        </tr>
        @empty
            <h1>Data tidak ada data</h1>
        @endforelse
    
    </tbody>
  </table>
@endsection