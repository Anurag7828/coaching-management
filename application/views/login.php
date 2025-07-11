<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Streamline your business with our advanced CRM template. Easily integrate and customize to manage sales, support, and customer interactions efficiently. Perfect for any business size">
    <meta name="keywords"
        content="Advanced CRM template, customer relationship management, business CRM, sales optimization, customer support software, CRM integration, customizable CRM, business tools, enterprise CRM solutions">
    <meta name="author" content="Dreams Technologies">
    <meta name="robots" content="index, follow">

    <!-- Title -->
    <title>Login</title>

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">

    <!-- Favicon -->
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="assets/plugins/tabler-icons/tabler-icons.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="account-content">
            <div class="d-flex flex-wrap w-100 vh-100 overflow-hidden account-bg-01">
                <div
                    class="d-flex align-items-center justify-content-center flex-wrap vh-100 overflow-auto p-4 w-50 bg-backdrop">
                    <form action="<?= base_url('Admin/adminlogin')?>" class="flex-fill" method="post">
                        <div class="mx-auto mw-450">
                            <div class="text-center mb-4">
                                <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                            </div>
                            <div class="mb-4">
                                <h4 class="mb-2 fs-20">Sign In</h4>
                                <p>Access the CMS panel using your email and password.</p>
                                <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Email Address</label>
                                <div class="position-relative">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                    <input type="email" name="email" value="" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input form-control">
                                    <span class="ti toggle-password ti-eye-off"></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="form-check form-check-md d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="checkebox-md"
                                        checked="">
                                    <label class="form-check-label" for="checkebox-md">
                                        Remember Me
                                    </label>
                                </div>
                                <div class="text-end">
                                    
                                        	<a href="javascript:void(0);" class="text-primary fw-medium link-hover"
												data-bs-toggle="modal" data-bs-target="#forget">Forgot
                                        Password?</a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Sign In</button>
                            </div>
                            <div class="mb-3">
                                <h6>New on our platform?<a href="<?= base_url()?>registration" class="text-purple link-hover"> Create
                                        an account</a></h6>
                            </div>
                           
                            <div class="text-center">
                                <p class="fw-medium text-gray">Copyright &copy; 2025 - CMS</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->
	<div class="modal custom-modal fade" id="forget" role="dialog">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Forgot Password?</h5>
											<button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
												<i class="ti ti-x"></i>
											</button>
										</div>
										<div class="modal-body">
											<form
												action="<?= base_url('Admin/forget_password') ?>"
												method="post">

												<div class="mb-3">
                                <label class="col-form-label">Enter Registered Email</label>

													<input type="text" name="email" placeholder="Enter your email"
														class="form-control">
												</div>
												
												<div class="mb-3">
													<div class="text-center">
														<button class="btn btn-primary"><span>Submit</span><i
																class="fa-solid fa-paper-plane ms-1"></i></button>

													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.1.min.js" ></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js" ></script>

    <!-- Feather Icon JS -->
    <script src="assets/js/feather.min.js" ></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js" ></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js" ></script>

<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="31ad150b0ccfb7c761a95df9-|49" defer></script></body>


</html>