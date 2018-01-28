    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="card border-top-tosca">
                <div class="card-header no-border-bottom">
                  <h4 class="card-title">Master Outlet</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  <div class="heading-elements"></div>
                </div>
                <div class="card-body">
                  <div class="card-block">
                    <div class="col-sm-6 offset-md-3">
                      <form action="" class="form-horizontal">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-sm-4 col-xs-12">
                              <div class="form-group row">
                                <div class="col-sm-12">
                                  <select name="distributor" class="form-control">
                                    <option value="" selected disabled>Pilih Distributor</option>
                                    <option value="">ALL</option>
                                    <option value="">PTKP</option>
                                    <option value="">PPG</option>
                                  </select>
                                </div>
                                <!-- /ALL -->
                              </div>
                            </div>
                            <!-- /row1 -->
                            <div class="col-sm-6 col-xs-12">
                              <div class="form-group row">
                                <div class="col-sm-12">
                                  <select name="id" class="form-control">
                                    <option value="" selected disabled>Pilih Area</option>
                                    <option value="">Jakarta</option>
                                    <option value="">Bandung</option>
                                    <option value="">Surabaya</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <!-- /row2 -->
                            <div class="col-sm-2 col-xs-12">
                              <div class="form-group row">
                                <div class="col-sm-12">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;&nbsp;Cari</button>
                                </div>
                              </div>
                            </div>
                            <!-- /row3 -->
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-block">
                    <!-- Tabel -->
                    <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y border-top-red" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                      <table class="table table-hover mb-0">
                          <thead>
                              <tr>
                                  <th>Kode</th>
                                  <th>Nama Outlet</th>
                                  <th>Segmen</th>
                                  <th>Alamat</th>
                                  <th>Kota</th>
                                  <th>Area PTKP</th>
                                  <th>Area PPG</th>
                                  <th>Kode Lam</th>
                                  <th>Detailer</th>
                                  <th>Periode</th>
                                  <th>Dispensing</th>
                                  <th>Tools</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php for ($i=0; $i < 7; $i++): ?>
                              <tr>
                                  <td>A8642</td>
                                  <td>Kimia Farma</td>
                                  <td>X</td>
                                  <td>Jl. Sultan Agung</td>
                                  <td>Cirebon</td>
                                  <td>Jawa Barat (<?php echo $i+5 ?>)</td>
                                  <td>- (-)</td>
                                  <td><?php echo $i+2 ?></td>
                                  <td>Muhammad Durham</td>
                                  <td>2017-12</td>
                                  <td>N</td>
                                  <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href="#" class="btn btn-warning"><span class="ladda-label"><i class="fa fa-pencil"></i></span></a>
                                      <a href="#" class="btn btn-danger"><span class="ladda-label"><i class="fa fa-trash-o"></i></span></a>
                                    </div>
                                  </td>
                              </tr>
                              <?php endfor; ?>
                          </tbody>
                      </table>
                      <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 350px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 307px;"></div></div>
                    </div>
                    <!-- End of Tabel -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="card border-top-blue">
                <div class="card-header no-border-bottom">
                  <h4 class="card-title">Tambah Outlet</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  <div class="heading-elements"></div>
                </div>
                <div class="card-body">
                  <div class="card-block">
                    <div class="col-sm-6 offset-md-3">
                      <form class="form-horizontal" action="post">
                        <div class="form-body">
                          <div class="form-group row">
                            <label class="label-control col-sm-2">Kode Outlet</label>
                            <div class="col-sm-3">
                              <select name="prefix_id" class="form-control border-primary">
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">C</option>
                              </select>
                            </div>
                            <div class="col-sm-7">
                              <input class="form-control border-primary" name="id" type="text" placeholder="Kode Outlet" maxlength="5" minlength="2">
                            </div>
                          </div>
                          <!-- /prefix-id /id -->
                          <div class="form-group row">
                            <label class="label-control col-sm-2">Nama Outlet</label>
                            <div class="col-sm-10">
                              <input class="form-control border-primary" name="nama" type="text" placeholder="Nama Outlet" >
                            </div>
                          </div>
                          <!-- /nama -->
                          <div class="form-group row">
                            <label class="label-control col-sm-2">Alamat</label>
                            <div class="col-sm-10">
                              <textarea name="alamat" cols="30" rows="5" class="form-control border-primary"></textarea>
                            </div>
                          </div>
                          <!-- /nama -->
                          <div class="form-group row">
                            <label class="label-control col-sm-2">Kota</label>
                            <div class="col-sm-10">
                              <select name="kota" class="form-control border-primary">
                                <option value="" selected disabled>Pilih Kota</option>
                                <option value="">Jakarta</option>
                                <option value="">Bandung</option>
                                <option value="">Surabaya</option>
                              </select>
                            </div>
                          </div>
                          <!-- /kota -->
                          <div class="form-group row">
                            <label class="label-control col-sm-2">NPWP</label>
                            <div class="col-sm-10">
                              <input type="text" name="npwp" class="form-control border-primary" placeholder="NPWP" maxlength="15" minlength="15">
                            </div>
                          </div>
                          <!-- /npwp -->
                          <div class="form-group row">
                            <label class="label-control col-sm-2">Segmen</label>
                            <div class="col-sm-3">
                              <select name="segmen" class="form-control border-primary">
                                <option value="" selected disabled>--</option>
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">C</option>
                              </select>
                            </div>
                            <label class="label-control col-sm-2 offset-md-1">Dispensing</label>
                            <div class="col-sm-3">
                              <select name="dispensing" class="form-control border-primary">
                                <option value="" selected disabled>--</option>
                                <option value="">Y</option>
                                <option value="">N</option>
                              </select>
                            </div>
                          </div>
                          <!-- /segmen /dispensing -->
                          <div class="form-group">
                            <input type="submit" class="btn btn-success pull-right" name="" value="Simpan">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>