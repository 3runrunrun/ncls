<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Subdist</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">

              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form method="post" class="form-horizontal">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-3">Area</label>
                        <div class="col-sm-6">
                          <select name="id_m_distributor" class="form-control select2">
                            <option value="" selected disabled>Pilih Area</option>
                            <!-- disini foreachnya -->
                            <?php if ($area['data']->num_rows() < 1): ?>
                            <option value="" selected disabled>Area belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($area['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo strtoupper($value->alias_area); ?>) <?php echo strtoupper($value->area); ?></option>
                            <?php endforeach ?>  
                            <?php endif ?>
                          </select>
                        </div>
                        <div class="col-sm-3">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Tampil</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /pencarian -->
              <div class="card-block">
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th width="30%">Subdist</th>
                            <th width="10%">Distributor</th>
                            <th width="10%">Area</th>
                            <th width="10%">Achievement</th>
                            <th width="10%">Target</th>
                            <th width="10%">Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < 20; $i++): ?>
                        <tr>
                          <td>Nama Subdistributor</td>
                          <td>PTKP</td>
                          <td>JAKARTA</td>
                          <td><?php echo rand(25, 69); ?>%</td>
                          <td><?php echo rand(70, 100); ?>%</td>
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
              <h4 class="card-title">Form  Permintaan Barang Subdistributor</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 offset-md-3">
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Distributor</label>
                          <div class="col-sm-12">
                            <select name="" class="form-control select2">
                              <option value="" selected disabled>Pilih Distributor</option>
                              <?php if ($distributor['data']->num_rows() < 1): ?>
                              <option value="">Distributor belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($distributor['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->alias_distributor); ?> (<?php echo $value->area ?>)</option>
                              <?php endforeach ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <!-- /distributor -->
                        <div class="form-group row">
                          <label class="label-control col-sm-6">Produk</label>
                          <label class="label-control col-sm-6">Jumlah Produk</label>
                          <div class="col-sm-6">
                            <select name="" class="form-control select2">
                              <option value="" selected disabled>Pilih Produk</option>
                              <option value=""></option>
                            </select>
                          </div>
                          <div class="col-sm-6">
                            <input type="number" name="" class="form-control border-primary" min="1" placeholder="Jumlah Produk">
                          </div>
                        </div>
                        <!-- /produk /jumlah-produk -->
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
      <!-- /tambah-wpr -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add-produk').click(function(event) {
      // console.log('clicked');
      var target_selector = $('#produk-out');
      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
      var element = '<div class="form-group row">' +
          '<label class="label-control col-sm-6">Produk</label>' +
          '<label class="label-control col-sm-6">Jumlah Produk</label>' +
          '<div class="col-sm-6">' +
            '<select name="" class="form-control select2">' +
              '<option value="" selected disabled>Pilih Produk</option>' +
              '<option value=""></option>' +
            '</select>' +
          '</div>' +
          '<div class="col-sm-4">' +
            '<input type="number" name="" class="form-control border-primary" min="1" placeholder="Jumlah Produk">' +
          '</div>' +
          '<div class="col-sm-2">' +
            '<button type="button" class="btn btn-block btn-danger" onclick="$(this).parent().parent().remove()"><i class="fa fa-times"></i></button>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);
    });
  });
</script>