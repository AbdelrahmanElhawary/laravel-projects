@extends('layouts.master')

@section('content')
<div class="container">
    <h3>dashboard</h3>
    <div class="row pt-5">
        @foreach($data as $rw)
            <div class="col-4 pb-4" >
                <a href="/Category/{{$rw->name}}" style="text-decoration: none">
                    <h3>{{$rw->name}} </h3>
                    <img src="/storage/{{$rw->image}}" class="w-100">
                </a>
                <div class="d-flex justify-content-between pt-2" >
                <div >number of products : {{$rw->products->count()}}</div>
                <a href="/Category/{{$rw->id}}/delete">remove</a>
                <a href="/Category/{{$rw->id}}/edit">Edit</a>
                </div>
                
            </div>
        @endforeach
    </div>
</div>
@endsection
