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
					<a href="<?php echo site_url('admin/role_access/user_access/'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> kembali</a>
				</h4>

				<div class="col-lg-12">
					<form class="required-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<!-- <label for="access_name"></label> -->
							<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" class="form-control" value="<?php echo $this->security->get_csrf_hash(); ?>" required="">
							<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>">
							<input type="hidden" id="type_form" name="type_form" class="form-control" value="<?php echo $type_form; ?>">
						</div>

						<!-- <div class="form-group">
							<label for="access_name">Nama User Access<span class="required">*</span></label>
							<input type="text" id="access_name" name="access_name" class="form-control" placeholder="Nama User Access" value="<?php //echo $access_name; ?>" required="">
						</div> -->

						<div class="form-group">
							<label for="user_role_id">Nama User Role<span class="required">*</span></label>
							<select class="form-control" name="user_role_id" required >
								<option selected disabled value="">-- Select --</option>
								<?php												
								foreach($get_dropdown_user_role->result() as $q)
								{
									?>
									<option value="<?php echo urlencode($q->user_role_id); ?>" <?php if($q->user_role_id == $user_role_id){ echo 'selected'; } ?>><?php echo $q->user_role_name; ?></option>
									<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="menu_id">Nama Menu<span >*</span></label>
							<select class="form-control" name="menu_id" required >
								<option selected disabled value="">-- Select --</option>
								<?php												
								foreach($get_dropdown_menu->result() as $q)
								{
									?>
									<option value="<?php echo urlencode($q->menu_id); ?>" <?php if($q->menu_id == $menu_id){ echo 'selected'; } ?>><?php echo $q->menu_title; ?></option>
									<?php
								}
								?>
							</select>
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
											<input class="form-check-input" type="checkbox" value="<?php echo $access_create; ?>" id="access_create" name="access_create" <?php echo $access_create!=NULL?'checked':' '; ?> >
										</td>
										<td>
											<input class="form-check-input" type="checkbox" value="<?php echo $access_read; ?>" id="access_read" name="access_read" <?php echo $access_read!=NULL?'checked':' '; ?> >
										</td>
										<td>
											<input class="form-check-input" type="checkbox" value="<?php echo $access_update; ?>" id="access_update" name="access_update" <?php echo $access_update!=NULL?'checked':' '; ?> >
										</td>
										<td>
											<input class="form-check-input" type="checkbox" value="<?php echo $access_delete; ?>" id="access_delete" name="access_delete" <?php echo $access_delete!=NULL?'checked':' '; ?> >
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>

						<button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
					</form>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>
