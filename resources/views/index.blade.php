@extends('layout')

@section('content')
    <div class="wrap">
        @php
        // Storage::deleteDirectory("03-2021");

        // Storage::makeDirectory("public/images/03-2021");

                // $men_products_json = Storage::get("public/products/men/data.json");
                $men_products_json = Storage::disk('public')->get('products/men/data.json');
                
            $data = json_decode($men_products_json);
            // dd($data->products[0]->image);
        @endphp

        <img src="{{asset('storage/images/' .$data->products[0]->image)}}"/>
    </div>
@endsection
