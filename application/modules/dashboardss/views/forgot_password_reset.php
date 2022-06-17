<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('guest/home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo $page_title; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                    <?php echo $page_title; ?>
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="category-course-list-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="user-dashboard-box mt-3">

                    <div class="user-dashboard-content w-100 register-form">
                        <div class="content-title-box">
                            <div class="title">Reset Password</div>
                            <div class="subtitle">Masukan password baru terbaru Anda.</div>
                        </div>

                        <br>                       
                        <?php if (validation_errors()) { ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
						<br>
						
                        
                        <form action="<?php echo site_url('guest/forgot_password/update'); ?>" method="post">
                            <div class="content-box">
                                <div class="basic-group">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" required>
                                        <input type="hidden" class="form-control" name="code" value="<?php echo $code; ?>" required>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="registration-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password:</label>
                                        <input type="password" class="form-control" name="password" id="registration-password" placeholder="Password" value="<?php echo $password; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="registration-repeatpassword"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Ulangi Password :</label>
                                        <input type="password" class="form-control" name="repeatpassword" id="registration-repeatpassword" placeholder="Ulangi Password" value="<?php echo $repeatpassword; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="content-update-box">
                                <button type="submit" name="submit" value="submit" class="btn">Reset</button>
                            </div>
                           
                        </form>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</section>
