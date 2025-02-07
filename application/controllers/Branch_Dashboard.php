<?php

defined('BASEPATH') or exit('no direct access allowed');

require FCPATH.'vendor/autoload.php';

class Branch_Dashboard extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        if (sessionId('id') == "") {

            redirect(base_url('admin'));
        }

        date_default_timezone_set("Asia/Kolkata");
    }

public function index($id)
{
    $data['title'] = "Home";
    $tid = decryptId($id);
    
    // Fetch user and entity counts
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
    $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
    $data['u'] = $this->CommonModal->getRowById('users', 'id',  $uid[0]['user_id']);
    $data['stock_place'] = $this->CommonModal->getNumWhereRows('stock_place', 'user_id', $uid[0]['user_id']);
    $data['product'] = $this->CommonModal->getNumWhereRows('product', 'user_id', $uid[0]['user_id']);
    $data['return_purchase'] = $this->CommonModal->getNumWhereRows('return_purchase','user_id', $uid[0]['user_id']);
    $data['invoice'] = $this->CommonModal->getNumWhereRows('invoice','user_id',$uid[0]['user_id']);
    $data['customer'] = $this->CommonModal->getNumWhereRows('customer','user_id', $uid[0]['user_id']);
    $data['vender'] = $this->CommonModal->getNumWhereRows('vender', 'user_id', $uid[0]['user_id']);
    $data['account'] = $this->CommonModal->getNumWhereRows('account', 'user_id', $uid[0]['user_id']);
    
    
      // Fetch data using the model methods
    $data['stock'] = $this->CommonModal->getLowStockItems(40,$uid[0]['user_id']);
    $data['purchase_payment'] = $this->CommonModal->getPurchasePayments($uid[0]['user_id']);
    $data['return_purchase'] = $this->CommonModal->getReturnPurchasePayments($uid[0]['user_id']);
    $data['invoice_payment'] = $this->CommonModal->getInvoicePayments($uid[0]['user_id']);
    $data['return_invoice_payment'] = $this->CommonModal->getReturnInvoicePayments($uid[0]['user_id']);
    $data['view_invoice'] = $this->CommonModal->getInvoices($uid[0]['user_id']);
    $data['s_place'] = $this->CommonModal->getStockPlaces($uid[0]['user_id']);
    $data['product_list'] = $this->CommonModal->getProductList($uid[0]['user_id']);

   $data['top_selling_products'] = $this->CommonModal->getTopSellingProducts($uid[0]['user_id']);

    $data['expired_products'] = $this->CommonModal->getExpiredProducts($uid[0]['user_id']);

    $this->load->view('branch/dashboard', $data);
}



    public function sub_admin($id)
    {

        $data['title'] = "Your Profile";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        // $data['testimonials'] = $this->CommonModal->getAllRows('testimonial');

        $this->load->view('branch/sub_admin_profile', $data);
    }

    public function update_sub_admin($id)
    {
        $data['title'] = 'Update';
        $data['tag'] = 'sub_admin';
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $image_url = $post['image'];
            if ($_FILES['image']['name'] != '') {

                $img = imageUpload('image', 'uploads/users/');

                $post['image'] = $img;

                if ($image_url != "") {

                    unlink('uploads/users/' . $image_url);
                }
            }

            $category_id = $this->CommonModal->updateRowById('branch', 'id', $tid, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/sub_admin/' . encryptId($tid)));
        } else {

            $this->load->view('branch/sub_admin_profile', $data);
        }
    }

    
    public function vender($id)
    {
        $data['title'] = "Our Vendors";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        // Fetch all vendors
        // $data['vender'] = $this->CommonModal->getAllRowsInOrder('vender', 'id', 'DESC');
        $data['vender'] = $this->CommonModal->getRowByIdDesc('vender', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        if ($ID) {
            $id = decryptId($id);
            $this->CommonModal->deleteRowById('vender', array('id' => $ID));
            redirect(base_url('Branch_Dashboard/vender/' . encryptId($id)));
        }
        // Load the view
        $this->load->view('branch/view_vender', $data);
    }


    public function add_vender($id,$add)
    {

        $data['title'] = "Add Vender ";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();

            // $post['image'] = imageUpload('image', 'uploads/users/');

            $savedata = $this->CommonModal->insertRowReturnId('vender', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Add Successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Add Successfully</div>');
            }
if($add){
         redirect(base_url('Branch_Dashboard/add_product/'.$id));
}else {
            redirect(base_url('Branch_Dashboard/vender/' . $id));
}
        } else {

            $this->load->view('branch/add_vender', $data);
        }
    }
    public function edit_vender()
    {
        $data['title'] = 'Update Vender';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['vender'] = $this->CommonModal->getRowById('vender', 'id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];
            $uid = $post['user_id'];
            $category_id = $this->CommonModal->updateRowById('vender', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/vender/' . encryptId($uid)));
        } else {

            $this->load->view('branch/edit_vender', $data);
        }
    }

    public function product($id)
    { 
            $data['title'] = "Our Product";
            // Get Vendor ID from the URL query string
            $tid = decryptId($id);
            $ID = $this->input->get('id');
             $purchaseCode = $this->input->get('purchase_code');  
    
            // Decrypt user ID
            $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
            $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
               $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
            // Fetch all vendors
            $data['product'] = $this->CommonModal->getRowsWithStatusesOrderedbyId(
                'purchase_product',   // Table name
                'status',             // Column to filter on
                ['0', '1'],           // Status values
                'p_id',               // Order by column
                'DESC',               // Order direction
                'branch_id',          // Branch column
                $tid,                 // Branch ID
                'user_id',            // User column
                $uid[0]['user_id']    // User ID
            );
            
            

           if ($purchaseCode) {
            $deleteResult = $this->CommonModal->deleteRowByuserId('purchase_product', array('purchase_code' => $purchaseCode), array('user_id' => $uid[0]['user_id']));
            $this->CommonModal->deleteRowByuserId('purchase_payment', array('purchase_code' => $purchaseCode), array('user_id' => $uid[0]['user_id']));
        if ($deleteResult) {
            $this->session->set_userdata('msg', '<div class="alert alert-success">Product deleted successfully.</div>');
        } else {
            $this->session->set_userdata('msg', '<div class="alert alert-danger">Error deleting the product.</div>');
        }
        redirect(base_url('Branch_Dashboard/product/' . encryptId($tid)));  // Redirect after deletion
    }

            // Load the view
            $this->db->select('id, vender_name');
            $this->db->from('vender');
             $this->db->where('user_id', $uid[0]['user_id']);
            $data['vender'] = $this->db->get()->result_array();

            $this->db->select('id, product_name');
            $this->db->from('product');
             $this->db->where('user_id', $uid[0]['user_id']);
            $data['product_list'] = $this->db->get()->result_array();
       $data['purchase_payment'] = $this->CommonModal->getAllRowsInOrder('purchase_payment', 'id', 'DESC');

            $this->load->view('branch/view_product', $data);
        
    }
 public function generate_purchase_code($uid) {
        $last_invoice = $this->CommonModal->getLastRow('purchase_product', 'purchase_code','user_id',$uid); // Replace with your actual method to get the last invoice number
        if ($last_invoice) {
            // Increment the last invoice number
            return $last_invoice['purchase_code'] + 1;
        } else {
            // Start from 1 if no invoices exist
            return 1;
        }
    }
     public function generate_return_code($uid) {
        $last_invoice = $this->CommonModal->getLastRow('return_purchase', 'return_code','user_id',$uid); // Replace with your actual method to get the last invoice number
        if ($last_invoice) {
            // Increment the last invoice number
            return $last_invoice['return_code'] + 1;
        } else {
            // Start from 1 if no invoices exist
            return 1;
        }
    }
 public function add_product($id)
{
    $data['title'] = "Add Product";
    $data['tag'] = "add";
    $tid = decryptId($id);
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
             $data['u'] = $this->CommonModal->getRowById('users', 'id',$uid[0]['user_id']);
    $data['product'] = $this->CommonModal->getRowByIdDesc('product','user_id',$uid[0]['user_id'], 'id', 'DESC');
    $data['vender'] = $this->CommonModal->getRowByIdDesc('vender','user_id',$uid[0]['user_id'], 'id', 'DESC');
    $data['stock'] = $this->CommonModal->getRowByIdDesc('stock_place','user_id',$uid[0]['user_id'], 'id', 'DESC');
    $data['account'] = $this->CommonModal->getRowByIdDesc('account','user_id',$uid[0]['user_id'], 'id', 'DESC');
    if ($this->input->post()) {
        $post = $this->input->post();

        // Gather form data
        $vender_id = $post['vender_name'];
        $stock_place_name = $post['stock_place_name'];
             $user_id = $post['uid'];
        $date = $post['purchase_date'];
        $discount_type = $post['discount_type'];
        
        $discount_value = floatval($post['discount_value']);
        $total_quantity = floatval($post['total_quantity']);
         $sub_total = floatval($post['sub_total']);
         $grand_total = floatval($post['grand_total']);
         $discount_amountt = "";
        
         if($post['discount_type'] == 'rupee'){
             $discount_amountt = $post['discount_value'];
         } else{ 
             $discount_am = $post['sub_total'] * $post['discount_value'];
             $discount_amountt = $discount_am/100;
         }
        $paid = floatval($post['paid']);
        $mode = $post['mode'];
        $bank = floatval($post['bank']);
        $due = $grand_total - $paid;
        $purchase_code = $this->generate_purchase_code($uid[0]['user_id']); 
        // Prepare product arrays
        $product_names = $post['p_name'] ?? [];
        $packings = $post['packing'] ?? [];
        $quantities = $post['quantity'] ?? [];
        $unit_rates = $post['unit_rate'] ?? [];
        $units = $post['unit'] ?? [];
        $exp_dates = $post['exp_date'] ?? [];
        $HSN_code = $post['HSN_code'];
        $p_prices = $post['p_price'] ?? [];
        $mrps = $post['mrp'] ?? [];
        $selling_prices = $post['selling_price'] ?? [];
        $gst_percentages = $post['tax'] ?? [];
         $tax_type = $post['tax_type'] ?? [];
        $gst_amounts = $post['tax_amount'] ?? [];
        $total_prices = $post['total_price'] ?? [];
       
        // Insert invoice items
        foreach ($product_names as $index => $product_name) {
            // Prepare data for each row
            $data_to_insert = [
                'vender_name' => $vender_id,
                'date' => $date,
                'user_id' => $user_id,
                'branch_id' => $tid,
                'purchase_code' => $purchase_code,
                'stock_place_name' => $stock_place_name,
                'product_name' => $product_name,
                'packing' => $packings[$index],
                'quantity' => $quantities[$index],
                'availabile_quantity' => $quantities[$index],
                'unit_rate' => $unit_rates[$index],
                'unit' => $units[$index],
                'gst_percent' => $gst_percentages[$index],
                'gst_tax' => $gst_amounts[$index],
                'tax_type' => $tax_type[$index],
                'exp_date' => $exp_dates[$index],
                'HSN_code' => $HSN_code[$index],
                'p_price' => $p_prices[$index],
                'mrp' => $mrps[$index],
                'selling_price' => $selling_prices[$index],
                'total_price' => $total_prices[$index],
                'grand_total' => $grand_total,
                'discount_value' => $discount_value,
                'discount_type' => $discount_type,
                'discount_amount' => $discount_amountt,
                'total_quantity' => $total_quantity,
                'sub_total' => $sub_total,
            ];

            // Insert data into the purchase_product table
            $savedata = $this->CommonModal->insertRowReturnId('purchase_product', $data_to_insert);

            if (!$savedata) {
                // Handle insert error
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding invoice item.</div>');
                redirect(base_url('Branch_Dashboard/product/' . $id));
                return;
            }
        }

        // Insert payment data if paid amount is provided
        if ($paid >= 0) {
            $pay_to_insert = [
                'vender_id' => $vender_id,
                'user_id' => $user_id,
                'branch_id' => $tid,
                'purchase_code' => $purchase_code,
                'paid' => $paid,
                'mode' => $mode,
                'total' => $grand_total,
                'due' => $due,
                'bank' => $bank,
            ];

            $savedata1 = $this->CommonModal->insertRowReturnId('purchase_payment', $pay_to_insert);

            if (!$savedata1) {
                // Handle insert error
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding payment information.</div>');
                redirect(base_url('Branch_Dashboard/product/' . $id));
                return;
            }
        }

        // Success message and redirection
        $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
        redirect(base_url('Branch_Dashboard/print_purchase/' . $id . '/' . $purchase_code));
    } else {

        $data['product_list'] = $this->CommonModal->getRowById('product','user_id',$uid[0]['user_id'], 'id', 'DESC');
        $this->load->view('branch/add_product', $data);
    }
}

    public function print_purchase($id, $purchase_code)
    {
        $data['title'] = "Purchase Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        
 
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['user_main'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);

        
        $data['purchase_product'] = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $purchase_code,'branch_id',$tid,'user_id',$uid[0]['user_id']);
        
        // Load the view
        $this->load->view('branch/purchase_invoice', $data);
    }

 public function edit_product()
    {
        $data['title'] = "Edit Product";
        $data['tag'] = "edit";
        $tid = $this->input->get('user_id'); // User ID
        $purchase_code = $this->input->get('purchase_code'); 
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
          $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
             $data['u'] = $this->CommonModal->getRowById('users', 'id',$uid[0]['user_id']);
    $data['product'] = $this->CommonModal->getRowByIdDesc('product','user_id',$uid[0]['user_id'], 'id', 'DESC');
    $data['vender'] = $this->CommonModal->getRowByIdDesc('vender','user_id',$uid[0]['user_id'], 'id', 'DESC');
    $data['stock'] = $this->CommonModal->getRowByIdDesc('stock_place','user_id',$uid[0]['user_id'], 'id', 'DESC');
    $data['account'] = $this->CommonModal->getRowByIdDesc('account','user_id',$uid[0]['user_id'], 'id', 'DESC');
  
        $data['product'] = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $purchase_code,'branch_id',$tid,'user_id',$uid[0]['user_id']);
        if (count($_POST) > 0) {
            $post = $this->input->post();
    
            // Gather form data
            $vender_id = $post['vender_name'];
            $stock_place_name = $post['stock_place_name'];
            $user_id = $post['uid'];
            $date = $post['purchase_date'];
            $discount_type = $post['discount_type'];
            
            $discount_value = floatval($post['discount_value']);
            $total_quantity = floatval($post['total_quantity']);
             $sub_total = floatval($post['sub_total']);
             $grand_total = floatval($post['grand_total']);
            $paid = floatval($post['paid']);
            $mode = $post['mode'];
             $ppid = $post['p_p_id'];
            $bank = floatval($post['bank']);
            $due = $grand_total - $paid;
            $discount_amountt = "";
        
            if($post['discount_type'] == 'rupee'){
                $discount_amountt = $post['discount_value'];
            } else{ 
                $discount_am = $post['sub_total'] * $post['discount_value'];
                $discount_amountt = $discount_am/100;
            }
            // Prepare product arrays
            $product_names = $post['p_name'] ?? [];
             $product_ids = $post['p_id'] ?? [];
            $packings = $post['packing'] ?? [];
            $quantities = $post['quantity'] ?? [];
            $unit_rates = $post['unit_rate'] ?? [];
            $units = $post['unit'] ?? [];
            $exp_dates = $post['exp_date'] ?? [];
            $HSN_code = $post['HSN_code'];
            $p_prices = $post['p_price'] ?? [];
            $mrps = $post['mrp'] ?? [];
            $selling_prices = $post['selling_price'] ?? [];
            $gst_percentages = $post['tax'] ?? [];
            $gst_amounts = $post['tax_amount'] ?? [];
            $total_prices = $post['total_price'] ?? [];
           
            // Insert invoice items
            foreach ($product_names as $index => $product_name) {
                // Prepare data for each row
                $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
            
                if (!empty($select)) {
                    $sellingquantity = $select[0]['selling_quantity'];
                     $returnquantity = $select[0]['return_quantity'];
                     $transferquantity = $select[0]['transfer_quantity'];
                     $totalsr=$sellingquantity + $returnquantity+$transferquantity;
    // $new_available_quantity = $quantities[$index] 
                    // Adjust available and selling quantities based on the new quantity
                    if ($quantities[$index] > $totalsr) {
                       
                        $new_available_quantity = $quantities[$index] - $totalsr;
                    } elseif ($quantities[$index] <  $totalsr) {
                       $new_available_quantity = $totalsr - $quantities[$index] ;
                    }else{
                         $new_available_quantity =$quantities[$index];
                    }
    
                    
                    
                 } else {
                    // Handle case where product data is missing
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Product data missing.</div>');
                    redirect(base_url('admin_Dashboard/invoice/' . encryptId($tid)));
                    return;
                }
                $data_to_insert = [
                    'vender_name' => $vender_id,
                    'date' => $date,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                 
                    'stock_place_name' => $stock_place_name,
                    'product_name' => $product_name,
                     
                    'packing' => $packings[$index],
                    'quantity' => $quantities[$index],
                    'availabile_quantity' => $new_available_quantity,
                    'unit_rate' => $unit_rates[$index],
                    'unit' => $units[$index],
                    'gst_percent' => $gst_percentages[$index],
                    'gst_tax' => $gst_amounts[$index],
                    'exp_date' => $exp_dates[$index],
                    'HSN_code' => $HSN_code[$index],
                     'p_price' => $p_prices[$index],
                    'mrp' => $mrps[$index],
                    'selling_price' => $selling_prices[$index],
                    'total_price' => $total_prices[$index],
                    'grand_total' => $grand_total,
                    'discount_value' => $discount_value,
                    'discount_type' => $discount_type,
                    'discount_amount' => $discount_amountt,
                    'total_quantity' => $total_quantity,
                  
                    'sub_total' => $sub_total,
                ];
    
                // Insert data into the purchase_product table
                $savedata = $this->CommonModal->updateRowById('purchase_product','p_id', $product_ids[$index] , $data_to_insert);
    
                if (!$savedata) {
                    // Handle insert error
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding invoice item.</div>');
                    redirect(base_url('Branch_Dashboard/product/' . encryptId($tid)));
                    return;
                }
            }
    
            // Insert payment data if paid amount is provided
            if ($paid >= 0) {
                $pay_to_insert = [
                    'vender_id' => $vender_id,
                    'user_id' => $user_id,
                'branch_id' => $tid,
                  
                    'paid' => $paid,
                    'mode' => $mode,
                    'total' => $grand_total,
                    'due' => $due,
                    'bank' => $bank,
                ];
    
                $savedata1 = $this->CommonModal->updateRowById('purchase_payment','id',  $ppid, $pay_to_insert);
     if ($savedata1) {
    // Get all rows after the given ID for the same invoice
    $rows_after_id = $this->CommonModal->getRowsAfterId('purchase_payment', 'id', $ppid,'purchase_code', $purchase_code);

    if ($rows_after_id) {
        foreach ($rows_after_id as $row) {
            // Fetch the row just before the current row for recalculating due
            
            $rows_before_id = $this->CommonModal->getRowsBeforeId('purchase_payment', 'id', $row['id'], 'purchase_code', $purchase_code);

            // Ensure that there is a previous row to calculate the due amount
            $previous_due = $rows_before_id ? $rows_before_id[0]['due'] : $final;

            // Calculate the new due amount
            $due2 = $previous_due - $row['paid'];

            $latest_data = [
                    'vender_id' => $vender_id,
                    'user_id' => $user_id,
                'branch_id' => $tid,
                  
                    'paid' => $row['paid'],
                    'mode' => $row['mode'],
                    'total' => $grand_total,
                    'due' => $due2,
                    'bank' => $row['bank'],
                ];

            // Update each row with the recalculated due
            $this->CommonModal->updateRowById('purchase_payment', 'id', $row['id'], $latest_data);
        }
    }
} 
else {
                    // Handle insert error
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding payment information.</div>');
                    redirect(base_url('Branch_Dashboard/product/' . encryptId($tid)));
                    return;
                }
            }
    
            // Success message and redirection
            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
            redirect(base_url('Branch_Dashboard/print_purchase/' . encryptId($tid) . '/' . $purchase_code));
        } else {
    
            $data['product_list'] = $this->CommonModal->getAllRows('product');
            $this->load->view('branch/edit_product', $data);
      }
}

    public function delete_product()
    {
        // $tid = decryptId($id);
        // $data['user'] = $this->CommonModal->getRowById('branch','id',$tid);
        $BdID = $this->input->get('BdID');

        if ($this->CommonModal->deleteRowById('purchase_product', array('p_id' => $BdID))) {

            $this->session->set_flashdata('msg', 'Deleted successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Deletion failed. Please try again!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }

        $referrer = $this->input->server('HTTP_REFERER');
        redirect($referrer);
    }

    public function product_name($id)
    {
        $data['title'] = "Our Products Name";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        // Fetch all vendors
        // $data['product_name'] = $this->CommonModal->getAllRowsInOrder('product', 'id', 'DESC');
        $data['product_name'] = $this->CommonModal->getRowByIdDesc('product', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        if ($ID) {
            $id = decryptId($id);
            $this->CommonModal->deleteRowById('product', array('id' => $ID));
            redirect(base_url('Branch_Dashboard/product_name/' . encryptId($id)));
        }
        // Load the view
        $this->load->view('branch/product_name', $data);
    }
   public function add_product_name($id, $add)
{
    $data['title'] = "Add Product Name";
    $data['tag'] = "add";
    $tid = decryptId($id);
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

    if (count($_POST) > 0) {
        $post = $this->input->post();

        // Check if product name already exists
        $existingProduct = $this->CommonModal->getRowByCondition('product', ['product_name' => $post['product_name']]);

        if ($existingProduct) {
            // If product name already exists, show error message and redirect
            $this->session->set_userdata('msg', '<div class="alert alert-danger">Product Name already exists!</div>');
            redirect(current_url());  // Redirect back to the same page
        } else {
            // Proceed to save the product if no duplicate is found
            $savedata = $this->CommonModal->insertRowReturnId('product', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Product Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Failed to Add Product</div>');
            }

            // Redirect based on $add flag
            if ($add) {
                redirect(base_url('Branch_Dashboard/add_product/'.$id));
            } else {
                redirect(base_url('Branch_Dashboard/product_name/' . $id));
            }
        }
    } else {
        $this->load->view('branch/add_product_name', $data);
    }
}

    public function check_product_name()
{
    // Get the JSON data from the request body
    $input = json_decode(file_get_contents('php://input'), true);

    // Get the product name
    $productName = $input['product_name'];

    // Check if the product name already exists in the database
    $existingProduct = $this->CommonModal->getRowByCondition('product', ['product_name' => $productName]);

    // Return response as JSON
    if ($existingProduct) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}

    public function edit_product_name()
    {
        $data['title'] = 'Update Product Name';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['product_name'] = $this->CommonModal->getRowById('product', 'id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];
            $uid = $post['user_id'];
            $bid = $post['branch_id'];

            $category_id = $this->CommonModal->updateRowById('product', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/product_name/'. encryptId($bid)));
        } else {

            $this->load->view('branch/edit_product_name', $data);
        }
    }
  public function stock($id)
{
    $data['title'] = "Our Stock";
    $tid = decryptId($id);
    $ID = $this->input->get('id');
    
    // Decrypt user ID
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
    
    // Fetch all products
    $data['product'] = $this->CommonModal->getAllRowsInOrder('product', 'id', 'DESC');

    // Get POST data for filtering
    $stock_place_id = $this->input->post('stock_place_id');
    $product_id = $this->input->post('product_id');

    // Handle deletion if ID is provided
    if ($ID) {
        $id = decryptId($id);
        $this->CommonModal->deleteRowById('stock', ['s_id' => $ID]);
        redirect(base_url('Branch_Dashboard/stock/' . encryptId($id)));
    }

    // Initialize stock data
    if ($stock_place_id && $product_id) {
        // Fetch stock data based on both stock place and product
        $data['stock'] = $this->CommonModal->getStockByPlaceAndProduct($stock_place_id, $product_id);
    } elseif ($stock_place_id) {
        // Fetch stock data based on stock place only
        $data['stock'] = $this->CommonModal->getRowById('purchase_product', 'stock_place_name', $stock_place_id);
    } elseif ($product_id) {
        // Fetch stock data based on product only
        $data['stock'] = $this->CommonModal->getRowById('purchase_product', 'product_name', $product_id);
    } else {
        // Fetch all stock data if no filters are applied
        $data['stock'] = $this->CommonModal->getAllRowsInOrder('purchase_product', 'p_id', 'DESC');
    }

    // Fetch stock places and product lists
    $this->db->select('id, place_name');
    $this->db->from('stock_place');
    $data['stock_place'] = $this->db->get()->result_array();

    $this->db->select('id, product_name');
    $this->db->from('product');
    $data['product_list'] = $this->db->get()->result_array();

    // Load the appropriate view
    if ($stock_place_id || $product_id) {
        $this->load->view('branch/view_stock_product', $data);
    } else {
        $this->load->view('branch/view_stock', $data);
    }
}

public function get_products_by_stock_place() {
    $stock_place_id = $this->input->post('stock_place_id');
    
    // Load the model
   
    if ($stock_place_id) {
        // Fetch products for the selected stock place by joining tables
        $products = $this->CommonModal->get_products_by_stock_place($stock_place_id);
    } else {
        // Fetch all products
        $products = $this->CommonModal->get_all_products();
    }

    // Return the result as JSON
    echo json_encode($products);
}
    public function add_stock($id)
    {
        $data['title'] = "Add Stock";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if ($this->input->post()) {
            $post = $this->input->post();

            // If a product is selected, fetch its details
            if (!empty($post['product_name'])) {
                $data['selected_product'] = $this->CommonModal->getRowById('purchase_product', 'product_name', $post['product_name']);
            }

            // If form is submitted for adding stock
            if (isset($post['return_quantity']) && isset($post['packing'])) {
                // Insert data into 'stock' table
                $savedata = $this->CommonModal->insertRowReturnId('stock', $post);

                if ($savedata) {
                    // Update purchase_product table with new quantities and other fields
                    $purchase_update_data = [
                        'quantity' => $post['available_quantity'],
                        'return_quantity' => $post['return_quantity'],
                        'total_quantity' => $post['total_quantity'],
                        'unit_rate' => $post['unit_rate'],
                        'purchase_price' => $post['purchase_price'],
                        'packing' => $post['packing']
                    ];

                    // Update the purchase_product table
                    $this->CommonModal->updateRowById('purchase_product', 'product_name', $post['product_name'], $purchase_update_data);

                    // Set success message
                    $this->session->set_userdata('msg', '<div class="alert alert-success">Stock Added and Product Updated Successfully</div>');
                } else {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error Adding Stock</div>');
                }

                // Redirect to the stock page after adding
                redirect(base_url('Branch_Dashboard/stock/' . $id));
            }
        }

        // Fetch stock places and product list
        $data['stock_place'] = $this->CommonModal->getAllRows('stock_place');
        $data['product_list'] = $this->CommonModal->getAllRows('product');

        // Load the add_stock view with necessary data
        $this->load->view('branch/add_stock', $data);
    }
      

    public function edit_stock()
    {
        $data['title'] = 'Update Stock';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['stock'] = $this->CommonModal->getRowById('purchase_product', 'p_id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $post['availabile_quantity'] = $_POST['quantity'];
             $post['status'] = 2;
             $uid=$_POST['user_id'];
            $category_id = $this->CommonModal->insertRowReturnId('purchase_product', $post);

            if ($category_id) {
      
                $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $_POST['product']);
                $new_available_quantity = $select[0]['availabile_quantity'] - $_POST['quantity'];
$transfer = $select[0]['transfer_quantity'] +  $_POST['quantity'];
                $updatedata = $this->CommonModal->updateColumnValue(
                    'purchase_product',
                    'p_id',
                    $_POST['product'],
                    'availabile_quantity',
                    $new_available_quantity
                );
                  $updatetransferdata = $this->CommonModal->updateColumnValue(
                    'purchase_product',
                    'p_id',
                    $_POST['product'],
                    'transfer_quantity',
                    $transfer
                );
                if($updatedata && $updatetransferdata){
                     redirect(base_url('Branch_Dashboard/stock/' . encryptId($uid)));
                }
                else{
                    redirect(base_url('Branch_Dashboard/stoc'));
                }
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/stock/' . encryptId($uid)));
        } else {
               $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
             $data['stock'] = $this->CommonModal->getRowById('purchase_product', 'p_id', $ID);
            $data['product_list'] = $this->CommonModal->getAllRows('product');
             $this->db->select('*');
    $this->db->from('stock_place');
    $this->db->where("id NOT IN (SELECT stock_place_name FROM purchase_product WHERE p_id = $ID)", NULL, FALSE);
    $query = $this->db->get();
    $data['stock_place'] = $query->result_array();
           
               $data['vender'] = $this->CommonModal->getAllRows('vender');
            $this->load->view('branch/edit_stock', $data);
        }
    }
    public function stock_place($id)
    {
        $data['title'] = "Our Stock";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        // Fetch all vendors
        $data['stock_place'] = $this->CommonModal->getAllRowsInOrder('stock_place', 'id', 'DESC');
        if ($ID) {
            $id = decryptId($id);
            $this->CommonModal->deleteRowById('stock_place', array('id' => $ID));
            redirect(base_url('Branch_Dashboard/stock_place/' . encryptId($id)));
        }
        // Load the view
        $this->load->view('branch/view_stock_place', $data);
    }
    public function get_product_data()
    {
        // Get the selected product ID from the AJAX request
        $product_id = $this->input->post('product_id');

        // Fetch product details from the purchase_product table
        $product_data = $this->CommonModal->getRowById('purchase_product', 'product_name', $product_id);

        // Return product details as a JSON response
        if (!empty($product_data)) {
            $response = [
                'available_quantity' => $product_data[0]['quantity'],
                'packing' => $product_data[0]['packing'],
                'total_quantity' => $product_data[0]['total_quantity'],
                'unit_rate' => $product_data[0]['unit_rate'],
                'purchase_price' => $product_data[0]['purchase_price'],
                'return_quantity' => $product_data[0]['return_quantity']
            ];
        } else {
            $response = [
                'available_quantity' => 0,
                'packing' => 0,
                'total_quantity' => 0,
                'unit_rate' => 0,
                'purchase_price' => 0,
                'return_quantity' => 0
            ];
        }

        echo json_encode($response);
    }

    public function add_stock_place($id,$add)
    {

        $data['title'] = "Add Stock Place";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();

            // $post['image'] = imageUpload('image', 'uploads/users/');

            $savedata = $this->CommonModal->insertRowReturnId('stock_place', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Add Successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Add Successfully</div>');
            }
            if($add==1){
         redirect(base_url('Branch_Dashboard/add_product/'.$id));
}elseif($add==2){
     redirect(base_url('Branch_Dashboard/add_invoice/' .$id));
}else{
            redirect(base_url('Branch_Dashboard/stock_place/' . $id));
}
        } else {

            $this->load->view('branch/add_stock_place', $data);
        }
    }
    public function edit_stock_place()
    {
        $data['title'] = 'Update Stock Places';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['stock_place'] = $this->CommonModal->getRowById('stock_place', 'id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];
            $uid = $post['user_id'];
            $category_id = $this->CommonModal->updateRowById('stock_place', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Stock Place Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/stock_place/' . encryptId($uid)));
        } else {

            $this->load->view('branch/edit_stock_place', $data);
        }
    }

  public function customer($id)
{
    $data['title'] = "Our Customers";

    // Decrypt Vendor ID from the passed URL segment
    $tid = decryptId($id);
    $ID = $this->input->get('id');

    // Fetch the user data for the decrypted vendor ID
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
    $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
    // Fetch all customers in descending order by ID
    // $data['customer'] = $this->CommonModal->getAllRowsInOrder('customer', 'id', 'DESC');
    $data['customer'] = $this->CommonModal->getRowByIdDesc('customer', 'user_id', $uid[0]['user_id'], 'id', 'DESC');

    // Check if there's a customer ID for deletion
    if ($ID) {
        $this->CommonModal->deleteRowById('customer', array('id' => $ID));

        // Redirect to the same page without query parameters
        redirect("Branch_Dashboard/customer/$id", 'refresh');
    }

    // Load the view
    $this->load->view('branch/view_customer', $data);
}



    public function add_customer($id,$add)
    {

        $data['title'] = "Add Customers ";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();

            // $post['image'] = imageUpload('image', 'uploads/users/');

            $savedata = $this->CommonModal->insertRowReturnId('customer', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">error</div>');
            }
if($add){
         redirect(base_url('Branch_Dashboard/add_invoice/' .$id));
} else{
            redirect(base_url('Branch_Dashboard/customer/' . $id)); 
}
        } else {

            $this->load->view('branch/add_customer', $data);
        }
    }
    public function edit_customer()
    {
        $data['title'] = 'Update Customers';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['customer'] = $this->CommonModal->getRowById('customer', 'id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];
            $uid = $post['branch_id'];
            $category_id = $this->CommonModal->updateRowById('customer', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/customer/' . encryptId($uid)));
        } else {

            $this->load->view('branch/edit_customer', $data);
        }
    }
    
    public function account($id)
    {
        $data['title'] = "Account List";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        // Fetch all vendors
        $data['account'] = $this->CommonModal->getAllRowsInOrder('account', 'id', 'DESC');
        if ($ID) {
            // $aid = decryptId($id);
            $this->CommonModal->deleteRowById('account', array('id' => $ID));
            redirect(base_url('Branch_Dashboard/account/' . $id));
        }
        // Load the view
        $this->load->view('branch/view_account', $data);
    }

    public function add_account($id)
    {

        $data['title'] = "Add Account ";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();

            // $post['image'] = imageUpload('image', 'uploads/users/');

            $savedata = $this->CommonModal->insertRowReturnId('account', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');
            }

            redirect(base_url('Branch_Dashboard/account/' . $id));
        } else {

            $this->load->view('branch/add_account', $data);
        }
    }
    public function edit_account()
    {
        $data['title'] = 'Update Account';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['account'] = $this->CommonModal->getRowById('account', 'id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];
            $uid = $post['user_id'];
            $category_id = $this->CommonModal->updateRowById('account', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/account/' . encryptId($uid)));
        } else {

            $this->load->view('branch/edit_account', $data);
        }
    }
    
    public function invoice($id)
    {
        $data['title'] = "Invoice List";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
    
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
         $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Modify the query to join the customer table and get customer names
        $this->db->select('
        invoice.invoice_no, 
        invoice.status as stat, 
        invoice.customer_name as c_id, 
        invoice.date as bill_date, 
        customer.name as customer_name, 
        COUNT(*) as product_count, 
        final_total as final_total
    '); // Count of products and sum of grand totals
    $this->db->from('invoice');
    $this->db->join('customer', 'customer.id = invoice.customer_name', 'left'); 
    $this->db->where('invoice.user_id', $uid[0]['user_id']); // Add condition for user_id
    $this->db->where('invoice.branch_id', $tid); // Add condition for branch_id
    $this->db->group_by(array('invoice.invoice_no', 'customer.name')); 
    $this->db->order_by('invoice.id', 'DESC');
        $data['invoice'] = $this->db->get()->result_array();
    
        // Delete functionality
        if ($ID) {
         
            $iid = decryptId($id);
            $this->CommonModal->deleteRowByuserId('invoice', array('invoice_no' => $ID), array('user_id' => $iid));
            
            $this->CommonModal->deleteRowByuserId('payment', array('invoice_no' => $ID), array('user_id' => $iid));

            redirect(base_url('Branch_Dashboard/invoice/' . encryptId($id)));
        }
    
        // Load the view
        $this->load->view('branch/view_invoice', $data);
    }
    public function print_invoice($id, $invoice_number)
    {
        $data['title'] = "Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
       
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
          $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
           $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Fetch all vendors
        // $data['invoice'] = $this->CommonModal->getRowById('invoice', 'invoice_no', $invoice_number);
       $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_number,'branch_id',$tid,'user_id',$uid[0]['user_id']);
        $this->load->view('branch/invoice', $data);
    }
    public function generate_invoice_number($uid) {
        $last_invoice = $this->CommonModal->getLastRow('invoice', 'invoice_no','user_id',$uid); // Replace with your actual method to get the last invoice number
        if ($last_invoice) {
            // Increment the last invoice number
            return $last_invoice['invoice_no'] + 1;
        } else {
            // Start from 1 if no invoices exist
            return 1;
        }
    }  
    public function generate_return_invoice_number($uid) {
        $last_invoice =  $this->CommonModal->getLastRow('return_invoice', 'return_invoice_no','user_id',$uid); // Replace with your actual method to get the last invoice number
        if ($last_invoice) {
            // Increment the last invoice number
            return $last_invoice['return_invoice_no'] + 1;
        } else {
            // Start from 1 if no invoices exist
            return 1;
        }
    }
    public function get_available_quantity($product_id) {
    // Query to get the available quantity for the product
    $this->db->select('quantity');
    $this->db->from('purchase_product');
    $this->db->where('p_id', $product_id);
    $query = $this->db->get();

    // Return the available quantity as JSON
    if ($query->num_rows() > 0) {
        $result = $query->row();
        echo json_encode(['available_quantity' => $result->quantity]);
    } else {
        echo json_encode(['available_quantity' => 0]);
    }
}
    public function download($id, $invoice_number) {

        // Set title for the invoice
        $data['title'] = "Invoice";
        
        // Decrypt or use the provided ID (if necessary)
        $tid = $id;
        
        // Fetch user data
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
    
        // Fetch invoice data based on the provided invoice number
        $data['invoice'] = $this->CommonModal->getRowById('invoice', 'invoice_no', $invoice_number);
    
        // Initialize mPDF
        $mpdf = new \Mpdf\Mpdf(['format' => 'A3']);
    
        // Load the invoice view as a string (HTML)
        $html = $this->load->view('branch/invoice_pdf', $data, TRUE);  // 'TRUE' to return as string
    
        // Write HTML content to PDF
        $mpdf->WriteHTML($html);
    
        // Output the PDF file
        $mpdf->Output("invoice_$invoice_number.pdf", 'D');  // 'D' forces download, 'I' to display inline
    }
public function add_invoice($id)
{
    $data['title'] = "Add Invoice";
    $data['tag'] = "add";
    $tid = decryptId($id);
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
       $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
      $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);  
    $data['account'] = $this->CommonModal->getRowByIdDesc('account', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
    
    if ($_POST) {
        $post = $this->input->post();
        $c_names = $post['customer_name'];
        $stock_place = $post['stock_place'];
        $d_type = $post['discount_type'];
        $date = $post['date'];
        $user_id = $post['uid'];
        $discount = floatval($post['discount']);
        $final = floatval($post['final_total']);
           $total_without_tax = floatval($post['total_without_tax']);
          $tax = floatval($post['tax_amount']);
        $paid = floatval($post['paid']);
        $mode = $post['mode'];
        $bank = floatval($post['bank']);
        $due = $final - $paid;

        // Generate invoice number
        $invoice_number = $this->generate_invoice_number($uid[0]['user_id']);

        // Assuming 'product_name', 'packing', 'quantity', 'unit_rate', 'total_price' are array inputs
        $product_names = $post['p_name'];
        $product_ids = $post['p_id'];
        $packings = $post['packing'];
        $quantities = $post['quantity'];
        $available_quantities = $post['available_quantity'];
        $unit_rates = $post['unit_rate'];
        $unit = $post['unit'];
        $total_prices = $post['total_price'];

        $grand_total = array_sum($total_prices);
        $discount_amountt = "";
        
        if($post['discount_type'] == 'rupee'){
            $discount_amountt =  $post['discount'];
        } else{ 
            $discount_am = $grand_total * $post['discount'];
            $discount_amountt = $discount_am/100;
        }
        // Insert invoice items
        foreach ($product_names as $index => $product_name) {
            $new_available_quantity = $available_quantities[$index] - $quantities[$index];

            // Prepare data for each row
            $data_to_insert = [
                'customer_name' => $c_names,
                'stock_place' => $stock_place,
                'date' => $date,
                'user_id' => $user_id,
                'branch_id' => $tid,
                'invoice_no' => $invoice_number,
                'p_name' => $product_name,
                'packing' => $packings[$index],
                'quantity' => $quantities[$index],
                'unit_rate' => $unit_rates[$index],
                'unit' => $unit[$index],
                'total_price' => $total_prices[$index],
                'grand_total' => $grand_total,
                'discount_type' => $d_type,
                'discount' => $discount,
                'discount_amount' => $discount_amountt,
                 'total_without_tax' => $total_without_tax,
                'tax_amount' => $tax, 
                'final_total' => $final
            ];

            $savedata = $this->CommonModal->insertRowReturnId('invoice', $data_to_insert);

            if ($savedata) {
                $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
                $selling = $select[0]['selling_quantity'] + $quantities[$index];

                // Update available_quantity and selling_quantity
                $updatedata = $this->CommonModal->updateColumnValue(
                    'purchase_product',
                    'p_id',
                    $product_ids[$index],
                    'availabile_quantity',
                    $new_available_quantity
                );

                $updatesellingdata = $this->CommonModal->updateColumnValue(
                    'purchase_product',
                    'p_id',
                    $product_ids[$index],
                    'selling_quantity',
                    $selling
                );

                if (!$updatedata || !$updatesellingdata) {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
                    redirect(base_url('Branch_Dashboard/invoice/' . $id));
                    return;
                }
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding invoice item.</div>');
                redirect(base_url('Branch_Dashboard/invoice/' . $id));
                return;
            }
        }

        // Insert payment data if paid amount is provided
        if ($paid >= 0) {
            $pay_to_insert = [
                'customer_id' => $c_names,
                'user_id' => $user_id,
                'branch_id' => $tid,
                'invoice_no' => $invoice_number,
                'paid' => $paid,
                'mode' => $mode,
                'total' => $final,
                'due' => $due,
                'bank' => $bank,
            ];

            $savedata1 = $this->CommonModal->insertRowReturnId('payment', $pay_to_insert);

            if (!$savedata1) {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding payment information.</div>');
                redirect(base_url('Branch_Dashboard/invoice/' . $id));
                return;
            }
        }

        $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
        redirect(base_url('Branch_Dashboard/print_invoice/' . $id . '/' . $invoice_number));
    } else {
      $data['customer_list'] = $this->CommonModal->getRowByIdDesc('customer', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['stock_list'] = $this->CommonModal->getRowByIdDesc('stock_place', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['product_list'] = $this->CommonModal->getRowByIdDesc('product', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $this->load->view('branch/add_invoice', $data);
    }
}

public function edit_invoice()
{
    $data['title'] = "Edit Invoice";
    $data['tag'] = "edit";

    $tid = $this->input->get('user_id'); // User ID
    $invoice_no = $this->input->get('invoice_no'); 

    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
          $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
      $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);  
    $data['account'] = $this->CommonModal->getRowByIdDesc('account', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
    $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_no,'user_id',$uid[0]['user_id'],'branch_id',$tid);

    if ($_POST) {
        $post = $this->input->post();

        // Extract common invoice data
        $c_names = $post['customer_name'];
        $user_id = $post['uid'];
        $stock_place = $post['stock_place'];
        $d_type = $post['discount_type'];
        $date = $post['date'];
        $discount = floatval($post['discount']);
        $final = floatval($post['final_total']);
           $total_without_tax = floatval($post['total_without_tax']);
          $tax = floatval($post['tax_amount']);
        $paid = floatval($post['paid']);
        $mode = $post['mode'];
        $ppid = $post['p_p_id'];
        $bank = floatval($post['bank']);
        $due = $final - $paid;

        // Extract product details
        $product_names = $post['p_name'];
        $product_ids = $post['p_id'];
        $invoice_ids = $post['invoice_id'];
        $packings = $post['packing'];
        $quantities = $post['quantity'];
        $available_quantities = $post['available_quantity'];
        $unit_rates = $post['unit_rate'];
        $units = $post['unit'];
        $total_prices = $post['total_price'];

        $grand_total = array_sum($total_prices);
        $discount_amountt = '';
        if($post['discount_type'] == 'rupee'){
            $discount_amountt = $post['discount'];
        } else{ 
            $discount_am = $grand_total * $post['discount'];
            $discount_amountt = $discount_am/100;
        }
        foreach ($product_names as $index => $product_name) {
            // Fetch the product data from purchase_product table
            $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
            
            if (!empty($select)) {
                $sellingquantity = $select[0]['selling_quantity'];

                // Adjust available and selling quantities based on the new quantity
                if ($quantities[$index] > $sellingquantity) {
                    $quantityDiff = $quantities[$index] - $sellingquantity;
                    $new_available_quantity = $available_quantities[$index] - $quantityDiff;
                } elseif ($quantities[$index] < $sellingquantity) {
                    $quantityDiff = $sellingquantity - $quantities[$index];
                    $new_available_quantity =  $available_quantities[$index] + $quantityDiff;
                }else{
                     $new_available_quantity =$available_quantities[$index];
                }

                // Update the available quantity in the purchase_product table
                $updatedata = $this->CommonModal->updateColumnValue(
                    'purchase_product',
                    'p_id',
                    $product_ids[$index],
                    'availabile_quantity',
                    $new_available_quantity
                );
                $this->CommonModal->updateColumnValue(
                    'return_invoice',
                    'p_name',
                    $product_ids[$index],
                    'availabile_quantity',
                    $quantities
                );
                // Update selling quantity if needed
                if ($quantities[$index] > $sellingquantity) {
                    $selling = $sellingquantity + $quantityDiff;
                } elseif ($quantities[$index] < $sellingquantity) {
                    $selling = $sellingquantity - $quantityDiff;
                } else{
                    $selling =   $sellingquantity;
                }

                // Update the selling quantity in the purchase_product table
                if (isset($selling)) {
                    $updatesellingdata = $this->CommonModal->updateColumnValue(
                        'purchase_product',
                        'p_id',
                        $product_ids[$index],
                        'selling_quantity',
                        $selling
                    );
                }
            } else {
                // Handle case where product data is missing
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Product data missing.</div>');
                redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                return;
            }

            // Prepare data to update the invoice record
            $data_to_update = [
                'customer_name' => $c_names,
                'stock_place' => $stock_place,
                'date' => $date,
                'user_id' => $user_id,
                'branch_id' => $tid,
                'invoice_no' => $invoice_no,
                'p_name' => $product_name,
                'packing' => $packings[$index],
                'quantity' => $quantities[$index],
                'unit_rate' => $unit_rates[$index],
                'unit' => $units[$index],
                'total_price' => $total_prices[$index],
                'grand_total' => $grand_total,
                'discount_type' => $d_type,
                'discount' => $discount,
                'discount_amount' => $discount_amountt,
                 'total_without_tax' => $total_without_tax,
                'tax_amount' => $tax, 
                'final_total' => $final
            ];

            // Update the invoice record
            $savedata = $this->CommonModal->updateRowById('invoice', 'id', $invoice_ids[$index], $data_to_update);
            if (!$savedata) {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating invoice item.</div>');
                redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                return;
            }
        }

      // Update the payment information if any payment is made
if ($paid >= 0) {
    $payment_data = [
        'customer_id' => $c_names,
        'user_id' => $user_id,
        'branch_id' => $tid,
        'invoice_no' => $invoice_no,
        'paid' => $paid,
        'mode' => $mode,
        'total' => $final,
        'due' => $due,
        'bank' => $bank
    ];

    // Update the payment record
    $payment_update = $this->CommonModal->updateRowById('payment', 'id', $ppid, $payment_data);

  if ($payment_update) {
    // Get all rows after the given ID for the same invoice
    $rows_after_id = $this->CommonModal->getRowsAfterId('payment', 'id', $ppid, 'invoice_no', $invoice_no);

    if ($rows_after_id) {
        foreach ($rows_after_id as $row) {
            // Fetch the row just before the current row for recalculating due
            
            $rows_before_id = $this->CommonModal->getRowsBeforeId('payment', 'id', $row['id'], 'invoice_no', $invoice_no);

            // Ensure that there is a previous row to calculate the due amount
            $previous_due = $rows_before_id ? $rows_before_id[0]['due'] : $final;

            // Calculate the new due amount
            $due2 = $previous_due - $row['paid'];

            $latest_data = [
                'customer_id' => $c_names,
                'user_id' => $user_id,
                'branch_id' => $tid,
                'invoice_no' => $row['invoice_no'],
                'paid' => $row['paid'],
                'mode' => $row['mode'],
                'total' => $final,
                'due' => $due2,
                'bank' => $row['bank']
            ];

            // Update each row with the recalculated due
            $this->CommonModal->updateRowById('payment', 'id', $row['id'], $latest_data);
        }
    }
} 
else {
        $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating payment information.</div>');
        redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
        return;
    }
}


        // Success message and redirect
        $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice updated successfully.</div>');
        redirect(base_url('Branch_Dashboard/print_invoice/' . encryptId($tid) . '/' . $invoice_no));
    } else {
        // Load data for the edit form
        $data['customer_list'] = $this->CommonModal->getRowByIdDesc('customer', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['stock_list'] = $this->CommonModal->getRowByIdDesc('stock_place', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['product_list'] = $this->CommonModal->getRowByIdDesc('product', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $this->load->view('branch/edit_invoice', $data);
    }
}


 public function view_return_invoice($id)
    { {
        $data['title'] = "Return Invoice Product";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        $rID = $this->input->get('r_id');

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
          $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Fetch all vendors
           $this->db->select('*,COUNT(*) as product_count,sum(quantity) as total_quantity'); // Count of products and sum of grand totals
        $this->db->from('return_invoice');
        $this->db->join('customer', 'customer.id = return_invoice.customer_name', 'left');
        $this->db->where('return_invoice.user_id', $uid[0]['user_id']);
        $this->db->where('return_invoice.branch_id', $tid); // Join with customer table
        $this->db->group_by(array('return_invoice.return_invoice_no', 'customer.name')); // Group by invoice_no and customer name
        $this->db->order_by('return_invoice.id', 'DESC');
        $data['return'] = $this->db->get()->result_array();
        // $data['return'] = $this->CommonModal->getAllRowsInOrder('return_invoice', 'id', 'DESC');
        if ($ID) {
             $iid = decryptId($id);
            $this->CommonModal->deleteRowByuserId('return_invoice', array('return_invoice_no' => $rID), array('user_id' => $iid));
            $this->CommonModal->deleteRowByuserId('return_invoice_payment', array('return_invoice_no' => $rID), array('user_id' => $iid));
            redirect(base_url('Branch_Dashboard/view_return_invoice/' . encryptId($id)));
        }
        // Load the view
        $this->db->select('id, name');
        $this->db->from('customer');
        $data['vender'] = $this->db->get()->result_array();

        $this->db->select('id, product_name');
        $this->db->from('product');
        $data['product_list'] = $this->db->get()->result_array();

        $this->load->view('branch/view_return_invoice', $data);
    }
}
   public function return_invoice()
{
    $data['title'] = "Return Invoice";
    $data['tag'] = "edit";
    $tid = $this->input->get('user_id'); // User ID
    $invoice_no = $this->input->get('invoice_no'); 
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
          $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
      $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);  
     $data['account'] = $this->CommonModal->getRowById('account','user_id',$uid[0]['user_id']);
    $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_no, 'user_id', $uid[0]['user_id'],'branch_id',$tid);
    
    if ($_POST) {
        $post = $this->input->post();
        $c_names = $post['customer_name'];
        $stock_place = $post['stock_place'];
        $d_type = $post['discount_type'];
        $date = $post['date'];
        $user_id = $post['uid'];
        $discount = floatval($post['discount']);
        $final = floatval($post['final_total']);
           $total_without_tax = floatval($post['total_without_tax']);
          $tax = floatval($post['tax_amount']);
        $paid = floatval($post['paid']);
        $mode = $post['mode'];
          $ppid = $post['p_p_id'];
        $bank = floatval($post['bank']);
        $due = $final - $paid;
  $return_invoice_number = $this->generate_return_invoice_number($uid[0]['user_id']);
        // Collect product-related data
        $product_names = $post['p_name'];
        $product_ids = $post['p_id'];
         $invoice_ids = $post['invoice_id'];
        $packings = $post['packing'];
        $quantities = $post['quantity'];
        $available_quantities = $post['available_quantity'];
          $ava_quantities = $post['ava_quantity'];
        $unit_rates = $post['unit_rate'];
        $unit = $post['unit'];
        $total_prices = $post['total_price'];

        $grand_total = array_sum($total_prices);
        $discount_amountt = '';
        if($post['discount_type'] == 'rupee'){
            $discount_amountt =  $post['discount'];
        } else{ 
            $discount_am = $grand_total * $post['discount'];
            $discount_amountt = $discount_am/100;
        }
        foreach ($product_names as $index => $product_name) {
            $new_available_quantity = $available_quantities[$index] + $quantities[$index];

            $data_to_insert = [
                'customer_name' => $c_names,
                'stock_place' => $stock_place,
                'date' => $date,
                'user_id' => $user_id,
                'branch_id' => $tid,
                 'return_invoice_no' => $return_invoice_number,
                'invoice_no' => $invoice_no,
                 'invoice_id' => $invoice_ids[$index],
                'p_name' => $product_name,
                'packing' => $packings[$index],
                'quantity' => $quantities[$index],
                'unit_rate' => $unit_rates[$index],
                'unit' => $unit[$index],
                'available_quantity' => $ava_quantities[$index],
                'total_price' => $total_prices[$index],
                'grand_total' => $grand_total,
                'discount_type' => $d_type,
                'discount' => $discount,
                'discount_amount' => $discount_amountt,
                 'total_without_tax' => $total_without_tax,
                'tax_amount' => $tax, 
                'final_total' => $final
            ];

            $savedata = $this->CommonModal->insertRowReturnId('return_invoice',  $data_to_insert);

            if ($savedata) {
                $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
                $selling = $select[0]['selling_quantity'] - $quantities[$index];
  $selectinvoice = $this->CommonModal->getRowById('invoice', 'id',  $invoice_ids[$index]);
                $ava = $selectinvoice[0]['return_quantity'] + $quantities[$index];
                $updatedata = $this->CommonModal->updateColumnValue(
                    'purchase_product',
                    'p_id',
                    $product_ids[$index],
                    'availabile_quantity',
                    $new_available_quantity
                );
                $this->CommonModal->updateColumnValue(
                    'return_purchase',
                    'p_id',
                    $product_ids[$index],
                    'availabile_quantity',
                    $new_available_quantity
                );
 $updatestatusdata = $this->CommonModal->updateColumnValue(
            'invoice',            // Table name
            'id',                        // Column to match (product ID)
             $invoice_ids[$index],          // Product ID to update
            'status',         // Column to update (available_quantity)
            1       // New available quantity
        );
         $updatereturndata = $this->CommonModal->updateColumnValue(
            'invoice',            // Table name
            'id',                        // Column to match (product ID)
             $invoice_ids[$index],          // Product ID to update
            'return_quantity',         // Column to update (available_quantity)
               $ava // New available quantity
        );
                $updatesellingdata = $this->CommonModal->updateColumnValue(
                    'purchase_product',
                    'p_id',
                    $product_ids[$index],
                    'selling_quantity',
                    $selling
                );

                if (!$updatedata || !$updatesellingdata) {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
                    redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid) ));
                    return;
                }
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating invoice item.</div>');
                redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                return;
            }
        }

        if ($paid >= 0) {
            $pay_to_insert = [
                'customer_id' => $c_names,
                'user_id' => $user_id,
                'branch_id' => $tid,
                 'return_invoice_no' => $return_invoice_number,
                'invoice_no' => $invoice_no,
                'paid' => $paid,
                'mode' => $mode,
                'total' => $final,
                'due' => $due,
                'bank' => $bank,
            ];

            $savedata1 = $this->CommonModal->insertRowReturnId('return_invoice_payment',$pay_to_insert);

            if (!$savedata1) {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating payment information.</div>');
                redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                return;
            }
        }

        $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice updated successfully.</div>');
        redirect(base_url('Branch_Dashboard/print_return_invoice/' . encryptId($tid) . '/' .$return_invoice_number));
    } else {
        $data['customer_list'] = $this->CommonModal->getRowById('customer','user_id',$uid[0]['user_id']);
        $data['stock_list'] = $this->CommonModal->getRowById('stock_place','user_id',$uid[0]['user_id']);
        $data['product_list'] = $this->CommonModal->getRowById('product','user_id',$uid[0]['user_id']);
        $this->load->view('branch/return_invoice', $data);
    }
}

      public function print_return_invoice($id, $invoice_number)
    {
        $data['title'] = "Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
       
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
             $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
      $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);  
        // Fetch all vendors
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('return_invoice', 'return_invoice_no', $invoice_number,'branch_id',$tid,'user_id',$uid[0]['user_id']);
      
        $this->load->view('branch/print_return_invoice', $data);
    }
public function edit_return_invoice()
{
    $data['title'] = "Edit Return Invoice";
    $data['tag'] = "edit";
    $userId = $this->input->get('user_id'); // User ID
    $returnInvoiceNo = $this->input->get('return_invoice_no'); 
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $userId);
          $uid = $this->CommonModal->getRowById('branch', 'id', $userId);
      $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);  
  $data['account'] = $this->CommonModal->getRowById('account','user_id',$uid[0]['user_id']);
    $data['invoice'] = $this->CommonModal->getRowByMultitpleId('return_invoice', 'return_invoice_no', $returnInvoiceNo,'branch_id',$userId,'user_id',$uid[0]['user_id']);
    
    if ($_POST) {
        $post = $this->input->post();
        $customerName = $post['customer_name'];
        $stockPlace = $post['stock_place'];
        $discountType = $post['discount_type'];
        $date = $post['date'];
        $user_id = $post['uid'];
        $discount = floatval($post['discount']);
        $finalTotal = floatval($post['final_total']);
           $total_without_tax = floatval($post['total_without_tax']);
          $tax = floatval($post['tax_amount']);
        $paidAmount = floatval($post['paid']);
        $paymentMode = $post['mode'];
        $paymentId = $post['p_p_id'];
        $bankAmount = floatval($post['bank']);
        $dueAmount = $finalTotal - $paidAmount;

        // Collect product-related data
        $productNames = $post['p_name'];
        $invoiceIds = $post['invoice_id'];
        $productIds = $post['p_id'];
        $invoiceNo = $post['invoice_no'];
        $packings = $post['packing'];
        $quantities = $post['quantity'];
        $availableQuantities = $post['available_quantity'];
        $availableQuantitiesArray = $post['ava_quantity'];
        $unitRates = $post['unit_rate'];
        $units = $post['unit'];
        $totalPrices = $post['total_price'];

        $grandTotal = array_sum($totalPrices);
        $discount_amountt = '';
        if($post['discount_type'] == 'rupee'){
            $discount_amountt =  $post['discount'];
        } else{ 
            $discount_am = $grandTotal * $post['discount'];
            $discount_amountt = $discount_am/100;
        }
        foreach ($productNames as $index => $productName) {
            $returnInvoice = $this->CommonModal->getRowById('return_invoice', 'id', $post['id'][$index]);
            $previousQuantity = isset($returnInvoice[0]['quantity']) ? $returnInvoice[0]['quantity'] : 0;
            $newQuantity = $quantities[$index];
            $quantityDifference = $newQuantity - $previousQuantity;

            // Update available quantities based on the difference
            if ($newQuantity > $previousQuantity) {
                $quantityDifference = $newQuantity - $previousQuantity;
                $newAvailableQuantity = $availableQuantities[$index] + $quantityDifference;
                   $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'availabile_quantity',$newAvailableQuantity);
            } elseif($newQuantity < $previousQuantity) {
                $quantityDifference = $newQuantity - $previousQuantity;
                $newAvailableQuantity = $availableQuantities[$index] - $quantityDifference;
                   $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'availabile_quantity',$newAvailableQuantity);
            }
  
            $dataToInsert = [
                'customer_name' => $customerName,
                'stock_place' => $stockPlace,
                'date' => $date,
                'branch_id' => $userId,
                'user_id' => $user_id,
               
                'return_invoice_no' => $returnInvoiceNo,
                'invoice_no' => $invoiceNo,
                'p_name' => $productName,
                'packing' => $packings[$index],
                'quantity' => $newQuantity,
                'available_quantity' => $newAvailableQuantity,
                'unit_rate' => $unitRates[$index],
                'unit' => $units[$index],
                'total_price' => $totalPrices[$index],
                'grand_total' => $grandTotal,
                'discount_type' => $discountType,
                'discount' => $discount,
                'discount_amount' => $discount_amountt,
                 'total_without_tax' => $total_without_tax,
                'tax_amount' => $tax, 
                'final_total' => $finalTotal
            ];

            $savedata = $this->CommonModal->updateRowById('return_invoice', 'id', $post['id'][$index], $dataToInsert);

            if ($savedata) {
                // Update product quantities in purchase_product table
                $productData = $this->CommonModal->getRowById('purchase_product', 'p_id', $productIds[$index]);
                $invoiceData = $this->CommonModal->getRowById('invoice', 'id', $invoiceIds[$index]);

                if (!empty($productData) && !empty($invoiceData)) {
                    $sellingQuantity = $productData[0]['selling_quantity'];
                    $returnQuantity = $invoiceData[0 ]['return_quantity'];

                    if ($newQuantity > $previousQuantity) {
                        // Increase in quantity
                        $quantityDiff = $newQuantity - $previousQuantity;
                        $sellingQuantity -= $quantityDiff;
                        $returnQuantity += $quantityDiff;
                    } elseif ($newQuantity < $previousQuantity) {
                        // Decrease in quantity
                        $quantityDiff = $previousQuantity - $newQuantity;
                        $sellingQuantity += $quantityDiff;
                        $returnQuantity -= $quantityDiff;
                    }

                    // Update selling quantity and return quantity
                    $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'selling_quantity', $sellingQuantity);
                    $this->CommonModal->updateColumnValue('invoice', 'id', $invoiceIds[$index], 'return_quantity', $returnQuantity);
                 
                } else {
                    // Handle case where product or invoice data is missing
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Product or invoice data missing.</div>');
                    redirect(base_url('Branch_Dashboard/view_return_invoice/' . encryptId($userId)));
                    return;
                }
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating invoice item.</div>');
                redirect(base_url('Branch_Dashboard/view_return_invoice/' . encryptId($userId)));
                return;
            }
        }

        if ($paidAmount >= 0) {
            $paymentData = [
                'customer_id' => $customerName,
                'branch_id' => $userId,
                'user_id' => $user_id,
                'return_invoice_no' => $returnInvoiceNo,
                'invoice_no' => $invoiceNo,
                'paid' => $paidAmount,
                'mode' => $paymentMode,
                'total' => $finalTotal,
                'due' => $dueAmount,
                'bank' => $bankAmount,
            ];

            $savedata1 = $this->CommonModal->updateRowById('return_invoice_payment', 'id', $paymentId, $paymentData);
  if ($savedata1) {
    // Get all rows after the given ID for the same invoice
    $rows_after_id = $this->CommonModal->getRowsAfterId('return_invoice_payment', 'id', $paymentId, 'return_invoice_no', $returnInvoiceNo);

    if ($rows_after_id) {
        foreach ($rows_after_id as $row) {
            // Fetch the row just before the current row for recalculating due
            
            $rows_before_id = $this->CommonModal->getRowsBeforeId('return_invoice_payment', 'id', $row['id'], 'return_invoice_no',$returnInvoiceNo);

            // Ensure that there is a previous row to calculate the due amount
            $previous_due = $rows_before_id ? $rows_before_id[0]['due'] : $finalTotal;

            // Calculate the new due amount
            $due2 = $previous_due - $row['paid'];

            $latest_data = [
                'customer_id' =>$customerName,
               'branch_id' => $userId,
                'user_id' => $user_id,
                  'return_invoice_no' => $row['return_invoice_no'],
                'invoice_no' => $row['invoice_no'],
                'invoice_no' => $row['invoice_no'],
                'paid' => $row['paid'],
                'mode' => $row['mode'],
                'total' => $finalTotal,
                'due' => $due2,
                'bank' => $row['bank']
            ];

            // Update each row with the recalculated due
            $this->CommonModal->updateRowById('return_invoice_payment', 'id', $row['id'], $latest_data);
        }
    }
} else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating payment information.</div>');
            redirect(base_url('Branch_Dashboard/print_return_invoice/' . encryptId($userId) . '/' . $returnInvoiceNo));
                return;
            }
        }

        $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice updated successfully.</div>');
        redirect(base_url('Branch_Dashboard/print_return_invoice/' . encryptId($userId) . '/' . $returnInvoiceNo));
    } else {
      $data['customer_list'] = $this->CommonModal->getRowById('customer','user_id',$uid[0]['user_id']);
        $data['stock_list'] = $this->CommonModal->getRowById('stock_place','user_id',$uid[0]['user_id']);
        $data['product_list'] = $this->CommonModal->getRowById('product','user_id',$uid[0]['user_id']);
        $this->load->view('branch/edit_return_invoice', $data);
    }
}
public function get_subcategories($category_id) {
$subcategories = $this->CommonModal->getRowById('purchase_product', 'product_name', $category_id);
    
        // Send the subcategories as a JSON response
        echo json_encode($subcategories);
}
public function get_name($contact = null) {
    if ($contact === 'all') {
        // Fetch all customers if no specific contact number is provided
        $customer_data = $this->CommonModal->getAllRows('customer');
    } else {
        // Fetch customers by the provided contact number
        $customer_data = $this->CommonModal->getRowById('customer', 'contact', $contact);
    }

    // Send the customer data as a JSON response
    echo json_encode($customer_data);
}

// public function get_products_by_stock_place()
// {
//     // Get the selected stock place ID from the AJAX request
//     $stock_place_id = $this->input->post('stock_place_id');

//     if ($stock_place_id) {
//         // Directly query the database without using a model
//         $this->db->select('id, product_name');
//         $this->db->from('purchase_product');
//         $this->db->where('stock_place_name', $stock_place_id);
//         $query = $this->db->get();

//         // Fetch the results as an array
//         $products = $query->result_array();

//         // Return the products in JSON format
//         echo json_encode($products);
//     } else {
//         echo json_encode([]);
//     }
// }



public function get_unit_rate($packing) {
    // Fetch the unit_rate based on the packing
    $unitRateData = $this->CommonModal->getRowById('purchase_product', 'p_id', $packing);
    
    // Check if the data is found
    if (!empty($unitRateData)) {
        // Send unit rate as a JSON response
        echo json_encode([
            'unit_rate' => $unitRateData[0]['selling_price'],
            'p_price' => $unitRateData[0]['p_price'],
            'total_quantity' => $unitRateData[0]['total_quantity'],
             'availabile_quantity' => $unitRateData[0]['availabile_quantity'],
               'p_id' => $unitRateData[0]['p_id']

        ]);
    } else {
        // Return empty or default value if not found
        echo json_encode([
            'unit_rate' => '' ,
            'p_price' =>'',
              'availabile_quantity' => '',
               'p_id' => ''
        ]);
    }
}
public function get_unit($packing) {
    // Fetch the unit_rate based on the packing
    $unitRateDataq = $this->CommonModal->getRowById('purchase_product', 'p_id', $packing);
    
    // Check if the data is found
    if (!empty($unitRateDataq)) {
        // Send unit rate as a JSON response
        echo json_encode(['unit' => $unitRateDataq[0]['unit']]);
    } else {
        // Return empty or default value if not found
        echo json_encode(['unit' => '']);
    }
}
public function get_product_details_by_product() {
    $product_id = $this->input->post('product_id');

    // Fetch the total_quantity, p_peice, and possible packings from the database
    $this->db->select('total_quantity, p_price, packing');
    $this->db->where('p_id', $product_id);
    $query = $this->db->get('purchase_product');

    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        
        // Prepare the packing options
        $packing_options = array_column($query->result_array(), 'packing');
        $result['packing_options'] = $packing_options;

        echo json_encode($result); // Return data as JSON
    } else {
        echo json_encode(['total_quantity' => 0, 'p_price' => 0, 'packing_options' => []]);
    }
}


 public function return($id)
{ 
    $data['title'] = "Return Product";
    // Get Vendor ID from the URL query string
    $tid = decryptId($id);
    $ID = $this->input->get('id'); 
    $returnCode = $this->input->get('return_code');
    // Decrypt user ID
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
    $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
      $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
    // Check if the 'id' parameter is present, and perform the delete if needed
  if ($returnCode) {
    
       
        $deleteResult = $this->CommonModal->deleteRowByuserId('return_purchase', array('return_code' => $returnCode), array('user_id' => $tid));
        $this->CommonModal->deleteRowByuserId('return_purchase_payment', array('return_code' => $returnCode), array('user_id' => $tid));
        if ($deleteResult) {
            $this->session->set_userdata('msg', '<div class="alert alert-success">Return product deleted successfully.</div>');
        } else {
            $this->session->set_userdata('msg', '<div class="alert alert-danger">Error deleting the return product.</div>');
        }
        redirect(base_url('Branch_Dashboard/return/' . encryptId($id)));  // Redirect after deletion
    }


    // Fetch return purchases with a join on the vendor table
    $this->db->select('*,COUNT(*) as product_count');
    $this->db->from('return_purchase');
    $this->db->join('vender', 'vender.id = return_purchase.vender_name', 'left');
    $this->db->where('return_purchase.user_id', $uid[0]['user_id']);
    $this->db->where('return_purchase.branch_id', $tid);
    $this->db->group_by(array('return_purchase.return_code', 'vender.vender_name'));
    $this->db->order_by('return_purchase.id', 'DESC');
    $data['return'] = $this->db->get()->result_array();

    // Fetch all vendors for the return page
    $this->db->select('id, vender_name');
    $this->db->from('vender');
    $data['vender'] = $this->db->get()->result_array();

    // Fetch all products for the return page
    $this->db->select('id, product_name');
    $this->db->from('product');
    $data['product_list'] = $this->db->get()->result_array();

    // Load the view for the return page
    $this->load->view('branch/view_return', $data);
}

    public function return_product()
{
    $data['title'] = "Return Product";
        $data['tag'] = "edit";
        $tid = $this->input->get('user_id'); // User ID
        $purchase_code = $this->input->get('purchase_code'); 
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
         $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
           $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
          $data['vender'] = $this->CommonModal->getRowById('vender','user_id',$uid[0]['user_id']);
        $data['product_list'] = $this->CommonModal->getRowById('product','user_id',$uid[0]['user_id']);
        $data['stock'] = $this->CommonModal->getRowById('stock_place','user_id',$uid[0]['user_id']);
          $data['account'] = $this->CommonModal->getRowById('account','user_id',$uid[0]['user_id']);
  
        $data['product'] = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $purchase_code,'user_id',$uid[0]['user_id'],'branch_id',$tid);
        if ($this->input->post()) {
            $post = $this->input->post();
    
            // Gather form data
            $vender_id = $post['vender_name'];
            $stock_place_name = $post['stock_place_name'];
            $user_id = $post['uid'];
             $purchase_code = $post['purchase_code'];
            $date = $post['purchase_date'];
            $discount_type = $post['discount_type'];
            
            $discount_value = floatval($post['discount_value']);
            $total_quantity = floatval($post['total_quantity']);
             $sub_total = floatval($post['sub_total']);
             $grand_total = floatval($post['grand_total']);
            $paid = floatval($post['paid']);
            $mode = $post['mode'];
            //  $ppid = $post['p_p_id'];
            $bank = floatval($post['bank']);
            $discount_amountt = "";
        
            if($post['discount_type'] == 'rupee'){
                $discount_amountt =  $post['discount_value'];
            } else{ 
                $discount_am = $post['sub_total'] * $post['discount_value'];
                $discount_amountt = $discount_am/100;
            }
            $due = $grand_total - $paid;
         $return_code = $this->generate_return_code($uid[0]['user_id']); 
            // Prepare product arrays
              $available_quantities = $post['available_quantity'];
            $product_names = $post['p_name'] ?? [];
             $product_ids = $post['p_id'] ?? [];
            $packings = $post['packing'] ?? [];
            $quantities = $post['quantity'] ?? [];
             $t_quantity = $post['t_quantity'] ?? [];
            $unit_rates = $post['unit_rate'] ?? [];
            $units = $post['unit'] ?? [];
            $exp_dates = $post['exp_date'] ?? [];
            $HSN_code = $post['HSN_code'];
            $p_prices = $post['p_price'] ?? [];
            $mrps = $post['mrp'] ?? [];
            $selling_prices = $post['selling_price'] ?? [];
            $gst_percentages = $post['tax'] ?? [];
             $gst_type = $post['tax_type'] ?? [];
            $gst_amounts = $post['tax_amount'] ?? [];
            $total_prices = $post['total_price'] ?? [];
           
            // Insert invoice items
            foreach ($product_names as $index => $product_name) {
                    $new_available_quantity = $available_quantities[$index] - $quantities[$index];
                // Prepare data for each row
                $data_to_insert = [
                    'vender_name' => $vender_id,
                    'date' => $date,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
               'return_code' => $return_code,
                 'purchase_code' => $purchase_code,
                    'stock_place_name' => $stock_place_name,
                    'product_name' => $product_name,
                      'p_id' =>$product_ids[$index],
                    'packing' => $packings[$index],
                    'quantity' => $quantities[$index],
                    'availabile_quantity' =>  $new_available_quantity,
                    'unit_rate' => $unit_rates[$index],
                    'unit' => $units[$index],
                    'gst_percent' => $gst_percentages[$index],
                     'tax_type' => $gst_type[$index],
                    'gst_tax' => $gst_amounts[$index],
                    'exp_date' => $exp_dates[$index],
                    'HSN_code' => $HSN_code[$index],
                     'p_price' => $p_prices[$index],
                    'mrp' => $mrps[$index],
                    'selling_price' => $selling_prices[$index],
                    'total_price' => $total_prices[$index],
                    'grand_total' => $grand_total,
                    'discount_value' => $discount_value,
                    'discount_type' => $discount_type,
                    'discount_amount' => $discount_amountt,
                    'total_quantity' => $total_quantity,
                   't_q' => $t_quantity[$index],
                    'sub_total' => $sub_total,
                ];
    
                // Insert data into the purchase_product table
                  $savedata = $this->CommonModal->insertRowReturnId('return_purchase', $data_to_insert);
      if ($savedata) {
        // Fetch the current selling_quantity for the product
        $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
        $return = $select[0]['return_quantity'] + $quantities[$index];

        // Update available_quantity in the purchase_product table for the current product
        $updatedata = $this->CommonModal->updateColumnValue(
            'purchase_product',            // Table name
            'p_id',                        // Column to match (product ID)
            $product_ids[$index],          // Product ID to update
            'availabile_quantity',         // Column to update (available_quantity)
            $new_available_quantity        // New available quantity
        );
        $updatestatusdata = $this->CommonModal->updateColumnValue(
            'purchase_product',            // Table name
            'p_id',                        // Column to match (product ID)
            $product_ids[$index],          // Product ID to update
            'status',         // Column to update (available_quantity)
            1       // New available quantity
        );
        // Update selling_quantity in the purchase_product table for the current product
        $updatesellingdata = $this->CommonModal->updateColumnValue(
            'purchase_product',            // Table name
            'p_id',                        // Column to match (product ID)
            $product_ids[$index],          // Product ID to update
            'return_quantity',            // Column to update (selling_quantity)
            $return                       // New selling quantity
        );

        // Error handling for update failure
        if (!$updatedata || !$updatesellingdata ) {
            // Handle update error
            $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
            redirect(base_url('Branch_Dashboard/invoice/' . $tid));
            return;
        }
      }else {
                    // Handle insert error
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding invoice item.</div>');
                    redirect(base_url('Branch_Dashboard/prodct/' . encryptId($tid)));
                    return;
                }
            }
    
            // Insert payment data if paid amount is provided
            if ($paid >= 0) {
                $pay_to_insert = [
                    'vender_id' => $vender_id,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                   'purchase_code' => $purchase_code, 
                   'return_code' => $return_code,
                    'paid' => $paid,
                    'mode' => $mode,
                    'total' => $grand_total,
                    'due' => $due,
                    'bank' => $bank,
                ];
    
                $savedata1 = $this->CommonModal->insertRowReturnId('return_purchase_payment', $pay_to_insert);
    
                if (!$savedata1) {
                    // Handle insert error
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding payment information.</div>');
                    redirect(base_url('Branch_Dashboard/product/' . encryptId($tid)));
                    return;
                }
            }
    
            // Success message and redirection
            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
            redirect(base_url('Branch_Dashboard/print_return_purchase/' . encryptId($tid) . '/' . $return_code));
        } else {
    
           $data['product_list'] = $this->CommonModal->getRowById('product','user_id',$uid[0]['user_id']);
            $this->load->view('branch/return_product', $data);
      }
}

public function edit_return()
{
    $data['title'] = "Edit Return Product";
    $data['tag'] = "edit";
    $tid = $this->input->get('user_id'); // User ID
    $return_code = $this->input->get('return_code'); 

    // Fetch necessary data
    $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
       $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
          $data['vender'] = $this->CommonModal->getRowById('vender','user_id',$uid[0]['user_id']);
        $data['product_list'] = $this->CommonModal->getRowById('product','user_id',$uid[0]['user_id']);
        $data['stock'] = $this->CommonModal->getRowById('stock_place','user_id',$uid[0]['user_id']);
          $data['account'] = $this->CommonModal->getRowById('account','user_id',$uid[0]['user_id']);
    $data['product'] = $this->CommonModal->getRowByMultitpleId('return_purchase', 'return_code', $return_code,'user_id',$uid[0]['user_id'],'branch_id',$tid);

    if ($this->input->post()) {
        $post = $this->input->post();
        
        // Extract necessary fields
        $vender_id = $post['vender_name'];
        $stock_place_name = $post['stock_place_name'];
        $user_id = $post['uid'];
        $purchase_code = $post['purchase_code'];
        $date = $post['purchase_date'];
        $discount_type = $post['discount_type'];
        $discount_value = floatval($post['discount_value']);
        $total_quantity = floatval($post['total_quantity']);
        $sub_total = floatval($post['sub_total']);
        $grand_total = floatval($post['grand_total']);
        $paid = floatval($post['paid']);
        $mode = $post['mode'];
        $ppid = $post['p_p_id'];
        $bank = floatval($post['bank']);
        $due = $grand_total - $paid;
        $discount_amountt = "";
        
        if($post['discount_type'] == 'rupee'){
            $discount_amountt = $post['discount_value'];
        } else{ 
            $discount_am = $post['sub_total'] * $post['discount_value'];
            $discount_amountt = $discount_am/100;
        }
        // Product arrays
        $available_quantities = $post['available_quantity'];
        $product_names = $post['p_name'] ?? [];
        $product_ids = $post['p_id'] ?? [];
        $packings = $post['packing'] ?? [];
        $quantities = $post['quantity'] ?? [];
        $t_quantity = $post['t_quantity'] ?? [];
        $ids = $post['id'] ?? [];
        $unit_rates = $post['unit_rate'] ?? [];
        $units = $post['unit'] ?? [];
        $exp_dates = $post['exp_date'] ?? [];
        $HSN_code = $post['HSN_code'];
        $p_prices = $post['p_price'] ?? [];
        $mrps = $post['mrp'] ?? [];
        $selling_prices = $post['selling_price'] ?? [];
        $gst_percentages = $post['tax'] ?? [];
         $gst_type = $post['tax_type'] ?? [];
        $gst_amounts = $post['tax_amount'] ?? [];
        $total_prices = $post['total_price'] ?? [];

        // Start transaction
        $this->db->trans_start();

        // Insert or update each product
        foreach ($product_names as $index => $product_name) {
            // Fetch existing quantity data
       $rp = $this->CommonModal->getRowById('return_purchase', 'id', $ids[$index]);

// Check if the retrieved data is valid
if (!empty($rp) && isset($rp[0]['quantity'])) {
    // Calculate the difference between the current and previous quantities
    if ($quantities[$index] > $rp[0]['quantity']) {
        // If the new quantity is greater, subtract the difference from available quantity
        $quantity_diff = $quantities[$index] - $rp[0]['quantity'];
        $new_available_quantity = $available_quantities[$index] - $quantity_diff;
    } elseif ($rp[0]['quantity'] > $quantities[$index]) {
        // If the new quantity is less, add the difference to available quantity
        $quantity_diff = $rp[0]['quantity'] - $quantities[$index];
        $new_available_quantity = $available_quantities[$index] + $quantity_diff;
    } else {
        // If the quantities are equal, keep the available quantity the same
        $new_available_quantity = $available_quantities[$index];
    }
} else {
    // Handle case where no data is found or quantity is not set
    $new_available_quantity = $available_quantities[$index]; // Keep it unchanged or handle as needed
}
            // Calculate new available quantity
           

            // Prepare data to update
            $data_to_insert = [
                'vender_name' => $vender_id,
                'date' => $date,
                'user_id' => $user_id,
                'branch_id' => $tid,
                'purchase_code' => $purchase_code,
                'stock_place_name' => $stock_place_name,
                'product_name' => $product_name,
                'packing' => $packings[$index],
                 'p_id' =>$product_ids[$index],
                'quantity' => $quantities[$index],
                'availabile_quantity' => $new_available_quantity,
                'unit_rate' => $unit_rates[$index],
                'unit' => $units[$index],
                'gst_percent' => $gst_percentages[$index],
                 'tax_type' => $gst_type[$index],
                'gst_tax' => $gst_amounts[$index],
                'exp_date' => $exp_dates[$index],
                'HSN_code' => $HSN_code[$index],
                'p_price' => $p_prices[$index],
                'mrp' => $mrps[$index],
                'selling_price' => $selling_prices[$index],
                'total_price' => $total_prices[$index],
                'grand_total' => $grand_total,
                'discount_value' => $discount_value,
                'discount_type' => $discount_type,
                'discount_amount' => $discount_amountt,
                'total_quantity' => $total_quantity,
                't_q' => $t_quantity[$index],
                'sub_total' => $sub_total,
            ];
      $savedata =   $this->CommonModal->updateRowById('return_purchase', 'id', $ids[$index], $data_to_insert);
     if ($savedata) {
    
     

        $updatedata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'availabile_quantity', $new_available_quantity);
        // Update selling_quantity in the purchase_product table for the current product
        //   $rp = $this->CommonModal->getRowById('return_purchase', 'id', $ids[$index]);
        // Fetch the current selling_quantity for the product
     $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);

if (!empty($rp) && isset($rp[0]['quantity']) && !empty($select) && isset($select[0]['return_quantity'])) {
    // Calculate the difference between the new and previous quantities
    if ($quantities[$index] > $rp[0]['quantity']) {
        // Increase in quantity - add the difference to return_quantity
        $quantity_diff = $quantities[$index] - $rp[0]['quantity'];
        $updated_return_quantity = $select[0]['return_quantity'] + $quantity_diff;
               $updatesellingdata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'return_quantity', $updated_return_quantity);
    } elseif ($rp[0]['quantity'] > $quantities[$index]) {
        // Decrease in quantity - subtract the difference from return_quantity
        $quantity_diff = $rp[0]['quantity'] - $quantities[$index];
        $updated_return_quantity = $select[0]['return_quantity'] - $quantity_diff;
               $updatesellingdata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'return_quantity', $updated_return_quantity);
    } else {
        // No change in quantity - keep return_quantity as it is
        $updated_return_quantity = $select[0]['return_quantity'];
               $updatesellingdata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'return_quantity', $updated_return_quantity);
    }
} else {
    // Handle case where data is missing or undefined
    $updated_return_quantity = $select[0]['return_quantity'] ?? 0; 
           $updatesellingdata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'return_quantity', $updated_return_quantity);// Keep it unchanged or set to default
}



      
        
      } 
            

        
          
        }

        // Insert payment if any amount is paid
        if ($paid >= 0) {
            $pay_to_insert = [
                'vender_id' => $vender_id,
                'user_id' => $user_id,
                'branch_id' => $tid,
                'paid' => $paid,
                'mode' => $mode,
                'total' => $grand_total,
                'due' => $due,
                'bank' => $bank,
            ];
            $savedata1 = $this->CommonModal->updateRowById('return_purchase_payment', 'id', $ppid, $pay_to_insert);
             if ($savedata1) {
    // Get all rows after the given ID for the same invoice
    $rows_after_id = $this->CommonModal->getRowsAfterId('return_purchase_payment', 'id', $ppid,'return_code', $return_code);

    if ($rows_after_id) {
        foreach ($rows_after_id as $row) {
            // Fetch the row just before the current row for recalculating due
            
            $rows_before_id = $this->CommonModal->getRowsBeforeId('return_purchase_payment', 'id', $row['id'], 'return_code', $return_code);

            // Ensure that there is a previous row to calculate the due amount
            $previous_due = $rows_before_id ? $rows_before_id[0]['due'] : $due;

            // Calculate the new due amount
            $due2 = $previous_due - $row['paid'];

            $latest_data = [
                    'vender_id' => $vender_id,
                 'user_id' => $user_id,
                'branch_id' => $tid,
            
                  
                    'paid' => $row['paid'],
                    'mode' => $row['mode'],
                    'total' => $grand_total,
                    'due' => $due2,
                    'bank' => $row['bank'],
                ];

            // Update each row with the recalculated due
            $this->CommonModal->updateRowById('return_purchase_payment', 'id', $row['id'], $latest_data);
        }
    }
} 
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
            redirect(base_url('Branch_Dashboard/invoice/' . $tid));
            return;
        } else {
            $this->db->trans_commit();
            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
                 redirect(base_url('Branch_Dashboard/print_return_purchase/' . encryptId($tid) . '/' . $return_code));
        }
    } else {
         $data['product_list'] = $this->CommonModal->getRowById('product','user_id',$uid[0]['user_id']);
        $this->load->view('branch/edit_return', $data);
    }
}


    public function print_return_purchase($id, $return_code)
    {
        $data['title'] = "Return Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        
 
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
          $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['user_main'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);

        $data['purchase_product'] = $this->CommonModal->getRowById('return_purchase', 'return_code', $return_code);
                $data['purchase_product'] = $this->CommonModal->getRowByMultitpleId('return_purchase', 'return_code', $return_code,'user_id',$uid[0]['user_id'],'branch_id',$tid);
        // Load the view
        $this->load->view('branch/return_purchase_invoice', $data);
    }

     public function add_payment($id)
        {

  $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
            if (count($_POST) > 0) {

                $post = $this->input->post();

$post['due']= $post['due']-$post['paid'];

            



                $savedata = $this->CommonModal->insertRowReturnId('payment', $post);

                if ($savedata) {

                    $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');

                } else {

                    $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');

                }

                  redirect(base_url('Branch_Dashboard/invoice/' . $id));

            } else {

            redirect(base_url('Branch_Dashboard/invoice/' . $id));

            }

        }
         public function add_purchase_payment($id)
        {

  $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
            if (count($_POST) > 0) {

                $post = $this->input->post();

$post['due']= $post['due']-$post['paid'];

            



                $savedata = $this->CommonModal->insertRowReturnId('purchase_payment', $post);

                if ($savedata) {

                    $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');

                } else {

                    $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');

                }

                  redirect(base_url('Branch_Dashboard/product/' . $id));

            } else {

            redirect(base_url('Branch_Dashboard/product/' . $id));

            }

        }
           public function add_return_purchase_payment($id)
        {

  $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
            if (count($_POST) > 0) {

                $post = $this->input->post();

$post['due']= $post['due']-$post['paid'];

            



                $savedata = $this->CommonModal->insertRowReturnId('return_purchase_payment', $post);

                if ($savedata) {

                    $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');

                } else {

                    $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');

                }

                  redirect(base_url('Branch_Dashboard/return/' . $id));

            } else {

            redirect(base_url('Branch_Dashboard/return/' . $id));

            }

        }

   public function add_return_payment($id)
        {

  $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
            if (count($_POST) > 0) {

                $post = $this->input->post();

$post['due']= $post['due']-$post['paid'];

            



                $savedata = $this->CommonModal->insertRowReturnId('return_invoice_payment', $post);

                if ($savedata) {

                    $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');

                } else {

                    $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');

                }

                  redirect(base_url('Branch_Dashboard/view_return_invoice/' . $id));

            } else {

            redirect(base_url('Branch_Dashboard/view_return_invoice/' . $id));

            }

        }

public function get_product($query = 'all') {
    $this->load->model('CommonModal');
    
    // Retrieve user ID from GET request
    $uid = $this->input->get('id', true);

    // Validate input
    if (empty($uid)) {
        echo json_encode(['error' => 'User ID is required.']);
        return;
    }

    try {
        // Fetch products based on the query
        if ($query === 'all') {
            // Fetch all products for the given user ID
            $products = $this->CommonModal->getRowById('product', 'user_id', $uid);
        } else {
            // Fetch products matching the search query and user ID
            $products = $this->CommonModal->searchProductsByName($query, $uid);
        }

        // Return products as JSON
        echo json_encode(!empty($products) ? $products : []);
    } catch (Exception $e) {
        // Log the error
        log_message('error', 'Error in get_product: ' . $e->getMessage());
        echo json_encode(['error' => 'An unexpected error occurred.']);
    }
}


    
    public function logout()
    {

        $this->session->unset_userdata('admin_id');

        redirect('Admin');
    }
}
