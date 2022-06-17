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
