<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {

        parent::__construct();

        if (sessionId('admin_id') == "") {

            redirect(base_url('admin'));

        }

        date_default_timezone_set("Asia/Kolkata");

    }
	public function index()
	{
        $data['title'] = "Home";       
        $data['institution'] = $this->CommonModal->getNumRow('institutions');
        $data['active'] = $this->CommonModal->getNumWhereRows('institutions','status',1);
        $data['deactive'] = $this->CommonModal->getNumWhereRows('institutions','status',0);
        // $data['agent'] = $this->CommonModal->getNumRow('agent');
        // $data['activeagent'] = $this->CommonModal->getNumWhereRows('agent','status',1);
        // $data['deactiveagent'] = $this->CommonModal->getNumWhereRows('agent','status',0);

		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');


		$this->load->view('index',$data);

	}

	public function profile(){
        $data['title'] = "Admin Profile";

		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');

		// $data['testimonials'] = $this->CommonModal->getAllRows('testimonial');

		$this->load->view('admin_profile',$data);
	}
	public function update_profile($id)
    {

    $data['title'] = 'Update';
    $data['tag'] = 'admin';
      $tid = $id;
     $data['admin'] = $this->CommonModal->getRowById('admin', 'admin_id', $tid);

     	 if (count($_POST) > 0) {

            $post = $this->input->post();
            $image_url = $post['image'];
           if ($_FILES['image']['name'] != '') {

                $img = imageUpload('image', 'uploads/admin/');

                $post['image'] = $img;

                if ($image_url != "") {

                    unlink('uploads/admin/' . $image_url);

                }

            }

            $category_id = $this->CommonModal->updateRowById('admin', 'admin_id', $tid, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            }
            redirect(base_url('profile'));

        } else {

            $this->load->view('update_profile', $data);

        }

    }
    private function send_email($to_email, $username, $password) {
        $this->load->library('email');
    
        $this->email->from('noreply@yourdomain.com', 'Your Company');
        $this->email->to($to_email);
        $this->email->subject('Your Registration is Successful!');
        
        $message = "
            <p>Dear User,</p>
            <p>Your registration was successful. Here are your login details:</p>
            <p><strong>Username:</strong> $username</p>
            <p><strong>Password:</strong> $password</p>
            <p>You can now log in to your account.</p>
            <p>Thank you!</p>
        ";
    
        $this->email->message($message);
        $this->email->set_mailtype('html');
    
        if ($this->email->send()) {
            return true;
        } else {
            log_message('error', 'Email sending failed: ' . $this->email->print_debugger());
            return false;
        }
    }
	public function view_institution(){
		$data['title'] = "View institution";
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');
        $img = $this->input->get('img');
		
        if ($BdID) {
            $this->CommonModal->deleteRowById('institutions', array('id' => $BdID));
            // $this->CommonModal->deleteRowById('agent_customer', array('customer_id' => $BdID));

            if ($img) {
                unlink('./uploads/institution/' . $img);
            }
            if ($tag == '0') {
                redirect(base_url('Home/view_institution?tag=active'));
            } else {
                redirect(base_url('Home/view_institution?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['institution'] = $this->CommonModal->getRowByIdDesc('institutions', 'status', '1','id','DESC');
        } else {
            $data['institution'] = $this->CommonModal->getRowByIdDesc('institutions', 'status', '0','id','DESC');
        }
        $this->load->view('view_institution', $data);
	}
	public function add_institution()
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
                
            $password = bin2hex(random_bytes(8));
            // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $post['password'] = $password;
            $inst_id = $this->CommonModal->insertRowReturnId('institutions', $post);
            $plan = $this->CommonModal->getRowById('plan', 'id', $post['plan_id']);


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

//             if ($savedata) {
//                 $agent_customer_data = [
//                     'customer_id' => $savedata,
//                     'agent_id' => $post['agent_id'] // Ensure 'agent_id' is provided in the form
//                 ];
    
//                 // Insert into 'agent_customer' table
//                 $agent_customer_id = $this->CommonModal->insertRowReturnId('agent_customer', $agent_customer_data);
//                 if ($agent_customer_id) {
//             $this->session->set_flashdata('msg', '<div class="alert alert-success">Added Successfully</div>');

//             // Send email to the user
//             $this->load->library('email');

//             // Email configuration
//             $config['mailtype'] = 'text';  // Use plain text instead of HTML
//             $this->email->initialize($config);

//             $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
//             $this->email->to($post['email']);  // Send to user's email
//             $this->email->subject('Registration Successful');
            
//             // Construct email message in plain text format
//            $message = "Dear " . htmlspecialchars($post['name']) . ",\n\n";
// $message .= "We are pleased to inform you that your registration for our software has been successfully completed. Below are your login credentials:\n\n";
// $message .= "Username: " . htmlspecialchars($post['username']) . "\n";
// $message .= "Password: " . htmlspecialchars($post['password']) . "\n\n";
// $message .= "Please keep your login credentials secure and do not share them with anyone.\n\n";
// $message .= "You can log in to the software using the following link: " . base_url('Admin') . "\n\n";
// $message .= "If you encounter any issues, please feel free to contact our support team.\n\n";
// $message .= "Thank you for choosing our software!\n\n";
// $message .= "Best regards,\n";
// $message .= "The Namami Software Team";
            
//             $this->email->message($message);  // Use plain text message

//             // Check if email was sent successfully
//             if (!$this->email->send()) {
//                 log_message('error', 'Email could not be sent to ' . $post['email']);
//             }

//         } } else {
//             $this->session->set_flashdata('msg', '<div class="alert alert-danger">Error while saving data</div>');
//         }

            redirect(base_url('view_institution'));

        } } else {

            $this->load->view('add_institution', $data);

        }

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
                        redirect(base_url('../view/payment-page.php?plan_id='.$post['plan_id']));
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

//             if ($savedata) {
//                 $agent_customer_data = [
//                     'customer_id' => $savedata,
//                     'agent_id' => $post['agent_id'] // Ensure 'agent_id' is provided in the form
//                 ];
    
//                 // Insert into 'agent_customer' table
//                 $agent_customer_id = $this->CommonModal->insertRowReturnId('agent_customer', $agent_customer_data);
//                 if ($agent_customer_id) {
//             $this->session->set_flashdata('msg', '<div class="alert alert-success">Added Successfully</div>');

//             // Send email to the user
//             $this->load->library('email');

//             // Email configuration
//             $config['mailtype'] = 'text';  // Use plain text instead of HTML
//             $this->email->initialize($config);

//             $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
//             $this->email->to($post['email']);  // Send to user's email
//             $this->email->subject('Registration Successful');
            
//             // Construct email message in plain text format
//            $message = "Dear " . htmlspecialchars($post['name']) . ",\n\n";
// $message .= "We are pleased to inform you that your registration for our software has been successfully completed. Below are your login credentials:\n\n";
// $message .= "Username: " . htmlspecialchars($post['username']) . "\n";
// $message .= "Password: " . htmlspecialchars($post['password']) . "\n\n";
// $message .= "Please keep your login credentials secure and do not share them with anyone.\n\n";
// $message .= "You can log in to the software using the following link: " . base_url('Admin') . "\n\n";
// $message .= "If you encounter any issues, please feel free to contact our support team.\n\n";
// $message .= "Thank you for choosing our software!\n\n";
// $message .= "Best regards,\n";
// $message .= "The Namami Software Team";
            
//             $this->email->message($message);  // Use plain text message

//             // Check if email was sent successfully
//             if (!$this->email->send()) {
//                 log_message('error', 'Email could not be sent to ' . $post['email']);
//             }

//         } } else {
//             $this->session->set_flashdata('msg', '<div class="alert alert-danger">Error while saving data</div>');
//         }

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
	public function update_institution($id)
    {
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
        // $data['agent'] = $this->CommonModal->getAllRows('agent'); 
    $data['title'] = 'Update Member';
    $data['tag'] = 'edit';
      $tid = $id;
     $data['institution'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
     $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

     $tag1 = $this->input->get('tag');
     	 if (count($_POST) > 0) {

            $post = $this->input->post();
            $image_url = $post['image'];
         
            // $agent_customer_data = [
               
            //     'agent_id' => $post['agent_id'] // Ensure 'agent_id' is provided in the form
            // ];
            $category_id = $this->CommonModal->updateRowById('institutions', 'id', $tid, $post);
            // $category_id1 = $this->CommonModal->updateRowById('agent_customer', 'customer_id', $tid, $agent_customer_data);
            $plan = $this->CommonModal->getRowById('plan', 'id', $post['plan_id']);


            $start_date = $post['date']; 
            $expiry_date = date('Y-m-d', strtotime($start_date . ' + ' . $plan[0]['numbers_of_days'] . ' days'));
            $subscription = [
                                    
                                    'plan_type' => $post['plan_id'], // Ensure 'agent_id' is provided in the form
                                    'start_date' => $start_date , // Ensure 'agent_id' is provided in the form
                                    'expire_date' =>  $expiry_date ,// Ensure 'agent_id' is provided in the form
                                    'price' => $plan[0]['price'] // Ensure 'agent_id' is provided in the form


                                ];
            $this->CommonModal->updateRowById('subscription', 'inst_id', $tid,$subscription);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if($tag1=='0') {
                redirect(base_url('Home/view_institution?tag=active'));
                } else{
                redirect(base_url('Home/view_institution?tag=deactive'));
    
                }

        } else {

            $this->load->view('add_institution', $data);

        }

    }
	
	public function deactiveinstitution($id){
		$data['status'] = 1   ;
		$status_id = $this->CommonModal->updateRowById('institutions', 'id', $id, $data);
	$institution = $this->CommonModal->getRowById('institutions', 'id', $id);
	 if ($status_id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Deactive Successfully</div>');

            // Send email to the user
            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
            $this->email->to($institution[0]['email']);  // Send to user's email
            $this->email->subject('Account Deactive');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($institution[0]['name']) . ",\n\n";
$message .= "We would like to inform you that your account associated with our software has been deactivated. This action has been taken due to Payment Issue.\n\n";
$message .= "If you believe this action was taken in error or wish to reactivate your account, please contact our support team at info@namami.co.in .\n\n";
$message .= "We appreciate your understanding and are here to assist you with any concerns you may have.\n\n";
$message .= "Thank you for your time and cooperation.\n\n";
$message .= "Best regards,\n";
$message .= "The Namami Software Team";
            
            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $institution[0]['email']);
            }

        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Error while saving data</div>');
        }
		redirect(base_url('Home/view_institution?tag=deactive'));
	
	}
	public function activeinstitution($id){
		$data['status'] = 0    ;
		$status_id = $this->CommonModal->updateRowById('institutions', 'id', $id, $data);
	$data['institution'] = $this->CommonModal->getRowById('institutions', 'id', $id);
	$institution = $this->CommonModal->getRowById('institutions', 'id', $id);

		if ($status_id) {
			$this->session->set_userdata('msg', '<div class="alert alert-success"> Active successfully</div>');
			 // Send email to the user
            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
            $this->email->to($institution[0]['email']);  // Send to user's email
            $this->email->subject('Account Active');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($institution[0]['name']) . ",\n\n";
$message .= "We are pleased to inform you that your account associated with our software has been successfully activated. You can now log in and start using our services.\n\n";
$message .= "Below are your login credentials:\n";
$message .= "Username: " . htmlspecialchars($institution[0]['username']) . "\n";
$message .= "Password: " . htmlspecialchars($institution[0]['password']) . "\n\n";
$message .= "Please keep your login details secure and do not share them with anyone.\n\n";
$message .= "You can access the software using the following link: " . base_url('Admin') . "\n\n";
$message .= "If you have any questions or need assistance, feel free to contact our support team at info@namami.co.in.\n\n";
$message .= "Thank you for choosing our services. We look forward to serving you!\n\n";
$message .= "Best regards,\n";
$message .= "The Namami Software Team";
            
            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $institution[0]['email']);
            }
		} else {
			$this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');
		}
		redirect(base_url('view_institution'));
	
	}
    public function view_plan(){
		$data['title'] = "View plan";
	

		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');
      
		
        if ($BdID) {
            $this->CommonModal->deleteRowById('plan', array('id' => $BdID));
           

          
            if ($tag == '0') {
                redirect(base_url('Home/view_plan?tag=active'));
            } else {
                redirect(base_url('Home/view_plan?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['plan'] = $this->CommonModal->getRowByIdDesc('plan', 'status', '1','id','DESC');
        } else {
            $data['plan'] = $this->CommonModal->getRowByIdDesc('plan', 'status', '0','id','DESC');
        }
        $this->load->view('view_plan', $data);

	}
	public function add_plan()
    {

        $data['title'] = "Add Member";
        $data['tag'] = "add";
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
    
        if (count($_POST) > 0) {

            $post = $this->input->post();
      
            $savedata = $this->CommonModal->insertRowReturnId('plan', $post);


            redirect(base_url('view_plan'));

        } else {

            $this->load->view('add_plan', $data);

        }

    }

	public function update_plan($id)
    {
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
     
    $data['title'] = 'Update plan';
    $data['tag'] = 'edit';
      $tid = $id;
     $data['plan'] = $this->CommonModal->getRowById('plan', 'id', $tid);
     $tag1 = $this->input->get('tag');
     	 if (count($_POST) > 0) {

            $post = $this->input->post();
           

            $category_id = $this->CommonModal->updateRowById('plan', 'id', $tid, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            }
            if($tag1=='0') {
                redirect(base_url('Home/view_plan?tag=active'));
                } else{
                redirect(base_url('Home/view_plan?tag=deactive'));
    
                }

        } else {

            $this->load->view('add_plan', $data);

        }

    }
	
	public function deactiveplan($id){
		$data['status'] = 1    ;
		$status_id = $this->CommonModal->updateRowById('plan', 'id', $id, $data);
	
		redirect(base_url('Home/view_plan?tag=deactive'));
	
	}
	public function activeplan($id){
		$data['status'] = 0    ;
		$status_id = $this->CommonModal->updateRowById('plan', 'id', $id, $data);
	$data['plan'] = $this->CommonModal->getRowById('plan', 'id', $id);
	

    redirect(base_url('Home/view_plan?tag=active'));
	}
	
}