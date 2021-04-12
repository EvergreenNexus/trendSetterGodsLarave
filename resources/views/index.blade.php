@extends('layout')
{{-- <img src="{{asset('storage/images/air-jordan-7-retro-greater-china.jpg')}}"/> --}}

@section('content')

    <div class="wrap">
        <h4 class="alert alert-success mt-4 mb-4 text-center " role="alert">
            Men's Section
        </h4>
        @include('sections.men')
        {{-- @include('sections.women') --}}
        {{-- @include('sections.men') --}}
        {{-- @include('sections.men') --}}
        {{-- @include('sections.men') --}}
    </div>
@endsection
