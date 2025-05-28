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
									<h4 class="page-title">Student Overview</h4>
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
										<li><a href=""><i class="ti ti-arrow-narrow-left"></i>Student</a>
										</li>
										<li><?= $student[0]['name'] ?></li>
									</ul>
								</div>

							</div>
						</div>

						<div class="card">
							<div class="card-body pb-2">
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<div class="d-flex align-items-center mb-2">
										<div class="avatar avatar-xxl me-3 flex-shrink-0 border p-2">
											<img src="<?= base_url() ?>assets/img/icons/company-icon-01.svg"
												alt="Image">
										</div>
										<div>
											<h5 class="mb-1"><?= $student[0]['name'] ?> (<?= $student[0]['gender'] ?>)
											</h5>
											<p class="mb-2">Roll No. :- <?= $student[0]['roll_no'] ?> </p>

											<p class="mb-2">Student Id :- <?= $student[0]['student_id'] ?> </p>
											<p class="d-inline-flex align-items-center mb-0">Student Code :-
												<?= $student[0]['student_code'] ?>
											</p>
										</div>
									</div>
									<div class="contacts-action">
										<?php if ($student[0]['branch_id'] == '0') { ?>
											<a href="#" class="btn btn-warning">
												Main
											</a>
										<?php } else { ?>
											<a href="#" class="btn btn-warning">
												Other
											</a>
										<?php } ?>
										<?php $batch = $this->CommonModal->getRowById('batchs', 'id', $student[0]['batch_id']); ?>
										<a href="#" class="btn btn-info">
											<?= $batch[0]['name']; ?>
										</a>
										<?php if ($student[0]['status'] == '0') { ?>
											<a href="<?= base_url('Admin_Dashboard/deactivestudent/' . $student[0]['id'] . '/' . encryptId($user[0]['id'])); ?>"
												class="btn btn-success">
												Active
											</a>
										<?php } else { ?>
											<a href="<?= base_url('Admin_Dashboard/activestudent/' . $student[0]['id'] . '/' . encryptId($user[0]['id'])); ?>"
												class="btn btn-danger">
												Deactive
											</a>
										<?php } ?>
										<a href="<?php echo base_url() . 'Admin_Dashboard/update_student/' . encryptId($student[0]['id']) . '/' . encryptId($user[0]['id']) . '?tag=' . $student[0]['status']; ?>"
											class="btn-icon"><i class="ti ti-edit-circle"></i></a>
										<div class="act-dropdown">
											<a href="#" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="ti ti-dots-vertical"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item"
													href="<?php echo base_url() . 'Admin_Dashbaord/view_student/' . encryptId($user[0]['id']) . '?BdID=' . $student[0]['id'] . '&tag=' . $student[0]['status']; ?>"><i
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
												<?= $student[0]['email'] ?>
											</a>
										</p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-phone"></i>
										</span>
										<p> <?= $student[0]['phone'] ?></p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-phone"></i>
										</span>
										<p> <?= $student[0]['alt_phone'] ?></p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-calendar-exclamation"></i>
										</span>
										<p>Date Of Birth <?= $student[0]['dob'] ?></p>
									</div>
									<div class="d-flex align-items-center mb-3">
										<span
											class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
											<i class="ti ti-calendar-exclamation"></i>
										</span>
										<p>Join on <?= $student[0]['date'] ?></p>
									</div>
								</div>
								<hr>
								<h6 class="mb-3 fw-semibold">Parents Information</h6>
								<ul>
									<li class="row mb-3"><span class="col-6">Father Name</span><span class="col-6">
											<?= $student[0]['f_name'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Mother Name</span><span class="col-6">
											<?= $student[0]['m_name'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Contact No.</span><span class="col-6">
											<?= $student[0]['parents_phone'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Email</span><span class="col-6">
											<?= $student[0]['parents_email'] ?></span></li>
								</ul>
								<hr>
								<h6 class="mb-3 fw-semibold">Address Information</h6>
								<ul>
									<li class="row mb-3"><span class="col-6">Local</span><span class="col-6">
											<?= $student[0]['address'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Pincode</span><span class="col-6">
											<?= $student[0]['pincode'] ?></span></li>
									<li class="row mb-3"><span class="col-6">City</span><span class="col-6">
											<?= $student[0]['city'] ?></span></li>
									<li class="row mb-3"><span class="col-6">State</span><span class="col-6">
											<?= $student[0]['state'] ?></span></li>
									<li class="row mb-3"><span class="col-6">Country</span><span class="col-6">
											<?= $student[0]['country'] ?></span></li>
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
												class="ti ti-notes me-1"></i>Fees structure</a>
									</li>
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#calls" class="nav-link"><i
												class="ti ti-notes me-1"></i>View Payments</a>
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
													class="ti ti-calendar-check me-1"></i>Course Overview</div>
											<?php $course = $this->CommonModal->getRowById('courses', 'id', $student[0]['course_id']); ?>
											<div class="card border shadow-none mb-3">
												<div class="card-body p-3">
													<div class="d-flex">
														<span
															class="avatar avatar-md flex-shrink-0 rounded me-2 bg-orange">
															<i class="ti ti-notes"></i>
														</span>
														<div>
															<h6 class="fw-medium mb-1"><?= $course[0]['name'] ?></h6>
															<p class="mb-1">Fees :- <?= $course[0]['fees'] ?> Rs </p>
															<p class="mb-1">Duration :- <?= $course[0]['duration'] ?>
																<?= $course[0]['duration_type'] ?>
															</p>


														</div>
													</div>
												</div>
											</div>
											<div class="badge badge-soft-purple fs-14 fw-normal shadow-none mb-3"><i
													class="ti ti-calendar-check me-1"></i>Batch Overview</div>

											<div class="card border shadow-none mb-3">
												<div class="card-body p-3">
													<div class="d-flex">
														<span
															class="avatar avatar-md flex-shrink-0 rounded me-2 bg-secondary-success">
															<i class="ti ti-notes"></i>
														</span>
														<div>
															<?php $batch = $this->CommonModal->getRowById('batchs', 'id', $student[0]['batch_id']); ?>
															<h6 class="fw-medium mb-1"><?= $batch[0]['name']; ?></h6>
															<p class="mb-1">Starting Time :-
																<?= date("h:i A", strtotime($batch[0]['starting_time'])); ?>
															</p>
															<p class="mb-1">Ending Time :-
																<?= date("h:i A", strtotime($batch[0]['ending_time'])); ?>
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

							<!-- Notes -->
							<div class="tab-pane fade" id="notes">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">Fees Payment</h4>
										<div class="d-inline-flex align-items-center">

											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_notes" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Add New</a>
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
																	<th>Fees Head</th>
																	<th class="text-end">Amount</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$total_amount = 0; // Initialize total amount
																?>
																<tr>
																	<td><?= $course[0]['name'] ?></td>
																	<td class="text-end"><?= $course[0]['fees'] ?> Rs
																	</td>
																</tr>
																<?php
																$total_amount += $course[0]['fees']; // Add course fees to total
																$fees_type = $this->CommonModal->getRowById('student_fees', 'student_id', $student[0]['id']);
																foreach ($fees_type as $frow):
																	$fees = $this->CommonModal->getRowById('fees', 'id', $frow['fees_type']);
																	$total_amount += $fees[0]['amount']; // Add each fee amount to total
																?>
																	<tr>
																		<td><?= $fees[0]['name'] ?></td>
																		<td class="text-end"><?= $fees[0]['amount'] ?> Rs
																		</td>
																	</tr>
																<?php endforeach; ?>
																<tr>
																	<td class="text-dark fw-medium mb-0">Total</td>
																	<td class="text-end"><strong><?= $total_amount ?>
																			Rs</strong></td>
																</tr>
																<?php
																$payment = $this->CommonModal->getRowByIdOrderByLimit('fees_payment', 'student_id', $student[0]['id'], 'inst_id', $user['0']['id'], 'id', 'DESC', '1');
																$paymentsum = $this->CommonModal->getRowByIdSum('fees_payment', 'student_id', $student[0]['id'], 'inst_id', $user['0']['id'], 'paid');
																?>
																<tr>
																	<td class="text-dark fw-medium mb-0">Paid</td>
																	<td class="text-end">
																		<strong><?= $paymentsum[0]['total_sum'] ?>
																			Rs</strong>
																	</td>
																</tr>
																<tr>
																	<td class="text-dark fw-medium mb-0">Due</td>
																	<td class="text-end">
																		<strong><?= $payment[0]['due'] ?>
																			Rs</strong>
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
							<!-- /Notes -->

							<!-- Calls -->
							<div class="tab-pane fade" id="calls">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">View Payments</h4>
										<div class="d-inline-flex align-items-center">
											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#create_call" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Pay Due</a>
										</div>
									</div>
									<div class="card-body">
										<div class="card mb-3">
											<div class="card-body">

												<div>

													<div class="border-bottom mb-3">
														<div class="row align-items-center">
															<div class="col-md-4">
																<div class="mb-3">
																	<p class="fs-12 mb-0">Total</p>
																	<p class="text-gray-9"><?= $payment[0]['total'] ?> Rs</p>
																</div>
															</div>
															<div class="col-md-4">
																<div class="mb-3">
																	<p class="fs-12 mb-0">Paid</p>
																	<p class="text-gray-9"><?= $paymentsum[0]['total_sum'] ?>
																		Rs</p>
																</div>
															</div>
															<div class="col-md-4">
																<div class="mb-3">
																	<p class="fs-12 mb-0">Due</p>
																	<p class="text-gray-9"><?= $payment[0]['due'] ?>
																		Rs</p>
																</div>
															</div>


														</div>

													</div>
												</div>

											</div>
										</div>
										<div class="card mb-3">
											<div class="card-body">

												<div class="table-responsive mb-3">
													<table class="table">
														<thead class="thead-light">
															<tr>
																<th class="">S.No</th>

																<th class="">Payment Date</th>
																<th class="">Tran. Id</th>

																<th class="">Paid Amount</th>
																<th class="">Payment Mode</th>
																<th class="">Bank/Cheque</th>



															</tr>
														</thead>
														<tbody>
															<?php
															$paymentall = $this->CommonModal->getRowByMultitpleId('fees_payment', 'student_id', $student[0]['id'], 'inst_id', $user[0]['id'], 'id', 'DESC');
															$i = 0;

															if (!empty($paymentall)) {
																foreach ($paymentall as $row1) {
																	$i++;
															?>
																	<tr>
																		<td><?= $i ?></td>
																		<td><?= $row1['date'] ?></td>
																		<td><?= $row1['transaction_id'] ?></td>

																		<td><?= $row1['paid'] ?> Rs</td>
																		<td><?= $row1['mode'] ?></td>

																		<?php
																		$bank_name = "-"; // Default value agar koi bank info na mile
																		if (!empty($row1['account_id'])) {
																			$bank = $this->CommonModal->getRowByMultitpleId('account', 'id', $row1['account_id'], 'inst_id', $user[0]['id'], 'id', 'DESC');
																			if (!empty($bank)) {
																				$bank_name = $bank[0]['bank_name'];
																			}
																		} elseif (!empty($row1['cheque_no'])) {
																			$bank_name = $row1['cheque_no']; // Corrected this line
																		} else {
																			$bank_name = $row1['mode'];
																		}
																		?>

																		<td><?= $bank_name ?></td>
																	</tr>
															<?php
																}
															}
															?>

														</tbody>
													</table>

												</div>
											</div>
										</div>


									</div>
								</div>
							</div>
							<!-- /Calls -->



							<!-- Email -->
							<div class="tab-pane fade" id="email">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap">
										<h4 class="fw-semibold">Email</h4>
										<div class="d-inline-flex align-items-center">
											<a href="javascript:void(0);" class="link-purple fw-medium" data-bs-toggle="modal"
												data-bs-target="#add_compose"><i
													class="ti ti-circle-plus me-1"></i>Create Email</a>
										</div>
									</div>
									<div class="card-body">
										<div class="card border mb-0">
											<div class="card-body pb-0">
												<?php $emails = $this->CommonModal->getRowByMultitpleId('student_email', 'student_id', $student[0]['id'], 'inst_id', $user[0]['id'], 'id', 'DESC');
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
																	<a href="<?= base_url('Admin_Dashboard/delete_mail/' . encryptId($email['id']) . '/student_email') ?>" class="btn btn-primary">Delete</a>
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
							<!-- /Email -->
							<div class="tab-pane fade" id="attendence">
								<div class="card">
									<div
										class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">View Attendence</h4>
										<div class="d-inline-flex align-items-center">
											<a href="<?= base_url('Admin_Dashboard/attendence_report/' . encryptId($user[0]['id']) . '/' . encryptId($student[0]['id'])); ?>" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>View Detail</a>
										</div>
									</div>
									<div class="card-body">
										<div class="card mb-3">
											<div class="card-body">
												<div class="border-bottom mb-3">
													<?php
													$this->db->select("status, COUNT(*) as count");
													$this->db->where('inst_id', $user[0]['id']);
													$this->db->where('student_id', $student[0]['id']);

													$this->db->group_by("status");
													$count_query = $this->db->get('student_attendance')->result_array();

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
																<p class="text-gray-9"><?= isset($attendance_count['Present']) ? $attendance_count['Present'] : '0' ?></p>
															</div>
														</div>
														<div class="col-md-4">
															<div class="mb-3">
																<p class="fs-12 mb-0">Total Absent</p>
																<p class="text-gray-9"><?= isset($attendance_count['Absent']) ? $attendance_count['Absent'] : '0' ?></p>
															</div>
														</div>
														<div class="col-md-4">
															<div class="mb-3">
																<p class="fs-12 mb-0">Total Late</p>
																<p class="text-gray-9"><?= isset($attendance_count['Late']) ? $attendance_count['Late'] : '0' ?></p>
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
							<!-- /Page Wrapper -->




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
																continue; // ✅ Skip already selected fees 
															?>

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
							<!-- /Add Note -->

							<!-- Create Call Log -->
							<div class="modal custom-modal fade modal-padding" id="create_call" role="dialog">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Pay Due Payment</h5>
											<button type="button" class="btn-close position-static" data-bs-dismiss="modal"
												aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="<?= base_url('Admin_Dashboard/pay_fees_payment/' . encryptId($user[0]['id'])) ?>"
												method="post">
												<div class="row">
													<div class="col-md-12">
														<div class="mb-3">
															<label class="col-form-label"> Date <span class="text-danger">
																	*</span></label>
															<div class="icon-form">
																<span class="form-icon"><i class="ti ti-calendar-check"></i></span>
																<input type="date" class="form-control" name="date" value="<?= date('Y-m-d'); ?>">

															</div>
														</div>
														<div class="mb-3">
															<div
																class="d-flex align-items-center justify-content-between">
																<label class="col-form-label">Payment Mode</label>

															</div>
															<select class="select" name="mode" id="paymentType" required
																onchange="handlePaymentChange()">
																<option Value="N/A">Choose</option>
																<option Value="Cash">Cash</option>
																<option value="UPI">UPI</option>
																<option value="Card">Created/Debit Card</option>

																<option value="Bank">Bank</option>
																<option value="Cheque">Cheque</option>
																<option value="None">None</option>


															</select>
														</div>
														<div class="d-none" id="bankDetails">
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


														<div class=" d-none" id="chequeDetails">
															<div class="mb-3">
																<label class="col-form-label">Cheque Number<span
																		class="text-danger"> *</span></label>
																<input type="text" class="form-control" name="cheque_no"
																	id="chequeNumber"
																	value="<?= $Student_payment[0]['cheque_no'] ?>">
															</div>

														</div>

														<div class="mb-3">
															<label class="col-form-label">paid Amount<span
																	class="text-danger"> *</span></label>
															<input type="number" class="form-control" name="paid"
																id="paid" value="<?= $payment[0]['due'] ?>"
																required oninput="validatePaidAmount()">
															<input type="hidden" class="form-control" name="inst_id"
																value="<?= $user[0]['id'] ?>"
																required>
															<input type="hidden" class="form-control" name="student_id"
																value="<?= $student[0]['id'] ?>"
																required><input type="hidden" class="form-control" name="due"
																value="<?= $payment[0]['due'] ?>"
																required>
															<input type="hidden" class="form-control" name="total"
																value="<?= $payment[0]['total'] ?>"
																required>
														</div>




														<div class="text-end modal-btn">
															<a class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
															<button class="btn btn-primary" type="submit">Confirm</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- /Create Call Log -->




							<!-- Add Compose -->
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
											<form action="<?= base_url('Admin_Dashboard/send_email/' . encryptId($user[0]['id']) . '/' . encryptId($student[0]['id']) . '/1') ?>" method="post">

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
							<!-- /Add Compose -->




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
						<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
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
						<script src="<?= base_url() ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

						<!-- Select2 JS -->
						<script src="<?= base_url() ?>assets/plugins/select2/js/select2.min.js"></script>

						<!-- Summernote JS -->
						<script src="<?= base_url() ?>assets/plugins/summernote/summernote-lite.min.js"></script>

						<!-- Sticky Sidebar JS -->
						<script src="<?= base_url() ?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
						<script src="<?= base_url() ?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

						<!-- Color Picker JS -->
						<script src="<?= base_url() ?>assets/plugins/%40simonwep/pickr/pickr.es5.min.js"></script>

						<!--- Custom Js -->
						<script src="<?= base_url() ?>assets/js/theme-colorpicker.js"></script>
						<script src="<?= base_url() ?>assets/js/script.js"></script>

						<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
							data-cf-settings="c437fe80f96e304f0c16e4c8-|49" defer></script>
</body>


</html>