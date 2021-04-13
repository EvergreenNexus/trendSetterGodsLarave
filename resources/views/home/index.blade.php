@extends('home.layout')
{{-- <img src="{{asset('storage/images/air-jordan-7-retro-greater-china.jpg')}}"/> --}}

@section('content')

    <div class="wrap">
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Men's Section
        </h4>
        @include('home.sections.men')
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Womens's Section
        </h4>
        @include('home.sections.women')
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Youth's Section
        </h4>
        @include('home.sections.youth')
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Apparels's Section
        </h4>
        @include('home.sections.apparel')
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Used Section
        </h4>
        @include('home.sections.used')
    </div>
@endsection
