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
                    <p class="card-text">
                        @if ($photo->in_evidence) 
                            <span class="badge bg-success">In evidence</span>
                        @else
                            <span class="badge bg-secondary">Not in evidence</span>
                        @endif
                    </p>
                    <p class="card-text">
                        <span>{{ $photo->album ? $photo->album->name : 'Not Album' }}</span>
                    </p>
                        @forelse ($photo->categories as $category)
                            <span class="badge bg-secondary"> {{$category->name}}</span>
                        @empty
                            <span class="badge bg-secondary">Not Category</span>
                        @endforelse 
                    <p class="card-text"><small class="text-body-secondary"><strong>Macchina:</strong> {{$photo->camera}}</small></p>
                    </div>
                    
                </div>
                
                </div>
            </div>
        </div>
@endsection