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
					<a href="<?php echo site_url('admin/master_data/level_1/'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> kembali</a>
				</h4>

				<div class="col-lg-12">
					<form class="required-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="level_1_name"></label>
							<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
							<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>">
							<input type="hidden" id="type_form" name="type_form" class="form-control" value="<?php echo $type_form; ?>">
						</div>

						<div class="form-group">
							<label for="level_1_name">Nama Level 1<span class="required">*</span></label>
							<input type="text" id="level_1_name" name="level_1_name" class="form-control" placeholder="Nama Level 1" value="<?php echo $level_1_name; ?>" required="">
						</div>

						<div class="form-group">
							<label for="company_id">Nama Company<span class="required">*</span></label>
							<select class="form-control" name="company_id" required >
								<option selected disabled value="">-- Select --</option>
								<?php												
								foreach($get_dropdown_company->result() as $q)
								{
								?>
								<option value="<?php echo urlencode($q->company_id); ?>" <?php if($q->company_id == $company_id){ echo 'selected'; } ?>><?php echo $q->company_name; ?></option>
								<?php
								}
								?>
							</select>
						</div>

						<button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
					</form>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>