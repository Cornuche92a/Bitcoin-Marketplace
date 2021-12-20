<?php $__env->startSection('content'); ?>
        <!-- Hero -->
        <div class="bg-image" style="background-image: url('assets/media/photos/background-shop.jpg');">
            <div class="bg-primary-dark-op">
                <div class="content content-full text-center py-6">
                    <h1 class="h2 text-white mb-2">Streamez en illimité</h1>
                    <h2 class="h4 fw-normal text-white-75 mb-0">Streamez moins cher</h2>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->

        <div class="content content-full content-boxed"><!-- New Arrivals -->
            <h2 class="content-heading">Les disponibilités</h2>
            <div class="row items-push">
                <div class="col-md-6 col-xl-4">
                    <div class="block block-rounded h-100 mb-0">
                        <div class="block-content p-1">
                            <div class="options-container">
                                <img class="img-fluid options-item" src="assets/media/photos/font-spotify.jpg" alt="">
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_store_product.html">
                                            View
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                                            <i class="fa fa-plus text-success me-1"></i> Add to cart
                                        </a>
                                        <div class="text-warning mt-3">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-alt"></i>
                                            <span class="text-white">(35)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="mb-1">
                                <div class="fw-semibold float-end ms-1">$9</div>
                                <a class="h6" href="be_pages_ecom_store_product.html">Iconic</a>
                            </div>
                            <p class="fs-sm text-muted">Beautifully crafted icon set</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="block block-rounded h-100 mb-0">
                        <div class="block-content p-1">
                            <div class="options-container">
                                <img class="img-fluid options-item" src="assets/media/photos/netflix-font.jpg" alt="">
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <a class="btn btn-sm btn-alt-secondary" href="<?php echo e(route('products.show',[$uri = 'netflix'])); ?>">
                                            View
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                                            <i class="fa fa-plus text-success me-1"></i> Add to cart
                                        </a>
                                        <div class="text-warning mt-3">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span class="text-white">(48)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="mb-1">
                                <div class="fw-semibold float-end ms-1">$16</div>
                                <a class="h6" href="be_pages_ecom_store_product.html">Mailday</a>
                            </div>
                            <p class="fs-sm text-muted">Pro email templates</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="block block-rounded h-100 mb-0">
                        <div class="block-content p-1">
                            <div class="options-container">
                                <img class="img-fluid options-item" src="assets/media/various/ecom_product3.png" alt="">
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_store_product.html">
                                            View
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                                            <i class="fa fa-plus text-success me-1"></i> Add to cart
                                        </a>
                                        <div class="text-warning mt-3">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-alt"></i>
                                            <span class="text-white">(19)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="mb-1">
                                <div class="fw-semibold float-end ms-1">$75</div>
                                <a class="h6" href="be_pages_ecom_store_product.html">Office Suite</a>
                            </div>
                            <p class="fs-sm text-muted">The best productivity apps</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a class="fs-sm fw-semibold link-fx" href="be_pages_ecom_store_products.html">View More New Arrivals..</a>
            </div>
            <!-- END New Arrivals -->


        </div>
        <!-- END Page Content -->

        <!-- Explore Store -->
        <div class="bg-body-dark">
            <div class="content content-full">
                <div class="my-5 text-center">
                    <h3 class="h4 mb-4">
                        Plus de <strong>10.000</strong> comptes en vente !
                    </h3>
                    <a class="btn btn-primary px-4 py-2" href="/shop">
                        Découvrir les ventes <i class="fa fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END Explore Store -->
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/Products.blade.php ENDPATH**/ ?>