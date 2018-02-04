<?php 
  // ini buat data statis
  // kapan-kapan hapus aja
  $cost = array();
  $cost2 = array();
  $penyerapan = 0;
  $penyerapan2 = 0;
  
  // cost 1 :: fixed field force
  for ($i=0; $i < 7; $i++) { 
    array_push($cost, rand(200000000, 4000000));
  }
  // total cost 1
  $total = 0;
  foreach ($cost as $value) {
    $total += $value;
  }
  // penyerapan 1
  $penyerapan = rand(200000000, $total);
  $persentase = $penyerapan / $total * 100;
  $remaining = 100 - $persentase;
  // echo $persentase . '<br />';
 ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-orange">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Ratio</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="row">
                  <div class="col-sm-4 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-xs-center">
                      <div class="card-header mb-2 pt-0">
                        <span class="info">
                          <h3 class="font-large-2 text-bold-200">Redflag</h3>
                        </span>
                      </div>
                      <div class="card-body">
                        <div style="display:inline;width:100px;height:100px;"><input type="text" value="<?php echo number_format($persentase, 0); ?>" class="knob hide-value responsive angle-offset" data-angleoffset="40" data-thickness=".15" data-linecap="round" data-width="100" data-height="100" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#00BCD4" data-knob-icon="icon-feedback2" readonly="readonly" style="width: 69px; height: 43px; position: absolute; vertical-align: middle; margin-top: 43px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 26px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -99px; display: none;"></div>
                        <ul class="list-inline clearfix mt-1 mb-0">
                          <li class="border-right-grey border-right-lighten-2 pr-2">
                            <h2 class="grey darken-1 text-bold-400"><?php echo number_format($persentase, 0); ?>%</h2>
                            <span class="success">Completed</span>
                          </li>
                          <li class="pl-2">
                            <h2 class="grey darken-1 text-bold-400"><?php echo number_format($remaining, 0); ?>%</h2>
                            <span class="danger">Remaining</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- /rd-fixed-cost -->
                  <div class="col-sm-8">
                    <div class="card-body">
                      <div class="card-block">
                        <!-- Tabel -->
                        <div class="table-responsive height-250">
                          <table class="table table-hover mb-0">
                              <thead>
                                  <tr>
                                    <th width="20%">Detailer</th>
                                    <th width="5%">Achievement</th>
                                    <th width="5%">Target</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php for ($i = 0; $i < 9; $i++): ?>
                                <tr>
                                  <td>Nama Detailer</td>
                                  <td><?php echo rand(20, 60); ?>%</td>
                                  <td><?php echo rand(40, 80); ?>%</td>
                                </tr>
                                <?php endfor; ?>
                              </tbody>
                          </table>
                        </div>
                        <!-- End of Tabel -->
                      </div>
                    </div>
                  </div>
                  <!-- /rd-fixed-cost -->
                </div>
                <!-- /redflag -->
              </div>
              <div class="card-block">
              <div class="row">
                <div class="col-sm-4 border-right-blue-grey border-right-lighten-5">
                  <div class="my-1 text-xs-center">
                    <div class="card-header mb-2 pt-0">
                      <span class="deep-orange">
                        <h3 class="font-large-2 text-bold-200">Mvc </h3>
                      </span>
                    </div>
                      <div class="card-body">
                          <div style="display:inline;width:100px;height:100px;"><input type="text" value="70" class="knob hide-value responsive angle-offset" data-angleoffset="0" data-thickness=".15" data-linecap="round" data-width="100" data-height="100" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#FF5722" data-knob-icon="icon-user2" readonly="readonly" style="width: 69px; height: 43px; position: absolute; vertical-align: middle; margin-top: 43px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 26px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -99px; display: none;">
                          </div>
                          <ul class="list-inline clearfix mt-1 mb-0">
                              <li>
                                  <h2 class="grey darken-1 text-bold-400">10%</h2>
                                  <span class="deep-orange"> Today's Target</span>
                              </li>
                          </ul>
                      </div>  
                  </div>
                </div>
                <!-- /rd-fixed-cost -->
                <div class="col-sm-8">
                  <div class="card-body">
                    <div class="card-block">
                      <!-- Tabel -->
                      <div class="table-responsive height-250">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                  <th width="20%">Detailer</th>
                                  <th width="5%">Achievement</th>
                                  <th width="5%">Target</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php for ($i = 0; $i < 9; $i++): ?>
                              <tr>
                                <td>Nama Detailer</td>
                                <td><?php echo rand(20, 60); ?>%</td>
                                <td><?php echo rand(40, 80); ?>%</td>
                              </tr>
                              <?php endfor; ?>
                            </tbody>
                        </table>
                      </div>
                      <!-- End of Tabel -->
                    </div>
                  </div>
                </div>
                <!-- /rd-fixed-cost -->
              </div>
              <!-- /mvc -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /rasio-dana -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Fixed Cost</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <!-- Tabel -->
                <div class="table-responsive height-350 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th width="20%">Item</th>
                            <th width="10%">Unit</th>
                            <th width="5%">Cost ('000)</th>
                            <th width="5%">Subtotal ('000)</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Promosi</td>
                          <td>Rupiah (Rp)</td>
                          <td align="right">Rp <?php echo number_format($cost[0], 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>COGM</td>
                          <td>Rupiah (Rp)</td>
                          <td align="right">Rp <?php echo number_format($cost[1], 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Karyawan</td>
                          <td>Rupiah (Rp)</td>
                          <td align="right">Rp <?php echo number_format($cost[2], 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Inventaris</td>
                          <td>Rupiah (Rp)</td>
                          <td align="right">Rp <?php echo number_format($cost[3], 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Operasional</td>
                          <td>Rupiah (Rp)</td>
                          <td align="right">Rp <?php echo number_format($cost[4], 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Insentif</td>
                          <td>Rupiah (Rp)</td>
                          <td align="right">Rp <?php echo number_format($cost[5], 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Income Dana</td>
                          <td>Rupiah (Rp)</td>
                          <td align="right">Rp <?php echo number_format($cost[6], 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
                <!-- End of Tabel -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive border-top-red">
                      <table class="table table-hover mb-0">
                          <thead>
                              <tr class="bg-table-red">
                                <th width="80%"><h4>Total ('000)</h4></th>
                                <th width="20%" align="right">
                                  <h4>Rp <?php echo number_format($total, 0, ',', '.'); ?></h4>
                                </th>
                              </tr>
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
      <!-- /tabel-wpr -->
    </div>
  </div>
</div>

