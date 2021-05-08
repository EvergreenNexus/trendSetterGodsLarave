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

    <div class="container-fluid bg-light mt-4 w-100">

        <!-- Form Started -->
        <h2 style="text-align: center;" class="pt-4">Contact us to order today!</h2>

        <div class="container form-top">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-sm-12 col-xs-12">
                    <div class="card ">
                        <div class="card-body">
                            <form id="reused_form" action="{{ route('sendEmail') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Name" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" placeholder="Enter Email" type="email">
                                </div>

                                <div class="form-group">
                                    <label>Shoe Title / Size / Any Other Questions</label>
                                    <textarea class="form-control" name="message" placeholder="Type Your Message"
                                        rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-raised btn-block btn-danger">Post →</button>
                                </div>
                            </form>

                            <div id="error_message" style="width:100%; height:100%; display:none; ">
                                <h4 style="text-align: center;">Error</h4>
                                Sorry there was an error sending your form.
                            </div>

                            <div id="success_message" style="width:100%; height:100%; display:none; ">
                                <h2 style="text-align: center;">We Will Be In Contact Shortly. Thank You.</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Ended -->

    </div>

    <br>


    <div class="footer" oncontextmenu="return false;">
        <p class="text-center footertext"><strong>© 2021 Trendsetter Gods - All Rights Reserved</strong></p>

        <p class="text-center footertext">Website Designed by Evergreen Nexus Media Group</p>
    </div>

    @if (session('email_success'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header text-white bg-success">
                <strong class="mr-auto">Email Was Sent</strong>
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
                    We Will Be In Contact Shortly. Thank You.
                </p>
            </div>
        </div>
    @endif
    @if (session('unauthorized'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header text-white bg-danger">
                <strong class="mr-auto">unauthorized!</strong>
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <small>1 sec ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <p>you cant signup please contact Patrick.</p>
            </div>
        </div>
    @endif

    @if (session('email_failure'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header text-white bg-danger">
                <strong class="mr-auto">Email not sent!</strong>
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <small>1 sec ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <p>Sorry , Please try again .</p>
            </div>
        </div>
    @endif

@endsection
