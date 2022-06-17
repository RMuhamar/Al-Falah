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