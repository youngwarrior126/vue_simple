<?php $__env->startSection('content'); ?>

<div class="container">

<div class="col-sm-8">
	
	<h1>Register</h1>


	<form method="POST" action="/register">
		<?php echo e(csrf_field()); ?>


		<div class="form-group">

			<label for="username">UserName: </label>
			<input type="text" class="form-control" id="username" name="username" required>

		</div>

		<div class="form-group">
		
			<label for="Email">Email: </label>
			<input type="text" class="form-control" id="email" name="email" required="">

		</div>

		<div class="form-group">

			<label for="fullname">Full name: </label>
			<input type="text" class="form-control" id="fullname" name="fullname" required>

		</div>

		<div class="form-group">

			<label for="phone">Phone number: </label>
			<input type="text" class="form-control" id="phone" name="phone" required>

		</div>

		<div class="form-group">

			<input type="hidden" class="form-control" id="role_id" name="role_id" value="2">

		</div>
	
		<div class="form-group">
		
			<label for="password">Password: </label>
			<input type="password" class="form-control" id="password" name="password" required>

		</div>

		<div class="form-group">
		
			<label for="password_confirmation">Confirm Password: </label>
			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>

		</div>


		<div class="form-group">
		
			<button type="submit" class="form-control btn btn-primary">Register</button>

		</div>

		<a href="/login">Already a user? Sign In</a>

		<?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</form>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.basic', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>