<div class="products-apparel">
    @foreach ($apparel_products as $product)
        @php
            $variations = null;
            if (isset($product['variations'])) {
                $variations = $product['variations'];
            }
        @endphp
        <div class="apparel product-card" id="apparel">
            @include('dashboard.sections.product-actions')
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
