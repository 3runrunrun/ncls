<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Master Produk</h4>
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
                <!-- Tabel -->
                <div class="table-responsive height-250 border-top-red">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kemasan</th>
                        <th>Harga (HNA)</th>
                        <th>Harga (H.Askes)</th>
                        <th>Harga Master</th>
                        <th>Gol</th>
                        <th>Gol1</th>
                        <th>Antibiotik</th>
                        <th>Brg Baru</th>
                        <th>Brg Ask</th>
                        <th>New CN</th>
                        <th>CN New Brg (%)</th>
                        <th>Start Regular</th>
                        <th>Brg Master</th>
                        <th>Disc</th>
                        <th>Segmen</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($produk['data']->result() as $value): ?>
                      <tr>
                        <td><?php echo strtoupper($value->id); ?></td>
                        <td><?php echo strtoupper($value->nama); ?></td>
                        <td><?php echo strtoupper($value->kemasan); ?></td>
                        <td>Rp <?php echo $value->harga_hna; ?></td>
                        <td>Rp <?php echo $value->harga_h_askes; ?></td>
                        <td>Rp <?php echo $value->harga_master; ?></td>
                        <td><?php echo $value->golongan; ?></td>
                        <td><?php echo $value->golongan1; ?></td>
                        <td><?php echo strtoupper($value->antibiotik); ?></td>
                        <td><?php echo strtoupper($value->barang_baru); ?></td>
                        <td><?php echo strtoupper($value->barang_ask); ?></td>
                        <td><?php echo strtoupper($value->new_cn); ?></td>
                        <td><?php echo $value->cn_new_barang; ?> &#37;</td>
                        <td><?php echo strtoupper($value->start_regular); ?></td>
                        <td><?php echo strtoupper($value->barang_master); ?></td>
                        <td><?php echo $value->diskon; ?> &#37;</td>
                        <td><?php echo strtoupper($value->segmen); ?></td>
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
              <h4 class="card-title">Tambah Produk</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <form class="form" action="<?php echo site_url() ?>/store-produk/store" method="POST">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Kode Barang</label>
                          <div class="col-sm-10">
                            <?php $this->session->set_flashdata('id_produk', $id_produk); ?>
                            <span class="tag tag-lg tag-warning"><?php echo $id_produk; ?></span>
                          </div>
                        </div>
                        <!-- /kemasan -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Nama Barang</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="nama" type="text" placeholder="Nama Barang">
                          </div>
                        </div>
                        <!-- /nama-barang -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Kemasan</label>
                          <div class="col-sm-10">
                            <input class="form-control border-primary" name="kemasan" type="text" placeholder="Kemasan">
                          </div>
                        </div>
                        <!-- /kemasan -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Harga<br />Master</label>
                          <div class="col-sm-4">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="harga_master" type="number" placeholder="Hrg. Master" min="0" step="1">
                              </div>
                            </fieldset>
                          </div>
                          <label class="label-control col-sm-2">Harga<br />(HNA)</label>
                          <div class="col-sm-4">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="harga_hna" type="number" placeholder="Harga (HNA)" min="0" step="1" readonly>
                              </div>
                            </fieldset>
                            <p>*) Harga Netto Apotek</p>
                          </div>
                        </div>
                        <!-- /harga-master /harga-hna -->
                        <div class="form-group row">
                          <label class="label-control col-sm-2">Harga<br />(H. Askes)</label>
                          <div class="col-sm-4">
                            <fieldset>
                              <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control border-primary" name="harga_h_askes" type="number" placeholder="Harga (H. Askes)" min="0">
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /harga-h-askes -->
                        <div class="form-group row">
                          <div class="col-sm-4 offset-md-1">
                            <fieldset>
                              <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="barang_baru" class="custom-control-input" value="y">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Barang Baru</span>
                              </label>
                            </fieldset>
                          </div>
                          <div class="col-sm-4 pull-md-1">
                            <fieldset>
                              <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="barang_askes" class="custom-control-input" value="y">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Barang Askes</span>
                              </label>
                            </fieldset>
                          </div>
                          <div class="col-sm-3 pull-md-2">
                            <fieldset>
                              <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="fokus" class="custom-control-input" value="y">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Fokus</span>
                              </label>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /barang-baru /barang-askes /fokus -->
                        <div class="row">
                          <div class="col-xs-12">
                            <h4 class="form-section">Data Area</h4>
                            <div class="bs-callout-info callout-border-left callout-bordered mt-1 p-1">
                              <h4 class="info">Perhatian!</h4>
                              <p>Anda dapat memilih lebih dari 1 region untuk setiap barang.</p>
                            </div><br />
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Region</label>
                              <select name="id_region[]" id="region-list" class="form-control select2">
                                <option value="" selected disabled>Area / Region</option>
                                <?php if ($area['data']->num_rows() < 1): ?>
                                  <option value="">Area / Region belum tersedia</option>
                                <?php else: ?>
                                <?php foreach ($area['data']->result() as $value): ?>
                                <option value="<?php echo $value->id; ?>">(<?php echo $value->id; ?>) - <?php echo strtoupper($value->area); ?></option>
                                <?php endforeach ?>
                                <?php endif; ?>
                              </select>
                            </div>
                            <!-- /region -->
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label class="label-control">Keterangan Region</label>
                              <textarea class="form-control" name="keterangan_region[]"></textarea>
                            </div>
                            <!-- /keterangan-region -->
                          </div>
                        </div>
                        <div id="region-out"></div>
                        <div class="row">
                          <div class="col-sm-3 xol-xs-6">
                            <div class="form-grup">
                              <button class="btn btn-primary btn-block" id="add-region" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Region</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /left-col -->
                      <div class="col-sm-6 col-xs-12">
                        <div class="form-group row">
                          <label class="label-control col-sm-4">Gol</label>
                          <label class="label-control col-sm-4">Gol1</label>
                          <label class="label-control col-sm-4">Antibiotik</label>
                          <div class="col-sm-4">
                            <select name="golongan" class="form-control">
                              <option value="" selected disabled>--</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                              <option value="E">E</option>
                              <option value="F">F</option>
                              <option value="G">G</option>
                              <option value="H">H</option>
                              <option value="I">I</option>
                              <option value="J">J</option>
                              <option value="K">K</option>
                              <option value="L">L</option>
                              <option value="M">M</option>
                              <option value="N">N</option>
                              <option value="O">O</option>
                              <option value="P">P</option>
                              <option value="Q">Q</option>
                              <option value="R">R</option>
                              <option value="S">S</option>
                              <option value="T">T</option>
                              <option value="U">U</option>
                              <option value="V">V</option>
                              <option value="W">W</option>
                              <option value="X">X</option>
                              <option value="Y">Y</option>
                              <option value="Z">Z</option>
                            </select>
                          </div>
                          <!-- /gol -->
                          <div class="col-sm-4">
                            <select name="golongan1" class="form-control">
                              <option value="" selected disabled>--</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                              <option value="E">E</option>
                              <option value="F">F</option>
                              <option value="G">G</option>
                              <option value="H">H</option>
                              <option value="I">I</option>
                              <option value="J">J</option>
                              <option value="K">K</option>
                              <option value="L">L</option>
                              <option value="M">M</option>
                              <option value="N">N</option>
                              <option value="O">O</option>
                              <option value="P">P</option>
                              <option value="Q">Q</option>
                              <option value="R">R</option>
                              <option value="S">S</option>
                              <option value="T">T</option>
                              <option value="U">U</option>
                              <option value="V">V</option>
                              <option value="W">W</option>
                              <option value="X">X</option>
                              <option value="Y">Y</option>
                              <option value="Z">Z</option>
                            </select>
                          </div>
                          <!-- /gol -->
                          <div class="col-sm-4">
                            <select name="antibiotik" class="form-control">
                              <option value="" selected disabled>--</option>
                              <option value="y">Y</option>
                              <option value="n">N</option>
                            </select>
                          </div>
                          <!-- /gol -->
                        </div>
                        <!-- /gol /gol1 /antiobiotik -->
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Start Regular</label>
                          <div class="col-sm-4">
                            <select name="start_regular" class="form-control">
                              <option value="" selected disabled>--</option>
                              <option value="">Y</option>
                              <option value="">N</option>
                            </select>
                          </div>
                        </div>
                        <!-- /start-regular -->
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Barang Master</label>
                          <div class="col-sm-12">
                            <select name="barang_master" class="form-control">
                              <option value="" selected disabled>Pilih Barang</option>
                              <?php if ($barang_master['data']->num_rows() < 1): ?>
                                <option value="">Barang Master belum tersedia</option>
                              <?php else: ?>
                              <?php foreach ($barang_master['data']->result() as $value): ?>
                              <option value="<?php echo $value->id; ?>"><?php echo strtoupper($value->nama); ?></option>
                              <?php endforeach ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <!-- /brg-master -->
                        <div class="form-group">
                          <label class="label-control">Segmen</label>
                          <select name="segmen" class="form-control">
                            <option value="" selected disabled>--</option>
                            <option value="">Segmen 1</option>
                            <option value="">Segmen 2</option>
                          </select>
                        </div>
                        <!-- /segmen -->
                        <h4 class="form-section">Data Diskon</h4>
                        <div class="form-group row">
                          <label class="label-control col-sm-12">Diskon</label>
                          <div class="col-sm-6">
                            <fieldset>
                              <div class="input-group">
                                <input class="form-control border-primary" name="diskon" type="number" placeholder="0" min="0">
                                <span class="input-group-addon">%</span>
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /diskon -->
                        <div class="form-group row">
                          <label class="label-control col-sm-12">CN New Barang</label>
                          <div class="col-sm-6">
                            <fieldset>
                              <div class="input-group">
                                <input class="form-control border-primary" name="cn_new_barang" type="number" placeholder="0" min="0">
                                <span class="input-group-addon">%</span>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-sm-6">
                            <fieldset>
                              <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="new_cn" class="custom-control-input" value="y">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Dana New Product</span>
                              </label>
                            </fieldset>
                          </div>
                        </div>
                        <!-- /cn-new-barang /dana-new-product -->
                        <div class="form-group row">
                          <label class="label-control col-sm-6">Kondisi</label>
                          <label class="label-control col-sm-6">Kondisi User</label>
                          <div class="col-sm-6">
                            <fieldset>
                              <div class="input-group">
                                <input type="number" name="kondisi" class="form-control" max="100" min="0" placeholder="0">
                                <span class="input-group-addon">%</span>
                              </div>
                            </fieldset>
                          </div>
                          <!-- /kondisi -->
                          <div class="col-sm-6">
                            <fieldset>
                              <div class="input-group">
                                <input type="number" name="kondisi_user" class="form-control" max="100" min="0" placeholder="0">
                                <span class="input-group-addon">%</span>
                              </div>
                            </fieldset>
                          </div>
                          <!-- /kondisi-user -->
                        </div>
                        <!-- /kondisi /kondisi-user -->
                      </div>
                      <!-- /right-col -->
                    </div>
                  </div>
                  <div class="form-actions center">
                    <input type="submit" class="btn btn-success" name="">
                    <input type="reset" class="btn btn-warning" name="" value="Batal">
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
<script type="text/javascript">
  $(document).ready(function(){
    $('[name=harga_master]').keyup(function() {
      $('[name=harga_hna]').val($(this).val());
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add-region').click(function(event) {
      console.log('clicked');
      var target_selector = $('#region-out');

      var region_list = $('#region-list > option').map(function(){
        var id = $(this).val();
        var text = $(this).text();
        return '<option value="' + id + '">' + text + '</option>';
      }).get();

      // jangan lupa nanti tambahin nama variabelnya, pake array lho!!!
      var element = '<div class="row">' +
          '<div class="col-sm-6 col-xs-12">' +
            '<div class="form-group">' +
              '<label class="label-control">Region</label>' +
              '<select name="id_region[]" class="form-control select2-single">' +
                region_list +
              '</select>' +
            '</div>' +
          '</div>' +
          '<div class="col-sm-4 col-xs-10">' +
            '<div class="form-group">' +
              '<label class="label-control">Keterangan Region</label>' +
              '<textarea class="form-control border-primary" name="keterangan_region[]"></textarea>' +
            '</div>' +
          '</div>' +
          '<div class="col-xs-2">' +
            '<div class="form-group">' +
              '<label class="label-control">&nbsp;</label>' +
              '<button class="btn btn-block btn-danger" type="button" onclick="$(this).parent().parent().parent().remove()"><i class="fa fa-times"></button>' +
            '</div>' +
          '</div>' +
        '</div>';
      $(target_selector).append(element);
      $('.select2-single').select2();
    });
  });
</script>