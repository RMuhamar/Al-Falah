<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

class Page_404 extends MY_Controller {	 
	
	function __construct()
	{
		parent::__construct();
		# Set Model 
		# -------------------------------------------------------------------   
		
			
		# Set Library 
		# -------------------------------------------------------------------
			
	}

	
	
	/*
    | -------------------------------------------------------------------
    | INDEX
    | -------------------------------------------------------------------
    */
		
	public function index()
	{		
		# Content & Template
		# -------------------------------------------------------------------		
		$this->load->view('page_404');		
	}
	
	
}
