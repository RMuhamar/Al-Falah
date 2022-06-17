<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Smtp
| Module                : Admin
| Version               : 1.0;
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 08 June 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Smtp extends MY_Controller
{

	# Set Variabel Global
	# -------------------------------------------------------------------
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'settings';
	private $var_uri_seg_3  			= 'smtp';


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
		$page_data['action'] 			= 'smtp/save';
		$page_data['action_send_mail'] 	= 'smtp/send_email';

		# Content & Template
		# -------------------------------------------------------------------
		$page_data['page_title'] 	= 'SMTP Settings';
		$page_data['content'] 		= 'settings/smtp/form';
		$this->load->view('template/template', $page_data);
	}

	public function save()
	{

		# Session ID User
		$sess_user_id				= base64_decode($this->session->userdata('user_id'));

		# Validation Form
		# -------------------------------------------------------------------
		$this->form_validation->set_rules('protocol', 'Protocol', 'required');
		$this->form_validation->set_rules('smtp_host', 'SMTP Host', 'required');
		$this->form_validation->set_rules('smtp_port', 'SMTP Port', 'required');
		$this->form_validation->set_rules('smtp_user', 'SMTP Username', 'required');
		$this->form_validation->set_rules('smtp_pass', 'SMTP Password', 'required');

		# Run validation
		# -------------------------------------------------------------------
		if ($this->form_validation->run() === FALSE) {
			# Set Value Form
			# -------------------------------------------------------------------
			$page_data['action'] 		= 'smtp/save';

			# Content & Template
			# -------------------------------------------------------------------
			$page_data['page_title'] 			= 'SMTP Settings';
			$page_data['content'] 				= 'settings/smtp/form';
			$this->load->view('template/template', $page_data);
		} else {


				# Update : protocol
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 				= 'gurumaya';
				$datato['table'] 					= 'settings';
				$datato['value']		 			= html_escape($this->input->post('protocol'));
				$datato['field'] 					= 'key';
				$datato['id'] 						= 'protocol';
				$this->crud->update($datato);

				# Update : host
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 				= 'gurumaya';
				$datato['table'] 					= 'settings';
				$datato['value']		 			= html_escape($this->input->post('smtp_host'));
				$datato['field'] 					= 'key';
				$datato['id'] 						= 'smtp_host';
				$this->crud->update($datato);

				# Update : port
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 				= 'gurumaya';
				$datato['table'] 					= 'settings';
				$datato['value']		 			= html_escape($this->input->post('smtp_port'));
				$datato['field'] 					= 'key';
				$datato['id'] 						= 'smtp_port';
				$this->crud->update($datato);

				# Update : username
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 				= 'gurumaya';
				$datato['table'] 					= 'settings';
				$datato['value']		 			= html_escape($this->input->post('smtp_user'));
				$datato['field'] 					= 'key';
				$datato['id'] 						= 'smtp_user';
				$this->crud->update($datato);

				# Update : password
				# ------------------------------------------------------------------
				unset($datato);
				$datato['database'] 				= 'gurumaya';
				$datato['table'] 					= 'settings';
				$datato['value']		 			= html_escape($this->input->post('smtp_pass'));
				$datato['field'] 					= 'key';
				$datato['id'] 						= 'smtp_pass';
				$this->crud->update($datato);

				# Message information & direct link
				$this->session->set_flashdata('flash_message', 'Data berhasil diperbarui');
				redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');

		}
	}

	function send_email()
	{

		# Script Send Email
		$this->email_model->send_email_test($this->input->post('email'));

		# Message information & direct link
		$this->session->set_flashdata('flash_message', 'Sedang di proses, silahkan cek folder inbox atau folder spam');
		redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');

	}

}
