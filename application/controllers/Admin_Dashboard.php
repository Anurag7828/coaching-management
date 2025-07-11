<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller
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
        $tid = decryptId($id);
        $data['title'] = "Admin_Dashboard";
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['payment'] = $this->CommonModal->getRowByIdOrderByLimit('fees_payment', 'inst_id', $tid, '', '', 'id', 'DESC', 6);
        $data['rec_student'] = $this->CommonModal->getRowByIdOrderByLimit('students', 'inst_id', $tid, '', '', 'id', 'DESC', 6);


        $data['student'] = $this->CommonModal->getNumWhereMultipleRows('students', 'status', 0, 'inst_id', $tid);
        $data['batch'] = $this->CommonModal->getNumWhereMultipleRows('batchs', 'status', 0, 'inst_id', $tid);
        $data['course'] = $this->CommonModal->getNumWhereMultipleRows('courses', 'status', 0, 'inst_id', $tid);
        $data['present'] = $this->CommonModal->get_today_present_count('student_attendance', 'Present', 'inst_id', $tid);

        $subscription = $this->CommonModal->getRowById('subscription', 'inst_id', $tid);
        if ($subscription) {
            $today = date('Y-m-d');
            if ($subscription[0]['expire_date'] < $today) {
                redirect('Admin_Dashboard/plan_choose/' . $id);
            }
        }

        $this->load->view('user/dashboard', $data);
    }
    public function student_login($id)
    {
        $tid = decryptId($id);
        $data['title'] = "Admin_Dashboard";
        $data['user'] = $this->CommonModal->getRowById('students', 'id', $tid);
        $student = $this->CommonModal->getRowById('students', 'id', $tid);
        $data['clg'] = $this->CommonModal->getRowById('institutions', 'id', $student[0]['inst_id']);

        $this->load->view('branch/dashboard', $data);
    }
    public function student_profile($id)
    {
        $data['title'] = "Your Profile";
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('students', 'id', $tid);
        $student = $this->CommonModal->getRowById('students', 'id', $tid);
        $data['clg'] = $this->CommonModal->getRowById('institutions', 'id', $student[0]['inst_id']);

        $this->load->view('branch/student_profile', $data);
    }

    public function update_student_profile($id)
    {

        $data['title'] = 'Update';
        // $data['tag'] = 'admin';
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('students', 'id', $tid);
        $student = $this->CommonModal->getRowById('students', 'id', $tid);
        $data['clg'] = $this->CommonModal->getRowById('institutions', 'id', $student[0]['inst_id']);

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $category_id = $this->CommonModal->updateRowById('students', 'id', $tid, $post);

            if ($category_id) {
                echo "<script>alert(' Updated successfully');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                echo "<script>alert('Error To Updated');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error successfully</div>');
            }
            redirect(base_url('Admin_Dashboard/student_profile/' . $id));
        }
    }
    public function change_student_password($id)
    {

        $data['title'] = 'Update Paasword';
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('students', 'id', $tid);
        $student = $this->CommonModal->getRowById('students', 'id', $tid);
        $data['clg'] = $this->CommonModal->getRowById('institutions', 'id', $student[0]['inst_id']);

        if (count($_POST) > 0) {

            $post = $this->input->post();


            $category_id = $this->CommonModal->updateRowById('students', 'id', $tid, $post);

            if ($category_id) {
                echo "<script>alert(' Updated successfully');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                echo "<script>alert('Error To Updated');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error successfully</div>');
            }
            redirect(base_url('Admin_Dashboard/student_profile/' . $id));
        } else {
            $this->load->view('branch/change_student_password', $data);
        }
    }
    public function profile($id)
    {
        $data['title'] = "Institution Profile";
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);


        $this->load->view('user/profile', $data);
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
            redirect(base_url('Admin_Dashboard/profile/' . $id));
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
               

                 $this->session->set_flashdata('msgsuccess', 'Password updated successfully');
            } else {
               

                 $this->session->set_flashdata('msgerror', 'Error To Updated Password');
            }
            redirect(base_url('Admin_Dashboard/change_password/' . $id));
        } else {
            $this->load->view('user/change_password', $data);
        }
    }

    public function inst_fees($id)
    {
        $data['title'] = "Institution Fees";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['fees'] = $this->CommonModal->getRowByIdDesc('fees', 'inst_id', $tid, 'id', 'DESC');
        $BdID = decryptId($this->input->get('BdID'));
        if ($BdID) {
            $this->CommonModal->deleteRowById('fees', array('id' => $BdID));
            redirect(base_url('Admin_Dashboard/inst_fees/' . $id));
        }

        $this->load->view('user/fees', $data);
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

            redirect(base_url('Admin_Dashboard/inst_fees/' . $id));
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
            if ($tag1 == '0') {
                redirect(base_url('Admin_Dashboard/inst_fees/' . encryptId($post['inst_id'])));
            } else {
                redirect(base_url('Admin_Dashboard/inst_fees/' . encryptId($post['inst_id'])));
            }
        }
    }

    public function deactivefees($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('fees', 'id', $id, $data);
        $fees = $this->CommonModal->getRowById('fees', 'id', $id);

        redirect(base_url('Admin_Dashboard/inst_fees/' . $uid));
    }
    public function activefees($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('fees', 'id', $id, $data);
        $data['fees'] = $this->CommonModal->getRowById('fees', 'id', $id);
        $fees = $this->CommonModal->getRowById('fees', 'id', $id);


        redirect(base_url('Admin_Dashboard/inst_fees/' . $uid));
    }
    public function inst_reward($id)
    {
        $data['title'] = "Institution reward";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['reward'] = $this->CommonModal->getRowByIdDesc('reward', 'inst_id', $tid, 'id', 'DESC');
        $BdID = decryptId($this->input->get('BdID'));
        if ($BdID) {
            $this->CommonModal->deleteRowById('reward', array('id' => $BdID));
            redirect(base_url('Admin_Dashboard/inst_reward/' . $id));
        }

        $this->load->view('user/reward', $data);
    }
    public function add_reward($id)
    {

        $data['title'] = "Add reward";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $inst_id = $this->CommonModal->insertRowReturnId('reward', $post);

            redirect(base_url('Admin_Dashboard/inst_reward/' . $id));
        }
    }

    public function edit_reward($id)
    {

        $data['title'] = 'Update reward';
        $data['tag'] = 'edit';

        $data['reward'] = $this->CommonModal->getRowById('reward', 'id', $id);


        $tag1 = $this->input->get('tag');
        if (count($_POST) > 0) {

            $post = $this->input->post();


            $category_id = $this->CommonModal->updateRowById('reward', 'id', $id, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if ($tag1 == '0') {
                redirect(base_url('Admin_Dashboard/inst_reward/' . encryptId($post['inst_id'])));
            } else {
                redirect(base_url('Admin_Dashboard/inst_reward/' . encryptId($post['inst_id'])));
            }
        }
    }

    public function deactivereward($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('reward', 'id', $id, $data);
        $reward = $this->CommonModal->getRowById('reward', 'id', $id);

        redirect(base_url('Admin_Dashboard/inst_reward/' . $uid));
    }
    public function activereward($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('reward', 'id', $id, $data);
        $data['reward'] = $this->CommonModal->getRowById('reward', 'id', $id);
        $reward = $this->CommonModal->getRowById('reward', 'id', $id);


        redirect(base_url('Admin_Dashboard/inst_reward/' . $uid));
    }
    public function inst_penailty($id)
    {
        $data['title'] = "Institution Penailty";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['penailty'] = $this->CommonModal->getRowByIdDesc('penailty', 'inst_id', $tid, 'id', 'DESC');
        $BdID = decryptId($this->input->get('BdID'));
        if ($BdID) {
            $this->CommonModal->deleteRowById('penailty', array('id' => $BdID));
            redirect(base_url('Admin_Dashboard/inst_penailty/' . $id));
        }

        $this->load->view('user/penailty', $data);
    }
    public function add_penailty($id)
    {

        $data['title'] = "Add penailty";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $inst_id = $this->CommonModal->insertRowReturnId('penailty', $post);

            redirect(base_url('Admin_Dashboard/inst_penailty/' . $id));
        }
    }

    public function edit_penailty($id)
    {

        $data['title'] = 'Update penailty';
        $data['tag'] = 'edit';

        $data['penailty'] = $this->CommonModal->getRowById('penailty', 'id', $id);


        $tag1 = $this->input->get('tag');
        if (count($_POST) > 0) {

            $post = $this->input->post();


            $category_id = $this->CommonModal->updateRowById('penailty', 'id', $id, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if ($tag1 == '0') {
                redirect(base_url('Admin_Dashboard/inst_penailty/' . encryptId($post['inst_id'])));
            } else {
                redirect(base_url('Admin_Dashboard/inst_penailty/' . encryptId($post['inst_id'])));
            }
        }
    }

    public function deactivepenailty($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('penailty', 'id', $id, $data);
        $penailty = $this->CommonModal->getRowById('penailty', 'id', $id);

        redirect(base_url('Admin_Dashboard/inst_penailty/' . $uid));
    }
    public function activepenailty($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('penailty', 'id', $id, $data);
        $data['penailty'] = $this->CommonModal->getRowById('penailty', 'id', $id);
        $penailty = $this->CommonModal->getRowById('penailty', 'id', $id);


        redirect(base_url('Admin_Dashboard/inst_penailty/' . $uid));
    }
    public function account($id)
    {
        $data['title'] = "Bank Account";
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['account'] = $this->CommonModal->getRowByIdDesc('account', 'inst_id', $tid, 'id', 'DESC');

        $BdID = $this->input->get('BdID');

        if ($BdID) {
            $this->CommonModal->deleteRowById('account', array('id' => $BdID));
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->load->view('user/bank_account', $data);
    }
    public function add_account($id)
    {


        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['account'] = $this->CommonModal->getRowByIdDesc('account', 'inst_id', $tid, 'id', 'DESC');

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $savedata = $this->CommonModal->insertRowReturnId('account', $post);

            if ($savedata) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Added Successfully</div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Error while saving data</div>');
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function edit_account($id)
    {


        $tid = $id;


        if (count($_POST) > 0) {

            $post = $this->input->post();
            $category_id = $this->CommonModal->updateRowById('account', 'id', $tid, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">account of Lead Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">account of Lead Updated successfully</div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function active_plan($id)
    {
        $data['title'] = "Membership Plan";
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['sub'] = $this->CommonModal->getRowById('subscription', 'inst_id', $tid);


        $this->load->view('user/active_plan', $data);
    }
    public function plan_choose($id)
    {
        $data['title'] = "Membership Plan";
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');


        $this->load->view('user/plan_choose', $data);
    }
    public function upgrade_plan($id, $plan_id)
    {

        $tid = decryptId($id);
        $p_id = decryptId($plan_id);


        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $plan = $this->CommonModal->getRowById('plan', 'id', $p_id);


        $start_date = date('Y-m-d');

        $expiry_date = date('Y-m-d', strtotime($start_date . ' + ' . $plan[0]['numbers_of_days'] . ' days'));
        $subscription = [

            'plan_type' => $p_id,
            'start_date' => $start_date,
            'expire_date' =>  $expiry_date,
            'price' => $plan[0]['price']


        ];
        $active = $this->CommonModal->updateRowById('subscription', 'inst_id', $tid, $subscription);

        if ($active) {
            $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
        } else {
            $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
        }


        redirect(base_url('Admin_Dashboard/index/' . $id));
    }
    public function send_email($id, $sid)
    {
        $tid = decryptId($id);
        $ssid = decryptId($sid);
        $user = $this->CommonModal->getRowById('institutions', 'id', $tid);


        $student = $this->CommonModal->getRowByMultitpleId('students', 'id', $ssid, 'inst_id', $tid, 'id', 'DESC');

        if ($this->input->post()) {
            $post = $this->input->post();
            $email_to_insert = [
                'inst_id' => $tid,
                'student_id' => $ssid, // ✅ Fix student_id issue
                'from' => $user[0]['email'],
                'to' => $student[0]['email'],
                'subject' => $post['subject'],
                'message' => $post['message'],

            ];
            $student_email = $this->CommonModal->insertRowReturnId('student_email', $email_to_insert);
            // if($student_email) {
            //         $this->email->from($user[0]['email'], $user[0]['name']);
            //         $this->email->to($student[0]['email']);
            //         $this->email->subject($post['subject']);
            //         $message =$post['message'];

            //         $this->email->message($message);
            //         $this->email->set_mailtype('html');

            //         if ($this->email->send()) {
            //             return true;
            //         } else {
            //             log_message('error', 'Email sending failed: ' . $this->email->print_debugger());
            //             return false;
            //         }
            //     }

        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function send_emp_email($id, $sid, $table)
    {
        $tid = decryptId($id);
        $ssid = decryptId($sid);
        $user = $this->CommonModal->getRowById('institutions', 'id', $tid);


        $employee = $this->CommonModal->getRowByMultitpleId('employees', 'id', $ssid, 'inst_id', $tid, 'id', 'DESC');

        if ($this->input->post()) {
            $post = $this->input->post();
            $email_to_insert = [
                'inst_id' => $tid,
                'emp_id' => $ssid, // ✅ Fix employee_id issue
                'from' => $user[0]['email'],
                'to' => $employee[0]['email'],
                'subject' => $post['subject'],
                'message' => $post['message'],

            ];
            $employee_email = $this->CommonModal->insertRowReturnId('employee_email', $email_to_insert);
            // if($student_email) {
            //         $this->email->from($user[0]['email'], $user[0]['name']);
            //         $this->email->to($student[0]['email']);
            //         $this->email->subject($post['subject']);
            //         $message =$post['message'];

            //         $this->email->message($message);
            //         $this->email->set_mailtype('html');

            //         if ($this->email->send()) {
            //             return true;
            //         } else {
            //             log_message('error', 'Email sending failed: ' . $this->email->print_debugger());
            //             return false;
            //         }
            //     }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_mail($id, $table)
    {
        $tid = decryptId($id);
        $this->CommonModal->deleteRowById($table, array('id' => $tid));
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Student Section
    public function student($id, $uid)
    {
        $data['title'] = "View student";
        $tid = decryptId($id);
        $uid = decryptId($uid);
        $data['account'] = $this->CommonModal->getRowById('account', 'inst_id', $uid);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $uid);
        $data['student'] = $this->CommonModal->getRowByMultitpleId('students', 'id', $tid, 'inst_id', $uid, 'id', 'DESC');

        $this->load->view('user/student', $data);
    }
    public function view_student($id)
    {
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

        $data['student'] = $this->CommonModal->getRowByIdDesc('students', 'inst_id', $tid, 'id', 'DESC');

        $this->load->view('user/view_student', $data);
    }


    public function add_student($id)
    {
        $data['title'] = "Add Student";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $inst = $this->CommonModal->getRowById('institutions', 'id', $tid);

        $data['account'] = $this->CommonModal->getRowById('account', 'inst_id', $tid);
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

            $post['roll_no'] = $this->CommonModal->generate_roll_no($tid, $post['batch_id'], $post['branch_id']);
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
            unset($post['fees_type'], $post['paid'], $post['account_id'], $post['cheque_no'], $post['mode'], $post['total'], $post['p_id']);

            // **Insert student and get ID**
            $student_id = $this->CommonModal->insertRowReturnId('students', $post);
            if($student_id) {
             
         
            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', $inst[0]['name']);  // Use institution name as sender
            $this->email->to($post['email']);  // Send to user's email
            $this->email->subject('Registration Successfully');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($post['name']) . ",\n\n";
$message .= "We are pleased to inform you that your registration for our institution " . $inst[0]['name'] . " has been successfully completed. Below are your login credentials:\n\n";
$message .= "Username: " . htmlspecialchars($post['email']) . "\n";
$message .= "Password: " . htmlspecialchars($post['password']) . "\n\n";
$message .= "Please keep your login credentials secure and do not share them with anyone.\n\n";
$message .= "You can log in to the software using the following link: " . base_url() . "\n\n";
$message .= "If you encounter any issues, please feel free to contact our support team.\n\n";
$message .= "Thank you for choosing our institution!\n\n";
$message .= "Best regards,\n";
$message .= "The " . $inst[0]['name'] . " Team";

            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $post['email']);
            }
   }
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
            $transaction_id = $this->CommonModal->generate_transaction_id($tid, $student_id);
            // **Insert payment record**
            $pay_to_insert = [
                'inst_id' => $tid,
                'student_id' => $student_id, // ✅ Fix student_id issue
                'paid' => $paid,
                'mode' => $mode,
                'total' => $total,
                'due' => $due,
                'account_id' => $account_id,
                'cheque_no' => $cheque_no,
                'date' => $post['join_date']
            ];
            $this->CommonModal->insertRowReturnId('fees_payment', $pay_to_insert);

            // **Redirect after success**
            redirect(base_url('Admin_Dashboard/view_student/' . $id));
        } else {
            $this->load->view('user/add_student', $data);
        }
    }

    public function update_student($id, $uuid)
    {
        $tid = decryptId($id);
        $uid = decryptId($uuid);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $uid);
        $data['title'] = 'Update Member';
        $data['tag'] = 'edit';
        $data['Student'] = $this->CommonModal->getRowById('students', 'id', $tid);
        $data['account'] = $this->CommonModal->getRowById('account', 'inst_id', $uid);
        $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status', '0', 'inst_id', $uid, 'id', 'DESC');
        $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status', '0', 'inst_id', $uid, 'id', 'DESC');
        $data['fees'] = $this->CommonModal->getRowByMultitpleId('fees', 'status', '0', 'inst_id', $uid, 'id', 'DESC');
        $tag1 = $this->input->get('tag');

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $fees_type = isset($post['fees_type']) ? $post['fees_type'] : [];
            $paid = $post['paid'] ?? 0;
            $account_id = $post['account_id'] ?? null;
            $cheque_no = $post['cheque_no'] ?? null;
            $mode = $post['mode'] ?? null;
            $total = $post['total'] ?? 0;
            $pid = $post['p_id'] ?? 0;

            $due = $total - $paid;

            // Remove unused fields before update
            unset($post['fees_type'], $post['paid'], $post['account_id'], $post['cheque_no'], $post['mode'], $post['total'], $post['p_id']);

            // Update student data
            $category_id = $this->CommonModal->updateRowById('students', 'id', $tid, $post);

            // Prepare fees data
            $items = [];
            if (!empty($fees_type) && is_array($fees_type)) {
                foreach ($fees_type as $item) {
                    $items[] = [
                        'inst_id' => $uid,
                        'student_id' => $tid,
                        'fees_type' => $item
                    ];
                }
            }

            // Insert fees data only if valid
            if (!empty($items) && isset($items[0]['fees_type'])) {
                $this->CommonModal->insertBatch('student_fees', $items);
            } else {
                log_message('error', 'Batch insert failed: Missing required fields.');
            }

            // Prepare and update payment record
            if (!empty($pid)) {
                $pay_to_insert = [
                    'inst_id' => $uid,
                    'student_id' => $tid,
                    'paid' => $paid,
                    'mode' => $mode,
                    'total' => $total,
                    'due' => $due,
                    'account_id' => $account_id,
                    'cheque_no' => $cheque_no,
                    'date' => $post['join_date']
                ];
                $this->CommonModal->updateRowById('fees_payment', 'id', $pid, $pay_to_insert);
            } else {
                log_message('error', 'Skipping fees_payment update: pid is missing.');
            }

            // Set session message before redirecting
            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating record</div>');
            }

            // Redirect after processing

            redirect(base_url('Admin_Dashboard/view_student/' . $uuid));
        } else {
            $this->load->view('user/add_student', $data);
        }
    }


    public function deactivestudent($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('students', 'id', $id, $data);
        $student = $this->CommonModal->getRowById('students', 'id', $id);

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function activestudent($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('students', 'id', $id, $data);
        $data['student'] = $this->CommonModal->getRowById('students', 'id', $id);
        $student = $this->CommonModal->getRowById('students', 'id', $id);


        redirect($_SERVER['HTTP_REFERER']);
    }
    public function get_students_by_batch($batch_id, $id)
    {
        $students  = $this->CommonModal->getRowByMultitpleId('students', 'inst_id', $id, 'batch_id', $batch_id, 'id', 'DESC');
        if (!empty($students)) {
?>
            <form action="<?= base_url('Admin_Dashboard/submit_bulk_attendance') ?>" method="POST">
                <input type="hidden" name="batch_id" value="<?= $batch_id; ?>">
                <input type="hidden" name="inst_id" value="<?= $id; ?>">


                <div class="table-responsive custom-table pb-3">
                    <table class="table datatable" id="attendenceTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Roll No</th>
                                <th>Student Name</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Late</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td>
                                        <?= $student['roll_no'] ?>
                                        <input type="hidden" name="attendance[<?= $student['id'] ?>][roll_no]" value="<?= $student['roll_no'] ?>">
                                    </td>
                                    <td><?= $student['name'] ?></td>
                                    <td><input type="radio" name="attendance[<?= $student['id'] ?>][status]" value="Present" checked></td>
                                    <td><input type="radio" name="attendance[<?= $student['id'] ?>][status]" value="Absent"></td>
                                    <td><input type="radio" name="attendance[<?= $student['id'] ?>][status]" value="Late"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Submit Attendance</button>
            </form>

        <?php
        } else {
            echo "<p>No students found for this batch.</p>";
        }
    }
    public function submit_bulk_attendance()
    {
        $batch_id = $this->input->post('batch_id');
        $inst_id = $this->input->post('inst_id');
        $attendance = $this->input->post('attendance');
        $date = date('Y-m-d'); // Auto-fetch today's date

        if (!is_array($attendance) || empty($attendance)) {
            $this->session->set_flashdata('error', 'No attendance data received.');
            redirect('Admin_Dashboard/view_attendance/' . encryptId($inst_id));
            return;
        }

        foreach ($attendance as $student_id => $data) {
            if (!is_array($data) || !isset($data['roll_no']) || !isset($data['status'])) {
                continue; // Skip invalid entries
            }

            $student_roll_no = $data['roll_no'];
            $status = $data['status'];

            // Check if attendance already exists for this student on this date
            $existing_attendance = $this->CommonModal->getRowByCondition('student_attendance', [
                'inst_id' => $inst_id,
                'student_id' => $student_id,
                'batch_id' => $batch_id,
                'date' => $date
            ]);

            if ($existing_attendance) {
                // Update existing attendance record
                $this->CommonModal->updateRowByCondition('student_attendance', [
                    'inst_id' => $inst_id,
                    'student_id' => $student_id,
                    'batch_id' => $batch_id,
                    'date' => $date
                ], [
                    'status' => $status
                ]);
            } else {
                // Insert new attendance record
                $this->CommonModal->insertRow('student_attendance', [
                    'inst_id' => $inst_id,
                    'student_id' => $student_id,
                    'student_roll_no' => $student_roll_no,
                    'batch_id' => $batch_id,
                    'date' => $date,
                    'status' => $status
                ]);
            }
        }

        $this->session->set_flashdata('success', 'Attendance recorded successfully.');
        redirect('Admin_Dashboard/view_attendance/' . encryptId($inst_id));
    }

    public function add_attendance($id)
    {
        $data['title'] = "Today Attendance";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['batches'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
        $this->load->view('user/add_attendance', $data);
    }

    public function View_attendance($id)
    {
        $data['title'] = "View Attendance";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['batches'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status', '0', 'inst_id', $tid, 'id', 'DESC');

        // Default values
        $start_date = date('Y-m-d', strtotime('-1 day')); // Yesterday
        $end_date = date('Y-m-d'); // Today
        $batch_id = "all";

        if ($this->input->post()) {
            $batch_id = $this->input->post('batch_id');

            if (!empty($this->input->post('from'))) {
                $start_date = date('Y-m-d', strtotime($this->input->post('from')));
            }

            if (!empty($this->input->post('to'))) {
                $end_date = date('Y-m-d', strtotime($this->input->post('to')));
            }
        }

        // ✅ Corrected Condition for Fetching Attendance
        if ($batch_id == "all") {
            $data['attendence'] = $this->CommonModal->get_attendence(
                'student_attendance',
                'inst_id',
                $tid,
                'date',
                $end_date,
                'date',
                $start_date,
                $end_date
            );
        } else {
            $data['attendence'] = $this->CommonModal->get_attendence(
                'student_attendance',
                'inst_id',
                $tid,
                'batch_id',
                $batch_id,
                'date',
                $start_date,
                $end_date
            );
        }

        // Passing Filtered Data to View
        $data['start'] = $start_date;
        $data['end'] = $end_date;
        $data['selected_batch'] = $batch_id;

        $this->load->view('user/view_attendence', $data);
    }
    public function View_student_attendance($id)
    {
        $data['title'] = "View Attendance";
        $tid = decryptId($id);  // Decrypt student ID

        $data['user'] = $this->CommonModal->getRowById('students', 'id', $tid);
        $student = $data['user'];

        $data['clg'] = $this->CommonModal->getRowById('institutions', 'id', $student[0]['inst_id']);

        $data['batches'] = $this->CommonModal->getRowByMultitpleId(
            'batchs',
            'status',
            '0',
            'inst_id',
            $student[0]['inst_id'],
            'id',
            'DESC'
        );

        $batches = $data['batches'];
        $default_batch = !empty($batches) ? $batches[0]['id'] : 0;

        // Default values
        $start_date = date('Y-m-d', strtotime('-1 day')); // Yesterday
        $end_date = date('Y-m-d'); // Today
        $batch_id = $default_batch;

        if ($this->input->post()) {
            $batch_id = $this->input->post('batch_id');

            if (!empty($this->input->post('from'))) {
                $start_date = date('Y-m-d', strtotime($this->input->post('from')));
            }

            if (!empty($this->input->post('to'))) {
                $end_date = date('Y-m-d', strtotime($this->input->post('to')));
            }
        }

        // ✅ Always filter attendance by student_id and batch_id
        $data['attendence'] = $this->CommonModal->get_attendence(
            'student_attendance',
            'student_id',
            $student[0]['id'],  // ✅ match student_id
            'batch_id',
            $batch_id,           // ✅ filter by batch
            'date',
            $start_date,
            $end_date
        );

        // Pass filters to view
        $data['start'] = $start_date;
        $data['end'] = $end_date;
        $data['selected_batch'] = $batch_id;

        $this->load->view('branch/view_attendence', $data);
    }

    public function attendence_report($id, $sid)
    {
        $data['title'] = "View Attendance Report";
        $tid = decryptId($id);
        $tsid = decryptId($sid);

        // Fetch institution and student details
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['student'] = $this->CommonModal->getRowById('students', 'id', $tsid);

        // ✅ Set default date range (Last 30 Days)
        $start_date = date('Y-m-01');
        $end_date = date('Y-m-d'); // Today

        if ($this->input->post()) {
            if (!empty($this->input->post('from'))) {
                $start_date = date('Y-m-d', strtotime($this->input->post('from')));
            }

            if (!empty($this->input->post('to'))) {
                $end_date = date('Y-m-d', strtotime($this->input->post('to')));
            }
        }

        // ✅ Fetch Attendance Data for the Given Date Range
        $this->db->where('inst_id', $tid);
        $this->db->where('student_id', $tsid);
        $this->db->where("date BETWEEN '$start_date' AND '$end_date'");
        $query = $this->db->get('student_attendance');
        $data['attendence'] = $query->result_array();

        // ✅ Count Attendance Status
        $this->db->select("COUNT(*) as total_present");
        $this->db->where("inst_id", $tid);
        $this->db->where("student_id", $tsid);
        $this->db->where("status", "Present");
        $this->db->where("date BETWEEN '$start_date' AND '$end_date'");
        $present = $this->db->get("student_attendance")->row_array();
        $data['total_present'] = $present['total_present'];

        $this->db->select("COUNT(*) as total_absent");
        $this->db->where("inst_id", $tid);
        $this->db->where("student_id", $tsid);
        $this->db->where("status", "Absent");
        $this->db->where("date BETWEEN '$start_date' AND '$end_date'");
        $absent = $this->db->get("student_attendance")->row_array();
        $data['total_absent'] = $absent['total_absent'];

        $this->db->select("COUNT(*) as total_late");
        $this->db->where("inst_id", $tid);
        $this->db->where("student_id", $tsid);
        $this->db->where("status", "Late");
        $this->db->where("date BETWEEN '$start_date' AND '$end_date'");
        $late = $this->db->get("student_attendance")->row_array();
        $data['total_late'] = $late['total_late'];

        // Pass filter data to view
        $data['start'] = $start_date;
        $data['end'] = $end_date;

        $this->load->view('user/student_attendence_report', $data);
    }


    // In your Controller (e.g., StudentController.php)
    public function get_students()
    {
        // ✅ Debugging - Check if function runs
        error_log("get_students() function called!");

        // Allow CORS
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        $user_id = $this->input->get('user_id');

        // ✅ Debugging - Check if Database Query Runs
        $this->db->select('students.id as student_id,students.roll_no as student_roll_no, students.name as student_name, students.inst_id, batchs.id as batch_id, batchs.name as batch_name');
        $this->db->from('students');
        $this->db->join('batchs', 'batchs.id = students.batch_id', 'left');
        $this->db->where('students.inst_id', $user_id); // ✅ students table se inst_id filter karein
        $query = $this->db->get();


        if (!$query) {
            error_log("SQL Error: " . $this->db->last_query());
            echo json_encode(["error" => "Database query failed"]);
            return;
        }

        $students = $query->result_array();

        // ✅ Debugging - Check Data
        error_log("Total Students Found: " . count($students));

        // Add date and blank status
        foreach ($students as &$student) {
            $student['date'] = date('Y-m-d');
            $student['status'] = 'present';
        }

        // ✅ Debugging - Check JSON Response Before Sending
        $response = json_encode([
            'status' => !empty($students),
            'data'   => $students ?: [],
            'message' => !empty($students) ? 'Students fetched successfully' : 'No students found'
        ]);

        error_log("JSON Response: " . $response);

        echo $response;
    }

    public function upload_students_attendance_csv()
    {
        // Allow CORS & JSON Response
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        // Check if file is uploaded
        if (!isset($_FILES['csv_file']['tmp_name'])) {
            echo json_encode(["status" => false, "message" => "No file uploaded."]);
            return;
        }

        $filePath = $_FILES['csv_file']['tmp_name'];

        // Read CSV File
        $file = fopen($filePath, "r");

        if (!$file) {
            echo json_encode(["status" => false, "message" => "Failed to read the CSV file."]);
            return;
        }

        $insertData = [];
        $rowNumber = 0;

        while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
            if ($rowNumber == 0) {
                $rowNumber++; // Skip Header Row
                continue;
            }

            if (count($row) < 6) continue; // Skip if data is incomplete

            $insertData[] = [
                'inst_id'    => $row[3], // Column C: inst_id
                'student_id' => $row[0],
                'student_roll_no'   => $row[1], // Column A: student_id
                'batch_id'   => $row[4], // Column D: batch_id
                'date'       => $row[5], // Column E: date
                'status'     => $row[6], // Column F: status
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        fclose($file);

        if (!empty($insertData)) {
            $this->db->insert_batch('student_attendance', $insertData);
            echo json_encode(["status" => true, "message" => "Attendance uploaded successfully."]);
        } else {
            echo json_encode(["status" => false, "message" => "No valid data found in CSV."]);
        }
    }

    public function upload_excel_formate($id)
    {
        $data['title'] = "View batch";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

        $this->load->view('user/upload_excel_formate', $data);
    }


    public function remove_student_fee($id, $sid)
    {
        $tid = decryptId($id);
        $uid = decryptId($sid);

        if ($tid && $uid) {
            $this->CommonModal->deleteRowByuserId('student_fees', array('fees_type' => $tid), array('student_id' => $uid));
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function add_fees_type($id)
    {
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

        if ($this->input->post()) {
            $post = $this->input->post();
            $fees_type = isset($post['fees_type']) ? $post['fees_type'] : [];
            $pid = $post['p_id'];
            $student_id = $post['student_id'];

            // **Insert student fees**
            $items = [];
            $total_new_fees = 0;

            if (!empty($fees_type) && is_array($fees_type)) {
                foreach ($fees_type as $item) {
                    // Get fee amount
                    $fee_data = $this->CommonModal->getRowById('fees', 'id', $item);
                    $fee_amount = !empty($fee_data) ? $fee_data[0]['amount'] : 0;
                    $total_new_fees += $fee_amount; // Add fee amount to total

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

            // Get old total amount
            $old_payment = $this->CommonModal->getRowById('fees_payment', 'id', $pid);
            $old_total = !empty($old_payment) ? $old_payment[0]['total'] : 0;

            // Update total amount
            $new_total = $old_total + $total_new_fees;

            if (!empty($pid)) {
                $pay_to_insert = [
                    'total' => $new_total
                ];
                $this->CommonModal->updateRowById('fees_payment', 'id', $pid, $pay_to_insert);
            } else {
                log_message('error', 'Skipping fees_payment update: pid is missing.');
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function pay_fees_payment($id)
    {
        $tid = decryptId($id);

        if ($this->input->post()) {
            $post = $this->input->post();

            // Calculate updated due
            $post['due'] = $post['due'] - $post['paid'];

            // Generate unique transaction ID
            $post['transaction_id'] = $this->CommonModal->generate_transaction_id($post['inst_id'], $post['student_id']);

            // Insert payment row and get ID
            $payment_id = $this->CommonModal->insertRowReturnId('fees_payment', $post);

            // ✅ FIX: Check if insertion was successful before redirect
            if ($payment_id) {
                // Redirect to slip page
                redirect(base_url('Admin_Dashboard/fee_slip/' . encryptId($payment_id)));
            } else {
                // Handle insertion error (optional logging)
                show_error('Payment could not be saved.');
            }
        }
    }
    public function fee_slip($id)
    {
        $payment_id = decryptId($id);

        // Get payment detail
        $payment_detail = $this->CommonModal->getRowById('fees_payment', 'id', $payment_id);
        if (empty($payment_detail)) {
            show_404();
        }

        // Load related info
        $student = $this->CommonModal->getRowById('students', 'id', $payment_detail[0]['student_id']);
        $clg = $this->CommonModal->getRowById('institutions', 'id', $payment_detail[0]['inst_id']);
        $course = $this->CommonModal->getRowById('courses', 'id', $student[0]['course_id']);
        $fees_type = $this->CommonModal->getRowById('student_fees', 'student_id', $payment_detail[0]['student_id']);

        $data = [
            'payment_detail' => $payment_detail[0],
            'user' => $student[0],
            'clg' => $clg,
            'course' => $course,
            'fees_type' => $fees_type
        ];

        // Load the slip view
        $this->load->view('branch/fee_slip', $data);
    }

    public function view_batch($id)
    {
        $data['title'] = "View batch";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');


        if ($BdID) {
            $this->CommonModal->deleteRowById('batchs', array('id' => $BdID));

            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_batch/' . $id . '/?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_batch/' . $id . '/?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status', '1', 'inst_id', $tid, 'id', 'DESC');
        } else {
            $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
        }
        $this->load->view('user/view_batch', $data);
    }
    public function add_batch($id, $page = null)
    {

        $data['title'] = "Add Batch";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $inst_id = $this->CommonModal->insertRowReturnId('batchs', $post);


            if (!empty($page) && $page == '1') {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(base_url('Admin_Dashboard/view_batch/' . $id));
            }
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
            if ($tag1 == '0') {
                redirect(base_url('Admin_Dashboard/view_batch/' . encryptId($post['inst_id']) . '?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_batch/' . encryptId($post['inst_id']) . '?tag=deactive'));
            }
        } else {

            $this->load->view('user/add_batch', $data);
        }
    }

    public function deactivebatch($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('batchs', 'id', $id, $data);
        $batch = $this->CommonModal->getRowById('batchs', 'id', $id);

        redirect(base_url('Admin_Dashboard/view_batch/' . $uid . '?tag=deactive'));
    }
    public function activebatch($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('batchs', 'id', $id, $data);
        $data['batch'] = $this->CommonModal->getRowById('batchs', 'id', $id);
        $batch = $this->CommonModal->getRowById('batchs', 'id', $id);


        redirect(base_url('Admin_Dashboard/view_batch/' . $uid));
    }
     public function view_timetable($id,$uid)
    {
        $data['title'] = "View Time Table";
        $tid = decryptId($uid);
        $eid = decryptId($id);
        $data['tag'] = $this->input->get('tag');

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['emp_id'] = $eid;
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');


        if ($BdID) {
            $this->CommonModal->deleteRowById('timetable', array('id' => $BdID));

                redirect(base_url('Admin_Dashboard/view_timetable/' . $id . '/'.$uid));
            
        }
        if ($tag =="emp"){
    
            $data['class'] = $this->CommonModal->getRowByMultitpleId('timetable', 'emp_id', $eid, 'inst_id', $tid, 'id', 'DESC');
        } else {
            $data['class'] = $this->CommonModal->getRowByMultitpleId('timetable', 'batch_id', $eid, 'inst_id', $tid, 'id', 'DESC');
        }
        $this->load->view('user/view_timetable', $data);
    }
    public function add_timetable($id,$eid, $page = null)
    {

        $data['title'] = "Add Class";
        $data['tag'] = "add";
        $data['tag2'] = $this->input->get('tag');
$tag2 = $data['tag2'];
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        if($tag2=='emp'){
        $data['emp_id'] = decryptId($eid);
        } else {
            $data['batch_id'] = decryptId($eid);
        }
            $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status','0', 'inst_id', $tid, 'id', 'DESC');
            $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status','0', 'inst_id', $tid, 'id', 'DESC');
            $data['employee'] = $this->CommonModal->getRowByMultitpleId('employees', 'status','0', 'inst_id', $tid, 'id', 'DESC');


        if (count($_POST) > 0) {

            $post = $this->input->post();
             $batch_id = $_POST['batch_id'];
    $emp_id = $_POST['emp_id'];
    $start_time = $_POST['starting_time'];
    $end_time = $_POST['ending_time'];

    // 1. Get Employee Shift Timing
    $emp_shift = $this->CommonModal->getRowById('employees', 'id', $emp_id);
    $shift_id = $emp_shift[0]['shift_id']; // example: 09:00:00
    $shift = $this->CommonModal->getRowById('shifts', 'id', $shift_id);
    $shift_start = $shift[0]['starting_time']; // example: 09:00:00
    $shift_end = $shift[0]['ending_time'];     // example: 17:00:00

    // 2. Get Batch Timing
    $batch_info = $this->CommonModal->getRowById('batchs', 'id', $batch_id);
    $batch_start = $batch_info[0]['starting_time'];
    $batch_end = $batch_info[0]['ending_time'];

    // 3. Validation
   if (
    $start_time < $shift_start || $end_time > $shift_end ||
    $start_time < $batch_start || $end_time > $batch_end
) {
    $this->session->set_flashdata('error', 'Class timing should be within Employee Shift and Batch Timings.');
    redirect($_SERVER['HTTP_REFERER']);  // go back to the form
} else {


        // Proceed to insert or update the class
    

            $inst_id = $this->CommonModal->insertRowReturnId('timetable', $post);

    }
            if (!empty($page) && $page == '1') {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                 if($tag2=='emp'){
                redirect(base_url('Admin_Dashboard/view_timetable/'.$eid.'/' . $id.'?tag=emp'));
                 } else {
                     redirect(base_url('Admin_Dashboard/view_timetable/'.$id.'/' . $eid));
                 }
            }
        } else {

            $this->load->view('user/add_timetable', $data);
        }
    }

  public function update_timetable($id, $uid)
{
    $data['title'] = 'Update Class';
    $data['tag'] = 'edit';
    $data['tag2'] = $this->input->get('tag');
    $tag2 = $data['tag2'];

    $tid = decryptId($uid);
    $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
    $data['timetable'] = $this->CommonModal->getRowById('timetable', 'id', $id);

    $course_id = $data['timetable'][0]['course_id'];
    $data['subjects'] = $this->CommonModal->getRowById('subjects', 'course_id', $course_id);
    $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
    $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
    $data['employee'] = $this->CommonModal->getRowByMultitpleId('employees', 'status', '0', 'inst_id', $tid, 'id', 'DESC');

    if ($this->input->post()) {

        $post = $this->input->post();

        $batch_id = $post['batch_id'];
        $emp_id = $post['emp_id'];
        $start_time = $post['starting_time'];
        $end_time = $post['ending_time'];

        // 1. Get Employee Shift Timing
        $emp_shift = $this->CommonModal->getRowById('employees', 'id', $emp_id);
        $shift_id = $emp_shift[0]['shift_id'];
        $shift = $this->CommonModal->getRowById('shifts', 'id', $shift_id);
        $shift_start = $shift[0]['starting_time'];
        $shift_end = $shift[0]['ending_time'];

        // 2. Get Batch Timing
        $batch_info = $this->CommonModal->getRowById('batchs', 'id', $batch_id);
        $batch_start = $batch_info[0]['starting_time'];
        $batch_end = $batch_info[0]['ending_time'];

        // 3. Validation
        if (
            $start_time < $shift_start || $end_time > $shift_end ||
            $start_time < $batch_start || $end_time > $batch_end
        ) {
            $this->session->set_flashdata('error', 'Class timing should be within Employee Shift and Batch Timings.');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $category_id = $this->CommonModal->updateRowById('timetable', 'id', $id, $post);

            if ($category_id) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Update failed. Please try again.</div>');
            }

            // Redirect
            $redirect_url = 'Admin_Dashboard/view_timetable/' . encryptId($emp_id) . '/' . $uid;
            if ($tag2 == 'emp') {
                $redirect_url .= '?tag=emp';
            }
            redirect(base_url($redirect_url));
        }

    } else {
        // Show update form
        $this->load->view('user/add_timetable', $data);
    }
}


    public function deactivetimetable($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('timetable', 'id', $id, $data);
        $timetable = $this->CommonModal->getRowById('timetable', 'id', $id);

        redirect(base_url('Admin_Dashboard/view_timetable/' . $uid . '?tag=deactive'));
    }
    public function activetimetable($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('timetable', 'id', $id, $data);
        $data['timetable'] = $this->CommonModal->getRowById('timetable', 'id', $id);
        $timetable = $this->CommonModal->getRowById('timetable', 'id', $id);


        redirect(base_url('Admin_Dashboard/view_timetable/' . $uid));
    }
      public function view_assignment($uid)
    {
       
        $data['title'] = "View Document";
        $tid = decryptId($uid);
    

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
      
        $BdID = $this->input->get('BdID');


        if ($BdID) {
            $this->CommonModal->deleteRowById('assignment', array('id' => $BdID));

                redirect(base_url('Admin_Dashboard/view_assignment/' .$uid));
            
        }
        
            $data['assignment'] = $this->CommonModal->getRowByMultitpleId('assignment', 'status','0','inst_id', $tid, 'id', 'DESC');
      
        $this->load->view('user/view_assignment', $data);
    }
    public function add_assignment($id, $page = null)
    {

        $data['title'] = "Add Document";
        $data['tag'] = "add";
        
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
       
            $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status','0', 'inst_id', $tid, 'id', 'DESC');
            $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status','0', 'inst_id', $tid, 'id', 'DESC');


        if (count($_POST) > 0) {

            $post = $this->input->post();
          
     $post['file'] = pdfUpload('file', 'uploads/assignment/');

            $inst_id = $this->CommonModal->insertRowReturnId('assignment', $post);

            if ($inst_id) {
                $this->session->set_userdata('msg', 'Added successfully');
            } else {
                $this->session->set_userdata('msg', ' Error ');
            }
            if (!empty($page) && $page == '1') {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(base_url('Admin_Dashboard/view_assignment/'.encryptId($post['inst_id'])));
            }
        } else {

            $this->load->view('user/add_assignment', $data);
        }
    }

    public function update_assignment($id,$uid)
    {

        $data['title'] = 'Update Document';
        $data['tag'] = 'edit';
        $data['tag2'] = $this->input->get('tag');

$tid = decryptId($uid);
$eid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

        $data['assignment'] = $this->CommonModal->getRowById('assignment', 'id', $eid);
        $course_id = $data['assignment'][0]['course_id'];
        $data['subjects'] = $this->CommonModal->getRowById('subjects', 'course_id', $course_id);
        $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status','0', 'inst_id', $tid, 'id', 'DESC');
        $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status','0', 'inst_id', $tid, 'id', 'DESC');

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $existing_pdf = $post['file'];

       if ($_FILES['file']['name'] != '') {
    $pdf = pdfUpload('file', 'uploads/assignment/');
    $post['file'] = $pdf;  // Save the new PDF file name
    if ($existing_pdf != "") {
        // Remove old PDF if it exists
        unlink('uploads/assignment/' . $existing_pdf);
    }
}


            $category_id = $this->CommonModal->updateRowById('assignment', 'id', $eid, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', 'Updated Successfully');
            } else {
                $this->session->set_userdata('msg', ' Error ');
            }
          
                redirect(base_url('Admin_Dashboard/view_assignment/' . $uid ));
        
        } else {

            $this->load->view('user/add_assignment', $data);
        }
    }
      public function view_liveclass($uid)
    {
       
        $data['title'] = "View Classes";
        $tid = decryptId($uid);
    

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
      
        $BdID = $this->input->get('BdID');


        if ($BdID) {
            $this->CommonModal->deleteRowById('liveclass', array('id' => $BdID));

                redirect(base_url('Admin_Dashboard/view_liveclass/' .$uid));
            
        }
        
            $data['liveclass'] = $this->CommonModal->getRowByMultitpleId('liveclass', 'status','0','inst_id', $tid, 'id', 'DESC');
      
        $this->load->view('user/view_liveclass', $data);
    }
    public function add_liveclass($id, $page = null)
    {

        $data['title'] = "Add Class";
        $data['tag'] = "add";
        
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
       
            $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status','0', 'inst_id', $tid, 'id', 'DESC');
            $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status','0', 'inst_id', $tid, 'id', 'DESC');
            $data['employee'] = $this->CommonModal->getRowByMultitpleId('employees', 'status','0', 'inst_id', $tid, 'id', 'DESC');


        if (count($_POST) > 0) {

            $post = $this->input->post();
          

            $inst_id = $this->CommonModal->insertRowReturnId('liveclass', $post);

            if ($inst_id) {
                $this->session->set_userdata('msg', 'Added successfully');
            } else {
                $this->session->set_userdata('msg', ' Error ');
            }
            if (!empty($page) && $page == '1') {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(base_url('Admin_Dashboard/view_liveclass/'.encryptId($post['inst_id'])));
            }
        } else {

            $this->load->view('user/add_liveclass', $data);
        }
    }

    public function update_liveclass($id,$uid)
    {

        $data['title'] = 'Update Document';
        $data['tag'] = 'edit';
        $data['tag2'] = $this->input->get('tag');

$tid = decryptId($uid);
$eid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

        $data['liveclass'] = $this->CommonModal->getRowById('liveclass', 'id', $eid);
  $course_id = $data['liveclass'][0]['course_id'];
    $data['subjects'] = $this->CommonModal->getRowById('subjects', 'course_id', $course_id);

         $data['batch'] = $this->CommonModal->getRowByMultitpleId('batchs', 'status','0', 'inst_id', $tid, 'id', 'DESC');
            $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status','0', 'inst_id', $tid, 'id', 'DESC');
            $data['employee'] = $this->CommonModal->getRowByMultitpleId('employees', 'status','0', 'inst_id', $tid, 'id', 'DESC');

        if (count($_POST) > 0) {

            $post = $this->input->post();



            $category_id = $this->CommonModal->updateRowById('liveclass', 'id', $eid, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', 'Updated Successfully');
            } else {
                $this->session->set_userdata('msg', ' Error ');
            }
          
                redirect(base_url('Admin_Dashboard/view_liveclass/' . $uid ));
        
        } else {

            $this->load->view('user/add_liveclass', $data);
        }
    }
      public function view_subject($id,$uid)
    {
       
        $data['title'] = "View Subject";
        $tid = decryptId($uid);
    $cid = decryptId($id);  
$data['course'] =  $cid;
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
      
        $BdID = $this->input->get('BdID');


        if ($BdID) {
            $this->CommonModal->deleteRowById('subjects', array('id' => $BdID));

                redirect(base_url('Admin_Dashboard/view_subject/'.$id.'/' .$uid));
            
        }
        
            $data['subject'] = $this->CommonModal->getRowByMultitpleId('subjects', 'course_id',$cid,'inst_id', $tid, 'id', 'DESC');
      
        $this->load->view('user/view_subject', $data);
    }
    public function add_subject($id, $page = null)
    {
        
        

        if (count($_POST) > 0) {

            $post = $this->input->post();
          

            $inst_id = $this->CommonModal->insertRowReturnId('subjects', $post);

            if ($inst_id) {
                $this->session->set_userdata('msg', 'Added successfully');
            } else {
                $this->session->set_userdata('msg', ' Error ');
            }
            if (!empty($page) && $page == '1') {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(base_url('Admin_Dashboard/view_subject/'.encryptId($post['course_id']).'/'.encryptId($post['inst_id'])));
            }
        }
    }

    public function edit_subject($id)
    {
        if (count($_POST) > 0) {

            $post = $this->input->post();



            $category_id = $this->CommonModal->updateRowById('subjects', 'id', $id, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', 'Updated Successfully');
            } else {
                $this->session->set_userdata('msg', ' Error ');
            }

                redirect(base_url('Admin_Dashboard/view_subject/' . encryptId($post['course_id'] ).'/'. encryptId($post['inst_id'] )));
            
        }
    }
    public function get_subjects_by_course()
{
    $course_id = $this->input->post('course_id');
    $subjects = $this->CommonModal->getRowById('subjects', 'course_id', $course_id);

    echo '<option value="N/A">Choose Subject</option>';
    if (!empty($subjects)) {
        foreach ($subjects as $subject) {
            echo '<option value="' . $subject['id'] . '">' . $subject['subject'] . '</option>';
        }
    } else {
        echo '<option value="N/A">No subjects found</option>';
    }
}


    public function view_course($id)
    {
        $data['title'] = "View course";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');


        if ($BdID) {
            $this->CommonModal->deleteRowById('courses', array('id' => $BdID));

            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_course/' . $id . '/?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_course/' . $id . '/?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status', '1', 'inst_id', $tid, 'id', 'DESC');
        } else {
            $data['course'] = $this->CommonModal->getRowByMultitpleId('courses', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
        }
        $this->load->view('user/view_course', $data);
    }
    public function add_course($id, $page = null)
    {

        $data['title'] = "Add course";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $inst_id = $this->CommonModal->insertRowReturnId('courses', $post);


            if (!empty($page) && $page == '1') {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(base_url('Admin_Dashboard/view_course/' . $id));
            }
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
            if ($tag1 == '0') {
                redirect(base_url('Admin_Dashboard/view_course/' . encryptId($post['inst_id']) . '?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_course/' . encryptId($post['inst_id']) . '?tag=deactive'));
            }
        } else {

            $this->load->view('user/add_course', $data);
        }
    }

    public function deactivecourse($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('courses', 'id', $id, $data);
        $course = $this->CommonModal->getRowById('courses', 'id', $id);

        redirect(base_url('Admin_Dashboard/view_course/' . $uid . '?tag=deactive'));
    }
    public function activecourse($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('courses', 'id', $id, $data);
        $data['course'] = $this->CommonModal->getRowById('courses', 'id', $id);
        $course = $this->CommonModal->getRowById('courses', 'id', $id);


        redirect(base_url('Admin_Dashboard/view_course/' . $uid));
    }
    public function view_plan($id)
    {
        $data['title'] = "View plan";


        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $id);
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
            $data['plan'] = $this->CommonModal->getRowByIdDesc('plan', 'status', '1', 'id', 'DESC');
        } else {
            $data['plan'] = $this->CommonModal->getRowByIdDesc('plan', 'status', '0', 'id', 'DESC');
        }
        $this->load->view('view_plan', $data);
    }
    public function add_plan()
    {

        $data['title'] = "Add Member";
        $data['tag'] = "add";
        //  $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

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
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $id);

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
            if ($tag1 == '0') {
                redirect(base_url('Admin_Dashboard/view_plan?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_plan?tag=deactive'));
            }
        } else {

            $this->load->view('add_plan', $data);
        }
    }

    public function deactiveplan($id)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('plan', 'id', $id, $data);

        redirect(base_url('Admin_Dashboard/view_plan?tag=deactive'));
    }
    public function activeplan($id)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('plan', 'id', $id, $data);
        $data['plan'] = $this->CommonModal->getRowById('plan', 'id', $id);


        redirect(base_url('Admin_Dashboard/view_plan?tag=active'));
    }


    //Employee Section


    public function view_shift($id)
    {
        $data['title'] = "View shift";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');


        if ($BdID) {
            $this->CommonModal->deleteRowById('shifts', array('id' => $BdID));

            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_shift/' . $id . '/?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_shift/' . $id . '/?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['shift'] = $this->CommonModal->getRowByMultitpleId('shifts', 'status', '1', 'inst_id', $tid, 'id', 'DESC');
        } else {
            $data['shift'] = $this->CommonModal->getRowByMultitpleId('shifts', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
        }
        $this->load->view('user/view_shift', $data);
    }
    public function add_shift($id, $page = null)
    {

        $data['title'] = "Add shift";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $inst_id = $this->CommonModal->insertRowReturnId('shifts', $post);


            if (!empty($page) && $page == '1') {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(base_url('Admin_Dashboard/view_shift/' . $id));
            }
        } else {

            $this->load->view('user/add_shift', $data);
        }
    }

    public function update_shift($id)
    {

        $data['title'] = 'Update shift';
        $data['tag'] = 'edit';

        $data['shift'] = $this->CommonModal->getRowById('shifts', 'id', $id);


        $tag1 = $this->input->get('tag');
        if (count($_POST) > 0) {

            $post = $this->input->post();


            $category_id = $this->CommonModal->updateRowById('shifts', 'id', $id, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if ($tag1 == '0') {
                redirect(base_url('Admin_Dashboard/view_shift/' . encryptId($post['inst_id']) . '?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_shift/' . encryptId($post['inst_id']) . '?tag=deactive'));
            }
        } else {

            $this->load->view('user/add_shift', $data);
        }
    }

    public function deactiveshift($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('shifts', 'id', $id, $data);
        $shift = $this->CommonModal->getRowById('shifts', 'id', $id);

        redirect(base_url('Admin_Dashboard/view_shift/' . $uid . '?tag=deactive'));
    }
    public function activeshift($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('shifts', 'id', $id, $data);
        $data['shift'] = $this->CommonModal->getRowById('shifts', 'id', $id);
        $shift = $this->CommonModal->getRowById('shifts', 'id', $id);


        redirect(base_url('Admin_Dashboard/view_shift/' . $uid));
    }
    public function view_department($id)
    {
        $data['title'] = "View Department";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');


        if ($BdID) {
            $this->CommonModal->deleteRowById('department', array('id' => $BdID));

            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_department/' . $id . '/?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_department/' . $id . '/?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['department'] = $this->CommonModal->getRowByMultitpleId('department', 'status', '1', 'inst_id', $tid, 'id', 'DESC');
        } else {
            $data['department'] = $this->CommonModal->getRowByMultitpleId('department', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
        }
        $this->load->view('user/view_department', $data);
    }
    public function add_department($id, $page = null)
    {

        $data['title'] = "Add Department";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        // $data['plan'] = $this->CommonModal->getRowById('plan', 'status', '0');

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $inst_id = $this->CommonModal->insertRowReturnId('department', $post);


            if (!empty($page) && $page == '1') {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(base_url('Admin_Dashboard/view_department/' . $id));
            }
        } else {

            $this->load->view('user/add_department', $data);
        }
    }

    public function update_department($id)
    {

        $data['title'] = 'Update Department';
        $data['tag'] = 'edit';

        $data['department'] = $this->CommonModal->getRowById('department', 'id', $id);


        $tag1 = $this->input->get('tag');
        if (count($_POST) > 0) {

            $post = $this->input->post();


            $category_id = $this->CommonModal->updateRowById('department', 'id', $id, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if ($tag1 == '0') {
                redirect(base_url('Admin_Dashboard/view_department/' . encryptId($post['inst_id']) . '?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_department/' . encryptId($post['inst_id']) . '?tag=deactive'));
            }
        } else {

            $this->load->view('user/add_department', $data);
        }
    }

    public function deactivedepartment($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('department', 'id', $id, $data);
        $department = $this->CommonModal->getRowById('department', 'id', $id);

        redirect(base_url('Admin_Dashboard/view_department/' . $uid . '?tag=deactive'));
    }
    public function activedepartment($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('department', 'id', $id, $data);
        $data['department'] = $this->CommonModal->getRowById('department', 'id', $id);
        $department = $this->CommonModal->getRowById('department', 'id', $id);


        redirect(base_url('Admin_Dashboard/view_department/' . $uid));
    }
    public function view_desgination($id)
    {
        $data['title'] = "View Designation";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');


        if ($BdID) {
            $this->CommonModal->deleteRowById('designation', array('id' => $BdID));

            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_desgination/' . $id . '/?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_desgination/' . $id . '/?tag=deactive'));
            }
        }
        if ($tag == "deactive") {
            $data['desgination'] = $this->CommonModal->getRowByMultitpleId('designation', 'status', '1', 'inst_id', $tid, 'id', 'DESC');
        } else {
            $data['desgination'] = $this->CommonModal->getRowByMultitpleId('designation', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
        }
        $this->load->view('user/view_desgination', $data);
    }
    public function add_desgination($id, $page = null)
    {
        $data['title'] = "Add Designation";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

        if ($this->input->post()) {
            $post = $this->input->post();
            $inst_id = $this->CommonModal->insertRowReturnId('designation', $post);

            if (!empty($page) && $page == '1') {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(base_url('Admin_Dashboard/view_desgination/' . $id));
            }
        } else {
            $this->load->view('user/add_desgination', $data);
        }
    }


    public function update_desgination($id)
    {

        $data['title'] = 'Update Designation';
        $data['tag'] = 'edit';

        $data['desgination'] = $this->CommonModal->getRowById('designation', 'id', $id);


        $tag1 = $this->input->get('tag');
        if (count($_POST) > 0) {

            $post = $this->input->post();


            $category_id = $this->CommonModal->updateRowById('designation', 'id', $id, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success"> Error successfully</div>');
            }
            if ($tag1 == '0') {
                redirect(base_url('Admin_Dashboard/view_desgination/' . encryptId($post['inst_id']) . '?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_desgination/' . encryptId($post['inst_id']) . '?tag=deactive'));
            }
        } else {

            $this->load->view('user/add_desgination', $data);
        }
    }

    public function deactivedesgination($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('designation', 'id', $id, $data);
        $desgination = $this->CommonModal->getRowById('designation', 'id', $id);

        redirect(base_url('Admin_Dashboard/view_desgination/' . $uid . '?tag=deactive'));
    }
    public function activedesgination($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('designation', 'id', $id, $data);
        $data['desgination'] = $this->CommonModal->getRowById('designation', 'id', $id);
        $desgination = $this->CommonModal->getRowById('designation', 'id', $id);


        redirect(base_url('Admin_Dashboard/view_desgination/' . $uid));
    }
    public function employee($id, $uid)
    {
        $data['title'] = "View employee";
        $tid = decryptId($id);
        $uid = decryptId($uid);

        $data['account'] = $this->CommonModal->getRowById('account', 'inst_id', $uid);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $uid);
        $data['employee'] = $this->CommonModal->getRowByMultitpleId('employees', 'id', $tid, 'inst_id', $uid, 'id', 'DESC');

        $data['salary_list'] = $this->CommonModal->getRowById('employee_salary', 'employee_id', $tid);
        $data['class'] = $this->CommonModal->getRowByMultitpleId('timetable', 'emp_id', $tid, 'inst_id', $uid, 'id', 'DESC');

        $this->load->view('user/employee', $data);
    }

    public function view_employee($id)
    {
        $data['title'] = "View employee";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['tag'] = $this->input->get('tag');
        $tag = $data['tag'];
        $BdID = $this->input->get('BdID');
        $img = $this->input->get('img');

        if ($BdID) {
            $this->CommonModal->deleteRowById('employees', array('id' => $BdID));
            // $this->CommonModal->deleteRowById('agent_customer', array('customer_id' => $BdID));

            if ($img) {
                unlink('./uploads/employee/' . $img);
            }
            if ($tag == '0') {
                redirect(base_url('Admin_Dashboard/view_employee?tag=active'));
            } else {
                redirect(base_url('Admin_Dashboard/view_employee?tag=deactive'));
            }
        }

        $data['employee'] = $this->CommonModal->getRowByIdDesc('employees', 'inst_id', $tid, 'id', 'DESC');

        $this->load->view('user/view_employee', $data);
    }


    public function add_employee($id)
    {
        $data['title'] = "Add employee";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $inst= $this->CommonModal->getRowById('institutions', 'id', $tid);


        $data['shift'] = $this->CommonModal->getRowByMultitpleId('shifts', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
        $data['department'] = $this->CommonModal->getRowByMultitpleId('department', 'status', '0', 'inst_id', $tid, 'id', 'DESC');
        $data['designation'] = $this->CommonModal->getRowByMultitpleId('designation', 'status', '0', 'inst_id', $tid, 'id', 'DESC');



        if ($this->input->post()) {
            $post = $this->input->post();

            // Check if email is already registered
            $existing_email = $this->CommonModal->getRowById('employees', 'email', $post['email']);
            if (!empty($existing_email)) {
                echo "<script>alert('Email is already registered!');</script>";
                redirect($_SERVER['HTTP_REFERER']);
                exit;
            }

            $post['emp_code'] = $this->CommonModal->generate_emp_code($tid, $post['shift_id'], $post['branch_id']);
            // Generate random password
            $password = bin2hex(random_bytes(8));
            $post['password'] = $password;
            
            $post['image'] = imageUpload('image', 'uploads/employee/');

            // **Insert employee and get ID**
            $employee_id = $this->CommonModal->insertRowReturnId('employees', $post);
if($employee_id) {

            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', $inst[0]['name']);  // Use institution name as sender
            $this->email->to($post['email']);  // Send to user's email
            $this->email->subject('Registration Successfully');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($post['name']) . ",\n\n";
$message .= "We are pleased to inform you that you are the part of our institution " . $inst[0]['name'] . ". Below are your login credentials:\n\n";
$message .= "Username: " . htmlspecialchars($post['email']) . "\n";
$message .= "Password: " . htmlspecialchars($post['password']) . "\n\n";
$message .= "Please keep your login credentials secure and do not share them with anyone.\n\n";
$message .= "You can log in to the software using the following link: " . base_url() . "\n\n";
$message .= "If you encounter any issues, please feel free to contact our support team.\n\n";
$message .= "Thank you for choosing our institution!\n\n";
$message .= "Best regards,\n";
$message .= "The " . $inst[0]['name'] . " Team";

            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $post['email']);
            }
   }
            redirect(base_url('Admin_Dashboard/view_employee/' . $id));
        } else {
            $this->load->view('user/add_employee', $data);
        }
    }

    public function update_employee($id, $uuid)
    {
        $tid = decryptId($id);
        $uid = decryptId($uuid);

        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $uid);
        $data['title'] = 'Update Member';
        $data['tag'] = 'edit';
        $data['employee'] = $this->CommonModal->getRowById('employees', 'id', $tid);

        $data['shift'] = $this->CommonModal->getRowByMultitpleId('shifts', 'status', '0', 'inst_id', $uid, 'id', 'DESC');
        $data['department'] = $this->CommonModal->getRowByMultitpleId('department', 'status', '0', 'inst_id', $uid, 'id', 'DESC');
        $data['designation'] = $this->CommonModal->getRowByMultitpleId('designation', 'status', '0', 'inst_id', $uid, 'id', 'DESC');
        $tag1 = $this->input->get('tag');

        if (count($_POST) > 0) {
            $post = $this->input->post();


            $image_url = $post['image'];
            if ($_FILES['image']['name'] != '') {

                $img = imageUpload('image', 'uploads/employee/');

                $post['image'] = $img;

                if ($image_url != "") {

                    unlink('uploads/employee/' . $image_url);
                }
            }
            // Update employee data
            $category_id = $this->CommonModal->updateRowById('employees', 'id', $tid, $post);




            // Set session message before redirecting
            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating record</div>');
            }

            // Redirect after processing

            redirect(base_url('Admin_Dashboard/view_employee/' . $uuid));
        } else {
            $this->load->view('user/add_employee', $data);
        }
    }


    public function deactiveemployee($id, $uid)
    {
        $data['status'] = 1;
        $status_id = $this->CommonModal->updateRowById('employees', 'id', $id, $data);
        $employee = $this->CommonModal->getRowById('employees', 'id', $id);

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function activeemployee($id, $uid)
    {
        $data['status'] = 0;
        $status_id = $this->CommonModal->updateRowById('employees', 'id', $id, $data);
        $data['employee'] = $this->CommonModal->getRowById('employees', 'id', $id);
        $employee = $this->CommonModal->getRowById('employees', 'id', $id);


        redirect($_SERVER['HTTP_REFERER']);
    }
    public function View_emp_attendance($id)
    {
        $data['title'] = "View Employee Attendance";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['department'] = $this->CommonModal->getRowByMultitpleId('department', 'status', '0', 'inst_id', $tid, 'id', 'DESC');

        // Default values
        $start_date = date('Y-m-d', strtotime('-1 day')); // Yesterday
        $end_date = date('Y-m-d'); // Today
        $department_id = "all";

        if ($this->input->post()) {
            $department_id = $this->input->post('department_id');

            if (!empty($this->input->post('from'))) {
                $start_date = date('Y-m-d', strtotime($this->input->post('from')));
            }

            if (!empty($this->input->post('to'))) {
                $end_date = date('Y-m-d', strtotime($this->input->post('to')));
            }
        }

        // ✅ Corrected Condition for Fetching Attendance
        if ($department_id == "all") {
            $data['attendence'] = $this->CommonModal->get_attendence(
                'emp_attendance',
                'inst_id',
                $tid,
                'date',
                $end_date,
                'date',
                $start_date,
                $end_date
            );
        } else {
            $data['attendence'] = $this->CommonModal->get_attendence(
                'emp_attendance',
                'inst_id',
                $tid,
                'department_id',
                $department_id,
                'date',
                $start_date,
                $end_date
            );
        }

        // Passing Filtered Data to View
        $data['start'] = $start_date;
        $data['end'] = $end_date;
        $data['selected_department'] = $department_id;

        $this->load->view('user/view_emp_attendance', $data);
    }
    public function add_emp_attendance($id)
    {
        $data['title'] = "Today Attendance";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

        $data['department'] = $this->CommonModal->getRowByMultitpleId('department', 'status', '0', 'inst_id', $tid, 'id', 'DESC');


        $this->load->view('user/add_emp_attendance', $data);
    }
    public function get_emp_by_department($department_id, $id)
    {
        $employees  = $this->CommonModal->getRowByMultitpleId('employees', 'inst_id', $id, 'department', $department_id, 'id', 'DESC');
        if (!empty($employees)) {
        ?>
            <form action="<?= base_url('Admin_Dashboard/submit_bulk_emp_attendance') ?>" method="POST">
                <input type="hidden" name="department_id" value="<?= $department_id; ?>">
                <input type="hidden" name="inst_id" value="<?= $id; ?>">


                <div class="table-responsive custom-table pb-3">
                    <table class="table datatable" id="attendenceTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Emp Code</th>
                                <th>Employee Name</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Late</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $employee): ?>
                                <tr>
                                    <td>
                                        <?= $employee['emp_code'] ?>
                                        <input type="hidden" name="attendance[<?= $employee['id'] ?>][emp_code]" value="<?= $employee['emp_code'] ?>">
                                    </td>
                                    <td><?= $employee['name'] ?></td>
                                    <td><input type="radio" name="attendance[<?= $employee['id'] ?>][status]" value="Present" checked></td>
                                    <td><input type="radio" name="attendance[<?= $employee['id'] ?>][status]" value="Absent"></td>
                                    <td><input type="radio" name="attendance[<?= $employee['id'] ?>][status]" value="Late"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Submit Attendance</button>
            </form>

<?php
        } else {
            echo "<p>No Employee found for this Department.</p>";
        }
    }
    public function submit_bulk_emp_attendance()
    {
        $department_id = $this->input->post('department_id');
        $inst_id = $this->input->post('inst_id');
        $attendance = $this->input->post('attendance');
        $date = date('Y-m-d'); // Auto-fetch today's date

        if (!is_array($attendance) || empty($attendance)) {
            $this->session->set_flashdata('error', 'No attendance data received.');
            redirect('Admin_Dashboard/view_emp_attendance/' . encryptId($inst_id));
            return;
        }

        foreach ($attendance as $emp_id => $data) {
            if (!is_array($data) || !isset($data['emp_code']) || !isset($data['status'])) {
                continue; // Skip invalid entries
            }

            $emp_code = $data['emp_code'];
            $status = $data['status'];

            // Check if attendance already exists for this student on this date
            $existing_attendance = $this->CommonModal->getRowByCondition('emp_attendance', [
                'inst_id' => $inst_id,
                'emp_id' => $emp_id,
                'department_id' => $department_id,
                'date' => $date
            ]);

            if ($existing_attendance) {
                // Update existing attendance record
                $this->CommonModal->updateRowByCondition('emp_attendance', [
                    'inst_id' => $inst_id,
                    'emp_id' => $emp_id,
                    'department_id' => $department_id,
                    'date' => $date
                ], [
                    'status' => $status
                ]);
            } else {
                // Insert new attendance record
                $this->CommonModal->insertRow('emp_attendance', [
                    'inst_id' => $inst_id,
                    'emp_id' => $emp_id,
                    'emp_code' => $emp_code,
                    'department_id' => $department_id,
                    'date' => $date,
                    'status' => $status
                ]);
            }
        }

        $this->session->set_flashdata('success', 'Attendance recorded successfully.');
        redirect('Admin_Dashboard/view_emp_attendance/' . encryptId($inst_id));
    }
    public function upload_emp_attendance_csv()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        if (!isset($_FILES['csv_file']['tmp_name'])) {
            echo json_encode(["status" => false, "message" => "No file uploaded."]);
            return;
        }

        $filePath = $_FILES['csv_file']['tmp_name'];
        $file = fopen($filePath, "r");

        if (!$file) {
            echo json_encode(["status" => false, "message" => "Failed to read the CSV file."]);
            return;
        }

        $rowNumber = 0;
        $insertCount = 0;
        $updateCount = 0;

        while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
            if ($rowNumber == 0) {
                $rowNumber++;
                continue;
            }

            if (count($row) < 8) continue;

            $emp_id = $row[0];
            $emp_code = $row[1];
            $inst_id = $row[3];
            $department_id = $row[4];
            $date = date('Y-m-d', strtotime($row[6]));
            $status = $row[7];

            // Check if attendance already exists for emp_id and date
            $existing = $this->db->get_where('emp_attendance', [
                'emp_id' => $emp_id,
                'date' => $date
            ])->row();

            $data = [
                'emp_code' => $emp_code,
                'inst_id' => $inst_id,
                'department_id' => $department_id,
                'status' => $status,
                'create_at' => date('Y-m-d H:i:s')
            ];

            if ($existing) {
                // Update existing attendance
                $this->db->where(['emp_id' => $emp_id, 'date' => $date]);
                $this->db->update('emp_attendance', $data);
                $updateCount++;
            } else {
                // Insert new attendance
                $data['emp_id'] = $emp_id;
                $data['date'] = $date;
                $this->db->insert('emp_attendance', $data);
                $insertCount++;
            }
        }

        fclose($file);

        echo json_encode([
            "status" => true,
            "message" => "Attendance uploaded. Inserted: $insertCount, Updated: $updateCount"
        ]);
    }

    public function get_emp_attendance_summary()
    {
        $emp_code = $this->input->get('emp_code');
        $inst_id = $this->input->get('inst_id');
        $month = $this->input->get('month'); // e.g., "2025-05"

        if (!$emp_code || !$month) {
            echo json_encode(['status' => false, 'message' => 'Invalid input.']);
            return;
        }

        // Get emp_id from emp_code
        $emp = $this->db->get_where('employees', ['id' => $emp_code, 'inst_id' => $inst_id])->row();

        if (!$emp) {
            echo json_encode(['status' => false, 'message' => 'Employee not found.']);
            return;
        }

        $emp_id = $emp->id;

        // Use month as YYYY-MM
        $start_date = $month . "-01";
        $end_date = date("Y-m-t", strtotime($start_date));

        // Total working days (distinct attendance dates)
        $this->db->distinct();
        $this->db->select('date');
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where('emp_id', $emp_id);
        $workingDays = $this->db->get('emp_attendance')->num_rows();

        // Present days
        $presentDays = $this->db->where('emp_id', $emp_id)
            ->where_in('status', ['Present', 'present'])
            ->where('date >=', $start_date)
            ->where('date <=', $end_date)
            ->get('emp_attendance')
            ->num_rows();

        // Late days
        $lateDays = $this->db->where('emp_id', $emp_id)
            ->where_in('status', ['Late', 'late'])
            ->where('date >=', $start_date)
            ->where('date <=', $end_date)
            ->get('emp_attendance')
            ->num_rows();

        // Absent days
        $absentDays = $this->db->where('emp_id', $emp_id)
            ->where_in('status', ['Absent', 'absent'])
            ->where('date >=', $start_date)
            ->where('date <=', $end_date)
            ->get('emp_attendance')
            ->num_rows();

        echo json_encode([
            'status' => true,
            'total_days' => $workingDays,
            'present_days' => $presentDays,
            'absent_days' => $absentDays,
            'late_days' => $lateDays
        ]);
    }
    public function add_emp_salary($inst_id_encrypted)
    {
        $inst_id = decryptId($inst_id_encrypted);
        $post = $this->input->post();

        // Sanitize and extract form values
        $employee_id = $post['id'];
        $month = $post['month'];
        $salary = $post['salary'];
        $total_days = $post['total_days'];
        $present = $post['present'];
        $leaves = $post['leaves'];
        $cuting_days = $post['cuting_days'];
        $less_salary = $post['less_salary'];
        $total_salary = $post['total_salary'];
        $mode = $post['mode'];
        $paid = $post['paid'];
        $account_id = isset($post['account_id']) ? $post['account_id'] : null;
        $cheque_no = isset($post['cheque_no']) ? $post['cheque_no'] : null;
        $reward_ids = isset($post['reward']) ? implode(',', $post['reward']) : '';
        $penalty_ids = isset($post['penailty_type']) ? implode(',', $post['penailty_type']) : '';

        $date = date('Y-m-d');
        $now = date('Y-m-d H:i:s');

        // 1. Insert into employee_salary
        $employee_salary = [
            'inst_id' => $inst_id,
            'employee_id' => $employee_id,
            'month' => $month,
            'salary' => $salary,
            'total_days' => $total_days,
            'present' => $present,
            'leaves' => $leaves,
            'cuting_days' => $cuting_days,
            'less_salary' => $less_salary,
            'total_salary' => $total_salary,
            'status' => 'Paid',
            'date' => $date,
            'created_at' => $now
        ];
        $salary_id = $this->CommonModal->insertRowReturnId('employee_salary', $employee_salary);

        // 2. Insert into emp_salary_cal
        $emp_salary_cal = [
            'inst_id' => $inst_id,
            'branch_id' => 0, // Add branch_id logic if applicable
            'emp_id' => $employee_id,
            'reward' => $reward_ids,
            'penailty' => $penalty_ids,
            'salary_id' => $salary_id,
            'date' => $date
        ];
        $this->CommonModal->insertRow('emp_salary_cal', $emp_salary_cal);

        $due = $total_salary - $paid;

        // Optional: Insert payment details (if tracking mode-specific info)
        $payment_data = [
            'inst_id' => $inst_id,
            'emp_id' => $employee_id,
            'mode' => $mode,
            'transaction_id' => 'TXN' . time(), // Unique ID
            'account_id' => $account_id,
            'cheque_no' => $cheque_no,
            'total' => $total_salary,
            'paid' => $paid,
            'due' => $due,

            'month' => $month,
            'date' => $date
        ];
        $this->CommonModal->insertRow('employee_payment', $payment_data);

        // $this->session->set_flashdata('msg', 'Salary added successfully!');
        // redirect('Admin_Dashboard/employee_salary_list'); 
      $this->session->set_flashdata('msg', 'Salary added successfully!');
redirect('Admin_Dashboard/employee/' . encryptId($employee_id) . '/' . encryptId($inst_id) . '?tab=notes');

    }

    public function get_penalty_amounts()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['ids']) && is_array($data['ids'])) {
            $this->db->select_sum('depacted_rupees');
            $this->db->where_in('id', $data['ids']);
            $query = $this->db->get('penailty');

            $result = $query->row();
            $total = $result ? (float)$result->depacted_rupees : 0;

            echo json_encode(['status' => true, 'total_penalty' => $total]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No IDs provided']);
        }
    }
    public function get_reward_amounts()
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $rewardIds = $input['ids'];

        if (!empty($rewardIds)) {
            $this->db->select_sum('reward_rupees');
            $this->db->where_in('id', $rewardIds);
            $query = $this->db->get('reward');

            $total = $query->row()->reward_rupees ?? 0;

            echo json_encode([
                'status' => true,
                'total_reward' => floatval($total)
            ]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function upload_emp_excel_formate($id)
    {
        $data['title'] = "View batch";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);

        $this->load->view('user/upload_emp_excel_formate', $data);
    }
    public function get_emp()
    {
        // ✅ Debugging - Check if function runs
        error_log("get_emp() function called!");

        // Allow CORS
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        $user_id = $this->input->get('user_id');

        // ✅ Debugging - Check if Database Query Runs
        $this->db->select('employees.id as empl_id,employees.emp_code as emp_code, employees.name as emp_name, employees.inst_id, department.id as department_id, department.name as department_name');
        $this->db->from('employees');
        $this->db->join('department', 'department.id = employees.department', 'left');
        $this->db->where('employees.inst_id', $user_id); // ✅ students table se inst_id filter karein
        $query = $this->db->get();


        if (!$query) {
            error_log("SQL Error: " . $this->db->last_query());
            echo json_encode(["error" => "Database query failed"]);
            return;
        }

        $emp = $query->result_array();

        // ✅ Debugging - Check Data
        error_log("Total Employee Found: " . count($emp));

        // Add date and blank status
        foreach ($emp as &$student) {
            $student['date'] = date('Y-m-d');
            $student['status'] = 'Present';
        }

        // ✅ Debugging - Check JSON Response Before Sending
        $response = json_encode([
            'status' => !empty($emp),
            'data'   => $emp ?: [],
            'message' => !empty($emp) ? 'Employee fetched successfully' : 'No Employee found'
        ]);

        error_log("JSON Response: " . $response);

        echo $response;
    }
    public function emp_attendence_report($id, $sid)
    {
        $data['title'] = "View Attendance Report";
        $tid = decryptId($id);
        $tsid = decryptId($sid);

        // Fetch institution and student details
        $data['user'] = $this->CommonModal->getRowById('institutions', 'id', $tid);
        $data['employee'] = $this->CommonModal->getRowById('employees', 'id', $tsid);

        // ✅ Set default date range (Last 30 Days)
        $start_date = date('Y-m-01');
        $end_date = date('Y-m-d'); // Today

        if ($this->input->post()) {
            if (!empty($this->input->post('from'))) {
                $start_date = date('Y-m-d', strtotime($this->input->post('from')));
            }

            if (!empty($this->input->post('to'))) {
                $end_date = date('Y-m-d', strtotime($this->input->post('to')));
            }
        }

        // ✅ Fetch Attendance Data for the Given Date Range
        $this->db->where('inst_id', $tid);
        $this->db->where('emp_id', $tsid);
        $this->db->where("date BETWEEN '$start_date' AND '$end_date'");
        $query = $this->db->get('emp_attendance');
        $data['attendence'] = $query->result_array();

        // ✅ Count Attendance Status
        $this->db->select("COUNT(*) as total_present");
        $this->db->where("inst_id", $tid);
        $this->db->where("emp_id", $tsid);
        $this->db->where("status", "Present");
        $this->db->where("date BETWEEN '$start_date' AND '$end_date'");
        $present = $this->db->get("emp_attendance")->row_array();
        $data['total_present'] = $present['total_present'];

        $this->db->select("COUNT(*) as total_absent");
        $this->db->where("inst_id", $tid);
        $this->db->where("emp_id", $tsid);
        $this->db->where("status", "Absent");
        $this->db->where("date BETWEEN '$start_date' AND '$end_date'");
        $absent = $this->db->get("emp_attendance")->row_array();
        $data['total_absent'] = $absent['total_absent'];

        $this->db->select("COUNT(*) as total_late");
        $this->db->where("inst_id", $tid);
        $this->db->where("emp_id", $tsid);
        $this->db->where("status", "Late");
        $this->db->where("date BETWEEN '$start_date' AND '$end_date'");
        $late = $this->db->get("emp_attendance")->row_array();
        $data['total_late'] = $late['total_late'];

        // Pass filter data to view
        $data['start'] = $start_date;
        $data['end'] = $end_date;

        $this->load->view('user/emp_attendance_report', $data);
    }

    public function teacher_profile($id)
    {

        $data['title'] = "Your Profile";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('employees', 'id', $tid);
        $teacher = $this->CommonModal->getRowById('employees', 'id', $tid);
        $data['clg'] = $this->CommonModal->getRowById('institutions', 'id', $teacher[0]['inst_id']);

        $this->load->view('branch/teacher_profile', $data);
    }
    public function change_teacher_password($id)
    {

        $data['title'] = 'Update Paasword';
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('employees', 'id', $tid);
        $student = $this->CommonModal->getRowById('employees', 'id', $tid);
        $data['clg'] = $this->CommonModal->getRowById('institutions', 'id', $student[0]['inst_id']);

        if (count($_POST) > 0) {

            $post = $this->input->post();


            $category_id = $this->CommonModal->updateRowById('employees', 'id', $tid, $post);

            if ($category_id) {
                echo "<script>alert(' Updated successfully');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                echo "<script>alert('Error To Updated');</script>";

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error successfully</div>');
            }
            redirect(base_url('Admin_Dashboard/teacher_profile/' . $id));
        } else {
            $this->load->view('branch/change_teacher_password', $data);
        }
    }

    public function teacher_login($id)
    {

        $data['title'] = "View employee";
        $tid = decryptId($id);
        $teacher = $this->CommonModal->getRowById('employees', 'id', $tid);

        $data['account'] = $this->CommonModal->getRowById('account', 'inst_id', $teacher[0]['inst_id']);
        $data['clg'] = $this->CommonModal->getRowById('institutions', 'id', $teacher[0]['inst_id']);
        $data['user'] = $this->CommonModal->getRowByMultitpleId('employees', 'id', $tid, 'inst_id', $teacher[0]['inst_id'], 'id', 'DESC');
        $data['salary_list'] = $this->CommonModal->getRowById('employee_salary', 'employee_id', $tid);

        $this->load->view('branch/teacher_dashboard', $data);
    }

    public function salary_slip($salary_id)
{
    $salary_id = decryptId($salary_id); // If ID is encrypted
    $salary = $this->CommonModal->getRowById('employee_salary', 'employee_id', $salary_id);
// Convert YYYY-MM to "Month Year" format
$monthYear = date("F Y", strtotime($salary[0]['month']));
$data['month_year'] = $monthYear;

    if (!$salary) {
        show_404(); // If no data found
    }

    $employee = $this->CommonModal->getRowById('employees', 'id', $salary[0]['employee_id']);
    $institution = $this->CommonModal->getRowById('institutions', 'id', $employee[0]['inst_id']);
   $department = $this->CommonModal->getRowById('department', 'id', $employee[0]['department']);
    $department_name = !empty($department) ? $department[0]['name'] : 'N/A';

    $employee[0]['department_name'] = $department_name;
    $data['salary'] = $salary[0];
    $data['employee'] = $employee[0];
    $data['institution'] = $institution[0];

    $this->load->view('branch/salary_slip', $data); // Create this file
}

    public function View_teacher_attendance($id)
    {
        $data['title'] = "View Employee Attendance";

        $tid = decryptId($id);  // yeh employee (teacher) ka ID hai

        // Fetch employee data
        $data['user'] = $this->CommonModal->getRowById('employees', 'id', $tid);
        $employee = $data['user'];

        // Fetch institution ID from employee
        $inst_id = $employee[0]['inst_id'];

        // Department list for this institution (for filter dropdown, if needed)
        $data['department'] = $this->CommonModal->getRowByMultitpleId('department', 'status', '0', 'inst_id', $inst_id, 'id', 'DESC');

        // Default values
        $start_date = date('Y-m-d', strtotime('-1 day')); // Yesterday
        $end_date = date('Y-m-d'); // Today
        $department_id = $employee[0]['department_id']; // default to employee's own department

        if ($this->input->post()) {
            if (!empty($this->input->post('from'))) {
                $start_date = date('Y-m-d', strtotime($this->input->post('from')));
            }

            if (!empty($this->input->post('to'))) {
                $end_date = date('Y-m-d', strtotime($this->input->post('to')));
            }

            // Optional: override department filter
            if (!empty($this->input->post('department_id'))) {
                $department_id = $this->input->post('department_id');
            }
        }

        // ✅ Filter attendance only for selected employee (teacher)
        $data['attendence'] = $this->CommonModal->get_attendence(
            'emp_attendance',
            'emp_id',
            $employee[0]['id'], // only that employee's data
            'department_id',
            $department_id,
            'date',
            $start_date,
            $end_date
        );

        // Pass to view
        $data['start'] = $start_date;
        $data['end'] = $end_date;
        $data['selected_department'] = $department_id;

        $this->load->view('branch/view_teacher_attendance', $data);
    }

}
