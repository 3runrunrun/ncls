<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Promo Trial</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="bs-callout-info callout-border-left mt-1 p-1">
                  <strong>Perhatian!</strong><br />
                  <p>Berikut merupakan daftar promo trial yang telah <strong>diterima</strong> oleh pimpinan. Anda dapat mengelola <strong>pemberian obat trial</strong> pada halaman ini.</p>
                </div><br />
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Nomor Promo Trial</th>
                            <th>Outlet</th>
                            <th>User</th>
                            <th>Tgl. Pengajuan</th>
                            <th>Tgl. Approval</th>
                            <th>Status</th>
                            <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < 20; $i++): ?>
                        <tr>
                          <td>FKT/AS/<?php echo date('m/Y'); ?></td>
                          <td>RS Jantung Harapan Kita</td>
                          <td>-</td>
                          <td><?php echo date('d-M-Y'); ?></td>
                          <td><?php echo date('d-M-Y'); ?></td>
                          <td>
                            <span class="tag tag-pill tag-success">Approved</span>
                          </td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="#" class="btn btn-warning">Kelola</a>
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
      <!-- /tabel-wpr -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Form Pengelolaan Promo Trial</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section"><i class="fa fa-info"></i>No. Promo Trial: <span class="tag tag-pill tag-primary">FKT/AS/<?php echo date('m/Y'); ?></span></h4>
                        <div class="form-group row">
                          <label class="label-control col-sm-6">Outlet</label>
                          <label class="label-control col-sm-6">User</label>
                          <div class="col-sm-6">
                            <input type="text" name="" class="form-control" value="RS Jantung Harapan Kita" readonly>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" name="" class="form-control" value="-" readonly>
                          </div>
                        </div>
                        <!-- /outlet /user -->
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Berikut adalah keterangan promo trial:</label>
                          <div class="col-sm-12">
                            <textarea name="" cols="30" rows="5" class="form-control border-primary" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</textarea>
                          </div>
                        </div>
                        <!-- /outlet /user -->
                      </div>
                      <!-- /left-row -->
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section"><i class="fa fa-list"></i>Daftar Obat Promo</h4>
                        <div class="form-group row">
                          <label class="label-control col-sm-12">
                            <div class="bs-callout-info callout-border-left mt-1 p-1">
                              <strong>Perhatian!</strong><br />
                              <p>Berikut merupakan obat yang diberikan kepada outlet / user yang <strong>telah disetujui</strong> oleh pimpinan.<br />Pengelolaan dilakukan dengan <strong>mengubah jumlah</strong> obat yang diberikan.</p>
                            </div><br />
                          </label>
                          <label class="label-control col-sm-6">Obat</label>
                          <label class="label-control col-sm-6">Jumlah</label>
                          <div class="col-sm-6">
                            <input type="text" name="" class="form-control border-primary" value="Obat 1" readonly>
                          </div>
                          <div class="col-sm-6">
                            <input type="number" id="" class="form-control border-primary" min="1">
                          </div>
                        </div>
                        <!-- /obat /jumlah -->
                        <?php for ($i=1; $i < 4; $i++):?>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <input type="text" name="" class="form-control border-primary" value="Obat <?php echo $i+1 ?>" readonly>
                          </div>
                          <div class="col-sm-6">
                            <input type="number" id="" class="form-control border-primary" min="1">
                          </div>
                        </div>
                        <!-- /obat /jumlah -->
                        <?php endfor; ?>
                      </div>
                      <!-- /right-row -->
                    </div>
                    <div class="form-action" align="center">
                      <input type="submit" class="btn btn-success" name="" value="Simpan">
                      <input type="button" class="btn btn-warning mr-1" name="" value="Batal">
                    </div>
                    <!-- /submit -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tambah-wpr -->
    </div>
  </div>
</div>

