<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
					
					<a href="<?php echo site_url('admin/report/poin/export_excel'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-file"></i> Export</a>

					<!-- <a href="<?php echo site_url('admin/report/poin/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i> Tambah Data</a> -->
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">List of payouts</h4>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/report/invoice/process'); ?>" data-toggle="tab" aria-expanded="true" class="nav-link ">
                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">PRocess</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/report/invoice/archive'); ?> data-toggle="tab" aria-expanded="false" class="nav-link active">
                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">Archive <span class="badge badge-danger-lighten">0</span></span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="completed-b1">
                        <div class="row justify-content-md-center">
                            <div class="col-xl-6">
                                <form class="form-inline" action="https://dev.pertamina-ptc.com/academy/admin/instructor_payout/filter_by_date_range" method="get">
                                    <div class="col-xl-10">
                                        <div class="form-group">
                                            <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light" style="width: 100%;">
                                                <i class="mdi mdi-calendar"></i>&nbsp;
                                                <span id="selectedValue">July 01, 2021 - July 31, 2021</span> <i class="mdi mdi-menu-down"></i>
                                            </div>
                                            <input id="date_range" type="hidden" name="date_range" value="01 July, 2021 - 31 July, 2021">
                                        </div>
                                    </div>
                                    <div class="col-xl-2">
                                        <button type="submit" class="btn btn-info" id="submit-button" onclick="update_date_range();"> Filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive-sm mt-4">
                            <table id="completed-payout" class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Instructor</th>
                                        <th>Payout amount</th>
                                        <th>Payment type</th>
                                        <th>Payout date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								</tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="pending-b1">
                        <div class="table-responsive-sm mt-4">
                            <table id="pending-payout" class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Instructor</th>
                                        <th>Payout amount</th>
                                        <th>Payout date</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>
