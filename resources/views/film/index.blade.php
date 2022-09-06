@extends('layout.master')

@section('judul')
Halaman Daftar Film
@endsection

@section('content')
<div>
    <a href="/film/create" class="btn btn-primary my-3">Tambah Film</a>
</div>

<div class="row">
    @foreach ($film as $item)
        
    
    <div class="col-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('image/'. $item->poster) }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $item->judul }}</h5>
              <p class="card-text">{{ $item->ringkasan }}</p>
            <div class="row">
                <div class="col">
                    <a href="/film/{{ $item->id }}" class="btn btn-primary btn-block btn-sm">Detail</a>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <a href="/film/{{ $item->id }}/edit" class="btn btn-info btn-block btn-sm">Edit</a>
                </div>
                <div class="col">
                    <form action="/film/{{$item->id}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm btn-block btn-sm">
                    </form>
                </div>
            </div>
                
              
              
            </div>
          </div>
    </div>
   
    @endforeach
    
</div>

@endsection