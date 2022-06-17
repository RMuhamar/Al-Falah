<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: User_profile
| Module                : Dashboard
| Version               : 1.0;
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 24 May 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class User_profile extends MY_Controller
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
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('generate_encrypt');

		# Set Helper
		# -------------------------------------------------------------------
		$this->load->helper('form');

		# Get Info User from Helper "whoami"
		# -------------------------------------------------------------------


		# Check User Access Module
		# -------------------------------------------------------------------


		# For Form Validation for HMVC
		$this->form_validation->CI = &$this;
	}

	public function index()
	{
		$page_data['type_form'] 	= base64_encode('edit');
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
			$page_data['user_email']		= $row->user_email;
			$page_data['user_password']		= $row->user_password;
			$page_data['user_gender']		= $row->user_gender;
			$page_data['user_birthdate']	= $row->user_birthdate;
			$page_data['user_biography']	= $row->user_biography;
			$page_data['user_twitter_link']	= $row->user_twitter_link;
			$page_data['user_facebook_link']= $row->user_facebook_link;
			$page_data['user_linkedin_link']= $row->user_linkedin_link;
		}

		$page_data['action'] 			= 'save';
		# Content & Template
		# -------------------------------------------------------------------
		$page_data['page_title'] 		= 'Profile';
		$page_data['content'] 			= 'user_profile';
		$this->load->view('template/template', $page_data);
	}

	function save()
	{
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
		$datato['id'] 					= $this->input->post('user_id');
		$this->crud->update($datato);

		# Upload Attachment
		# -------------------------------------------------------------------	
		$config['upload_path'] 			= './uploads/user_image/';
		$config['file_name'] 			= 'user-' . md5($this->input->post('user_id'));
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
			$datato['id'] 				= $this->input->post('user_id');
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
		redirect(site_url('dashboard/user_profile'), 'refresh');
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

	public function change_password()
	{
		 $sess_user_id				= base64_decode($this->session->userdata('user_id'));
		//$page_data['type_form'] 	=  base64_encode('reset');

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
		$page_data['content'] 		= 'user_profile_change_password';
		$page_data['action']		= base_url() . 'dashboard/user_profile/save_password';
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
				redirect(site_url('dashboard/user_profile/change_password'), 'refresh');

			}
			else
			{
				$this->session->set_flashdata('flash_message', 'Password tidak sesuai.');
				redirect(site_url('dashboard/user_profile/change_password'), 'refresh');
			}
		}
		else{

			$this->session->set_flashdata('flash_message', 'Password tidak sesuai.');
				redirect(site_url('dashboard/user_profile/change_password'), 'refresh');
		}
	}

}
