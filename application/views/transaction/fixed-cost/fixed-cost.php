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
 <?php 
  $under_performance = 0;
  $performance = 0;
  $best_detailer = 0;
  $performa_detailer = $detailer_performance['data']->result_array();
  $total_detailer = count($performa_detailer);
  foreach ($performa_detailer as $value) {
    if (floatval($value['achievement']) < 50) {
      $under_performance += 1;
    } elseif (floatval($value['achievement']) >= 80 && floatval($value['achievement']) <= 100 ) {
      $performance += 1;
    } elseif (floatval($value['achievement']) >= 110) {
      $best_detailer += 1;
    }
  }

  $persen_up = ($under_performance / $total_detailer) * 100;
  $persen_p = ($performance / $total_detailer) * 100;
  $persen_bd = ($best_detailer / $total_detailer) * 100;
  ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- performance -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-orange">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Performance</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <!-- under-performance -->
              <div class="card-block">
                <div class="row">
                  <div class="col-sm-4 col-xs-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-xs-center">
                      <div class="card-header mb-2 pt-0">
                        <span class="red">
                          <h3 class="font-large-2 text-bold-200">Under Performance</h3>
                        </span>
                      </div>
                      <div class="card-body">
                        <div style="display:inline;width:100px;height:100px;"><input type="text" value="<?php echo number_format($persen_up, 0); ?>" class="knob hide-value responsive angle-offset" data-angleoffset="40" data-thickness=".15" data-linecap="round" data-width="100" data-height="100" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#f36058" data-knob-icon="icon-feedback2" readonly="readonly" style="width: 69px; height: 43px; position: absolute; vertical-align: middle; margin-top: 43px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 26px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -99px; display: none;"></div>
                        <ul class="list-inline clearfix mt-1 mb-0">
                          <li>
                            <h2 class="red text-bold-400"><?php echo number_format($persen_up, 0); ?>%</h2>
                            <span class="grey">Detailer</span><br />
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- /rd-fixed-cost -->
                  <div class="col-sm-8 col-xs-12">
                    <div class="card-body">
                      <div class="card-block">
                        <!-- Tabel -->
                        <div class="table-responsive height-250">
                          <table class="table table-hover mb-0">
                              <thead>
                                <tr>
                                  <th width="10%">Kode Detailer</th>
                                  <th width="20%">Detailer</th>
                                  <th width="20%">Area</th>
                                  <th width="5%">Total Sales<br />(Rp)</th>
                                  <th width="5%">Target<br />(Rp)</th>
                                  <th width="5%">Tools</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($detailer_performance['data']->result() as $value): ?>
                                <?php if (floatval($value->achievement) < 50): ?>  
                                <tr>
                                  <td><?php echo strtoupper($value->id_detailer); ?></td>
                                  <td><?php echo $value->nama_detailer; ?></td>
                                  <td><?php echo $value->area; ?></td>
                                  <td><?php echo number_format($value->nominal_penjualan, 0, ',', '.'); ?></td>
                                  <td><?php echo number_format($value->nominal_target, 0, ',', '.'); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                              </tbody>
                          </table>
                        </div>
                        <!-- End of Tabel -->
                      </div>
                    </div>
                  </div>
                  <!-- /rd-fixed-cost -->
                </div>
              </div>
              <!-- /under-performance -->
              
              <!-- performance -->
              <div class="card-block">
                <div class="row">
                  <div class="col-sm-4 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-xs-center">
                      <div class="card-header mb-2 pt-0">
                        <span class="info">
                          <h3 class="font-large-2 text-bold-200">Performance</h3>
                        </span>
                      </div>
                      <div class="card-body">
                        <div style="display:inline;width:100px;height:100px;"><input type="text" value="<?php echo number_format($persen_p, 0); ?>" class="knob hide-value responsive angle-offset" data-angleoffset="40" data-thickness=".15" data-linecap="round" data-width="100" data-height="100" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#00BCD4" data-knob-icon="icon-feedback2" readonly="readonly" style="width: 69px; height: 43px; position: absolute; vertical-align: middle; margin-top: 43px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 26px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -99px; display: none;"></div>
                        <ul class="list-inline clearfix mt-1 mb-0">
                          <li>
                            <h2 class="info"><?php echo number_format($persen_p, 0); ?>%</h2>
                            <span class="grey">Detailer</span>
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
                                  <th width="10%">Kode Detailer</th>
                                  <th width="20%">Detailer</th>
                                  <th width="20%">Area</th>
                                  <th width="5%">Total Sales<br />(Rp)</th>
                                  <th width="5%">Target<br />(Rp)</th>
                                  <th width="5%">Tools</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($detailer_performance['data']->result() as $value): ?>
                                <?php if (floatval($value->achievement) >= 80 && floatval($value->achievement) <= 100): ?>  
                                <tr>
                                  <td><?php echo strtoupper($value->id_detailer); ?></td>
                                  <td><?php echo $value->nama_detailer; ?></td>
                                  <td><?php echo $value->area; ?></td>
                                  <td><?php echo number_format($value->nominal_penjualan, 0, ',', '.'); ?></td>
                                  <td><?php echo number_format($value->nominal_target, 0, ',', '.'); ?></td>
                                  <td>
                                    <div class="btn-group-vertical">
                                      <a href="#" class="btn btn-primary">Detail</a>
                                    </div>
                                  </td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                              </tbody>
                          </table>
                        </div>
                        <!-- End of Tabel -->
                      </div>
                    </div>
                  </div>
                  <!-- /rd-fixed-cost -->
                </div>
              </div>
              <!-- /performance -->

              <!-- the-best-detailer -->
              <div class="card-block">
                <div class="row">
                  <div class="col-sm-4 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-xs-center">
                      <div class="card-header mb-2 pt-0">
                        <span class="green info">
                          <h3 class="font-large-2 text-bold-200">Best Detailer</h3>
                        </span>
                      </div>
                      <div class="card-body">
                        <div style="display:inline;width:100px;height:100px;"><input type="text" value="<?php echo number_format($persen_bd, 0); ?>" class="knob hide-value responsive angle-offset" data-angleoffset="40" data-thickness=".15" data-linecap="round" data-width="100" data-height="100" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#4CAF50" data-knob-icon="icon-feedback2" readonly="readonly" style="width: 69px; height: 43px; position: absolute; vertical-align: middle; margin-top: 43px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 26px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -99px; display: none;"></div>
                        <ul class="list-inline clearfix mt-1 mb-0">
                          <li>
                            <h2 class="success darken-1"><?php echo number_format($persen_bd, 0); ?>%</h2>
                            <span class="grey">Detailer</span>
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
                                  <th width="10%">Kode Detailer</th>
                                  <th width="20%">Detailer</th>
                                  <th width="20%">Area</th>
                                  <th width="5%">Total Sales<br />(Rp)</th>
                                  <th width="5%">Target<br />(Rp)</th>
                                  <th width="5%">Tools</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($detailer_performance['data']->result() as $value): ?>
                                <?php if (floatval($value->achievement) >= 110): ?>  
                                <tr>
                                  <td><?php echo strtoupper($value->id_detailer); ?></td>
                                  <td><?php echo $value->nama_detailer; ?></td>
                                  <td><?php echo $value->area; ?></td>
                                  <td><?php echo number_format($value->nominal_penjualan, 0, ',', '.'); ?></td>
                                  <td><?php echo number_format($value->nominal_target, 0, ',', '.'); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                              </tbody>
                          </table>
                        </div>
                        <!-- End of Tabel -->
                      </div>
                    </div>
                  </div>
                  <!-- /rd-fixed-cost -->
                </div>
              </div>
              <!-- /the-best-detailer -->

            </div>
          </div>
        </div>
      </div>
      <!-- /performance -->

      <!-- rasio-dana -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-orange">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Ratio</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <!-- redflag -->
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
                                    <th width="20%">Customer</th>
                                    <th width="5%">Total Sales<br />(Rp)</th>
                                  <th width="5%">Target<br />(Rp)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php for ($i = 0; $i < 9; $i++): ?>
                                <tr>
                                  <td>Nama Customer</td>
                                  <td><?php echo rand(1000000, 2000000); ?></td>
                                  <td><?php echo rand(3000000, 4000000); ?></td>
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
              <!-- /redflag -->

              <!-- mvc -->
              <div class="card-block">
                <div class="row">
                  <div class="col-sm-4 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-xs-center">
                      <div class="card-header mb-2 pt-0">
                        <span class="deep-orange">
                          <h3 class="font-large-2 text-bold-200">Most Valuable Customer (MVC)</h3>
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
                                    <th width="20%">Customer</th>
                                    <th width="5%">Total Sales<br />(Rp)</th>
                                  <th width="5%">Target<br />(Rp)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php for ($i = 0; $i < 9; $i++): ?>
                                <tr>
                                  <td>Nama Customer</td>
                                  <td><?php echo rand(1000000, 2000000); ?></td>
                                  <td><?php echo rand(3000000, 4000000); ?></td>
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
              <!-- /mvc -->

              <!-- balance -->
              <div class="card-block">
                <div class="row">
                  <div class="col-sm-4 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-xs-center">
                      <div class="card-header mb-2 pt-0">
                        <span class="deep-orange">
                          <h3 class="font-large-2 text-bold-200">Balance</h3>
                        </span>
                      </div>
                      <div class="card-body">
                        <div style="display:inline;width:100px;height:100px;">
                          <div style="display:inline;width:100px;height:100px;">
                            
                            <input type="text" value="75" class="knob hide-value responsive angle-offset" data-angleoffset="20" data-thickness=".15" data-linecap="round" data-width="100" data-height="100" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#DA4453" data-knob-icon="icon-heart6" readonly="readonly" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -77px; display: none;">
                            <i class="knob-center-icon icon-heart6" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -77px; display: none;font-size: 33px;"></i>
                          </div>
                        </div>
                        <ul class="list-inline clearfix mt-1 mb-0">
                          <li>
                            <h2 class="grey darken-1 text-bold-400">125%</h2>
                            <span class="danger">Over</span>
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
                                    <th width="20%">Customer</th>
                                    <th width="5%">Total Sales<br />(Rp)</th>
                                  <th width="5%">Target<br />(Rp)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php for ($i = 0; $i < 9; $i++): ?>
                                <tr>
                                  <td>Nama Customer</td>
                                  <td><?php echo rand(1000000, 2000000); ?></td>
                                  <td><?php echo rand(3000000, 4000000); ?></td>
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
              <!-- /balance -->
            </div>
          </div>
        </div>
      </div>
      <!-- /rasio-dana -->

      <!-- fixed-cost -->
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
                <div class="table-responsive height-250 border-top-red">
                  <table class="table table-xs table-hover mb-0">
                      <thead>
                          <tr>
                            <th width="80%">Item</th>
                            <th width="15%">Unit</th>
                            <th width="5%">Cost</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Promosi</td>
                          <td>Rupiah (Rp)</td>
                          <?php $pr = $promosi['data']->result_array()[0]['promosi']; ?>
                          <td align="right"><?php echo number_format($pr, 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>COGM</td>
                          <td>Rupiah (Rp)</td>
                          <?php $co = $cogm['data']->result_array()[0]['cogm']; ?>
                          <td align="right"><?php echo number_format($co, 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Karyawan</td>
                          <td>Rupiah (Rp)</td>
                          <?php $kr = 0; ?>
                          <td align="right"><?php echo number_format($kr, 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Inventaris</td>
                          <td>Rupiah (Rp)</td>
                          <?php $iv = 0; ?>
                          <td align="right"><?php echo number_format($iv, 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Operasional</td>
                          <td>Rupiah (Rp)</td>
                          <?php $op = $operasional['data']->result_array()[0]['total']; ?>
                          <td align="right"><?php echo number_format($op, 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Insentif</td>
                          <td>Rupiah (Rp)</td>
                          <?php $is = 0; ?>
                          <td align="right"><?php echo number_format($is, 0, ',', '.'); ?></td>
                          <td>&nbsp;</td>
                        </tr>
                      </tbody>
                  </table>
                  <!-- /tabel-f -->
                </div>
                <!-- End of Tabel -->
                <div class="table-responsive border-top-red">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr class="bg-table-red">
                        <th width="80%"><h4>Total</h4></th>
                        <th width="20%" align="right">
                          <?php $total = $pr + $co + $kr + $iv + $op + $is; ?>
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
      <!-- /fixed-cost -->
    </div>
  </div>
</div>

