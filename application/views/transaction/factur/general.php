<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Faktur KO dan Discount On &amp; Off</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" method="POST">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section">Info Faktur</h4>
                        <div class="form-group">
                          <label class="label-control">No. Faktur</label><br />
                          <?php $no_faktur = $q_faktur . '-HL-' . date('d-Y'); ?>
                          <?php $this->session->set_userdata('id_faktur', $no_faktur); ?>
                          <span class="tag tag-xl tag-primary"><?php echo str_replace('-', '/', $no_faktur); ?></span>
                        </div>
                        <!-- /no-faktur -->
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section">Pemohon</h4>
                        <div class="form-group">
                          <label class="label-control">Detailer</label>
                          <select name="id_detailer" class="form-control select2">
                            <option value="" selected disabled>Pilih Detailer</option>
                            <?php if ($detailer['data']->num_rows() < 1): ?>
                            <option value="" disabled>Detailer belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($detailer['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /id-detailer -->
                      </div>
                      <!-- /right-col -->
                    </div>
                    <!-- /no-faktur /id-detailer -->
                    <h4 class="form-section">Informasi KO</h4>
                    <div class="row">
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Tanggal Permohonan</label>
                          <?php $time_permohonan = strtotime(date('Y-m-d')); ?>
                          <input type="date" name="tanggal_permohonan" class="form-control border-primary" value="<?php echo date('Y-m-d') ?>" readonly>
                        </div>
                        <!-- /tanggal-permohonan -->
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Menyetujui</label>
                          <select name="id_detailer" class="form-control select2">
                            <option value="" selected disabled>Pilih Pegawai</option>
                            <?php if ($detailer['data']->num_rows() < 1): ?>
                            <option value="" disabled>Pegawai belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($detailer['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /menyutujui -->
                      </div>
                      <!-- /mid-col -->
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Approver</label>
                          <select name="id_detailer" class="form-control select2">
                            <option value="" selected disabled>Pilih Approver</option>
                            <?php if ($detailer['data']->num_rows() < 1): ?>
                            <option value="" disabled>Direktur belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($detailer['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /approve -->
                      </div>
                      <!-- /right-col -->
                    </div>
                    <!-- /tanggal-permohonan /menyetujui /approver -->
                    <h4 class="form-section">Daftar Permintaan</h4>
                  </div>
                  <div class="form-body">
                    <div class="row">
                      <div class="form-group">
                        <!-- Tabel -->
                        <div class="table-responsive height-250">
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