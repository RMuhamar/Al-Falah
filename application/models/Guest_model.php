<?php
/*
|.-.   .-.   .-.   .-.   .-.   .   MODELS   	.-.   .-.   .-.
|   '-'   '-'   '-'   '-'   '-'   			  -'   '-'   '-'   '-'
| Name       			: Guest_model
| Version               : 1.0;
| Author				: Rayza Muhamar
| E-mail				: skywormz@icloud.com
| Created               : 15 June 2022
-+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+--->*/

class Guest_model extends CI_Model {

	# -------------------------------------------------------------------------
	# Get User Fullname
	# -------------------------------------------------------------------------
	/*
	Keterangan :
	Berfungsi untuk mendapatkan nama lengkap dari database user berdasarkan parameter "user_id" yang diterima
	*/

	public function view_pendidikan($id){
        unset($datato);
		$datato['table'] 			= 'gurumaya.pendidikan';
		$datato['where']			= array(
			'gurumaya.pendidikan.id_pendidikan' => $id
		);

		return $this->crud->view_data($datato);

	}

}
?>