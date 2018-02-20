<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Detail per Subdist per Month</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form method="POST" class="form-horizontal" id="filter-by-dist-month">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-2 col-xs-12">Bulan</label>
                        <div class="col-sm-8 col-xs-12">
                          <select name="bulan" id="bulan" class="form-control select2">
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
                        <div class="col-sm-2 col-xs-12">
                          <button class="btn btn-primary" type="submit">Tampil</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /pencarian -->
              <div class="card-block">
                <div class="bs-callout-info callout-border-right mt-1 p-1">
                  <strong>Info!</strong>
                  <p>Tabel di bawah ini berisi seluruh permintaan subdistributor kepada distributor <strong><?php echo $nama_distributor['data']->result_array()[0]['nama']; ?></strong> per tahun <?php echo date('Y') ?>.<br />Untuk menampilkan data pada bulan tertentu, <strong>gunakan fitur pencarian di atas kotak informasi</strong>.</p>
                </div><br />
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th width="30%">Subdist</th>
                            <th width="30%">Produk</th>
                            <th width="30%">Tanggal</th>
                            <th width="30%">Jumlah<br />Permintaan</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($subdist_detail['data']->result() as $value): ?> 
                        <tr>
                          <td><?php echo $value->nama; ?></td>
                          <td><?php echo $value->nama_produk; ?></td>
                          <td><?php echo date('d-M-Y', strtotime($value->tanggal)); ?></td>
                          <td><?php echo $value->jumlah; ?></td>
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
      <!-- /tabel-wpr -->
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>/process-js/transaction/subdist/show-subdist-by-dist-month.js"></script>
