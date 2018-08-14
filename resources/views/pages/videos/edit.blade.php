@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/videos') }}" class="btn btn-primary btn-sm float-left">Back</a>
                    <label class="float-right">Edit Video</label>
                </div>

                <div class="card-body">
                    {!! Form::model($video, ['route' => ['admin.videos.update', $video->id],'method' =>'put','role'=>'form','files' => true])!!}
                    	{{ csrf_field() }}
                    	@include('pages.backend.components.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection