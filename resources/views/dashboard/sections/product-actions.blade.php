<div class="d-flex justify-content-between">
    <a class="btn btn-primary btn-sm" href="{{url('/products')}}/{{$product['id']}}" role="button">edit</a>
    <form action="{{url('/products')}}/{{$product['id']}}" method="post">
        @csrf
        @method("delete")
        <button type="submit" class="btn btn-danger btn-sm">delete</button>
    </form>
</div>