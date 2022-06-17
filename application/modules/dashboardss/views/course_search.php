<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('guest/home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo $page_title;; ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Semua Kategori
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>


<section class="category-course-list-area">
    <div class="container">
        <div class="category-filter-box filter-box clearfix">
            <span>Showing on this page : 2</span>
            <a href="javascript::" onclick="toggleLayout('grid')" style="float: right; font-size: 19px; margin-left: 5px;"><i class="fas fa-th"></i></a>
            <a href="javascript::" onclick="toggleLayout('list')" style="float: right; font-size: 19px;"><i class="fas fa-th-list"></i></a>
            <a href="<?php echo site_url('guest/courses'); ?>" style="float: right; font-size: 19px; margin-right: 5px;"><i class="fas fa-sync-alt"></i></a>
        </div>
        <div class="row">
            <div class="col-lg-3 filter-area">
                <div class="card">
                    <a href="javascript::" style="color: unset;">
                        <div class="card-header filter-card-header" id="headingOne" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter">
                            <h6 class="mb-0">
                                Filter <i class="fas fa-sliders-h" style="float: right;"></i>
                            </h6>
                        </div>
                    </a>
                    <div id="collapseFilter" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body pt-0">
                            <div class="filter_type">
                                <h6>Kategori</h6>
                                <ul>
                                    <li class="">
                                        <div class="">
                                            <input type="radio" id="category_all" name="sub_category" class="categories custom-radio" value="all" onclick="filter(this)" checked>
                                            <label for="category_all">Semua Kategori</label>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="">
                                            <input type="radio" id="category-1" name="sub_category" class="categories custom-radio" value="bisnis" onclick="filter(this)">
                                            <label for="category-1">Bisnis</label>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="">
                                            <input type="radio" id="category-2" name="sub_category" class="categories custom-radio" value="design" onclick="filter(this)">
                                            <label for="category-2">Design</label>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="">
                                            <input type="radio" id="category-3" name="sub_category" class="categories custom-radio" value="edukasi" onclick="filter(this)">
                                            <label for="category-3">Edukasi</label>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="">
                                            <input type="radio" id="category-4" name="sub_category" class="categories custom-radio" value="it" onclick="filter(this)">
                                            <label for="category-3">IT</label>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="">
                                            <input type="radio" id="category-4" name="sub_category" class="categories custom-radio" value="lainnya" onclick="filter(this)">
                                            <label for="category-4">Lainnya</label>
                                        </div>
                                    </li>
                                </ul>
                                <a href="javascript::" id="city-toggle-btn" onclick="showToggle(this, 'hidden-categories')" style="font-size: 12px;"></a>
                            </div>
                            <hr>
                            <div class="filter_type">
                                <div class="form-group">
                                    <h6>Harga</h6>
                                    <ul>
                                        <li>
                                            <div class="">
                                                <input type="radio" id="price_all" name="price" class="prices custom-radio" value="all" onclick="filter(this)" checked>
                                                <label for="price_all">Semua</label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="price_free" name="price" class="prices custom-radio" value="free" onclick="filter(this)">
                                                <label for="price_free">Gratis</label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="price_paid" name="price" class="prices custom-radio" value="paid" onclick="filter(this)">
                                                <label for="price_paid">Berbayar</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="filter_type">
                                <h6>Level</h6>
                                <ul>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="all" name="level" class="level custom-radio" value="all" onclick="filter(this)" checked>
                                            <label for="all">All</label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="beginner" name="level" class="level custom-radio" value="beginner" onclick="filter(this)">
                                            <label for="beginner">Beginner</label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="advanced" name="level" class="level custom-radio" value="advanced" onclick="filter(this)">
                                            <label for="advanced">Advanced</label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="intermediate" name="level" class="level custom-radio" value="intermediate" onclick="filter(this)">
                                            <label for="intermediate">Intermediate</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="filter_type">
                                <h6>Bahasa</h6>
                                <ul>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="all_language" name="language" class="languages custom-radio" value="all" onclick="filter(this)" checked>
                                            <label for="all_language">Semua</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="language_indonesia" name="language" class="languages custom-radio" value="indonesia" onclick="filter(this)">
                                            <label for="language_indonesia">Indonesia</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="filter_type">
                                <h6>Ratings</h6>
                                <ul>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="all_rating" name="rating" class="ratings custom-radio" value="all" onclick="filter(this)" checked>
                                            <label for="all_rating">All</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="rating_1" name="rating" class="ratings custom-radio" value="1" onclick="filter(this)">
                                            <label for="rating_1">
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="rating_2" name="rating" class="ratings custom-radio" value="2" onclick="filter(this)">
                                            <label for="rating_2">
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="rating_3" name="rating" class="ratings custom-radio" value="3" onclick="filter(this)">
                                            <label for="rating_3">
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="rating_4" name="rating" class="ratings custom-radio" value="4" onclick="filter(this)">
                                            <label for="rating_4">
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="rating_5" name="rating" class="ratings custom-radio" value="5" onclick="filter(this)">
                                            <label for="rating_5">
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="category-course-list">
                    <ul>

                        <li>
                            <div class="course-box-2">
                                <div class="course-image">
                                    <a href="http://localhost/academy/home/course/starting-out-assessment-center/1">
                                        <img src="http://localhost/academy/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="course-details">
                                    <a href="http://localhost/academy/home/course/starting-out-assessment-center/1" class="course-title">Starting Out Assessment Center</a>
                                    <a href="http://localhost/academy/home/instructor_page/1" class="course-instructor">
                                        <span class="instructor-name">Admin Admin</span>
                                    </a>
                                    <div class="course-subtitle">
                                        Starting Out Assessment Center bertujuan untuk membekali anda apa yang perlu dilakukan dalam kegiatan assessment center dan bagaimana metode assessment center digunakan untuk memotret kompetensi anda. </div>
                                    <div class="course-meta">
                                        <span class=""><i class="fas fa-play-circle"></i>
                                            10 Lessons </span>
                                        <span class=""><i class="far fa-clock"></i>
                                            00:18:52 Hours </span>
                                        <span class=""><i class="fas fa-closed-captioning"></i>Indonesia</span>
                                        <span class=""><i class="fa fa-level-up"></i>Beginner</span>
                                    </div>
                                </div>
                                <div class="course-price-rating">
                                    <div class="course-price">
                                        <span class="current-price">Free</span>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span class="d-inline-block average-rating">5</span>
                                    </div>
                                    <div class="rating-number">
                                        1 Ratings </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="course-box-2">
                                <div class="course-image">
                                    <a href="http://localhost/academy/home/course/test/2">
                                        <img src="http://localhost/academy/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="course-details">
                                    <a href="http://localhost/academy/home/course/test/2" class="course-title">test</a>
                                    <a href="http://localhost/academy/home/instructor_page/1" class="course-instructor">
                                        <span class="instructor-name">Admin Admin</span>
                                    </a>
                                    <div class="course-subtitle">
                                    </div>
                                    <div class="course-meta">
                                        <span class=""><i class="fas fa-play-circle"></i>
                                            0 Lessons </span>
                                        <span class=""><i class="far fa-clock"></i>
                                            00:00:00 Hours </span>
                                        <span class=""><i class="fas fa-closed-captioning"></i>English</span>
                                        <span class=""><i class="fa fa-level-up"></i>Beginner</span>
                                    </div>
                                </div>
                                <div class="course-price-rating">
                                    <div class="course-price">
                                        <span class="current-price">$0</span>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">0</span>
                                    </div>
                                    <div class="rating-number">
                                        0 Ratings </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <nav>
                </nav>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function get_url() {
        var urlPrefix = '<?php echo site_url('guest/search?'); ?>'
        var urlSuffix = "";
        var slectedCategory = "";
        var selectedPrice = "";
        var selectedLevel = "";
        var selectedLanguage = "";
        var selectedRating = "";

        // Get selected category
        $('.categories:checked').each(function() {
            slectedCategory = $(this).attr('value');
        });

        // Get selected price
        $('.prices:checked').each(function() {
            selectedPrice = $(this).attr('value');
        });

        // Get selected difficulty Level
        $('.level:checked').each(function() {
            selectedLevel = $(this).attr('value');
        });

        // Get selected difficulty Level
        $('.languages:checked').each(function() {
            selectedLanguage = $(this).attr('value');
        });

        // Get selected rating
        $('.ratings:checked').each(function() {
            selectedRating = $(this).attr('value');
        });

        urlSuffix = "category=" + slectedCategory + "&&price=" + selectedPrice + "&&level=" + selectedLevel + "&&language=" + selectedLanguage + "&&rating=" + selectedRating;
        var url = urlPrefix + urlSuffix;
        return url;
    }

    function filter() {
        var url = get_url();
        window.location.replace(url);
        //console.log(url);
    }

    function toggleLayout(layout) {
        $.ajax({
            type: 'POST',
            url: 'http://localhost/academy/home/set_layout_to_session',
            data: {
                layout: layout
            },
            success: function(response) {
                location.reload();
            }
        });
    }

    function showToggle(elem, selector) {
        $('.' + selector).slideToggle(20);
        if ($(elem).text() === "Show more") {
            $(elem).text('Show less');
        } else {
            $(elem).text('Show more');
        }
    }
</script>