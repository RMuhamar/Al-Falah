<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends CI_Controller {
 
	public function index()
	{

		$string = "Here is a nice text string about nothing in particular.";
echo highlight_phrase($string, "nice text", '<span style="color:#990000;">', '</span>');
		//$this->load->view('welcome_message');
	}
 
}