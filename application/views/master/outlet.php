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
                  <form class="form-horizontal" method="post" id="show-outlet-by-dist-area">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-sm-4 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <select name="distributor" id="src-distributor" class="form-control select2">
                                <option value="" selected disabled>Pilih Distributor</option>
                                <?php if ($master_distributor['data']->num_rows() < 1): ?>
                                <option value="">Distributor belum tersedia</option>
                                <?php else: ?>
                                <?php foreach ($master_distributor['data']->result() as $value): ?>
                                <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->alias_distributor); ?></option>
                                <?php endforeach ?>
                                <?php endif; ?>
                              </select>
                            </div>
                            <!-- /ALL -->
                          </div>
                        </div>
                        <!-- /row1 -->
                        <div class="col-sm-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <select name="id_area" class="form-control select2" id="src-id-area">
                                <option value="" selected disabled>Pilih Area</option>
                                <?php if ($area['data']->num_rows() < 1): ?>
                                <option value="">Area belum tersedia</option>
                                <?php else: ?>
                                <?php foreach ($area['data']->result() as $value): ?>
                                <option value="<?php echo $value->id; ?>">(<?php echo $value->id; ?>) - <?php echo strtoupper($value->area); ?></option>
                                <?php endforeach ?>
                                <?php endif; ?>
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
                <div class="table-responsive height-250 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Kode</th>
                            <th>Nama Outlet</th>
                            <th>Segmen</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Distributor</th>
                            <th>Area Distributor</th>
                            <th>Kode Lama</th>
                            <th>Detailer</th>
                            <th>Periode</th>
                            <th>Dispensing</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($outlet['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo $value->id; ?></td>
                          <td><?php echo ucwords($value->nama_outlet); ?></td>
                          <td><?php echo strtoupper($value->segmen); ?></td>
                          <td><?php echo ucwords($value->alamat); ?></td>
                          <td><?php echo ucwords($value->kota); ?></td>
                          <td><?php echo ucwords($value->alias_distributor); ?></td>
                          <td><?php echo ucwords($value->alias_area); ?> (<?php echo strtoupper($value->area); ?>)</td>
                          <td><?php $value->kode_lam; ?></td>
                          <td><?php $nama_detailer = ( ! isset($value->nama_detailer)) ? '-' : $value->nama_detailer; echo ucwords($nama_detailer); ?></td>
                          <td><?php $periode = ( ! isset($value->periode)) ? '-' : $value->periode; echo ucwords($periode); ?></td>
                          <td><?php $dispensing = ( ! isset($value->dispensing)) ? '-' : $value->dispensing; echo strtoupper($dispensing); ?></td>
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
              <h4 class="card-title">Tambah Outlet</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form class="form-horizontal" action="<?php echo site_url(); ?>/store-outlet" method="post">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Kode Outlet</label>
                        <div class="col-sm-10">
                          <?php $this->session->set_userdata('id_outlet', $id_outlet); ?>
                          <span class="tag tag-warning tag-xl"><?php echo $id_outlet; ?></span>
                        </div>
                      </div>
                      <!-- /prefix-id /id -->
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Area Distributor</label>
                        <div class="col-sm-4">
                          <select name="id_area" class="form-control select2" onchange="show_distributor_by_area(this); show_detailer_by_area(this);">
                            <option value="" selected disabled>Pilih Area</option>
                            <?php if ($area['data']->num_rows() < 1): ?>
                            <option value="">Area belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($area['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo strtoupper($value->alias_area); ?>) - <?php echo strtoupper($value->area); ?></option>
                            <?php endforeach ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <label class="label-control col-sm-2">Distributor</label>
                        <div class="col-sm-4">
                          <select name="id_distributor" id="distributor" class="form-control border-primary select2">
                            <option value="" selected disabled>Pilih Distributor</option>
                          </select>
                        </div>
                      </div>
                      <!-- /distributor -->
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Detailer</label>
                        <div class="col-sm-10">
                          <select name="id_detailer" id="detailer" class="form-control border-primary select2">
                            <option value="" selected disabled>Pilih Detailer</option>
                          </select>
                        </div>
                      </div>
                      <!-- /detailer -->
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Periode</label>
                        <div class="col-sm-4">
                          <input type="date" name="periode" class="form-control border-primary">
                        </div>
                      </div>
                      <!-- /area -->
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
                          <input type="text" name="kota" class="form-control border-primary" placeholder="Masukkan Kota">
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
                            <option value="" selected disabled>Pilih Segmen</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                          </select>
                        </div>
                        <label class="label-control col-sm-2 offset-md-1">Dispensing</label>
                        <div class="col-sm-3">
                          <select name="dispensing" class="form-control border-primary">
                            <option value="" selected disabled>--</option>
                            <option value="y">Y</option>
                            <option value="n">N</option>
                          </select>
                        </div>
                      </div>
                      <!-- /segmen /dispensing -->
                      <div class="form-group pull-right">
                        <input type="submit" class="btn btn-success" name="" value="Simpan">
                        <input type="submit" class="btn btn-warning" name="" value="Batal">
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
<script type="text/javascript" src="<?php echo base_url() ?>/process-js/master/outlet/show-distributor-by-kind.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/process-js/master/outlet/show-outlet-by-dist-area.js"></script>
<script type="text/javascript">
  function delete_outlet(id) {
    var r = confirm("Apakah yakin menghapus outlet ini?");
    if (r == true) {
      $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/store-outlet/delete",
        data: {'id': id},
        dataType: "text",
           success:  function(data) {
               location.reload();
           },
           error: function(x, t, m) {

           }
      });
    } else {}
  }
</script>
