<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?></h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">

				<h4 class="header-title mb-3">
					SMTP Setting
				</h4>

				<div class="alert alert-danger" role="alert">
					<h4 class="alert-heading">Peringatan</h4>
					<p>Merubah SMTP tidak benar akan mempengaruhi pengiriman yang menyebabkan email tidak terkirim.</p>
				</div>

				<div class="col-lg-12">
					<form class="required-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for=""></label>
							<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
						</div>

						<div class="form-group">
                            <label for="protocol">Protocol<span class="required">*</span></label>
                            <input type="text" name="protocol" id="protocol" class="form-control" value="<?php echo get_settings('protocol');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_host">SMTP Host<span class="required">*</span></label>
                            <input type="text" name="smtp_host" id="smtp_host" class="form-control" value="<?php echo get_settings('smtp_host');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_port">SMTP Port<span class="required">*</span></label>
                            <input type="text" name="smtp_port" id="smtp_port" class="form-control" value="<?php echo get_settings('smtp_port');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_user">SMTP Username<span class="required">*</span></label>
                            <input type="text" name="smtp_user" id="smtp_user" class="form-control" value="<?php echo get_settings('smtp_user');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_pass">SMTP Password<span class="required">*</span></label>
                            <input type="text" name="smtp_pass" id="smtp_pass" class="form-control" value="<?php echo get_settings('smtp_pass');  ?>" required>
                        </div>

						<button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
					</form>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>

<hr>

<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">

				<h4 class="header-title mb-3">
					Test Email
				</h4>

				<div class="alert alert-warning" role="alert">
					<h4 class="alert-heading">Informasi</h4>
					<p>Untuk memastikan apakah konfigurasi email diatas sudah sesuai, lakukan pengetesan email dengan cara mengisi alamat email pada field <b>Email Tujuan</b>  dan klik tombol <b>Kirim Email</b> dibawah ini. Setelah itu cek folder inbox atau spam pada email Anda. </p>
				</div>

				<div class="col-lg-12">
					<form class="required-form" action="<?php echo $action_send_mail; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for=""></label>
							<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
						</div>

						<div class="form-group">
                            <label for="email">Email Tujuan<span class="required">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" value="" required>
                        </div>

						<button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Kirim Email</button>
					</form>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>