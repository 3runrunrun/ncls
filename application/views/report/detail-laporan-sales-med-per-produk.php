<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Detail Laporan Sales Med Rep per Produk</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-sm-2">
                  <form method="post" class="form-horizontal" id="show-customer-by-area">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-4">Bulan</label>
                        <div class="col-sm-8">
                          <select name="" class="form-control select2">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                          </select>
                        </div>
                      </div>
                      <!-- /bulan -->
                      <div class="form-group row">
                        <label class="label-control col-sm-4">Med Rep</label>
                        <div class="col-sm-8">
                          <select name="" class="form-control select2">
                            <option value="" selected disabled>Pilih Detailer</option>
                            <option value=""></option>
                          </select>
                        </div>
                      </div>
                      <!-- /detailer -->
                      <div class="form-group row">
                        <label class="label-control col-sm-4">Supervisor</label>
                        <div class="col-sm-8">
                          <select name="" class="form-control" readonly>
                            <option value="">Supervisor Atas</option>
                          </select>
                        </div>
                      </div>
                      <!-- /supervisor -->
                      <div class="form-group row">
                        <label class="label-control col-sm-4">RM</label>
                        <div class="col-sm-8">
                          <select name="" class="form-control" readonly>
                            <option value="">RM Atas</option>
                          </select>
                        </div>
                      </div>
                      <!-- /rm -->
                      <div class="form-group row">
                        <label class="label-control col-sm-4">Gol</label>
                        <div class="col-sm-4">
                          <input type="text" name="" id="" class="form-control" readonly placeholder="A">
                        </div>
                      </div>
                      <!-- /gol -->
                      <div class="form-group row">
                        <label class="label-control col-sm-4">Produk</label>
                        <div class="col-sm-8">
                          <select name="" class="form-control">
                            <option value="" selected disabled>Farmacrol Forte</option>
                          </select>
                        </div>
                      </div>
                      <!-- /produk -->
                    </div>
                  </form>
                </div>
              </div>
              <!-- /pencarian -->
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
                <div class="row">
                  <div class="col-sm-6 col-xs-12">
                    <div class="bs-callout-info callout-border-left mt-1 p-1">
                      <strong><i class="fa fa-info-circle"></i>&nbsp;Data Sales per Produk</strong>
                      <p>Silahkan klik pada <strong>satu</strong> data pada tabel di bawah ini untuk mengetahui detail data yang ditampilkan pada tabel di sebelah kanan.</p>
                    </div><br />
                    <!-- Tabel -->
                    <div class="table-responsive height-400 border-top-red">
                      <table class="table table-bordered table-hover mb-0">
                          <thead>
                            <tr>
                              <th width="5%" style="text-align: center !important">Kode</th>
                              <th width="40%" style="text-align: center !important">Outlet</th>
                              <th width="10%" style="text-align: center !important">Type</th>
                              <th width="10%" style="text-align: center !important">Jumlah</th>
                              <th width="30%" style="text-align: center !important">Harga</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php for($i = 0; $i < 10; $i++): ?>
                            <tr class="row-barang">
                              <td class="id-barang"><?php echo rand(2130, 3232); ?></td>
                              <td><?php echo strtoupper('apotek kimia farma'); ?></td>
                              <td><?php echo strtoupper('reg'); ?></td>
                              <td class="jumlah-barang" style="text-align: center !important"><?php echo rand(5, 20); ?></td>
                              <td style="text-align: right !important"><?php echo number_format(rand(20000, 100000), 0, ',', '.'); ?></td>
                            </tr>
                            <?php endfor; ?>
                          </tbody>
                      </table>
                    </div>
                    <!-- End of Tabel -->
                  </div>
                  <!-- /left-col -->
                  <div class="col-sm-6 col-xs-12">
                    <form class="form">
                      <h4 class="form-section"><i class="fa fa-medkit"></i>Entry Data Customer</h4>
                      <!-- Tabel -->
                      <div class="table-responsive height-300">
                        <table class="table table-bordered table-hover mb-0">
                          <thead>
                            <tr>
                              <th width="5%" style="text-align: center !important">Kode</th>
                              <th width="40%" style="text-align: center !important">Nama Customer</th>
                              <th width="10%" style="text-align: center !important">Jumlah</th>
                              <th width="5%" style="text-align: center !important">Tender</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="detail-barang-out">
                              <td class="id-barang-out"></td>
                              <td class="nama-barang-out"></td>
                              <td class="jumlah-barang-out" style="text-align: center !important"></td>
                              <td class="tender-out"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- End of Tabel -->
                      <div class="form-group">
                        <label for="" class="lable-control">Customer</label>
                        <select name="" class="form-control select2">
                          <option value="" selected disabled>Pilih Customer</option>
                          <option value="">Customer 1</option>
                          <option value="">Customer 2</option>
                        </select>
                        <p>*) Anda bisa mencari customer berdasarkan kode atau nama</p>
                      </div>
                      <!-- /customer -->
                      <div class="form-group row">
                        <label class="label-control col-sm-12">Jumlah</label>
                        <div class="col-sm-10">
                          <input type="number" name="" class="form-control" placeholder="Jumlah Produk (Unit)">
                        </div>
                        <div class="col-sm-2">
                          <button type="button" class="btn btn-block btn-primary">Tambah</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /right-col -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel-customer -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.row-barang').click(function() {
      var id = $(this).children('.id-barang').text();
      var jumlah = $(this).children('.jumlah-barang').text();
      var target = $('.detail-barang-out');

      var centang = '<fieldset>' +
          '<label class="custom-control custom-checkbox">' +
            '<input type="checkbox" class="custom-control-input" readonly>' +
            '<span class="custom-control-indicator"></span>' +
          '</label>' +
        '</fieldset>';

      $(target).children('.id-barang-out').text();
      $(target).children('.nama-barang-out').text();
      $(target).children('.jumlah-barang-out').text();
      if ($(target).children('.tender-out').children().length > 0) {
        $(target).children('.tender-out').children().remove();
      }

      $(target).children('.id-barang-out').text(id);
      $(target).children('.nama-barang-out').text('Eddi Junaidi - Jakarta');
      $(target).children('.jumlah-barang-out').text(jumlah);
      $(target).children('.tender-out').append(centang);
    });
  });
</script>