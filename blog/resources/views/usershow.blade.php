@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$cat->name}}</h2>
    <div class="row pt-5">
        @foreach($cat->products as $pro)
            @if($pro->quantity>0)
                <div class="col-4 pb-4" >
                    <h3>{{$pro->name}} </h3>
                    <img src="/storage/{{$pro->image}}" class="w-100">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">price = {{$pro->price}}&#36;</div>
                        <div class="pt-3">quantity = {{$pro->quantity}}</div>    
                        <button class="btn btn-primary">Add to cart</button>
                        
                    </div>
                </div>

            @endif
        @endforeach
    </div>
</div>
@endsection
