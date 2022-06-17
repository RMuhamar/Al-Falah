<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Course
| Module                : Dashboard
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 24 May 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Course extends MY_Controller
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

	public function index($slug = "", $course_id = "")
	{
		
		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'Kursus';
		$page_data['content'] = 'course';
	 	$this->load->view('template/template', $page_data);
	}
	
	public function detail()
	{
		
		
		$page_data['meta_keywords'] = 'Kursus';
		$page_data['meta_description'] = 'Kursus';
		
		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'Kursus';
		$page_data['content'] = 'course';
		$this->load->view('template/template', $page_data);
	}
}
