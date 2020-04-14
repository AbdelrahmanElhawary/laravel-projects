@extends('layouts.master')

@section('content')
<div class="container">
    <form action="/Category/{{$cat->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH');
        <div class="row">
            <h3>Edit Category</h3>
        </div>
        <div class="row">
            <div class="col-8 ">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Category Name</label>
                        <input id="name" type="text" 
                        class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name')??$cat->name }}"
                            required autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 ">
                <label for="image"class="col-mid-4 col-form-label">Category Image</label>
                <input type="file" class="form-control-file" id="image" name="image">    
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror          
            </div>
        </div>
        <div class="row pt-4">
            <button class="btn btn-primary">Edit category</button>
        </div>
    </form>
</div>
@endsection
