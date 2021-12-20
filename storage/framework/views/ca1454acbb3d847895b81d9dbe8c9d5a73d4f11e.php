<?php if(Route::has('products.index','products.show')): ?>

    <!-- Hero -->
    <?php if(isset($categorydata)): ?>
<?php if($categorydata[0]->catname == 'Vidéo' ?? 'Vidéo'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Streaming.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">Streamez en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">Streamez moins cher</h2>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($categorydata[0]->catname == 'Audio'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Streaming.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">Streamez en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">Streamez moins cher</h2>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($categorydata[0]->catname == 'VPN'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Sécurité.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">La sécurité en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">La sécurité moins cher</h2>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($categorydata[0]->catname == 'Antivirus'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Sécurité.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">La sécurité en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">La sécurité moins cher</h2>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($categorydata[0]->catname == 'Gaming'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Gaming.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">Le gaming en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">Jouez moins cher</h2>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($categorydata[0]->catname == 'Cloud'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Cloud.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">Le cloud en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">Stockez moins cher</h2></div>
        </div>
    </div>

<?php endif; ?>
<?php if($categorydata[0]->catname == 'Presse'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Presse.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">La presse en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">Les infos moins cher</h2>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php if($categorydata[0]->catname == 'Bibliothèque'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Bibliothèque.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">La bibliothèque en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">La culture moins cher</h2>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php if($categorydata[0]->catname == 'Magazine'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Magazine.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">Magazines en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">Magazinez moins cher</h2>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php if($categorydata[0]->catname == 'Apprentissage'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Apprentissage.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">Apprenez en illimité</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">Apprenez moins cher</h2>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php if($categorydata[0]->catname == 'Autres'): ?>
    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Autres.png')">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">D'autres abonnements ...</h1>
                <h2 class="h4 fw-normal text-white-75 mb-0">Toujours en illimité !</h2>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php else: ?>


        <?php if($getlogcat->catname == 'Vidéo' ?? ''): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Streaming.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">Streamez en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Streamez moins cher</h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($getlogcat->catname == 'Audio'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Streaming.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">Streamez en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Streamez moins cher</h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($getlogcat->catname == 'VPN'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Sécurité.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">La sécurité en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">La sécurité moins cher</h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($getlogcat->catname == 'Antivirus'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Sécurité.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">La sécurité en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">La sécurité moins cher</h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($getlogcat->catname == 'Gaming'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Gaming.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">Le gaming en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Jouez moins cher</h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($getlogcat->catname == 'Cloud'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Cloud.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">Le cloud en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Stockez moins cher</h2></div>
                </div>
            </div>

        <?php endif; ?>
        <?php if($getlogcat->catname == 'Presse'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Presse.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">La presse en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Les infos moins cher</h2>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <?php if($getlogcat->catname == 'Bibliothèque'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Bibliothèque.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">La bibliothèque en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">La culture moins cher</h2>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <?php if($getlogcat->catname == 'Magazine'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Magazine.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">Magazines en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Magazinez moins cher</h2>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <?php if($getlogcat->catname == 'Apprentissage'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Apprentissage.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">Apprenez en illimité</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Apprenez moins cher</h2>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <?php if($getlogcat->catname == 'Autres'): ?>
            <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background-Autres.png')">
                <div class="bg-primary-dark-op">
                    <div class="content content-full text-center py-6">
                        <h1 class="h2 text-white mb-2">D'autres abonnements ...</h1>
                        <h2 class="h4 fw-normal text-white-75 mb-0">Toujours en illimité !</h2>
                    </div>
                </div>
            </div>

        <?php endif; ?>



    <?php endif; ?>


<!-- END Hero -->
<?php endif; ?>

<?php /**PATH /Users/anas/PROJECT/resources/views/layouts/banner.blade.php ENDPATH**/ ?>