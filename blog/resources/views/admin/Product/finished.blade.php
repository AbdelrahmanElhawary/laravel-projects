@extends('layouts.master')

@section('content')
<div class="container">
    @if($data->where('quantity','=',0)->count())
    <h2>Finished products</h2>
    <div class="row pt-5">
        @foreach($data as $pro)
            @if($pro->quantity==0)
                <div class="col-4 pb-4" >
                    <h3>{{$pro->name}} </h3>
                    <img src="/storage/{{$pro->image}}" class="w-100">
                    <form action="/Product/add/{{$pro->id}}" method="post">
                        @csrf
                        <div class="d-flex justify-content-between pt-3">
                            <div class="pt-2">Price = {{$pro->price}}&#36;</div>
                            <div >
                                <input id="quantity" type="number"  min="1" style="width:60%;"
                                class="form-control @error('quantity') is-invalid @enderror"
                                name="quantity" value="{{ old('quantity')??$pro->quantity }}"
                                    required autocomplete="quantity">
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div style="height:10px">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        @endforeach
    </div>
    @else
    <div class="d-flex justify-content-center pt-5"><h2>There is no finished products</h2></div>
    @endif
</div>
@endsection
