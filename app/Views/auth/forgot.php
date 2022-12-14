<?php echo $this->extend('auth/template'); ?>
<?php echo $this->section('content') ?>
<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="card shadow-lg border-0 rounded-lg mt-5">
					<div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
					<div class="card-body">
						<div class="small mb-3 text-muted"><?=lang('Auth.enterEmailForInstructions')?></div>

						<!-- alert message -->
						<?= view('Myth\Auth\Views\_message_block') ?>

						<form action="<?= url_to('forgot') ?>" method="post">
							<?= csrf_field() ?>

							<div class="form-group">
								<label class="small mb-1" for="inputEmailAddress"><?=lang('Auth.emailAddress')?></label>
								<input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?> py-4" id="inputEmailAddress" type="email" name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" />
								<div class="invalid-feedback">
									<?= session('errors.email') ?>
								</div>

							</div>

							<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
								<a class="small" href="/login">Return to login</a>
								<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php echo $this->endSection() ?>
