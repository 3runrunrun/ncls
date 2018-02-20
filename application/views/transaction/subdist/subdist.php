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
                <!-- alert -->
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
                <div class="bs-callout-info callout-border-right mt-1 p-1">
                  <strong>Info!</strong>
                  <p>Tabel di bawah ini berisi akumulasi seluruh permintaan barang <strong>oleh</strong> subdistributor <strong>kepada</strong> distributor yang telah tersimpan di dalam sistem.<br />Untuk melihat detail permintaan setiap subdistributor ke distributor <strong>klik tombol di kolom kanan pada tabel</strong>.</p>
                </div><br />
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th width="30%">Distributor<br />(Jenis Distributor)</th>
                            <th width="30%">Area</th>
                            <th width="30%">Jumlah<br />Permintaan</th>
                            <th width="10%">Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($subdist_report['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo $value->nama; ?> (<?php echo $value->alias_distributor; ?>)</td>
                          <td><?php echo $value->area; ?> (<?php echo $value->alias_area; ?>)</td>
                          <td><?php echo $value->jumlah; ?></td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="<?php echo site_url() ?>/subdist-detail/<?php echo $value->id_distributor; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
                <form class="form" action="<?php echo site_url(); ?>/store-subdist" method="POST">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 offset-md-3">
                        <!-- /alert -->
                        <div class="row">
                          <div class="alert alert-warning mb-2" role="alert">
                            <strong>Perhatian!</strong> Sebelum menambahkan data permintaan subdist, pastikan subdistributor <strong>telah</strong> terdaftar di dalam sistem. Anda dapat mendaftarkan subdistributor pada <a href="<?php echo site_url() ?>/master-subdist" class="alert-link">halaman ini</a>.
                          </div>
                        </div>
                        <!-- ./alert -->
                        <div class="form-group">
                          <label class="label-control">Tanggal Permintaan</label>
                          <input type="date" name="tanggal" class="form-control border-primary" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <!-- /tanggal -->
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Subdistributor</label>
                          <div class="col-sm-12">
                            <select name="id_subdist" class="form-control select2">
                              <option value="" selected disabled>Pilih Subdistributor</option>
                              <?php if ($subdist['data']->num_rows() < 1): ?>
                              <option value="">Subdistributor belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($subdist['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                              <?php endforeach; ?>
                              <?php endif; ?>
                            </select>
                            <p>* ) (Area) - Kode Subdist - Subdist</p>
                          </div>
                        </div>
                        <!-- /subdist -->
                        <div class="form-group">
                          <label class="label-control">Distributor</label>
                          <select name="id_distributor" class="form-control select2">
                            <option value="" selected disabled>Pilih Distributor</option>
                            <?php if ($distributor['data']->num_rows() < 1): ?>
                            <option value="" disabled>Distributor belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($distributor['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?> - (<?php echo $value->alias_distributor; ?>)</option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                          <p>* ) (Area) - Kode Dist - Distributor - (Jenis Dist)</p>
                        </div>
                        <!-- /distributor -->
                        <div class="row">
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Produk</label>
                              <select name="id_produk[]" id="produk" class="form-control select2">
                                <option value="" selected disabled>Pilih Produk</option>
                                <?php if ($produk['data']->num_rows() < 1): ?>
                                <option value="" disabled>Produk belum tersedia</option>
                                <?php else: ?>
                                <?php foreach ($produk['data']->result() as $value): ?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                            </div>
                          </div>
                          <!-- /left-col -->
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Jumlah Produk</label>
                              <input type="number" name="jumlah[]" class="form-control border-primary" min="1" placeholder="Jumlah Produk">
                            </div>                            
                          </div>
                          <!-- /right-col -->
                        </div>
                        <!-- /produk /jumlah-produk -->
                        <div id="produk-out"></div>
                        <div class="form-group row">
                          <div class="col-sm-6 pull-right">
                            <button type="button" id="add-produk" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                          </div>
                        </div>
                      </div>
                      <!-- /upper-row -->
                    </div>
                  </div>
                  <div class="form-actions" align="center">
                    <input type="submit" class="btn btn-success" name="" value="Simpan">
                    <input type="button" class="btn btn-warning mr-1" name="" value="Batal">
                  </div>
                  <!-- /submit -->
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
      var options = $('#produk > option').map(function(){
        var id = $(this).val();
        var nama = $(this).text();
        return '<option value="' + id + '">' + nama + '</option>';
      }).get();

      var element = '<div class="row">' +
          '<div class="col-sm-6 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Produk</label>' +
              '<select name="id_produk[]" class="form-control select2-single">' +
                options +
              '</select>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-4 col-xs-10">' +
            '<div class="form-group">' +
              '<label class="label-control">Jumlah Produk</label>' +
              '<input type="number" name="jumlah[]" class="form-control border-primary" min="1" placeholder="Jumlah Produk">' +
            '</div>                            ' +
          '</div>' +
          '<div class="col-sm-2 col-xs-2">' +
            '<div class="form-group">' +
              '<label class="label-contol">&nbsp;</label>' +
              '<button type="button" onclick="$(this).parent().parent().parent().remove()" class="btn btn-danger btn-block"><i class="fa fa-times"></i></button>' +
            '</div>' +
          '</div>' +
        '</div>';

      $(target_selector).append(element);
      $('.select2-single').select2();
    });
  });
</script>