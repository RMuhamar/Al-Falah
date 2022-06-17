<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|.-.   .-.   .-.   .-.   .-.   .  Library	  	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Generate_encrypt
| Module                : -
| Version               : 1.0;	
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 11 August 2019
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

class Generate_encrypt extends MY_Controller {
   
    # Generate Random Digit
    # -------------------------------------------------------------------
    function genRndDgt($length = 8, $specialCharacters = true) 
    {
            $digits 	= '';	
            $chars 		= "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789";

            if  ($specialCharacters === true)
                $chars .= "!?=/&+,.";

                for($i = 0; $i < $length; $i++) 
                    {
                        $x = mt_rand(0, strlen($chars) -1);
                        $digits .= $chars[$x];
                    }
                    return $digits;
	}

    # Generate Random Salt for Password encryption
    # -------------------------------------------------------------------
    function genRndSalt() 
	{
		return $this->genRndDgt(8, true);
	}

    # Encrypt User Password
    # ------------------------------------------------------------------- 
    function encryptUserPwd($password,$user_salt)
	{
		return sha1(md5($password) . $user_salt );
	}

}