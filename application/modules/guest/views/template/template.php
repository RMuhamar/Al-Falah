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


    <link name="favicon" type="image/x-icon" href="<?php echo base_url() . 'assets/guest/default/img/logo-al-falah.png'; ?>" rel="shortcut icon" />
    <!--<link rel="favicon" href="<?php echo base_url() . 'assets/guest/default/img/icons/favicon.ico'; ?>">
  <link rel="apple-touch-icon" href="<?php echo base_url() . 'assets/guest/default/img/icons/icon.png'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/jquery.webui-popover.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/select2.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/slick.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/slick-theme.css'; ?>"> -->
    <!-- font awesome 5 -->
    <!-- <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/fontawesome-all.min.css'; ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/bootstrap.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/bootstrap-tagsinput.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/main.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/guest/default/css/responsive.css'; ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/global/toastr/toastr.css' ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css" />
  <script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>"></script> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/main.css'; ?>">
    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() . 'assets/guest/default/vendor/aos/aos.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/guest/default/vendor/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/guest/default/vendor/bootstrap-icons/bootstrap-icons.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/guest/default/vendor/boxicons/css/boxicons.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/guest/default/vendor/glightbox/css/glightbox.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/guest/default/vendor/remixicon/remixicon.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/guest/default/vendor/swiper/swiper-bundle.min.css'; ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() . 'assets/guest/default/css/style.css'; ?>" rel="stylesheet">

</head>

<body class="gray-bg">


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
    <img src="<?php echo base_url() . 'assets/guest/default/img/al-falah/'.get_settings('logo'); ?>" width="45" height="45" class="img-fluid animated" alt="">
      <h1 class="logo me-auto"><a href="index.html">AL-FALAH BAYANAN</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Profil</a></li>
          <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
          <li><a class="nav-link   scrollto" href="#gallery">galeri</a></li>
          <li><a class="nav-link scrollto" href="#pengurus">Pengurus</a></li>
          <li><a class="nav-link scrollto" href="#pendaftaran">Pendaftaran</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

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
      // $(document).ready(function() {
      //   if (localStorage.getItem("accept_cookie_academy")) {
      //     //localStorage.removeItem("accept_cookie_academy");
      //   } else {
      //     $('#cookieConsentContainer').fadeIn(1000);
      //   }
      // });

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


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3><?php echo get_settings('system_name') ?></h3>
            <p>
              <?php echo get_settings('address')?><br>
              <strong>Phone:</strong> <?php echo get_settings('system_email') ?><br>
              <strong>Email:</strong> <?php echo get_settings('phone') ?><br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <!-- <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul> -->
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <!-- <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul> -->
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Sosial Media Al-Falah</h4>
            <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> -->
            <div class="social-links mt-3">
              <!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> -->
              <a href="<?php echo get_settings('facebook_link'); ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="<?php echo get_settings('instagram_link'); ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
              <!-- <a href="#" class="google-plus"><i class="bx bxl-youtube"></i></a> -->
              <a href="#" class="linkedin"><i class="bx bxl-whatsapp"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Official Website Al-Falah Bayanan</span></strong>. 2022
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Developing by <a href="https://bootstrapmade.com/">RayProject</a>
      </div>
    </div>
    </footer><!-- End Footer -->

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
    <!-- Vendor JS Files -->
    <script src="<?php echo base_url() . 'assets/guest/default/vendor/aos/aos.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/guest/default/vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/guest/default/vendor/glightbox/js/glightbox.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/guest/default/vendor/isotope-layout/isotope.pkgd.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/guest/default/vendor/swiper/swiper-bundle.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/guest/default/vendor/waypoints/noframework.waypoints.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/guest/default/vendor/php-email-form/validate.js'; ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url() . 'assets/guest/default/js/main.js'; ?>"></script>

    <!-- SHOW TOASTR NOTIFICATION -->
    <!-- <?php if ($this->session->flashdata('flash_message') != "") : ?>
	<script type="text/javascript">
	toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
	</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('error_message') != "") : ?>
	<script type="text/javascript">
	toastr.error('<?php echo $this->session->flashdata("error_message"); ?>');
	</script>
	<?php endif; ?> -->

    <!-- sweetalert -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/sweetalert2.min.css'; ?>">
    <script src="<?php echo base_url() . 'assets/frontend/default/js/sweetalert2.all.min.js'; ?>"></script>

    <!-- (Ajax Modal)-->
    <!-- <div class="modal fade" id="modal_ajax">
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
  </div> -->

    <!-- <script type="text/javascript">
    function confirm_modal(delete_url) {
      jQuery('#modal-4').modal('show', {
        backdrop: 'static'
      });
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script> -->

    <!-- (Normal Modal)-->
    <!-- <div class="modal fade" id="modal-4">
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
  </div> -->


    <!-- <script type="text/javascript">
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
  </script> -->
</body>

</html>