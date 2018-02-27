<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- tabel -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Daily Sales (per Outlet per Product)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
              <div class="card-block">
                <div class="col-xs-12 col-sm-4 offset-sm-4">
                  <form method="POST" class="form" role="form">
                    <div class="form-group row">
                      <div class="col-xs-8">
                        <select class="form-control select2" name="id_area">
                          <option value="" selected disabled>Pilih Area</option>
                          <?php if ($area['data']->num_rows() < 1): ?>
                          <option value="">Area PPG belum tersedia</option>
                          <?php else: ?>
                          <?php foreach ($area['data']->result() as $value): ?>
                          <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo $value->id; ?> - <?php echo strtoupper($value->area); ?></option>
                          <?php endforeach ?>
                          <?php endif; ?>
                        </select>
                      </div>
                      <div class="col-xs-4">
                        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i>&nbsp;Cari</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- alert -->
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
              </div>
              <!-- /alert -->

              <div class="card-block">
                <?php foreach ($outlet['data']->result() as $values): ?>  
                <h4>Nama Outlet: <span class="tag tag-primary tag-lg"><?php echo $values->nama_outlet; ?></span></h4>
                <h4>Area: <span class="tag tag-primary tag-lg"><?php echo $values->area; ?></span></h4>
                <?php endforeach; ?>
              </div>

              <!-- table -->
              <div class="card-block">
                <div class="table-responsive height-400 border-top-red">
                  <table class="table table-xs table-bordered table-hover mb-0">
                      <thead>
                        <tr>
                          <th style="text-align: center !important; vertical-align: text-top !important">Kode<br />Produk</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">Nama Produk</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">Target<br />(Rp)</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">Total Sales Aktual<br />(Rp)</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">January</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">February</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">March</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">April</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">May</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">June</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">July</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">August</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">September</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">October</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">November</th>
                          <th style="text-align: center !important; vertical-align: text-top !important">December</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($produk_by_outlet as $value): ?>
                        <tr>
                          <td class="text-truncate"><?php echo $value['id_produk']; ?></td>
                          <td class="text-truncate"><?php echo $value['nama_produk']; ?></td>
                          <td class="text-truncate" align="right"><?php echo number_format($value['nominal_target'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['nominal_penjualan'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['jan'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['feb'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['mar'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['apr'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['may'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['jun'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['jul'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['aug'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['sep'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['oct'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['nov'], 0, ',', '.'); ?></td>
                          <td class="text-truncate"  align="right"><?php echo number_format($value['des'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
              </div>
              <!-- /table -->
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('tbody > tr:odd').attr({
      class: 'bg-table-red',
    });
  });
</script>

