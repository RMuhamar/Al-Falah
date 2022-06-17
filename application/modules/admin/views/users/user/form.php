<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3">
                	<a href="<?php echo site_url('admin/users/user/'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> kembali</a>
                </h4>
                <br>

                <div class="col-lg-12">
					<form class="required-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
						<div id="progressbarwizard">
	                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
	                            <li class="nav-item">
	                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
	                                    <i class="mdi mdi-face-profile mr-1"></i>
	                                    <span class="d-none d-sm-inline">Informasi Pribadi</span>
	                                </a>
	                            </li>
	                            <li class="nav-item">
	                                <a href="#company" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
	                                    <i class="mdi mdi-domain mr-1"></i>
	                                    <span class="d-none d-sm-inline">Pemetaan</span>
	                                </a>
	                            </li>
	                            <li class="nav-item">
	                                <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
	                                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
	                                    <span class="d-none d-sm-inline">Selesai</span>
	                                </a>
	                            </li>
	                        </ul>
	                        <div class="tab-content b-0 mb-0">

	                            <div id="bar" class="progress mb-3" style="height: 7px;">
	                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
	                            </div>

	                            <div class="tab-pane" id="basic_info">
	                                <div class="row">
	                                    <div class="col-12">

	                                    	<div class="form-group">
												<label for="level_1_name"></label>
												<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
												<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>">
												<input type="hidden" id="type_form" name="type_form" class="form-control" value="<?php echo $type_form; ?>">
											</div>

	                                        <div class="form-group row mb-3">
	                                            <label class="col-md-3 col-form-label" for="user_fullname">Nama Lengkap<span class="required">*</span></label>
	                                            <div class="col-md-9">
	                                                <input type="text" id="user_fullname" name="user_fullname" class="form-control" placeholder="Nama Lengkap" value="<?php echo $user_fullname; ?>" required="">
	                                            </div>
	                                        </div>
	                                        <div class="form-group row mb-3">
	                                            <label class="col-md-3 col-form-label" for="user_email">Email<span class="required">*</span></label>
	                                            <div class="col-md-9">
	                                                <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Email" value="<?php echo $user_email; ?>" required="">
	                                            </div>
	                                        </div>
	                                         <div class="form-group row mb-3">
	                                            <label class="col-md-3 col-form-label" for="user_password">Password<span class="required">*</span></label>
	                                            <div class="col-md-9">
	                                            	<input class="form-control" id="user_password" name="user_password" type="password"  <?php if ($type_form==base64_encode('add')){ echo "required"; } ?> >
	                                            </div>
	                                        </div>
	                                        <div class="form-group row mb-3">
	                                            <label class="col-md-3 col-form-label" for="user_gender">Jenis Kelamin<span class="required">*</span></label>
	                                            <div class="col-md-9">
	                                            	<input type="radio" name="user_gender" value="1" required <?php if($user_gender=='1') {echo 'checked';} ?>> Laki-laki
													<input type="radio" name="user_gender" value="2" required <?php if($user_gender=='2') {echo 'checked';} ?>> Perempuan<br>
	                                                <!-- <textarea name="biography" id = "summernote-basic" class="form-control"></textarea> -->
	                                            </div>
	                                        </div>
	                                        <div class="form-group row mb-3">
	                                            <label class="col-md-3 col-form-label" for="user_image">Foto</label>
	                                            <div class="col-md-9">
	                                            	<div class="">
														<img class="rounded-circle img-thumbnail" src="<?php echo site_url('uploads/user_image/' . $user_avatar); ?>" alt="" style="height: 80px; width: 80px; margin:20px;">
													</div>
	                                                <div class="input-group">
	                                                    <div class="custom-file">
	                                                        <input type="file" class="custom-file-input" id="user_avatar" name="user_avatar" accept="image/*" onchange="changeTitleOfImageUploader(this)">
	                                                        <label class="custom-file-label" for="user_avatar">Pilih file</label>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>

	                                        <div class="form-group row mb-3">
	                                            <label class="col-md-3 col-form-label" for="user_role_id">Tipe<span class="required">*</span></label>
	                                            <div class="col-md-9">
	                                                <select class="form-control" name="user_role_id" required >
														<option selected disabled value="">-- Select --</option>
														<?php												
														foreach($get_dropdown_role->result() as $q)
														{
														?>
														<option value="<?php echo urlencode($q->user_role_id); ?>" <?php if($q->user_role_id == $user_role_id){ echo 'selected'; } ?>><?php echo $q->user_role_name; ?></option>
														<?php
														}
														?>
													</select>
	                                            </div>
	                                        </div>

	                                    </div> <!-- end col -->
	                                </div> <!-- end row -->
	                            </div>

	                            <div class="tab-pane" id="company">
	                                <div class="row">
	                                    <div class="col-12">
	                                        <div class="form-group row mb-3">
	                                            <label class="col-md-3 col-form-label" for="company_id">Perusahaan</label>
	                                            <div class="col-md-9">
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
	                                        </div>
	                                        <div class="form-group row mb-3">
	                                            <label class="col-md-3 col-form-label" for="level_1_id">Level 1</label>
	                                            <div class="col-md-9">
	                                                <select class="form-control" name="level_1_id" required >
														<option selected disabled value="">-- Select --</option>
														<?php												
														foreach($get_dropdown_level_1->result() as $q)
														{
														?>
														<option value="<?php echo urlencode($q->level_1_id); ?>" <?php if($q->level_1_id == $level_1_id){ echo 'selected'; } ?>><?php echo $q->level_1_name; ?></option>
														<?php
														}
														?>
													</select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row mb-3">
	                                            <label class="col-md-3 col-form-label" for="level_2_id">Level 2</label>
	                                            <div class="col-md-9">
	                                                <select class="form-control" name="level_2_id" required >
														<option selected disabled value="">-- Select --</option>
														<?php												
														foreach($get_dropdown_level_2->result() as $q)
														{
														?>
														<option value="<?php echo urlencode($q->level_2_id); ?>" <?php if($q->level_2_id == $level_2_id){ echo 'selected'; } ?>><?php echo $q->level_2_name; ?></option>
														<?php
														}
														?>
													</select>
	                                            </div>
	                                        </div>
	                                    </div> <!-- end col -->
	                                </div> <!-- end row -->
	                            </div>

	                            <div class="tab-pane" id="finish">
	                                <div class="row">
	                                    <div class="col-12">
	                                        <div class="text-center">
	                                            <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
	                                            <h3 class="mt-0">Selesai !</h3>

	                                            <p class="w-75 mb-2 mx-auto">Silahkan tekan tombol simpan</p>

	                                            <div class="mb-3">
	                                                <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button">Simpan</button>
	                                            </div>
	                                        </div>
	                                    </div> <!-- end col -->
	                                </div> <!-- end row -->
	                            </div>

	                            <ul class="list-inline mb-0 wizard text-center">
	                                <li class="previous list-inline-item">
	                                    <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
	                                </li>
	                                <li class="next list-inline-item">
	                                    <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </a>
	                                </li>
	                            </ul>

	                        </div> <!-- tab-content -->
	                    </div> <!-- end #progressbarwizard-->
					</form>
				</div>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
