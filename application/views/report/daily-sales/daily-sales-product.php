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
                <h4 class="card-title">Daily Sales Product</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                </div>
            </div>
            <div class="card-body collapse in">
              <div class="card-block">
                <div class="col-xs-12 center">
                  <form method="post" style="padding-bottom: 30px;">
                    <div class="form-group centered">
                      <div class="col-sm-5">
                        <select class="form-control" name="area" required="">
                          <option selected="" disabled="" value="">---Pilih Area---</option>
                          <option value="jakarta-selatan">Jakarta Selatan</option>
                        </select>
                      </div>
                      <div class="col-sm-5">
                        <select class="form-control" name="outlet" required="">
                          <option selected="" disabled="" value="">---Pilih Outlet---</option>
                          <option value="jakarta-selatan">Mutiara Sehat</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                         <buttom class="btn btn-primary"><i class="fa fa-search"></i>  Cari</buttom>
                      </div>
                    </div>
                    
                  </form>
                </div>
              </div>

              <div class="card-block">
                <!-- alert -->
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

                <!-- table -->
                <div class="table-responsive height-600 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                              <th>Kode Barang</th>
                              <th>Nama Barang</th>
                              <th>Januari</th>
                              <th>Februari</th>
                              <th>Maret</th>
                              <th>April</th>
                              <th>Mei</th>
                              <th>Juni</th>
                              <th>Juli</th>
                              <th>Agustus</th>
                              <th>September</th>
                              <th>Oktober</th>
                              <th>November</th>
                              <th>Desember</th>
                              <th>YTD</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < 5; $i++) { 
                          # code...
                         ?>
                          <tr class="bg-table-red">
                              <td class="text-truncate">007</td>
                              <td class="text-truncate">Oniwa</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                          </tr>
                          <tr>
                              <td class="text-truncate">007</td>
                              <td class="text-truncate">Oniwa</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                          </tr>
                          <?php }?>
                           <tr class="border-top-green bg-table-blue">
                              <td class="text-truncate">-</td>
                              <td class="text-truncate">Total</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              <td class="text-truncate">200</td>
                              
                          </tr>
                      </tbody>
                  </table>
                </div>
                <!-- /table -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /tabel -->


      <!-- form -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Form Daily Sales (per Product)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url() ?>/store-daily-sales" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Outlet</label>
                          <select name="id_outlet" class="form-control select2">
                            <option value="" selected disabled>Pilih Outlet</option>
                            <?php if ($outlet['data']->num_rows() < 1): ?>
                            <option value="" disabled>Outlet belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($outlet['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      <!-- /id_distributor -->
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Tanggal</label>
                          <input type="date" name="tanggal" class="form-control border-primary" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <!-- /tanggal-permohonan -->
                    </div>
                    <!-- /row-1 -->
                  </div>
                  <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-medkit"></i>Produk</h4>
                    <div class="row">
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Produk</label>
                          <select name="id_produk[]" id="produk-list" class="form-control select2">
                            <option value="" selected disabled>Pilih Produk</option>
                            <?php if ($produk['data']->num_rows() < 1): ?>
                            <option value="">Produk belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($produk['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /id-produk -->
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Target (per Unit)</label>
                          <input type="number" name="target[]" class="form-control border-primary">
                        </div>
                        <!-- /jumlah -->
                      </div>
                      <!-- /mid-col -->
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Jumlah Terjual</label>
                          <input type="number" name="jumlah[]" class="form-control border-primary">
                        </div>
                        <!-- /jumlah -->
                      </div>
                      <!-- /right-col -->
                    </div>
                    <div id="produk-out"></div>
                    <!-- #/produk-out -->
                    <div class="row">
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <button type="button" class="btn btn-primary btn-block" id="add-produk"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                        </div>
                      </div>
                    </div>
                    <!-- /button-row -->
                  </div>
                  <div class="form-actions" align="center">
                    <input type="submit" class="btn btn-success" name="" value="Simpan">
                    <input type="reset" class="btn btn-warning mr-1" name="" value="Batal">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /form -->
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add-produk').click(function(event) {
      console.log('clicked');
      var target_selector = $('#produk-out');
      var produk_list = $('#produk-list > option').map(function(){
        var id = $(this).val();
        var nama = $(this).text();
        return '<option value="' + id + '">' + nama + '</option>';
      }).get();

      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
      var element = '<div class="row">' +
          '<div class="col-sm-4 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Produk</label>' +
              '<select name="id_produk[]" class="form-control select2-single">' +
                produk_list +
              '</select>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-4 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Target (per Unit)</label>' +
              '<input type="number" name="target[]" class="form-control border-primary">' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-4 col-xs-12">' +
            '<div class="form-group row">' +
              '<label class="label-control col-sm-12">Jumlah Terjual</label>' +
              '<div class="col-sm-10">' +
                '<input type="number" name="jumlah[]" class="form-control border-primary">' +
              '</div>' +
              '<div class="col-sm-2">' +
                '<button type="button" class="btn btn-block btn-danger" onclick="$(this).parent().parent().parent().parent().remove()"><i class="fa fa-times"></i></button>' +
              '</div>' +
            '</div>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);
      $('.select2-single').select2();
    });
  });
</script>

