<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: NEWS
| Module                : Guest
| Version               : 1.0;	
| Author				: Rayza Muhamar
| E-mail				: Rmuhamar@gmail.com
| Created               : 15 Juni 2022
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class News extends MY_Controller
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
		# Get Tabel Course
		unset($datato);
		$datato['table'] 			= 'gurumaya.news';
		
		$page_data['get_data']		= $this->crud->view_data($datato);
		
		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'News';
		$page_data['content'] = 'news';
		$this->load->view('template/template', $page_data);
	}

	public function view_pendidikan($id){
        unset($datato);
		$datato['table'] 			= 'gurumaya.pendidikan';
		$datato['where']			= array(
			'gurumaya.pendidikan.id_pendidikan' => $id
		);

		return $this->crud->view_data($datato);

	}
}
