<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Surat Permohonan Discount On &amp; Off Faktur Tender</h4><br />
              <h6 class="card-subtitle text-muted">No. SP: SPO-917A082-22122016-2</h6>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Nomor Faktur</label>
                          <input type="text" name="id" class="form-control border-primary" placeholder="4242/AS/10/2017" readonly>
                        </div>
                      </div>
                      <!-- /nomor-faktur -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">DSM</label>
                          <select name="kode_dsm" id="" class="form-control border-primary select2">
                            <option value="" selected disabled>Pilih DSM</option>
                            <option value="">073904 - Fathurrohman</option>
                            <option value="">073904 - Fathurrohman</option>
                          </select>
                        </div>
                      </div>
                      <!-- /kode-dsm -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">RSM</label>
                          <input type="text" name="kode_rsm" class="form-control border-primary" placeholder="912321 - Edward Basilianus Nugroho" readonly>
                        </div>
                      </div>
                      <!-- /kode-rsm -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Area</label>
                          <input type="text" name="id_area" class="form-control border-primary" placeholder="Jakarta" readonly>
                        </div>
                      </div>
                      <!-- /area -->
                    </div>
                    <!-- /row-1 -->
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Tanggal Permohonan</label>
                          <input type="text" name="tanggal_transaksi" class="form-control border-primary" placeholder="10-Jan-2018" readonly>
                        </div>
                      </div>
                      <!-- /tanggal-permohonan -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Tanggal Send Email</label>
                          <input type="text" name="tanggal_send_email" class="form-control border-primary" placeholder="10-Nov-2017" readonly>
                        </div>
                      </div>
                      <!-- /tanggal-send-email -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Distributor</label>
                          <div class="input-group">
                            <label class="display-inline-block custom-control custom-checkbox">
                              <input type="checkbox" name="ptkp" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description ml-0">PTKP</span>
                            </label>
                            <label class="display-inline-block custom-control custom-checkbox">
                              <input type="checkbox" name="ppg" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description ml-0">PPG</span>
                            </label>
                            <label class="display-inline-block custom-control custom-checkbox">
                              <input type="checkbox" name="penta" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description ml-0">Penta</span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- /distributor -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Outlet</label>
                          <select name="id_outlet" class="form-control border-primary select2" multiple="multiple">
                            <option value="">81083 - Islam RS</option>
                            <option value="">12354 - Islam Cempaka Putih</option>
                          </select>
                          <p>Anda bisa memilih lebih dari satu outlet</p>
                        </div>
                      </div>
                      <!-- /outlet -->
                    </div>
                    <!-- /row-2 -->
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Tanggal Rilis DSM</label>
                          <input type="text" name="tanggal_dsm" class="form-control border-primary" placeholder="18-Okt-2017" readonly>
                        </div>
                      </div>
                      <!-- /tanggal-dsm -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Tanggal Rilis RSM</label>
                          <input type="text" name="tanggal_rsm" class="form-control border-primary" placeholder="20-Okt-2017" readonly>
                        </div>
                      </div>
                      <!-- /tanggal-rsm -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Tanggal Rilis Deputy</label>
                          <input type="text" name="tanggal_rsm" class="form-control border-primary" placeholder="7-Nov-2017" readonly>
                        </div>
                      </div>
                      <!-- /tanggal-deputy -->
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="label-control">Tanggal Rilis SD</label>
                          <input type="text" name="tanggal_sd" class="form-control border-primary" placeholder="7-Nov-2017" readonly>
                        </div>
                      </div>
                      <!-- /tanggal-sd -->
                    </div>
                    <!-- /row-3 -->
                  </div>
                  <h4 class="form-section"><i class="fa fa-archive"></i>Berikut adalah produk yang termasuk dalam surat permohonan</h4>
                  <div class="form-body">
                    <div class="row">
                      <div class="form-group">
                        <!-- Tabel -->
                        <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                          <table class="table table-xs table-hover mb-0">
                              <thead>
                                  <tr>
                                      <th>&nbsp;</th>
                                      <th colspan="3">Reguler on Factur</th>
                                      <th>&nbsp;</th>
                                  </tr>
                                  <tr>
                                      <th width="2%">Gol</th>
                                      <th width="3%">Distributor</th>
                                      <th width="3%">Fahrenheit</th>
                                      <th width="3%">Total CN/Faktur</th>
                                      <th width="20%">Produk</th>
                                      <th width="10%">Kategori</th>
                                      <th width="10%">On / Off</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php for ($i=0; $i < 5; $i++): ?>
                                  <tr>
                                      <td><?php echo $i+1; ?></td>
                                      <td>5,00%</td>
                                      <td>5,00%</td>
                                      <td>5,00%</td>
                                      <td>Fixacep DS</td>
                                      <td>Antibiotik 40</td>
                                      <td>
                                        <div class="form-group">
                                          <div class="input-group">
                                            <label class="display-inline-block custom-control custom-checkbox">
                                              <input type="checkbox" name="on" class="custom-control-input">
                                              <span class="custom-control-indicator"></span>
                                              <span class="custom-control-description ml-0">On</span>
                                            </label>
                                            <label class="display-inline-block custom-control custom-checkbox">
                                              <input type="checkbox" name="off" class="custom-control-input">
                                              <span class="custom-control-indicator"></span>
                                              <span class="custom-control-description ml-0">Off</span>
                                            </label>
                                          </div>
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
                  <!-- /daftar-produk-dalam-permohonnan -->
                  <h4 class="form-section"><i class="fa fa-exclamation-circle"></i>Catatan</h4>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <p>1. Kondisi tersebut berlaku per Januari</p>
                          <p>2. Alasan dan pertimbangan mengapa harus diberikan disc. of faktur sebesar itu adalah sebagai berikut:</p>
                          <textarea class="form-control" cols="30" rows="3" readonly>Alasan disc of faktur</textarea>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <!-- /catatan -->
                  <h4 class="form-section"><i class="fa fa-info-circle"></i>Penjelasan</h4>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <!-- Tabel -->
                          <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                            <table class="table table-xs table-hover mb-0">
                                <thead>
                                    <tr>
                                      <th width="3%">No</th>
                                      <th width="30%">CN</th>
                                      <th width="3%">1</th>
                                      <th width="3%">2</th>
                                      <th width="3%">3</th>
                                      <th width="3%">4</th>
                                      <th width="3%">5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php for ($i=0; $i < 5; $i++): ?>
                                    <tr>
                                      <td><?php echo $i+1; ?></td>
                                      <td>DP RS</td>
                                      <td>30,00%</td>
                                      <td>1,00%</td>
                                      <td>20,00%</td>
                                      <td>5,00%</td>
                                      <td>1,00%</td>
                                    </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 350px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 307px;"></div></div>
                          </div>
                          <!-- End of Tabel -->
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <input type="button" class="btn btn-lg btn-primary" name="" value="Add">
                          <input type="button" class="btn btn-lg btn-primary" name="" value="Copy">
                          <input type="button" class="btn btn-lg btn-primary" name="" value="Edit">
                        </div>
                        <!-- /button-group-2 -->
                        <div class="form-group">
                          <input type="button" class="btn btn-lg btn-primary" name="" value="Release">
                          <input type="button" class="btn btn-lg btn-danger" name="" value="Delete">
                        </div>
                        <!-- /button-group-2 -->
                        <div class="form-group">
                          <input type="submit" class="btn btn-lg btn-success" name="" value="Simpan">
                          <input type="button" class="btn btn-lg btn-warning mr-1" name="" value="Batal">
                        </div>
                        <!-- /button-group-3 -->
                      </div>
                    </div>
                    <!-- /penjelasan-on-off-faktur -->
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <!-- Tabel -->
                          <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                            <table class="table table-xs table-hover mb-0">
                                <thead>
                                  <tr>
                                    <th width="5%">Golongan</th>
                                    <th width="3%">1</th>
                                    <th width="3%">2</th>
                                    <th width="3%">3</th>
                                    <th width="3%">4</th>
                                    <th width="3%">5</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php for ($i=0; $i < 5; $i++): ?>
                                  <tr>
                                    <td>Total CN OFF</td>
                                    <td>30,00%</td>
                                    <td>1,00%</td>
                                    <td>20,00%</td>
                                    <td>5,00%</td>
                                    <td>1,00%</td>
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
                    <!-- /penjelasan-golongan -->
                  </div>
                  <!-- /penjelasan -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>