<?php
	require_once 'core/init.php';
		
	$validation = new Validation();
				
	if(Input::exists()) {
		if (Token::getInstance()->check(Input::get('token'))) {
			$validate = $validation->check(array(
				'name'           => array(
					'required' => true,
					'min'      => 2,
					'max'      => 50
				),
			'username'       => array(
				'required' => true,
				'min'      => 2,
				'max'      => 20,
				'unique'   => 'users'
			),
			'password'       => array(
				'required'    => true,
				'min'         => 8,
				'uppercase'   => true,
				'specialChar' => true
			),
			'Confirm_password' => array(
				'required' => true,
				'matches'  => 'password'
			)
		));
		
		if ($validate->passed()) {
			
			$salt = Hash::salt(32);
			$password = Hash::make(Input::get('password'), $salt);
			
			Session::flash('success', 'You registered successfully!!! ');
			Redirect::to('login');
			}
		}
	}
	
	Helper::getHeader('Algebra Contacts');
	
	require_once 'notifications.php';
	
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Create an account</h3>
			</div>
			<div class="panel-body">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<input type="hidden" name="token" value="<?php echo Token::getInstance()->generate(); ?>"/>
					<div class="form-group <?php echo ($validation->hasError('name')) ? 'has-error' : ''; ?>">
						<label for="name" class="control-label">Name*</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php echo escape(Input::get('name'))?>">
						<?php echo ($validation->hasError('name')) ? '<p class="text-danger">'.$validation->hasError('name').'</p>' : '';?>
					</div>
					<div class="form-group <?php echo ($validation->hasError('username')) ? 'has-error' : ''; ?>">
						<label for="username" class="control-label">Username*</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autocomplete="off" value="<?php echo escape(Input::get('username'))?>">
						<?php echo ($validation->hasError('username')) ? '<p class="text-danger">'.$validation->hasError('username').'</p>' : '';?>
					</div>
					<div class="form-group <?php echo ($validation->hasError('password')) ? 'has-error' : ''; ?>">
						<label for="password" class="control-label">Password*</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Choose a password">
						<?php echo ($validation->hasError('password')) ? '<p class="text-danger">'.$validation->hasError('password').'</p>' : '';?>
					</div>
					<div class="form-group <?php echo ($validation->hasError('Confirm_password')) ? 'has-error' : ''; ?>">
						<label for="Confirm_password" class="control-label">Confirm Password*</label>
						<input type="password" class="form-control" id="Confirm_password" name="Confirm_password" placeholder="Enter your password again">
						<?php echo ($validation->hasError('Confirm_password')) ? '<p class="text-danger">'.$validation->hasError('Confirm_password').'</p>' : '';?>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Create an account</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	Helper::getFooter();
?>