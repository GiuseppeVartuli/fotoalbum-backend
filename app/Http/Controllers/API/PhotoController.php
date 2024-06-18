<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index (){
        return response()->json([
            'success' => true,
            'results' => Photo::with(['album', 'categories'])->orderByDesc('id')->paginate(),
        ]) ;
        
        
    }

    public function show ($id){
        

        $photo = Photo::with(['album', 'categories'])->where('id', $id)->first();

        if($photo) {
            return response()->json([
                'success' => true,
                'resuls' => $photo
            ]);
        } else {
            return response()->json([
                'success' => false,
                'resuls' => "404 not found"
            ]);
        }
         
}
}
