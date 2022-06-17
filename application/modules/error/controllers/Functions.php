<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/*
| -------------------------------------------------------------------
|                               CONTROLLER
| Name       			: Page_404
| Module                : Error
| Project               : Recruitment
| Version               : 19.03.1;	
| Author				: Azis Muhammad Iqbal
| Created               : 5 April 2021
| -------------------------------------------------------------------
*/

class Functions extends MY_Controller {	 
	
	
	public function __construct()
	{
		parent::__construct();
		
		// phpmailer
		require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';
	}
	
	public function index()
	{
		echo 'Ok';
	}
	
	public function send_email()
	{
		$user_id	= 1;
		# Get Verification Code
		$verification_code	= md5(uniqid()) . '' . md5(uniqid());

		# Check Data Email 
		# -------------------------------------------------------------------
		unset($datato);
		$datato['table'] 				= 'ptc_in__recruitment.applicant_user';
		$datato['table_join']			= array(
			'ptc_in__recruitment.applicant_personal'
		);
		$datato['table_join_on'] 		= array(
			'ptc_in__recruitment.applicant_user'
		);
		$datato['join_id']				 = array(
			'user_id'
		);
		$datato['join_type'] 			= array(
			'inner'
		);
		$datato['where'] 				= array(
			'ptc_in__recruitment.applicant_user.user_id' => $user_id
		);
		$Q1 							= $this->crud->view_data($datato);
		if ($Q1->num_rows()) {
			$R1 			= $Q1->row();
			$to_fullname 	= $R1->personal_firstname . ' ' . $R1->personal_lastname;
			$to_email 		= $R1->user_email;
		}

		# Verification Code
		# -------------------------------------------------------------------
		unset($datato);
		$datato['database'] 			= 'ptc_in__recruitment';
		$datato['table'] 				= 'applicant_user';
		$datato['user_activation_code'] = $verification_code;
		$datato['field'] 				= 'user_id';
		$datato['id'] 					= $user_id;
		$this->crud->update($datato);

		# Email Message for Verification
		# -------------------------------------------------------------------		
		$url_verification	= base_url() . 'guest/verification?code=' . $verification_code;

		$subject 			= 'Verifikasi Akun Email';
		# Config Email	
		$config 			= array(
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_user' => 'apikey', // Email
			'smtp_pass'   => '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',  // Password Email
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'smtp_timeout' => 3600,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		);

		# Url Verification
		$data 					= array(
			'url_verification' => $url_verification
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('no-reply@pertamina-ptc.com', 'E-Recruitment PTC'); // Email Sender
		$this->email->to($to_email); // Destination  Email 
		$this->email->subject($subject);
		$this->email->set_mailtype('html');
		$body 				= $this->load->view('send_email.php', $data, TRUE);
		$message 			= $this->email->message($body);

		if ($this->email->send()) {
			$status		= 'Success';
		} else {
			$status		= 'Failed';
		}

		# Save "Log Email" to tabel : log_email
		# -------------------------------------------------------------------
		# Note : 	
		# email_type_id = 1 for Registration
		# email_type_id = 2 for Forget Password

		unset($datato);
		$datato['database'] 	= 'ptc_in__recruitment';
		$datato['table'] 		= 'log_email';
		$datato['from_email']	= 'no-reply@pertamina-ptc.com';
		$datato['to_email']		= $to_email;
		$datato['email_type_id'] = '1';	// 1 = Registration 
		$datato['status']		= $status;
		$datato['created_by'] 	= 'System';
		$datato['created_date'] = date('Y-m-d H:i:s');
		$this->crud->insert($datato);

		echo $this->email->print_debugger();
	}
	
	
	public function send_emailsss()
	{
		$user_id	= 1;
		# Get Verification Code
		$verification_code	= md5(uniqid()) . '' . md5(uniqid());

		# Check Data Email 
		# -------------------------------------------------------------------
		unset($datato);
		$datato['table'] 				= 'ptc_in__recruitment.applicant_user';
		$datato['table_join']			= array(
			'ptc_in__recruitment.applicant_personal'
		);
		$datato['table_join_on'] 		= array(
			'ptc_in__recruitment.applicant_user'
		);
		$datato['join_id']				 = array(
			'user_id'
		);
		$datato['join_type'] 			= array(
			'inner'
		);
		$datato['where'] 				= array(
			'ptc_in__recruitment.applicant_user.user_id' => $user_id
		);
		$Q1 							= $this->crud->view_data($datato);
		if ($Q1->num_rows()) {
			$R1 			= $Q1->row();
			$to_fullname 	= $R1->personal_firstname . ' ' . $R1->personal_lastname;
			$to_email 		= $R1->user_email;
		}

		# Verification Code
		# -------------------------------------------------------------------
		unset($datato);
		$datato['database'] 			= 'ptc_in__recruitment';
		$datato['table'] 				= 'applicant_user';
		$datato['user_activation_code'] = $verification_code;
		$datato['field'] 				= 'user_id';
		$datato['id'] 					= $user_id;
		$this->crud->update($datato);

		# Email Message for Verification
		# -------------------------------------------------------------------		
		$url_verification	= base_url() . 'guest/verification?code=' . $verification_code;

		$subject 			= 'Verifikasi Akun Email';
		# Config Email	
		$config 			= array(
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.kulakitu.com',
			'smtp_user' => 'no-reply@kulakitu.com', // Email
			'smtp_pass'   => '@jalusaketi',  // Password Email
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'smtp_timeout' => 3600,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		);

		# Url Verification
		$data 					= array(
			'url_verification' => $url_verification
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('no-reply@pertamina-ptc.com', 'E-Recruitment PTC'); // Email Sender
		$this->email->to($to_email); // Destination  Email 
		$this->email->subject($subject);
		$this->email->set_mailtype('html');
		$body 				= $this->load->view('send_email.php', $data, TRUE);
		$message 			= $this->email->message($body);

		if ($this->email->send()) {
			$status		= 'Success';
		} else {
			$status		= 'Failed';
		}

		# Save "Log Email" to tabel : log_email
		# -------------------------------------------------------------------
		# Note : 	
		# email_type_id = 1 for Registration
		# email_type_id = 2 for Forget Password

		unset($datato);
		$datato['database'] 	= 'ptc_in__recruitment';
		$datato['table'] 		= 'log_email';
		$datato['from_email']	= 'no-reply@pertamina-ptc.com';
		$datato['to_email']		= $to_email;
		$datato['email_type_id'] = '1';	// 1 = Registration 
		$datato['status']		= $status;
		$datato['created_by'] 	= 'System';
		$datato['created_date'] = date('Y-m-d H:i:s');
		$this->crud->insert($datato);

		echo $this->email->print_debugger();
	}
	public function email_test()
	{
		
		$user_id = 1;
		
		
		unset($datato);
		$datato['table'] = 'ptc_in__recruitment.applicant_user';
		$datato['where'] = array(
			'ptc_in__recruitment.applicant_user.user_id' => $user_id			
		);
		$Q1 = $this->crud->view_data($datato);
		if($Q1->num_rows()){
			$R1 = $Q1->row();
			
			$user_email 				= $R1->user_email;	
		}
		
		// Url Verification
		$url_verification	= base_url().'portal/verification?code=111111111111111111111111';
		
		$response = false;
		$mail = new PHPMailer();
	   
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'mail.kulakitu.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth = true;
		$mail->Username = 'no-reply@kulakitu.com'; // user email
		$mail->Password = '@jalusaketi'; // password email
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;
		$mail->setFrom('no-reply@kulakitu.com', 'Kulakitu Aktivasi'); // user email
		//$mail->addReplyTo('xxx@hostdomain.com', ''); //user email
		// Add a recipient
		$mail->addAddress($user_email); //email tujuan pengiriman email
		// Email subject
		$mail->Subject = 'Aktivasi Akun'; //subject email
		// Set email format to HTML
		$mail->isHTML(true);
		// Email body content
		# Url reset password
		$data = array(
			
			'url_verification' => $url_verification
		);	
		$mailContent = $this->load->view('send_email.php',$data,TRUE);
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			echo 'Success';
			// echo 'Message could not be sent.';
			// echo 'Mailer Error: ' . $mail->ErrorInfo;			
		}else{
			// SUCCESS LOG
			# Config Database & Table		
			echo 'Not Success';
			//echo 'Message has been sent';
		}
	}
	
	
}
