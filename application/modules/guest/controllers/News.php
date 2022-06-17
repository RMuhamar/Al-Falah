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

	public function view_detail(){
		# Decrypt ID
		# -------------------------------------------------------------------
		$decrypt_id					= str_replace(array('-', '_', '~'), array('+', '/', '='), $this->uri->segment('4'));
		$id							= $this->encrypt->decode($decrypt_id);

		unset($datato);
		$datato['table'] 			= 'gurumaya.news';
		$datato['where']			= array(
			'gurumaya.news.id' => $id
		);

		$page_data['get_data']		= $this->crud->view_data($datato);

		$page_data['page_title'] = 'News Detail';
		$page_data['content'] = 'news_detail';
		$this->load->view('template/template', $page_data);
	}
}
