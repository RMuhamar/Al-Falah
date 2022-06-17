<?php
// $decrypt_id	= str_replace(array('-', '_', '~'), array('+', '/', '='), $_GET['id']);
// $course_id	= $this->encrypt->decode($decrypt_id);

// $sections 	= $this->admin_model->get_section('course', $course_id)->result_array();
?>
<div class="row justify-content-center">
    <div class="col-xl-12 mb-4 text-center mt-3">
        <a href="javascript::void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showAjaxModal('<?php echo site_url('admin/courses/popup/section_add/'.$_GET['id']); ?>', 'Tambah Bagian')"><i class="mdi mdi-plus"></i> Tambah Bagian</a>
        <a href="javascript::void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showAjaxModal('<?php echo site_url('admin/courses/popup/section_add/'.$_GET['id']); ?>', 'Tambah Bagian')"><i class="mdi mdi-plus"></i> Tambah Bagian</a>
        <a href="javascript::void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showAjaxModal('<?php echo site_url('modal/popup/lesson_types/'.$_GET['id']); ?>', 'Tambah Pelajaran')"><i class="mdi mdi-plus"></i> Tambah Pelajaran</a>
        <?php # if (count($sections) > 0): ?>
            <a href="javascript::void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showAjaxModal('<?php echo site_url('modal/popup/quiz_add/'.$_GET['id']); ?>', 'Tambah Quiz')"><i class="mdi mdi-plus"></i>Tambah Quiz</a>
            <a href="javascript::void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showLargeModal('<?php echo site_url('modal/popup/sort_section/'.$_GET['id']); ?>', 'Urutkan Bagian')"><i class="mdi mdi-sort-variant"></i> Urutkan Bagian</a>
        <?php # endif; ?>
    </div>

    
</div>



<div class="col-xl-12">
	<div class="row">
	
	<?php 
	$i = 1;
	foreach($data_section->result() as $section) 
	{ ?>
		<div class="col-xl-12">
			<div class="card bg-light text-seconday on-hover-action mb-5" id = "section-<?php echo $section->section_id; ?>">
				<div class="card-body">
					<h5 class="card-title" class="mb-3" style="min-height: 45px;"><span class="font-weight-light">Bagian <?php echo $i; ?></span>: <?php echo $section->section_title; ?>
						<div class="row justify-content-center alignToTitle float-right display-none" id = "widgets-of-section-<?php echo $section->section_id; ?>">
							<button type="button" class="btn btn-outline-secondary btn-rounded btn-sm" name="button" onclick="showLargeModal('<?php '#'; ?>', 'Sort')" ><i class="mdi mdi-sort-variant"></i>Sort</button>
							<button type="button" class="btn btn-outline-secondary btn-rounded btn-sm ml-1" name="button" onclick="showAjaxModal('<?php echo '#'; ?>', 'Update Bagian')" ><i class="mdi mdi-pencil-outline"></i> Edit Bagian</button>
							<button type="button" class="btn btn-outline-secondary btn-rounded btn-sm ml-1" name="button" onclick="confirm_modal('<?php echo '#'; ?>');"><i class="mdi mdi-window-close"></i> Hapus Bagian</button>
						</div>
					</h5>
					<div class="clearfix"></div>
					
					
					
					
				</div> <!-- end card-body-->
			</div> <!-- end card-->
		</div>
	<?php
	$i++;	
	} ?>
	
	</div>
</div>