<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Course
| Module                : Admin
| Version               : 1.0;	
| Author				: Job Bradi Sibarani
| E-mail				: sanjoko89@gmail.com
| Created               : 22 July 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Course extends MY_Controller
{

	# Set Variabel Global	
	# -------------------------------------------------------------------     
	# URI Segment
	private $var_uri_seg_1  			= 'admin';
	private $var_uri_seg_2  			= 'report';
	private $var_uri_seg_3  			= 'course';


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
		$this->load->library('whoami');

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
		# Get Tabel user role
		unset($datato);
		$datato['table'] 			= 'gurumaya.course';
		$page_data['get_data']		= $this->crud->view_data($datato);

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'course';
		$page_data['content'] 		= 'report/course/view';
		// var_dump($page_data);
		// exit();
		$this->load->view('template/template', $page_data);
	}
	
	public function process()
	{
		# Get Tabel user role
		unset($datato);
		$datato['table'] 			= 'gurumaya.course';
		$page_data['get_data']		= $this->crud->view_data($datato);

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'course';
		$page_data['content'] 		= 'report/course/view';
		// var_dump($page_data);
		// exit();
		$this->load->view('template/template', $page_data);
	}
	
	public function archive()
	{
		# Get Tabel user role
		unset($datato);
		$datato['table'] 			= 'gurumaya.course';
		$page_data['get_data']		= $this->crud->view_data($datato);

		# Content & Template
		# -------------------------------------------------------------------	
		$page_data['page_title'] 	= 'course';
		$page_data['content'] 		= 'report/course/view';
		// var_dump($page_data);
		// exit();
		$this->load->view('template/template', $page_data);
	}
	

	public function export_excel()
	{

		$excel = new PHPExcel();
		$excel->setActiveSheetIndex(0);
		
		$table_columns = array(
			"ID",
			"Nama User",
			"course",
			"User Referral",
			"course Status"
		);
		$column = 0;
		foreach($table_columns as $field){
			$excel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$excel_row = 2;
		unset($datato);
		$datato['table'] 				= 'gurumaya.course';
		$datato['table_join'] 			= array(
											'gurumaya.user',
										);
		$datato['table_join_on'] 		= array(
											'gurumaya.course',
										);
		$datato['join_id'] 				= array(
											'user_id',
										);
		$datato['join_type'] 			= array(
											'inner',
										);
		$Q1 = $this->crud->view_data($datato);
		foreach($Q1->result() as $R1){
			$index = 0;
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->courset_id);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->user_id));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->course_total);
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->referral_id));
			$excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->course_status);
		}
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="report-data_course'.date('Y-m-d').'.xlsx"');
		header('Cache-Control: max-age=0');
		$write = IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
