<?php $__env->startSection('content'); ?>



<h4 class="mb-4" data-aos="fade-down" data-aos-easing="linear"><i class="bi bi-gear me-2"></i>Settings</h4>
<div class="row g-4" data-aos="fade-up" data-aos-easing="linear">
    <div class="col-12">
        <div class="vine-tabs pb-0 px-2 px-lg-0 rounded-top">
            <ul class="nav nav-tabs nav-bottom-line nav-responsive border-0 nav-justified" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 <?php echo e(Route::is('user.profile') ? 'active' : ''); ?>" href="<?php echo e(route('user.profile')); ?>">
                        <i class="bi bi-gear fa-fw me-2"></i>Edit Profile
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 <?php echo e(Route::is('user.password') ? 'active' : ''); ?>" href="<?php echo e(route('user.password')); ?>">
                        <i class="bi bi-lock me-2"></i> Security Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12">
        <div class="mt-5">

          <?php if(Route::is('user.profile') ): ?>
            <div data-aos="fade-up" data-aos-easing="linear">
                <div class="dashboard-card">
                    <div class="dashboard-header">
                        <h4>Profile Details</h4>
                    </div>
                    <div class="dashboard-body">


                        <form id="user_profile_form" method="POST">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>">
                            <input type="hidden" name="old_image" id="old_image" value="<?php echo e(Auth::user()->image); ?>">

                            <div class="col-lg-12 mb-5 d-flex justify-content-left" io-image-input="true">

                            <div class="photo me-5">
                                <div class="d-block">
                                    <div class="image-picker">
                                        <img id='image_preview' class="image previewImage" src="<?php echo e(my_asset('uploads/users/'. Auth::user()->image)); ?>">
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
                                  <label class="form-label">Name*</label>
                                  <input type="text" name="name" id="name" value="<?php echo e(Auth::user()->name); ?>" placeholder="Name">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-12">
                                  <label class="form-label">Email*</label>
                                  <input type="text" name="email" id="email" value="<?php echo e(Auth::user()->email); ?>" placeholder="Email">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-12">
                                  <label>Username*</label>
                                  <input type="text" name="username" id="username" value="<?php echo e(Auth::user()->username); ?>" placeholder="abram_marvynn">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-6">
                                  <label>Profession</label>
                                  <input name="profession" id="profession" type="text" value="<?php echo e(Auth::user()->profession); ?>" placeholder="Eg. Web Developer">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-6">
                                  <label>Gender</label>
                                  <select name="gender">
                                     <option value="Male" <?php echo e(Auth::user()->gender == 'Male' ? 'selected="selected"' : ''); ?>>Male</option>
                                     <option value="Female" <?php echo e(Auth::user()->gender == 'Female' ? 'selected="selected"' : ''); ?>>Female</option>
                                  </select>
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-12">
                                  <label class="form-label">Bio</label>
                                  <textarea name="bio" id="bio" rows="5" placeholder="Bio"><?php echo e(Auth::user()->bio); ?></textarea>
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-6">
                                  <label>Location</label>
                                  <input name="location" id="location" type="text" value="<?php echo e(Auth::user()->location); ?>" placeholder="Ex.San Francisco, CA">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-sm-6">
                                  <label>Country</label>
                                    <select name="country" id="country">
                                        <option value="country" <?php echo e(Auth::user()->country == 'country' ? 'selected="selected"' : ''); ?>>Country</option>
                                        <option value="Afghanistan" <?php echo e(Auth::user()->country == 'Afghanistan' ? 'selected="selected"' : ''); ?>>Afghanistan</option>
                                        <option value="Ƭand Islands" <?php echo e(Auth::user()->country == 'Ƭand Islands' ? 'selected="selected"' : ''); ?>>Ƭand Islands</option>
                                        <option value="Albania" <?php echo e(Auth::user()->country == 'Albania' ? 'selected="selected"' : ''); ?>>Albania</option>
                                        <option value="Algeria" <?php echo e(Auth::user()->country == 'Algeria' ? 'selected="selected"' : ''); ?>>Algeria</option>
                                        <option value="American Samoa" <?php echo e(Auth::user()->country == 'American Samoa' ? 'selected="selected"' : ''); ?>>American Samoa</option>
                                        <option value="Andorra" <?php echo e(Auth::user()->country == 'Andorra' ? 'selected="selected"' : ''); ?>>Andorra</option>
                                        <option value="Angola" <?php echo e(Auth::user()->country == 'Angola' ? 'selected="selected"' : ''); ?>>Angola</option>
                                        <option value="Argentina" <?php echo e(Auth::user()->country == 'Argentina' ? 'selected="selected"' : ''); ?>>Argentina</option>
                                        <option value="Armenia" <?php echo e(Auth::user()->country == 'Armenia' ? 'selected="selected"' : ''); ?>>Armenia</option>
                                        <option value="Aruba" <?php echo e(Auth::user()->country == 'Aruba' ? 'selected="selected"' : ''); ?>>Aruba</option>
                                        <option value="Australia" <?php echo e(Auth::user()->country == 'Australia' ? 'selected="selected"' : ''); ?>>Australia</option>
                                        <option value="Austria" <?php echo e(Auth::user()->country == 'Austria' ? 'selected="selected"' : ''); ?>>Austria</option>
                                        <option value="Azerbaijan" <?php echo e(Auth::user()->country == 'Azerbaijan' ? 'selected="selected"' : ''); ?>>Azerbaijan</option>
                                        <option value="Bahamas" <?php echo e(Auth::user()->country == 'Bahamas' ? 'selected="selected"' : ''); ?>>Bahamas</option>
                                        <option value="Bahrain" <?php echo e(Auth::user()->country == 'Bahrain' ? 'selected="selected"' : ''); ?>>Bahrain</option>
                                        <option value="Bangladesh" <?php echo e(Auth::user()->country == 'Bangladesh' ? 'selected="selected"' : ''); ?>>Bangladesh</option>
                                        <option value="Barbados" <?php echo e(Auth::user()->country == 'Barbados' ? 'selected="selected"' : ''); ?>>Barbados</option>
                                        <option value="Belarus" <?php echo e(Auth::user()->country == 'Belarus' ? 'selected="selected"' : ''); ?>>Belarus</option>
                                        <option value="Belgium" <?php echo e(Auth::user()->country == 'Belgium' ? 'selected="selected"' : ''); ?>>Belgium</option>
                                        <option value="Belize" <?php echo e(Auth::user()->country == 'Belize' ? 'selected="selected"' : ''); ?>>Belize</option>
                                        <option value="Benin" <?php echo e(Auth::user()->country == 'Benin' ? 'selected="selected"' : ''); ?>>Benin</option>
                                        <option value="Bermuda" <?php echo e(Auth::user()->country == 'Bermuda' ? 'selected="selected"' : ''); ?>>Bermuda</option>
                                        <option value="Bolivia" <?php echo e(Auth::user()->country == 'Bolivia' ? 'selected="selected"' : ''); ?>>Bolivia</option>
                                        <option value="Bonaire" <?php echo e(Auth::user()->country == 'Bonaire' ? 'selected="selected"' : ''); ?>>Bonaire</option>
                                        <option value="Bosnia" <?php echo e(Auth::user()->country == 'Bosnia' ? 'selected="selected"' : ''); ?>>Bosnia</option>
                                        <option value="Botswana" <?php echo e(Auth::user()->country == 'Botswana' ? 'selected="selected"' : ''); ?>>Botswana</option>
                                        <option value="Brazil" <?php echo e(Auth::user()->country == 'Brazil' ? 'selected="selected"' : ''); ?>>Brazil</option>
                                        <option value="Bulgaria" <?php echo e(Auth::user()->country == 'Bulgaria' ? 'selected="selected"' : ''); ?>>Bulgaria</option>
                                        <option value="Burkina Faso" <?php echo e(Auth::user()->country == 'Burkina Faso' ? 'selected="selected"' : ''); ?>>Burkina Faso</option>
                                        <option value="Burundi" <?php echo e(Auth::user()->country == 'Burundi' ? 'selected="selected"' : ''); ?>>Burundi</option>
                                        <option value="Cambodia" <?php echo e(Auth::user()->country == 'Cambodia' ? 'selected="selected"' : ''); ?>>Cambodia</option>
                                        <option value="Cameroon" <?php echo e(Auth::user()->country == 'Cameroon' ? 'selected="selected"' : ''); ?>>Cameroon</option>
                                        <option value="Canada" <?php echo e(Auth::user()->country == 'Canada' ? 'selected="selected"' : ''); ?>>Canada</option>
                                        <option value="Cape Verde" <?php echo e(Auth::user()->country == 'Cape Verde' ? 'selected="selected"' : ''); ?>>Cape Verde</option>
                                        <option value="Cayman Islands" <?php echo e(Auth::user()->country == 'Cayman Islands' ? 'selected="selected"' : ''); ?>>Cayman Islands</option>
                                        <option value="Central African Republic" <?php echo e(Auth::user()->country == 'Central African Republic' ? 'selected="selected"' : ''); ?>>Central African Republic</option>
                                        <option value="Chad" <?php echo e(Auth::user()->country == 'Chad' ? 'selected="selected"' : ''); ?>>Chad</option>
                                        <option value="Chile" <?php echo e(Auth::user()->country == 'Chile' ? 'selected="selected"' : ''); ?>>Chile</option>
                                        <option value="China" <?php echo e(Auth::user()->country == 'China' ? 'selected="selected"' : ''); ?>>China</option>
                                        <option value="Colombia" <?php echo e(Auth::user()->country == 'Colombia' ? 'selected="selected"' : ''); ?>>Colombia</option>
                                        <option value="Comoros" <?php echo e(Auth::user()->country == 'Comoros' ? 'selected="selected"' : ''); ?>>Comoros</option>
                                        <option value="Congo" <?php echo e(Auth::user()->country == 'Congo' ? 'selected="selected"' : ''); ?>>Congo</option>
                                        <option value="Democratic Republic of the Congo" <?php echo e(Auth::user()->country == 'Democratic Republic of the Congo' ? 'selected="selected"' : ''); ?>>Democratic Republic of the Congo</option>
                                        <option value="Cook Islands" <?php echo e(Auth::user()->country == 'Cook Islands' ? 'selected="selected"' : ''); ?>>Cook Islands</option>
                                        <option value="Costa Rica" <?php echo e(Auth::user()->country == 'Costa Rica' ? 'selected="selected"' : ''); ?>>Costa Rica</option>
                                        <option value="Cote Divoire" <?php echo e(Auth::user()->country == 'Cote Divoire' ? 'selected="selected"' : ''); ?>>Cote Divoire</option>
                                        <option value="Croatia" <?php echo e(Auth::user()->country == 'Croatia' ? 'selected="selected"' : ''); ?>>Croatia</option>
                                        <option value="Cuba" <?php echo e(Auth::user()->country == 'Cuba' ? 'selected="selected"' : ''); ?>>Cuba</option>
                                        <option value="Cyprus" <?php echo e(Auth::user()->country == 'Cyprus' ? 'selected="selected"' : ''); ?>>Cyprus</option>
                                        <option value="Czech Republic" <?php echo e(Auth::user()->country == 'Czech Republic' ? 'selected="selected"' : ''); ?>>Czech Republic</option>
                                        <option value="Denmark" <?php echo e(Auth::user()->country == 'Denmark' ? 'selected="selected"' : ''); ?>>Denmark</option>
                                        <option value="Djibouti" <?php echo e(Auth::user()->country == 'Djibouti' ? 'selected="selected"' : ''); ?>>Djibouti</option>
                                        <option value="Dominica" <?php echo e(Auth::user()->country == 'Dominica' ? 'selected="selected"' : ''); ?>>Dominica</option>
                                        <option value="Dominican Republic" <?php echo e(Auth::user()->country == 'Dominican Republic' ? 'selected="selected"' : ''); ?>>Dominican Republic</option>
                                        <option value="Ecuador" <?php echo e(Auth::user()->country == 'Ecuador' ? 'selected="selected"' : ''); ?>>Ecuador</option>
                                        <option value="Egypt" <?php echo e(Auth::user()->country == 'Egypt' ? 'selected="selected"' : ''); ?>>Egypt</option>
                                        <option value="El Salvador" <?php echo e(Auth::user()->country == 'El Salvador' ? 'selected="selected"' : ''); ?>>El Salvador</option>
                                        <option value="Equatorial Guinea" <?php echo e(Auth::user()->country == 'Equatorial Guinea' ? 'selected="selected"' : ''); ?>>Equatorial Guinea</option>
                                        <option value="Eritrea" <?php echo e(Auth::user()->country == 'Eritrea' ? 'selected="selected"' : ''); ?>>Eritrea</option>
                                        <option value="Estonia" <?php echo e(Auth::user()->country == 'Estonia' ? 'selected="selected"' : ''); ?>>Estonia</option>
                                        <option value="Ethiopia" <?php echo e(Auth::user()->country == 'Ethiopia' ? 'selected="selected"' : ''); ?>>Ethiopia</option>
                                        <option value="Faroe Islands" <?php echo e(Auth::user()->country == 'Faroe Islands' ? 'selected="selected"' : ''); ?>>Faroe Islands</option>
                                        <option value="Fiji" <?php echo e(Auth::user()->country == 'Fiji' ? 'selected="selected"' : ''); ?>>Fiji</option>
                                        <option value="Finland" <?php echo e(Auth::user()->country == 'Finland' ? 'selected="selected"' : ''); ?>>Finland</option>
                                        <option value="France" <?php echo e(Auth::user()->country == 'France' ? 'selected="selected"' : ''); ?>>France</option>
                                        <option value="Gabon" <?php echo e(Auth::user()->country == 'Gabon' ? 'selected="selected"' : ''); ?>>Gabon</option>
                                        <option value="Gambia" <?php echo e(Auth::user()->country == 'Gambia' ? 'selected="selected"' : ''); ?>>Gambia</option>
                                        <option value="Georgia" <?php echo e(Auth::user()->country == 'Georgia' ? 'selected="selected"' : ''); ?>>Georgia</option>
                                        <option value="Germany" <?php echo e(Auth::user()->country == 'Germany' ? 'selected="selected"' : ''); ?>>Germany</option>
                                        <option value="Ghana" <?php echo e(Auth::user()->country == 'Ghana' ? 'selected="selected"' : ''); ?>>Ghana</option>
                                        <option value="Gibraltar" <?php echo e(Auth::user()->country == 'Gibraltar' ? 'selected="selected"' : ''); ?>>Gibraltar</option>
                                        <option value="Greece" <?php echo e(Auth::user()->country == 'Greece' ? 'selected="selected"' : ''); ?>>Greece</option>
                                        <option value="Greenland" <?php echo e(Auth::user()->country == 'Greenland' ? 'selected="selected"' : ''); ?>>Greenland</option>
                                        <option value="Guam" <?php echo e(Auth::user()->country == 'Guam' ? 'selected="selected"' : ''); ?>>Guam</option>
                                        <option value="Guatemala" <?php echo e(Auth::user()->country == 'Guatemala' ? 'selected="selected"' : ''); ?>>Guatemala</option>
                                        <option value="Guinea" <?php echo e(Auth::user()->country == 'Guinea' ? 'selected="selected"' : ''); ?>>Guinea</option>
                                        <option value="Guinea-Bissau" <?php echo e(Auth::user()->country == 'Guinea-Bissau' ? 'selected="selected"' : ''); ?>>Guinea-Bissau</option>
                                        <option value="Guyana" <?php echo e(Auth::user()->country == 'Guyana' ? 'selected="selected"' : ''); ?>>Guyana</option>
                                        <option value="Haiti" <?php echo e(Auth::user()->country == 'Haiti' ? 'selected="selected"' : ''); ?>>Haiti</option>
                                        <option value="Honduras" <?php echo e(Auth::user()->country == 'Honduras' ? 'selected="selected"' : ''); ?>>Honduras</option>
                                        <option value="Hong Kong" <?php echo e(Auth::user()->country == 'Hong Kong' ? 'selected="selected"' : ''); ?>>Hong Kong</option>
                                        <option value="Hungary" <?php echo e(Auth::user()->country == 'Hungary' ? 'selected="selected"' : ''); ?>>Hungary</option>
                                        <option value="Iceland" <?php echo e(Auth::user()->country == 'Iceland' ? 'selected="selected"' : ''); ?>>Iceland</option>
                                        <option value="India" <?php echo e(Auth::user()->country == 'India' ? 'selected="selected"' : ''); ?>>India</option>
                                        <option value="Indonesia" <?php echo e(Auth::user()->country == 'Indonesia' ? 'selected="selected"' : ''); ?>>Indonesia</option>
                                        <option value="Iran" <?php echo e(Auth::user()->country == 'Iran' ? 'selected="selected"' : ''); ?>>Iran</option>
                                        <option value="Iraq" <?php echo e(Auth::user()->country == 'Iraq' ? 'selected="selected"' : ''); ?>>Iraq</option>
                                        <option value="Ireland" <?php echo e(Auth::user()->country == 'Ireland' ? 'selected="selected"' : ''); ?>>Ireland</option>
                                        <option value="Israel" <?php echo e(Auth::user()->country == 'Israel' ? 'selected="selected"' : ''); ?>>Israel</option>
                                        <option value="Italy" <?php echo e(Auth::user()->country == 'Italy' ? 'selected="selected"' : ''); ?>>Italy</option>
                                        <option value="Jamaica" <?php echo e(Auth::user()->country == 'Jamaica' ? 'selected="selected"' : ''); ?>>Jamaica</option>
                                        <option value="Japan" <?php echo e(Auth::user()->country == 'Japan' ? 'selected="selected"' : ''); ?>>Japan</option>
                                        <option value="Jersey" <?php echo e(Auth::user()->country == 'Jersey' ? 'selected="selected"' : ''); ?>>Jersey</option>
                                        <option value="Jordan" <?php echo e(Auth::user()->country == 'Jordan' ? 'selected="selected"' : ''); ?>>Jordan</option>
                                        <option value="Kazakistan" <?php echo e(Auth::user()->country == 'Kazakistan' ? 'selected="selected"' : ''); ?>>Kazakistan</option>
                                        <option value="Kenya" <?php echo e(Auth::user()->country == 'Kenya' ? 'selected="selected"' : ''); ?>>Kenya</option>
                                        <option value="Kuwait" <?php echo e(Auth::user()->country == 'Kuwait' ? 'selected="selected"' : ''); ?>>Kuwait</option>
                                        <option value="Kyrgyzstan" <?php echo e(Auth::user()->country == 'Kyrgyzstan' ? 'selected="selected"' : ''); ?>>Kyrgyzstan</option>
                                        <option value="Lao" <?php echo e(Auth::user()->country == 'Lao' ? 'selected="selected"' : ''); ?>>Lao People's Democratic Republic</option>
                                        <option value="Latvia" <?php echo e(Auth::user()->country == 'Latvia' ? 'selected="selected"' : ''); ?>>Latvia</option>
                                        <option value="Lebanon" <?php echo e(Auth::user()->country == 'Lebanon' ? 'selected="selected"' : ''); ?>>Lebanon</option>
                                        <option value="Lesotho" <?php echo e(Auth::user()->country == 'Lesotho' ? 'selected="selected"' : ''); ?>>Lesotho</option>
                                        <option value="Liberia" <?php echo e(Auth::user()->country == 'Liberia' ? 'selected="selected"' : ''); ?>>Liberia</option>
                                        <option value="Libya" <?php echo e(Auth::user()->country == 'Libya' ? 'selected="selected"' : ''); ?>>Libya</option>
                                        <option value="Lithuania" <?php echo e(Auth::user()->country == 'Lithuania' ? 'selected="selected"' : ''); ?>>Lithuania</option>
                                        <option value="Luxembourg" <?php echo e(Auth::user()->country == 'Luxembourg' ? 'selected="selected"' : ''); ?>>Luxembourg</option>
                                        <option value="Macao" <?php echo e(Auth::user()->country == 'Macao' ? 'selected="selected"' : ''); ?>>Macao</option>
                                        <option value="Macedonia" <?php echo e(Auth::user()->country == 'Macedonia' ? 'selected="selected"' : ''); ?>>Macedonia</option>
                                        <option value="Madagascar" <?php echo e(Auth::user()->country == 'Madagascar' ? 'selected="selected"' : ''); ?>>Madagascar</option>
                                        <option value="Malawi" <?php echo e(Auth::user()->country == 'Malawi' ? 'selected="selected"' : ''); ?>>Malawi</option>
                                        <option value="Malaysia" <?php echo e(Auth::user()->country == 'Malaysia' ? 'selected="selected"' : ''); ?>>Malaysia</option>
                                        <option value="Maldives" <?php echo e(Auth::user()->country == 'Maldives' ? 'selected="selected"' : ''); ?>>Maldives</option>
                                        <option value="Mali" <?php echo e(Auth::user()->country == 'Mali' ? 'selected="selected"' : ''); ?>>Mali</option>
                                        <option value="Malta" <?php echo e(Auth::user()->country == 'Malta' ? 'selected="selected"' : ''); ?>>Malta</option>
                                        <option value="Marshall Islands" <?php echo e(Auth::user()->country == 'Marshall Islands' ? 'selected="selected"' : ''); ?>>Marshall Islands</option>
                                        <option value="Mauritania" <?php echo e(Auth::user()->country == 'Mauritania' ? 'selected="selected"' : ''); ?>>Mauritania</option>
                                        <option value="Mauritius" <?php echo e(Auth::user()->country == 'Mauritius' ? 'selected="selected"' : ''); ?>>Mauritius</option>
                                        <option value="Mexico" <?php echo e(Auth::user()->country == 'Mexico' ? 'selected="selected"' : ''); ?>>Mexico</option>
                                        <option value="Moldova" <?php echo e(Auth::user()->country == 'Moldova' ? 'selected="selected"' : ''); ?>>Moldova</option>
                                        <option value="Monaco" <?php echo e(Auth::user()->country == 'Monaco' ? 'selected="selected"' : ''); ?>>Monaco</option>
                                        <option value="Mongolia" <?php echo e(Auth::user()->country == 'Mongolia' ? 'selected="selected"' : ''); ?>>Mongolia</option>
                                        <option value="Montenegro" <?php echo e(Auth::user()->country == 'Montenegro' ? 'selected="selected"' : ''); ?>>Montenegro</option>
                                        <option value="Morocco" <?php echo e(Auth::user()->country == 'Morocco' ? 'selected="selected"' : ''); ?>>Morocco</option>
                                        <option value="Mozambique" <?php echo e(Auth::user()->country == 'Mozambique' ? 'selected="selected"' : ''); ?>>Mozambique</option>
                                        <option value="Myanmar" <?php echo e(Auth::user()->country == 'Myanmar' ? 'selected="selected"' : ''); ?>>Myanmar</option>
                                        <option value="Namibia" <?php echo e(Auth::user()->country == 'Namibia' ? 'selected="selected"' : ''); ?>>Namibia</option>
                                        <option value="Nepal" <?php echo e(Auth::user()->country == 'Nepal' ? 'selected="selected"' : ''); ?>>Nepal</option>
                                        <option value="Netherlands" <?php echo e(Auth::user()->country == 'Netherlands' ? 'selected="selected"' : ''); ?>>Netherlands</option>
                                        <option value="New Caledonia" <?php echo e(Auth::user()->country == 'New Caledonia' ? 'selected="selected"' : ''); ?>>New Caledonia</option>
                                        <option value="New Zealand" <?php echo e(Auth::user()->country == 'New Zealand' ? 'selected="selected"' : ''); ?>>New Zealand</option>
                                        <option value="Nicaragua" <?php echo e(Auth::user()->country == 'Nicaragua' ? 'selected="selected"' : ''); ?>>Nicaragua</option>
                                        <option value="Niger" <?php echo e(Auth::user()->country == 'Niger' ? 'selected="selected"' : ''); ?>>Niger</option>
                                        <option value="Nigeria" <?php echo e(Auth::user()->country == 'Nigeria' ? 'selected="selected"' : ''); ?>>Nigeria</option>
                                        <option value="Niue" <?php echo e(Auth::user()->country == 'Niue' ? 'selected="selected"' : ''); ?>>Niue</option>
                                        <option value="Norfolk Island" <?php echo e(Auth::user()->country == 'Norfolk Island' ? 'selected="selected"' : ''); ?>>Norfolk Island</option>
                                        <option value="Northern Mariana Islands" <?php echo e(Auth::user()->country == 'Northern Mariana Islands' ? 'selected="selected"' : ''); ?>>Northern Mariana Islands</option>
                                        <option value="North Korea" <?php echo e(Auth::user()->country == 'North Korea' ? 'selected="selected"' : ''); ?>>North Korea</option>
                                        <option value="Norway" <?php echo e(Auth::user()->country == 'Norway' ? 'selected="selected"' : ''); ?>>Norway</option>
                                        <option value="Oman" <?php echo e(Auth::user()->country == 'Oman' ? 'selected="selected"' : ''); ?>>Oman</option>
                                        <option value="Pakistan" <?php echo e(Auth::user()->country == 'Pakistan' ? 'selected="selected"' : ''); ?>>Pakistan</option>
                                        <option value="Palestinian" <?php echo e(Auth::user()->country == 'Palestinian' ? 'selected="selected"' : ''); ?>>Palestinian</option>
                                        <option value="Panama" <?php echo e(Auth::user()->country == 'Panama' ? 'selected="selected"' : ''); ?>>Panama</option>
                                        <option value="Papua New Guinea" <?php echo e(Auth::user()->country == 'Papua New Guinea' ? 'selected="selected"' : ''); ?>>Papua New Guinea</option>
                                        <option value="Paraguay" <?php echo e(Auth::user()->country == 'Paraguay' ? 'selected="selected"' : ''); ?>>Paraguay</option>
                                        <option value="Peru" <?php echo e(Auth::user()->country == 'Peru' ? 'selected="selected"' : ''); ?>>Peru</option>
                                        <option value="Philippines" <?php echo e(Auth::user()->country == 'Philippines' ? 'selected="selected"' : ''); ?>>Philippines</option>
                                        <option value="Poland" <?php echo e(Auth::user()->country == 'Poland' ? 'selected="selected"' : ''); ?>>Poland</option>
                                        <option value="Portugal" <?php echo e(Auth::user()->country == 'Portugal' ? 'selected="selected"' : ''); ?>>Portugal</option>
                                        <option value="Puerto Rico" <?php echo e(Auth::user()->country == 'Puerto Rico' ? 'selected="selected"' : ''); ?>>Puerto Rico</option>
                                        <option value="Qatar" <?php echo e(Auth::user()->country == 'Qatar' ? 'selected="selected"' : ''); ?>>Qatar</option>
                                        <option value="Romania" <?php echo e(Auth::user()->country == 'Romania' ? 'selected="selected"' : ''); ?>>Romania</option>
                                        <option value="Russian" <?php echo e(Auth::user()->country == 'Russian' ? 'selected="selected"' : ''); ?>>Russian</option>
                                        <option value="Rwanda" <?php echo e(Auth::user()->country == 'Rwanda' ? 'selected="selected"' : ''); ?>>Rwanda</option>
                                        <option value="Samoa" <?php echo e(Auth::user()->country == 'Samoa' ? 'selected="selected"' : ''); ?>>Samoa</option>
                                        <option value="San Marino" <?php echo e(Auth::user()->country == 'San Marino' ? 'selected="selected"' : ''); ?>>San Marino</option>
                                        <option value="Sao Tome and Principe" <?php echo e(Auth::user()->country == 'Sao Tome and Principe' ? 'selected="selected"' : ''); ?>>Sao Tome and Principe</option>
                                        <option value="Saudi Arabia" <?php echo e(Auth::user()->country == 'Saudi Arabia' ? 'selected="selected"' : ''); ?>>Saudi Arabia</option>
                                        <option value="Senegal" <?php echo e(Auth::user()->country == 'Senegal' ? 'selected="selected"' : ''); ?>>Senegal</option>
                                        <option value="Serbia" <?php echo e(Auth::user()->country == 'Serbia' ? 'selected="selected"' : ''); ?>>Serbia</option>
                                        <option value="Seychelles" <?php echo e(Auth::user()->country == 'Seychelles' ? 'selected="selected"' : ''); ?>>Seychelles</option>
                                        <option value="Sierra Leone" <?php echo e(Auth::user()->country == 'Sierra Leone' ? 'selected="selected"' : ''); ?>>Sierra Leone</option>
                                        <option value="Singapore" <?php echo e(Auth::user()->country == 'Singapore' ? 'selected="selected"' : ''); ?>>Singapore</option>
                                        <option value="Slovakia" <?php echo e(Auth::user()->country == 'Slovakia' ? 'selected="selected"' : ''); ?>>Slovakia</option>
                                        <option value="Slovenia" <?php echo e(Auth::user()->country == 'Slovenia' ? 'selected="selected"' : ''); ?>>Slovenia</option>
                                        <option value="Solomon Islands" <?php echo e(Auth::user()->country == 'Solomon Islands' ? 'selected="selected"' : ''); ?>>Solomon Islands</option>
                                        <option value="Somalia" <?php echo e(Auth::user()->country == 'Somalia' ? 'selected="selected"' : ''); ?>>Somalia</option>
                                        <option value="South Africa" <?php echo e(Auth::user()->country == 'South Africa' ? 'selected="selected"' : ''); ?>>South Africa</option>
                                        <option value="South Sudan" <?php echo e(Auth::user()->country == 'South Sudan' ? 'selected="selected"' : ''); ?>>South Sudan</option>
                                        <option value="South Korea" <?php echo e(Auth::user()->country == 'South Korea' ? 'selected="selected"' : ''); ?>>South Korea</option>
                                        <option value="Spain" <?php echo e(Auth::user()->country == 'Spain' ? 'selected="selected"' : ''); ?>>Spain</option>
                                        <option value="Sri Lanka" <?php echo e(Auth::user()->country == 'Sri Lanka' ? 'selected="selected"' : ''); ?>>Sri Lanka</option>
                                        <option value="Sudan" <?php echo e(Auth::user()->country == 'Sudan' ? 'selected="selected"' : ''); ?>>Sudan</option>
                                        <option value="Swaziland" <?php echo e(Auth::user()->country == 'Swaziland' ? 'selected="selected"' : ''); ?>>Swaziland</option>
                                        <option value="Sweden" <?php echo e(Auth::user()->country == 'Sweden' ? 'selected="selected"' : ''); ?>>Sweden</option>
                                        <option value="Switzerland" <?php echo e(Auth::user()->country == 'Switzerland' ? 'selected="selected"' : ''); ?>>Switzerland</option>
                                        <option value="Syria" <?php echo e(Auth::user()->country == 'Syria' ? 'selected="selected"' : ''); ?>>Syria</option>
                                        <option value="Taiwan" <?php echo e(Auth::user()->country == 'Taiwan' ? 'selected="selected"' : ''); ?>>Taiwan</option>
                                        <option value="Tajikistan" <?php echo e(Auth::user()->country == 'Tajikistan' ? 'selected="selected"' : ''); ?>>Tajikistan</option>
                                        <option value="Tanzania" <?php echo e(Auth::user()->country == 'Tanzania' ? 'selected="selected"' : ''); ?>>Tanzania</option>
                                        <option value="Thailand" <?php echo e(Auth::user()->country == 'Thailand' ? 'selected="selected"' : ''); ?>>Thailand</option>
                                        <option value="Togo" <?php echo e(Auth::user()->country == 'Togo' ? 'selected="selected"' : ''); ?>>Togo</option>
                                        <option value="Trinidad and Tobago" <?php echo e(Auth::user()->country == 'Trinidad and Tobago' ? 'selected="selected"' : ''); ?>>Trinidad and Tobago</option>
                                        <option value="Tunisia" <?php echo e(Auth::user()->country == 'Tunisia' ? 'selected="selected"' : ''); ?>>Tunisia</option>
                                        <option value="Turkey" <?php echo e(Auth::user()->country == 'Turkey' ? 'selected="selected"' : ''); ?>>Turkey</option>
                                        <option value="Uganda" <?php echo e(Auth::user()->country == 'Uganda' ? 'selected="selected"' : ''); ?>>Uganda</option>
                                        <option value="Ukraine" <?php echo e(Auth::user()->country == 'Ukraine' ? 'selected="selected"' : ''); ?>>Ukraine</option>
                                        <option value="United Arab Emirates" <?php echo e(Auth::user()->country == 'United Arab Emirates' ? 'selected="selected"' : ''); ?>>United Arab Emirates</option>
                                        <option value="United Kingdom" <?php echo e(Auth::user()->country == 'United Kingdom' ? 'selected="selected"' : ''); ?>>United Kingdom</option>
                                        <option value="United States of America"  <?php echo e(Auth::user()->country == 'United States of America' ? 'selected="selected"' : ''); ?>>United States of America</option>
                                        <option value="United States Minor Outlying Islands" <?php echo e(Auth::user()->country == 'United States Minor Outlying Islands' ? 'selected="selected"' : ''); ?>>United States Minor Outlying Islands</option>
                                        <option value="Uruguay" <?php echo e(Auth::user()->country == 'Uruguay' ? 'selected="selected"' : ''); ?>>Uruguay</option>
                                        <option value="Uzbekistan" <?php echo e(Auth::user()->country == 'Uzbekistan' ? 'selected="selected"' : ''); ?>>Uzbekistan</option>
                                        <option value="Vatican" <?php echo e(Auth::user()->country == 'Vatican' ? 'selected="selected"' : ''); ?>>Vatican</option>
                                        <option value="Venezuela" <?php echo e(Auth::user()->country == 'Venezuela' ? 'selected="selected"' : ''); ?>>Venezuela</option>
                                        <option value="Vietnam" <?php echo e(Auth::user()->country == 'Vietnam' ? 'selected="selected"' : ''); ?>>Vietnam</option>
                                        <option value="Virgin Islands, British" <?php echo e(Auth::user()->country == 'Virgin Islands, British' ? 'selected="selected"' : ''); ?>>Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S" <?php echo e(Auth::user()->country == 'Virgin Islands, U.S' ? 'selected="selected"' : ''); ?>>Virgin Islands, U.S.</option>
                                        <option value="Western Sahara" <?php echo e(Auth::user()->country == 'Western Sahara' ? 'selected="selected"' : ''); ?>>Western Sahara</option>
                                        <option value="Yemen" <?php echo e(Auth::user()->country == 'Yemen' ? 'selected="selected"' : ''); ?>>Yemen</option>
                                        <option value="Zambia" <?php echo e(Auth::user()->country == 'Zambia' ? 'selected="selected"' : ''); ?>>Zambia</option>
                                        <option value="Zimbabwe" <?php echo e(Auth::user()->country == 'Zimbabwe' ? 'selected="selected"' : ''); ?>>Zimbabwe</option>
                                    </select>
                                <div class="invalid-feedback"></div>
                              </div>

                              <div class="col-12">
                                  <label class="form-label">Your Website</label>
                                  <input type="text" name="website" id="website" value="<?php echo e(Auth::user()->website); ?>" placeholder="Your Website">
                                  <div class="invalid-feedback"></div>
                              </div>
                              <div class="col-12">
                                  <label class="form-label">Twitter</label>
                                  <div class="d-flex justify-content-center">
                                      <span class="input-group-text border-0 bg-input" id="basic-addon1_"><i class="bi-twitter"></i></span>
                                      <input type="text" name="twitter" id="twitter" value="<?php echo e(Auth::user()->twitter); ?>" placeholder="Twitter Username">
                                      <div class="invalid-feedback"></div>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <label class="form-label">Facebook</label>
                                  <div class="d-flex justify-content-center">
                                      <span class="input-group-text border-0 bg-input" id="basic-addon1_01"><i class="bi-facebook"></i></span>
                                      <input type="text" name="facebook" id="facebook" value="<?php echo e(Auth::user()->facebook); ?>" placeholder="Facebook Username">
                                      <div class="invalid-feedback"></div>
                                  </div>
                              </div>
                              <div class="col-12"><label class="form-label">Instagram</label>
                                  <div class="d-flex justify-content-center">
                                      <span class="input-group-text border-0 bg-input" id="basic-addon1_02"><i class="bi-instagram"></i></span>
                                      <input type="text" name="instagram" id="instagram" value="<?php echo e(Auth::user()->instagram); ?>" placeholder="Instagram Username">
                                      <div class="invalid-feedback"></div>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <label class="form-label">Linkedin</label>
                                  <div class="d-flex justify-content-center">
                                      <span class="input-group-text border-0 bg-input" id="basic-addon1_02"><i class="bi-linkedin"></i></span>
                                      <input type="text" name="linkedin" id="linkedin" value="<?php echo e(Auth::user()->linkedin); ?>" placeholder="Linkedin Username">
                                      <div class="invalid-feedback"></div>
                                  </div>
                              </div>
                            </div>
                            <div class="d-flex pt-5">
                              <button type="submit" id="user_profile_btn" class="btn btn-mint me-3">Save Changes</button>
                            </div>
                        </form>

                    </div>
                </div><!--/dashboard-card-->
            </div><!-- Tab content 1 END -->
          <?php elseif(Route::is('user.password') ): ?>
            <div data-aos="fade-up" data-aos-easing="linear">

                <div class="dashboard-card">
                    <div class="dashboard-header">
                        <h4>Change Password</h4>
                    </div>
                    <div class="dashboard-body">

                        <!-- Password -->
                        <form id="user_password_form" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-sm-12 mb-4">
                                    <label class="form-label fs-base">Current password</label>
                                    <div class="password-toggle">
                                        <input type="password" name="current_password" id="current_password" placeholder="Current Password">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" id="togglePassword-1" type="checkbox">
                                            <span class="password-toggle-indicator"></span>
                                        </label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4">
                                    <label class="form-label fs-base">New password</label>
                                    <div class="password-toggle">
                                        <input type="password" name="new_password" id="new_password" placeholder="Password">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" id="togglePassword-2" type="checkbox">
                                            <span class="password-toggle-indicator"></span>
                                        </label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4">
                                    <label class="form-label fs-base">Confirm new password</label>
                                    <div class="password-toggle">
                                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" id="togglePassword-3" type="checkbox">
                                            <span class="password-toggle-indicator"></span>
                                        </label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex mb-3 pt-2">
                            <button type="submit" id="user_password_btn" class="btn btn-mint me-3">Save changes</button>
                            </div>
                        </form>

                    </div>
                </div><!--/dashboard-card-->
            </div><!-- Tab content 3 END -->
          <?php endif; ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

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
           $("#user_profile_btn").text('Updating...');
           $.ajax({
               method: 'POST',
               url: '<?php echo e(route('user.profile')); ?>',
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
                       $("#user_profile_btn").text('Submit');

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
           $("#user_password_btn").text('Updating...');
           $.ajax({
               method: 'POST',
               url: '<?php echo e(route('user.password')); ?>',
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
                       $("#user_password_btn").text('Submit');

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/settings/index.blade.php ENDPATH**/ ?>