<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

    <ol>
        <li><a href="index.html">Home</a></li>
        <li>News / News Details</li>
    </ol>
    <h2>News Details</h2>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

    <div class="row gy-4">

        <div class="col-lg-8">
        <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
            <?php $row = $get_data->row(); ?>
            <div class="swiper-slide">
                <img src="<?php echo base_url() . 'assets/guest/default/img/news/'.$row->image; ?>" alt="">
            </div>
<!-- 
            <div class="swiper-slide">
                <img src="assets/img/portfolio/portfolio-2.jpg" alt="">
            </div>

            <div class="swiper-slide">
                <img src="assets/img/portfolio/portfolio-3.jpg" alt="">
            </div> -->

            </div>
            <div class="swiper-pagination"></div>
        </div>
        </div>

        <div class="col-lg-4">
            <div class="portfolio-info">
                <h3>Project information</h3>
                <ul>
                <li><strong>Category</strong>: Web design</li>
                <li><strong>Client</strong>: ASU Company</li>
                <li><strong>tanggal publish</strong>: <?php echo $row->date_input ?></li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="portfolio-description">
                <h2><?php echo $row->judul ?></h2>
                <p>
                <?php echo $row->isi ?>
                </p>
            </div>
        </div>

    </div>

    </div>
</section><!-- End Portfolio Details Section -->

  