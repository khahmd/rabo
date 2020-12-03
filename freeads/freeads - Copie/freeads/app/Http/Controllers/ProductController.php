<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public $ids;
    public $title;
    public $description;
    public $price;

    public function addProduct()
    {
        return view('add-product');
    }

    public function storeProduct(Request $request)
    {
        $title = $request->title;
        $price = $request->price;
        $description = $request->description;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        $products = new Product();
        $products->title =$title; 
        $products->price =$price;
        $products->description =$description;        
        $products->profileimage = $imageName;
        $products->save();
        return  back()->with('product_added','Product record has been inserted');
    
    }

    public function products()
    {   
        $products = Product::all();
        return view('all-product',compact('products'));
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('edit-product',compact('product'));
    }
    public function updateProduct(Request $request)

    {
        $title = $request->title;
        $price = $request->price;
        $description = $request->description;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $product = Product::find($request->id);
        $product->title = $title; 
        $product->price = $price;
        $product->description = $description;        
        $product->profileimage = $imageName;
        $product->save();
        return back()->with('product_updated','Product record has been updated');


    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        unlink(public_path('images').'/'.$product->profileimage);
        $product->delete();
        return back()->with('product_deleted','Product deleted successfull!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = DB::table('products')->where("price", 'like', '%' .$search.'%')->paginate(3);
        return view('product' , ['products' => $products]);
    }
}