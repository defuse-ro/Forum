@extends('layouts.user')

@section('styles')

<link rel="stylesheet" href="{{ my_asset('assets/vendors/bootstrap-taginput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/ui/trumbowyg.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/giphy/ui/trumbowyg.giphy.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/prism/prism.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/highlight/ui/trumbowyg.highlight.min.css') }}">

@endsection

@section('content')

<h4 class="mb-0" data-aos="fade-down" data-aos-easing="linear"><i class="bi bi-plus-circle-dotted me-2"></i> {{ trans('add_post') }}</h4>

<div class="row g-0">
    <div class="col-12">
        <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
            <div class="dashboard-body">


                <form id="addpost_form" method="POST">
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label class="form-label">{{ trans('title') }}</label>
                            <input type="text" name="title" id="title" placeholder="{{ trans('title') }}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">{{ trans('description') }}</label>
                            <textarea name="description" id="description" rows="4" placeholder="{{ trans('description') }}"></textarea>
                            <div id="count">{{ trans('characters') }}: 400 </div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">{{ trans('keywords') }}</label>
                            <input type="text" name="keywords" id="keywords" placeholder="{{ trans('separate_with_a_comma') }} e.g laravel,script">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">{{ trans('categories') }}</label>
                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">{{ trans('tags') }}</label>
                            <input type="text" name="tags" id="tags" data-role="tagsinput" placeholder="{{ trans('tags') }} e.g Design">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">{{ trans('body') }}</label>
                            <p class="small mb-3">* {{ trans('here_is_a_list_of_sites_you_can_embed_video_from') }} <a href="https://noembed.com/#supported-sites" target="_blank">{{ trans('list_of_sites') }}</a> </p>
                            <textarea name="body" id="body" rows="4"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12">
                            <label>{{ trans('status') }}</label>
                            <div class="form-group">
                                <div class="form-check mb-2 me-2">
                                    <input type="radio" name="public" value="1" id="public1">
                                    <label class="form-check-label" for="public1">
                                        {{ trans('public') }}
                                    </label>
                                </div>
                            @if (Auth::user()->subscription()->followers === 1)
                                <div class="form-check mb-2">
                                    <input type="radio" name="public" value="2" id="public2">
                                    <label class="form-check-label" for="public2">
                                        {{ trans('show_to_followers') }}
                                    </label>
                                </div>
                            @else
                              <span class="small text-danger ms-4">{{ trans('to_show_posts_only_to_followers') }}, {{ trans('subscribe_to_a_new_pricing_plan') }}</span>
                            @endif
                                <div class="public-msg"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label>{{ trans('comments') }} & {{ trans('replies') }}</label>
                            <div class="form-group">
                                <div class="form-check mb-2 me-2">
                                    <input type="radio" name="comments" value="1" id="comments1">
                                    <label class="form-check-label" for="comments1">
                                        {{ trans('allow') }}
                                    </label>
                                </div>
                            @if (Auth::user()->subscription()->comments === 1)
                                <div class="form-check mb-2">
                                    <input type="radio" name="comments" value="2" id="comments2">
                                    <label class="form-check-label" for="comments2">
                                        {{ trans('close') }}
                                    </label>
                                </div>
                            @else
                                <span class="small text-danger ms-4">{{ trans('to_close_comments_and_replies_on_posts') }}, {{ trans('subscribe_to_a_new_pricing_plan') }}</span>
                            @endif
                                <div class="comments-msg"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label>{{ trans('reactions') }} or {{ trans('likes') }}</label>
                            <div class="form-group">
                                <div class="form-check mb-2 me-2">
                                    <input type="radio" name="likes" value="1" id="likes1">
                                    <label class="form-check-label" for="likes1">
                                        {{ trans('show') }}
                                    </label>
                                </div>
                            @if (Auth::user()->subscription()->reactions === 1)
                                <div class="form-check mb-2">
                                    <input type="radio" name="likes" value="2" id="likes2">
                                    <label class="form-check-label" for="likes2">{{ trans('hide') }}</label>
                                </div>
                            @else
                                <span class="small text-danger ms-4">{{ trans('to_hide_reactions_or_likes_on_posts') }}, {{ trans('subscribe_to_a_new_pricing_plan') }}</span>
                            @endif
                                <div class="likes-msg"></div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex pt-5">
                        <button type="submit" id="addpost_btn" class="btn btn-mint me-3">{{ trans('submit') }}</button>
                    </div>
                </form>

            </div>
        </div><!--/dashboard-card-->
    </div>
</div>

@endsection


@section('scripts')

<script src="{{ my_asset('assets/vendors/bootstrap-taginput/bootstrap-tagsinput.js') }}"></script>
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

<script>
    $(document).ready(function () {

        $('#body').trumbowyg({
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

    $(function() {

        // update user ajax request
        $(document).on('submit', '#addpost_form', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#addpost_btn").text('{{ trans('submitting') }}...');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                    method: 'POST',
                    url: '{{ route('user.posts.add') }}',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        end_load();

                        if (response.status == 400) {

                            showError('title', response.messages.title);
                            showError('description', response.messages.description);
                            showError('keywords', response.messages.keywords);
                            showError('category_id', response.messages.category_id);
                            showError('tags', response.messages.tags);
                            showError('body', response.messages.body);

                            if($('#public1').prop('checked') || $('#public2').prop('checked')){
                                $(".public-msg").html("");
                            }else{
                                $(".public-msg").html("<span class='text-danger small'>"+ "{{ trans("please_choose_atleast_one") }}</span>");
                            }
                            if($('#comments1').prop('checked') || $('#comments2').prop('checked')){
                                $(".comments-msg").html("");
                            }else{
                                $(".comments-msg").html("<span class='text-danger small'>"+ "{{ trans("please_choose_atleast_one") }}</span>");
                            }
                            if($('#likes1').prop('checked') || $('#likes2').prop('checked')){
                                $(".likes-msg").html("");
                            }else{
                                $(".likes-msg").html("<span class='text-danger small'>"+ "{{ trans("please_choose_atleast_one") }}</span>");
                            }

                            $("#addpost_btn").text('{{ trans('submit') }}');

                        }else if (response.status == 200) {

                            tata.success("Success", response.messages, {
                            position: 'tr',
                            duration: 3000,
                            animate: 'slide'
                            });

                            removeValidationClasses("#addpost_form");
                            $("#addpost_form")[0].reset();
                            window.location = '{{ route('user.posts.list') }}';

                        }else if(response.status == 401){

                            tata.error("Error", response.messages, {
                            position: 'tr',
                            duration: 3000,
                            animate: 'slide'
                            });

                            $("#addpost_form")[0].reset();
                            window.location.reload();

                        }

                    }
            });


        });

    });
</script>

@endsection
