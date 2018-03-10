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
              <h4 class="card-title">Daily Sales (per Outlet)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">

              <!-- table -->
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
                <div class="table-responsive height-400">
                  <table class="table table-xs table-bordered table-hover display nowrap scroll-horizontal-vertical border-top-red" id="sales-outlet">
                      <thead>
                        <tr>
                          <th>Kode<br />Outlet</th>
                          <th>Nama Outlet</th>
                          <th>Area</th>
                          <th>Target<br />(Rp)</th>
                          <th>Total Sales Aktual<br />(Rp)</th>
                          <th>January</th>
                          <th>February</th>
                          <th>March</th>
                          <th>April</th>
                          <th>May</th>
                          <th>June</th>
                          <th>July</th>
                          <th>August</th>
                          <th>September</th>
                          <th>October</th>
                          <th>November</th>
                          <th>December</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($msales_outlet as $value): ?>
                        <tr>
                          <td><?php echo $value['id_outlet']; ?></td>
                          <td><?php echo $value['nama_outlet']; ?></td>
                          <td>(<?php echo $value['alias_area']; ?>) <?php echo $value['area']; ?></td>
                          <td align="right"><?php echo number_format($value['nominal_target'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['nominal_penjualan'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['jan'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['feb'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['mar'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['apr'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['may'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['jun'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['jul'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['aug'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['sep'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['oct'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['nov'], 0, ',', '.'); ?></td>
                          <td align="right"><?php echo number_format($value['des'], 0, ',', '.'); ?></td>
                          <td align="center" style="padding-right: 5%">
                            <div class="btn-group-vertical">
                              <a href="<?php echo site_url() ?>/daily-sales-outlet-product/<?php echo $value['id_outlet']; ?>" class="btn btn-block btn-primary">Detail</a>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
              </div>
              <!-- /table -->
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
                        <!-- /id-distributor -->
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
                        <!-- /id-detailer -->
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
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section"><i class="fa fa-medkit"></i>Produk</h4>
                        <div class="row">
                          <div class="col-sm-8 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Produk</label>
                              <select name="id_produk[]" id="produk-list" class="form-control select2 id-produk" onchange="recall_show_ko($('[name=id_distributor]').val(), $('[name=id_detailer]').val(), $('[name=id_outlet]').val(), $(this).val(), $(this).parent().parent().next().next().children().children('.id-ko').val()); show_stok($('[name=id_distributor]').val(), $(this).val());">
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
                          <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Stok Distributor</label>
                              <input type="number" id="stok-sisa" class="form-control border-primary" disabled>
                              <span id="stok-alert" class="danger"></span>
                            </div>
                          </div>
                          <div class="col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Faktur KO</label>
                              <select name="id_ko[]" id="faktur-list" class="form-control select2 id-ko" onchange="show_ko($('[name=id_distributor]').val(), $('[name=id_detailer]').val(), $('[name=id_outlet]').val(), $(this).parent().parent().prev().prev().children().children('.id-produk').val(), $(this).val())">
                                <option value="" selected disabled>Pilih Faktur KO</option>
                                <?php if ($diskon['data']->num_rows() < 1): ?>
                                <option value="" disabled>Faktur KO belum tersedia</option>
                                <?php else: ?>
                                <?php foreach ($diskon['data']->result() as $value): ?>
                                <option value="<?php echo $value->id_ko; ?>"><?php echo $value->jenis; ?> - <?php echo str_replace('-', '/', $value->id_ko); ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                            </div>
                            <!-- /jumlah -->
                          </div>
                          <div class="col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Target (per Unit)</label>
                              <input type="number" name="target[]" class="form-control border-primary">
                            </div>
                            <!-- /jumlah -->
                          </div>
                          <div class="col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Jumlah Terjual</label>
                              <input type="number" name="jumlah[]" class="form-control border-primary">
                            </div>
                            <!-- /jumlah -->
                          </div>
                          <div class="col-xs-6">
                            <div class="form-group">
                              <label class="label-control">Diskon On</label>
                              <input type="number" name="diskon_on[]" class="form-control border-primary diskon-on" value="0">
                            </div>
                            <!-- /diskon-on -->
                          </div>
                          <div class="col-xs-6">
                            <div class="form-group">
                              <label class="label-control">Diskon Off</label>
                              <input type="number" name="diskon_off[]" class="form-control border-primary diskon-off" value="0">
                            </div>
                            <!-- /diskon-off -->
                          </div>
                        </div>
                        <div id="produk-out"></div>
                        <!-- #/produk-out -->
                        <!-- <div class="row">
                          <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                              <button type="button" class="btn btn-primary btn-block" id="add-produk"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                            </div>
                          </div>
                        </div> -->
                        <!-- /button-row -->
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section"><i class="fa fa-wpforms"></i>Informasi Faktur (jika ada)</h4>
                        <div class="table-responsive height-200 border-top-blue">
                          <table class="table table-xs table-bordered table-hover mb-0" id="sales-produk">
                            <thead>
                              <tr>
                                <th>No. Faktur</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Total On<br />(%)</th>
                                <th>Total Off<br />(%)</th>
                              </tr>
                            </thead>
                            <tbody id="info-faktur">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /right-col -->
                    </div>
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
      class: 'bg-table-red',
    });
    $('#sales-outlet th').css({
      'text-align': 'center',
      'vertical-align': 'text-top',
    });
    $('#sales-outlet th').addClass('text-truncate');
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
              '<div class="col-sm-8">' +
                '<input type="number" name="jumlah[]" class="form-control border-primary">' +
              '</div>' +
              '<div class="col-sm-4">' +
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
<script type="text/javascript" src="<?php echo base_url() ?>/process-js/report/daily-sales/show-ko.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/process-js/report/daily-sales/show-stok.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#sales-outlet').DataTable({
        "paging": false,
      });
      $('#sales-outlet_wrapper > .row:last').remove();
      $('#sales-outlet_filter').css({
        'text-align': 'center',
      });
      $('#sales-outlet_wrapper > .row:first').children(':first').remove();
      $('#sales-outlet_filter').parent().addClass('col-xs-12').removeClass('col-md-6');
      $('#sales-outlet_filter > label > input').addClass('input-md').removeClass('input-sm').attr({
        placeholder: 'Keyword',
      });
  });
</script>