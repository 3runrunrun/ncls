    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!--fitness stats-->
          <div class="row">
              <div class="col-xs-12">
                  <div class="card border-top-tosca">
                      <div class="card-header no-border-bottom">
                          <h4 class="card-title">Entry Breakdown analisa sales (report dari master detailer)</h4>
                          <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                          <div class="heading-elements">
                              
                          </div>
                      </div>
                      <div class="card-body collapse in">
                          <div class="col-xs-12 center-block " align="center">
                            </div>
                          <div class="table-responsive height-500 border-top-red">
                                <table class="table table-hover mb-0">
                                  <thead>
                                      <tr>
                                          <th>Kode Detailer</th>
                                          <th>Nama Detailer</th>
                                          <th>Tanggal</th>
                                          <th>Area</th>
                                          <th>Total Penjualan(000)</th>
                                          <th>Tools</th>
                                          
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php for ($i=0; $i < 5; $i++) { 
                                      # code...
                                     ?>
                                      <tr class="bg-table-blue">
                                          <td class="text-truncate">21K</td>
                                          <td class="text-truncate">Bambang</td>
                                          <td class="text-truncate">12 Maret 2013</td>
                                          <td class="text-truncate">Jakarta</td>
                                          <td class="text-truncate">Rp.2.000.000</td>
                                          <td class="text-truncate">
                                            <a href="<?php echo site_url() ?>/Report/analisa_sales/1">
                                              <button class="btn btn-primary">Detail</button>
                                            </a>
                                          </td>
                                      </tr>
                                      <tr class="">
                                          <td class="text-truncate">21K</td>
                                          <td class="text-truncate">Bambang</td>
                                          <td class="text-truncate">12 Maret 2013</td>
                                          <td class="text-truncate">Jakarta</td>
                                          <td class="text-truncate">Rp.2.000.000</td>
                                          <td class="text-truncate">
                                            <a href="<?php echo site_url() ?>/Report/analisa_sales/1">
                                              <button class="btn btn-primary">Detail</button>
                                            </a>
                                          </td>
                                      </tr>
                                      <?php }?>
                                       
                                  </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>