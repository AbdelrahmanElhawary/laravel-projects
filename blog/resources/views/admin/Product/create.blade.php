@extends('layouts.master')

@section('content')
<div class="container">
    <form action="/Product/store" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <h3>Add Product</h3>
        </div>
        <div class="row">
            <div class="col-8 ">
                <div class="form-group row">
                    <label for="category_id" class="col-md-4 col-form-label">Category name</label>
                        <select id="category_id"  
                        class="form-control @error('category_id') is-invalid @enderror"
                        name="category_id" value="{{ old('category_id') }}"
                            required autocomplete="category_id">
                        @foreach($data as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 ">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Product Name</label>
                        <input id="name" type="text" 
                        class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}"
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
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label">Product Price</label>
                        <input id="price" type="number" step="0.01" min="0.00"
                        class="form-control @error('price') is-invalid @enderror"
                        name="price" value="{{ old('price') }}"
                            required autocomplete="price">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 ">
                <div class="form-group row">
                    <label for="quantity" class="col-md-4 col-form-label">Product quantity</label>
                        <input id="quantity" type="number"  min="0"
                        class="form-control @error('quantity') is-invalid @enderror"
                        name="quantity" value="{{ old('quantity') }}"
                            required autocomplete="quantity">
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 ">
                <label for="image"class="col-mid-4 col-form-label">Product Image</label>
                <input type="file" class="form-control-file" id="image" name="image">    
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror          
            </div>
        </div>
        <div class="row pt-4">
            <button class="btn btn-primary">Add new product</button>
        </div>
    </form>
</div>
@endsection
