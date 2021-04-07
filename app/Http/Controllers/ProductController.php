<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index (){

        if(Storage::disk('public')->exists('products.html')){
            return Storage::disk('public')->get('products.html');
        }

        $men_products = Product::where('category','men')->get()->load('variations')->toArray();
        // $women_products = Product::where('category','women')->get()->load('variations')->toArray();
        // $youth_products = Product::where('category','youth')->get()->load('variations')->toArray();
        // $apparel_products = Product::where('category','apparel')->get()->load('variations')->toArray();
        // $used_products = Product::where('category','used')->get()->load('variations')->toArray();





        $cachedPage = (string) view('index',['$men_products'=>$men_products ])->render();
        File::put(storage_path('/app/public/products.html'),$cachedPage);
        


        return $cachedPage;
    }

    public function store(Request $request){

        dd('product creation',$request);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    

        $imageName = time().'.'.$request->image->extension();  

     

        $request->image->move(public_path('images'), $imageName);

        return view('dashboard.index')->with('success','product was created successfully');
    }
    
  

}
