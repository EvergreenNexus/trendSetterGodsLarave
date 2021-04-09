@extends('dashboard.layout')

@section('content')
    <div class="card">
        <div class="card-body ">
            <h3>Create New Product</h3>
            <form class="form" action="{{ url('/product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row ">
                    <span class="col-5">
                        <label for="name">Product Name</label>
                        <input required placeholder="Enter product name ..." type="text" name="name" class="form-control"
                            id="name">
                    </span>
                </div>
                <div class="form-group row">
                    <span class="col-5">
                        <label for="price">Price</label>
                        <input required placeholder="Enter product price ..." type="text" name="price" class="form-control"
                            id="price">
                    </span>
                </div>
                <div class="form-group row">
                    <span class="col-5">
                        <label for="categories">Categories</label>
                        <select required name="category" class="form-control" id="categories">
                            <option disabled selected value> -- select a category -- </option>
                            <option>men</option>
                            <option>women</option>
                            <option>youth</option>
                            <option>apparel</option>
                            <option>used</option>
                        </select>
                    </span>
                </div>
                <div id="variationsContainer">
                    <span class="add_variation row">
                        <div class="form-group col-2">
                            <label for="size">Size</label>
                            <select required class="form-control" name="size[]" id="size">
                                <option disabled selected value> -- size -- </option>
                                <option>8</option>
                                <option>8.5</option>
                                <option>9</option>
                                <option>9.5</option>
                                <option>10</option>
                                <option>10.5</option>
                                <option>11</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="quantity">Quantity</label>
                            <input required type="number" placeholder="product quantity..." name="quantity[]"
                                class="form-control" id="quantity">
                        </div>
                        <div class="form-group col-1 d-flex align-items-end" id="button__container">
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
                </div>
                <div class="form-group">
                    <label for="image">Product Picture</label>
                    <input required type="file" name="image" class="form-control-file" id="image">
                </div>
                <button type="submit" class="btn btn-primary mt-2 ">Create Product</button>
                <button type="submit" id="clear" class="btn btn-danger mt-2">Clear</button>

            </form>
        </div>

    </div>

    {{-- Success Toast --}}
    @isset($success)
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto">Product Created</strong>
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <small>1 sec ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Please update website ... !
            </div>
        </div>
    @endisset
    {{-- errors --}}
    @if ($errors->any())

        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto">Failed</strong>
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <small>1 sec ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <ul class="  pl-0 text-center">
                    @foreach ($errors->all() as $error)
                        @if (preg_match('/(quantity)/i', $error))
                            <li class=" alert alert-danger">The quantity field is required</li>
                        @elseif(preg_match('/(size)/i', $error))
                            <li class=" alert alert-danger">The size field is required</li>
                        @else
                            <li class=" alert alert-danger">{{ $error }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>


    @endif

    <script>
        $(document).ready(function() {
            $('.toast').toast('show');

            $('.toast').on('shown.bs.toast', function() {
                setTimeout(() => {
                    $('.toast').toast('hide');
                }, 3000);
            })

            $('.clear').click(function(e) {
                $('.form').trigger('reset');
            })


            let addVariationButton = $('.add__variation');
            let removeVariationButton = $('.remove__variation');

            addVariationButton.tooltip();
            removeVariationButton.tooltip();

            // Add More variations ( size and quantity inputs)
            addVariationButton.click(() => {
                let removeVariationButton = `
                                                                                <span  class="remove__variation row">
                                                                                    <div class="form-group col-2">
                                                                                        <label for="size">Size</label>
                                                                                        <select required class="form-control" name="size[]" id="size">
                                                                                            <option disabled selected value> -- size -- </option>
                                                                                            <option>8</option>
                                                                                            <option>8.5</option>
                                                                                            <option>9</option>
                                                                                            <option>9.5</option>
                                                                                            <option>10</option>
                                                                                            <option>10.5</option>
                                                                                            <option>11</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-3">
                                                                                        <label for="quantity">quantity</label>
                                                                                        <input required name="quantity[]" placeholder="product quantity..." type="text" class="form-control"
                                                                                            id="quantity">
                                                                                    </div>
                                                                                    <div class="form-group col-1 d-flex align-items-end" >
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
                $('#variationsContainer').append(removeVariationButton);
            })

            $('#variationsContainer').on('click', '.remove__variation__button', function() {
                $(this.closest('.remove__variation')).remove();
            })

        });

    </script>

@endsection
