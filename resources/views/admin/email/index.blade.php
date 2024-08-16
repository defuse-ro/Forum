@extends('layouts.admin')


@section('content')

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">

      <div class="row mt-50">

        <div class="card-style settings-card-2 mb-30">
            <h3 class="mb-4">{{ trans('mail_settings') }}</h3>
            <form action="{{ route('admin.settings.mail') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL MAILER</label>
                        <input type="text" name="mail_mailer" value="{{env('MAIL_MAILER')}}" placeholder="MAIL MAILER" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL HOST</label>
                        <input type="text" name="mail_host" value="{{env('MAIL_HOST')}}" placeholder="MAIL HOST" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL PORT</label>
                        <input type="text" name="mail_port" value="{{env('MAIL_PORT')}}" placeholder="MAIL PORT" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL USERNAME</label>
                        <input type="text" name="mail_username" value="{{env('MAIL_USERNAME')}}" placeholder="MAIL USERNAME" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL PASSWORD</label>
                        <input type="text" name="mail_password" value="{{env('MAIL_PASSWORD')}}" placeholder="MAIL PASSWORD" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL ENCRYPTION</label>
                        <input type="text" name="mail_encryption" value="{{env('MAIL_ENCRYPTION')}}" placeholder="MAIL ENCRYPTION e.g SSL/TLS" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL FROM ADDRESS</label>
                        <input type="text" name="mail_from_address" value="{{env('MAIL_FROM_ADDRESS')}}" placeholder="MAIL FROM ADDRESS" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL FROM NAME</label>
                        <input type="text" name="mail_from_name" value="{{env('MAIL_FROM_NAME')}}" placeholder="MAIL FROM NAME" />
                      </div>
                    </div>

                    <div class="col-12">
                      <button type="submit" class="main-btn primary-btn btn-hover">{{ trans('submit') }}</button>
                    </div>
                  </div>

            </form>
        </div>

    </div><!-- row -->
    </div><!-- container -->
    </section>

  </main>

@endsection
