<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
					
					<a href="<?php echo site_url('admin/role_access/user_access/export_excel'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-file"></i> Export</a>

					<a href="<?php echo site_url('admin/role_access/user_access/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i> Tambah Data</a>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="mb-3 header-title text-center"><?php echo $page_title; ?></h4>
				<div class="table-responsive-sm mt-4">
					<table id="basic-datatable" class="table table-striped table-centered mb-0">
						<thead>
							<tr>
								<!-- <th>No</th> -->
								<th>User Role</th>
								<!-- <th>User Access</th> -->
								<th>Menu</th>
								<th>Create</th>
								<th>Read</th>
								<th>Update</th>
								<th>Delete</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php
							foreach ($get_data->result() as $value) :
								// Encrypt ID
								$encrypt_id					= $this->encrypt->encode($value->access_id);
								$id							= str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypt_id);
							?>
								<tr>
									<!-- <td><?php //echo $value->access_id; ?></td> -->
									<td><?php echo $value->user_role_name; ?></td>
									<td><?php echo $value->menu_title; ?></td>
									<td><?php echo $value->access_create==null?"NO":"YES"; ?></td>
									<td><?php echo $value->access_read==null?"NO":"YES"; ?></td>
									<td><?php echo $value->access_update==null?"NO":"YES"; ?></td>
									<td><?php echo $value->access_delete==null?"NO":"YES"; ?></td>
									<td>
										<div class="dropright dropright">
											<button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="mdi mdi-dots-vertical"></i>
											</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="<?php echo site_url('admin/role_access/user_access/edit?id=' . $id) ?>">Edit</a></li>
												<li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/role_access/user_access/delete?id=' . $id) ?>');">Hapus</a></li>
											</ul>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>
