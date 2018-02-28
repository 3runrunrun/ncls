<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- general -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Daftar Faktur (General)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <!-- pencarian -->
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form method="post" class="form-horizontal">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-3">Jenis<br />Distributor</label>
                        <div class="col-sm-6">
                          <select name="id_m_distributor" class="form-control select2">
                            <option value="" selected disabled>Pilih Distributor</option>
                            <!-- disini foreachnya -->
                            <?php if ($master_distributor['data']->num_rows() < 1): ?>
                            <option value="" selected disabled>Distributor belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($master_distributor['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->alias_distributor); ?></option>
                            <?php endforeach ?>  
                            <?php endif ?>
                          </select>
                        </div>
                        <div class="col-sm-3">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Tampil</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /pencarian -->

              <!-- tabel -->
              <div class="card-block">
                <div class="table-responsive height-500 border-top-red">
                  <table class="table table-xs table-hover">
                    <thead>
                      <tr>
                        <th>Nomor Faktur</th>
                        <th>SPV / RM<br />(yang mengajukan)</th>
                        <th>Tanggal</th>
                        <th>Jenis Diskon</th>
                        <th>Tanggal<br />Spv</th>
                        <th>Tanggal<br />RM</th>
                        <th>Tanggal<br />Direktur</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($ko_general['data']->result() as $value): ?>
                        <?php 
                          switch ($value->status) {
                            case 'belum':
                              $status = '<span class="tag tag-pill tag-danger">Belum Diproses</span>';
                              break;
                            case 'spv':
                              $status = '<span class="tag tag-pill tag-warning">Approved by SPV</span>';
                              break;
                            case 'rm':
                              $status = '<span class="tag tag-pill tag-warning">Approved by RM</span>';
                              break;
                            case 'rilis':
                              $status = '<span class="tag tag-pill tag-success">Rilis</span>';
                              break;
                            
                            default:
                              # code...
                              break;
                          }

                          switch ($value->jenis_ko) {
                            case 'off':
                              $jenis_ko = '<span class="tag tag-pill tag-info">Off Faktur</span>';
                              break;
                            case 'on':
                              $jenis_ko = '<span class="tag tag-pill tag-info">On Faktur</span>';
                              break;
                            case 'onoff':
                              $jenis_ko = '<span class="tag tag-pill tag-success">On &amp; Off Faktur</span>';
                              break;
                            
                            default:
                              # code...
                              break;
                          }
                          
                          $tanggal = date('d-M-Y', strtotime($value->tanggal));
                         ?>
                      <tr>
                        <td><?php echo str_replace('-', '/', $value->id); ?></td>
                        <td><?php echo $value->nama_detailer; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $jenis_ko; ?></td>
                        <td><?php echo $value->tgl_spv; ?></td>
                        <td><?php echo $value->tgl_rm; ?></td>
                        <td><?php echo $value->tgl_direktur; ?></td>
                        <td><?php echo $status; ?></td>
                        <td>
                          <div class="btn-group-vertical">
                            <button type="button" class="btn btn-warning block" data-toggle="modal" data-backdrop="false" data-target="#verifikasi-general">Verifikasi</button>
                            <button type="button" class="btn btn-primary">Detail</button>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- End of Tabel -->
              </div>
              <!-- /tabel -->
            </div>
          </div>
        </div>
      </div>
      <!-- /general -->      

      <!-- tender -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Daftar Faktur</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form method="post" class="form-horizontal">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-3">Jenis<br />Distributor</label>
                        <div class="col-sm-6">
                          <select name="id_m_distributor" class="form-control select2">
                            <option value="" selected disabled>Pilih Distributor</option>
                            <!-- disini foreachnya -->
                            <?php if ($master_distributor['data']->num_rows() < 1): ?>
                            <option value="" selected disabled>Distributor belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($master_distributor['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->alias_distributor); ?></option>
                            <?php endforeach ?>  
                            <?php endif ?>
                          </select>
                        </div>
                        <div class="col-sm-3">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Tampil</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /pencarian -->
              <div class="card-block">
                <!-- Tabel -->
                <div class="table-responsive height-500 border-top-red">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>SP</th>
                        <th>Nomor Faktur</th>
                        <th>SPV / RM<br />(yang mengajukan)</th>
                        <th>Tanggal</th>
                        <th>Jenis Diskon</th>
                        <th>Tanggal<br />Spv</th>
                        <th>Tanggal<br />RM</th>
                        <th>Tanggal<br />Direktur</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($ko_tender['data']->result() as $value_t): ?>
                        <?php 
                          switch ($value_t->status) {
                            case 'belum':
                              $status_t = '<span class="tag tag-pill tag-danger">Belum Diproses</span>';
                              break;
                            case 'spv':
                              $status_t = '<span class="tag tag-pill tag-warning">Approved by SPV</span>';
                              break;
                            case 'rm':
                              $status_t = '<span class="tag tag-pill tag-warning">Approved by RM</span>';
                              break;
                            case 'rilis':
                              $status_t = '<span class="tag tag-pill tag-success">Rilis</span>';
                              break;
                            
                            default:
                              # code...
                              break;
                          }

                          switch ($value_t->jenis_ko) {
                            case 'off':
                              $jenis_ko_t = '<span class="tag tag-pill tag-info">Off Faktur</span>';
                              break;
                            case 'on':
                              $jenis_ko_t = '<span class="tag tag-pill tag-info">On Faktur</span>';
                              break;
                            case 'onoff':
                              $jenis_ko_t = '<span class="tag tag-pill tag-success">On &amp; Off Faktur</span>';
                              break;
                            
                            default:
                              # code...
                              break;
                          }
                          
                          $tanggal_t = date('d-M-Y', strtotime($value_t->tanggal));
                         ?>
                      <tr>
                        <td><?php echo $value_t->sp; ?></td>
                        <td><?php echo str_replace('-', '/', $value_t->id); ?></td>
                        <td><?php echo $value_t->nama_detailer; ?></td>
                        <td><?php echo $tanggal_t; ?></td>
                        <td><?php echo $jenis_ko_t; ?></td>
                        <td><?php echo $value_t->tgl_spv; ?></td>
                        <td><?php echo $value_t->tgl_rm; ?></td>
                        <td><?php echo $value_t->tgl_direktur; ?></td>
                        <td><?php echo $status_t; ?></td>
                        <td>
                          <div class="btn-group-vertical">
                            <button type="button" class="btn btn-warning">Verifikasi</button>
                            <button type="button" class="btn btn-primary">Detail</button>
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
      <!-- /tender -->
    </div>
  </div>
</div>

<!-- modal-general -->
<div class="modal fade" id="verifikasi-general" role="dialog" aria-labelledby="verifikasi-faktur-general" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="verifikasi-faktur-general">Verifikasi Faktur</h4>
      </div>
      <!-- /modal-header -->
      <div class="modal-body">
        Body
      </div>
      <!-- /modal-body -->
      <div class="modal-footer">
        <button class="btn btn-success" type="submit">Simpan</button>
        <button class="btn btn-warning" type="reset">Batal</button>
      </div>
      <!-- /modal-footer -->
    </div>
  </div>
</div>
<!-- /modal-general -->

<script type="text/javascript">
  $(document).ready(function() {
    $('th').css({
      'text-align': 'center',
    });
    $('td').css({
      'vertical-align': 'middle',
    });
    $('td').addClass('text-truncate');
  });
</script>