  <!-- ======= Hero Section ======= -->
  <section id="hero" class="slider-image">

    <div class="" >
      <div class="row">
        
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner" style="margin-top:60px;width:100%;height: 620px;" > 
          <div class="carousel-item active" >
            <img src="assets/guest/default/img/news/1.jpeg" alt="" class="d-block img-fluid">
          </div>
          <div class="carousel-item">
            <img src="assets/guest/default/img/news/2.jpeg" alt="" class="d-block img-fluid">
          </div>
          <div class="carousel-item">
            <img src="assets/guest/default/img/news/3.jpeg" alt="" class="d-block img-fluid">
          </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
        </div>
        <!-- <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="<?php echo base_url() . 'assets/guest/default/img/al-falah/'.get_settings('logo'); ?>" width="400" class="img-fluid animated" alt="">
        </div>  -->
        
      </div>

    </div>
      
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section>
    <!-- End Cliens Section -->

    <!-- ======= AL-FALAH NEWS Section ======= -->
    <section id="news" class="services section-bg course-carousel-area">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>AL-FALAH NEWS</h2>
        </div>

        <div class="row course-carousel">
          <?php
					  foreach ($get_data->result() as $R1) :
					?>
          <div class=" col-lg-4 d-flex align-items-stretch " data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box rounded flex-fill" style="margin-top:20px">
            <img src="<?php echo base_url() . 'assets/guest/default/img/news/'.$R1->image; ?>" class="img-fluid" alt="">
              <?php
                # encrypt ID # -------------------------------------------------------------------
                $encrypt_id						= $this->encrypt->encode($R1->id);
                $id									  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypt_id);
              ?>
              <h4 class="title"><a href="<?php echo base_url() . 'guest/news/view_detail/' . $id?>"><?php echo $R1->judul ?></a></h4>
              <div class="module line-clamp">
                <text style="margin-horizontal:10px"><?php echo $R1->isi ?></text>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
        <div class="col-12 text-center mt-5">
						<a  href="<?php echo site_url('guest/news') ?>" class="btn btn-outline-info">Tampilkan Lebih <i class="bi bi-arrow-right-circle ms-2 align-middle"></i></a>
					</div>
        <!-- <a href="portfolio-details.html" style="align-self:flex-end" title="Lihat Lebih">Lihat Lebih >> </a> -->

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="about" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">
      <?php
        $profile = $get_profile->row()
      ?>
      <div class="section-title">
          <h2>PROFIL</h2>
        </div>

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3><?php echo $profile->title_sejarah_singkat; ?> <strong></strong></h3>
              <p>
              <?php echo $profile->sejarah_singkat; ?>
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <?php 
                  $i = 0;
                  foreach ($get_profile_pendidikan->result() as $pendidikan) : 
                    $i += 1;
                    if ($i == 1){
                      $actived = 'show';
                    }else{
                      $actived = '';
                    }
                ?>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-<?php echo $i; ?>"><span><?php echo $i; ?></span> <?php echo $pendidikan->nama_kategori_pendidikan; ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-<?php echo $i; ?>" class="collapse <?php echo $actived; ?> " data-bs-parent=".accordion-list">

                    <?php 
                      unset($datato);
                      $datato['table'] 			= 'gurumaya.pendidikan';
                      $datato['where']			= array(
                        'gurumaya.pendidikan.id_pendidikan' => $pendidikan->id_pendidikan
                      );
                  
                      $dataSubPendidikan = $this->crud->view_data($datato);
                      // $dataSubPendidikan = $this->guest_model->view_pendidikan($pendidikan->id_pendidikan);
                      // var_dump($dataSubPendidikan);
                      foreach ($dataSubPendidikan->result() as $subpendidikan) :

                    ?>

                    <p>
                    <?php echo $subpendidikan->nama_pendidikan; ?>
                    </p>

                    <?php endforeach; ?>

                  </div>
                </li> 

                <?php endforeach; ?>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("<?php echo base_url() . 'assets/guest/default/img/profile/'.$profile->foto_1; ?>");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="<?php echo base_url() . 'assets/guest/default/img/profile/'.$profile->foto_2; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Visi dan Misi</h3>
            <p class="fst-italic">
              <?php echo $profile->visi; ?><br>
              1. Menumbuhkan kesadaran dan melaksanakan ajaran agama dalam kehidupan sehari-hari.<br>
              2. Menyelenggarakan proses pembelajaran dan bimbingan secara efektif, inovatif dan produktif.<br>
              3. Meningkatkan potensi santri dalam berkarya secara optimal sehingga menjadi pribadi yang mandiri.<br>
              4. Menumbuhkan jiwa yang berakhlaqul karimah.
              <!-- <?php echo $profile->misi; ?> -->
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <h2 style="color:#1bb3eb;text-align:center"><?php echo $profile->jumlah_santri_pria ?></h2>
              <p>JUMLAH SANTRI PRIA</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <h2 style="color:#49ce9e;text-align:center"><?php echo $profile->jumlah_santri_wanita ?></h2>
              <p>JUMLAH SANTRI WANITA</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <h2 style="color:#fdca5b;text-align:center"><?php echo $profile->jumlah_ustd ?></h2>
              <p>JUMLAH USTADZ</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <h2 style="color:#a580fd;text-align:center"><?php echo $profile->jumlah_ustadzah ?></h2>
              <p>JUMLAH USTADZAH</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="gallery" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>GALERI</h2>
          <p>Dokumentasi yang di buat oleh pihak al-falah bayanan</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".kegiatan">Kegiatan</li>
          <li data-filter=".fasilitas">Fasilitas</li>
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php 
            foreach ($get_galery->result() as $R3) :

              if ($R3->file == 'image'){
          ?>

          <div class="col-lg-4 col-md-6 portfolio-item <?php echo $R3->category_name ?>">
            <div class="portfolio-img"><img src="<?php echo base_url() . 'assets/guest/default/gallery/'.$R3->image_video; ?>" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4><?php echo $R3->title; ?></h4>
              <p><?php echo $R3->description; ?></p>
              <a href="<?php echo base_url() . 'assets/guest/default/gallery/'.$R3->image_video; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?php echo $R3->title; ?>"><i class="bx bx-plus"></i></a>
              <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
            </div>
          </div>

          <?php
              }else{
          ?>

          <div class="col-lg-4 col-md-6 portfolio-item <?php echo $R3->category_name ?>">
            <div class="portfolio-img">
            <video class="img-fluid" controls>
              <source src="<?php echo base_url() . 'assets/guest/default/gallery/'.$R3->image_video; ?>" type="video/mp4">
            </video>
            </div>
            <!-- <div class="portfolio-info">
              <h4><?php echo $R3->title; ?></h4>
              <p><?php echo $R3->description; ?></p>
              <a href="<?php echo base_url() . 'assets/guest/default/gallery/'.$R3->image_video; ?>' ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?php echo $R3->title; ?>"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div> -->
          </div>

          <?php
          }
          endforeach;
          ?>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="pengurus" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pengurus</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <?php
					  foreach ($get_pengurus->result() as $pengurus) :
					?>

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?php echo base_url() . 'assets/guest/default/img/pengurus/'.$pengurus->foto; ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $pengurus->nama_pengurus; ?></h4>
                <span><?php echo $pengurus->bidang_pengurus; ?></span>
                <p><?php echo $pengurus->kutipan_pengurus; ?></p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <?php
            endforeach;
          ?>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= pendaftaran Section ======= -->
    <section id="pendaftaran" class="pendaftaran">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pendaftaran</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Brosur</h3>
              <img src="<?php echo base_url() . 'assets/guest/default/img/al-falah/brosur.jpeg'; ?>" width="" class="img-fluid animated" alt="">
              <div class="portfolio-info">
              <a href="<?php echo base_url() . 'assets/guest/default/img/al-falah/brosur.jpeg'; ?>" data-gallery="" class="portfolio-lightbox preview-link" title="<?php echo $R3->title; ?>"><i class="bx bxs-right-arrow-circle bx-fade-right">Lihat Tampilan Besar</i></a>
              <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
            </div><br><br>
              <a download="brosur.jpg" href="<?php echo base_url() . 'assets/guest/default/img/al-falah/brosur.jpeg'; ?>" class="buy-btn">Download Brosur </a>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Biaya Administrasi</h3>
              <h4><sup>Rp</sup>1.725.000<span>pendaftaran</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> Pendaftaran / Uang Gedung                 Rp.500.000</li>
                <li><i class="bx bx-check"></i> Uang Syariah / Bulanan (khidmad Dua Kali) Rp.325.000</li>
                <li><i class="bx bx-check"></i> Uang Seragam Tahfidz dan Boxing           Rp.200.000</li>
                <li><i class="bx bx-check"></i> Seragam Putri                             Rp.200.000</li>
                <li><i class="bx bx-check"></i> Buku Pelajaran (Kitab)                    Rp.100.000</li>
                <li></i> # NB : </li>
                <li><i class="bx bx-check"></i> Daftar Ulang Santri Lama                  Rp.300.000</li>
                <li><i class="bx bx-check"></i> Uang Infaq Santri base_url                Rp.100.000</li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <h3>Syarat Pendafataran</h3>
              <ul>
                <li><i class="bx bx-check"></i> Mengisi Formulir Pendaftaran</li>
                <li><i class="bx bx-check"></i> Membawa SKHU Asli</li>
                <li><i class="bx bx-check"></i> Membawa Foto 3 X 4 (2 Lembar)</li>
                <li><i class="bx bx-check"></i> Membawa Foto Copy Akta Kelahiran</li>
                <li><i class="bx bx-check"></i> Membawa Foto Copy KK</li>
                <li><i class="bx bx-check"></i> Membawa Foto Copy Ijazah</li>
                <li><i class="bx bx-check"></i> Membayar Maslahat/Uang Gedung</li>
              </ul>
              <h3>Waktu Pendafataran</h3><br>
              <p>Mulai Mei 2022 Di kantor Pon - Pes Al Falah. Bila ada yang belum jelas bisa di tanyakan langsung ke kantor Pon-Pes Al Falah Bayanan atau Kontak di bawah</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End pendaftaran Section -->

    <!-- ======= Langkah Pendafataran Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Langkah Pendaftaran</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

        <?php
					  foreach ($get_data_langkah_pendaftaran->result() as $R2) :
				?>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxs-right-arrow-circle bx-fade-right"></i></div>
              <h4><?php echo $R2->title ?></h4>
              <p><?php echo $R2->subTitle ?></p>
            </div>
          </div>

          <?php endforeach; ?>

        </div>

      </div>
    </section><!-- End Langkah Pendaftaran Section -->

    

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row align-items-center">

          <div class="col-lg-12 d-flex ">
            <div class="info ">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi:</h4>
                <p><?php echo get_settings('address'); ?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo get_settings('system_email'); ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telephone:</h4>
                <p><?php echo get_settings('phone'); ?></p>
              </div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.22625704587483!2d111.12170017995778!3d-7.5071214032798235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79f6738ba8d059%3A0x1210604e4c5cc87c!2sAl-Falah!5e0!3m2!1sen!2sid!4v1655391145382!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen></iframe>
            </div>

          </div>

          <!-- <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div> -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
