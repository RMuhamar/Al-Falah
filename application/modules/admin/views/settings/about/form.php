<?php
  $curl_enabled = function_exists('curl_version');
?>
<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?></h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
      <div class="card cta-box">
        <div class="card-body">
			<div class="text-center">
				<img class="" src="<?php echo base_url('assets/backend/images/report.svg'); ?>" width="220" alt="Image">
			</div><br>
			<div class="text-center">
				<img class="" src="<?php echo base_url('assets/guest/default/img/logo.png'); ?>" width="220" alt="Logo Gurumaya">
			</div><br>

          <div class="media align-items-center">
			<div class="media-body row justify-content-md-center">
			<div class="col col-lg-6">
              <div class="chart-widget-list">
                <p>
                  <i class="mdi mdi-square"></i> Web Versi
                  <span class="float-right"><?php echo get_settings('version_web'); ?></span>
                </p>
				<p>
                  <i class="mdi mdi-square"></i> Mobile Android Versi
                  <span class="float-right"><?php echo get_settings('version_apk'); ?></span>
                </p>
				<p>
                  <i class="mdi mdi-square"></i> Mobile iOS Versi
                  <span class="float-right"><?php echo get_settings('version_ios'); ?></span>
                </p>
                <p>
                  <i class="mdi mdi-square"></i> PHP Versi
                  <span class="float-right"><?php echo phpversion(); ?></span>
                </p>
                <p class="mb-0">
                  <i class="mdi mdi-square"></i> Curl Enable
                  <span class="float-right">
                    <?php echo $curl_enabled ? '<span class="badge badge-success-lighten">Enabled</span>' : '<span class="badge badge-danger-lighten">Disabled</span>'; ?>
                  </span>
                </p>
              </div>
			  </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>



