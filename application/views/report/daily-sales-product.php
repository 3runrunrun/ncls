    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!--fitness stats-->
          <div class="row">
              <div class="col-xs-12">
                  <div class="card border-top-tosca">
                      <div class="card-header no-border-bottom">
                          <h4 class="card-title">Daily Sales Product</h4>
                          <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                          <div class="heading-elements">
                              
                          </div>
                      </div>
                      <div class="card-body collapse in">
                          <div class="col-xs-12 center-block " align="center">
                            <form method="post">
                              <div class="form-group centered">
                                <label class="label-control center-block">Kode area</label>
                                <select class="form-control" name="area" required="">
                                  <option selected="" disabled="" value="">---Pilih Kode Area---</option>
                                  <option value="jakarta-selatan">Jakarta Selatan</option>
                                </select>
                              </div>
                              <div class="form-group centered">
                                <label class="label-control">Outlet</label>
                                <select class="form-control" name="outlet" required="">
                                  <option selected="" disabled="" value="">---Pilih Outlet---</option>
                                  <option value="jakarta-selatan">Mutiara Sehat</option>
                                </select>
                              </div>
                              <div class="form-group ">
                                <input type="submit" class="btn btn-success" name="">
                              </div>
                            </form>
                          </div>
                          <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y border-top-red" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                              <table class="table table-hover mb-0">
                                  <thead>
                                      <tr>
                                          <th>Kode Barang</th>
                                          <th>Nama Barang</th>
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
                                      <tr>
                                          <td class="text-truncate">007</td>
                                          <td class="text-truncate">Oniwa</td>
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
                                       <tr class="border-top-green">
                                          <td class="text-truncate">-</td>
                                          <td class="text-truncate">Total</td>
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
                                  </tbody>
                                  
                              </table>
                          <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 350px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 307px;"></div></div></div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>