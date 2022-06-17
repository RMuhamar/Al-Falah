<style type="text/css">
    .image-upload>input {
    	display: none;
	}
</style>

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
					<?php echo $page_title; ?>
				</h4>
				<form class="required-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
					<div class="col-lg-12 text-center mt-50">
						<div class="image-upload">
                          <label for="file-input">
                            <img class="rounded-circle img-thumbnail" src="<?php echo site_url('uploads/user_image/' . $user_avatar); ?>" alt="" style="height: 80px; width: 80px; margin:20px; cursor: pointer;">
                          </label>

                          <i class="fas fa-camera" style="position: absolute; margin-top: 76px; margin-left: -32px;"></i>
                          <input type="file" name="user_avatar" accept="image/*" id="file-input" />
                        </div>
	                </i>
				</div>

					<div class="col-lg-12">
						<div class="form-group">
							<label for=""></label>
							<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
						</div>

						<!-- <div class="form-group">
                            <label class="col-form-label" for="user_image">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="user_avatar" name="user_avatar" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                        <label class="custom-file-label" for="user_avatar">Pilih file</label>
                                    </div>
                                </div>
                        </div> -->

						<div class="form-group">
                            <label for="user_fullname">Nama Lengkap<span class="required">*</span></label>
                            <input type="text" name="user_fullname" id="user_fullname" class="form-control" value="<?php echo $user_fullname;  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="user_birthdate">Tanggal Lahir<span class="required">*</span></label>
							<input type="text" class="form-control date" id="user_birthdate" name="user_birthdate" placeholder="yyyy-mm-dd"  value="<?php echo $user_birthdate;  ?>"  required />
                        </div>

                        <div class="form-group">
                            <label for="user_gender">Jenis Kelamin<span class="required">*</span></label><br>
                            <input type="radio" name="user_gender" value="1" required <?php if($user_gender=='1') {echo 'checked';} ?>> Laki-laki &nbsp; &nbsp;
                            <input type="radio" name="user_gender" value="2" required <?php if($user_gender=='2') {echo 'checked';} ?>> Perempuan<br>
                        </div>

                        <div class="form-group">
                            <label for="user_biography">Biografi</label>
                           <textarea class="form-control author-biography-editor" id="user_biography" name="user_biography" ><?php echo $user_biography; ?></textarea>
                        </div>

                       <div class="link-group">
							<label for="social_media">Sosial Media :</label>
							<div class="form-group">
								<input type="text" id="user_fullname" name="user_twitter_link" class="form-control" placeholder="Twitter Link" value="<?php echo $user_twitter_link; ?>" >
								<small class="form-text text-muted">Twitter</small>
							</div>
							<div class="form-group">
								<input type="text" id="user_fullname" name="user_facebook_link" class="form-control" placeholder="Facebook Link" value="<?php echo $user_facebook_link; ?>" >
								<small class="form-text text-muted">Facebook</small>
							</div>
							<div class="form-group">
								<input type="text" id="user_fullname" name="user_linkedin_link" class="form-control" placeholder="Linkedin Link" value="<?php echo $user_linkedin_link; ?>" >
								<small class="form-text text-muted">Linkedin</small>
							</div>
						</div>

						<button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
					
					</div>
				</form>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>


