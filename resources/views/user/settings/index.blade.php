@extends('layouts.user')

@section('content')



<h4 class="mb-4" data-aos="fade-down" data-aos-easing="linear"><i class="bi bi-gear me-2"></i>{{ trans('settings') }}</h4>
<div class="row g-4" data-aos="fade-up" data-aos-easing="linear">
    <div class="col-12">
        <div class="vine-tabs pb-0 px-2 px-lg-0 rounded-top">
            <ul class="nav nav-tabs nav-bottom-line nav-responsive border-0 nav-justified" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 {{ Route::is('user.profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">
                        <i class="bi bi-gear fa-fw me-2"></i>{{ trans('edit_profile') }}
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 {{ Route::is('user.password') ? 'active' : '' }}" href="{{ route('user.password') }}">
                        <i class="bi bi-lock me-2"></i> {{ trans('security_settings') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12">
        <div class="mt-5">

          @if(Route::is('user.profile') )
            <div data-aos="fade-up" data-aos-easing="linear">
                <div class="dashboard-card">
                    <div class="dashboard-header">
                        <h4>{{ trans('profile_details') }}</h4>
                    </div>
                    <div class="dashboard-body">


                        <form id="user_profile_form" method="POST">
                            @csrf

                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="old_image" id="old_image" value="{{ Auth::user()->image }}">

                            <div class="col-lg-12 mb-5 d-flex justify-content-left" io-image-input="true">

                            <div class="photo me-5">
                                <div class="d-block">
                                    <div class="image-picker">
                                        <img id='image_preview' class="image previewImage" src="{{ my_asset('uploads/users/'. Auth::user()->image) }}">
                                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Change Image">
                                            <label>
                                                <i class="bi bi-pencil"></i>

                                                <input id="image" class="image-upload d-none" accept=".png, .jpg, .jpeg" name="image" type="file">
                                            </label>
                                            <div class="invalid-feedback"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            </div>

                            <div class="row g-3">
                              <div class="col-sm-12">
                                  <label class="form-label">{{ trans('name') }}*</label>
                                  <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" placeholder="{{ trans('name') }}">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-12">
                                  <label class="form-label">{{ trans('email') }}*</label>
                                  <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="{{ trans('email') }}">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-12">
                                  <label>{{ trans('username') }}*</label>
                                  <input type="text" name="username" id="username" value="{{ Auth::user()->username }}" placeholder="{{ trans('username') }}">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-6">
                                  <label>{{ trans('profession') }}</label>
                                  <input name="profession" id="profession" type="text" value="{{ Auth::user()->profession }}" placeholder="Eg. Web Developer">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-6">
                                  <label>{{ trans('gender') }}</label>
                                  <select name="gender">
                                     <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected="selected"' : '' }}>{{ trans('male') }}</option>
                                     <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected="selected"' : '' }}>{{ trans('female') }}</option>
                                  </select>
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-12">
                                  <label class="form-label">{{ trans('bio') }}</label>
                                  <textarea name="bio" id="bio" rows="5" placeholder="Bio">{{ Auth::user()->bio }}</textarea>
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-6">
                                  <label>{{ trans('location') }}</label>
                                  <input name="location" id="location" type="text" value="{{ Auth::user()->location }}" placeholder="Ex.San Francisco, CA">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-6">
                                  <label>{{ trans('country') }}</label>
                                    <select name="country" id="country">
                                        <option value="country" {{ Auth::user()->country == 'country' ? 'selected="selected"' : '' }}>Country</option>
                                        <option value="Afghanistan" {{ Auth::user()->country == 'Afghanistan' ? 'selected="selected"' : '' }}>Afghanistan</option>
                                        <option value="Ƭand Islands" {{ Auth::user()->country == 'Ƭand Islands' ? 'selected="selected"' : '' }}>Ƭand Islands</option>
                                        <option value="Albania" {{ Auth::user()->country == 'Albania' ? 'selected="selected"' : '' }}>Albania</option>
                                        <option value="Algeria" {{ Auth::user()->country == 'Algeria' ? 'selected="selected"' : '' }}>Algeria</option>
                                        <option value="American Samoa" {{ Auth::user()->country == 'American Samoa' ? 'selected="selected"' : '' }}>American Samoa</option>
                                        <option value="Andorra" {{ Auth::user()->country == 'Andorra' ? 'selected="selected"' : '' }}>Andorra</option>
                                        <option value="Angola" {{ Auth::user()->country == 'Angola' ? 'selected="selected"' : '' }}>Angola</option>
                                        <option value="Argentina" {{ Auth::user()->country == 'Argentina' ? 'selected="selected"' : '' }}>Argentina</option>
                                        <option value="Armenia" {{ Auth::user()->country == 'Armenia' ? 'selected="selected"' : '' }}>Armenia</option>
                                        <option value="Aruba" {{ Auth::user()->country == 'Aruba' ? 'selected="selected"' : '' }}>Aruba</option>
                                        <option value="Australia" {{ Auth::user()->country == 'Australia' ? 'selected="selected"' : '' }}>Australia</option>
                                        <option value="Austria" {{ Auth::user()->country == 'Austria' ? 'selected="selected"' : '' }}>Austria</option>
                                        <option value="Azerbaijan" {{ Auth::user()->country == 'Azerbaijan' ? 'selected="selected"' : '' }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ Auth::user()->country == 'Bahamas' ? 'selected="selected"' : '' }}>Bahamas</option>
                                        <option value="Bahrain" {{ Auth::user()->country == 'Bahrain' ? 'selected="selected"' : '' }}>Bahrain</option>
                                        <option value="Bangladesh" {{ Auth::user()->country == 'Bangladesh' ? 'selected="selected"' : '' }}>Bangladesh</option>
                                        <option value="Barbados" {{ Auth::user()->country == 'Barbados' ? 'selected="selected"' : '' }}>Barbados</option>
                                        <option value="Belarus" {{ Auth::user()->country == 'Belarus' ? 'selected="selected"' : '' }}>Belarus</option>
                                        <option value="Belgium" {{ Auth::user()->country == 'Belgium' ? 'selected="selected"' : '' }}>Belgium</option>
                                        <option value="Belize" {{ Auth::user()->country == 'Belize' ? 'selected="selected"' : '' }}>Belize</option>
                                        <option value="Benin" {{ Auth::user()->country == 'Benin' ? 'selected="selected"' : '' }}>Benin</option>
                                        <option value="Bermuda" {{ Auth::user()->country == 'Bermuda' ? 'selected="selected"' : '' }}>Bermuda</option>
                                        <option value="Bolivia" {{ Auth::user()->country == 'Bolivia' ? 'selected="selected"' : '' }}>Bolivia</option>
                                        <option value="Bonaire" {{ Auth::user()->country == 'Bonaire' ? 'selected="selected"' : '' }}>Bonaire</option>
                                        <option value="Bosnia" {{ Auth::user()->country == 'Bosnia' ? 'selected="selected"' : '' }}>Bosnia</option>
                                        <option value="Botswana" {{ Auth::user()->country == 'Botswana' ? 'selected="selected"' : '' }}>Botswana</option>
                                        <option value="Brazil" {{ Auth::user()->country == 'Brazil' ? 'selected="selected"' : '' }}>Brazil</option>
                                        <option value="Bulgaria" {{ Auth::user()->country == 'Bulgaria' ? 'selected="selected"' : '' }}>Bulgaria</option>
                                        <option value="Burkina Faso" {{ Auth::user()->country == 'Burkina Faso' ? 'selected="selected"' : '' }}>Burkina Faso</option>
                                        <option value="Burundi" {{ Auth::user()->country == 'Burundi' ? 'selected="selected"' : '' }}>Burundi</option>
                                        <option value="Cambodia" {{ Auth::user()->country == 'Cambodia' ? 'selected="selected"' : '' }}>Cambodia</option>
                                        <option value="Cameroon" {{ Auth::user()->country == 'Cameroon' ? 'selected="selected"' : '' }}>Cameroon</option>
                                        <option value="Canada" {{ Auth::user()->country == 'Canada' ? 'selected="selected"' : '' }}>Canada</option>
                                        <option value="Cape Verde" {{ Auth::user()->country == 'Cape Verde' ? 'selected="selected"' : '' }}>Cape Verde</option>
                                        <option value="Cayman Islands" {{ Auth::user()->country == 'Cayman Islands' ? 'selected="selected"' : '' }}>Cayman Islands</option>
                                        <option value="Central African Republic" {{ Auth::user()->country == 'Central African Republic' ? 'selected="selected"' : '' }}>Central African Republic</option>
                                        <option value="Chad" {{ Auth::user()->country == 'Chad' ? 'selected="selected"' : '' }}>Chad</option>
                                        <option value="Chile" {{ Auth::user()->country == 'Chile' ? 'selected="selected"' : '' }}>Chile</option>
                                        <option value="China" {{ Auth::user()->country == 'China' ? 'selected="selected"' : '' }}>China</option>
                                        <option value="Colombia" {{ Auth::user()->country == 'Colombia' ? 'selected="selected"' : '' }}>Colombia</option>
                                        <option value="Comoros" {{ Auth::user()->country == 'Comoros' ? 'selected="selected"' : '' }}>Comoros</option>
                                        <option value="Congo" {{ Auth::user()->country == 'Congo' ? 'selected="selected"' : '' }}>Congo</option>
                                        <option value="Democratic Republic of the Congo" {{ Auth::user()->country == 'Democratic Republic of the Congo' ? 'selected="selected"' : '' }}>Democratic Republic of the Congo</option>
                                        <option value="Cook Islands" {{ Auth::user()->country == 'Cook Islands' ? 'selected="selected"' : '' }}>Cook Islands</option>
                                        <option value="Costa Rica" {{ Auth::user()->country == 'Costa Rica' ? 'selected="selected"' : '' }}>Costa Rica</option>
                                        <option value="Cote Divoire" {{ Auth::user()->country == 'Cote Divoire' ? 'selected="selected"' : '' }}>Cote Divoire</option>
                                        <option value="Croatia" {{ Auth::user()->country == 'Croatia' ? 'selected="selected"' : '' }}>Croatia</option>
                                        <option value="Cuba" {{ Auth::user()->country == 'Cuba' ? 'selected="selected"' : '' }}>Cuba</option>
                                        <option value="Cyprus" {{ Auth::user()->country == 'Cyprus' ? 'selected="selected"' : '' }}>Cyprus</option>
                                        <option value="Czech Republic" {{ Auth::user()->country == 'Czech Republic' ? 'selected="selected"' : '' }}>Czech Republic</option>
                                        <option value="Denmark" {{ Auth::user()->country == 'Denmark' ? 'selected="selected"' : '' }}>Denmark</option>
                                        <option value="Djibouti" {{ Auth::user()->country == 'Djibouti' ? 'selected="selected"' : '' }}>Djibouti</option>
                                        <option value="Dominica" {{ Auth::user()->country == 'Dominica' ? 'selected="selected"' : '' }}>Dominica</option>
                                        <option value="Dominican Republic" {{ Auth::user()->country == 'Dominican Republic' ? 'selected="selected"' : '' }}>Dominican Republic</option>
                                        <option value="Ecuador" {{ Auth::user()->country == 'Ecuador' ? 'selected="selected"' : '' }}>Ecuador</option>
                                        <option value="Egypt" {{ Auth::user()->country == 'Egypt' ? 'selected="selected"' : '' }}>Egypt</option>
                                        <option value="El Salvador" {{ Auth::user()->country == 'El Salvador' ? 'selected="selected"' : '' }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ Auth::user()->country == 'Equatorial Guinea' ? 'selected="selected"' : '' }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ Auth::user()->country == 'Eritrea' ? 'selected="selected"' : '' }}>Eritrea</option>
                                        <option value="Estonia" {{ Auth::user()->country == 'Estonia' ? 'selected="selected"' : '' }}>Estonia</option>
                                        <option value="Ethiopia" {{ Auth::user()->country == 'Ethiopia' ? 'selected="selected"' : '' }}>Ethiopia</option>
                                        <option value="Faroe Islands" {{ Auth::user()->country == 'Faroe Islands' ? 'selected="selected"' : '' }}>Faroe Islands</option>
                                        <option value="Fiji" {{ Auth::user()->country == 'Fiji' ? 'selected="selected"' : '' }}>Fiji</option>
                                        <option value="Finland" {{ Auth::user()->country == 'Finland' ? 'selected="selected"' : '' }}>Finland</option>
                                        <option value="France" {{ Auth::user()->country == 'France' ? 'selected="selected"' : '' }}>France</option>
                                        <option value="Gabon" {{ Auth::user()->country == 'Gabon' ? 'selected="selected"' : '' }}>Gabon</option>
                                        <option value="Gambia" {{ Auth::user()->country == 'Gambia' ? 'selected="selected"' : '' }}>Gambia</option>
                                        <option value="Georgia" {{ Auth::user()->country == 'Georgia' ? 'selected="selected"' : '' }}>Georgia</option>
                                        <option value="Germany" {{ Auth::user()->country == 'Germany' ? 'selected="selected"' : '' }}>Germany</option>
                                        <option value="Ghana" {{ Auth::user()->country == 'Ghana' ? 'selected="selected"' : '' }}>Ghana</option>
                                        <option value="Gibraltar" {{ Auth::user()->country == 'Gibraltar' ? 'selected="selected"' : '' }}>Gibraltar</option>
                                        <option value="Greece" {{ Auth::user()->country == 'Greece' ? 'selected="selected"' : '' }}>Greece</option>
                                        <option value="Greenland" {{ Auth::user()->country == 'Greenland' ? 'selected="selected"' : '' }}>Greenland</option>
                                        <option value="Guam" {{ Auth::user()->country == 'Guam' ? 'selected="selected"' : '' }}>Guam</option>
                                        <option value="Guatemala" {{ Auth::user()->country == 'Guatemala' ? 'selected="selected"' : '' }}>Guatemala</option>
                                        <option value="Guinea" {{ Auth::user()->country == 'Guinea' ? 'selected="selected"' : '' }}>Guinea</option>
                                        <option value="Guinea-Bissau" {{ Auth::user()->country == 'Guinea-Bissau' ? 'selected="selected"' : '' }}>Guinea-Bissau</option>
                                        <option value="Guyana" {{ Auth::user()->country == 'Guyana' ? 'selected="selected"' : '' }}>Guyana</option>
                                        <option value="Haiti" {{ Auth::user()->country == 'Haiti' ? 'selected="selected"' : '' }}>Haiti</option>
                                        <option value="Honduras" {{ Auth::user()->country == 'Honduras' ? 'selected="selected"' : '' }}>Honduras</option>
                                        <option value="Hong Kong" {{ Auth::user()->country == 'Hong Kong' ? 'selected="selected"' : '' }}>Hong Kong</option>
                                        <option value="Hungary" {{ Auth::user()->country == 'Hungary' ? 'selected="selected"' : '' }}>Hungary</option>
                                        <option value="Iceland" {{ Auth::user()->country == 'Iceland' ? 'selected="selected"' : '' }}>Iceland</option>
                                        <option value="India" {{ Auth::user()->country == 'India' ? 'selected="selected"' : '' }}>India</option>
                                        <option value="Indonesia" {{ Auth::user()->country == 'Indonesia' ? 'selected="selected"' : '' }}>Indonesia</option>
                                        <option value="Iran" {{ Auth::user()->country == 'Iran' ? 'selected="selected"' : '' }}>Iran</option>
                                        <option value="Iraq" {{ Auth::user()->country == 'Iraq' ? 'selected="selected"' : '' }}>Iraq</option>
                                        <option value="Ireland" {{ Auth::user()->country == 'Ireland' ? 'selected="selected"' : '' }}>Ireland</option>
                                        <option value="Israel" {{ Auth::user()->country == 'Israel' ? 'selected="selected"' : '' }}>Israel</option>
                                        <option value="Italy" {{ Auth::user()->country == 'Italy' ? 'selected="selected"' : '' }}>Italy</option>
                                        <option value="Jamaica" {{ Auth::user()->country == 'Jamaica' ? 'selected="selected"' : '' }}>Jamaica</option>
                                        <option value="Japan" {{ Auth::user()->country == 'Japan' ? 'selected="selected"' : '' }}>Japan</option>
                                        <option value="Jersey" {{ Auth::user()->country == 'Jersey' ? 'selected="selected"' : '' }}>Jersey</option>
                                        <option value="Jordan" {{ Auth::user()->country == 'Jordan' ? 'selected="selected"' : '' }}>Jordan</option>
                                        <option value="Kazakistan" {{ Auth::user()->country == 'Kazakistan' ? 'selected="selected"' : '' }}>Kazakistan</option>
                                        <option value="Kenya" {{ Auth::user()->country == 'Kenya' ? 'selected="selected"' : '' }}>Kenya</option>
                                        <option value="Kuwait" {{ Auth::user()->country == 'Kuwait' ? 'selected="selected"' : '' }}>Kuwait</option>
                                        <option value="Kyrgyzstan" {{ Auth::user()->country == 'Kyrgyzstan' ? 'selected="selected"' : '' }}>Kyrgyzstan</option>
                                        <option value="Lao" {{ Auth::user()->country == 'Lao' ? 'selected="selected"' : '' }}>Lao People's Democratic Republic</option>
                                        <option value="Latvia" {{ Auth::user()->country == 'Latvia' ? 'selected="selected"' : '' }}>Latvia</option>
                                        <option value="Lebanon" {{ Auth::user()->country == 'Lebanon' ? 'selected="selected"' : '' }}>Lebanon</option>
                                        <option value="Lesotho" {{ Auth::user()->country == 'Lesotho' ? 'selected="selected"' : '' }}>Lesotho</option>
                                        <option value="Liberia" {{ Auth::user()->country == 'Liberia' ? 'selected="selected"' : '' }}>Liberia</option>
                                        <option value="Libya" {{ Auth::user()->country == 'Libya' ? 'selected="selected"' : '' }}>Libya</option>
                                        <option value="Lithuania" {{ Auth::user()->country == 'Lithuania' ? 'selected="selected"' : '' }}>Lithuania</option>
                                        <option value="Luxembourg" {{ Auth::user()->country == 'Luxembourg' ? 'selected="selected"' : '' }}>Luxembourg</option>
                                        <option value="Macao" {{ Auth::user()->country == 'Macao' ? 'selected="selected"' : '' }}>Macao</option>
                                        <option value="Macedonia" {{ Auth::user()->country == 'Macedonia' ? 'selected="selected"' : '' }}>Macedonia</option>
                                        <option value="Madagascar" {{ Auth::user()->country == 'Madagascar' ? 'selected="selected"' : '' }}>Madagascar</option>
                                        <option value="Malawi" {{ Auth::user()->country == 'Malawi' ? 'selected="selected"' : '' }}>Malawi</option>
                                        <option value="Malaysia" {{ Auth::user()->country == 'Malaysia' ? 'selected="selected"' : '' }}>Malaysia</option>
                                        <option value="Maldives" {{ Auth::user()->country == 'Maldives' ? 'selected="selected"' : '' }}>Maldives</option>
                                        <option value="Mali" {{ Auth::user()->country == 'Mali' ? 'selected="selected"' : '' }}>Mali</option>
                                        <option value="Malta" {{ Auth::user()->country == 'Malta' ? 'selected="selected"' : '' }}>Malta</option>
                                        <option value="Marshall Islands" {{ Auth::user()->country == 'Marshall Islands' ? 'selected="selected"' : '' }}>Marshall Islands</option>
                                        <option value="Mauritania" {{ Auth::user()->country == 'Mauritania' ? 'selected="selected"' : '' }}>Mauritania</option>
                                        <option value="Mauritius" {{ Auth::user()->country == 'Mauritius' ? 'selected="selected"' : '' }}>Mauritius</option>
                                        <option value="Mexico" {{ Auth::user()->country == 'Mexico' ? 'selected="selected"' : '' }}>Mexico</option>
                                        <option value="Moldova" {{ Auth::user()->country == 'Moldova' ? 'selected="selected"' : '' }}>Moldova</option>
                                        <option value="Monaco" {{ Auth::user()->country == 'Monaco' ? 'selected="selected"' : '' }}>Monaco</option>
                                        <option value="Mongolia" {{ Auth::user()->country == 'Mongolia' ? 'selected="selected"' : '' }}>Mongolia</option>
                                        <option value="Montenegro" {{ Auth::user()->country == 'Montenegro' ? 'selected="selected"' : '' }}>Montenegro</option>
                                        <option value="Morocco" {{ Auth::user()->country == 'Morocco' ? 'selected="selected"' : '' }}>Morocco</option>
                                        <option value="Mozambique" {{ Auth::user()->country == 'Mozambique' ? 'selected="selected"' : '' }}>Mozambique</option>
                                        <option value="Myanmar" {{ Auth::user()->country == 'Myanmar' ? 'selected="selected"' : '' }}>Myanmar</option>
                                        <option value="Namibia" {{ Auth::user()->country == 'Namibia' ? 'selected="selected"' : '' }}>Namibia</option>
                                        <option value="Nepal" {{ Auth::user()->country == 'Nepal' ? 'selected="selected"' : '' }}>Nepal</option>
                                        <option value="Netherlands" {{ Auth::user()->country == 'Netherlands' ? 'selected="selected"' : '' }}>Netherlands</option>
                                        <option value="New Caledonia" {{ Auth::user()->country == 'New Caledonia' ? 'selected="selected"' : '' }}>New Caledonia</option>
                                        <option value="New Zealand" {{ Auth::user()->country == 'New Zealand' ? 'selected="selected"' : '' }}>New Zealand</option>
                                        <option value="Nicaragua" {{ Auth::user()->country == 'Nicaragua' ? 'selected="selected"' : '' }}>Nicaragua</option>
                                        <option value="Niger" {{ Auth::user()->country == 'Niger' ? 'selected="selected"' : '' }}>Niger</option>
                                        <option value="Nigeria" {{ Auth::user()->country == 'Nigeria' ? 'selected="selected"' : '' }}>Nigeria</option>
                                        <option value="Niue" {{ Auth::user()->country == 'Niue' ? 'selected="selected"' : '' }}>Niue</option>
                                        <option value="Norfolk Island" {{ Auth::user()->country == 'Norfolk Island' ? 'selected="selected"' : '' }}>Norfolk Island</option>
                                        <option value="Northern Mariana Islands" {{ Auth::user()->country == 'Northern Mariana Islands' ? 'selected="selected"' : '' }}>Northern Mariana Islands</option>
                                        <option value="North Korea" {{ Auth::user()->country == 'North Korea' ? 'selected="selected"' : '' }}>North Korea</option>
                                        <option value="Norway" {{ Auth::user()->country == 'Norway' ? 'selected="selected"' : '' }}>Norway</option>
                                        <option value="Oman" {{ Auth::user()->country == 'Oman' ? 'selected="selected"' : '' }}>Oman</option>
                                        <option value="Pakistan" {{ Auth::user()->country == 'Pakistan' ? 'selected="selected"' : '' }}>Pakistan</option>
                                        <option value="Palestinian" {{ Auth::user()->country == 'Palestinian' ? 'selected="selected"' : '' }}>Palestinian</option>
                                        <option value="Panama" {{ Auth::user()->country == 'Panama' ? 'selected="selected"' : '' }}>Panama</option>
                                        <option value="Papua New Guinea" {{ Auth::user()->country == 'Papua New Guinea' ? 'selected="selected"' : '' }}>Papua New Guinea</option>
                                        <option value="Paraguay" {{ Auth::user()->country == 'Paraguay' ? 'selected="selected"' : '' }}>Paraguay</option>
                                        <option value="Peru" {{ Auth::user()->country == 'Peru' ? 'selected="selected"' : '' }}>Peru</option>
                                        <option value="Philippines" {{ Auth::user()->country == 'Philippines' ? 'selected="selected"' : '' }}>Philippines</option>
                                        <option value="Poland" {{ Auth::user()->country == 'Poland' ? 'selected="selected"' : '' }}>Poland</option>
                                        <option value="Portugal" {{ Auth::user()->country == 'Portugal' ? 'selected="selected"' : '' }}>Portugal</option>
                                        <option value="Puerto Rico" {{ Auth::user()->country == 'Puerto Rico' ? 'selected="selected"' : '' }}>Puerto Rico</option>
                                        <option value="Qatar" {{ Auth::user()->country == 'Qatar' ? 'selected="selected"' : '' }}>Qatar</option>
                                        <option value="Romania" {{ Auth::user()->country == 'Romania' ? 'selected="selected"' : '' }}>Romania</option>
                                        <option value="Russian" {{ Auth::user()->country == 'Russian' ? 'selected="selected"' : '' }}>Russian</option>
                                        <option value="Rwanda" {{ Auth::user()->country == 'Rwanda' ? 'selected="selected"' : '' }}>Rwanda</option>
                                        <option value="Samoa" {{ Auth::user()->country == 'Samoa' ? 'selected="selected"' : '' }}>Samoa</option>
                                        <option value="San Marino" {{ Auth::user()->country == 'San Marino' ? 'selected="selected"' : '' }}>San Marino</option>
                                        <option value="Sao Tome and Principe" {{ Auth::user()->country == 'Sao Tome and Principe' ? 'selected="selected"' : '' }}>Sao Tome and Principe</option>
                                        <option value="Saudi Arabia" {{ Auth::user()->country == 'Saudi Arabia' ? 'selected="selected"' : '' }}>Saudi Arabia</option>
                                        <option value="Senegal" {{ Auth::user()->country == 'Senegal' ? 'selected="selected"' : '' }}>Senegal</option>
                                        <option value="Serbia" {{ Auth::user()->country == 'Serbia' ? 'selected="selected"' : '' }}>Serbia</option>
                                        <option value="Seychelles" {{ Auth::user()->country == 'Seychelles' ? 'selected="selected"' : '' }}>Seychelles</option>
                                        <option value="Sierra Leone" {{ Auth::user()->country == 'Sierra Leone' ? 'selected="selected"' : '' }}>Sierra Leone</option>
                                        <option value="Singapore" {{ Auth::user()->country == 'Singapore' ? 'selected="selected"' : '' }}>Singapore</option>
                                        <option value="Slovakia" {{ Auth::user()->country == 'Slovakia' ? 'selected="selected"' : '' }}>Slovakia</option>
                                        <option value="Slovenia" {{ Auth::user()->country == 'Slovenia' ? 'selected="selected"' : '' }}>Slovenia</option>
                                        <option value="Solomon Islands" {{ Auth::user()->country == 'Solomon Islands' ? 'selected="selected"' : '' }}>Solomon Islands</option>
                                        <option value="Somalia" {{ Auth::user()->country == 'Somalia' ? 'selected="selected"' : '' }}>Somalia</option>
                                        <option value="South Africa" {{ Auth::user()->country == 'South Africa' ? 'selected="selected"' : '' }}>South Africa</option>
                                        <option value="South Sudan" {{ Auth::user()->country == 'South Sudan' ? 'selected="selected"' : '' }}>South Sudan</option>
                                        <option value="South Korea" {{ Auth::user()->country == 'South Korea' ? 'selected="selected"' : '' }}>South Korea</option>
                                        <option value="Spain" {{ Auth::user()->country == 'Spain' ? 'selected="selected"' : '' }}>Spain</option>
                                        <option value="Sri Lanka" {{ Auth::user()->country == 'Sri Lanka' ? 'selected="selected"' : '' }}>Sri Lanka</option>
                                        <option value="Sudan" {{ Auth::user()->country == 'Sudan' ? 'selected="selected"' : '' }}>Sudan</option>
                                        <option value="Swaziland" {{ Auth::user()->country == 'Swaziland' ? 'selected="selected"' : '' }}>Swaziland</option>
                                        <option value="Sweden" {{ Auth::user()->country == 'Sweden' ? 'selected="selected"' : '' }}>Sweden</option>
                                        <option value="Switzerland" {{ Auth::user()->country == 'Switzerland' ? 'selected="selected"' : '' }}>Switzerland</option>
                                        <option value="Syria" {{ Auth::user()->country == 'Syria' ? 'selected="selected"' : '' }}>Syria</option>
                                        <option value="Taiwan" {{ Auth::user()->country == 'Taiwan' ? 'selected="selected"' : '' }}>Taiwan</option>
                                        <option value="Tajikistan" {{ Auth::user()->country == 'Tajikistan' ? 'selected="selected"' : '' }}>Tajikistan</option>
                                        <option value="Tanzania" {{ Auth::user()->country == 'Tanzania' ? 'selected="selected"' : '' }}>Tanzania</option>
                                        <option value="Thailand" {{ Auth::user()->country == 'Thailand' ? 'selected="selected"' : '' }}>Thailand</option>
                                        <option value="Togo" {{ Auth::user()->country == 'Togo' ? 'selected="selected"' : '' }}>Togo</option>
                                        <option value="Trinidad and Tobago" {{ Auth::user()->country == 'Trinidad and Tobago' ? 'selected="selected"' : '' }}>Trinidad and Tobago</option>
                                        <option value="Tunisia" {{ Auth::user()->country == 'Tunisia' ? 'selected="selected"' : '' }}>Tunisia</option>
                                        <option value="Turkey" {{ Auth::user()->country == 'Turkey' ? 'selected="selected"' : '' }}>Turkey</option>
                                        <option value="Uganda" {{ Auth::user()->country == 'Uganda' ? 'selected="selected"' : '' }}>Uganda</option>
                                        <option value="Ukraine" {{ Auth::user()->country == 'Ukraine' ? 'selected="selected"' : '' }}>Ukraine</option>
                                        <option value="United Arab Emirates" {{ Auth::user()->country == 'United Arab Emirates' ? 'selected="selected"' : '' }}>United Arab Emirates</option>
                                        <option value="United Kingdom" {{ Auth::user()->country == 'United Kingdom' ? 'selected="selected"' : '' }}>United Kingdom</option>
                                        <option value="United States of America"  {{ Auth::user()->country == 'United States of America' ? 'selected="selected"' : '' }}>United States of America</option>
                                        <option value="United States Minor Outlying Islands" {{ Auth::user()->country == 'United States Minor Outlying Islands' ? 'selected="selected"' : '' }}>United States Minor Outlying Islands</option>
                                        <option value="Uruguay" {{ Auth::user()->country == 'Uruguay' ? 'selected="selected"' : '' }}>Uruguay</option>
                                        <option value="Uzbekistan" {{ Auth::user()->country == 'Uzbekistan' ? 'selected="selected"' : '' }}>Uzbekistan</option>
                                        <option value="Vatican" {{ Auth::user()->country == 'Vatican' ? 'selected="selected"' : '' }}>Vatican</option>
                                        <option value="Venezuela" {{ Auth::user()->country == 'Venezuela' ? 'selected="selected"' : '' }}>Venezuela</option>
                                        <option value="Vietnam" {{ Auth::user()->country == 'Vietnam' ? 'selected="selected"' : '' }}>Vietnam</option>
                                        <option value="Virgin Islands, British" {{ Auth::user()->country == 'Virgin Islands, British' ? 'selected="selected"' : '' }}>Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S" {{ Auth::user()->country == 'Virgin Islands, U.S' ? 'selected="selected"' : '' }}>Virgin Islands, U.S.</option>
                                        <option value="Western Sahara" {{ Auth::user()->country == 'Western Sahara' ? 'selected="selected"' : '' }}>Western Sahara</option>
                                        <option value="Yemen" {{ Auth::user()->country == 'Yemen' ? 'selected="selected"' : '' }}>Yemen</option>
                                        <option value="Zambia" {{ Auth::user()->country == 'Zambia' ? 'selected="selected"' : '' }}>Zambia</option>
                                        <option value="Zimbabwe" {{ Auth::user()->country == 'Zimbabwe' ? 'selected="selected"' : '' }}>Zimbabwe</option>
                                    </select>
                                <div class="invalid-feedback"></div>
                              </div>

                              <div class="col-12">
                                  <label class="form-label">{{ trans('your_website') }}</label>
                                  <input type="text" name="website" id="website" value="{{ Auth::user()->website }}" placeholder="{{ trans('your_website') }}">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-12">
                                  <label class="form-label">Twitter</label>
                                  <div class="d-flex justify-content-center">
                                      <span class="input-group-text border-0 bg-input" id="basic-addon1_"><i class="bi-twitter"></i></span>
                                      <input type="text" name="twitter" id="twitter" value="{{ Auth::user()->twitter }}" placeholder="Twitter Username">
                                      <div class="invalid-feedback"></div>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <label class="form-label">Facebook</label>
                                  <div class="d-flex justify-content-center">
                                      <span class="input-group-text border-0 bg-input" id="basic-addon1_01"><i class="bi-facebook"></i></span>
                                      <input type="text" name="facebook" id="facebook" value="{{ Auth::user()->facebook }}" placeholder="Facebook Username">
                                      <div class="invalid-feedback"></div>
                                  </div>
                              </div>
                              <div class="col-12"><label class="form-label">Instagram</label>
                                  <div class="d-flex justify-content-center">
                                      <span class="input-group-text border-0 bg-input" id="basic-addon1_02"><i class="bi-instagram"></i></span>
                                      <input type="text" name="instagram" id="instagram" value="{{ Auth::user()->instagram }}" placeholder="Instagram Username">
                                      <div class="invalid-feedback"></div>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <label class="form-label">Linkedin</label>
                                  <div class="d-flex justify-content-center">
                                      <span class="input-group-text border-0 bg-input" id="basic-addon1_02"><i class="bi-linkedin"></i></span>
                                      <input type="text" name="linkedin" id="linkedin" value="{{ Auth::user()->linkedin }}" placeholder="Linkedin Username">
                                      <div class="invalid-feedback"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="d-flex pt-5">
                              <button type="submit" id="user_profile_btn" class="btn btn-mint me-3">{{ trans('save_changes') }}</button>
                            </div>
                        </form>

                    </div>
                </div><!--/dashboard-card-->
            </div><!-- Tab content 1 END -->
          @elseif(Route::is('user.password') )
            <div data-aos="fade-up" data-aos-easing="linear">

                <div class="dashboard-card">
                    <div class="dashboard-header">
                        <h4>{{ trans('change_password') }}</h4>
                    </div>
                    <div class="dashboard-body">

                        <!-- Password -->
                        <form id="user_password_form" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-sm-12 mb-4">
                                    <label class="form-label fs-base">{{ trans('current_password') }}</label>
                                    <div class="password-toggle">
                                        <input type="password" name="current_password" id="current_password" placeholder="{{ trans('current_password') }}">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" id="togglePassword-1" type="checkbox">
                                            <span class="password-toggle-indicator"></span>
                                        </label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4">
                                    <label class="form-label fs-base">{{ trans('new_password') }}</label>
                                    <div class="password-toggle">
                                        <input type="password" name="new_password" id="new_password" placeholder="{{ trans('new_password') }}">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" id="togglePassword-2" type="checkbox">
                                            <span class="password-toggle-indicator"></span>
                                        </label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4">
                                    <label class="form-label fs-base">{{ trans('confirm_new_password') }}</label>
                                    <div class="password-toggle">
                                        <input type="password" name="confirm_password" id="confirm_password" placeholder="{{ trans('confirm_new_password') }}">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" id="togglePassword-3" type="checkbox">
                                            <span class="password-toggle-indicator"></span>
                                        </label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex mb-3 pt-2">
                            <button type="submit" id="user_password_btn" class="btn btn-mint me-3">{{ trans('save_changes') }}</button>
                            </div>
                        </form>

                    </div>
                </div><!--/dashboard-card-->
            </div><!-- Tab content 3 END -->
          @endif

        </div>
    </div>
</div>

@endsection


@section('scripts')

<script>

// Toggle Passwords

    $('#togglePassword-1').on('click', function(){
      var passInput=$("#current_password");
      if(passInput.attr('type')==='password')
        {
          passInput.attr('type','text');
      }else{
         passInput.attr('type','password');
      }
    });

    $('#togglePassword-2').on('click', function(){
      var passInput=$("#new_password");
      if(passInput.attr('type')==='password')
        {
          passInput.attr('type','text');
      }else{
         passInput.attr('type','password');
      }
    });

    $('#togglePassword-3').on('click', function(){
    var passInput=$("#confirm_password");
    if(passInput.attr('type')==='password')
        {
        passInput.attr('type','text');
    }else{
        passInput.attr('type','password');
    }
    });


// Image Change
   $(document).on('change', '#image', function () {
     if (isValidFile($(this), '#validationErrorsBox')) {
       displayPhoto(this, '#image_preview');
     }
   });

    $(function() {

       // update user ajax request
       $(document).on('submit', '#user_profile_form', function(e) {
           e.preventDefault();
           start_load();
           const fd = new FormData(this);
           $("#user_profile_btn").text('{{ trans('updating') }}...');
           $.ajax({
               method: 'POST',
               url: '{{ route('user.profile') }}',
               data: fd,
               cache: false,
               contentType: false,
               processData: false,
               dataType: 'json',
               success: function(response) {
                   end_load();

                   if (response.status == 400) {

                       showError('name', response.messages.name);
                       showError('email', response.messages.email);
                       showError('username', response.messages.username);
                       showError('image', response.messages.image);
                       $("#user_profile_btn").text('{{ trans('save_changes') }}');

                   }else if (response.status == 200) {

                       tata.success("Success", response.messages, {
                       position: 'tr',
                       duration: 3000,
                       animate: 'slide'
                       });

                       removeValidationClasses("#user_profile_form");
                       $("#user_profile_form")[0].reset();
                       window.location.reload();

                   }else if(response.status == 401){

                       tata.error("Error", response.messages, {
                       position: 'tr',
                       duration: 3000,
                       animate: 'slide'
                       });

                       $("#user_profile_form")[0].reset();
                       window.location.reload();

                   }

               }
           });
       });

       // password ajax request
       $(document).on('submit', '#user_password_form', function(e) {
           e.preventDefault();
           start_load();
           const fd = new FormData(this);
           $("#user_password_btn").text('{{ trans('updating') }}...');
           $.ajax({
               method: 'POST',
               url: '{{ route('user.password') }}',
               data: fd,
               cache: false,
               contentType: false,
               processData: false,
               dataType: 'json',
               success: function(response) {
                   end_load();

                   if (response.status == 400) {

                       showError('current_password', response.messages.current_password);
                       showError('new_password', response.messages.new_password);
                       showError('confirm_password', response.messages.confirm_password);
                       $("#user_password_btn").text('{{ trans('save_changes') }}');

                   }else if (response.status == 200) {

                       tata.success("Success", response.messages, {
                       position: 'tr',
                       duration: 3000,
                       animate: 'slide'
                       });

                       removeValidationClasses("#user_password_form");
                       $("#user_password_form")[0].reset();
                       window.location.reload();

                   }else if(response.status == 401){

                       tata.error("Error", response.messages, {
                       position: 'tr',
                       duration: 3000,
                       animate: 'slide'
                       });

                       $("#user_password_form")[0].reset();
                       window.location.reload();

                   }

               }
           });
       });

   });
</script>

@endsection
