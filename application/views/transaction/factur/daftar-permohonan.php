<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Daftar Faktur Permohonan Diskon</h4>
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
                              <th>Nomor Faktur</th>
                              <th>RM</th>
                              <th>Jenis Diskon</th>
                              <th>Customer</th>
                              <th>Outlet</th>
                              <th>Tgl. RM</th>
                              <th>Tgl. RSM</th>
                              <th>Tgl. Deputy</th>
                              <th>Tgl. SD</th>
                              <th>Tgl. Spv</th>
                              <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < 20; $i++): ?>
                        <tr>
                          <td>FKT/AS/<?php echo date('m/Y'); ?></td>
                          <td>Muhammad Ali</td>
                          <td>Diskon On &amp; Off</td>
                          <td>RS Jantung Harapan Kita</td>
                          <td>Omni Pulomas</td>
                          <td><?php echo date('d-M-Y'); ?></td>
                          <td><?php echo date('d-M-Y'); ?></td>
                          <td><?php echo date('d-M-Y'); ?></td>
                          <td><?php echo date('d-M-Y'); ?></td>
                          <td><?php echo date('d-M-Y'); ?></td>
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
    </div>
  </div>
</div>