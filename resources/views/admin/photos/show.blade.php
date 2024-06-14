@extends('layouts.admin')


@section('content')
    
<header>
    <div class="container mt-4 d-flex justify-content-between">
        <h1>{{$photo->title}}</h1>
        <div>
            <a href="{{route('admin.photos.index')}}" class="btn btn-dark">Back</a>
        </div>
    </div>
</header>
<!--
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
-->
    <div class="container-xxl">
        <div class="row">
            <div class="col">
                <div class="card rounded mb-3" style="width: 500px;">
                    @if (Str::startsWith($photo->cover_image, 'https://'))
                        <img  class="img-fluid card-img-top"  src="{{$photo->cover_image}}" alt="{{$photo->slug}}">
                        @else
                            <img class="img-fluid card-img-top"  src="{{asset('storage/' . $photo->cover_image)}}" alt="{{$photo->slug}}">
                        @endif
                    <div class="card-body" style="width: 18rem;">
                    <p class="card-text">{{$photo->description}}</p>
                    <p class="card-text"><small class="text-body-secondary"><strong>Modello:</strong> {{$photo->camera}}</small></p>
                    </div>
                    
                </div>
                
                </div>
            </div>
        </div>
@endsection