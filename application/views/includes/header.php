<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header">
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
        </a>
        <a class="navbar-brand" href="dashboard">
            <b class="logo-icon hema_logo_icon">
                <!-- <img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" /> -->
                <img src="<?php echo base_url(); ?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo hema_logo hema_logo_responsive" />
                <img src="<?php echo base_url(); ?>assets/images/res-logo.png" alt="homepage" class="light-logo  hema_logo_res" />
            </b>
        </a>
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i>
        </a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-left mr-auto">
            <li class="nav-item d-none d-md-block">
                <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="sl-icon-menu font-20"></i>
                </a>
            </li>            
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-bell font-20"></i>

                </a>              
            </li> -->
            
        </ul>
        <!-- ============================================================== -->
        <!-- Right side toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-right">            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="<?= base_url(); ?>assets/images/login.png" alt="user" class="rounded-circle" width="31">
                </a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                    <span class="with-arrow">
                        <span class="bg-primary"></span>
                    </span>
                    <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                        <!-- <div class="">
                            <img src="http://localhost/ci/assets/images/users/1.jpg" alt="user" class="img-circle" width="60">
                        </div> -->
                        <div class="m-l-12">
                            <h4 class="m-b-0"><?php echo $this->session->userdata('emp_name'); ?></h4>
                            <p class="m-b-0"><?php echo $this->session->userdata('role'); ?></p>
                        </div>
                    </div>
                    <?php if($this->session->userdata('role') == "Head" || $this->session->userdata('role') == "Team Leader") { ?>     
                    <?php } elseif($this->session->userdata('role') == "Admin" || $this->session->userdata('role') == "Team Member"){ ?>     
                        <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/myprofile">
                        <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                    <?php } ?>     
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/password">
                        <i class="fa fa-lock m-r-5 m-l-5"></i> Change Password </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/logout">
                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
        </ul>
    </div>
</nav>
