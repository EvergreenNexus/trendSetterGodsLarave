@extends('dashboard.layout')
@section('content')
    <div class="card">
        <div class="card-body ">
            <h3>update</h3>
            <form class="form" action="{{ url('/products') }}/{{ $product['id'] }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group row ">
                    <span class="col-md-5">
                        <label for="name">Product Name</label>
                        <input value="{{ $product['name'] }}" placeholder="Enter product name ..." type="text" name="name"
                            class="form-control" id="name">
                    </span>
                </div>
                <div class="form-group row">
                    <span class="col-md-5">
                        <label for="price">Price</label>
                        <input required placeholder="Enter product price ..." type="text" name="price" class="form-control"
                            id="price" value="{{ $product['price'] }}">
                    </span>
                </div>
                <div class="form-group row">
                    <span class="col-md-5">
                        <label for="categories">Categories</label>
                        <select disabled required name="category" class="form-control categories">
                            <option disabled selected value> {{ $product['category'] }} </option>
                        </select>
                    </span>
                </div>
                <div id="variationsContainer">
                    <span class="add_variation row">
                        <div class="form-group col-md-2">
                            <label for="size">Size</label>
                            <select required class="form-control sizes" name="size[]" id="">
                                <option selected>{{ $product['size'] }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="quantity">Quantity</label>
                            <input min="0" value="{{ $product['quantity'] }}" required type="number"
                                placeholder="product quantity..." name="quantity[]" class="form-control" id="quantity">
                        </div>
                        <div class="form-group col-md-1 d-flex align-items-end" id="button__container">
                            <svg data-toggle="tooltip" data-placement="top" title="Add Product Variations"
                                xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="green"
                                class="bi bi-plus-square add__variation" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </div>
                    </span>
                    @isset($product['variations'])
                        @foreach ($product['variations'] as $index => $variation)
                            <span class="remove__variation row">
                                <input type="hidden" name="variation_ids[]" value="{{ $variation['id'] }}">
                                <div class="form-group col-md-2">
                                    <label for="size">Size</label>
                                    <select required class="form-control sizes" name="size[]" id="">
                                        <option selected> {{ $variation['size'] }} </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="quantity">quantity</label>
                                    <input min="0" value="{{ $variation['quantity'] }}" required name="quantity[]"
                                        placeholder="product quantity..." type="number" class="form-control" id="quantity">
                                </div>
                                <div class="form-group col-md-1 d-flex align-items-end">
                                    <svg data-toggle="tooltip" data-placement="top" title="Remove Product Variations"
                                        xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="red"
                                        class=" bi bi-dash-square remove__variation__button" viewBox="0 0 16 16">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </div>
                            </span>
                        @endforeach
                    @endisset
                </div>
                <button type="submit" class="btn btn-primary mt-2 ">Update Product</button>
            </form>
        </div>

    </div>


    <script>
        $(document).ready(function() {

            $('.clear').click(function(e) {
                $('.form').trigger('reset');
            })

            let product = @json($product);
            // sizes 
            let shoesSizes = "<option disabled selected value> -- size -- </option>"
            for (let i = 1; i < 16.5; i += (1 / 2)) {
                shoesSizes += `<option>${i}</option>`
            }

            let youthSizes = "<option disabled selected value> -- size -- </option>"
            for (let i = 1; i < 14; i++) {
                youthSizes += `<option>${i}C</option>`
            }
            for (let i = 1; i < 8.5; i += (1 / 2)) {
                youthSizes += `<option>${i}Y</option>`
            }

            let apparelSizes = `
                <option disabled selected value> -- size -- </option>
                <option > X-SMALL </option>
                <option > SMALL </option>
                <option > MEDIUM </option>
                <option > LARGE </option>
                <option > X-LARGE </option>
                <option > XX-LARGE </option>
                                                                    `;


            // Categories
            let shoesCategories = `
                                                                                <option disabled selected value> -- Select a Category -- </option>
                                                                                <option >men</option>
                                                                                <option >women</option>
                                                                                <option >youth</option>
                                                                                <option >used</option>
                                                                                                                `;

            let apparelsCategory = `<option >apparel</option>`;


            // Initialize categories and sizes
            function getSizesHtml(type) {
                if (type == "shoes") {
                    return shoesSizes;
                } else if (type == "apparel") {
                    return apparelSizes;
                } else if (type == "youth") {
                    return youthSizes;
                }
            }

            // ------------------------------
            // Variations
            let addVariationButton = $('.add__variation');
            let removeVariationButton = $('.remove__variation');

            addVariationButton.tooltip();
            removeVariationButton.tooltip();

            // Add More variations ( size and quantity inputs)
            addVariationButton.click(() => {
                let variationHTML =
                    `
                <span  class="remove__variation row">
                    <div class="form-group col-md-2">
                        <label for="size">Size</label>
                        <select required  class="form-control sizes" name="size[]">
                            <option disabled selected value> -- size -- </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="quantity">quantity</label>
                        <input min="0" required name="quantity[]" placeholder="product quantity..." type="number" class="form-control"
                            id="quantity">
                    </div>
                    <div class="form-group col-md-1 d-flex align-items-end" >
                        <svg data-toggle="tooltip" data-placement="top" title="Remove Product Variations"
                            xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="red"
                            class=" bi bi-dash-square remove__variation__button" viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                        </svg>
                    </div>
                </span>
                `

                variationHTML = $(variationHTML).find('.sizes').html(getSizesHtml(product['category']))
                    .parent().parent().html();
                variationHTML = `<span  class="remove__variation row">${variationHTML}</span>`;
                $('#variationsContainer').append(variationHTML);
            })

            $('#variationsContainer').on('click', '.remove__variation__button', function() {
                $(this.closest('.remove__variation')).remove();
                // update name of
                console.log($(".remove__variation :input"))
            })


        });

    </script>

@endsection
