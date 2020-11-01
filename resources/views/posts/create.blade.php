@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Add New Post</h2>
                </div>
                <div class="row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="row">
                    <label for="file" class="col-md-4 col-form-label">Post Image</label>
                    <input type="file" class="form-control-file pb-3" id="image" name="image">

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
