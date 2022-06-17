<!DOCTYPE html>
<html lang="en">

<head>

  <title><?php echo $page_title; ?> | <?php echo get_settings('system_name'); ?></title>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="<?php echo get_settings('author') ?>" />

  <?php if ($this->uri->segment(2) == 'course' and $this->uri->segment(4) != null) : ?>
    <meta name="keywords" content="<?php echo $meta_keywords; ?>" />
    <meta name="description" content="<?php echo $meta_description; ?>" />
  <?php else : ?>
    <meta name="keywords" content="<?php echo get_settings('website_keywords'); ?>" />
    <meta name="description" content="<?php echo get_settings('website_description'); ?>" />
  <?php endif; ?>


  <link name="favicon" type="image/x-icon" href="<?php echo base_url() . 'assets/guest/default/img/favicon.png'; ?>" rel="shortcut icon" />
  <link rel="favicon" href="<?php echo base_url() . 'assets/guest/default/img/icons/favicon.ico'; ?>">
  <link rel="apple-touch-icon" href="<?php echo base_url() . 'assets/guest/default/img/icons/icon.png'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/jquery.webui-popover.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/select2.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/slick.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/slick-theme.css'; ?>">
  <!-- font awesome 5 -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/fontawesome-all.min.css'; ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/bootstrap.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/bootstrap-tagsinput.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/main.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/responsive.css'; ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/global/toastr/toastr.css' ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css" />
  <script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>"></script>



</head>

<body class="gray-bg">
  
 <?php
if ($this->session->userdata('user_role_id')) {
?>
<section class="menu-area">
    <div class="container-xl">
      <div class="row">
        <div class="col">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <ul class="mobile-header-buttons">
              <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
              <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
            </ul>

            <a href="<?php echo site_url('guest/home'); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url() . 'assets/guest/default/img/logo.png'; ?>" alt="" height="35"></a>

            <div class="main-nav-wrap">

              <div class="mobile-overlay"></div>

              <ul class="mobile-main-nav">
                <div class="mobile-menu-helper-top"></div>

                <li class="has-children">
                  <a href="">
                    <i class="fas fa-th d-inline"></i>
                    <span>Menu</span>
                    <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                  </a>

                  <ul class="category corner-triangle top-left is-hidden">
                    <li class="go-back"><a href=""><i class="fas fa-angle-left"></i>Menu</a></li>

                    <li class="all-category-devided">
                      <a href="<?php echo site_url('guest/home'); ?>">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span>Home</span>
                      </a>
                    </li>

                    <li class="all-category-devided">
                      <a href="<?php echo site_url('guest/prakerja'); ?>">
                        <span class="icon"><i class="fa fa-id-card"></i></span>
                        <span>Prakerja</span>
                      </a>
                    </li>

                    <li class="has-children all-category-devided">
                      <a href="#">
                        <span class="icon"><i class="fas fa-clipboard-check"></i></span>
                        <span>Kategori Kursus</span>
                        <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                      </a>
                      <ul class="sub-category is-hidden">
                        <li class="go-back-menu"><a href=""><i class="fas fa-angle-left"></i>Menu</a></li>
                        <li class="go-back"><a href="">
                            <i class="fas fa-angle-left"></i>
                            <span class="icon"><i class="fas fa-clipboard-check"></i></span>
                            Kategori Kursus </a></li>
                        <li><a href="<?php echo site_url('guest/courses?category=bisnis'); ?>">Bisnis</a></li>
                        <li><a href="<?php echo site_url('guest/courses?category=design'); ?>">Design</a></li>
                        <li><a href="<?php echo site_url('guest/courses?category=edukasi'); ?>">Edukasi</a></li>
                        <li><a href="<?php echo site_url('guest/courses?category=it'); ?>">IT</a></li>
                        <li><a href="<?php echo site_url('guest/courses?category=lainnya'); ?>">Lainnya</a></li>

                      </ul>
                    </li>
                    <li class="all-category-devided">
                      <a href="<?php echo site_url('guest/blog'); ?>">
                        <span class="icon"><i class="fa fa-tag"></i></span>
                        <span>Blog</span>
                      </a>
                    </li>
                    <li class="all-category-devided">
                      <a href="<?php echo site_url('guest/faq'); ?>">
                        <span class="icon"><i class="fa fa-question"></i></span>
                        <span>FAQ</span>
                      </a>
                    </li>
                  </ul>
                </li>

                <div class="mobile-menu-helper-bottom"></div>
              </ul>
            </div>



            <form class="inline-form" action="<?php echo site_url('guest/search'); ?>" method="get" style="width: 100%;">
              <div class="input-group search-box mobile-search">
                <input type="text" name='query' class="form-control" placeholder="Cari kursus">
                <div class="input-group-append">
                  <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>


            <div class="cart-box menu-icon-box" id="cart_items">
              <div class="icon">
                <a href="javascript::" onclick="showCartPage()"><i class="fas fa-shopping-cart"></i></a>
                <span class="number">0</span>
              </div>

              <!-- Cart Dropdown goes here -->
              <div class="dropdown course-list-dropdown corner-triangle top-right" style="display: none;">
                <!-- Just remove the display none from the css to make it work -->
                <div class="list-wrapper">
                  <div class="item-list">
                    <ul>
                    </ul>
                  </div>
                  <div class="dropdown-footer">
                    <div class="cart-total-price clearfix">
                      <span>Total:</span>
                      <div class="float-right">
                        <span class="current-price"></span>
                        <!-- <span class="original-price">$94.99</span> -->
                      </div>
                    </div>
                    <a href="<?php echo base_url() . 'guest/shopping_cart'; ?>">Go to cart</a>
                  </div>
                </div>
                <div class="empty-box text-center d-none">
                  <p>Your cart is empty.</p>
                  <a href="">Keep Shopping</a>
                </div>
              </div>

              <script type="text/javascript">
                function showCartPage() {
                  window.location.replace("<?php echo base_url() . 'guest/shopping_cart'; ?>");
                }
              </script>
            </div>

            <span class="signin-box-move-desktop-helper"></span>
            <div class="sign-in-box btn-group">

              <a href="<?php echo base_url() . 'guest/login'; ?>" class="btn btn-sign-in">Log in</a>

              <a href="<?php echo base_url() . 'guest/sign_up'; ?>" class="btn btn-sign-up">Sign up</a>

            </div> <!--  sign-in-box end -->
          </nav>
        </div>
      </div>
    </div>
  </section>
<?php
}else {
?>
<section class="menu-area">
    <div class="container-xl">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <ul class="mobile-header-buttons">
                        <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
                        <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
                    </ul>

                    <a href="http://localhost/academy/" class="navbar-brand" href="#">
                        <img src="http://localhost/academy/uploads/system/logo-dark.png" alt="" height="35">
                    </a>

                    <div class="main-nav-wrap">
  <div class="mobile-overlay"></div>

  <ul class="mobile-main-nav">
    <div class="mobile-menu-helper-top"></div>

    <li class="has-children">
      <a href="">
        <i class="fas fa-th d-inline"></i>
        <span>Kursus</span>
        <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
      </a>

      <ul class="category corner-triangle top-left is-hidden">
        <li class="go-back"><a href=""><i class="fas fa-angle-left"></i>Menu</a></li>

            <li class="has-children">
        <a href="#">
          <span class="icon"><i class="fas fa-clipboard-check"></i></span>
          <span>Pertamina</span>
          <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
        </a>
        <ul class="sub-category is-hidden">
          <li class="go-back-menu"><a href=""><i class="fas fa-angle-left"></i>Menu</a></li>
          <li class="go-back"><a href="">
            <i class="fas fa-angle-left"></i>
            <span class="icon"><i class="fas fa-clipboard-check"></i></span>
            Pertamina          </a></li>
                    <li><a href="http://localhost/academy/home/courses?category=wajib">Wajib</a></li>
                  <li><a href="http://localhost/academy/home/courses?category=pilihan">Pilihan</a></li>
                  <li><a href="http://localhost/academy/home/courses?category=yrdy">yrdy</a></li>
              </ul>
    </li>
        <li class="has-children">
        <a href="#">
          <span class="icon"><i class="fas fa-desktop"></i></span>
          <span>Design</span>
          <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
        </a>
        <ul class="sub-category is-hidden">
          <li class="go-back-menu"><a href=""><i class="fas fa-angle-left"></i>Menu</a></li>
          <li class="go-back"><a href="">
            <i class="fas fa-angle-left"></i>
            <span class="icon"><i class="fas fa-desktop"></i></span>
            Design          </a></li>
                    <li><a href="http://localhost/academy/home/courses?category=adobe-illustrator">Adobe Illustrator</a></li>
                  <li><a href="http://localhost/academy/home/courses?category=adobe-photoshop">Adobe Photoshop</a></li>
              </ul>
    </li>
    <li class="all-category-devided">
    <a href="http://localhost/academy/home/courses">
      <span class="icon"><i class="fa fa-align-justify"></i></span>
      <span>Semua Kursus</span>
    </a>
  </li>
</ul>
</li>

<div class="mobile-menu-helper-bottom"></div>
</ul>
</div>



 <div class="instructor-box menu-icon-box">
                       

                    <form class="inline-form" action="http://localhost/academy/home/search" method="get" style="width: 100%;">
                        <div class="input-group search-box mobile-search">
                            <input type="text" name = 'query' class="form-control" placeholder="Cari kursus">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                                            <div class="instructor-box menu-icon-box">
                            <div class="icon">
                                <a href="http://localhost/academy/user" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0;">Instructor</a>
                            </div>
                        </div>
                    
                    <div class="instructor-box menu-icon-box">
                        <div class="icon">
                            <a href="http://localhost/academy/home/my_courses" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px;">My courses</a>
                        </div>
                    </div>

                    <div class="wishlist-box menu-icon-box" id = "wishlist_items">
                        <div class="icon">
    <a href=""><i class="far fa-heart"></i></a>
    <span class="number">1</span>
</div>
<div class="dropdown course-list-dropdown corner-triangle top-right">
    <div class="list-wrapper">
        <div class="item-list">
            <ul>
                                    <li>
                        <div class="item clearfix">
                            <div class="item-image">
                                <a href="">
                                    <img src="http://localhost/academy/uploads/thumbnails/course_thumbnails/course_thumbnail_default_2.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="item-details">
                                <a href="">
                                    <div class="course-name">test</div>
                                    <div class="instructor-name">
                                        By Admin Admin                                    </div>

                                    <div class="item-price">
                                                                                                                                    <span class="current-price">Rp150000</span>
                                                <span class="original-price">Rp250000</span>
                                                                                                                        </div>
                                </a>
                                <button type="button" id = "2" onclick="handleCartItems(this)" class = "">
                                    Add to cart                                </button>
                            </div>
                        </div>
                    </li>
                            </ul>
        </div>
        <div class="dropdown-footer">
            <a href = "http://localhost/academy/home/my_wishlist">Go to wishlist</a>
        </div>
    </div>
    <div class="empty-box text-center d-none">
        <p>Your wishlist is empty.</p>
        <a href="">Explore courses</a>
    </div>
</div>
                    </div>

                    <div class="cart-box menu-icon-box" id = "cart_items">
                        <div class="icon">
	<a href="javascript::" onclick="showCartPage()"><i class="fas fa-shopping-cart"></i></a>
	<span class="number">0</span>
</div>

<!-- Cart Dropdown goes here -->
<div class="dropdown course-list-dropdown corner-triangle top-right" style="display: none;"> <!-- Just remove the display none from the css to make it work -->
	<div class="list-wrapper">
		<div class="item-list">
			<ul>
							</ul>
		</div>
		<div class="dropdown-footer">
			<div class="cart-total-price clearfix">
				<span>Total:</span>
				<div class="float-right">
					<span class="current-price"></span>
					<!-- <span class="original-price">$94.99</span> -->
				</div>
			</div>
			<a href = "http://localhost/academy/home/shopping_cart">Pergi ke keranjang</a>
		</div>
	</div>
	<div class="empty-box text-center d-none">
		<p>Keranjang anda kosong.</p>
		<a href="">Keep Shopping</a>
	</div>
</div>

<script type="text/javascript">
function showCartPage() {
	window.location.replace("http://localhost/academy/home/shopping_cart");
}
</script>
                    </div>

                    

                    <div class="user-box menu-icon-box">
                        <div class="icon">
                            <a href="javascript::">
                                                                <img src="http://localhost/academy/uploads/user_image/2.jpg" alt="" class="img-fluid">
                                                    </a>
                    </div>
                    <div class="dropdown user-dropdown corner-triangle top-right">
                        <ul class="user-dropdown-menu">

                            <li class="dropdown-user-info">
                                <a href="">
                                    <div class="clearfix">
                                        <div class="user-image float-left">
                                                                                            <img src="http://localhost/academy/uploads/user_image/2.jpg" alt="" class="img-fluid">
                                                                                    </div>
                                        <div class="user-details">
                                            <div class="user-name">
                                                <span class="hi">Hi,</span>
                                                Azis M Iqbal                                            </div>
                                            <div class="user-email">
                                                <span class="email">azis@pertamina-ptc.com</span>
                                                <span class="welcome">Welcome back</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="user-dropdown-menu-item"><a href="http://localhost/academy/home/my_courses"><i class="far fa-gem"></i>My courses</a></li>
                            <li class="user-dropdown-menu-item"><a href="http://localhost/academy/home/my_wishlist"><i class="far fa-heart"></i>My wishlist</a></li>
                            <li class="user-dropdown-menu-item"><a href="http://localhost/academy/home/my_messages"><i class="far fa-envelope"></i>My messages</a></li>
                            <li class="user-dropdown-menu-item"><a href="http://localhost/academy/home/purchase_history"><i class="fas fa-shopping-cart"></i>Purchase history</a></li>
                            <li class="user-dropdown-menu-item"><a href="http://localhost/academy/home/profile/user_profile"><i class="fas fa-user"></i>User profile</a></li>
                            <li class="dropdown-user-logout user-dropdown-menu-item"><a href="http://localhost/academy/login/logout/user">Log out</a></li>
                        </ul>
                    </div>
                </div>



                <span class="signin-box-move-desktop-helper"></span>
                <div class="sign-in-box btn-group d-none">

                    <button type="button" class="btn btn-sign-in" data-toggle="modal" data-target="#signInModal">Log In</button>

                    <button type="button" class="btn btn-sign-up" data-toggle="modal" data-target="#signUpModal">Sign Up</button>

                </div> <!--  sign-in-box end -->


            </nav>
        </div>
    </div>
</div>
</section>
<?php 
}
?>


  
  
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/guest/eu-cookie/purecookie.css'; ?>" async />

  <div class="cookieConsentContainer" id="cookieConsentContainer" style="opacity: .9; display: block; display: none;">
    <!-- <div class="cookieTitle">
    <a>Cookies.</a>
  </div> -->
    <div class="cookieDesc">
      <p>
        This website uses cookies to personalize content and analyse traffic in order to offer you a better experience. <a class="link-cookie-policy" href="<?php echo site_url('guest/cookie_policy'); ?>">Cookie policy</a>
      </p>
    </div>
    <div class="cookieButton">
      <a onclick="cookieAccept();">Accept</a>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      if (localStorage.getItem("accept_cookie_academy")) {
        //localStorage.removeItem("accept_cookie_academy");
      } else {
        $('#cookieConsentContainer').fadeIn(1000);
      }
    });

    function cookieAccept() {
      if (typeof(Storage) !== "undefined") {
        localStorage.setItem("accept_cookie_academy", true);
        localStorage.setItem("accept_cookie_time", "04/29/2021");
        $('#cookieConsentContainer').fadeOut(1200);
      }
    }
  </script>


  <!-- CONTENT (Start) -->
  <?php $this->load->view($content); ?>
  <!-- CONTENT (End) -->

  <footer class="footer-area d-print-none">
    <div class="container-xl">
      <div class="row">
        <div class="col-md-6">
          <p class="copyright-text">
            <a href=""><img src="<?php echo base_url() . 'assets/guest/default/img/logo.png'; ?>" alt="" class="d-inline-block" width="110"></a>
            <a href="http://creativeitem.com/" target="_blank"></a>
          </p>
        </div>
        <div class="col-md-6">
          <ul class="nav justify-content-md-end footer-menu">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('guest/about_us'); ?>">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('guest/privacy_policy'); ?>">Privacy policy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('guest/terms_and_condition'); ?>">Terms and condition</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('guest/login'); ?>">
                Login </a>
            </li>
            <li>
              <select class="language_selector" onchange="switch_language(this.value)">
                <option value="english">English</option>
                <option value="indonesia" selected>Indonesia</option>
              </select>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- PAYMENT MODAL -->
  <!-- Modal -->

  <!-- Modal -->
  <div class="modal fade multi-step" id="EditRatingModal" tabindex="-1" role="dialog" aria-hidden="true" reset-on-close="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content edit-rating-modal">
        <div class="modal-header">
          <h5 class="modal-title step-1" data-step="1">Step 1</h5>
          <h5 class="modal-title step-2" data-step="2">Step 2</h5>
          <h5 class="m-progress-stats modal-title">
            &nbsp;of&nbsp;<span class="m-progress-total"></span>
          </h5>

          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="m-progress-bar-wrapper">
          <div class="m-progress-bar">
          </div>
        </div>
        <div class="modal-body step step-1">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="modal-rating-box">
                  <h4 class="rating-title">How would you rate this course overall?</h4>
                  <fieldset class="your-rating">

                    <input type="radio" id="star5" name="rating" value="5" />
                    <label class="full" for="star5"></label>

                    <!-- <input type="radio" id="star4half" name="rating" value="4 and a half" />
                  <label class="half" for="star4half"></label> -->

                    <input type="radio" id="star4" name="rating" value="4" />
                    <label class="full" for="star4"></label>

                    <!-- <input type="radio" id="star3half" name="rating" value="3 and a half" />
                  <label class="half" for="star3half"></label> -->

                    <input type="radio" id="star3" name="rating" value="3" />
                    <label class="full" for="star3"></label>

                    <!-- <input type="radio" id="star2half" name="rating" value="2 and a half" />
                  <label class="half" for="star2half"></label> -->

                    <input type="radio" id="star2" name="rating" value="2" />
                    <label class="full" for="star2"></label>

                    <!-- <input type="radio" id="star1half" name="rating" value="1 and a half" />
                  <label class="half" for="star1half"></label> -->

                    <input type="radio" id="star1" name="rating" value="1" />
                    <label class="full" for="star1"></label>

                    <!-- <input type="radio" id="starhalf" name="rating" value="half" />
                  <label class="half" for="starhalf"></label> -->

                  </fieldset>
                </div>
              </div>
              <div class="col-md-6">
                <div class="modal-course-preview-box">
                  <div class="card">
                    <img class="card-img-top img-fluid" id="course_thumbnail_1" alt="">
                    <div class="card-body">
                      <h5 class="card-title" class="course_title_for_rating" id="course_title_1"></h5>
                      <p class="card-text" id="instructor_details">

                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-body step step-2">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="modal-rating-comment-box">
                  <h4 class="rating-title">Write a public review</h4>
                  <textarea id="review_of_a_course" name="review_of_a_course" placeholder="Describe your experience what you got out of the course and other helpful highlights. What did the instructor do well and what could use some improvement?" maxlength="65000" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="modal-course-preview-box">
                  <div class="card">
                    <img class="card-img-top img-fluid" id="course_thumbnail_2" alt="">
                    <div class="card-body">
                      <h5 class="card-title" class="course_title_for_rating" id="course_title_2"></h5>
                      <p class="card-text">
                        -
                        Admin Admin </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="course_id" id="course_id_for_rating" value="">
        <div class="modal-footer">
          <button type="button" class="btn btn-primary next step step-1" data-step="1" onclick="sendEvent(2)">Next</button>
          <button type="button" class="btn btn-primary previous step step-2 mr-auto" data-step="2" onclick="sendEvent(1)">Previous</button>
          <button type="button" class="btn btn-primary publish step step-2" onclick="publishRating($('#course_id_for_rating').val())" id="">Publish</button>
        </div>
      </div>
    </div>
  </div><!-- Modal -->

  <script type="text/javascript">
    function switch_language(language) {
      $.ajax({
        url: 'http://localhost/academy/home/site_language',
        type: 'post',
        data: {
          language: language
        },
        success: function(response) {
          setTimeout(function() {
            location.reload();
          }, 500);
        }
      });
    }
  </script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/vendor/modernizr-3.5.0.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/vendor/jquery-3.2.1.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/popper.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/bootstrap.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/slick.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/select2.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/tinymce.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/multi-step-modal.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/jquery.webui-popover.min.js'; ?>"></script>
  <script src="https://content.jwplatform.com/libraries/O7BMTay5.js"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/main.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/global/toastr/toastr.min.js'; ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/bootstrap-tagsinput.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/guest/default/js/custom.js'; ?>"></script>

  <!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != ""):?>
<script type="text/javascript">
	toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
</script>
<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>
<script type="text/javascript">
	toastr.error('<?php echo $this->session->flashdata("error_message");?>');
</script>
<?php endif;?>

  <!-- (Ajax Modal)-->
  <div class="modal fade" id="modal_ajax">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><?php echo "Modal"; ?></h4>
        </div>

        <div class="modal-body" style="height:500px; overflow:auto;">



        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>




  <script type="text/javascript">
    function confirm_modal(delete_url) {
      jQuery('#modal-4').modal('show', {
        backdrop: 'static'
      });
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>

  <!-- (Normal Modal)-->
  <div class="modal fade" id="modal-4">
    <div class="modal-dialog">
      <div class="modal-content" style="margin-top:100px;">

        <div class="modal-header">
          <h4 class="modal-title text-center">Are you sure ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>


        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a href="#" class="btn btn-danger btn-yes" id="delete_link" data-dismiss="modal">Yes</a>
          <button type="button" class="btn btn-info btn-cancel" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    function async_modal() {
      const asyncModal = new Promise(function(resolve, reject) {
        $('#modal-4').modal('show');
        $('#modal-4 .btn-yes').click(function() {
          resolve(true);
        });
        $('#modal-4 .btn-cancel').click(function() {
          resolve(false);
        });
      });
      return asyncModal;
    }
  </script>
  <script type="text/javascript">
    function toggleRatingView(course_id) {
      $('#course_info_view_' + course_id).toggle();
      $('#course_rating_view_' + course_id).toggle();
      $('#edit_rating_btn_' + course_id).toggle();
      $('#cancel_rating_btn_' + course_id).toggle();
    }

    function publishRating(course_id) {
      var review = $('#review_of_a_course_' + course_id).val();
      var starRating = 0;
      starRating = $('#star_rating_of_course_' + course_id).val();
      if (starRating > 0) {
        $.ajax({
          type: 'POST',
          url: 'http://localhost/academy/home/rate_course',
          data: {
            course_id: course_id,
            review: review,
            starRating: starRating
          },
          success: function(response) {
            location.reload();
          }
        });
      } else {

      }
    }
  </script>
</body>

</html>