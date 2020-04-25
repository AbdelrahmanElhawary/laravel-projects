@extends('layouts.user')

@section('content')
<div class="container">
    @php($user=Auth::user())
    @if($user->records->count())
        <div class="row pt-5">
            @foreach($user->records as $rec)
                @php($pro=$rec->product)
                <div class="col-4 pb-4" >
                    <h3>{{$pro->name}} </h3>
                    <img src="/storage/{{$pro->image}}" class="w-100">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">price = {{$pro->price}}&#36;</div>
                        <div class="pt-3">quantity = {{$rec->quantity}}</div>                     
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="d-flex justify-content-center pt-5">
            <h2>No records yet</h2>
        </div>
    @endif
</div>
@endsection
