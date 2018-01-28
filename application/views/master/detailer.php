<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Master Detailer</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <!-- Tabel -->
                <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y border-top-red" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                              <th>Kode</th>
                              <th>Nama</th>
                              <th>Tgl. Masuk</th>
                              <th>Tgl. Keluar</th>
                              <th>Tgl. Mutasi</th>
                              <th>Tgl. Lahir</th>
                              <th>Keterangan</th>
                              <th>Area</th>
                              <th>Agama</th>
                              <th>Gol</th>
                              <th>Subarea</th>
                              <th>Nama Spv.</th>
                              <th>Nama DSM</th>
                              <th>Nama RSM</th>
                              <th>Kode DSM Lama</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < 5; $i++): ?>
                          <tr>
                              <td>085934</td>
                              <td>Rinda Setyawati</td>
                              <td>07-Mar-2016</td>
                              <td>18-Nov-2018</td>
                              <td>18-Nov-2018</td>
                              <td>21-Aug-1987</td>
                              <td>-</td>
                              <td>-</td>
                              <td>Katolik</td>
                              <td>A</td>
                              <td>-</td>
                              <td>Dendi Gustavo</td>
                              <td>Listi Chandra</td>
                              <td>-</td>
                              <td>-</td>
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
              <h4 class="card-title">Tambah Detailer</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form-horizontal" action="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Kode Detailer</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="id" type="text" placeholder="Kode" maxlength="10" minlength="2">
                          </div>
                        </div>
                        <!-- /kemasan -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama Barang</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="nama" type="text" placeholder="Nama Detailer">
                          </div>
                        </div>
                        <!-- /nama-detailer -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Tanggal Masuk</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="tanggal_masuk" type="date">
                          </div>
                          <label class="label-control col-sm-2">Tanggal Keluar</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="tanggal_keluar" type="date">
                          </div>
                        </div>
                        <!-- /tanggal-masuk /tanggal-keluar -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Tanggal Mutasi</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="tanggal_mutasi" type="date">
                          </div>
                          <label class="label-control col-sm-2">Tanggal Lahir</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="tanggal_lahir" type="date">
                          </div>
                        </div>
                        <!-- /tanggal-mutasi /tanggal-lahir -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Keterangan</label>
                          <div class="col-sm-10">
                            <textarea name="keterangan" cols="30" rows="3" class="form-control border-primary"></textarea>
                          </div>
                        </div>
                        <!-- /keterangan -->
                      </div>
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Area</label>
                          <div class="col-sm-4">
                            <select name="area" class="form-control border-primary">
                              <option value="" selected disabled>Pilih Area</option>
                              <option value="">Jakarta</option>
                              <option value="">Bandung</option>
                              <option value="">Surabaya</option>
                            </select>
                          </div>
                          <!-- /area -->
                          <label class="label-control col-sm-2">Subarea</label>
                          <div class="col-sm-4">
                            <select name="subarea" class="form-control border-primary">
                              <option value="" selected disabled>Pilih Subarea</option>
                              <option value="">Kemang</option>
                              <option value="">Gegerkalong</option>
                              <option value="">Rungkut</option>
                            </select>
                          </div>
                          <!-- /sub-area -->
                        </div>
                        <!-- /area -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Agama</label>
                          <div class="col-sm-4">
                            <select name="Agama" class="form-control border-primary">
                              <option value="" selected disabled>Pilih Agama</option>
                              <option value="">Katolik</option>
                              <option value="">Kristen</option>
                              <option value="">Islam</option>
                            </select>
                          </div>
                          <!-- /gol -->
                          <label class="label-control col-sm-2">Gol</label>
                          <div class="col-sm-4">
                            <select name="golongan" class="form-control border-primary">
                              <option value="" selected disabled>Pilih Golongan</option>
                              <option value="">A</option>
                              <option value="">B</option>
                              <option value="">C</option>
                            </select>
                          </div>
                          <!-- /gol -->
                        </div>
                        <!-- /area /gol -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama Spv.</label>
                          <div class="col-sm-10">
                            <select name="kode_supervisor" class="form-control border-primary">
                              <option value="" selected disabled>Pilih Supervisor</option>
                              <option value="">Supervisor 1</option>
                              <option value="">Supervisor 2</option>
                              <option value="">Supervisor 3</option>
                            </select>
                          </div>
                        </div>
                        <!-- /nama-supervisor -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama DSM.</label>
                          <div class="col-sm-10">
                            <select name="kode_dsm" class="form-control border-primary">
                              <option value="" selected disabled>Pilih DSM</option>
                              <option value="">DSM 1</option>
                              <option value="">DSM 2</option>
                              <option value="">DSM 3</option>
                            </select>
                          </div>
                        </div>
                        <!-- /nama-dsm -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama RSM.</label>
                          <div class="col-sm-10">
                            <select name="kode_rsm" class="form-control border-primary">
                              <option value="" selected disabled>Pilih RSM</option>
                              <option value="">RSM 1</option>
                              <option value="">RSM 2</option>
                              <option value="">RSM 3</option>
                            </select>
                          </div>
                        </div>
                        <!-- /nama-rsm -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama DSM.</label>
                          <div class="col-sm-10">
                            <select name="kode_dsm" class="form-control border-primary">
                              <option value="" selected disabled>Pilih DSM</option>
                              <option value="">DSM 1</option>
                              <option value="">DSM 2</option>
                              <option value="">DSM 3</option>
                            </select>
                            <p>Untuk program laporan Evaluasi Dana Customer</p>
                          </div>
                        </div>
                        <!-- /nama-dsm-old -->
                      </div>
                    </div>
                  </div>
                  <div class="form-action pull-right">
                    <input type="button" class="btn btn-warning mr-1" name="" value="Batal">
                    <input type="submit" class="btn btn-success" name="" value="Simpan">
                  </div>
                  <!-- /submit -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>