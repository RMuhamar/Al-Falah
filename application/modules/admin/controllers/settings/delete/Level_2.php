<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: level_2
| Module                : Admin
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 29 April 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Level_2 extends MY_Controller
{

	# Set Variabel Global	
	# -------------------------------------------------------------------     
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'master_data';
	private $var_uri_seg_3  			= 'level_2';


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
		# Get Tabel level_2
		unset($datato);
		$datato['table'] 			= 'gurumaya.level_2';
		$datato['table_join'] 		= array(
			'gurumaya.level_1'
		);
		$datato['table_join_on']	= array(
			'gurumaya.level_2'
		);
		$datato['join_id']			= array(
			'level_1_id'
		);
		$datato['join_type']		= array(
			'inner'
		);	
		$page_data['get_data']		= $this->crud->view_data($datato);

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'Level 2';
		$page_data['content'] 		= 'master_data/level_2/view';
		$this->load->view('template/template', $page_data);
	}

	public function add()
	{
		# Set Value Form
		# -------------------------------------------------------------------
		$page_data['id'] 			= '';
		$page_data['type_form'] 	=  base64_encode('add');

		#Get Tabel company
		unset($datato);
		$datato['table'] 			= 'gurumaya.level_1';
		$page_data['get_dropdown_level_1'] = $this->crud->view_data($datato);

		$page_data['level_1_id']	= '';
		$page_data['level_2_name'] 	= '';
		$page_data['action'] 		= 'save';

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'Tambah Level 2';
		$page_data['content'] = 'master_data/level_2/form';
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
		$datato['table'] 					= 'gurumaya.level_2';
		$datato['where'] 					= array(
			'gurumaya.level_2.level_2_id' => $id
		);
		$query 								= $this->crud->view_data($datato);
		if ($query->num_rows()) {
			$row 							= $query->row();
			$page_data['id']				= $_GET['id'];	// Warning. You must be check mapping ID to PRIMARY KEY on Table
			$page_data['type_form']			= base64_encode('edit');

			#Get Tabel company
			unset($datato);
			$datato['table'] 			= 'gurumaya.level_1';
			$page_data['get_dropdown_level_1'] = $this->crud->view_data($datato);

			$page_data['level_1_id']		= $row->level_1_id;
			$page_data['level_2_name']		= $row->level_2_name;
			$page_data['action'] 			= 'save';

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] 		= 'Edit Level 2';
			$page_data['content'] 			= 'master_data/level_2/form';
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
		$this->form_validation->set_rules('level_2_name', 'Nama Level 2', 'required');

		# Run validation
		# -------------------------------------------------------------------
		if ($this->form_validation->run() === FALSE) {

			$id								= $this->uri->segment(4); // Get ID
			# Set Value Form
			# -------------------------------------------------------------------
			$page_data['id']    				= $this->input->post('id');
			$page_data['type_form']    			= $this->input->post('type_form');
			$page_data['level_1_id']			= $this->input->post('level_1_id');
			$page_data['level_2_name']    		= $this->input->post('level_2_name');
			$page_data['action'] 				= 'save';

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] = 'Tambah Level 2';
			$page_data['content'] = 'master_data/level_2/form';
			$this->load->view('template/template', $page_data);
		} else {
			$type_form						= base64_decode($this->input->post('type_form'));

			if ($type_form == "add") {

				# Save Data
				# -------------------------------------------------------------------	
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'level_2';
				$datato['level_1_id']			= $this->input->post('level_1_id');
				$datato['level_2_name']		 	= $this->input->post('level_2_name');
				$datato['level_2_created_by'] 	= $sess_user_id;
				$datato['level_2_created_date']	= date('Y-m-d H:i:s');
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
				$datato['table'] 				= 'level_2';
				$datato['level_1_id']			= $this->input->post('level_1_id');
				$datato['level_2_name']		 	= $this->input->post('level_2_name');
				$datato['level_2_modified_by'] 	= $sess_user_id;
				$datato['level_2_modified_date'] = date('Y-m-d H:i:s');
				$datato['field'] 				= 'level_2_id';
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
		$datato['table'] 					= 'level_2';
		$datato['field']					= 'level_2_id';
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
			"Nama Level 2",
			"Nama Level 1",
			"Dibuat oleh",
			"Dibuat tanggal",
			"Dimodifikasi oleh",
			"Dimodifikasi tanggal"
		);
		$column = 0;
		foreach($table_columns as $field){
			$excel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$excel_row = 2;
		unset($datato);
		$datato['table'] 				= 'gurumaya.level_2';
		$datato['table_join'] 			= array(
											'gurumaya.level_1',
										);
		$datato['table_join_on'] 		= array(
											'gurumaya.level_2',
										);
		$datato['join_id'] 				= array(
											'level_1_id',
										);
		$datato['join_type'] 			= array(
											'inner',
										);
		$Q1 = $this->crud->view_data($datato);
		foreach($Q1->result() as $R1){
			$index = 0;
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->level_1_id);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->level_1_name);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->level_2_name);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->level_1_created_by));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->level_1_created_date);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->level_1_modified_by));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->level_1_modified_date);
			$excel_row++;
		}
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="report-data_level_2'.date('Y-m-d').'.xlsx"');
		header('Cache-Control: max-age=0');
		$write = IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
