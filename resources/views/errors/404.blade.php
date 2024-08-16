@extends('layouts.login')

@section('content')


<div class="vine-wrapper">

    <!-- ==============================================
     Main
    =============================================== -->
    <section class="vine-main">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2 d-flex justify-content-center">
                    <div class="error-content" data-aos="fade-up" data-aos-easing="linear">
                        <h1>4<span>0</span>4</h1>
                        <h2>Sorry Page Was Not Found!</h2>
                        <a class="btn btn-mint w-100 mt-4" href="{{ route('home') }}">Back To Home</a>
                    </div>
                </div>

            </div>

        </div>
    </section>


</div><!--/vine-wrapper-->

@endsection
