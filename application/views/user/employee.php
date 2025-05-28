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
											<?php $desig = $this->CommonModal->getRowById('designation', 'id', $employee[0]['designation']); ?>
											<h5 class="mb-1"><?= $employee[0]['name'] ?> (<?= $desig[0]['name'] ?>)
											</h5>
											<?php $depart = $this->CommonModal->getRowById('department', 'id', $employee[0]['department']); ?>

											<p class="d-inline-flex align-items-center mb-0">Department :-
												<?= $depart[0]['name'] ?>
											</p>
											<p class="mb-0">employee Code :-
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
									<li class="row mb-3"><span class="col-6">Gender</span><span class="col-6">
											<?= $employee[0]['gender'] ?></span></li>
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
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#attendence" class="nav-link"><i
										class="ti ti-notes me-1"></i>Attendance Report</a>
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
															<h6 class="fw-medium mb-1"><?= $employee[0]['salary'] ?> Rs
																(per Month)</h6>
															<p class="mb-1">Per Day :-
																<?= $employee[0]['salary'] / 30 ?>
																Rs </p>
															<p class="mb-1">Per Year :-
																<?= $employee[0]['salary'] * 12 ?>
																Rs </p>




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
																	<?php $less = $employee[0]['salary'] / 4 ?>
																	<td><?= $less ?> Rs</td>

																	<td class="text-end">
																		<?= $employee[0]['salary'] - $less ?> Rs
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
											<a href="javascript:void(0);" class="link-purple fw-medium"
												data-bs-toggle="modal" data-bs-target="#add_compose"><i
													class="ti ti-circle-plus me-1"></i>Create Email</a>
										</div>
									</div>
									<div class="card-body">
										<div class="card border mb-0">
											<div class="card-body pb-0">
												<?php $emails = $this->CommonModal->getRowByMultitpleId('employee_email', 'emp_id', $employee[0]['id'], 'inst_id', $user[0]['id'], 'id', 'DESC');
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
											<a href="<?= base_url('Admin_Dashboard/emp_attendence_report/' . encryptId($user[0]['id']) . '/' . encryptId($employee[0]['id'])); ?>"
												class="com-add"><i class="ti ti-circle-plus me-1"></i>View Detail</a>
										</div>
									</div>
									<div class="card-body">
										<div class="card mb-3">
											<div class="card-body">
												<div class="border-bottom mb-3">
													<?php
													$this->db->select("status, COUNT(*) as count");
													$this->db->where('inst_id', $user[0]['id']);
													$this->db->where('emp_id', $employee[0]['id']);

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
												action="<?= base_url('Admin_Dashboard/add_emp_salary/' . encryptId($user[0]['id'])) ?>"
												method="post">
												<div class="col-md-12">
													<div class="mb-3">
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Employee Id <span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control" readonly
																	value="<?= $employee[0]['emp_code'] ?>">
																<input type="hidden" class="form-control" name="inst_id"
																	value="<?= $user[0]['id'] ?>" required>

															</div>
														</div>
														<?php
														// Get current month (numeric format)
														$currentMonth = date('m');
														$months = [
<<<<<<< HEAD
															'01' => 'January',
															'02' => 'February',
															'03' => 'March',
															'04' => 'April',
															'05' => 'May',
															'06' => 'June',
															'07' => 'July',
															'08' => 'August',
															'09' => 'September',
															'10' => 'October',
															'11' => 'November',
															'12' => 'December'
=======
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
>>>>>>> bda2ac486d94bc03e4fad91edc06622e004d2ad3
														];
														?>

														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Salary Month <span
																		class="text-danger">*</span></label>
																<select class="select2 form-control" name="month"
<<<<<<< HEAD
																	required>
																	<?php foreach ($months as $key => $month): ?>
																		<option value="<?= $key ?>" <?= ($tag == 'edit' && isset($shift[0]['salary_month']) && $shift[0]['salary_month'] == $key) || (!isset($shift[0]['salary_month']) && $key == $currentMonth) ? 'selected' : '' ?>>
=======
																	required onchange="fetchAttendanceData()" id="salary_month" >
																	<?php 
																	$currentMonth = date('Y-m'); // This gives 2025-05
																	$prevMonth = date('Y-m', strtotime('-1 month'));foreach ($months as $key => $month): ?>
																		<option value="<?= $key ?>" <?= ($tag == 'edit' && isset($shift[0]['salary_month']) && $shift[0]['salary_month'] == $key) || (!isset($shift[0]['salary_month']) && $key == $currentMonth) ? 'selected' : '' ?>>

>>>>>>> bda2ac486d94bc03e4fad91edc06622e004d2ad3
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
																	readonly value="<?= $employee[0]['salary'] ?>">


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Total Working Days<span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control"
<<<<<<< HEAD
																	name="total_days">
=======
																	name="total_days" readonly>
>>>>>>> bda2ac486d94bc03e4fad91edc06622e004d2ad3


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Total Present Days<span
																		class="text-danger">*</span></label>
<<<<<<< HEAD
																<input type="text" class="form-control" name="present">
=======
																<input type="text" class="form-control" name="present" readonly>
>>>>>>> bda2ac486d94bc03e4fad91edc06622e004d2ad3


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Total Absent Days<span
																		class="text-danger">*</span></label>
<<<<<<< HEAD
																<input type="text" class="form-control" name="leaves">
=======
																<input type="text" class="form-control" name="leaves" readonly>


															</div>
														</div>
														<div class="col-md-12">
															<div class="mb-3">
																<label class="col-form-label">Total Late Days<span
																		class="text-danger">*</span></label>
																<input type="text" class="form-control" name="late" readonly>
>>>>>>> bda2ac486d94bc03e4fad91edc06622e004d2ad3


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
														$penailty = $this->CommonModal->getRowById('penailty', 'inst_id', $user[0]['id']);

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
														$reward = $this->CommonModal->getRowById('reward', 'inst_id', $user[0]['id']);



<<<<<<< HEAD
=======
														
>>>>>>> bda2ac486d94bc03e4fad91edc06622e004d2ad3
														?>

														<?php foreach ($reward as $item): ?>


															<div class="form-check">
<<<<<<< HEAD
																<input class="form-check-input fee-checkbox" name="reward[]"
																	type="checkbox"
																	value="<?= $item['id'] ?>"><?= $item['name'] ?>

=======
															<input class="form-check-input reward-checkbox" name="reward[]" type="checkbox" value="<?= $item['id'] ?>">
															<?= $item['name'] ?>

																
>>>>>>> bda2ac486d94bc03e4fad91edc06622e004d2ad3

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
<<<<<<< HEAD

=======
														<div class="col-md-12">
                                                        <div class="mb-3">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <label class="col-form-label">Payment Mode</label>

                                                            </div>
                                                            <select class="select" name="mode" id="paymentType" required
                                                                onchange="handlePaymentChange()">
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
>>>>>>> bda2ac486d94bc03e4fad91edc06622e004d2ad3
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
												action="<?= base_url('Admin_Dashboard/send_emp_email/' . encryptId($user[0]['id']) . '/' . encryptId($employee[0]['id']) . '/2') ?>"
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
						</div>
						<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
						<script>
							CKEDITOR.replace('editor'); // Initialize CKEditor
						</script>
					<script>
document.addEventListener('DOMContentLoaded', function () {
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

    const fetchPenalty = selectedPenaltyIds.length > 0
        ? fetch(base_url + 'Admin_Dashboard/get_penalty_amounts', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ ids: selectedPenaltyIds })
        }).then(res => res.json()).then(data => {
            if (data.status) {
                deductedAmount += data.total_penalty;
            }
        }) : Promise.resolve();

    const fetchReward = selectedRewardIds.length > 0
        ? fetch(base_url + 'Admin_Dashboard/get_reward_amounts', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ ids: selectedRewardIds })
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

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('input[name="cuting_days"]').addEventListener('input', calculateDeductedSalary);
    document.querySelectorAll('.fee-checkbox').forEach(cb => cb.addEventListener('change', calculateDeductedSalary));
    document.querySelectorAll('.reward-checkbox').forEach(cb => cb.addEventListener('change', calculateDeductedSalary));
});
</script>


<script>
function fetchAttendanceData() {
    const month = document.getElementById('salary_month').value;
    const empCode = "<?= $employee[0]['id'] ?>";
    const instId = "<?= $user[0]['id'] ?>";
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
document.addEventListener('DOMContentLoaded', function () {
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
</body>


</html>