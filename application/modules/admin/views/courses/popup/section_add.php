<form action="<?php echo site_url('admin/courses/save_section'); ?>" method="post">
    <div class="form-group">
		<input class="form-control" type="text" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
        <input class="form-control" type="text" name="id" id="id" value="<?php echo $id; ?>">
		<input class="form-control" type="text" id="type_form" name="type_form" value="<?php echo $type_form; ?>">
        <input class="form-control" type="text" id="section_id" name="section_id" value="<?php echo $section_id; ?>">
	</div>
	<div class="form-group">
        <label for="title">Judul</label>
        <input class="form-control" type="text" name="section_title" id="section_title" value="<?php echo $section_title; ?>" required>
        <small class="text-muted">Berikan nama bagian</small>
    </div>
    <div class="text-right">
        <button class = "btn btn-success" type="submit" name="button">Simpan</button>
    </div>
</form>
