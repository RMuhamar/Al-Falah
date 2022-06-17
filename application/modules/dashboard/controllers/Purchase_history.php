<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Purchase_history
| Module                : Dashboard
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 24 May 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_history extends MY_Controller
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

		# Set Helper 
		# -------------------------------------------------------------------


		# Get Info User from Helper "whoami"
		# -------------------------------------------------------------------


		# Check User Access Module
		# -------------------------------------------------------------------


		# For Form Validation for HMVC 
		// $this->form_validation->CI = &$this;
	}

	public function index()
	{
		# Check User Session
		$sess_user_id				= base64_decode($this->session->userdata('user_id'));
		if($sess_user_id){
			# Get Tabel transaction_process
			# -----------------------------------------------------------------------
			// unset($datato);
			$datato['table'] 			= 'gurumaya.transaction_process';
			$datato['table_join']		= array(
				'gurumaya.transaction_detail',
				'gurumaya.transaction_payment_midtrans',
				'gurumaya.payment_partner'
			);
			$datato['table_join_on']	= array(
				'gurumaya.transaction_process',
				'gurumaya.transaction_process',
				'gurumaya.transaction_process'
			);
			$datato['join_id']			= array(
				'trx_id',
				'trx_id',
				'payment_partner_id'
			);
			$datato['join_type']		= array(
				'inner',
				'inner',
				'inner'
			);
			$datato['where']			= array(
				'gurumaya.transaction_process.user_id' => $sess_user_id,
				// 'gurumaya.transaction_process.trx_process' => 3
			);			
			$page_data['get_data'] 		= $this->crud->view_data($datato);
			
			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] 	= 'Wishlist';
			$page_data['content'] 		= 'purchase_history';
			$this->load->view('template/template', $page_data);
			
		}else{
			
			$page_data['page_title'] = 'Home';
			$page_data['content'] = 'home';
			$this->load->view('template/template', $page_data);
			
		}
	}
	
	public function purchase_history_detail()
	{
		# Check User Session
		$sess_user_id				= base64_decode($this->session->userdata('user_id'));
		if($sess_user_id){
			# Get Tabel transaction_process
			# -----------------------------------------------------------------------
			// unset($datato);
			$datato['table'] 			= 'gurumaya.transaction_process';
			$datato['table_join']		= array(
				'gurumaya.transaction_detail',
				'gurumaya.transaction_payment_midtrans',
				'gurumaya.payment_partner'
			);
			$datato['table_join_on']	= array(
				'gurumaya.transaction_process',
				'gurumaya.transaction_process',
				'gurumaya.transaction_process'
			);
			$datato['join_id']			= array(
				'trx_id',
				'trx_id',
				'payment_partner_id'
			);
			$datato['join_type']		= array(
				'inner',
				'inner',
				'inner'
			);
			$datato['where']			= array(
				'gurumaya.transaction_process.user_id' => $sess_user_id,
				'gurumaya.transaction_process.trx_id' => $this->uri->segment(4)
			);			
			$query = $this->crud->view_data($datato);
			if($query->num_rows())
			{
				$row 								= $query->row();
				$page_data['payment_time']			= $row->payment_time;
				$page_data['order_id']				= $row->order_id;
				$page_data['payment_code']			= $row->payment_code;
				$page_data['course_name']			= $row->trx_det_course_name;
				$page_data['payment_amount']		= $row->payment_amount;
				$page_data['payment_partner_name']	= $row->payment_partner_name;
				$page_data['payment_type']			= $row->payment_type;
				$page_data['status_code']			= $row->status_message;
				
			}	
			
			# Content & Template
			# -------------------------------------------------------------------	
			$page_data['page_title'] 		= 'Histori Pembayaran';
			$page_data['page_subtitle'] 	= 'Detail Histori Pembayaran Gurumaya';
			$page_data['content'] 			= 'purchase_history_detail';
			$this->load->view('template/template', $page_data);
			
		}else{
			
			$page_data['page_title'] = 'Home';
			$page_data['content'] = 'home';
			$this->load->view('template/template', $page_data);
			
		}
	}
}
