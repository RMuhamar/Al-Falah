

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="<?php echo site_url('guest/home') ?>">Home</a></li>
      <li><?php echo $page_title ?></li>
    </ol>
    <h2><?php echo $page_title ?></h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details ">
  <div class="container">

    <div class="row course-carousel">
        <?php
			foreach ($get_data->result() as $R1) :
		?>
        <div class=" col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box rounded">
                <img src="<?php echo base_url() . 'assets/guest/default/img/news/'.$R1->image; ?>" class="img-fluid" alt="">
                  <?php
                    # encrypt ID # -------------------------------------------------------------------
                    $encrypt_id							= $this->encrypt->encode($R1->id);
                    $id									= str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypt_id);
                  ?>
                <h4 class="title"><a href="<?php echo base_url() . 'guest/news/view_detail/' . $id?>"><?php echo $R1->judul ?></a></h4>
                <div class="module line-clamp">
                    <text class=""><?php echo $R1->isi ?></text>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

     </div>

  </div>
</section><!-- End Portfolio Details Section -->

