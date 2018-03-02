<?php 
  $status = array(
    'waiting' => '<span class="tag tag-pill tag-warning">Waiting</span>',
    'delivered' => '<span class="tag tag-pill tag-success">Delivered</span>',
  );
 ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <?php $uri = explode('/', $_SERVER['REQUEST_URI']); ?>
              <?php $id = $uri[count($uri) - 1]; ?>
              <h4 class="card-title">Daftar Permohonan Barang <span class="tag tag-primary"><?php echo str_replace('-', '/', $id); ?></span></h4>
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
              </div>
              <!-- /alert -->

              <div class="card-block">
                <?php foreach ($permohonan_detail['data']->result() as $value): ?>
                <?php 
                  $tgl_permohonan = date('d-M-Y', strtotime($value->tanggal_permohonan));
                  $tgl_target = date('d-M-Y', strtotime($value->tanggal_target));
                 ?>
                <div class="row">
                  <div class="col-sm-4 col-xs-12">
                    <div class="card-subtitle">
                      <h5>Tanggal Permohonan: <?php echo $tgl_permohonan; ?></h5>
                    </div>
                  </div>
                  <div class="col-sm-4 col-xs-12">
                    <div class="card-subtitle">
                      <h5>Tanggal Target: <?php echo $tgl_target; ?></h5>
                    </div>
                  </div>
                  <div class="col-sm-4 col-xs-12">
                    <div class="card-subtitle">
                      <h5>Status: <?php echo str_replace(array_keys($status), $status, $value->status); ?></h5>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
                <!-- Tabel --><br />
                <div class="table-responsive height-350 border-top-red">
                  <table class="table table-xs table-hover mb-0">
                    <thead>
                      <tr>
                        <th width="10%">Kode Produk</th>
                        <th>Nama Produk</th>
                        <th width="15%">Kemasan</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($permohonan['data']->result() as $value): ?>
                      <tr>
                        <td><?php echo $value->id_produk; ?></td>
                        <td><?php echo $value->nama_produk; ?></td>
                        <td><?php echo $value->kemasan; ?></td>
                        <td><?php echo $value->jumlah; ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- End of Tabel -->
              </div>
              <!-- /tabel-permohonan -->

            </div>
          </div>
        </div>
      </div>
      <!-- /tabel-permohonan -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('th, td').css({
      'text-align': 'center',
    })
    $('td').addClass('text-truncate');
  });
</script>