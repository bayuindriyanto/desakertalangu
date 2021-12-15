<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Video;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index()
    {
        $fotos = Photo::latest()->paginate(5);
        $videos = Video::latest()->paginate(5);

    
        return view('home.gallery',compact('fotos','videos'));

    }

    public function show(Photo $foto, Video $video)
    {
        return view('home.gallery',compact('foto', 'video'));

    }

    
}
