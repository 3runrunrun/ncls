<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Master COGM</h4>
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
                        <th>Tanggal</th>
                        <th>Jenis COGM</th>
                        <th>Nominal Biaya<br />(Rp)</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($cogm['data']->result() as $value): ?>
                      <?php 
                        $tanggal = strtotime($value->tanggal);
                       ?>
                      <tr>
                        <td><?php echo date('d-M-Y', $tanggal); ?></td>
                        <td><?php echo strtoupper($value->jenis); ?></td>
                        <td><?php echo number_format($value->biaya, '2', ',', '.'); ?></td>
                        <td>
                          <div class="btn-group" role="group">
                            <button type="button" onclick="delete_cogm('<?php echo $value->id ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
      <!-- /tabel-cogm-harian -->

      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-body">
              <div class="card-block">
                <!-- Tabel -->
                <div class="table-responsive border-top-red">
                  <table class="table table-xs table-hover mb-0">
                    <thead>
                      <tr>
                        <th width="10%">Tanggal</th>
                        <?php foreach ($title_cogm['data']->result() as $value): ?>
                        <th><?php echo ucwords($value->jenis); ?><br />(Rp)</th>
                        <?php endforeach; ?>
                      </tr>
                    </thead>
                    <tbody id="month-cogm">
                      <?php foreach ($month_cogm as $value): ?>
                        <tr>
                          <?php foreach ($value as $index => $item): ?>
                            <?php if ($index != 'bulan'): ?>
                            <?php $value[$index] = number_format($value[$index], 0, ',', '.'); ?>
                            <?php $value[$index] = (is_null($value[$index])) ? '0' : $value[$index] ; ?>
                            <?php endif; ?>
                            <td><?php echo $value[$index]; ?></td>
                          <?php endforeach ?>
                        </tr>
                      <?php endforeach; ?>
                      <!-- disini isinya -->
                    </tbody>
                    <tfoot id="cogm-per-jenis" class="border-top-blue">
                      <th width="10%">Total</th>
                      <?php foreach ($total_per_jenis['data']->result() as $value): ?>  
                      <th><?php echo number_format($value->total, 0, ',', '.'); ?></th>
                      <?php endforeach ?>
                    </tfoot>
                  </table>
                </div><br />
                <!-- /tabel-cogm -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive border-top-red">
                      <table class="table table-bordered table-xs table-hover mb-0">
                        <thead id="cogm-grand-total">
                          <?php foreach ($total_cogm['data']->result() as $value): ?>  
                          <tr class="bg-table-red">
                            <th width="10%">Grand Total</th>
                            <th width="80%">
                              <h4>Rp <?php echo number_format($value->total, 0, ',', '.'); ?></h4>
                            </th>
                          </tr>
                          <?php endforeach ?>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /tabel-total -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel-cogm-total -->

      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Tambah COGM</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/store-cogm" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12 offset-md-3">
                        <div class="form-group">
                          <label class="label-control">Tanggal</label>
                          <input class="form-control border-primary" name="tanggal" type="date">
                        </div>
                        <!-- /tanggal -->
                      </div>
                      <div class="col-sm-6 col-xs-12 offset-sm-3">
                        <div class="form-group row">
                          <label class="label-control col-sm-6">Jenis COGM</label>
                          <label class="label-control col-sm-6">Biaya</label>
                          <div class="col-sm-6">
                            <select name="id_jenis_cogm[]" id="jenis-cogm" class="form-control select2">
                              <option value="" selected disabled>Pilih Jenis COGM</option>
                              <?php if ($jenis_cogm['data']->num_rows() < 1): ?>
                              <option value="">Jenis COGM belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($jenis_cogm['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->jenis); ?></option>
                              <?php endforeach; ?>
                              <?php endif; ?>
                            </select>
                          </div>
                          <div class="col-sm-6">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="biaya[]" type="number" min="0" value="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /jenis-cogm /biaya -->
                        <div id="cogm-out"></div>
                        <div class="form-group">
                          <button class="btn btn-block btn-primary" type="button" id="add-cogm"><i class="fa fa-plus"></i>&nbsp;Tambah COGM</button>
                        </div>
                      </div>
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
      <!-- /tambah-cogm -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('td').addClass('text-truncate');
    $('th, td').css({
      'text-align': 'center',
    });
    $('#month-cogm tr td:not(:first-child), #cogm-per-jenis tr th:not(:first-child)').css({
      'text-align': 'right',
    });
    $('#add-cogm').click(function(event) {
      console.log('clicked');
      var target_selector = $('#cogm-out');
      var cogm_list = $('#jenis-cogm > option').map(function(){
        var id = $(this).val();
        var jenis = $(this).text();
        return '<option value="' + id + '">' + jenis + '</option>';
      }).get();

      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
      var element = '<div class="form-group row">' +
          '<label class="label-control col-sm-6">Jenis COGM</label>' +
          '<label class="label-control col-sm-6">Biaya</label>' +
          '<div class="col-sm-6">' +
            '<select name="id_jenis_cogm[]" class="form-control select2-single">' +
              cogm_list +
            '</select>' +
          '</div>' +
          '<div class="col-sm-4">' +
            '<fieldset>' +
              '<div class="input-group">' +
                '<span class="input-group-addon">Rp</span>' +
                '<input class="form-control border-primary" name="biaya[]" type="number" min="0" value="0">' +
              '</div>' +
            '</fieldset>' +
          '</div>' +
          '<div class="col-sm-2">' +
            '<button type="button" class="btn btn-danger btn-block" onclick="$(this).parent().parent().remove()"><i class="fa fa-times"></i></button>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);
      $('.select2-single').select2();
    });
  });
</script>
<script type="text/javascript">
  function delete_cogm(id) {
    var r = confirm("Apakah yakin menghapus data COGM ini?");
    if (r == true) {
      $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/store-cogm/delete",
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