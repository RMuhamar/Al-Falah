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
                    <div class="user-dashboard-content w-100 login-form hidden">
                        <div class="content-title-box">
                            <div class="title">Login</div>
                            <div class="subtitle">Masukan username dan password.</div>
                        </div>
                        <form action="<?php echo site_url('guest/login/validate_login/user'); ?>" method="post">
                            <div class="content-box">
                                <div class="basic-group">
                                    <div class="form-group">
                                        <label for="login-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email :</label>
                                        <input type="email" class="form-control" name="email" id="login-email" placeholder="Email" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="login-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password :</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn">Login</button>
                            </div>
                            <div class="forgot-pass text-center">
                                <span>atau</span>
                                <a href="javascript::" onclick="toggoleForm('forgot_password')">Lupa Password</a>
                            </div>
                            <div class="account-have text-center">
                                Belum punya akun? <a href="javascript::" onclick="toggoleForm('registration')">Daftar</a>
                            </div>
                        </form>
                    </div>
                    <div class="user-dashboard-content w-100 register-form">
                        <div class="content-title-box">
                            <div class="title">Form Pendaftaran</div>
                            <div class="subtitle">Daftar dan mulai belajar.</div>
                        </div>
                        <form action="<?php echo site_url('guest/login/register'); ?>" method="post">
                            <div class="content-box">
                                <div class="basic-group">
                                    <div class="form-group">
                                        <label for="fullname"><span class="input-field-icon"><i class="fas fa-user"></i></span> Nama Lengkap :</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="registration-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email :</label>
                                        <input type="email" class="form-control" name="email" id="registration-email" placeholder="Email" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="registration-gender">Jenis Kelamin :</label><br>
                                        <input type="radio" id="registration-gender" name="gender" value="1"> Pria &nbsp; &nbsp;
                                        <input type="radio" id="registration-gender" name="gender" value="0"> Wanita
                                    </div>

                                    <div class="form-group">
                                        <label for="registration-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password:</label>
                                        <input type="password" class="form-control" name="password" id="registration-password" placeholder="Password" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="registration-repeatpassword"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Ulangi Password :</label>
                                        <input type="password" class="form-control" name="repeatpassword" id="registration-repeatpassword" placeholder="Ulangi Password" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn">Daftar</button>
                            </div>
                            <div class="account-have text-center">
                                Sudah punya akun? <a href="javascript::" onclick="toggoleForm('login')">Login</a>
                            </div>
                        </form>
                    </div>

                    <div class="user-dashboard-content w-100 forgot-password-form hidden">
                        <div class="content-title-box">
                            <div class="title">Lupa Password</div>
                            <div class="subtitle">Masukan alamat email untuk melakukan reset password pada form dibawah ini.</div>
                        </div>
                        <form action="<?php echo site_url('guest/login/forgot_password'); ?>" method="post">
                            <div class="content-box">
                                <div class="basic-group">
                                    <div class="form-group">
                                        <label for="forgot-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email :</label>
                                        <input type="email" class="form-control" name="email" id="forgot-email" placeholder="Email" value="" required>
                                        <small class="form-text text-muted">Masukan alamat email untuk melaukan reset password.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn">Reset Password</button>
                            </div>
                            <div class="forgot-pass text-center">
                                Kembali? <a href="javascript::" onclick="toggoleForm('login')">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function toggoleForm(form_type) {
        if (form_type === 'login') {
            $('.login-form').show();
            $('.forgot-password-form').hide();
            $('.register-form').hide();
        } else if (form_type === 'registration') {
            $('.login-form').hide();
            $('.forgot-password-form').hide();
            $('.register-form').show();
        } else if (form_type === 'forgot_password') {
            $('.login-form').hide();
            $('.forgot-password-form').show();
            $('.register-form').hide();
        }
    }
</script>