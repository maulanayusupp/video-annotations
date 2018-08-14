<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;

class APIVideosController extends Controller
{
    public function updateAnnotations(Request $request, $id) {
    	$video = Video::find($id);
    	$video->annotations = $request->input('annotations');
    	$video->save();

    	$response['error'] = 0;
    	$response['message'] = $video->name . ' updated';
    	$response['data'] = $video;

    	return response()->json($response);
    }
}
