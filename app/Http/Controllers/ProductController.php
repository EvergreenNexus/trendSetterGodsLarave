<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {

        if (Storage::disk('public')->exists('products.html')) {
            return Storage::disk('public')->get('products.html');
        }

        $men_products = Product::where('category', 'men')->get()->load('variations')->toArray();
        $women_products = Product::where('category', 'women')->get()->load('variations')->toArray();
        $youth_products = Product::where('category', 'youth')->get()->load('variations')->toArray();
        $apparel_products = Product::where('category', 'apparel')->get()->load('variations')->toArray();
        $used_products = Product::where('category', 'used')->get()->load('variations')->toArray();

        $cachedPage = (string) view('index', [
            'men_products' => $men_products,
            'women_products' => $women_products,
            'youth_products' => $youth_products,
            'used_products' => $used_products,
            'apparel_products' => $apparel_products,
        ])->render();
        File::put(storage_path('/app/public/products.html'), $cachedPage);


        // Storage::url('images/air-jordan-3-retro-se-fire-red.jpg');


        return view('index', ['men_products' => $men_products]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);


        $product = new Product;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->quantity = $request->quantity;
        $product->category = $request->category;


        // Image Storing
        $imageName = $request->image->getClientOriginalName();
        $path = $request->image->storeAs('/images', $imageName, 'public');
        $product->image = 'storage/' . $path;
        // $product = Storage::url('public/images/.air-jordan-3-retro-se-fire-red.jpg');
        // $product = Storage::url('public')->get('images/air-jordan-3-retro-se-fire-red.jpg');

        // $product = Storage::disk('public')->get('images/air-jordan-3-retro-se-fire-red.jpg');
        try {
            $product->save();
        } catch (\Throwable $th) {
            return back()->with('failure', 'error while creating a product');
        }

        // Trigger Page Home page Caching and redirect . 
        return back()->with('success', 'product was created successfully');

    }
}
