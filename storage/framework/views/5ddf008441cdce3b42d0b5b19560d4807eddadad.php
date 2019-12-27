<?php $__env->startSection('content'); ?>

<div class="container">

	<div class="col-md-8">
	
		<h1>Sign In</h1>

		<form method="POST" action="/login">
			
			<?php echo e(csrf_field()); ?>



			<div class="form-group">
				
				<label for="username">Username: </label>
				<input type="text" class="form-control" id="username" name="username">

			</div>

			<div class="form-group">
				
				<label for="password">Password: </label>
				<input type="password" class="form-control" id="password" name="password">

			</div>

			<div class="form-group">
				
				<button type="submit" class="form-control btn btn-primary">Sign In</button>

			</div>

			<div class="form-group">

				<a href="/register">Not Registered? Sign up</a>

			</div>

			<?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			

		</form>

	</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.basic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>