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

    // Index pages for men , women , youth , used , apparel 

    public function homepage()
    {
        if (Storage::disk('public')->exists('products.html')) {
            return Storage::disk('public')->get('products.html');
        }

        $men_products = Product::where('category', 'men')->get()->load('variations')->toArray();
        $women_products = Product::where('category', 'women')->get()->load('variations')->toArray();
        $youth_products = Product::where('category', 'youth')->get()->load('variations')->toArray();
        $apparel_products = Product::where('category', 'apparel')->get()->load('variations')->toArray();
        $used_products = Product::where('category', 'used')->get()->load('variations')->toArray();

        $cachedPage = (string) view('home.index', [
            'men_products' => $men_products,
            'women_products' => $women_products,
            'youth_products' => $youth_products,
            'used_products' => $used_products,
            'apparel_products' => $apparel_products,
        ])->render();

        File::put(storage_path('/app/public/products.html'), $cachedPage);

        // Storage::url('images/air-jordan-3-retro-se-fire-red.jpg');


        return view('home.index', [
            'men_products' => $men_products, 'women_products' => $women_products,
            'youth_products' => $youth_products, 'apparel_products' => $apparel_products, 'used_products' => $used_products
        ]);
    }

    public function create()
    {
        return view('dashboard.create-product');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'bail|required',
            'price' => 'required',
            'category' => 'required',
            'size' => 'required|array|min:1',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'integer'
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

        if ((sizeof($variations_sizes) == 0 ||  sizeof($variations_quantities) == 0)
            && (sizeof($variations_sizes) == sizeof($variations_quantities))
        ) {
            DB::commit();
            return back()->with('success', 'product was created successfully');
        }

        if (sizeof($variations_sizes) != sizeof($variations_quantities)) {
            DB::rollBack();
            return back()->with('failure', 'error while creating a product');
        }

        foreach ($variations_sizes as $index => $size) {
            array_push($product_variations, ['size' => $size, 'quantity' => $variations_quantities[$index], 'product_id' => $product->id]);
        }

        if (sizeof($product_variations) == 0) {
            DB::rollBack();
            return back()->with('failure', 'error while creating a product');
        }

        try {
            foreach ($product_variations as $index => $variation) {
                Variation::create($variation);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('failure', 'error while creating a product');
        }

        return back()->with('success', 'product was created successfully');
    }

    public function edit(Product $product)
    {
        $product_with_varations = $product->load('variations')->toArray();
        return view('dashboard.edit-product', ['product' => $product_with_varations]);
    }

    public function update(Request $request, Product $product)
    {

        // $updatedProduct = $request->all();
        $request->validate([
            'name' => 'bail|required',
            'price' => 'required',
            'size' => 'required|array|min:1',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'integer'
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity[0];

        $sizes = $request->size;
        $quantities = $request->quantity;
        $product_variations = array();
        $variation_ids = $request->variation_ids;

        array_shift($sizes);
        $variations_sizes = $sizes;
        array_shift($quantities);
        $variations_quantities = $quantities;

        DB::beginTransaction();
        try {
            $product->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('failure', 'error while creating a product 1');
        }


        $variations_before_update = collect($product->load('variations')['variations'])->pluck('id')->toArray();
        if (!isset($variation_ids) || sizeof($variation_ids) != sizeof($variations_before_update)) {
            if (!isset($variation_ids)) {
                try {
                    foreach ($variations_before_update as $id) {
                        $variation = Variation::find($id);
                        $variation->delete();
                    }
                } catch (\Throwable $th) {
                    DB::rollBack();
                    return back()->with('failure', 'error while deleting a variation');
                }
            } else {
                $deleted_variations = array_diff($variations_before_update, $variation_ids);
                try {
                    foreach ($deleted_variations as $id) {
                        $variation = Variation::find($id);
                        $variation->delete();
                    }
                } catch (\Throwable $th) {
                    DB::rollBack();
                    return back()->with('failure', 'error while deleting a variation');
                }
            }
        }


        if ((sizeof($variations_sizes) == 0 ||  sizeof($variations_quantities) == 0)
            && (sizeof($variations_sizes) == sizeof($variations_quantities))
        ) {
            DB::commit();
            return back()->with('success', 'product eeeewas updated successfully');
        }


        if (sizeof($variations_sizes) != sizeof($variations_quantities)) {
            DB::rollBack();
            return back()->with('failure', 'error while updating the product');
        }

        foreach ($variations_sizes as $index => $size) {
            array_push($product_variations, ['size' => $size, 'quantity' => $variations_quantities[$index], 'product_id' => $product->id]);
        }


        if (sizeof($product_variations) == 0) {
            DB::rollBack();
            return back()->with('failure', 'error while creating a product 2');
        }

        if (isset($variation_ids)) {
            try {
                foreach ($variation_ids  as $index => $id) {
                    $variation = Variation::find($id);
                    $variation->size = $variations_sizes[$index];

                    $variation->quantity = $variations_quantities[$index];
                    $variation->save();
                }

                foreach ($variation_ids as $index => $id) {
                    array_shift($variations_sizes);
                    array_shift($variations_quantities);
                    array_shift($product_variations);
                }
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('failure', 'error while creating a product 3 ');
            }
        }


        if (sizeof($product_variations) == 0) {
            DB::commit();
            return back()->with('success', 'product was updated successfully');
        }

        try {
            foreach ($product_variations as $index => $variation) {
                Variation::create($variation);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('failure', 'error while creating a product 4');
        }

        // $product_with_varations = $product->load('variations')->toArray();
        return view('dashboard.index')->with('success', 'product was updated successfully');
    }

    public function cacheProducts()
    {
        // maybe check if the cached version is after latest product insert ?

        $men_products = Product::where('category', 'men')->get()->load('variations')->toArray();
        $women_products = Product::where('category', 'women')->get()->load('variations')->toArray();
        $youth_products = Product::where('category', 'youth')->get()->load('variations')->toArray();
        $apparel_products = Product::where('category', 'apparel')->get()->load('variations')->toArray();
        $used_products = Product::where('category', 'used')->get()->load('variations')->toArray();

        try {

            $cachedPage = (string) view('home.index', [
                'men_products' => $men_products,
                'women_products' => $women_products,
                'youth_products' => $youth_products,
                'used_products' => $used_products,
                'apparel_products' => $apparel_products,
            ])->render();
        } catch (\Throwable $th) {
            return back()->with('failure', 'unable to generate home page');
        }
        try {
            File::put(storage_path('/app/public/products.html'), $cachedPage);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('failure', 'unable to store cached page');
        }

        return back()->with('updated', 'products is updated');
    }
}
