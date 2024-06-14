@extends('layouts.admin')

@section('content')
    <header>
        <div class="container mt-4">
            <h1>My Photos</h1>
        </div>
    </header>

    <div class="container mt-4">
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
                        <th>Cover Image</th>
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
                    <td>
                        @if (Str::startsWith($photo->cover_image, 'https://'))
                        <img width="180" height="180" src="{{$photo->cover_image}}" alt="{{$photo->slug}}">
                        @else
                            <img width="180" height="180" src="{{asset('storage/' . $photo->cover_image)}}" alt="{{$photo->slug}}">
                        @endif
                        
                    </td>
                    <td>{{$photo->title}}</td>
                    <td>{{$photo->camera}}</td>
                    <td>VIEW\EDIT\DELETE</td>
                </tr>
                    @empty
                    <tr
                    class="table-dark"
                >
                    <td scope="row" colspan="5">Not Photo</td>
                    
                </tr>
                    @endforelse

                    
                    
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
        </div>
        
    </div>
@endsection