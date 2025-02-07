<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/header-links.php') ?>
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <?php include('includes/header.php') ?>
        <?php include('includes/sidebar.php') ?>
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
										<a href="<?= base_url() ?>profile" class="nav-link px-0 active">
											<i class="ti ti-settings-cog me-2"></i>General Settings
										</a>
									</li>
									<!-- <li class="nav-item me-3">
										<a href="company-settings.html" class="nav-link px-0">
											<i class="ti ti-world-cog me-2"></i>Company Settings
										</a>
									</li>
									<li class="nav-item me-3">
										<a href="invoice-settings.html" class="nav-link px-0">
											<i class="ti ti-apps me-2"></i>Bill Settings
										</a>
									</li> -->
									
									<li class="nav-item me-3">
										<a href="<?= base_url() ?>account" class="nav-link px-0">
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
									<div class="card-body">
										<h4 class="fw-semibold mb-3">Profile Settings</h4>
										<form action="<?= base_url('Home/update_profile/'.$admin[0]['id'])?>" method="post" enctype="multipart/form-data">
										
										
											<div class="border-bottom mb-3">
												<div class="row">
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">
																 Name <span class="text-danger">*</span>
															</label>
															<input type="text" name="name" value="<?= $admin[0]['name']?>" class="form-control">
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">
																Phone Number <span class="text-danger">*</span>
															</label>
															<input type="text" name="contact"  value="<?= $admin[0]['contact']?>" class="form-control">
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">
																Email <span class="text-danger">*</span>
															</label>
															<input type="text" name="email"  value="<?= $admin[0]['email']?>" class="form-control">
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">
																User Name <span class="text-danger">*</span>
															</label>
															<input type="text" name="username"  value="<?= $admin[0]['username']?>" class="form-control">
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">
																Password <span class="text-danger">*</span>
															</label>
															<input type="text" name="password"  value="<?= $admin[0]['password']?>" class="form-control">
														</div>
													</div>
												</div>
											</div>
                                            <div class="border-bottom mb-3 pb-3">
												<h5 class="fw-semibold mb-1">Company Information</h5>
												<p>Provide the company information below</p>
											</div>
											<div class="border-bottom mb-3 ">
												<div class="row">
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">Company Name </label>
															<input type="text" name="company_name"  value="<?= $admin[0]['company_name']?>" class="form-control">
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">Company Email Address</label>
															<input type="text" class="form-control" name="company_email"  value="<?= $admin[0]['company_email']?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">Phone Number</label>
															<input type="text" class="form-control" name="company_contact"  value="<?= $admin[0]['company_contact']?>">
														</div>
													</div>
													
													<div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">Website</label>
															<input type="text" class="form-control" name="website"  value="<?= $admin[0]['website']?>">
														</div>
													</div>
                                                    <div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">Gst No.</label>
															<input type="text" class="form-control" name="gst_no"  value="<?= $admin[0]['gst_no']?>">
														</div>
													</div>
                                                    <div class="col-md-4">
														<div class="mb-3">
															<label class="form-label">LIC No.</label>
															<input type="text" class="form-control" name="lic_no"  value="<?= $admin[0]['lic_no']?>">
														</div>
													</div>
												</div>
											</div>
											<div class="border-bottom mb-3 pb-3">
												<h5 class="fw-semibold mb-1">Company Images</h5>
												<p>Provide the company images</p>
											</div>
                                            <div class="border-bottom mb-3">
												<div class="row">
													<div class="col-md-4">
														<div class="mb-3">
															<div class="profile-upload">
																<div class="profile-upload-img">
																	
																	<img src="<?= base_url()?>uploads/users/<?= $admin[0]['image']?>"
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
																	
																	<img src="<?= base_url()?>uploads/users/<?= $admin[0]['seal']?>"
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
                                                                        <?php if ($tag == 'admin') { ?>

<input type="hidden" name="seal"
    value="<?= $admin['0']['seal'] ?>">

 
<?php

} else {

?>

<input type="hidden" name="seal"
    value="<?= $admin['0']['seal'] ?>">

<?php } ?>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3">
															<div class="profile-upload">
																<div class="profile-upload-img">
																	
																	<img src="<?= base_url()?>uploads/users/<?= $admin[0]['sign']?>"
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
                                                                        <?php if ($tag == 'admin') { ?>

<input type="hidden" name="sign"
    value="<?= $admin['0']['sign'] ?>">

 
<?php

} else {

?>

<input type="hidden" name="sign"
    value="<?= $admin['0']['sign'] ?>">

<?php } ?>
																</div>
															</div>
														</div>
													</div>
													<!-- <div class="col-md-6">
														<div class="mb-3">
															<div class="profile-upload">
																<div class="profile-upload-img">
																	<span><i class="ti ti-photo"></i></span>
																	<img src="<?= base_url()?>uploads/users/<?= $admin[0]['image']?>"
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
													</div> -->
												</div>
											</div>
											<div class="border-bottom mb-3 pb-3">
												<h5 class="fw-semibold mb-1">Address</h5>
												
											</div>
                                            <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="col-form-label">Street Address</label>
                    <input type="text" class="form-control" name="address" id="streetAddress"  value="<?= $admin[0]['address']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-0">
                    <label class="col-form-label">Pincode</label>
                    <input type="text" class="form-control" name="pincode" id="pincode"  value="<?= $admin[0]['pincode']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mb-md-0">
                    <label class="col-form-label">City</label>
                    <input type="text" class="form-control" name="city" id="city"  value="<?= $admin[0]['city']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="col-form-label">State</label>
                    <input type="text" class="form-control" name="state" id="state"  value="<?= $admin[0]['state']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="col-form-label">Country</label>
                    <input type="text" class="form-control" name="country" id="country"  value="<?= $admin[0]['country']?>">
                </div>
            </div>
        </div>
        <div class="border-bottom mb-3 pb-3">
												<h5 class="fw-semibold mb-1">Quotation/Invoice</h5>
												
											</div>
											<div class="border-bottom mb-3 ">
												<div class="row">
													<div class="col-md-6">
														<div class="mb-3">
															<label class="form-label"> Quotation Prefix </label>
															<input type="text" class="form-control" name="quotation_prefix"  value="<?= $admin[0]['quotation_prefix']?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3">
															<label class="form-label">Invoice Prefix</label>
															<input type="text" class="form-control" name="invoice_prefix"  value="<?= $admin[0]['invoice_prefix']?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3">
															<label class="form-label">GST Tax Percentage</label>
															<input type="text" name="gst_percentage"  value="<?= $admin[0]['gst_percentage']?>" class="form-control">
														</div>
													</div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Account<span class="text-danger">*</span></label>
                                                            <!-- <a href="#" class="label-add" data-bs-toggle="modal" data-bs-target="#add_deal"><i
											class="ti ti-square-rounded-plus"></i>Add New</a> -->
                                                            <select class="select2 form-control" name="account_id" required>
                                                                <option value="" data-display="Please select">Please select</option>
                                                                <?php if (!empty($account)) : ?>
                                                                    <?php foreach ($account as $item) : ?>
                                                                        <option value="<?= htmlspecialchars($item['id']) ?>"
                                                                            <?= ( isset($admin[0]['account_id']) && $admin[0]['account_id'] == $item['id']) ? 'selected' : '' ?>>
                                                                            <?= htmlspecialchars($item['bank_name']) ?>- <?= htmlspecialchars($item['account_no']) ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
												<div class="col-md-12">
													<div class="mb-3">
														<h6 class="fw-medium"> Terms & Condition</h6>
													</div>
												</div>
												<div class="col-md-12">
													<div class="mb-3">
														<textarea class="summernote" name="term" ><?= $admin[0]['term']?></textarea>
													</div>
												</div>
											</div>
												</div>
											</div>
											<div>
												<!-- <a href="#" class="btn btn-light me-2">Cancel</a> -->
												<button type="submit" class="btn btn-primary">Save Changes</button>
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
    // Get today's date in YYYY-MM-DD format
    const today = new Date().toISOString().split('T')[0];

    // Set the 'min' attribute of the date input field to today's date
    document.getElementById('nextFollowUpDate').setAttribute('min', today);

    document.getElementById('pincode').addEventListener('blur', function () {
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
    <?php include('includes/footer.php') ?>