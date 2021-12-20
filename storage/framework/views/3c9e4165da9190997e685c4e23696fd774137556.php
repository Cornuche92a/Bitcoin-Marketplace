<?php $pagename = ' Support'; ?>

<?php $__env->startSection('content'); ?>

    <?php if(session('sent')): ?>
        <div class="toast-container position-absolute top-0 end-0 p-3">
            <!-- Toast Example 1 -->
            <div id="messagesent" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="si si-bubble text-primary me-2"></i>
                    <strong class="me-auto">Support</strong>
                    <small class="text-muted">à l'instant</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?php echo e(session('sent')); ?>

                </div>
            </div>
            <!-- END Toast Example 1 -->
        </div>
    <?php endif; ?>


    <div class="content content-full content-boxed">
        <h2 class="content-heading"><i class="fa fa-life-ring"></i> Support</h2>

        <div class="row">
            <div class="col-xl-6">
                <!-- Striped Table -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Demandes ouvertes</h3>
                    </div>
                    <div class="block-content table-responsive">
                        <table class="table table-striped table-vcenter table-responsive">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th class="text-center" style="width: 15%;">etat</th>
                                <th class="text-center" style="width: 100px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($tickets->where('state_id','=','1')->isEmpty()): ?>
                                <tr>
                                    <td class="fw-semibold fs-sm text-center">
                                        #
                                    </td>
                                    <td class="fw-semibold fs-sm">
                                        Aucune demande
                                    </td>
                                    <td class="text-center">
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Aucun</span>

                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($ticket->state_id == 1): ?>
                                        <tr>
                                            <th class="text-center" scope="row"><img src="<?php echo e(asset('assets/media/photos/')); ?>/<?php echo e($ticket->order->log->category->iconurl); ?>" style="height: <?php echo e($ticket->order->log->category->iconstylesize); ?>px"></th>
                                            <td class="text-center">
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill <?php echo e($ticket->state->style); ?>"><?php echo e($ticket->state->name); ?></span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <form action="<?php echo e(action('Support@show')); ?>" method="POST">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                                                        <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled">
                                                            <i class="fa fa-fw fa-eye"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                            <?php endif; ?>

                        </table>
                    </div>

                </div>
                <!-- END Default Table -->

            </div>
            <div class="col-xl-6">
                <!-- Striped Table -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Anciennes demandes</h3>
                    </div>
                    <div class="block-content table-responsive">
                        <table class="table table-striped table-vcenter table-responsive">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th class="text-center" style="width: 15%;">etat</th>
                                <th class="text-center" style="width: 100px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                    <?php if($tickets->where('state_id','!=','1')->isEmpty()): ?>
                                        <tr>
                                            <td class="fw-semibold fs-sm text-center">
                                                #
                                            </td>
                                            <td class="fw-semibold fs-sm">
                                                Aucune demande
                                            </td>
                                            <td class="text-center">
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Aucun</span>

                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ticket->state_id != 1): ?>


                                            <tr>
                                            <th class="text-center" scope="row"><img src="<?php echo e(asset('assets/media/photos/')); ?>/<?php echo e($ticket->order->log->category->iconurl); ?>" style="height: <?php echo e($ticket->order->log->category->iconstylesize); ?>px"></th>

                                            <td class="text-center">
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill <?php echo e($ticket->state->style); ?>"><?php echo e($ticket->state->name); ?></span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <form action="<?php echo e(action('Support@show')); ?>" method="POST">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                                                        <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled">
                                                            <i class="fa fa-fw fa-eye"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                    <!-- END Striped Table -->
                </div>
            <?php if(isset($conversations)): ?>
                <div class="content" id="content-message-ticket">
                    <!-- Discussion -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Conversation</h3>
                            <div class="block-options">
                                <a class="btn-block-option me-2" href="#forum-reply-form">
                                    <i class="fa fa-reply me-1"></i> Répondre
                                </a>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <table class="table table-borderless table-responsive">
                                <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr class="bg-body-light">
                                        <td class="d-none d-sm-table-cell"></td>
                                        <td class="fs-sm text-muted">

                                            <a class="fw-semibold"><?php echo e($message->user->username); ?></a> le <span class="text-muted"><?php echo e($message->created_at); ?></span>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td class="d-none d-sm-table-cell text-center" style="width: 140px;">
                                            <p>
                                                <a href="be_pages_generic_profile.html">
                                                    <img class="img-avatar" src="<?php echo e(asset('assets/media/avatars/'.$message->user->avatar()->select('avatar')->first()->avatar)); ?>" alt="">
                                                </a>
                                            </p>
                                            <p class="fs-sm fw-medium"><?php echo e($message->user->orders()->count()); ?> achats</p>

                                        </td>
                                        <td>
                                            <p><?php echo e($message->message->message); ?> </p>

                                        </td>
                                    </tr>



                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    <?php if($conversations[0]->ticket->state_id == 1): ?>
                                    <tr class="table-active" id="forum-reply-form">
                                        <td class="d-none d-sm-table-cell"></td>
                                        <td class="fs-sm text-muted">
                                            <a class="fw-semibold" ><?php echo e(auth()->user()->username); ?></a> Maintenant
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <p>


                                            </p>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(action('Support@reply')); ?>" method="POST" >
                                                <?php echo e(csrf_field()); ?>

                                                <div class="mb-4">
                                                    <!-- CKEditor 5 Classic (js-ckeditor5-classic in Helpers.jsCkeditor5()) -->
                                                    <!-- For more info and examples you can check out http://ckeditor.com -->
                                                    <div id="js-ckeditor5-classic" style="display: none;"></div>

                                                    <input type="hidden" name="ticket_id" value="<?php echo e($concern); ?>">
                                                </div>
                                                <div class="ck ck-editor__main" role="presentation">
                                                    <textarea class="form-control" id="message" name="message" rows="5" ></textarea>

                                                </div>


                                                <div class="mb-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-alt-primary">

                                                        <i class="fa fa-reply me-1 opacity-50"></i> Répondre
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>

                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/support.blade.php ENDPATH**/ ?>