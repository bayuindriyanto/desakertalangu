@extends('videos.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Videos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('videos.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $video->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $video->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Video:</strong>
                {{-- <video src="/video/{{ $video->video }}" width="500px"> --}}
                <video width="500" height="240" controls>
                    <source src="/video/{{ $video->video }}"  type="video/mkv">
                </video>
            </div>
        </div>
    </div>
@endsection
