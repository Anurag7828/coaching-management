<?php

defined('BASEPATH') or exit('no direct access allowed');



class user extends CI_Controller
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
        $data['user'] = $this->CommonModal->getRowById('users','id',$id);
        $data['active'] = $this->CommonModal->getNumWhereRows('users','status',1);
        $data['deactive'] = $this->CommonModal->getNumWhereRows('users','status',0);

		$data['admin'] = $this->CommonModal->getAllRows('admin', 'id');


		$this->load->view('user/dashboard',$data);

    }


   
    public function job()
    {
        $data['title'] = "Our Jobs";
        $BdID = $this->input->get('BdID');
        if ($BdID) {
            $this->CommonModal->deleteRowById('job', array('id' => $BdID));
           
            redirect('admin_Dashboard/job');
        }
        $data['job'] = $this->CommonModal->getAllRowsInOrder('job', 'id', 'DESC');
        $this->load->view('admin/job', $data);
    }

    public function add_job()
    {

        $data['title'] = "Add Post";



        $data['tag'] = "add";



        if (count($_POST) > 0) {

            $post = $this->input->post();


            $savedata = $this->CommonModal->insertRowReturnId('job', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Job Add Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">job Add Successfully</div>');

            }

            redirect(base_url('admin_Dashboard/job'));

        } else {

            $this->load->view('admin/add_job', $data);

        }

    }
    public function edit_job($id)
    {

        $data['title'] = 'Update Job';

        $data['tag'] = 'edit';

        $tid = $id;

        $data['job'] = $this->CommonModal->getRowById('job', 'id', $tid);


        if (count($_POST) > 0) {

            $post = $this->input->post();


            $category_id = $this->CommonModal->updateRowById('job', 'id', $tid, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Job Updated successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Job Updated successfully</div>');

            }

            redirect(base_url('admin_Dashboard/job'));

        } else {

            $this->load->view('admin/edit_job', $data);

        }

    }

    public function team()
    {
        $data['title'] = "Our Team";
        $BdID = $this->input->get('BdID');
        $img = $this->input->get('img');
        if ($BdID) {
            $this->CommonModal->deleteRowById('team', array('id' => $BdID));
            if ($img) {
                unlink('./uploads/member/' . $img);
            }
            redirect('admin_Dashboard/team');
        }
        $data['team'] = $this->CommonModal->getAllRowsInOrder('team', 'id', 'DESC');
        $this->load->view('admin/team', $data);
    }

 public function add_team()
    {

        $data['title'] = "Add Member";



        $data['tag'] = "add";



        if (count($_POST) > 0) {

            $post = $this->input->post();



            $post['image'] = imageUpload('image', 'uploads/member/');



            $savedata = $this->CommonModal->insertRowReturnId('team', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Member Add Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Member Add Successfully</div>');

            }

            redirect(base_url('admin_Dashboard/team'));

        } else {

            $this->load->view('admin/add_team', $data);

        }

    }

public function edit_team($id)
    {





        $data['title'] = 'Update Member';

        $data['tag'] = 'edit';

        $tid = $id;

        $data['teams'] = $this->CommonModal->getRowById('team', 'id', $tid);



        if (count($_POST) > 0) {

            $post = $this->input->post();

            $image_url = $post['image'];



            if ($_FILES['img']['name'] != '') {

                $img = imageUpload('img', 'uploads/member/');

                $post['image'] = $img;

                if ($image_url != "") {

                    unlink('uploads/member/' . $image_url);

                }

            }

            $category_id = $this->CommonModal->updateRowById('team', 'id', $tid, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');

            }

            redirect(base_url('admin_Dashboard/team'));

        } else {

            $this->load->view('admin/edit_team', $data);

        }

    }

      public function services()
    {

        $data['title'] = "Projects";

        $data['tag'] = "Projects";

        $BdID = $this->input->get('BdID');

        $img = $this->input->get('img');

        if ($BdID != '') {

            $delete = $this->CommonModal->deleteRowById('project', array('id' => $BdID));

            unlink('./uploads/services/' . $img);

            redirect('admin_Dashboard/services');

            exit;

        }

        $data['services'] = $this->CommonModal->getAllRows('project');

        $this->load->view('admin/services', $data);

    }





    public function add_services()
    {

        $data['title'] = "Add Project";

        $data['tag'] = "Projects";



        if (count($_POST) > 0) {

            $post = $this->input->post();




            $post['image'] = imageUpload('image', 'uploads/services/');



            $savedata = $this->CommonModal->insertRowReturnId('project', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Project Add Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Project Add Successfully</div>');

            }

            redirect(base_url('admin_Dashboard/services'));

        } else {

            $this->load->view('admin/add_services', $data);

        }

    }







    public function edit_services($id)
    {





        $data['title'] = 'Update Project';

        $data['tag'] = "Project";

        $tid = $id;

        $data['service'] = $this->CommonModal->getRowById('project', 'id', $tid);



        if (count($_POST) > 0) {

            $post = $this->input->post();





            $image_url = $post['image'];



            if ($_FILES['img']['name'] != '') {

                $img = imageUpload('img', 'uploads/services/');

                $post['image'] = $img;

                if ($image_url != "") {

                    unlink('uploads/services/' . $image_url);

                }

            }







            $category_id = $this->CommonModal->updateRowById('project', 'id', $tid, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');

            }

            redirect(base_url('admin_Dashboard/services'));

        } else {

            $this->load->view('admin/edit_services', $data);

        }

    }
    public function product()
    {

        $data['title'] = "Products";

        $data['tag'] = "products";

        $BdID = $this->input->get('BdID');

        $img1 = $this->input->get('img1');
        $img2 = $this->input->get('img2');
        // $img3 = $this->input->get('img3');


        if ($BdID != '') {

            $delete = $this->CommonModal->deleteRowById('product', array('id' => $BdID));

            unlink('./uploads/product/' . $img1);
            unlink('./uploads/product/' . $img2);
            // unlink('./uploads/product/' . $img3);


            redirect('admin_Dashboard/product');

            exit;

        }

        $data['product'] = $this->CommonModal->getAllRows('product');

        $this->load->view('admin/product', $data);

    }





    public function add_product()
    {

        $data['title'] = "Add Product";

        $data['tag'] = "Product";



        if (count($_POST) > 0) {

            $post = $this->input->post();




            $post['image1'] = imageUpload('image1', 'uploads/product/');
            $post['image2'] = imageUpload('image2', 'uploads/product/');
            // $post['image3'] = imageUpload('image3', 'uploads/product/');




            $savedata = $this->CommonModal->insertRowReturnId('product', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Product Add Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Product Add Successfully</div>');

            }

            redirect(base_url('admin_Dashboard/product'));

        } else {

            $this->load->view('admin/add_product', $data);

        }

    }







    public function edit_product($id)
    {





        $data['title'] = 'Update product';

        $data['tag'] = "product";

        $tid = $id;

        $data['product'] = $this->CommonModal->getRowById('product', 'id', $tid);



        if (count($_POST) > 0) {

            $post = $this->input->post();





            $image_url1 = $post['image1'];
            $image_url2 = $post['image2'];
            // $image_url3 = $post['image3'];




            if ($_FILES['img1']['name'] != '') {

                $img = imageUpload('img1', 'uploads/product/');

                $post['image1'] = $img;

                if ($image_url1 != "") {

                    unlink('uploads/product/' . $image_url1);

                }

            }
            if ($_FILES['img2']['name'] != '') {

                $img2 = imageUpload('img2', 'uploads/product/');

                $post['image2'] = $img2;

                if ($image_url2 != "") {

                    unlink('uploads/product/' . $image_url2);

                }

            }
           







            $category_id = $this->CommonModal->updateRowById('product', 'id', $tid, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Updated successfully</div>');

            }

            redirect(base_url('admin_Dashboard/product'));

        } else {

            $this->load->view('admin/edit_product', $data);

        }

    }

    public function testimonials()
    {



        $data['title'] = "Testimonial";

        if (count($_POST) > 0) {

            $post = $this->input->post();



            // $post['testimonial'] = imageUpload('testimonial', 'uploads/testimonials/');



            $savedata = $this->CommonModal->insertRowReturnId('testimonial', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Testimonials Added Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Something  went wrong</div>');

            }

            redirect(base_url('admin_Dashboard/testimonials'));

        } else {



            $data['testimonials'] = $this->CommonModal->getAllRows('testimonial');

            $this->load->view('admin/testimonials', $data);

        }

    }


    public function deletetestimonials($id)
    {



        if ($this->CommonModal->deleteRowById('testimonial', array('id' => $id))) {

            $this->session->set_flashdata('msg', 'Testimonial Delete successfully');

            $this->session->set_flashdata('msg_class', 'alert-success');

        } else {

            $this->session->set_flashdata('msg', 'Testimonial not Delete Please try again!!');

            $this->session->set_flashdata('msg_class', 'alert-danger');

        }

        redirect('admin_Dashboard/testimonials');

    }
    
    public function client()
    {



        $data['title'] = "Clients";

        if (count($_POST) > 0) {

            $post = $this->input->post();



            $post['image'] = imageUpload('image', 'uploads/client/');




            $savedata = $this->CommonModal->insertRowReturnId('client', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Added Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Something  went wrong</div>');

            }

            redirect(base_url('admin_Dashboard/client'));

        } else {



            $data['clients'] = $this->CommonModal->getAllRows('client');

            $this->load->view('admin/client', $data);

        }

    }


    public function deleteclient()
    {

        $BdID = $this->input->get('BdID');

        $img = $this->input->get('img');


        if ($this->CommonModal->deleteRowById('client', array('id' => $BdID))) {
            unlink('./uploads/services/' . $img);
            $this->session->set_flashdata('msg', ' Delete successfully');

            $this->session->set_flashdata('msg_class', 'alert-success');

        } else {

            $this->session->set_flashdata('msg', ' Not Delete Please try again!!');

            $this->session->set_flashdata('msg_class', 'alert-danger');

        }

        redirect('admin_Dashboard/client');

    }
     public function blog()
    {

        $data['title'] = "Blogs";

        $data['tag'] = "blog";

        $BdID = $this->input->get('BdID');

        $img = $this->input->get('img');

        if ($BdID != '') {

            $delete = $this->CommonModal->deleteRowById('blog', array('id' => $BdID));

            unlink('./uploads/blog/' . $img);

            redirect('admin_Dashboard/blog');

            exit;

        }

        $data['blogs'] = $this->CommonModal->getAllRows('blog');

        $this->load->view('admin/blog', $data);

    }





    public function add_blog()
    {

        $data['title'] = "Add Blogs";

        $data['tag'] = "blog";



        if (count($_POST) > 0) {

            $post = $this->input->post();




            $post['image'] = imageUpload('img', 'uploads/blog/');



            $savedata = $this->CommonModal->insertRowReturnId('blog', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Blog Add Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Blog Add Successfully</div>');

            }

            redirect(base_url('admin_Dashboard/blog'));

        } else {

            $this->load->view('admin/add_blog', $data);

        }

    }







    public function edit_blog($id)
    {





        $data['title'] = 'Update Blogs';

        $data['tag'] = "blog";

        $tid = $id;

        $data['blog'] = $this->CommonModal->getRowById('blog', 'id', $tid);



        if (count($_POST) > 0) {

            $post = $this->input->post();





            $image_url = $post['image'];



            if ($_FILES['img']['name'] != '') {

                $img = imageUpload('img', 'uploads/blog/');

                $post['image'] = $img;

                if ($image_url != "") {

                    unlink('uploads/blog/' . $image_url);

                }

            }







            $category_id = $this->CommonModal->updateRowById('blog', 'id', $tid, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Blog Updated successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Blog Updated successfully</div>');

            }

            redirect(base_url('admin_Dashboard/blog'));

        } else {

            $this->load->view('admin/edit_blog', $data);

        }

    }
      public function contact_query()
    {



        $data['title'] = "Contact Query";

        $table = "contact_query";

        $BdID = $this->input->get('BdID');

        if ($BdID != '') {

            $delete = $this->CommonModal->deleteRowById('contact_query', array('id' =>$BdID));



            redirect('Admin_Dashboard/contact_query');

            exit;

        }

        $data['contact'] = $this->CommonModal->getAllRows($table);

        $this->load->view('admin/contact', $data);

    }
    
    public function career()
    {



        $data['title'] = "Career";

        $table = "career";

        $BdID = $this->input->get('BdID');

        if ($BdID != '') {

            $delete = $this->CommonModal->deleteRowById('career', array('id' => $BdID));



            redirect('Admin_Dashboard/career');

            exit;

        }

        $data['career'] = $this->CommonModal->getAllRows($table);

        $this->load->view('admin/career', $data);

    }
    public function lead()
    {



        $data['title'] = "Software Lead";

        $table = "lead";

        $BdID = $this->input->get('BdID');

        if ($BdID != '') {

            $delete = $this->CommonModal->deleteRowById('career', array('id' => $BdID));



            redirect('Admin_Dashboard/lead');

            exit;

        }

        $data['lead'] = $this->CommonModal->getAllRows($table);

        $this->load->view('admin/lead', $data);

    }
    // public function mentee()
    // {



    //     $data['title'] = "Mentee Registrations";

    //     $table = "mentee";

    //     $BdID = $this->input->get('BdID');

    //     if (decryptId($BdID) != '') {

    //         $delete = $this->CommonModal->deleteRowById('mentee', array('id' => decryptId($BdID)));



    //         redirect('Admin_Dashboard/mentee');

    //         exit;

    //     }

    //     $data['mentee'] = $this->CommonModal->getAllRowsInOrder('mentee', 'id', 'DESC');

    //     $this->load->view('admin/mentee', $data);

    // }





    // public function join_us()
    // {



    //     $data['title'] = "Join us as Member/Student Ambassador";



    //     $BdID = $this->input->get('BdID');

    //     if (decryptId($BdID) != '') {

    //         $delete = $this->CommonModal->deleteRowById('bc_join_us', array('id' => decryptId($BdID)));



    //         redirect('Admin_Dashboard/join_us');

    //         exit;

    //     }

    //     $data['join'] = $this->CommonModal->getAllRowsInOrder('bc_join_us', 'id', 'DESC');

    //     $this->load->view('admin/join_us', $data);

    // }



   



    







    // public function disable()
    // {

    //     $id = $this->uri->segment(3);

    //     $table = $this->uri->segment(4);

    //     $status = $this->uri->segment(5);







    //     if ($table == 'mentors') {

    //         $this->CommonModal->updateRowById($table, 'mid', $id, array('is_visible' => $status));

    //         redirect(base_url('admin_Dashboard/mentors'));

    //     }



    //     if ($table == 'blog') {

    //         $this->CommonModal->updateRowById($table, 'blog_id', $id, array('is_visible' => $status));

    //         redirect(base_url('admin_Dashboard/blogs'));

    //     }

    //     if ($table == 'whats_new') {

    //         $this->CommonModal->updateRowById($table, 'bid', $id, array('is_visible' => $status));

    //         redirect(base_url('admin_Dashboard/whats_new'));

    //     }

    //     if ($table == 'initiatives') {

    //         $this->CommonModal->updateRowById($table, 'id', $id, array('is_visible' => $status));

    //         redirect(base_url('admin_Dashboard/initiatives'));

    //     }

    // }



    // public function gallery()
    // {



    //     $data['title'] = "Gallery";

    //     $BdID = $this->input->get('BdID');

    //     $img = $this->input->get('img');

    //     if (decryptId($BdID) != '') {

    //         $delete = $this->CommonModal->deleteRowById('bc_home_gallery', array('bid' => decryptId($BdID)));

    //         unlink('./uploads/banner/' . $img);

    //         redirect('admin_Dashboard/gallery');

    //         exit;

    //     }

    //     $data['banner'] = $this->CommonModal->getAllRows('bc_home_gallery');

    //     $this->load->view('admin/gallery', $data);

    // }



    // public function add_gallery()
    // {



    //     $data['title'] = 'Add Image';

    //     $data['tag'] = 'add';



    //     if (count($_FILES) > 0) {

    //         $post = $this->input->post();



    //         $post['image'] = imageUpload('img', 'uploads/banner/');



    //         $category_id = $this->CommonModal->insertRowReturnId('bc_home_gallery', $post);

    //         if ($category_id) {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Image Add successfully</div>');

    //         } else {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Something went wrong</div>');

    //         }

    //         redirect(base_url('admin_Dashboard/gallery'));

    //     } else {

    //         $this->load->view('admin/add_gallery', $data);

    //     }

    // }





    // public function edit_gallery($id)
    // {



    //     $data['title'] = 'Update Image';

    //     $data['tag'] = 'edit';



    //     $tid = decryptId($id);

    //     $data['banner'] = $this->CommonModal->getRowById('bc_home_gallery', 'bid', $tid);



    //     if (count($_POST) > 0) {

    //         $post = $this->input->post();





    //         $image_url = $post['image'];



    //         if ($_FILES['img']['name'] != '') {

    //             $img = imageUpload('img', 'uploads/banner/');

    //             $post['image'] = $img;

    //             if ($image_url != "") {

    //                 unlink('uploads/banner/' . $image_url);

    //             }

    //         }





    //         $category_id = $this->CommonModal->updateRowById('bc_home_gallery', 'bid', $tid, $post);

    //         if ($category_id) {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Image Updated successfully</div>');

    //         } else {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Something went wrong</div>');

    //         }

    //         redirect(base_url('admin_Dashboard/gallery'));

    //     } else {

    //         $this->load->view('admin/add_gallery', $data);

    //     }

    // }





    // public function newsletter_pdf()
    // {



    //     $data['title'] = 'Newsletter Pdf';





    //     $BdID = $this->input->get('BdID');

    //     $img = $this->input->get('img');

    //     if (decryptId($BdID) != '') {

    //         $delete = $this->CommonModal->deleteRowById('bc_newslatter_pdf', array('id' => decryptId($BdID)));

    //         unlink('./uploads/newsletter/' . $img);

    //         redirect('admin_Dashboard/newsletter_pdf');

    //         exit;

    //     }

    //     $data['banner'] = $this->CommonModal->getAllRows('bc_newslatter_pdf');



    //     if (count($_POST) > 0) {

    //         $post = $this->input->post();

    //         $post['pdffile'] = pdfUpload('pdffile', 'uploads/newsletter/');

    //         $category_id = $this->CommonModal->insertRowReturnId('bc_newslatter_pdf', $post);

    //         if ($category_id) {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Newsletter Added successfully</div>');

    //         } else {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Something went wrong</div>');

    //         }

    //         redirect(base_url('admin_Dashboard/newsletter_pdf'));

    //     } else {

    //         $this->load->view('admin/newsletter-pdf', $data);

    //     }

    // }





    // public function whats_new()
    // {



    //     $data['title'] = "what's New";

    //     $data['tag'] = 'edit';





    //     $data['banner'] = $this->CommonModal->getRowById('bc_whats_new', 'bid', '1');



    //     if (count($_POST) > 0) {

    //         $post = $this->input->post();

    //         $image_url = $post['image'];



    //         if ($_FILES['img']['name'] != '') {

    //             $img = imageUpload('img', 'uploads/new/');

    //             $post['image'] = $img;

    //             if ($image_url != "") {

    //                 unlink('uploads/new/' . $image_url);

    //             }

    //         }



    //         $category_id = $this->CommonModal->updateRowById('bc_whats_new', 'bid', '1', $post);

    //         if ($category_id) {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Banner Updated successfully</div>');

    //         } else {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Something went wrong</div>');

    //         }

    //         redirect(base_url('admin_Dashboard/whats_new'));

    //     } else {

    //         $this->load->view('admin/whats_new', $data);

    //     }

    // }



  









    // public function initiatives()
    // {

    //     $data['title'] = "Initiatives";

    //     $data['tag'] = "initiatives";

    //     $BdID = $this->input->get('BdID');

    //     $img = $this->input->get('img');

    //     if (decryptId($BdID) != '') {

    //         $delete = $this->CommonModal->deleteRowById('bc_initiatives', array('id' => decryptId($BdID)));

    //         unlink('./uploads/initiatives/' . $img);

    //         redirect('admin_Dashboard/initiatives');

    //         exit;

    //     }

    //     $data['blogs'] = $this->CommonModal->getAllRows('bc_initiatives');

    //     $this->load->view('admin/blogs', $data);

    // }





    // public function add_initiatives()
    // {

    //     $data['title'] = "Add Initiatives";

    //     $data['tag'] = "initiatives";



    //     if (count($_POST) > 0) {

    //         $post = $this->input->post();



    //         $video_path = preg_replace("#.*youtube\.com/watch\?v=#", "", $post['video']);

    //         $video_path = preg_replace("#.*https://youtu.be/#", "", $post['video']);



    //         $post['video'] = $video_path;

    //         $post['image'] = imageUpload('img', 'uploads/initiatives/');



    //         $savedata = $this->CommonModal->insertRowReturnId('bc_initiatives', $post);

    //         if ($savedata) {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Initiatives Add Successfully</div>');

    //         } else {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Initiatives Add Successfully</div>');

    //         }

    //         redirect(base_url('admin_Dashboard/initiatives'));

    //     } else {

    //         $this->load->view('admin/add_blog', $data);

    //     }

    // }







    // public function edit_initiatives($id)
    // {





    //     $data['title'] = 'Update Initiatives';

    //     $data['tag'] = "initiatives";

    //     $tid = decryptId($id);

    //     $data['blog'] = $this->CommonModal->getRowById('initiatives', 'id', $tid);



    //     if (count($_POST) > 0) {

    //         $post = $this->input->post();

    //         $video_path = preg_replace("#.*youtube\.com/watch\?v=#", "", $post['video']);

    //         $video_path = preg_replace("#.*https://youtu.be/#", "", $post['video']);



    //         $post['video'] = $video_path;



    //         $image_url = $post['image'];



    //         if ($_FILES['img']['name'] != '') {

    //             $img = imageUpload('img', 'uploads/initiatives/');

    //             $post['image'] = $img;

    //             if ($image_url != "") {

    //                 unlink('uploads/initiatives/' . $image_url);

    //             }

    //         }





    //         $category_id = $this->CommonModal->updateRowById('initiatives', 'id', $tid, $post);

    //         if ($category_id) {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Initiatives Updated successfully</div>');

    //         } else {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Initiatives Updated successfully</div>');

    //         }

    //         redirect(base_url('admin_Dashboard/initiatives'));

    //     } else {

    //         $this->load->view('admin/edit_blog', $data);

    //     }

    // }







    // public function newsletter()
    // {



    //     $data['title'] = "Newsletter";

    //     $table = "newsletter";

    //     $BdID = $this->input->get('BdID');

    //     if (decryptId($BdID) != '') {

    //         $delete = $this->CommonModal->deleteRowById('newsletter', array('id' => decryptId($BdID)));



    //         redirect('Admin_Dashboard/newsletter');

    //         exit;

    //     }

    //     $data['newsletter'] = $this->CommonModal->getAllRows($table);

    //     $this->load->view('admin/newsletter', $data);

    // }



  




    // public function contactdetails()
    // {

    //     $data['title'] = "Contact Details";

    //     $table = "contactdetails";



    //     $data['contactdetails'] = $this->CommonModal->getRowById($table, 'cid', '1');

    //     if (count($_POST) > 0) {

    //         $post = $this->input->post();

    //         $update = $this->CommonModal->updateRowByMoreId($table, array('cid' => '1'), $post);

    //         if ($update) {



    //             $this->session->set_flashdata('msg', 'Category Add successfully');

    //             $this->session->set_flashdata('msg_class', 'alert-success');

    //         } else {

    //             $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');

    //             $this->session->set_flashdata('msg_class', 'alert-danger');

    //         }



    //         redirect(base_url() . 'admin_Dashboard/contactdetails');

    //     } else {

    //         $this->load->view('admin/contactdetails', $data);

    //     }

    // }



    // public function policy()
    // {

    //     $data['title'] = "Policy";



    //     $data['policy'] = $this->CommonModal->getAllRowsInOrder('policy', 'id', 'desc');

    //     $this->load->view('admin/policy', $data);

    // }



    // public function policy_edit()
    // {

    //     $key = $this->uri->segment(3);

    //     $data['title'] = "Policy Edit";

    //     $id = decryptId($key);



    //     $data['policy'] = $this->CommonModal->getRowById('policy', 'id', $id);

    //     if (count($_POST) > 0) {

    //         $post = $this->input->post();

    //         $savedata = $this->CommonModal->updateRowById('policy', 'id', $id, $post);

    //         if ($savedata) {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Policy Update Successfully</div>');

    //         } else {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Policy Update Successfully</div>');

    //         }

    //         redirect(base_url('admin_Dashboard/policy'));

    //     } else {

    //         $this->load->view('admin/policy-edit', $data);

    //     }

    // }

    // public function terms()
    // {

    //     $data['title'] = "Term of Uses";



    //     $data['terms'] = $this->CommonModal->getAllRowsInOrder('terms', 'id', 'desc');

    //     $this->load->view('admin/terms', $data);

    // }



    // public function terms_edit()
    // {

    //     $key = $this->uri->segment(3);

    //     $data['title'] = "Terms Edit";

    //     $id = decryptId($key);



    //     $data['terms'] = $this->CommonModal->getRowById('terms', 'id', $id);

    //     if (count($_POST) > 0) {

    //         $post = $this->input->post();

    //         $savedata = $this->CommonModal->updateRowById('terms', 'id', $id, $post);

    //         if ($savedata) {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Terms Update Successfully</div>');

    //         } else {

    //             $this->session->set_userdata('msg', '<div class="alert alert-success">Terms Update Successfully</div>');

    //         }

    //         redirect(base_url('admin_Dashboard/terms'));

    //     } else {

    //         $this->load->view('admin/terms-edit', $data);

    //     }

    // }



    




   





    public function logout()
    {

        $this->session->unset_userdata('admin_id');

        redirect('Admin');

    }

}

