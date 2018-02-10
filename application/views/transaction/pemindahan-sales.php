<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Pemindahan Sales</h4>
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
                        <th>Nomor<br />Surat</th>
                        <th>Dari Outlet</th>
                        <th>Dari Detailer</th>
                        <th>Ke Outlet</th>
                        <th>Ke Detailer</th>
                        <th>Periode</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for ($i=0; $i < 8; $i++): ?>
                      <tr>
                        <td>CHG/SAL/<?php echo date('m/Y'); ?></td>
                        <td>RS Jantung Harapan Kita</td>
                        <td>Fathir Izzuddin Qisthi</td>
                        <td>RS Siti Hajar</td>
                        <td>Sandita</td>
                        <td><?php echo date('d-M-Y'); ?></td>
                        <td>
                          <span class="tag tag-pill tag-success">Approved</span>
                        </td>
                        <td>
                          <div class="btn-group-vertical">
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
              <h4 class="card-title">Form Pemindahan Sales</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section">Dari</h4>
                        <div class="form-group">
                          <label class="label-control">Detailer</label>
                          <select name="" class="form-control select2">
                            <option value="" selected disabled>Pilih Detailer</option>
                            <option value=""></option>
                          </select>
                        </div>
                        <!-- /detailer -->
                        <div class="form-group">
                          <label class="label-control">Outlet</label>
                          <select name="" class="form-control select2">
                            <option value="" selected disabled>Pilih Outlet</option>
                            <option value=""></option>
                          </select>
                        </div>
                        <!-- /Outlet -->
                      </div>
                      <!-- /left-row -->
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section">Ke</h4>
                        <div class="form-group">
                          <label class="label-control">Detailer</label>
                          <select name="" class="form-control select2">
                            <option value="" selected disabled>Pilih Detailer</option>
                            <option value=""></option>
                          </select>
                        </div>
                        <!-- /detailer -->
                        <div class="form-group">
                          <label class="label-control">Outlet</label>
                          <select name="" class="form-control select2">
                            <option value="" selected disabled>Pilih Outlet</option>
                            <option value=""></option>
                          </select>
                        </div>
                        <!-- /Outlet -->
                      </div>
                      <!-- /right-row -->
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-xs-12 offset-sm-3">
                        <h4 class="form-section"><i class="fa fa-medkit"></i>Produk</h4>
                        <div class="form-group">
                          <label class="label-control">Periode</label>
                          <input type="date" name="" class="form-control">
                          <p>*) Tanggal pemindahan</p>
                        </div>
                        <div class="form-group row">
                          <label class="label-control col-sm-6">Produk</label>
                          <label class="label-control col-sm-6">Jumlah</label>
                          <div class="col-sm-6">
                            <select name="" class="form-control select2">
                              <option value="" selected disabled>Pilih Produk</option>
                              <option value=""></option>
                            </select>
                          </div>
                          <div class="col-sm-6">
                            <input type="number" name="" class="form-control" min="1" placeholder="Jumlah (Unit)">
                          </div>
                        </div>
                        <!-- /produk /jumlah -->
                        <div id="produk-out"></div>
                        <div class="form-group row">
                          <div class="col-sm-6 pull-right">
                            <button type="button" id="add-produk" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                          </div>
                        </div>
                      </div>
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
      <!-- /pemindahan-sales -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add-produk').click(function(event) {
      console.log('clicked');
      var target_selector = $('#produk-out');
      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
      var element = '<div class="form-group row">' +
          '<label class="label-control col-sm-6">Produk</label>' +
          '<label class="label-control col-sm-6">Jumlah</label>' +
          '<div class="col-sm-6">' +
            '<select name="" class="form-control select2">' +
              '<option value="" selected disabled>Pilih Produk</option>' +
              '<option value=""></option>' +
            '</select>' +
          '</div>' +
          '<div class="col-sm-4">' +
            '<input type="number" name="" class="form-control" min="1" placeholder="Jumlah (Unit)">' +
          '</div>' +
          '<div class="col-sm-2">' +
            '<button type="button" class="btn btn-block btn-danger" onclick="$(this).parent().parent().remove()"><i class="fa fa-times"></i></button>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);
    });
  });
</script>