<?php echo $this->extend('auth/template'); ?>
<?php echo $this->section('content') ?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    <div class="card-body">
                        <!-- ini alert message -->
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        
                        <form action="<?= url_to('login') ?>" method="post">
                            <?= csrf_field() ?>

                            <?php if ($config->validFields === ['email']): ?>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress"><?=lang('Auth.email')?></label>
                                    <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?> py-4" id="inputEmailAddress" type="email" name="login" placeholder="<?=lang('Auth.email')?>" />

                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress"><?=lang('Auth.emailOrUsername')?></label>
                                    <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?> py-4" id="inputEmailAddress" type="text" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>" />

                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword"><?=lang('Auth.password')?></label>
                                <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?> py-4" id="inputPassword" type="password" name="password" placeholder="<?=lang('Auth.password')?>" />
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>

                            <?php if ($config->allowRemembering): ?>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input <?php if (old('remember')) : ?> checked <?php endif ?>" id="rememberPasswordCheck" name="remember" type="checkbox" />
                                        <label class="custom-control-label" for="rememberPasswordCheck"><?=lang('Auth.rememberMe')?></label>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="<?= url_to('forgot') ?>">Reset Password</a>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
<?php echo $this->endSection() ?>
