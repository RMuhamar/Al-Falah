<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
					<a href="<?php echo site_url('admin/my_account/log_login/export_excel'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-file"></i> Export</a>

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
								<th>Tanggal</th>
								<th>Nama Pengguna</th>
								<th>Ip Address</th>
								<th>Status</th>
								<th>Platform</th>
								<th>Browser</th>
							</tr>
						</thead>

						<tbody>
							<?php
							foreach ($get_data->result() as $value) :
								// Encrypt ID
								$encrypt_id					= $this->encrypt->encode($value->log_id);
								$id							= str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypt_id);

								if($value->log_status == 1){
									$status = 'Sukses';
								}else{
									$status = 'Gagal';
								}
							?>
								<tr>
									<td><?php echo $value->log_date; ?></td>
									<td><?php echo $value->user_fullname; ?></td>
									<td><?php echo $value->log_ipaddress; ?></td>
									<td><?php echo $status; ?></td>
									<td><?php echo $value->log_platform; ?></td>
									<td><?php echo $value->log_browser; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>