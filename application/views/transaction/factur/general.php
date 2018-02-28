<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Faktur KO dan Discount On &amp; Off (General)</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
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

              <!-- form -->
              <div class="card-block">
                <form class="form" action="<?php echo site_url(); ?>/store-ko-general" method="POST">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section">Informasi Faktur</h4>
                        <div class="form-group">
                          <label class="label-control">No. Faktur</label><br />
                          <?php $no_faktur = $q_faktur . '-HL-' . date('d-Y'); ?>
                          <?php $this->session->set_userdata('id_faktur', $no_faktur); ?>
                          <span class="tag tag-xl tag-primary"><?php echo str_replace('-', '/', $no_faktur); ?></span>
                        </div>
                        <!-- /no-faktur -->
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-6 col-xs-12">
                        <h4 class="form-section">Pemohon</h4>
                        <div class="form-group">
                          <label class="label-control">Detailer</label>
                          <select name="id_detailer" class="form-control select2">
                            <option value="" selected disabled>Pilih Detailer</option>
                            <?php if ($detailer['data']->num_rows() < 1): ?>
                            <option value="" disabled>Detailer belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($detailer['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /id-detailer -->
                      </div>
                      <!-- /right-col -->
                    </div>
                    <!-- /no-faktur /id-detailer -->
                    <h4 class="form-section">Informasi KO</h4>
                    <div class="row">
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Tanggal Permohonan</label>
                          <?php $time_permohonan = strtotime(date('Y-m-d')); ?>
                          <input type="date" name="tanggal" class="form-control border-primary" value="<?php echo date('Y-m-d') ?>" readonly>
                        </div>
                        <!-- /tanggal-permohonan -->
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Distributor</label>
                          <select name="id_distributor" class="form-control select2">
                            <option value="" selected disabled>Pilih distributor</option>
                            <?php if ($distributor['data']->num_rows() < 1): ?>
                            <option value="" disabled>Distributor belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($distributor['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo $value->nama; ?> - <?php echo $value->alias_distributor; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /id-distributor -->
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Menyetujui <strong>(RM)</strong></label>
                          <select name="id_rm" class="form-control select2">
                            <option value="" selected disabled>Pilih Pegawai</option>
                            <?php if ($detailer['data']->num_rows() < 1): ?>
                            <option value="" disabled>Pegawai belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($detailer['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /menyutujui -->
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label class="label-control">Approver <strong>(Direktur)</strong></label>
                          <select name="id_direktur" class="form-control select2">
                            <option value="" selected disabled>Pilih Approver</option>
                            <?php if ($detailer['data']->num_rows() < 1): ?>
                            <option value="" disabled>Direktur belum tersedia</option>
                            <?php else: ?>
                            <?php foreach ($detailer['data']->result() as $value): ?>
                            <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <!-- /approve -->
                      </div>
                    </div>
                    <!-- /tanggal /distributor /menyetujui /approver -->
                  </div>
                  
                  <!-- tabel-permohonan -->
                  <br /><br />
                  <h5 class="form-section">
                    <p>Dengan hormat, <br />Melalui surat ini, kami bermaksud untuk mengajukan permohonan diskon untuk Outlet:</p>
                  </h5>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <!-- Tabel -->
                          <div class="table-responsive height-400">
                            <table class="table table-xs table-bordered table-hover mb-0">
                              <thead>
                                <tr>
                                  <th>&nbsp;</th>
                                  <th colspan="3" style="text-align: center !important">Kondisi On Faktur</th>
                                  <th colspan="3" style="text-align: center !important">Kondisi Off Faktur</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                </tr>
                                <tr>
                                  <th style="text-align: center !important" width="30%">Outlet</th>
                                  <th class="distributor" style="text-align: center !important">Distributor</th>
                                  <th style="text-align: center !important">NF</th>
                                  <th style="text-align: center !important">Total</th>
                                  <th class="distributor" style="text-align: center !important">Distributor</th>
                                  <th style="text-align: center !important">NF</th>
                                  <th style="text-align: center !important">Total</th>
                                  <th style="text-align: center !important" width="30%">Produk</th>
                                  <th style="text-align: center !important" width="30%" colspan="2">Keterangan</th>
                                </tr>
                              </thead>
                              <tbody id="diskon-list">
                                <tr>
                                  <td class="text-truncate outlet-list">
                                    <p style="color: transparent;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <select name="id_outlet[]" class="form-control">
                                      <option value="" disabled selected>Pilih Outlet</option>
                                      <?php if ($outlet['data']->num_rows() < 1): ?>
                                      <option value="" disabled>Outlet belum tersedia</option>
                                      <?php else: ?>
                                      <?php foreach ($outlet['data']->result() as $value): ?>
                                      <option value="<?php echo $value->id; ?>">(<?php echo $value->alias_area; ?>) - <?php echo strtoupper($value->id); ?> - <?php echo $value->nama; ?></option>
                                      <?php endforeach; ?>
                                      <?php endif; ?>
                                    </select>
                                    <!-- /id-outlet -->
                                  </td>
                                  <td class="text-truncate">
                                    <p style="color: transparent;">Lorem ipsum dolor.</p>
                                    <fieldset>
                                      <div class="input-group">
                                        <input type="number" name="on_diskon_distributor[]" class="form-control border-primary" value="0" min="0">
                                        <span class="input-group-addon">%</span>
                                      </div>
                                    </fieldset>
                                    <!-- /on-diskon-distributor -->
                                  </td>
                                  <td class="text-truncate">
                                    <p style="color: transparent;">Lorem ipsum dolor.</p>
                                    <fieldset>
                                      <div class="input-group">
                                        <input type="number" name="on_nf[]" class="form-control border-primary" value="0" min="0">
                                        <span class="input-group-addon">%</span>
                                      </div>
                                    </fieldset>
                                    <!-- /on-nf -->
                                  </td>
                                  <td class="text-truncate">
                                    <p style="color: transparent;">Lorem ipsum dolor.</p>
                                    <fieldset>
                                      <div class="input-group">
                                        <input type="number" name="on_total[]" class="form-control border-primary" value="0" min="0">
                                        <span class="input-group-addon">%</span>
                                      </div>
                                    </fieldset>
                                    <!-- /on-total -->
                                  </td>
                                  <td class="text-truncate">
                                    <p style="color: transparent;">Lorem ipsum dolor.</p>
                                    <fieldset>
                                      <div class="input-group">
                                        <input type="number" name="off_diskon_distributor[]" class="form-control border-primary" value="0" min="0">
                                        <span class="input-group-addon">%</span>
                                      </div>
                                    </fieldset>
                                    <!-- /off-diskon-distributor -->
                                  </td>
                                  <td class="text-truncate">
                                    <p style="color: transparent;">Lorem ipsum dolor.</p>
                                    <fieldset>
                                      <div class="input-group">
                                        <input type="number" name="off_nf[]" class="form-control border-primary" value="0" min="0">
                                        <span class="input-group-addon">%</span>
                                      </div>
                                    </fieldset>
                                    <!-- /off-nf -->
                                  </td>
                                  <td class="text-truncate">
                                    <p style="color: transparent;">Lorem ipsum dolor.</p>
                                    <fieldset>
                                      <div class="input-group">
                                        <input type="number" name="off_total[]" class="form-control border-primary" value="0" min="0">
                                        <span class="input-group-addon">%</span>
                                      </div>
                                    </fieldset>
                                    <!-- /off-total -->
                                  </td>
                                  <td class="text-truncate produk-list">
                                    <p style="color: transparent;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <select name="id_produk[]" class="form-control">
                                      <option value="" disabled selected>Pilih Produk</option>
                                      <?php if ($produk['data']->num_rows() < 1): ?>
                                      <option value="">Produk belum tersedia</option>
                                      <?php else: ?>
                                      <?php foreach ($produk['data']->result() as $value): ?>
                                      <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                                      <?php endforeach; ?>
                                      <?php endif; ?>
                                    </select>
                                  </td>
                                  <td class="text-truncate">
                                    <p style="color: transparent;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="form-group row remove-btn">
                                      <div class="col-xs-9">
                                        <textarea name="keterangan[]" cols="30" rows="2" class="form-control border-primary"></textarea>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!-- End of Tabel -->
                        </div>
                        <div class="form-group">
                          <button type="button" id="add-diskon" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Permohonan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /tabel-permohonan -->

                  <h4 class="form-section">KO On &amp; Off Faktur</h4>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- tabel-cn -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-6 col-xs-12">
                              <div class="table-responsive height-200">
                                <table class="table table-xs table-hover height-200 table-bordered mb-0">
                                  <thead>
                                    <tr>
                                      <th width="10%" style="text-align: center !important">No</th>
                                      <th width="50%" style="text-align: center !important">CN</th>
                                      <th width="40$" style="text-align: center !important">%</th>
                                    </tr>
                                  </thead>
                                  <tbody id="ko-on-off">
                                    <tr>
                                      <td class="text-truncate">1</td>
                                      <td class="text-truncate">
                                        <input type="text" name="cn[]" class="form-control border-primary" placeholder="CN">
                                      </td>
                                      <td class="text-truncate">
                                        <div class="form-group row remove-cn-btn">
                                          <div class="col-xs-8">
                                            <fieldset>
                                              <div class="input-group">
                                                <input type="text" name="diskon[]" class="form-control border-primary diskon" step="0" min="0">
                                                <span class="input-group-addon">%</span>
                                              </div>
                                            </fieldset>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <!-- tabel-cn -->
                              <div class="table-responsive">
                                <table class="table table-xs table-hover mb-0">
                                  <thead>
                                    <tr>
                                      <th width="62.8%" style="text-align: center !important; vertical-align: middle;">Total</th>
                                      <th style="text-align: center !important">
                                        <fieldset>
                                          <div class="input-group">
                                            <input type="number" name="total_onoff" id="total-ko" class="form-control border-primary" min="0">
                                            <span class="input-group-addon">%</span>
                                          </div>
                                        </fieldset>
                                      </th>
                                    </tr>
                                  </thead>
                                </table>
                              </div><br />
                              <!-- /tabel-total-cn -->
                              <!-- add-cn -->
                              <div class="form-group">
                                <button type="button" id="add-cn" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah CN</button>
                              </div>
                              <!-- /add-cn -->
                            </div>
                            <!-- /left-col -->

                            <div class="col-sm-6 col-xs-12">
                              <div class="form-group">
                                <p style="font-size: 1.2em">Demikian surat ini kami sampaikan. <br />Bila surat ini sudah disetujui harap fax ke pihak <strong class="distributor">Distributor</strong>.<br /><br />Atas perhatian Bapak, kami sampaikan terima kasih.</p>
                              </div>
                              <div class="form-actions" align="right">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-warning">Batal</button>
                              </div>
                            </div>
                            <!-- /right-col -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add-diskon').click(function(event) {
      // console.log($('#diskon').clone());
      var rbtn = '<div class="col-xs-3">' +
        '<button type="button" onclick="$(this).parent().parent().parent().parent().remove()" class="btn btn-danger btn-block btn-lg"><i class="fa fa-times"></i></button>' +
      '</div>';
      $('#diskon-list > tr:first').clone().appendTo('#diskon-list');
      $('#diskon-list > tr:last .remove-btn').append(rbtn);
      $('#diskon-list > tr:last select').addClass('select2-single');
      $('.select2-single').select2();
      $('#diskon-list > tr:odd').attr({
        class: 'bg-table-blue',
      });
    });

    $('#add-cn').click(function(event) {
      // console.log($('#diskon').clone());
      var rbtn = '<div class="col-xs-4">' +
        '<button type="button" onclick="$(this).parent().parent().parent().parent().remove()" class="btn btn-danger btn-block btn-xs"><i class="fa fa-times"></i></button>' +
      '</div>';
      var counter = parseInt($('#ko-on-off > tr:last > td:first').text());

      $('#ko-on-off > tr:first').clone().appendTo('#ko-on-off');
      $('#ko-on-off > tr:last .remove-cn-btn').append(rbtn);
      $('#ko-on-off > tr:last > td:first').text(counter + 1);
      $('#ko-on-off > tr:odd').attr({
        class: 'bg-table-blue',
      });
    });

    $('[name=id_distributor]').on('change', function() {
      var dist = $('[name=id_distributor] > option:selected').text().split('-')
      $('.distributor').text(dist[1]);
    });
  });
</script>