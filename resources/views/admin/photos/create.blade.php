@extends('layouts.admin')

@section('content')
<header>
    <div class="container mt-4">
        <h1>New Photo</h1>
    </div>
</header>


<div class="container mt-5">

    @include('partials.errors')

    <form action="{{route('admin.photos.store')}}" method="post" enctype="multipart/form-data">

        @csrf

        <!-- TITLE -->

        <div class="mb-5">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
                aria-describedby="titlehelp"
                placeholder="The title is ... "
                value="{{old('title')}}"
            />
            <small id="titlehelp" class="form-text text-muted">Please enter a title for your photo</small>
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>


        <!-- In Evidence -->

        <div class="form-check mb-5">
            <input type="checkbox" class="form-check-input" id="in_evidence" name="in_evidence" value="1" {{ old('in_evidence') ? 'checked' : '' }}>
            <label class="form-check-label" for="in_evidence">In evidence</label>
            @error('in_evidence')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <!-- COVER IMAGE -->

        <div class="mb-5">
            <label for="cover_image" class="form-label">Upload photo</label>
            <input
                type="file"
                class="form-control"
                name="cover_image"
                id="cover_image"
                placeholder=""
                aria-describedby="cover_imageHelp"
            />
            <div id="cover_imageHelp" class="form-text">Upload a photo</div>
            @error('cover_image')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>




        <!-- Category -->
        <div class="mb-4 d-flex gap-2 flex-wrap">
            @foreach ($categories as $category)
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$category->id}}"
                {{in_array($category->id, old('categories', [])) ? 'checked' : ''}}
                
                id="category-{{$category->id}}" name="categories[]" />
                <label class="form-check-label" for="category-{{$category->id}}">{{$category->name}}</label>
                </div>
            @endforeach
        </div>
        
        



        <!-- Album -->

        <div class="mb-3">
            <label for="album_id" class="form-label">Name Album</label>
            <select
                class="form-select"
                name="album_id"
                id="album_id"
                
            >
                <option selected disabled>Select one</option>
                
                @foreach ($albums as $album)
                    <option value="{{$album->id}}" {{old('album_id') == $album->id ? 'selected' : ''}}>{{$album->name}}</option>
                @endforeach
            </select>
        </div>
        


        <!-- CAMERA -->
        <div class="mb-5">
            <label for="camera" class="form-label">Camera</label>
            <input
                type="text"
                class="form-control"
                name="camera"
                id="camera"
                aria-describedby="camerahelp"
                placeholder="The camera model is ... "
                value="{{old('camera')}}"
            />
            <small id="camerahelp" class="form-text text-muted">Enter the model of the camera used for the photo</small>
            @error('camera')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        


        <!-- DESCRIPTION -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Describe the photo ..." >{{old('description')}}</textarea>
            <small id="descriptionhelp" class="form-text text-muted">Please write a description to the photo</small>
        </div>
        
            @error('description')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="container mb-5 d-flex gap-3 justify-content-end">
            <a class="btn btn-dark " href="{{route('admin.photos.index')}}"> Back</a>
            <button type="submit" class="btn btn-dark" >Create</button>
        </div>
        
        

    </form>

</div>
@endsection