<div class="products-mens">
    @foreach ($men_products as $product)
        @php
            $variations = null;
            if (isset($product['variations'])) {
                $variations = $product['variations'];
            }
        @endphp
        <div class="mens product-card">
            <div class="d-flex justify-content-between">
                <a class="btn btn-primary btn-sm" href="{{url('/products')}}/{{$product['id']}}" role="button">edit</a>
                <form action="{{url('/products')}}/{{$product['id']}}" method="post">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                </form>
            </div>
            <div class="product-image"><img src="{{ asset($product['image']) }}"></div>

            <div class="product-info">
                <h5>{{ $product['name'] }}</h5>
                <h6>Size {{ $product['size'] }} / {{ $product['quantity'] }} Available</h6>
                @if (isset($variations))
                    @foreach ($variations as $variation)
                        <h6>Size {{ $variation['size'] }} / {{ $product['quantity'] }} Available</h6>
                    @endforeach
                @endif
                <h6>{{ $product['price'] }}</h6>
            </div>
        </div>
    @endforeach

</div>
