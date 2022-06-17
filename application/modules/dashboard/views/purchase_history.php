<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title">My courses</h1>
                <ul>
                    <li><a href="<?php echo site_url('dashboard/home'); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_courses'); ?>">Semua Kursus</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_wishlist"'); ?>">Wishlists</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_notification"'); ?>">Notifikasi</a></li>
					<li class="active"><a href="<?php echo site_url('dashboard/purchase_history"'); ?>">Riwayat Pembayaran</a></li>
                    <li><a href="<?php echo site_url('dashboard/user_profile"'); ?>">Profile</a></li>
					<li><a href="<?php echo site_url('dashboard/history_login/web'); ?>">Riwayat Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="purchase-history-list-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="purchase-history-list">
                    <li class="purchase-history-list-header">
                        <div class="row">
							<div class="col-sm-12 hidden-xxs hidden-xs" style="font-weight: bold;">
                                <div class="row">
                                    <div class="col-sm-2"> Tanggal </div>
                                    <div class="col-sm-4"> Deskripsi </div>
                                    <div class="col-sm-2"> Total Harga </div>
                                    <div class="col-sm-2"> Tipe Pembayaran </div>
                                    <div class="col-sm-2"> Aksi </div>
                                </div>
                            </div>
                        </div>
                    </li>
					<?php
						foreach ($get_data->result() as $R1) : ?>
						<li>
							<div class="row">
								<div class="col-sm-2"><?php echo $R1->trx_confirm_date ?> </div>
								<div class="col-sm-4"><?php echo $R1->trx_det_course_name ?> </div>
								<div class="col-sm-2">Rp. <?php echo number_format ($R1->trx_grand_total,0,',','.'); ?> </div>
								<div class="col-sm-2"> <?php echo $R1->payment_partner_name ?></div>
								<div class="col-sm-2"> <a href="<?php echo site_url('dashboard/purchase_history/purchase_history_detail/'.$R1->trx_id); ?>" class="btn btn-fill-out btn-xsm" style="padding: 5px 10px;font-size: 9px;background-color: #f47d50;border-color: #f47d50" >Detail</a>
                                   </div>
							</div>
						</li>
						<?php endforeach; ?>
					
                </ul>
            </div>
        </div>
    </div>
</section>