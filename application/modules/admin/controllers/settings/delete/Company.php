<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Company
| Module                : Admin
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 29 April 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Company extends MY_Controller
{

	# Set Variabel Global	
	# -------------------------------------------------------------------     
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'master_data';
	private $var_uri_seg_3  			= 'company';


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
		# Get Tabel Company
		unset($datato);
		$datato['table'] 			= 'gurumaya.company';
		$page_data['get_data']		= $this->crud->view_data($datato);

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'Perusahaan';
		$page_data['content'] 		= 'master_data/company/view';
		$this->load->view('template/template', $page_data);
	}

	public function add()
	{

		# Set Value Form
		# -------------------------------------------------------------------
		$page_data['id'] 			= '';
		$page_data['type_form'] 	=  base64_encode('add');
		$page_data['company_name'] 	= '';
		$page_data['company_phone'] = '';
		$page_data['company_email'] = '';
		$page_data['company_logo'] 	= 'no_image.png';
		$page_data['company_active'] = '';
		$page_data['action'] 		= 'save';

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] = 'Tambah Perusahaan';
		$page_data['content'] = 'master_data/company/form';
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
		$datato['table'] 					= 'gurumaya.company';
		$datato['where'] 					= array(
			'gurumaya.company.company_id' => $id
		);
		$query 								= $this->crud->view_data($datato);
		if ($query->num_rows()) {
			$row 							= $query->row();
			$page_data['id']				= $_GET['id'];	// Warning. You must be check mapping ID to PRIMARY KEY on Table
			$page_data['type_form']			= base64_encode('edit');
			$page_data['company_logo']		= $row->company_logo;
			$page_data['company_name']		= $row->company_name;
			$page_data['company_email']		= $row->company_email;
			$page_data['company_phone']		= $row->company_phone;
			$page_data['company_active']	= $row->company_active;
			$page_data['action'] 			= 'save';

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] 		= 'Edit Perusahaan';
			$page_data['content'] 			= 'master_data/company/form';
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
		$this->form_validation->set_rules('company_name', 'Nama Perusahaan', 'required');
		$this->form_validation->set_rules('company_phone', 'Telpon', 'required');
		$this->form_validation->set_rules('company_email', 'Email', 'required');


		# Run validation
		# -------------------------------------------------------------------
		if ($this->form_validation->run() === FALSE) {
			$id								= $this->uri->segment(4); // Get ID
			# Set Value Form
			# -------------------------------------------------------------------
			$page_data['id']    				= $this->input->post('id');
			$page_data['type_form']    			= $this->input->post('type_form');
			$page_data['company_name']    		= $this->input->post('company_name');
			$page_data['company_phone']    		= $this->input->post('company_phone');
			$page_data['company_email']    		= $this->input->post('company_email');
			$page_data['company_logo'] 			= 'no_image.png';
			$page_data['company_active']    	= $this->input->post('company_active');
			$page_data['action'] 				= 'save';

			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] = 'Tambah Perusahaan';
			$page_data['content'] = 'master_data/company/form';
			$this->load->view('template/template', $page_data);
		} else {
			$type_form								= base64_decode($this->input->post('type_form'));

			if ($type_form == "add") {

				# Save Data
				# -------------------------------------------------------------------	
				unset($datato);
				$datato['database'] 			= 'gurumaya';
				$datato['table'] 				= 'company';
				$datato['company_logo']		 	= 'no_image.png';
				$datato['company_name']		 	= $this->input->post('company_name');
				$datato['company_phone']		= $this->input->post('company_phone');
				$datato['company_email']		= $this->input->post('company_email');
				$datato['company_active']   	 = $this->input->post('company_active');
				$datato['company_created_by'] 	= $sess_user_id;
				$datato['company_created_date']	= date('Y-m-d H:i:s');
				$id								= $this->crud->insert($datato);

				# Upload Attachment
				# -------------------------------------------------------------------	
				$config['upload_path'] 			= './uploads/company/';
				$config['file_name'] 			= 'company-' . md5($id);
				$config['overwrite']     		= true;
				$config['allowed_types'] 		= 'jpg|jpeg|png|bmp';
				$config['max_size']      		= '1000';
				$this->upload->initialize($config);
				if ($this->upload->do_upload("company_logo")) {
					$company_logo = $this->upload->data();
					unset($datato);
					$datato['database'] 		= 'gurumaya';
					$datato['table'] 			= 'company';
					$datato['company_logo'] 	= $company_logo['file_name'];
					$datato['field'] 			= 'company_id';
					$datato['id'] 				= $id;
					$this->crud->update($datato);
				}

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
				$datato['table'] 				= 'company';
				$datato['company_name']		 	= $this->input->post('company_name');
				$datato['company_phone']		= $this->input->post('company_phone');
				$datato['company_email']		= $this->input->post('company_email');
				$datato['company_active']   	= $this->input->post('company_active');
				$datato['company_modified_by'] 	= $sess_user_id;
				$datato['company_modified_date'] = date('Y-m-d H:i:s');
				$datato['field'] 				= 'company_id';
				$datato['id'] 					= $id;
				$this->crud->update($datato);

				# Upload Attachment
				# -------------------------------------------------------------------	
				$config['upload_path'] 			= './uploads/company/';
				$config['file_name'] 			= 'company-' . md5($id);
				$config['overwrite']     		= true;
				$config['allowed_types'] 		= 'jpg|jpeg|png|bmp';
				$config['max_size']      		= '1000';
				$this->upload->initialize($config);
				if ($this->upload->do_upload("company_logo")) {
					$company_logo = $this->upload->data();
					unset($datato);
					$datato['database'] 		= 'gurumaya';
					$datato['table'] 			= 'company';
					$datato['company_logo'] 	= $company_logo['file_name'];
					$datato['field'] 			= 'company_id';
					$datato['id'] 				= $id;
					$this->crud->update($datato);
				}

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


		# Get Attachment Filename "company_logo"
		# -------------------------------------------------------------------		
		unset($datato);
		$datato['table'] 					= 'gurumaya.company';
		$datato['where'] 					= array(
			'gurumaya.company.company_id' => $id
		);
		$query 								= $this->crud->view_data($datato);
		if ($query->num_rows()) {
			$row 							= $query->row();
			$company_logo					= $row->company_logo;
		}

		# Path filename
		$upload_path = './uploads/company/' . $company_logo;

		# If filename !='no_image.png' then delete
		if ($company_logo != 'no_image.png') {
			unlink($upload_path);
		}

		# Delete Data
		# -------------------------------------------------------------------	
		unset($datato);
		$datato['database'] 				= 'gurumaya';
		$datato['table'] 					= 'company';
		$datato['field']					= 'company_id';
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
			"Nama Perusahaan",
			"Email",
			"Telpon",
			"Aktif",
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
		$datato['table'] = 'gurumaya.company';
		
		$Q1 = $this->crud->view_data($datato);
		foreach($Q1->result() as $R1){
			
			if($R1->company_active=1)
			{
				$company_active = 'Ye';
			}else if ($R1->company_active=0) {
				$company_active = 'Tidak';
			}
			
			$index = 0;
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->company_id);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->company_name);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->company_email);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->company_phone);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $company_active);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->company_created_by));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->company_created_date);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->company_modified_by));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->company_modified_date);
			
			$excel_row++;
		}
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="master_data-company'.date('Y-m-d H:i:s').'.xlsx"');
		header('Cache-Control: max-age=0');
		$write = IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	
	
	
}
