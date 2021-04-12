@extends('layout')
{{-- <img src="{{asset('storage/images/air-jordan-7-retro-greater-china.jpg')}}"/> --}}

@section('content')

    <div class="wrap">
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Men's Section
        </h4>
        @include('sections.men')
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Womens's Section
        </h4>
        @include('sections.women')
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Youth's Section
        </h4>
        @include('sections.youth')
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Apparels's Section
        </h4>
        @include('sections.apparel')
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Used Section
        </h4>
        @include('sections.used')
    </div>
@endsection
