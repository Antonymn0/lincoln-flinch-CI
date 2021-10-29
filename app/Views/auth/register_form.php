<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<!-- CONTENT -->

<section class="d-flex h-100 p-5">
    <div class="container col-md-6 border rounded my-3 p-5 mx-auto">
		<?php if(session()->getFlashdata('message')):?>
			<p class="alert alert-danger w-50 text-center p-1 mx-auto mt-0">
				<?= session()->getFlashdata('message') ?>
			</p>
		<?php endif;?>
        <h2 class="text-center pt-0 mt-0">Register</h2>
        <form action="/register" method="POST">
            <div class="align-items-center align-content-center">
				<div class="form-group">
					 <label for="name"> Name</label>
					<input type="text" name="name" id="name" placeholder="name" class="form-control">
					<?php if (isset($validation)): ?>
                        <p class="text-danger small text-center m-0 p-0">
                        <small><?=  $validation->getError('name'); ?> </small> 
                        </p>
                    <?php endif; ?>
				</div>
                <div class="form-group"> 
					<label for="email" >Email</label>
					<input type="email" name="email" id="email" placeholder="Email" class="form-control">
					<?php if (isset($validation)): ?>
							<p class="text-danger small text-center m-0 p-0">
                        <small><?=  $validation->getError('email'); ?> </small> 
                        </p>
                    <?php endif; ?>
				 </div>
                <div class="form-group"> 
					<label for="password"> Password </label>
					<input type="password" name="password" id="password" class="form-control">
					<?php if (isset($validation)): ?>
                        <p class="text-danger small text-center m-0 p-0">
                        <small><?=  $validation->getError('password'); ?> </small> 
                        </p>
                    <?php endif; ?>
				</div>
                <div class="form-group">
					<label for="confirm_password"> Confirm Password </label>
					<input type="password" name="confirm_password" id="confirm_password" class="form-control">
					<?php if (isset($validation)): ?>
						<p class="text-danger small text-center m-0 p-0">
						<small><?=  $validation->getError('confirm_password'); ?> </small> 
						</p>
						<?php endif; ?>
				</div>
                
                <input type="submit" value="Register" class="btn btn-warning m-3"> or
				<a href="/login" class="btn btn-sm m-3 "> <em> <u> Login </u> </em> </a>
            </div>
        </form>
    </div>
</section>

<?= $this->endSection() ?>

