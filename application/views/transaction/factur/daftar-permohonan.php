<?php 
  $status = array(
    'belum' => '<span class="tag tag-pill tag-danger">Belum Diproses</span>',
    'spv' => '<span class="tag tag-pill tag-warning">Approved by SPV</span>',
    'rm' => '<span class="tag tag-pill tag-warning">Approved by RM</span>',
    'rilis' => '<span class="tag tag-pill tag-success">Rilis</span>'
  );

  $jenis_ko = array(
    'off' => '<span class="tag tag-pill tag-info">Off Faktur</span>',
    'on' => '<span class="tag tag-pill tag-info">On Faktur</span>',
    'both' => '<span class="tag tag-pill tag-success">On &amp; Off Faktur</span>',
  );
 ?>

<script type="text/javascript">
  function verifikasi_general(id){
    console.log(id);
    var hostname = window.location.origin;
    var path_array = window.location.pathname.split( '/' );
    var hostname = window.location.origin;
    var def_path = hostname;
    if (~hostname.indexOf('localhost')) {
      def_path = hostname + '/' + path_array[1];    
      console.log(def_path);
    } else {
      def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
      console.log(def_path);
    }

    $('#span-no-faktur').text(id.replace(/-/g, '/'));
    $('#modal-no-faktur').val(id);

    /*$.ajax({
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
    });*/
  }

  function verifikasi_tender(id){
    console.log(id);
    var hostname = window.location.origin;
    var path_array = window.location.pathname.split( '/' );
    var hostname = window.location.origin;
    var def_path = hostname;
    if (~hostname.indexOf('localhost')) {
      def_path = hostname + '/' + path_array[1];    
      console.log(def_path);
    } else {
      def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
      console.log(def_path);
    }

    $('#span-no-faktur-tender').text(id.replace(/-/g, '/'));
    $('#modal-no-faktur-tender').val(id);

    /*$.ajax({
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
    });*/
  }
</script>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- general -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Daftar Faktur (General)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <!-- pencarian -->
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form method="post" class="form-horizontal">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-3">Jenis<br />Distributor</label>
                        <div class="col-sm-6">
                          <select name="id_m_distributor" class="form-control select2">
                            <option value="" selected disabled>Pilih Distributor</option>
                            <!-- disini foreachnya -->
                            <?php if ($master_distributor['data']->num_rows() < 1): ?>
                            <option value="" selected disabled>Distributor belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($master_distributor['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->alias_distributor); ?></option>
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
              </div>
              <!-- /alert -->

              <!-- tabel -->
              <div class="card-block">
                <div class="table-responsive height-500 border-top-red">
                  <table class="table table-xs table-hover">
                    <thead>
                      <tr>
                        <th>Nomor Faktur</th>
                        <th>SPV / RM<br />(yang mengajukan)</th>
                        <th>Tanggal</th>
                        <th>Jenis Diskon</th>
                        <th>Tanggal<br />Spv</th>
                        <th>Tanggal<br />RM</th>
                        <th>Tanggal<br />Direktur</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($ko_general['data']->result() as $value): ?>
                      <?php $tanggal = date('d-M-Y', strtotime($value->tanggal)); ?>
                      <tr>
                        <td><?php echo str_replace('-', '/', $value->id); ?></td>
                        <td><?php echo $value->nama_detailer; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo str_replace(array_keys($jenis_ko), $jenis_ko, $value->jenis_ko); ?></td>
                        <td><?php echo $value->tgl_spv; ?></td>
                        <td><?php echo $value->tgl_rm; ?></td>
                        <td><?php echo $value->tgl_direktur; ?></td>
                        <td><?php echo str_replace(array_keys($status), $status, $value->status); ?></td>
                        <td>
                          <div class="btn-group-vertical">
                            <?php if ($value->status != 'rilis'): ?>
                            <button type="button" class="btn btn-warning block" data-toggle="modal" data-backdrop="false" data-target="#verifikasi-general" onclick="verifikasi_general('<?php echo $value->id; ?>')">Verifikasi</button>
                            <?php endif; ?>
                            <a href="<?php echo site_url(); ?>/detail-faktur-general/<?php echo $value->id; ?>" class="btn btn-primary">Detail</a>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- End of Tabel -->
              </div>
              <!-- /tabel -->
            </div>
          </div>
        </div>
      </div>
      <!-- /general -->      

      <!-- tender -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Daftar Faktur</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form method="post" class="form-horizontal">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-3">Jenis<br />Distributor</label>
                        <div class="col-sm-6">
                          <select name="id_m_distributor" class="form-control select2">
                            <option value="" selected disabled>Pilih Distributor</option>
                            <!-- disini foreachnya -->
                            <?php if ($master_distributor['data']->num_rows() < 1): ?>
                            <option value="" selected disabled>Distributor belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($master_distributor['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->alias_distributor); ?></option>
                            <?php endforeach; ?>  
                            <?php endif; ?>
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
              </div>
              <!-- /alert -->

              <div class="card-block">
                <!-- Tabel -->
                <div class="table-responsive height-500 border-top-red">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>SP</th>
                        <th>Nomor Faktur</th>
                        <th>SPV / RM<br />(yang mengajukan)</th>
                        <th>Tanggal</th>
                        <th>Jenis Diskon</th>
                        <th>Tanggal<br />Spv</th>
                        <th>Tanggal<br />RM</th>
                        <th>Tanggal<br />Direktur</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($ko_tender['data']->result() as $value_t): ?>
                      <?php $tanggal_t = date('d-M-Y', strtotime($value_t->tanggal)); ?>
                      <tr>
                        <td><?php echo $value_t->sp; ?></td>
                        <td><?php echo str_replace('-', '/', $value_t->id); ?></td>
                        <td><?php echo $value_t->nama_detailer; ?></td>
                        <td><?php echo $tanggal_t; ?></td>
                        <td><?php echo str_replace(array_keys($jenis_ko), $jenis_ko, $value_t->jenis_ko); ?></td>
                        <td><?php echo $value_t->tgl_spv; ?></td>
                        <td><?php echo $value_t->tgl_rm; ?></td>
                        <td><?php echo $value_t->tgl_direktur; ?></td>
                        <td><?php echo str_replace(array_keys($status), $status, $value_t->status); ?></td>
                        <td>
                          <div class="btn-group-vertical">
                            <?php if ($value_t->status != 'rilis'): ?>
                            <button type="button" class="btn btn-warning block" data-toggle="modal" data-backdrop="false" data-target="#verifikasi-tender" onclick="verifikasi_tender('<?php echo $value_t->id; ?>')">Verifikasi</button>
                            <?php endif; ?>
                            <a href="<?php echo site_url(); ?>/detail-faktur-tender/<?php echo $value_t->id; ?>" class="btn btn-primary">Detail</a>
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
      <!-- /tender -->
    </div>
  </div>
</div>

<!-- modal-general -->
<div class="modal fade" id="verifikasi-general" role="dialog" aria-labelledby="verifikasi-faktur-general" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="verifikasi-faktur-general">Verifikasi Faktur</h4>
      </div>
      <!-- /modal-header -->
      <form class="form" role="form" method="POST" action="<?php echo site_url(); ?>/verifikasi-ko-general">
        <div class="modal-body">
          <div class="form-group">
            <label class="label-control">No. Faktur</label><br />
            <span class="tag tag-primary tag-xl" id="span-no-faktur"></span>
            <input type="hidden" name="id" id="modal-no-faktur" class="form-control border-primary">
          </div>
          <div class="form-group">
            <label class="label-control">Tanggal Verifikasi</label>
            <input type="date" name="tanggal" class="form-control border-primary" value="<?php echo date('Y-m-d'); ?>">
          </div>
          <div class="form-group">
            <label class="label-control col-xs-12">Status</label>
            <select name="status" class="form-control">
              <option value="" selected disabled>Pilih Status</option>
              <option value="spv">Mengetahui Supervisor</option>
              <option value="rm">Mengetahui RM</option>
              <option value="rilis">Menyetujui Direktur</option>
            </select>
          </div>
        </div>
        <!-- /modal-body -->
        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
          <button class="btn btn-warning" type="reset">Batal</button>
        </div>
        <!-- /modal-footer -->
      </form>
    </div>
  </div>
</div>
<!-- /modal-general -->

<!-- modal-tender -->
<div class="modal fade" id="verifikasi-tender" role="dialog" aria-labelledby="verifikasi-faktur-tender" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="verifikasi-faktur-tender">Verifikasi Faktur</h4>
      </div>
      <!-- /modal-header -->
      <form class="form" role="form" method="POST" action="<?php echo site_url(); ?>/verifikasi-ko-tender">
        <div class="modal-body">
          <div class="form-group">
            <label class="label-control">No. Faktur</label><br />
            <span class="tag tag-primary tag-xl" id="span-no-faktur-tender"></span>
            <input type="hidden" name="id" id="modal-no-faktur-tender" class="form-control border-primary">
          </div>
          <div class="form-group">
            <label class="label-control">Tanggal Verifikasi</label>
            <input type="date" name="tanggal" class="form-control border-primary" value="<?php echo date('Y-m-d'); ?>">
          </div>
          <div class="form-group">
            <label class="label-control col-xs-12">Status</label>
            <select name="status" class="form-control">
              <option value="" selected disabled>Pilih Status</option>
              <option value="spv">Mengetahui Supervisor</option>
              <option value="rm">Mengetahui RM</option>
              <option value="rilis">Menyetujui Direktur</option>
            </select>
          </div>
        </div>
        <!-- /modal-body -->
        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
          <button class="btn btn-warning" type="reset">Batal</button>
        </div>
        <!-- /modal-footer -->
      </form>
    </div>
  </div>
</div>
<!-- /modal-tender -->

<script type="text/javascript">
  $(document).ready(function() {
    $('th').css({
      'text-align': 'center',
    });
    $('td').css({
      'vertical-align': 'middle',
    });
    $('td').addClass('text-truncate');
  });
</script>