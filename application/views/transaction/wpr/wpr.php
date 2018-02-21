<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- tabel-wpr-approved -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Weekly Promotion Report</h4>
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
                <div class="bs-callout-info callout-border-left mt-1 p-1">
                  <strong>Info!</strong>
                  <p>Tabel di bawah ini memuat seluruh pengajuan WPR yang <strong>telah disetujui</strong>.</p>
                </div><br />
                <!-- /alert -->
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Nomor WPR</th>
                            <th>Detailer</th>
                            <th>Dana Promosi<br />(Rp)</th>
                            <th>Status</th>
                            <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($wpr_approved['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo $value->no_wpr; ?></td>
                          <td><?php echo $value->nama_detailer; ?></td>
                          <td><?php echo number_format($value->dana, 2, ',', '.'); ?></td>
                          <td>
                            <?php if ($value->status == 'waiting'): ?>
                              <span class="tag tag-pill tag-warning">Waiting</span>
                            <?php else: ?>
                              <span class="tag tag-pill tag-success">Approved</span>
                            <?php endif ?>
                          </td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="#" class="btn btn-primary">Detail</a>
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
      <!-- /tabel-wpr-approved -->

      <!-- tabel-wpr-waiting -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-red">
            <div class="card-body">
              <div class="card-block">
                <div class="bs-callout-warning callout-border-left mt-1 p-1">
                  <strong>Info!</strong>
                  <p>Tabel di bawah ini memuat seluruh pengajuan WPR yang <strong>belum disetujui</strong>.</p>
                </div><br />
                <!-- /alert -->
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Nomor WPR</th>
                            <th>Detailer</th>
                            <th>Dana Promosi<br />(Rp)</th>
                            <th>Status</th>
                            <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($wpr_new['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo str_replace('-', '/', strtoupper($value->no_wpr)); ?></td>
                          <td><?php echo $value->nama_detailer; ?></td>
                          <td><?php echo number_format($value->dana, 2, ',', '.'); ?></td>
                          <td>
                            <?php if ($value->status == 'waiting'): ?>
                              <span class="tag tag-pill tag-warning">Waiting</span>
                            <?php else: ?>
                              <span class="tag tag-pill tag-success">Approved</span>
                            <?php endif ?>
                          </td>
                          <td>
                            <div class="btn-group-vertical">
                              <button class="btn btn-warning" type="button" onclick="approve_wpr('<?php echo $value->id; ?>', '<?php echo $value->no_wpr; ?>')">Approve</button>
                              <a href="#" class="btn btn-primary">Detail</a>
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
      <!-- /tabel-wpr-waiting -->

      <!-- tambah-wpr -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Form Pengajuan WPR</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/store-wpr" method="POST">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="row">
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label class="label-control col-xs-12">No. WPR</label>
                              <div class="col-xs-4">
                                <select name="prefix" class="form-control select2">
                                  <option value="dks">DKS</option>
                                  <option value="oth">OTH</option>
                                  <option value="tdr">TDR</option>
                                </select>
                              </div>
                              <!-- /prefix-wpr -->
                              <div class="col-xs-2">
                                <?php $wpr = '-HL-' . date('d-Y'); ?>
                                <?php $this->session->set_userdata('no_wpr', $wpr); ?>
                                <?php $show_wpr = str_replace('-', '/', $wpr); ?>
                                <span class="tag tag-primary tag-xl"><?php echo $show_wpr; ?></span>
                              </div>
                            </div>
                            <!-- /no_wpr -->
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
                            <!-- /detailer -->
                          </div>
                          <!-- /left-col -->
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label class="label-control col-sm-12">Dengan hormat, berikut beberapa alasan yang dapat menjadi dasar penerimaan pengajuan promosi:</label>
                              <div class="col-sm-12">
                                <textarea name="keterangan" cols="30" rows="5" class="form-control border-primary"></textarea>
                              </div>
                            </div>
                            <!-- /keterangan -->
                          </div>
                          <!-- /right-col -->
                        </div>
                      </div>
                    </div>
                    <!-- /upper-row -->
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="form-section"><i class="fa fa-user"></i>User</h4>
                        <div class="bs-callout-info callout-border-left mt-1 p-1">
                          <strong>Perhatian!</strong>
                            <p>Pastikan User <strong>telah terdaftar</strong> sebagai outlet, customer, atau customer (non).<br />Anda dapat mendaftarkan outlet pada <a href="<?php echo site_url() ?>/master-outlet" class="alert-link primary">halaman ini</a>, customer pada <a href="<?php echo site_url() ?>/master-customer" class="alert-link primary">halaman ini</a>, atau customer (non) pada <a href="<?php echo site_url() ?>/master-customer-non" class="alert-link primary">halaman ini</a>.</p>
                        </div><br />
                        <!-- /callout -->
                      </div>
                    </div>
                    <!-- /section /callout -->
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">User</label>
                          <select name="id_user[]" id="user-list" class="form-control select2">
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
                        <!-- /user -->
                        <div class="row">
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Bank</label>
                              <input type="text" name="bank[]" class="form-control border-primary" placeholder="Nama Bank">
                            </div>
                            <!-- /bank -->
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">No. Rekening</label>
                              <input type="number" name="no_rekening[]" class="form-control border-primary" placeholder="No. Rekening" min="0">
                            </div>
                            <!-- /no-rekening -->
                            <div class="form-group">
                              <label class="label-control">Atas Nama</label>
                              <input type="text" name="atas_nama[]" class="form-control border-primary" placeholder="Rekening a/n">
                            </div>
                            <!-- atas-nama -->
                          </div>
                        </div>
                        <!-- /bank /no-rekening /atas-nama -->
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-6 col-xs-12">
                        <div class="row">
                          <div class="col-xs-12">
                            <h6 class="form-section">Periode</h6>
                          </div>
                          <!-- /section -->
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Dari</label>
                              <select name="dari[]" class="form-control select2">
                                <option value="" selected disabled>Pilih Bulan</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                              </select>
                            </div>
                            <!-- /dari -->
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Sampai</label>
                              <select name="sampai[]" class="form-control select2">
                                <option value="" selected disabled>Pilih Bulan</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                              </select>
                            </div>
                            <!-- /sampai -->
                          </div>
                          <!-- /dari /sampai -->
                          <div class="col-xs-12">
                            <h6 class="form-section">Dana</h6>
                            <p>Berikut merupakan dana promosi yang ingin diajukan:</p>
                            <div class="form-group">
                              <label class="label-control">Dana Promosi</label>
                              <fieldset>
                                <div class="input-group">
                                  <span class="input-group-addon">Rp</span>
                                  <input type="number" name="dana[]" class="form-control border-primary">
                                </div>
                              </fieldset>
                            </div>
                          </div>
                          <!-- /dana -->
                        </div>
                      </div>
                      <!-- /right-col -->
                    </div>
                    <!-- /upper-row -->
                    <div id="dana-wrp-out"></div>
                    <div align="center">
                      <button type="button" id="add-dana-wpr" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Rincian Dana</button>
                    </div>
                    <div class="form-actions" align="right">
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
    $('#add-dana-wpr').click(function(event) {
      console.log('clicked');
      var target_selector = $('#dana-wrp-out');

      var user_list = $('#user-list > option').map(function(){
        var id = $(this).val();
        var teks = $(this).text();
        return '<option value="' + id + '">' + teks + '</option>';
      }).get();

      var element = '<div class="row">' +
          '<div class="form-actions" align="right">' +
            '<div class="col-xs-4 offset-xs-8">' +
              '<button class="btn btn-danger" type="button" onclick="$(this).parent().parent().parent().remove()"><i class="fa fa-times"></i>&nbsp;Hapus Form Pengajuan Baru</button>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-6 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Customer / Customer (Non)</label>' +
              '<select name="id_user[]" class="form-control select2-single">' +
                user_list +
              '</select>' +
            '</div>' +
            '<div class="row">' +
              '<div class="col-sm-6 col-xs-12">' +
                '<div class="form-group">' +
                  '<label class="label-control">Bank</label>' +
                  '<input type="text" name="bank[]" class="form-control border-primary" placeholder="Nama Bank">' +
                '</div>' +
              '</div>' +
              '<div class="col-sm-6 col-xs-12">' +
                '<div class="form-group">' +
                  '<label class="label-control">No. Rekening</label>' +
                  '<input type="number" name="no_rekening[]" class="form-control border-primary" placeholder="No. Rekening" min="0">' +
                '</div>' +
                '<div class="form-group">' +
                  '<label class="label-control">Atas Nama</label>' +
                  '<input type="text" name="atas_nama[]" class="form-control border-primary" placeholder="Rekening a/n">' +
                '</div>' +
              '</div>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-6 col-xs-12">' +
            '<div class="row">' +
              '<div class="col-xs-12">' +
                '<h6 class="form-section">Periode</h6>' +
              '</div>' +
              '<div class="col-sm-6 col-xs-12">' +
                '<div class="form-group">' +
                  '<label class="label-control">Dari</label>' +
                  '<select name="dari[]" class="form-control select2-single">' +
                    '<option value="" selected disabled>Pilih Bulan</option>' +
                    '<option value="01">January</option>' +
                    '<option value="02">February</option>' +
                    '<option value="03">March</option>' +
                    '<option value="04">April</option>' +
                    '<option value="05">May</option>' +
                    '<option value="06">June</option>' +
                    '<option value="07">July</option>' +
                    '<option value="08">August</option>' +
                    '<option value="09">September</option>' +
                    '<option value="10">October</option>' +
                    '<option value="11">November</option>' +
                    '<option value="12">December</option>' +
                  '</select>' +
                '</div>' +
              '</div>' +
              '<div class="col-sm-6 col-xs-12">' +
                '<div class="form-group">' +
                  '<label class="label-control">Sampai</label>' +
                  '<select name="sampai[]" class="form-control select2-single">' +
                    '<option value="" selected disabled>Pilih Bulan</option>' +
                    '<option value="01">January</option>' +
                    '<option value="02">February</option>' +
                    '<option value="03">March</option>' +
                    '<option value="04">April</option>' +
                    '<option value="05">May</option>' +
                    '<option value="06">June</option>' +
                    '<option value="07">July</option>' +
                    '<option value="08">August</option>' +
                    '<option value="09">September</option>' +
                    '<option value="10">October</option>' +
                    '<option value="11">November</option>' +
                    '<option value="12">December</option>' +
                  '</select>' +
                '</div>' +
              '</div>' +
              '<div class="col-xs-12">' +
                '<h6 class="form-section">Dana</h6>' +
                '<p>Berikut merupakan dana promosi yang ingin diajukan:</p>' +
                '<div class="form-group">' +
                  '<label class="label-control">Dana Promosi</label>' +
                  '<fieldset>' +
                    '<div class="input-group">' +
                      '<span class="input-group-addon">Rp</span>' +
                      '<input type="number" name="dana[]" class="form-control border-primary">' +
                    '</div>' +
                  '</fieldset>' +
                '</div>' +
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
  function approve_wpr(id, no_wpr) {
    var r = confirm("Anda yakin untuk menyetujui pengajuan WPR ini?");
    if (r == true) {
      $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/store-wpr/approve",
        data: {
          'id': id,
          'no_wpr': no_wpr
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