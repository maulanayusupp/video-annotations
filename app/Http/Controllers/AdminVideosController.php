<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;

use App\Libraries\Helper;

class AdminVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $videos = Video::orderBy('created_at', 'desc')->get();
        $data['videos'] = $videos;
        return view('pages.videos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $video = new Video();
        $video->user_id = $request->user_id;
        $video->name = $request->name;
        $video->options = $request->options;
        $video->annotations = $request->annotations;

        $path_file = null;
        $file_request = $request->file('file');
        if($file_request != ''){
            $path_file = Helper::uploadFile($file_request, 'videos', 'videos');
        }
        $video->path = $path_file;
        $video->save();

        return redirect('/admin/videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['video'] = Video::find($id);
        return view('pages.videos.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['video'] = Video::find($id);
        return view('pages.videos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $video = Video::find($id);
        $video->user_id = $request->user_id;
        $video->name = $request->name;
        $video->options = $request->options;
        $video->annotations = $request->annotations;

        $path_file = null;
        $file_request = $request->file('file');
        if($file_request != ''){
            $path_file = Helper::uploadFile($file_request, 'videos', 'videos');
        } else {
            $path_file = $video->path;
        }
        $video->path = $path_file;
        $video->save();

        return redirect('/admin/videos');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
