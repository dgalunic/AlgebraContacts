<?php

class Hash
{
	public static function make($input, $salt = '')
	{
		return hash('sha256', $input . $salt);
	}
	
	public static function salt($length)
	{
		return mcrypt_create_iv($length);
	}
}