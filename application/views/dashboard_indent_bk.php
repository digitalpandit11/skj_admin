<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
if(!$_SESSION['user_name'])
{
   header("location:welcome");
}
?>
<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<title><?php echo $this->session->userdata('company_name');?></title>
	  	<!-- Tell the browser to be responsive to screen width -->
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<!-- Font Awesome -->
	 	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fontawesome-free/css/all.min.css'?>">
	  	<!-- Ionicons -->
	  	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  	<!-- Tempusdominus Bbootstrap 4 -->
	  	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'?>">
	  	<!-- iCheck -->
	  	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'?>">
	  	<!-- JQVMap -->
	  	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jqvmap/jqvmap.min.css'?>">
	  	<!-- Theme style -->
	  	<link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/adminlte.min.css'?>">
	  	<!-- overlayScrollbars -->
	  	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'?>">
	  	<!-- Daterange picker -->
	  	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
	  	<!-- summernote -->
	  	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/summernote/summernote-bs4.css'?>">
	  	<!-- Google Font: Source Sans Pro -->
	  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<?php $this->load->view('header_sidebar');?>
				<?php

				    $user_id = $_SESSION['user_id'];

				    $this->db->select('enquiry_register.*');
				    $this->db->from('enquiry_register');
				    $where = '(enquiry_register.user_id = "'.$user_id.'")';
				    $this->db->where($where);
				    $enquiry_register_data = $this->db->get();
				    $enquiry_register_data_count = $enquiry_register_data->num_rows();

				    $this->db->select('offer_register.*');
				    $this->db->from('offer_register');
				    $where = '(offer_register.user_id = "'.$user_id.'")';
				    $this->db->where($where);
				    $offer_register_data = $this->db->get();
				    $offer_register_count = $offer_register_data->num_rows();

				    $this->db->select_sum('total_amount_with_gst');
				    $this->db->from('offer_product_relation');
				    $where = '(offer_product_relation.user_id = "'.$user_id.'")';
				    $this->db->where($where);
				    $query=$this->db->get();
				    $total_offer_amount = $query->row();
				    $total_offer_amount_final = $total_offer_amount->total_amount_with_gst;
				    $final_offer_amount = number_format($total_offer_amount_final, 3, '.', '');

				    $this->db->select('sales_order_register.*');
				    $this->db->from('sales_order_register');
				    $where = '(sales_order_register.user_id = "'.$user_id.'")';
				    $this->db->where($where);
				    $sales_order_register_data = $this->db->get();
				    $sales_order_register_count = $sales_order_register_data->num_rows();

				    $this->db->select_sum('total_amount_with_gst');
				    $this->db->from('sales_order_product_relation');
				    $where = '(sales_order_product_relation.user_id = "'.$user_id.'")';
				    $this->db->where($where);
				    $query=$this->db->get();
				    $total_sales_order_amount = $query->row();
				    $total_sales_order_amount_final = $total_sales_order_amount->total_amount_with_gst;
				    $final_sales_order_amount = number_format($total_sales_order_amount_final, 3, '.', '');

				    $this->db->select('grn_register.*');
				    $this->db->from('grn_register');
				    $where = '(grn_register.user_id = "'.$user_id.'" AND grn_register.status = 2)';
				    $this->db->where($where);
				    $grn_register_data = $this->db->get();
				    $grn_register_count = $grn_register_data->num_rows();


				    $this->db->select_sum('value_with_gst');
				    $this->db->from('grn_product_register');
				    $where = '(grn_product_register.user_id = "'.$user_id.'")';
				    $this->db->where($where);
				    $query=$this->db->get();
				    $total_grn_product_register_amount = $query->row();
				    $total_grn_product_register_amount_final = $total_grn_product_register_amount->value_with_gst;
				    $value_with_gst_amount = number_format($total_grn_product_register_amount_final, 3, '.', '');

				    $this->db->select('bill_passing_master.*');
				    $this->db->from('bill_passing_master');
				    $where = '(bill_passing_master.user_id = "'.$user_id.'")';
				    $this->db->where($where);
				    $bill_passing_master_data = $this->db->get();
				    $bill_passing_master_count = $bill_passing_master_data->num_rows();

				    $this->db->select_sum('value_with_gst');
				    $this->db->from('bill_passing_product_register');
				    $where = '(bill_passing_product_register.user_id = "'.$user_id.'")';
				    $this->db->where($where);
				    $query=$this->db->get();
				    $total_bill_passing_product_register_amount = $query->row();
				    $total_bill_passing_product_register_amount_final = $total_bill_passing_product_register_amount->value_with_gst;
				    $bill_passing_product_value_with_gst_amount = number_format($total_bill_passing_product_register_amount_final, 3, '.', '');

				    if(!empty($sales_order_register_count && $offer_register_count))
				    {
				    	$Conversion_ratio = $sales_order_register_count/$offer_register_count*100;
				    }else{
				    	$Conversion_ratio =0;
				    }

				    
				?>

				<div class="content-wrapper">
    				<!-- Content Header (Page header) -->
					<div class="content-header">
      					<div class="container-fluid">
        					<div class="row mb-2">
          						<div class="col-sm-6">
        							<h1 class="m-0 text-dark">Dashboard</h1>
          						</div>
        					</div>
				      	</div>
				    </div>
				    <section class="content">
      					<div class="container-fluid">
        					<div class="row">
					          	<div class="col-12 col-sm-6 col-md-3">
					            	<div class="info-box">
					              		<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
					              		<div class="info-box-content">
					                		<span class="info-box-text">Enquiries</span>
					                		<span class="info-box-number">
					                  			<?php  echo $enquiry_register_data_count; ?> Nos
					                		</span>
					              		</div>
					            	</div>
					          	</div>
					          	<div class="col-12 col-sm-6 col-md-3">
						            <div class="info-box mb-3">
						              	<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
						             	<div class="info-box-content">
						                	<span class="info-box-text">Offers</span>
						                	<span class="info-box-number">
						                  		<?php  echo $offer_register_count; ?> Nos<span style="font-size: 15px;"> (Rs <?php  echo $final_offer_amount; ?>)</span>
						                	</span>
						              	</div>
						            </div>
          						</div>
          						<div class="clearfix hidden-md-up"></div>
					          	<div class="col-12 col-sm-6 col-md-3">
					            	<div class="info-box mb-3">
					              		<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
					              		<div class="info-box-content">
					                		<span class="info-box-text">Orders</span>
					            			<span class="info-box-number"><?php  echo $sales_order_register_count; ?> Nos<span style="font-size: 15px;"> (Rs <?php  echo $final_sales_order_amount; ?>)</span></span>
					              		</div>
					            	</div>
					          	</div>
					          	<div class="col-12 col-sm-6 col-md-3">
            						<div class="info-box mb-3">
              							<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              							<div class="info-box-content">
						                	<span class="info-box-text">GRN</span>
						                	<span class="info-box-number"><?php  echo $grn_register_count; ?> Nos<span style="font-size: 15px;"> (Rs <?php  echo $value_with_gst_amount; ?>)</span></span>
						              	</div>
					            	</div>
					          	</div>
					        </div>

					        <div class="row">
					          	<div class="col-12 col-sm-6 col-md-3">
					            	<div class="info-box">
					              		<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
					              		<div class="info-box-content">
					                		<span class="info-box-text">Conversion Ratio</span>
					                		<span class="info-box-number">
					                  			<?php  echo $Conversion_ratio; ?>
					                  			<small>%</small>
					            			</span>
					              		</div>
					            	</div>
					          	</div>
					          	<div class="col-12 col-sm-6 col-md-3">
					            	<div class="info-box mb-3">
					              		<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
					              		<div class="info-box-content">
					                		<span class="info-box-text">Pending Production</span>
					                		<span class="info-box-number">41,410</span>
					              		</div>
					            	</div>
					          	</div>
          						<div class="clearfix hidden-md-up"></div>
					          	<div class="col-12 col-sm-6 col-md-3">
					            	<div class="info-box mb-3">
					              		<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
					          			<div class="info-box-content">
					            			<span class="info-box-text">Pending Dispatches</span>
					            			<span class="info-box-number">41,410</span>
					          			</div>
					    			</div>
					          	</div>
					          	<div class="col-12 col-sm-6 col-md-3">
					            	<div class="info-box mb-3">
					              		<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
					              		<div class="info-box-content">
							                <span class="info-box-text">Bill Passing</span>
							                <span class="info-box-number"><?php  echo $bill_passing_master_count; ?> Nos<span style="font-size: 15px;"> (Rs <?php  echo $bill_passing_product_value_with_gst_amount; ?>)</span></span>
					              		</div>
					            	</div>
					          	</div>
					        </div>

					        <?php 

					        	$currmonthsubone = date('m', strtotime('-1 month'));
					            $subone = date("F", mktime(0, 0, 0, $currmonthsubone));

					            /*print_r($subone);
					            die();*/

					            $firstday_subone = date('Y-m-01', strtotime('-1 month'));
					            $lastday_subone = strtotime(date("Y-m-d", strtotime($firstday_subone)) . "+1 month");
					            $lastday_subone = date("Y-m-d",$lastday_subone);
					            
					            $this->db->select('enquiry_register.*');
					            $this->db->from('enquiry_register');
					            $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_date >= "'.$firstday_subone.'" And enquiry_register.enquiry_date <= "'.$lastday_subone.'")';
					            $this->db->where($where);
					            $enquiry_subone = $this->db->get();
					            $enquiry_subone_count = $enquiry_subone->num_rows();

					            $this->db->select('offer_register.*');
					            $this->db->from('offer_register');  
					            $where = '(offer_register.user_id = "'.$user_id.'" AND offer_register.offer_date >= "'.$firstday_subone.'" And offer_register.offer_date <= "'.$lastday_subone.'")';
					            $this->db->where($where);
					            $offer_subone = $this->db->get();
					            $offer_subone_count = $offer_subone->num_rows();
					            

					            $this->db->select('sales_order_register.*');
					            $this->db->from('sales_order_register');
					            $where = '(sales_order_register.user_id = "'.$user_id.'" AND sales_order_register.sales_order_date >= "'.$firstday_subone.'" And sales_order_register.sales_order_date <= "'.$lastday_subone.'")';
					            $this->db->where($where);    
					            $sales_order_subone = $this->db->get();
					            $sales_order_subone_count = $sales_order_subone->num_rows();
					            //Last Month End
					            

					            //SecondLast Month Start
					            $currmonthsubtwo = date('m', strtotime('-2 month'));
					            $subtwo = date("F", mktime(0, 0, 0, $currmonthsubtwo));
					            $firstday_subtwo = date('Y-m-01', strtotime('-2 month'));
					            $lastday_subtwo = strtotime(date("Y-m-d", strtotime($firstday_subtwo)) . "+1 month");
					            $lastday_subtwo = date("Y-m-d",$lastday_subtwo);
					          

					            $this->db->select('enquiry_register.*');
					            $this->db->from('enquiry_register');
					            $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_date >= "'.$firstday_subtwo.'" And enquiry_register.enquiry_date <= "'.$lastday_subtwo.'")';
					            $this->db->where($where);    
					            $enquiry_subtwo = $this->db->get();
					            $enquiry_subtwo_count = $enquiry_subtwo->num_rows();

					            $this->db->select('offer_register.*');
					            $this->db->from('offer_register');
					            $where = '(offer_register.user_id = "'.$user_id.'" AND offer_register.offer_date >= "'.$firstday_subtwo.'" And offer_register.offer_date <= "'.$lastday_subtwo.'")';
					            $this->db->where($where); 
					            $offer_subtwo = $this->db->get();
					            $offer_subtwo_count = $offer_subtwo->num_rows();
					            

					            $this->db->select('sales_order_register.*');
					            $this->db->from('sales_order_register');
					            $where = '(sales_order_register.user_id = "'.$user_id.'" AND sales_order_register.sales_order_date >= "'.$firstday_subtwo.'" And sales_order_register.sales_order_date <= "'.$lastday_subtwo.'")';
					            $this->db->where($where);     
					            $sales_order_subtwo = $this->db->get();
					            $sales_order_subtwo_count = $sales_order_subtwo->num_rows();
					            //SecondLast Month End



					            //ThirdLast Month Start
					            $currmonthsubthree = date('m', strtotime('-3 month'));
					            $subthree = date("F", mktime(0, 0, 0, $currmonthsubthree));
					            $firstday_subthree = date('Y-m-01', strtotime('-3 month'));
					            $lastday_subthree = strtotime(date("Y-m-d", strtotime($firstday_subthree)) . "+1 month");
					            $lastday_subthree = date("Y-m-d",$lastday_subthree);

					            $this->db->select('enquiry_register.*');
					            $this->db->from('enquiry_register');
					            $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_date >= "'.$firstday_subthree.'" And enquiry_register.enquiry_date <= "'.$lastday_subthree.'")';
					            $this->db->where($where);     
					            $enquiry_subthree = $this->db->get();
					            $enquiry_subthree_count = $enquiry_subthree->num_rows();


					            $this->db->select('offer_register.*');
					            $this->db->from('offer_register');
					            $where = '(offer_register.user_id = "'.$user_id.'" AND offer_register.offer_date >= "'.$firstday_subthree.'" And offer_register.offer_date <= "'.$lastday_subthree.'")';
					            $this->db->where($where);     
					            $offer_subthree = $this->db->get();
					            $offer_subthree_count = $offer_subthree->num_rows();
					            

					            $this->db->select('sales_order_register.*');
					            $this->db->from('sales_order_register');
					            $where = '(sales_order_register.user_id = "'.$user_id.'" AND sales_order_register.sales_order_date >= "'.$firstday_subthree.'" And sales_order_register.sales_order_date <= "'.$lastday_subthree.'")';
					            $this->db->where($where);     
					            $sales_order_subthree = $this->db->get();
					            $sales_order_subthree_count = $sales_order_subthree->num_rows();

					            $currmonthsubfour = date('m', strtotime('-4 month'));
					            $subfour = date("F", mktime(0, 0, 0, $currmonthsubfour));
					            $firstday_subfour = date('Y-m-01', strtotime('-4 month'));
					            $lastday_subfour = strtotime(date("Y-m-d", strtotime($firstday_subfour)) . "+1 month");
					            $lastday_subfour = date("Y-m-d",$lastday_subfour);

					            $this->db->select('enquiry_register.*');
					            $this->db->from('enquiry_register');
					            $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_date >= "'.$firstday_subfour.'" And enquiry_register.enquiry_date <= "'.$lastday_subfour.'")';
					            $this->db->where($where);     
					            $enquiry_subfour = $this->db->get();
					            $enquiry_subfour_count = $enquiry_subfour->num_rows();

					            $this->db->select('offer_register.*');
					            $this->db->from('offer_register');
					            $where = '(offer_register.user_id = "'.$user_id.'" AND offer_register.offer_date >= "'.$firstday_subfour.'" And offer_register.offer_date <= "'.$lastday_subfour.'")';
					            $this->db->where($where);     
					            $offer_subfour = $this->db->get();
					            $offer_subfour_count = $offer_subfour->num_rows();
					            

					            $this->db->select('sales_order_register.*');
					            $this->db->from('sales_order_register');
					            $where = '(sales_order_register.user_id = "'.$user_id.'" AND sales_order_register.sales_order_date >= "'.$firstday_subfour.'" And sales_order_register.sales_order_date <= "'.$lastday_subfour.'")';
					            $this->db->where($where);     
					            $sales_order_subfour = $this->db->get();
					            $sales_order_subfour_count = $sales_order_subfour->num_rows();
					            //FourthLast Month End



					            //FifthLast Month Start
					            $currmonthsubfive = date('m', strtotime('-5 month'));
					            $subfive = date("F", mktime(0, 0, 0, $currmonthsubfive));
					            $firstday_subfive = date('Y-m-01', strtotime('-5 month'));
					            $lastday_subfive = strtotime(date("Y-m-d", strtotime($firstday_subfive)) . "+1 month");
					            $lastday_subfive = date("Y-m-d",$lastday_subfive);

					            $this->db->select('enquiry_register.*');
					            $this->db->from('enquiry_register');
					            $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_date >= "'.$firstday_subfive.'" And enquiry_register.enquiry_date <= "'.$lastday_subfive.'")';
					            $this->db->where($where);     
					            $enquiry_subfive = $this->db->get();
					            $enquiry_subfive_count = $enquiry_subfive->num_rows();

					            $this->db->select('offer_register.*');
					            $this->db->from('offer_register');
					            $where = '(offer_register.user_id = "'.$user_id.'" AND offer_register.offer_date >= "'.$firstday_subfive.'" And offer_register.offer_date <= "'.$lastday_subfive.'")';
					            $this->db->where($where);     
					            $offer_subfive = $this->db->get();
					            $offer_subfive_count = $offer_subfive->num_rows();
					            

					            $this->db->select('sales_order_register.*');
					            $this->db->from('sales_order_register');
					            $where = '(sales_order_register.user_id = "'.$user_id.'" AND sales_order_register.sales_order_date >= "'.$firstday_subfive.'" And sales_order_register.sales_order_date <= "'.$lastday_subfive.'")';
					            $this->db->where($where);     
					            $sales_order_subfive = $this->db->get();
					            $sales_order_subfive_count = $sales_order_subfive->num_rows();

					            //FifthLast Month End

					            //SixthLast Month Start
					            $currmonthsubsix = date('m', strtotime('-6 month'));
					            $subsix = date("F", mktime(0, 0, 0, $currmonthsubsix));
					            $firstday_subsix = date('Y-m-01', strtotime('-6 month'));
					            $lastday_subsix = strtotime(date("Y-m-d", strtotime($firstday_subsix)) . "+1 month");
					            $lastday_subsix = date("Y-m-d",$lastday_subsix);

					            $this->db->select('enquiry_register.*');
					            $this->db->from('enquiry_register');
					            $where = '(enquiry_register.enquiry_date >= "'.$firstday_subsix.'" And enquiry_register.enquiry_date <= "'.$lastday_subsix.'")';
					            $this->db->where($where);     
					            $enquiry_subsix = $this->db->get();
					            $enquiry_subsix_count = $enquiry_subsix->num_rows();

					            $this->db->select('offer_register.*');
					            $this->db->from('offer_register');
					            $where = '(offer_register.offer_date >= "'.$firstday_subsix.'" And offer_register.offer_date <= "'.$lastday_subtwo.'")';
					            $this->db->where($where);     
					            $offer_subsix = $this->db->get();
					            $offer_subsix_count = $offer_subsix->num_rows();
					            

					            $this->db->select('sales_order_register.*');
					            $this->db->from('sales_order_register');
					            $where = '(sales_order_register.sales_order_date >= "'.$firstday_subsix.'" And sales_order_register.sales_order_date <= "'.$lastday_subsix.'")';
					            $this->db->where($where);
					            $sales_order_subsix = $this->db->get();
					            $sales_order_subsix_count = $sales_order_subsix->num_rows();

					        ?>

					        <input type="hidden" id="subone" name="subone" value="<?php echo $subone?>" required>
				           	<input type="hidden" id="subtwo" name="subtwo" value="<?php echo $subtwo?>" required>
				           	<input type="hidden" id="subthree" name="subthree" value="<?php echo $subthree?>" required>
				           	<input type="hidden" id="subfour" name="subfour" value="<?php echo $subfour?>" required>
				           	<input type="hidden" id="subfive" name="subfive" value="<?php echo $subfive?>" required>
				           	<input type="hidden" id="subsix" name="subsix" value="<?php echo $subsix?>" required>


				           	<input type="hidden" id="enquiry_subone_count" name="enquiry_subone_count" value="<?php echo $enquiry_subone_count?>" required>
				           	<input type="hidden" id="offer_subone_count" name="offer_subone_count" value="<?php echo $offer_subone_count?>" required>
				           	<input type="hidden" id="sales_order_subone_count" name="sales_order_subone_count" value="<?php echo $sales_order_subone_count?>" required>


					        <input type="hidden" id="enquiry_subtwo_count" name="enquiry_subtwo_count" value="<?php echo $enquiry_subtwo_count?>" required>
					        <input type="hidden" id="offer_subtwo_count" name="offer_subtwo_count" value="<?php echo $offer_subtwo_count?>" required>
					        <input type="hidden" id="sales_order_subtwo_count" name="sales_order_subtwo_count" value="<?php echo $sales_order_subtwo_count?>" required>


           					<input type="hidden" id="enquiry_subthree_count" name="enquiry_subthree_count" value="<?php echo $enquiry_subthree_count?>" required>
           					<input type="hidden" id="offer_subthree_count" name="offer_subthree_count" value="<?php echo $offer_subthree_count?>" required>
           					<input type="hidden" id="sales_order_subthree_count" name="sales_order_subthree_count" value="<?php echo $sales_order_subthree_count?>" required>

           					<input type="hidden" id="enquiry_subfour_count" name="enquiry_subfour_count" value="<?php echo $enquiry_subfour_count?>" required>
           					<input type="hidden" id="offer_subfour_count" name="offer_subfour_count" value="<?php echo $offer_subfour_count?>" required>
           					<input type="hidden" id="sales_order_subfour_count" name="sales_order_subfour_count" value="<?php echo $sales_order_subfour_count?>" required>


           					<input type="hidden" id="enquiry_subfive_count" name="enquiry_subfive_count" value="<?php echo $enquiry_subfive_count?>" required>
           					<input type="hidden" id="offer_subfive_count" name="offer_subfive_count" value="<?php echo $offer_subfive_count?>" required>
           					<input type="hidden" id="sales_order_subfive_count" name="sales_order_subfive_count" value="<?php echo $sales_order_subfive_count?>" required>


           					<input type="hidden" id="enquiry_subsix_count" name="enquiry_subsix_count" value="<?php echo $enquiry_subsix_count?>" required>
           					<input type="hidden" id="offer_subsix_count" name="offer_subsix_count" value="<?php echo $offer_subsix_count?>" required>
           					<input type="hidden" id="sales_order_subsix_count" name="sales_order_subsix_count" value="<?php echo $sales_order_subsix_count?>" required>

           					<div class="row">
					          	<div class="col-md-12">
					        		<div class="card">
					              		<div class="card-header">
					                		<h5 class="card-title">Monthly Recap Report</h5>
					                		<div class="card-tools">
					                  			<button type="button" class="btn btn-tool" data-card-widget="collapse">
					                    			<i class="fas fa-minus"></i>
					                  			</button>
							                  	<div class="btn-group">
							                    	<button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
							                      		<i class="fas fa-wrench"></i>
							                    	</button>
								                    <div class="dropdown-menu dropdown-menu-right" role="menu">
								                      	<a href="#" class="dropdown-item">Action</a>
								                      	<a href="#" class="dropdown-item">Another action</a>
								                      	<a href="#" class="dropdown-item">Something else here</a>
								                      	<a class="dropdown-divider"></a>
								                      	<a href="#" class="dropdown-item">Separated link</a>
								                    </div>
					                  			</div>
					                  			<button type="button" class="btn btn-tool" data-card-widget="remove">
					                    			<i class="fas fa-times"></i>
					                  			</button>
					                		</div>
					             		</div>

						              	<div class="card-body">
						                	<div class="row">
						                  		<div class="col-md-12">
						                  			<!-- BAR CHART -->
										            <div class="card card-success">
										              	<div class="card-header">
										                	<h3 class="card-title">Bar Chart</h3>
										                	<div class="card-tools">
										                  		<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
										                  		</button>
										                  		<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
										                	</div>
										              	</div>
										              	<div class="card-body">
										                	<div class="chart">
										                  		<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
										            		</div>
										              	</div>
										            </div>
									          	</div>

									          	<!-- PIE CHART -->
						            			<div class="card card-danger" style="display: none;">
						              				<div class="card-header">
						                				<h3 class="card-title">Pie Chart</h3>
						                				<div class="card-tools">
						                  					<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
						                  					</button>
						                  					<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
						                				</div>
						              				</div>
						          					<div class="card-body">
						                				<canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
						             	 			</div>
						            			</div>
						            		</div>
						            	</div>

						            	<?php

						            		$this->db->select_sum('total_amount_with_gst');
							                $this->db->from('sales_order_product_relation');
							                $this->db->join('sales_order_register', 'sales_order_product_relation.sales_order_id = sales_order_register.entity_id', 'INNER');
							                $where = '(sales_order_product_relation.user_id = "'.$user_id.'" AND sales_order_register.status = "1")';
							                $this->db->where($where);
							                $query=$this->db->get();
							                $total_sales_order_amount = $query->row();
							                $total_sales_order_amount_final = $total_sales_order_amount->total_amount_with_gst;
							                $total_amount_with_gst_new_format = number_format($total_sales_order_amount_final, 3);

							                $this->db->select_sum('total_amount_with_gst');
							                $this->db->from('sales_order_product_relation');
							                $this->db->join('sales_order_register', 'sales_order_product_relation.sales_order_id = sales_order_register.entity_id', 'INNER');
							                $where = '(sales_order_product_relation.user_id = "'.$user_id.'" AND sales_order_register.status = "2" )';
							                $this->db->where($where);
							                $query=$this->db->get();
							                $total_sales_order_amount_complete = $query->row();
							                $total_sales_order_amount_final_complete = $total_sales_order_amount_complete->total_amount_with_gst;
							                $total_amount_with_gst_new_format_complete = number_format($total_sales_order_amount_final_complete, 3);


							                $this->db->select_sum('total_amount_with_gst');
							                $this->db->from('sales_order_product_relation');
							                $this->db->join('sales_order_register', 'sales_order_product_relation.sales_order_id = sales_order_register.entity_id', 'INNER');
							                $where = '(sales_order_product_relation.user_id = "'.$user_id.'" AND sales_order_register.status = "3" )';
							                $this->db->where($where);
							                $query=$this->db->get();
							                $total_sales_order_amount_lost = $query->row();
							                $total_sales_order_amount_final_lost = $total_sales_order_amount_lost->total_amount_with_gst;
							                $total_amount_with_gst_new_format_lost = number_format($total_sales_order_amount_final_lost, 3);

						            	?>

						            	<div class="card-footer">
						                	<div class="row">
						                  		<div class="col-sm-3 col-6">
						                    		<div class="description-block border-right">
						                      			<!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
						                      			<h5 class="description-header">Rs <?php  echo $total_amount_with_gst_new_format_complete; ?></h5>
						                      			<span class="description-text">Orders</span>
						                    		</div>
						                  		</div>

							                  	<div class="col-sm-3 col-6">
							                    	<div class="description-block border-right">
							                      		<!-- <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span> -->
							                      		<h5 class="description-header">Rs <?php  echo $total_amount_with_gst_new_format_lost; ?></h5>
							                      		<span class="description-text">Lost</span>
							                    	</div>
							                  	</div>

							                  	<div class="col-sm-3 col-6">
							                    	<div class="description-block border-right">
							                      		<!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span> -->
							                      		<h5 class="description-header">$24,813.53</h5>
							                      		<span class="description-text">Regretted</span>
							                    	</div>
							                  	</div>

							                  	<div class="col-sm-3 col-6">
							                    	<div class="description-block">
							                      		<!-- <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> -->
							                      		<h5 class="description-header">Rs <?php  echo $total_amount_with_gst_new_format; ?></h5>
							                      		<span class="description-text">Pending</span>
							                    	</div>
							                  	</div>
					                		</div>
					              		</div>
					            	</div>
					          	</div>
					        </div>

					        <?php

						        $this->db->select('*');
						        $this->db->from('enquiry_register');
						        $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_source = "'.'1'.'")';
						        $this->db->where($where);
						        $query = $this->db->get();
						        $enquiry_source_india_mart =  $query->num_rows();
						        $data_result['data'] = json_encode($enquiry_source_india_mart);


						        $this->db->select('*');
						        $this->db->from('enquiry_register');
						        $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_source = "'.'2'.'")';
						        $this->db->where($where);
						        $query = $this->db->get();
						        $enquiry_source_excibition =  $query->num_rows();
						        $data_result['data'] = json_encode($enquiry_source_excibition);


						        $this->db->select('*');
						        $this->db->from('enquiry_register');
						        $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_source = "'.'3'.'")';
						        $this->db->where($where);
						        $query = $this->db->get();
						        $enquiry_source_mid =  $query->num_rows();
						        $data_result['data'] = json_encode($enquiry_source_mid);


						        $this->db->select('*');
						        $this->db->from('enquiry_register');
						        $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_source = "'.'4'.'")';
						        $this->db->where($where);
						        $query = $this->db->get();
						        $enquiry_source_phone_call =  $query->num_rows();
						        $data_result['data'] = json_encode($enquiry_source_phone_call);


						        $this->db->select('*');
						        $this->db->from('enquiry_register');
						        $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_source = "'.'5'.'")';
						        $this->db->where($where);
						        $query = $this->db->get();
						        $enquiry_source_direct_mail =  $query->num_rows();
						        $data_result['data'] = json_encode($enquiry_source_direct_mail);


						        $this->db->select('*');
						        $this->db->from('enquiry_register');
						        $where = '(enquiry_register.user_id = "'.$user_id.'" AND enquiry_register.enquiry_source = "'.'6'.'")';
						        $this->db->where($where);
						        $query = $this->db->get();
						        $enquiry_source_others =  $query->num_rows();
						        $data_result['data'] = json_encode($enquiry_source_others);

					        ?>

					        <input type="hidden" id="enquiry_source_india_mart" name="enquiry_source_india_mart" value="<?php echo $enquiry_source_india_mart?>" required>

        					<input type="hidden" id="enquiry_source_excibition" name="enquiry_source_excibition" value="<?php echo $enquiry_source_excibition?>" required>

        					<input type="hidden" id="enquiry_source_mid" name="enquiry_source_mid" value="<?php echo $enquiry_source_mid?>" required>

        					<input type="hidden" id="enquiry_source_phone_call" name="enquiry_source_phone_call" value="<?php echo $enquiry_source_phone_call?>" required>

        					<input type="hidden" id="enquiry_source_direct_mail" name="enquiry_source_direct_mail" value="<?php echo $enquiry_source_direct_mail?>" required>

        					<input type="hidden" id="enquiry_source_others" name="enquiry_source_others" value="<?php echo $enquiry_source_others?>" required>

        					<div class="row">
					          	<div class="col-md-6">
					            	<div class="card">
					              		<div class="card-header">
					                		<h3 class="card-title">Enquiry Source</h3>
					                		<div class="card-tools">
					                  			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
					                  			</button>
					                  			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
					                  			</button>
					                		</div>
					              		</div>
					              		<div class="card-body">
					                		<div class="row">
					                  			<div class="col-md-12">
					                    			<!-- DONUT CHART -->
					                      			<canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
					                  			</div>
					                		</div>
					              		</div>
					              	</div>
					            </div>

					            <div class="col-md-6">
					            	<div class="card">
					              		<div class="card-header border-transparent">
					                		<h3 class="card-title">Latest Orders</h3>
					                		<div class="card-tools">
					                  			<button type="button" class="btn btn-tool" data-card-widget="collapse">
					                    			<i class="fas fa-minus"></i>
					                  			</button>
					                  			<button type="button" class="btn btn-tool" data-card-widget="remove">
					                    			<i class="fas fa-times"></i>
					                  			</button>
					                		</div>
					              		</div>

					              		<div class="card-body p-0">
					                		<div class="table-responsive">
					                  			<table class="table m-0">
					                    			<thead>
									                    <tr>
									                      	<th>Order No. </th>
									                      	<th>Order Description</th>
									                      	<!-- <th>Status</th> -->
									                      	<th>Order Date</th>
									                    </tr>
					                    			</thead>
					                    			<tbody>
						                    			<?php

						                    				$this->db->select('sales_order_register.*,
						                      				employee_master.emp_first_name');
										                    $this->db->from('sales_order_register');
										                    $where = '(sales_order_register.user_id = "'.$user_id.'" AND sales_order_register.status = "'.'2'.'" And sales_order_register.order_execution_status IS NULL)';
										                    $this->db->where($where);
										                    $this->db->join('employee_master', 'sales_order_register.order_engg_name = employee_master.entity_id', 'INNER');
										                    $this->db->order_by('sales_order_register.entity_id', 'DESC');
										                    $this->db->limit(10);
										                    $this->db->group_by('sales_order_register.entity_id');
										                    $query = $this->db->get();
										                    $query_result = $query->result();

						                        			$no = 0;
						                        			foreach ($query_result as $row):
									                            $no++;
									                            $entity_id = $row->entity_id;
									                            $offer_id = $row->offer_id;
						                            
									                            if($offer_id == Null){
									                                $offer_no = 'NA';
									                                $enquiry_no = 'NA';
									                            }else{
									                                $this->db->select('offer_register.*');
									                                $this->db->from('offer_register');
									                                $where = '(offer_register.entity_id = "'.$offer_id.'" )';
									                                $this->db->where($where);
									                                $query = $this->db->get();
									                                $offer_id_result =  $query->row_array();
									                                $offer_no = $offer_id_result['offer_no'];
									                                $enquiry_id = $offer_id_result['enquiry_id'];

									                                $this->db->select('enquiry_register.*');
									                                $this->db->from('enquiry_register');
									                                $where = '(enquiry_register.entity_id = "'.$enquiry_id.'" )';
									                                $this->db->where($where);
									                                $query = $this->db->get();
									                                $enquiry_id_result =  $query->row_array();
									                                $enquiry_no = $enquiry_id_result['enquiry_no'];
						                            			}
						                    			?>
					                    				<tr>
									                      	<td><a href="pages/examples/invoice.html"><?php echo $row->sales_order_no;?></a></td>
									                      	<td><?php echo $row->sales_order_description;?></td>
									                      	<!-- <td><span class="badge badge-success">Shipped</span></td> -->
									                      	<td>
									                        	<div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo date("d-m-Y", strtotime($row->sales_order_date));?></div>
									                      	</td>
									                    </tr>
					                   					<?php endforeach;?>
					                   				</tbody>
					                   			</table>
					                		</div>
					              		</div>
					            	</div>
					          	</div>
					        </div>
					    </div>
					</section>

					<section class="content" style="display: none;">
				      	<div class="container-fluid">
				    		<div class="row">
				          		<div class="col-md-6">
				            		<!-- AREA CHART -->
				        			<div class="card card-primary">
				              			<div class="card-header">
				                			<h3 class="card-title">Area Chart</h3>
				                			<div class="card-tools">
				                  				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				                  				</button>
				                  				<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
				                			</div>
				              			</div>
				              			<div class="card-body">
				                			<div class="chart">
				                  				<canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				                			</div>
				              			</div>
				            		</div>
				          		</div>

				          		<div class="col-md-6">
				            		<div class="card card-info">
				              			<div class="card-header">
				                			<h3 class="card-title">Line Chart</h3>
				                			<div class="card-tools">
				                  				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				                  				</button>
				                  				<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
				                			</div>
				              			</div>
				              			<div class="card-body">
				                			<div class="chart">
				                  				<canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				                			</div>
				             		 	</div>
				            		</div>
				          		</div>
				    		</div>
				      	</div>
				    </section>

					<section class="content">
      					<div class="container-fluid">
      					</div><!-- /.container-fluid -->
    				</section>
    			</div>

    		<?php $this->load->view('footer');?>
    		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			</aside>
		</div>

		<!-- jQuery -->
		<script src="<?php echo base_url().'assets/plugins/jquery/jquery.min.js'?>"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="<?php echo base_url().'assets/plugins/jquery-ui/jquery-ui.min.js'?>"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

		<script>
		  $.widget.bridge('uibutton', $.ui.button)
		</script>

		<script>
  			$(function () {
			    /* ChartJS
			     * -------
			     * Here we will create a few charts using ChartJS
			     */

			    //--------------
			    //- AREA CHART -
			    //--------------

			    // Get context with jQuery - using jQuery's .get() method.
			   	var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
			    var subone = document.getElementById('subone').value;
			    var subtwo = document.getElementById('subtwo').value;
			    var subthree = document.getElementById('subthree').value;
			    var subfour = document.getElementById('subfour').value;
			    var subfive = document.getElementById('subfive').value;
			    var subsix = document.getElementById('subsix').value;

			    var enquiry_subone_count = document.getElementById('enquiry_subone_count').value;
			    var offer_subone_count = document.getElementById('offer_subone_count').value;
			    var sales_order_subone_count = document.getElementById('sales_order_subone_count').value;

			    var enquiry_subtwo_count = document.getElementById('enquiry_subtwo_count').value;
			    var offer_subtwo_count = document.getElementById('offer_subtwo_count').value;
			    var sales_order_subtwo_count = document.getElementById('sales_order_subtwo_count').value;

			    var enquiry_subthree_count = document.getElementById('enquiry_subthree_count').value;
			    var offer_subthree_count = document.getElementById('offer_subthree_count').value;
			    var sales_order_subthree_count = document.getElementById('sales_order_subthree_count').value;

			    var enquiry_subfour_count = document.getElementById('enquiry_subfour_count').value;
			    var offer_subfour_count = document.getElementById('offer_subfour_count').value;
			    var sales_order_subfour_count = document.getElementById('sales_order_subfour_count').value;

			    var enquiry_subfive_count = document.getElementById('enquiry_subfive_count').value;
			    var offer_subfive_count = document.getElementById('offer_subfive_count').value;
			    var sales_order_subfive_count = document.getElementById('sales_order_subfive_count').value;

			    var enquiry_subsix_count = document.getElementById('enquiry_subsix_count').value;
			    var offer_subsix_count = document.getElementById('offer_subsix_count').value;
			    var sales_order_subsix_count = document.getElementById('sales_order_subsix_count').value;

			    var areaChartData = 
			    {
			      	labels  : [subone, subtwo, subthree, subfour, subfive, subsix],
			      	datasets: [
				    	{
				      		label               : 'Offer',
				      		backgroundColor     : 'rgba(60,141,188,0.9)',
				      		borderColor         : 'rgba(60,141,188,0.8)',
				      		pointRadius         :  false,
				      		pointColor          : '#3b8bba',
				      		pointStrokeColor    : 'rgba(60,141,188,1)',
				      		pointHighlightFill  : '#fff',
				      		pointHighlightStroke: 'rgba(60,141,188,1)',
				      		data                : [offer_subone_count, offer_subtwo_count, offer_subthree_count, offer_subfour_count, offer_subfive_count, offer_subsix_count]
				    	},
	        			{
				          	label               : 'Enquiry',
				          	backgroundColor     : 'rgba(210, 214, 222, 1)',
				          	borderColor         : 'rgba(210, 214, 222, 1)',
				          	pointRadius         : false,
				          	pointColor          : 'rgba(210, 214, 222, 1)',
				          	pointStrokeColor    : '#c1c7d1',
				          	pointHighlightFill  : '#fff',
				          	pointHighlightStroke: 'rgba(220,220,220,1)',
				          	data                : [enquiry_subone_count, enquiry_subtwo_count, enquiry_subthree_count, enquiry_subfour_count, enquiry_subfive_count, enquiry_subsix_count]
				        },
	        			{
				          	label               : 'Orders',
				          	backgroundColor     : 'rgba(128,0,0)',
				          	borderColor         : 'rgba(210, 214, 222, 1)',
				          	pointRadius         : false,
				          	pointColor          : 'rgba(210, 214, 222, 1)',
				          	pointStrokeColor    : '#c1c7d1',
				          	pointHighlightFill  : '#fff',
				          	pointHighlightStroke: 'rgba(220,220,220,1)',
				          	data                : [sales_order_subone_count, sales_order_subtwo_count, sales_order_subthree_count, sales_order_subfour_count, sales_order_subfive_count, sales_order_subsix_count]
				        },
      				]
    			}

    			var areaChartOptions = {
      				maintainAspectRatio : false,
      				responsive : true,
      				legend: {
        				display: false
      				},
      				scales: {
	        			xAxes: [{
	          				gridLines : {
		            			display : false,
		      				}
		        		}],
        				yAxes: [{
          					gridLines : {
            					display : false,
				          	}
				        }]
			      	}
			    }

			    //-------------
			    //- LINE CHART -
			    //--------------
			    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
			    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
			    var lineChartData = jQuery.extend(true, {}, areaChartData)
			    lineChartData.datasets[0].fill = false;
			    lineChartData.datasets[1].fill = false;
			    lineChartOptions.datasetFill = false

			    var lineChart = new Chart(lineChartCanvas, { 
			      	type: 'line',
			      	data: lineChartData, 
			      	options: lineChartOptions
			    })

			    //-------------
			    //- DONUT CHART -
			    //-------------
			    // Get context with jQuery - using jQuery's .get() method.
			    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
			    //var enquiry_source_one = $data_result.val();
			    var enquiry_source_india_mart = document.getElementById('enquiry_source_india_mart').value;
			    var enquiry_source_excibition = document.getElementById('enquiry_source_excibition').value;
			    var enquiry_source_mid = document.getElementById('enquiry_source_mid').value;
			    var enquiry_source_phone_call = document.getElementById('enquiry_source_phone_call').value;
			    var enquiry_source_direct_mail = document.getElementById('enquiry_source_direct_mail').value;
			    var enquiry_source_others = document.getElementById('enquiry_source_others').value;
    			var donutData        = {
			      	labels: [
			          	'Indiamart', 
			          	'Excibition',
			          	'MID', 
			          	'Phone Call', 
			          	'Direct Mail', 
			          	'Others', 
			      	],
				    datasets: [
				        {
				          	data: [enquiry_source_india_mart,enquiry_source_excibition,enquiry_source_mid,enquiry_source_phone_call,enquiry_source_direct_mail,enquiry_source_others],
				          	backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
				        }
      				]
   			 	}

    			var donutOptions     = {
      				maintainAspectRatio : false,
      				responsive : true,
   		 		}

			    //Create pie or douhnut chart
			    // You can switch between pie and douhnut using the method below.

			    var donutChart = new Chart(donutChartCanvas, {
			      	type: 'doughnut',
			      	data: donutData,
			      	options: donutOptions      
			    })

			    //-------------
			    //- PIE CHART -
			    //-------------
			    // Get context with jQuery - using jQuery's .get() method.
			    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
			    var pieData        = donutData;
			    var pieOptions     = {
			      	maintainAspectRatio : false,
			      	responsive : true,
			    }
			    //Create pie or douhnut chart
			    // You can switch between pie and douhnut using the method below.
			    var pieChart = new Chart(pieChartCanvas, {
			      	type: 'pie',
			      	data: pieData,
			      	options: pieOptions      
			    })

			    //-------------
			    //- BAR CHART -
			    //-------------
			    var barChartCanvas = $('#barChart').get(0).getContext('2d')
			    var barChartData = jQuery.extend(true, {}, areaChartData)
			    var temp0 = areaChartData.datasets[0]
			    var temp1 = areaChartData.datasets[1]
			    barChartData.datasets[0] = temp1
			    barChartData.datasets[1] = temp0

			    var barChartOptions = {
			      responsive              : true,
			      maintainAspectRatio     : false,
			      datasetFill             : false
			    }

			    var barChart = new Chart(barChartCanvas, {
			      	type: 'bar', 
			      	data: barChartData,
			      	options: barChartOptions
			    })

			    /*//---------------------
			    //- STACKED BAR CHART -
			    //---------------------
			    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
			    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

			    var stackedBarChartOptions = {
			      	responsive              : true,
			      	maintainAspectRatio     : false,
			      	scales: {
			        	xAxes: [{
			          		stacked: true,
			        	}],
			        	yAxes: [{
			          		stacked: true
			        	}]
			      	}
			    }

			    var stackedBarChart = new Chart(stackedBarChartCanvas, {
			      	type: 'bar', 
			      	data: stackedBarChartData,
			      	options: stackedBarChartOptions
			    })*/
  			})
		</script>

		<!-- Bootstrap 4 -->
		<script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
		<!-- ChartJS -->
		<script src="<?php echo base_url().'assets/plugins/chart.js/Chart.min.js'?>"></script>
		<!-- Sparkline -->
		<script src="<?php echo base_url().'assets/plugins/sparklines/sparkline.js'?>"></script>
		<!-- JQVMap -->
		<script src="<?php echo base_url().'assets/plugins/jqvmap/jquery.vmap.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/plugins/jqvmap/maps/jquery.vmap.usa.js'?>"></script>
		<!-- jQuery Knob Chart -->
		<script src="<?php echo base_url().'assets/plugins/jquery-knob/jquery.knob.min.js'?>"></script>
		<!-- daterangepicker -->
		<script src="<?php echo base_url().'assets/plugins/moment/moment.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="<?php echo base_url().'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'?>"></script>
		<!-- Summernote -->
		<script src="<?php echo base_url().'assets/plugins/summernote/summernote-bs4.min.js'?>"></script>
		<!-- overlayScrollbars -->
		<script src="<?php echo base_url().'assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'?>"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url().'assets/dist/js/adminlte.js'?>"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<!-- <script src="assets/dist/js/pages/dashboard.js'?>"></script> -->

		<!-- <script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script> -->
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
	</body>
</html>
