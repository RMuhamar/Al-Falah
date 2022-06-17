<section class="home-banner-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <div class="home-banner-wrap">
                    <h3>Tingkatkan <b>Skill & Knowledge</b></h3>
                    <p>Bersama kami dan dapatkan sertifikat pembelajaran<br>

                    </p>
                    <form class="" action="<?php echo site_url('guest/search'); ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Apa yang ingin Anda cari?">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form><br>
                    <small class="font-weight-bold">Cari berbagai kursus yang tersedia di Gurumaya melalui video menarik dan inovatif yang dapat di akses kapan saja sesuka hatimu</small>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-fact-area">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                    <i class="fas fa-bullseye float-left"></i>
                    <div class="text-box">
                        <h4>2 Online courses</h4>
                        <p>Explore a variety of fresh topics</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                    <i class="fa fa-check float-left"></i>
                    <div class="text-box">
                        <h4>Expert instruction</h4>
                        <p>Find the right course for you</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                    <i class="fa fa-clock float-left"></i>
                    <div class="text-box">
                        <h4>Lifetime access</h4>
                        <p>Learn on your schedule</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h2 class="course-carousel-title">Top courses</h2>
                <div class="course-carousel">
                    <div class="course-box-wrap">
                        <a href="<?php echo site_url('guest/course'); ?>" class="has-popover">
                            <div class="course-box">
                                <!-- <div class="course-badge position best-seller">Best seller</div> -->
                                <div class="course-image">
                                    <img src="<?php echo base_url() . 'assets/guest/default/img/course_thumbnail_placeholder.jpg'; ?>" alt="" class="img-fluid">
                                </div>
                                <div class="course-details">
                                    <h5 class="title">Starting Out Assessment Center</h5>
                                    <p class="instructors">Pertamina Training & Consulting</p>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">0</span>
                                    </div>
                                    <p class="price text-right">Rp. 250.000,-</p>
                                </div>
                            </div>
                        </a>

                        <div class="webui-popover-content">
                            <div class="course-popover-content">
                                <div class="last-updated">Last updater Wed, 28-Apr-2021</div>

                                <div class="course-title">
                                    <a href="http://localhost/academy/home/course/starting-out-assessment-center/1">Starting Out Assessment Center</a>
                                </div>
                                <div class="course-meta">
                                    <span class=""><i class="fas fa-play-circle"></i>
                                        10 Lessons </span>
                                    <span class=""><i class="far fa-clock"></i>
                                        00:18:52 Hours </span>
                                    <span class=""><i class="fas fa-closed-captioning"></i>Indonesia</span>
                                </div>
                                <div class="course-subtitle">Starting Out Assessment Center bertujuan untuk membekali anda apa yang perlu dilakukan dalam kegiatan assessment center dan bagaimana metode assessment center digunakan untuk memotret kompetensi anda.</div>
                                <div class="what-will-learn">
                                    <ul>
                                        <li>Outcomes 1</li>
                                        <li>Outcomes 2</li>
                                    </ul>
                                </div>
                                <div class="popover-btns">
                                    <a href="#" class="btn add-to-cart-btn big-cart-button" onclick="handleEnrolledButton()">Get enrolled</a>
                                    <button type="button" class="wishlist-btn " title="Add to wishlist" onclick="handleWishList(this)" id="1"><i class="fas fa-heart"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h2 class="course-carousel-title">Top 10 Latest courses</h2>
                <div class="course-carousel">
                    <div class="course-box-wrap">
                        <a href="http://localhost/academy/home/course/test/2">
                            <div class="course-box">
                                <div class="course-image">
                                    <img src="<?php echo base_url() . 'assets/guest/default/img/course_thumbnail_placeholder.jpg'; ?>" alt="" class="img-fluid">
                                </div>
                                <div class="course-details">
                                    <h5 class="title">Microsoft Excel untuk Pemula</h5>
                                    <p class="instructors">
                                        Pertamina Training & Consulting </p>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">0</span>
                                    </div>
                                    <p class="price text-right">Rp. 150.000,-</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="course-box-wrap">
                        <a href="http://localhost/academy/home/course/starting-out-assessment-center/1">
                            <div class="course-box">
                                <div class="course-image">
                                    <img src="<?php echo base_url() . 'assets/guest/default/img/course_thumbnail_placeholder.jpg'; ?>" alt="" class="img-fluid">
                                </div>
                                <div class="course-details">
                                    <h5 class="title">Starting Out Assessment Center</h5>
                                    <p class="instructors">
                                        Pertamina Training & Consulting </p>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">0</span>
                                    </div>
                                    <p class="price text-right">Rp. 250.000,-</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function handleWishList(elem) {

        $.ajax({
            url: 'http://localhost/academy/home/handleWishList',
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function(response) {
                if (!response) {
                    window.location.replace("http://localhost/academy/login");
                } else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active')
                    } else {
                        $(elem).addClass('active')
                    }
                    $('#wishlist_items').html(response);
                }
            }
        });
    }

    function handleCartItems(elem) {
        url1 = 'http://localhost/academy/home/handleCartItems';
        url2 = 'http://localhost/academy/home/refreshWishList';
        $.ajax({
            url: url1,
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function(response) {
                $('#cart_items').html(response);
                if ($(elem).hasClass('addedToCart')) {
                    $('.big-cart-button-' + elem.id).removeClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("Add to cart");
                } else {
                    $('.big-cart-button-' + elem.id).addClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("Added to cart");
                }
                $.ajax({
                    url: url2,
                    type: 'POST',
                    success: function(response) {
                        $('#wishlist_items').html(response);
                    }
                });
            }
        });
    }

    function handleEnrolledButton() {
        $.ajax({
            url: 'http://localhost/academy/home/isLoggedIn',
            success: function(response) {
                if (!response) {
                    window.location.replace("http://localhost/academy/login");
                }
            }
        });
    }
</script>