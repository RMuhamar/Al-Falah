<?php
/*
|.-.   .-.   .-.   .-.   .-.   .   MODELS   	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Admin_model
| Version               : 1.0;
| Author				: Azis Muhammad Iqbal
| E-mail				: skywormz@icloud.com
| Created               : 04 June 2021
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

class Admin_model extends CI_Model {

	# -------------------------------------------------------------------------
	# Get User Fullname
	# -------------------------------------------------------------------------
	/*
	Keterangan :
	Berfungsi untuk mendapatkan nama lengkap dari database user berdasarkan parameter "user_id" yang diterima
	*/

	public function get_user_fullname($user_id)
    {
        $user_detail = $this->db->get_where('user', array('user_id' => $user_id))->row_array();
       return $user_detail['user_fullname'];
    }

	# -------------------------------------------------------------------------
	# Count Company Level 1
	# -------------------------------------------------------------------------
	/*
	Keterangan :
	Berfungsi untuk menghitung jumlah data level 1 pada database "company_level" berdasarkan filter "company_id"
	*/
	public function count_company_level_1($company_id){
		$checker = array(
			'company_id' => $company_id
		  );
		  $result = $this->db->get_where('course', $checker)->num_rows();
		  return $result;
	}
	# -------------------------------------------------------------------------

}
?>