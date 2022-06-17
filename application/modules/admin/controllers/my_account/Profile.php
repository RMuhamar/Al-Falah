<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Profile
| Module                : Admin
| Version               : 1.0;
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 09 June 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

	# Set Variabel Global
	# -------------------------------------------------------------------
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'my_account';
	private $var_uri_seg_3  			= 'profile';


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
		# Session ID User
		$sess_user_id				= base64_decode($this->session->userdata('user_id'));

		# Get Value from Database
		# -------------------------------------------------------------------
		unset($datato);
		$datato['table'] 					= 'gurumaya.user';
		$datato['where'] 					= array(
			'gurumaya.user.user_id' => $sess_user_id
		);
		$query 								= $this->crud->view_data($datato);
		if ($query->num_rows()) {
			$row 							= $query->row();
			$page_data['user_avatar']		= $row->user_avatar;
			$page_data['user_fullname']		= $row->user_fullname;
			$page_data['user_gender']		= $row->user_gender;
			$page_data['user_email']		= $row->user_email;
			$page_data['user_birthdate']	= $row->user_birthdate;
			$page_data['user_biography']	= $row->user_biography;
			$page_data['user_twitter_link']	= $row->user_twitter_link;
			$page_data['user_facebook_link']= $row->user_facebook_link;
			$page_data['user_linkedin_link']= $row->user_linkedin_link;
			$page_data['action'] 			= 'profile/save';

			# Content & Template
			# -------------------------------------------------------------------
			$page_data['page_title'] 	= 'Profil';
			$page_data['content'] 		= 'my_account/profile/form';
			$this->load->view('template/template', $page_data);
		}
	}


	public function save()
	{

		# Session ID User
		$sess_user_id				= base64_decode($this->session->userdata('user_id'));

		# Validation Form
		# -------------------------------------------------------------------
		$this->form_validation->set_rules('user_fullname', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('user_gender', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('user_birthdate', 'Tanggal Lahir', 'required');

		# Run validation
		# -------------------------------------------------------------------
		if ($this->form_validation->run() === FALSE) {
			# Set Value Form
			# -------------------------------------------------------------------
			$page_data['action'] 				= 'profile/save';

			# Content & Template
			# -------------------------------------------------------------------
			$page_data['page_title'] 			= 'Profil';
			$page_data['content'] 				= 'my_account/profile/form';
			$this->load->view('template/template', $page_data);
		} else {
			# Update Data
			# -------------------------------------------------------------------
			unset($datato);
			$datato['database'] 			= 'gurumaya';
			$datato['table'] 				= 'user';
			$datato['user_fullname']		= $this->input->post('user_fullname');
			$datato['user_gender']			= $this->input->post('user_gender');
			$datato['user_birthdate']		= $this->input->post('user_birthdate');
			$datato['user_biography']		= $this->input->post('user_biography');
			$datato['user_twitter_link']	= $this->input->post('user_twitter_link');
			$datato['user_facebook_link']	= $this->input->post('user_facebook_link');
			$datato['user_linkedin_link']	= $this->input->post('user_linkedin_link');
			$datato['user_ipaddress'] 		= $this->input->ip_address();
			$datato['user_modified_date'] 	= date('Y-m-d H:i:s');
			$datato['field'] 				= 'user_id';
			$datato['id'] 					= $sess_user_id;
			$this->crud->update($datato);

			# Upload Attachment
			# -------------------------------------------------------------------	
			$config['upload_path'] 			= './uploads/user_image/';
			$config['file_name'] 			= 'user-' . md5($sess_user_id);
			$config['overwrite']     		= true;
			$config['allowed_types'] 		= 'jpg|jpeg|png|bmp';
			$config['max_size']      		= '1000';
			$this->upload->initialize($config);
			if ($this->upload->do_upload("user_avatar")) {
				$user_avatar = $this->upload->data();

				unset($datato);
				$datato['database'] 		= 'gurumaya';
				$datato['table'] 			= 'user';
				$datato['user_avatar'] 		= $user_avatar['file_name'];
				$datato['field'] 			= 'user_id';
				$datato['id'] 				= $sess_user_id;
				$this->crud->update($datato);
				
				$gbr = $this->upload->data();
				//Compress Image
				$this->create_thumbs($gbr['file_name']);
				$this->session->set_flashdata('flash_message','<div class="alert alert-info">Image Berhasil di upload.</div>');
			}else{
				echo $this->upload->display_errors();
			}

			# Message information & direct link
			$this->session->set_flashdata('flash_message', 'Data berhasil diperbarui');
		}

		redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');
	}

	function create_thumbs($file_name){
        // Image resizing config
        $config = array(
            // Image Small
            array(
                'image_library' => 'GD2',
                'source_image'  => './uploads/user_image/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 100,
                'height'        => 67,
                'new_image'     => './uploads/user_image/thumbnails/'.$file_name
            ));

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }

}
