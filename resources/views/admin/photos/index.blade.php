@extends('layouts.admin')

@section('content')
    <header>
        <div class="container mt-4">
            <h1>My Photos</h1>
        </div>
    </header>

    <div class="container mt-4">
        @include('partials.message')
        <div
            class="table-responsive-md"
        >
            <table
                class="table table-striped table-hover table-borderless table-dark align-middle"
            >
                <thead class="table-dark">
                    <caption>
                        Photos
                    </caption>
                    <tr>
                        <th>ID</th>
                        <th>In Evidence</th>
                        <th>Cover Image</th>
                        <th>Album</th>
                        <th>Title</th>
                        <th>Camera</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @forelse ($photos as $photo )
                    <tr
                    class="table-dark"
                >
                    <td scope="row">{{$photo->id}}</td>
                    <td scope="row">
                        @if ($photo->in_evidence) 
                            <span class="badge bg-success">In evidence</span>
                        @else
                            <span class="badge bg-secondary">Not in evidence</span>
                        @endif
                    </td>
                    <td>
                        @if (Str::startsWith($photo->cover_image, 'https://'))
                        <img width="180" height="180" src="{{$photo->cover_image}}" alt="...">
                        @else
                            <img width="180" height="180" src="{{asset('storage/' . $photo->cover_image)}}" alt="...">
                        @endif
                        
                    </td>
                    <td>{{$photo->album ? $photo->album->name : 'No Album'}}</td>
                    <td>{{$photo->title}}</td>
                    <td>{{$photo->camera}}</td>
                    <td>
                        <a class="btn btn-light" href="{{route('admin.photos.show', $photo)}}">View</a>
                        <a class="btn btn-secondary" href="{{route('admin.photos.edit', $photo)}}">Edit</a>
                        @include('partials.delete-modal')
                    </td>
                </tr>
                    @empty
                    <tr
                    class="table-dark"
                >
                    <td scope="row" colspan="6">Not Photo</td>
                    
                </tr>
                    @endforelse

                    
                    
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
        </div>
        
    </div>
@endsection