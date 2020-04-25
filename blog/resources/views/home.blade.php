@extends('layouts.user')

@section('content')
<div class="container">
    <h3>Dashboard</h3>
    <div class="row pt-5">
        @foreach($data as $rw)
            <div class="col-4 pb-4" >
                <a href="/home/{{$rw->name}}" style="text-decoration: none">
                    <h3>{{$rw->name}} </h3>
                    <img src="/storage/{{$rw->image}}" class="w-100">
                </a>
                <div >products : {{$rw->products->where('quantity','>',0)->count()}}</div>
                                
            </div>
        @endforeach
    </div>
</div>
@endsection
