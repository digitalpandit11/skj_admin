<link rel="icon" href="assets/dist/img/favicon-shrikrishna-jewellers.png" type="image/gif" sizes="16x16"> 
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
    if(!$_SESSION['user_name'])
    {
       header("location:welcome");
    }
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url().'dashboard'?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>   
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a href="<?php echo base_url().'welcome/logout'?>" class="dropdown-item dropdown-footer"><i class="fa fa-power-off"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="<?php echo base_url().'assets/dist/img/favicon-shrikrishna-jewellers.png'?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light"><b><?php echo $this->session->userdata('company_name'); ?></b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url().'assets/dist/img/no_image.png" class="img-circle elevation-2" alt="User Image'?>">
            </div>
            <div class="info">
                <a href=""><?php echo $this->session->userdata('full_name'); ?></a>
            </div>
        </div>
         <?php
            $session_owner = $_SESSION['session_owner'];
            if($session_owner == 1)
            {
        ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="myDIV">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <!-- <li class="nav-item has-treeview" >
                    <a href="<?php echo base_url().'dashboard'?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> -->

                
                <!--
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Order Approval's
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_pending_sales_order_data'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Pending Orders</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_approved_sales_order_data'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Approved Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Order Execution
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_sales_order_execution_data'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Pending Order Execution</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_approved_sales_order_execution_data'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Approved Order Execution</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>
                            Factory
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Work Orders
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'vw_work_order_data'?>" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Current Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'vw_completed_order_data'?>" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Completed Orders</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                
                <!-- <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Inventory
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_erp_product_grn_master'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>GRN</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_erp_delivery_challan'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Delivery Challan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_erp_bill_passing_master'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Bill Passing</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <!-- <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Accounts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url().'vw_collect_payment_index'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                   Payment Receivable
                                </p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url().'vw_payment_payable_index'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                  Bill Passing Payable
                                </p>
                            </a>
                        </li>
                    </ul>

                     <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="vw_expense_entry_data" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                    Expense Entry
                                </p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                  Make Payment
                                </p>
                            </a>
                        </li>
                    </ul>

                     <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                  Credit Note
                                </p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                  Debit Note
                                </p>
                            </a>
                        </li>
                    </ul>

                     <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                  Book Closing
                                </p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                

                    <!--<ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                 Customise
                                </p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                 User Management
                                </p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="vw_role_management_data" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>
                                    Role Management
                                </p>
                            </a>
                        </li>
                    </ul> -->

                    

                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Personalise
                          <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                         <i class="nav-icon fas fa-tasks"></i>
                         <p>
                           Project Management
                           <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                </li> 

                 <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                           Employee Timesheet
                           <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                </li> 

                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                         <i class="nav-icon fas fa-tasks"></i>
                         <p>
                          Task Management
                           <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                </li>   -->

                <!-- <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Masters
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_erp_product_vw_customer_master'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Customer Master</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_erp_product_product_category'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Product Category</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_erp_product_sub_category'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Product Sub Category</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_erp_product_master'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_payment_term_master'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Payment Terms </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_service_master'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Service Master </p>
                            </a>
                        </li>

                        <?php $gst_status = $_SESSION['gst_status']; 
                        if($gst_status == 1){?>
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_erp_hsn_data'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>HSN Master</p>
                            </a>
                        </li>
                        <?php } ?>
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_location_master'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Location Master</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_state_data'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>State Master</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_city_data'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>City Master</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_vendor_data'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Vendor Master </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url().'vw_account_data'?>" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Account Master </p>
                            </a>
                        </li>
                        
                    </ul>
                </li> -->

                <li class="nav-item">
                    <a href="<?php echo base_url().'edit_product_master/1'?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Product Prices</p>
                    </a>
                </li>
                
                
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

