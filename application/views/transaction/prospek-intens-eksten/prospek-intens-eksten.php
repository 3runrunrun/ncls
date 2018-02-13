<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Prospek Intensifikasi &amp; Ekstensifikasi</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Nomor<br />Rencana Prospek</th>
                            <th>Detailer</th>
                            <th>Jenis Prospek</th>
                            <th>Target<br />Kunjungan</th>
                            <th>RM</th>
                            <th>Tgl. Pengajuan</th>
                            <th>Tgl. Approval</th>
                            <th>Status</th>
                            <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < 20; $i++): ?>
                        <tr>
                          <td>PRSP/D/<?php echo date('m/Y'); ?></td>
                          <td>Nama Detailer</td>
                          <td>Intensifikasi</td>
                          <td>4 Kali</td>
                          <td>Nama RM</td>
                          <td><?php echo date('d-M-Y'); ?></td>
                          <td><?php echo date('d-M-Y'); ?></td>
                          <td>
                            <span class="tag tag-pill tag-warning">Waiting</span>
                          </td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="#" class="btn btn-success">Approve</a>
                              <a href="#" class="btn btn-primary">Detail</a>
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
              <h4 class="card-title">Form Intensifikasi &amp; Ekstensifikasi</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12 offset-sm-3">
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Jenis Prospek</label>
                          <div class="col-sm-4">
                            <fieldset>
                              <label class="custom-control custom-radio">
                                <input type="radio" name="jenis_prospek" id="radio-in" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Intensifikasi</span>
                              </label>
                            </fieldset>
                          </div>
                          <div class="col-sm-4 pull-sm-1">
                            <fieldset>
                              <label class="custom-control custom-radio">
                                <input type="radio" name="jenis_prospek" id="radio-eks" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Ekstensifikasi</span>
                              </label>
                            </fieldset>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Detailer</label>
                          <div class="col-sm-12">
                            <select name="" class="form-control select2">
                              <option value="" selected disabled>Pilih Detailer</option>
                              <option value=""></option>
                            </select>
                          </div>
                        </div>
                        <!-- /detailer -->
                        <div class="form-group row">
                          <label class="label-control col-sm-12">
                            <div class="bs-callout-info callout-border-left mt-1 p-1">
                              <strong>Perhatian!</strong><br />
                              <p>Pastikan User / Customer <strong>telah terdaftar</strong> di dalam sistem. Pendaftaran User / Customer dapat dilakukan pada <a class="primary" href="#">halaman ini</a>.</p>
                            </div>
                          </label>
                        </div>
                        <!-- /callout -->
                        <div class="form-group row">
                          <label class="label-control col-sm-6">User / Customer</label>
                          <label class="label-control col-sm-6">Target Kunjungan</label>
                          <div class="col-sm-6">
                            <select name="" class="form-control select2">
                              <option value="" selected disabled>Pilih User / Customer</option>
                              <option value=""></option>
                            </select>
                          </div>
                          <div class="col-sm-6">
                            <input type="number" name="" class="form-control border-primary" min="1" placeholder="Target Kunjungan">
                            <p>*) Masukkan jumlah target kunjungan</p>
                          </div>
                        </div>
                        <!-- /user /target -->
                        <div class="form-group row">
                          <label class="label-control col-sm-6">Dana</label>
                          <label class="label-control col-sm-6">Biaya</label>
                          <div class="col-sm-6">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="number" name="dana" class="form-control border-primary" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-sm-6">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="number" name="biaya" class="form-control border-primary" min="0" value="0">
                              </div>
                            </fieldset>
                            <p>*) Biaya rata-rata per pasien</p>
                          </div>
                        </div>
                        <!-- /dana /biaya -->
                      </div>
                      <!-- /upper-col -->
                      <div class="col-sm-8 col-xs-12 offset-sm-2">
                        <h4 class="form-section"><i class="fa fa-list"></i>Target Obat &amp; Biaya</h4>
                        <div class="form-group row">
                          <label class="label-control col-sm-4">Produk</label>
                          <label class="label-control col-sm-4">Target Unit</label>
                          <label class="label-control col-sm-4">Outlet</label>
                          <div class="col-sm-4">
                            <select name="" class="form-control select2">
                              <option value="" selected disabled>Pilih Produk</option>
                              <option value=""></option>
                            </select>
                          </div>
                          <div class="col-sm-4">
                            <input type="number" name="" class="form-control border-primary" min="1" placeholder="Unit">
                            <p>*) Target per jual</p>
                          </div>
                          <div class="col-sm-4">
                            <select name="" class="form-control select2">
                              <option value="" selected disabled>Pilih Outlet</option>
                              <option value=""></option>
                            </select>
                          </div>
                        </div>
                        <!-- /target-unit /outlet -->
                        <div id="target-out"></div>
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <button type="button" class="btn btn-primary btn-block" id="add-target"><i class="fa fa-plus"></i>&nbsp;Tambah Target</button>
                          </div>
                        </div>
                        <!-- /add-target -->
                      </div>
                      <!-- /lower-col -->
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#add-target').click(function(event) {
      console.log('clicked');
      var target_selector = $('#target-out');
      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
      var element = '<div class="form-group row">' +
          '<label class="label-control col-sm-4">Produk</label>' +
          '<label class="label-control col-sm-4">Target Unit</label>' +
          '<label class="label-control col-sm-4">Outlet</label>' +
          '<div class="col-sm-4">' +
            '<select name="" class="form-control select2-single">' +
              '<option value="" selected disabled>Pilih Produk</option>' +
              '<option value=""></option>' +
            '</select>' +
          '</div>' +
          '<div class="col-sm-2">' +
            '<input type="number" name="" class="form-control border-primary" min="1" placeholder="Unit">' +
            '<p>*) Target per jual</p>' +
          '</div>' +
          '<div class="col-sm-4">' +
            '<select name="" class="form-control select2-single">' +
              '<option value="" selected disabled>Pilih Outlet</option>' +
              '<option value=""></option>' +
            '</select>' +
          '</div>' +
          '<div class="col-sm-2">' +
            '<button type="button" class="btn btn-danger" onclick="$(this).parent().parent().remove()"><i class="fa fa-times"></i></button>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);
      $('.select2-single').select2();
    });
  });
</script>