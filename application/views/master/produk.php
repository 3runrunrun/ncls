    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="card border-top-tosca">
                <div class="card-header no-border-bottom">
                  <h4 class="card-title">Master Produk</h4>
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
                                  <th>Nama Barang</th>
                                  <th>Kemasan</th>
                                  <th>Harga (HNA)</th>
                                  <th>Harga (H.Askes)</th>
                                  <th>Harga Master</th>
                                  <th>Kode BUM</th>
                                  <th>Nama</th>
                                  <th>Gol</th>
                                  <th>Gol1</th>
                                  <th>Antibiotik</th>
                                  <th>Brg Baru</th>
                                  <th>Brg Ask</th>
                                  <th>New CN</th>
                                  <th>CN New Brg (%)</th>
                                  <th>Start Regular</th>
                                  <th>Brg Master</th>
                                  <th>Disc</th>
                                  <th>Region</th>
                                  <th>Ket. Region</th>
                                  <th>Segmen</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php for ($i=0; $i < 5; $i++): ?>
                              <tr>
                                  <td>08712</td>
                                  <td>Fartolin Tablet</td>
                                  <td>Box 100's</td>
                                  <td>124,029</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>HN</td>
                                  <td>Herlambang</td>
                                  <td>A</td>
                                  <td>-</td>
                                  <td>Y</td>
                                  <td>N</td>
                                  <td>N</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
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
                  <h4 class="card-title">Tambah Produk</h4>
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
                              <label class="label-control col-sm-2">Kode Barang</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" name="id" type="text" placeholder="Kode Barang" maxlength="10" minlength="2">
                              </div>
                            </div>
                            <!-- /kemasan -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Nama Barang</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" name="nama" type="text" placeholder="Nama Barang">
                              </div>
                            </div>
                            <!-- /nama-barang -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Kemasan</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" name="kemasan" type="text" placeholder="Kemasan">
                              </div>
                            </div>
                            <!-- /kemasan -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Harga<br />(HNA)</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" name="harga_hna" type="number" placeholder="Harga (HNA)">
                              </div>
                            </div>
                            <!-- /harga-hna -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Harga<br />(H. Askes)</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" name="harga_h_askes" type="number" placeholder="Harga (H. Askes)">
                              </div>
                              <label class="label-control col-sm-2">Harga<br />Master</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" name="harga_master" type="number" placeholder="Hrg. Master">
                              </div>
                            </div>
                            <!-- /harga-h-askes /harga-master -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Nama<br />BUM</label>
                              <div class="col-sm-10">
                                <select name="kode_bum" id="" class="form-control">
                                  <option value="" selected disabled>Pilih Nama BUM</option>
                                  <option value="">Nama BUM</option>
                                  <option value="">Nama BUM</option>
                                  <option value="">Nama BUM</option>
                                  <option value="">Nama BUM</option>
                                </select>
                              </div>
                            </div>
                            <!-- /nama-bum -->
                            <div class="form-group row">
                              <div class="col-sm-4 offset-sm-2">
                                <label class="label-control">Gol</label>
                                <select name="golongan" class="form-control">
                                  <option value="" selected disabled>--</option>
                                  <option value="">A</option>
                                  <option value="">B</option>
                                  <option value="">C</option>
                                </select>
                              </div>
                              <!-- /gol -->
                              <div class="col-sm-4">
                                <label class="label-control">Gol1</label>
                                <select name="golongan1" class="form-control">
                                  <option value="" selected disabled>--</option>
                                  <option value="">A</option>
                                  <option value="">B</option>
                                  <option value="">C</option>
                                </select>
                              </div>
                              <!-- /gol -->
                              <div class="col-sm-2">
                                <label class="label-control">Antibiotik</label>
                                <select name="antiobiotik" class="form-control">
                                  <option value="" selected disabled>--</option>
                                  <option value="">Y</option>
                                  <option value="">N</option>
                                </select>
                              </div>
                              <!-- /gol -->
                            </div>
                            <!-- /gol /gol1 /antiobiotik -->
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <div class="col-sm-4 offset-md-1">
                                <fieldset>
                                  <label class="custom-control custom-checkbox">
                                    <input type="checkbox" name="barang_baru" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Barang Baru</span>
                                  </label>
                                </fieldset>
                              </div>
                              <div class="col-sm-4 pull-md-1">
                                <fieldset>
                                  <label class="custom-control custom-checkbox">
                                    <input type="checkbox" name="barang_askes" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Barang Askes</span>
                                  </label>
                                </fieldset>
                              </div>
                              <div class="col-sm-3 pull-md-2">
                                <fieldset>
                                  <label class="custom-control custom-checkbox">
                                    <input type="checkbox" name="fokus" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Fokus</span>
                                  </label>
                                </fieldset>
                              </div>
                            </div>
                            <!-- /barang-baru /barang-askes /fokus -->
                            <div class="form-group row">
                              <label class="label-control col-sm-3">CN New Barang</label>
                              <div class="col-sm-3">
                                <div class="input-group">
                                  <input class="form-control border-primary" name="cn_new_barang" type="number" placeholder="0">
                                  <span class="input-group-addon">%</span>
                                </div>
                              </div>
                            </div>
                            <!-- /cn-new-barang -->
                            <div class="form-group row">
                              <label class="label-control col-sm-3">Start Regular</label>
                              <div class="col-sm-9">
                                <select name="start_regular" class="form-control">
                                  <option value="" selected disabled>--</option>
                                  <option value="">Y</option>
                                  <option value="">N</option>
                                </select>
                              </div>
                            </div>
                            <!-- /start-regular -->
                            <div class="form-group row">
                              <label class="label-control col-sm-3">Barang Master</label>
                              <div class="col-sm-9">
                                <select name="barang_master" class="form-control">
                                  <option value="" selected disabled>Pilih Barang</option>
                                  <option value="">Barang 1</option>
                                  <option value="">Barang 2</option>
                                </select>
                              </div>
                            </div>
                            <!-- /brg-master -->
                            <div class="form-group row">
                              <label class="label-control col-sm-3">Diskon</label>
                              <div class="col-sm-3">
                                <div class="input-group">
                                  <input class="form-control border-primary" name="diskon" type="number" placeholder="0">
                                  <span class="input-group-addon">%</span>
                                </div>
                              </div>
                            </div>
                            <!-- /diskon -->
                            <div class="form-group row">
                              <label class="label-control col-sm-3">Region</label>
                              <div class="col-sm-3">
                                <select name="region" class="form-control">
                                  <option value="" selected disabled>--</option>
                                  <option value="">Region 1</option>
                                  <option value="">Region 2</option>
                                </select>
                              </div>
                              <label class="label-control col-sm-3 pull-md-1">Keterangan<br />Region</label>
                              <div class="col-sm-3 pull-md-1">
                                <textarea class="form-control" name="keterangan_region"></textarea>
                              </div>
                            </div>
                            <!-- /region /keterangan-region-->
                            <div class="form-group row">
                              <label class="label-control col-sm-3">Segmen</label>
                              <div class="col-sm-3">
                                <select name="segmen" class="form-control">
                                  <option value="" selected disabled>--</option>
                                  <option value="">Segmen 1</option>
                                  <option value="">Segmen 2</option>
                                </select>
                              </div>
                            </div>
                            <!-- /segmen -->
                            <div class="form-group row">
                              <div class="col-sm-4 offset-md-1">
                                <fieldset class="right-checkbox">
                                  <label class="custom-control custom-checkbox block">
                                    <input type="checkbox" name="reg_ask" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Reg Ask</span>
                                  </label>
                                </fieldset>
                              </div>
                            </div>
                            <!-- /reg-ask -->
                            <div class="form-group row">
                              <label class="label-control col-sm-3">Kondisi</label>
                              <div class="col-sm-3">
                                <div class="input-group">
                                  <input type="number" name="kondisi" class="form-control" max="100" min="0" placeholder="0">
                                  <span class="input-group-addon">%</span>
                                </div>
                              </div>
                              <!-- /kondisi -->
                              <label class="label-control col-sm-3 pull-md-1">Kondisi<br />User</label>
                              <div class="col-sm-3 pull-md-1">
                                <div class="input-group">
                                  <input type="number" name="kondisi_user" class="form-control" max="100" min="0" placeholder="0">
                                  <span class="input-group-addon">%</span>
                                </div>
                              </div>
                              <!-- /kondisi-user -->
                            </div>
                            <!-- /kondisi /kondisi-user -->
                          </div>
                        </div>
                        
                      <div class="form-group">
                        <input type="submit" class="btn btn-success pull-right" name="">
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