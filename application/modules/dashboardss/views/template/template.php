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
			include 'header_login.php';
		}else {
			include 'header_logout.php';
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