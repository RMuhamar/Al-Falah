<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: user
| Module                : Admin
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 29 April 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

	# Set Variabel Global	
	# -------------------------------------------------------------------     
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'users';
	private $var_uri_seg_3  			= 'user';


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
		$this->load->library('generate_encrypt');

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
		# Get Tabel user
		unset($datato);
		$datato['table'] 			= 'gurumaya.user';
		$page_data['get_data']		= $this->crud->view_data($datato);

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'Pengguna';
		$page_data['content'] 		= 'users/user/view';
		$this->load->view('template/template', $page_data);
	}

	public function add()
	{

		# Set Value Form
		# -------------------------------------------------------------------
		$page_data['id'] 			= '';
		$page_data['type_form'] 	=  base64_encode('add');
		$page_data['user_fullname'] = '';
		$page_data['user_gender'] 	= '';
		$page_data['user_email'] 	= '';
		$oage_data['user_password'] = '';
		$page_data['user_avatar'] 	= 'no_image.png';
		$page_data['user_active'] 	= '';

		#Get Tabel user role
		unset($datato);
		$datato['table'] 			= 'gurumaya.user_role';
		$page_data['get_dropdown_role'] = $this->crud->view_data($datato);
		$page_data['user_role_id']	= '';

		#Get Tabel company
		unset($datato);
		$datato['table'] 			= 'gurumaya.company';
		$page_data['get_dropdown_company'] = $this->crud->view_data($datato);
		$page_data['company_id']	= '';

		#Get Tabel Level 1
		unset($datato);
		$datato['table'] 			= 'gurumaya.level_1';
		$page_data['get_dropdown_level_1'] = $this->crud->view_data($datato);
		$page_data['level_1_id']	= '';

		#Get Tabel Level 2
		unset($datato);
		$datato['table'] 			= 'gurumaya.level_2';
		$page_data['get_dropdown_level_2'] = $this->crud->view_data($datato);
		$page_data['level_2_id']	= '';

		$page_data['action'] 		= 'save';

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'Tambah Pengguna';
		$page_data['content'] = 'users/user/form';
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
		$datato['table'] 					= 'gurumaya.user';
		$datato['where'] 					= array(
			'gurumaya.user.user_id' => $id
		);
		$query 								= $this->crud->view_data($datato);
		if ($query->num_rows()) {
			$row 							= $query->row();
			$page_data['id']				= $_GET['id'];	// Warning. You must be check mapping ID to PRIMARY KEY on Table
			$page_data['type_form']			= base64_encode('edit');
			$page_data['user_avatar']		= $row->user_avatar;
			$page_data['user_fullname']		= $row->user_fullname;
			$page_data['user_email']		= $row->user_email;
			$page_data['user_password']		= $row->user_password;
			$page_data['user_gender']		= $row->user_gender;

			#Get Tabel user role
			unset($datato);
			$datato['table'] 				= 'gurumaya.user_role';
			$page_data['get_dropdown_role'] = $this->crud->view_data($datato);
			$page_data['user_role_id']		= $row->user_role_id;

			#Get Tabel company
			unset($datato);
			$datato['table'] 				= 'gurumaya.company';
			$page_data['get_dropdown_company'] = $this->crud->view_data($datato);
			$page_data['company_id']		= $row->company_id;

			#Get Tabel level 1
			unset($datato);
			$datato['table'] 				= 'gurumaya.level_1';
			$page_data['get_dropdown_level_1'] = $this->crud->view_data($datato);
			$page_data['level_1_id']		= $row->level_1_id;

			#Get Tabel level 2
			unset($datato);
			$datato['table'] 				= 'gurumaya.level_2';
			$page_data['get_dropdown_level_2'] = $this->crud->view_data($datato);
			$page_data['level_2_id']		= $row->level_2_id;

			$page_data['action'] 			= 'save';

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] 		= 'Edit Pengguna';
			$page_data['content'] 			= 'users/user/form';
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
		$this->form_validation->set_rules('user_fullname', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('user_gender', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('user_email', 'Email', 'required');


		# Run validation
		# -------------------------------------------------------------------
		if ($this->form_validation->run() === FALSE) {

			$id								= $this->uri->segment(4); // Get ID
			# Set Value Form
			# -------------------------------------------------------------------
			$page_data['id']    				= $this->input->post('id');
			$page_data['type_form']    			= $this->input->post('type_form');
			$page_data['user_fullname']    		= $this->input->post('user_fullname');
			$page_data['user_gender']    		= $this->input->post('user_gender');
			$page_data['user_email']    		= $this->input->post('user_email');
			$page_data['user_role_id']			= $this->input->post('user_role_id');
			$page_data['user_avatar'] 			= 'no_image.png';
			$page_data['user_active']    		= $this->input->post('user_active');
			$page_data['action'] 				= 'save';

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] = 'Tambah Pengguna';
			$page_data['content'] = 'users/user/form';
			$this->load->view('template/template', $page_data);
		} else {
			$type_form						= base64_decode($this->input->post('type_form'));
			$password						= $this->input->post('user_password');
		
			//Random Salt
			$rand_salt 						= $this->generate_encrypt->genRndSalt();
			//Encrypt Password
			$encrypt_pass 					= $this->generate_encrypt->encryptUserPwd( $this->input->post('user_password'),$rand_salt);
			# Verification Code
			$verification_code		 		=  md5(rand(100000000, 200000000));

			if ($type_form == "add") {

				# Save Data
				# -------------------------------------------------------------------	
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'user';
				$datato['user_avatar']		 	= 'no_image.png';
				$datato['user_fullname']		= $this->input->post('user_fullname');
				$datato['user_gender']			= $this->input->post('user_gender');
				$datato['user_email']			= $this->input->post('user_email');
				$datato['user_password'] 		= $encrypt_pass;	
				$datato['user_salt'] 			= $rand_salt;	
				$datato['user_ipaddress'] 		= $this->input->ip_address();	
				$datato['user_verification_code'] = $verification_code;
				$datato['user_active']			= 0; // No
				$datato['user_role_id']   		= $this->input->post('user_role_id');
				$datato['company_id']   		= $this->input->post('company_id');
				$datato['level_1_id']   		= $this->input->post('level_1_id');
				$datato['level_2_id']   		= $this->input->post('level_2_id');
				$datato['user_created_date']	= date('Y-m-d H:i:s');
				$id								= $this->crud->insert($datato);

				# Upload Attachment
				# -------------------------------------------------------------------	
				$config['upload_path'] 			= './uploads/user_image/';
				$config['file_name'] 			= 'user-' . md5($id);
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
					$datato['id'] 				= $id;
					$this->crud->update($datato);
				
					$gbr = $this->upload->data();
					//Compress Image
					$this->create_thumbs($gbr['file_name']);
					$this->session->set_flashdata('flash_message','<div class="alert alert-info">Image Berhasil di upload.</div>');
				}else{
					echo $this->upload->display_errors();
				}

				# Script Send Email
				$this->email_model->send_email_verification($this->input->post('user_email'), $verification_code);

				# Message information & direct link								
				$this->session->set_flashdata('flash_message', 'Data berhasil disimpan');
				redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');
			}
			if ($type_form == "edit") {

				$decrypt_id						= str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('id'));
				$id								= $this->encrypt->decode($decrypt_id);
				$password						= $this->input->post('user_password');
		
				//Random Salt
				$rand_salt 						= $this->generate_encrypt->genRndSalt();
				//Encrypt Password
				$encrypt_pass 					= $this->generate_encrypt->encryptUserPwd( $this->input->post('user_password'),$rand_salt);
				# Verification Code
				$verification_code		 		=  md5(rand(100000000, 200000000));

				# Update Data
				# -------------------------------------------------------------------		
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'user';
				$datato['user_fullname']		= $this->input->post('user_fullname');
				$datato['user_gender']			= $this->input->post('user_gender');
				$datato['user_email']			= $this->input->post('user_email');
				$datato['user_ipaddress'] 		= $this->input->ip_address();
				$datato['user_role_id']   		= $this->input->post('user_role_id');
				$datato['company_id']   		= $this->input->post('company_id');
				$datato['level_1_id']   		= $this->input->post('level_1_id');
				$datato['level_2_id']   		= $this->input->post('level_2_id');
				$datato['user_modified_date'] = date('Y-m-d H:i:s');
				$datato['field'] 				= 'user_id';
				$datato['id'] 					= $id;
				$this->crud->update($datato);
				
				# Upload Attachment
				# -------------------------------------------------------------------	
				$config['upload_path'] 			= './uploads/user_image/';
				$config['file_name'] 			= 'user-' . md5($id);
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
					$datato['id'] 				= $id;
					$this->crud->update($datato);
					
					$gbr = $this->upload->data();
					//Compress Image
					$this->create_thumbs($gbr['file_name']);
					$this->session->set_flashdata('flash_message','<div class="alert alert-info">Image Berhasil di upload.</div>');
				}else{
					echo $this->upload->display_errors();
				}

				# If change password
				if($this->input->post('user_password')!='')
				{
					unset($datato);
					$datato['database']				= 'gurumaya';
					$datato['table'] 				= 'user';				
					$datato['user_password'] 		= $encrypt_pass;	
					$datato['user_salt']		 	= $rand_salt;	
					$datato['user_verification_code'] = $verification_code;						
					$datato['user_modified_date'] 	= date('Y-m-d H:i:s');
					$datato['field'] 				= 'user_id';
					$datato['id'] 					= $id;
					$this->crud->update($datato);			
				}

				# Script Send Email
				$this->email_model->send_email_verification($this->input->post('user_email'), $verification_code);

				# Message information & direct link	
				$this->session->set_flashdata('flash_message', 'Data berhasil diperbarui');
				redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3 . '/edit?id=' . $this->input->post('id')), 'refresh');
			}
		}
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

	function delete()
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
		# Get Attachment Filename "user_avatar"
		# -------------------------------------------------------------------		
		unset($datato);
		$datato['table'] 					= 'gurumaya.user';
		$datato['where'] 					= array(
			'gurumaya.user.user_id' => $id
		);
		$query 								= $this->crud->view_data($datato);
		if ($query->num_rows()) {
			$row 							= $query->row();
			$user_avatar					= $row->user_avatar;
		}

		# Path filename
		$upload_path = './uploads/user_image/' . $user_avatar;

		# If filename !='no_image.png' then delete
		if ($user_avatar != 'no_image.png') {
			unlink($upload_path);
		}

		# Delete Data
		# -------------------------------------------------------------------	
		unset($datato);
		$datato['database'] 				= 'gurumaya';
		$datato['table'] 					= 'user';
		$datato['field']					= 'user_id';
		$datato['id'] 						= $id;
		$this->crud->delete($datato);

		# Message information & direct link								
		$this->session->set_flashdata('flash_message', 'Data berhasil dihapus');
		redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');
	}
	
	public function export_excel()
	{
		
		$excel = new PHPExcel();
		$excel->setActiveSheetIndex(0);
		
		$table_columns = array(
			"ID",
			"Nama Pengguna",
			"Email",
			"Jenis Kelamin",
			"Aktif",
			"Dibuat tanggal",
			"Dimodifikasi tanggal"
		);
		$column = 0;
		foreach($table_columns as $field){
			$excel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$excel_row = 2;
		unset($datato);
		$datato['table'] = 'gurumaya.user';
		
		$Q1 = $this->crud->view_data($datato);
		foreach($Q1->result() as $R1){
			
			if($R1->user_active=1)
			{
				$user_active = 'Ye';
			}else if ($R1->user_active=0) {
				$user_active = 'Tidak';
			}

			if($R1->user_gender=1)
			{
				$user_gender = 'Laki-laki';
			}else if ($R1->user_gender=2) {
				$user_gender = 'Perempuan';
			}
			
			$index = 0;
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->user_id);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->user_fullname);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->user_email);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $user_gender);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $user_active);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->user_created_by));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->user_created_date);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->user_modified_by));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->user_modified_date);
			
			$excel_row++;
		}
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="report-user'.date('Y-m-d H:i:s').'.xlsx"');
		header('Cache-Control: max-age=0');
		$write = IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	
	
	
}
