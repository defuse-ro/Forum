
@forelse($tags as $tag)

    <div class="col-lg-6" data-aos="fade-up" data-aos-easing="linear">
        <div class="tag-box">
            <div class="tag-header">
                <h3><a href="{{ route('tag', ['slug' => $tag->slug]) }}">{{'#'.$tag->name }}</a></h3>
                <p>{{ $tag->count }} {{ trans('posts') }}</p>
            </div><!--/tag-header-->

            <p class="text-center mb-2">{{ trans('latest_post') }}</p>

            @if (App\Models\Posts::withAnyTag($tag->name)->latest()->first())

                <div class="post-box d-flex mb-2">
                    <div class="card">
                        <div class="card-header card-header-action py-3">
                            <div class="media align-items-center">
                                <div class="media-head me-2">
                                    <div class="avatar">
                                        <a href="{{ route('user', ['username' => App\Models\Posts::withAnyTag($tag->name)->latest()->first()->user->username]) }}"><img src="{{ my_asset('uploads/users/'.App\Models\Posts::withAnyTag($tag->name)->latest()->first()->user->image) }}" alt="user" class="avatar-img rounded-circle"></a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6><a href="{{ route('home.post', ['post_id' => App\Models\Posts::withAnyTag($tag->name)->latest()->first()->post_id, 'slug' => App\Models\Posts::withAnyTag($tag->name)->latest()->first()->slug]) }}">
                                        {{ App\Models\Posts::withAnyTag($tag->name)->latest()->first()->title }}</a>
                                    </h6>
                                    <span><a href="{{ route('user', ['username' => App\Models\Posts::withAnyTag($tag->name)->latest()->first()->user->username]) }}">
                                        <span class="small">{{ App\Models\Posts::withAnyTag($tag->name)->latest()->first()->user->name }},</span>
                                        </a><span class="ms-1 small">{{ App\Models\Posts::withAnyTag($tag->name)->latest()->first()->created_at->diffForHumans() }}</span> </span>
                                </div>
                            </div>
                        </div>
                    </div><!--/card-->
                </div>

            @else
              <p class="text-center">{{ trans('no_posts_available') }}</p>
            @endif

        </div><!--/tag-box-->
    </div><!--/col-lg-6-->

@empty

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body">
            <div class="upload-image my-3">
                <h4 class="mb-3">{{ trans('no_tags_available') }}.</h4>
            </div>
        </div>
    </div><!--/dashboard-card-->

@endforelse



@if ($tags->hasPages())
<div class="d-flex justify-content-center">
   {!! $tags->appends(request()->all())->links('layouts.pagination.custom') !!}
</div>
@endif
