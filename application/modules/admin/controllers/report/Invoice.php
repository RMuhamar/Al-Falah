<?php
/*
|.-.   .-.   .-.   .-.   .-.   .  CONTROLLERS  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: invoice
| Module                : Admin
| Version               : 1.0;	
| Author				: Job Bradi Sibarani
| E-mail				: sanjoko89@gmail.com
| Created               : 22 July 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends MY_Controller
{

    # Set Variabel Global	
    # -------------------------------------------------------------------     
    # URI Segment
    private $var_uri_seg_1              = 'admin';
    private $var_uri_seg_2              = 'report';
    private $var_uri_seg_3              = 'transaction_process';


    function __construct()
    {
        parent::__construct();
        # Set Model 
        $this->load->model('Admin_model');
        # -------------------------------------------------------------------   


        # Set Library 
        # -------------------------------------------------------------------			
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->library('upload');
        // $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI

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
        redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/invoice/process'));
    }

    public function process()
    {
        # Payment Partner
        unset($datato);
        $datato['table']             = 'gurumaya.payment_partner';
        $datato['order']             = array('gurumaya.payment_partner.payment_partner_id');
        $datato['order_type']         = array('asc');
        $page_data['dropdown_payment_partner'] = $this->crud->view_data($datato);

        # Get Tabel transaction_process
        unset($datato);

        $datato['table']                 = 'gurumaya.transaction_process';
        $datato['table_join']             = array(
            'gurumaya.payment_partner'
        );
        $datato['table_join_on']         = array(
            'gurumaya.transaction_process'
        );
        $datato['join_id']                 = array(
            'payment_partner_id'
        );
        $datato['join_type']             = array(
            'inner'
        );
        $datato['where']                     = array(
            'gurumaya.transaction_process.trx_done' => '0'
        );
        $page_data['get_data']        = $this->crud->view_data($datato);

        # Content & Template
        # -------------------------------------------------------------------	
        $page_data['page_title']     = 'Invoice';
        $page_data['content']         = 'report/invoice/view';
        // var_dump($page_data);
        // exit();
        $this->load->view('template/template', $page_data);
    }

    public function archive()
    {
        # Payment Partner
        unset($datato);
        $datato['table']             = 'gurumaya.payment_partner';
        $datato['order']             = array('gurumaya.payment_partner.payment_partner_id');
        $datato['order_type']         = array('asc');
        $page_data['dropdown_payment_partner'] = $this->crud->view_data($datato);

        # Get Tabel transaction_archieve
        unset($datato);

        $datato['table']                 = 'gurumaya.transaction_archieve';
        $datato['table_join']             = array(
            'gurumaya.payment_partner'
        );
        $datato['table_join_on']         = array(
            'gurumaya.transaction_archieve'
        );
        $datato['join_id']                 = array(
            'payment_partner_id'
        );
        $datato['join_type']             = array(
            'inner'
        );
        $datato['where']                     = array(
            'gurumaya.transaction_archieve.trx_done' => '1'
        );
        $page_data['get_data']        = $this->crud->view_data($datato);

        # Content & Template
        # -------------------------------------------------------------------	
        $page_data['page_title']     = 'Invoice Archive';
        $page_data['content']         = 'report/invoice/view_archive';
        // var_dump($page_data);
        // exit();
        $this->load->view('template/template', $page_data);
    }

    public function process_detail()
    {
        # Checking
        # -------------------------------------------------------------------
        # 1. Check ID is not Empty
        if (empty($_GET['id'])) {
            header('location:' . base_url() . 'error_404');
        }

        # Decrypt ID
        # -------------------------------------------------------------------
        $decrypt_id                            = str_replace(array('-', '_', '~'), array('+', '/', '='), $_GET['id']);
        $id                                    = $this->encrypt->decode($decrypt_id);

        # Get Value from Database
        # -------------------------------------------------------------------		
        unset($datato);
        $datato['table']                     = 'gurumaya.transaction_process';
        $datato['where']                     = array(
            'gurumaya.transaction_process.trx_id' => $id
        );
        $query                                 = $this->crud->view_data($datato);
        if ($query->num_rows()) {
            $row                             = $query->row();
            $page_data['id']                = $_GET['id'];    // Warning. You must be check mapping ID to PRIMARY KEY on Table
            $page_data['type_form']            = base64_encode('edit');

            #Get Tabel company
            unset($datato);

            $page_data['trx_id']        = $row->trx_id;
            $page_data['trx_code']        = $row->trx_code;
            $page_data['trx_created_date']        = $row->trx_created_date;
            $page_data['trx_json_course_name']        = $row->trx_json_course_name;
            $page_data['trx_total_disc']        = $row->trx_total_disc;
            $page_data['trx_grand_total']        = $row->trx_grand_total;
            $page_data['currency_id']        = $row->currency_id;
            $page_data['trx_payment_method']        = $row->trx_payment_method;
            $page_data['payment_partner_id']        = $row->payment_partner_id;
            $page_data['trx_status']        = $row->trx_status;
            $page_data['action']             = 'save';

            # Content & Template
            # -------------------------------------------------------------------	
            $page_data['page_title']         = 'Process Detail';
            $page_data['content']             = 'report/invoice/process_detail';
            $this->load->view('template/template', $page_data);
        } else {
            # Message information & direct link								
            $this->session->set_flashdata('error_message', 'Data tidak ditemukan');
            redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');
        }
    }

    public function archieve_detail()
    {
        # Checking
        # -------------------------------------------------------------------
        # 1. Check ID is not Empty
        if (empty($_GET['id'])) {
            header('location:' . base_url() . 'error_404');
        }

        # Decrypt ID
        # -------------------------------------------------------------------
        $decrypt_id                            = str_replace(array('-', '_', '~'), array('+', '/', '='), $_GET['id']);
        $id                                    = $this->encrypt->decode($decrypt_id);

        # Get Value from Database
        # -------------------------------------------------------------------		
        unset($datato);
        $datato['table']                     = 'gurumaya.transaction_archieve';
        $datato['where']                     = array(
            'gurumaya.transaction_archieve.trx_id' => $id
        );
        $query                                 = $this->crud->view_data($datato);
        if ($query->num_rows()) {
            $row                             = $query->row();
            $page_data['id']                = $_GET['id'];    // Warning. You must be check mapping ID to PRIMARY KEY on Table
            $page_data['type_form']            = base64_encode('edit');

            #Get Tabel company
            unset($datato);

            $page_data['trx_id']        = $row->trx_id;
            $page_data['trx_code']        = $row->trx_code;
            $page_data['trx_created_date']        = $row->trx_created_date;
            $page_data['trx_json_course_name']        = $row->trx_json_course_name;
            $page_data['trx_total_disc']        = $row->trx_total_disc;
            $page_data['trx_grand_total']        = $row->trx_grand_total;
            $page_data['currency_id']        = $row->currency_id;
            $page_data['trx_payment_method']        = $row->trx_payment_method;
            $page_data['payment_partner_id']        = $row->payment_partner_id;
            $page_data['trx_status']        = $row->trx_status;
            $page_data['action']             = 'save';

            # Content & Template
            # -------------------------------------------------------------------	
            $page_data['page_title']         = 'Archieve Detail';
            $page_data['content']             = 'report/invoice/archieve_detail';
            $this->load->view('template/template', $page_data);
        } else {
            # Message information & direct link								
            $this->session->set_flashdata('error_message', 'Data tidak ditemukan');
            redirect(site_url($this->var_uri_seg_1 . '/' . $this->var_uri_seg_2 . '/' . $this->var_uri_seg_3), 'refresh');
        }
    }

    public function print_pdf_process()
    {
        # Decrypt ID
        # -------------------------------------------------------------------
        $decrypt_id                        = str_replace(array('-', '_', '~'), array('+', '/', '='), $_GET['id']);
        $id                                = $this->encrypt->decode($decrypt_id);

        $query = $this->db->query("select * from transaction_process AS a LEFT JOIN transaction_detail AS b on a.trx_json_course_id=b.trx_id where a.trx_id=" . $id)->result();
        foreach ($query as $row) {
            $data['id']                    = $_GET['id'];
            $trx_code                     = $row->trx_code;
            $trx_created_date            = $row->trx_created_date;
            $trx_json_course_id            = $row->trx_json_course_id;
            $trx_total_disc            = $row->trx_total_disc;
            $trx_grand_total            = $row->trx_grand_total;
        }

        // $pdf = new FPDF('3','mm','A4');
        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 28);
        $pdf->Image('https://dev.pertamina-ptc.com/gurumaya/assets/guest/default/img/logo-wh.png', 10, 5, -300);
        // mencetak string 
        $pdf->Cell(190, 7, 'INVOICE', 0, 0, 'R');
        $pdf->Line(10, 20, 200, 20);

        $pdf->Ln(7);
        $pdf->SetFont('Arial', 'B', 12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);

        //bill invoice
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, 'Kepada', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(60, 6, "Job Bradi Sibarani", 0, 0);

        $getX = $pdf->getX();
        $getY = $pdf->getY();
        $pdf->setXY($getX + 55, $getY);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, 'invoice', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(35, 6, $trx_code, 0, 1);

        $getX = $pdf->getX();
        $getY = $pdf->getY();
        $pdf->setXY($getX + 139, $getY);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(16, 6, 'Tanggal ', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 6, $trx_created_date, 0, 1);

        $pdf->Ln(40);
        $pdf->setFillColor(241, 241, 239, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(80, 10, 'Nama Kursus', 1, 0, 'C', TRUE);
        $pdf->Cell(30, 10, 'Jumlah', 1, 0, 'C', TRUE);
        $pdf->Cell(40, 10, 'Harga', 1, 0, 'C', TRUE);
        $pdf->Cell(40, 10, 'Total', 1, 1, 'C', TRUE);

        $trx_json_course_id = json_decode($trx_json_course_id);
        $trx_json_course = implode(",", $trx_json_course_id);
        $query_detail = $this->db->query("select * from transaction_detail AS a where a.trx_id=" . $id . " and a.trx_det_id IN (" . $trx_json_course . ")")->result();
        $trx_det_course_price = 0;

        foreach ($query_detail as $row) {

            $current_x = 80;
            $pdf->SetFont('Arial', '', 10);
            $pdf->MultiCell($current_x, 6, $row->trx_det_course_name, 1, "L");

            $getX = $pdf->getX();
            $getY = $pdf->getY();
            $pdf->setXY($getX + $current_x, $getY - 6);
            $current_x = 30;
            $pdf->MultiCell($current_x, 6, $row->trx_det_qty, 1, "L");

            $getX = $pdf->getX();
            $getY = $pdf->getY();
            $pdf->setXY($getX + 110, $getY - 6);
            $pdf->Cell(40, 6, "Rp. " . number_format($row->trx_det_course_price), 1, 0);
            $trx_det_course_price += $row->trx_det_course_price;

            $pdf->Cell(40, 6, "Rp. " . number_format($row->trx_det_course_price), 1, 1);
        }

        $pdf->Ln(3);
        $getX = $pdf->getX();
        $getY = $pdf->getY();

        $pdf->setXY($getX + 125, $getY);

        $pdf->Line(10, $getY, 200, $getY);

        $pdf->Cell(25, 6, "Total  ", 0, 0, "L");
        $pdf->Cell(40, 6, "Rp. " . number_format($trx_det_course_price), 0, 1);
        $pdf->Line(136, $getY + 6, 200, $getY + 6);

        if ($trx_total_disc != '') {
            $getX = $pdf->getX();
            $getY = $pdf->getY();
            $pdf->setXY($getX + 125, $getY);
            $pdf->Cell(25, 6, "Diskon ", 0, 0, "L");
            $pdf->Cell(40, 6, "Rp. " . number_format($trx_total_disc), 0, 1);
            $pdf->Line(136, $getY + 6, 200, $getY + 6);

            $trx_det_course_price = $trx_det_course_price - $trx_total_disc;
        }

        $getX = $pdf->getX();
        $getY = $pdf->getY();
        $pdf->setXY($getX + 125, $getY);
        $pdf->Cell(25, 6, "Jumlah Total", 0, 0, "C");
        $pdf->Cell(40, 6, "Rp. " . number_format($trx_det_course_price), 0, 1);
        $pdf->Line(136, $getY + 6, 200, $getY + 6);

        $pdf->Output();
    }

    public function print_pdf_archieve()
    {
        # Decrypt ID
        # -------------------------------------------------------------------
        $decrypt_id                        = str_replace(array('-', '_', '~'), array('+', '/', '='), $_GET['id']);
        $id                                = $this->encrypt->decode($decrypt_id);

        $query = $this->db->query("select * from transaction_archieve AS a LEFT JOIN transaction_detail AS b on a.trx_json_course_id=b.trx_id where a.trx_id=" . $id)->result();
        foreach ($query as $row) {
            $data['id']                    = $_GET['id'];
            $trx_code                     = $row->trx_code;
            $trx_created_date            = $row->trx_created_date;
            $trx_json_course_id            = $row->trx_json_course_id;
            $trx_total_disc            = $row->trx_total_disc;
            $trx_grand_total            = $row->trx_grand_total;
        }

        // $pdf = new FPDF('3','mm','A4');
        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 28);
        // mencetak gambar
        $pdf->Image('https://dev.pertamina-ptc.com/gurumaya/assets/guest/default/img/logo-wh.png', 10, 5, -300);
        // mencetak string 

        $pdf->Cell(190, 7, 'INVOICE', 0, 0, 'R');
        $pdf->Line(10, 20, 200, 20);

        $pdf->Ln(7);
        $pdf->SetFont('Arial', 'B', 12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);

        //bill invoice
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, 'Kepada', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(60, 6, "Job Bradi Sibarani", 0, 0);

        $getX = $pdf->getX();
        $getY = $pdf->getY();
        $pdf->setXY($getX + 55, $getY);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, 'invoice', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(35, 6, $trx_code, 0, 1);

        $getX = $pdf->getX();
        $getY = $pdf->getY();
        $pdf->setXY($getX + 139, $getY);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(16, 6, 'Tanggal ', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 6, $trx_created_date, 0, 1);

        $pdf->Ln(40);
        $pdf->setFillColor(241, 241, 239, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(80, 10, 'Nama Kursus', 1, 0, 'C', TRUE);
        $pdf->Cell(30, 10, 'Jumlah', 1, 0, 'C', TRUE);
        $pdf->Cell(40, 10, 'Harga', 1, 0, 'C', TRUE);
        $pdf->Cell(40, 10, 'Total', 1, 1, 'C', TRUE);

        $trx_json_course_id = json_decode($trx_json_course_id);
        $trx_json_course = implode(",", $trx_json_course_id);
        $query_detail = $this->db->query("select * from transaction_detail AS a where a.trx_id=" . $id . " and a.trx_det_id IN (" . $trx_json_course . ")")->result();
        $trx_det_course_price = 0;

        foreach ($query_detail as $row) {

            $current_x = 80;
            $pdf->SetFont('Arial', '', 10);
            $pdf->MultiCell($current_x, 6, $row->trx_det_course_name, 1, "L");

            $getX = $pdf->getX();
            $getY = $pdf->getY();
            $pdf->setXY($getX + $current_x, $getY - 6);
            $current_x = 30;
            $pdf->MultiCell($current_x, 6, $row->trx_det_qty, 1, "L");

            $getX = $pdf->getX();
            $getY = $pdf->getY();
            $pdf->setXY($getX + 110, $getY - 6);
            $pdf->Cell(40, 6, "Rp. " . number_format($row->trx_det_course_price), 1, 0);
            $trx_det_course_price += $row->trx_det_course_price;

            $pdf->Cell(40, 6, "Rp. " . number_format($row->trx_det_course_price), 1, 1);
        }

        $pdf->Ln(3);
        $getX = $pdf->getX();
        $getY = $pdf->getY();

        $pdf->setXY($getX + 125, $getY);

        $pdf->Line(10, $getY, 200, $getY);

        $pdf->Cell(25, 6, "Total  ", 0, 0, "L");
        $pdf->Cell(40, 6, "Rp. " . number_format($trx_det_course_price), 0, 1);
        $pdf->Line(136, $getY + 6, 200, $getY + 6);

        if ($trx_total_disc != '') {
            $getX = $pdf->getX();
            $getY = $pdf->getY();
            $pdf->setXY($getX + 125, $getY);
            $pdf->Cell(25, 6, "Diskon ", 0, 0, "L");
            $pdf->Cell(40, 6, "Rp. " . number_format($trx_total_disc), 0, 1);
            $pdf->Line(136, $getY + 6, 200, $getY + 6);

            $trx_det_course_price = $trx_det_course_price - $trx_total_disc;
        }

        $getX = $pdf->getX();
        $getY = $pdf->getY();
        $pdf->setXY($getX + 125, $getY);
        $pdf->Cell(25, 6, "Jumlah Total ", 0, 0, "C");
        $pdf->Cell(40, 6, "Rp. " . number_format($trx_det_course_price), 0, 1);
        $pdf->Line(136, $getY + 6, 200, $getY + 6);

        $pdf->Output();
    }

    public function export_excel()
    {

        $excel = new PHPExcel();
        $excel->setActiveSheetIndex(0);

        $table_columns = array(
            "ID",
            "Nama Kursus",
            "Diskon",
            "Tanggal",
            "Kode Invoice",
            "Payment Partner",
            "Status Transaksi"
        );
        $column = 0;
        foreach ($table_columns as $field) {
            $excel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $excel_row = 2;
        unset($datato);
        $datato['table']                 = 'gurumaya.transaction_process';
        $datato['table_join']             = array(
            'gurumaya.payment_partner'
        );
        $datato['table_join_on']         = array(
            'gurumaya.transaction_process'
        );
        $datato['join_id']                 = array(
            'payment_partner_id'
        );
        $datato['join_type']             = array(
            'inner'
        );
        $Q1 = $this->crud->view_data($datato);
        foreach ($Q1->result() as $R1) {
            $index = 0;
            $excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->trx_id);
            // $excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_user_fullname($R1->user_role_id));
            $excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->trx_json_course_name);
            $excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->trx_total_disc);
            $excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->trx_created_date);
            $excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->trx_code);
            $excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $this->admin_model->get_payment_partner($R1->payment_partner_id));
            $excel->getActiveSheet()->setCellValueByColumnAndRow($index++, $excel_row, $R1->trx_status);
            $excel_row++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="report-data_transaction_process' . date('Y-m-d') . '.xlsx"');
        header('Cache-Control: max-age=0');
        $write = IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
