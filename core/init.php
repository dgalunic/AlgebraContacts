<?php
	error_reporting(E_ALL);
	ini_set('display_errors',TRUE);
	ini_set('display_startup_errors',TRUE);

	session_start();

	spl_autoload_register(function ($class) {
		require_once 'classes/' . $class . '.php';
	});

	require_once 'functions/sanitize.php';

	$config = Config::get('config/session');
	$cookies_name = $config['remember']['cookie_name'];
	$session_name = $config['sessions']['session_name'];
	
	if(Cookie::exists($cookies_name) && !Session::exists($session_name)){
		
		$hash = Cookie::get($cookies_name);
		$hashCheck = DB::getInstance()->get('*', 'sessions', array('hash','=',$hash));
		
		if($hashCheck->count()) {
			
			$user = new User($hashCheck->first()->user_id);
			$user->login();
			
		}

	}
