@extends('videos.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Desa Kertalangu Administrator</h2>
                <a class="btn btn-primary" href="{{ route('dashboard') }}"> Back to Dashboard</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('videos.create') }}"> Create New Video</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Video</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($videos as $video)
        <tr>
            <td>{{ ++$i }}</td>
            <td><video src="/video/{{ $video->video }}" width="100px"></td>
            <td>{{ $video->name }}</td>
            <td>{{ $video->detail }}</td>
            <td>
                <form action="{{ route('videos.destroy',$video->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('videos.show',$video->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('videos.edit',$video->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $videos->links() !!}
        
@endsection