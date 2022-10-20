<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Photographer;
use App\Services\UnsplashClass;
use Illuminate\Http\Request;
use Unsplash\HttpClient;
use Unsplash\Search;

class UnsplashController extends Controller
{
    public function getPhotographers()
    {
        $photographers = Photographer::all();
        return view('photographers.list',compact('photographers'));
    }

    public function getPhotos()
    {
        $photos = Photo::all();
        return view('photos.list',compact('photos'));
    }
}
