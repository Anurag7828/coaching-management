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

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<?php include('includes2/header.php') ?>
		<div class="page-wrapper">
			<div class="content">
				<div class="row">
					<div class="col-md-12">


						<div class="page-header">
							<div class="row align-items-center">
								<div class="col-sm-4">
									<h4 class="page-title">Welcome <?= $user[0]['name'] ?></h4>
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
							<?php if ($this->session->flashdata('error')): ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?= $this->session->flashdata('error') ?>
									<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								</div>
							<?php endif; ?>
							<?php if ($this->session->flashdata('successmsg')): ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<?= $this->session->flashdata('successmsg') ?>
									<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								</div>
							<?php endif; ?>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-md-12">

						<!-- Contact User -->
						<div class="contact-head">
							<div class="row align-items-center">
								<div class="col-sm-6">

								</div>

							</div>
						</div>

						<div class="card">
							<div class="card-body pb-2">
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<div class="d-flex align-items-center mb-2">
										<div class="avatar avatar-xxl me-3 flex-shrink-0 border p-2">
											<img src="<?= base_url() ?>uploads/employee/<?= $user[0]['image'] ?>"
												alt="Image">
										</div>
										<div>
											<?php $desig = $this->CommonModal->getRowById('designation', 'id', $user[0]['designation']); ?>
											<h5 class="mb-1"><?= $user[0]['name'] ?> (<?= $desig[0]['name'] ?>)
											</h5>
											<?php $depart = $this->CommonModal->getRowById('department', 'id', $user[0]['department']); ?>

											<p class="d-inline-flex align-items-center mb-0">Department :-
												<?= $depart[0]['name'] ?>
											</p>
											<p class="mb-0">employee Code :-
												<?= $user[0]['emp_code'] ?>
											</p>
											<p class="mb-2">employee Id :- <?= $user[0]['emp_id'] ?> </p>

										</div>
									</div>
									<div class="contacts-action">
										<?php if ($user[0]['branch_id'] == '0') { ?>
											<a href="#" class="btn btn-warning">
												Main
											</a>
										<?php } else { ?>
											<a href="#" class="btn btn-warning">
												Other
											</a>
										<?php } ?>
										<?php $shift = $this->CommonModal->getRowById('shifts', 'id', $user[0]['shift_id']); ?>
										<a href="#" class="btn btn-info">
											<?= $shift[0]['name']; ?>
										</a>
										<?php if ($user[0]['status'] == '0') { ?>
											<a href="<?= base_url('Admin_Dashboard/deactiveemployee/' . $user[0]['id'] . '/' . encryptId($clg[0]['id'])); ?>"
												class="btn btn-success">
												Active
											</a>
										<?php } else { ?>
											<a href="<?= base_url('Admin_Dashboard/activeemployee/' . $user[0]['id'] . '/' . encryptId($clg[0]['id'])); ?>"
												class="btn btn-danger">
												Deactive
											</a>
										<?php } ?>
										<a href="<?= base_url('Admin_Dashboard/teacher_profile/' . encryptId($user[0]['id'])) ?>"
											class="btn-icon"><i class="ti ti-edit-circle"></i></a>
										<div class="act-dropdown">
											<a href="#" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="ti ti-dots-vertical"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="<?= base_url('Admin/logout') ?>">
													<i class="ti ti-lock"></i> Logout</a>
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
												<?= $user[0]['email'] ?>
											</a>
										</p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-phone"></i>
										</span>
										<p> <?= $user[0]['phone'] ?></p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-phone"></i>
										</span>
										<p> <?= $user[0]['alt_phone'] ?></p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-calendar-exclamation"></i>
										</span>
										<p>Date Of Birth <?= $user[0]['dob'] ?></p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-calendar-exclamation"></i>
										</span>
										<p>Join on <?= $user[0]['date'] ?></p>
									</div>
								</div>
								<hr>
								<h6 class="mb-3 fw-semibold">Personal Information</h6>
								<ul>
									<li class="row mb-3"><span class="col-6">Gender</span><span class="col-6">
											<?= $user[0]['gender'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Father Name</span><span class="col-6">
											<?= $user[0]['f_name'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Aadhar No.</span><span class="col-6">
											<?= $user[0]['aadhar'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Pan Card No.</span><span class="col-6">
											<?= $user[0]['pan_no'] ?></span></li>

								</ul>
								<hr>
								<h6 class="mb-3 fw-semibold">Address Information</h6>
								<ul>
									<li class="row mb-3"><span class="col-6">Local</span><span class="col-6">
											<?= $user[0]['address'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Pincode</span><span class="col-6">
											<?= $user[0]['pincode'] ?></span></li>
									<li class="row mb-3"><span class="col-6">City</span><span class="col-6">
											<?= $user[0]['city'] ?></span></li>
									<li class="row mb-3"><span class="col-6">State</span><span class="col-6">
											<?= $user[0]['state'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Country</span><span class="col-6">
											<?= $user[0]['country'] ?></span></li>
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
<<<<<<< HEAD
												class="ti ti-notes me-1"></i>Salary</a>
=======
												class="ti ti-notes me-1"></i>View Salary</a>
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
									</li>
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#email" class="nav-link"><i
												class="ti ti-mail-check me-1"></i>Email</a>
									</li>
									<li class="nav-item" role="presentation">
<<<<<<< HEAD
										<a href="#" data-bs-toggle="tab" data-bs-target="#attendence"
											class="nav-link"><i class="ti ti-notes me-1"></i>Attendance Report</a>
									</li>
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#timetable" class="nav-link"><i
												class="ti ti-notes me-1"></i>Time Table</a>
									</li>
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#liveclass" class="nav-link"><i
												class="ti ti-notes me-1"></i>Live Class</a>
									</li>
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#assignment" class="nav-link"><i
												class="ti ti-notes me-1"></i>Acadmic Resource</a>
=======
										<a href="#" data-bs-toggle="tab" data-bs-target="#attendence" class="nav-link"><i
												class="ti ti-notes me-1"></i>Attendance Report</a>
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
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
															<h6 class="fw-medium mb-1"><?= $user[0]['salary'] ?> Rs
																(per Month)</h6>
															<p class="mb-1">Per Day :-
																<?= $user[0]['salary'] / 30 ?>
																Rs
															</p>
															<p class="mb-1">Per Year :-
																<?= $user[0]['salary'] * 12 ?>
																Rs
															</p>




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
															<?php $shift = $this->CommonModal->getRowById('shifts', 'id', $user[0]['shift_id']); ?>
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
<<<<<<< HEAD
										<h4 class="fw-semibold">Month Salary</h4>
=======
										<h4 class="fw-semibold">View This Month Salary</h4>
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
										<div class="d-inline-flex align-items-center">

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
																	<th class="text-end">Download</th>

																</tr>
															</thead>
															<tbody>
																<?php if (!empty($salary_list)) : ?>
																	<?php foreach ($salary_list as $salary): ?>
																		<?php
																		$monthly_salary = $user[0]['salary'];
																		$leaves = $salary['leaves'];
																		$less_salary = ($leaves > 0) ? round(($monthly_salary / 30) * $leaves, 2) : 0;
																		$net_salary = $monthly_salary - $less_salary;
																		?>
																		<tr>
																			<td><?= $salary['month'] ?></td>
																			<td><?= $monthly_salary ?> Rs</td>
																			<td><?= $leaves ?></td>
																			<td><?= $less_salary ?> Rs</td>
																			<td class="text-end"><?= $net_salary ?> Rs</td>
																			<td class="text-end"><?= $salary['status'] ?></td>
																			<td class="text-end">
																				<?php if ($salary['status'] == 'Paid'): ?>
																					<a href="<?= base_url('Admin_Dashboard/salary_slip/' . encryptId($salary['employee_id'])) ?>" class="btn btn-sm btn-success" target="_blank">
																						Download Slip
																					</a>

																				<?php else: ?>
																					<?= $salary['status'] ?>
																				<?php endif; ?>
																			</td>
																		</tr>


																	<?php endforeach; ?>
																<?php else: ?>
																	<tr>
																		<td colspan="6" class="text-center">No salary record found.</td>
																	</tr>
																<?php endif; ?>
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
											<a href="javascript:void(0);" class="link-purple fw-medium"
												data-bs-toggle="modal" data-bs-target="#add_compose"><i
													class="ti ti-circle-plus me-1"></i>Create Email</a>
										</div>
									</div>
									<div class="card-body">
										<div class="card border mb-0">
											<div class="card-body pb-0">
												<?php $emails = $this->CommonModal->getRowByMultitpleId('employee_email', 'emp_id', $user[0]['id'], 'inst_id', $clg[0]['id'], 'id', 'DESC');
												if (!empty($emails)) {
													foreach ($emails as $email) {
														$i++;
												?>
														<div class="row align-items-center">
															<div class="col-md-8">
																<div class="mb-3">
																	<h4 class="fw-medium mb-1"><?= $email['subject'] ?></h4>
																	<p><?= $email['message'] ?></p>
																</div>
															</div>
															<div class="col-md-4 text-md-end">
																<div class="mb-3">
																	<a href="<?= base_url('Admin_Dashboard/delete_mail/' . encryptId($email['id']) . '/employee_email') ?>"
																		class="btn btn-primary">Delete</a>
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
							<div class="tab-pane fade" id="attendence">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">View Attendence</h4>
										<div class="d-inline-flex align-items-center">
											<a href="<?= base_url('Admin_Dashboard/emp_attendence_report/' . encryptId($clg[0]['id']) . '/' . encryptId($user[0]['id'])); ?>"
												class="com-add"><i class="ti ti-circle-plus me-1"></i>View Detail</a>
										</div>
									</div>
									<div class="card-body">
										<div class="card mb-3">
											<div class="card-body">
												<div class="border-bottom mb-3">
													<?php
													$this->db->select("status, COUNT(*) as count");
													$this->db->where('inst_id', $clg[0]['id']);
													$this->db->where('emp_id', $user[0]['id']);

													$this->db->group_by("status");
													$count_query = $this->db->get('emp_attendance')->result_array();

													// Initialize counts
													$attendance_count = ['Present' => 0, 'Absent' => 0, 'Late' => 0];

													foreach ($count_query as $row) {
														$attendance_count[$row['status']] = $row['count'];
													}

													// Pass data to view
													$data['attendance_count'] = $attendance_count;
													?>
													<div class="row align-items-center">
														<div class="col-md-4">
															<div class="mb-3">
																<p class="fs-12 mb-0">Total Present</p>
																<p class="text-gray-9">
																	<?= isset($attendance_count['Present']) ? $attendance_count['Present'] : '0' ?>
																</p>
															</div>
														</div>
														<div class="col-md-4">
															<div class="mb-3">
																<p class="fs-12 mb-0">Total Absent</p>
																<p class="text-gray-9">
																	<?= isset($attendance_count['Absent']) ? $attendance_count['Absent'] : '0' ?>
																</p>
															</div>
														</div>
														<div class="col-md-4">
															<div class="mb-3">
																<p class="fs-12 mb-0">Total Late</p>
																<p class="text-gray-9">
																	<?= isset($attendance_count['Late']) ? $attendance_count['Late'] : '0' ?>
																</p>
															</div>
														</div>
													</div>
												</div>

											</div>
											<!-- /Tab Content -->

										</div>
										<!-- /Contact Details -->

									</div>

								</div>
							</div>
							<div class="tab-pane fade" id="timetable">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">Class Time Table</h4>
										<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add_class"
											class="btn btn-primary"><i class="ti ti-square-rounded-plus me-2"></i>Add
											Class</a>
									</div>
									<div class="card-body">

										<div class="table-responsive custom-table">
											<table class="table">
												<thead class="thead-light">
													<tr>
														<th class="no-sort">S No.</th>

														<th>Batch Name</th>

														<th>Course Name</th>
														<th>Subject Name</th>
														<th>Starting Time</th>
														<th>Ending Time</th>


														<th class="text-end">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php if (!empty($class)): ?>
														<?php $i = 1;
														foreach ($class as $row): ?>
															<tr>
																<td><?= $i++; ?></td>

																<td>
																	<?php if (!empty($row['batch_id'])): ?>
																		<?php $batchh = $this->CommonModal->getRowById('batchs', 'id', $row['batch_id']); ?>
																		<?= !empty($batchh) ? $batchh[0]['name'] : 'N/A'; ?>
																	<?php else: ?>
																		N/A
																	<?php endif; ?>
																</td>


																<td>
																	<?php if (!empty($row['course_id'])): ?>
																		<?php $courses = $this->CommonModal->getRowById('courses', 'id', $row['course_id']); ?>
																		<?= !empty($courses) ? $courses[0]['name'] : 'N/A'; ?>
																	<?php else: ?>
																		N/A
																	<?php endif; ?>
																</td>
																<td>
																	<?php if (!empty($row['subject_id'])): ?>
																		<?php $subject = $this->CommonModal->getRowById('subjects', 'id', $row['subject_id']); ?>
																		<?= !empty($subject) ? $subject[0]['subject'] : 'N/A'; ?>
																	<?php else: ?>
																		N/A
																	<?php endif; ?>
																</td>

																<td><?= date("h:i A", strtotime($row['starting_time'])); ?></td>
																<td><?= date("h:i A", strtotime($row['ending_time'])); ?></td>






																<td>
																	<div class="dropdown table-action">
																		<a href="#" class="action-icon"
																			data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">

																			<a class="dropdown-item" href="javascript:void(0);"
																				data-bs-toggle="modal"
																				data-bs-target="#edit_class<?= $row['id'] ?>"><i
																					class="ti ti-edit text-blue"></i> Edit</a>
																			<a class="dropdown-item"
																				href="
<?php echo base_url() . 'Admin_Dashboard/view_timetable/' . encryptId($user[0]['id']) . '/' . encryptId($user[0]['inst_id']) . '?BdID=' . $row['id'] ?>"><i
																					class="ti ti-trash text-danger"></i>Delete</a>
																		</div>
																	</div>
																</td>
															</tr>
															<div class="modal custom-modal fade modal-padding"
																id="edit_class<?= $row['id'] ?>" role="dialog">
																<div class="modal-dialog modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title">Class</h5>
																			<button type="button"
																				class="btn-close position-static"
																				data-bs-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">×</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<?php $timetable = $this->CommonModal->getRowById('timetable', 'id', $row['id']); ?>

																			<form
																				action="<?= base_url('Admin_Dashboard/update_timetable_teacher/' . encryptId($user[0]['inst_id']) . '/' . encryptId($user[0]['id'])) ?>"
																				method="Post">
																				<div class="accordion" id="main_accordion">
																					<!-- Basic Info -->
																					<div class="accordion-item rounded mb-3">
																						<div class="accordion-header">

																						</div>
																						<div class="accordion-collapse collapse show"
																							id="basic"
																							data-bs-parent="#main_accordion">
																							<div
																								class="accordion-body border-top">
																								<div class="row">
																									<div class="col-md-12">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Select
																												Batch</label>

																											<select
																												class="select2 form-control"
																												name="batch_id">
																												<option
																													value="N/A"
																													<?= (isset($timetable[0]['batch_id']) && $timetable[0]['batch_id'] == 'N/A') ? 'selected' : '' ?>
																													data-display="Please select">
																													Choose
																												</option>
																												<?php if (!empty($batch)): ?>
																													<?php foreach ($batch as $item): ?>

																														<option
																															value="<?= $item['id'] ?>"
																															<?= (isset($timetable[0]['batch_id']) && $timetable[0]['batch_id'] == $item['id']) ? 'selected' : '' ?>
																															data-display="Please select">
																															<?= $item['name'] ?>
																														</option>
																													<?php endforeach; ?>
																												<?php endif; ?>

																											</select>
																											<input type="hidden"
																												class="form-control"
																												name="inst_id"
																												value="<?= (isset($timetable[0]['inst_id'])) ? htmlspecialchars($timetable[0]['inst_id']) : $user[0]['inst_id'] ?>"
																												required>
																											<input type="hidden"
																												class="form-control"
																												name="emp_id"
																												value="<?= (isset($timetable[0]['emp_id'])) ? htmlspecialchars($timetable[0]['emp_id']) : $user[0]['id'] ?>"
																												required>
																										</div>
																									</div>


																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Course</label>

																											<select
																												class="form-control"
																												name="course_id"
																												id="course_id_<?= $row['id'] ?>">
																												<option
																													value="N/A">
																													Choose
																												</option>
																												<?php if (!empty($course)): ?>
																													<?php foreach ($course as $item): ?>
																														<option
																															value="<?= $item['id'] ?>"
																															<?= (isset($timetable[0]['course_id']) && $timetable[0]['course_id'] == $item['id']) ? 'selected' : '' ?>>
																															<?= $item['name'] ?>
																														</option>
																													<?php endforeach; ?>
																												<?php endif; ?>
																											</select>
																										</div>
																									</div>
																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Subjects</label>
																											<select
																												name="subject_id"
																												id="subject_id_<?= $row['id'] ?>"
																												class="select2 form-control">
																												<option
																													value="N/A">
																													Choose
																													Subject
																												</option>
																											</select>
																										</div>
																									</div>


																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Start
																												Timing<span
																													class="text-danger">*</span></label>
																											<input type="time"
																												class="form-control"
																												name="starting_time"
																												value="<?= (isset($timetable[0]['starting_time'])) ? htmlspecialchars($timetable[0]['starting_time']) : '' ?>"
																												required>
																										</div>
																									</div>

																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">End
																												Timing<span
																													class="text-danger">*</span></label>
																											<input type="time"
																												class="form-control"
																												name="ending_time"
																												value="<?= (isset($timetable[0]['ending_time'])) ? htmlspecialchars($timetable[0]['ending_time']) : '' ?>"
																												required>
																										</div>
																									</div>





																								</div>
																							</div>
																						</div>
																					</div>
																					<!-- /Basic Info -->

																					<div
																						class="d-flex align-items-center justify-content-end">

																						<button type="submit"
																							class="btn btn-primary"
																							data-bs-toggle="modal"
																							data-bs-target="#create_success">Save</button>
																					</div>
																			</form>

																		</div>
																	</div>
																</div>
															</div>

														<?php endforeach; ?>

													<?php endif; ?>
												</tbody>
											</table>

										</div>

										<!-- /Contact List -->

									</div>

								</div>
							</div>
							<div class="tab-pane fade" id="liveclass">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">Live Class</h4>
										<a href="javascript:void(0);" data-bs-toggle="modal"
											data-bs-target="#add_liveclass" class="btn btn-primary"><i
												class="ti ti-square-rounded-plus me-2"></i>Add
											Class</a>
									</div>
									<div class="card-body">

										<!-- Contact List -->
										<div class="table-responsive custom-table">
											<table class="table ">
												<thead class="thead-light">
													<tr>
														<th class="no-sort">S No.</th>

														<th>Batch Name</th>



														<th>Course Name</th>
														<th>Subject Name</th>

														<th>Platform</th>



														<th>Date</th>
														<th>Timing</th>
														<th>link</th>

														<th class="text-end">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php if (!empty($liveclasss)): ?>
														<?php $i = 1;
														foreach ($liveclasss as $row): ?>
															<tr>
																<td><?= $i++; ?></td>
																<td>
																	<?php if (!empty($row['batch_id'])): ?>
																		<?php $batchhh = $this->CommonModal->getRowById('batchs', 'id', $row['batch_id']); ?>
																		<?= !empty($batchhh) ? $batchhh[0]['name'] : 'N/A'; ?>
																	<?php else: ?>
																		N/A
																	<?php endif; ?>
																</td>



																<td>
																	<?php if (!empty($row['course_id'])): ?>
																		<?php $courseee = $this->CommonModal->getRowById('courses', 'id', $row['course_id']); ?>
																		<?= !empty($courseee) ? $courseee[0]['name'] : 'N/A'; ?>
																	<?php else: ?>
																		N/A
																	<?php endif; ?>
																</td>
																<td>
																	<?php if (!empty($row['subject_id'])): ?>
																		<?php $subjectt = $this->CommonModal->getRowById('subjects', 'id', $row['subject_id']); ?>
																		<?= !empty($subjectt) ? $subjectt[0]['subject'] : 'N/A'; ?>
																	<?php else: ?>
																		N/A
																	<?php endif; ?>
																</td>

																<td>
																	<?php if (!empty($row['platform'])): ?>
																		<?= $row['platform']; ?>
																	<?php else: ?>
																		N/A
																	<?php endif; ?>
																</td>


																<td>
																	<?php if (!empty($row['date'])): ?>
																		<?= date("d-m-Y", strtotime($row['date'])); ?>
																	<?php else: ?>
																		N/A
																	<?php endif; ?>
																</td>
																<td><?= date("h:i A", strtotime($row['starting_time'])); ?> To
																	<?= date("h:i A", strtotime($row['ending_time'])); ?></td>


																<td>
																	<?php if (!empty($row['url'])): ?>
																		<a class="dropdown-item" href="<?= $row['url']; ?>"
																			target="_blank">
																			<span class="badge badge-pill badge-status  bg-success">
																				Join Now
																			</span>
																		</a>
																	<?php else: ?>
																		N/A
																	<?php endif; ?>
																</td>




																<td>
																	<div class="dropdown table-action">
																		<a href="#" class="action-icon"
																			data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">

																			<a class="dropdown-item" href="javascript:void(0);"
																				data-bs-toggle="modal"
																				data-bs-target="#edit_liveclass<?= $row['id'] ?>"><i
																					class="ti ti-edit text-blue"></i> Edit</a>
																			<a class="dropdown-item" href="
<?php echo base_url() . 'Admin_Dashboard/view_liveclass/' . encryptId($user[0]['inst_id']) . '?BdID=' . $row['id'] ?>"><i
																					class="ti ti-trash text-danger"></i>Delete</a>
																		</div>
																	</div>
																</td>
																<?php $liveclass = $this->CommonModal->getRowById('liveclass', 'id', $row['id']); ?>
															</tr>
															<div class="modal custom-modal fade "
																id="edit_liveclass<?= $row['id'] ?>" role="dialog">
																<div class="modal-dialog modal-dialog-centered">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title">Edit Live Class</h5>
																			<button type="button"
																				class="btn-close position-static"
																				data-bs-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">×</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			
																			 
																			<form
																				action="<?= base_url('Admin_Dashboard/update_liveclass_teacher/' . encryptId($row['id'])) ?>"
																				method="Post">
																				<div class="accordion" id="main_accordion">
																					<!-- Basic Info -->
																					<div class="accordion-item rounded mb-3">

																						<div class="accordion-collapse collapse show"
																							id="basic"
																							data-bs-parent="#main_accordion">
																							<div
																								class="accordion-body border-top">
																								<div class="row">
																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Select
																												Batch<span
																													class="text-danger">*</span></label>

																											<select
																												class="select2 form-control"
																												name="batch_id">
																												<option
																													value="N/A"
																													<?= (isset($liveclass[0]['batch_id']) && $liveclass[0]['batch_id'] == 'N/A') ? 'selected' : '' ?>
																													data-display="Please select">
																													Choose
																												</option>
																												<?php if (!empty($batch)): ?>
																													<?php foreach ($batch as $item): ?>

																														<option
																															value="<?= $item['id'] ?>"
																															<?= (isset($liveclass[0]['batch_id']) && $liveclass[0]['batch_id'] == $item['id']) ? 'selected' : '' ?>>
																															<?= $item['name'] ?>
																														</option>
																													<?php endforeach; ?>
																												<?php endif; ?>

																											</select>
																											<input type="hidden"
																												class="form-control"
																												name="inst_id"
																												value="<?= (isset($liveclass[0]['inst_id'])) ? htmlspecialchars($liveclass[0]['inst_id']) : $user[0]['inst_id'] ?>"
																												required>
																											<input type="hidden"
																												class="form-control"
																												name="emp_id"
																												value="<?= (isset($liveclass[0]['emp_id'])) ? htmlspecialchars($liveclass[0]['emp_id']) : $user[0]['id'] ?>"
																												required>
																										</div>
																									</div>
																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Course</label>

																											<select
																												class="form-control"
																												name="course_id"
																												id="coursee_id_<?= $row['id'] ?>">
																												<option
																													value="N/A">
																													Choose
																												</option>
																												<?php if (!empty($course)): ?>
																													<?php foreach ($course as $item): ?>
																														<option
																															value="<?= $item['id'] ?>"
																															<?= (isset($timetable[0]['course_id']) && $timetable[0]['course_id'] == $item['id']) ? 'selected' : '' ?>>
																															<?= $item['name'] ?>
																														</option>
																													<?php endforeach; ?>
																												<?php endif; ?>
																											</select>
																										</div>
																									</div>
																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Subjects</label>
																											<select
																												name="subject_id"
																												id="subjectt_id_<?= $row['id'] ?>"
																												class="select2 form-control">
																												<option
																													value="N/A">
																													Choose
																													Subject
																												</option>
																											</select>
																										</div>
																									</div>

																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Select
																												Platform<span
																													class="text-danger">*</span></label>

																											<select
																												class="select2 form-control"
																												name="platform">
																												<option
																													value="N/A"
																													<?= (isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'N/A') ? 'selected' : '' ?>
																													data-display="Please select">
																													Choose
																												</option>
																												<option
																													value="Google Meet"
																													<?= (isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Google Meet') ? 'selected' : '' ?>
																													data-display="Please select">
																													Google Meet
																												</option>
																												<option
																													value="Zoom"
																													<?= (isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Zoom') ? 'selected' : '' ?>
																													data-display="Please select">
																													Zoom
																												</option>
																												<option
																													value="Microsoft Teams"
																													<?= (isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Microsoft Teams') ? 'selected' : '' ?>
																													data-display="Please select">
																													Microsoft
																													Teams
																												</option>
																												<option
																													value="Skype"
																													<?= (isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Skype') ? 'selected' : '' ?>
																													data-display="Please select">
																													Skype
																												</option>
																												<option
																													value="Cisco Webex"
																													<?= (isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Cisco Webex') ? 'selected' : '' ?>
																													data-display="Please select">
																													Cisco Webex
																												</option>

																											</select>
																										</div>
																									</div>

																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Link<span
																													class="text-danger">*</span></label>
																											<input type="url"
																												class="form-control"
																												name="url"
																												value="<?= (isset($liveclass[0]['url'])) ? htmlspecialchars($liveclass[0]['url']) : '' ?>"
																												required>
																										</div>
																									</div>
																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Date<span
																													class="text-danger">*</span></label>
																											<input type="date"
																												class="form-control"
																												name="date"
																												value="<?= (isset($liveclass[0]['date'])) ? htmlspecialchars($liveclass[0]['date']) : '' ?>"
																												required>
																										</div>
																									</div>

																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">Start
																												Timing<span
																													class="text-danger">*</span></label>
																											<input type="time"
																												class="form-control"
																												name="starting_time"
																												value="<?= (isset($liveclass[0]['starting_time'])) ? htmlspecialchars($liveclass[0]['starting_time']) : '' ?>"
																												required>
																										</div>
																									</div>

																									<div class="col-md-6">
																										<div class="mb-3">
																											<label
																												class="col-form-label">End
																												Timing<span
																													class="text-danger">*</span></label>
																											<input type="time"
																												class="form-control"
																												name="ending_time"
																												value="<?= (isset($liveclass[0]['ending_time'])) ? htmlspecialchars($liveclass[0]['ending_time']) : '' ?>"
																												required>
																										</div>
																									</div>





																								</div>
																							</div>
																						</div>
																					</div>
																					<!-- /Basic Info -->

																					<div
																						class="d-flex align-items-center justify-content-end">

																						<button type="submit"
																							class="btn btn-primary"
																							data-bs-toggle="modal"
																							data-bs-target="#create_success">Save</button>
																					</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														<?php endforeach; ?>

													<?php endif; ?>
												</tbody>
											</table>

										</div>
										<div class="row align-items-center">
											<div class="col-md-6">
												<div class="datatable-length"></div>
											</div>
											<div class="col-md-6">
												<div class="datatable-paginate"></div>
											</div>
										</div>
										<!-- /Contact List -->

									</div>

								</div>
							</div>
							<div class="tab-pane fade" id="assignment">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">Academic Resource</h4>
										<a href="javascript:void(0);" data-bs-toggle="modal"
											data-bs-target="#add_assignment" class="btn btn-primary"><i
												class="ti ti-square-rounded-plus me-2"></i>Add
											Resource</a>
									</div>
								   <div class="card-body">
                               

                                <!-- Contact List -->
                                <div class="table-responsive custom-table">
                                <table class="table datatable">
    <thead class="thead-light">
        <tr>
            <th class="no-sort">S No.</th>
         
                  <th>Batch Name</th>
         
            <th>Course Name</th>
            <th>Subject Name</th>
            <th>Title</th>
           
            <th>File</th>
            <!-- <th>Add By</th> -->

            <th class="text-end">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($assignments)) : ?>
            <?php $i = 1; foreach ($assignments as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                  
                        <td>
                            <?php if (!empty($row['batch_id'])): ?>
                                <?php $abatch = $this->CommonModal->getRowById('batchs', 'id', $row['batch_id']); ?>
                                <?= !empty($abatch) ? $abatch[0]['name'] : 'N/A'; ?>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                   
                   
                    <td>
                        <?php if (!empty($row['course_id'])): ?>
                            <?php $acourse = $this->CommonModal->getRowById('courses', 'id', $row['course_id']); ?>
                            <?= !empty($acourse) ? $acourse[0]['name'] : 'N/A'; ?>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                  
                    </td>
                    <td>
                                                            <?php if (!empty($row['subject_id'])): ?>
                                                                <?php $subjecttt = $this->CommonModal->getRowById('subjects', 'id', $row['subject_id']); ?>
                                                                <?= !empty($subjecttt) ? $subjecttt[0]['subject'] : 'N/A'; ?>
                                                            <?php else: ?>
                                                                N/A
                                                            <?php endif; ?>
                                                        </td>
                    <td><?= $row['title']; ?></td>
                    <td>  <a href="<?= base_url('uploads/assignment/' . $row['file']) ?>" target="_blank">
                                                            <i class="fas fa-file-pdf text-danger" style="font-size: 30px;"></i> 
                                                        </a> </td>




                    <td>
                        <div class="dropdown table-action">
                            <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                            
                                                                    <a class="dropdown-item"
                                                                       href="javascript:void(0);"
																				data-bs-toggle="modal"
																				data-bs-target="#edit_assignment<?= $row['id'] ?>"><i
                                                                            class="ti ti-edit text-blue"></i> Edit</a>
                                                                    <a class="dropdown-item" href="
<?php echo base_url() . 'Admin_Dashboard/view_assignment/' .encryptId($user[0]['inst_id']). '?BdID=' . $row['id'] ?>"><i
                                                                            class="ti ti-trash text-danger"></i>Delete</a>
  </div>
                        </div>
                    </td>
                </tr>
				<div class="modal custom-modal fade " id="edit_assignment<?= $row['id'] ?>" role="dialog">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Assignment</h5>
										<button type="button" class="btn-close position-static" data-bs-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">
											<?php $assignment = $this->CommonModal->getRowById('assignment', 'id', $row['id']); ?>
										<form
											action="<?= base_url('Admin_Dashboard/update_assignment_teacher/'.encryptId($row['id'])) ?>"
											method="Post" enctype="multipart/form-data">
                                <div class="accordion" id="main_accordion">
                                    <!-- Basic Info -->
                                    <div class="accordion-item rounded mb-3">
                                        
                                        <div class="accordion-collapse collapse show" id="basic" data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                               <label class="col-form-label">Select Batch</label>
										
                                                            <select class="select2 form-control" name="batch_id">
                                                                <option value="N/A" <?= ( isset($assignment[0]['batch_id']) && $assignment[0]['batch_id'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <?php if (!empty($batch)): ?>
                                                                    <?php foreach ($batch as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" <?= ( isset($assignment[0]['batch_id']) && $assignment[0]['batch_id'] == $item['id']) ? 'selected' : '' ?> data-display="Please select">
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                            <input type="hidden" class="form-control" name="inst_id" value="<?= ( isset($assignment[0]['inst_id'])) ? htmlspecialchars($assignment[0]['inst_id']) : $user[0]['id'] ?>" required>
                                                        </div>
                                                    </div>


                                                   
                                                  <div class="col-md-6">
                                                        <div class="mb-3">
                                                          <label class="col-form-label">Course</label>

<select name="course_id" id="courseeee_id<?= $row['id'] ?>" class="form-control">
    <option value="N/A">Choose Course</option>
    <?php if (!empty($course)): ?>
        <?php foreach ($course as $item): ?>
            <option value="<?= $item['id'] ?>" <?= ( isset($assignment[0]['course_id']) && $assignment[0]['course_id'] == $item['id']) ? 'selected' : '' ?>>
                <?= $item['name'] ?>
            </option>
        <?php endforeach; ?>
    <?php endif; ?>
</select>



                                                        </div>
                                                    </div>
                                                      <div class="col-md-6">
                                                        <div class="mb-3">
                                                          <label class="col-form-label">Subjects</label>
				<select name="subject_id" id="subjectttt_id<?= $row['id'] ?>" class="select2 form-control">
    <option value="N/A">Choose Subject</option>
</select>
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Title<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="title" value="<?= ( isset($assignment[0]['title'])) ? htmlspecialchars($assignment[0]['title']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">File (PDF Formate)<span
                                                                    class="text-danger">*</span></label>
                                                         <input type="file" class="form-control" name="file" accept=".pdf">

                                                              <?php if ( !empty($assignment[0]['file'])): ?>
                                                    <div class="mt-2">
                                                        <a href="<?= base_url('uploads/assignment/' . $assignment[0]['file']) ?>" target="_blank">
                                                            <i class="fas fa-file-pdf text-danger" style="font-size: 30px;"></i> View PDF
                                                        </a>
                                                      
                                                    </div>
                                                <?php endif; ?>
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
            <?php endforeach; ?>
       
        <?php endif; ?>
    </tbody>
</table>

                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="datatable-length"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="datatable-paginate"></div>
                                    </div>
                                </div>
                                <!-- /Contact List -->

                            </div>

								</div>
							</div>
							<!-- Add Note -->
							<div class="modal custom-modal fade modal-padding" id="add_notes" role="dialog">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Calculate</h5>
											<button type="button" class="btn-close position-static"
												data-bs-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">
											<form
												action="<?= base_url('Admin_Dashboard/add_emp_salary/' . encryptId($clg[0]['id'])) ?>"
												method="post">
												<div class="col-md-12">
													<div class="mb-3">
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Employee Id <span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control" readonly
																	value="<?= $user[0]['emp_code'] ?>">
																<input type="hidden" class="form-control" name="inst_id"
																	value="<?= $clg[0]['id'] ?>" required>

															</div>
														</div>
														<?php
														// Get current month (numeric format)
														$currentMonth = date('m');
														$months = [
															'2025-01' => 'January',
															'2025-02' => 'February',
															'2025-03' => 'March',
															'2025-04' => 'April',
															'2025-05' => 'May',
															'2025-06' => 'June',
															'2025-07' => 'July',
															'2025-08' => 'August',
															'2025-09' => 'September',
															'2025-10' => 'October',
															'2025-11' => 'November',
															'2025-12' => 'December'
														];
														?>

														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Salary Month <span
																		class="text-danger">*</span></label>
																<select class="select2 form-control" name="month"
<<<<<<< HEAD
																	required onchange="fetchAttendanceData()"
																	id="salary_month">
=======
																	required onchange="fetchAttendanceData()" id="salary_month">
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
																	<?php
																	$currentMonth = date('Y-m'); // This gives 2025-05
																	$prevMonth = date('Y-m', strtotime('-1 month'));
																	foreach ($months as $key => $month): ?>
																		<option value="<?= $key ?>" <?= ($tag == 'edit' && isset($shift[0]['salary_month']) && $shift[0]['salary_month'] == $key) || (!isset($shift[0]['salary_month']) && $key == $currentMonth) ? 'selected' : '' ?>>

																			<?= $month ?>
																		</option>
																	<?php endforeach; ?>
																</select>
															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Montly Salary<span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control" name="salary"
																	readonly value="<?= $user[0]['salary'] ?>">


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Total Working Days<span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control"
																	name="total_days" readonly>


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Total Present Days<span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control" name="present"
																	readonly>


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Total Absent Days<span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control" name="leaves"
																	readonly>


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Total Late Days<span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control" name="late"
																	readonly>


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Depacted Salary Days<span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control"
																	name="cuting_days">


															</div>
														</div>

														<br>

														<label class="col-form-label">Penailty<span
																class="text-danger">*</span></label>

														<?php
														$penailty = $this->CommonModal->getRowById('penailty', 'inst_id', $clg[0]['id']);

														foreach ($penailty as $item): ?>

															<div class="form-check">
																<input class="form-check-input fee-checkbox"
																	name="penailty_type[]" type="checkbox"
																	value="<?= $item['id'] ?>"><?= $item['name'] ?>

															</div>
														<?php endforeach; ?>



														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Depacted Salary <span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control"
																	name="less_salary">


															</div>
														</div>
														<label class="col-form-label">Rewards<span
																class="text-danger">*</span></label>
														<?php
														$reward = $this->CommonModal->getRowById('reward', 'inst_id', $clg[0]['id']);




														?>

														<?php foreach ($reward as $item): ?>


															<div class="form-check">
<<<<<<< HEAD
																<input class="form-check-input reward-checkbox"
																	name="reward[]" type="checkbox"
																	value="<?= $item['id'] ?>">
=======
																<input class="form-check-input reward-checkbox" name="reward[]" type="checkbox" value="<?= $item['id'] ?>">
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
																<?= $item['name'] ?>



															</div>
														<?php endforeach; ?>


														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Total paid Salary <span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control"
																	name="total_salary">


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<div
																	class="d-flex align-items-center justify-content-between">
																	<label class="col-form-label">Payment Mode</label>

																</div>
<<<<<<< HEAD
																<select class="select" name="mode" id="paymentType"
																	required onchange="handlePaymentChange()">
=======
																<select class="select" name="mode" id="paymentType" required
																	onchange="handlePaymentChange()">
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
																	<option Value="N/A">Choose</option>
																	<option Value="Cash" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'Cash') ? 'selected' : '' ?>>Cash</option>
																	<option value="UPI" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'UPI') ? 'selected' : '' ?>>UPI</option>
																	<option value="Card" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'Card') ? 'selected' : '' ?>>Created/Debit Card</option>

																	<option value="Bank" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'Bank') ? 'selected' : '' ?>>Bank</option>
																	<option value="Cheque" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'Cheque') ? 'selected' : '' ?>>Cheque</option>
																	<option value="None" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'None') ? 'selected' : '' ?>>None</option>


																</select>
															</div>
														</div>
														<div class="col-md-12 d-none" id="bankDetails">
															<div class="mb-3">
																<label class="col-form-label">Bank Name<span
																		class="text-danger"> *</span></label>
																<select class="form-control" name="account_id"
																	id="bankName">
																	<option>Choose</option>

																	<?php


																	foreach ($account as $account_info) { ?>
																		<option value="<?= $account_info['id'] ?>"
																			<?= ($tag == 'edit' && isset($Student_payment[0]['account_id']) && $Student_payment[0]['account_id'] == $account_info['id']) ? 'selected' : '' ?>>
																			<?= $account_info['bank_name'] ?>-<?= $account_info['account_no'] ?>
																		</option>
																	<?php } ?>
																</select>
															</div>
														</div>


														<div class="col-md-12 d-none" id="chequeDetails">
															<div class="mb-3">
																<label class="col-form-label">Cheque Number<span
																		class="text-danger"> *</span></label>
																<input type="text" class="form-control" name="cheque_no"
																	id="chequeNumber"
																	value="<?= $Student_payment[0]['cheque_no'] ?>">
															</div>

														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">paid Amount<span
																		class="text-danger"> *</span></label>
																<input type="number" class="form-control" name="paid"
																	id="paid" value="<?= $Student_payment[0]['paid'] ?>"
																	required oninput="validatePaidAmount()">
																<input type="hidden" name="p_id"
																	value="<?= $Student_payment[0]['id'] ?>">
															</div>
														</div>
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
											<form
												action="<?= base_url('Admin_Dashboard/send_emp_email/' . encryptId($clg[0]['id']) . '/' . encryptId($user[0]['id']) . '/2') ?>"
												method="post">

												<div class="mb-3">
													<input type="text" name="subject" placeholder="Subject"
														class="form-control">
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
							<div class="modal custom-modal fade " id="add_class" role="dialog">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Class</h5>
											<button type="button" class="btn-close position-static"
												data-bs-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">
											<form
												action="<?= base_url('Admin_Dashboard/add_timetable_teacher/' . encryptId($user[0]['inst_id']) . '/' . encryptId($user[0]['id'])) ?>"
												method="Post">
												<div class="accordion" id="main_accordion">
													<!-- Basic Info -->
													<div class="accordion-item rounded mb-3">
														<div class="accordion-header">

														</div>
														<div class="accordion-collapse collapse show" id="basic"
															data-bs-parent="#main_accordion">
															<div class="accordion-body border-top">
																<div class="row">
																	<div class="col-md-12">
																		<div class="mb-3">
																			<label class="col-form-label">Select
																				Batch</label>

																			<select class="select2 form-control"
																				name="batch_id">
																				<option value="N/A"
																					data-display="Please select">Choose
																				</option>
																				<?php if (!empty($batch)): ?>
																					<?php foreach ($batch as $item): ?>

																						<option value="<?= $item['id'] ?>"
																							data-display="Please select">
																							<?= $item['name'] ?>
																						</option>
																					<?php endforeach; ?>
																				<?php endif; ?>

																			</select>
																			<input type="hidden" class="form-control"
																				name="inst_id"
																				value="<?= $user[0]['inst_id'] ?>"
																				required>
																			<input type="hidden" class="form-control"
																				name="emp_id"
																				value="<?= $user[0]['id'] ?>" required>
																		</div>
																	</div>


																	<div class="col-md-6">
																		<div class="mb-3">
																			<label class="col-form-label">Course</label>

																			<select class=" form-control"
																				name="course_id" id="course_id">
																				<option value="N/A">Choose</option>
																				<?php if (!empty($course)): ?>
																					<?php foreach ($course as $item): ?>
																						<option value="<?= $item['id'] ?>">
																							<?= $item['name'] ?>
																						</option>
																					<?php endforeach; ?>
																				<?php endif; ?>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="mb-3">
																			<label
																				class="col-form-label">Subjects</label>
																			<select name="subject_id" id="subject_id"
																				class=" select2 form-control">
																				<option value="N/A">Choose Subject
																				</option>
																			</select>
																		</div>
																	</div>


																	<div class="col-md-6">
																		<div class="mb-3">
																			<label class="col-form-label">Start
																				Timing<span
																					class="text-danger">*</span></label>
																			<input type="time" class="form-control"
																				name="starting_time" value="" required>
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="mb-3">
																			<label class="col-form-label">End
																				Timing<span
																					class="text-danger">*</span></label>
																			<input type="time" class="form-control"
																				name="ending_time" value="" required>
																		</div>
																	</div>





																</div>
															</div>
														</div>
													</div>
													<!-- /Basic Info -->

													<div class="d-flex align-items-center justify-content-end">

														<button type="submit" class="btn btn-primary"
															data-bs-toggle="modal"
															data-bs-target="#create_success">Save</button>
													</div>
											</form>
										</div>
									</div>
								</div>
							</div>


						</div>
						<div class="modal custom-modal fade " id="add_liveclass" role="dialog">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Live Class</h5>
										<button type="button" class="btn-close position-static" data-bs-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">
										<form
											action="<?= base_url('Admin_Dashboard/add_liveclass_teacher/' . encryptId($user[0]['inst_id'])) ?>"
											method="Post">
											<div class="accordion" id="main_accordion">
												<!-- Basic Info -->
												<div class="accordion-item rounded mb-3">

													<div class="accordion-collapse collapse show" id="basic"
														data-bs-parent="#main_accordion">
														<div class="accordion-body border-top">
															<div class="row">
																<div class="col-md-6">
																	<div class="mb-3">
																		<label class="col-form-label">Select Batch<span
																				class="text-danger">*</span></label>

																		<select class="select2 form-control"
																			name="batch_id">
																			<option value="N/A" <?= ($tag == 'edit' && isset($liveclass[0]['batch_id']) && $liveclass[0]['batch_id'] == 'N/A') ? 'selected' : '' ?>
																				data-display="Please select">Choose
																			</option>
																			<?php if (!empty($batch)): ?>
																				<?php foreach ($batch as $item): ?>

																					<option value="<?= $item['id'] ?>"
																						<?= ($tag == 'edit' && isset($liveclass[0]['batch_id']) && $liveclass[0]['batch_id'] == $item['id']) ? 'selected' : '' ?>>
																						<?= $item['name'] ?>
																					</option>
																				<?php endforeach; ?>
																			<?php endif; ?>

																		</select>
																		<input type="hidden" class="form-control"
																			name="inst_id"
																			value="<?= ($tag == 'edit' && isset($liveclass[0]['inst_id'])) ? htmlspecialchars($liveclass[0]['inst_id']) : $user[0]['inst_id'] ?>"
																			required>
																		<input type="hidden" class="form-control"
																			name="emp_id"
																			value="<?= ($tag == 'edit' && isset($liveclass[0]['emp_id'])) ? htmlspecialchars($liveclass[0]['emp_id']) : $user[0]['id'] ?>"
																			required>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="mb-3">
																		<label class="col-form-label">Course<span
																				class="text-danger">*</span></label>

																		<select class=" form-control" name="course_id"
																			id="coursee_id">
																			<option value="N/A">Choose</option>
																			<?php if (!empty($course)): ?>
																				<?php foreach ($course as $item): ?>
																					<option value="<?= $item['id'] ?>"
																						<?= ($tag == 'edit' && isset($liveclass[0]['course_id']) && $liveclass[0]['course_id'] == $item['id']) ? 'selected' : '' ?>>
																						<?= $item['name'] ?>
																					</option>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="mb-3">
																		<label class="col-form-label">Subjects<span
																				class="text-danger">*</span></label>
																		<select name="subject_id" id="subjectt_id"
																			class=" select2 form-control">
																			<option value="N/A">Choose Subject</option>
																		</select>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="mb-3">
																		<label class="col-form-label">Select
																			Platform<span
																				class="text-danger">*</span></label>

																		<select class="select2 form-control"
																			name="platform">
																			<option value="N/A" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'N/A') ? 'selected' : '' ?>
																				data-display="Please select">Choose
																			</option>
																			<option value="Google Meet" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Google Meet') ? 'selected' : '' ?>
																				data-display="Please select">
																				Google Meet
																			</option>
																			<option value="Zoom" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Zoom') ? 'selected' : '' ?>
																				data-display="Please select">
																				Zoom
																			</option>
																			<option value="Microsoft Teams"
																				<?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Microsoft Teams') ? 'selected' : '' ?>
																				data-display="Please select">
																				Microsoft Teams
																			</option>
																			<option value="Skype" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Skype') ? 'selected' : '' ?>
																				data-display="Please select">
																				Skype
																			</option>
																			<option value="Cisco Webex" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Cisco Webex') ? 'selected' : '' ?>
																				data-display="Please select">
																				Cisco Webex
																			</option>

																		</select>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="mb-3">
																		<label class="col-form-label">Link<span
																				class="text-danger">*</span></label>
																		<input type="url" class="form-control"
																			name="url"
																			value="<?= ($tag == 'edit' && isset($liveclass[0]['url'])) ? htmlspecialchars($liveclass[0]['url']) : '' ?>"
																			required>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="mb-3">
																		<label class="col-form-label">Date<span
																				class="text-danger">*</span></label>
																		<input type="date" class="form-control"
																			name="date"
																			value="<?= ($tag == 'edit' && isset($liveclass[0]['date'])) ? htmlspecialchars($liveclass[0]['date']) : '' ?>"
																			required>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="mb-3">
																		<label class="col-form-label">Start Timing<span
																				class="text-danger">*</span></label>
																		<input type="time" class="form-control"
																			name="starting_time"
																			value="<?= ($tag == 'edit' && isset($liveclass[0]['starting_time'])) ? htmlspecialchars($liveclass[0]['starting_time']) : '' ?>"
																			required>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="mb-3">
																		<label class="col-form-label">End Timing<span
																				class="text-danger">*</span></label>
																		<input type="time" class="form-control"
																			name="ending_time"
																			value="<?= ($tag == 'edit' && isset($liveclass[0]['ending_time'])) ? htmlspecialchars($liveclass[0]['ending_time']) : '' ?>"
																			required>
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
						
						</div>
<div class="modal custom-modal fade " id="add_assignment" role="dialog">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Assignment</h5>
										<button type="button" class="btn-close position-static" data-bs-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">
										<form
											action="<?= base_url('Admin_Dashboard/add_assignment_teacher') ?>"
											method="Post" enctype="multipart/form-data">
                                <div class="accordion" id="main_accordion">
                                    <!-- Basic Info -->
                                    <div class="accordion-item rounded mb-3">
                                        
                                        <div class="accordion-collapse collapse show" id="basic" data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                               <label class="col-form-label">Select Batch</label>
										
                                                            <select class="select2 form-control" name="batch_id">
                                                                <option value="N/A" 
                                                                    data-display="Please select">Choose</option>
                                                                <?php if (!empty($batch)): ?>
                                                                    <?php foreach ($batch as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" data-display="Please select">
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                            <input type="hidden" class="form-control" name="inst_id" value="<?= $user[0]['inst_id'] ?>" required>
															<input type="hidden" class="form-control" name="emp_id" value="<?= $user[0]['id'] ?>" required>
                                                        </div>
                                                    </div>


                                                   
                                                  <div class="col-md-6">
                                                        <div class="mb-3">
                                                          <label class="col-form-label">Course</label>
											
                                                    
<select name="course_id" id="courseee_id" class="form-control">
    <option value="N/A">Choose Course</option>
    <?php if (!empty($course)): ?>
        <?php foreach ($course as $item): ?>
            <option value="<?= $item['id'] ?>">
                <?= $item['name'] ?>
            </option>
        <?php endforeach; ?>
    <?php endif; ?>
</select>



                                                        </div>
                                                    </div>
                                                      <div class="col-md-6">
                                                        <div class="mb-3">
                                                          <label class="col-form-label">Subjects</label>
				<select name="subject_id" id="subjecttt_id" class=" select2 form-control">
    <option value="N/A">Choose Subject</option>
</select>
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Title<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="title" value="" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">File (PDF Formate)<span
                                                                    class="text-danger">*</span></label>
                                                         <input type="file" class="form-control" name="file" accept=".pdf" required>

                                                             
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
						
							
						<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
						<script>
							CKEDITOR.replace('editor'); // Initialize CKEditor
						</script>
						<script>
<<<<<<< HEAD
							document.addEventListener('DOMContentLoaded', function () {
=======
							document.addEventListener('DOMContentLoaded', function() {
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
								fetchAttendanceData(); // Triggers attendance fetch for the default-selected option
							});
						</script>
						<!-- /Main Wrapper -->
						<script>
							function calculateDeductedSalary() {
								const salaryInput = document.querySelector('input[name="salary"]');
								const cuttingDaysInput = document.querySelector('input[name="cuting_days"]');
								const lessSalaryInput = document.querySelector('input[name="less_salary"]');
								const totalSalaryInput = document.querySelector('input[name="total_salary"]');
								const penaltyCheckboxes = document.querySelectorAll('.fee-checkbox');
								const rewardCheckboxes = document.querySelectorAll('.reward-checkbox');
								const base_url = "<?= base_url() ?>";

								const monthlySalary = parseFloat(salaryInput.value) || 0;
								const deductedDays = parseFloat(cuttingDaysInput.value) || 0;
								const perDaySalary = monthlySalary / 30;
								let deductedAmount = deductedDays * perDaySalary;

								const selectedPenaltyIds = Array.from(penaltyCheckboxes)
									.filter(cb => cb.checked)
									.map(cb => cb.value);

								const selectedRewardIds = Array.from(rewardCheckboxes)
									.filter(cb => cb.checked)
									.map(cb => cb.value);

								let totalReward = 0;

								function updateTotalSalary() {
									const finalSalary = monthlySalary - deductedAmount + totalReward;
									lessSalaryInput.value = deductedAmount.toFixed(2);
									totalSalaryInput.value = finalSalary.toFixed(2);
								}

<<<<<<< HEAD
								const fetchPenalty = selectedPenaltyIds.length > 0
									? fetch(base_url + 'Admin_Dashboard/get_penalty_amounts', {
										method: 'POST',
										headers: { 'Content-Type': 'application/json' },
										body: JSON.stringify({ ids: selectedPenaltyIds })
=======
								const fetchPenalty = selectedPenaltyIds.length > 0 ?
									fetch(base_url + 'Admin_Dashboard/get_penalty_amounts', {
										method: 'POST',
										headers: {
											'Content-Type': 'application/json'
										},
										body: JSON.stringify({
											ids: selectedPenaltyIds
										})
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
									}).then(res => res.json()).then(data => {
										if (data.status) {
											deductedAmount += data.total_penalty;
										}
									}) : Promise.resolve();

<<<<<<< HEAD
								const fetchReward = selectedRewardIds.length > 0
									? fetch(base_url + 'Admin_Dashboard/get_reward_amounts', {
										method: 'POST',
										headers: { 'Content-Type': 'application/json' },
										body: JSON.stringify({ ids: selectedRewardIds })
=======
								const fetchReward = selectedRewardIds.length > 0 ?
									fetch(base_url + 'Admin_Dashboard/get_reward_amounts', {
										method: 'POST',
										headers: {
											'Content-Type': 'application/json'
										},
										body: JSON.stringify({
											ids: selectedRewardIds
										})
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
									}).then(res => res.json()).then(data => {
										if (data.status) {
											totalReward = data.total_reward;
										}
									}) : Promise.resolve();

								Promise.all([fetchPenalty, fetchReward]).then(updateTotalSalary).catch(err => {
									console.error("Error fetching data", err);
									updateTotalSalary();
								});
							}

<<<<<<< HEAD
							document.addEventListener('DOMContentLoaded', function () {
=======
							document.addEventListener('DOMContentLoaded', function() {
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
								document.querySelector('input[name="cuting_days"]').addEventListener('input', calculateDeductedSalary);
								document.querySelectorAll('.fee-checkbox').forEach(cb => cb.addEventListener('change', calculateDeductedSalary));
								document.querySelectorAll('.reward-checkbox').forEach(cb => cb.addEventListener('change', calculateDeductedSalary));
							});
						</script>


						<script>
							function fetchAttendanceData() {
								const month = document.getElementById('salary_month').value;
								const empCode = "<?= $user[0]['id'] ?>";
								const instId = "<?= $clg[0]['id'] ?>";
								const base_url = "<?= base_url() ?>";

								if (month && empCode && instId) {
									fetch(base_url + "Admin_Dashboard/get_emp_attendance_summary?emp_code=" + empCode + "&inst_id=" + instId + "&month=" + month)
										.then(res => res.json())
										.then(data => {
											if (data.status) {
												document.querySelector('input[name="total_days"]').value = data.total_days;
												document.querySelector('input[name="present"]').value = data.present_days;
												document.querySelector('input[name="leaves"]').value = data.absent_days;
												document.querySelector('input[name="cuting_days"]').value = data.absent_days;
												document.querySelector('input[name="late"]').value = data.late_days;

												calculateDeductedSalary(); // now this will work
											} else {
												alert("No attendance data found.");
											}
										})
										.catch(err => {
											console.error("Error:", err);
											alert("Failed to fetch attendance data.");
										});
								}
							}
						</script>
						<script>
<<<<<<< HEAD
							document.addEventListener('DOMContentLoaded', function () {
=======
							document.addEventListener('DOMContentLoaded', function() {
>>>>>>> efb1f70f566f639ffa57e9e99c4f6960d2be50a5
								const cuttingDaysInput = document.querySelector('input[name="cuting_days"]');
								const penaltyCheckboxes = document.querySelectorAll('.fee-checkbox');

								cuttingDaysInput.addEventListener('input', calculateDeductedSalary);
								penaltyCheckboxes.forEach(cb => cb.addEventListener('change', calculateDeductedSalary));
							});
						</script>


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
						<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
						<script>
							document.addEventListener("DOMContentLoaded", function () {
								<?php foreach ($class as $row):
									$timetable = $this->CommonModal->getRowById('timetable', 'id', $row['id']);
									$selectedCourseId = isset($timetable[0]['course_id']) ? $timetable[0]['course_id'] : '';
									$selectedSubjectId = isset($timetable[0]['subject_id']) ? $timetable[0]['subject_id'] : '';
									?>
									function loadSubjects<?= $row['id'] ?>(courseId, selectedSubjectId = '') {
										if (courseId !== 'N/A' && courseId !== '') {
											const xhr = new XMLHttpRequest();
											xhr.open("POST", "<?= base_url('Admin_Dashboard/get_subjects_by_course') ?>", true);
											xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
											xhr.onreadystatechange = function () {
												if (xhr.readyState === 4 && xhr.status === 200) {
													const subjectSelect = document.getElementById('subject_id_<?= $row['id'] ?>');
													subjectSelect.innerHTML = xhr.responseText;

													// Pre-select subject in edit mode
													if (selectedSubjectId !== '') {
														subjectSelect.value = selectedSubjectId;
													}
												}
											};
											xhr.send("course_id=" + encodeURIComponent(courseId));
										} else {
											document.getElementById('subject_id_<?= $row['id'] ?>').innerHTML = '<option value="N/A">Choose Subject</option>';
										}
									}

									const courseSelect<?= $row['id'] ?> = document.getElementById('course_id_<?= $row['id'] ?>');
									courseSelect<?= $row['id'] ?>.addEventListener('change', function () {
										loadSubjects<?= $row['id'] ?>(this.value);
									});

									// Load subjects on page load for edit modal
									if (courseSelect<?= $row['id'] ?>.value) {
										loadSubjects<?= $row['id'] ?>(courseSelect<?= $row['id'] ?>.value, "<?= $selectedSubjectId ?>");
									}
								<?php endforeach; ?>
							});
						</script>
						<script>
							document.addEventListener("DOMContentLoaded", function () {
								function loadSubjects(courseId, selectedSubjectId = '') {
									if (courseId !== 'N/A' && courseId !== '') {
										const xhr = new XMLHttpRequest();
										xhr.open("POST", "<?= base_url('Admin_Dashboard/get_subjects_by_course') ?>", true);
										xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
										xhr.onreadystatechange = function () {
											if (xhr.readyState === 4 && xhr.status === 200) {
												const subjectSelect = document.getElementById('subject_id');
												subjectSelect.innerHTML = xhr.responseText;

												// Pre-select subject in edit mode
												if (selectedSubjectId !== '') {
													subjectSelect.value = selectedSubjectId;
												}
											}
										};
										xhr.send("course_id=" + encodeURIComponent(courseId));
									} else {
										document.getElementById('subject_id').innerHTML = '<option value="N/A">Choose Subject</option>';
									}
								}

								const courseSelect = document.getElementById('course_id');
								const subjectSelect = document.getElementById('subject_id');

								// Edit mode subject id (blank in add mode)
								const selectedCourseId = courseSelect.value;
								const selectedSubjectId = "<?= isset($timetable[0]['subject_id']) ? $timetable[0]['subject_id'] : '' ?>";

								// Load subject list on page load (both add and edit)
								if (selectedCourseId) {
									loadSubjects(selectedCourseId, selectedSubjectId);
								}

								// Also load when user manually changes course
								courseSelect.addEventListener('change', function () {
									loadSubjects(this.value);
								});
							});
						</script>
						<script>
							document.addEventListener("DOMContentLoaded", function () {
								function loadSubjects(courseId, selectedSubjectId = '') {
									if (courseId !== 'N/A' && courseId !== '') {
										const xhr = new XMLHttpRequest();
										xhr.open("POST", "<?= base_url('Admin_Dashboard/get_subjects_by_course') ?>", true);
										xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
										xhr.onreadystatechange = function () {
											if (xhr.readyState === 4 && xhr.status === 200) {
												const subjectSelect = document.getElementById('subjectt_id');
												subjectSelect.innerHTML = xhr.responseText;

												// Pre-select subject in edit mode
												if (selectedSubjectId !== '') {
													subjectSelect.value = selectedSubjectId;
												}
											}
										};
										xhr.send("course_id=" + encodeURIComponent(courseId));
									} else {
										document.getElementById('subjectt_id').innerHTML = '<option value="N/A">Choose Subject</option>';
									}
								}

								const courseSelect = document.getElementById('coursee_id');
								const subjectSelect = document.getElementById('subjectt_id');

								// Edit mode subject id (blank in add mode)
								const selectedCourseId = courseSelect.value;
								const selectedSubjectId = "<?= isset($liveclass[0]['subject_id']) ? $liveclass[0]['subject_id'] : '' ?>";

								// Load subject list on page load (both add and edit)
								if (selectedCourseId) {
									loadSubjects(selectedCourseId, selectedSubjectId);
								}

								// Also load when user manually changes course
								courseSelect.addEventListener('change', function () {
									loadSubjects(this.value);
								});
							});
						</script>
						<script>
							document.addEventListener("DOMContentLoaded", function () {
								<?php foreach ($liveclasss as $row):
									$liveclass = $this->CommonModal->getRowById('liveclass', 'id', $row['id']);
									$selectedCourseId = isset($liveclass[0]['course_id']) ? $liveclass[0]['course_id'] : '';
									$selectedSubjectId = isset($liveclass[0]['subject_id']) ? $liveclass[0]['subject_id'] : '';
									?>
									function loadSubjects<?= $row['id'] ?>(courseId, selectedSubjectId = '') {
										if (courseId !== 'N/A' && courseId !== '') {
											const xhr = new XMLHttpRequest();
											xhr.open("POST", "<?= base_url('Admin_Dashboard/get_subjects_by_course') ?>", true);
											xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
											xhr.onreadystatechange = function () {
												if (xhr.readyState === 4 && xhr.status === 200) {
													const subjectSelect = document.getElementById('subjectt_id_<?= $row['id'] ?>');
													subjectSelect.innerHTML = xhr.responseText;

													// Pre-select subject in edit mode
													if (selectedSubjectId !== '') {
														subjectSelect.value = selectedSubjectId;
													}
												}
											};
											xhr.send("course_id=" + encodeURIComponent(courseId));
										} else {
											document.getElementById('subjectt_id_<?= $row['id'] ?>').innerHTML = '<option value="N/A">Choose Subject</option>';
										}
									}

									const courseSelect<?= $row['id'] ?> = document.getElementById('coursee_id_<?= $row['id'] ?>');
									courseSelect<?= $row['id'] ?>.addEventListener('change', function () {
										loadSubjects<?= $row['id'] ?>(this.value);
									});

									// Load subjects on page load for edit modal
									if (courseSelect<?= $row['id'] ?>.value) {
										loadSubjects<?= $row['id'] ?>(courseSelect<?= $row['id'] ?>.value, "<?= $selectedSubjectId ?>");
									}
								<?php endforeach; ?>
							});
						</script>
						<script>
							document.addEventListener("DOMContentLoaded", function () {
								function loadSubjects(courseId, selectedSubjectId = '') {
									if (courseId !== 'N/A' && courseId !== '') {
										const xhr = new XMLHttpRequest();
										xhr.open("POST", "<?= base_url('Admin_Dashboard/get_subjects_by_course') ?>", true);
										xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
										xhr.onreadystatechange = function () {
											if (xhr.readyState === 4 && xhr.status === 200) {
												const subjectSelect = document.getElementById('subjecttt_id');
												subjectSelect.innerHTML = xhr.responseText;

												// Pre-select subject in edit mode
												if (selectedSubjectId !== '') {
													subjectSelect.value = selectedSubjectId;
												}
											}
										};
										xhr.send("course_id=" + encodeURIComponent(courseId));
									} else {
										document.getElementById('subjecttt_id').innerHTML = '<option value="N/A">Choose Subject</option>';
									}
								}

								const courseSelect = document.getElementById('courseee_id');
								const subjectSelect = document.getElementById('subjecttt_id');

								// Edit mode subject id (blank in add mode)
								const selectedCourseId = courseSelect.value;
								const selectedSubjectId = "<?= isset($assignment[0]['subject_id']) ? $assignment[0]['subject_id'] : '' ?>";

								// Load subject list on page load (both add and edit)
								if (selectedCourseId) {
									loadSubjects(selectedCourseId, selectedSubjectId);
								}

								// Also load when user manually changes course
								courseSelect.addEventListener('change', function () {
									loadSubjects(this.value);
								});
							});
						</script>
						<script>
document.addEventListener("DOMContentLoaded", function () {
	<?php foreach ($assignments as $row):
		$assignment = $this->CommonModal->getRowById('assignment', 'id', $row['id']);
		$selectedCourseId = isset($assignment[0]['course_id']) ? $assignment[0]['course_id'] : '';
		$selectedSubjectId = isset($assignment[0]['subject_id']) ? $assignment[0]['subject_id'] : '';
		?>

		function loadSubjectsForAssignment<?= $row['id'] ?>(courseId, selectedSubjectId = '') {
			if (courseId && courseId !== 'N/A') {
				const xhr = new XMLHttpRequest();
				xhr.open("POST", "<?= base_url('Admin_Dashboard/get_subjects_by_course') ?>", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xhr.onreadystatechange = function () {
					if (xhr.readyState === 4 && xhr.status === 200) {
						const subjectSelect = document.getElementById('subjectttt_id<?= $row['id'] ?>');
						subjectSelect.innerHTML = xhr.responseText;

						// Pre-select subject
						if (selectedSubjectId) {
							subjectSelect.value = selectedSubjectId;
						}
					}
				};
				xhr.send("course_id=" + encodeURIComponent(courseId));
			} else {
				document.getElementById('subjectttt_id<?= $row['id'] ?>').innerHTML = '<option value="N/A">Choose Subject</option>';
			}
		}

		const courseSelect<?= $row['id'] ?> = document.getElementById('courseeee_id<?= $row['id'] ?>');
		if (courseSelect<?= $row['id'] ?>) {
			courseSelect<?= $row['id'] ?>.addEventListener('change', function () {
				loadSubjectsForAssignment<?= $row['id'] ?>(this.value);
			});

			// Load subjects on page load
			if (courseSelect<?= $row['id'] ?>.value) {
				loadSubjectsForAssignment<?= $row['id'] ?>(courseSelect<?= $row['id'] ?>.value, "<?= $selectedSubjectId ?>");
			}
		}
	<?php endforeach; ?>
});
</script>


</body>


</html>