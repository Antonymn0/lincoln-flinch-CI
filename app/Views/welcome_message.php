
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- CONTENT -->

<section class="vh-100  align-items-center align-content-center">
	<div class="card row align-items-center align-content-center h-100 w-75 mx-auto rounded" style="background-color:#fff7f7;">
		<div class="my-auto mx-auto w-50 text-center">
			<h1 class="p-2 m-0">We are Lincoln flinch. </h1> 
			<p >  A vetted law firm providing law services to both individuals and institutions.</p>

			<p class="text-center p-3 mt-3 ">
				<a href="/register" class=" btn btn-default border mr-2" > Register</a>
				<a href="/login" class=" btn btn-default border ml-2" > Login</a>
			</p>
		</div>      
	</div>
</section>

<?= $this->endSection() ?>