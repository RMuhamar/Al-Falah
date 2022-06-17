<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
				</h4>
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
                            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
                        </form>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>

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