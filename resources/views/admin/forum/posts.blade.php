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
            @if(Route::is('admin.posts.list'))
                <div class="card">
                    <div class="card-header">

                        <div class="d-md-flex justify-content-between align-items-center mb-10">
                            <h5 class="h4 mb-0">{{ trans('posts') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable_cms" class="table table-bordered table-reload">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('title') }}</th>
                                    <th>{{ trans('user') }}</th>
                                    <th>{{ trans('category') }}</th>
                                    <th>{{ trans('status') }}</th>
                                    <th>{{ trans('date') }}</th>
                                    <th class="text-right">{{ trans('options') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key => $post)
                                    <tr>
                                        <td>{{ ($key+1) }}</td>
                                        <td><a href="{{ route('home.post', ['post_id' => $post->post_id, 'slug' => $post->slug]) }}" target="_blank">{{ $post->title }}</a></td>
                                        <td><img src="{{ my_asset('uploads/users/'.App\Models\User::find($post->user_id)->image) }}" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                         {{ App\Models\User::find($post->user_id)->name }}
                                        </td>
                                        <td>{{ App\Models\Admin\Categories::find($post->category_id)->name }}</td>
                                        @if ($post->status == 1)
                                            <td> <span class="badge bg-success">Active</span> </td>
                                        @else
                                            <td> <span class="badge bg-danger">Not Active</span> </td>
                                        @endif
                                        <td>{{ date('d M, Y', strtotime($post->created_at)) }}</td>
                                        <td class="text-right">

                                            <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon" title="Edit">
                                                <i class="align-middle" data-feather="edit-2"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                            onclick="delete_item('{{ route('admin.posts.destroy') }}','{{ $post->id }}','{{ trans('delete_this_post') }}?');">
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
            @elseif (Route::is('admin.posts.edit'))

                <div class="card-style settings-card-2 mb-30">
                    <h4 class="mb-3">{{ trans('edit_post') }}</h4>
                    <form id="editpost_form" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label class="form-label">{{ trans('title') }}</label>
                                    <input type="text" name="title" id="title" value="{{ $post->title }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label class="form-label">{{ trans('description') }}</label>
                                    <textarea name="description" id="description" rows="4">{{ $post->description }}</textarea>
                                    <div id="count">{{ trans('characters') }}: 400 </div>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label class="form-label">{{ trans('keywords') }}</label>
                                    <input type="text" name="keywords" id="keywords"  value="{{ $post->keywords }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="select-style-1">
                                    <label>{{ trans('categories') }}</label>
                                    <div class="select-position">
                                        <select name="category_id" id="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label class="form-label">{{ trans('tags') }}</label>
                                    <input type="text" name="tags" id="tags" data-role="tagsinput" value="@foreach ($post->tags as $tag){{$tag->name}}, @endforeach">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label class="form-label">{{ trans('body') }}</label>
                                    <p class="small mb-3">* {{ trans('here_is_a_list_of_sites_you_can_embed_video_from') }} <a href="https://noembed.com/#supported-sites" target="_blank">{{ trans('list_of_sites') }}</a> </p>
                                    <textarea name="body" id="body" rows="4">{{ $post->body }}</textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="status">{{ trans('status') }}</label>
                                    <select name="status" id="status" class="form-select form-control">
                                        <option value="1" {{ $post->status == 1 ? 'selected="selected"' : '' }}>{{ trans('active') }}</option>
                                        <option value="0" {{ $post->status == 0 ? 'selected="selected"' : '' }}>{{ trans('not_active') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                            <button type="submit" id="editpost_btn" class="main-btn primary-btn btn-hover">{{ trans('submit') }}</button>
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


</script>


@if(Route::is('admin.posts.edit'))
    <script>
        $(function() {
            // update user ajax request
            $(document).on('submit', '#editpost_form', function(e) {
                e.preventDefault();
                start_load();
                const fd = new FormData(this);
                $("#editpost_btn").text('{{ trans('submitting') }}...');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.posts.edit', ['id' => $post->id]) }}',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        end_load();

                        if (response.status == 400) {

                            showError('title', response.messages.title);
                            showError('category_id', response.messages.category_id);
                            showError('tags', response.messages.tags);
                            showError('body', response.messages.body);
                            $("#editpost_btn").text('{{ trans('submit') }}');

                        }else if (response.status == 200) {

                            tata.success("Success", response.messages, {
                            position: 'tr',
                            duration: 3000,
                            animate: 'slide'
                            });

                            removeValidationClasses("#editpost_form");
                            $("#editpost_form")[0].reset();
                            window.location.reload();

                        }else if(response.status == 401){

                            tata.error("Error", response.messages, {
                            position: 'tr',
                            duration: 3000,
                            animate: 'slide'
                            });

                            $("#editpost_form")[0].reset();
                            window.location.reload();

                        }

                    }
                });

            });
        });
    </script>
@endif

@endsection
