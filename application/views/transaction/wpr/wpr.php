<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Weekly Promotion Report</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Nomor WPR</th>
                            <th>Outlet</th>
                            <th>User</th>
                            <th>Dana Promosi</th>
                            <th>Tgl. RM</th>
                            <th>Status</th>
                            <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < 20; $i++): ?>
                        <tr>
                          <td>FKT/AS/<?php echo date('m/Y'); ?></td>
                          <td>RS Jantung Harapan Kita</td>
                          <td>-</td>
                          <td>Rp 10.000.000</td>
                          <td><?php echo date('d-M-Y'); ?></td>
                          <td>
                            <span class="tag tag-pill tag-success">Approved</span>
                          </td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="#" class="btn btn-primary">Detail</a>
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
        </div>
      </div>
      <!-- /tabel-wpr -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Form Pengajuan WPR</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label class="label-control col-sm-6">Outlet</label>
                          <label class="label-control col-sm-6">User</label>
                          <div class="col-sm-6">
                            <select name="" class="form-control select2">
                              <option value="" selected disabled>Pilih Outlet</option>
                              <option value=""></option>
                            </select>
                          </div>
                          <div class="col-sm-6">
                            <select name="" class="form-control select2">
                              <option value="" selected disabled>Pilih User</option>
                              <option value=""></option>
                            </select>
                          </div>
                        </div>
                        <!-- /outlet /user -->
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Dengan hormat, berikut beberapa alasan yang dapat menjadi dasar penerimaan pengajuan promosi:</label>
                          <div class="col-sm-12">
                            <textarea name="" cols="30" rows="5" class="form-control border-primary"></textarea>
                          </div>
                        </div>
                        <!-- /outlet /user -->
                      </div>
                      <!-- /left-row -->
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Berikut merupakan besaran dana yang kami ajukan:</label>
                          <label class="label-control col-sm-6">Dana Promosi</label>
                          <label class="label-control col-sm-6">Rincian Dana</label>
                          <div class="col-sm-6">
                            <div class="input-group">
                              <span class="input-group-addon">Rp</span>
                              <input type="number" name="" class="form-control border-primary">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" id="" class="form-control border-primary">
                            <p>*) Isi dengan penjelasan mengenai penggunaan dana</p>
                          </div>
                        </div>
                        <!-- /dana /rincian -->
                        <div id="dana-wrp-out"></div>
                        <div class="form-group row">
                          <div class="col-sm-6 pull-right">
                            <button type="button" id="add-dana-wpr" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Rincian Dana</button>
                          </div>
                        </div>
                        <!-- /add-dana-wpr -->
                      </div>
                      <!-- /right-row -->
                    </div>
                    <div class="form-action" align="center">
                      <input type="submit" class="btn btn-success" name="" value="Simpan">
                      <input type="button" class="btn btn-warning mr-1" name="" value="Batal">
                    </div>
                    <!-- /submit -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tambah-wpr -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add-dana-wpr').click(function(event) {
      console.log('clicked');
      var target_selector = $('#dana-wrp-out');
      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
      var element = '<div class="form-group row">' +
        '<label class="label-control col-sm-6">Dana Promosi</label>' +
        '<label class="label-control col-sm-6">Rincian Dana</label>' +
        '<div class="col-sm-6">' +
          '<div class="input-group">' +
            '<span class="input-group-addon">Rp</span>' +
            '<input type="number" name="" class="form-control border-primary">' +
          '</div>' +
        '</div>' +
        '<div class="col-sm-4">' +
          '<input type="text" id="" class="form-control border-primary">' +
          '<p>*) Isi dengan penjelasan mengenai penggunaan dana</p>' +
        '</div>' +
        '<div class="col-sm-2">' +
          '<button type="button" class="btn btn-danger" onclick="$(this).parent().parent().remove()"><i class="fa fa-times"></i></button>' +
        '</div>' +
      '</div>';
      $(target_selector).append(element);
    });
  });
</script>