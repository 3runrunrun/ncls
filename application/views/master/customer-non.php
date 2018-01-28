    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="card border-top-tosca">
                <div class="card-header no-border-bottom">
                  <h4 class="card-title">Master Customer (Non)</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  <div class="heading-elements"></div>
                </div>
                <div class="card-body">
                  <div class="card-block">
                    <div class="col-sm-6 offset-md-3">
                      <form action="" class="form-horizontal">
                        <div class="form-body">
                          <div class="form-group row">
                            <label class="label-control col-sm-3">Area</label>
                            <div class="col-sm-7">
                              <select name="id" class="form-control">
                                <option value="" selected disabled>Pilih Area</option>
                                <option value="">Jakarta</option>
                                <option value="">Bandung</option>
                                <option value="">Surabaya</option>
                              </select>
                            </div>
                            <div class="col-sm-2">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;&nbsp;Cari</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- /pencarian -->
                  <div class="card-block">
                    <!-- Tabel -->
                    <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y border-top-red" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                      <table class="table table-hover mb-0">
                          <thead>
                              <tr>
                                  <th>Kode</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Area</th>
                                  <th>Tools</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php for ($i=0; $i < 5; $i++): ?>
                              <tr>
                                  <td>085912</td>
                                  <td>Fathir Qisthi</td>
                                  <td>Jalan Gegerkalong no. 48</td>
                                  <td>Bandung (BDG)</td>
                                  <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-warning"><span class="ladda-label"><i class="fa fa-pencil"></i></span><span class="ladda-spinner"></span></button>
                                      <button type="button" class="btn btn-danger"><span class="ladda-label"><i class="fa fa-trash-o"></i></span><span class="ladda-spinner"></span></button>
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
                  <h4 class="card-title">Tambah Customer (Non)</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  <div class="heading-elements"></div>
                </div>
                <div class="card-body">
                  <div class="card-block">
                    <form class="form-horizontal" action="post">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-sm-6 col-xs-12 offset-md-3">
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Kode Customer</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" name="id" type="text" placeholder="Kode" maxlength="10" minlength="2">
                              </div>
                            </div>
                            <!-- /kemasan -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Nama</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" name="nama" type="text" placeholder="Nama Customer">
                              </div>
                            </div>
                            <!-- /nama-detailer -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Alamat</label>
                              <div class="col-sm-10">
                                <textarea name="alamat" cols="30" rows="3" class="form-control border-primary"></textarea>
                              </div>
                            </div>
                            <!-- /alamat -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Area</label>
                              <div class="col-sm-6">
                                <select name="area" class="form-control">
                                  <option value="" selected disabled>Pilih Area</option>
                                  <option value="">Jakarta (JKT)</option>
                                  <option value="">Bandung (BDG)</option>
                                  <option value="">Surabaya (SBY)</option>
                                </select>
                              </div>
                            </div>
                            <!-- /area -->
                          </div>
                        </div>
                        <div class="form-action" align="center">
                          <input type="button" class="btn btn-warning mr-1" name="" value="Batal">
                          <input type="submit" class="btn btn-success" name="" value="Simpan">
                        </div>
                        <!-- /submit -->
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