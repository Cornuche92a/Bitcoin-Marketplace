<?php $__env->startSection('registerform'); ?>
    <div id="page-container" class="dark-mode">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="hero-static d-flex align-items-center">
                <div class="content">
                    <div class="row justify-content-center push">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <!-- Sign Up Block -->
                            <div class="block block-rounded mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Create Account</h3>
                                    <div class="block-options">
                                        <a class="btn-block-option fs-sm" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#one-signup-terms">View Terms</a>
                                        <a class="btn-block-option" href="op_auth_signin.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Sign In">
                                            <i class="fa fa-sign-in-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                        <h1 class="h2 mb-1">OneUI</h1>
                                        <p class="fw-medium text-muted">
                                            Please fill the following details to create a new account.
                                        </p>

                                        <!-- Sign Up Form -->
                                        <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        <form class="js-validation-signup" action="be_pages_auth_all.html" method="POST">
                                            <div class="py-3">
                                                <div class="mb-4">
                                                    <input type="text" class="form-control form-control-lg form-control-alt" id="signup-username" name="signup-username" placeholder="Username">
                                                </div>
                                                <div class="mb-4">
                                                    <input type="email" class="form-control form-control-lg form-control-alt" id="signup-email" name="signup-email" placeholder="Email">
                                                </div>
                                                <div class="mb-4">
                                                    <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password" name="signup-password" placeholder="Password">
                                                </div>
                                                <div class="mb-4">
                                                    <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" name="signup-password-confirm" placeholder="Confirm Password">
                                                </div>
                                                <div class="mb-4">
                                                    <a for="passrecovery" class="fw-medium text-muted">Recovery method</a>
                                                    <select name="passrecovery" id="pet-select">
                                                        <option value="passphrase">Secret passphrase</option>
                                                        <option value="email">E-mail</option>
                                                        <option value="pin">4 Digits pin</option>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="signup-terms" name="signup-terms">
                                                        <label class="form-check-label" for="signup-terms">I agree to Terms &amp; Conditions</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6 col-xl-5">
                                                    <button type="submit" class="btn w-100 btn-alt-success">
                                                        <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Sign Up
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END Sign Up Form -->
                                    </div>
                                </div>
                            </div>
                            <!-- END Sign Up Block -->
                        </div>
                    </div>
                    <div class="fs-sm text-muted text-center">
                        <strong>OneUI 5.1</strong> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>

                <!-- Terms Modal -->
                <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                        <div class="modal-content">
                            <div class="block block-rounded block-transparent mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Terms &amp; Conditions</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                </div>
                                <div class="block-content block-content-full text-end bg-body">
                                    <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">I Agree</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Terms Modal -->
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/Register.blade.php ENDPATH**/ ?>