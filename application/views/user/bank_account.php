<!DOCTYPE html>
<html lang="en">

<head>

    <?php include('includes2/header-links.php') ?>

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <?php include('includes2/header.php') ?>
        <?php include('includes2/sidebar.php') ?>
        <div class="page-wrapper">
			<div class="content">
				<div class="row">
					<div class="col-md-12">

						<!-- Page Header -->
						<div class="page-header">
							<div class="row align-items-center">
								<div class="col-sm-4">
									<h4 class="page-title">Settings</h4>
								</div>
								<div class="col-sm-8 text-sm-end">
									<div class="head-icons">
										<a href="profile.html" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Collapse" id="collapse-header"><i
												class="ti ti-chevrons-up"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Page Header -->

						<!-- Settings Menu -->
						<div class="card">
							<div class="card-body pb-0 pt-2">
								<ul class="nav nav-tabs nav-tabs-bottom">
								<li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/profile/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 ">
											<i class="ti ti-settings-cog me-2"></i>General Settings
										</a>
									</li>
									<!-- <li class="nav-item me-3">
										<a href="company-settings.html" class="nav-link px-0">
											<i class="ti ti-world-cog me-2"></i>Company Settings
										</a>
									</li> -->
									<li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/change_password/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 ">
											<i class="ti ti-apps me-2"></i>Change Password
										</a>
									</li>
									
									<li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/active_plan/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 " >
											<i class="ti ti-moneybag me-2"></i>Active Plan
										</a>
									</li>
                                    <li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/inst_fees/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 " >
											<i class="ti ti-moneybag me-2"></i>Institution Fees
										</a>
									</li>
									<li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/account/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 active">
											<i class="ti ti-moneybag me-2"></i>Bank Account
										</a>
									</li>
								
								</ul>
							</div>
						</div>
						<!-- /Settings Menu -->

						<div class="row">
							

                        <div class="col-xl-12 col-lg-12">

<!-- Settings Info -->
<div class="card">
    <div class="card-body pb-0">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="fs-20">Bank Accounts</h4>
            <a href="javascript:void(0)" class="btn btn-sm btn-icon rounded border"
                data-bs-toggle="modal" data-bs-target="#add_bank"><i
                    class="ti ti-plus"></i></a>
        </div>
        <div class="row">
        <?php if (!empty($account)) : ?>
            <?php $i = 1; foreach ($account as $row) : ?>
            <!-- Bank Account -->
            <div class="col-xxl-4 col-sm-6">
                <div class="bank-box active">
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-1"><?= $row['bank_name']?></h5>
                        <p class="fw-medium"><?= $row['account_no']?></p>
                      

                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="fw-medium mb-1">Holder Name</h6>
                            <p class="fs-12"><?= $row['holder']?></p>
                        </div>
                        <div class="dropdown table-action">
                            <a href="#" class="action-icon" data-bs-toggle="dropdown"
                                aria-expanded="false"><i
                                    class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_bank<?= $row['id']?>"><i
                                        class="fa-solid fa-pencil text-blue"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="<?= base_url('Admin_Dashboard/account/'.encryptId($user[0]['id']).'?BdID='.$row['id'])?>" ><i
                                        class="fa-regular fa-trash-can text-danger"></i>
                                    Delete</a>
                            </div>

                        </div>
                        <div class="modal fade" id="edit_bank<?= $row['id']?>" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Bank Account</h5>
						<div class="d-flex align-items-center">
							
							<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
								aria-label="Close">
								<i class="ti ti-x"></i>
							</button>
						</div>
					</div>
                    <form action="<?= base_url('Admin_Dashboard/edit_account/'.$row['id'])?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="mb-3">
								<label class="col-form-label">Account Holder Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="holder" value="<?= $row['holder']?>" required>
								<input type="hidden" class="form-control" name="inst_id" value="<?=$user[0]['id']?>" required>
							</div>
							<div class="mb-3">
								<label class="col-form-label">Bank Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="bank_name" value="<?= $row['bank_name']?>" required>
							</div>
							<div class="mb-3">
								<label class="col-form-label">Branch Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="branch_name" value="<?= $row['branch_name']?>">
							</div>
							<div class="mb-3">
								<label class="col-form-label">Account Number <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="account_no" value="<?= $row['account_no']?>" >
							</div>
							<div class="mb-0">
								<label class="col-form-label">IFSC Code <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="ifsc_code" value="<?= $row['ifsc_code']?>">
							</div>
                            <div class="mb-0">
								<label class="col-form-label">Swift Number </label>
								<input type="text" class="form-control" name="swift" value="<?= $row['swift']?>">
							</div>
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center justify-content-end m-0">
								<a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
                    </div>
                </div>
            </div>
            <!-- /Bank Account -->
            <?php endforeach; ?>
       
	   <?php endif; ?>
            <div class="modal fade" id="add_bank" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Bank Account</h5>
						<div class="d-flex align-items-center">
							
							<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
								aria-label="Close">
								<i class="ti ti-x"></i>
							</button>
						</div>
					</div>
                    <form action="<?= base_url('Admin_Dashboard/add_account/'.encryptId($user[0]['id']))?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="mb-3">
								<label class="col-form-label">Account Holder Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="holder" required>
								<input type="hidden" class="form-control" name="inst_id" value="<?=$user[0]['id']?>" required>

							</div>
							<div class="mb-3">
								<label class="col-form-label">Bank Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="bank_name" required>
							</div>
							<div class="mb-3">
								<label class="col-form-label">Branch Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="branch_name" required>
							</div>
							<div class="mb-3">
								<label class="col-form-label">Account Number <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="account_no">
							</div>
							<div class="mb-0">
								<label class="col-form-label">IFSC Code <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="ifsc_code">
							</div>
                            <div class="mb-0">
								<label class="col-form-label">Swift Number </label>
								<input type="text" class="form-control" name="swift" >
							</div>
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center justify-content-end m-0">
								<a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Bank Account -->

		<!-- Edit Bank Account -->
		

        </div>
    </div>
</div>
<!-- /Settings Info -->

</div>
						</div>

					</div>
				</div>
			</div>
		</div>
    </div>
   
    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?>
	</body>
	</html>
