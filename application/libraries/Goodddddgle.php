<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Google extends Google_Client {
	function __construct() {
		parent::__construct(); 
		$this->setAuthConfigFile(APPPATH . 'client_secret.json');
		$this->setRedirectUri('https://dev.pertamina-ptc.com/gurumaya/guest/home');
		$this->setScopes(array(
		"https://www.googleapis.com/auth/plus.login",
		"https://www.googleapis.com/auth/userinfo.email",
		"https://www.googleapis.com/auth/userinfo.profile",
		"https://www.googleapis.com/auth/plus.me",
		)); 
	}
}