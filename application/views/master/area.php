<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-tosca">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Master Area</h4>
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
                              <th>Nama Area</th>
                              <th>Alias Area</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php for ($i=0; $i < 5; $i++): ?>
                          <tr>
                              <td class="text-truncate"><?php echo $i+1; ?></td>
                              <td class="text-truncate">Jakarta</td>
                              <td class="text-truncate">JKT</td>
                          </tr>
                          <?php endfor; ?>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="card border-top-blue">
            <div class="card-header no-border-bottom">
              <h4 class="card-title">Tambah Area</h4>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements"></div>
            </div>
            <div class="card-body">
              <div class="card-block">
                <div class="col-sm-6 offset-md-3">
                  <form class="form-horizontal" action="<?php echo site_url(); ?>/store-area" method="post">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Kode Area</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="id" type="text" placeholder="Kode Area" maxlength="5" minlength="2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Nama Area</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="area" type="text" placeholder="Nama Area" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="label-control col-sm-2">Alias Area</label>
                        <div class="col-sm-10">
                          <input class="form-control border-primary" name="alias_area" type="text" placeholder="Alias Area" >
                        </div>
                      </div>
                    <div class="form-group pull-right">
                      <input type="submit" class="btn btn-success" value="Simpan">
                      <input type="reset" class="btn btn-warning" value="Batal">
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
</div>