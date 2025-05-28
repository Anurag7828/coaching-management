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
										<a href="<?= base_url('Admin_Dashboard/inst_penailty/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 " >
											<i class="ti ti-moneybag me-2"></i>Institution penailty
										</a>
									</li>
									<li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/account/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0">
											<i class="ti ti-moneybag me-2"></i>Bank Account
										</a>
									</li>
                                    <li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/inst_reward/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0">
											<i class="ti ti-moneybag me-2"></i>Reward
										</a>
									</li>
									<li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/inst_penailty/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 active">
											<i class="ti ti-moneybag me-2"></i>Penailty
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
            <h4 class="fs-20">Penailties</h4>
            <a href="javascript:void(0)" class="btn btn-sm btn-icon rounded border"
                data-bs-toggle="modal" data-bs-target="#add_bank"><i
                    class="ti ti-plus"></i></a>
        </div>
        <div class="row">
        <?php if (!empty($penailty)) : ?>
            <?php $i = 1; foreach ($penailty as $row) : ?>
            <!-- Bank Account -->
            <div class="col-xxl-4 col-sm-6">
                <div class="bank-box active">
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-1"><?= $row['name']?></h5>
                        <p class="fw-medium">Rs <?= $row['depacted_rupees']?></p>
                      

                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            
                            <?php if($row['status'] == '0') { ?>
                            <p class="fs-12">      <span class="badge badge-pill badge-status  bg-success">
    Active
</span></p>
                            <?php } else{ ?>
                                <p class="fs-12">       <span class="badge badge-pill badge-status  bg-danger">
    Dective
</span></p>
                            <?php } ?>
                        </div>
                        <div class="dropdown table-action">
                            <a href="#" class="action-icon" data-bs-toggle="dropdown"
                                aria-expanded="false"><i
                                    class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                            <?php if($row['status'] == '0') { ?>

                                
<a class="dropdown-item" href="
<?= base_url('Admin_Dashboard/deactivepenailty/' . $row['id'].'/'.encryptId($user[0]['id'])); ?>"><i
                                                class="ti ti-eye text-danger"></i>Deactive</a>
                                                <?php } else{ ?>
                                                    <a class="dropdown-item" href="
<?= base_url('Admin_Dashboard/activepenailty/' . $row['id'].'/'.encryptId($user[0]['id'])); ?>"><i
                                                class="ti ti-eye text-success"></i>Active</a>
                                                <?php } ?>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_bank<?= $row['id']?>"><i
                                        class="fa-solid fa-pencil text-blue"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="<?= base_url('Admin_Dashboard/inst_penailty/'.encryptId($user[0]['id']).'?BdID='.encryptId($row['id']))?>" ><i
                                        class="fa-regular fa-trash-can text-danger"></i>
                                    Delete</a>
                            </div>

                        </div>
                        <div class="modal fade" id="edit_bank<?= $row['id']?>" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit penailty</h5>
						<div class="d-flex align-items-center">
							
							<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
								aria-label="Close">
								<i class="ti ti-x"></i>
							</button>
						</div>
					</div>
                    <form action="<?= base_url('Admin_Dashboard/edit_penailty/'.$row['id'])?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="mb-3">
								<label class="col-form-label">penailty Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="name" value="<?= $row['name']?>" required>
								<input type="hidden" class="form-control" name="inst_id" value="<?=$user[0]['id']?>" required>

							</div>
							<div class="mb-3">
								<label class="col-form-label">Amount<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="depacted_rupees" value="<?= $row['depacted_rupees']?>" required>
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
						<h5 class="modal-title">Add penailty</h5>
						<div class="d-flex align-items-center">
							
							<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
								aria-label="Close">
								<i class="ti ti-x"></i>
							</button>
						</div>
					</div>
                    <form action="<?= base_url('Admin_Dashboard/add_penailty/'.encryptId($user[0]['id']))?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="mb-3">
								<label class="col-form-label">penailty Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="name" required>
								<input type="hidden" class="form-control" name="inst_id" value="<?=$user[0]['id']?>" required>

							</div>
							<div class="mb-3">
								<label class="col-form-label">Amount<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="depacted_rupees" required>
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
    </div>
   
    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?>

    </body>
    </html>