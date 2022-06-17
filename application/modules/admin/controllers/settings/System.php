<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: system
| Module                : Admin
| Version               : 1.0;
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 04 June 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class System extends MY_Controller
{

	# Set Variabel Global
	# -------------------------------------------------------------------
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'settings';
	private $var_uri_seg_3  			= 'system';


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
		$page_data['action'] 		= 'system/save';

		# Content & Template
		# -------------------------------------------------------------------
		$page_data['page_title'] 	= 'Sistem Settings';
		$page_data['content'] 		= 'settings/system/form';
		$this->load->view('template/template', $page_data);
	}

	public function save()
	{

		# Session ID User
		$sess_user_id				= base64_decode($this->session->userdata('user_id'));

		# Validation Form
		# -------------------------------------------------------------------
		$this->form_validation->set_rules('system_name', 'Nama Website', 'required');
		$this->form_validation->set_rules('system_title', 'Judul Website', 'required');
		$this->form_validation->set_rules('slogan', 'Slogan', 'required');
		$this->form_validation->set_rules('system_email', 'Email', 'required');
		# Run validation
		# -------------------------------------------------------------------
		if ($this->form_validation->run() === FALSE) {
			# Set Value Form
			# -------------------------------------------------------------------
			$page_data['action'] 		= 'system/save';

			# Content & Template
			# -------------------------------------------------------------------
			$page_data['page_title'] 			= 'Sistem Settings';
			$page_data['content'] 				= 'settings/system/form';
			$this->load->view('template/template', $page_data);
		} else {

				# Update : system_name
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('system_name'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'system_name';
				$this->crud->update($datato);

				# Update : system_title
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('system_title'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'system_title';
				$this->crud->update($datato);

				# Update : website_keywords
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('website_keywords'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'website_keywords';
				$this->crud->update($datato);

				# Update : website_description
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('website_description'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'website_description';
				$this->crud->update($datato);

				# Update : author
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('author'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'author';
				$this->crud->update($datato);

				# Update : slogan
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('slogan'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'slogan';
				$this->crud->update($datato);

				# Update : system_email
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('system_email'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'system_email';
				$this->crud->update($datato);

				# Update : address
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('address'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'address';
				$this->crud->update($datato);

				# Update : phone
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('phone'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'phone';
				$this->crud->update($datato);

				# Update : youtube_api_key
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('youtube_api_key'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'youtube_api_key';
				$this->crud->update($datato);

				# Update : footer_text
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('footer_text'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'footer_text';
				$this->crud->update($datato);

				# Update : footer_link
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'settings';
				$datato['value']		 		= html_escape($this->input->post('footer_link'));
				$datato['field'] 				= 'key';
				$datato['id'] 					= 'footer_link';
				$this->crud->update($datato);

				# Message information & direct link
				$this->session->set_flashdata('flash_message', 'Data berhasil diperbarui');
				redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');

		}
	}

}
