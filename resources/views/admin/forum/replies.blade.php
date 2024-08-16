@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/ui/trumbowyg.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/giphy/ui/trumbowyg.giphy.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/prism/prism.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/trumbowyg/plugins/highlight/ui/trumbowyg.highlight.min.css') }}">
<link rel="stylesheet" href="{{ my_asset('assets/vendors/bootstrap-taginput/bootstrap-tagsinput.css') }}">

@endsection

@section('content')

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">

        <div class="col-lg-12">

            @if(Route::is('admin.replies.list'))
                <div class="card">
                    <div class="card-header">

                        <div class="d-md-flex justify-content-between align-items-center mb-10">
                            <h5 class="h4 mb-0">{{ trans('replies') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable_cms" class="table table-bordered table-reload">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('user') }}</th>
                                    <th>{{ trans('comment') }}</th>
                                    <th>{{ trans('post') }}</th>
                                    <th>{{ trans('date') }}</th>
                                    <th class="text-right">{{ trans('options') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($replies as $key => $reply)
                                    <tr>
                                        <td>{{ ($key+1) }}</td>
                                        <td><img src="{{ my_asset('uploads/users/'.App\Models\User::find($reply->user_id)->image) }}" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                         {{ App\Models\User::find($reply->user_id)->name }}
                                        </td>
                                        <td>{!! strip_tags(substr($reply->body, 0, get_setting('maximum_preview_chars'))) !!}</td>
                                        <td><a href="{{ route('home.post', ['post_id' => $reply->comment->post->post_id, 'slug' => $reply->comment->post->slug]) }}" target="_blank">{{ $reply->comment->post->title }}</a></td>
                                        <td>{{ date('d M, Y', strtotime($reply->created_at)) }}</td>
                                        <td class="text-right">

                                            <a href="{{ route('admin.replies.edit', ['id' => $reply->id]) }}" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon" title="Edit">
                                                <i class="align-middle" data-feather="edit-2"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                            onclick="delete_item('{{ route('admin.replies.destroy') }}','{{ $reply->id }}','{{ trans('delete_this_reply') }}?');">
                                                <i class="align-middle" data-feather="trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            @elseif (Route::is('admin.replies.edit'))

                <div class="card-style settings-card-2 mb-30">
                    <h4 class="mb-3">{{ trans('edit_reply') }}</h4>
                    <form id="edit_reply_form" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label class="form-label">{{ trans('body') }}</label>
                                    <p class="small mb-3">* {{ trans('here_is_a_list_of_sites_you_can_embed_video_from') }} <a href="https://noembed.com/#supported-sites" target="_blank">{{ trans('list_of_sites') }}</a> </p>
                                    <textarea name="bodyReply" id="bodyReply" rows="5" placeholder="Edit your reply ...">{{ $reply->body }}</textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-12">
                            <button type="submit" id="edit_reply_btn" class="main-btn primary-btn btn-hover">{{ trans('submit') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            @endif
        </div>


      </div><!-- row -->
     </div><!-- container -->
    </section>

</main>
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

        $('#bodyReply').trumbowyg({
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

</script>

    @if(Route::is('admin.replies.edit'))
        <script>
            $(function() {

                $(document).on('submit', '#edit_reply_form', function(e) {
                    e.preventDefault();

                    const fd = new FormData(this);
                    $("#edit_reply_btn").text('{{ trans('submitting') }}...');

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                    $.ajax({
                        url: '{{ route('admin.replies.edit', ['id' => $reply->id]) }}',
                        method: 'post',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {

                        if (response.status == 400) {

                            showError('bodyReply', response.messages.bodyReply);
                            $("#edit_reply_btn").text('{{ trans('submit') }}');

                        }else if (response.status == 200) {

                            tata.success("Success", response.messages, {
                            position: 'tr',
                            duration: 3000,
                            animate: 'slide'
                            });

                            removeValidationClasses("#edit_reply_form");
                            $("#edit_reply_form")[0].reset();
                            window.location.reload();

                        }else if(response.status == 401){

                            tata.error("Error", response.messages, {
                            position: 'tr',
                            duration: 3000,
                            animate: 'slide'
                            });

                            $("#edit_reply_form")[0].reset();
                            window.location.reload();

                        }else if(response.status == 402){

                                tata.error("Error", response.messages, {
                                    position: 'tr',
                                    duration: 3000,
                                    animate: 'slide'
                                });

                                $("#edit_reply_form")[0].reset();

                            }

                        }
                    });
                });

            });
        </script>

    @endif

@endsection
