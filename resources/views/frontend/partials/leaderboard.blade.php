
@forelse ($users as $user)



 <div class="col-lg-6" data-aos="fade-up" data-aos-easing="linear">
    <div class="tf-author-box mb-4">
        <div class="author-avatar">
            <a href="{{ route('user', ['username' => $user->user_username]) }}">
                <img src="{{ my_asset('uploads/users/'.$user->user_image) }}" alt="User">
            </a>
        </div>
        <div class="author-infor">
            <h5><a href="{{ route('user', ['username' => $user->user_username]) }}">{{ $user->user_name }}</a>
                @if($user->user_verified == 1)
                    <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                    <i class="bi bi-patch-check"></i>
                    </span>
                @endif
            </h5>
            <h6 class="gem"><i class="bi bi-file-ppt me-1"></i>{{ $user->sum_score }} {{ trans('points') }}
                @foreach ($week as $w)
                    @if ($w->user_id == $user->user_id)
                        @if ($w->sum_score_week != '')
                        <span class="tf-color ms-2">(<i class="bi bi-capslock"></i>{{ $w->sum_score_week }} {{ trans('this_week') }})</span>
                        @endif
                    @endif
                @endforeach
            </h6>

        </div>

        @foreach ($total_users as $key => $rank)
            @if ($rank->user_id == $user->user_id)
            <div class="order
                @if ($key == '0' || $key == '1' || $key == '2') tf-color @endif
            ">{{'#'.($key+1) }}</div>
            @endif
        @endforeach
    </div>
  </div>

@empty

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body">
            <div class="upload-image my-3">
                <h4 class="mb-3">{{ trans('no_users_available') }}.</h4>
            </div>

        </div>
    </div><!--/dashboard-card-->

@endforelse

@if ($users->hasPages())
    <div class="d-flex justify-content-center">
        {!! $users->appends(request()->all())->links('layouts.pagination.custom') !!}
    </div>
@endif
