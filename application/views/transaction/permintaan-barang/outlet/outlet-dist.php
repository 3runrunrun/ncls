<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Daftar Permohonan Barang</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
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
                <div class="table-responsive height-350 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Nomor<br />Surat</th>
                            <th>Tanggal<br />Permohonan</th>
                            <th>Status</th>
                            <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($permohonan['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo str_replace('-', '/', $value->id); ?></td>
                          <?php $tanggal = date('d-M-Y', strtotime($value->tanggal)); ?>
                          <td><?php echo $tanggal; ?></td>
                          <td>
                            <?php if ($value->status == 'waiting'): ?>
                            <span class="tag tag-pill tag-warning">Waiting</span>
                              <?php else: ?>
                            <span class="tag tag-pill tag-success">Masuk Stok</span>
                              <?php endif ?>  
                          </td>
                          <td>
                            <div class="btn-group">
                              <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                  </table>
                </div>
                <!-- End of Tabel -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel-permohonan -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Surat Permohonan Barang</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                
                <form class="form" action="<?php echo site_url() ?>/simpan-permohonan-barang-outlet" method="POST">
                  <h4 class="form-section"><i class="fa fa-clipboard"></i>Nomor Surat Permohonan: <span class="tag tag-pill tag-primary"><?php echo str_replace('-', '/', $no_surat); ?></span></h4>
                  <?php $this->session->set_userdata('no_surat', $no_surat); ?>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Outlet</label>
                          <select name="id_outlet" class="form-control select2" onchange="show_area_by_outlet(this)">
                            <option value="" selected disabled>Pilih Outlet</option>
                            <?php if ($outlet['data']->num_rows() < 1): ?>
                            <option value="" disabled>Outlet belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($outlet['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /outlet -->
                      </div>
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Area</label>
                          <select name="id_area" class="form-control" id="area" readonly>
                            <!-- value here -->
                          </select>
                        </div>
                        <!-- /tanggal-permohonan -->
                      </div>
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Tanggal Permohonan</label>
                          <input type="date" name="tanggal" class="form-control border-primary" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <!-- /tanggal-permohonan -->
                      </div>
                    </div>
                  </div>
                  <!-- /upper-row -->
                  <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-archive"></i>Daftar Barang</h4>
                    <div class="bs-callout-info callout-border-left mt-1 p-1">
                      <strong>Perhatian!</strong>
                      <p>Pastikan anda mengisi distributor <strong>sesuai dengan area</strong> yang telah dipilih.</p>
                    </div><br />
                    <div class="row">
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Distributor</label>
                          <select name="id_distributor[]" id="distributor-list" class="form-control select2">
                            <option value="" selected disabled>Pilih Distributor</option>
                            <?php if ($distributor['data']->num_rows() < 1): ?>
                            <option value="" disabled>Distributor belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($distributor['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?> - (<?php echo $value->alias_distributor; ?>)</option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /id-distributor -->
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Produk</label>
                          <select name="id_produk[]" id="produk-list" class="form-control select2">
                            <option value="" selected disabled>Pilih Produk</option>
                            <?php if ($produk['data']->num_rows() < 1): ?>
                            <option value="">Produk belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($produk['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /id-produk -->
                      </div>
                      <!-- /mid-col -->
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Jumlah Permintaan</label>
                          <input type="number" name="jumlah[]" class="form-control border-primary">
                        </div>
                        <!-- /jumlah -->
                      </div>
                      <!-- /right-col -->
                    </div>
                    <div id="produk-out"></div>
                    <!-- #/produk-out -->
                    <div class="row">
                      <div class="col-sm-2 col-xs-12">
                        <div class="form-group">
                          <button type="button" class="btn btn-primary btn-block" id="add-produk"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                        </div>
                      </div>
                    </div>
                    <!-- /button-row -->
                  </div>
                  <div class="form-action" align="center">
                    <input type="submit" class="btn btn-success" name="" value="Simpan">
                    <input type="button" class="btn btn-warning mr-1" name="" value="Batal">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /form-permohonan-barang -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add-produk').click(function(event) {
      console.log('clicked');
      var target_selector = $('#produk-out');

      var dist_list = $('#distributor-list > option').map(function(){
        var id = $(this).val();
        var text = $(this).text();
        return '<option value="' + id + '">' + text + '</option>';
      }).get();

      var produk_list = $('#produk-list > option').map(function(){
        var id = $(this).val();
        var nama = $(this).text();
        return '<option value="' + id + '">' + nama + '</option>';
      }).get();

      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
      var element = '<div class="row">' +
          '<div class="col-sm-4 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Distributor</label>' +
              '<select name="id_distributor[]" class="form-control select2-single">' +
                dist_list +
              '</select>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-4 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Produk</label>' +
              '<select name="id_produk[]" class="form-control select2-single">' +
                produk_list +
              '</select>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-3 col-xs-10">' +
            '<div class="form-group">' +
              '<label class="label-control">Jumlah Permintaan</label>' +
              '<input type="number" name="jumlah[]" class="form-control border-primary">' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-1 col-xs-2">' +
            '<div class="form-group">' +
              '<label class="label-control">&nbsp;</label>' +
              '<button class="btn btn-danger btn-block" type="button" onclick="$(this).parent().parent().parent().remove()"><i class="fa fa-times"></i></button>' +
            '</div>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);
      $('.select2-single').select2();
    });
  });
</script>
<script type="text/javascript" src="<?php echo base_url() ?>/process-js/transaction/permintaan-barang/show-area-by-outlet.js"></script>
