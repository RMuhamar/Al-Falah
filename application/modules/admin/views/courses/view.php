<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
					<a href="<?php echo site_url('admin/courses/export_excel'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-file"></i> Export </a> 

					<a href="<?php echo site_url('admin/courses/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i> Tambah </a>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col-sm-4 col-xl-4">
                        <a href="<?php echo site_url('admin/courses?status=0'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-document-new text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $total_course_draft; ?></span></h3>
                                    <p class="text-muted font-15 mb-0">Kursus <br>(Draft)</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-4 col-xl-4">
                        <a href="<?php echo site_url('admin/courses?status=1'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-document text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $total_course_pending; ?></span></h3>
                                    <p class="text-muted font-15 mb-0">Kursus <br>(Pending)</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-4 col-xl-4">
                        <a href="<?php echo site_url('admin/courses?status=2'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-blog text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $total_course_posting; ?></span></h3>
                                    <p class="text-muted font-15 mb-0">Kursus <br>(Posting)</p>
                                </div>
                            </div>
                        </a>
                    </div>
					
					
					
					
					
					

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>


<div class="row" >
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="mb-3 header-title">Data Kursus</h4>
				<form class="row justify-content-center" action="#" method="get" >
					<!-- Course Categories -->
					<div class="col-xl-3">
						<div class="form-group">
							<label for="category_id">Kategori</label>
							<select class="form-control select2 select2-hidden-accessible" data-toggle="select2" name="category_id" id="category_id" data-select2-id="category_id" tabindex="-1" aria-hidden="true">
								<option value="all" selected="" >Semua</option>
								<?php												
								foreach($dropdown_category->result() as $q) {
									if ($this->input->get('category_id') == $q->category_id){
										$selected = 'selected';
									}else{
										$selected = '';
									}
								?>
								<option value="<?php echo urlencode($q->category_id); ?>" <?php echo $selected; ?>><?php echo $q->category_name; ?></option>
								<?php
									}
								?>
							</select>					
						</div>
					</div>

					<!-- Course Status -->
					<div class="col-xl-2">
						<div class="form-group">
							<label for="status">Status</label>
							<select class="form-control select2 select2-hidden-accessible" data-toggle="select2" name="status" id="status" data-select2-id="status" tabindex="-1" aria-hidden="true">
								<option value="all" selected="" >Semua</option>
								<option value="0" <?php if ($this->input->get('status' == '0')) { echo 'selected';} ?>> Draft</option>
								<option value="1" <?php if ($this->input->get('status' == '1')) { echo 'selected';} ?>> Pending</option>
								<option value="2" <?php if ($this->input->get('status' == '2')) { echo 'selected';} ?>> Posting</option>
							</select>		
						</div>
					</div>

					

					<!-- Course Course Type -->
					<div class="col-xl-2">
						<div class="form-group">
							<label for="course_type_id">Tipe</label>
							<select class="form-control select2 select2-hidden-accessible" data-toggle="select2" name="course_type_id" id="course_type_id" data-select2-id="course_type_id" tabindex="-1" aria-hidden="true">
								<option value="all" selected="" >Semua</option>
								<?php												
								foreach($dropdown_course_type->result() as $q) {
									if ($this->input->get('course_type_id') == $q->course_type_id){
										$selected = 'selected';
									}else{
										$selected = '';
									}
								?>
								<option value="<?php echo urlencode($q->course_type_id); ?>" <?php echo $selected; ?>><?php echo $q->course_type_name; ?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>

					<div class="col-xl-2">
						<label for=".." class="text-white">..</label>
						<button type="submit" class="btn btn-primary btn-block" name="filter" value='yes'>Filter</button>
					</div>
					
					<!-- Course Instructors -->
					<div class="col-xl-3">
						<div class="form-group">
							
						</div>
					</div>
				</form><br>
				
				
				<table id="basic-datatable" class="table table-striped table-centered mb-0">
					<thead>
						<tr>
							<th>Title</th>
							<th>Kategori</th>
							<th>Pelajaran & Bagian</th>
							<th>Total Join</th>
							<th>Status</th>
							<th class="text-right">Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($get_data->result() as $value) :
							// Encrypt ID
							$encrypt_id					= $this->encrypt->encode($value->course_id);
							$id							= str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypt_id);
							
							
							# Status
							if ($value->course_status = 0 ){
								$course_status = '<span class="badge badge-danger-lighten">Draft</span>';
							}else if ($value->course_status = 1 ){
								$course_status = '<span class="badge badge-warning-lighten">Pending</span>';
							}else if ($value->course_status = 2 ){
								$course_status = '<span class="badge badge-success-lighten">Posting</span>';
							}
						?>
							<tr>
								<td><?php echo $value->course_title; ?></td>
								<td><?php echo $value->category_name; ?></td>
								<td>
									<small class="text-muted"><b>Total bagian</b>: 1</small><br>
									<small class="text-muted"><b>Total pelajaran</b>: 2</small><br>
								</td>
								<td><small class="text-muted"><b>Total join</b>: 1</small></td>
								<td><?php echo $course_status; ?></td>
								<td class="text-right"><?php echo 'Rp. '. number_format($value->course_price); ?></td>
								<td>
									<div class="dropright dropright">
										<button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="mdi mdi-dots-vertical"></i>
										</button>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="https://dev.pertamina-ptc.com/academy/home/course/test/2" target="_blank">Lihat kursus di frontend</a></li>
											<li><a class="dropdown-item" href="<?php echo site_url('admin/courses/edit?id=' . $id) ?>">Edit kursus</a></li>
											<li><a class="dropdown-item" href="<?php echo site_url('admin/courses/edit?id=' . $id) ?>">Bagian dan pelajaran</a></li>
											<li><a class="dropdown-item" href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/courses/pending?id=' . $id) ?>')">Tandai sebagai tertunda</a></li>
											<li><a class="dropdown-item" href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/courses/approve?id=' . $id) ?>')">Approve kursus</a></li>
											<li><a class="dropdown-item" href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/courses/delete?id=' . $id) ?>')">Hapus</a></li>
										</ul>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				
				
				
				
				
				
				
				
			</div>
		</div>
	</div>
</div>

