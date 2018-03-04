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
              <h4 class="card-title">Stok Produk (Distributor)</h4>
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
                      <strong>Informasi!</strong> Tabel di bawah ini berisi informasi stok barang <strong>terkini</strong>. Stok barang akan bertambah apabila status Faktur KO adalah <strong>rilis</strong>.<br />Anda dapat melihat daftar status KO yang diajukan pada <a href="<?php echo site_url(); ?>/daftar-faktur" class="alert-link">halaman ini</a>.
                    </div>
                    <div class="table-responsive height-300 border-top-red">
                      <table class="table table-xs table-hover mb-0">
                        <thead>
                          <tr>
                            <th width="20%">Distributor</th>
                            <th width="10%">Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Kemasan</th>
                            <th width="15%">Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($stok_distributor['data']->result() as $value): ?>
                          <tr>
                            <td>(<?php echo $value->alias_distributor; ?>) <?php echo $value->nama_distributor; ?></td>
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
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('tbody > tr:odd').addClass('bg-table-blue');
    $('th, td').css({
      'text-align': 'center',
    });
  });
</script>