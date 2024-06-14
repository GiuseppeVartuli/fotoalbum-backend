@extends('layouts.admin')


@section('content')
    
<header>
    <div class="container mt-4">
        <h1>{{$photo->title}}</h1>
    </div>
</header>

    <div class="container">
        <div class="row">
            <div class="col">
                @if (Str::startsWith($photo->cover_image, 'https://'))
                        <img  width="400"  src="{{$photo->cover_image}}" alt="{{$photo->slug}}">
                        @else
                            <img width="400"  src="{{asset('storage/' . $photo->cover_image)}}" alt="{{$photo->slug}}">
                        @endif
            </div>
            <div class="col">
                <p>{{$photo->description}}</p>
                <p><strong>Modello:</strong> {{$photo->camera}}</p>
            </div>
        </div>
        <a class="btn btn-dark mt-3" href="{{route('admin.photos.index')}}">Back</a>
    </div>
@endsection