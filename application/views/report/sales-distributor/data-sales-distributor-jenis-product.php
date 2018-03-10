<?php $total_area = count($list_distributor['data']->result_array()) + 2; ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Laporan daily sales/area tahun 2018 </h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <!-- table -->
                <div class="table-responsive height-400">
                  <table class="table table-xs table-hover" id="table-top">
                    <thead>
                      <tr>
                        <th>Area</th>
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
                        <!-- <td>0%- Askes</td>
                        <td>Regular</td>
                        <td>Instusi</td>
                        <td>E-Katalog</td>
                        <td>Oral</td>
                        <td>Injeksi</td>
                        <td>Import</td>
                        <td>Nutrisi</td>
                        <td>N/A</td> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($sales_distributor as $key => $value): ?>
                        <?php foreach ($value as $index => $item): ?>
                      <tr class="bg-table-red">
                        <td><?php echo strtoupper($item['label']); ?></td>
                        <td class="table-money"><?php echo number_format($item['jan'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['feb'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['mar'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['apr'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['may'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['jun'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['jul'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['aug'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['sep'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['oct'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['nov'], 0, ',', '.'); ?></td>
                        <td class="table-money"><?php echo number_format($item['des'], 0, ',', '.'); ?></td>
                      </tr>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /table -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-body">
              <div class="card-block">
                <!-- table -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Area</th>
                        <th>Januari</th>
                        <th>Februari</th>
                        <th>Maret</th>
                        <th>April</th>
                        <th>Mei</th>
                        <th>Juni</th>
                        <th>Juli</th>
                        <th>Agustus</th>
                        <th>September</th>
                        <th>Oktober</th>
                        <th>November</th>
                        <th>Desember</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>N/A</td>
                        <td>221</td>
                        <td>20</td>
                        <td>100</td>
                        <td>20</td>
                        <td>240</td>
                        <td>300</td>
                        <td>40</td>
                        <td>20</td>
                        <td>20</td>
                        <td>20</td>
                        <td>20</td>
                        <td>20</td>
                        <td>20</td>
                        <td>20</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /table -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.table-title').css({
      'text-align': 'center',
    });
    $('.total-area').css({
      'font-weight': 'bold',
    }).addClass('text-truncate border-top-blue bg-table-green');


    $('.table-money').css({
      'text-align': 'right',
    });

    var row_limit = $("#table-top tbody tr:nth-child(<?php echo $total_area; ?>n)");

    $(row_limit).addClass('border-top-blue bg-table-green');
    
    // console.log($("#table-top tbody tr:nth-of-type(<?php echo $total_area; ?>)"));
  });
</script>