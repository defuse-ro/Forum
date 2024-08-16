<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/css/emoji.css')); ?>">
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/config.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/util.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/jquery.emojiarea.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/emoji-picker.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Sidebar START -->
    <div class="col-lg-4">

        <!-- Divider -->
        <div class="d-flex align-items-center my-5 d-lg-none">
            <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="btn btn-mint bi bi-sliders2"></i>
                <span class="h6 mb-0 fw-bold d-lg-none ms-2"><?php echo e(trans('chats')); ?></span>
            </button>
        </div>
                <!-- Advanced filter responsive toggler END -->
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h5 mb-0"><a href="<?php echo e(route('user.chats')); ?>"> <i class="bi bi-arrow-left me-1"></i> <?php echo e(trans('messages')); ?></a></h1>
            </div>
        </div>

        <nav class="navbar navbar-light navbar-expand-lg mx-0">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
            <!-- Offcanvas header -->
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas"></button>
            </div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body p-0">
                <div class="card card-chat-list card-body">

                    <!-- Search chat END -->
                    <!-- Chat list tab START -->
                    <div class="mt-4 h-100">
                    <div data-simplebar
                    <?php if(get_setting('site_direction') == 'rtl'): ?>
                        data-simplebar-direction='rtl'
                    <?php endif; ?> class="chat-tab-list">
                        <ul class="nav flex-column nav-pills nav-pills-soft">

                            <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                               <?php if($chat->user_receiver->id != Auth::user()->id): ?>

                                <li data-bs-dismiss="offcanvas">
                                    <a href="<?php echo e(route('user.chats.messages', ['chat_id' => $chat->id])); ?>" class="nav-link <?php echo e($chat_id == $chat->id ? 'active' : ''); ?>">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar avatar-md me-2">
                                                <img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.$chat->user_receiver->image)); ?>" alt="User">
                                                <?php if(Cache::has('user-is-online-' . $chat->user_receiver->id)): ?>
                                                    <span class="user_online"></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="flex-grow-1 message-by">
                                                <div class="d-flex justify-content-between">
                                                    <h5>
                                                        <?php echo e($chat->user_receiver->name); ?>

                                                        <?php if($chat->unread_messages() > 0): ?>
                                                        <span class="badge bg-danger bg-opacity-10 text-danger ms-2"><?php echo e($chat->unread_messages()); ?></span>
                                                        <?php endif; ?>
                                                    </h5>
                                                    <?php if($chat->latest_message()): ?>
                                                       <span><?php echo e($chat->latest_message()->created_at->diffForHumans()); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php if($chat->latest_message()): ?>
                                                <?php if($chat->latest_message()->file_ext === 'Text'): ?>
                                                    <p><?php echo e($chat->latest_message()->message); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Gif'): ?>
                                                    <p><?php echo e(trans('gif_image')); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Image'): ?>
                                                    <p><?php echo e(trans('image_sent')); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Video'): ?>
                                                    <p><?php echo e(trans('video_sent')); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Audio'): ?>
                                                    <p><?php echo e(trans('audio_sent')); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Zip'): ?>
                                                    <p><?php echo e(trans('zip_sent')); ?></p>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- Chat user item -->

                               <?php elseif($chat->user_sender->id != Auth::user()->id): ?>

                                <li data-bs-dismiss="offcanvas">
                                    <a href="<?php echo e(route('user.chats.messages', ['chat_id' => $chat->id])); ?>" class="nav-link <?php echo e($chat_id == $chat->id ? 'active' : ''); ?>">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar avatar-md me-2">
                                                <img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.$chat->user_sender->image)); ?>" alt="User">
                                                <?php if(Cache::has('user-is-online-' . $chat->user_sender->id)): ?>
                                                    <span class="user_online"></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="flex-grow-1 message-by">
                                                <div class="d-flex justify-content-between">
                                                    <h5>
                                                        <?php echo e($chat->user_sender->name); ?>

                                                        <?php if($chat->unread_messages() > 0): ?>
                                                        <span class="badge bg-danger bg-opacity-10 text-danger ms-2"><?php echo e($chat->unread_messages()); ?></span>
                                                        <?php endif; ?>
                                                    </h5>
                                                    <?php if($chat->latest_message()): ?>
                                                       <span><?php echo e($chat->latest_message()->created_at->diffForHumans()); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php if($chat->latest_message()): ?>
                                                <?php if($chat->latest_message()->file_ext === 'Text'): ?>
                                                    <p><?php echo e($chat->latest_message()->message); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Gif'): ?>
                                                    <p><?php echo e(trans('gif_image')); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Image'): ?>
                                                    <p><?php echo e(trans('image_sent')); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Video'): ?>
                                                    <p><?php echo e(trans('video_sent')); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Audio'): ?>
                                                    <p><?php echo e(trans('audio_sent')); ?></p>
                                                <?php elseif($chat->latest_message()->file_ext === 'Zip'): ?>
                                                    <p><?php echo e(trans('zip_sent')); ?></p>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- Chat user item -->

                               <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                    </div>
                    </div>
                    <!-- Chat list tab END -->
                </div>
            </div>
        </div>
        </nav>
    </div>
    <!-- Sidebar START -->

                    <!-- Chat conversation START -->
                    <div class="col-lg-8 px-lg-4">
                        <div class="card card-chat rounded-start-lg-0 border-start-lg-0">
                          <div class="card-body h-100">
                              <div class="h-100">

                                  <div class="d-flex justify-content-between align-items-center">
                                    <?php if($current_chat->receiver_id != Auth::user()->id): ?>
                                      <div class="d-flex mb-2 mb-sm-0">
                                          <div class="flex-shrink-0 avatar me-2">
                                                <img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.$current_chat->user_receiver->image)); ?>" alt="User">
                                          </div>
                                          <div class="d-block flex-grow-1">
                                          <h6 class="mb-0 mt-1"><?php echo e($current_chat->user_receiver->name); ?></h6>

                                            <?php if(Cache::has('user-is-online-' . $current_chat->receiver_id)): ?>
                                              <div class="small text-secondary"><i class="bi bi-circle-fill text-green me-1"></i><?php echo e(trans('online')); ?></div>
                                            <?php else: ?>
                                                <div class="small text-secondary"><i class="bi bi-circle-fill text-muted me-1"></i><?php echo e(trans('offline')); ?></div>
                                            <?php endif; ?>

                                          </div>
                                      </div>
                                    <?php elseif($current_chat->sender_id != Auth::user()->id): ?>
                                        <div class="d-flex mb-2 mb-sm-0">
                                            <div class="flex-shrink-0 avatar me-2">
                                                <img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.$current_chat->user_sender->image)); ?>" alt="User">
                                            </div>
                                            <div class="d-block flex-grow-1">
                                                <h6 class="mb-0 mt-1"><?php echo e($current_chat->user_sender->name); ?></h6>

                                                <?php if(Cache::has('user-is-online-' . $current_chat->sender_id)): ?>
                                                <div class="small text-secondary"><i class="bi bi-circle-fill text-green me-1"></i><?php echo e(trans('online')); ?></div>
                                                <?php else: ?>
                                                    <div class="small text-secondary"><i class="bi bi-circle-fill text-muted me-1"></i><?php echo e(trans('offline')); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                      <div class="d-flex align-items-center">
                                      <!-- Card action START -->
                                          <div class="dropdown">
                                          <a class="icon-md me-2 px-2" href="#" id="chatcoversationDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">

                                            <?php if($current_chat->receiver_id != Auth::user()->id): ?>
                                              <li><a class="dropdown-item" href="<?php echo e(route('user', ['username' => $current_chat->user_receiver->username])); ?>"><i class="bi bi-person-check me-2 fw-icon"></i><?php echo e(trans('view')); ?> <?php echo e(trans('profile')); ?></a></li>
                                            <?php elseif($current_chat->sender_id != Auth::user()->id): ?>
                                             <li><a class="dropdown-item" href="<?php echo e(route('user', ['username' => $current_chat->user_sender->username])); ?>"><i class="bi bi-person-check me-2 fw-icon"></i><?php echo e(trans('view')); ?> <?php echo e(trans('profile')); ?></a></li>
                                            <?php endif; ?>

                                        <?php if(Auth::user()->subscription()->messages === 1): ?>
                                            <?php if($current_chat->status == '1'): ?>
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="mute_chat('<?php echo e($current_chat->id); ?>','Mute')"><i class="bi bi-mic-mute me-2 fw-icon"></i><?php echo e(trans('mute_conversation')); ?></a></li>
                                            <?php elseif($current_chat->status == '2'): ?>
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="mute_chat('<?php echo e($current_chat->id); ?>','Unmute')"><i class="bi bi-mic-mute me-2 fw-icon"></i><?php echo e(trans('unmute_conversation')); ?></a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                              <li><a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.chats.delete')); ?>','<?php echo e($current_chat->id); ?>','<?php echo e(trans('delete_this_chat')); ?>');"><i class="bi bi-trash me-2 fw-icon"></i><?php echo e(trans('delete_chat')); ?></a></li>
                                          </ul>
                                          </div>
                                          <!-- Card action END -->
                                      </div>
                                  </div>

                                  <hr>
                                  <!-- Chat conversation START -->
                                  <div class="chat-conversation-content px-3" id="messagesContent">

                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($message->sender_id === Auth::user()->id): ?>

                                        <div class="d-flex align-items-start justify-content-end mb-3 chat-box">
                                            <div class="pe-2 me-1 chat-message">
                                                <div class="bg-green text-light p-3 mb-1 chat-text-right">
                                                    <?php if($message->file_ext === 'Text'): ?>
                                                        <p><?php echo e($message->message); ?></p>
                                                    <?php elseif($message->file_ext === 'Gif'): ?>
                                                        <p><?php echo $message->message; ?></p>
                                                    <?php elseif($message->file_ext === 'Image'): ?>
                                                        <img src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" alt="Image">
                                                    <?php elseif($message->file_ext === 'Video'): ?>

                                                            <video width="320" height="240" controls>
                                                            <source src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" type="video/mp4">
                                                            <source src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" type="video/ogg">
                                                                Your browser does not support the video tag.
                                                            </video>

                                                    <?php elseif($message->file_ext === 'Audio'): ?>
                                                            <audio controls>
                                                            <source src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" type="audio/ogg">
                                                            <source src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" type="audio/mpeg">
                                                                Your browser does not support the audio element.
                                                            </audio>

                                                    <?php elseif($message->file_ext === 'Zip'): ?>
                                                            <p><?php echo e(trans('zip_file')); ?></p>
                                                            <a download href="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('download')); ?></a>
                                                    <?php endif; ?>
                                                </div>

                                                   <div class="d-flex justify-content-end align-items-center small text-muted">
                                                      <?php echo e($message->created_at->diffForHumans()); ?>

                                                       <i class="bi bi-check-all <?php echo e($message->seen === '1' ? 'text-green' : 'text-muted'); ?> mx-2"></i>
                                                       <a href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.messages.delete')); ?>','<?php echo e($message->id); ?>','<?php echo e(trans('delete_this_message')); ?>');">
                                                        <i class="bi bi-trash text-danger"></i>
                                                       </a>
                                                   </div>
                                            </div>
                                            <img src="<?php echo e(my_asset('uploads/users/'.$message->user_sender->image)); ?>" class="rounded-circle" width="40" alt="<?php echo e($message->user_sender->name); ?>">
                                        </div>

                                        <?php else: ?>

                                        <div class="d-flex align-items-start mb-3 chat-box">
                                            <img src="<?php echo e(my_asset('uploads/users/'.$message->user_sender->image)); ?>" class="rounded-circle" width="40" alt="<?php echo e($message->user_sender->name); ?>">
                                            <div class="ps-2 ms-1 chat-message">
                                                <div class="chat-text-left p-3 mb-1">
                                                    <?php if($message->file_ext === 'Text'): ?>
                                                        <p><?php echo e($message->message); ?></p>
                                                    <?php elseif($message->file_ext === 'Gif'): ?>
                                                        <p><?php echo $message->message; ?></p>
                                                    <?php elseif($message->file_ext === 'Image'): ?>
                                                        <img src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" alt="Image">
                                                    <?php elseif($message->file_ext === 'Video'): ?>

                                                            <video width="320" height="240" controls>
                                                            <source src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" type="video/mp4">
                                                            <source src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" type="video/ogg">
                                                                Your browser does not support the video tag.
                                                            </video>

                                                    <?php elseif($message->file_ext === 'Audio'): ?>
                                                            <audio controls>
                                                            <source src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" type="audio/ogg">
                                                            <source src="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" type="audio/mpeg">
                                                                Your browser does not support the audio element.
                                                            </audio>

                                                    <?php elseif($message->file_ext === 'Zip'): ?>
                                                            <p><?php echo e(trans('zip_file')); ?></p>
                                                            <a download href="<?php echo e(my_asset('uploads/attachments/'.$message->attachment_name)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('download')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="small text-muted"><?php echo e($message->created_at->diffForHumans()); ?></div>
                                            </div>
                                        </div>

                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <div id="dumppy"></div>


                                  </div><!-- Chat conversation END -->
                              </div>


                              <div id="gifModal" class="modal-gif">
                                  <div data-simplebar id="gifContent" class="modal-content-gif px-3">
                                  <input id="gifInput" class="my-3" type="text" placeholder="<?php echo e(trans('search_for_gifs')); ?>">
                                  <div id="listGifs">

                                  </div>
                                  </div>
                              </div>

                          </div>

                        <!-- Footer (Send message form) -->
                        <?php if($current_chat->status == '1'): ?>
                            <div class="chat-messages-footer pt-3 pb-3 px-4">

                                <div class="d-sm-flex me-2 mb-3 mb-sm-0">
                                    <input type="hidden" id="Sender_Name" value="<?php echo e(Auth::user()->name); ?>">
                                    <input type="hidden" id="Sender_ProfilePic" value="<?php echo e(Auth::user()->image); ?>">
                                    <input type="hidden" id="Current_Time" value="<?php echo e(Carbon\Carbon::now()->diffForHumans()); ?>">
                                    <input type="hidden" id="Chat_ID" value="<?php echo e($current_chat->id); ?>">

                                    <div class="emoji-picker-container w-100">
                                        <input type="text" name="message" id="message" class="chat-message-input w-100" data-emojiable="true" data-emoji-input="unicode" placeholder="<?php echo e(trans('type_message')); ?>">
                                    </div>
                                    <button type="submit" class="btn btn-mint d-none flex-column d-sm-inline-flex justify-content-center text-center ms-1" id="btnSend1"><i class="bi bi-send fs-xl pt-2"></i></button>
                                    <button type="submit" class="btn btn-mint w-100 d-sm-none mt-3" id="btnSend2"><i class="bi bi-send fs-xl me-2"></i> <?php echo e(trans('send')); ?></button>
                                </div>

                                <div class="mt-3 d-flex zindex-3 me-2">
                                    <a onclick="$('#uploadFile').trigger('click')" class="btn btn-icon btn-sm btn-link nav-link bg-faded-primary-hover me-2"
                                    data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="<?php echo e(trans('image_video_audio_upload')); ?>">
                                        <i class="bi bi-image fs-4"></i>
                                    </a>
                                    <button id="sendGIFButton" type="button" class="btn btn-icon btn-sm btn-link nav-link bg-faded-primary-hover me-1"
                                    data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="<?php echo e(trans('gifs_upload')); ?>">
                                        <i class="bi bi-filetype-gif fs-4"></i>
                                    </button>
                                    <a onclick="$('#zipFile').trigger('click')" class="btn btn-icon btn-sm btn-link nav-link bg-faded-primary-hover me-1"
                                    data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="<?php echo e(trans('file_uploads')); ?>">
                                        <i class="bi bi-paperclip fs-4"></i>
                                    </a>
                                </div>

                                <input type="file" name="zipFile" id="zipFile" accept="application/x-zip-compressed" class="visibility-hidden">
                                <input type="file" name="uploadFile" id="uploadFile" accept="audio/*,video/*,image/*" class="visibility-hidden">
                            </div>
                        <?php elseif($current_chat->status == '2'): ?>
                            <div class="chat-messages-footer pt-3 pb-3 px-4 text-center">
                            <h4><?php echo e(trans('chat_muted')); ?></h4>
                            <p><?php echo e(trans('this_chat_has_been_muted')); ?>, <?php echo e(trans('you_cannot_send_messages')); ?>.</p>
                            </div>
                        <?php endif; ?>

                        </div>
                      </div>
                      <!-- Chat conversation END -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function () {
            // Initializes and creates emoji set from sprite sheet
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=true]',
                assetsPath: '<?php echo e(my_asset('assets/vendors/emoji-picker/lib/img/')); ?>',
                popupButtonClasses: 'bi bi-emoji-smile fs-4'
            });

            window.emojiPicker.discover();
        });
    </script>
    <script src="<?php echo e(my_asset('assets/frontend/js/messages.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/messages/messages.blade.php ENDPATH**/ ?>