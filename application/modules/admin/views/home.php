 <div class="content-page">
                <div class="content">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Dashboard</h4>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="header-title mb-4">Total Pendapatan Kursus B2C (YTD)</h4>
                                    <div class="col-sm-4">
                                        <div class="form-group row mb-3" data-select2-id="34">
                                            <label class="col-md-4 col-form-label" for="level">Pembayaran</label>
                                            <div class="col-md-8" data-select2-id="33">
                                                <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" name="level" id="level" data-select2-id="level" tabindex="-1" aria-hidden="true">
                                                    <option value="LinkAja" data-select2-id="4">LinkAja</option>
                                                    <option value="Prakerja" data-select2-id="35">Prakerja</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                                        <canvas id="task-area-chart"></canvas>
                                    </div>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card widget-inline">
                                <div class="card-body p-0">
                                    <div class="row no-gutters">
                                        <div class="col-sm-6 col-xl-3">
                                            <a href="<?php echo site_url('admin/courses'); ?>" class="text-secondary">
                                                <div class="card shadow-none m-0">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-archive text-muted" style="font-size: 24px;"></i>
                                                        <h3><span>500</span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Kursus</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-sm-6 col-xl-3">
                                            <a href="<?php echo site_url('admin/courses'); ?>" class="text-secondary">
                                                <div class="card shadow-none m-0 border-left">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-document text-muted" style="font-size: 24px;"></i>
                                                        <h3><span>50.025</span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Sertifikat</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-sm-6 col-xl-3">
                                            <a href="<?php echo site_url('admin/enrol_history'); ?>" class="text-secondary">
                                                <div class="card shadow-none m-0 border-left">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-network-3 text-muted" style="font-size: 24px;"></i>
                                                        <h3><span>23.055</span></h3>
                                                        <p class="text-muted font-15 mb-0">Pengguna B2B</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-sm-6 col-xl-3">
                                            <a href="<?php echo site_url('admin/users'); ?>" class="text-secondary">
                                                <div class="card shadow-none m-0 border-left">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                                        <h3><span>33.033</span></h3>
                                                        <p class="text-muted font-15 mb-0">Pengguna B2C</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    </div> <!-- end row -->
                                </div>
                            </div> <!-- end card-box-->
                        </div> <!-- end col-->
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3 header-title">Pengguna B2B</h4>
                                    <div class="table-responsive-sm mt-4">
                                        <div id="course-datatable-server-side_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="course-datatable-server-side_length"><label>Show <select name="course-datatable-server-side_length" aria-controls="course-datatable-server-side" class="custom-select custom-select-sm form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select> entries</label></div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="course-datatable-server-side_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="course-datatable-server-side"></label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="course-datatable-server-side" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline" width="100%" data-page-length="25" role="grid" aria-describedby="course-datatable-server-side_info" style="width: 100%;">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" rowspan="1" colspan="1" style="width: 18.8px;" aria-label="#">#</th>
                                                                <th class="sorting_disabled text-left" rowspan="1" colspan="1" style="width: 254.6px;" aria-label="Company">Perusahaan</th>
                                                                <th class="sorting_disabled text-right" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="User Active">Total Pengguna<br>Active</th>
                                                                <th class="sorting_disabled text-right" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="User Not Active">Total Pengguna<br>Not Active</th>
                                                                <th class="sorting_disabled text-right" rowspan="1" colspan="1" style="width: 75.6px;" aria-label="Total User">Total Pengguna<br>Keseluruhan</th>
                                                                <th class="sorting_disabled text-right" rowspan="1" colspan="1" style="width: 152.6px;" aria-label="Total Kursus">Total Kursus</th>
                                                                <th class="sorting_disabled text-center" rowspan="1" colspan="1" style="width: 65.6px;" aria-label="Actions">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1" tabindex="0">1</td>
                                                                <td><strong><a href="#">Pertamina</a></strong></td>
                                                                <td class="text-right"><small class="text-success">15.000</small></td>
                                                                <td class="text-right"><small class="text-danger">505</small></td>
                                                                <td class="text-right"><small class="text-primary">15.505</small></td>
                                                                <td class="text-right"><small class="text-warning">102</small></td>
                                                                <td class="text-center">
                                                                    <div class="dropright dropright">
                                                                        <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="mdi mdi-dots-vertical"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a class="dropdown-item" href="#" target="_blank">Lihat Data Perusahaan</a></li>
                                                                            <li><a class="dropdown-item" href="#">Lihat Data Pengguna</a></li>
                                                                            <li><a class="dropdown-item" href="#">Lihat Data Kursus</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1" tabindex="0">1</td>
                                                                <td><strong><a href="#">Bank BRI</a></strong></td>
                                                                <td class="text-right"><small class="text-success">7.500</small></td>
                                                                <td class="text-right"><small class="text-danger">50</small></td>
                                                                <td class="text-right"><small class="text-primary">7.550</small></td>
                                                                <td class="text-right"><small class="text-warning">75</small></td>
                                                                <td class="text-center">
                                                                    <div class="dropright dropright">
                                                                        <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="mdi mdi-dots-vertical"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a class="dropdown-item" href="#" target="_blank">Lihat Data Perusahaan</a></li>
                                                                            <li><a class="dropdown-item" href="#">Lihat Data Pengguna</a></li>
                                                                            <li><a class="dropdown-item" href="#">Lihat Data Kursus</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <div id="course-datatable-server-side_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="course-datatable-server-side_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="course-datatable-server-side_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled" id="course-datatable-server-side_previous"><a href="#" aria-controls="course-datatable-server-side" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#" aria-controls="course-datatable-server-side" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item next disabled" id="course-datatable-server-side_next"><a href="#" aria-controls="course-datatable-server-side" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>



                    <script type="text/javascript">
                        $('#unpaid-instructor-revenue').mouseenter(function() {
                            $('#go-to-instructor-revenue').show();
                        });
                        $('#unpaid-instructor-revenue').mouseleave(function() {
                            $('#go-to-instructor-revenue').hide();
                        });
                    </script>
                    <!-- END PLACE PAGE CONTENT HERE -->
                </div>
            </div>