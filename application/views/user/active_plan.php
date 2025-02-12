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
										<a href="<?= base_url('Admin_Dashboard/change_password/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0">
											<i class="ti ti-apps me-2"></i>Change Password
										</a>
									</li>
									
									<li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/active_plan/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 active" >
											<i class="ti ti-moneybag me-2"></i>Active Plan
										</a>
									</li>
                                    <li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/inst_fees/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 " >
											<i class="ti ti-moneybag me-2"></i>Institution Fees
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
    <div class="card-body">
        <div class="mb-4">
            <h4 class="fs-20">Membership Plan</h4>
        </div>
        <div class="row">
        <?php $plan = $this->CommonModal->getRowById('plan', 'id', $sub[0]['plan_type']); ?>
            <!-- Email Wrap -->
            <div class="col-md-12">
                <!-- Payment -->
                <div class="border rounded p-3 mb-4">
                    <div class="row gy-3">
                        <div class="col-sm-5">
                            <div class="d-flex align-items-center">
                                <span
                                    class="border rounded d-flex align-items-center justify-content-center payment-img p-2">
                                  <?= $plan[0]['plan_name']?>
                                </span>
                                <div class="ms-2">
                                    <?php $today=date('Y-m-d');
                                     if($plan[0]['expire_date'] <= $today ){
                                        ?>
                                         <a href="javascript:void(0);"
                                         class="badge bg-soft-success">Active</a>
                                  <?php }else {?>
                                    <a href="javascript:void(0);"
                                    class="badge bg-soft-success">Expire</a>
                                <?php } ?>
                               
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div
                                class="d-flex align-items-center justify-content-between">
                                <div>
                                  
                                    <a href="<?= base_url('Admin_Dashboard/plan_choose/'.encryptId($user[0]['id']))?>" class="btn btn-primary"
                                       ><i
                                            class="ti ti-tool me-1"></i>Upgrade Plan</a>
                                </div>
                                <div class="status-toggle ms-auto">
                                <div class="status-toggle ms-auto">
    <p>Expire In  
        <?php 
            $expire_date = strtotime($sub[0]['expire_date']); // Convert to timestamp
            $current_date = strtotime(date('Y-m-d')); // Current date timestamp
            $days_left = ($expire_date - $current_date) / (60 * 60 * 24); // Calculate days left
            echo $days_left > 0 ? $days_left . " Days" : "Expired"; 
        ?> 
    </p>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!-- /Payment -->
               
            </div>
            <!-- /Email Wrap -->

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