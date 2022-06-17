<!DOCTYPE html>
<html>

<head>
    <title>Gurumaya | <?php echo $page_title; ?></title>
    <!-- all the meta tags -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- all the css files -->
    <link rel="shortcut icon" href="<?php echo base_url() . 'uploads/system/favicon.png'; ?>">
    <!-- third party css -->
    <link href="<?php echo base_url() . 'assets/backend/css/vendor/jquery-jvectormap-1.2.2.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/vendor/dataTables.bootstrap4.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/vendor/responsive.bootstrap4.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/vendor/buttons.bootstrap4.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/vendor/select.bootstrap4.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/vendor/summernote-bs4.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/vendor/fullcalendar.min.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/vendor/datepicker3.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/vendor/dropzone.css'; ?>" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
    <!-- App css -->
    <link href="<?php echo base_url() . 'assets/backend/css/app.min.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/icons.min.css'; ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() . 'assets/backend/css/main.css'; ?>" rel="stylesheet" type="text/css" />

    <!-- font awesome 5 -->
    <link href="<?php echo base_url() . 'assets/backend/css/fontawesome-all.min.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'assets/backend/css/font-awesome-icon-picker/fontawesome-iconpicker.min.css'; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="<?php echo base_url() . 'assets/backend/js/jquery-3.3.1.min.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/onDomChange.js'; ?>"></script>

    <script src="<?php echo base_url() . 'assets/backend/js/vendor/bootstrap-datepicker.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/bootstrap-datepicker.id.min'; ?>"></script>
</head>

<body data-layout="detached">
    <!-- HEADER -->
    <!-- Topbar Start -->
    <div class="navbar-custom topnav-navbar topnav-navbar-dark">
        <div class="container-fluid">

            <!-- LOGO -->
            <a href="<?php echo site_url('admin/home'); ?>" class="topnav-logo" style="min-width: unset;">
                <span class="topnav-logo-lg">
                    <img src="<?php echo base_url() . 'assets/guest/default/img/logo-wh.png'; ?>" alt="" height="40">
                </span>
                <span class="topnav-logo-sm">
                    <img src="<?php echo base_url() . 'assets/guest/default/img/logo-wh.png'; ?>" alt="" height="40">
                </span>
            </a>

            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="<?php echo site_url('uploads/user_image/1.jpg'); ?>" alt="user-image" class="rounded-circle">
                        </span>
                        <span style="color: #fff;">
                            <span class="account-user-name">Admin</span>
                            <span class="account-position">Admin</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                        <!-- item-->
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- Account -->
                        <a href="<?php echo site_url('admin/manage_profile'); ?>" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle mr-1"></i>
                            <span>My account</span>
                        </a>

                        <!-- settings-->
                        <a href="<?php echo site_url('admin/system_settings'); ?>" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings mr-1"></i>
                            <span>Settings</span>
                        </a>



                        <!-- Logout-->
                        <a href="<?php echo site_url('admin/logout'); ?>" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout mr-1"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>
            <a class="button-menu-mobile disable-btn">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
            <div class="visit_website">
                <h4 style="color: #fff; float: left;">&nbsp;</h4>
                <a href="<?php echo site_url('guest/home'); ?>" target="" class="btn btn-outline-light ml-3">Visit website</a>
            </div>
        </div>
    </div>
    <!-- end Topbar -->
    <div class="container-fluid">
        <div class="wrapper">
            <!-- BEGIN CONTENT -->
            <!-- SIDEBAR -->
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu left-side-menu-detached">
                <div class="leftbar-user">
                    <a href="javascript: void(0);">
                        <img src="<?php echo site_url('uploads/user_image/1.jpg'); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
                        <span class="leftbar-user-name">Admin</span>
                    </a>
                </div>

                <!--- Sidemenu -->
                <ul class="metismenu side-nav side-nav-light">

                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item active">
                        <a href="<?php echo site_url('admin/home'); ?>" class="side-nav-link">
                            <i class="dripicons-view-apps"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo site_url('admin/courses'); ?>" class="side-nav-link ">
                            <i class="dripicons-archive"></i>
                            <span>Kursus</span>
                        </a>
                    </li>


                    <li class="side-nav-item">
                        <a href="<?php echo site_url('admin/users/user'); ?>" class="side-nav-link ">
                            <i class="dripicons-user-group"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
					
					 <li class="side-nav-item">
                        <a href="<?php echo site_url('admin/mitra'); ?>" class="side-nav-link ">
                            <i class="dripicons-network-1"></i>
                            <span>Mitra</span>
                        </a>
                    </li>

			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/artikel'); ?>" class="side-nav-link ">
				<i class="dripicons-article"></i>
				<span>Artikel</span>
				</a>
			</li>

                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link ">
                            <i class="dripicons-network-3"></i>
                            <span> Master Data </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li class="">
                                <a href="<?php echo site_url('admin/master_data/company'); ?>">Data Perusahaan</a>
                            </li>

                            <li class="">
                                <a href="<?php echo site_url('admin/master_data/level_1'); ?>">Level 1</a>
                            </li>

                            <li class="">
                                <a href="<?php echo site_url('admin/master_data/level_2'); ?>">Level 2</a>
                            </li>
                            <li class="">
                                <hr>
                            </li>
                            <li class="">
                                <a href="<?php echo site_url('admin/master_data/course_type'); ?>">Tipe Kursus</a>
                            </li>
                            <li class="">
                                <a href="<?php echo site_url('admin/master_data/category'); ?>">Kategori Kursus</a>
                            </li>
                        </ul>
                    </li>

                    <li class="side-nav-item">
                        <a href="javascript: void(0);" class="side-nav-link ">
                            <i class="dripicons-box"></i>
                            <span> Report </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li class=""> <a href="<?php echo site_url('admin/report/poin'); ?>">Poin</a> </li>
                            <li class=""> <a href="<?php echo site_url('admin/report/invoice'); ?>">Invoice</a> </li>
                            <li class=""> <a href="<?php echo site_url('admin/report/kursus'); ?>">Kursus</a> </li>
                            <li class=""> <a href="<?php echo site_url('admin/report/promo'); ?>">Promo</a> </li>
                            <li class=""> <a href="<?php echo site_url('admin/report/feedback'); ?>">Feedback</a> </li>

                        </ul>
                    </li>


                    <li class="side-nav-item">
                        <a href="<?php echo site_url('admin/message'); ?>" class="side-nav-link ">
                            <i class="dripicons-message"></i>
                            <span>Layanan Tiket</span>
                        </a>
                    </li>

                    <li class="side-nav-item  ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="dripicons-toggles"></i>
                            <span> Settings </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li class="">
                                <a href="<?php echo site_url('admin/settings/system'); ?>">System settings</a>
                            </li>
                            <li class="">
                                <a href="<?php echo site_url('admin/settings/payment'); ?>">Payment settings</a>
                            </li>
                            <li class="">
                                <a href="<?php echo site_url('admin/settings/smtp'); ?>">Smtp settings</a>
                            </li>
                            <li class="">
                                <a href="<?php echo site_url('admin/settings/about'); ?>">About</a>
                            </li>
                        </ul>
                    </li>

			  <!-- Role Access -->
			   <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link ">
                            <i class="dripicons-network-2"></i>
                            <span> Role Access </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li class="">
                                <a href="<?php echo site_url('admin/role_access/user_role'); ?>">User Role</a>
                            </li>

                            <li class="">
                                <a href="<?php echo site_url('admin/role_access/user_access'); ?>">User Access</a>
                            </li>

                            <li class="">
                                <a href="<?php echo site_url('admin/role_access/menu'); ?>">Menu</a>
                            </li>
                            
                        </ul>
                    </li>

					<li class="side-nav-item  ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="dripicons-user"></i>
                            <span> Akun Saya</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li class="">
                                <a href="<?php echo site_url('admin/my_account/profile'); ?>">Profile</a>
                            </li>
                            <li class="">
                                <a href="<?php echo site_url('admin/my_account/reset_password'); ?>">Ganti Password</a>
                            </li>
                            <li class="">
                                <a href="<?php echo site_url('admin/my_account/log_login'); ?>">Riwayat Login Website</a>
                            </li>
                            <li class="">
                                <a href="<?php echo site_url('admin/my_account/log_login_mobile'); ?>">Riwayat Login Mobile</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>


            <!-- PAGE CONTENT-->
            <div class="content-page">
                <div class="content">
                    <?php $this->load->view($content); ?>
                </div>
            </div>
            <!-- END CONTENT -->


        </div>
    </div>

    <!-- all the js files -->
    <!-- bundle -->
    <script src="<?php echo base_url() . 'assets/backend/js/app.min.js'; ?>"></script>
    <!-- third party js -->
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/Chart.bundle.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/jquery-jvectormap-1.2.2.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/jquery-jvectormap-world-mill-en.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/dataTables.bootstrap4.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/dataTables.responsive.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/responsive.bootstrap4.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/dataTables.buttons.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/buttons.bootstrap4.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/buttons.html5.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/buttons.flash.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/buttons.print.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/dataTables.keyTable.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/dataTables.select.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/summernote-bs4.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/fullcalendar.min.js'; ?>"></script>
   
    <script src="<?php echo base_url() . 'assets/backend/js/pages/demo.summernote.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/dropzone.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/pages/demo.dashboard.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/pages/datatable-initializer.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/font-awesome-icon-picker/fontawesome-iconpicker.min.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/bootstrap-tagsinput.min.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/bootstrap-tagsinput.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/dropzone.min.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/ui/component.fileupload.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo base_url() . 'assets/backend/js/pages/demo.form-wizard.js'; ?>"></script>
    <!-- dragula js-->
    <script src="<?php echo base_url() . 'assets/backend/js/vendor/dragula.min.js'; ?>"></script>
    <!-- component js -->
    <script src="<?php echo base_url() . 'assets/backend/js/ui/component.dragula.js'; ?>"></script>

    <script src="<?php echo base_url() . 'assets/backend/js/custom.js'; ?>"></script>

    <!-- Dashboard chart's data is coming from this file -->

    <script type="text/javascript">
        ! function(o) {
            "use strict";
            var t = function() {
                this.$body = o("body"), this.charts = []
            };
            t.prototype.respChart = function(r, a, n, e) {
                Chart.defaults.global.defaultFontColor = "#8391a2", Chart.defaults.scale.gridLines.color = "#8391a2";
                var i = r.get(0).getContext("2d"),
                    s = o(r).parent();
                return function() {
                    var t;
                    switch (r.attr("width", o(s).width()), a) {
                        case "Line":
                            t = new Chart(i, {
                                type: "line",
                                data: n,
                                options: e
                            });
                            break;
                        case "Doughnut":
                            t = new Chart(i, {
                                type: "doughnut",
                                data: n,
                                options: e
                            })
                    }
                    return t
                }()
            }, t.prototype.initCharts = function() {
                var t = [];
                if (0 < o("#task-area-chart").length) {
                    t.push(this.respChart(o("#task-area-chart"), "Line", {
                        labels: [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "September",
                            "October",
                            "November",
                            "December",
                        ],
                        datasets: [{
                            label: "This year",
                            backgroundColor: "rgba(114, 124, 245, 0.3)",
                            borderColor: "#727cf5",
                            data: [
                                "0",
                                "0",
                                "0",
                                "0",
                                "0",
                                "0",
                                "0",
                                "0",
                                "0",
                                "0",
                                "0",
                                "0",
                            ]
                        }]
                    }, {
                        maintainAspectRatio: !1,
                        legend: {
                            display: !1
                        },
                        tooltips: {
                            intersect: !1
                        },
                        hover: {
                            intersect: !0
                        },
                        plugins: {
                            filler: {
                                propagate: !1
                            }
                        },
                        scales: {
                            xAxes: [{
                                reverse: !0,
                                gridLines: {
                                    color: "rgba(0,0,0,0.05)"
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 10,
                                    display: !1
                                },
                                min: 10,
                                max: 100,
                                display: !0,
                                borderDash: [5, 5],
                                gridLines: {
                                    color: "rgba(0,0,0,0)",
                                    fontColor: "#fff"
                                }
                            }]
                        }
                    }))
                }
                if (0 < o("#project-status-chart").length) {
                    t.push(this.respChart(o("#project-status-chart"), "Doughnut", {
                        labels: ["Active course", "Pending course"],
                        datasets: [{
                            data: [2, 0],
                            backgroundColor: ["#0acf97", "#FFC107"],
                            borderColor: "transparent",
                            borderWidth: "2"
                        }]
                    }, {
                        maintainAspectRatio: !1,
                        cutoutPercentage: 80,
                        legend: {
                            display: !1
                        }
                    }))
                }
                return t
            }, t.prototype.init = function() {
                var r = this;
                Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif', r.charts = this.initCharts(), o(window).on("resize", function(t) {
                    o.each(r.charts, function(t, r) {
                        try {
                            r.destroy()
                        } catch (t) {}
                    }), r.charts = r.initCharts()
                })
            }, o.ChartJs = new t, o.ChartJs.Constructor = t
        }(window.jQuery),
        function(t) {
            "use strict";
            window.jQuery.ChartJs.init()
        }();
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                $('.icon-picker').iconpicker();
            });
        });
    </script>

    <!-- Toastr and alert notifications scripts -->
    <script type="text/javascript">
        function notify(message) {
            $.NotificationApp.send("Heads up!", message, "top-right", "rgba(0,0,0,0.2)", "info");
        }

        function success_notify(message) {
            $.NotificationApp.send("Congratulations!", message, "top-right", "rgba(0,0,0,0.2)", "success");
        }

        function error_notify(message) {
            $.NotificationApp.send("Oh Snap!", message, "top-right", "rgba(0,0,0,0.2)", "error");
        }

        function error_required_field() {
            $.NotificationApp.send("Oh Snap!", "please fill all the required fields", "top-right", "rgba(0,0,0,0.2)", "error");
        }
    </script>

    <?php if ($this->session->flashdata('info_message') != "") : ?>
        <script type="text/javascript">
            $.NotificationApp.send("Success!", '<?php echo $this->session->flashdata("info_message"); ?>', "top-right", "rgba(0,0,0,0.2)", "info");
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error_message') != "") : ?>
        <script type="text/javascript">
            $.NotificationApp.send("Oh Snap!", '<?php echo $this->session->flashdata("error_message"); ?>', "top-right", "rgba(0,0,0,0.2)", "error");
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('flash_message') != "") : ?>
        <script type="text/javascript">
            $.NotificationApp.send("Congratulations!", '<?php echo $this->session->flashdata("flash_message"); ?>', "top-right", "rgba(0,0,0,0.2)", "success");
        </script>
    <?php endif; ?>




    <script type="text/javascript">
        function showAjaxModal(url, header) {
            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#scrollable-modal .modal-body').html('<div style="text-align:center;"><img src="<?php echo base_url() . 'assets/global/bg-pattern-light.svg'; ?>" /></div>');
            jQuery('#scrollable-modal .modal-title').html('...');
            // LOADING THE AJAX MODAL
            jQuery('#scrollable-modal').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    jQuery('#scrollable-modal .modal-body').html(response);
                    jQuery('#scrollable-modal .modal-title').html(header);
                }
            });
        }

        function showLargeModal(url, header) {
            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#large-modal .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url() . 'assets/global/bg-pattern-light.svg'; ?>"" height = "50px" /></div>');
            jQuery('#large-modal .modal-title').html('...');
            // LOADING THE AJAX MODAL
            jQuery('#large-modal').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    jQuery('#large-modal .modal-body').html(response);
                    jQuery('#large-modal .modal-title').html(header);
                }
            });
        }
    </script>

    <!-- (Large Modal)-->
    <div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- Scrollable modal -->
    <div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ml-2 mr-2">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <script type="text/javascript">
        function confirm_modal(delete_url) {
            jQuery('#alert-modal').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('update_link').setAttribute('href', delete_url);
        }
    </script>

    <!-- Info Alert Modal -->
    <div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-information h1 text-info"></i>
                        <h4 class="mt-2">Heads up!</h4>
                        <p class="mt-3">Are you sure?</p>
                        <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                        <a href="#" id="update_link" class="btn btn-danger my-2">Continue</a>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript">
        function togglePriceFields(elem) {
            if ($("#" + elem).is(':checked')) {
                $('.paid-course-stuffs').slideUp();
            } else
                $('.paid-course-stuffs').slideDown();
        }
    </script>

    <script type="text/javascript">
        // Date Picker
        $('.date').datepicker({
            format: "yyyy-mm-dd",
            startDate: 0,
            startView: 2,
            maxViewMode: 2,
            todayBtn: "linked",
            language: "id",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

    </script>

</body>

</html>
