<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Admin extends CI_Controller

{



    public function index()
{
    $data['title'] = " Login";
    $data['favicon'] = "assets/images/logo.png";

    // Check if the user is logged in by verifying session data
    if ($this->session->userdata('id')) {
        $role = $this->session->userdata('role');

        // Redirect based on the role
        if ($role === 'admin') {
            redirect(base_url('Home')); // Redirect admin to the admin dashboard
        } elseif ($role === 'user') {
            $user_id = $this->session->userdata('id');
            redirect(base_url('Admin_dashboard/index/' . encryptId($user_id))); // Redirect user to the user dashboard
        }
    } else {
        // If not logged in, show the login page
        $this->load->view('login', $data);
    }
}
public function registration()
{
    $data['title'] = " Registration";
    $data['favicon'] = "assets/images/logo.png";
    $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

    
        $this->load->view('registration', $data);
    
}




    public function adminlogin()
{
    // Set validation rules for login form fields
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');

    // Run form validation
    if ($this->form_validation->run()) {
        // Get username and password from the POST data
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Step 1: Check in the 'admin' table for admin login
        $admin_data = $this->CommonModal->getRowById('admin', 'email', $email);
 $user_data = $this->CommonModal->getRowById('institutions', 'email', $email);

        if ($admin_data) {
            // Fetch admin details from the database result
            $id = $admin_data[0]['admin_id'];
            $f_username = $admin_data[0]['email'];
            $f_password = $admin_data[0]['password'];
            $role = $admin_data[0]['role']; 

            // Verify password for admin
            if ($password == $f_password) {
                // Set session data for admin
                $this->session->set_userdata(array('admin_id' => $id, 'email' => $email, 'role' => 'admin'));

                // Redirect to the admin dashboard
                redirect('Home');
            } else {
                flashData('login_error', 'Enter a valid Password for Admin.');
            }
        } elseif($user_data) {
            // Step 2: Check in the 'users' table for user login if not found in the admin table
            // $user_data = $this->CommonModal->getRowById('users', 'username', $username);


            if ($user_data) {
                // Fetch user details from the database result
                $id = $user_data[0]['id'];
                $f_username = $user_data[0]['username'];
                $f_password = $user_data[0]['password'];
                $role = $user_data[0]['role']; 
                $status = $user_data[0]['status']; 

              if($status==0){
                // Verify password for user
                if ($password == $f_password) {
                    // Set session data for user
                    $this->session->set_userdata(array('id' => $id,'status' => 0, 'email' => $email, 'role' => 'user'));

                    // Redirect to the user dashboard
                    redirect('Admin_Dashboard/index/' . encryptId($id));
                } else {
                    flashData('login_error', 'Enter a valid Password for User.');
                }
            } else{
                flashData('login_error', 'Package Is Expire');
            }
            } else {
                // If no user found in either table
                flashData('login_error', 'Enter a valid Username.');
            }
        }else {
            // Step 2: Check in the 'users' table for user login if not found in the admin table
            $branch_data = $this->CommonModal->getRowById('students', 'email', $email);

            if ($branch_data) {
                // Fetch user details from the database result
                $id = $branch_data[0]['id'];
                $email = $branch_data[0]['username'];
                $f_password = $branch_data[0]['password'];
                $role = $branch_data[0]['role']; 
                $status = $branch_data[0]['status']; 

              if($status==0){
                // Verify password for user
                if ($password == $f_password) {
                    // Set session data for user
<<<<<<< HEAD
                    $this->session->set_userdata(array('id' => $id,'status' => 0, 'email' => $email, 'role' => 'student'));
=======
                    $this->session->set_userdata(array('id' => $id,'status' => 1, 'username' => $f_username,'role' => 'branch'));
>>>>>>> bda2ac486d94bc03e4fad91edc06622e004d2ad3

                    // Redirect to the user dashboard
                    redirect('Admin_Dashboard/student_profile/' . encryptId($id));
                } else {
                    flashData('login_error', 'Enter a valid Password for  Student.');
                }
            } else{
                flashData('login_error', 'Package Is Expire');
            }
            } else {
                // If no user found in either table
                flashData('login_error', 'Enter a valid Username.');
            }
        }
    }

    // Load the login view if form validation fails or user needs to try again
    $this->load->view('login');
}





public function add_institution_direct()
{

    $data['title'] = "Add Member";
    $data['tag'] = "add";
    $data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
    $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

    if (count($_POST) > 0) {

        $post = $this->input->post();
        $existing_email = $this->CommonModal->getRowById('institutions', 'email', $post['email']);

        if (!empty($existing_email)) {
            echo "<script>alert('Email is already registered!');</script>";
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $plan = $this->CommonModal->getRowById('plan', 'id', $post['plan_id']);

            if (!empty($plan) && isset($plan[0])) {
                $plan_price = $plan[0]['price'];
    
                if ($plan_price > 0) {
                    // Redirect user to payment page
                    $_SESSION['temp_registration'] = $post; // Store user data in session
                    redirect(base_url('Admin/payment?plan_id=' . $post['plan_id']));
                    exit();
                } else{
        $password = bin2hex(random_bytes(8));
        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $post['password'] = $password;
        $inst_id = $this->CommonModal->insertRowReturnId('institutions', $post);
  


        $start_date = $post['date']; 
        $expiry_date = date('Y-m-d', strtotime($start_date . ' + ' . $plan[0]['numbers_of_days'] . ' days'));
        $subscription = [
                                'inst_id' => $inst_id,
                                'plan_type' => $post['plan_id'], // Ensure 'agent_id' is provided in the form
                                'start_date' => $start_date , // Ensure 'agent_id' is provided in the form
                                'expire_date' =>  $expiry_date ,// Ensure 'agent_id' is provided in the form
                                'price' => $plan[0]['price'] // Ensure 'agent_id' is provided in the form


                            ];
        $this->CommonModal->insertRowReturnId('subscription',$subscription );

        // $this->send_email($post['email'], $post['email'], $password);

                         }  }else {
                            echo "<script>alert('Invalid plan selected.');</script>";
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                         redirect(base_url('thankyou'));

    }  }

}
public function thankyou(){
    $data['title'] = "Thankyou";
    $this->load->view('thankyou');
}
public function payment() {
    require 'vendor/autoload.php'; // Load Razorpay SDK

    // use Razorpay\Api\Api;

    $razorpay_key = "YOUR_RAZORPAY_KEY_ID";
    $razorpay_secret = "YOUR_RAZORPAY_SECRET";
   

    // Check if session data exists
    if (!$this->session->userdata('temp_registration') || !$this->input->get('payment_id')) {
        $this->session->set_flashdata('error', 'Invalid payment session.');
        redirect('registration');
    }
    $plan_id = $this->input->get('plan_id');

    if (!$this->session->userdata('temp_registration')) {
        $this->session->set_flashdata('error', 'Session expired! Please register again.');
        redirect(base_url('registration'));
        exit();
    }

    // ✅ Fetch Plan Details
    $plan = $this->CommonModal->getRowById('plan', 'id', $plan_id);
    if (empty($plan)) {
        $this->session->set_flashdata('error', 'Invalid plan selected.');
        redirect(base_url('registration'));
        exit();
    }

    // ✅ Set Order Details
    $api = new Api($this->razorpay_key, $this->razorpay_secret);
    $amount = $plan[0]['price'] * 100; // Convert to paise
    $order = $api->order->create([
        'receipt' => uniqid(),
        'amount' => $amount,
        'currency' => 'INR',
        'payment_capture' => 1
    ]);

    $data['title'] = "Payment";
    $data['plan'] = $plan[0];
    $data['order_id'] = $order['id'];
    $data['razorpay_key'] = $this->razorpay_key;

    $this->load->view('payment-page', $data);
}
public function process_payment() {

    require 'vendor/autoload.php'; // Load Razorpay SDK

    // use Razorpay\Api\Api;

    $api_key = "YOUR_RAZORPAY_KEY_ID";
    $api_secret = "YOUR_RAZORPAY_SECRET";
    $api = new Api($api_key, $api_secret);

    // Check if session data exists
    if (!$this->session->userdata('temp_registration') || !$this->input->get('payment_id')) {
        $this->session->set_flashdata('error', 'Invalid payment session.');
        redirect('registration');
    }

    // Verify Payment
    $payment_id = $this->input->get('payment_id');
    $payment = $api->payment->fetch($payment_id);

    if ($payment['status'] == 'captured') {
        // Payment successful → Register institution
        $post = $this->session->userdata('temp_registration');
        $password = bin2hex(random_bytes(8)); // Generate a random password
        $post['password'] = $password;

        // Insert Institution into database
        $inst_id = $this->CommonModal->insertRowReturnId('institutions', $post);

        // Store Payment Details
        $payment_data = [
            'inst_id' => $inst_id,
            'payment_id' => $payment_id,
            'amount' => $payment['amount'] / 100, // Convert back to rupees
            'status' => $payment['status']
        ];
        $this->CommonModal->insertRow('payments', $payment_data);

        // Assign Subscription Plan
        $plan = $this->CommonModal->getRowById('plan', 'id', $post['plan_id']);
        $start_date = date('Y-m-d');
        $expiry_date = date('Y-m-d', strtotime($start_date . ' + ' . $plan[0]['numbers_of_days'] . ' days'));

        $subscription = [
            'inst_id' => $inst_id,
            'plan_type' => $post['plan_id'],
            'start_date' => $start_date,
            'expire_date' => $expiry_date,
            'price' => $plan[0]['price']
        ];
        $this->CommonModal->insertRow('subscription', $subscription);

        // Send Email with Login Details
        $this->send_email($post['email'], $post['email'], $password);

        // Clear session data
        $this->session->unset_userdata('temp_registration');

        // Redirect to success page
        $this->session->set_flashdata('success', 'Registration successful! Login details sent to your email.');
        redirect('thankyou');
    } else {
        $this->session->set_flashdata('error', 'Payment failed. Please try again.');
        redirect('registration');
    }
}


    public function logout()

    {

        //load session library

        $this->load->library('session');

        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        redirect(base_url('admin'));

    }

}

