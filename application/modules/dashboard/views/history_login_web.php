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
                    <li><a href="<?php echo site_url('dashboard/user_profile'); ?>">Profile</a></li>
                    <li class="active"><a href="<?php echo site_url('dashboard/history_login/web'); ?>">Riwayat Login</a></li>
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
                                <li class="active"><a href="<?php echo site_url('dashboard/history_login/web'); ?>">Website</a></li>
                                <li><a href="<?php echo site_url('dashboard/history_login/mobile'); ?>">Mobile</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-dashboard-content">
                        <div class="content-title-box">
                            <div class="title"><?php echo $page_title; ?></div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Deskrpsi Login</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                                foreach ($get_data->result() as $value) :
                                    if($value->log_status == 1){
                                        $status = 'Sukses';
                                    }else{
                                        $status = 'Gagal';
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $value->log_date; ?></td>
                                        <td>IP : <?php echo $value->log_ipaddress; ?><br>Platform : <?php echo $value->log_platform; ?><br>Browser : <?php echo $value->log_browser; ?></td>
                                        <td><?php echo $status; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>