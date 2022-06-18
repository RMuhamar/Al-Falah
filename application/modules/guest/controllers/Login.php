<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Login
| Module                : Guest
| Version               : 1.0;
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 29 April 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
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
        $this->load->library('generate_encrypt');
        $this->load->library('user_agent');
        $this->load->library('session');

        # Get Info User from Helper "whoami"
        # -------------------------------------------------------------------


        # Check User Access Module
        # -------------------------------------------------------------------


        # For Form Validation for HMVC
        $this->form_validation->CI = &$this;

        # Cache Control
        # -------------------------------------------------------------------
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    // public function index()
    // {
    //     $this->load->view('login');
    // }


    public function index()
    {
        if ($this->session->userdata('logged_in') == "") {
            # Form Validation
            # -------------------------------------------------------------------
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|xss_clean');

            # Set variabel Post
            # -------------------------------------------------------------------
            $username         = $this->input->post('username');
            $password     = $this->input->post('password');

            if ($this->form_validation->run() == FALSE) // If Validation is FALSE
            {
                #  Direct Url Login Google
                $page_data['url_google']     = '#';

                # Content & Template
                # -------------------------------------------------------------------
                $page_data['page_title']         = 'Login';
                $page_data['content']             = 'login';
                // $this->load->view('template/template', $page_data);
                $this->load->view('template_login/template', $page_data);
            } else { // If Validation is TRUE
                // var_dump($this->input->post());
                // die();

                # Check Type Device
                # -------------------------------------------------------------------
                $tablet_browser = 0;
                $mobile_browser = 0;

                if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                    $tablet_browser++;
                }

                if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                    $mobile_browser++;
                }

                if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
                    $mobile_browser++;
                }

                $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
                $mobile_agents = array(
                    'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
                    'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
                    'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
                    'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
                    'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
                    'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
                    'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
                    'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
                    'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-'
                );

                if (in_array($mobile_ua, $mobile_agents)) {
                    $mobile_browser++;
                }

                if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
                    $mobile_browser++;
                    //Check for tablets on opera mini alternative headers
                    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
                    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                        $tablet_browser++;
                    }
                }
                if ($mobile_browser > 0) {
                    // do something for mobile devices
                    $type_device_id = '1';
                    $type_device = 'mobile';
                } else if ($tablet_browser > 0) {
                    // do something for tablet devices
                    $type_device_id = '2';
                    $type_device = 'tablet';
                } else {
                    // do something for everything else
                    $type_device_id = '3';
                    $type_device = 'desktop';
                }


                # Check Database User Login
                # -------------------------------------------------------------------
                unset($datato);
                $datato['table']             = 'gurumaya.user';
                $datato['table_join']        = array(
                    'gurumaya.user_role'
                );
                $datato['table_join_on']     = array(
                    'gurumaya.user'
                );
                $datato['join_id']             = array(
                    'user_role_id'
                );
                $datato['join_type']         = array(
                    'inner'
                );
                $datato['where']             = array(
                    'gurumaya.user.user_email' => $username
                );

                $query = $this->crud->view_data($datato);
                if ($query->num_rows() > 0) {
                    $row                 = $query->row();
                    $user_id             = $row->user_id;
                    $user_fullname         = $row->user_fullname;
                    $user_role_id         = $row->user_role_id;
                    $user_role_name     = $row->user_role_name;
                    $user_password         = $row->user_password;
                    $user_salt             = $row->user_salt;
                    $user_active         = $row->user_active;

                    if ($this->generate_encrypt->encryptUserPwd($password, $user_salt) === $user_password and $user_active == 1) {
                        # Set Session
                        # -------------------------------------------------------------------
                        echo $sess_data['logged_in']        = base64_encode('ZWdgAcOK+IhHEETIBXN8UffG/edND+FzfS93V3uo2M9A5hP9UtRMbq7oOO/9kJKFYhwUB/4JrubRUUFWoscNDA==');
                        $sess_data['user_id']       = base64_encode($row->user_id);
                        $sess_data['user_role_id']    = $row->user_role_id;
                        $this->session->set_userdata($sess_data);

                        # Insert log to database
                        # -------------------------------------------------------------------
                        unset($datato);
                        $datato    = array(
                            'database'                         => 'gurumaya',
                            'table'                            => 'log_login_web',
                            'log_date'                        => date("Y-m-d His"),
                            'user_id'                        => $user_id,
                            'log_status'                    => 1, // Success
                            'log_ipaddress'                    => $this->input->ip_address(),
                            'log_platform'                    => $this->agent->platform(),
                            'log_browser'                     => $browser
                        );

                        $this->crud->insert($datato);
                        redirect(base_url() . 'guest/login');
                    }
                }

                $this->session->set_flashdata('error_message', 'Email & Password tidak sesuai.');

                #  Direct Url Login Google
                $page_data['url_google']     = '#';

                # Content & Template
                # -------------------------------------------------------------------
                $page_data['page_title']     = 'Login';
                $page_data['content']         = 'login';
                $this->load->view('template/template', $page_data);
            }
        } else if ($this->session->userdata('user_role_id') == 5 or $this->session->userdata('user_role_id') == 6) {
            $this->session->set_flashdata('flash_message', 'Selamat Datang kembali di Gurumaya');
            redirect(base_url() . 'guest/home');
        } else if ($this->session->userdata('user_role_id') != 5 or $this->session->userdata('user_role_id') != 6) {
            $this->session->set_flashdata('flash_message', 'Selamat Datang kembali di Gurumaya');
            redirect(base_url() . 'admin/home');
        } else {
            $this->session->set_flashdata('flash_message', 'Anda berhasil keluar dari sistem.');
            redirect(base_url() . 'login/logout');
        }
    }

    public function logout()
    {
        #$this->session_destroy();

        $this->session->sess_destroy();

        $this->session->set_flashdata('flash_message', 'Anda berhasil keluar dari sistem.');
        redirect(site_url('guest/login'), 'refresh');
    }
}
