<?php

namespace App\Http\Controllers;
use DB;
use auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\category;
class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function create ()
    {
        if(auth()->user()->is_admin()==false)
            return redirect()->back();
        return view('admin/Category/create');
    }
    public function store()
    {
        if(auth()->user()->is_admin()==false)
            return redirect()->back();
        $data=request()->validate([
            'name'=>['required','unique:categories'],
            'image'=>['required','image']
        ]);
        $imagePath= request('image')->store('uploads','public');
        $image=Image::make(public_path("storage/{$imagePath}"))->resize(800,800);
        $image->save();
        $data['image']=$imagePath;
        category::create($data);
        return redirect('/dashboard');
    }
    public function show($category)
    {
        if(auth()->user()->is_admin()==false)
            return redirect()->back();
        $id  = category::where('name', $category)->first()->id; 
        $cat=\App\Category::find($id); 
        return view('admin.show',['cat'=>$cat]);
    }
    public function delete($category)
    {
       DB::table('categories')->where('id',$category)->delete();
       return redirect('/dashboard'); 
    }
    public function edit(\App\category $category)
    {
         if(auth()->user()->is_admin()==false)
            return redirect()->back();
        return view('admin.Category.edit',['cat'=>$category]);
    }
    public function update(\App\category $category)
    {
        if(auth()->user()->is_admin()==false)
        return redirect()->back();
        $data=request()->validate([
            'name'=>'required',
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
            $data['image']=$category['image'];
        }
        if($category->name!=$data['name']){
            request()->validate([
                'name'=>['required','unique:categories']
            ]);
            $data['name']=request('name');
        }
        $category->name=$data['name'];
        $category->image=$data['image'];
        $category->save();
        return redirect('/dashboard');
    }
}
