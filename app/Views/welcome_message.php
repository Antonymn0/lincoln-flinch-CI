
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- CONTENT -->

<section class="d-flex h-100 p-5">
    <div class="container col-md-6 border rounded my-3 p-5 mx-auto" style="background-color:#fff7f7;">
		<div class="my-auto mx-auto  text-center">
			<h1 class="p-2 m-0">We are Lincoln flinch. </h1> 
			<p >  A vetted law firm providing law services to both individuals and institutions.</p>

			<p class="text-center p-3 mt-3 ">
				<a href="/register" class=" btn btn-default border " > Register</a>
				<a href="/login" class=" btn btn-default border " > Login</a>
			</p>
		</div>      
	</div>
</section>

<?= $this->endSection() ?>