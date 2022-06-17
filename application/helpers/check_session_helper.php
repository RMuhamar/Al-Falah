<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 function is_logged_in() 
	{	
		if($_SESSION['user_id'] !='' )
		{	
            return true;        
        } 
		else 
		{
            return false;
        }
	}
