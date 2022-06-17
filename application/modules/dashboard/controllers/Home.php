<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Home
| Module                : Dashboard
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 24 May 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	# Set Variabel Global	
	# -------------------------------------------------------------------     
	# URI Segment


	function __construct()
	{
		parent::__construct();
		# Set Model 
		# -------------------------------------------------------------------   


		# Set Library 
		# -------------------------------------------------------------------			

		# Set Helper 
		# -------------------------------------------------------------------


		# Get Info User from Helper "whoami"
		# -------------------------------------------------------------------


		# Check User Access Module
		# -------------------------------------------------------------------


		# For Form Validation for HMVC 
		// $this->form_validation->CI = &$this;
		
		if ($this->session->userdata('logged_in') == "") 
		{	
			$this->session->set_flashdata('flash_message', 'Silahkan login terlebih dahulu.');
			redirect(base_url() . 'guest/login');
		}
		
	}

	public function index()
	{
		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'Home';
		$page_data['content'] = 'home';
		$this->load->view('template/template', $page_data);
	}
}
