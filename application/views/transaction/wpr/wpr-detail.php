<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- tabel-wpr-detail -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Weekly Promotion Report Detail</h4>
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
                <div class="bs-callout-info callout-border-left mt-1 p-1">
                  <strong>Info!</strong>
                  <p>Tabel di bawah ini memuat seluruh pengajuan WPR yang <strong>telah disetujui</strong>.</p>
                </div><br />
                <!-- /alert -->
                <!-- Tabel -->
                <div class="table-responsive height-300 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Nomor WPR</th>
                            <th>Outlet</th>
                            <th>User</th>
                            <th>Spesialis</th>
                            <th>Dana Promosi<br />(Rp)</th>
                            <th>Status</th>
                            <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($wpr_approved['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo $value->no_wpr; ?></td>
                          <td><?php echo $value->nama_outlet; ?></td>
                          <td><?php echo $value->nama_user; ?></td>
                          <td><?php echo $value->spesialis; ?></td>
                          <td><?php echo number_format($value->dana, 2, ',', '.'); ?></td>
                          <td>
                            <?php if ($value->status == 'waiting'): ?>
                              <span class="tag tag-pill tag-warning">Waiting</span>
                            <?php else: ?>
                              <span class="tag tag-pill tag-success">Approved</span>
                            <?php endif ?>
                          </td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="#" class="btn btn-primary">Detail</a>
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
      <!-- /tabel-wpr-detail -->
    </div>
  </div>
</div>