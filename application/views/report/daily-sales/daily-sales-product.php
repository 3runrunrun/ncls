<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- tabel -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
                <h4 class="card-title">Daily Sales (per Product)</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                </div>
            </div>
            <div class="card-body collapse in">
              <div class="card-block">
                <div class="col-xs-12 center">
                  <form method="post" style="padding-bottom: 30px;">
                    <div class="form-group centered">
                      <div class="col-sm-5">
                        <select class="form-control" name="area" required="">
                          <option selected="" disabled="" value="">---Pilih Area---</option>
                          <option value="jakarta-selatan">Jakarta Selatan</option>
                        </select>
                      </div>
                      <div class="col-sm-5">
                        <select class="form-control" name="outlet" required="">
                          <option selected="" disabled="" value="">---Pilih Outlet---</option>
                          <option value="jakarta-selatan">Mutiara Sehat</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                         <buttom class="btn btn-primary"><i class="fa fa-search"></i>  Cari</buttom>
                      </div>
                    </div>
                    
                  </form>
                </div>
              </div>

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

                <!-- table -->
                <div class="table-responsive height-400 border-top-red">
                  <table class="table table-xs table-hover mb-0">
                      <thead>
                        <tr>
                          <th style="text-align: center !important; vertical-align: text-top !important">Kode<br />Produk</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">Nama Produk</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">Area</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">Target<br />(Rp)</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">Total Sales Aktual<br />(Rp)</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">January</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">February</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">March</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">April</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">May</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">June</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">July</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">August</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">September</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">October</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">November</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">December</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dsales_produk as $value): ?>
                        <tr>
                          <td class="text-truncate"><?php echo $value['id_produk']; ?></td>
                          <td class="text-truncate"><?php echo $value['nama_produk']; ?></td>
                          <td class="text-truncate">(<?php echo $value['alias_area']; ?>) <?php echo $value['area']; ?></td>
                          <td class="text-truncate" align="right"><?php echo number_format($value['nominal_target'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['nominal_penjualan'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['jan'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['feb'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['mar'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['apr'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['may'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['jun'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['jul'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['aug'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['sep'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['oct'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['nov'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['des'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                  </table>
                </div>
                <!-- /table -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel -->

      <!-- form -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Form Daily Sales</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url() ?>/store-daily-sales" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 offset-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Tanggal</label>
                          <input type="date" name="tanggal" class="form-control border-primary" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <!-- /tanggal -->
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
                        </div>
                        <!-- /id-outlet -->
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
                        <!-- /id-outlet -->
                        <div class="form-group">
                          <label class="label-control">Outlet</label>
                          <select name="id_outlet" class="form-control select2">
                            <option value="" selected disabled>Pilih Outlet</option>
                            <?php if ($outlet['data']->num_rows() < 1): ?>
                            <option value="" disabled>Outlet belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($outlet['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /id-outlet -->
                      </div>
                    </div>
                    <!-- /row-1 -->
                  </div>
                  <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-medkit"></i>Produk</h4>
                    <div class="row">
                      <div class="col-sm-4 col-xs-12">
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
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Target (per Unit)</label>
                          <input type="number" name="target[]" class="form-control border-primary">
                        </div>
                        <!-- /jumlah -->
                      </div>
                      <!-- /mid-col -->
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Jumlah Terjual</label>
                          <input type="number" name="jumlah[]" class="form-control border-primary">
                        </div>
                        <!-- /jumlah -->
                      </div>
                      <!-- /right-col -->
                    </div>
                    <div id="produk-out"></div>
                    <!-- #/produk-out -->
                    <div class="row">
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <button type="button" class="btn btn-primary btn-block" id="add-produk"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                        </div>
                      </div>
                    </div>
                    <!-- /button-row -->
                  </div>
                  <div class="form-actions" align="center">
                    <input type="submit" class="btn btn-success" name="" value="Simpan">
                    <input type="reset" class="btn btn-warning mr-1" name="" value="Batal">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /form -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('tbody > tr:odd').attr({
      class: 'bg-table-blue',
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
          '<div class="col-sm-4 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Produk</label>' +
              '<select name="id_produk[]" class="form-control select2-single">' +
                produk_list +
              '</select>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-4 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Target (per Unit)</label>' +
              '<input type="number" name="target[]" class="form-control border-primary">' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-4 col-xs-12">' +
            '<div class="form-group row">' +
              '<label class="label-control col-sm-12">Jumlah Terjual</label>' +
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

