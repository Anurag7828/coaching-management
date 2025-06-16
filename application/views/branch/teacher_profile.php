<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('includes2/header-links.php') ?>
	<style>
		.page-wrapper {
			margin-left: 0 !important;
			/* Remove space reserved for sidebar */
			width: 100% !important;
		}

		.content {
			max-width: 100% !important;
			padding-left: 20px;
			padding-right: 20px;
		}

		.main-wrapper {
			display: block;
		}
	</style>

</head>

<body>
	<div class="main-wrapper">

		<?php include('includes2/header.php') ?>

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
										<a href="<?= base_url('Admin_Dashboard/teacher_profile/' . encryptId($user[0]['id'])) ?>" class="nav-link px-0 active">
											<i class="ti ti-settings-cog me-2"></i>General Settings
										</a>
									</li>

									<li class="nav-item me-3">
										<a href="<?= base_url('Admin_Dashboard/change_teacher_password/' . encryptId($user[0]['id'])) ?>" class="nav-link px-0">
											<i class="ti ti-apps me-2"></i>Change Password
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
										<h4 class="fw-semibold mb-3">Profile Settings</h4>
										<form action="<?= base_url('Admin_Dashboard/update_teacher_profile/' . encryptId($user[0]['id'])) ?>" method="post" enctype="multipart/form-data">


											<div class="border-bottom mb-3">
												<div class="row">

													<div class="col-md-6">
														<div class="mb-3">
															<label class="form-label">
																Name <span class="text-danger">*</span>
															</label>
															<input type="text" name="name" value="<?= $user[0]['name'] ?>" class="form-control" readonly>
														</div>

													</div>
													<div class="col-md-6">
														<div class="mb-3">
															<label class="form-label">Employee Code .<span class="text-danger">*</span></label>
															<input type="text" name="emp_code" value="<?= $user[0]['emp_code'] ?>" class="form-control" readonly>
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">
																Phone Number <span class="text-danger">*</span>
															</label>
															<input type="text" name="phone" value="<?= $user[0]['phone'] ?>" class="form-control" readonly>
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">
																Alternate Phone Number <span class="text-danger">*</span>
															</label>
															<input type="text" name="alt_phone" value="<?= $user[0]['alt_phone'] ?>" class="form-control" readonly>
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">
																Email <span class="text-danger">*</span>
															</label>
															<input type="text" name="email" value="<?= $user[0]['email'] ?>" class="form-control" readonly>
														</div>
													</div>


												</div>
											</div>
											<div class="border-bottom mb-3 pb-3">
												<h5 class="fw-semibold mb-1">Personal Information</h5>
											</div>
											<div class="border-bottom mb-3 ">
												<div class="row">

													<div class="col-md-3">
														<div class="mb-3">
															<label class="form-label">Gender</label>
															<input type="text" class="form-control" readonly name="gender" value="<?= $user[0]['gender'] ?>">
														</div>
													</div>
													<div class="col-md-3">
														<div class="mb-3">
															<label class="form-label">Joining date<span class="text-danger">*</span></label>
															<input type="date" class="form-control" readonly name="joining_date" value="<?= $user[0]['joining_date'] ?>">
														</div>
													</div>

													<div class="col-md-3">
														<div class="mb-3">
															<label class="form-label">Adhar Number</label>
															<input type="text" class="form-control" readonly name="aadhar" value="<?= $user[0]['aadhar'] ?>">
														</div>
													</div>
													<div class="col-md-3">
														<div class="mb-3">
															<label class="form-label">PAN Number</label>
															<input type="text" class="form-control" readonly name="pan_no" value="<?= $user[0]['pan_no'] ?>">
														</div>
													</div>
													<div class="col-md-3">
														<div class="mb-3">
															<label class="form-label">Father Name<span class="text-danger">*</span></label>
															<input type="text" class="form-control" readonly name="f_name" value="<?= $user[0]['f_name'] ?>">
														</div>
													</div>
													<div class="col-md-3">
														<div class="mb-3">
															<label class="form-label">Salary<span class="text-danger">*</span></label>
															<input type="text" class="form-control" readonly name="salary" value="<?= $user[0]['salary'] ?>">
														</div>
													</div>
                                          
												</div>
												<!-- <div class="border-bottom mb-3 pb-3">
												<h5 class="fw-semibold mb-1">Company Images</h5>
												<p>Provide the company images</p>
											</div>
                                            <div class="border-bottom mb-3">
												<div class="row">
													<div class="col-md-4">
														<div class="mb-3">
															<div class="profile-upload">
																<div class="profile-upload-img">
																	
																	<img src="<?= base_url() ?>uploads/users/<?= $user[0]['image'] ?>"
																		alt="img" class="preview1">
																	<button type="button" class="profile-remove">
																		x
																	</button>
																</div>
																<div class="profile-upload-content">
																	<label class="profile-upload-btn">
																		<i class="ti ti-file-broken"></i> Upload File
																		<input type="file" name="image" class="input-img" >
																	</label>
																	<p>Upload Logo of your company to display in
																		website. JPG or PNG. Max size of 800K</p>
                                                                 
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<div class="profile-upload">
																<div class="profile-upload-img">
																	
																	<img src="<?= base_url() ?>uploads/users/<?= $user[0]['seal'] ?>"
																		alt="img" class="preview1">
																	<button type="button" class="profile-remove">
																		x
																	</button>
																</div>
																<div class="profile-upload-content">
																	<label class="profile-upload-btn">
																		<i class="ti ti-file-broken"></i> Upload File
																		<input type="file" name="seal" class="input-img">
																	</label>
																	<p>Upload Seal of your company to display in
																		website. JPG or PNG. Max size of 800K</p>
                                                                        <?php if ($tag == 'user') { ?>

<input type="hidden" name="seal"
    value="<?= $user['0']['seal'] ?>">

 
<?php

																		} else {

?>

<input type="hidden" name="seal"
    value="<?= $user['0']['seal'] ?>">

<?php } ?>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<div class="profile-upload">
																<div class="profile-upload-img">
																	
																	<img src="<?= base_url() ?>uploads/users/<?= $user[0]['sign'] ?>"
																		alt="img" class="preview1">
																	<button type="button" class="profile-remove">
																		x
																	</button>
																</div>
																<div class="profile-upload-content">
																	<label class="profile-upload-btn">
																		<i class="ti ti-file-broken"></i> Upload File
																		<input type="file" name="sign" class="input-img">
																	</label>
																	<p>Upload Sign of your Owner to display in
																		website. JPG or PNG. Max size of 800K</p>
                                                                        <?php if ($tag == 'user') { ?>

<input type="hidden" name="sign"
    value="<?= $user['0']['sign'] ?>">

 
<?php

																		} else {

?>

<input type="hidden" name="sign"
    value="<?= $user['0']['sign'] ?>">

<?php } ?>
																</div>
															</div>
														</div>
													</div>
												 <div class="col-md-6">
														<div class="mb-3">
															<div class="profile-upload">
																<div class="profile-upload-img">
																	<span><i class="ti ti-photo"></i></span>
																	<img src="<?= base_url() ?>uploads/users/<?= $user[0]['image'] ?>"
																		alt="img" class="preview1">
																	<button type="button" class="profile-remove">
																		<i class="feather-x"></i>
																	</button>
																</div>
																<div class="profile-upload-content">
																	<label class="profile-upload-btn">
																		<i class="ti ti-file-broken"></i> Upload File
																		<input type="file" class="input-img">
																	</label>
																	<p>Upload Logo of your company to display in
																		website. JPG or PNG. Max size of 800K</p>
																</div>
															</div>
														</div>
													</div> 
												</div>
											</div> -->
												<div class="border-bottom mb-3 pb-3">
													<h5 class="fw-semibold mb-1">Address</h5>

												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="mb-3">
															<label class="col-form-label">Street Address<span class="text-danger">*</span></label>
															<input type="text" class="form-control" readonly name="address" id="streetAddress" value="<?= $user[0]['address'] ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-0">
															<label class="col-form-label">Pincode<span class="text-danger">*</span></label>
															<input type="text" class="form-control" readonly name="pincode" id="pincode" value="<?= $user[0]['pincode'] ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 mb-md-0">
															<label class="col-form-label">City</label>
															<input type="text" class="form-control" readonly name="city" id="city" value="<?= $user[0]['city'] ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3">
															<label class="col-form-label">State</label>
															<input type="text" class="form-control" readonly name="state" id="state" value="<?= $user[0]['state'] ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3">
															<label class="col-form-label">Country</label>
															<input type="text" class="form-control" readonly name="country" id="country" value="<?= $user[0]['country'] ?>">
														</div>
													</div>
												</div>


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
	<script>
		document.getElementById('pincode').addEventListener('blur', function() {
			const pincode = this.value.trim();

			if (pincode.length === 6) { // Validate pincode length
				// Display a loading message or spinner here if needed
				fetch(`https://api.postalpincode.in/pincode/${pincode}`) // Replace with your API URL
					.then(response => response.json())
					.then(data => {
						if (data[0].Status === 'Success') {
							const details = data[0].PostOffice[0];
							document.getElementById('city').value = details.District || '';
							document.getElementById('state').value = details.State || '';
							document.getElementById('country').value = 'India'; // Assuming India for this API
						} else {
							alert('Invalid pincode. Please try again.');
						}
					})
					.catch(error => {
						console.error('Error fetching pincode details:', error);
						alert('Failed to fetch pincode details. Please check your internet connection or try again later.');
					});
			} else {
				alert('Please enter a valid 6-digit pincode.');
			}
		});
	</script>
	<?php include('includes2/footer.php') ?>
	<?php include('includes2/footer-links.php') ?>
</body>

</html>