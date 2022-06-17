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
                            <div class="title">Form Pendaftaran</div>
                            <div class="subtitle">Daftar dan mulai belajar.</div>
                        </div>

                        <br>                       
                        <?php if (validation_errors()) { ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
						<br>
						
                        
                        <form action="<?php echo site_url('guest/sign_up'); ?>" method="post">
                            <div class="content-box">
                                <div class="basic-group">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname"><span class="input-field-icon"><i class="fas fa-user"></i></span> Nama Lengkap :</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" value="<?php echo $fullname; ?>" required>
                                    </div>

                                    <div class=" form-group">
                                        <label for="registration-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email :</label>
                                        <input type="email" class="form-control" name="email" id="registration-email" placeholder="Email" value="<?php echo $email; ?>" required>
                                    </div>

                                    <div class=" form-group">
                                        <label for="registration-gender">Jenis Kelamin :</label><br>
                                        <input type="radio" id="registration-gender" name="gender" value="1" <?php if ($gender == '1') {
                                                                                                                    echo 'checked';
                                                                                                                }; ?>> Pria &nbsp; &nbsp;
                                        <input type="radio" id="registration-gender" name="gender" value="0" <?php if ($gender == '0') {
                                                                                                                    echo 'checked';
                                                                                                                }; ?>> Wanita
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
                                <button type="submit" name="submit" value="submit" class="btn">Daftar</button>
                            </div>
                            <div class="account-have text-center">
                                Sudah punya akun? <a href="<?php echo site_url('guest/login'); ?>" >Login</a>
                            </div>
                        </form>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</section>
