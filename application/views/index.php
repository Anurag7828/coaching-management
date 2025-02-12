<!DOCTYPE html>
<html lang="en">


<?php include('includes/header-links.php') ?>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<?php include('includes/header.php') ?>
		<?php include('includes/sidebar.php') ?>

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">

				<div class="row">
					<div class="col-md-12">
						<div class="page-header">
							<div class="row align-items-center ">
								<div class="col-md-4">
									<h3 class="page-title">Dashboard</h3>
								</div>
								<div class="col-md-8 float-end ms-auto">
									<div class="d-flex title-head">
										<div class="daterange-picker d-flex align-items-center justify-content-center">
											<div class="form-sort me-2">
												<i class="ti ti-calendar"></i>
												<input type="text" class="form-control  date-range bookingrange">
											</div>
											<div class="head-icons mb-0">
												<a href="leads-dashboard.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh">
													<i class="ti ti-refresh-dot"></i>
												</a>
												<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
													<i class="ti ti-chevrons-up"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Welcome Wrap -->
				<div class="welcome-wrap mb-4">
					<div class=" d-flex align-items-center justify-content-between flex-wrap">
						<div class="mb-3">
							<h2 class="mb-1 text-white">Welcome Back, Adrian</h2>
							<p class="text-light">14 New Companies Subscribed Today !!!</p>
						</div>
						<div class="d-flex align-items-center flex-wrap mb-1">
							<a href="" class="btn btn-dark btn-md me-2 mb-2">Companies</a>
							<a href="packages.html" class="btn btn-light btn-md mb-2">All Packages</a>
						</div>
					</div>
				</div>
				<!-- /Welcome Wrap -->

				<div class="row">

					<!-- Total Companies -->
					<div class="col-xl-3 col-sm-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<span class="avatar avatar-md rounded bg-dark mb-3">
										<i class="ti ti-building fs-16"></i>
									</span>

								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1"><?= $institution ?></h2>
										<p class="fs-13">Total Institutes</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Total Companies -->

					<!-- Active Companies -->
					<div class="col-xl-3 col-sm-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<span class="avatar avatar-md rounded bg-dark mb-3">
										<i class="ti ti-carousel-vertical fs-16"></i>
									</span>

								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1"><?= $active ?></h2>
										<p class="fs-13">Active Institutes</p>
									</div>

								</div>
							</div>
						</div>
					</div>
					<!-- /Active Companies -->

					<!-- Total Subscribers -->
					<div class="col-xl-3 col-sm-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<span class="avatar avatar-md rounded bg-dark mb-3">
										<i class="ti ti-chalkboard-off fs-16"></i>
									</span>

								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1"><?= $deactive ?></h2>
										<p class="fs-13">Total Deactive Institutes</p>
									</div>

								</div>
							</div>
						</div>
					</div>
					<!-- /Total Subscribers -->
					<div class="col-xl-3 col-sm-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<span class="avatar avatar-md rounded bg-dark mb-3">
										<i class="ti ti-building fs-16"></i>
									</span>
									<span class="badge bg-danger fw-normal mb-3">
										deactive plans-<?= $deactive_plan ?>
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1"><?= $active_plan ?></h2>
										<p class="fs-13">Total Plans</p>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>


				<div class="row">

					<div class="col-xxl-6 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Total Active Institutes</h5>
								<a href="<?= base_url('Home/view_institution?tag=active') ?>" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body pb-2">
								<div class="table-responsive custom-table">
									<table class="table">
										<thead class="thead-light">
											<tr>
												<th class="no-sort">S No.</th>
												<th>Name</th>

												<th>Contact No.</th>

												<th>Status</th>
												<th>Email</th>
												<th>Plan</th>


											</tr>
										</thead>
										<tbody>
											<?php if (!empty($active_inst)) : ?>
												<?php
												$i = 1;
												foreach ($active_inst as $row) :
												?>
													<tr>
														<td><?= $i++; ?></td>
														<td><a href="" class="title-name"><?= $row['name']; ?></a></td>

														<td><?= $row['phone']; ?></td>
														<td> <?php if ($row['status'] == '0') { ?>
																<span class="badge badge-pill badge-status  bg-success">
																	Active
																</span>
															<?php } else {
															?>
																<span class="badge badge-pill badge-status  bg-danger">
																	Dective
																</span>
															<?php } ?>
														</td>


														<td><?= $row['email']; ?></td>
														<?php $plan = $this->CommonModal->getRowById('plan', 'id', $row['plan_id']); ?>

														<td><?= $plan[0]['plan_name']; ?></td>



													</tr>

												<?php $i++;
												endforeach; ?>
											<?php endif; ?>
										</tbody>

									</table>

								</div>
							</div>

						</div>
					</div>

					<div class="col-xxl-6 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Total Deactive Institutes</h5>
								<a href="<?= base_url('Home/view_institution?tag=active') ?>" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body pb-2">
								<div class="table-responsive custom-table">
									<table class="table">
										<thead class="thead-light">
											<tr>
												<th class="no-sort">S No.</th>
												<th>Name</th>

												<th>Contact No.</th>

												<th>Status</th>
												<th>Email</th>
												<th>Plan</th>


											</tr>
										</thead>
										<tbody>
											<?php if (!empty($deactive_inst)) : ?>
												<?php
												$i = 1;
												foreach ($deactive_inst as $row) :
												?>
													<tr>
														<td><?= $i++; ?></td>
														<td><a href="" class="title-name"><?= $row['name']; ?></a></td>
														<td><?= $row['phone']; ?></td>
														<td>
															<?php if ($row['status'] == '0') { ?>
																<span class="badge badge-pill badge-status bg-success">Active</span>
															<?php } else { ?>
																<span class="badge badge-pill badge-status bg-danger">Deactive</span>
															<?php } ?>
														</td>
														<td><?= $row['email']; ?></td>
														<?php $plan = $this->CommonModal->getRowById('plan', 'id', $row['plan_id']); ?>
														<td><?= !empty($plan) ? $plan[0]['plan_name'] : 'N/A'; ?></td>
													</tr>
												<?php endforeach; ?>
											<?php else : ?>
												<tr>
													<td colspan="6" class="text-center">No Data Available</td>
												</tr>
											<?php endif; ?>
										</tbody>


									</table>

								</div>
							</div>

						</div>
					</div>

				</div>
				<div class="row">

					<div class="col-xxl-6 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Total Active Plans</h5>
								<a href="<?= base_url('Home/view_plan?tag=active') ?>" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body pb-2">
								<div class="table-responsive custom-table">
									<table class="table">
										<thead class="thead-light">
											<tr>
												<th class="no-sort">S No.</th>
												<th>Plan Name</th>
												<th>No. of Days</th>
												<th>Price</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($active_plan)) : ?>
												<?php
												$i = 1;
												foreach ($active_plan as $row) :
												?>
													<tr>
														<td><?= $i++; ?></td>
														<td><a href="" class="title-name"><?= $row['plan_name']; ?></a></td>

														<td><?= $row['numbers_of_days']; ?></td>
														<td><?= $row['price']; ?></td>
                                            			<td> <?php if ($row['status'] == '0') { ?>
																<span class="badge badge-pill badge-status  bg-success">
																	Active
																</span>
															<?php } else {
															?>
																<span class="badge badge-pill badge-status  bg-danger">
																	Dective
																</span>
															<?php } ?>
														</td>




													</tr>

												<?php $i++;
												endforeach; ?>
											<?php endif; ?>
										</tbody>

									</table>

								</div>
							</div>

						</div>
					</div>

					<div class="col-xxl-6 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Total Deactive Institutes</h5>
								<a href="<?= base_url('Home/view_plan?tag=deactive') ?>" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body pb-2">
								<div class="table-responsive custom-table">
									<table class="table">
										<thead class="thead-light">
											<tr>
												<th class="no-sort">S No.</th>
												<th>Plan Name</th>
										     	<th>No. of Days</th>
												<th>Price</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($deactive_plan)) : ?>
												<?php
												$i = 1;
												foreach ($deactive_plan as $row) :
												?>
													<tr>
														<td><?= $i++; ?></td>
														<td><a href="" class="title-name"><?= $row['plan_name']; ?></a></td>

														<td><?= $row['numbers_of_days']; ?></td>
														<td><?= $row['price']; ?></td>
														<td>
															<?php if ($row['status'] == '0') { ?>
																<span class="badge badge-pill badge-status bg-success">Active</span>
															<?php } else { ?>
																<span class="badge badge-pill badge-status bg-danger">Deactive</span>
															<?php } ?>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php else : ?>
												<tr>
													<td colspan="6" class="text-center">No Data Available</td>
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
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->
	<?php include('includes/footer-links.php') ?>

</html>