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
                    <div class="user-dashboard-content w-100 login-form">
                        <div class="content-title-box">
                            <div class="title">Login</div>
                            <div class="subtitle">Masukan username dan password.</div>
                        </div>
                        <form action="<?php echo site_url('guest/login'); ?>" method="post">
                            <div class="content-box">
                                <div class="basic-group">
									 <div class="form-group">
                                        <input type="hidden" class="form-control" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" required>
                                    </div>									
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
                                <a href="<?php echo site_url('guest/forgot_password'); ?>" >Lupa Password</a>
                            </div>
                            <div class="account-have text-center">
                                Belum punya akun? <a href="<?php echo site_url('guest/sign_up'); ?>" >Daftar</a>
                            </div>
                        </form>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</section>
