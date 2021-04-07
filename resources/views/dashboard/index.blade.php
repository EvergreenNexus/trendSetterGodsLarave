@extends('dashboard.layout')

@section('content')
    <div class="card">
        <div class="card-body ">
            <h3>Create New Product</h3>
            <form class="form" action="{{url('/product')}}" method="POST">
                @csrf
                <div class="form-group ">
                    <label for="name">Product Name</label>
                    <input placeholder="Enter product name .." type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input placeholder="Enter product price" type="text" name="price" class="form-control" id="price">
                </div>
                <div class="form-group">
                    <label for="categories">Categories</label>
                    <select name="category" class="form-control" id="categories">
                        <option>men</option>
                        <option>women</option>
                        <option>youth</option>
                        <option>apparel</option>
                        <option>used</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Product Picture</label>
                    <input type="file" name="picture" class="form-control-file" id="photo">
                </div>
                <div class="form-group w-25">
                    <label for="size">Size</label>
                    <select class="form-control" name="size" id="size">
                        <option>8</option>
                        <option>8.5</option>
                        <option>9</option>
                        <option>9.5</option>
                        <option>10</option>
                        <option>10.5</option>
                        <option>11</option>
                    </select>
                </div>
                <div class="form-group w-25">
                    <label for="quantity">quantity</label>
                <input name="quantity" placeholder="enter product quentity" type="text" class="form-control" id="quantity">
                </div>
               
                <button type="submit" class="btn btn-primary">Create Product</button>
            </form>
        </div>
    </div>

@endsection
