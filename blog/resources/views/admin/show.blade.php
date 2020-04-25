@extends('layouts.master')

@section('content')
<div class="container">
    @if($cat->products->where('quantity','>',0)->count())
    <h2>{{$cat->name}}</h2>
    <div class="row pt-5">
        @foreach($cat->products as $pro)
            @if($pro->quantity>0)
                <div class="col-4 pb-4" >
                    <h3>{{$pro->name}} </h3>
                    <img src="/storage/{{$pro->image}}" class="w-100">
                    <div class="d-flex justify-content-between">
                        <div>price = {{$pro->price}}&#36;</div>
                        <div>quantity = {{$pro->quantity}}</div>
                        <a href="/Product/{{$pro->id}}/delete"style="text-decoration: none">remove</a>
                        <a href="/Product/{{$pro->id}}/edit"style="text-decoration: none">Edit</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @else
    <div class="d-flex justify-content-center pt-5"><h2>There is no products in {{$cat->name}}</h2></div>
    @endif
</div>
@endsection
