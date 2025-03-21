<!DOCTYPE html>
<html lang="en">


<head>

	<?php include('includes2/header-links.php') ?>
	<style>
		.email-wrap {
			word-break: break-word;
			/* Break words if needed */
			overflow-wrap: break-word;
			/* Ensure wrapping */
			display: inline-block;
			/* Prevent overflow */
			max-width: 100%;
			/* Ensure it fits within container */
		}
	</style>
</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<?php include('includes2/header.php') ?>
		<?php include('includes2/sidebar.php') ?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">

				<div class="row">
					<div class="col-md-12">

						<!-- Page Header -->
						<div class="page-header">
							<div class="row align-items-center">
								<div class="col-sm-4">
									<h4 class="page-title">Employee Overview</h4>
								</div>
								<div class="col-sm-8 text-sm-end">
									<div class="head-icons">
										<a href="company-details.html" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Collapse" id="collapse-header"><i
												class="ti ti-chevrons-up"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Page Header -->

					</div>
				</div>

				<div class="row">
					<div class="col-md-12">

						<!-- Contact User -->
						<div class="contact-head">
							<div class="row align-items-center">
								<div class="col-sm-6">
									<ul class="contact-breadcrumb">
										<li><a href=""><i class="ti ti-arrow-narrow-left"></i>Employee</a>
										</li>
										<li><?= $employee[0]['name'] ?></li>
									</ul>
								</div>

							</div>
						</div>

						<div class="card">
							<div class="card-body pb-2">
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<div class="d-flex align-items-center mb-2">
										<div class="avatar avatar-xxl me-3 flex-shrink-0 border p-2">
											<img src="<?= base_url() ?>uploads/employee/<?= $employee[0]['image'] ?>"
												alt="Image">
										</div>
										<div>
											<h5 class="mb-1"><?= $employee[0]['name'] ?> (<?= $employee[0]['gender'] ?>)
											</h5>

											<p class="d-inline-flex align-items-center mb-0">employee Code :-
												<?= $employee[0]['emp_code'] ?>
											</p>
											<p class="mb-2">employee Id :- <?= $employee[0]['emp_id'] ?> </p>

										</div>
									</div>
									<div class="contacts-action">
										<?php if ($employee[0]['branch_id'] == '0') { ?>
											<a href="#" class="btn btn-warning">
												Main
											</a>
										<?php } else { ?>
											<a href="#" class="btn btn-warning">
												Other
											</a>
										<?php } ?>
										<?php $shift = $this->CommonModal->getRowById('shifts', 'id', $employee[0]['shift_id']); ?>
										<a href="#" class="btn btn-info">
											<?= $shift[0]['name']; ?>
										</a>
										<?php if ($employee[0]['status'] == '0') { ?>
											<a href="<?= base_url('Admin_Dashboard/deactiveemployee/' . $employee[0]['id'] . '/' . encryptId($user[0]['id'])); ?>"
												class="btn btn-success">
												Active
											</a>
										<?php } else { ?>
											<a href="<?= base_url('Admin_Dashboard/activeemployee/' . $employee[0]['id'] . '/' . encryptId($user[0]['id'])); ?>"
												class="btn btn-danger">
												Deactive
											</a>
										<?php } ?>
										<a href="<?php echo base_url() . 'Admin_Dashboard/update_employee/' . encryptId($employee[0]['id']) . '/' . encryptId($user[0]['id']) . '?tag=' . $employee[0]['status']; ?>"
											class="btn-icon"><i class="ti ti-edit-circle"></i></a>
										<div class="act-dropdown">
											<a href="#" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="ti ti-dots-vertical"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item"
													href="<?php echo base_url() . 'Admin_Dashbaord/view_employee/' . encryptId($user[0]['id']) . '?BdID=' . $employee[0]['id'] . '&tag=' . $employee[0]['status']; ?>"><i
														class="ti ti-trash text-danger"></i>Delete</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Contact User -->

					</div>

					<!-- Contact Sidebar -->
					<div class="col-xl-3 theiaStickySidebar">
						<div class="card">
							<div class="card-body p-3">
								<h6 class="mb-3 fw-semibold">Basic Information</h6>
								<div class="mb-3">
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-mail"></i>
										</span>
										<p>
											<a href="" class="__cf_email__ email-wrap"
												data-cfemail="97d9f8e1f6c0d7f2eff6fae7fbf2b9f4f8fa">
												<?= $employee[0]['email'] ?>
											</a>
										</p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-phone"></i>
										</span>
										<p> <?= $employee[0]['phone'] ?></p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-phone"></i>
										</span>
										<p> <?= $employee[0]['alt_phone'] ?></p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-calendar-exclamation"></i>
										</span>
										<p>Date Of Birth <?= $employee[0]['dob'] ?></p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-calendar-exclamation"></i>
										</span>
										<p>Join on <?= $employee[0]['date'] ?></p>
									</div>
								</div>
								<hr>
								<h6 class="mb-3 fw-semibold">Personal Information</h6>
								<ul>
									<li class="row mb-3"><span class="col-6">Father Name</span><span class="col-6">
											<?= $employee[0]['f_name'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Aadhar No.</span><span class="col-6">
											<?= $employee[0]['aadhar'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Pan Card No.</span><span class="col-6">
											<?= $employee[0]['pan_no'] ?></span></li>

								</ul>
								<hr>
								<h6 class="mb-3 fw-semibold">Address Information</h6>
								<ul>
									<li class="row mb-3"><span class="col-6">Local</span><span class="col-6">
											<?= $employee[0]['address'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Pincode</span><span class="col-6">
											<?= $employee[0]['pincode'] ?></span></li>
									<li class="row mb-3"><span class="col-6">City</span><span class="col-6">
											<?= $employee[0]['city'] ?></span></li>
									<li class="row mb-3"><span class="col-6">State</span><span class="col-6">
											<?= $employee[0]['state'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Country</span><span class="col-6">
											<?= $employee[0]['country'] ?></span></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Contact Sidebar -->

					<!-- Contact Details -->
					<div class="col-xl-9">
						<div class="card mb-3">
							<div class="card-body pb-0 pt-2">
								<ul class="nav nav-tabs nav-tabs-bottom" role="tablist">
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#activities"
											class="nav-link active"><i class="ti ti-alarm-minus me-1"></i>Info</a>
									</li>
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#notes" class="nav-link"><i
												class="ti ti-notes me-1"></i>Calculate Salary</a>
									</li>
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#email" class="nav-link"><i
												class="ti ti-mail-check me-1"></i>Email</a>
									</li>

								</ul>
							</div>
						</div>

						<!-- Tab Content -->
						<div class="tab-content pt-0">

							<!-- Activities -->
							<div class="tab-pane active show" id="activities">
								<div class="card">
									
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">Overview</h4>

									</div>
									<div class="card-body">
										<div class="contact-activity">
										<div class="badge badge-soft-purple fs-14 fw-normal shadow-none mb-3"><i
													class="ti ti-calendar-check me-1"></i>Salary Overview</div>
									
											<div class="card border shadow-none mb-3">
												<div class="card-body p-3">
													<div class="d-flex">
														<span
															class="avatar avatar-md flex-shrink-0 rounded me-2 bg-orange">
															<i class="ti ti-notes"></i>
														</span>
														<div>
															<h6 class="fw-medium mb-1"><?= $employee[0]['salary'] ?> Rs (per Month)</h6>
															<p class="mb-1">Per Day :- <?= $employee[0]['salary']/30 ?> Rs </p>
															<p class="mb-1">Per Year :- <?= $employee[0]['salary']*12 ?> Rs </p>

														


														</div>
													</div>
												</div>
											</div>
											<div class="badge badge-soft-purple fs-14 fw-normal shadow-none mb-3"><i
													class="ti ti-calendar-check me-1"></i>Shift Overview</div>

											<div class="card border shadow-none mb-3">
												<div class="card-body p-3">
													<div class="d-flex">
														<span
															class="avatar avatar-md flex-shrink-0 rounded me-2 bg-secondary-success">
															<i class="ti ti-notes"></i>
														</span>
														<div>
															<?php $shift = $this->CommonModal->getRowById('shifts', 'id', $employee[0]['shift_id']); ?>
															<h6 class="fw-medium mb-1"><?= $shift[0]['name']; ?></h6>
															<p class="mb-1">Starting Time :-
																<?= date("h:i A", strtotime($shift[0]['starting_time'])); ?>
															</p>
															<p class="mb-1">Ending Time :-
																<?= date("h:i A", strtotime($shift[0]['ending_time'])); ?>
															</p>
															<p class="mb-1">Working Hours :-
																<?php
																if (!empty($shift) && isset($shift[0]['starting_time'], $shift[0]['ending_time'])) {
																	$startTime = strtotime($shift[0]['starting_time']);
																	$endTime = strtotime($shift[0]['ending_time']);

																	// Calculate the working hours
																	$totalHours = round(($endTime - $startTime) / 3600);


																	echo "{$totalHours} Hr";
																} else {
																	echo "Not Available";
																}
																?>
															</p>

															<p class="mb-1">Week Off :-
																<?= $shift[0]['weekend']; ?>
															</p>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
							<!-- /Activities -->
							<div class="tab-pane fade" id="notes">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">Calculate This Month Salary</h4>
										<div class="d-inline-flex align-items-center">
										<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_notes" class="btn btn-danger"><i
													class="ti ti-circle-plus me-1"></i>Calculate Salary</a>
										</div>
									</div>
									<div class="card-body">
										<div class="notes-activity">
											<div class="card mb-3">
												<div class="card-body">

													<div class="table-responsive mb-3">
														<table class="table">
															<thead class="thead-light">
																<tr>
																<th>Month</th>

																	<th>Salary</th>
																	<th>No. Of Leave</th>
																	<th>Less Salary</th>


																	<th class="text-end">Total Amount</th>
																	<th class="text-end">Status</th>

																</tr>
															</thead>
															<tbody>
																<?php
																$total_amount = 0; // Initialize total amount
																?>
																<tr>
																<td><?= $employee[0]['salary'] ?> Rs</td>

																	<td><?= $employee[0]['salary'] ?> Rs</td>
																	<td>4</td>
																	<?php $less=$employee[0]['salary']/4 ?> 
																	<td><?= $less?> Rs</td>

																	<td class="text-end"><?= $employee[0]['salary']- $less?> Rs
																	</td>
																	<td class="text-end">Due
																	</td>
																</tr>
																
															</tbody>
														</table>

													</div>


												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="email">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap">
										<h4 class="fw-semibold">Email</h4>
										<div class="d-inline-flex align-items-center">
											<a href="javascript:void(0);" class="link-purple fw-medium" data-bs-toggle="modal"
											data-bs-target="#add_compose" ><i
													class="ti ti-circle-plus me-1"></i>Create Email</a>
										</div>
									</div>
									<div class="card-body">
										<div class="card border mb-0">
											<div class="card-body pb-0">
												<?php $emails = $this->CommonModal->getRowByMultitpleId('employee_email', 'emp_id', $employee[0]['id'], 'inst_id',$user[0]['id'],'id','DESC');
	if (!empty($emails)) {
	foreach ($emails as $email) {
		$i++;
		?>
												<div class="row align-items-center">
													<div class="col-md-8">
														<div class="mb-3">
															<h4 class="fw-medium mb-1"><?= $email['subject']?></h4>
															<p><?= $email['message']?></p>
														</div>
													</div>
													<div class="col-md-4 text-md-end">
														<div class="mb-3">
															<a href="<?= base_url('Admin_Dashboard/delete_mail/'.encryptId($email['id']).'/employee_email')?>" class="btn btn-primary" >Delete</a>
														</div>
													</div>
												</div>
												<?php
																}
															}
															?>
											</div>
										</div>
									</div>
								</div>
							</div>
								<!-- Add Note -->
		<div class="modal custom-modal fade modal-padding" id="add_notes" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add New Fees</h5>
						<button type="button" class="btn-close position-static" data-bs-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('Admin_Dashboard/add_fees_type/' . encryptId($user[0]['id'])) ?>"
							method="post">
							<div class="col-md-6">
								<div class="mb-3">

									<?php
									$fees = $this->CommonModal->getRowById('fees', 'inst_id', $user[0]['id']);
									$Student_fees = $this->CommonModal->getRowById('student_fees', 'student_id', $student[0]['id']);

									// Convert fees_type to an array (If no record, set empty array)
									$selected_fees = !empty($Student_fees) ? array_column($Student_fees, 'fees_type') : [];
									?>

									<?php foreach ($fees as $item): ?>
										<?php if (in_array($item['id'], $selected_fees))
											continue; // ✅ Skip already selected fees ?>

										<div class="form-check">
											<input class="form-check-input fee-checkbox" name="fees_type[]" type="checkbox"
												value="<?= $item['id'] ?>" id="flexCheck<?= $item['id'] ?>">
											<input class="" name="inst_id" type="hidden" value="<?= $user[0]['id'] ?>">
											<input class="" name="student_id" type="hidden"
												value="<?= $student[0]['id'] ?>">
											<label class="form-check-label" for="flexCheck<?= $item['id'] ?>">
												<?= $item['name'] ?>
												<?php $Student_payment = $this->CommonModal->getRowByIdOrderByLimit('fees_payment', 'student_id', $student[0]['id'], 'inst_id', $user[0]['id'], 'id', 'ASC', '1'); ?>
												<input class="" name="p_id" type="hidden"
												value="<?= $Student_payment[0]['id'] ?>">
											</label>
										</div>
									<?php endforeach; ?>







								</div>


							</div>
							<div class="col-lg-12 text-end modal-btn">
								<a class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
								<button class="btn btn-primary" type="submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
							<div class="modal custom-modal fade" id="add_compose" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Compose</h5>
						<button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('Admin_Dashboard/send_emp_email/' . encryptId($user[0]['id']).'/'.encryptId($employee[0]['id']).'/2') ?>" method="post">
							
							<div class="mb-3">
								<input type="text" name="subject" placeholder="Subject" class="form-control">
							</div>
							<div class="mb-3">
							<textarea name="message" id="editor"></textarea>
							</div>
							<div class="mb-3">
								<div class="text-center">
									<button class="btn btn-primary"><span>Send</span><i
											class="fa-solid fa-paper-plane ms-1"></i></button>
								
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
						</div>
						<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
						<script>
							CKEDITOR.replace('editor'); // Initialize CKEditor
						</script>
						<!-- /Main Wrapper -->
						<script>
							function handlePaymentChange() {
								var paymentType = document.getElementById("paymentType").value;
								var paidAmount = document.getElementById("paid");
								var bankDetails = document.getElementById("bankDetails");
								var chequeDetails = document.getElementById("chequeDetails");
								var bankName = document.getElementById("bankName");
								var chequeNumber = document.getElementById("chequeNumber");

								// Hide all optional fields initially
								bankDetails.classList.add("d-none");
								chequeDetails.classList.add("d-none");
								bankName.removeAttribute("required");
								chequeNumber.removeAttribute("required");

								if (paymentType === "Bank") {
									bankDetails.classList.remove("d-none");
									bankName.setAttribute("required", "true");
								} else if (paymentType === "Cheque") {
									chequeDetails.classList.remove("d-none");
									chequeNumber.setAttribute("required", "true");
								} else if (paymentType === "None") {
									paidAmount.value = 0;
								}
							}

							function validatePaidAmount() {
								var paidAmount = parseFloat(document.getElementById("paid").value) || 0;
								var totalAmount = parseFloat(document.getElementById("finalTotalInput").value) || 0; // Get actual final total

								if (paidAmount > totalAmount) {
									alert("Paid Amount cannot be greater than the Total Amount (₹" + totalAmount.toFixed(2) + ")");
									document.getElementById("paid").value = totalAmount;
								}
							}
						</script>
						<!-- jQuery -->
						<script data-cfasync="false"
							src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
						<script src="<?= base_url() ?>assets/js/jquery-3.7.1.min.js"></script>

						<!-- Bootstrap Core JS -->
						<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

						<!-- Feather Icon JS -->
						<script src="<?= base_url() ?>assets/js/feather.min.js"></script>

						<!-- Slimscroll JS -->
						<script src="<?= base_url() ?>assets/js/jquery.slimscroll.min.js"></script>

						<!-- Daterangepicker JS -->
						<script src="<?= base_url() ?>assets/js/moment.min.js"></script>
						<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

						<!-- Datetimepicker JS -->
						<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>

						<!-- Bootstrap Tagsinput JS -->
						<script
							src="<?= base_url() ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

						<!-- Select2 JS -->
						<script src="<?= base_url() ?>assets/plugins/select2/js/select2.min.js"></script>

						<!-- Summernote JS -->
						<script src="<?= base_url() ?>assets/plugins/summernote/summernote-lite.min.js"></script>

						<!-- Sticky Sidebar JS -->
						<script src="<?= base_url() ?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
						<script
							src="<?= base_url() ?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

						<!-- Color Picker JS -->
						<script src="<?= base_url() ?>assets/plugins/%40simonwep/pickr/pickr.es5.min.js"></script>

						<!--- Custom Js -->
						<script src="<?= base_url() ?>assets/js/theme-colorpicker.js"></script>
						<script src="<?= base_url() ?>assets/js/script.js"></script>

						<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
							data-cf-settings="c437fe80f96e304f0c16e4c8-|49" defer></script>
</body>


</html>