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
                <?php if ( ! is_null($this->session->flashdata())): ?>
                <?php if ( ! is_null($this->session->flashdata('error_msg'))): ?>  
                <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?php echo $this->session->flashdata('error_msg'); ?>
                </div>
                <?php elseif ( ! is_null($this->session->flashdata('success_msg'))): ?>
                <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?php echo $this->session->flashdata('success_msg'); ?>
                </div>
                <?php elseif ( ! is_null($this->session->flashdata('query_msg'))): ?>
                <div class="bs-callout-danger callout-border-left mt-1 p-1">
                  <strong>Database Error!</strong>
                  <p><?php echo $this->session->flashdata('query_msg')['message']; ?> <strong><?php echo $this->session->flashdata('query_msg')['code']; ?></strong></p>
                </div><br />
                <?php endif; ?>
                <?php endif; ?>
                <!-- /alert -->
                <!-- Tabel -->
                <div class="table-responsive height-350 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Tgl. Masuk</th>
                          <th>Tgl. Mutasi</th>
                          <th>Keterangan</th>
                          <th>Area</th>
                          <th>Agama</th>
                          <th>Gol</th>
                          <th>Subarea</th>
                          <th>Status</th>
                          <th>Nama Spv.</th>
                          <th>Nama RM</th>
                          <th>Nama RSM</th>
                          <th>Kode RM Lama</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($detailer['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo strtoupper($value->id); ?></td>
                          <td><?php echo $value->nama; ?></td>
                          <td><?php echo $value->tanggal_masuk; ?></td>
                          <td><?php echo $value->tanggal_mutas; ?></td>
                          <td><?php echo $value->keterangan; ?></td>
                          <td><?php echo $value->area; ?></td>
                          <td><?php echo $value->agama; ?></td>
                          <td><?php echo $value->golongan; ?></td>
                          <td><?php echo $value->subarea; ?></td>
                          <td>
                            <span class="tag tag-pill tag-success">
                              <?php echo strtoupper($value->status); ?>
                            </span>
                          </td>
                          <td><?php echo $value->nama_spv; ?></td>
                          <td><?php echo $value->nama_rm; ?></td>
                          <td><?php echo $value->nama_rsm; ?></td>
                          <td><?php echo $value->nama_rm_old; ?></td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                  </table>
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
                <form class="form-horizontal" action="<?php echo site_url() ?>/store-detailer" method="post">
                  <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-user"></i>Data Pribadi</h4>
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label class="label-control col-sm-2">No. KTP</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="ktp" type="text" placeholder="No. KTP" maxlength="16">
                          </div>
                        </div>
                        <!-- /ktp -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="nama" type="text" placeholder="Nama">
                          </div>
                        </div>
                        <!-- /nama-detailer -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Tempat Lahir</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="tempat_lahir" type="text" placeholder="Tempat Lahir">
                          </div>
                          <label class="label-control col-sm-2">Tanggal Lahir</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="tanggal_lahir" type="date">
                          </div>
                        </div>
                        <!-- /tempat-lahir /tanggal-lahir -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Kewarga<br />negaraan</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="kewarganegaraan" type="text" placeholder="Kewarganegaraan">
                          </div>
                          <label class="label-control col-sm-2">Jenis Kelamin</label>
                          <div class="col-sm-4">
                            <select name="jenis_kelamin" class="form-control border-primary">
                              <option value="" selected disabled>Jenis Kelamin</option>
                              <option value="l">Laki-Laki</option>
                              <option value="p">Perempuan</option>
                            </select>
                          </div>
                        </div>
                        <!-- /kewarganegaraan /jenis-kelamin -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Agama</label>
                          <div class="col-sm-4">
                            <select name="agama" class="form-control border-primary">
                              <option value="" selected disabled>Pilih Agama</option>
                              <option value="katolik">Katolik</option>
                              <option value="kristen">Kristen</option>
                              <option value="islam">Islam</option>
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
                              <option value="" selected disabled>Status Perkawinan</option>
                              <option value="k">Kawin</option>
                              <option value="tk">Tidak Kawin</option>
                            </select>
                          </div>
                        </div>
                        <!-- /pendidikan-terakhir /status-perkawinan -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama Istri</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="istri" type="text" placeholder="Nama Istri">
                          </div>
                          <label class="label-control col-sm-2">Nama Anak</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="anak[]" type="text" placeholder="Nama Anak">
                            <br />
                            <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Anak</button>
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
                            <input class="form-control border-primary" name="id" type="text" placeholder="Kode" maxlength="10" minlength="2">
                          </div>
                        </div>
                        <!-- /id -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama Spv.</label>
                          <div class="col-sm-10">
                            <select name="id_supervisor" id="" class="form-control border-primary select2">
                              <option value="" selected>Pilih Supervisor</option>
                              <?php if ($supervisor['data']->num_rows() < 1): ?>
                              <option value="" disabled>Supervisor belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($supervisor['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <!-- /nama-supervisor -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama RM</label>
                          <div class="col-sm-10">
                            <select name="id_rm" id="" class="form-control border-primary select2">
                              <option value="" selected>Pilih RM</option>
                              <?php if ($rm['data']->num_rows() < 1): ?>
                              <option value="" disabled>RM belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($rm['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <!-- /nama-dsm -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama RSM</label>
                          <div class="col-sm-10">
                            <select name="id_rsm" id="" class="form-control border-primary select2">
                              <option value="" selected>Pilih RSM</option>
                              <?php if ($rsm['data']->num_rows() < 1): ?>
                              <option value="" disabled>RSM belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($rsm['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <!-- /nama-rsm -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama RM Lama</label>
                          <div class="col-sm-10">
                            <select name="id_rm_old" id="" class="form-control border-primary select2">
                              <option value="" selected>Pilih RM Lama</option>
                              <?php if ($rm_lama['data']->num_rows() < 1): ?>
                              <option value="" disabled>RM belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($rm_lama['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
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
                            <input class="form-control border-primary" name="tanggal_masuk" type="date">
                          </div>
                        </div>
                        <!-- /tanggal-masuk -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Area</label>
                          <div class="col-sm-4">
                            <select name="id_area" class="form-control border-primary select2">
                              <option value="" selected disabled>Pilih Area</option>
                              <?php if ($area['data']->num_rows() < 1): ?>
                                <option value="">Area tersedia</option>
                              <?php else: ?>
                              <?php foreach ($area['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->area); ?></option>
                              <?php endforeach; ?>
                              <?php endif; ?>
                            </select>
                          </div>
                          <label class="label-control col-sm-2">Subarea</label>
                          <div class="col-sm-4">
                            <input type="text" name="subarea" class="form-control border-primary" placeholder="Subarea">
                          </div>
                        </div>
                        <!-- /area /subarea -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Telp. Rumah</label>
                          <div class="col-sm-4">
                            <input type="tel" name="telp_rumah" class="form-control border-primary" placeholder="021xxxx" maxlength="13">
                          </div>
                          <label class="label-control col-sm-2">No. Hp</label>
                          <div class="col-sm-4">
                            <input type="tel" name="no_hp" class="form-control border-primary" placeholder="08xxxx" maxlength="13">
                          </div>
                        </div>
                        <!-- /telp-rumah /no-hp -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Gol</label>
                          <div class="col-sm-4">
                            <select name="golongan" class="form-control border-primary">
                              <option value="" selected disabled>Pilih Golongan</option>
                              <option value="a">A</option>
                              <option value="b">B</option>
                              <option value="c">C</option>
                            </select>
                          </div>
                          <label class="label-control col-sm-2">Jabatan</label>
                          <div class="col-sm-4">
                            <select name="id_jabatan" class="form-control border-primary">
                              <option value="" selected disabled>Pilih Jabatan</option>
                              <?php if ($jabatan['data']->num_rows() < 1): ?>
                                <option value="">Jabatan belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($jabatan['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>">(<?php echo strtoupper($value->id); ?>) &minus; <?php echo strtoupper($value->jabatan); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
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
                            <input class="form-control border-primary" name="bank" type="text" placeholder="Nama Bank">
                          </div>
                          <label class="label-control col-sm-2">Akun</label>
                          <div class="col-sm-4">
                            <input class="form-control border-primary" name="sewa_kendaraan" type="text" placeholder="No. rekening">
                          </div>
                        </div>
                        <!-- /bank /akun -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Gaji</label>
                          <div class="col-sm-4">
                            <div class="input-group">
                              <span class="input-group-addon">Rp</span>
                              <input class="form-control border-primary" name="net_salary" type="number" placeholder="Gaji">
                            </div>
                          </div>
                          <label class="label-control col-sm-2">Housing</label>
                          <div class="col-sm-4">
                            <div class="input-group">
                              <span class="input-group-addon">Rp</span>
                              <input class="form-control border-primary" name="housing" type="number" placeholder="Housing">
                            </div>
                          </div>
                        </div>
                        <!-- /gaji /housing -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Tunjangan</label>
                          <div class="col-sm-4">
                            <div class="input-group">
                              <span class="input-group-addon">Rp</span>
                              <input class="form-control border-primary" name="tunjangan" type="number" placeholder="Tunjangan">
                            </div>
                          </div>
                          <label class="label-control col-sm-2">Sewa Kendaraan</label>
                          <div class="col-sm-4">
                            <div class="input-group">
                              <span class="input-group-addon">Rp</span>
                              <input class="form-control border-primary" name="sewa_kendaraan" type="number" placeholder="Sewa Kendaraan">
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
                              <option value="" selected disabled>Detailer</option>
                              <?php if ($detailer_exchange['data']->num_rows() < 1): ?>
                                <option value="">Detailer belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($detailer_exchange['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
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
                    <input type="submit" class="btn btn-success" name="" value="Simpan">
                    <input type="reset" class="btn btn-warning mr-1" name="" value="Batal">
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