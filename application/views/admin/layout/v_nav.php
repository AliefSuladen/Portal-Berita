<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="<?=base_url('admin')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Sponsor<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                   <li>
                                   <a href="<?=base_url('iklan')?>"><i class="fa fa-dashboard fa-dollar"></i> Iklan Banner</a>
                                   </li>
                                   <li>
                                   <a href="<?=base_url('slider')?>"><i class="fa fa-user fa-fw"></i> Iklan Slider</a>
                                   </li>
                                   
                                    </ul>
                                
                            </li>

                           
                           
                            <li>
                                <a href="<?=base_url('kategori')?>"><i class="fa fa-list fa-fw"></i> Kategori Berita</a>
                            </li>
                            <li>
                                <a href="<?=base_url('berita')?>"><i class="fa fa-camera fa-fw"></i> Berita</a>
                            </li>
                            <li>
                                <a href="<?=base_url('galeri')?>"><i class="fa fa-image fa-fw"></i> Galeri</a>
                            </li>

                            <li>
                                <a href="<?=base_url('download')?>"><i class="fa fa-download fa-fw"></i> Download</a>
                            </li>

                            <li>
                                <a href="<?=base_url('admin/setting')?>"><i class="fa fa-gear fa-fw"></i> Setting</a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/kontak')?>"><i class="fa fa-comment fa-fw"></i> Pesan</a>
                            </li>
                            <li>
                                <a href="<?=base_url('user')?>"><i class="fa fa-user fa-fw"></i> Users Admin</a>
                            </li>
                            <li class="active">
                                <a href="<?= base_url('login/logout')?>"><i class="fa  fa-sign-out"></i>Logout</a>
                            </li>
                         
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header"><?=$title2?></h2>
                       
                 

