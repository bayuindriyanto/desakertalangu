<?php

namespace App\Http\Controllers;

use App\Models\Photo;
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

    
        return view('home.gallery',compact('fotos'));

    }

    public function show(Photo $foto)
    {
        return view('home.gallery',compact('foto', 'video'));

    }

    
}
