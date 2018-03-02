<?php 
  $status = array(
    'waiting' => '<span class="tag tag-pill tag-warning">Waiting</span>',
    'delivered' => '<span class="tag tag-pill tag-success">Delivered</span>',
  );
 ?>

<script type="text/javascript">
 function verifikasi_pbn(id){
   console.log(id);
   var hostname = window.location.origin;
   var path_array = window.location.pathname.split( '/' );
   var def_path = hostname + '/' + path_array[1] + '/' + path_array[2];

   $.ajax({
     url: def_path + '/show-verifikasi-pbn',
     type: 'POST',
     dataType: 'json',
     data: {id: id},
     success: function (data) {
      // console.log(data);
      var tr = $.map(data, function(item, index) {
        var td = $.map(item, function(it, id) {
          return '<td>' + it + '</td>';
        });
        return '<tr>' + td + '</tr>';
      });

      new_id = id.replace(/-/g, '/');

      $('#modal-produk').children().remove();
      $('#modal-produk').append(tr);
      $('#modal-kode-permohonan').text(new_id);
      $('#modal-input-kode-permohonan').val(id);
     },
   })
   .done(function() {
     console.log("success");
   })
   .fail(function() {
     console.log("error");
   })
   .always(function() {
     console.log("complete");
   });
 }
</script>

<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Stok Produk (Nucleus)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body collapse in">
              <div class="card-block">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="alert alert-success alert-dismissible fade in" id="alert" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong>Informasi!</strong> Tabel di bawah ini berisi informasi stok barang <strong>terkini</strong>. Informasi mengenai permintaan barang untuk keperluan pengisian stok produk Nucleus dapat dilihat pada tabel lain di halaman ini. Anda dapat menambah permintaan stok produk dengan menekan tautan <a href="#page-form" class="alert-link">ini</a>.
                    </div>
                    <div class="table-responsive height-300 border-top-red">
                      <table class="table table-xs table-hover mb-0">
                        <thead>
                          <tr>
                            <th width="10%">Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Kemasan</th>
                            <th width="15%">Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($stok_nucleus['data']->result() as $value): ?>
                          <tr>
                            <td><?php echo strtoupper($value->id); ?></td>
                            <td><?php echo $value->nama; ?></td>
                            <td><?php echo $value->kemasan; ?></td>
                            <td><?php echo $value->jumlah; ?></td>
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /stok-saat-ini -->
        </div>
      </div>
      <!-- /tabel-stok -->

      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Daftar Permohonan Barang (Delivered)</h4>
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
                  <table class="table table-xs table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Nomor Surat</th>
                        <th>Tanggal Permohonan</th>
                        <th>Tanggal Target</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($permohonan_delivered['data']->result() as $value): ?>  
                      <tr>
                        <td><?php echo str_replace('-', '/', $value->id); ?></td>
                        <?php $tanggal_permohonan = date('d-M-Y', strtotime($value->tanggal_permohonan)); ?>
                        <td><?php echo $tanggal_permohonan; ?></td>
                        <?php $tanggal_target = date('d-M-Y', strtotime($value->tanggal_target)); ?>
                        <td><?php echo $tanggal_target; ?></td>
                        <td><?php echo str_replace(array_keys($status), $status, $value->status) ?></td>
                        <td>
                          <div class="btn-group-vertical">
                            <a href="<?php echo site_url() ?>/detail-permohonan-barang-nucleus/<?php echo $value->id; ?>" class="btn btn-primary">Detail</a>
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
      <!-- /tabel-permohonan-delivered -->
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
                <!-- Tabel -->
                <div class="table-responsive height-350 border-top-red">
                  <table class="table table-xs table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Nomor Surat</th>
                        <th>Tanggal Permohonan</th>
                        <th>Tanggal Target</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($permohonan['data']->result() as $value): ?>  
                      <tr>
                        <td><?php echo str_replace('-', '/', $value->id); ?></td>
                        <?php $tanggal_permohonan = date('d-M-Y', strtotime($value->tanggal_permohonan)); ?>
                        <td><?php echo $tanggal_permohonan; ?></td>
                        <?php $tanggal_target = date('d-M-Y', strtotime($value->tanggal_target)); ?>
                        <td><?php echo $tanggal_target; ?></td>
                        <td><?php echo str_replace(array_keys($status), $status, $value->status) ?></td>
                        <td>
                          <div class="btn-group-vertical">
                            <?php if ($value->status !== 'delivered'): ?> 
                            <button type="button" class="btn btn-warning block" data-toggle="modal" data-backdrop="false" data-target="#verifikasi" onclick="verifikasi_pbn('<?php echo $value->id; ?>')">Verifikasi</button>
                            <?php endif; ?>
                            <a href="<?php echo site_url() ?>/detail-permohonan-barang-nucleus/<?php echo $value->id; ?>" class="btn btn-primary">Detail</a>
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
      <!-- /tabel-permohonan -->

      <div id="page-form" class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Surat Permohonan Barang</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url() ?>/simpan-permohonan-barang-nucleus" method="post">
                  <h4 class="form-section"><i class="fa fa-clipboard"></i>Nomor Surat Permohonan: <span class="tag tag-pill tag-primary"><?php echo str_replace('-', '/', $no_surat); ?></span></h4>
                  <?php $this->session->set_flashdata('no_surat', $no_surat); ?>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="label-control">Tanggal Permohonan</label>
                          <input type="date" name="tanggal_permohonan" class="form-control border-primary" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <!-- /tanggal-permohonan -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="label-control">Tanggal Target</label>
                          <input type="date" name="tanggal_target" class="form-control border-primary">
                          <p>*) Isi dengan tanggal target pengiriman barang dari pabrik ke Nucleus</p>
                        </div>
                      </div>
                      <!-- /tanggal-target -->
                    </div>
                    <!-- /row-1 -->
                  </div>
                  <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-archive"></i>Berikut adalah produk yang termasuk dalam surat permohonan</h4>
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
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
                      <!-- /left-col -->
                      <div class="col-sm-6 col-xs-12">
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
                      <div class="col-sm-6 offset-sm-6 col-xs-12">
                        <div class="form-group">
                          <button type="button" class="btn btn-primary btn-block" id="add-produk"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                        </div>
                      </div>
                    </div>
                    <!-- /button-row -->
                  </div>
                  <div class="form-actions" align="center">
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



<!-- modal-verifikasi -->
<div class="modal fade" id="verifikasi" role="dialog" aria-labelledby="verifikasi" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="verifikasi">Verifikasi Permohonan Barang</h4>
      </div>
      <!-- /modal-header -->
      <form class="form" role="form" method="POST" action="<?php echo site_url(); ?>/verifikasi-pbn">
        <div class="modal-body">
          <h5>Kode Permohonan&nbsp;<span class="tag tag-primary" id="modal-kode-permohonan">Kode</span></h5>
          <!-- /kode-permohonan -->
          <div class="row">
            <div class="col-xs-12">
              <div class="table-responsive border-top-blue">
                <table class="table table-xs table-hover mb-0">
                  <thead>
                    <tr>
                      <td>Kode Produk</td>
                      <td>Nama Produk</td>
                      <td>Kemasan</td>
                      <td>Jumlah</td>
                    </tr>
                  </thead>
                  <tbody id="modal-produk">
                    <tr>
                      <td>a</td>
                      <td>2</td>
                      <td>3</td>
                      <td>4</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /tabel-produk -->
          <hr>
          <div class="form-group">
            <label class="label-control">Status</label>
            <select name="status" class="form-control border-primary" required>
              <option value="" selected disabled>Pilih status</option>
              <option value="delivered">Delivered</option>
            </select>
          </div>
        </div>
        <!-- /modal-body -->
        <div class="modal-footer">
          <input type="hidden" name="kode_permohonan" id="modal-input-kode-permohonan">
          <button class="btn btn-success" type="submit">Simpan</button>
          <button class="btn btn-warning" type="button">Batal</button>
        </div>
        <!-- /modal-footer -->
      </form>
    </div>
  </div>
</div>
<!-- /modal-verifikasi -->

<script type="text/javascript">
  $(document).ready(function(){
    $('tbody > tr:odd').addClass('bg-table-blue');
    $('th, td').css({
      'text-align': 'center',
    });
  });
</script>

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

      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
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
              '<label class="label-control col-sm-12">Jumlah Permintaan</label>' +
              '<div class="col-sm-10">' +
                '<input type="number" name="jumlah[]" class="form-control border-primary">' +
              '</div>' +
              '<div class="col-sm-2">' +
                '<button type="button" class="btn btn-block btn-danger" onclick="$(this).parent().parent().parent().parent().remove()"><i class="fa fa-times"></i></button>' +
              '</div>' +
            '</div>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);
      $('.select2-single').select2();
    });
  });
</script>