    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!--fitness stats-->
          <div class="row">
              <div class="col-xs-12">
                  <div class="card border-top-tosca">
                      <div class="card-header no-border-bottom">
                          <h4 class="card-title">Laporan Donasi</h4>
                          <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                          <div class="heading-elements">
                              
                          </div>
                      </div>
                      <div class="card-body collapse in">
                          <div class="col-xs-12 center-block " align="center">
                            <form method="post" style="padding-bottom: 30px">
                              <div class="form-group centered">
                                <div class=" col-sm-5">
                                  <select class="form-control" name="area" required="">
                                    <option selected="" disabled="" value="">---Kode- Nama sales---</option>
                                    <option value="jakarta-selatan">002-Edward </option>
                                  </select>
                                </div>
                                <div class="col-sm-5">
                                  <select class="form-control" name="outlet" required="">
                                    <option selected="" disabled="" value="">---Pilih Kode- Outlet---</option>
                                    <option value="jakarta-selatan">9928-Mutiara Sehat</option>
                                  </select>
                                </div>
                                <div class="col-sm-2">
                                  <buttom class="btn btn-primary"><i class="fa fa-search"></i>  Cari</buttom>
                                </div>
                                
                              </div>
                                
                              
                            </form>
                          </div>
                          <div class="table-responsive height-500 border-top-red">
                                <table class="table table-hover mb-0">
                                  <thead>
                                      <tr>
                                          <th></th>
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
                                          <th>YTD</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php for ($i=0; $i < 5; $i++) { 
                                      # code...
                                     ?>
                                      <tr class="bg-table-red">
                                          <td class="text-truncate"></td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                      </tr>
                                      <tr>
                                          <td class="text-truncate"></td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                          <td class="text-truncate">200</td>
                                      </tr>
                                      <?php }?>
                                      
                                  </tbody>
                              </table>
                        </div>
                        <div class="col-xs-6 col-sm-6" style=" background:white; padding-top:10px; padding-buttom:10px;">
                            <h2>12.000.000</h2>
                        </div>
                    <div class="table height-200 border-top-red">
                        <table class="table table-hover mb-0">
                            <tbody>
                                    <?php for ($i=0; $i < 2; $i++) { 
                                      # code...
                                     ?>
                                      <tr class="">
                                          <td class="text-truncate">12/01/2019</td>
                                          <td class="text-truncate">14</td>
                                          <td class="text-truncate">14 april 2018</td>
                                          <td class="text-truncate">Djarot</td>
                                          <td class="text-truncate">Manado</td>
                                          <td class="text-truncate"></td>
                                          <td class="text-truncate">Irine Kalalo</td>
                                      </tr>
                                        <tr class="bg-table-blue">
                                          <td class="text-truncate">12/01/2019</td>
                                          <td class="text-truncate">1 Bulan</td>
                                          <td class="text-truncate">Rp.300.000</td>
                                          <td class="text-truncate">Djarot</td>
                                          <td class="text-truncate">28-April-2018</td>
                                          <td class="text-truncate"></td>
                                          <td class="text-truncate"></td>
                                      </tr>
                                      
                                      <?php }?>
                                      
                                  </tbody>
                            </table>
                            <div class="col-xs-5 col-lg-5 mt-2" style="text-align:right; background:white;">
                                <h3>
                                    <b>0</b><br>
                                    <b>Rp.193.094</b><br>
                                    <b>-----------------+</b><br>
                                    <b>Rp.193.094</b>
                                </h3>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>