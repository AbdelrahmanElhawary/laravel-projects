@extends('layouts.user')

@section('content')
<div class="container">
    @php($id=Auth::user()->id)
    @php($cart=session($id))
    @if(session('changes'))
            <div class="alert alert-danger" role="alert">
                <h4>Sorry, we do not have enough products in stock to fulfil your order</h4>
                <h4>Your cart has been updated with what is available</h4>
            </div>
    @endif
    @if($cart&&$cart->ItemsQuntity>0)
        <div class="d-flex justify-content-between">
            <div>
                <h4>Items Quntity = {{$cart->ItemsQuntity??0}}</h4>
                <h4>Items total cost = {{$cart->ItemsCost??0}}&#36;</h4>
            </div>
            @if($cart->ItemsQuntity>0)
            <div class="pt-2" style="height:10px">
                <a href="Product/buycart"><button class="btn btn-primary">Buy all</button></a>
            </div>   
            @endif
        </div>
        <div class="row pt-5">
            @foreach($cart->Items as $key=> $ItemInfo)
                @php($pro=\App\product::find($key))
                @if($pro)
                <div class="col-4 pb-4">
                    <h3>{{$pro->name}}</h3>
                    <img src="/storage/{{$pro->image}}" class="w-100">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">price = {{$pro->price}}&#36;</div>
                        <div class="pt-3">quantity = {{$ItemInfo['qty']}}</div>
                        <div class="pt-2" style="height:10px">
                            <a href="Product/removefromcart/{{$pro->id}}"><button class="btn btn-primary">remove from cart</button></a>
                        </div>                                
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @else
        <div class="d-flex justify-content-center pt-5"><h2>The Cart Is Empty</h2></div>
    @endif
</div>
@endsection
