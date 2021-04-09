<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'category' => 'required',
            'size' => 'required',
            'quantity' => 'required'
        ]);

        $product = new Product;
        $sizes = $request->size;
        $quantities = $request->quantity;
        $product_variations = array();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->size = $request->size[0];
        $product->quantity = $request->quantity[0];
        $product->category = $request->category;

        $imageName = $request->image->getClientOriginalName();
        $path = $request->image->storeAs('/images', $imageName, 'public');
        $product->image = 'storage/' . $path;

        DB::beginTransaction();
        try {
            $product->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('failure', 'error while creating a product');
        }

        array_shift($sizes);
        $variations_sizes = $sizes;
        array_shift($quantities);
        $variations_quantities = $quantities;

        if (
            sizeof($variations_sizes) != 0 &&  sizeof($variations_quantities) != 0
            && sizeof($variations_sizes) == sizeof($variations_quantities)
            && isset($variations_quantities) && isset($variations_sizes)
        ) {
            foreach ($variations_sizes as $index => $size) {
                array_push($product_variations, ['size' => $size, 'quantity' => $variations_quantities[$index], 'product_id' => $product->id]);
            }
        }

        try {
            if (isset($product_variations) && sizeof($product_variations) != 0) {
                foreach ($product_variations as $index => $variation) {
                    Variation::create($variation);
                }
            } else {
                throw new Exception('product variation was not created');
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('failure', 'error while creating a product');
        }

        // Trigger Home page Caching and redirect . 
        return back()->with('success', 'product was created successfully');
    }
}