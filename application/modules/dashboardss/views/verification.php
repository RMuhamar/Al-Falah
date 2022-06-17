<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('guest/home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo $page_title;; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                    <?php echo $page_title; ?>
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="category-course-list-area">
    <div class="container">
        <div class="row">
            <div class="col" style="padding: 35px;">
                <p></p>
                <p></p>				
                <br>				
				<?php if ($user_active == 'success') : ?>
				<h2 class="text-success"><span xss="removed">Verifikasi Sukses</span></h2>
                <p>Email berhasil diverifikasi, Anda sudah dapat melakukan login.</p>
				<?php elseif  ($user_active == 'not_success') : ?>
				<h2 class="text-success"><span xss="removed"></span></h2>
                <p>Email telah diverifikasi sebelumnya oleh Anda.</p>                
				<?php endif; ?>				
            </div>
        </div>
    </div>
</section>