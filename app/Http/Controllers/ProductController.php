<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
   public function index(){
    $product = Product::all();
    return view('dashboard',['products'=>$product]);
    
   }
   public function addProduct(){
     return view('add');
   }
   public function storeProduct(Request $request){
       $product = new Product;
       $product->name = $request->input('name');
       $product->city = $request->input('city');
       $product->marks = $request->input('marks');
       if($request->hasfile('image')){
         $file = $request->file('image');
         $extension= $file->getClientOriginalExtension();
         $filename= time().'.'.$extension;
         $file->move('images/',$filename);
         $product->image = $filename;
     
       }
       $product->save();
       return redirect('dashboard');
   }
   public function editProduct(Product $product,$id){
       return view('edit')->with('product',Product::find($id));
   }
   public function updateProduct(Request $request,$id){
    $product=Product::find($id);
    $product->name = $request->input('name');
    $product->city = $request->input('city');
    $product->marks = $request->input('marks');
    if($request->hasfile('image'))
    {
        $destination = '/images'.$product->image;
        if(File::exist('$destination')){
         File::delete('$destination');
        }
     $file=$request->file('image');
     $extension = $file->getClientOriginalExtension();
     $filename = time().$extension;
     $file->move('/images'.$filename);
     $product->image=$filename;        
    }
    $product->save();
    return redirect('dashboard');
   }
   public function delete($id){
    $product=Product::find($id);
    $product->delete();
    if($product->image){
      File::delete(public_path("images/{$product->image}"));
    }
    return redirect('dashboard');
   }
}
