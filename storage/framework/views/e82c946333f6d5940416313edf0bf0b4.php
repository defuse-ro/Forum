<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/css/emoji.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.css')); ?>">
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/config.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/util.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/jquery.emojiarea.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/emoji-picker.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span><?php echo e(trans('home')); ?></a></li>
                        <li><?php echo e(trans('users')); ?></li>
                    </ul>
                    <h2 class="mb-2"><?php echo e(trans('users')); ?></h2>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->

    <div class="filter mx-0">
        <form class="form" id="search_form">
            <?php echo csrf_field(); ?>
            <div class="filter-toolbar">
                <div class="filter-item" id="locationSort">
                    <label><?php echo e(trans('location')); ?></label>
                    <a class="filter-item-content dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <input type="hidden" name="location" id="location" value="">
                        <span class="filter-value"></span>
                        <span class="dropdown-btn"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-2x dropdown-location">
                           <li value="all" class="selected"><?php echo e(trans('all')); ?> </li>
                            <li value="Afghanistan">Afghanistan</li>
                            <li value="Ƭand Islands">Ƭand Islands</li>
                            <li value="Albania">Albania</li>
                            <li value="Algeria">Algeria</li>
                            <li value="American Samoa">American Samoa</li>
                            <li value="Andorra">Andorra</li>
                            <li value="Angola">Angola</li>
                            <li value="Argentina">Argentina</li>
                            <li value="Armenia">Armenia</li>
                            <li value="Aruba">Aruba</li>
                            <li value="Australia">Australia</li>
                            <li value="Austria">Austria</li>
                            <li value="Azerbaijan">Azerbaijan</li>
                            <li value="Bahamas">Bahamas</li>
                            <li value="Bahrain">Bahrain</li>
                            <li value="Bangladesh">Bangladesh</li>
                            <li value="Barbados">Barbados</li>
                            <li value="Belarus">Belarus</li>
                            <li value="Belgium">Belgium</li>
                            <li value="Belize">Belize</li>
                            <li value="Benin">Benin</li>
                            <li value="Bermuda">Bermuda</li>
                            <li value="Bolivia">Bolivia</li>
                            <li value="Bonaire">Bonaire</li>
                            <li value="Bosnia">Bosnia</li>
                            <li value="Botswana">Botswana</li>
                            <li value="Brazil">Brazil</li>
                            <li value="Bulgaria">Bulgaria</li>
                            <li value="Burkina Faso">Burkina Faso</li>
                            <li value="Burundi">Burundi</li>
                            <li value="Cambodia">Cambodia</li>
                            <li value="Cameroon">Cameroon</li>
                            <li value="Canada">Canada</li>
                            <li value="Cape Verde">Cape Verde</li>
                            <li value="Cayman Islands">Cayman Islands</li>
                            <li value="Central African Republic">Central African Republic</li>
                            <li value="Chad">Chad</li>
                            <li value="Chile">Chile</li>
                            <li value="China">China</li>
                            <li value="Colombia">Colombia</li>
                            <li value="Comoros">Comoros</li>
                            <li value="Congo">Congo</li>
                            <li value="Democratic Republic of the Congo">Democratic Republic of the Congo</li>
                            <li value="Cook Islands">Cook Islands</li>
                            <li value="Costa Rica">Costa Rica</li>
                            <li value="Cote Divoire">Cote Divoire</li>
                            <li value="Croatia">Croatia</li>
                            <li value="Cuba">Cuba</li>
                            <li value="Cyprus">Cyprus</li>
                            <li value="Czech Republic">Czech Republic</li>
                            <li value="Denmark">Denmark</li>
                            <li value="Djibouti">Djibouti</li>
                            <li value="Dominica">Dominica</li>
                            <li value="Dominican Republic">Dominican Republic</li>
                            <li value="Ecuador">Ecuador</li>
                            <li value="Egypt">Egypt</li>
                            <li value="El Salvador">El Salvador</li>
                            <li value="Equatorial Guinea">Equatorial Guinea</li>
                            <li value="Eritrea">Eritrea</li>
                            <li value="Estonia">Estonia</li>
                            <li value="Ethiopia">Ethiopia</li>
                            <li value="Faroe Islands">Faroe Islands</li>
                            <li value="Fiji">Fiji</li>
                            <li value="Finland">Finland</li>
                            <li value="France">France</li>
                            <li value="Gabon">Gabon</li>
                            <li value="Gambia">Gambia</li>
                            <li value="Georgia">Georgia</li>
                            <li value="Germany">Germany</li>
                            <li value="Ghana">Ghana</li>
                            <li value="Gibraltar">Gibraltar</li>
                            <li value="Greece">Greece</li>
                            <li value="Greenland">Greenland</li>
                            <li value="Guam">Guam</li>
                            <li value="Guatemala">Guatemala</li>
                            <li value="Guinea">Guinea</li>
                            <li value="Guinea-Bissau">Guinea-Bissau</li>
                            <li value="Guyana">Guyana</li>
                            <li value="Haiti">Haiti</li>
                            <li value="Honduras">Honduras</li>
                            <li value="Hong Kong">Hong Kong</li>
                            <li value="Hungary">Hungary</li>
                            <li value="Iceland">Iceland</li>
                            <li value="India">India</li>
                            <li value="Indonesia">Indonesia</li>
                            <li value="Iran">Iran</li>
                            <li value="Iraq">Iraq</li>
                            <li value="Ireland">Ireland</li>
                            <li value="Israel">Israel</li>
                            <li value="Italy">Italy</li>
                            <li value="Jamaica">Jamaica</li>
                            <li value="Japan">Japan</li>
                            <li value="Jersey">Jersey</li>
                            <li value="Jordan">Jordan</li>
                            <li value="Kazakistan">Kazakistan</li>
                            <li value="Kenya">Kenya</li>
                            <li value="Kuwait">Kuwait</li>
                            <li value="Kyrgyzstan">Kyrgyzstan</li>
                            <li value="Lao">Lao People's Democratic Republic</li>
                            <li value="Latvia">Latvia</li>
                            <li value="Lebanon">Lebanon</li>
                            <li value="Lesotho">Lesotho</li>
                            <li value="Liberia">Liberia</li>
                            <li value="Libya">Libya</li>
                            <li value="Lithuania">Lithuania</li>
                            <li value="Luxembourg">Luxembourg</li>
                            <li value="Macao">Macao</li>
                            <li value="Macedonia">Macedonia</li>
                            <li value="Madagascar">Madagascar</li>
                            <li value="Malawi">Malawi</li>
                            <li value="Malaysia">Malaysia</li>
                            <li value="Maldives">Maldives</li>
                            <li value="Mali">Mali</li>
                            <li value="Malta">Malta</li>
                            <li value="Marshall Islands">Marshall Islands</li>
                            <li value="Mauritania">Mauritania</li>
                            <li value="Mauritius">Mauritius</li>
                            <li value="Mexico">Mexico</li>
                            <li value="Moldova">Moldova</li>
                            <li value="Monaco">Monaco</li>
                            <li value="Mongolia">Mongolia</li>
                            <li value="Montenegro">Montenegro</li>
                            <li value="Morocco">Morocco</li>
                            <li value="Mozambique">Mozambique</li>
                            <li value="Myanmar">Myanmar</li>
                            <li value="Namibia">Namibia</li>
                            <li value="Nepal">Nepal</li>
                            <li value="Netherlands">Netherlands</li>
                            <li value="New Caledonia">New Caledonia</li>
                            <li value="New Zealand">New Zealand</li>
                            <li value="Nicaragua">Nicaragua</li>
                            <li value="Niger">Niger</li>
                            <li value="Nigeria">Nigeria</li>
                            <li value="Niue">Niue</li>
                            <li value="Norfolk Island">Norfolk Island</li>
                            <li value="Northern Mariana Islands">Northern Mariana Islands</li>
                            <li value="North Korea">North Korea</li>
                            <li value="Norway">Norway</li>
                            <li value="Oman">Oman</li>
                            <li value="Pakistan">Pakistan</li>
                            <li value="Palestinian">Palestinian</li>
                            <li value="Panama">Panama</li>
                            <li value="Papua New Guinea">Papua New Guinea</li>
                            <li value="Paraguay">Paraguay</li>
                            <li value="Peru">Peru</li>
                            <li value="Philippines">Philippines</li>
                            <li value="Poland">Poland</li>
                            <li value="Portugal">Portugal</li>
                            <li value="Puerto Rico">Puerto Rico</li>
                            <li value="Qatar">Qatar</li>
                            <li value="Romania">Romania</li>
                            <li value="Russian">Russian</li>
                            <li value="Rwanda">Rwanda</li>
                            <li value="Samoa">Samoa</li>
                            <li value="San Marino">San Marino</li>
                            <li value="Sao Tome and Principe">Sao Tome and Principe</li>
                            <li value="Saudi Arabia">Saudi Arabia</li>
                            <li value="Senegal">Senegal</li>
                            <li value="Serbia">Serbia</li>
                            <li value="Seychelles">Seychelles</li>
                            <li value="Sierra Leone">Sierra Leone</li>
                            <li value="Singapore">Singapore</li>
                            <li value="Slovakia">Slovakia</li>
                            <li value="Slovenia">Slovenia</li>
                            <li value="Solomon Islands">Solomon Islands</li>
                            <li value="Somalia">Somalia</li>
                            <li value="South Africa">South Africa</li>
                            <li value="South Sudan">South Sudan</li>
                            <li value="South Korea">South Korea</li>
                            <li value="Spain">Spain</li>
                            <li value="Sri Lanka">Sri Lanka</li>
                            <li value="Sudan">Sudan</li>
                            <li value="Swaziland">Swaziland</li>
                            <li value="Sweden">Sweden</li>
                            <li value="Switzerland">Switzerland</li>
                            <li value="Syria">Syria</li>
                            <li value="Taiwan">Taiwan</li>
                            <li value="Tajikistan">Tajikistan</li>
                            <li value="Tanzania">Tanzania</li>
                            <li value="Thailand">Thailand</li>
                            <li value="Togo">Togo</li>
                            <li value="Trinidad and Tobago">Trinidad and Tobago</li>
                            <li value="Tunisia">Tunisia</li>
                            <li value="Turkey">Turkey</li>
                            <li value="Uganda">Uganda</li>
                            <li value="Ukraine">Ukraine</li>
                            <li value="United Arab Emirates">United Arab Emirates</li>
                            <li value="United Kingdom">United Kingdom</li>
                            <li value="United States of America">United States of America</li>
                            <li value="United States Minor Outlying Islands">United States Minor Outlying Islands</li>
                            <li value="Uruguay">Uruguay</li>
                            <li value="Uzbekistan">Uzbekistan</li>
                            <li value="Vatican">Vatican</li>
                            <li value="Venezuela">Venezuela</li>
                            <li value="Vietnam">Vietnam</li>
                            <li value="Virgin Islands, British">Virgin Islands, British</li>
                            <li value="Virgin Islands, U.S">Virgin Islands, U.S.</li>
                            <li value="Western Sahara">Western Sahara</li>
                            <li value="Yemen">Yemen</li>
                            <li value="Zambia">Zambia</li>
                            <li value="Zimbabwe">Zimbabwe</li>
                    </ul>
                </div>
                <div class="filter-item" id="sorting">
                    <label><?php echo e(trans('sorting')); ?></label>
                    <a class="filter-item-content dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <input type="hidden" name="sort" id="sort" value="">
                        <span class="filter-value"></span>
                        <span class="dropdown-btn"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li value="all" class="selected"><?php echo e(trans('all')); ?></li>
                        <li value="recent"><?php echo e(trans('recent')); ?> </li>
                        <li value="most_posts"><?php echo e(trans('most')); ?> <?php echo e(trans('posts')); ?></li>
                        <li value="most_comments"><?php echo e(trans('top')); ?> <?php echo e(trans('comments')); ?></li>
                    </ul>
                </div>
                <div class="filter-item" id="numberSort">
                    <label><?php echo e(trans('number')); ?></label>
                    <a class="filter-item-content dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <input type="hidden" name="number" id="number" value="">
                        <span class="filter-value"></span>
                        <span class="dropdown-btn"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li value="10" class="selected"><?php echo e(trans('show')); ?> 10 </li>
                        <li value="20"><?php echo e(trans('show')); ?> 20 </li>
                        <li value="30"><?php echo e(trans('show')); ?> 30 </li>
                        <li value="40"><?php echo e(trans('show')); ?> 40 </li>
                        <li value="50"><?php echo e(trans('show')); ?> 50 </li>
                        <li value="100"><?php echo e(trans('show')); ?> 100 </li>
                    </ul>
                </div>

                <!-- Nav Search START -->
                <div class="w-100 mt-3 mb-3">
                    <div class="nav px-4 flex-nowrap align-items-center">
                        <div class="search-form nav-item w-100">
                            <input class="border-0" name="search_term" id="search_term" type="search" placeholder="<?php echo e(trans('search')); ?>" aria-label="Search">
                        </div>
                    </div>
                </div>
                <!-- Nav Search END -->
                <button type="submit" id="search_posts_btn" class="btn btn-md btn-mint"><?php echo e(trans('search')); ?></button>
            </div>
        </form>
    </div><!--/filter-->

    <div class="users mt-5">
        <div class="row" id="users_data">
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>

    $(function() {

        // create message ajax request
        $(document).on('submit', '#create_message', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#create_message_btn").text('<?php echo e(trans('sending')); ?>...');
            $.ajax({
                url: '<?php echo e(route('user.chats.create')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {

                end_load();

                if (response.status == 400) {

                    showError('message', response.messages.message);
                    $("#create_message_btn").text('<?php echo e(trans('send')); ?>');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#create_message");
                    $("#create_message")[0].reset();
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#create_message")[0].reset();
                    window.location.reload();

                }

                }
            });
        });
    });

    //Location Default
    var loc_text = $('#locationSort .dropdown-menu li.selected').text();
    var loc_value = $('#locationSort .dropdown-menu li.selected').attr('value');
    $('#locationSort input').val(loc_value);
    $('#locationSort .filter-value').html(loc_text);

    //Number Default
    var num_text = $('#numberSort .dropdown-menu li.selected').text();
    var num_value = $('#numberSort .dropdown-menu li.selected').attr('value');
    $('#numberSort input').val(num_value);
    $('#numberSort .filter-value').html(num_text);

    //Sorting Default
    var sort_text = $('#sorting .dropdown-menu li.selected').text();
    var sort_value = $('#sorting .dropdown-menu li.selected').attr('value');
    $('#sorting input').val(sort_value);
    $('#sorting .filter-value').html(sort_text);

    filterUsers();

    $('#locationSort .dropdown-menu li').on('click', function() {
        var value = $(this).attr('value');
        var text = $(this).text();
        var item = $(this);
        item.closest('#locationSort').find('li.selected').removeClass('selected');
        $(this).addClass('selected');
        $('#locationSort').find('input').val(value);
        $('#locationSort').find('.filter-value').html(text);
        filterUsers();
    });

    $('#sorting .dropdown-menu li').on('click', function() {
        var value = $(this).attr('value');
        var text = $(this).text();
        var item = $(this);
        item.closest('#sorting').find('li.selected').removeClass('selected');
        $(this).addClass('selected');
        $('#sorting').find('input').val(value);
        $('#sorting').find('.filter-value').html(text);
        filterUsers();
    });

    $('#numberSort .dropdown-menu li').on('click', function() {
        var value = $(this).attr('value');
        var text = $(this).text();
        var item = $(this);
        item.closest('#numberSort').find('li.selected').removeClass('selected');
        $(this).addClass('selected');
        $('#numberSort').find('input').val(value);
        $('#numberSort').find('.filter-value').html(text);
        filterUsers();
    });

    $(document).on('submit', '#search_form', function(e) {
        e.preventDefault();
        $("#search_posts_btn").text('<?php echo e(trans('searching')); ?>...');
        filterUsers();
    });

    function filterUsers() {

        let location = $('#location').val();
        let sort = $('#sort').val();
        let number = $('#number').val();
        let search_term = $('#search_term').val();

        let url = "<?php echo e(route('users.sort')); ?>";
        $.ajax({
            type: "get",
            url: url,
            data: {
                'location': location,
                'number': number,
                'sort': sort,
                'search_term': search_term
            },
            success: function(response) {

                $('#users_data').html(response);

                $("#search_posts_btn").text('Search');
            }
        }).done(function() {
            setTimeout(() => {
                $("#overlay, #overlay2").fadeOut(300);
            }, 500);
        });
    }

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        let location = $('#location').val();
        let sort = $('#sort').val();
        let number = $('#number').val();
        let search_term = $('#search_term').val();

        fetchData(page, location, sort, number, search_term);
    });

    function fetchData(page, location, sort, number, search_term) {

        var location = location;
        var sort = sort;
        var number = number;
        var search_term = search_term;

        $.ajax({
            url: "<?php echo e(url('users/pagination/?page=')); ?>" + page,
            data: {
                'location': location,
                'sort': sort,
                'number': number,
                'search_term': search_term
            },
            success: function(response) {

                $('#users_data').html(response);

                window.scroll({
                    top: 0, left: 0,
                    behavior: 'smooth'
                });
            }
        });
    }

    $(document).on('click', '.followUser', function(e) {
        e.preventDefault();
        let a = $(this).attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '<?php echo e(route('follow')); ?>',
            method: 'post',
            dataType: "json",
            data: {item: a},
            success: function(e) {

                var t;

                if (e.bool === true){

                    $("#" + a).removeClass('btn-mint');
                    $("#" + a).addClass('btn-danger');
                    $("#follow-icon-" + a).removeClass('bi-person-plus');
                    $("#follow-icon-" + a).addClass('bi-person-check');
                    t = $("#followers-" + a).text(), $("#followers-" + a).text(++t);

                }else if(e.bool === false){

                    $("#" + a).removeClass('btn-danger');
                    $("#" + a).addClass('btn-mint');
                    $("#follow-icon-" + a).removeClass('bi-person-check');
                    $("#follow-icon-" + a).addClass('bi-person-plus');
                    t = $("#followers-" + a).text(), $("#followers-" + a).text(--t);

                }

                if (e.status == 200) {

                    tata.success("Success", e.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                }
            },
            error: function(e) {

                tata.error("Error", 'Please Login to Follow', {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });
            }
        });

        $(document).on('mouseout' , '.btn-danger' , function(e) {
            let a = $(this).attr('id');
            $("#follow-icon-" + a).removeClass('bi-person-plus');
            $("#follow-icon-" + a).addClass('bi-person-check');
        });
        $(document).on('mouseover' , '.btn-danger' , function(e) {
            let a = $(this).attr('id');
            $("#follow-icon-" + a).removeClass('bi-person-check');
            $("#follow-icon-" + a).addClass('bi-person-plus');
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/users.blade.php ENDPATH**/ ?>