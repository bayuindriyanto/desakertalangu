@extends('photos.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Desa Kertalangu Administrator</h2>
                <a class="btn btn-primary" href="{{ route('dashboard') }}"> Back to Dashboard</a>

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('photos.create') }}"> Create New Photo</a>
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
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($photos as $photo)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/image/{{ $photo->image }}" width="100px"></td>
                <td>{{ $photo->name }}</td>
                <td>{{ $photo->detail }}</td>
                <td>
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('photos.show', $photo->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('photos.edit', $photo->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $photos->links() !!}

@endsection
