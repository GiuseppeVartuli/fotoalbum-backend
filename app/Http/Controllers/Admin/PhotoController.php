<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Photo::all());

        return view('admin.photos.index', ['photos' => Photo::orderByDesc('id')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        //dd($request->all());

        $val_data = $request->validated();

        $val_data['cover_image'] = Storage::put('uploads', $request->cover_image);
        
        //dd($val_data);
        Photo::create($val_data);
        
        return to_route('admin.photos.index')->with('message', 'Photo added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //dd($request->all());

        $val_data = $request->validated();

        if($request->has('cover_image')){

            if($photo->cover_image) {
                Storage::delete($photo->cover_image);
            }
            $image_path = Storage::put('uploads', $request->cover_image);
            $val_data['cover_image'] = $image_path;
        }

        $photo->update($val_data);

        return to_route('admin.photos.index')->with('message', 'Photo successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
