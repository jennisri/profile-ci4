<?php echo $this->extend('auth/template'); ?>

<?php echo $this->section('content') ?>
<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="card shadow-lg border-0 rounded-lg mt-5">
					<div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
					<div class="card-body">
						<!-- alert message -->
						<?= view('Myth\Auth\Views\_message_block') ?>

						<form action="<?= url_to('register') ?>" method="post">
							<?= csrf_field() ?>

							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="small mb-1" for="inputFirstName"><?=lang('Auth.email')?></label>
										<input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?> py-4" id="inputFirstName" value="<?= old('email') ?>" type="email" name="email" placeholder="<?=lang('Auth.email')?>" />
										<small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="small mb-1" for="inputLastName"><?=lang('Auth.username')?></label>
										<input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?> py-4" id="inputLastName" type="text" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>" />
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="small mb-1" for="inputPassword"><?=lang('Auth.password')?></label>
										<input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?> py-4" id="inputPassword" type="password" name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="small mb-1" for="inputConfirmPassword"><?=lang('Auth.repeatPassword')?></label>
										<input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?> py-4" id="inputConfirmPassword" type="password" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
						</form>
					</div>
					<div class="card-footer text-center">
						<div class="small"><a href="<?= url_to('login') ?>">Have an account? Go to login</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php echo $this->endSection() ?>