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
              <h4 class="card-title">Daily Sales (per Outlet per Product)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body">
              <!-- table -->
              <div class="card-block">
                <?php foreach ($outlet['data']->result() as $values): ?>  
                <h4>Nama Outlet: <span class="tag tag-primary tag-lg"><?php echo $values->nama_outlet; ?></span></h4>
                <h4>Area: <span class="tag tag-primary tag-lg"><?php echo $values->area; ?></span></h4>
                <?php endforeach; ?>
                <div class="table-responsive height-400">
                  <table class="table table-xs table-bordered table-hover display nowrap scroll-horizontal-vertical border-top-red" id="detail-sales-outlet">
                      <thead>
                        <tr>
                          <th style="text-align: center !important; vertical-align: text-top !important">Kode<br />Produk</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">Nama Produk</th>
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
                        <?php foreach ($produk_by_outlet as $value): ?>
                        <tr>
                          <td class="text-truncate"><?php echo $value['id_produk']; ?></td>
                          <td class="text-truncate"><?php echo $value['nama_produk']; ?></td>
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
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('tbody > tr:odd').attr({
      class: 'bg-table-red',
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#detail-sales-outlet').DataTable({
        "paging": false,
      });
      $('#detail-sales-outlet_wrapper > .row:last').remove();
      $('#detail-sales-outlet_filter').css({
        'text-align': 'center',
      });
      $('#detail-sales-outlet_wrapper > .row:first').children(':first').remove();
      $('#detail-sales-outlet_filter').parent().addClass('col-xs-12').removeClass('col-md-6');
      $('#detail-sales-outlet_filter > label > input').addClass('input-md').removeClass('input-sm').attr({
        placeholder: 'Keyword',
      });
  });
</script>

