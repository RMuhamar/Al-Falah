<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function send_email_test ($to = "")
	{
		$template 		= 'email_test';
		$email_type 	= 'email_test';
		$subject 		= "Test Email Gurumaya";
		$message		= "<p>Ini adalah pesan email yang dikirim oleh sistem Gurumaya saat menguji pengaturan SMTP.</p>";
		$this->send_smtp_mail($template, $message, $subject, $to, get_settings('system_email'), $email_type);
	}

	public function send_email_verification($to = "", $verification_code = "")
	{
		$template 		= 'verification';
		$email_type 	= 'verification';
		$redirect_url 	= site_url('guest/verification?code=' . $verification_code);
		$subject 		= "Verifikasi Akun";
		$message		= "<p>Terima kasih anda telah mendaftar di Gurumaya. Mohon klik tombol dibawah ini untuk aktivasi akun anda.</p>";
		$this->send_smtp_mail($template, $message, $subject, $to, get_settings('system_email'), $email_type, $redirect_url);
	}

	public function send_email_forgot_password($to = "", $forgot_code = "")
	{
		$template 		= 'forgot_password';
		$email_type 	= 'verification';
		$redirect_url 	= site_url('guest/forgot_password/reset?code=' . $forgot_code);
		$subject 		= "Reset Password";
		$message		= "<p>Kami telah menerima permintaan untuk mengatur ulang kata sandi yang terhubung dengan dengan akun Gurumaya.</p>";
		$this->send_smtp_mail($template, $message, $subject, $to, get_settings('system_email'), $email_type, $redirect_url);
	}



	public function send_smtp_mail($template = NULL, $message = NULL, $subject = NULL, $to = NULL, $from = NULL, $email_type = NULL, $redirect_url = NULL)
	{
		//Load email library
		$this->load->library('email');

		if ($from == NULL)
			$from		=	$this->db->get_where('settings', array('key' => 'system_email'))->row()->value;

		//SMTP & mail configuration
		$config = array(
			'protocol'  => get_settings('protocol'),
			'smtp_host' => get_settings('smtp_host'),
			'smtp_port' => get_settings('smtp_port'),
			'smtp_user' => get_settings('smtp_user'),
			'smtp_pass' => get_settings('smtp_pass'),
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		$email_data = array('subject' => $subject, 'message' => $message);

		if ($email_type == "verification") {
			$email_data['redirect_url'] = $redirect_url;
		}

		$htmlContent = $this->load->view('email/' . $template, $email_data, TRUE);
		// $htmlContent = $msg;
		$this->email->to($to);
		$this->email->from($from, get_settings('system_name'));
		$this->email->subject($subject);
		$this->email->message($htmlContent);

		//Send email
		$this->email->send();
	}
}
