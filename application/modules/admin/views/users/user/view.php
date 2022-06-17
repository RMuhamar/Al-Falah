<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
					<a href="<?php echo site_url('admin/users/user/export_excel'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-file"></i> Export</a>

					<a href="<?php echo site_url('admin/users/user/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i> Tambah Data</a>
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
								<th class="text-center">Photo</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Jumlah Kursus Aktif</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php
							foreach ($get_data->result() as $value) :
								// Encrypt ID
								$encrypt_id					= $this->encrypt->encode($value->user_id);
								$id							= str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypt_id);
							?>
								<tr>
									<td class="text-center">
										<img src="<?php echo base_url() . 'uploads/user_image/' . $value->user_avatar; ?>" alt="" height="70" width="70" class="img-fluid rounded-circle img-thumbnail">
									</td>
									<td><?php echo $value->user_fullname; ?></td>
									<td><?php echo $value->user_email; ?></td>
									<td>0 </td>
									<td>
										<div class="dropright dropright">
											<button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="mdi mdi-dots-vertical"></i>
											</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="<?php echo site_url('admin/users/user/edit?id=' . $id) ?>">Edit</a></li>
												<li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/users/user/delete?id=' . $id) ?>');">Hapus</a></li>
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