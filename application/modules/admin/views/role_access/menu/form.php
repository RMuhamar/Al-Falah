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
					<a href="<?php echo site_url('admin/role_access/menu/'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> kembali</a>
				</h4>

				<div class="col-lg-12">
					<form class="required-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="menu_title"></label>
							<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
							<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>">
							<input type="hidden" id="type_form" name="type_form" class="form-control" value="<?php echo $type_form; ?>">
						</div>

						<div class="form-group">
							<label for="menu_title">Nama Menu<span class="required">*</span></label>
							<input type="text" id="menu_title" name="menu_title" class="form-control" placeholder="Nama Menu" value="<?php echo $menu_title; ?>" required="">
						</div>

						<div class="form-group">
							<label for="menu_url">Nama Menu URL<span class="required">*</span></label>
							<input type="text" id="menu_url" name="menu_url" class="form-control" placeholder="Nama Menu URL" value="<?php echo $menu_url; ?>" required="">
						</div>

						<div class="form-group">
							<label for="access">Nama access<span >*</span></label>
							<table class="table">
								<thead>
									<tr>
										<!-- <th scope="col">#</th> -->
										<th scope="col">Create</th>
										<th scope="col">Read</th>
										<th scope="col">Update</th>
										<th scope="col">Delete</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input class="form-check-input" type="checkbox" value="<?php //echo $menu_create; ?>" id="menu_create" name="menu_create">
										</td>
										<td>
											<input class="form-check-input" type="checkbox" value="<?php //echo $menu_read; ?>" id="menu_read" name="menu_read">
										</td>
										<td>
											<input class="form-check-input" type="checkbox" value="<?php //echo $menu_update; ?>" id="menu_update" name="menu_update">
										</td>
										<td>
											<input class="form-check-input" type="checkbox" value="<?php //echo $menu_delete; ?>" id="menu_delete" name="menu_delete">
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>				

						<!-- <div class="form-group">
							<label for="menu_id">Nama Menu<span >*</span></label>
							<select class="form-control" name="menu_id" required >
								<option selected disabled value="">-- Select --</option>
								<?php												
								//foreach($get_dropdown_menu->result() as $q)
								{
									?>
									<option value="<?php //echo urlencode($q->menu_id); ?>" <?php //if($q->menu_id == $menu_id){ echo 'selected'; } ?>><?php //echo $q->menu_title; ?></option>
									<?php
								}
								?>
							</select>
						</div> -->

						

						<button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
					</form>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>
