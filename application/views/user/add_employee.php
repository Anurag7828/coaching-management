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

                <div class="row  mb-3">
                    <div class="col-md-12">
                        <div class="offcanvas-header mb-3">
                            <h5 class="fw-semibold"><?= $title?></h5>

                        </div>
                        <div class="offcanvas-body">
                            <form
                                action="<?= ($tag == 'edit' && isset($employee[0]['id'])) ? base_url('Admin_Dashboard/update_employee/' . encryptId($employee[0]['id']) . '/' . encryptId($user[0]['id'])) : base_url('Admin_Dashboard/add_employee/' . encryptId($user[0]['id'])) ?>"
                                method="Post" enctype="multipart/form-data">
                                <div class="accordion" id="main_accordion">
                                    <!-- Basic Info -->
                                    <div class="accordion-item rounded mb-3">
                                        <div class="accordion-header">
                                            <a href="#"
                                                class="accordion-button accordion-custom-button bg-white rounded fw-medium text-dark"
                                                data-bs-toggle="collapse" data-bs-target="#basic">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-user-plus fs-20"></i></span>
                                                Basic Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="basic"
                                            data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Employee Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['name'])) ? htmlspecialchars($employee[0]['name']) : '' ?>"
                                                                required>
                                                            <input type="hidden" class="form-control" name="inst_id"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['inst_id'])) ? htmlspecialchars($employee[0]['inst_id']) : $user[0]['id'] ?>"
                                                                required>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Contact <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="phone"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['phone'])) ? htmlspecialchars($employee[0]['phone']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Alternate Contact</label>
                                                            <input type="text" class="form-control" name="alt_phone"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['alt_phone'])) ? htmlspecialchars($employee[0]['alt_phone']) : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" name="email"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['email'])) ? htmlspecialchars($employee[0]['email']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Gender <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="select2 form-control" name="gender" required>
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($employee[0]['gender']) && $employee[0]['gender'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <option value="Male" <?= ($tag == 'edit' && isset($employee[0]['gender']) && $employee[0]['gender'] == 'Male') ? 'selected' : '' ?>
                                                                    data-display="Please select">Male</option>
                                                                <option value="Female" <?= ($tag == 'edit' && isset($employee[0]['gender']) && $employee[0]['gender'] == 'Female') ? 'selected' : '' ?> data-display="Please select">Female</option>
                                                                <option value="Other" <?= ($tag == 'edit' && isset($employee[0]['gender']) && $employee[0]['gender'] == 'Other') ? 'selected' : '' ?>
                                                                    data-display="Please select">Other</option>


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Date of Birth<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="dob"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['dob'])) ? htmlspecialchars($employee[0]['dob']) : date('Y-m-d') ?>"
                                                                required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Shift<span
                                                                    class="text-danger">*</span></label>
											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_shift" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Add New</a>
                                                            <select class="select2 form-control" name="shift_id"
                                                                required>
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($employee[0]['shift_id']) && $employee[0]['shift_id'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <?php if (!empty($shift)): ?>
                                                                    <?php foreach ($shift as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($employee[0]['shift_id']) && $employee[0]['shift_id'] == $item['id']) ? 'selected' : '' ?> data-display="Please select">
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Higher Education<span
                                                                    class="text-danger">*</span></label>
                                                            <select class="select2 form-control" name="qualification"
                                                                required>
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($employee[0]['qualification']) && $employee[0]['qualification'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                            
                                                                    <option value="Bachelor" <?= ($tag == 'edit' && isset($employee[0]['qualification']) && $employee[0]['qualification'] == 'Bachelor') ? 'selected' : '' ?>>Bachelor's Degree</option>
                                                                    <option value="Master" <?= ($tag == 'edit' && isset($employee[0]['qualification']) && $employee[0]['qualification'] == 'Master') ? 'selected' : '' ?>>Master's Degree</option>
                                                                

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Joining Date <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="joining_date"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['date'])) ? htmlspecialchars($employee[0]['date']) : date('Y-m-d') ?>"
                                                                required>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Department<span
                                                                    class="text-danger">*</span></label>
											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_department" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Add New</a>
                                                            <select class="select2 form-control" name="department"
                                                                required>
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($employee[0]['department']) && $employee[0]['department'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <?php if (!empty($department)): ?>
                                                                    <?php foreach ($department as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($employee[0]['department']) && $employee[0]['department'] == $item['id']) ? 'selected' : '' ?> data-display="Please select">
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Designation<span
                                                                    class="text-danger">*</span></label>
											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_desg" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Add New</a>
                                                            <select class="select2 form-control" name="designation"
                                                                required>
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($employee[0]['designation']) && $employee[0]['designation'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <?php if (!empty($designation)): ?>
                                                                    <?php foreach ($designation as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($employee[0]['designation']) && $employee[0]['designation'] == $item['id']) ? 'selected' : '' ?> data-display="Please select">
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Salary<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="salary"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['salary'])) ? htmlspecialchars($employee[0]['salary']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Basic Info -->
                                    <div class="accordion-item border-top rounded mb-3">
                                        <div class="accordion-header">
                                            <a href="#"
                                                class="accordion-button accordion-custom-button rounded bg-white fw-medium text-dark"
                                                data-bs-toggle="collapse" data-bs-target="#parent">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-map-pin-cog fs-20"></i></span>
                                                Parents Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="parent"
                                            data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Father Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="f_name"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['f_name'])) ? htmlspecialchars($employee[0]['f_name']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Aadhar No. <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="aadhar"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['aadhar'])) ? htmlspecialchars($employee[0]['aadhar']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Pan Card No. <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="pan_no"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['pan_no'])) ? htmlspecialchars($employee[0]['pan_no']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
														<div class="mb-3">
															<div class="profile-upload">
																<div class="profile-upload-img">
																	
																	<img src="<?= base_url()?>uploads/employee/<?= $employee[0]['image']?>"
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
																	<p>Upload  your Image to display in
																		Profile. JPG or PNG. Max size of 800K</p>
                                                                 
																</div>
															</div>
														</div>
													</div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Address Info -->
                                    <div class="accordion-item border-top rounded mb-3">
                                        <div class="accordion-header">
                                            <a href="#"
                                                class="accordion-button accordion-custom-button rounded bg-white fw-medium text-dark"
                                                data-bs-toggle="collapse" data-bs-target="#address">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-map-pin-cog fs-20"></i></span>
                                                Address Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="address"
                                            data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Street Address <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="address"
                                                                id="streetAddress"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['address'])) ? htmlspecialchars($employee[0]['address']) : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-0">
                                                            <label class="col-form-label">Pincode <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="pincode"
                                                                id="pincode"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['pincode'])) ? htmlspecialchars($employee[0]['pincode']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3 mb-md-0">
                                                            <label class="col-form-label">City</label>
                                                            <input type="text" class="form-control" name="city"
                                                                id="city"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['city'])) ? htmlspecialchars($employee[0]['city']) : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">State</label>
                                                            <input type="text" class="form-control" name="state"
                                                                id="state"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['state'])) ? htmlspecialchars($employee[0]['state']) : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Country</label>
                                                            <input type="text" class="form-control" name="country"
                                                                id="country"
                                                                value="<?= ($tag == 'edit' && isset($employee[0]['country'])) ? htmlspecialchars($employee[0]['country']) : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                 
                                    <div class="d-flex align-items-center justify-content-end">

                                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#create_success">Save</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
    </div>
<div class="modal custom-modal fade modal-padding" id="add_shift" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add New Shift</h5>
						<button type="button" class="btn-close position-static" data-bs-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
                    <form action="<?= base_url('Admin_Dashboard/add_shift/' . encryptId($user[0]['id']).'/1') ?>" method="Post">
                                <div class="accordion" id="main_accordion">
                                    <!-- Basic Info -->
                                    <div class="accordion-item rounded mb-3">
                                    
                                        <div class="accordion-collapse collapse show" id="basic" data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Shift Name <span
                                                            class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name" >
                                                            <input type="hidden" class="form-control" name="inst_id" value="<?=$user[0]['id']?>" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Week off<span class="text-danger">*</span></label>
                                                            <select class="select2 form-control" name="weekend" required>
                                                            <option value="N/A" <?= ($tag == 'edit' && isset($shift[0]['weekend']) && $shift[0]['weekend'] == 'N/A') ? 'selected' : '' ?> data-display="Please select">Choose</option>
                                                            <option value="sunday" <?= ($tag == 'edit' && isset($shift[0]['weekend']) && $shift[0]['weekend'] == 'sunday') ? 'selected' : '' ?>>Sunday</option>
<option value="monday" <?= ($tag == 'edit' && isset($shift[0]['weekend']) && $shift[0]['weekend'] == 'monday') ? 'selected' : '' ?>>Monday</option>
<option value="tuesday" <?= ($tag == 'edit' && isset($shift[0]['weekend']) && $shift[0]['weekend'] == 'tuesday') ? 'selected' : '' ?>>Tuesday</option>
<option value="wednesday" <?= ($tag == 'edit' && isset($shift[0]['weekend']) && $shift[0]['weekend'] == 'wednesday') ? 'selected' : '' ?>>Wednesday</option>
<option value="thursday" <?= ($tag == 'edit' && isset($shift[0]['weekend']) && $shift[0]['weekend'] == 'thursday') ? 'selected' : '' ?>>Thursday</option>
<option value="friday" <?= ($tag == 'edit' && isset($shift[0]['weekend']) && $shift[0]['weekend'] == 'friday') ? 'selected' : '' ?>>Friday</option>
<option value="saturday" <?= ($tag == 'edit' && isset($shift[0]['weekend']) && $shift[0]['weekend'] == 'saturday') ? 'selected' : '' ?>>Saturday</option>

                                                              
                                                             
                                                            </select>
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Start Timing<span
                                                            class="text-danger">*</span></label>
                                                            <input type="time" class="form-control" name="starting_time" >
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">End Timing<span
                                                            class="text-danger">*</span></label>
                                                            <input type="time" class="form-control" name="ending_time" >
                                                        </div>
                                                    </div>
                   
         

                                  
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- /Basic Info -->
                                  
                                <div class="d-flex align-items-center justify-content-end">

                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#create_success">Save</button>
                                </div>
                            </form>
					</div>
				</div>
			</div>
		</div>

        <div class="modal custom-modal fade modal-padding" id="add_department" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add New Department</h5>
						<button type="button" class="btn-close position-static" data-bs-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
                    <form action="<?= base_url('Admin_Dashboard/add_department/' . encryptId($user[0]['id']).'/1') ?>" method="Post">
                                <div class="accordion" id="main_accordion">
                                    <!-- Basic Info -->
                                    <div class="accordion-item rounded mb-3">
                                    
                                        <div class="accordion-collapse collapse show" id="basic" data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Department Name <span
                                                            class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name" >
                                                            <input type="hidden" class="form-control" name="inst_id" value="<?=$user[0]['id']?>" required>

                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- /Basic Info -->
                                  
                                <div class="d-flex align-items-center justify-content-end">

                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#create_success">Save</button>
                                </div>
                            </form>
					</div>
				</div>
			</div>
		</div>
        <div class="modal custom-modal fade modal-padding" id="add_desg" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add New Designation</h5>
						<button type="button" class="btn-close position-static" data-bs-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
                    <form action="<?= base_url('Admin_Dashboard/add_desgination/' . encryptId($user[0]['id']).'/1') ?>" method="Post">
                                <div class="accordion" id="main_accordion">
                                    <!-- Basic Info -->
                                    <div class="accordion-item rounded mb-3">
                                    
                                        <div class="accordion-collapse collapse show" id="basic" data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Designation Name <span
                                                            class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name" >
                                                            <input type="hidden" class="form-control" name="inst_id" value="<?=$user[0]['id']?>" required>

                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Basic Info -->
                                  
                                <div class="d-flex align-items-center justify-content-end">

                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#create_success">Save</button>
                                </div>
                            </form>
					</div>
				</div>
			</div>
		</div>
    <script>
        // Get today's date in YYYY-MM-DD format

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
   
    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?>

</body>

</html>