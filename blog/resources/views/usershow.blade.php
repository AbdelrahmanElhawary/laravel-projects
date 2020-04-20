@extends('layouts.user')

@section('content')
<div class="container">
    <h2>{{$cat->name}}</h2>
        {{$user->id}}
    <div class="row pt-5">
        @foreach($cat->products as $pro)
            @if($pro->quantity>0)
                <div class="col-4 pb-4" >
                    <h3>{{$pro->name}} </h3>
                    <img src="/storage/{{$pro->image}}" class="w-100">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">price = {{$pro->price}}&#36;</div>
                        <div class="pt-3">quantity = {{$pro->quantity}}</div>    
                        <div class="pt-2" style="height:10px">
                                <a href="Product/addtocart/{{$pro->id}}"><button class="btn btn-primary">Add to cart</button></a>
                            </div>                        
                    </div>
                </div>

            @endif
        @endforeach
    </div>
</div>
@endsection
