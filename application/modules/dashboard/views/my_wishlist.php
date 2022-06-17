<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title">Wishlist</h1>
                <ul>
                    <li><a href="<?php echo site_url('dashboard/home'); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_courses'); ?>">Semua Kursus</a></li>
                    <li  class="active"><a href="<?php echo site_url('dashboard/my_wishlist"'); ?>">Wishlists</a></li>
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
            <div class="col">
                <div class="my-course-search-bar">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search my courses" onkeyup="getMyWishListsBySearchString(this.value)">
                            <div class="input-group-append">
                                <button class="btn" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row no-gutters" id="my_wishlists_area">
            <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <div class="course-image">
                            <a href="http://localhost/academy/home/course/test/2"><img src="http://localhost/academy/uploads/thumbnails/course_thumbnails/course_thumbnail_default_2.jpg" alt="" class="img-fluid"></a>
                            <div class="instructor-img-hover">
                                <a href="http://localhost/academy/home/instructor_page/1"><img src="http://localhost/academy/uploads/user_image/1.jpg" alt=""></a>
                                <span>
                                    2 Lessons </span>
                                <span>
                                    00:00:00 Hours </span>
                            </div>
                            <div class="wishlist-add wishlisted">
                                <button type="button" data-toggle="tooltip" data-placement="left" title="" style="cursor : auto;" onclick="handleWishList(this)" id="2">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-details">
                            <a href="http://localhost/academy/home/course/test/2">
                                <h5 class="title">Microsoft Excel untuk Pemula</h5>
                            </a>
                            <p class="instructors">Pertamina Training and Consulting</p>

                            <p class="price text-right"><small>Rp250000</small>Rp150000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>