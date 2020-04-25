@extends('layouts.master')

@section('content')
<div class="container">
    @if($data->count())
    <h3>dashboard</h3>
    <div class="row pt-5">
        @foreach($data as $rw)
            <div class="col-4 pb-4" >
                <a href="/Category/{{$rw->name}}" style="text-decoration: none">
                    <h3>{{$rw->name}} </h3>
                    <img src="/storage/{{$rw->image}}" class="w-100">
                </a>
                <div class="d-flex justify-content-between pt-2" >
                <div >products : {{$rw->products->where('quantity','>',0)->count()}}</div>
                <a href="/Category/{{$rw->id}}/delete"style="text-decoration: none">remove</a>
                <a href="/Category/{{$rw->id}}/edit"style="text-decoration: none">Edit</a>
                </div>
                
            </div>
        @endforeach
    </div>
    @else
    <div class="d-flex justify-content-center pt-5"><h2>There is no categories</h2></div>
    @endif
</div>
@endsection
