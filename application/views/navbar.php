<body data-open="hover" data-menu="horizontal-top-icon-menu" data-col="2-columns" class="horizontal-layout horizontal-top-icon-menu 2-columns   menu-expanded pace-done">
  <div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
      <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
  </div>
  <!-- navbar-fixed-top-->
  <nav class="header-navbar navbar navbar-with-menu undefined navbar-light navbar-border">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav">
          <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
          <li class="nav-item"><a class="padding-none"  class="navbar-brand nav-link">
            <img alt="branding logo" src="<?php echo base_url() ?>/img/logo.png" class="brand-logo logo-nucleus"></a></li>
          <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
        </ul>
      </div>
      <div class="navbar-container content container-fluid">
        <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
          <ul class="nav navbar-nav float-xs-right">
            <li class="dropdown dropdown-user nav-item">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-user-link">
                    <span class="avatar avatar-online"></span>
                    <span class="user-name">John Doe</span>
                  </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item"><i class="fa fa-user"></i> My Profile</a>
                <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div id="fullscreen-search" class="fullscreen-search">
    <form class="fullscreen-search-form">
      <input type="search" placeholder="Search..." class="fullscreen-search-input">
      <button type="submit" class="fullscreen-search-submit">Search</button>
    </form>
    <div class="fullscreen-search-content">
      <div class="fullscreen-search-options">
        <div class="row">
          <div class="col-sm-12">
            <fieldset>
              <label class="custom-control custom-checkbox display-inline">
                <input type="checkbox" class="custom-control-input"><span class="custom-control-indicator"></span><span class="custom-control-description m-0">All</span>
              </label>
              <label class="custom-control custom-checkbox display-inline">
                <input type="checkbox" class="custom-control-input"><span class="custom-control-indicator"></span><span class="custom-control-description m-0">People</span>
              </label>
              <label class="custom-control custom-checkbox display-inline">
                <input type="checkbox" class="custom-control-input"><span class="custom-control-indicator"></span><span class="custom-control-description m-0">Project</span>
              </label>
              <label class="custom-control custom-checkbox display-inline">
                <input type="checkbox" class="custom-control-input"><span class="custom-control-indicator"></span><span class="custom-control-description m-0">Task</span>
              </label>
            </fieldset>
          </div>
        </div>
      </div>
      <div class="fullscreen-search-result mt-2">
        <div class="row">
          <div class="col-lg-4">
            <h3>People</h3>
            <div class="media"><a href="https://pixinvent.com/bootstrap-admin-template/robust/html/ltr/horizontal-top-icon-menu-template/#" class="media-left"><img src="assets/avatar-s-2.png" alt="Generic placeholder image" class="media-object rounded-circle"></a>
              <div class="media-body">
                <h5 class="media-heading"><a href="https://pixinvent.com/bootstrap-admin-template/robust/html/ltr/horizontal-top-icon-menu-template/#">Karmen Dartez</a></h5>
                <p class="mb-0"><span class="tag tag-pill mr-1 tag-danger">JavaScript</span><span class="tag tag-pill mr-1 tag-primary">HTML</span></p>
                <p><span class="font-weight-bold">Sr. Developer - </span><a href="mailto:john@example.com">karmen@example.com</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h3>Project</h3>
            <div class="media">
              <div class="media-body">
                <h5 class="media-heading"><a href="https://pixinvent.com/bootstrap-admin-template/robust/html/ltr/horizontal-top-icon-menu-template/#">WordPress Template Support</a></h5>
                <progress value="25" max="100" class="progress progress-xs progress-success mb-0">25%</progress>
                <p class="mb-0">Collicitudin vel metus scelerisque ante  commodo.</p>
                <p><span class="tag tag-pill tag-success">In Progress</span><span class="tag tag-default tag-default float-sm-right">25% Completed</span></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h3>Task</h3>
            <div class="media">
              <div class="media-body">
                <h5 class="media-heading"><a href="https://pixinvent.com/bootstrap-admin-template/robust/html/ltr/horizontal-top-icon-menu-template/#">Create the new layout for menu</a></h5>
                <p class="mb-0">Pcelerisque ulla vel metus  ante sollicitudin commodo.</p>
                <p><span class="tag tag-pill tag-danger">Open</span><span class="tag tag-default tag-default tag-default tag-icon float-sm-right"><i class="icon-calendar5"></i> 22 January, 16</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><span class="fullscreen-search-close"></span>
  </div>
  <div class="fullscreen-search-overlay"></div>
  <!-- Horizontal navigation-->
  <div id="sticky-wrapper" class="sticky-wrapper" style="height: 94px;"><div role="navigation" data-menu="menu-wrapper" class="header-navbar navbar navbar-horizontal navbar-fixed bg-blue navbar-without-dd-arrow navbar-bordered navbar-shadow">
    <!-- Horizontal menu content-->
    <div data-menu="menu-container" class="navbar-container main-menu-content">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
        <li data-menu="dropdown" class="dropdown nav-item "><a href="<?php echo site_url() ?>/Admin"  class="nav-link"><i class="fa fa-tachometer "></i><span data-i18n="nav.dash.main"></span>Dashboard</a>
        </li>
        <li data-menu="dropdown" class="dropdown nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link menu"><i class="fa fa-user"></i><span data-i18n="nav.templates.main">Master</span></a>
          <ul class="dropdown-menu">
            <li data-menu=""><a href="<?php echo site_url() ?>/master-area/all" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-map-marker"></i>Master Area</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-distributor" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-truck"></i>Master Distributor</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-subdist" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-shopping-basket"></i>Master Subdistributor</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-detailer" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-at"></i>Master Detailer</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-operasional" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Master Operasional</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-cogm" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-stack-overflow"></i>Master COGM</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-aset" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-archive"></i>Master Aset</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-customer" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-user"></i>Master Customer</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-customer-non" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-users"></i>Master Customer (Non)</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-outlet" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-building-o"></i>Master Outlet</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/master-produk" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-medkit"></i>Master Produk</a>
            </li>
            <!-- <li data-menu=""><a href="<?php echo site_url() ?>/master-stok" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-tablet"></i>Master Stok</a>
            </li> -->
          </ul>
        </li>
        <li data-menu="dropdown" class="dropdown nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-money"></i><span data-i18n="nav.layouts.temp">Transaction</span></a>
          <ul class="dropdown-menu">
            <li data-menu=""><a href="<?php echo site_url() ?>/subdist" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Subdist</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/prospek-ineks" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Prospek Intensifikasi Ekstensifikasi</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/fixed-cost" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Fixed Cost &amp; Ratio</a>
            </li>
            <li data-menu=""><a href="#" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Prospect RTD</a>
            </li>
            <li data-menu=""><a href="#" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Prospect Marketing Activity</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/evaluasi-target-customer" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Evaluasi Target Customer</a>
            </li>
            <li data-menu="dropdown-submenu" class="dropdown dropdown-submenu ">
              <a href="#" data-toggle="dropdown" class="dropdown-item dropdown "><i class="fa fa-money"></i>Monthly call plan <i class="fa fa-chevron-right pull-right"></i></a>
              <ul class="dropdown-menu">
                <li data-menu="" ><a href="#" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Target call plan spv</a>
                </li>
                <li data-menu=""><a href="#" data-toggle="dropdown" class="dropdown-item"><i  class="fa fa-money"></i>Evaluasi call plan spv</a>
                </li>
                <li data-menu="" ><a href="#" data-toggle="dropdown" class="dropdown-item"> <i class="fa fa-money"></i>Target call plan DSM</a>
                </li>
                <li data-menu="" ><a href="#" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Evaluasi call plan DSM</a>
                </li>
              </ul>
            </li>
             <li data-menu=""><a href="<?php echo site_url(); ?>/wpr" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>WPR</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url(); ?>/promo-trial" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Promo Trial</a>
            </li>
            <!-- <li data-menu="dropdown-submenu" class="dropdown dropdown-submenu">
              <a href="#" data-toggle="dropdown" class="dropdown-item dropdown-toggle"><i class="fa fa-money"></i>Permohonan Barang<i class="fa fa-chevron-right pull-right"></i></a>
              <ul class="dropdown-menu">
                <li data-menu=""><a href="<?php echo site_url(); ?>/permohonan-barang-distributor" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Permohonan Barang Distributor</a>
                </li>
                <li data-menu=""><a href="<?php echo site_url(); ?>/permohonan-barang-outlet" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Permohonan Barang Outlet</a>
                </li>
              </ul>
            </li> -->
            <li data-menu="dropdown-submenu" class="dropdown dropdown-submenu">
              <a href="#" data-toggle="dropdown" class="dropdown-item dropdown-toggle"><i class="fa fa-money"></i>Surat Permohonan Disc. On &amp; Off Faktur<i class="fa fa-chevron-right pull-right"></i></a>
              <ul class="dropdown-menu">
                <li data-menu=""><a href="<?php echo site_url(); ?>/daftar-faktur" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Daftar Faktur</a>
                </li>
                <li data-menu=""><a href="<?php echo site_url(); ?>/faktur-diskon-general" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>General</a>
                </li>
                <li data-menu=""><a href="<?php echo site_url(); ?>/faktur-diskon-tender" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-money"></i>Tender</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li data-menu="dropdown" class="dropdown nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="fa fa-file"></i><span data-i18n="nav.category.general">Report</span></a>
          <ul class="dropdown-menu">
            <li data-menu="dropdown-submenu" class="dropdown dropdown-submenu"><a href="#" data-toggle="dropdown" class="dropdown-item dropdown-toggle"><i class=" fa fa-file"></i>Daily Sales <i class="fa fa-chevron-right pull-right"></i></a>
              <ul class="dropdown-menu">
                <li data-menu="" ><a href="<?php echo site_url() ?>/daily-sales-product" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-file"></i>per Product</a>
                </li>
                <li data-menu=""><a href="<?php echo site_url() ?>/daily-sales-outlet" data-toggle="dropdown" class="dropdown-item"><i  class="fa fa-file"></i>per Outlet</a>
                </li>
              </ul>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/Report/data_sales_distributor_jenis_product" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-file"></i>Data Sales distributor dan jenis product (all area per year)</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/stock-produk-nucleus" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-file"></i>Data Stock Product (Nucleus)</a>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/stock-produk-distributor" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-file"></i>Data Stock Product (Distributor)</a>
            </li>
            <li data-menu="dropdown-submenu" class="dropdown dropdown-submenu"><a href="#" data-toggle="dropdown" class="dropdown-item dropdown-toggle"><i class="fa fa-file"></i>Entry Breakdown Analisa Sales<i class="fa fa-chevron-right pull-right"></i></a>
              <ul class="dropdown-menu">
                <li data-menu="dropdown-submenu" class="dropdown dropdown-submenu"><a href="#" data-toggle="dropdown" class="dropdown-item dropdown-toggle">per Outlet<i class="fa fa-chevron-right pull-right"></i></a>
                  <ul class="dropdown-menu">
                    <li data-menu=""><a href="<?php echo site_url() ?>/analisis-sales-general" data-toggle="dropdown" class="dropdown-item">General</a>
                    </li>
                    <li data-menu=""><a href="<?php echo site_url() ?>/analisis-sales-per-produk" data-toggle="dropdown" class="dropdown-item">per Product</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li data-menu=""><a href="<?php echo site_url() ?>/Report/pemindahan_sales" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-file"></i>Laporan Pemindahan Sales</a>
            </li>
             <li data-menu=""><a href="<?php echo site_url() ?>/Report/actual_sales" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-file"></i>Laporan Actual Sales per year</a>
            </li>
             <li data-menu=""><a href="<?php echo site_url() ?>/Report/donasi" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-file"></i>Laporan Donasi</a>
            </li>
           <li data-menu="dropdown-submenu" class="dropdown dropdown-submenu"><a href="#" data-toggle="dropdown" class="dropdown-item dropdown-toggle"><i class=" fa fa-file"></i>KLM (key loyalty management) Redflag, MVC, Balance<i class="fa fa-chevron-right pull-right"></i></a>
              <ul class="dropdown-menu">
                <li data-menu="" ><a href="<?php echo site_url() ?>/Report/klm_sales" data-toggle="dropdown" class="dropdown-item"><i class="fa fa-file"></i>Sales (leveling )</a>
                </li>
                <li data-menu=""><a href="<?php echo site_url() ?>/Report/klm_dana" data-toggle="dropdown" class="dropdown-item"><i  class="fa fa-file"></i>Dana</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>