<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Master Customer (Non)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form method="post" class="form-horizontal" id="show-customer-non-by-area">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-3">Area</label>
                        <div class="col-sm-7">
                          <select name="id_area" class="form-control select2" id="src-id-area">
                            <option value="" selected disabled>Pilih Area</option>
                            <?php if ($area['data']->num_rows() < 1): ?>
                            <option value="">Area PPG belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($area['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->id; ?>) - <?php echo strtoupper($value->area); ?></option>
                            <?php endforeach ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <div class="col-sm-2">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;&nbsp;Cari</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /pencarian -->
              <div class="card-block">
                <!-- Tabel -->
                <div class="table-responsive height-250 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th width="5%">Kode</th>
                            <th width="20%">Nama</th>
                            <th width="10%">Spesialis</th>
                            <th width="20%">Nama<br />Lokasi Praktek</th>
                            <th width="30%">Alamat</th>
                            <th width="10%">Area</th>
                            <th width="10%">Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($customer_non['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo strtoupper($value->id); ?></td>
                          <td><?php echo ucwords($value->nama); ?></td>
                          <td><?php echo ucwords($value->spesialis); ?></td>
                          <td><?php echo ucwords($value->nama_lokasi_praktik); ?></td>
                          <td><?php echo ucwords($value->alamat); ?></td>
                          <td><?php echo ucwords($value->area); ?> (<?php echo strtoupper($value->alias_area); ?>)</td>
                          <td>
                            <div class="btn-group-vertical" role="group">
                              <a href="<?php echo site_url() ?>/master-customer-non/<?php echo $value->id ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                              <button type="button" onclick="delete_customer_non('<?php echo $value->id ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
              <h4 class="card-title">Tambah Customer (Non)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form-horizontal" action="<?php echo site_url() ?>/store-customer-non/store" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12 offset-md-3">
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Kode Customer</label>
                          <div class="col-sm-10">
                            <?php $this->session->set_flashdata('id_customer_non', $id_customer_non); ?>
                            <span class="tag tag-warning tag-lg"><?php echo strtoupper($id_customer_non); ?></span>
                          </div>
                        </div>
                        <!-- /kode-customer-non -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="nama" type="text" placeholder="Nama Customer">
                          </div>
                        </div>
                        <!-- /nama-customer-non -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Spesialis</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="spesialis" type="text" placeholder="Spesialis">
                          </div>
                        </div>
                        <!-- /spesialis -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama Lokasi Praktik</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="nama_lokasi_praktik" type="text" placeholder="Nama Lokasi Praktik">
                          </div>
                        </div>
                        <!-- /nama-lokasi-praktik -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">RM</label>
                          <div class="col-sm-6">
                            <select name="id_area" class="form-control border-primary select2">
                              <option value="" selected disabled>Pilih RM</option>
                              <?php if ($detailer['data']->num_rows() < 1): ?>
                                <option value="">RM belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($detailer['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>">(<?php echo strtoupper($value->nama); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <!-- /detailer -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Alamat</label>
                          <div class="col-sm-10">
                            <textarea name="alamat" cols="30" rows="3" class="form-control border-primary"></textarea>
                          </div>
                        </div>
                        <!-- /alamat -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Area</label>
                          <div class="col-sm-6">
                            <select name="id_area" class="form-control select2">
                              <option value="" selected disabled>Pilih Area</option>
                              <?php if ($area['data']->num_rows() < 1): ?>
                                <option value="">Area PPG belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($area['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>">(<?php echo $value->id; ?>) - <?php echo strtoupper($value->area); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <!-- /area -->
                      </div>
                    </div>
                    <div class="form-action" align="center">
                      <input type="submit" class="btn btn-success" name="" value="Simpan">
                      <input type="reset" class="btn btn-warning mr-1" name="" value="Batal">
                    </div>
                    <!-- /submit -->
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
<script type="text/javascript" src="<?php echo base_url() ?>/process-js/show-customer-non-by-area.js"></script>
<script type="text/javascript">
  function delete_customer_non(id) {
    var r = confirm("Apakah yakin menghapus customer (non) ini?");
    if (r == true) {
      $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/store-customer-non/delete",
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