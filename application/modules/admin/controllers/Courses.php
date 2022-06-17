<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Courses
| Module                : Admin
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 29 April 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends MY_Controller
{

	# Set Variabel Global	
	# -------------------------------------------------------------------     
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'courses';


	function __construct()
	{
		parent::__construct();
		# Set Model 
		# -------------------------------------------------------------------   
		$this->load->model('admin_model');

		# Set Library 
		# -------------------------------------------------------------------			
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('upload');

		# Set Helper 
		# -------------------------------------------------------------------
		$this->load->helper('form');

		# Get Info User from Helper "whoami"
		# -------------------------------------------------------------------


		# Check User Access Module
		# -------------------------------------------------------------------


		// if ($this->session->userdata('logged_in') == "") 
		// {	
		// $this->session->set_flashdata('flash_message', 'Silahkan login terlebih dahulu.');
		// redirect(base_url() . 'guest/login');
		// }

		# For Form Validation for HMVC 
		$this->form_validation->CI = &$this;

		# Cache Control
		# -------------------------------------------------------------------
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}

	public function index()
	{
		# Count Course
		# -------------------------------------------------------------------
		/*
			Note : Fungsi untuk menghitung jumlah total kursus dengan status kursus dan tipe kursus
		*/
		# Course (Draft)
		unset($datato);
		$datato['table'] 			= 'gurumaya.course';
		$datato['where'] 			= array('gurumaya.course.course_status' => '0');
		$query 						= $this->crud->view_data($datato);
		$page_data['total_course_draft'] =  $query->num_rows();
		
		# Course (Pending)
		unset($datato);
		$datato['table'] 			= 'gurumaya.course';
		$datato['where'] 			= array('gurumaya.course.course_status' => '1');
		$query 						= $this->crud->view_data($datato);
		$page_data['total_course_pending']=  $query->num_rows();
		
		# Course (Posting)
		unset($datato);
		$datato['table'] 			= 'gurumaya.course';
		$datato['where'] 			= array('gurumaya.course.course_status' => '2');
		$query 						= $this->crud->view_data($datato);
		$page_data['total_course_posting']=  $query->num_rows();
		
		
		# Dropdown
		# -------------------------------------------------------------------
		/*
			Note : Fungsi untuk menampilkan filter dropdown category, course_type dari database
		*/
		
		# Category
		unset($datato);
		$datato['table'] 			= 'gurumaya.category';
		$datato['order'] 			= array('gurumaya.category.category_name');
		$datato['order_type'] 		= array('asc');
		$page_data['dropdown_category'] = $this->crud->view_data($datato);
		
		# course Type
		unset($datato);
		$datato['table'] 			= 'gurumaya.course_type';
		$datato['order'] 			= array('gurumaya.course_type.course_type_name');
		$datato['order_type'] 		= array('asc');
		$page_data['dropdown_course_type'] = $this->crud->view_data($datato);
		
		
		# Get Tabel Course
		# -------------------------------------------------------------------
		unset($datato);
		$datato['table'] 			= 'gurumaya.course';
		$datato['table_join'] 		= array('gurumaya.category');
		$datato['table_join_on'] 	= array('gurumaya.course');
		$datato['join_id'] 			= array('category_id');
		$datato['join_type'] 		= array('inner');
		$page_data['get_data']		= $this->crud->view_data($datato);
		
		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'Kursus';
		$page_data['content'] 		= 'courses/view';
		$this->load->view('template/template', $page_data);
	}
	
	public function add()
	{

		# Tab Informasi Dasar
		# -------------------------------------------------------------------
		$page_data['id'] 					= '';
		$page_data['type_form'] 			=  base64_encode('add');
		$page_data['course_title']			= '';
		$page_data['course_short_description'] = '';
		$page_data['course_description'] 	= '';
		
		# Dropdown Course Type
		# ------------------
		$page_data['course_type_id'] 		= '';
		unset($datato);
		$datato['table'] 					= 'gurumaya.course_type';
		$datato['order'] 					= array('gurumaya.course_type.course_type_name');
		$datato['order_type'] 				= array('asc');
		$page_data['dropdown_course_type'] 	= $this->crud->view_data($datato);
		# ------------------
		
		# Dropdown Category
		# ------------------
		$page_data['category_id'] 			= '';
		unset($datato);
		$datato['table'] 					= 'gurumaya.category';
		$datato['order'] 					= array('gurumaya.category.category_name');
		$datato['order_type'] 				= array('asc');
		$page_data['dropdown_category'] 	= $this->crud->view_data($datato);
		# ------------------
		
		# Dropdown Level
		# ------------------
		$page_data['course_level_id'] 		= '';
		unset($datato);
		$datato['table'] 					= 'gurumaya.course_level';
		$datato['order'] 					= array('gurumaya.course_level.course_level_name');
		$datato['order_type'] 				= array('asc');
		$page_data['dropdown_course_level'] = $this->crud->view_data($datato);
		# ------------------
		
		# Dropdown Company 
		# ------------------
		$page_data['company_id'] 			= '';
		unset($datato);
		$datato['table'] 					= 'gurumaya.company';
		$datato['order'] 					= array('gurumaya.company.company_name');
		$datato['order_type'] 				= array('asc');
		$page_data['dropdown_company'] 		= $this->crud->view_data($datato);
		# ------------------
		$page_data['course_is_top'] 		= '';
		
		# Tab Persyaratan
		# -------------------------------------------------------------------
		$page_data['course_requirements'] 	= '';
		
		# Tab Hasil
		# -------------------------------------------------------------------
		$page_data['course_outcomes'] 		= '';
		
		# Tab Harga
		# -------------------------------------------------------------------
		$page_data['course_is_free'] 		= '';
		
		# Dropdown Currency 
		# ------------------
		$page_data['currency_id'] 			= '';
		unset($datato);
		$datato['table'] 					= 'gurumaya.currency';
		$datato['where'] 					= array(
													'gurumaya.currency.currency_active' => 1
												);
		$datato['order'] 					= array('gurumaya.currency.currency_code');
		$datato['order_type'] 				= array('asc');
		$page_data['dropdown_currency'] 	= $this->crud->view_data($datato);
		
		$page_data['course_price'] 			= '0';
		$page_data['course_disc_price'] 	= '0';
		
		# Tab Media
		# -------------------------------------------------------------------
		$page_data['course_overview_provider'] = '';
		$page_data['course_thumbnail'] 		= '';
		$page_data['course_video_url'] 		= '';
		
		# Tab SEO
		# -------------------------------------------------------------------
		$page_data['course_meta_keyword']	= '';
		$page_data['course_meta_description']= '';
		
		# Tab Certificate
		# -------------------------------------------------------------------
		$page_data['course_is_certificate']	= '';
		$page_data['course_certificate_template']= '';
			
		$page_data['action'] 				= 'save';
		

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'Tambah Kursus';
		$page_data['content'] = 'courses/form';
		$this->load->view('template/template', $page_data);
	}
	
	public function edit()
	{
		# Checking
		# -------------------------------------------------------------------
		# 1. Check ID is not Empty
		if (empty($_GET['id'])) {
			header('location:' . base_url() . 'error_404');
		}

		# Decrypt ID
		# -------------------------------------------------------------------
		$decrypt_id							= str_replace(array('-', '_', '~'), array('+', '/', '='), $_GET['id']);
		$id									= $this->encrypt->decode($decrypt_id);
		 
		# Get Value from Database
		# -------------------------------------------------------------------		
		unset($datato);
		$datato['table'] 					= 'gurumaya.course';
		$datato['where'] 					= array(
													'gurumaya.course.course_id' => $id
												);
		$query 								= $this->crud->view_data($datato);
		if ($query->num_rows()) {
			$row 							= $query->row();
			$page_data['id']				= $_GET['id'];	// Warning. You must be check mapping ID to PRIMARY KEY on Table
			$page_data['type_form']			= base64_encode('edit');
			
			# Tab Informasi Dasar
			# -------------------------------------------------------------------
			$page_data['course_title']		= $row->course_title;
			$page_data['course_short_description']	= $row->course_short_description;
			$page_data['course_description']= $row->course_description;
			
			# Dropdown Course Type
			# ------------------
			$page_data['course_type_id'] 		= $row->course_type_id;
			unset($datato);
			$datato['table'] 					= 'gurumaya.course_type';
			$datato['order'] 					= array('gurumaya.course_type.course_type_name');
			$datato['order_type'] 				= array('asc');
			$page_data['dropdown_course_type'] 	= $this->crud->view_data($datato);
			# ------------------
		
			# Dropdown Category
			# ------------------
			$page_data['category_id'] 			= $row->category_id;
			unset($datato);
			$datato['table'] 					= 'gurumaya.category';
			$datato['order'] 					= array('gurumaya.category.category_name');
			$datato['order_type'] 				= array('asc');
			$page_data['dropdown_category'] 	= $this->crud->view_data($datato);
			# ------------------
			
			# Dropdown Level
			# ------------------
			$page_data['course_level_id'] 		= $row->course_level_id;
			unset($datato);
			$datato['table'] 					= 'gurumaya.course_level';
			$datato['order'] 					= array('gurumaya.course_level.course_level_name');
			$datato['order_type'] 				= array('asc');
			$page_data['dropdown_course_level'] = $this->crud->view_data($datato);
			# ------------------
			
			# Dropdown Company 
			# ------------------
			$page_data['company_id'] 			= $row->company_id;
			unset($datato);
			$datato['table'] 					= 'gurumaya.company';
			$datato['order'] 					= array('gurumaya.company.company_name');
			$datato['order_type'] 				= array('asc');
			$page_data['dropdown_company'] 		= $this->crud->view_data($datato);
			# ------------------
			$page_data['course_is_top'] 		= $row->course_is_top;
			
			# Tab Persyaratan
			# -------------------------------------------------------------------
			$page_data['course_requirements'] 	= $row->course_requirements;
			
			# Tab Hasil
			# -------------------------------------------------------------------
			$page_data['course_outcomes'] 		= $row->course_outcomes;
			
			# Tab Harga
			# -------------------------------------------------------------------
			$page_data['course_is_free'] 		= $row->course_is_free;
			
			# Dropdown Currency 
			# ------------------
			$page_data['currency_id'] 			= $row->currency_id;
			unset($datato);
			$datato['table'] 					= 'gurumaya.currency';
			$datato['where'] 					= array(
														'gurumaya.currency.currency_active' => 1
													);
			$datato['order'] 					= array('gurumaya.currency.currency_code');
			$datato['order_type'] 				= array('asc');
			$page_data['dropdown_currency'] 	= $this->crud->view_data($datato);
		
		
			$page_data['course_price'] 			= $row->course_price;
			$page_data['course_disc_price'] 	= $row->course_disc_price;
			
			# Tab Media
			# -------------------------------------------------------------------
			$page_data['course_overview_provider'] 	= $row->course_overview_provider;
			$page_data['course_thumbnail'] 		= $row->course_thumbnail;
			$page_data['course_video_url'] 		= $row->course_video_url;
			
			# Tab SEO
			# -------------------------------------------------------------------
			$page_data['course_meta_keyword']	= $row->course_meta_keyword;
			$page_data['course_meta_description']= $row->course_meta_description;
			
			# Tab Certificate
			# -------------------------------------------------------------------
			$page_data['course_is_certificate']	= $row->course_is_certificate;
			$page_data['course_certificate_template'] = $row->course_certificate_template;
		
		
			$page_data['action'] 				= 'save';
			
			
			# Section by course_id
			# -------------------------------------------------------------------	
			unset($datato);
			$datato['table'] 					= 'gurumaya.section';
			$datato['where'] 					= array(
														'gurumaya.section.course_id' => $row->course_id
													);
			$datato['order'] 					= array('gurumaya.section.section_order');
			$datato['order_type'] 				= array('asc');
			$page_data['data_section'] 			= $this->crud->view_data($datato);
			
			

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] 			= 'Edit Kursus';
			$page_data['content'] 				= 'courses/form';
			$this->load->view('template/template', $page_data);
		} else {
			# Message information & direct link								
			$this->session->set_flashdata('error_message', 'Data tidak ditemukan');
			redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');
		}
	}
	
	function save()
	{
		
		# Session ID User
		$sess_user_id				= base64_decode($this->session->userdata('user_id'));

		# Validation Form
		# -------------------------------------------------------------------
		$this->form_validation->set_rules('course_title', 'Judul Kursus', 'required');
		$this->form_validation->set_rules('course_short_description', 'Dekripsi Singkat', 'required');
		$this->form_validation->set_rules('course_description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('category_id', 'Kategori', 'required');
		$this->form_validation->set_rules('course_level_id', 'Level', 'required');
		$this->form_validation->set_rules('course_type_id', 'Tipe', 'required');
		#$this->form_validation->set_rules('company_id', 'Perusahaan', 'required');
		


		# Run validation
		# -------------------------------------------------------------------
		if ($this->form_validation->run() === FALSE) {
			$id								= $this->uri->segment(4); // Get ID
			# Set Value Form
			# -------------------------------------------------------------------
			# Tab Informasi Dasar
			$page_data['id']    				= $this->input->post('id');
			$page_data['type_form']    			= $this->input->post('type_form');
			$page_data['course_title']    		= $this->input->post('course_title');
			$page_data['course_short_description'] = $this->input->post('course_short_description');
			$page_data['course_description']    = $this->input->post('course_description');
			$page_data['category_id']    		= $this->input->post('category_id');
			$page_data['course_level_id']    	= $this->input->post('course_level_id');
			$page_data['course_description']    = $this->input->post('course_description');
			$page_data['category_id']    		= $this->input->post('category_id');
			$page_data['course_level_id']   	 = $this->input->post('course_level_id');
			$page_data['course_type_id']   	 	= $this->input->post('course_type_id');
			$page_data['company_id']   			= $this->input->post('company_id');
			$page_data['course_is_top']   		= $this->input->post('course_is_top');
			
			# Tab Persyaratan
			$page_data['course_requirements']   = $this->input->post('course_requirements');
			
			# Tab Hasil
			$page_data['course_outcomes']  		= $this->input->post('course_outcomes');
			
			# Tab Harga
			$page_data['is_free_course']  		= $this->input->post('is_free_course');
			$page_data['currency_id']  			= $this->input->post('currency_id');
			$page_data['course_price']  		= $this->input->post('course_price');
			$page_data['course_disc_price']  	= $this->input->post('course_disc_price');
			
			# Tab Media
			$page_data['course_overview_provider'] = $this->input->post('course_overview_provider');
			$page_data['course_overview_url'] = $this->input->post('course_overview_url');
			$page_data['course_thumbnail'] 		= $this->input->post('course_thumbnail');
			
			# Tab SEO
			$page_data['meta_keywords'] 		= $this->input->post('meta_keywords');
			$page_data['meta_description'] 		= $this->input->post('meta_description');
			

			$page_data['action'] 				= 'save';

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] 			= 'Tambah Perusahaan';
			$page_data['content'] 				= 'courses/form';
			$this->load->view('template/template', $page_data);
		} else {
			$type_form								= base64_decode($this->input->post('type_form'));
			
			
			
			# Check Course Type
			# -------------------------------------------------------------------
			/*
			Note = Apabila Tipe Kursus adalah B2B maka harus memilih data perusahaan, 
					selain itu maka di set ID perusahaan gurumaya
			*/
			if ($this->input->post('course_type_id') == '1'){ 
				$company_id	= $this->input->post('company_id'); 
			}else{
				$company_id	= 1;
			}
			
			# Trim and Return JSON 'course_requirements' dan 'course_outcomes' 
			# -------------------------------------------------------------------
			/*
			Note = Merubah data 'course_requirements' dan 'course_outcomes' menjadi data json
			*/
			$course_requirements 	= $this->trim_and_return_json($this->input->post('course_requirements'));
			$course_outcomes 		= $this->trim_and_return_json($this->input->post('course_outcomes'));
			
			
			# Course is Top 
			# -------------------------------------------------------------------
			/*
			Note = Cek apakah kursus ini termasuk Top Kursus
			*/
			if (!empty($this->input->post('course_is_top') == 1)) {
				$course_is_top = 1;
			} else {
				$course_is_top = 0;
			}
			
			
			# Course is Free 
			# -------------------------------------------------------------------
			/*
			Note = Cek apakah kursus ini Gratis
			*/
			if (!empty($this->input->post('course_is_free') == 1)) {
				$course_is_free = 1;
			} else {
				$course_is_free = 0;
			}
				
				
			if ($type_form == "add") {
				
				# Save Data
				# -------------------------------------------------------------------	
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'course';
				$datato['course_title']		 	= html_escape($this->input->post('course_title'));
				$datato['course_short_description']= $this->input->post('course_short_description');
				$datato['course_description']	= $this->input->post('course_description');
				$datato['course_type_id']		= $this->input->post('course_type_id');
				$datato['category_id']			= $this->input->post('category_id');
				$datato['course_level_id']		= $this->input->post('course_level_id');
				$datato['company_id']			= $company_id;
				$datato['course_is_top']		= $course_is_top;
				
				$datato['course_requirements']	= $course_requirements;
				$datato['course_outcomes']		= $course_outcomes;
				$datato['section_id_array']		= json_encode(array());
				
				$datato['course_is_free']		= $course_is_free;
				$datato['currency_id']   	 	= $this->input->post('currency_id');
				$datato['course_price']   	 	= $this->input->post('course_price');
				$datato['course_disc_price']   	= $this->input->post('course_disc_price');
				
				$datato['course_overview_provider'] = $this->input->post('course_overview_provider');
				$datato['course_thumbnail'] 	= null;
				$datato['course_video_url'] 	= html_escape($this->input->post('course_video_url'));
				
				$datato['course_meta_keyword']  = $this->input->post('course_meta_keyword');
				$datato['course_meta_description'] = $this->input->post('course_meta_description');
				
				$datato['course_status']   	 	= 0; # 0 = Draft
				
				$datato['course_created_by'] 	= $sess_user_id;
				$datato['course_created_date']	= date('Y-m-d H:i:s');
				$id								= $this->crud->insert($datato);

				# Upload Thumbnail Course
				# -------------------------------------------------------------------	
				$config['upload_path'] 			= './uploads/courses/course_thumbnail/';
				$config['file_name'] 			= 'video_thumbnail-' . md5($id);
				$config['overwrite']     		= true;
				$config['allowed_types'] 		= 'jpg|jpeg|png|bmp';
				$config['max_size']      		= '1000';
				$this->upload->initialize($config);
				if ($this->upload->do_upload("course_thumbnail")) {
					$course_thumbnail = $this->upload->data();
					unset($datato);
					$datato['database'] 		= 'gurumaya';
					$datato['table'] 			= 'course';
					$datato['course_thumbnail'] = $course_thumbnail['file_name'];
					$datato['field'] 			= 'course_id';
					$datato['id'] 				= $id;
					$this->crud->update($datato);
				}
				
				# Upload Certificate
				# -------------------------------------------------------------------	
				$config['upload_path'] 			= './uploads/courses/course_certificate/';
				$config['file_name'] 			= 'template_certificate-' . md5($id);
				$config['overwrite']     		= true;
				$config['allowed_types'] 		= 'jpg|jpeg|png|bmp';
				$config['max_size']      		= '1000';
				$this->upload->initialize($config);
				if ($this->upload->do_upload("course_certificate_template")) {
					$course_certificate_template = $this->upload->data();
					unset($datato);
					$datato['database'] 		= 'gurumaya';
					$datato['table'] 			= 'course';
					$datato['course_certificate_template'] = $course_certificate_template['file_name'];
					$datato['field'] 			= 'course_id';
					$datato['id'] 				= $id;
					$this->crud->update($datato);
				}
				
				# Message information & direct link								
				$this->session->set_flashdata('flash_message', 'Data berhasil disimpan');
				redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/edit' . $this->var_uri_seg_3), 'refresh');
			}
			
			
			if ($type_form == "edit") {

				$decrypt_id						= str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('id'));
				$id								= $this->encrypt->decode($decrypt_id);

				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'course';
				$datato['course_title']		 	= html_escape($this->input->post('course_title'));
				$datato['course_short_description']= $this->input->post('course_short_description');
				$datato['course_description']	= $this->input->post('course_description');
				$datato['course_type_id']		= $this->input->post('course_type_id');
				$datato['category_id']			= $this->input->post('category_id');
				$datato['course_level_id']		= $this->input->post('course_level_id');
				$datato['company_id']			= $company_id;
				$datato['course_is_top']		= $course_is_top;
				
				$datato['course_requirements']	= $course_requirements;
				$datato['course_outcomes']		= $course_outcomes;
				$datato['section_id_array']		= json_encode(array());
				
				$datato['course_is_free']		= $course_is_free;
				$datato['currency_id']   	 	= $this->input->post('currency_id');
				$datato['course_price']   	 	= $this->input->post('course_price');
				$datato['course_disc_price']   	= $this->input->post('course_disc_price');
				
				$datato['course_overview_provider'] = $this->input->post('course_overview_provider');
				$datato['course_thumbnail'] 	= null;
				$datato['course_video_url'] 	= html_escape($this->input->post('course_video_url'));
				
				$datato['course_meta_keyword']  = $this->input->post('course_meta_keyword');
				$datato['course_meta_description'] = $this->input->post('course_meta_description');
				
				$datato['course_status']   	 	= 0; # 0 = Draft
				
				$datato['course_modified_by'] 	= $sess_user_id;
				$datato['course_modified_date']	= date('Y-m-d H:i:s');
				$datato['field'] 			= 'course_id';
				$datato['id'] 				= $id;
				$this->crud->update($datato);

				# Upload Thumbnail Course
				# -------------------------------------------------------------------	
				$config['upload_path'] 			= './uploads/courses/course_thumbnail/';
				$config['file_name'] 			= 'video_thumbnail-' . md5($id);
				$config['overwrite']     		= true;
				$config['allowed_types'] 		= 'jpg|jpeg|png|bmp';
				$config['max_size']      		= '1000';
				$this->upload->initialize($config);
				if ($this->upload->do_upload("course_thumbnail")) {
					$course_thumbnail = $this->upload->data();
					unset($datato);
					$datato['database'] 		= 'gurumaya';
					$datato['table'] 			= 'course';
					$datato['course_thumbnail'] = $course_thumbnail['file_name'];
					$datato['field'] 			= 'course_id';
					$datato['id'] 				= $id;
					$this->crud->update($datato);
				}
	
				# Upload Certificate
				# -------------------------------------------------------------------	
				$config['upload_path'] 			= './uploads/courses/course_certificate/';
				$config['file_name'] 			= 'template_certificate-' . md5($id);
				$config['overwrite']     		= true;
				$config['allowed_types'] 		= 'jpg|jpeg|png|bmp';
				$config['max_size']      		= '1000';
				$this->upload->initialize($config);
				if ($this->upload->do_upload("course_certificate_template")) {
					$course_certificate_template = $this->upload->data();
					unset($datato);
					$datato['database'] 		= 'gurumaya';
					$datato['table'] 			= 'course';
					$datato['course_certificate_template'] = $course_certificate_template['file_name'];
					$datato['field'] 			= 'course_id';
					$datato['id'] 				= $id;
					$this->crud->update($datato);
				}

				# Message information & direct link	
				$this->session->set_flashdata('flash_message', 'Data berhasil diperbarui');
				redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/edit?id=' . $this->input->post('id')), 'refresh');
			}
			
			
			
			
		}
	}
	
	
	# -------------------------------------------------------------------	
	# SAVE SECTION
	# -------------------------------------------------------------------
	function save_section()
	{
		
		$type_form								= base64_decode($this->input->post('type_form'));
			
		if ($type_form == "section_add") {
			
			// Decrypt : course_id
			$dec_course_id					= str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('id'));
			$course_id						= $this->encrypt->decode($dec_course_id);
			
			// Decrypt : section_id
			$enc_section_id					= str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('section_id'));
			$section_id						= $this->encrypt->decode($enc_section_id);
			
			# Save Data
			# -------------------------------------------------------------------	
			unset($datato);
			$datato['database'] 			= 'gurumaya';
			$datato['table'] 				= 'section';
			//$datato['section_id']		 	= $section_id;
			$datato['section_title']		= $this->input->post('section_title');
			$datato['course_id']			= $course_id;
			$datato['section_order']		= 0;
			
			$datato['section_created_date']	= date('Y-m-d H:i:s');
			$id								= $this->crud->insert($datato);
			
			# Message information & direct link	
			$this->session->set_flashdata('flash_message', 'Data berhasil disimpan');
			redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/edit?id=' . $this->input->post('id')), 'refresh');
			
		}
		
		if ($type_form == "section_edit") {
			
			// Decrypt : course_id
			$dec_course_id					= str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('id'));
			$course_id						= $this->encrypt->decode($dec_course_id);
			
			// Decrypt : section_id
			$enc_section_id					= str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('section_id'));
			$section_id						= $this->encrypt->decode($enc_section_id);
			
			# Update Data
			# -------------------------------------------------------------------	
			unset($datato);
			$datato['database'] 			= 'gurumaya';
			$datato['table'] 				= 'section';
			$datato['section_title']		= $this->input->post('section_title');
			$datato['field'] 				= 'section_id';
			$datato['section_id'] 			= $section_id;
			$this->crud->update($datato);
			
			# Message information & direct link	
			$this->session->set_flashdata('flash_message', 'Data berhasil disimpan');
			redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/edit?id=' . $this->input->post('id')), 'refresh');
		}
			
	}
	
	// Fungsi untuk menyimpan bagian (Sections)
	
	function popup()
	{
		
		$course_id 		= $this->uri->segment(5);
		$type_section 	= $this->uri->segment(4);
		
		if ($type_section == 'section_add')
		{
			
			
			$page_data['title_popup']	= 'Tambah Bagian';
			$page_data['section']		= $type_section;
			$page_data['type_form']		= base64_encode('section_add');
			
			$page_data['id']			= $course_id; // ID Course
			$page_data['section_id']	= '';
			$page_data['section_title']	= '';
			
			# Content 
			# -------------------------------------------------------------------	
			$page_data['action'] 		= 'save';
			$this->load->view('courses/popup/section_add', $page_data);
			
			//$this->load->view( 'backend/'.$logged_in_user_role.'/'.$page_name.'.php' ,$page_data);
		}
		
		if ($type_section == 'section_edit')
		{
			
			# Checking
			# -------------------------------------------------------------------
			# 1. Check ID is not Empty
			if (empty($_GET['section_id'])) {
				header('location:' . base_url() . 'error_404');
			}

			# Decrypt ID
			# -------------------------------------------------------------------
			$dec_section_id					= str_replace(array('-', '_', '~'), array('+', '/', '='), $_GET['section_id']);
			$section_id						= $this->encrypt->decode($dec_section_id);
			 
			# Get Value from Database
			# -------------------------------------------------------------------		
			unset($datato);
			$datato['table'] 				= 'gurumaya.section';
			$datato['where'] 				= array(
													'gurumaya.section.section_id' => $section_id
												);
			$query 							= $this->crud->view_data($datato);
			if ($query->num_rows()) {
				$row 						= $query->row();
				
				$page_data['title_popup']	= 'Edit Bagian';
				$page_data['section']		= $type_section;
				$page_data['type_form']		= base64_encode('section_edit');
				
				// Encrypt : section_id
				$enc_section_id				= $this->encrypt->encode($row->section_id);
				$section_id					= str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_section_id);
				
				// Encrypt : course_id
				$enc_course_id				= $this->encrypt->encode($row->course_id);
				$course_id					= str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_course_id);
			
				# Tab Informasi Dasar
				# -------------------------------------------------------------------
				$page_data['id']			= $row->course_id;
				$page_data['section_id']	= $row->section_id;
				$page_data['section_title']	= $row->section_title;
				
				# Content 
				# -------------------------------------------------------------------	
				$page_data['action'] 		= 'save';
				$this->load->view('courses/popup/section_add', $page_data);
				
			}
			
			
		}
		
	
		
	}
	
	
	
	
	
	// Fungsi untuk melakukan Trim dan mengembalikan data JSON
	function trim_and_return_json($untrimmed_array)
    {
        $trimmed_array = array();
        if (sizeof($untrimmed_array) > 0) {
            foreach ($untrimmed_array as $row) {
                if ($row != "") {
                    array_push($trimmed_array, $row);
                }
            }
        }
        return json_encode($trimmed_array);
    }
	
	
	// Fungsi untuk memunculkan PopUp Modal
	function popups($page_name = '' , $param2 = '' , $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '')
	{
		$logged_in_user_role 		= strtolower($this->session->userdata('role'));
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
		$page_data['param4']		=	$param4;
		$page_data['param5']		=	$param5;
		$page_data['param6']		=	$param6;
		$page_data['param7']		=	$param7;
		$this->load->view( 'backend/'.$logged_in_user_role.'/'.$page_name.'.php' ,$page_data);
	}
	
}
