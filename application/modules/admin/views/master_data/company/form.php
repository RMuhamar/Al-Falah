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
					<a href="<?php echo site_url('admin/master_data/company/'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> kembali</a>
				</h4>

				<div class="col-lg-12">
					<form class="required-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="id"></label>
							<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
							<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>">
							<input type="hidden" id="type_form" name="type_form" class="form-control" value="<?php echo $type_form; ?>">
						</div>

						<div class="form-group">
							<label for="company_name">Nama Perusahaan<span class="required">*</span></label>
							<input type="text" id="company_name" name="company_name" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $company_name; ?>" required="">
						</div>

						<div class="form-group">
							<label for="company_phone">Telpon<span class="required">*</span></label>
							<input type="text" id="company_phone" name="company_phone" class="form-control" placeholder="Telpon" value="<?php echo $company_phone; ?>" required="">
						</div>

						<div class="form-group">
							<label for="company_email">Email<span class="required">*</span></label>
							<input type="text" id="company_email" name="company_email" class="form-control" placeholder="Email" value="<?php echo $company_email; ?>" required="">
						</div>


						<div class="form-group">
							<label for="company_logo">Logo</label>
							<div class="">
								<img class="rounded-circle img-thumbnail" src="<?php echo site_url('uploads/company/' . $company_logo); ?>" alt="" style="height: 80px; width: 80px; margin:20px;">
							</div>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="company_logo" name="company_logo" accept="image/*" onchange="changeTitleOfImageUploader(this)">
									<label class="custom-file-label" for="company_logo">Upload Logo Perusahaan</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="company_email">Aktif<span class="required">*</span></label>
							<select name="company_active" class="form-control">
								<option value=""> - Pilih -</option>
								<option value="1" <?php if ($company_active == '1') {
														echo 'selected';
													} ?>> Yes</option>
								<option value="0" <?php if ($company_active == '0') {
														echo 'selected';
													} ?>>No</option>
							</select>
						</div>

						<button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
					</form>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>