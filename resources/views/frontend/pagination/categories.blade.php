

@forelse($categories as $category)

<div class="category-box" data-aos="fade-up" data-aos-easing="linear">
   <div class="category-info">
       <img src="{{ my_asset('uploads/categories/'.$category->image) }}" class="img-fluid cat" alt="Image">
       <div class="category-content">
           <h3><a href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->name }}
        @if ($category->pro == 1) <span class="badge bg-cat ms-1">{{ trans('pro') }}</span> @endif
    </a></h3>
           <p>{{ Str::limit($category->description, 80) }}</p>
           <div class="category-users mt-3">
               <span>{{ trans('user_interactions') }}</span>
               <ul>
                   @foreach ($category->top_users() as $post)
                       <li>
                           <a href="{{ route('user', ['username' => $post->user->username]) }}">
                               <img src="{{ my_asset('uploads/users/'.$post->user->image) }}" class="img-fluid" alt="image">
                           </a>
                       </li>
                   @endforeach
                   <li class="plus-sign"><a href="{{ route('user.posts.add') }}">+</a></li>
               </ul>
           </div>
       </div>
   </div>
   <div class="category-stats">
       <div class="category-top d-flex justify-content-between">
           <div class="category-topics">
               <span>{{ trans('posts') }}</span>
               <h4>{{ $category->posts()->count() }}</h4>
           </div>
           <div class="category-activity">
               <span>{{ trans('last_activity') }}</span>
               @if ($category->latest_post() != null)
                   <h4>{{ $category->latest_post()->created_at->diffForHumans() }}</h4>
               @else
                   <h4>{{ trans('no_activity_yet') }}</h4>
               @endif
           </div>
       </div>
       <div class="category-bottom">
           <span>{{ trans('latest_post') }}</span>
       @if ($category->latest_post() != null)
           <div class="d-flex mt-2">
               <a href="{{ route('user', ['username' => $category->latest_post()->user->username]) }}"><img src="{{ my_asset('uploads/users/'.$category->latest_post()->user->image) }}" alt="User"></a>
               <div>
               <h6><a href="{{ route('home.post', ['post_id'=> $category->latest_post()->post_id, 'slug' => $category->latest_post()->slug]) }}" class="d-block">{{ $category->latest_post()->title }}</a></h6>
               <span class="d-block text-muted small">{{ $category->latest_post()->user->name }}</span>
               </div>
           </div>
       @else
           <h4>{{ trans('no_activity_yet') }}</h4>
       @endif
       </div>
   </div>
</div><!--/category-box-->

@empty

<div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
   <div class="dashboard-body">
       <div class="upload-image my-3">
           <h4 class="mb-3">{{ trans('no_categories_available') }}.</h4>
       </div>

   </div>
</div><!--/dashboard-card-->

@endforelse


@if ($categories->hasPages())
<div class="d-flex justify-content-center">
   {!! $categories->appends(request()->all())->links('layouts.pagination.custom') !!}
</div>
@endif
