<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: poin
| Module                : Admin
| Version               : 1.0;	
| Author				: Job Bradi Sibarani
| E-mail				: sanjoko89@gmail.com
| Created               : 22 July 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class User_access extends MY_Controller
{

	# Set Variabel Global	
	# -------------------------------------------------------------------     
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'role_access';
	private $var_uri_seg_3  			= 'user_access';


	function __construct()
	{
		parent::__construct();
		# Set Model 
		$this->load->model('admin_model');
		# -------------------------------------------------------------------   


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
		# Get Tabel user_access
		unset($datato);
		// $datato['table'] 			= 'gurumaya.user_access';
		
		// $datato['table_join'] 		= array(
		// 	'gurumaya.user_role'
		// );
		// $datato['table_join_on']	= array(
		// 	'gurumaya.user_access'
		// );
		// $datato['join_id']			= array(
		// 	'user_role_id'
		// );
		// $datato['join_type']		= array(
		// 	'inner'
		// );

		$datato['table'] 				= 'gurumaya.user_access';
		$datato['table_join'] 			= array(
											'gurumaya.user_role','gurumaya.menu',
										);
		$datato['table_join_on'] 		= array(
											'gurumaya.user_access','gurumaya.user_access',
										);
		$datato['join_id'] 				= array(
											'user_role_id','menu_id',
										);
		$datato['join_type'] 			= array(
											'inner','inner',
										);		
		$page_data['get_data']		= $this->crud->view_data($datato);

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'User Access';
		$page_data['content'] 		= 'role_access/user_access/view';
		// var_dump($page_data);
		// exit();
		$this->load->view('template/template', $page_data);
	}

	public function add()
	{
		# Set Value Form
		# -------------------------------------------------------------------
		$page_data['id'] 			= '';
		$page_data['type_form'] 	=  base64_encode('add');

		#Get Tabel user_role
		unset($datato);
		$datato['table'] 			= 'gurumaya.user_role';
		$page_data['get_dropdown_user_role'] = $this->crud->view_data($datato);

		#Get Tabel menu
		unset($datato);
		$datato['table'] 			= 'gurumaya.menu';
		$page_data['get_dropdown_menu'] = $this->crud->view_data($datato);

		$page_data['access_id']	= '';
		$page_data['user_role_id'] 	= '';
		$page_data['menu_id'] 	= '';
		$page_data['access_create'] 	= '';
		$page_data['access_read'] 	= '';
		$page_data['access_update'] 	= '';
		$page_data['access_delete'] 	= '';
		// $page_data['access_name'] 	= '';
		$page_data['action'] 		= 'save';

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'Tambah User Access';
		$page_data['content'] = 'role_access/user_access/form';
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
		$datato['table'] 					= 'gurumaya.user_access';
		$datato['where'] 					= array(
			'gurumaya.user_access.access_id' => $id
		);
		$query 								= $this->crud->view_data($datato);
		if ($query->num_rows()) {
			$row 							= $query->row();
			$page_data['id']				= $_GET['id'];	// Warning. You must be check mapping ID to PRIMARY KEY on Table
			$page_data['type_form']			= base64_encode('edit');

			#Get Tabel user role
			unset($datato);
			$datato['table'] 			= 'gurumaya.user_role';
			$page_data['get_dropdown_user_role'] = $this->crud->view_data($datato);

			$datato['table'] 			= 'gurumaya.menu';
			$page_data['get_dropdown_menu'] = $this->crud->view_data($datato);

			$page_data['user_role_id']		= $row->user_role_id;
			$page_data['menu_id']		= $row->menu_id;
			$page_data['access_create']		= $row->access_create;
			$page_data['access_read']		= $row->access_read;
			$page_data['access_update']		= $row->access_update;
			$page_data['access_delete']		= $row->access_delete;
			// $page_data['access_name']		= $row->access_name;
			$page_data['action'] 			= 'save';

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] 		= 'Edit User Access';
			$page_data['content'] 			= 'role_access/user_access/form';
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
		$this->form_validation->set_rules('user_role_id', 'Nama User role', 'required');

		# Run validation
		# -------------------------------------------------------------------
		if ($this->form_validation->run() === FALSE) {

			$id								= $this->uri->segment(4); // Get ID
			# Set Value Form
			# -------------------------------------------------------------------
			$page_data['id']    				= $this->input->post('id');
			$page_data['type_form']    			= $this->input->post('type_form');
			$page_data['user_role_id']			= $this->input->post('user_role_id');
			$page_data['menu_id']    		= $this->input->post('menu_id');
			$page_data['access_create']    		= $this->input->post('access_create');
			$page_data['access_read']    		= $this->input->post('access_read');
			$page_data['access_update']    		= $this->input->post('access_update');
			$page_data['access_delete']    		= $this->input->post('access_delete');
			$page_data['action'] 				= 'save';

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] = 'Tambah User Access';
			$page_data['content'] = 'role_access/user_access/form';
			$this->load->view('template/template', $page_data);
		} else {
			$type_form						= base64_decode($this->input->post('type_form'));

			if ($type_form == "add") {

				# Save Data
				# -------------------------------------------------------------------	
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'user_access';
				// var_dump($this->input->post('access_create'));
				// exit();
				// $datato['access_name']		 	= $this->input->post('access_name');
				$datato['user_role_id']			= $this->input->post('user_role_id');
				$datato['menu_id']    		= $this->input->post('menu_id');
				$datato['access_create']    		= $this->input->post('access_create');
				$datato['access_read']    		= $this->input->post('access_read');
				$datato['access_update']    		= $this->input->post('access_update');
				$datato['access_delete']    		= $this->input->post('access_delete');
				$datato['access_created_date']	= date('Y-m-d H:i:s');
				$id								= $this->crud->insert($datato);

				# Message information & direct link								
				$this->session->set_flashdata('flash_message', 'Data berhasil disimpan');
				redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');
			}
			if ($type_form == "edit") {

				$decrypt_id						= str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('id'));
				$id								= $this->encrypt->decode($decrypt_id);

				# Update Data
				# -------------------------------------------------------------------		
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'user_access';
				// $datato['company_id']			= $this->input->post('company_id');
				$datato['user_role_id']			= $this->input->post('user_role_id');
				$datato['menu_id']    		= $this->input->post('menu_id');
				$datato['access_create']    		= $this->input->post('access_create');
				$datato['access_read']    		= $this->input->post('access_read');
				$datato['access_update']    		= $this->input->post('access_update');
				$datato['access_delete']    		= $this->input->post('access_delete');			
				$datato['access_modified_date'] = date('Y-m-d H:i:s');
				$datato['field'] 				= 'access_id';
				$datato['id'] 					= $id;
				$this->crud->update($datato);

				# Message information & direct link	
				$this->session->set_flashdata('flash_message', 'Data berhasil diperbarui');
				redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3 . '/edit?id=' . $this->input->post('id')), 'refresh');
			}
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

		# Delete Data
		# -------------------------------------------------------------------	
		unset($datato);
		$datato['database'] 				= 'gurumaya';
		$datato['table'] 					= 'user_access';
		$datato['field']					= 'access_id';
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
			"Nama User Role",
			"Nama Menu",
			"Akses Create",
			"Akses Read",
			"Akses Update",
			"Akses Delete",
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
		$datato['table'] 				= 'gurumaya.user_access';
		$datato['table_join'] 			= array(
											'gurumaya.user_role','gurumaya.menu',
										);
		$datato['table_join_on'] 		= array(
											'gurumaya.user_access','gurumaya.user_access',
										);
		$datato['join_id'] 				= array(
											'user_role_id','menu_id',
										);
		$datato['join_type'] 			= array(
											'inner','inner',
										);
		$Q1 = $this->crud->view_data($datato);
		foreach($Q1->result() as $R1){
			$index = 0;
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->access_id);	
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->user_role_id));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->menu_title);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->access_create);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->access_read);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->access_update);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->access_delete);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->access_created_date);
			// $excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->access_modified_by));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->access_modified_date);
			$excel_row++;
		}
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="report-data_user_access'.date('Y-m-d').'.xlsx"');
		header('Cache-Control: max-age=0');
		$write = IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
