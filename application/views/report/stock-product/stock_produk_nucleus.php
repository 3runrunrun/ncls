    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!--fitness stats-->
          <div class="row">
              <div class="col-xs-12">
                  <div class="card border-top-tosca">
                      <div class="card-header no-border-bottom">
                          <h4 class="card-title">Data stock product(Nucleus ke Distributor)</h4>
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
                                          <th>Distributor</th>
                                          <th>Tanggal</th>
                                          <th>Nama Product/Barang</th>
                                          <th>Quantity</th>
                                          <th>Baths Number</th>
                                          <th>Expired</th>
                                          <th>Status</th>
                                          
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php for ($i=0; $i < 5; $i++) { 
                                      # code...
                                     ?>
                                      <tr class="bg-table-blue">
                                          <td class="text-truncate">PPG</td>
                                          <td class="text-truncate">21 Maret 2018</td>
                                          <td class="text-truncate">Onoiwa</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">1212129j</td>
                                          <td class="text-truncate">21 Maret 2019</td>
                                          <td class="text-truncate"><button class="btn btn-warning">Sending</button></td>
                                      </tr>
                                      <tr>
                                          <td class="text-truncate">PTKP</td>
                                          <td class="text-truncate">22 Maret 2018</td>
                                          <td class="text-truncate">Oniwa</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">hgbnjk098</td>
                                          <td class="text-truncate">22 Maret 2019</td>
                                          <td class="text-truncate"><button class= "btn btn-succes">Deliverd</button></td>
                                      </tr>
                                      <?php }?>
                                       <tr class="border-top-orange bg-table-red">
                                          <td class="text-truncate">Total</td>
                                          <td class="text-truncate">-</td>
                                          <td></td>
                                          <td class="text-truncate">300</td>
                                          <td class="text-truncate"></td>
                                          <td class="text-truncate">22 Maret 2018</td>
                                          <td></td>
                                      </tr>
                                  </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>