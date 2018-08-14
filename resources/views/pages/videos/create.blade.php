@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/videos') }}" class="btn btn-primary btn-sm float-left">Back</a>
                    <label class="float-right">Add Video</label>
                </div>

                <div class="card-body">
                    {!! Form::open(['url' => 'admin/videos','files' => true, 'id'=>'form-create-brochures']) !!}
                        {{ csrf_field() }}
                        @include('pages.videos.components.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
