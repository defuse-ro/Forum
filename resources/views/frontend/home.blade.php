@extends('layouts.front')

@section('styles')
    <link rel="stylesheet" href="{{ my_asset('assets/vendors/OwlCarousel/owl.carousel.min.css') }}">
@endsection

@section('content')

    <!-- ==============================================
     Vine Hero
    =============================================== -->
    <div class="vine-hero bg-img-1 mb-3" style="background-image: linear-gradient( rgba(35, 37, 38, 0.80), rgba(35, 37, 38, 0.80) ), url({{ my_asset('uploads/settings/'.get_setting('home_bg')) }});" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row">

                <!-- HERO TEXT -->
                <div class="col-lg-12">
                    <div class="hero-content">

                        <!-- Title -->
                        <h2>{{ get_setting('home_title') }}</h2>

                        <!-- Text -->
                        <p>{{ get_setting('home_sub_title') }}</p>

                        <!-- Vine Join -->
                        <div class="vine-join">
                            <a href="{{ route('auth.register') }}" class="btn btn-md btn-mint rounded-pill">{{ trans('create_an_account') }}</a>
                            <ul class="ms-3">
                                @foreach ($users as $user)
                                  <li><a href="{{ route('user', ['username' => $user->username]) }}"><img src="{{ my_asset('uploads/users/'.$user->image) }}" class="avatar-sm" alt="image"></a></li>
                                @endforeach
                            </ul>
                            <p>{{ trans('join_over') }} {{ $total_users.'+'}} {{ trans('users') }}.</p>
                        </div><!--/vine-join-->

                    </div>
                </div>	<!-- END HERO TEXT -->


            </div>
        </div>
    </div><!-- vine-hero -->

    <div class="ad-spot text-center mt-4" data-aos="fade-up" data-aos-easing="linear">
        <div class="ad-box">
            {!! get_setting('top_ad') !!}
        </div>
    </div>

    <!-- ==============================================
     Categories
    =============================================== -->
    <div class="my-5 d-md-flex justify-content-between align-items-center" data-aos="fade-up" data-aos-easing="linear">
        <div>
            <h3>{{ trans('popular_categories') }}</h3>
        </div>
        <div>
            <a href="{{ route('categories') }}" class="h-primary d-block">{{ trans('all') }} {{ trans('categories') }} <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

    <div class="row">
        @foreach ($categories as $category)
          <div class="col-lg-4 mb-5" data-aos="fade-up" data-aos-easing="linear">
            <div class="category-item">
                <a href="{{ route('category', ['slug' => $category->slug]) }}" class="full_link"></a>
                <img src="{{ my_asset('uploads/categories/'.$category->image) }}" class="img-fluid" alt="Category">
                <div class="title-holder">
                    <h3 class="title"><a href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></h3>
                    <p>{{ $category->posts()->count() }} {{ trans('posts') }}</p>
                </div>
            </div>
          </div>

        @endforeach
    </div>

    <!-- ==============================================
     Tags
    =============================================== -->
    <div class="tag-world" data-aos="fade-up" data-aos-easing="linear">

        <div class="mb-5 d-md-flex justify-content-between align-items-center">
            <div>
                <h3>{{ trans('popular_tags') }}</h3>
                <p>{{ trans('tags_with_most_posts') }}</p>
            </div>
            <div>
                <a href="{{ route('tags') }}" class="h-primary d-block">{{ trans('all') }} {{ trans('tags') }} <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>

        <div class="tags-world">
            <div class="row">
                @foreach ($tags as $tag)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                        <div class="tag-card">
                        <a href="{{ route('tag', ['slug' => $tag->slug]) }}">{{'#'.$tag->name }}</a>
                        </div>
                    </div><!--col-lg-3-->
                @endforeach

            </div>
        </div>
    </div>

    <!-- ==============================================
     Users
    =============================================== -->
    <div class="my-5 d-md-flex justify-content-between align-items-center" data-aos="fade-up" data-aos-easing="linear">
        <div>
            <h3>{{ trans('top_users') }}</h3>
        </div>
        <div>
            <a href="{{ route('users') }}" class="h-primary d-block">{{ trans('all') }} {{ trans('users') }} <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

    <div class="carousel-wrap" data-aos="fade-up" data-aos-easing="linear">
        <div class="carousel-wrap-inner carousel-users owl-carousel" id="users">

            @foreach ($top_users as $user)
                <div class="follow-box">
                    <div class="img">
                        <a href="{{ route('user', ['username' => $user->username]) }}">
                            <img src="{{ my_asset('uploads/users/'.$user->image) }}" alt="User">
                        </a>
                    </div>
                    <div class="mt10">
                        <span>
                            <a class="h5" href="{{ route('user', ['username' => $user->username]) }}">{{ $user->name }}</a>
                        </span>
                        <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                            <i class="bi bi-patch-check"></i>
                        </span><br>
                        <span class="mb-0 small"><i class="bi bi-person-check me-1"></i> {{ $user->followers->count() }} {{ trans('followers') }}</span>
                    </div>
                    <div class="mt10">
                            <a href="{{ route('user', ['username' => $user->username]) }}" class="btn btn-mint rounded-pill"><i class="bi bi-person me-1"></i>{{ trans('view') }} {{ trans('profile') }}</a>
                    </div>
                </div>
            @endforeach
        </div>

        <a class="carousel-nav carousel-nav-prev" data-nav="#users" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg></a>
        <a class="carousel-nav carousel-nav-next" data-nav="#users" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg></a>

    </div><!--/users-->

    <!-- ==============================================
     How it works
    =============================================== -->
    <div class="my-5 d-md-flex justify-content-between align-items-center" data-aos="fade-up" data-aos-easing="linear">
        <div><h3>{{ trans('how_it_works') }}</h3></div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-easing="linear">
            <div class="how-box">
                <div class="icon"><span class="bi bi-person-square"></span></div>
                <div class="details">
                    <h4 class="mb-3">Create an Account</h4>
                    <p class="text">Join the community by creating an account.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-easing="linear">
            <div class="how-box">
                <div class="icon"><span class="bi bi-list-ul"></span></div>
                <div class="details">
                    <h4 class="mb-3">Start a Discussion</h4>
                    <p class="text">Post a discussion, comment or reply.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-easing="linear">
            <div class="how-box">
                <div class="icon"><span class="bi bi-credit-card"></span></div>
                <div class="details">
                    <h4 class="mb-3">Make Money</h4>
                    <p class="text">Get Tips/Donations from members in the Community.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
                <div class="join-box" data-aos="fade-up" data-aos-easing="linear">
                    <h2 class="text-center mx-auto">Join the world’s largest forum community &amp; start making money through tips.</h2>
                    <div class="join-button-box"><a class="join-button" href="{{ route('auth.register') }}">{{ trans('join_now') }}<i class="bi bi-arrow-up-right"></i></a></div>
                </div>
        </div>
    </div>


@endsection

@section('scripts')
<script src="{{ my_asset('assets/vendors/OwlCarousel/owl.carousel.min.js') }}"></script>
<script src="{{ my_asset('assets/frontend/js/owlcarousel.js') }}"></script>

@endsection
