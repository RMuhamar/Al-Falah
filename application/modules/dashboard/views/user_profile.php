<style type="text/css">
    .image-upload>input {
    display: none;
}
</style>

<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title">My courses</h1>
                <ul>
                    <li><a href="<?php echo site_url('dashboard/home'); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_courses'); ?>">Semua Kursus</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_wishlist'); ?>">Wishlists</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_notification'); ?>">Notifikasi</a></li>
                    <li><a href="<?php echo site_url('dashboard/purchase_history'); ?>">Riwayat Pembayaran</a></li>
                    <li class="active"><a href="<?php echo site_url('dashboard/user_profile'); ?>">Profile</a></li>
					<li><a href="<?php echo site_url('dashboard/history_login/web'); ?>">Riwayat Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="user-dashboard-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="required-form" action="<?php echo site_url('dashboard/user_profile/save/'); ?>" method="post" enctype="multipart/form-data">
                <div class="user-dashboard-box">
                    <div class="user-dashboard-sidebar">
                        <div class="user-box">
                            <div class="image-upload">
                              <label for="file-input">
                                <img class="rounded-circle img-thumbnail" src="<?php echo site_url('uploads/user_image/' . $user_avatar); ?>" alt="" style="height: 80px; width: 80px; margin:20px; cursor: pointer;">
                              </label>

                              <i class="fas fa-camera" style="position: absolute; margin-top: 76px; margin-left: -32px;"></i>
                              <input type="file" name="user_avatar" accept="image/*" id="file-input" />

                            </div>
                            
                            <div class="name">
                                <div class="name"><?php echo $user_fullname; ?></div>
                            </div>
                        </div>
                        <div class="user-dashboard-menu">
                            <ul>
                                <li class="active"><a href="<?php echo site_url('dashboard/user_profile'); ?>">Profile</a></li>
                                <li><a href="<?php echo site_url('dashboard/user_profile/change_password'); ?>">Ganti Password</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-dashboard-content">
                        <div class="content-title-box">
                            <div class="title">Profile</div>
                            <div class="subtitle">Add information about yourself to share on your profile.</div>
                        </div>
                        <br>
                        <?php if (validation_errors()) { ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
						<br>
                        <div class="content-box">
                            <div class="basic-group">

                                <div class="form-group">
                                    <label for="level_1_name"></label>
                                    <input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="Fullname">Nama Lengkap:</label>
                                     <input type="text" id="user_fullname" name="user_fullname" class="form-control" placeholder="Nama Lengkap" value="<?php echo $user_fullname; ?>" required="">
                                </div>
								
								<div class="form-group">
                                    <label for="Birthdate">Tanggal Lahir:</label>
                                    <input type="text" class="form-control date" name="user_birthdate" placeholder="yyyy-mm-dd" value="<?php echo $user_birthdate; ?>"  required />
                                </div>

							    <div class=" form-group">
                                    <label for="registration-gender">Jenis Kelamin :</label><br>
                                    <input type="radio" name="user_gender" value="1" required <?php if($user_gender=='1') {echo 'checked';} ?>> Laki-laki
                                    <input type="radio" name="user_gender" value="2" required <?php if($user_gender=='2') {echo 'checked';} ?>> Perempuan<br>
                                </div>

                                <div class="form-group">
                                    <label for="Biography">Biography:</label>
                                    <textarea class="form-control author-biography-editor" name="user_biography" id="user_biography"><?php echo $user_biography; ?></textarea>
                                </div>
                            </div>
                            <div class="link-group">
                                <div class="form-group">
                                    <input type="text" id="user_fullname" name="user_twitter_link" class="form-control" placeholder="Twitter Link" value="<?php echo $user_twitter_link; ?>" required="">
                                    <small class="form-text text-muted">Add your twitter link.</small>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="user_fullname" name="user_facebook_link" class="form-control" placeholder="Facebook Link" value="<?php echo $user_facebook_link; ?>" required="">
                                    <small class="form-text text-muted">Add your facebook link.</small>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="user_fullname" name="user_linkedin_link" class="form-control" placeholder="Linkedin Link" value="<?php echo $user_linkedin_link; ?>" required="">
                                    <small class="form-text text-muted">Add your linkedin link.</small>
                                </div>
                            </div>
                        </div>
                        <div class="content-update-box">
                            <button type="submit" class="btn">Save</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
	// Date Picker
	$('.date').datepicker({
		format: "yyyy-mm-dd",
		startDate: 0,
		startView: 2,
		maxViewMode: 2,
		todayBtn: "linked",
		language: "id",
		keyboardNavigation: false,
		forceParse: false,
		autoclose: true,
		todayHighlight: true
	});

</script>