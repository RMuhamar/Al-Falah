<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?></h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">

				<h4 class="header-title mb-3">
					<?php echo $page_title; ?>
				</h4>

				<div class="col-lg-12">
					<form class="required-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for=""></label>
							<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
						</div>

						<div class="form-group">
                            <label for="system_name">Nama Website<span class="required">*</span></label>
                            <input type="text" name = "system_name" id = "system_name" class="form-control" value="<?php echo get_settings('system_name');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="system_title">Judul Website<span class="required">*</span></label>
                            <input type="text" name = "system_title" id = "system_title" class="form-control" value="<?php echo get_settings('system_title');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="website_keywords">Keyword Website</label>
                            <input type="text" class="form-control bootstrap-tag-input" id = "website_keywords" name="website_keywords" data-role="tagsinput" style="width: 100%;" value="<?php echo get_settings('website_keywords');  ?>"/>
                        </div>

                        <div class="form-group">
                            <label for="website_description">Deskripsi Website</label>
                            <textarea name="website_description" id = "website_description" class="form-control" rows="5"><?php echo get_settings('website_description');  ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name = "author" id = "author" class="form-control" value="<?php echo get_settings('author');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="slogan">Slogan<span class="required">*</span></label>
                            <input type="text" name = "slogan" id = "slogan" class="form-control" value="<?php echo get_settings('slogan');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="system_email">Email<span class="required">*</span></label>
                            <input type="text" name = "system_email" id = "system_email" class="form-control" value="<?php echo get_settings('system_email');  ?>" >
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" id = "address" class="form-control" rows="5"><?php echo get_settings('address');  ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone">Telpon</label>
                            <input type="text" name = "phone" id = "phone" class="form-control" value="<?php echo get_settings('phone');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="youtube_api_key">Youtube API Key &nbsp; <a href = "https://developers.google.com/youtube/v3/getting-started" target = "_blank" style="color: #a7a4a4">(Youtube API Key)</a></label>
                            <input type="text" name = "youtube_api_key" id = "youtube_api_key" class="form-control" value="<?php echo get_settings('youtube_api_key');  ?>" >
                        </div>

                        <div class="form-group">
                            <label for="footer_text">Catatan Footer</label>
                            <input type="text" name = "footer_text" id = "footer_text" class="form-control" value="<?php echo get_settings('footer_text');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="footer_link">Link Footer</label>
                            <input type="text" name = "footer_link" id = "footer_link" class="form-control" value="<?php echo get_settings('footer_link');  ?>">
                        </div>

						<button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
					</form>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>
