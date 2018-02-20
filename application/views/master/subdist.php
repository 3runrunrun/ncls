<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Master Distributor</h4>
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
                <div class="table-responsive height-250 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                              <th width="5%">Kode</th>
                              <th width="30%">Nama Subdistributor</th>
                              <th width="30%">Distributor</th>
                              <th width="10%">Jenis Distributor</th>
                              <th width="10%">Area</th>
                              <th width="15%">Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($subdist['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo strtoupper($value->id); ?></td>
                          <td><?php echo strtoupper($value->nama); ?></td>
                          <td><?php echo strtoupper($value->nama_distributor); ?></td>
                          <td><?php echo strtoupper($value->alias_distributor); ?></td>
                          <td><?php echo strtoupper($value->area); ?> (<?php echo strtoupper($value->alias_area); ?>)</td>
                          <td>
                            <div class="btn-group-vertical" role="group">
                              <a href="<?php echo site_url() ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                              <button type="button" onclick="" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
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
              <h4 class="card-title">Tambah Subdistributor</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3 col-xs-12">
                  <form class="form-horizontal" action="<?php echo site_url(); ?>/store-subdist" method="POST">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-2 col-xs-12">Kode Subdist</label>
                        <div class="col-sm-10 col-xs-12">
                          <?php $this->session->set_flashdata('id_subdist', $id_subdist); ?>
                          <span class="tag tag-warning tag-lg"><?php echo strtoupper($id_subdist); ?></span>
                        </div>
                      </div>
                      <!-- /kode-subdist -->
                      <div class="form-group row">
                        <label class="label-control col-sm-2 col-xs-12">Nama Subdist</label>
                        <div class="col-sm-10 col-xs-12">
                          <input type="text" name="nama" class="form-control border-primary" placeholder="Nama Subdistributor">
                        </div>
                      </div>
                      <!-- /nama -->
                      <div class="form-group row">
                        <label class="label-control col-sm-2 col-xs-12">Distributor</label>
                        <div class="col-sm-10 col-xs-12">
                          <select name="id_distributor" class="form-control select2">
                            <option value="" selected disabled>Pilih Distributor</option>
                            <?php if ($distributor['data']->num_rows() < 1): ?>
                            <option value="" disabled>Distributor belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($distributor['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo $value->alias_distributor; ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      <!-- /distributor -->
                    </div>
                    <div class="form-actions center">
                      <input type="submit" class="btn btn-success" value="Simpan">
                      <input type="reset" class="btn btn-warning" value="Batal">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /subdist -->
      </div>
    </div>
  </div>
</div>