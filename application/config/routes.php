<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|   $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|   $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|       my-controller/my-method -> my_controller/my_method
*/
// $route['default_controller'] = 'welcome';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;


// Login
$route['default_controller'] = "welcome";
$route['dashboard'] = "welcome/dashboard";
$route['crop_drawing'] = "welcome/crop_drawing_page";
$route['create_new_crop_image'] = "welcome/create_new_crop_image";

// User Master URL'S
$route['vw_regestration_create'] = "master/user_master/vw_regestration_create";
$route['vw_regestration_data'] = "master/user_master/display_regestration_data";
$route['edit_user_info/:any'] = "master/user_master/edit_user_info";
$route['delete_user_info/:any'] = "master/user_master/delete_user_info";
$route['vw_view_regestration/:any'] = "master/user_master/vw_view_regestration";

//Role Master
$route['vw_role_data'] = "master/role_master";
$route['vw_role_master'] = "master/role_master/vw_role_master";
$route['edit_role_master/:any'] = "master/role_master/edit_role_master";
$route['view_role_master/:any'] = "master/role_master/view_role_master";
$route['delete_role_data/:any'] = "master/role_master/delete_role_data";

//Document Series Master
$route['vw_document_series_data'] = "master/document_series_master";
$route['vw_document_series_master'] = "master/document_series_master/vw_document_series_master";
$route['edit_document_series_master/:any'] = "master/document_series_master/edit_document_series_master";
$route['view_document_series_master/:any'] = "master/document_series_master/view_document_series_master";
$route['delete_document_series_data/:any'] = "master/document_series_master/delete_document_series_data";

//State Master
$route['vw_state_data'] = "master/state_master";
$route['vw_state_master'] = "master/state_master/vw_state_master";
$route['edit_state_master/:any'] = "master/state_master/edit_state_master";
$route['view_state_master/:any'] = "master/state_master/view_state_master";
$route['delete_state_data/:any'] = "master/state_master/delete_state_data";

//City Master
$route['vw_city_data'] = "master/city_master";
$route['vw_city_master'] = "master/city_master/vw_city_master";
$route['edit_city_master/:any'] = "master/city_master/edit_city_master";
$route['view_city_master/:any'] = "master/city_master/view_city_master";

//Company Master
$route['company_master'] = "master/company_master";
$route['create_company_master'] = "master/company_master/create_company";
$route['edit_company_master/:any'] = "master/company_master/edit_company_master";
$route['view_company_master/:any'] = "master/company_master/view_company_master";

//Vendor Master
$route['vw_vendor_data'] = "master/vendor_master";
$route['create_vendor_master'] = "master/vendor_master/create_vendor_master";
$route['edit_vendor_master/:any'] = "master/vendor_master/edit_vendor_master";
$route['view_vendor_master/:any'] = "master/vendor_master/view_vendor_master";

//Order Master
$route['vw_sales_order_data'] = "sales/sales_order_register";
$route['create_customer_sales_order'] = "sales/sales_order_register/create_customer_sales_order";
$route['setorder/:any'] = "sales/sales_order_register/offer_to_order_save";
$route['update_sales_order_data/:any'] = "sales/sales_order_register/update_sales_order_data";
$route['view_sales_order_data/:any'] = "sales/sales_order_register/view_sales_order_data";
$route['vw_all_sales_order_data'] = "sales/sales_order_register/vw_all_sales_order_data";
$route['delete_attach_order_image/:any'] = "sales/sales_order_register/delete_attach_order_image";
$route['vw_pending_sales_order_data'] = "sales/sales_order_register/pending_sales_order_for_approver";
$route['update_pending_sales_order_data/:any'] = "sales/sales_order_register/update_pending_sales_order";
$route['vw_all_rejected_sales_order_data'] = "sales/sales_order_register/rejected_sales_order";
$route['update_rejected_sales_order_data/:any'] = "sales/sales_order_register/update_rejected_sales_order";
$route['vw_approved_sales_order_data'] = "sales/sales_order_register/approved_sales_order";
$route['view_approved_sales_order_data/:any'] = "sales/sales_order_register/view_approved_sales_order";

$route['create_customer_sales_order_without_offer'] = "sales/sales_order_register/sales_order_without_offer";
$route['vw_edit_order_without_offer/:any'] = "sales/sales_order_register/edit_order_without_offer";
$route['vw_view_order_without_offer/:any'] = "sales/sales_order_register/view_order_without_offer";
$route['vw_edit_order_without_enquiry/:any'] = "sales/sales_order_register/edit_order_without_enquiry";
$route['vw_view_order_without_enquiry/:any'] = "sales/sales_order_register/view_order_without_enquiry";

$route['setorder_with_offer/:any'] = "sales/sales_order_register/setorder_with_offer";

/*$route['setorder_without_enquiry/:any'] = "sales/sales_order_register/offer_to_order_save_without_enquiry";*/

//New Order routes

$route['create_customer_order_data'] = "sales/sales_order_register/create_customer_order_record";
$route['save_order_second_session_data/:any'] = "sales/sales_order_register/save_order_second_session_data";
$route['update_order_second_session_data/:any'] = "sales/sales_order_register/update_order_second_data";

$route['update_order_second_session_data_without_enquiry/:any'] = "sales/sales_order_register/update_order_second_data_without_enquiry";

$route['update_order_second_session_data_with_enquiry/:any'] = "sales/sales_order_register/update_order_second_data_with_enquiry";

// Performa Invoice Module
$route['vw_performa_invoice_data'] = "sales/performa_invoice_register";
$route['create_performa_invoice_against_sales_order'] = "sales/performa_invoice_register/create_performa_invoice_so";
$route['create_performa_invoice_against_delivery_challan'] = "sales/performa_invoice_register/create_performa_invoice_dc";
$route['create_performa_invoice/:any'] = "sales/performa_invoice_register/order_to_performa_save";

// Invoice Module
$route['vw_invoice_data'] = "sales/invoice_register";
$route['create_invoice/:any'] = "sales/invoice_register/order_to_invoice_save";
$route['update_invoice/:any'] = "sales/invoice_register/update_invoice";
$route['view_invoice/:any'] = "sales/invoice_register/view_invoice";
$route['download_gst_invoice/:any'] = "sales/invoice_register/download_gst_invoice";
$route['create_invoice_against_delivery_challan'] = "sales/invoice_register/create_invoice_against_dc";
$route['create_invoice_against_sales_order'] = "sales/invoice_register/create_invoice_against_so";
$route['check_dc_against_sales_order/:any'] = "sales/invoice_register/check_dc_against_so_details";
$route['create_invoice_against_dc/:any'] = "sales/invoice_register/check_created_invoice_against_dc";
$route['vw_payment_receivable_data'] = "sales/invoice_register/payment_receivable_index";
$route['update_invoice_payment/:any'] = "sales/invoice_register/update_invoice_payment";
$route['view_invoice_payment/:any'] = "sales/invoice_register/view_invoice_payment";
$route['download_nongst_invoice/:any'] = "sales/invoice_register/download_nongst_invoice";

//New Invoice Module
$route['create_invoice'] = "sales/invoice_register/select_sales_order";
$route['create_stage_wise_invoice/:any'] = "sales/invoice_register/create_stage_wise_invoice";
$route['create_second_stage_invoice/:any'] = "sales/invoice_register/create_second_stage_invoice";
$route['delete_invoice_product/:any'] = "sales/invoice_register/delete_invoice_product";
$route['create_third_stage_invoice/:any'] = "sales/invoice_register/create_third_stage_invoice";
$route['back_to_invoice/:any'] = "sales/invoice_register/back_to_invoice";
$route['save_invoice_as_draft/:any'] = "sales/invoice_register/save_invoice_as_draft";

//Order Execution 
$route['vw_sales_order_execution_data'] = "factory/order_execution_master";
$route['update_order_execution/:any'] = "factory/order_execution_master/update_order_execution_data";
$route['vw_approved_sales_order_execution_data'] = "factory/order_execution_master/view_approved_sales_order_execution";

//Work Order
$route['vw_work_order_data'] = "factory/work_order_register";
$route['create_work_order'] = "factory/work_order_register/create";
$route['edit_work_order_data/:any'] = "factory/work_order_register/edit_work_order_data";
$route['update_second_category_order/:any'] = "factory/work_order_register/update_second_category_order";
$route['view_second_category_order/:any'] = "factory/work_order_register/view_second_category_order";
$route['update_first_category_order/:any'] = "factory/work_order_register/update_first_category_order";
$route['view_first_category_order/:any'] = "factory/work_order_register/view_first_category_order";
$route['vw_completed_order_data'] = "factory/work_order_register/all_completed_order_list";
$route['download_workorder/:any'] = "factory/work_order_register/download_workorder";
$route['download_tradeorder/:any'] = "factory/work_order_register/download_tradeorder";

//Enquiry Tracking 
$route['vw_tracking_entry'] = "sales/enquiry_tracking_register";
$route['create_customer_enquiry_tracking'] = "sales/enquiry_tracking_register/create";
$route['set_track_enquiry/:any'] = "sales/enquiry_tracking_register/set_track_enquiry";
$route['vw_tracking_report'] = "sales/enquiry_tracking_register/tracking_report";
$route['vw_tracking_data'] = "sales/enquiry_tracking_register/create_tracking";
$route['set_track_offer/:any'] = "sales/enquiry_tracking_register/set_track_offer";
$route['vw_tracking_data_entry'] = "sales/enquiry_tracking_register/add_tracking";


//Offer Tracking 
/*$route['vw_offer_tracking_entry'] = "sales/offer_tracking_register";
$route['create_offer_tracking'] = "sales/offer_tracking_register/create";
$route['vw_offer_tracking_report'] = "sales/offer_tracking_register/tracking_report";*/

///// New Routing Links /////
$route['vb_erp_sign_up'] = "login/login_controller/sign_up_action";
$route['vb_erp_forgot_password'] = "login/login_controller/forgot_password_action";

///// User Details
$route['vw_erp_product_user_profile'] = "master/user_master/user_index";
$route['update_user_profile/:any'] = "master/user_master/user_update";
$route['update_company_profile/:any'] = "master/user_master/user_update1";
$route['view_user_profile/:any'] = "master/user_master/vw_view_regestration";
$route['view_user_company_profile/:any'] = "master/user_master/view_user_company_profile";

//Employee Master
$route['employee_master'] = "master/employee_master";
$route['create_employee_master'] = "master/employee_master/create_employee";
$route['edit_employee_master/:any'] = "master/employee_master/edit_employee_master";
$route['view_employee_master/:any'] = "master/employee_master/view_employee_master";

//Customer Master
$route['vw_erp_product_vw_customer_master'] = "master/customer_master";
$route['create_customer_master'] = "master/customer_master/create";
$route['edit_customer_master/:any'] = "master/customer_master/edit_customer_master";
/*$route['update_customer_master/:any'] = "master/customer_master/update_customer_master";*/
$route['update_customer_master/:any'] = "master/customer_master/edit_customer_master";
$route['delete_customer/:any'] = "master/customer_master/delete_customer";
$route['view_customer_master/:any'] = "master/customer_master/view_customer_master";

//Product category Master
$route['vw_erp_product_product_category'] = "master/product_category_master";
$route['create_product_category'] = "master/product_category_master/create";
$route['edit_product_category/:any'] = "master/product_category_master/edit_product_category";
$route['delete_product_category/:any'] = "master/product_category_master/delete_product_category";
$route['view_product_category/:any'] = "master/product_category_master/view_product_category";

//Product Sub category Master
$route['create_sub_category/:any'] = "master/product_sub_category_master/create_sub_category";
$route['vw_erp_product_sub_category'] = "master/product_sub_category_master";
$route['create_product_sub_category'] = "master/product_sub_category_master/create";
$route['edit_product_sub_category/:any'] = "master/product_sub_category_master/edit_product_sub_category";
$route['delete_product_sub_category/:any'] = "master/product_sub_category_master/delete_product_sub_category";
$route['view_product_sub_category/:any'] = "master/product_sub_category_master/view_product_sub_category";

//Product Master
$route['create_product_from_sub_category/:any'] = "master/product_master/create_product_from_sub_category";
$route['vw_erp_product_master'] = "master/product_master";
$route['create_product_master'] = "master/product_master/create";
$route['edit_product_master/:any'] = "master/product_master/edit_product_master";
$route['view_product_master/:any'] = "master/product_master/view_product_master";
$route['delete_product_master/:any'] = "master/product_master/delete_product_master";

//HSN Code Master
$route['vw_erp_hsn_data'] = "master/hsn_master";
$route['vw_hsn_master'] = "master/hsn_master/vw_hsn_master";
$route['edit_hsn_master/:any'] = "master/hsn_master/edit_hsn_master";
$route['view_hsn_master/:any'] = "master/hsn_master/view_hsn_master";
$route['delete_hsn_data/:any'] = "master/hsn_master/delete_hsn_data";

//Service Master
$route['vw_service_master'] = "master/service_master";
$route['create_service'] = "master/service_master/create";
$route['edit_service_master/:any'] = "master/service_master/edit_service_master";
$route['view_service_master/:any'] = "master/service_master/view_service_master";
$route['delete_service_master/:any'] = "master/service_master/delete_service";


//Enquiry Master
$route['vw_enquiry_data'] = "sales/enquiry_register";
$route['create_customer_enquiry'] = "sales/enquiry_register/create";
$route['update_enquiry_data/:any'] = "sales/enquiry_register/update_enquiry_data";
$route['view_enquiry_data/:any'] = "sales/enquiry_register/view_enquiry_data";
$route['delete_enquiry_data/:any'] = "sales/enquiry_register/delete_enquiry_data";
$route['vw_all_enquiry_data'] = "sales/enquiry_register/vw_all_enquiry_data";
$route['delete_enquiry_attach_image/:any'] = "sales/enquiry_register/delete_enquiry_attach_image";

//Offer Master
$route['vw_offer_data'] = "sales/offer_register";
$route['create_customer_offer'] = "sales/offer_register/create_customer_offer";
$route['setoffer/:any'] = "sales/offer_register/enquiry_to_offer_save";
$route['update_offer_data/:any'] = "sales/offer_register/update_offer_data";
$route['view_offer_data/:any'] = "sales/offer_register/view_offer_data";
$route['download_offer/:any'] = "sales/offer_register/download_offer";
$route['download_nongst_offer/:any'] = "sales/offer_register/download_nongst_offer";
$route['set_revision_offer/:any'] = "sales/offer_register/set_revision_offer_save";
$route['vw_all_offer_data'] = "sales/offer_register/vw_all_offer_data";
$route['delete_attach_image/:any'] = "sales/offer_register/delete_attach_image";
$route['vw_offer_without_enquiry_data'] = "sales/offer_register/offer_without_enquiry";
$route['create_customer_offer_without_enquiry'] = "sales/offer_register/create_offer_without_enquiry";
$route['vw_edit_offer_without_enquiry/:any'] = "sales/offer_register/edit_offer_without_enquiry";
$route['vw_view_offer_without_enquiry/:any'] = "sales/offer_register/view_offer_without_enquiry";

//New Offer routes

$route['create_customer_offer_data'] = "sales/offer_register/create_customer_offer_record";
$route['save_offer_second_session_data/:any'] = "sales/offer_register/save_offer_second_session_data";
$route['update_offer_second_session_data/:any'] = "sales/offer_register/update_offer_second_data";
$route['set_offer_from_enquiry/:any'] = "sales/offer_register/set_offer_from_enquiry";
$route['update_offer_data_with_enquiry_session_data/:any'] = "sales/offer_register/update_offer_data_with_enquiry_session_data";
$route['update_offer_second_session_data_with_enquiry/:any'] = "sales/offer_register/update_offer_second_session_data_with_enquiry";
$route['update_offer_second_session_data_second_page/:any'] = "sales/offer_register/update_offer_second_data_with_enquiry";
$route['update_offer_data_without_enquiry_session_data/:any'] = "sales/offer_register/update_offer_data_without_enquiry_session_data";
$route['update_offer_second_session_data_without_enquiry/:any'] = "sales/offer_register/update_offer_second_session_data_without_enquiry";
$route['update_offer_second_session_data_second_page_without_enquiry/:any'] = "sales/offer_register/update_offer_second_session_data_second_page_without_enquiry_data";


//Payment Term Master
$route['vw_payment_term_master'] = "master/payment_term_master";
$route['create_payment_term'] = "master/payment_term_master/create_payment_term";
$route['edit_payment_term/:any'] = "master/payment_term_master/edit_payment_term";
$route['view_payment_term/:any'] = "master/payment_term_master/view_payment_term";
$route['delete_payment_term/:any'] = "master/payment_term_master/delete_payment_term";

//GRN Master
$route['vw_erp_product_grn_master'] = "store/grn_master";
$route['create_goods_receipt_note'] = "store/grn_master/create_grn";
$route['edit_goods_receipt_note/:any'] = "store/grn_master/edit_goods_receipt_note";
$route['view_goods_receipt_note/:any'] = "store/grn_master/view_goods_receipt_note";
$route['download_grn/:any'] = "store/grn_master/download_grn";
$route['download_nongst_grn/:any'] = "store/grn_master/download_nongst_grn";

//Delivery Challan
$route['vw_erp_delivery_challan'] = "store/delivery_challan_master";
$route['create_delivery_challan'] = "store/delivery_challan_master/create_dc";
$route['vw_edit_delivery_challan/:any'] = "store/delivery_challan_master/edit_delivery_challan";
$route['view_delivery_challan/:any'] = "store/delivery_challan_master/view_delivery_challan";
$route['download_delivery_challan/:any'] = "store/delivery_challan_master/download_delivery_challan";

// New Delivery Challan

$route['create_new_delivery_challan'] = "store/delivery_challan_master/create_dc_against_so";
$route['create_stage_wise_dc/:any'] = "store/delivery_challan_master/create_stage_wise_dc";
$route['create_second_stage_dc/:any'] = "store/delivery_challan_master/create_second_stage_dc";
$route['create_third_stage_dc/:any'] = "store/delivery_challan_master/create_third_stage_dc";
$route['delete_dc_product/:any'] = "store/delivery_challan_master/delete_dc_product";

//Location Master
$route['vw_location_master'] = "master/location_master";
$route['create_location'] = "master/location_master/create_location";
$route['edit_location_master/:any'] = "master/location_master/edit_location_master";
$route['view_location_master/:any'] = "master/location_master/view_location_master";
$route['delete_location_master/:any'] = "master/location_master/delete_location";

//Report Master
$route['vw_inventory_report_data'] = "report/report_controller/all_stock_report";
$route['vw_inventory_report_sheet'] = "report/report_controller/all_sheet_wise_stock_report";
$route['vw_sales_register_report'] = "report/report_controller/vw_sales_register_report_create";
$route['vw_pending_order_report'] = "report/report_controller/vw_pending_order_report_create";
$route['vw_enquiry_tracking_report'] = "report/report_controller/vw_enquiry_tracking_report_create";
$route['vw_enquiry_summary_report'] = "report/report_controller/vw_enquiry_summary_report_create";
$route['vw_enquiry_detail_report'] = "report/report_controller/vw_enquiry_detail_report_create";
$route['vw_offer_summary_report'] = "report/report_controller/vw_offer_summary_report_create";
$route['vw_offer_detail_report'] = "report/report_controller/vw_offer_detail_report_create";
$route['vw_sales_summary_report'] = "report/report_controller/vw_sales_summary_report_create";
$route['vw_sales_detail_report'] = "report/report_controller/vw_sales_detail_report_create";
$route['vw_purchase_register_report'] = "report/report_controller/vw_purchase_register_report_create";
$route['vw_collection_report'] = "report/report_controller/vw_collection_report_create";
$route['vw_expense_summary_report'] = "report/report_controller/vw_expense_summary_report_create";
$route['vw_expense_detail_report'] = "report/report_controller/vw_expense_detail_report_create";
$route['vw_order_detail_report'] = "report/report_controller/vw_order_detail_report_create";
$route['vw_invoice_register_report'] = "report/report_controller/vw_invoice_register_report_create";
$route['vw_pending_order_report'] = "report/report_controller/vw_pending_order_report_check";

$route['vw_inventory_detail_report'] = "report/report_controller/vw_inventory_detail_report_create";
$route['vw_tracking_detail_report'] = "report/report_controller/vw_tracking_detail_report_create";


//Bill Passing
$route['vw_erp_bill_passing_master'] = "store/bill_passing_master";
$route['create_bill_passing'] = "store/bill_passing_master/create_bill_passing";
$route['vw_edit_bill_passing/:any'] = "store/bill_passing_master/edit_bill_passing";
$route['view_bill_passing/:any'] = "store/bill_passing_master/view_bill_passing";
$route['create_bill_passing_without_grn'] = "store/bill_passing_master/create_bill_passing_without_grn";
$route['vw_bill_passing_view/:any'] = "store/bill_passing_master/vw_bill_passing_view";
$route['view_bill_passing_without_grn/:any'] = "store/bill_passing_master/view_bill_passing_without_grn";

//Collect Payment
$route['vw_collect_payment_index'] = "sales/collect_payment_master";
$route['create_collect_payment'] = "sales/collect_payment_master/create_collect_payment";
$route['vw_view_collect_payment/:any'] = "sales/collect_payment_master/view_collect_payment";

//Payment Payable
$route['vw_payment_payable_index'] = "sales/payment_payable_master";
$route['create_payment_payable'] = "sales/payment_payable_master/create_payment_payable";
$route['vw_view_payment_payable/:any'] = "sales/payment_payable_master/view_payment_payable";

//Account Master
$route['vw_account_data'] = "master/account_master";
$route['vw_account_master_create'] = "master/account_master/vw_account_master_create";
$route['edit_account_master/:any'] = "master/account_master/edit_account_master";
$route['view_account_master/:any'] = "master/account_master/view_account_master";
// $route['delete_role_data/:any'] = "master/role_master/delete_role_data";


//Expense Entry
$route['vw_expense_entry_data'] = "sales/expense_entry";
$route['vw_expense_entry_create'] = "sales/expense_entry/vw_expense_entry_create";
// $route['edit_account_master/:any'] = "master/account_master/edit_account_master";
$route['view_expense_entry/:any'] = "sales/expense_entry/view_expense_entry";
// $route['delete_role_data/:any'] = "master/role_master/delete_role_data";


//Role Management Master
$route['vw_role_management_data'] = "master/role_management";
$route['vw_role_management_create'] = "master/role_management/vw_role_management_create";
$route['edit_role_management/:any'] = "master/role_management/edit_role_management";
$route['view_role_management/:any'] = "master/role_management/view_role_management";
// $route['delete_role_data/:any'] = "master/role_master/delete_role_data";



//Role Management Master
$route['vw_enquiry_customisation_data'] = "admin/customisation/enquiry_customisation";
$route['create_enquiry_customisation'] = "admin/customisation/vw_enquiry_customisation_create";


$route['404_override'] = '';
