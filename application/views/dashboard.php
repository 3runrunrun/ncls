
 

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!--fitness stats-->
      <div class="row">
          <div class="col-xs-12">
              <div class="card border-top-green">
                  <div class="card-body">
                      <div class="card-block">
                          <div class="row">
                              <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
                                  <div class="float-xs-left pl-2">
                                      <span class="fa fa-bar-chart fa-5x color-orange"></span>
                                  </div>
                                  <div class="float-xs-left ml-1">
                                    <span class="font-large-3 line-height-1 text-bold-300">25%</span>
                                      <span class="grey darken-1 block">Target</span>
                                  </div>
                              </div>
                              <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
                                   <div class="float-xs-left pl-2">
                                      <span class="fa fa-user fa-5x color-tosca"></span>
                                  </div>
                                  <div class="float-xs-left ml-1">
                                    <span class="font-large-3 line-height-1 text-bold-300">25</span>
                                      <span class="grey darken-1 block">Sales person</span>
                                  </div>
                              </div>
                              <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
                                   <div class="float-xs-left pl-2">
                                      <span class="fa fa-share-square-o fa-5x color-blue"></span>
                                  </div>
                                  <div class="float-xs-left ml-1">
                                    <span class="font-large-3 line-height-1 text-bold-300">25.000</span>
                                      <span class="grey darken-1 block">Sales</span>
                                  </div>
                              </div>
                              <div class="col-xl-3 col-lg-6 col-md-12 clearfix">
                                   <div class="float-xs-left pl-2 ">
                                      <span class="fa fa-money fa-5x color-red"></span>
                                  </div>
                                  <div class="float-xs-left ml-1 mt-1">
                                    <span class="line-height-1 text-bold-400">25.000.000.000</span>
                                      <span class="grey darken-1 block">Rupiah</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

<!-- friends & weather charts -->

<!-- Running Routes & Daily Activities  -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card border-top-tosca">
                <div class="card-header no-border-bottom">
                    <h4 class="card-title">Daily Sales Activity</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="fa fa-refresh"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Kota/Area</th>
                                    <th>Sales Reg</th>
                                    <th>Sales PTKP</th>
                                    <th>Sales PPG</th>
                                    <th>Sales Penta</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php for ($i=0; $i < 5; $i++) { 
                                # code...
                               ?>
                                <tr>
                                    <td class="text-truncate">007</td>
                                    <td class="text-truncate">Jakarta Selatan</td>
                                    <td class="text-truncate">200.000.000</td>
                                    <td class="text-truncate">200.000.000</td>
                                    <td class="text-truncate">200.000.000</td>
                                    <td class="text-truncate">200.000.000</td>
                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 350px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 307px;"></div></div></div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="card border-top-orange">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                            <div class="my-1 text-xs-center">
                                <div class="card-header mb-2 pt-0">
                                    <span class="info">
                                      <h3 class="font-large-2 text-bold-200">Redflag</h3>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div style="display:inline;width:100px;height:100px;"><input type="text" value="65" class="knob hide-value responsive angle-offset" data-angleoffset="40" data-thickness=".15" data-linecap="round" data-width="100" data-height="100" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#00BCD4" data-knob-icon="icon-feedback2" readonly="readonly" style="width: 69px; height: 43px; position: absolute; vertical-align: middle; margin-top: 43px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 26px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -99px; display: none;"></div>
                                    <ul class="list-inline clearfix mt-1 mb-0">
                                        <li class="border-right-grey border-right-lighten-2 pr-2">
                                            <h2 class="grey darken-1 text-bold-400">65%</h2>
                                            <span class="success">Completed</span>
                                        </li>
                                        <li class="pl-2">
                                            <h2 class="grey darken-1 text-bold-400">35%</h2>
                                            <span class="danger">Remaining</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                            <div class="my-1 text-xs-center">
                                <div class="card-header mb-2 pt-0">
                                    <span class="deep-orange">
                                      <h3 class="font-large-2 text-bold-200">Mvc </h3>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div style="display:inline;width:100px;height:100px;"><input type="text" value="70" class="knob hide-value responsive angle-offset" data-angleoffset="0" data-thickness=".15" data-linecap="round" data-width="100" data-height="100" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#FF5722" data-knob-icon="icon-user2" readonly="readonly" style="width: 69px; height: 43px; position: absolute; vertical-align: middle; margin-top: 43px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 26px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -99px; display: none;">
                                    </div>
                                    <ul class="list-inline clearfix mt-1 mb-0">
                                        <li>
                                            <h2 class="grey darken-1 text-bold-400">10%</h2>
                                            <span class="deep-orange"> Today's Target</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="my-1 text-xs-center">
                                <div class="card-header mb-2 pt-0">
                                    <span class="danger">
                                      <h3 class="font-large-2 text-bold-200">Balance </h3>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div style="display:inline;width:100px;height:100px;"><input type="text" value="75" class="knob hide-value responsive angle-offset" data-angleoffset="20" data-thickness=".15" data-linecap="round" data-width="100" data-height="100" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#DA4453" data-knob-icon="icon-heart6" readonly="readonly" style="width: 69px; height: 43px; position: absolute; vertical-align: middle; margin-top: 43px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 26px; line-height: normal; font-family: Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -99px; display: none;"></div>
                                    <ul class="list-inline clearfix mt-1 mb-0">
                                        <li>
                                            <h2 class="grey darken-1 text-bold-400">125%</h2>
                                            <span class="danger">Over </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--/ Running Routes & Daily Activities  -->

<!-- fitness info & twitter, facebook -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 ">
                    <div class="card profile-card-with-cover border-top-blue">
                        <div class="card-body">
                            <h4 class="card-title text-xs-center mt-2">Top Sales</h4>
                            <div class="profile-card-with-cover-content text-xs-center">
                                <div class="my-2">
                                    <h4 class="card-title">Hillary </h4>
                                    <ul class="list-inline clearfix mt-2">
                                        <li class="mr-2">
                                            <h2 class="block">75 <span class="font-small-3 text-muted">%</span></h2> Acheivment</li>
                                        <li class="mr-2">
                                            <h2 class="block">Area </h2> Jakarta Selatan</li>
                                        <li>
                                            <h2 class="block">Mounth</h2> Jully</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-12 ">
                    <div class="card profile-card-with-cover border-top-red">
                        <div class="card-body collapse in">
                            <div id="daily-activity" class="table-responsive height-250 ps-container ps-theme-default ps-active-y" data-ps-id="919f8169-8f2a-e62c-bd13-883a2a99a52f">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Kode Sales</th>
                                            <th>Sales</th>
                                            <th>Sales Reg</th>
                                            <th>Sales Dis Prog</th>
                                            <th>Target</th>
                                            <th>Acheivment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php for ($i=0; $i < 5; $i++) { 
                                        # code...
                                       ?>
                                        <tr>
                                            <td class="text-truncate">007</td>
                                            <td class="text-truncate">Edward</td>
                                            <td class="text-truncate">200.000.000</td>
                                            <td class="text-truncate">20.000.000</td>
                                            <td class="text-truncate">100.000.000</td>
                                            <td class="text-truncate">50%</td>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 350px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 307px;"></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--/ fitness info & twitter, facebook -->

        </div>
      </div>
    </div>
    