@extends('layouts.front')

@section('styles')

<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/ui/trumbowyg.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/giphy/ui/trumbowyg.giphy.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/prism/prism.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/highlight/ui/trumbowyg.highlight.min.css') }}">

@endsection

@section('content')

    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('home') }}"><span class="bi bi-house me-1"></span>{{ trans('home') }}</a></li>
                        <li><a href="{{ route('home.posts') }}">{{ trans('posts') }}</a></li>
                        <li>{{ $post->title }}</li>
                    </ul>
                    <h3 class="mb-2">{{ $post->title }}</h3>
                </div>
            </div>
        </div>
        @if(Auth::check())
            @if (get_setting('ads') == 1)
                @if (Auth::user()->subscription()->ads == 0)
                    <div class="ad-spot text-center">
                        <div class="ad-box">
                            {!! get_setting('top_ad') !!}
                        </div>
                    </div>
                @endif
            @endif
        @else
            @if (get_setting('ads') == 1)
                <div class="ad-spot text-center">
                    <div class="ad-box">
                        {!! get_setting('top_ad') !!}
                    </div>
                </div>
            @endif
        @endif

    </div><!--/vine-header-->


@if ($post->category->pro === 1)
    @if (Auth::check())
        @if (Auth::user()->subscription()->categories === 1)

            <div class="post-box card d-flex mx-0" data-aos="fade-up" data-aos-easing="linear">

                @if ($post->solved == '1' && $post->closed == '1')
                <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('solved') }} & <i class="bi bi-lock"></i> {{ trans('closed') }}</div>
                @elseif ($post->solved == '1' && $post->closed == '0')
                <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('solved') }} </div>
                @elseif ($post->solved == '0' && $post->closed == '1')
                <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('closed') }} </div>
                @endif

                <div class="card-header card-header-action">
                    <div class="media align-items-center">
                        <div class="media-head me-2">
                            <div class="avatar custom-tooltip">
                                <a href="{{ route('user', ['username' => $post->user->username]) }}">
                                    <img src="{{ my_asset('uploads/users/'.$post->user->image) }}" alt="user" class="avatar-img rounded-circle">
                                    @if(Cache::has('user-is-online-' . $post->user->id))
                                        <span class="user_online"></span>
                                    @endif
                                </a>

                                <div class="custom-tooltip-dropdown">
                                    <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                        <div class="flex-shrink-0 avatar"><img src="{{ my_asset('uploads/users/'.$post->user->image) }}" class="rounded-circle" alt="avatar"></div>
                                        <div class="ms-2">
                                            <span class="author-username">{{ $post->user->total_points() }} {{ trans('points') }}</span>
                                            <span class="author-follow-text">{{ $post->user->followers->count() }} {{ trans('followers') }}</span>
                                        </div>
                                    </div>
                                    <h6 class="author-name mb-1">{{ $post->user->name }}</h6>
                                    <p class="author-desc smaller mb-3">{{ Str::limit($post->user->bio, 80) }}</p>
                                    <div class="follow-wrap mb-3">
                                        <h6 class="mb-1 smaller text-uppercase">{{ trans('followed_by') }}</h6>
                                        <div class="avatar-group">
                                            @foreach($post->user->followers()->with('followers')->limit(5)->get() as $follower)
                                            <a href="{{ route('user', ['username' => $follower->username]) }}" class="avatar-group-avatar">
                                                <img src="{{ my_asset('uploads/users/'.$follower->image) }}" alt="avatar">
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>

                                    <a href="{{ route('user', ['username' => $post->user->username]) }}" class="btn btn-sm btn-mint rounded-pill"><span>{{ trans('view') }} {{ trans('profile') }}</span></a>
                                </div>

                            </div>
                        </div>
                        <div class="media-body">
                            <div>
                                <a href="{{ route('user', ['username' => $post->user->username]) }}">{{ $post->user->name }}</a>
                                @if($post->user->verified == 1)
                                    <span class="verified-badge" data-bs-toggle="tooltip" aria-label="{{ trans('verified_user') }}" data-bs-original-title="{{ trans('verified_user') }}">
                                        <i class="bi bi-patch-check"></i>
                                    </span>
                                @endif
                            </div>
                            <div class="fs-7"><span>{{ $post->created_at->diffForHumans() }} {{ trans('in') }} </span> <a href="{{ route('category', ['slug' => $post->category->slug]) }}" class="cat">{{ $post->category->name }}</a></div>
                        </div>
                    </div>
                    <div class="card-action-wrap">
                        @if ($post->pinned == '1')
                            <p class="me-2 text-danger d-flex"><i class="bi bi-pin"></i> <span class="d-none d-sm-block">{{ trans('pinned') }}</span></p>
                        @endif
                        @if (Auth::check())
                            @if (Auth::user()->id === $post->user->id)
                                <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">

                                    @if ($post->pinned == '0')
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="pin('{{ route('user.posts.pin') }}','{{ $post->id }}');"><i class="bi bi-pin me-2"></i> {{ trans('pin') }}</a>
                                    @elseif ($post->pinned == '1')
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="pin('{{ route('user.posts.unpin') }}','{{ $post->id }}');"><i class="bi bi-pin me-2"></i> {{ trans('unpin') }}</a>
                                    @endif
                                    @if ($post->closed == '1')
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="open_post({{ $post->id }})"><i class="bi bi-unlock me-2"></i> {{ trans('open') }} {{ trans('post') }}</a>
                                    @elseif ($post->closed == '0')
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="close_post({{ $post->id }})"><i class="bi bi-lock me-2"></i> {{ trans('close') }} {{ trans('post') }}</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('user.posts.edit', ['id' => $post->id]) }}"><i class="bi bi-pencil me-2"></i> {{ trans('edit') }} {{ trans('post') }}</a>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('{{ route('user.posts.destroy') }}','{{ $post->id }}','{{ trans('delete_this_post') }}');"><i class="bi bi-trash3 me-2"></i> {{ trans('delete') }} {{ trans('post') }}</a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="content content-large">
                        {!! $post->body !!}
                    </div>

                    <div class="tags my-4">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('tag', ['slug' => $tag->slug]) }}" class="tag-link">{{ $tag->name }}</a>
                        @endforeach
                    </div>

                    @if ($post->likes == '1')
                        @if (get_setting('react_like') == 'React')
                                @php $reactionSummary = $post->reaction_summary->toArray(); @endphp
                                @php if (array_key_exists('like', $reactionSummary) || array_key_exists('love', $reactionSummary) || array_key_exists('haha', $reactionSummary)
                                || array_key_exists('wow', $reactionSummary) || array_key_exists('yay', $reactionSummary) || array_key_exists('sad', $reactionSummary)
                            || array_key_exists('mad', $reactionSummary)) {  @endphp
                                    <ul class="reaction-list">
                                        @php if (array_key_exists('like', $reactionSummary)) {  @endphp
                                        <li class="reaction-box">
                                            <img src="{{ my_asset('uploads/reactions/like.png') }}">
                                            <p>@php echo $likesCount = $reactionSummary['like']; @endphp</p>
                                        </li>
                                        @php } @endphp
                                        @php if (array_key_exists('love', $reactionSummary)) {  @endphp
                                        <li class="reaction-box">
                                            <img src="{{ my_asset('uploads/reactions/love.png') }}">
                                            <p>@php echo $lovesCount = $reactionSummary['love']; @endphp</p>
                                        </li>
                                        @php } @endphp
                                        @php if (array_key_exists('haha', $reactionSummary)) {  @endphp
                                        <li class="reaction-box">
                                            <img src="{{ my_asset('uploads/reactions/haha.png') }}">
                                            <p>@php echo $hahasCount = $reactionSummary['haha']; @endphp</p>
                                        </li>
                                        @php } @endphp
                                        @php if (array_key_exists('wow', $reactionSummary)) {  @endphp
                                        <li class="reaction-box">
                                            <img src="{{ my_asset('uploads/reactions/wow.png') }}">
                                            <p>@php echo $wowsCount = $reactionSummary['wow']; @endphp</p>
                                        </li>
                                        @php } @endphp
                                        @php if (array_key_exists('yay', $reactionSummary)) {  @endphp
                                        <li class="reaction-box">
                                            <img src="{{ my_asset('uploads/reactions/yay.png') }}">
                                            <p>@php echo $yaysCount = $reactionSummary['yay']; @endphp</p>
                                        </li>
                                        @php } @endphp
                                        @php if (array_key_exists('sad', $reactionSummary)) {  @endphp
                                        <li class="reaction-box">
                                            <img src="{{ my_asset('uploads/reactions/sad.png') }}">
                                            <p>@php echo $sadsCount = $reactionSummary['sad']; @endphp</p>
                                        </li>
                                        @php } @endphp
                                        @php if (array_key_exists('mad', $reactionSummary)) {  @endphp
                                        <li class="reaction-box">
                                            <img src="{{ my_asset('uploads/reactions/mad.png') }}">
                                            <p>@php echo $madsCount = $reactionSummary['mad']; @endphp</p>
                                        </li>
                                        @php } @endphp
                                    </ul>
                                @php } @endphp
                        @endif
                    @endif

                </div>

                <div class="card-footer">

                    <div class="qa-stats">
                        @if ($post->likes == '1')
                            @if (get_setting('react_like') == 'React')
                                <div class="qa-item post-share react-sec">
                                    <a href="javascript:void(0);" class="qa-link">
                                        @if (Auth::check() && $post->is_reacted)
                                        @php $user_react = json_decode($post->reacted(),true); @endphp

                                        @php if ($user_react['type'] == 'like') { @endphp
                                            <div class="qa-icon shown" id="react-icon-like-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/like.png') }}" class="avatar avatar-small"></div>
                                        @php }else{ @endphp
                                            <div class="qa-icon hiden" id="react-icon-like-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/like.png') }}" class="avatar avatar-small"></div>
                                        @php  } @endphp
                                        @php if ($user_react['type'] == 'love') { @endphp
                                            <div class="qa-icon shown" id="react-icon-love-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/love.png') }}" class="avatar avatar-small"></div>
                                        @php }else{ @endphp
                                            <div class="qa-icon hiden" id="react-icon-love-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/love.png') }}" class="avatar avatar-small"></div>
                                        @php  } @endphp
                                        @php if ($user_react['type'] == 'haha') { @endphp
                                            <div class="qa-icon shown" id="react-icon-haha-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/haha.png') }}" class="avatar avatar-small"></div>
                                        @php }else{ @endphp
                                            <div class="qa-icon hiden" id="react-icon-haha-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/haha.png') }}" class="avatar avatar-small"></div>
                                        @php  } @endphp
                                        @php if ($user_react['type'] == 'wow') { @endphp
                                            <div class="qa-icon shown" id="react-icon-wow-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/wow.png') }}" class="avatar avatar-small"></div>
                                        @php }else{ @endphp
                                            <div class="qa-icon hiden" id="react-icon-wow-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/wow.png') }}" class="avatar avatar-small"></div>
                                        @php  } @endphp
                                        @php if ($user_react['type'] == 'yay') { @endphp
                                            <div class="qa-icon shown" id="react-icon-yay-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/yay.png') }}" class="avatar avatar-small"></div>
                                        @php }else{ @endphp
                                            <div class="qa-icon hiden" id="react-icon-yay-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/yay.png') }}" class="avatar avatar-small"></div>
                                        @php  } @endphp
                                        @php if ($user_react['type'] == 'sad') { @endphp
                                            <div class="qa-icon shown" id="react-icon-sad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/sad.png') }}" class="avatar avatar-small"></div>
                                        @php }else{ @endphp
                                            <div class="qa-icon hiden" id="react-icon-sad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/sad.png') }}" class="avatar avatar-small"></div>
                                        @php  } @endphp
                                        @php if ($user_react['type'] == 'mad') { @endphp
                                            <div class="qa-icon shown" id="react-icon-mad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/mad.png') }}" class="avatar avatar-small"></div>
                                        @php }else{ @endphp
                                            <div class="qa-icon hiden" id="react-icon-mad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/mad.png') }}" class="avatar avatar-small"></div>
                                        @php  } @endphp
                                    @else
                                        <div class="qa-icon hiden" id="react-icon-like-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/like.png') }}" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-love-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/love.png') }}" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-haha-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/haha.png') }}" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-wow-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/wow.png') }}" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-yay-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/yay.png') }}" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-sad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/sad.png') }}" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-mad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/mad.png') }}" class="avatar avatar-small"></div>
                                    @endif
                                        <div class="qa-text">{{ trans('react') }}</div>
                                        <div class="qa-text me-2">({{ $post->total_reactions()->count() }})</div>
                                    </a>
                                    <ul class="share-list">
                                        <li><a class="reaction-1" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'like')" data-bs-toggle="tooltip" aria-label="like" data-bs-original-title="like">
                                            <img src="{{ my_asset('uploads/reactions/like.png') }}"></a>
                                        </li>
                                        <li><a class="reaction-2" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'love')" data-bs-toggle="tooltip" aria-label="love" data-bs-original-title="love">
                                            <img src="{{ my_asset('uploads/reactions/love.png') }}"></a>
                                        </li>
                                        <li><a class="reaction-3" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'haha')" data-bs-toggle="tooltip" aria-label="haha" data-bs-original-title="haha">
                                            <img src="{{ my_asset('uploads/reactions/haha.png') }}"></a>
                                        </li>
                                        <li><a class="reaction-4" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'wow')" data-bs-toggle="tooltip" aria-label="wow" data-bs-original-title="wow">
                                            <img src="{{ my_asset('uploads/reactions/wow.png') }}"></a>
                                        </li>
                                        <li><a class="reaction-5" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'yay')" data-bs-toggle="tooltip" aria-label="yay" data-bs-original-title="yay">
                                            <img src="{{ my_asset('uploads/reactions/yay.png') }}"></a>
                                        </li>
                                        <li><a class="reaction-6" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'sad')" data-bs-toggle="tooltip" aria-label="sad" data-bs-original-title="sad">
                                            <img src="{{ my_asset('uploads/reactions/sad.png') }}"></a>
                                        </li>
                                        <li><a class="reaction-7" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'mad')" data-bs-toggle="tooltip" aria-label="mad" data-bs-original-title="mad">
                                            <img src="{{ my_asset('uploads/reactions/mad.png') }}"></a>
                                        </li>
                                    </ul>

                                    @if ($post->user_reactions()->count() > 0)
                                        <ul>
                                            @foreach ($post->user_reactions() as $view)
                                                <li><a href="{{ route('user', ['username' => $view->user->username]) }}"><img src="{{ my_asset('uploads/users/'.$view->user->image) }}" alt="User"></a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @elseif (get_setting('react_like') == 'Like')
                                <div class="qa-item">
                                    <a href="javascript:void(0);" onclick="likePost({{ $post->id }})" class="qa-link">
                                        <div class="qa-icon"><i id="like-icon-{{ $post->id }}" class="bi bi-heart-fill @if(Auth::check()) @if(Auth::user()->hasLiked($post)) text-danger @else text-muted @endif @else text-muted @endif"></i></div>
                                        <div class="qa-text" id="like-{{ $post->id }}">@json($post->likers()->count())</div>
                                    </a>
                                    <div class="qa-text me-2">{{ trans('likes') }}</div>
                                    @if ($post->user_likes()->count() > 0)
                                        <ul>
                                            @foreach ($post->user_likes() as $view)
                                                <li><a href="{{ route('user', ['username' => $view->user->username]) }}"><img src="{{ my_asset('uploads/users/'.$view->user->image) }}" alt="User"></a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endif
                        @endif
                        <div class="qa-item">
                            <div class="qa-icon"><i class="bi bi-eye"></i></div>
                            <div class="qa-text">{{ $post->views()->count() }}</div>
                            <div class="qa-text">{{ trans('views') }}</div>
                        </div>
                    @if ($post->comments == '1')
                        <div class="qa-item" id="qa-comments">
                            <a href="#comments" class="qa-link">
                                <div class="qa-icon"><i class="bi bi-chat-dots"></i></div>
                                <div class="qa-text">{{ $post->comments()->count() }}</div>
                                <div class="qa-text">{{ trans('comments') }}</div>
                            </a>
                        </div>
                    @endif
                        <div class="qa-item">
                        <a href="javascript:void(0);" onclick="savePost({{ $post->id }})" class="qa-link">
                            <div class="qa-icon"><i id="save-icon-{{ $post->id }}" class="bi bi-bookmark-fill @if(Auth::check()) @if(Auth::user()->hasFavorited($post)) text-danger @else text-muted @endif @else text-muted @endif"></i></div>
                            <div class="qa-text" id="save-{{ $post->id }}">@json($post->favoriters()->count())</div>
                        </a>
                        </div>
                        <div class="qa-item">
                        <a href="javascript:void(0)" onclick="report('{{ route('report.post') }}','{{ $post->id }}','Report this Post');" class="qa-link">
                            <div class="qa-icon"><i class="bi bi-flag"></i></div>
                            <div class="qa-text">{{ trans('report') }}</div>
                        </a>
                        </div>
                        <div class="qa-item post-share">
                            <a href="javascript:void(0);" class="qa-link">
                            <div class="qa-icon"><i class="bi bi-share"></i></div>
                            <div class="qa-text">{{ $post->shares()->count() }}</div>
                            <div class="qa-text">{{ trans('shares') }}</div>
                            </a>
                            <ul class="share-list">
                                <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','Facebook');" href="https://www.facebook.com/sharer/sharer.php?u={{ url('post/'.$post->post_id.'/'.$post->slug) }}&t={{ $post->title }}" target="_blank" class="color-fb"><i class="bi bi-facebook"></i></a></li>
                                <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','Twitter');" href="https://twitter.com/share?url={{ url('post/'.$post->post_id.'/'.$post->slug) }}&text={{ $post->title }}" target="_blank" class="color-twitter"><i class="bi bi-twitter"></i></a></li>
                                <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','Whatsapp');" href="https://wa.me/?text={{ $post->title }}%20{{ url('post/'.$post->post_id.'/'.$post->slug) }}" data-action="share/whatsapp/share" target="_blank" class="color-whatsapp"><i class="bi bi-whatsapp"></i></a></li>
                                <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','Reddit');" href="https://www.reddit.com/submit?url={{ url('post/'.$post->post_id.'/'.$post->slug) }}&title={{ $post->title }}" target="_blank" class="color-reddit"><i class="bi bi-reddit"></i></a></li>
                                <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','LinkedIn');" href="https://www.linkedin.com/shareArticle?mini=true&url={{ url('post/'.$post->post_id.'/'.$post->slug) }}&title={{ $post->title }}" target="_blank" class="color-linkedin"><i class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div><!--/post-box-->

            @if ($post->comments == '1')

            @if ($post->closed == '0')
                <div class="comment-form" data-aos="fade-up" data-aos-easing="linear">
                    <h3 class="comment-form-title">{{ trans('leave_a_comment') }}</h3>
                    <form id="add_comment_form" method="POST">
                        @csrf

                        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="recipient_id" id="recipient_id" value="{{ $post->user->id }}">

                    <div class="row">
                        <div class="col-lg-12 d-flex mb-4">
                            <div class="comment-form-avatar d-none d-sm-block">
                                <img src="{{ Auth::check() == null ? my_asset('uploads/users/avatar.jpg') : my_asset('uploads/users/'.Auth::user()->image) }}" alt="User">
                            </div>
                            <div class="comment-input">

                                <p class="small mb-3">* {{ trans('here_is_a_list_of_sites_you_can_embed_video_from') }} <a href="https://noembed.com/#supported-sites" target="_blank">{{ trans('list_of_sites') }}</a> </p>

                                <div class="form-group">
                                    <textarea name="bodyComment" id="bodyComment" rows="5"></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="comment-btn mt-3">
                                    <button type="submit" class="btn btn-mint" id="add_comment_btn">{{ trans('post') }} {{ trans('comment') }}</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            @endif

                <div class="scrollspy-example-2" data-bs-spy="scroll" data-bs-target="qa-comments" data-bs-smooth-scroll="true">
                <div id="comments">
                    @if ($post->comments()->count() > 0 && $post->closed == '1' || $post->comments()->count() > 0 && $post->closed == '0')
                        <h3 class="my-5" data-aos="fade-up" data-aos-easing="linear">{{ trans('comments') }}</h3>
                    @elseif ($post->comments()->count() == 0 && $post->closed == '1')
                    @elseif ($post->comments()->count() == 0 && $post->closed == '0')
                        <h3 class="my-5" data-aos="fade-up" data-aos-easing="linear">{{ trans('comments') }}</h3>
                    @endif

                    @if ($post->comments()->count() > 0)

                        @foreach ($post->comments() as $comment)

                            <div class="post-box card d-flex mx-0 {{ $comment->solution == '1' ? 'solved' : '' }}" data-aos="fade-up" data-aos-easing="linear">

                                @if ($comment->solution == '1')
                                <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('solution') }}</div>
                                @endif


                                <div class="card-header card-header-action">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar custom-tooltip">
                                                <a href="{{ route('user', ['username' => $comment->user->username]) }}">
                                                    <img src="{{ my_asset('uploads/users/'.$comment->user->image) }}" alt="user" class="avatar-img rounded-circle">
                                                    @if(Cache::has('user-is-online-' . $comment->user->id))
                                                        <span class="user_online"></span>
                                                    @endif
                                                </a>

                                                <div class="custom-tooltip-dropdown">
                                                    <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                                        <div class="flex-shrink-0 avatar"><img src="{{ my_asset('uploads/users/'.$comment->user->image) }}" class="rounded-circle" alt="avatar"></div>
                                                        <div class="ms-2">
                                                            <span class="author-username">{{ $comment->user->total_points() }} {{ trans('points') }}</span>
                                                            <span class="author-follow-text">{{ $comment->user->followers->count() }} {{ trans('followers') }}</span>
                                                        </div>
                                                    </div>
                                                    <h6 class="author-name mb-1">{{ $comment->user->name }}</h6>
                                                    <p class="author-desc smaller mb-3">{{ Str::limit($comment->user->bio, 80) }}</p>
                                                    <div class="follow-wrap mb-3">
                                                        <h6 class="mb-1 smaller text-uppercase">{{ trans('followed_by') }}</h6>
                                                        <div class="avatar-group">
                                                            @foreach($comment->user->followers()->with('followers')->limit(5)->get() as $follower)
                                                            <a href="{{ route('user', ['username' => $follower->username]) }}" class="avatar-group-avatar">
                                                                <img src="{{ my_asset('uploads/users/'.$follower->image) }}" alt="avatar">
                                                            </a>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('user', ['username' => $comment->user->username]) }}" class="btn btn-sm btn-mint rounded-pill"><span>{{ trans('view') }} {{ trans('profile') }}</span></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div><a href="{{ route('user', ['username' => $comment->user->username]) }}">{{ $comment->user->name }}</a>
                                                @if($comment->user->verified == 1)
                                                    <span class="verified-badge" data-bs-toggle="tooltip" aria-label="{{ trans('verified_user') }}" data-bs-original-title="{{ trans('verified_user') }}">
                                                        <i class="bi bi-patch-check"></i>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="fs-7"><span>{{'@'.$comment->user->username }} </span></div>
                                        </div>
                                    </div>
                                    @if (Auth::check())
                                    @if (Auth::user()->id === $comment->user->id)
                                        <div class="card-action-wrap">
                                            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('user.comments.edit', ['id' => $comment->id]) }}"><i class="bi bi-pencil me-2"></i> {{ trans('edit') }} {{ trans('comment') }}</a>
                                                <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('{{ route('user.comments.destroy') }}','{{ $comment->id }}','{{ trans('delete_this_comment') }}');"><i class="bi bi-trash3 me-2"></i> {{ trans('delete') }} {{ trans('comment') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="content content-large">
                                        {!! $comment->body !!}
                                    </div>

                                    <div class="comment-meta">
                                        <span class="publish-date ms-3"> {{ $comment->created_at->diffForHumans() }}</span>

                                        <a  href="javascript:void(0);" id="{{ $comment->id }}" class="likeComment">
                                            <span id="like-comment-icon-{{ $comment->id }}" class="bi bi-heart-fill @if(Auth::check()) @if(Auth::user()->hasLiked($comment)) text-danger @else text-muted @endif @else text-muted @endif"></span>
                                            <span class="ms-1" id="like-comment-{{ $comment->id }}">@json($comment->likers()->count())</span> {{ trans('likes') }}
                                        </a>

                                        @if ($post->closed == '0')
                                            <a href="javascript:void(0)" class="reply ms-3" onclick="show_reply_form('{{ $comment->id }}');"><span class="bi bi-reply-all me-1"></span> {{ trans('reply') }}</a>
                                        @endif

                                        <a href="javascript:void(0)" onclick="report('{{ route('report.comment') }}','{{ $comment->id }}','{{ trans('report_this_comment') }}');" class="reply ms-3">
                                            <i class="bi bi-flag me-1"></i> {{ trans('report') }}
                                        </a>
                                        @if (Auth::check())
                                        @if(Auth::user()->id === $comment->post->user->id)
                                            @if ($comment->solution == '1')
                                                <a href="javascript:void(0)" onclick="mark('{{ route('user.comments.unmark') }}','{{ $comment->id }}','{{ $comment->post->id }}');" class="reply ms-3">
                                                    <i class="bi bi-check2-all me-1"></i> {{ trans('unmark_as_solution') }}
                                                </a>
                                            @elseif ($comment->solution == '0')
                                                <a href="javascript:void(0)" onclick="mark('{{ route('user.comments.mark') }}','{{ $comment->id }}','{{ $comment->post->id }}');" class="reply ms-3">
                                                    <i class="bi bi-check2-all me-1"></i> {{ trans('mark_as_solution') }}
                                                </a>
                                            @endif
                                        @endif
                                        @endif
                                    </div>

                                </div>

                                <div class="post-box-children ms-5">

                                    <div class="comment-form reply-form" id="reply-form-{{ $comment->id }}">
                                        <form id="add_reply_form" method="POST">
                                            @csrf

                                            <input type="hidden" name="comment_id" id="comment_id" value="{{ $comment->id }}">
                                            <input type="hidden" name="post_id" id="post_id" value="{{ $comment->post->id }}">
                                            <input type="hidden" name="recipient_id" id="recipient_id" value="{{ $comment->user->id }}">

                                        <div class="row">
                                            <div class="col-lg-12 d-flex mb-4">
                                                <div class="comment-form-avatar d-none d-sm-block">
                                                    <img src="{{ Auth::check() == null ? my_asset('uploads/users/avatar.jpg') : my_asset('uploads/users/'.Auth::user()->image) }}" alt="User">
                                                </div>
                                                <div class="comment-input">

                                                    <p class="small mb-3">* {{ trans('here_is_a_list_of_sites_you_can_embed_video_from') }} <a href="https://noembed.com/#supported-sites" target="_blank">{{ trans('list_of_sites') }}</a> </p>

                                                    <div class="form-group">
                                                        <textarea name="bodyReply" id="bodyReply" rows="5" placeholder="Post your reply ..."></textarea>
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="comment-btn mt-3">
                                                        <button type="submit" class="btn btn-mint" id="add_reply_btn">{{ trans('post') }} {{ trans('reply') }}</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                    @foreach ($comment->replies as $reply)

                                        <div class="post-box card d-flex mx-0 {{ $reply->solution == '1' ? 'solved' : 'border-top' }}">

                                            @if ($reply->solution == '1')
                                            <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('solution') }}</div>
                                            @endif


                                            <div class="card-header card-header-action">
                                                <div class="media align-items-center">
                                                    <div class="media-head me-2">
                                                        <div class="avatar custom-tooltip">
                                                            <a href="{{ route('user', ['username' => $reply->user->username]) }}">
                                                                <img src="{{ my_asset('uploads/users/'.$reply->user->image) }}" alt="user" class="avatar-img rounded-circle">
                                                                @if(Cache::has('user-is-online-' . $reply->user->id))
                                                                    <span class="user_online"></span>
                                                                @endif
                                                            </a>

                                                            <div class="custom-tooltip-dropdown">
                                                                <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                                                    <div class="flex-shrink-0 avatar"><img src="{{ my_asset('uploads/users/'.$reply->user->image) }}" class="rounded-circle" alt="avatar"></div>
                                                                    <div class="ms-2">
                                                                        <span class="author-username">{{ $reply->user->total_points() }} {{ trans('points') }}</span>
                                                                        <span class="author-follow-text">{{ $reply->user->followers->count() }} {{ trans('followers') }}</span>
                                                                    </div>
                                                                </div>
                                                                <h6 class="author-name mb-1">{{ $reply->user->name }}</h6>
                                                                <p class="author-desc smaller mb-3">{{ Str::limit($reply->user->bio, 80) }}</p>
                                                                <div class="follow-wrap mb-3">
                                                                    <h6 class="mb-1 smaller text-uppercase">{{ trans('followed_by') }}</h6>
                                                                    <div class="avatar-group">
                                                                        @foreach($reply->user->followers()->with('followers')->limit(5)->get() as $follower)
                                                                        <a href="{{ route('user', ['username' => $follower->username]) }}" class="avatar-group-avatar">
                                                                            <img src="{{ my_asset('uploads/users/'.$follower->image) }}" alt="avatar">
                                                                        </a>
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                                <a href="{{ route('user', ['username' => $reply->user->username]) }}" class="btn btn-sm btn-mint rounded-pill"><span>{{ trans('view') }} {{ trans('profile') }}</span></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div><a href="{{ route('user', ['username' => $reply->user->username]) }}">{{ $reply->user->name }}</a>
                                                            @if($reply->user->verified == 1)
                                                                <span class="verified-badge" data-bs-toggle="tooltip" aria-label="{{ trans('verified_user') }}" data-bs-original-title="{{ trans('verified_user') }}">
                                                                    <i class="bi bi-patch-check"></i>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="fs-7"><span>{{'@'.$reply->user->username }} </span></div>
                                                    </div>
                                                </div>
                                                @if (Auth::check())
                                                @if (Auth::user()->id === $reply->user->id)
                                                    <div class="card-action-wrap">
                                                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="{{ route('user.replies.edit', ['id' => $reply->id]) }}"><i class="bi bi-pencil me-2"></i> {{ trans('edit') }} {{ trans('replyj') }}</a>
                                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('{{ route('user.replies.destroy') }}','{{ $reply->id }}','Delete this Reply');"><i class="bi bi-trash3 me-2"></i> {{ trans('delete') }} {{ trans('reply') }}</a>
                                                        </div>
                                                    </div>
                                                @endif
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <div class="content content-large">
                                                    {!! $reply->body !!}
                                                </div>

                                                <div class="comment-meta">
                                                    <span class="publish-date ms-3"> {{ $reply->created_at->diffForHumans() }}</span>
                                                    <a  href="javascript:void(0);" id="{{ $reply->id }}" class="likeReply">
                                                        <span id="like-reply-icon-{{ $reply->id }}" class="bi bi-heart-fill @if(Auth::check()) @if(Auth::user()->hasLiked($reply)) text-danger @else text-muted @endif @else text-muted @endif"></span>
                                                        <span class="ms-1" id="like-reply-{{ $reply->id }}">@json($reply->likers()->count())</span> {{ trans('likes') }}
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="report('{{ route('report.reply') }}','{{ $reply->id }}','Report this Reply');" class="reply ms-3">
                                                        <i class="bi bi-flag me-1"></i> {{ trans('report') }}
                                                    </a>

                                                    @if (Auth::check())
                                                    @if(Auth::user()->id === $reply->comment->post->user->id || Auth::user()->id === $reply->comment->user_id)
                                                        @if ($reply->solution == '1')
                                                            <a href="javascript:void(0)" onclick="mark('{{ route('user.replies.unmark') }}','{{ $reply->id }}','{{ $reply->comment->post->id }}');" class="reply ms-3">
                                                                <i class="bi bi-check2-all me-1"></i> {{ trans('unmark_as_solution') }}
                                                            </a>
                                                        @elseif ($reply->solution == '0')
                                                            <a href="javascript:void(0)" onclick="mark('{{ route('user.replies.mark') }}','{{ $reply->id }}','{{ $reply->comment->post->id }}');" class="reply ms-3">
                                                                <i class="bi bi-check2-all me-1"></i> {{ trans('mark_as_solution') }}
                                                            </a>
                                                        @endif
                                                    @endif
                                                    @endif

                                                </div>
                                            </div>
                                        </div><!--/post-box-->

                                    @endforeach

                                </div>

                            </div><!--/post-box-->

                        @endforeach

                    @else

                        <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                            <div class="dashboard-body">
                                <div class="upload-image my-3">
                                    <h4 class="mb-3">{{ trans('comments_and_replies_not_posted_yet') }}.</h4>
                                </div>
                            </div>
                        </div><!--/dashboard-card-->

                    @endif

                </div>
                </div><!--/scrollspy-->

            @elseif ($post->comments == '2')

                <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                    <div class="dashboard-body">
                        <div class="upload-image my-3">
                            <h4 class="mb-3">{{ trans('comments_closed_for_this_post') }}.</h4>
                        </div>
                    </div>
                </div><!--/dashboard-card-->

            @endif


        @else

            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                <div class="dashboard-body">
                    <div class="upload-image my-3">
                        <h4 class="mb-3">To access this Post, {{ trans('you_need_to_purchase_a_new_pricing_plan') }}.</h4>
                        <a href="{{ route('plans') }}" class="btn btn-mint btn-md rounded-pill"><i class="bi bi-send me-2"></i>{{ trans('pricing_plans') }}</a>
                    </div>

                </div>
            </div><!--/dashboard-card-->
        @endif
    @else

        <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
            <div class="dashboard-body">
                <div class="upload-image my-3">
                    <h4 class="mb-3">Login to access this Post.</h4>
                    <a href="{{ route('auth.login') }}" class="btn btn-mint btn-md rounded-pill">{{ trans('login') }}</a>
                </div>

            </div>
        </div><!--/dashboard-card-->

    @endif
@else


    <div class="post-box card d-flex mx-0" data-aos="fade-up" data-aos-easing="linear">

        @if ($post->solved == '1' && $post->closed == '1')
        <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('solved') }} & <i class="bi bi-lock"></i> {{ trans('closed') }}</div>
        @elseif ($post->solved == '1' && $post->closed == '0')
        <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('solved') }} </div>
        @elseif ($post->solved == '0' && $post->closed == '1')
        <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('closed') }} </div>
        @endif

        <div class="card-header card-header-action">
            <div class="media align-items-center">
                <div class="media-head me-2">
                    <div class="avatar custom-tooltip">
                        <a href="{{ route('user', ['username' => $post->user->username]) }}">
                            <img src="{{ my_asset('uploads/users/'.$post->user->image) }}" alt="user" class="avatar-img rounded-circle">
                            @if(Cache::has('user-is-online-' . $post->user->id))
                                <span class="user_online"></span>
                            @endif
                        </a>

                        <div class="custom-tooltip-dropdown">
                            <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                <div class="flex-shrink-0 avatar"><img src="{{ my_asset('uploads/users/'.$post->user->image) }}" class="rounded-circle" alt="avatar"></div>
                                <div class="ms-2">
                                    <span class="author-username">{{ $post->user->total_points() }} {{ trans('points') }}</span>
                                    <span class="author-follow-text">{{ $post->user->followers->count() }} {{ trans('followers') }}</span>
                                </div>
                            </div>
                            <h6 class="author-name mb-1">{{ $post->user->name }}</h6>
                            <p class="author-desc smaller mb-3">{{ Str::limit($post->user->bio, 80) }}</p>
                            <div class="follow-wrap mb-3">
                                <h6 class="mb-1 smaller text-uppercase">{{ trans('followed_by') }}</h6>
                                <div class="avatar-group">
                                    @foreach($post->user->followers()->with('followers')->limit(5)->get() as $follower)
                                    <a href="{{ route('user', ['username' => $follower->username]) }}" class="avatar-group-avatar">
                                        <img src="{{ my_asset('uploads/users/'.$follower->image) }}" alt="avatar">
                                    </a>
                                    @endforeach
                                </div>
                            </div>

                            <a href="{{ route('user', ['username' => $post->user->username]) }}" class="btn btn-sm btn-mint rounded-pill"><span>{{ trans('view') }} {{ trans('profile') }}</span></a>
                        </div>

                    </div>
                </div>
                <div class="media-body">
                    <div>
                        <a href="{{ route('user', ['username' => $post->user->username]) }}">{{ $post->user->name }}</a>
                        @if($post->user->verified == 1)
                            <span class="verified-badge" data-bs-toggle="tooltip" aria-label="{{ trans('verified_user') }}" data-bs-original-title="{{ trans('verified_user') }}">
                                <i class="bi bi-patch-check"></i>
                            </span>
                        @endif
                    </div>
                    <div class="fs-7"><span>{{ $post->created_at->diffForHumans() }} {{ trans('in') }} </span> <a href="{{ route('category', ['slug' => $post->category->slug]) }}" class="cat">{{ $post->category->name }}</a></div>
                </div>
            </div>
            <div class="card-action-wrap">
                @if ($post->pinned == '1')
                    <p class="me-2 text-danger d-flex"><i class="bi bi-pin"></i> <span class="d-none d-sm-block">{{ trans('pinned') }}</span></p>
                @endif
                @if (Auth::check())
                    @if (Auth::user()->id === $post->user->id)
                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-end">

                            @if ($post->pinned == '0')
                                <a class="dropdown-item" href="javascript:void(0)" onclick="pin('{{ route('user.posts.pin') }}','{{ $post->id }}');"><i class="bi bi-pin me-2"></i> {{ trans('pin') }}</a>
                            @elseif ($post->pinned == '1')
                                <a class="dropdown-item" href="javascript:void(0)" onclick="pin('{{ route('user.posts.unpin') }}','{{ $post->id }}');"><i class="bi bi-pin me-2"></i> {{ trans('unpin') }}</a>
                            @endif
                            @if ($post->closed == '1')
                                <a class="dropdown-item" href="javascript:void(0)" onclick="open_post({{ $post->id }})"><i class="bi bi-unlock me-2"></i> {{ trans('open') }} {{ trans('post') }}</a>
                            @elseif ($post->closed == '0')
                                <a class="dropdown-item" href="javascript:void(0)" onclick="close_post({{ $post->id }})"><i class="bi bi-lock me-2"></i> {{ trans('close') }} {{ trans('post') }}</a>
                            @endif

                            <a class="dropdown-item" href="{{ route('user.posts.edit', ['id' => $post->id]) }}"><i class="bi bi-pencil me-2"></i> {{ trans('edit') }} {{ trans('post') }}</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('{{ route('user.posts.destroy') }}','{{ $post->id }}','{{ trans('delete_this_post') }}');"><i class="bi bi-trash3 me-2"></i> {{ trans('delete') }} {{ trans('post') }}</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="content content-large">
                {!! $post->body !!}
            </div>

            <div class="tags my-4">
                @foreach ($post->tags as $tag)
                    <a href="{{ route('tag', ['slug' => $tag->slug]) }}" class="tag-link">{{ $tag->name }}</a>
                @endforeach
            </div>

            @if ($post->likes == '1')
                @if (get_setting('react_like') == 'React')
                        @php $reactionSummary = $post->reaction_summary->toArray(); @endphp
                        @php if (array_key_exists('like', $reactionSummary) || array_key_exists('love', $reactionSummary) || array_key_exists('haha', $reactionSummary)
                        || array_key_exists('wow', $reactionSummary) || array_key_exists('yay', $reactionSummary) || array_key_exists('sad', $reactionSummary)
                    || array_key_exists('mad', $reactionSummary)) {  @endphp
                            <ul class="reaction-list">
                                @php if (array_key_exists('like', $reactionSummary)) {  @endphp
                                <li class="reaction-box">
                                    <img src="{{ my_asset('uploads/reactions/like.png') }}">
                                    <p>@php echo $likesCount = $reactionSummary['like']; @endphp</p>
                                </li>
                                @php } @endphp
                                @php if (array_key_exists('love', $reactionSummary)) {  @endphp
                                <li class="reaction-box">
                                    <img src="{{ my_asset('uploads/reactions/love.png') }}">
                                    <p>@php echo $lovesCount = $reactionSummary['love']; @endphp</p>
                                </li>
                                @php } @endphp
                                @php if (array_key_exists('haha', $reactionSummary)) {  @endphp
                                <li class="reaction-box">
                                    <img src="{{ my_asset('uploads/reactions/haha.png') }}">
                                    <p>@php echo $hahasCount = $reactionSummary['haha']; @endphp</p>
                                </li>
                                @php } @endphp
                                @php if (array_key_exists('wow', $reactionSummary)) {  @endphp
                                <li class="reaction-box">
                                    <img src="{{ my_asset('uploads/reactions/wow.png') }}">
                                    <p>@php echo $wowsCount = $reactionSummary['wow']; @endphp</p>
                                </li>
                                @php } @endphp
                                @php if (array_key_exists('yay', $reactionSummary)) {  @endphp
                                <li class="reaction-box">
                                    <img src="{{ my_asset('uploads/reactions/yay.png') }}">
                                    <p>@php echo $yaysCount = $reactionSummary['yay']; @endphp</p>
                                </li>
                                @php } @endphp
                                @php if (array_key_exists('sad', $reactionSummary)) {  @endphp
                                <li class="reaction-box">
                                    <img src="{{ my_asset('uploads/reactions/sad.png') }}">
                                    <p>@php echo $sadsCount = $reactionSummary['sad']; @endphp</p>
                                </li>
                                @php } @endphp
                                @php if (array_key_exists('mad', $reactionSummary)) {  @endphp
                                <li class="reaction-box">
                                    <img src="{{ my_asset('uploads/reactions/mad.png') }}">
                                    <p>@php echo $madsCount = $reactionSummary['mad']; @endphp</p>
                                </li>
                                @php } @endphp
                            </ul>
                        @php } @endphp
                @endif
            @endif

        </div>

        <div class="card-footer">

            <div class="qa-stats">
                @if ($post->likes == '1')
                    @if (get_setting('react_like') == 'React')
                        <div class="qa-item post-share react-sec">
                            <a href="javascript:void(0);" class="qa-link">
                                @if (Auth::check() && $post->is_reacted)
                                @php $user_react = json_decode($post->reacted(),true); @endphp

                                @php if ($user_react['type'] == 'like') { @endphp
                                    <div class="qa-icon shown" id="react-icon-like-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/like.png') }}" class="avatar avatar-small"></div>
                                @php }else{ @endphp
                                    <div class="qa-icon hiden" id="react-icon-like-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/like.png') }}" class="avatar avatar-small"></div>
                                @php  } @endphp
                                @php if ($user_react['type'] == 'love') { @endphp
                                    <div class="qa-icon shown" id="react-icon-love-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/love.png') }}" class="avatar avatar-small"></div>
                                @php }else{ @endphp
                                    <div class="qa-icon hiden" id="react-icon-love-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/love.png') }}" class="avatar avatar-small"></div>
                                @php  } @endphp
                                @php if ($user_react['type'] == 'haha') { @endphp
                                    <div class="qa-icon shown" id="react-icon-haha-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/haha.png') }}" class="avatar avatar-small"></div>
                                @php }else{ @endphp
                                    <div class="qa-icon hiden" id="react-icon-haha-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/haha.png') }}" class="avatar avatar-small"></div>
                                @php  } @endphp
                                @php if ($user_react['type'] == 'wow') { @endphp
                                    <div class="qa-icon shown" id="react-icon-wow-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/wow.png') }}" class="avatar avatar-small"></div>
                                @php }else{ @endphp
                                    <div class="qa-icon hiden" id="react-icon-wow-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/wow.png') }}" class="avatar avatar-small"></div>
                                @php  } @endphp
                                @php if ($user_react['type'] == 'yay') { @endphp
                                    <div class="qa-icon shown" id="react-icon-yay-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/yay.png') }}" class="avatar avatar-small"></div>
                                @php }else{ @endphp
                                    <div class="qa-icon hiden" id="react-icon-yay-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/yay.png') }}" class="avatar avatar-small"></div>
                                @php  } @endphp
                                @php if ($user_react['type'] == 'sad') { @endphp
                                    <div class="qa-icon shown" id="react-icon-sad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/sad.png') }}" class="avatar avatar-small"></div>
                                @php }else{ @endphp
                                    <div class="qa-icon hiden" id="react-icon-sad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/sad.png') }}" class="avatar avatar-small"></div>
                                @php  } @endphp
                                @php if ($user_react['type'] == 'mad') { @endphp
                                    <div class="qa-icon shown" id="react-icon-mad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/mad.png') }}" class="avatar avatar-small"></div>
                                @php }else{ @endphp
                                    <div class="qa-icon hiden" id="react-icon-mad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/mad.png') }}" class="avatar avatar-small"></div>
                                @php  } @endphp
                            @else
                                <div class="qa-icon hiden" id="react-icon-like-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/like.png') }}" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-love-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/love.png') }}" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-haha-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/haha.png') }}" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-wow-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/wow.png') }}" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-yay-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/yay.png') }}" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-sad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/sad.png') }}" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-mad-{{ $post->id }}"><img src="{{ my_asset('uploads/reactions/mad.png') }}" class="avatar avatar-small"></div>
                            @endif
                                <div class="qa-text">{{ trans('react') }}</div>
                                <div class="qa-text me-2">({{ $post->total_reactions()->count() }})</div>
                            </a>
                            <ul class="share-list">
                                <li><a class="reaction-1" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'like')" data-bs-toggle="tooltip" aria-label="like" data-bs-original-title="like">
                                    <img src="{{ my_asset('uploads/reactions/like.png') }}"></a>
                                </li>
                                <li><a class="reaction-2" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'love')" data-bs-toggle="tooltip" aria-label="love" data-bs-original-title="love">
                                    <img src="{{ my_asset('uploads/reactions/love.png') }}"></a>
                                </li>
                                <li><a class="reaction-3" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'haha')" data-bs-toggle="tooltip" aria-label="haha" data-bs-original-title="haha">
                                    <img src="{{ my_asset('uploads/reactions/haha.png') }}"></a>
                                </li>
                                <li><a class="reaction-4" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'wow')" data-bs-toggle="tooltip" aria-label="wow" data-bs-original-title="wow">
                                    <img src="{{ my_asset('uploads/reactions/wow.png') }}"></a>
                                </li>
                                <li><a class="reaction-5" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'yay')" data-bs-toggle="tooltip" aria-label="yay" data-bs-original-title="yay">
                                    <img src="{{ my_asset('uploads/reactions/yay.png') }}"></a>
                                </li>
                                <li><a class="reaction-6" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'sad')" data-bs-toggle="tooltip" aria-label="sad" data-bs-original-title="sad">
                                    <img src="{{ my_asset('uploads/reactions/sad.png') }}"></a>
                                </li>
                                <li><a class="reaction-7" href="javascript:void(0);" onclick="reactPost({{ $post->id }}, 'mad')" data-bs-toggle="tooltip" aria-label="mad" data-bs-original-title="mad">
                                    <img src="{{ my_asset('uploads/reactions/mad.png') }}"></a>
                                </li>
                            </ul>

                            @if ($post->user_reactions()->count() > 0)
                                <ul>
                                    @foreach ($post->user_reactions() as $view)
                                        <li><a href="{{ route('user', ['username' => $view->user->username]) }}"><img src="{{ my_asset('uploads/users/'.$view->user->image) }}" alt="User"></a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @elseif (get_setting('react_like') == 'Like')
                        <div class="qa-item">
                            <a href="javascript:void(0);" onclick="likePost({{ $post->id }})" class="qa-link">
                                <div class="qa-icon"><i id="like-icon-{{ $post->id }}" class="bi bi-heart-fill @if(Auth::check()) @if(Auth::user()->hasLiked($post)) text-danger @else text-muted @endif @else text-muted @endif"></i></div>
                                <div class="qa-text" id="like-{{ $post->id }}">@json($post->likers()->count())</div>
                            </a>
                            <div class="qa-text me-2">{{ trans('likes') }}</div>
                            @if ($post->user_likes()->count() > 0)
                                <ul>
                                    @foreach ($post->user_likes() as $view)
                                        <li><a href="{{ route('user', ['username' => $view->user->username]) }}"><img src="{{ my_asset('uploads/users/'.$view->user->image) }}" alt="User"></a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif
                @endif
                <div class="qa-item">
                    <div class="qa-icon"><i class="bi bi-eye"></i></div>
                    <div class="qa-text">{{ $post->views()->count() }}</div>
                    <div class="qa-text">{{ trans('views') }}</div>
                </div>
            @if ($post->comments == '1')
                <div class="qa-item" id="qa-comments">
                    <a href="#comments" class="qa-link">
                        <div class="qa-icon"><i class="bi bi-chat-dots"></i></div>
                        <div class="qa-text">{{ $post->comments()->count() }}</div>
                        <div class="qa-text">{{ trans('comments') }}</div>
                    </a>
                </div>
            @endif
                <div class="qa-item">
                <a href="javascript:void(0);" onclick="savePost({{ $post->id }})" class="qa-link">
                    <div class="qa-icon"><i id="save-icon-{{ $post->id }}" class="bi bi-bookmark-fill @if(Auth::check()) @if(Auth::user()->hasFavorited($post)) text-danger @else text-muted @endif @else text-muted @endif"></i></div>
                    <div class="qa-text" id="save-{{ $post->id }}">@json($post->favoriters()->count())</div>
                </a>
                </div>
                <div class="qa-item">
                <a href="javascript:void(0)" onclick="report('{{ route('report.post') }}','{{ $post->id }}','Report this Post');" class="qa-link">
                    <div class="qa-icon"><i class="bi bi-flag"></i></div>
                    <div class="qa-text">{{ trans('report') }}</div>
                </a>
                </div>
                <div class="qa-item post-share">
                    <a href="javascript:void(0);" class="qa-link">
                    <div class="qa-icon"><i class="bi bi-share"></i></div>
                    <div class="qa-text">{{ $post->shares()->count() }}</div>
                    <div class="qa-text">{{ trans('shares') }}</div>
                    </a>
                    <ul class="share-list">
                        <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','Facebook');" href="https://www.facebook.com/sharer/sharer.php?u={{ url('post/'.$post->post_id.'/'.$post->slug) }}&t={{ $post->title }}" target="_blank" class="color-fb"><i class="bi bi-facebook"></i></a></li>
                        <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','Twitter');" href="https://twitter.com/share?url={{ url('post/'.$post->post_id.'/'.$post->slug) }}&text={{ $post->title }}" target="_blank" class="color-twitter"><i class="bi bi-twitter"></i></a></li>
                        <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','Whatsapp');" href="https://wa.me/?text={{ $post->title }}%20{{ url('post/'.$post->post_id.'/'.$post->slug) }}" data-action="share/whatsapp/share" target="_blank" class="color-whatsapp"><i class="bi bi-whatsapp"></i></a></li>
                        <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','Reddit');" href="https://www.reddit.com/submit?url={{ url('post/'.$post->post_id.'/'.$post->slug) }}&title={{ $post->title }}" target="_blank" class="color-reddit"><i class="bi bi-reddit"></i></a></li>
                        <li><a onclick="share('{{ route('share') }}','{{ $post->id }}','LinkedIn');" href="https://www.linkedin.com/shareArticle?mini=true&url={{ url('post/'.$post->post_id.'/'.$post->slug) }}&title={{ $post->title }}" target="_blank" class="color-linkedin"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div><!--/post-box-->

    @if ($post->comments == '1')

        @if ($post->closed == '0')
            <div class="comment-form" data-aos="fade-up" data-aos-easing="linear">
                <h3 class="comment-form-title">{{ trans('leave_a_comment') }}</h3>
                <form id="add_comment_form" method="POST">
                    @csrf

                    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="recipient_id" id="recipient_id" value="{{ $post->user->id }}">

                <div class="row">
                    <div class="col-lg-12 d-flex mb-4">
                        <div class="comment-form-avatar d-none d-sm-block">
                            <img src="{{ Auth::check() == null ? my_asset('uploads/users/avatar.jpg') : my_asset('uploads/users/'.Auth::user()->image) }}" alt="User">
                        </div>
                        <div class="comment-input">

                            <p class="small mb-3">* {{ trans('here_is_a_list_of_sites_you_can_embed_video_from') }} <a href="https://noembed.com/#supported-sites" target="_blank">{{ trans('list_of_sites') }}</a> </p>

                            <div class="form-group">
                                <textarea name="bodyComment" id="bodyComment" rows="5"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="comment-btn mt-3">
                                <button type="submit" class="btn btn-mint" id="add_comment_btn">{{ trans('post') }} {{ trans('comment') }}</button>
                            </div>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        @endif

            <div class="scrollspy-example-2" data-bs-spy="scroll" data-bs-target="qa-comments" data-bs-smooth-scroll="true">
            <div id="comments">
                @if ($post->comments()->count() > 0 && $post->closed == '1' || $post->comments()->count() > 0 && $post->closed == '0')
                    <h3 class="my-5" data-aos="fade-up" data-aos-easing="linear">{{ trans('comments') }}</h3>
                @elseif ($post->comments()->count() == 0 && $post->closed == '1')
                @elseif ($post->comments()->count() == 0 && $post->closed == '0')
                    <h3 class="my-5" data-aos="fade-up" data-aos-easing="linear">{{ trans('comments') }}</h3>
                @endif

                @if ($post->comments()->count() > 0)

                    @foreach ($post->comments() as $comment)

                        <div class="post-box card d-flex mx-0 {{ $comment->solution == '1' ? 'solved' : '' }}" data-aos="fade-up" data-aos-easing="linear">

                            @if ($comment->solution == '1')
                            <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('solution') }}</div>
                            @endif


                            <div class="card-header card-header-action">
                                <div class="media align-items-center">
                                    <div class="media-head me-2">
                                        <div class="avatar custom-tooltip">
                                            <a href="{{ route('user', ['username' => $comment->user->username]) }}">
                                                <img src="{{ my_asset('uploads/users/'.$comment->user->image) }}" alt="user" class="avatar-img rounded-circle">
                                                @if(Cache::has('user-is-online-' . $comment->user->id))
                                                    <span class="user_online"></span>
                                                @endif
                                            </a>

                                            <div class="custom-tooltip-dropdown">
                                                <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                                    <div class="flex-shrink-0 avatar"><img src="{{ my_asset('uploads/users/'.$comment->user->image) }}" class="rounded-circle" alt="avatar"></div>
                                                    <div class="ms-2">
                                                        <span class="author-username">{{ $comment->user->total_points() }} {{ trans('points') }}</span>
                                                        <span class="author-follow-text">{{ $comment->user->followers->count() }} {{ trans('followers') }}</span>
                                                    </div>
                                                </div>
                                                <h6 class="author-name mb-1">{{ $comment->user->name }}</h6>
                                                <p class="author-desc smaller mb-3">{{ Str::limit($comment->user->bio, 80) }}</p>
                                                <div class="follow-wrap mb-3">
                                                    <h6 class="mb-1 smaller text-uppercase">{{ trans('followed_by') }}</h6>
                                                    <div class="avatar-group">
                                                        @foreach($comment->user->followers()->with('followers')->limit(5)->get() as $follower)
                                                        <a href="{{ route('user', ['username' => $follower->username]) }}" class="avatar-group-avatar">
                                                            <img src="{{ my_asset('uploads/users/'.$follower->image) }}" alt="avatar">
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <a href="{{ route('user', ['username' => $comment->user->username]) }}" class="btn btn-sm btn-mint rounded-pill"><span>{{ trans('view') }} {{ trans('profile') }}</span></a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div><a href="{{ route('user', ['username' => $comment->user->username]) }}">{{ $comment->user->name }}</a>
                                            @if($comment->user->verified == 1)
                                                <span class="verified-badge" data-bs-toggle="tooltip" aria-label="{{ trans('verified_user') }}" data-bs-original-title="{{ trans('verified_user') }}">
                                                    <i class="bi bi-patch-check"></i>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="fs-7"><span>{{'@'.$comment->user->username }} </span></div>
                                    </div>
                                </div>
                                @if (Auth::check())
                                @if (Auth::user()->id === $comment->user->id)
                                    <div class="card-action-wrap">
                                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('user.comments.edit', ['id' => $comment->id]) }}"><i class="bi bi-pencil me-2"></i> {{ trans('edit') }} {{ trans('comment') }}</a>
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('{{ route('user.comments.destroy') }}','{{ $comment->id }}','{{ trans('delete_this_comment') }}');"><i class="bi bi-trash3 me-2"></i> {{ trans('delete') }} {{ trans('comment') }}</a>
                                        </div>
                                    </div>
                                @endif
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="content content-large">
                                    {!! $comment->body !!}
                                </div>

                                <div class="comment-meta">
                                    <span class="publish-date ms-3"> {{ $comment->created_at->diffForHumans() }}</span>

                                    <a  href="javascript:void(0);" id="{{ $comment->id }}" class="likeComment">
                                        <span id="like-comment-icon-{{ $comment->id }}" class="bi bi-heart-fill @if(Auth::check()) @if(Auth::user()->hasLiked($comment)) text-danger @else text-muted @endif @else text-muted @endif"></span>
                                        <span class="ms-1" id="like-comment-{{ $comment->id }}">@json($comment->likers()->count())</span> {{ trans('likes') }}
                                    </a>

                                    @if ($post->closed == '0')
                                        <a href="javascript:void(0)" class="reply ms-3" onclick="show_reply_form('{{ $comment->id }}');"><span class="bi bi-reply-all me-1"></span> {{ trans('reply') }}</a>
                                    @endif

                                    <a href="javascript:void(0)" onclick="report('{{ route('report.comment') }}','{{ $comment->id }}','{{ trans('report_this_comment') }}');" class="reply ms-3">
                                        <i class="bi bi-flag me-1"></i> {{ trans('report') }}
                                    </a>
                                    @if (Auth::check())
                                    @if(Auth::user()->id === $comment->post->user->id)
                                        @if ($comment->solution == '1')
                                            <a href="javascript:void(0)" onclick="mark('{{ route('user.comments.unmark') }}','{{ $comment->id }}','{{ $comment->post->id }}');" class="reply ms-3">
                                                <i class="bi bi-check2-all me-1"></i> {{ trans('unmark_as_solution') }}
                                            </a>
                                        @elseif ($comment->solution == '0')
                                            <a href="javascript:void(0)" onclick="mark('{{ route('user.comments.mark') }}','{{ $comment->id }}','{{ $comment->post->id }}');" class="reply ms-3">
                                                <i class="bi bi-check2-all me-1"></i> {{ trans('mark_as_solution') }}
                                            </a>
                                        @endif
                                    @endif
                                    @endif
                                </div>

                            </div>

                            <div class="post-box-children ms-5">

                                <div class="comment-form reply-form" id="reply-form-{{ $comment->id }}">
                                    <form id="add_reply_form" method="POST">
                                        @csrf

                                        <input type="hidden" name="comment_id" id="comment_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="post_id" id="post_id" value="{{ $comment->post->id }}">
                                        <input type="hidden" name="recipient_id" id="recipient_id" value="{{ $comment->user->id }}">

                                    <div class="row">
                                        <div class="col-lg-12 d-flex mb-4">
                                            <div class="comment-form-avatar d-none d-sm-block">
                                                <img src="{{ Auth::check() == null ? my_asset('uploads/users/avatar.jpg') : my_asset('uploads/users/'.Auth::user()->image) }}" alt="User">
                                            </div>
                                            <div class="comment-input">

                                                <p class="small mb-3">* {{ trans('here_is_a_list_of_sites_you_can_embed_video_from') }} <a href="https://noembed.com/#supported-sites" target="_blank">{{ trans('list_of_sites') }}</a> </p>

                                                <div class="form-group">
                                                    <textarea name="bodyReply" id="bodyReply" rows="5" placeholder="Post your reply ..."></textarea>
                                                    <div class="invalid-feedback"></div>
                                                </div>

                                                <div class="comment-btn mt-3">
                                                    <button type="submit" class="btn btn-mint" id="add_reply_btn">{{ trans('post') }} {{ trans('reply') }}</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                                @foreach ($comment->replies as $reply)

                                    <div class="post-box card d-flex mx-0 {{ $reply->solution == '1' ? 'solved' : 'border-top' }}">

                                        @if ($reply->solution == '1')
                                        <div class="post-badge"> <i class="bi bi-check2-circle"></i> {{ trans('solution') }}</div>
                                        @endif


                                        <div class="card-header card-header-action">
                                            <div class="media align-items-center">
                                                <div class="media-head me-2">
                                                    <div class="avatar custom-tooltip">
                                                        <a href="{{ route('user', ['username' => $reply->user->username]) }}">
                                                            <img src="{{ my_asset('uploads/users/'.$reply->user->image) }}" alt="user" class="avatar-img rounded-circle">
                                                            @if(Cache::has('user-is-online-' . $reply->user->id))
                                                                <span class="user_online"></span>
                                                            @endif
                                                        </a>

                                                        <div class="custom-tooltip-dropdown">
                                                            <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                                                <div class="flex-shrink-0 avatar"><img src="{{ my_asset('uploads/users/'.$reply->user->image) }}" class="rounded-circle" alt="avatar"></div>
                                                                <div class="ms-2">
                                                                    <span class="author-username">{{ $reply->user->total_points() }} {{ trans('points') }}</span>
                                                                    <span class="author-follow-text">{{ $reply->user->followers->count() }} {{ trans('followers') }}</span>
                                                                </div>
                                                            </div>
                                                            <h6 class="author-name mb-1">{{ $reply->user->name }}</h6>
                                                            <p class="author-desc smaller mb-3">{{ Str::limit($reply->user->bio, 80) }}</p>
                                                            <div class="follow-wrap mb-3">
                                                                <h6 class="mb-1 smaller text-uppercase">{{ trans('followed_by') }}</h6>
                                                                <div class="avatar-group">
                                                                    @foreach($reply->user->followers()->with('followers')->limit(5)->get() as $follower)
                                                                    <a href="{{ route('user', ['username' => $follower->username]) }}" class="avatar-group-avatar">
                                                                        <img src="{{ my_asset('uploads/users/'.$follower->image) }}" alt="avatar">
                                                                    </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <a href="{{ route('user', ['username' => $reply->user->username]) }}" class="btn btn-sm btn-mint rounded-pill"><span>{{ trans('view') }} {{ trans('profile') }}</span></a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div><a href="{{ route('user', ['username' => $reply->user->username]) }}">{{ $reply->user->name }}</a>
                                                        @if($reply->user->verified == 1)
                                                            <span class="verified-badge" data-bs-toggle="tooltip" aria-label="{{ trans('verified_user') }}" data-bs-original-title="{{ trans('verified_user') }}">
                                                                <i class="bi bi-patch-check"></i>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="fs-7"><span>{{'@'.$reply->user->username }} </span></div>
                                                </div>
                                            </div>
                                            @if (Auth::check())
                                            @if (Auth::user()->id === $reply->user->id)
                                                <div class="card-action-wrap">
                                                    <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="{{ route('user.replies.edit', ['id' => $reply->id]) }}"><i class="bi bi-pencil me-2"></i> {{ trans('edit') }} {{ trans('replyj') }}</a>
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('{{ route('user.replies.destroy') }}','{{ $reply->id }}','Delete this Reply');"><i class="bi bi-trash3 me-2"></i> {{ trans('delete') }} {{ trans('reply') }}</a>
                                                    </div>
                                                </div>
                                            @endif
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <div class="content content-large">
                                                {!! $reply->body !!}
                                            </div>

                                            <div class="comment-meta">
                                                <span class="publish-date ms-3"> {{ $reply->created_at->diffForHumans() }}</span>
                                                <a  href="javascript:void(0);" id="{{ $reply->id }}" class="likeReply">
                                                    <span id="like-reply-icon-{{ $reply->id }}" class="bi bi-heart-fill @if(Auth::check()) @if(Auth::user()->hasLiked($reply)) text-danger @else text-muted @endif @else text-muted @endif"></span>
                                                    <span class="ms-1" id="like-reply-{{ $reply->id }}">@json($reply->likers()->count())</span> {{ trans('likes') }}
                                                </a>
                                                <a href="javascript:void(0)" onclick="report('{{ route('report.reply') }}','{{ $reply->id }}','Report this Reply');" class="reply ms-3">
                                                    <i class="bi bi-flag me-1"></i> {{ trans('report') }}
                                                </a>

                                                @if (Auth::check())
                                                @if(Auth::user()->id === $reply->comment->post->user->id || Auth::user()->id === $reply->comment->user_id)
                                                    @if ($reply->solution == '1')
                                                        <a href="javascript:void(0)" onclick="mark('{{ route('user.replies.unmark') }}','{{ $reply->id }}','{{ $reply->comment->post->id }}');" class="reply ms-3">
                                                            <i class="bi bi-check2-all me-1"></i> {{ trans('unmark_as_solution') }}
                                                        </a>
                                                    @elseif ($reply->solution == '0')
                                                        <a href="javascript:void(0)" onclick="mark('{{ route('user.replies.mark') }}','{{ $reply->id }}','{{ $reply->comment->post->id }}');" class="reply ms-3">
                                                            <i class="bi bi-check2-all me-1"></i> {{ trans('mark_as_solution') }}
                                                        </a>
                                                    @endif
                                                @endif
                                                @endif

                                            </div>
                                        </div>
                                    </div><!--/post-box-->

                                @endforeach

                            </div>

                        </div><!--/post-box-->

                    @endforeach

                @else

                    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                        <div class="dashboard-body">
                            <div class="upload-image my-3">
                                <h4 class="mb-3">{{ trans('comments_and_replies_not_posted_yet') }}.</h4>
                            </div>
                        </div>
                    </div><!--/dashboard-card-->

                @endif

            </div>
            </div><!--/scrollspy-->

        @elseif ($post->comments == '2')

            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                <div class="dashboard-body">
                    <div class="upload-image my-3">
                        <h4 class="mb-3">{{ trans('comments_closed_for_this_post') }}.</h4>
                    </div>
                </div>
            </div><!--/dashboard-card-->

        @endif
    @endif

@endsection

@section('scripts')


<script src="{{ my_asset('assets/vendors/trumbowyg/trumbowyg.min.js') }}"></script>
<!-- Import Trumbowyg plugins... -->
<script src="{{ my_asset('assets/vendors/trumbowyg/plugins/colors/trumbowyg.colors.min.js') }}"></script>
<script src="{{ my_asset('assets/vendors/trumbowyg/plugins/emoji/trumbowyg.emoji.min.js') }}"></script>
<script src="{{ my_asset('assets/vendors/trumbowyg/plugins/giphy/trumbowyg.giphy.min.js') }}"></script>
<script src="{{ my_asset('assets/vendors/prism/prism.js') }}"></script>
<script src="{{ my_asset('assets/vendors/trumbowyg/plugins/highlight/trumbowyg.highlight.min.js') }}"></script>
<script src="{{ my_asset('assets/vendors/trumbowyg/plugins/noembed/trumbowyg.noembed.min.js') }}"></script>
<script src="{{ my_asset('assets/vendors/trumbowyg/plugins/indent/trumbowyg.indent.min.js') }}"></script>
<script src="{{ my_asset('assets/vendors/trumbowyg/plugins/cleanpaste/trumbowyg.cleanpaste.min.js') }}"></script>
<script src="{{ my_asset('assets/vendors/trumbowyg/plugins/pasteimage/trumbowyg.pasteimage.min.js') }}"></script>
<script src="{{ my_asset('assets/vendors/clipboard/clipboard.min.js') }}"></script>

<script>

    $(document).ready(function () {

        $('#bodyComment, #bodyReply').trumbowyg({
            removeformatPasted: true,
            btns: [
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['indent', 'outdent'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['foreColor', 'backColor'],
                ['horizontalRule'],
                ['removeformat'],
                ['link'],
                ['insertImage'],
                ['emoji'],
                ['giphy'],
                ['noembed'],
                ['highlight']
            ],
            plugins: {
                giphy: {
                    apiKey: 'dNhCbN6hrhpBMxXhIswM34wIR2UBpCns'
                },
            }
        });

    });

    $("#formButton").on('click', function(){
        $(".reply-form").toggle();
    });

   $(function() {

        // add comment ajax request
        $(document).on('submit', '#add_comment_form', function(e) {
            e.preventDefault();

            const fd = new FormData(this);
            $("#add_comment_btn").text('{{ trans('posting') }} {{ trans('comment') }}...');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route('comments.add') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {


                if (response.status == 400) {

                    showError('bodyComment', response.messages.bodyComment);
                    $("#add_comment_btn").text('{{ trans('post') }} {{ trans('comment') }}');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#add_comment_form");
                    $("#add_comment_form")[0].reset();
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#add_comment_form")[0].reset();
                    window.location.reload();

                }else if(response.status == 402){

                    tata.error("Error", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                    });

                    $("#add_comment_form")[0].reset();
                    $("#add_comment_btn").text('Post Comment');

                }

                }
            });
        });

        // add reply ajax request
        $(document).on('submit', '#add_reply_form', function(e) {
            e.preventDefault();

            const fd = new FormData(this);
            $("#add_reply_btn").text('{{ trans('posting') }} {{ trans('reply') }}...');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route('replies.add') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {


                if (response.status == 400) {

                    showError('bodyReply', response.messages.body);
                    $("#add_reply_btn").text('{{ trans('post') }} {{ trans('reply') }}');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#add_reply_form");
                    $("#add_reply_form")[0].reset();
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#add_reply_form")[0].reset();
                    window.location.reload();

                }else if(response.status == 402){

                    tata.error("Error", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                    });

                    $("#add_reply_form")[0].reset();
                    $("#add_reply_btn").text('Post Reply');

                }

                }
            });
        });

        $(document).on('click', '.likePost', function(e) {
            e.preventDefault();
            let a = $(this).attr('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('like') }}',
                method: 'post',
                dataType: "json",
                data: {item: a},
                success: function(e) {
                    var t;
                    1 == e.bool ? ($("#like-icon-" + a).removeClass("text-muted").addClass("text-danger"), t = $("#like-" + a).text(), $("#like-" + a).text(++t)) : 0 == e.bool && ($("#like-icon-" + a).removeClass("text-danger").addClass("text-muted"), t = $("#like-" + a).text(), $("#like-" + a).text(--t))

                    if (e.status == 200) {

                        tata.success("Success", e.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                    }
                },
                error: function(e) {

                    tata.error("Error", '{{ trans('please_login_to_like') }}', {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });
                }
            });
        });

        $(document).on('click', '.likeComment', function(e) {
            e.preventDefault();
            let a = $(this).attr('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('like.comment') }}',
                method: 'post',
                dataType: "json",
                data: {item: a},
                success: function(e) {
                    var t;
                    1 == e.bool ? ($("#like-comment-icon-" + a).removeClass("text-muted").addClass("text-danger"), t = $("#like-comment-" + a).text(), $("#like-comment-" + a).text(++t)) : 0 == e.bool && ($("#like-comment-icon-" + a).removeClass("text-danger").addClass("text-muted"), t = $("#like-comment-" + a).text(), $("#like-comment-" + a).text(--t))

                    if (e.status == 200) {

                        tata.success("Success", e.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                    }
                },
                error: function(e) {

                    tata.error("Error", '{{ trans('please_login_to_like') }}', {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });
                }
            });
        });

        $(document).on('click', '.likeReply', function(e) {
            e.preventDefault();
            let a = $(this).attr('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('like.reply') }}',
                method: 'post',
                dataType: "json",
                data: {item: a},
                success: function(e) {
                    var t;
                    1 == e.bool ? ($("#like-reply-icon-" + a).removeClass("text-muted").addClass("text-danger"), t = $("#like-reply-" + a).text(), $("#like-reply-" + a).text(++t)) : 0 == e.bool && ($("#like-reply-icon-" + a).removeClass("text-danger").addClass("text-muted"), t = $("#like-reply-" + a).text(), $("#like-reply-" + a).text(--t))

                    if (e.status == 200) {

                        tata.success("Success", e.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                    }
                },
                error: function(e) {

                    tata.error("Error", '{{ trans('please_login_to_like') }}', {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });
                }
            });
        });

    });


    /*============================================
    Copy to Clipboard
    ==============================================*/
    document.querySelectorAll('pre').forEach(function (codeBlock) {
        var button = document.createElement('button');
        button.className = 'copy-code-button';
        button.type = 'button';
        var s = codeBlock.innerText;
        button.setAttribute('data-clipboard-text',s);
        button.innerText = 'Copy';
        // button.setAttribute('title', 'Copiar para a área de transferência');

        // var pre = codeBlock.parentNode;
        codeBlock.classList.add('prettyprint');
        // pre.parentNode.insertBefore(button, pre);
        codeBlock.appendChild(button);
    });

    var clipboard = new ClipboardJS('.copy-code-button');

    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.trigger.textContent = 'Copied';
        window.setTimeout(function() {
            e.trigger.textContent = 'Copy';
        }, 2000);
        e.clearSelection();

    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
        e.trigger.textContent = 'Error on Copy';
        window.setTimeout(function() {
            e.trigger.textContent = 'Copy';
        }, 2000);
        e.clearSelection();
    });


</script>
@endsection
