<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">

        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="d-md-flex justify-content-between align-items-center mb-10">
                        <h5 class="h4 mb-0">User Reports</h5>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_cms" class="table table-bordered table-reload">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sender</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Reason</th>
                                <th>Date</th>
                                <th class="text-right">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($key+1)); ?></td>
                                    <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($report->sender_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                     <?php echo e(App\Models\User::find($report->sender_id)->name); ?>

                                    </td>
                                    <td>
                                        <img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($report->user_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                        <?php echo e(App\Models\User::find($report->user_id)->name); ?>


                                        <?php if(App\Models\User::find($report->user_id)->isBanned()): ?>
                                            <h6 class="text-danger">Banned</h6>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($report->category); ?></td>
                                    <td><?php echo e($report->reason); ?></td>
                                    <td><?php echo e(date('d M, Y', strtotime($report->created_at))); ?></td>
                                    <td class="text-right">
                                        <?php if(App\Models\User::find($report->user_id)->isBanned()): ?>
                                            <a href="javascript:void(0)" onclick="remove_ban('<?php echo e(route('remove.ban')); ?>','<?php echo e($report->user_id); ?>','Remove Ban')" class="btn btn-danger">
                                                <i class="align-middle" data-feather="x"></i> Remove Ban
                                            </a>
                                        <?php else: ?>
                                            <a href="#" id="<?php echo e($report->user_id); ?>'" class="btn btn-success editIcon">
                                                <i class="align-middle" data-feather="slash"></i> Ban User
                                            </a>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>

    </div><!-- row -->
   </div><!-- container -->
  </section>

  
  <div class="modal fade" id="user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ban User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="model-body">

              <form id="user_ban_form" method="POST">
                  <?php echo csrf_field(); ?>

                  <input type="hidden" name="user_id" id="user_id">
                  <div class="row px-3 py-3">

                    <div class="col-12">
                        <h5 id="name" class="mb-2"></h5>
                        <div id="current_image"></div>
                    </div>

                      <div class="col-12">
                        <div class="select-style-1">
                            <label for="time">Duration</label>
                            <div class="select-position">
                                <select name="time" id="time" class="light-bg">
                                  <?php $__currentLoopData = $durations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $duration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($duration->time); ?>"><?php echo e($duration->title); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                      </div>
                      <div class="col-12">
                          <div class="input-style-1">
                              <label for="reason">Reason</label>
                              <textarea name="reason" id="reason" rows="4" placeholder="Reason"></textarea>
                              <div class="invalid-feedback"></div>
                          </div>
                      </div>

                  </div>

                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" id="user_ban_btn" class="btn btn-success">Ban User</button>
                  </div>
              </form>

          </div>
          </div>
      </div>
  </div>

</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script>

    // ban model ajax request
    $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        start_load();
        let id = $(this).attr('id');
        $.ajax({
            url: '<?php echo e(route('get.user')); ?>',
            method: 'get',
            data: {
            id: id,
            },
            success: function(response) {
                end_load();

                $('#user_modal').modal('show');

                $('#user_ban_form #name').text(response.name);

                $('#user_ban_form #current_image').prepend($('<img>',{id:'theImg',src:'../../public/uploads/users/'+response.image,class:'img-fluid mb-3',width:'100px',height:'100px'}));

                $('#user_ban_form #user_id').val(response.id);

            }
        });
    });

    // ban ajax request
    $(document).on('submit', '#user_ban_form', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#user_ban_btn").text('Banning...');
        $.ajax({
        url: '<?php echo e(route('ban.user')); ?>',
        method: 'post',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {

            end_load();

            if (response.status == 400) {

                showError('reason', response.messages.reason);
                $("#user_ban_btn").text('Ban User');

            }else if (response.status == 200) {

                tata.success("Success", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                removeValidationClasses("#user_ban_form");
                $("#user_ban_form")[0].reset();
                $("#user_modal").modal('hide');
                window.location.reload();

            }else if(response.status == 401){

                tata.error("Error", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                $("#user_ban_form")[0].reset();
                $("#user_modal").modal('hide');
                window.location.reload();

            }

        }
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/forum/user_reports.blade.php ENDPATH**/ ?>