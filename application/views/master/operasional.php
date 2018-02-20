<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Master Operasional</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <?php if ( ! is_null($this->session->flashdata())): ?>
                <?php if ( ! is_null($this->session->flashdata('error_msg'))): ?>  
                <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?php echo $this->session->flashdata('error_msg'); ?>
                </div>
                <?php elseif ( ! is_null($this->session->flashdata('success_msg'))): ?>
                <div class="alert alert-success alert-dismissible mb-2" role="alert">
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
                <div class="table-responsive height-250 border-top-red">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>City<br />(Rp)</th>
                        <th>Allowance<br />(Rp)</th>
                        <th>Tol<br />Parkir<br />(Rp)</th>
                        <th>Bensin<br />(Rp)</th>
                        <th>Comm<br />(Rp)</th>
                        <th>Entertainment<br />(Rp)</th>
                        <th>Med. Care<br />(Rp)</th>
                        <th>Other<br />(Rp)</th>
                        <th>Total<br />(Rp)</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($operasional['data']->result() as $value): ?>
                      <?php 
                        $tanggal = strtotime($value->tanggal);
                       ?>
                      <tr>
                        <td><?php echo date('d-M-Y', $tanggal); ?></td>
                        <td><?php echo number_format($value->city, 2, ',', '.'); ?></td>
                        <td><?php echo number_format($value->allowance, 2, ',', '.'); ?></td>
                        <td><?php echo number_format($value->tol_parkir, 2, ',', '.'); ?></td>
                        <td><?php echo number_format($value->bensin, 2, ',', '.'); ?></td>
                        <td><?php echo number_format($value->comm, 2, ',', '.'); ?></td>
                        <td><?php echo number_format($value->entertainment, 2, ',', '.'); ?></td>
                        <td><?php echo number_format($value->med_care, 2, ',', '.'); ?></td>
                        <td><?php echo number_format($value->other, 2, ',', '.'); ?></td>
                        <td align="right"><?php echo number_format($value->total, 2, ',', '.'); ?></td>
                        <td>
                          <div class="btn-group-vertical" role="group">
                            <a href="<?php echo site_url() ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                            <button type="button" onclick="delete_operasional('<?php echo $value->id ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- End of Tabel -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive border-top-red">
                      <table class="table table-hover mb-0">
                        <thead>
                          <?php foreach ($total_by_year['data']->result() as $value): ?>  
                          <tr class="bg-table-red">
                            <th width="80%"><h4>Grand Total (Rp)</h4></th>
                            <th width="20%" align="right">
                              <h4>Rp <?php echo number_format($value->total, 2, ',', '.'); ?></h4>
                            </th>
                          </tr>
                          <?php endforeach ?>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel-customer -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Tambah Biaya Operasional</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form-horizontal" action="<?php echo site_url(); ?>/store-operasional" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12 offset-md-3">
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Detailer</label>
                          <div class="col-sm-10">
                            <select name="id_detailer" class="form-control border-primary select2">
                              <option value="" selected disabled>Pilih Detailer</option>
                              <?php if ($detailer['data']->num_rows() < 1): ?>
                                <option value="">RM belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($detailer['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <!-- /detailer -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Tanggal</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="tanggal" type="date">
                          </div>
                        </div>
                        <!-- /tanggal -->
                      </div>
                      <!-- /upper-col -->
                      <div class="col-xs-12">
                        <div class="bs-callout-info callout-border-left mt-1 p-1">
                          <h4 class="primary">Info</h4>
                          <p>Anda <strong>boleh</strong> mengosongi kolom biaya operasional yang tidak perlu diisi.</p>
                        </div>
                        <br />
                      </div>
                      <!-- /callout-col -->
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label class="label-control col-sm-2">City</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="city" type="number" placeholder="" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /city -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Allowance</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="allowance" type="number" placeholder="" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /allowance -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Tol &amp; Parkir</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="tol_parkir" type="number" placeholder="" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /tol-parkir -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Bensin</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="bensin" type="number" placeholder="" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /bensin -->
                        <div id="bensin-km" class="form-group row" style="display: none !important;">
                          <label class="label-control col-sm-2">Km</label>
                          <div class="col-sm-4">
                            <fieldset>
                              <div class="input-group">
                                <input class="form-control border-primary" name="bensin_km" type="number" placeholder="" min="0" value="0" step="1">
                                <span class="input-group-addon">Km</span>
                              </div>
                            </fieldset>
                          </div>
                          <p>*) Isi dengan nilai odometer</p>
                        </div>
                        <!-- /#bensin-km -->
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Comm</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="comm" type="number" placeholder="" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /comm -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Entertainment</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="entertainment" type="number" placeholder="" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /entertainment -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Med. Care</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="med_care" type="number" placeholder="" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /transaksi-lainnya -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Other</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="other" type="number" placeholder="" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /other -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Total</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="total" type="number" placeholder="" min="0" readonly>
                              </div>
                            </fieldset>
                            <p>*) Kalkulasi nilai total dijalankan secara otomatis</p>
                          </div>
                        </div>
                        <!-- /total -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Potongan CA</label>
                          <div class="col-sm-10">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="potongan_ca" type="number" placeholder="" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /total -->
                      </div>
                      <!-- /right-col -->
                    </div>
                    <div class="form-action" align="center">
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
      <!-- /tambah-customer -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var target_selector = $('[name=total]');
    var total = 0;
    
    $(target_selector).val(parseInt(total));

    $('[name=city] , [name=allowance] , [name=tol_parkir] , [name=bensin] , [name=comm] , [name=entertainment] , [name=med_care] , [name=other]').keyup(function(){
      if ($('[name=city]').val() == '') {
        $('[name=city]').val(0);
      }
      if ($('[name=allowance]').val() == '') {
        $('[name=allowance]').val(0);
      }
      if ($('[name=tol_parkir]').val() == '') {
        $('[name=tol_parkir]').val(0);
      }
      if ($('[name=bensin]').val() == '') {
        $('[name=bensin]').val(0);
        show_bensin_km($('[name=bensin]'));
      }
      if ($('[name=comm]').val() == '') {
        $('[name=comm]').val(0);
      }
      if ($('[name=entertainment]').val() == '') {
        $('[name=entertainment]').val(0);
      }
      if ($('[name=med_care]').val() == '') {
        $('[name=med_care]').val(0);
      }
      if ($('[name=other]').val() == '') {
        $('[name=other]').val(0);
      }

      total = parseInt($('[name=city]').val()) + parseInt($('[name=allowance]').val()) + parseInt($('[name=tol_parkir]').val()) + parseInt($('[name=bensin]').val()) + parseInt($('[name=comm]').val()) + parseInt($('[name=entertainment]').val()) + parseInt($('[name=med_care]').val()) + parseInt($('[name=other]').val());
      $(target_selector).val(parseInt(total));

      show_bensin_km($('[name=bensin]'));
    });
  });

  function show_bensin_km(selector) {
    if ($(selector).val() > 0) {
      $('#bensin-km').show();
    } else {
      $('#bensin-km').hide();
    };
  }
</script>
<script type="text/javascript">
  function delete_operasional(id) {
    var r = confirm("Apakah yakin menghapus data biaya operasional ini?");
    if (r == true) {
      $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/store-operasional/delete",
        data: {'id': id},
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