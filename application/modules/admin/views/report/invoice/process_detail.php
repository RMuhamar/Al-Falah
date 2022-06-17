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
	<div class="col-sm-12 text-right">
		<h4 class="header-title mb-3">
			<a href="<?php echo site_url('admin/report/invoice'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> Kembali&nbsp;</a>
			<br>
		</h4>
	</div>
</div>
<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<?php # Status
					if ($trx_status == 1 ){
						$trx_status = '<span class="badge badge-danger-lighten">Failed</span>';
					}else if ($trx_status == 2 ){
						$trx_status = '<span class="badge badge-warning-lighten">Pending</span></span>';
					}else if ($trx_status == 3 ){
						$trx_status = '<span class="badge badge-success-lighten">Success</span>';
					}
				?>

				<div class="ibox-content p-xl">
					<div class="row">
						<div class="col-sm-6">
							<span>From:</span>
							<address>
								<strong>Gurumaya</strong><br>
								Jl. Abdul Muis No.52 - 56 A<br>
								Jakarta 10160<br>
								<abbr title="Phone">P:</abbr> (021) 3514977
							</address>
						</div>
						<div class="col-sm-6 text-right">
							<h4>Invoice No.</h4>
							<span class="text-navy"><?php echo $trx_code; ?></span><br>
							<span>To:</span>
							<address>
								<strong>Job Bradi Sibarani</strong><br>
								Banjaran Residence<br>
								Depok<br>
								<abbr title="Phone">P:</abbr> (120) 9000-4321
							</address>
							<p>
								<span><strong>Invoice Date:</strong> <?php echo $trx_created_date; ?></span><br>				
							</p>
						</div>
					</div>
					<div class="table-responsive m-t">
						<table class="table invoice-table">
							<thead>
								<tr>
									<th>Nama Kursus</th>
									<th>Jumlah</th>
									<th>Harga</th>						
									<th>Jumlah Total</th>
								</tr>
							</thead>
							<tbody>
							<?php $detail = $this->admin_model->get_trx_detail($trx_id);
							$trx_det_course_price = 0;
							foreach ($detail as $row) {
								$trx_det_course_price += $row->trx_det_course_price;
							?>
							<tr>
								<td><div><strong><?php echo $row->trx_det_course_name ?></strong></div></td>
								<td><?php echo $row->trx_det_qty ?></td>
								<td><?php echo  number_format($row->trx_det_course_price) ?></td>
								<td><?php echo  number_format($row->trx_det_course_price) ?></td>
							</tr>
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
					<table class="table invoice-total ">
						<tbody>
							<tr>
								<td colspan="2"></td>
								<td style="width:50%"></td>
								<td align="right"><strong>Diskon: </strong ></td>
								<td ><?php echo number_format($trx_total_disc) ?></td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td style="width:50%"></td>
								<td align="right"><strong> Total :</strong></td>
								<td><?php echo number_format($trx_det_course_price) ?></td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td style="width:50%"></td>
								<td align="right"><strong>Jumlah TOTAL :</strong></td>
								<td><?php echo number_format($trx_grand_total) ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- end card ibox-content -->
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div>
</div>
