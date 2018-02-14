<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Daftar Permohonan Barang</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <!-- Tabel -->
                <div class="table-responsive height-350 border-top-red">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Nomor<br />Surat</th>
                            <th>Tanggal<br />Permohonan</th>
                            <th>Tanggal<br />Target</th>
                            <th>Status</th>
                            <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($permohonan['data']->result() as $value): ?>  
                        <tr>
                          <td><?php echo $value->id; ?></td>
                          <td><?php echo $value->tanggal_permohonan; ?></td>
                          <td><?php echo $value->tanggal_target; ?></td>
                          <td>
                            <?php if ($value->status == 'waiting'): ?>
                            <span class="tag tag-pill tag-warning">Waiting</span>
                              <?php else: ?>
                            <span class="tag tag-pill tag-success">Masuk Stok</span>
                              <?php endif ?>  
                          </td>
                          <td>
                            <div class="btn-group">
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
      <!-- /tabel-permohonan -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Surat Permohonan Barang</h4>
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
                <form class="form" action="<?php echo site_url() ?>/simpan-permohonan-barang-nucleus" method="post">
                  <h4 class="form-section"><i class="fa fa-clipboard"></i>Nomor Surat Permohonan: <span class="tag tag-pill tag-primary"><?php echo $no_surat; ?></span></h4>
                  <?php $this->session->set_flashdata('no_surat', $no_surat); ?>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="label-control">Tanggal Permohonan</label>
                          <input type="date" name="tanggal_permohonan" class="form-control border-primary" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <!-- /tanggal-permohonan -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="label-control">Tanggal Target</label>
                          <input type="date" name="tanggal_target" class="form-control border-primary">
                          <p>*) Isi dengan tanggal target pengiriman barang dari pabrik ke Nucleus</p>
                        </div>
                      </div>
                      <!-- /tanggal-target -->
                    </div>
                    <!-- /row-1 -->
                  </div>
                  <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-archive"></i>Berikut adalah produk yang termasuk dalam surat permohonan</h4>
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Produk</label>
                          <select name="id_barang[]" id="produk-list" class="form-control select2">
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
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Jumlah Permintaan</label>
                          <input type="number" name="jumlah[]" class="form-control border-primary">
                        </div>
                        <!-- /jumlah -->
                      </div>
                      <!-- /right-col -->
                    </div>
                    <div id="produk-out"></div>
                    <!-- #/produk-out -->
                    <div class="row">
                      <div class="col-sm-6 offset-sm-6 col-xs-12">
                        <div class="form-group">
                          <button type="button" class="btn btn-primary btn-block" id="add-produk"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                        </div>
                      </div>
                    </div>
                    <!-- /button-row -->
                  </div>
                  <div class="form-action" align="center">
                    <input type="submit" class="btn btn-success" name="" value="Simpan">
                    <input type="button" class="btn btn-warning mr-1" name="" value="Batal">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /form-permohonan-barang -->
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
          '<div class="col-sm-6 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Produk</label>' +
              '<select name="id_barang[]" class="form-control select2-single">' +
                produk_list +
              '</select>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-6 col-xs-12">' +
            '<div class="form-group row">' +
              '<label class="label-control col-sm-12">Jumlah Permintaan</label>' +
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
