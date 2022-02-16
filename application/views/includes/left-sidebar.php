<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav"> 
                <?php if($this->session->userdata('role') == "Admin"){ ?>   
                    <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/dashboard" aria-expanded="false">
                        <i class="icon-Pie-Chart"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li> 
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/admin-ops" aria-expanded="false">
                        <i class="icon-Office"></i>
                        <span class="hide-menu">Operations</span>
                    </a>
                </li>   
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/add-operation-login" aria-expanded="false">
                        <i class="icon-Office"></i>
                        <span class="hide-menu">Add Operations Login</span>
                    </a>
                </li>                  
                <?php } else if($this->session->userdata('role') == 'Operations Head'){ ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/dashboard" aria-expanded="false">
                            <i class="icon-Pie-Chart"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>  
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/users" aria-expanded="false">
                            <i class="icon-Add-User"></i>
                            <span class="hide-menu">Users</span>
                        </a>
                    </li>  
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/dept" aria-expanded="false">
                            <i class="icon-Office"></i>
                            <span class="hide-menu">Department</span>
                        </a>
                    </li>   
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/client" aria-expanded="false">
                            <i class="icon-Car-Wheel"></i>
                            <span class="hide-menu">Client</span>
                        </a>
                    </li>  
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/project" aria-expanded="false">
                            <i class="icon-Project"></i>
                            <span class="hide-menu">Project</span>
                        </a>
                    </li> 
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/project-report" aria-expanded="false">
                            <i class="icon-Receipt"></i>
                            <span class="hide-menu">Project Report</span>
                        </a>
                    </li> 
                    
                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/task" aria-expanded="false">
                            <i class="sl-icon-pencil"></i>
                            <span class="hide-menu">Task</span>
                        </a>
                    </li>  -->
                <?php } else if($this->session->userdata('role') == 'Team Leader'){ ?>
                    <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/dashboard" aria-expanded="false">
                        <i class="icon-Pie-Chart"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>  
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/users" aria-expanded="false">
                        <i class="icon-Add-User"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>  
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/project" aria-expanded="false">
                        <i class="icon-Project"></i>
                        <span class="hide-menu">Project</span>
                    </a>
                </li> 
                <!-- <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/task" aria-expanded="false">
                        <i class="sl-icon-pencil"></i>
                        <span class="hide-menu">Task</span>
                    </a>
                </li>  -->

                <?php } else if($this->session->userdata('role') == 'Team Member'){ ?>
                    <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/dashboard" aria-expanded="false">
                        <i class="icon-Pie-Chart"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>  
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/project" aria-expanded="false">
                        <i class="icon-Project"></i>
                        <span class="hide-menu">Project</span>
                    </a>
                </li> 
                <!-- <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/task" aria-expanded="false">
                        <i class="sl-icon-pencil"></i>
                        <span class="hide-menu">Task</span>
                    </a>
                </li>  -->
                <?php } else if($this->session->userdata('role') == 'Client'){ ?>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/dashboard" aria-expanded="false">
                        <i class="icon-Pie-Chart"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>  
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>index.php/project" aria-expanded="false">
                        <i class="icon-Project"></i>
                        <span class="hide-menu">Project</span>
                    </a>
                </li> 
                <?php } ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>