<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/report/invoice/export_excel'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-file"></i> Export </a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>



<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">List of Invoice</h4>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/report/invoice/process'); ?>" aria-expanded="true" class="nav-link active ">
                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">Invoice Process</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/report/invoice/archive'); ?>" aria-expanded="false" class="nav-link">
                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">Invoice Archive </span>
                        </a>
                    </li>
                </ul>

                <h4 class="mb-3 header-title">Data Invoice</h4>
                <form class="row justify-content-center" action="#" method="get">
                    <!-- Course Categories -->
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="payment_partner_id">Payment Partner</label>
                            <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" name="payment_partner_id" id="payment_partner_id" data-select2-id="payment_partner_id" tabindex="-1" aria-hidden="true">
                                <option value="all" selected="">Semua</option>
                                <?php
                                foreach ($dropdown_payment_partner->result() as $q) {
                                    if ($this->input->get('payment_partner_id') == $q->payment_partner_id) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option value="<?php echo urlencode($q->payment_partner_id); ?>" <?php echo $selected; ?>><?php echo $q->payment_partner_name; ?></option>
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
                                <option value="all" selected="">Semua</option>
                                <option value="0" <?php if ($this->input->get('status' == '0')) {
                                                        echo 'selected';
                                                    } ?>> Draft</option>
                                <option value="1" <?php if ($this->input->get('status' == '1')) {
                                                        echo 'selected';
                                                    } ?>> Pending</option>
                                <option value="2" <?php if ($this->input->get('status' == '2')) {
                                                        echo 'selected';
                                                    } ?>> Posting</option>
                            </select>
                        </div>
                    </div>

                    <!-- Range Tanggal -->
                    <div class="col-xl-4">
                        <label for="status">Range Tanggal</label>
                        <div class="form-group">
                            <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue" data-cancel-class="btn-light" style="width: 100%;">
                                <i class="mdi mdi-calendar"></i>&nbsp;
                                <span id="selectedValue">July 01, 2021 - July 31, 2021</span> <i class="mdi mdi-menu-down"></i>
                            </div>
                            <input id="date_range" type="hidden" name="date_range" value="01 July, 2021 - 31 July, 2021">
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
                            <th>Kode Invoice</th>
                            <th>Tanggal</th>
                            <th>Nama Kursus</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th>Payment Partner</th>
                            <th>Status Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($get_data->result() as $value) :
                            // Encrypt ID
                            $encrypt_id                    = $this->encrypt->encode($value->trx_id);
                            $id                            = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypt_id);


                            # Status
                            if ($value->trx_status == 1) {
                                $trx_status = '<span class="badge badge-danger-lighten">Failed</span>';
                            } else if ($value->trx_status == 2) {
                                $trx_status = '<span class="badge badge-warning-lighten">Pending</span></span>';
                            } else if ($value->trx_status == 3) {
                                $trx_status = '<span class="badge badge-success-lighten">Success</span>';
                            }
                        ?>
                            <tr>
                                <td><?php echo $value->trx_code; ?></td>
                                <td><?php echo $value->trx_created_date; ?></td>
                                <td><?php echo $this->Admin_model->get_name_course($value->trx_json_course_name); ?></td>
                                <td><?php echo number_format($value->trx_total_disc); ?></td>
                                <td><?php echo number_format($value->trx_grand_total); ?></td>
                                <td><?php echo $value->payment_partner_name; ?></td>
                                <td><?php echo $trx_status; ?></td>
                                <td>
                                    <div class="dropright dropright">
                                        <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo site_url('admin/report/invoice/process_detail?id=' . $id) ?>">Detail</a></li>
                                            <li><a class="dropdown-item" href="<?php echo site_url('admin/report/invoice/print_pdf_process?id=' . $id) ?>" target="_blank">Print</a></li>
                                            <!-- <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php //echo site_url('admin/role_access/user_access/delete?id=' . $id) 
                                                                                                                ?>');">Hapus</a></li> -->
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