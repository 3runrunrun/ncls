<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Master Aset</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <?php if ( ! is_null($this->session->flashdata())): ?>
                <?php if ( ! is_null($this->session->flashdata('error_msg'))): ?>  
                <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?php echo $this->session->flashdata('error_msg'); ?>
                </div>
                <?php elseif ( ! is_null($this->session->flashdata('success_msg'))): ?>
                <div class="alert alert-success alert-dismissible mb-2" role="alert">
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
                        <th>Kode Aset</th>
                        <th>Tanggal</th>
                        <th>Bentuk Aset</th>
                        <th>Nominal<br />(Rp)</th>
                        <th>Nilai Penyusutan</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($aset['data']->result() as $value): ?>
                      <?php 
                        $tanggal = strtotime($value->tanggal);
                       ?>
                      <tr>
                        <td><?php echo strtoupper($value->id); ?></td>
                        <td><?php echo date('d-M-Y', $tanggal); ?></td>
                        <td><?php echo strtoupper($value->jenis); ?></td>
                        <td align="right"><?php echo number_format($value->nominal, 0, ',', '.'); ?></td>
                        <td><?php echo number_format($value->penyusutan, 0, ',', '.'); ?>%</td>
                        <td>
                          <div class="btn-group-vertical" role="group">
                            <a href="<?php echo site_url() ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                            <button type="button" onclick="delete_aset('<?php echo $value->id ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
      <!-- /tabel-customer -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Tambah Aset</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/store-aset" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12 offset-md-3">
                        <div class="form-group">
                          <label class="label-control">Tanggal</label>
                          <input class="form-control border-primary" name="tanggal" type="date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <!-- /tanggal -->
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label class="label-control">Jenis Aset</label>
                              <input type="text" name="jenis[]" class="form-control border-primary" placeholder="Jenis Aset">
                            </div>
                            <!-- /jenis-aset -->
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="label-control">Nominal Aset</label>
                              <fieldset>
                                <div class="input-group">
                                  <span class="input-group-addon">Rp</span>
                                  <input type="number" name="nominal[]" class="form-control border-primary" placeholder="Nominal Aset" min="1">
                                </div>
                              </fieldset>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="label-control">Penyusutan Aset</label>
                              <fieldset>
                                <div class="input-group">
                                  <input type="number" name="penyusutan[]" class="form-control border-primary" min="0">
                                  <span class="input-group-addon">%</span>
                                </div>
                              </fieldset>
                            </div>
                          </div>
                        </div>
                        <div id="aset-out"></div>
                        <!-- /aset-out -->
                        <div class="row">
                          <div class="col-sm-6 offset-sm-6">
                            <div class="form-group">
                              <button type="button" id="add-aset" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Aset</button>
                            </div>
                          </div>
                        </div>
                        <!-- /add-button -->
                      </div>
                    </div>
                    <div class="form-action" align="center">
                      <input type="submit" class="btn btn-success" name="" value="Simpan">
                      <input type="button" class="btn btn-warning mr-1" name="" value="Batal" id="batal">
                    </div>
                    <!-- /submit -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tambah-customer -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#add-aset').on('click', function() {
      var target_selector = $('#aset-out');

      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
      var element = '<div class="row">' +
          '<h5 class="form-section"></h5>' +
          '<div class="col-sm-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Jenis Aset</label>' +
              '<input type="text" name="jenis[]" class="form-control border-primary" placeholder="Jenis Aset">' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-6">' +
            '<div class="form-group">' +
              '<label class="label-control">Nominal Aset</label>' +
              '<fieldset>' +
                '<div class="input-group">' +
                  '<span class="input-group-addon">Rp</span>' +
                  '<input type="number" name="nominal[]" class="form-control border-primary" placeholder="Nominal Aset" min="1">' +
                '</div>' +
              '</fieldset>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-4">' +
            '<div class="form-group">' +
              '<label class="label-control">Penyusutan Aset</label>' +
              '<fieldset>' +
                '<div class="input-group">' +
                  '<input type="number" name="penyusutan[]" class="form-control border-primary" min="0">' +
                  '<span class="input-group-addon">%</span>' +
                '</div>' +
              '</fieldset>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-2">' +
            '<div class="form-group">' +
              '<label class="label-control" style="display: block !improtant">&nbsp;</label>' +
              '<button type="button" class="btn btn-danger btn-block" onclick="$(this).parent().parent().parent().remove()"><i class="fa fa-times"></i></button>' +
            '</div>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);        
    });
  });
</script>
<script type="text/javascript">
  function delete_aset(id) {
    var r = confirm("Apakah yakin menghapus data aset ini?");
    if (r == true) {
      $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/store-aset/delete",
        data: {'id': id},
        dataType: "text",
           success:  function(data) {
               location.reload();
           },
           error: function(x, t, m) {

           }
      });
    } else {

    } 
  }
</script>