<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: History_login
| Module                : Dashboard
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 24 May 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class History_login extends MY_Controller
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
	}

	public function index()
	{
		header('location:'.base_url().'dashboard/history_login/web');
	}
	
	public function web()
	{
		$sess_user_id				= base64_decode($this->session->userdata('user_id'));

		unset($datato);
		$datato['table'] 			= 'gurumaya.user';
		$datato['where']			= array(
			'gurumaya.user.user_id' => $sess_user_id
		);
		$query = $this->crud->view_data($datato);
		if($query->num_rows())
		{
			$row 							= $query->row();
			$page_data['user_id']			= $row->user_id;
			$page_data['user_avatar']		= $row->user_avatar;
			$page_data['user_fullname']		= $row->user_fullname;
		}

		unset($datato);
		$datato['table'] 			= 'gurumaya.log_login_web';
		$datato['where']			= array(
			'gurumaya.log_login_web.user_id' => $sess_user_id
		);
		$page_data['get_data']		= $this->crud->view_data($datato);

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'Riwayat Login (Web)';
		$page_data['content'] 		= 'history_login_web';
		$this->load->view('template/template', $page_data);
	}
	
	public function mobile()
	{

		$sess_user_id				= base64_decode($this->session->userdata('user_id'));

		unset($datato);
		$datato['table'] 			= 'gurumaya.user';
		$datato['where']			= array(
			'gurumaya.user.user_id' => $sess_user_id
		);
		$query = $this->crud->view_data($datato);
		if($query->num_rows())
		{
			$row 							= $query->row();
			$page_data['user_id']			= $row->user_id;
			$page_data['user_avatar']		= $row->user_avatar;
			$page_data['user_fullname']		= $row->user_fullname;
		}

		unset($datato);
		$datato['table'] 			= 'gurumaya.log_login_mobile';
		$datato['where']			= array(
			'gurumaya.log_login_mobile.user_id' => $sess_user_id
		);
		$page_data['get_data']		= $this->crud->view_data($datato);


		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'Riwayat Login (Mobile)';
		$page_data['content'] 		= 'history_login_mobile';
		$this->load->view('template/template', $page_data);
	}
	
	
}
