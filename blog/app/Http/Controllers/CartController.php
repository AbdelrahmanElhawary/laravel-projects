<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\product;
use App\Cart;
use App\user;
class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function add(Request $request,\App\product $product){
        $oldCart=null;
        if($request->session()->has('cart'))
            $oldCart=$request->session()->get('cart');       
        $cart=new Cart($oldCart);
       $cart->add($product,$product->id);
       $request->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function ShowMyCart(){
        return view('cart',compact('user'));
    }
}
