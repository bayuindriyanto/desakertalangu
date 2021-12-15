<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // ...
    }


    public function index()
    {
        $videos = Video::latest()->paginate(5);
    
        return view('videos.index',compact('videos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'video' => 'required|file|mimes:mpeg,mkv,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            
        ]);
  
        $input = $request->all();
  
        if ($video = $request->file('video')) {
            $destinationPath = 'video/';
            $profileVideo = date('YmdHis') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPath, $profileVideo);
            $input['video'] = "$profileVideo";
        }

        // if ($image = $request->file('video')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }
    
        Video::create($input);
     
        return redirect()->route('videos.index')
                        ->with('success','video created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('videos.show',compact('video'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('videos.edit',compact('video'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($video = $request->file('video')) {
            $destinationPath = 'video/';
            $profileVideo = date('YmdHis') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPath, $profileVideo);
            $input['video'] = "$profileVideo";
        }else{
            unset($input['video']);
        }
          
        $video->update($input);
    
        return redirect()->route('videos.index')
                        ->with('success','video updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
     
        return redirect()->route('videos.index')
                        ->with('success','video deleted successfully');
    }
}
