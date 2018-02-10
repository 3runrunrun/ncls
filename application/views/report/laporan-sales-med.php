<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Laporan Sales Med Rep</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-sm-2">
                  <form method="post" class="form-horizontal" id="show-customer-by-area">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-4">Bulan</label>
                        <div class="col-sm-8">
                          <select name="" class="form-control select2">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                          </select>
                        </div>
                      </div>
                      <!-- /bulan -->
                      <div class="form-group row">
                        <label class="label-control col-sm-4">Med Rep</label>
                        <div class="col-sm-8">
                          <select name="" class="form-control select2">
                            <option value="" selected disabled>Pilih Detailer</option>
                            <option value=""></option>
                          </select>
                        </div>
                      </div>
                      <!-- /detailer -->
                      <div class="form-group row">
                        <label class="label-control col-sm-4">Supervisor</label>
                        <div class="col-sm-8">
                          <select name="" class="form-control" readonly>
                            <option value="">Supervisor Atas</option>
                          </select>
                        </div>
                      </div>
                      <!-- /supervisor -->
                      <div class="form-group row">
                        <label class="label-control col-sm-4">RM</label>
                        <div class="col-sm-8">
                          <select name="" class="form-control" readonly>
                            <option value="">RM Atas</option>
                          </select>
                        </div>
                      </div>
                      <!-- /rm -->
                      <div class="form-group row">
                        <label class="label-control col-sm-4">Gol</label>
                        <div class="col-sm-4">
                          <input type="text" name="" id="" class="form-control" readonly placeholder="A">
                        </div>
                      </div>
                      <!-- /gol -->
                    </div>
                  </form>
                </div>
              </div>
              <!-- /pencarian -->
              <div class="card-block">
                <?php if ( ! is_null($this->session->flashdata())): ?>
                <?php if ( ! is_null($this->session->flashdata('error_msg'))): ?>  
                <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?php echo $this->session->flashdata('error_msg'); ?>
                </div>
                <?php elseif ( ! is_null($this->session->flashdata('success_msg'))): ?>
                <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?php echo $this->session->flashdata('success_msg'); ?>
                </div>
                <?php elseif ( ! is_null($this->session->flashdata('query_msg'))): ?>
                <div class="bs-callout-danger callout-border-left mt-1 p-1">
                  <strong>Database Error!</strong>
                  <p><?php echo $this->session->flashdata('query_msg')['message']; ?> <strong><?php echo $this->session->flashdata('query_msg')['code']; ?></strong></p>
                </div><br />
                <?php endif; ?>
                <?php endif; ?>
                <!-- /alert -->
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th width="5%" style="text-align: center !important">Kode</th>
                          <th width="40%" style="text-align: center !important">Outlet</th>
                          <th width="10%" style="text-align: center !important">Type</th>
                          <th width="30%" style="text-align: center !important">Value</th>
                          <th width="10%" style="text-align: center !important">Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for($i = 0; $i < 5; $i++): ?>
                        <tr>
                          <td><?php echo rand(2130, 3232); ?></td>
                          <td><?php echo strtoupper('Apotek Kimia Farma'); ?></td>
                          <td style="text-align: center !important">REG</td>
                          <td style="text-align: right !important"><?php echo number_format(rand(200000, 1000000), 0, ',', '.'); ?></td>
                          <td>
                            <div class="btn-group-vertical" role="group">
                              <a href="<?php echo site_url() ?>/detail-analisis-sales-general" class="btn btn-primary">Detail</a>
                            </div>
                          </td>
                        </tr>
                        <?php endfor; ?>
                      </tbody>
                  </table>
                </div>
                <!-- End of Tabel -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel-customer -->
    </div>
  </div>
</div>