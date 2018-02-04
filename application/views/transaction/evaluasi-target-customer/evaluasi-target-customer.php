<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Evaluasi Target Customer</h4>
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
                            <th width="40%">Detailer</th>
                            <th width="10%">Target<br />Intensifikasi</th>
                            <th width="10%">Achievement<br />Intensifikasi</th>
                            <th width="10%">Target<br />Ekstensifikasi</th>
                            <th width="10%">Achievement<br />Ekstensifikasi</th>
                            <th width="10%">Grand<br />Achievement</th>
                            <th width="10%">Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < 20; $i++): ?>
                        <tr>
                          <td>Nama Detailer</td>
                          <td><?php echo rand(20, 100); ?></td>
                          <td><?php echo rand(20, 50); ?>%</td>
                          <td><?php echo rand(10, 30); ?></td>
                          <td><?php echo rand(60, 80) ?>%</td>
                          <td><?php echo rand(60, 90) ?>%</td>
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
    </div>
  </div>
</div>

