<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: reset_password
| Module                : Admin
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 29 April 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Reset_password extends MY_Controller
{

	# Set Variabel Global	
	# -------------------------------------------------------------------     
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'my_account';
	private $var_uri_seg_3  			= 'reset_password';


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

		$sess_user_id				= base64_decode($this->session->userdata('user_id'));

		unset($datato);
		$datato['table'] = 'gurumaya.user';
		$datato['where'] = array(
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

		# Set Value
		$data['old_password'] 			= '';
		$data['new_password'] 			= '';
		$data['repeat_password'] 		= '';
		$data['action'] 				= 'save_password';

		# Content & Template
		# -------------------------------------------------------------------
		$page_data['page_title'] 	= 'Ganti Password';
		$page_data['content'] 		= 'my_account/reset_password/view';
		$page_data['action']		= 'save';
		$this->load->view('template/template', $page_data);
	}

	function save_password ()
	{
		$sess_user_id = base64_decode($this->session->userdata('user_id'));

		unset($datato);
		$datato['table'] 					= 'gurumaya.user';
		$datato['where'] 					= array(
												'gurumaya.user.user_id' => $sess_user_id
											);
		$query 								= $this->crud->view_data($datato);
		if($query->num_rows()>0)
		{
			$row 							= $query->row();
			$user_password      			= $row->user_password;
			$user_salt      				= $row->user_salt;

			if($this->generate_encrypt->encryptUserPwd( $this->input->post('old_password') ,$user_salt) === $user_password)
			{
				//Random Salt
				$rand_salt 					= $this->generate_encrypt->genRndSalt();
				//Encrypt Password
				$encrypt_pass 				= $this->generate_encrypt->encryptUserPwd( $this->input->post('new_password'),$rand_salt);

				unset($datato);
				$datato['database']				= 'gurumaya';
				$datato['table'] 				= 'user';
				$datato['user_password'] 		= $encrypt_pass;
				$datato['user_salt'] 			= $rand_salt;
				$datato['field'] 				= 'user_id';
				$datato['id'] 					= $sess_user_id;;
				$this->crud->update($datato);

				$this->session->set_flashdata('flash_message', 'Password berhasil diperbarui');
				redirect(site_url('my_account/reset_password/view'), 'refresh');

			}
			else
			{
				$this->session->set_flashdata('flash_message', 'Password tidak sesuai.');
				redirect(site_url('my_account/reset_password/view'), 'refresh');
			}
		}
		else{

			$this->session->set_flashdata('flash_message', 'Password tidak sesuai.');
				redirect(site_url('my_account/reset_password/view'), 'refresh');
		}
	}
	
}
