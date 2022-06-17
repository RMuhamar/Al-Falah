<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title">My courses</h1>
                <ul>
                    <li class="active"><a href="<?php echo site_url('dashboard/home'); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_courses'); ?>">Semua Kursus</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_wishlist"'); ?>">Wishlists</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_notification"'); ?>">Notifikasi</a></li>
                    <li><a href="<?php echo site_url('dashboard/purchase_history"'); ?>">Riwayat Pembayaran</a></li>
                    <li><a href="<?php echo site_url('dashboard/user_profile"'); ?>">Profile</a></li>
					<li><a href="<?php echo site_url('dashboard/history_login/web'); ?>">Riwayat Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="my-courses-area">
    <div class="container">
        <div class="row">
			<div class="col-12">
					<div class="card-body p-0">
						<div class="row no-gutters">
							<div class="col-sm-6 col-xl-6">
								<a href="<?php echo site_url('dashboard/my_courses'); ?>" class="text-secondary">
									<div class="card shadow-none m-0">
										<div class="card-body text-center">
											<i class="dripicons-archive text-muted" style="font-size: 24px;"></i>
											<h3><span>1</span></h3>
											<p class="text-muted font-15 mb-0">Total kursus</p>
										</div>
									</div>
								</a>
							</div>

							<div class="col-sm-6 col-xl-6">
								<a href="<?php echo site_url('dashboard/my_notification'); ?>" class="text-secondary">
									<div class="card shadow-none m-0 border-left">
										<div class="card-body text-center">
											<i class="dripicons-camcorder text-muted" style="font-size: 24px;"></i>
											<h3><span>0</span></h3>
											<p class="text-muted font-15 mb-0">Notifikasi</p>
										</div>
									</div>
								</a>
							</div>

							

						</div> <!-- end row -->
					</div>
				
			</div>
            
        </div>
    </div>
</section>