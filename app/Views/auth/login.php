<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- CONTENT -->

<section class="d-flex h-100">	 
    <div class="container col-md-6 border rounded my-5 p-5 mx-auto">
		<?php if(session()->getFlashdata('message')):?>
			<p class="alert alert-danger w-80 text-center p-1 mx-auto mt-0">
				<?= session()->getFlashdata('message') ?>
			</p>
		<?php endif;?>

        <h2 class="text-center pt-0 mt-0">Login</h2>
        <form action="/login" method="POST">
            <div class="align-items-center align-content-center">                
                <label for="email" >Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                <label for="password"> Password </label>
                <input type="password" name="password" id="password" class="form-control">
               
                <input type="submit" value="Login" class="btn btn-warning m-3"> or 
                <a href="/register" class="btn btn-sm m-3 "> <em> <u> Register </u> </em> </a>
            </div>
        </form>
    </div>
</section>




<?= $this->endSection() ?>