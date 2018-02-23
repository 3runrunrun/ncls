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
              <!-- alert -->
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
                <div class="bs-callout-info callout-border-left mt-1 p-1">
                  <strong>Perhatian!</strong><br />
                  <p>Tabel di bawah ini memuat seluruh pengajuan promo yang <strong>telah disetujui</strong>.</p>
                </div><br />
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>Nomor Promo Trial</th>
                          <th>Detailer</th>
                          <th>User</th>
                          <th>Status</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($promo_approved['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo str_replace('-', '/', $value->no_promo) ?></td>
                          <td><?php echo $value->nama_detailer; ?></td>
                          <td><?php echo $value->nama_user; ?></td>
                          <td>
                            <?php if ($value->status == 'waiting'): ?>
                              <span class="tag tag-pill tag-warning">Waiting</span>
                            <?php else: ?>
                              <span class="tag tag-pill tag-success">Approved</span>
                            <?php endif ?>
                          </td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="#" class="btn btn-primary btn-block">Detail</a>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
                <!-- End of Tabel -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel-pt=approved -->

      <!-- tabel-pt-waiting -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-red">
            <div class="card-body">
              <div class="card-block">
                <div class="bs-callout-warning callout-border-left mt-1 p-1">
                  <strong>Info!</strong>
                  <p>Tabel di bawah ini memuat seluruh pengajuan promo trial yang <strong>belum disetujui</strong>.</p>
                </div><br />
                <!-- /alert -->
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>Nomor Promo Trial</th>
                          <th>Detailer</th>
                          <th>User</th>
                          <th>Status</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($promo_waiting['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo str_replace('-', '/', $value->no_promo) ?></td>
                          <td><?php echo $value->nama_detailer; ?></td>
                          <td><?php echo $value->nama_user; ?></td>
                          <td>
                            <?php if ($value->status == 'waiting'): ?>
                              <span class="tag tag-pill tag-warning">Waiting</span>
                            <?php else: ?>
                              <span class="tag tag-pill tag-success">Approved</span>
                            <?php endif ?>
                          </td>
                          <td>
                            <div class="btn-group-vertical">
                              <button class="btn btn-warning btn-block" type="button" onclick="approve_pt('<?php echo $value->id; ?>', '<?php echo $value->no_promo; ?>')">Approve</button>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
                <!-- End of Tabel -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel-pt-waiting -->

      <!-- form-promo-trial -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Form Pengajuan Promo Trial</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/store-pt" method="POST">
                  <div class="form-body">
                    <div class="bs-callout-info callout-border-left mt-1 p-1">
                      <strong>Perhatian!</strong>
                      <p>Pastikan User <strong>telah terdaftar</strong> sebagai outlet, customer, atau customer (non).<br />Anda dapat mendaftarkan outlet pada <a href="<?php echo site_url() ?>/master-outlet" class="alert-link primary">halaman ini</a>, customer pada <a href="<?php echo site_url() ?>/master-customer" class="alert-link primary">halaman ini</a>, atau customer (non) pada <a href="<?php echo site_url() ?>/master-customer-non" class="alert-link primary">halaman ini</a>.</p>
                    </div><br />
                    <!-- /callout -->
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Nomor Trial</label><br />
                          <?php $no_promo = 'FPT-HL-' . date('d-Y'); ?>
                          <?php $this->session->set_userdata('no_promo', $no_promo); ?>
                          <span class="tag tag-xl tag-primary"><?php echo str_replace('-', '/', $no_promo); ?></span>
                        </div>
                        <!-- /no-promo -->
                        <div class="form-group">
                          <label class="label-control">Detailer</label>
                          <select name="id_detailer" class="form-control select2">
                            <option value="" selected disabled>Pilih Detailer</option>
                            <?php if ($detailer['data']->num_rows() < 1): ?>
                            <option value="" disabled>Detailer belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($detailer['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /id-detailer -->
                        <div class="form-group">
                          <label class="label-control">User</label>
                          <select name="id_user" class="form-control select2">
                            <option value="" selected disabled>Pilih User</option>
                            <?php if ($user_customer['data']->num_rows() < 1): ?>
                            <option value="" disabled>Outlet belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($user_customer['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - dr. <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                          <p>* ) User berisi Outlet/Customer/Customer (Non)</p>
                        </div>
                        <!-- /id-user -->
                      </div>
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section"><i class="fa fa-list"></i>Produk Trial</h4>
                        <div class="row">
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Produk</label>
                              <select name="id_produk[]" id="produk-list" class="form-control select2">
                                <option value="" selected disabled>Pilih Produk</option>
                                <?php if ($produk['data']->num_rows() < 1): ?>
                                <option value="" disabled>Produk belum tersedia</option>
                                <?php else: ?>
                                <?php foreach ($produk['data']->result() as $value): ?>
                                <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                            </div>
                            <!-- /id-produk -->
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Jumlah</label>
                              <input type="number" name="jumlah[]" id="" class="form-control border-primary" placeholder="Jumlah produk" min="1">
                            </div>
                            <!-- /jumlah -->
                          </div>
                        </div>
                        <div id="produk-out"></div>
                        <div class="row">
                          <div class="col-sm-4 offset-sm-8 col-xs-12">
                            <div class="form-group">
                              <button id="add-produk" class="btn btn-primary btn-block" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                            </div>
                            <!-- /add-produk -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-actions" align="center">
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
      <!-- /form-promo-trial -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add-produk').click(function(event) {
      console.log('clicked');
      var target_selector = $('#produk-out');

      var produk_list = $('#produk-list > option').map(function(){
        var id = $(this).val();
        var nama = $(this).text();
        return '<option value="' + id + '">' + nama + '</option>';
      }).get();

      var element = '<div class="row">' +
          '<div class="col-sm-6 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Produk</label>' +
              '<select name="id_produk[]" class="form-control select2-single">' +
                produk_list +
              '</select>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-6 col-xs-12">' +
            '<div class="form-group row">' +
              '<label class="label-control col-xs-12">Jumlah</label>' +
              '<div class="col-xs-8">' +
                '<input type="number" name="jumlah[]" class="form-control border-primary " placeholder="Jumlah produk" min="1">' +
              '</div>' +
              '<div class="col-xs-4">' +
                '<button class="btn btn-danger btn-block" type="button" onclick="$(this).parent().parent().parent().parent().remove()"><i class="fa fa-times"></i></button>' +
              '</div>' +
            '</div>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);
      $('.select2-single').select2();
    });
  });
</script>
<script type="text/javascript">
  function approve_pt(id, no_promo) {
    var r = confirm("Anda yakin untuk menyetujui pengajuan promo ini?");
    if (r == true) {
      $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/store-pt/approve",
        data: {
          'id': id,
          'no_promo': no_promo
        },
        dataType: "text",
           success:  function(data) {
               location.reload();
           },
           error: function(x, t, m) {

           }
      });
    } else {

    } 
  }
</script>