<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title">Profile</h1>
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
                <div class="user-dashboard-box">
                    <div class="user-dashboard-sidebar">
                        <div class="user-box">
                            <img class="rounded-circle img-thumbnail" src="<?php echo site_url('uploads/user_image/' . $user_avatar); ?>" alt="" style="height: 80px; width: 80px; margin:20px;">
                            <div class="name">
                                <div class="name"><?php echo $user_fullname; ?></div>
                            </div>
                        </div>
                        <div class="user-dashboard-menu">
                            <ul>
                                <li><a href="<?php echo site_url('dashboard/user_profile'); ?>">Profile</a></li>
                                <li class="active"><a href="<?php echo site_url('dashboard/user_profile/change_password'); ?>">Ganti Password</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-dashboard-content">
                        <div class="content-title-box">
                            <div class="title">Ganti Password</div>
                            <div class="subtitle">&nbsp;</div>
                        </div>

                        <br>
                        <?php if (validation_errors()) { ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
						<br>

                        <form name="frmChange" class="required-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" onSubmit="return validatePassword()">
                            <div class="content-box">
                                <div class="basic-group">

                                    <div class="form-group">
                                        <label for="level_1_name"></label>
                                        <input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="OldPassword">Password Lama:</label>
                                        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Password Lama" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="NewPassword">Password Baru:</label>
                                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password Baru" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="RepeatNewPassword">Ulangi Password Baru:</label>
                                        <input type="password" class="form-control" name="repeat_password" id="repeat_password" placeholder="Ulangi Password Baru" value="" required>
                                    </div>
                                </div>

                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function validatePassword() {
        var old_password,new_password,repeat_password,output = true;

        old_password = document.frmChange.old_password;
        new_password = document.frmChange.new_password;
        repeat_password = document.frmChange.repeat_password;

        if(!old_password.value) {
            old_password.focus();
            document.getElementById("old_password").innerHTML = "required";
            output = false;
        }
        else if(!new_password.value) {
            new_password.focus();
            document.getElementById("new_password").innerHTML = "required";
            output = false;
        }
        else if(!repeat_password.value) {
            repeat_password.focus();
            document.getElementById("repeat_password").innerHTML = "required";
            output = false;
        }

        if(new_password.value != repeat_password.value) {
            new_password.value="";
            repeat_password.value="";
            new_password.focus();
            alert('password tidak sesuai. harap ulangi');
            output = false;
        } 

        return output;
    }
</script>