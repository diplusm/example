@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center h-100">
    <div class="col-3">
        <form class="bg-light p-3 rounded-3" action="{{route('tesseract')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            <h1>Recogmize image</h1>
            <div class="form-group mb-2">
                <label for="image">Title</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary">Recognize</button>
            </div>
        </form>
    </div>
        
</div>
@endsection