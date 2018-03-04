<?php 
  $status = array(
    'belum' => '<span class="tag tag-xl tag-danger">Belum Diproses</span>',
    'spv' => '<span class="tag tag-xl tag-warning">Approved by SPV</span>',
    'rm' => '<span class="tag tag-xl tag-warning">Approved by RM</span>',
    'rilis' => '<span class="tag tag-xl tag-success">Rilis</span>'
  );
  ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Detail Faktur KO General</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <!-- alert -->
              <div class="card-block">
              <!-- form -->
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/store-ko-general" method="POST">
                  <div class="form-body">
                    <?php foreach ($detail['data']->result() as  $value): ?>
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section">Informasi Faktur</h4>
                        <div class="row">
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">SP</label><br />
                              <span class="tag tag-primary tag-xl"><?php echo strtoupper($value->sp); ?></span>
                            </div>
                            <!-- /no-faktur -->
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">No. Faktur</label><br />
                              <span class="tag tag-primary tag-xl"><?php echo str_replace('-', '/', $value->id); ?></span>
                            </div>
                            <!-- /no-faktur -->
                          </div>
                        </div>
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section">Pemohon</h4>
                        <div class="row">
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Detailer</label><br />
                              <span class="tag tag-primary tag-xl"><?php echo $value->nama_detailer; ?></span>
                            </div>
                            <!-- /id-detailer -->
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Status</label><br />
                              <?php echo str_replace(array_keys($status), $status, $value->status); ?>
                            </div>
                            <!-- /status -->
                          </div>
                        </div>
                      </div>
                      <!-- /right-col -->
                    </div>
                    <!-- /no-faktur /id-detailer -->
                    <h4 class="form-section">Informasi KO</h4>
                    <div class="row">
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Tanggal Permohonan</label><br />
                          <?php $tanggal = date('d-M-Y', strtotime($value->tanggal)); ?>
                          <h5><?php echo $tanggal; ?></h5>
                        </div>
                        <!-- /tanggal-permohonan -->
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Distributor</label>
                          <?php $distributor = $value->nama_distributor; ?>
                          <h5>(<?php echo $value->alias_distributor; ?>) <?php echo $value->nama_distributor; ?></h5>
                        </div>
                        <!-- /id-distributor -->
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Menyetujui <strong>(RM)</strong></label>
                          <h5><?php echo $value->nama_rm; ?></h5>
                        </div>
                        <!-- /menyutujui -->
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Approver <strong>(Direktur)</strong></label>
                          <h5><?php echo $value->nama_direktur; ?></h5>
                        </div>
                        <!-- /approve -->
                      </div>
                    </div>
                    <!-- /tanggal /distributor /menyetujui /approver -->
                    <?php endforeach; ?>
                  </div>
                  
                  <!-- tabel-permohonan -->
                  <br /><br />
                  <h5 class="form-section">
                    <p>Dengan hormat, <br />Melalui surat ini, kami bermaksud untuk mengajukan permohonan diskon untuk Outlet:</p>
                  </h5>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <!-- Tabel -->
                          <div class="table-responsive height-250">
                            <table class="table table-xs table-bordered table-hover mb-0">
                              <thead>
                                <tr>
                                  <th>&nbsp;</th>
                                  <th colspan="3">Kondisi On Faktur</th>
                                  <th colspan="3">Kondisi Off Faktur</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                </tr>
                                <tr>
                                  <th width="30%">Outlet</th>
                                  <th class="distributor"><?php echo $distributor; ?></th>
                                  <th>NF</th>
                                  <th>Total</th>
                                  <th class="distributor"><?php echo $distributor; ?></th>
                                  <th>NF</th>
                                  <th>Total</th>
                                  <th width="30%">Produk</th>
                                  <th width="10%">Jumlah</th>
                                  <th width="30%" colspan="2">Keterangan</th>
                                </tr>
                              </thead>
                              <tbody id="diskon-list">
                                <?php foreach ($permohonan['data']->result() as $value): ?>  
                                <tr>
                                  <td class="text-truncate outlet-list"><?php echo $value->nama_outlet; ?></td>
                                  <td><?php echo $value->on_diskon_distributor; ?> %</td>
                                  <td><?php echo $value->on_nf; ?> %</td>
                                  <td><?php echo $value->on_total; ?> %</td>
                                  <td><?php echo $value->off_diskon_distributor; ?> %</td>
                                  <td><?php echo $value->off_nf; ?> %</td>
                                  <td><?php echo $value->off_total; ?> %</td>
                                  <td class="text-truncate produk-list"><?php echo $value->nama_produk; ?></td>
                                  <td><?php echo $value->jumlah; ?></td>
                                  <td><?php echo $value->keterangan; ?></td>
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
                  <!-- /tabel-permohonan -->

                  <h4 class="form-section">KO On &amp; Off Faktur</h4>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- tabel-cn -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-6 col-xs-12">
                              <div class="table-responsive">
                                <table class="table table-xs table-hover table-bordered">
                                  <thead>
                                    <tr>
                                      <th width="10%">No</th>
                                      <th width="50%">CN</th>
                                      <th width="40$">%</th>
                                    </tr>
                                  </thead>
                                  <tbody id="ko-on-off">
                                    <?php $count = 0; ?>
                                    <?php foreach ($onoff['data']->result() as $value): ?>  
                                    <tr>
                                      <td><?php echo $count++; ?></td>
                                      <td><?php echo $value->cn; ?></td>
                                      <td><?php echo number_format($value->diskon, 2, ',', '.'); ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                              </div>
                              <!-- tabel-cn -->
                              <div class="table-responsive">
                                <table class="table table-xs table-hover mb-0">
                                  <thead>
                                    <tr>
                                      <th width="62.8%" style="text-align: center !important; vertical-align: middle;">Total</th>
                                      <?php foreach ($onoff_total['data']->result() as $value): ?>  
                                      <th><?php echo $value->total_onoff; ?></th>
                                      <?php endforeach; ?>
                                    </tr>
                                  </thead>
                                </table>
                              </div><br />
                              <!-- /tabel-total-cn -->
                            </div>
                            <!-- /left-col -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('th, #ko-on-off tr td:last-child').css({
      'text-align': 'center',
    });
    $('td').addClass('text-truncate');
  });
</script>