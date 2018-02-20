<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Master Area</h4>
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
                              <th width="50%">Nama Area</th>
                              <th width="15%">Alias Area</th>
                              <th width="20">Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($area['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo $value->id; ?></td>
                          <td><?php echo strtoupper($value->area); ?></td>
                          <td><?php echo strtoupper($value->alias_area); ?></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="<?php echo site_url() ?>/Master/master_area/<?php echo $value->id; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                              <button type="button" onclick="delete_area('<?php echo $value->id; ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
              <h4 class="card-title">Tambah Area</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form class="form-horizontal" action="<?php echo site_url(); ?>/store-area" method="post">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Kode Area</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="id" type="text" placeholder="Kode Area" maxlength="5" minlength="2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Nama Area</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="area" type="text" placeholder="Nama Area" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Alias Area</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="alias_area" type="text" placeholder="Alias Area" >
                        </div>
                      </div>
                    <div class="form-group pull-right">
                      <input type="reset" class="btn btn-warning" value="Batal">
                      <input type="submit" class="btn btn-success" value="Simpan">
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