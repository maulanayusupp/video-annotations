@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <label class="float-left">Videos</label>
                    <a href="{{ url('/admin/videos/create') }}" class="btn btn-primary btn-sm float-right">Create</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="100%">Name</th>
                                {{-- <th width="20%">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td><a href="{{ route('admin.videos.show', $video->id) }}">{{ $video->name }}</a></td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
