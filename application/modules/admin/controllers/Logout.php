<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Logout
| Module                : Admin
| Version               : 1.0;
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 12 July 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends MY_Controller
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
		$this->form_validation->CI = &$this;

		# Cache Control
		# -------------------------------------------------------------------
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}


	public function index()
	{
		#$this->session_destroy();

		$this->session->sess_destroy();

		$this->session->set_flashdata('flash_message', 'Anda berhasil keluar dari sistem.');
		redirect(site_url('guest/login'), 'refresh');
	}

}
