<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: log_login
| Module                : Admin
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 29 April 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Log_login extends MY_Controller
{

	# Set Variabel Global	
	# -------------------------------------------------------------------     
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'my_account';
	private $var_uri_seg_3  			= 'log_login';


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
		# Get Tabel log_login
		unset($datato);
		$datato['table'] 			= 'gurumaya.log_login_web';
		$datato['table_join']		= array(
			'gurumaya.user'
		);
		$datato['table_join_on']	= array(
			'gurumaya.log_login_web'
		);
		$datato['join_id'] 			= array(
			'user_id'
		);
		$datato['join_type']		= array(
			'inner'
		);
		$page_data['get_data']		= $this->crud->view_data($datato);

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'Riwayat Login Website';
		$page_data['content'] 		= 'my_account/log_login/view';
		$this->load->view('template/template', $page_data);
	}
	
	public function export_excel()
	{
		
		$excel = new PHPExcel();
		$excel->setActiveSheetIndex(0);
		
		$table_columns = array(
			"No",
			"Nama Pengguna",
			"Tanggal Login",
			"Ip Address",
			"Platform",
			"Status",
			"Browser"
		);
		$column = 0;
		foreach($table_columns as $field){
			$excel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$excel_row = 2;
		$no = 1;
		unset($datato);
		$datato['table'] = 'gurumaya.log_login_web';
		$datato['table_join'] = array(
			'gurumaya.user'
		);
		$datato['table_join_on'] = array(
			'gurumaya.log_login_web'
		);	
		$datato['join_id'] = array(
			'user_id'
		);	
		$datato['join_type'] = array(
			'inner'
		);
		$Q1 = $this->crud->view_data($datato);
		foreach($Q1->result() as $R1){

			if($R1->log_status == 1){
				$status = 'Sukses';
			}else{
				$status = 'Gagal';
			}
		
			$index = 0;
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $no++);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->user_fullname);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->log_date);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->log_ipaddress);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->log_platform);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $status);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->log_browser);
			$excel_row++;
		}
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="report-riwayat_login'.date('Y-m-d H:i:s').'.xlsx"');
		header('Cache-Control: max-age=0');
		$write = IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	
	
	
}
