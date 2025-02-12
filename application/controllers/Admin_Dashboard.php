<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller {

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
        $tid = decryptId($id);
        $data['title'] = "Admin_Dashboard";       
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
    
        $subscription = $this->CommonModal->getRowById('subscription', 'inst_id', $tid);
        if ($subscription) {
            $today = date('Y-m-d');
            if ($subscription[0]['expire_date'] < $today) {
                redirect('Admin_Dashboard/plan_choose/'.$id);
            }
        }

        $this->load->view('user/dashboard', $data);

	}

	public function profile($id){
        $data['title'] = "Institution Profile";
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);


		$this->load->view('user/profile',$data);
	}
	public function update_profile($id)
    {

    $data['title'] = 'Update';
    // $data['tag'] = 'admin';
    $tid = decryptId($id);
    $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

     	 if (count($_POST) > 0) {

            $post = $this->input->post();
            $image_url = $post['logo'];
           if ($_FILES['logo']['name'] != '') {

                $img = imageUpload('logo', 'uploads/institution/');

                $post['logo'] = $img;

                if ($image_url != "") {

                    unlink('uploads/institution/' . $image_url);

                }

            }

            $category_id = $this->CommonModal->updateRowById('institutions', 'id', $tid, $post);

            if ($category_id) {
                echo "<script>alert(' Updated successfully');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                echo "<script>alert('Error To Updated');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error successfully</div>');
            }
            redirect(base_url('Admin_Dashboard/profile/'.$id));

        } 

    }
    public function change_password($id)
    {

    $data['title'] = 'Update Paasword';  
    $tid = decryptId($id);
    $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

     	 if (count($_POST) > 0) {

            $post = $this->input->post();
           

            $category_id = $this->CommonModal->updateRowById('institutions', 'id', $tid, $post);

            if ($category_id) {
                echo "<script>alert(' Updated successfully');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                echo "<script>alert('Error To Updated');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error successfully</div>');
            }
            redirect(base_url('Admin_Dashboard/profile/'.$id));

        } else{
        $this->load->view('user/change_password', $data);

        }

    }

    public function inst_fees($id){
        $data['title'] = "Institution Fees";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['fees'] = $this->CommonModal->getRowByIdDesc('fees', 'inst_id',$tid,'id','DESC');
        $BdID = decryptId($this->input->get('BdID'));
        if ($BdID) {
            $this->CommonModal->deleteRowById('fees', array('id' => $BdID));
            redirect(base_url('Admin_Dashboard/inst_fees/'.$id));

        }

		$this->load->view('user/fees',$data);
	}
    public function add_fees($id)
    {

        $data['title'] = "Add fees";
        $data['tag'] = "add";
        $tid = decryptId($id);
		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

        if (count($_POST) > 0) {

            $post = $this->input->post();
          
            $inst_id = $this->CommonModal->insertRowReturnId('fees', $post);
            
            redirect(base_url('Admin_Dashboard/inst_fees/'.$id));

        } 

    }
      
	public function edit_fees($id)
    {
       
    $data['title'] = 'Update fees';
    $data['tag'] = 'edit';
     
      $data['fees'] = $this->CommonModal->getRowById('fees', 'id', $id);
   

     $tag1 = $this->input->get('tag');
     	 if (count($_POST) > 0) {

            $post = $this->input->post();

          
            $category_id = $this->CommonModal->updateRowById('fees', 'id', $id, $post);
           
            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if($tag1=='0') {
                redirect(base_url('Admin_Dashboard/inst_fees/'.encryptId($post['inst_id'])));
                } else{
                redirect(base_url('Admin_Dashboard/inst_fees/'.encryptId($post['inst_id'])));
    
                }

        } 

    }
	
	public function deactivefees($id,$uid){
		$data['status'] = 1   ;
		$status_id = $this->CommonModal->updateRowById('fees', 'id', $id, $data);
	$fees = $this->CommonModal->getRowById('fees', 'id', $id);
	
		redirect(base_url('Admin_Dashboard/inst_fees/'.$uid));
	
	}
	public function activefees($id,$uid){
		$data['status'] = 0    ;
		$status_id = $this->CommonModal->updateRowById('fees', 'id', $id, $data);
	$data['fees'] = $this->CommonModal->getRowById('fees', 'id', $id);
	$fees = $this->CommonModal->getRowById('fees', 'id', $id);

		
		redirect(base_url('Admin_Dashboard/inst_fees/'.$uid));
	
	}
    public function active_plan($id){
        $data['title'] = "Membership Plan";
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['sub'] = $this->CommonModal->getRowById('subscription', 'inst_id', $tid);


		$this->load->view('user/active_plan',$data);
	}
    public function plan_choose($id){
        $data['title'] = "Membership Plan";
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');


		$this->load->view('user/plan_choose',$data);
	}
    public function upgrade_plan($id,$plan_id){
      
        $tid = decryptId($id);
        $p_id = decryptId($plan_id);


        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $plan = $this->CommonModal->getRowById('plan', 'id', $p_id);


        $start_date = date('Y-m-d');

        $expiry_date = date('Y-m-d', strtotime($start_date . ' + ' . $plan[0]['numbers_of_days'] . ' days'));
        $subscription = [
                                
                                'plan_type' => $p_id, 
                                'start_date' => $start_date , 
                                'expire_date' =>  $expiry_date ,
                                'price' => $plan[0]['price']


                            ];
        $active= $this->CommonModal->updateRowById('subscription', 'inst_id', $tid,$subscription);

        if ($active) {
            $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
        } else {
            $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
        }


        redirect(base_url('Admin_Dashboard/index/'.$id));
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
	public function view_student($id){
		$data['title'] = "View student";
        $tid = decryptId($id);
		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');
        $img = $this->input->get('img');
		
        if ($BdID) {
            $this->CommonModal->deleteRowById('students', array('id' => $BdID));
            // $this->CommonModal->deleteRowById('agent_customer', array('customer_id' => $BdID));

            if ($img) {
                unlink('./uploads/student/' . $img);
            }
            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_student?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_student?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['student'] = $this->CommonModal->getRowByMultitpleId('students', 'status', '1','inst_id',$tid,'id','DESC');
        } else {
            $data['student'] = $this->CommonModal->getRowByMultitpleId('students', 'status', '0','inst_id',$tid,'id','DESC');
        }
        $this->load->view('user/view_student', $data);
	}
	public function add_student($id)
{
    $data['title'] = "Add Student";
    $data['tag'] = "add";
    $tid = decryptId($id);
    $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
    $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
    $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
    $data['fees'] = $this->CommonModal->getRowByMultitpleId('fees', 'status', '0', 'inst_id', $tid, 'id', 'DESC');

    if ($this->input->post()) {
        $post = $this->input->post();

        // Check if email is already registered
        $existing_email = $this->CommonModal->getRowById('students', 'email', $post['email']);
        if (!empty($existing_email)) {
            echo "<script>alert('Email is already registered!');</script>";
            redirect($_SERVER['HTTP_REFERER']);
            exit;
        }

        // Generate random password
        $password = bin2hex(random_bytes(8));
        $post['password'] = $password;

        // **Store values before unsetting**
        $fees_type = isset($post['fees_type']) ? $post['fees_type'] : [];
        $paid = $post['paid'] ?? 0;
        $account_id = $post['account_id'] ?? null;
        $cheque_no = $post['cheque_no'] ?? null;
        $mode = $post['mode'] ?? null;
        $total = $post['total'] ?? 0;
        $due = $total - $paid;

        // **Unset fields from main insert**
        unset($post['fees_type'], $post['paid'], $post['account_id'], $post['cheque_no'], $post['mode'], $post['total']);

        // **Insert student and get ID**
        $student_id = $this->CommonModal->insertRowReturnId('students', $post);

        // **Insert student fees**
        $items = [];
        if (!empty($fees_type) && is_array($fees_type)) {
            foreach ($fees_type as $item) {
                $items[] = [
                    'inst_id' => $tid,
                    'student_id' => $student_id,
                    'fees_type' => $item
                ];
            }
        }

        if (!empty($items)) {
            $this->CommonModal->insertBatch('student_fees', $items);
        }

        // **Insert payment record**
        $pay_to_insert = [
            'inst_id' => $tid,
            'student_id' => $student_id, // ✅ Fix student_id issue
            'paid' => $paid,
            'mode' => $mode,
            'total' => $total,
            'due' => $due,
            'account_id' => $account_id,
            'cheque_no' => $cheque_no
        ];
        $this->CommonModal->insertRowReturnId('fees_payment', $pay_to_insert);

        // **Redirect after success**
        redirect(base_url('Admin_Dashboard/view_student/' . $id));
    } else {
        $this->load->view('user/add_student', $data);
    }
}

	public function update_student($id)
    {
        $tid = decryptId($id);
		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['agent'] = $this->CommonModal->getAllRows('agent'); 
    $data['title'] = 'Update Member';
    $data['tag'] = 'edit';
      $tid = $id;
     $data['Student'] = $this->CommonModal->getRowById('students', 'id', $tid);
     $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

     $tag1 = $this->input->get('tag');
     	 if (count($_POST) > 0) {

            $post = $this->input->post();
          
         
            // $agent_customer_data = [
               
            //     'agent_id' => $post['agent_id'] // Ensure 'agent_id' is provided in the form
            // ];
            $category_id = $this->CommonModal->updateRowById('students', 'id', $tid, $post);
            // $category_id1 = $this->CommonModal->updateRowById('agent_customer', 'customer_id', $tid, $agent_customer_data);
            // $plan = $this->CommonModal->getRowById('plan', 'id', $post['plan_id']);


            // $start_date = $post['date']; 
            // $expiry_date = date('Y-m-d', strtotime($start_date . ' + ' . $plan[0]['numbers_of_days'] . ' days'));
            // $subscription = [
                                    
            //                         'plan_type' => $post['plan_id'], // Ensure 'agent_id' is provided in the form
            //                         'start_date' => $start_date , // Ensure 'agent_id' is provided in the form
            //                         'expire_date' =>  $expiry_date ,// Ensure 'agent_id' is provided in the form
            //                         'price' => $plan[0]['price'] // Ensure 'agent_id' is provided in the form


            //                     ];
            // $this->CommonModal->updateRowById('subscription', 'inst_id', $tid,$subscription);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if($tag1=='0') {
                redirect(base_url('Admin_Dashboard/view_student?tag=active'));
                } else{
                redirect(base_url('Admin_Dashboard/view_student?tag=deactive'));
    
                }

        } else {

            $this->load->view('user/add_student', $data);

        }

    }
	
    public function deactivestudent($id,$uid){
		$data['status'] = 1   ;
		$status_id = $this->CommonModal->updateRowById('students', 'id', $id, $data);
	$student = $this->CommonModal->getRowById('students', 'id', $id);
	
		redirect(base_url('Admin_Dashboard/view_student/'.$uid.'?tag=deactive'));
	
	}
	public function activestudent($id,$uid){
		$data['status'] = 0    ;
		$status_id = $this->CommonModal->updateRowById('students', 'id', $id, $data);
	$data['student'] = $this->CommonModal->getRowById('students', 'id', $id);
	$student = $this->CommonModal->getRowById('students', 'id', $id);

		
		redirect(base_url('Admin_Dashboard/view_student/'.$uid));
	
	}
    public function view_batch($id){
		$data['title'] = "View batch";
        $tid = decryptId($id);
		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');
   
		
        if ($BdID) {
            $this->CommonModal->deleteRowById('batchs', array('id' => $BdID));
          
            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_batch/'.$id.'/?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_batch/'.$id.'/?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status', '1','inst_id',$tid,'id','DESC');
        } else {
            $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status', '0','inst_id',$tid,'id','DESC');
        }
        $this->load->view('user/view_batch', $data);
	}
	public function add_batch($id)
    {

        $data['title'] = "Add Batch";
        $data['tag'] = "add";
        $tid = decryptId($id);
		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

        if (count($_POST) > 0) {

            $post = $this->input->post();
          
            $inst_id = $this->CommonModal->insertRowReturnId('batchs', $post);
            
            redirect(base_url('Admin_Dashboard/view_batch/'.$id));

        } else {

            $this->load->view('user/add_batch', $data);

        }

    }
      
	public function update_batch($id)
    {
       
    $data['title'] = 'Update Batch';
    $data['tag'] = 'edit';
     
      $data['batch'] = $this->CommonModal->getRowById('batchs', 'id', $id);
   

     $tag1 = $this->input->get('tag');
     	 if (count($_POST) > 0) {

            $post = $this->input->post();

          
            $category_id = $this->CommonModal->updateRowById('batchs', 'id', $id, $post);
           
            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if($tag1=='0') {
                redirect(base_url('Admin_Dashboard/view_batch/'.encryptId($post['inst_id']).'?tag=active'));
                } else{
                redirect(base_url('Admin_Dashboard/view_batch/'.encryptId($post['inst_id']).'?tag=deactive'));
    
                }

        } else {

            $this->load->view('user/add_batch', $data);

        }

    }
	
	public function deactivebatch($id,$uid){
		$data['status'] = 1   ;
		$status_id = $this->CommonModal->updateRowById('batchs', 'id', $id, $data);
	$batch = $this->CommonModal->getRowById('batchs', 'id', $id);
	
		redirect(base_url('Admin_Dashboard/view_batch/'.$uid.'?tag=deactive'));
	
	}
	public function activebatch($id,$uid){
		$data['status'] = 0    ;
		$status_id = $this->CommonModal->updateRowById('batchs', 'id', $id, $data);
	$data['batch'] = $this->CommonModal->getRowById('batchs', 'id', $id);
	$batch = $this->CommonModal->getRowById('batchs', 'id', $id);

		
		redirect(base_url('Admin_Dashboard/view_batch/'.$uid));
	
	}
    public function view_course($id){
		$data['title'] = "View course";
        $tid = decryptId($id);
		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');
   
		
        if ($BdID) {
            $this->CommonModal->deleteRowById('courses', array('id' => $BdID));
          
            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_course/'.$id.'/?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_course/'.$id.'/?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status', '1','inst_id',$tid,'id','DESC');
        } else {
            $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status', '0','inst_id',$tid,'id','DESC');
        }
        $this->load->view('user/view_course', $data);
	}
	public function add_course($id)
    {

        $data['title'] = "Add course";
        $data['tag'] = "add";
        $tid = decryptId($id);
		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

        if (count($_POST) > 0) {

            $post = $this->input->post();
          
            $inst_id = $this->CommonModal->insertRowReturnId('courses', $post);
            
            redirect(base_url('Admin_Dashboard/view_course/'.$id));

        } else {

            $this->load->view('user/add_course', $data);

        }

    }
      
	public function update_course($id)
    {
       
    $data['title'] = 'Update course';
    $data['tag'] = 'edit';
     
      $data['course'] = $this->CommonModal->getRowById('courses', 'id', $id);
   

     $tag1 = $this->input->get('tag');
     	 if (count($_POST) > 0) {

            $post = $this->input->post();

          
            $category_id = $this->CommonModal->updateRowById('courses', 'id', $id, $post);
           
            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if($tag1=='0') {
                redirect(base_url('Admin_Dashboard/view_course/'.encryptId($post['inst_id']).'?tag=active'));
                } else{
                redirect(base_url('Admin_Dashboard/view_course/'.encryptId($post['inst_id']).'?tag=deactive'));
    
                }

        } else {

            $this->load->view('user/add_course', $data);

        }

    }
	
	public function deactivecourse($id,$uid){
		$data['status'] = 1   ;
		$status_id = $this->CommonModal->updateRowById('courses', 'id', $id, $data);
	$course = $this->CommonModal->getRowById('courses', 'id', $id);
	
		redirect(base_url('Admin_Dashboard/view_course/'.$uid.'?tag=deactive'));
	
	}
	public function activecourse($id,$uid){
		$data['status'] = 0    ;
		$status_id = $this->CommonModal->updateRowById('courses', 'id', $id, $data);
	$data['course'] = $this->CommonModal->getRowById('courses', 'id', $id);
	$course = $this->CommonModal->getRowById('courses', 'id', $id);

	
		redirect(base_url('Admin_Dashboard/view_course/'.$uid));
	
	}
    public function view_plan($id){
		$data['title'] = "View plan";
	

		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');
      
		
        if ($BdID) {
            $this->CommonModal->deleteRowById('plan', array('id' => $BdID));
           

          
            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_plan?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_plan?tag=deactive'));
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
		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
    
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
		     $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
     
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
                redirect(base_url('Admin_Dashboard/view_plan?tag=active'));
                } else{
                redirect(base_url('Admin_Dashboard/view_plan?tag=deactive'));
    
                }

        } else {

            $this->load->view('add_plan', $data);

        }

    }
	
	public function deactiveplan($id){
		$data['status'] = 1    ;
		$status_id = $this->CommonModal->updateRowById('plan', 'id', $id, $data);
	
		redirect(base_url('Admin_Dashboard/view_plan?tag=deactive'));
	
	}
	public function activeplan($id){
		$data['status'] = 0    ;
		$status_id = $this->CommonModal->updateRowById('plan', 'id', $id, $data);
	$data['plan'] = $this->CommonModal->getRowById('plan', 'id', $id);
	

    redirect(base_url('Admin_Dashboard/view_plan?tag=active'));
	}
	
}