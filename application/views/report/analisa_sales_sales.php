    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!--fitness stats-->
          
          <div class="row">
            <div class="col-xs-12">
              <div class="card border-top-blue">
                <div class="card-header no-border-bottom">
                  <h4 class="card-title">Profile Detailer</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  <div class="heading-elements"></div>
                </div>
                <div class="card-body">
                  <div class="card-block height-700 " style="overflow-y: scroll;">
                    <form class="form-horizontal" action="<?php echo site_url() ?>/store-detailer" method="post">
                      <div class="form-body">
                        <h4 class="form-section"><i class="fa fa-user"></i>Data Pribadi</h4>
                        <div class="row">
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label class="label-control col-sm-2">No. KTP</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" value="121221333" readonly="" name="ktp" type="text" placeholder="No. KTP" maxlength="16">
                              </div>
                            </div>
                            <!-- /ktp -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Nama</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" value="Bambang Tri" name="nama" type="text" placeholder="Nama">
                              </div>
                            </div>
                            <!-- /nama-detailer -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Tempat Lahir</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" value="Malang" name="tempat_lahir" type="text" placeholder="Tempat Lahir">
                              </div>
                              <label class="label-control col-sm-2">Tanggal Lahir</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" value="12-01-1990" name="tanggal_lahir" type="date">
                              </div>
                            </div>
                            <!-- /tempat-lahir /tanggal-lahir -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Kewarga<br />negaraan</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" value="Indonesia" name="kewarganegaraan" type="text" placeholder="Kewarganegaraan">
                              </div>
                              <label class="label-control col-sm-2">Jenis Kelamin</label>
                              <div class="col-sm-4">
                                <select name="jenis_kelamin" class="form-control border-primary">
                                  <option value=""  disabled>Jenis Kelamin</option>
                                  <option value="l" selected="">Laki-Laki</option>
                                  <option value="p" disabled="">Perempuan</option>
                                </select>
                              </div>
                            </div>
                            <!-- /kewarganegaraan /jenis-kelamin -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Agama</label>
                              <div class="col-sm-4">
                                <select name="agama" class="form-control border-primary">
                                  <option value=""  disabled>Pilih Agama</option>
                                  <option value="katolik">Katolik</option>
                                  <option value="kristen">Kristen</option>
                                  <option value="islam" selected="">Islam</option>
                                  <option value="buddha">Buddha</option>
                                  <option value="hindu">Hindu</option>
                                </select>
                              </div>
                            </div>
                            <!-- /agama -->
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Pendidikan Terakhir</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" name="pendidikan_terakhir" type="text" placeholder="Pendidikan Terakhir">
                              </div>
                              <label class="label-control col-sm-2">Status Perkawinan</label>
                              <div class="col-sm-4">
                                <select name="status_perkawinan" class="form-control border-primary">
                                  <option value=""  disabled>Status Perkawinan</option>
                                  <option value="k" selected="">Kawin</option>
                                  <option value="tk">Tidak Kawin</option>
                                </select>
                              </div>
                            </div>
                            <!-- /pendidikan-terakhir /status-perkawinan -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Nama Istri</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" value="Sri" name="istri" type="text" placeholder="Nama Istri">
                              </div>
                              <label class="label-control col-sm-2">Nama Anak</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" value="Bagus Tri" name="anak[]" type="text" placeholder="Nama Anak">
                                <br />
                                <!-- <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Anak</button> -->
                              </div>
                            </div>
                            <!-- /nama-istri /nama-anak -->
                          </div>
                        </div>
                        <!-- /data-pribadi -->
                        <h4 class="form-section"><i class="fa fa-user"></i>Data Field Force</h4>
                        <div class="row">
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Kode Detailer</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" value="1212334" name="id" type="text" placeholder="Kode" maxlength="10" minlength="2">
                              </div>
                            </div>
                            <!-- /id -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Nama Spv.</label>
                              <div class="col-sm-10">
                                <select name="id_supervisor" id=""  class="form-control border-primary select2">
                                  <option value="" selected>Faisal</option>
                                  
                                </select>
                              </div>
                            </div>
                            <!-- /nama-supervisor -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Nama RM</label>
                              <div class="col-sm-10">
                                <select name="id_rm" id="" class="form-control border-primary select2">
                                  <option value="" selected>Edward</option>
                                 
                                </select>
                              </div>
                            </div>
                            <!-- /nama-dsm -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Nama RSM</label>
                              <div class="col-sm-10">
                                <select name="id_rsm" id="" class="form-control border-primary select2">
                                  <option value="" selected>Hillary</option>
                                 
                                </select>
                              </div>
                            </div>
                            <!-- /nama-rsm -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Nama RM Lama</label>
                              <div class="col-sm-10">
                                <select name="id_rm_old" id="" class="form-control border-primary select2">
                                  <option value="" selected>Edward</option>
                                  
                                </select>
                              </div>
                            </div>
                            <!-- /nama-dsm-old -->
                          </div>
                          <!-- /left-row -->
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Tanggal Masuk</label>
                              <div class="col-sm-10">
                                <input class="form-control border-primary" value="12-10-2012" name="tanggal_masuk" type="date">
                              </div>
                            </div>
                            <!-- /tanggal-masuk -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Area</label>
                              <div class="col-sm-4">
                                <select name="id_area" class="form-control border-primary select2">
                                  <option value="" selected disabled>Malang</option>
                                 
                                </select>
                              </div>
                              <label class="label-control col-sm-2">Subarea</label>
                              <div class="col-sm-4">
                                <input type="text" name="subarea" value="Malang Kota" class="form-control border-primary" placeholder="Subarea">
                              </div>
                            </div>
                            <!-- /area /subarea -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Telp. Rumah</label>
                              <div class="col-sm-4">
                                <input type="tel" name="telp_rumah" value="622471o2787" class="form-control border-primary" placeholder="021xxxx" maxlength="13">
                              </div>
                              <label class="label-control col-sm-2">No. Hp</label>
                              <div class="col-sm-4">
                                <input type="tel" name="no_hp" value="085755533005" class="form-control border-primary" placeholder="08xxxx" maxlength="13">
                              </div>
                            </div>
                            <!-- /telp-rumah /no-hp -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Gol</label>
                              <div class="col-sm-4">
                                <select name="golongan" class="form-control border-primary">
                                  <option value=""  disabled>Pilih Golongan</option>
                                  <option value="a" selected="">A</option>
                                  <option value="b">B</option>
                                  <option value="c">C</option>
                                </select>
                              </div>
                              <label class="label-control col-sm-2">Jabatan</label>
                              <div class="col-sm-4">
                                <select name="id_jabatan" class="form-control border-primary">
                                  <option value="" selected disabled>SPV</option>
                                
                                </select>
                              </div>
                            </div>
                            <!-- /gol /jabatan -->
                          </div>
                          <!-- /right-row -->
                        </div>
                        <!-- /data-detailer -->
                        <h4 class="form-section"><i class="fa fa-user"></i>Data Salary &amp; Fee</h4>
                        <div class="row">
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Bank</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" value="BRSI" name="bank" type="text" placeholder="Nama Bank">
                              </div>
                              <label class="label-control col-sm-2">Akun</label>
                              <div class="col-sm-4">
                                <input class="form-control border-primary" value="019019 01018 0 19 223243" name="sewa_kendaraan" type="text" placeholder="No. rekening">
                              </div>
                            </div>
                            <!-- /bank /akun -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Gaji</label>
                              <div class="col-sm-4">
                                <div class="input-group">
                                  <span class="input-group-addon">Rp</span>
                                  <input class="form-control border-primary" value="200.000" name="net_salary" type="number" placeholder="Gaji">
                                </div>
                              </div>
                              <label class="label-control col-sm-2">Housing</label>
                              <div class="col-sm-4">
                                <div class="input-group">
                                  <span class="input-group-addon">Rp</span>
                                  <input class="form-control border-primary" value="200.000" name="housing" type="number" placeholder="Housing">
                                </div>
                              </div>
                            </div>
                            <!-- /gaji /housing -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Tunjangan</label>
                              <div class="col-sm-4">
                                <div class="input-group">
                                  <span class="input-group-addon">Rp</span>
                                  <input class="form-control border-primary" value="300.000" name="tunjangan" type="number" placeholder="Tunjangan">
                                </div>
                              </div>
                              <label class="label-control col-sm-2">Sewa Kendaraan</label>
                              <div class="col-sm-4">
                                <div class="input-group">
                                  <span class="input-group-addon">Rp</span>
                                  <input class="form-control border-primary" value="20.000" name="sewa_kendaraan" type="number" placeholder="Sewa Kendaraan">
                                </div>
                              </div>
                            </div>
                            <!-- /tunjangan /sewa-kendaraan -->
                          </div>
                          <!-- /left-row -->
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Detailer Lama</label>
                              <div class="col-sm-10">
                                <select name="id_detailer_exchange" class="form-control border-primary select2">
                                  <option value="" selected disabled>Edy</option>
                                  
                                </select>
                                <p>*) Detailer yang akan diganti</p>
                              </div>
                            </div>
                            <!-- /tanggal-masuk /tanggal-keluar -->
                            <div class="form-group row">
                              <label class="label-control col-sm-2">Keterangan</label>
                              <div class="col-sm-10">
                                <textarea name="keterangan" cols="30" rows="3" class="form-control border-primary"></textarea>
                              </div>
                            </div>
                            <!-- /keterangan -->
                          </div>
                          <!-- /right-row -->
                        </div>
                      </div>
                      <div class="form-action pull-right">
                        <!-- <input type="submit" class="btn btn-success" name="" value="Simpan"> -->
                        <input type="reset" class="btn btn-warning mr-1" name="" value="Kembali">
                      </div>
                      <!-- /submit -->
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Grafik penjualan</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block height-300 " style="overflow-y: scroll;">
                <div id="morris-line-chart" ></div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
        </div>
    </div>
   