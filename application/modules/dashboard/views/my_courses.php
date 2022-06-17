<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title">Kursus</h1>
                <ul>
                    <li><a href="<?php echo site_url('dashboard/home'); ?>">Home</a></li>
                    <li class="active"><a href="<?php echo site_url('dashboard/my_courses'); ?>">Semua Kursus</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_wishlist"'); ?>">Wishlists</a></li>
                    <li><a href="<?php echo site_url('dashboard/my_notification"'); ?>">Notifikasi</a></li>
                    <li><a href="<?php echo site_url('dashboard/purchase_history"'); ?>">Riwayat Pembayaran</a></li>
                    <li><a href="<?php echo site_url('dashboard/user_profile"'); ?>">Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="my-courses-area">
    <div class="container">
        <div class="row align-items-baseline">
            <div class="col-lg-6">
                <div class="my-course-filter-bar filter-box">
                    <span>Filter by</span>
                    <div class="btn-group">
                        <a class="btn btn-outline-secondary dropdown-toggle all-btn" href="#" data-toggle="dropdown">Kategori </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" id="1" onclick="getCoursesByCategoryId(this.id)">Pertamina</a>
                        </div>
                    </div>
                    <!-- <div class="btn-group">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#"data-toggle="dropdown">
                            Instructors                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Admin Admin</a>

                        </div>
                    </div> -->
                    <div class="btn-group">
                        <a href="<?php echo site_url('dashboard/my_courses'); ?>" class="btn reset-btn" disabled>Reset</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="my-course-search-bar">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search my courses" onkeyup="getCoursesBySearchString(this.value)">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row no-gutters" id="my_courses_area">

            <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">

                        <a href="<?php echo site_url('dashboard/lesson/detail/starting-out-assessment-center/1'); ?>">
                            <div class="course-image">
                                <img src="<?php echo site_url('assets/guest/default/img/course_thumbnail_placeholder.jpg'); ?>" alt="" class="img-fluid">
                                <span class="play-btn"></span>
                            </div>
                        </a>

                        <div class="" id="course_info_view_1">
                            <div class="course-details">
                                <a href="<?php echo site_url('dashboard/course/detail/starting-out-assessment-center/1'); ?>">
                                    <h5 class="title">Starting Out Assessment Center</h5>
                                </a>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 41.666666666667%" aria-valuenow="41.666666666667" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>42% Completed</small>
                                <div class="rating your-rating-box" style="position: unset; margin-top: -18px;">

                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <!-- <p class="your-rating-text" id = "1" onclick="getCourseDetailsForRatingModal(this.id)">
                                              <span class="your">Your</span>
                                              <span class="edit">Edit</span>
                                              Rating                                          </p> -->
                                    <p class="your-rating-text">
                                        <a href="javascript::" id="edit_rating_btn_1" onclick="toggleRatingView('1')" style="color: #2a303b">Edit rating</a>
                                        <a href="javascript::" class="hidden" id="cancel_rating_btn_1" onclick="toggleRatingView('1')" style="color: #2a303b">Cancel rating</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <a href="<?php echo site_url('dashboard/course/detail/starting-out-assessment-center/1'); ?>" class="btn">Course detail</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo site_url('dashboard/lesson/detail/starting-out-assessment-center/1'); ?>" class="btn">Start lesson</a>
                                </div>
                            </div>
                        </div>

                        <div class="course-details" style="display: none; padding-bottom: 10px;" id="course_rating_view_1">
                            <a href="<?php echo site_url('dashboard/course/detail/starting-out-assessment-center/1'); ?>">
                                <h5 class="title">Starting Out Assessment Center</h5>
                            </a>
                            <form class="" action="" method="post">
                                <div class="form-group select">
                                    <div class="styled-select">
                                        <select class="form-control" name="star_rating" id="star_rating_of_course_1">
                                            <option value="1">1 Out of 5</option>
                                            <option value="2">2 Out of 5</option>
                                            <option value="3">3 Out of 5</option>
                                            <option value="4">4 Out of 5</option>
                                            <option value="5" selected="">5 Out of 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group add_top_30">
                                    <textarea name="review" id="review_of_a_course_1" class="form-control" style="height:120px;" placeholder="Write your review here"></textarea>
                                </div>
                                <button type="" class="btn btn-block" onclick="publishRating('1')" name="button">Publish rating</button>
                                <a href="javascript::" class="btn btn-block" onclick="toggleRatingView('1')" name="button">Cancel rating</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>