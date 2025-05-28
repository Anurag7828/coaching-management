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
										<a href="<?= base_url('Admin_Dashboard/change_password/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0 active">
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
										<a href="<?= base_url('Admin_Dashboard/inst_penailty/'.encryptId($user[0]['id'])) ?>" class="nav-link px-0">
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
									<div class="card-body">
										<h4 class="fw-semibold mb-3">Password Settings</h4>
                                        <form id="passwordForm" action="<?= base_url('Admin_Dashboard/change_password/'.encryptId($user[0]['id']))?>" method="post">
    <div class="border-bottom mb-3">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Old Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" id="oldPassword" class="form-control">
                        <span class="input-group-text toggle-password ti ti-eye-off"></span>
                    </div>
                    <input type="hidden" id="actualOldPassword" value="<?= $user[0]['password']?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">New Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" id="newPassword" class="form-control">
                        <span class="input-group-text toggle-password ti ti-eye-off"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" id="confirmPassword" name="password" class="form-control" required>
                        <span class="input-group-text toggle-password ti ti-eye-off"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Change Password</button>
</form>


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
    <script>
document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("passwordForm");
    let oldPasswordInput = document.getElementById("oldPassword");
    let actualOldPassword = document.getElementById("actualOldPassword").value;
    let newPasswordInput = document.getElementById("newPassword");
    let confirmPasswordInput = document.getElementById("confirmPassword");

    form.addEventListener("submit", function (event) {
        // Check Old Password
        if (oldPasswordInput.value !== actualOldPassword) {
            alert("⚠️ Old Password Not Matched!");
            event.preventDefault(); // Stop form submission
            return;
        }
        if (newPasswordInput.value.trim() === "") {
            alert("⚠️ New Password is required!");
            event.preventDefault();
            return;
        }

        // Check Confirm Password (Required)
        if (confirmPasswordInput.value.trim() === "") {
            alert("⚠️ Confirm Password is required!");
            event.preventDefault();
            return;
        }

        // Check New Password & Confirm Password
        if (newPasswordInput.value !== confirmPasswordInput.value) {
            alert("⚠️ New Password & Confirm Password Do Not Match!");
            event.preventDefault(); // Stop form submission
            return;
        }

        // If everything is fine, form will submit
    });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    let toggleIcons = document.querySelectorAll(".toggle-password");

    toggleIcons.forEach(icon => {
        icon.addEventListener("click", function () {
            let input = this.previousElementSibling; // Get input field before icon
            if (input.type === "password") {
                input.type = "text";
                this.classList.remove("ti-eye-off");
                this.classList.add("ti-eye");
            } else {
                input.type = "password";
                this.classList.remove("ti-eye");
                this.classList.add("ti-eye-off");
            }
        });
    });
});
</script>
    </body>
    </html>