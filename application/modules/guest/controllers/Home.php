<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: HOME
| Module                : Guest
| Version               : 1.0;	
| Author				: Rayza Muhamar
| E-mail				: Rmuhamar@gmail.com
| Created               : 15 Juni 2022
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
	}

	public function index()
	{
		# Get Tabel Course
		unset($datato);
		$datato['table'] 								= 'gurumaya.news';
		$datato['limit']								= array(3,0);
		
		$page_data['get_data']							= $this->crud->view_data($datato);

		unset($datato);
		$datato['table'] 								= 'gurumaya.langkah_pendaftaran';

		$page_data['get_profile']						= $this->get_profile();
		
		$page_data['get_data_langkah_pendaftaran']		= $this->crud->view_data($datato);

		$page_data['get_profile_pendidikan'] 			= $this->get_profile_pendidikan();

		$page_data['get_galery']						= $this->get_galery();

		$page_data['get_pengurus'] 						= $this->get_pengurus();
		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'Home';
		$page_data['content'] = 'home';
		$this->load->view('template/template', $page_data);
	}

	public function get_profile(){
		unset($datato);
		$datato['table'] 			= 'gurumaya.profile';

		return $this->crud->view_data($datato);
	}

	public function get_galery(){
		unset($datato);
		$datato['table']			= 'gurumaya.galery';
		$datato['table_join'] 		= array(
			'gurumaya.category_galery'
		);
		$datato['table_join_on']	= array(
			'gurumaya.galery'
		);
		$datato['join_id']			= array(
			'category_id'
		);
		$datato['join_type']		= array(
			'inner'
		);
		$datato['limit']			=array(8,0);	
		
		return $this->crud->view_data($datato);
	}

	public function get_profile_pendidikan(){
		unset($datato);
		$datato['table'] 			= 'gurumaya.category_pendidikan';

		return $this->crud->view_data($datato);
	}

	public function get_pengurus(){
		unset($datato);
		$datato['table']			= 'gurumaya.pengurus';
		$datato['limit']			=array(8,0);	
		
		return $this->crud->view_data($datato);
	}
}
