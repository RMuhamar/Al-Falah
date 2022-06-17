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
    <script src="<?php echo base_url('assets/assets/lessons/css/custom.css'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>"></script>


    <style type="text/css">
        body {
            background-color: #fff !important;
        }

        .card {
            border-radius: 0px !important;
            background-color: #f7f8fa !important;
            border: 0px !important;
        }

        .course_card {
            padding: 0px;
            background-color: #F7F8FA;
        }

        .course_container {
            background-color: #fff !important;
        }

        .course_col {
            padding: 0px;
        }

        .course_header_col {
            background-color: #29303b;
            color: #fff;
            padding: 15px 10px 10px;
        }

        .course_header_col img {
            padding: 0px 0px;
        }

        .course_btn {
            color: #95979a;
            border: 1px solid #95979a;
            padding: 7px 10px;
        }

        .course_btn:hover {
            color: #fff;
            border: 1px solid #fff;
        }

        .lesson_duration {
            border-radius: 5px;
            padding-top: 8px;
            color: #5C5D61;
            font-size: 13px;
            font-weight: 100;
        }

        .quiz-card {
            border: 1px solid #dcdddf !important;
        }

        .bg-quiz-result-info {
            background-color: #007791 !important;
            padding: 13px !important;
        }
    </style>


</head>

<body class="gray-bg">
    <div class="container-fluid course_container">
        <!-- Top bar -->
        <div class="row">
            <div class="col-lg-9 course_header_col">
                <h5>
                    <img src="<?php echo base_url() . 'assets/guest/default/img/logo-wh.png'; ?>" height="25"> |
                    Starting Out Assessment Center
                </h5>
            </div>
            <div class="col-lg-3 course_header_col">
                <a href="javascript::" class="course_btn" onclick="toggle_lesson_view()"><i class="fa fa-arrows-alt-h"></i></a>
                <a href="<?php echo site_url('dashboard/my_courses'); ?>" class="course_btn"> <i class="fa fa-chevron-left"></i> My courses</a>
                <a href="<?php echo site_url('dashboard/course/detail/starting-out-assessment-center/1'); ?>" class="course_btn">Course details <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>

        <div class="row" id="lesson-container">
            <!-- Course content, video, quizes, files starts-->
            <div class="col-lg-9  order-md-1 course_col" id="video_player_area">
                <!-- <div class="" style="background-color: #333;"> -->
                <div class="" style="text-align: center;">

                    <!-- If the video is youtube video -->
                    <!------------- PLYR.IO ------------>
                    <link rel="stylesheet" href="<?php echo site_url('assets/global/plyr/plyr.css'); ?>">
                    <video poster="<?php echo site_url('uploads/thumbnails/thumbnail.png'); ?>" id="player" playsinline controls>
                        <h4></h4>
                    </video>

                    <script src="<?php echo site_url('assets/global/plyr/plyr.js'); ?>"></script>
                    <script>
                        const player = new Plyr('#player');
                    </script>
                    <!------------- PLYR.IO ------------>
                </div>

                <div class="" style="margin: 20px 0;" id="lesson-summary">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Note:</h5>
                            <p class="card-text">test</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Course content, video, quizes, files ends-->

            <!-- Course sections and lesson selector sidebar starts-->
            <div class="col-lg-3 mt-5 order-md-2 course_col hidden" id="lesson_list_loader" style="text-align: center;">
                <img src="<?php echo site_url('assets/backend/images/loader.gif'); ?>" alt="" height="50" width="50">
            </div>
            <div class="col-lg-3  order-md-2 course_col" id="lesson_list_area">
                <div class="text-center" style="margin: 12px 10px;">
                    <h5>Course content</h5>
                </div>
                <div class="row" style="margin: 12px -1px">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="lessonTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="section_and_lessons-tab" data-toggle="tab" href="#section_and_lessons" role="tab" aria-controls="section_and_lessons" aria-selected="true">Lessons</a>
                            </li>
                            <!-- ZOOM LIVE CLASS TAB STARTS -->
                            <!-- ZOOM LIVE CLASS TAB ENDS -->

                            <!-- CERTIFICATE TAB -->
                            <!-- CERTIFICATE TAB -->
                        </ul>
                        <div class="tab-content" id="lessonTabContent">
                            <div class="tab-pane fade show active" id="section_and_lessons" role="tabpanel" aria-labelledby="section_and_lessons-tab">
                                <!-- Lesson Content starts from here -->
                                <div class="accordion" id="accordionExample">
                                    <div class="card" style="margin:0px 0px;">
                                        <div class="card-header course_card" id="heading-1">

                                            <h5 class="mb-0">
                                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1" style="color: #535a66; background: none; border: none; white-space: normal;" onclick="toggleAccordionIcon(this, '1')">
                                                    <h6 style="color: #959aa2; font-size: 13px;">
                                                        Section 1 <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_1">
                                                            <i class="fa fa-minus"></i>
                                                        </span>
                                                    </h6>
                                                    01 About, Prepare, Methods
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:0px;">
                                                <table style="width: 100%;">



                                                    <tr style="width: 100%; padding: 5px 0px;background-color: #fff;">
                                                        <td style="text-align: left; padding:7px 10px;">
                                                            <div class="form-group">
                                                                <input type="checkbox" id="1" onchange="markThisLessonAsCompleted(this.id);" value=1 checked>
                                                                <label for="1"></label>
                                                            </div>

                                                            <a href="http://localhost/academy/home/lesson/starting-out-assessment-center/1/1" id="1" style="color: #444549;font-size: 14px;font-weight: 400;">
                                                                4:
                                                                Video </a>

                                                            <div class="lesson_duration">
                                                                <i class="far fa-play-circle"></i>
                                                                03 Min
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin:0px 0px;">
                                        <div class="card-header course_card" id="heading-2">

                                            <h5 class="mb-0">
                                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2" style="color: #535a66; background: none; border: none; white-space: normal;" onclick="toggleAccordionIcon(this, '2')">
                                                    <h6 style="color: #959aa2; font-size: 13px;">
                                                        Section 2 <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_2">
                                                            <i class="fa fa-plus"></i>
                                                        </span>
                                                    </h6>
                                                    02 Interview
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse-2" class="collapse " aria-labelledby="heading-2" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:0px;">
                                                <table style="width: 100%;">

                                                    <tr style="width: 100%; padding: 5px 0px;background-color: #fff;">
                                                        <td style="text-align: left; padding:7px 10px;">
                                                            <div class="form-group">
                                                                <input type="checkbox" id="2" onchange="markThisLessonAsCompleted(this.id);" value=1 checked>
                                                                <label for="2"></label>
                                                            </div>

                                                            <a href="http://localhost/academy/home/lesson/starting-out-assessment-center/1/2" id="2" style="color: #444549;font-size: 14px;font-weight: 400;">
                                                                1:
                                                                Video </a>

                                                            <div class="lesson_duration">
                                                                <i class="far fa-play-circle"></i>
                                                                2 Min
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin:0px 0px;">
                                        <div class="card-header course_card" id="heading-3">

                                            <h5 class="mb-0">
                                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3" style="color: #535a66; background: none; border: none; white-space: normal;" onclick="toggleAccordionIcon(this, '3')">
                                                    <h6 style="color: #959aa2; font-size: 13px;">
                                                        Section 3 <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_3">
                                                            <i class="fa fa-plus"></i>
                                                        </span>
                                                    </h6>
                                                    03 Simulasi Diskusi
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse-3" class="collapse " aria-labelledby="heading-3" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:0px;">
                                                <table style="width: 100%;">

                                                    <tr style="width: 100%; padding: 5px 0px;background-color: #fff;">
                                                        <td style="text-align: left; padding:7px 10px;">
                                                            <div class="form-group">
                                                                <input type="checkbox" id="3" onchange="markThisLessonAsCompleted(this.id);" value=1 checked>
                                                                <label for="3"></label>
                                                            </div>

                                                            <a href="http://localhost/academy/home/lesson/starting-out-assessment-center/1/3" id="3" style="color: #444549;font-size: 14px;font-weight: 400;">
                                                                1:
                                                                Video </a>

                                                            <div class="lesson_duration">
                                                                <i class="far fa-play-circle"></i>
                                                                3 Min
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin:0px 0px;">
                                        <div class="card-header course_card" id="heading-4">

                                            <h5 class="mb-0">
                                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4" style="color: #535a66; background: none; border: none; white-space: normal;" onclick="toggleAccordionIcon(this, '4')">
                                                    <h6 style="color: #959aa2; font-size: 13px;">
                                                        Section 4 <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_4">
                                                            <i class="fa fa-plus"></i>
                                                        </span>
                                                    </h6>
                                                    04 Simulasi Roleplay
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse-4" class="collapse " aria-labelledby="heading-4" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:0px;">
                                                <table style="width: 100%;">

                                                    <tr style="width: 100%; padding: 5px 0px;background-color: #fff;">
                                                        <td style="text-align: left; padding:7px 10px;">
                                                            <div class="form-group">
                                                                <input type="checkbox" id="4" onchange="markThisLessonAsCompleted(this.id);" value=1>
                                                                <label for="4"></label>
                                                            </div>

                                                            <a href="http://localhost/academy/home/lesson/starting-out-assessment-center/1/4" id="4" style="color: #444549;font-size: 14px;font-weight: 400;">
                                                                1:
                                                                Video </a>

                                                            <div class="lesson_duration">
                                                                <i class="far fa-play-circle"></i>
                                                                3 Min
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin:0px 0px;">
                                        <div class="card-header course_card" id="heading-5">

                                            <h5 class="mb-0">
                                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5" style="color: #535a66; background: none; border: none; white-space: normal;" onclick="toggleAccordionIcon(this, '5')">
                                                    <h6 style="color: #959aa2; font-size: 13px;">
                                                        Section 5 <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_5">
                                                            <i class="fa fa-plus"></i>
                                                        </span>
                                                    </h6>
                                                    05 Intray Inbasket
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse-5" class="collapse " aria-labelledby="heading-5" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:0px;">
                                                <table style="width: 100%;">

                                                    <tr style="width: 100%; padding: 5px 0px;background-color: #fff;">
                                                        <td style="text-align: left; padding:7px 10px;">
                                                            <div class="form-group">
                                                                <input type="checkbox" id="7" onchange="markThisLessonAsCompleted(this.id);" value=1>
                                                                <label for="7"></label>
                                                            </div>

                                                            <a href="http://localhost/academy/home/lesson/starting-out-assessment-center/1/7" id="7" style="color: #444549;font-size: 14px;font-weight: 400;">
                                                                1:
                                                                Video </a>

                                                            <div class="lesson_duration">
                                                                <i class="far fa-play-circle"></i>
                                                                3 Min
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin:0px 0px;">
                                        <div class="card-header course_card" id="heading-6">

                                            <h5 class="mb-0">
                                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6" style="color: #535a66; background: none; border: none; white-space: normal;" onclick="toggleAccordionIcon(this, '6')">
                                                    <h6 style="color: #959aa2; font-size: 13px;">
                                                        Section 6 <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_6">
                                                            <i class="fa fa-plus"></i>
                                                        </span>
                                                    </h6>
                                                    06 Analisa Bisnis
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse-6" class="collapse " aria-labelledby="heading-6" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:0px;">
                                                <table style="width: 100%;">

                                                    <tr style="width: 100%; padding: 5px 0px;background-color: #fff;">
                                                        <td style="text-align: left; padding:7px 10px;">
                                                            <div class="form-group">
                                                                <input type="checkbox" id="6" onchange="markThisLessonAsCompleted(this.id);" value=1>
                                                                <label for="6"></label>
                                                            </div>

                                                            <a href="http://localhost/academy/home/lesson/starting-out-assessment-center/1/6" id="6" style="color: #444549;font-size: 14px;font-weight: 400;">
                                                                1:
                                                                Video </a>

                                                            <div class="lesson_duration">
                                                                <i class="far fa-play-circle"></i>
                                                                2 Min
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin:0px 0px;">
                                        <div class="card-header course_card" id="heading-7">

                                            <h5 class="mb-0">
                                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7" style="color: #535a66; background: none; border: none; white-space: normal;" onclick="toggleAccordionIcon(this, '7')">
                                                    <h6 style="color: #959aa2; font-size: 13px;">
                                                        Section 7 <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_7">
                                                            <i class="fa fa-plus"></i>
                                                        </span>
                                                    </h6>
                                                    07 Presentasi
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse-7" class="collapse " aria-labelledby="heading-7" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:0px;">
                                                <table style="width: 100%;">

                                                    <tr style="width: 100%; padding: 5px 0px;background-color: #fff;">
                                                        <td style="text-align: left; padding:7px 10px;">
                                                            <div class="form-group">
                                                                <input type="checkbox" id="8" onchange="markThisLessonAsCompleted(this.id);" value=1>
                                                                <label for="8"></label>
                                                            </div>

                                                            <a href="http://localhost/academy/home/lesson/starting-out-assessment-center/1/8" id="8" style="color: #444549;font-size: 14px;font-weight: 400;">
                                                                1:
                                                                Video </a>

                                                            <div class="lesson_duration">
                                                                <i class="far fa-play-circle"></i>
                                                                2 Min
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin:0px 0px;">
                                        <div class="card-header course_card" id="heading-8">

                                            <h5 class="mb-0">
                                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="#collapse-8" aria-expanded="false" aria-controls="collapse-8" style="color: #535a66; background: none; border: none; white-space: normal;" onclick="toggleAccordionIcon(this, '8')">
                                                    <h6 style="color: #959aa2; font-size: 13px;">
                                                        Section 8 <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_8">
                                                            <i class="fa fa-plus"></i>
                                                        </span>
                                                    </h6>
                                                    08 SLAS Domestik
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse-8" class="collapse " aria-labelledby="heading-8" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:0px;">
                                                <table style="width: 100%;">

                                                    <tr style="width: 100%; padding: 5px 0px;background-color: #fff;">
                                                        <td style="text-align: left; padding:7px 10px;">
                                                            <div class="form-group">
                                                                <input type="checkbox" id="9" onchange="markThisLessonAsCompleted(this.id);" value=1>
                                                                <label for="9"></label>
                                                            </div>

                                                            <a href="http://localhost/academy/home/lesson/starting-out-assessment-center/1/9" id="9" style="color: #444549;font-size: 14px;font-weight: 400;">
                                                                1:
                                                                Video </a>

                                                            <div class="lesson_duration">
                                                                <i class="far fa-play-circle"></i>
                                                                03 Min
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin:0px 0px;">
                                        <div class="card-header course_card" id="heading-9">

                                            <h5 class="mb-0">
                                                <button class="btn btn-link w-100 text-left" type="button" data-toggle="collapse" data-target="#collapse-9" aria-expanded="false" aria-controls="collapse-9" style="color: #535a66; background: none; border: none; white-space: normal;" onclick="toggleAccordionIcon(this, '9')">
                                                    <h6 style="color: #959aa2; font-size: 13px;">
                                                        Section 9 <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_9">
                                                            <i class="fa fa-plus"></i>
                                                        </span>
                                                    </h6>
                                                    Pre-Test
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse-9" class="collapse " aria-labelledby="heading-9" data-parent="#accordionExample">
                                            <div class="card-body" style="padding:0px;">
                                                <table style="width: 100%;">

                                                    <tr style="width: 100%; padding: 5px 0px;background-color: #fff;">
                                                        <td style="text-align: left; padding:7px 10px;">
                                                            <div class="form-group">
                                                                <input type="checkbox" id="10" onchange="markThisLessonAsCompleted(this.id);" value=1 checked>
                                                                <label for="10"></label>
                                                            </div>

                                                            <a href="http://localhost/academy/home/lesson/starting-out-assessment-center/1/10" id="10" style="color: #444549;font-size: 14px;font-weight: 400;">
                                                                1:
                                                                Jawablah soal dibawah ini dengan benar. </a>

                                                            <div class="lesson_duration">
                                                                <i class="far fa-question-circle"></i> Quiz
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Lesson Content ends from here -->
                            </div>

                            <!-- ZOOM LIVE CLASS TAB STARTS-->
                            <!-- ZOOM LIVE CLASS TAB ENDS-->

                            <div class="tab-pane fade" id="certificate" role="tabpanel" aria-labelledby="certificate-tab" style="text-align: center;">

                                <div class="circular-progressdiv" id="course_progress_area" data-percent="50">
                                    <svg class="circular-progress" viewport="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg" style="height: 180; width: 180;">
                                        <circle r="80" cx="89" cy="89" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
                                        <circle class="bar" r="80" cx="89" cy="89" fill="transparent" stroke-dasharray="502.4" stroke-dashoffset="0"></circle>
                                    </svg>
                                </div>

                                <div class="alert alert-info" id="certificate-alert-warning" role="alert">
                                    <h4 class="alert-heading">Notice</h4>
                                    <hr>
                                    <p> You have completed <span id="progression"></span>% Of the course </p>
                                    <p>You can download the course completion certificate after completing the course</p>
                                </div>

                                <div class="alert alert-success" id="certificate-alert-success" role="alert">
                                    <h4 class="alert-heading">Well done</h4>
                                    <hr>
                                    <p>Congratulations!!!</p>
                                    <p>You are now eligible to download the course completion certificate.</p>
                                </div>

                                <div id="download_certificate_area" style="padding: 15px;">
                                    <a href="#" target="" class="btn btn-primary">Install certificate addon first</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    checkCertificateEligibility();
                });

                function toggleAccordionIcon(elem, section_id) {
                    var accordion_section_ids = [];
                    $(".accordion_icon").each(function() {
                        accordion_section_ids.push(this.id);
                    });
                    accordion_section_ids.forEach(function(item) {
                        if (item === 'accordion_icon_' + section_id) {
                            if ($('#' + item).html().trim() === '<i class="fa fa-plus"></i>') {
                                $('#' + item).html('<i class="fa fa-minus"></i>')
                            } else {
                                $('#' + item).html('<i class="fa fa-plus"></i>')
                            }
                        } else {
                            $('#' + item).html('<i class="fa fa-plus"></i>')
                        }
                    });
                }

                function checkCertificateEligibility() {
                    $('#lesson_list_area').hide();
                    $('#lesson_list_loader').show();
                    $.ajax({
                        url: 'http://localhost/academy/addons/certificate/check_certificate_eligibility/1',
                        success: function(response) {
                            if (parseInt(response) === 1) {
                                $('#download_certificate_area').show();
                                $('#certificate-alert-success').show();
                                $('#certificate-alert-warning').hide();

                            }
                            checkCourseProgression();
                            getCertificateShareableUrl();

                            $('#lesson_list_area').show();
                            $('#lesson_list_loader').hide();
                        }
                    });
                }

                function checkCourseProgression() {
                    $.ajax({
                        url: 'http://localhost/academy/home/check_course_progress/1',
                        success: function(response) {
                            if (parseInt(response) === 100) {
                                $('#download_certificate_area').show();
                                $('#certificate-alert-success').show();
                                $('#certificate-alert-warning').hide();
                            } else {
                                $('#download_certificate_area').hide();
                                $('#certificate-alert-success').hide();
                                $('#certificate-alert-warning').show();
                            }
                            $('#progression').text(Math.round(response));
                            $('#course_progress_area').attr('data-percent', Math.round(response));
                            initProgressBar(Math.round(response));
                        }
                    });
                }

                function initProgressBar(dataPercent) {
                    console.log("Data Percent" + dataPercent);
                    var totalProgress, progress;
                    const circles = document.querySelectorAll('.circular-progress');
                    for (var i = 0; i < circles.length; i++) {
                        totalProgress = circles[i].querySelector('circle').getAttribute('stroke-dasharray');
                        //progress = circles[i].parentElement.getAttribute('data-percent');
                        progress = dataPercent;

                        circles[i].querySelector('.bar').style['stroke-dashoffset'] = totalProgress * progress / 100;
                    }
                }

                function getCertificateShareableUrl() {
                    var user_id = '2';
                    var course_id = '1';
                    $.ajax({
                        url: 'http://localhost/academy/addons/certificate/get_certificate_url',
                        type: 'POST',
                        data: {
                            user_id: user_id,
                            course_id: course_id
                        },
                        success: function(response) {
                            $('#certificate_download_btn').attr('href', response);
                        }
                    });
                }

                function sendCourseCompletionMail() {
                    var user_id = '2';
                    var course_id = '1';
                    $.ajax({
                        url: 'http://localhost/academy/addons/certificate/send_course_completion_mail',
                        type: 'POST',
                        data: {
                            user_id: user_id,
                            course_id: course_id
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
                }
            </script>
            <!-- Course sections and lesson selector sidebar ends-->
        </div>
    </div>
    <script src="http://localhost/academy/assets/frontend/default/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/popper.min.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/bootstrap.min.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/slick.min.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/select2.min.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/tinymce.min.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/multi-step-modal.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/jquery.webui-popover.min.js"></script>
    <script src="https://content.jwplatform.com/libraries/O7BMTay5.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/main.js"></script>
    <script src="http://localhost/academy/assets/global/toastr/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/bootstrap-tagsinput.min.js"></script>
    <script src="http://localhost/academy/assets/frontend/default/js/custom.js"></script>
    <script src="http://localhost/academy/assets/lessons/js/custom.js"></script>
    <script>
        function toggle_lesson_view() {
            $('#lesson-container').toggleClass('justify-content-center');
            $("#video_player_area").toggleClass("order-md-1");
            $("#lesson_list_area").toggleClass("col-lg-5 order-md-1");
        }
    </script>
    <script type="text/javascript">
        //saving the current progress and starting from the saved progress
        var newProgress;
        var savedProgress;
        var currentProgress = '1';
        var lessonType = 'video';
        var videoProvider = '';

        function markThisLessonAsCompleted(lesson_id) {
            $('#lesson_list_area').hide();
            $('#lesson_list_loader').show();
            var progress;
            if ($('input#' + lesson_id).is(':checked')) {
                progress = 1;
            } else {
                progress = 0;
            }
            $.ajax({
                type: 'POST',
                url: 'http://localhost/academy/user/save_course_progress',
                data: {
                    lesson_id: lesson_id,
                    progress: progress
                },
                success: function(response) {
                    currentProgress = response;
                    $('#lesson_list_area').show();
                    $('#lesson_list_loader').hide();
                }
            });
        }


        var timer = setInterval(function() {
            console.log('Current Progress is ' + currentProgress);
            if (lessonType == 'video' && videoProvider == 'html5' && currentProgress != 1) {
                getCurrentTime();
            }
        }, 1000);

        $(document).ready(function() {
            if (lessonType == 'video' && videoProvider == 'html5') {
                var totalDuration = document.querySelector('#player').duration;

                if (currentProgress == 1 || currentProgress == totalDuration) {
                    document.querySelector('#player').currentTime = 0;
                } else {
                    document.querySelector('#player').currentTime = currentProgress;
                }
            }
        });
        var counter = 0;
        player.on('canplay', event => {
            if (counter == 0) {
                if (currentProgress == 1) {
                    document.querySelector('#player').currentTime = 0;
                } else {
                    document.querySelector('#player').currentTime = currentProgress;
                }
            }
            counter++;
        });

        function getCurrentTime() {
            var lesson_id = '15';
            newProgress = document.querySelector('#player').currentTime;
            var totalDuration = document.querySelector('#player').duration;

            console.log('Current Progress is ' + currentProgress);
            console.log('New Progress is ' + newProgress);

            if (newProgress != savedProgress && newProgress > 0 && currentProgress != 1) {

                // if the user watches the entire video the lesson will be marked as seen automatically.
                if (totalDuration == newProgress) {
                    newProgress = 1;
                    $('input#' + lesson_id).prop('checked', true);
                }

                // update the video prgress here.
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/academy/user/save_course_progress',
                    data: {
                        lesson_id: lesson_id,
                        progress: newProgress
                    },
                    success: function(response) {
                        savedProgress = response;
                    }
                });
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="http://localhost/academy/assets/frontend/eu-cookie/purecookie.css" async />

    <div class="cookieConsentContainer" id="cookieConsentContainer" style="opacity: .9; display: block; display: none;">
        <!-- <div class="cookieTitle">
    <a>Cookies.</a>
  </div> -->
        <div class="cookieDesc">
            <p>
                This website uses cookies to personalize content and analyse traffic in order to offer you a better experience. <a class="link-cookie-policy" href="http://localhost/academy/home/cookie_policy">Cookie policy</a>
            </p>
        </div>
        <div class="cookieButton">
            <a onclick="cookieAccept();">Setuju</a>
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
                localStorage.setItem("accept_cookie_time", "05/24/2021");
                $('#cookieConsentContainer').fadeOut(1200);
            }
        }
    </script>
</body>

</html>