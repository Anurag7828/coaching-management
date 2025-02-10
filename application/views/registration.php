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
    <title>Register |</title>

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
            <div class="d-flex flex-wrap w-100 vh-100 overflow-hidden account-bg-02">
                <div
                    class="d-flex align-items-center justify-content-center flex-wrap vh-100 overflow-auto p-4 w-50 bg-backdrop">
                    <form action="<?= base_url('Admin/add_institution_direct')?>" method="post" class="flex-fill">
                        <div class="mx-auto mw-450">
                            <div class="text-center mb-4">
                                <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                            </div>
                            <div class="mb-4">
                                <h4 class="mb-2 fs-20">Register</h4>
                                <p>Create new CMS account</p>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Institution Name<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-user"></i>
                                    </span>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Email Address<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                    <input type="email"  name="email" class="form-control" required>
                                    <input type="hidden" class="form-control" name="date" value="<?= date('Y-m-d') ?>" required>

                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Contact Number<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                    <input type="tel"  name="phone" pattern="[0-9]{10}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" class="form-control" required>
                                </div>
               
                            </div>
                            
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Plan <span class="text-danger">*</span></label>
                                                            <select class="select2 form-control" name="plan_id" required>
                                                            <option value="N/A" <?= ($tag == 'edit' && isset($institution[0]['plan_id']) && $institution[0]['plan_id'] == 'N/A') ? 'selected' : '' ?> data-display="Please select">Choose</option>
                                                            <?php if (!empty($plan)) : ?>
                                                                <?php foreach ($plan as $item) : ?>

                                                                <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($institution[0]['plan_id']) && $institution[0]['plan_id'] == $item['id']) ? 'selected' : '' ?> data-display="Please select"> <?= $item['plan_name'] ?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                             
                                                            </select>
                                                        </div>
                                                    
                            
                            <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="form-check form-check-md d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="checkebox-md"
                                        checked="">
                                    <label class="form-check-label" for="checkebox-md">
                                        I agree to the <a href="javascript:void(0);"
                                            class="text-primary link-hover">Terms & Privacy</a>
                                    </label>
                                </div>
                            </div> -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                            </div>
                            <div class="mb-3">
                                <h6>Already have an account? <a href="<?= base_url()?>login" class="text-purple link-hover"> Sign
                                        In Instead</a></h6>
                            </div>
                           
                            <div class="text-center">
                                <p class="fw-medium text-gray">Copyright &copy; 2025 - CRMS</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Feather Icon JS -->
    <script src="assets/js/feather.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>


<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="3addb944825aeda9a806ff34-|49" defer></script></body>


</html>