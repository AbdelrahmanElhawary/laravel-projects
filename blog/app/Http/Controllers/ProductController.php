<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Intervention\Image\Facades\Image;
use App\product;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function create ()
    {
        if(auth()->user()->is_admin()==false)
            return redirect()->back();
            $data=DB::table('categories')->get();
        return view('admin/Product/create',['data' => $data]);
    }
    public function store()
    {
        $data=request()->validate([
            'category_id'=>'required',
            'name'=>['required','unique:products'],
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required',
            'image'=>['required','image']
        ]);
        $imagePath= request('image')->store('uploads','public');
        $image=Image::make(public_path("storage/{$imagePath}"))->resize(800,800);
        $image->save();
        $data['image']=$imagePath;
        product::create($data);
        return redirect('dashboard');
    }
    public function finished()
    {
        if(auth()->user()->is_admin()==false)
            return redirect()->back();
        $data=product::all();
        return view('admin.Product.finished',['data'=>$data]);
    }
    public function edit(\App\product $product)
    {
         if(auth()->user()->is_admin()==false)
            return redirect()->back();
        return view('admin.product.edit',['pro'=>$product]);
    }
    public function delete($product)
    {
       DB::table('products')->where('id',$product)->delete();
       return redirect('/dashboard'); 
    }
    public function update(\App\product $product)
    {
        if(auth()->user()->is_admin()==false)
        return redirect()->back();
        $data=request()->validate([
            'name'=>'required',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required',
            'image'=>''
        ]);
        if(request('image')){
            $data['image']=request()->validate([
                'image'=>['required','image']
            ]);
            $imagePath= request('image')->store('uploads','public');
            $image=Image::make(public_path("storage/{$imagePath}"))->resize(800,800);
            $image->save();
            $data['image']=$imagePath;
        }else{
            $data['image']=$product['image'];
        }
        if($product->name!=$data['name']){
            request()->validate([
                'name'=>['required','unique:products']
            ]);
            $data['name']=request('name');
        }
        $product->name=$data['name'];
        $product->image=$data['image'];
        $product->price=$data['price'];
        $product->quantity=$data['quantity'];
        $product->save();
        $cat=\App\Category::find($product->category_id); 
        return view('admin.show',['cat'=>$cat]);
    }
}
