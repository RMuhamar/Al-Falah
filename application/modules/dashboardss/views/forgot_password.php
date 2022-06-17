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
                    <div class="user-dashboard-content w-100 forgot-password-form">
                        <div class="content-title-box">
                            <div class="title">Lupa Password</div>
                            <div class="subtitle">Masukan alamat email untuk melakukan reset password pada form dibawah ini.</div>
                        </div>
                        <form action="<?php echo site_url('guest/forgot_password'); ?>" method="post">
                            <div class="content-box">
                                <div class="basic-group">
									<div class="form-group">
                                        <input type="hidden" class="form-control" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" required>
                                    </div>
									
                                    <div class="form-group">
                                        <label for="forgot-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email :</label>
                                        <input type="email" class="form-control" name="email" id="forgot-email" placeholder="Email" value="" required>
                                        <small class="form-text text-muted">Masukan alamat email untuk melaukan reset password.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="content-update-box">
                               <button type="submit" name="submit" value="submit" class="btn">Reset Password</button>
                            </div>
                            <div class="forgot-pass text-center">
                                Kembali? <a href="<?php echo site_url('guest/forgot_password'); ?>">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>