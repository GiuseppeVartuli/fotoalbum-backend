<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoriesController extends Controller
{
    public function index(){
        {
            return response()->json([
                'success' => true,
                'results' => Category::orderByDesc('name')->get()
            ]);
        }
    }
}
