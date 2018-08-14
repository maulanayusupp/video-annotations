@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/videos') }}" class="btn btn-primary btn-sm float-left">Back</a>
                    <label class="float-right">Video: {{ $video->name }}</label>
                </div>

                <div class="card-body">
                    <video id="video-1" class="video-js vjs-big-play-centered vjs-16-9" controls preload="auto" width="640" height="264" data-setup="{}">
                        <source src="{{ asset($video->path) }}" type='video/mp4'>
                        <source src="{{ asset($video->path) }}" type='video/webm'>
                      </video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/video.js/dist/video-js.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/videojs-annotation-comments/build/css/videojs_skin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/videojs-annotation-comments/build/css/page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/videojs-annotation-comments/build/css/annotations.css') }}">
@endpush
@push('scripts')
    <script type="text/javascript">
        var user = <?php echo json_encode(Auth::user()); ?>;
        var video = <?php echo json_encode($video); ?>;
    </script>
    <script type="text/javascript" src="{{ asset('vendor/video.js/dist/video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/videojs-annotation-comments/build/videojs-annotation-comments.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/video-detail.js') }}"></script>
@endpush
