{{-- Success Toast --}}
@if (session('success'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
        <div class="toast-header text-white bg-success">
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
            <p>{{ session('success') }}</p>
            <p>
                Please update website ... !
            </p>
        </div>
    </div>
@endif

{{-- error while creating a product --}}
@if (session('failure'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
        <div class="toast-header text-white bg-danger">
            <strong class="mr-auto">Product Not Created !</strong>
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;
            <small>1 sec ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <p>{{ session('failure') }}</p>
            <p>Please try again ..</p>
        </div>
    </div>
@endif

{{-- input errors --}}
@if ($errors->any())
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
        <div class="toast-header text-white bg-danger">
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
