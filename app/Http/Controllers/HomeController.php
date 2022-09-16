<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $datas=Product::all();
        $data=compact('datas');
        return view('home')->with($data);
    }

    public function add()
    {
        return view('add');
    }

    public function save(Request $request)
    {
         
        $validatedData = $request->validate([
            'name' =>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category'=>'required',
            'sku'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
        $image = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('public/images');
 
 
        $product = new Product;
        
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        $product->category = $request['category'];
        $product->sku= $request['sku'];
        $product->imgname = $image;
        $product->path = $path;
 
        $product->save();
 
        return redirect('add')->with('status', 'Product Has been uploaded');
 
    }

    public function delete($id){
        $product=Product::find($id);
        if(is_null($product)){
                 return redirect('home');
        }
        else{
                $product->delete();
                return redirect('home');
        }
    }

    public function edit($id){
        $product=Product::find($id);
        $data=compact('product','id');
        if(is_null($product)){
            return redirect('home');
        }
        else{
            return view('update')->with($data);
        }
    }

    public function update($id, request $request){
        $product=Product::find($id);

        if(is_null($product)){
            return redirect('home');
        }
        else{
            $product->name = $request['name'];
            $product->price = $request['price'];
            $product->quantity = $request['quantity'];
            $product->category = $request['category'];
            $product->sku= $request['sku'];
            $product->save();

            return redirect('home');
        }
        
    }
}
