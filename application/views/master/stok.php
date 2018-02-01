<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <?php if($tambah_stok != null): ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Tambah Stok</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form class="form-horizontal" action="<?php echo site_url(); ?>/store-stok" method="post">
                    <?php foreach($tambah_stok['data']->result() as $value): ?>
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Kode Barang</label>
                        <div class="col-sm-10">
                          <input readonly class="form-control border-primary" name="id_barang" value="<?php echo $value->id; ?>" type="text" maxlength="5" minlength="2" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Kemasan</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" value="<?php echo strtoupper($value->kemasan); ?>" type="text" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Stok Barang</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" value="<?php echo $value->stok ?>" type="number" disabled>
                          <p>*) Stok barang saat ini</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Tambah Stok</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="stok" type="number" placeholder="1" min="1">
                        </div>
                      </div>
                    <div class="form-group pull-right">
                      <input type="submit" class="btn btn-success" value="Tambah">
                      <input type="reset" class="btn btn-warning" value="Batal">
                    </div>
                    <?php endforeach; ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?> 
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
                <!-- Tabel -->
                <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y border-top-red" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                  <table class="table table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kemasan</th>
                            <th>Harga (HNA)</th>
                            <th>Harga (H.Askes)</th>
                            <th>Harga Master</th>
                            <th>Stok</th>
                            <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($stok['data']->result() as $value): ?>
                        <tr>
                          <td><?php echo strtoupper($value->id); ?></td>
                          <td><?php echo strtoupper($value->nama); ?></td>
                          <td><?php echo strtoupper($value->kemasan); ?></td>
                          <td>Rp <?php echo $value->harga_hna; ?></td>
                          <td>Rp <?php echo $value->harga_h_askes; ?></td>
                          <td>Rp <?php echo $value->harga_master; ?></td>
                          <td><?php echo $value->stok; ?></td>
                          <td>
                            <div class="btn-group-vertical" role="group">
                              <a href="<?php echo site_url() ?>/master-stok/<?php echo $value->id; ?>" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Stok</a>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                  </table>
                  <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 350px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 307px;"></div></div>
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