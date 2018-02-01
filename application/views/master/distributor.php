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
                <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y border-top-red" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                              <th width="5%">Kode</th>
                              <th width="40%">Nama Distributor</th>
                              <th width="10%">Jenis Distributor</th>
                              <th width="20%">Area</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($distributor['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo strtoupper($value->id_distributor); ?></td>
                          <td><?php echo $value->distributor; ?></td>
                          <td><?php echo strtoupper($value->alias_distributor); ?></td>
                          <td><?php echo strtoupper($value->area); ?> (<?php echo strtoupper($value->alias_area); ?>)</td>
                        </tr>
                        <?php endforeach; ?>
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
              <h4 class="card-title">Tambah Master Distributor</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-xs-12">
                  <div class="bs-callout-danger callout-border-left mt-1 p-1">
                    <p class="card-text"><strong>Do not ever upload this!!!</strong></p>
                  </div>
                  <br />
                </div>
                <!-- /alert untuk fungsi master distributor -->
                <div class="col-sm-6 offset-md-3">
                  <form class="form-horizontal" action="<?php echo site_url(); ?>/store-m-distributor" method="post">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Kode Distributor</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="id" type="text" placeholder="Kode Distributor" maxlength="5" minlength="2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Nama Distributor</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="distributor" type="text" placeholder="Nama Distributor" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Alias Distributor</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="alias_distributor" type="text" placeholder="Alias Distributor" >
                        </div>
                      </div>
                    <div class="form-group pull-right">
                      <input type="submit" class="btn btn-success" value="Simpan">
                      <input type="reset" class="btn btn-warning" value="Batal">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /master-distributor -->
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Tambah Distributor</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form class="form-horizontal" action="<?php echo site_url(); ?>/store-distributor" method="post">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Kode Distributor</label>
                        <div class="col-sm-10">
                          <select name="id_distributor" class="form-control select2">
                            <option value="" selected disabled>Pilih Distributor</option>
                            <?php if ($master_distributor['data']->num_rows() < 1): ?>
                            <option value="" disabled>Master Distributor belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($master_distributor['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo strtoupper($value->alias_distributor); ?>) <?php echo strtoupper($value->distributor); ?></option>
                            <?php endforeach ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      <!-- kode-distributor -->
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Area</label>
                        <div class="col-sm-10">
                          <select name="id_area" class="form-control select2">
                            <option value="" selected disabled>Pilih Area</option>
                            <?php if ($area['data']->num_rows() < 1): ?>
                            <option value="" disabled>Area belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($area['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->area); ?></option>
                            <?php endforeach ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      <!-- kode-area -->
                    </div>
                    <div class="form-group pull-right">
                      <input type="submit" class="btn btn-success" value="Simpan">
                      <input type="reset" class="btn btn-warning" value="Batal">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /distributor -->
      </div>
    </div>
  </div>
</div>