<!DOCTYPE html>
<html lang="en">


<?php include('includes2/header-links.php') ?>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    
    <!-- jQuery & FullCalendar JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
	<style>
		.fc .fc-button-primary:disabled{
			display: none !important;
		}
	</style>
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
						<div class="page-header">
							<div class="row align-items-center ">
								<div class="col-md-4">
									<h3 class="page-title">Dashboard</h3>
								</div>
								<div class="col-md-8 float-end ms-auto">
									<div class="d-flex title-head">
										<div class="daterange-picker d-flex align-items-center justify-content-center">
											
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
							<h2 class="mb-1 text-white">Welcome <?= $user[0]['name']?></h2>
						
						</div>
						<div class="d-flex align-items-center flex-wrap mb-1">
							<a href="<?= base_url('Admin_Dashboard/view_student/'. encryptId($user[0]['id']))?>" class="btn btn-dark btn-md me-2 mb-2">View Students</a>
							<a href="#" class="btn btn-light btn-md mb-2">View Employee</a>
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
									<span class="badge bg-success fw-normal mb-3">
										Active
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1"><?= $student?></h2>
										<p class="fs-13">Total Students</p>
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
									<span class="badge bg-success fw-normal mb-3">
										Active
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1"><?= $batch ?></h2>
										<p class="fs-13">Total Batch</p>
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
									<span class="badge bg-success fw-normal mb-3">
										Active
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1"><?= $course?></h2>
										<p class="fs-13">Total Courses</p>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<!-- /Total Subscribers -->

					<!-- Total Earnings -->
					<div class="col-xl-3 col-sm-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<span class="avatar avatar-md rounded bg-dark mb-3">
										<i class="ti ti-businessplan fs-16"></i>
									</span>
									<span class="badge bg-warning fw-normal mb-3">
										Today
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h2 class="mb-1"><?= $present ?></h2>
										<p class="fs-13">Today Present Student</p>
									</div>
								
								</div>
							</div>
						</div>
					</div>
					<!-- /Total Earnings -->

				</div>

			

				<div class="row">

					<!-- Recent Transactions -->
					<div class="col-xxl-4 col-xl-12 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Recent Transactions</h5>
								<!-- <a href="purchase-transaction.html" class="btn btn-light btn-md mb-2">View All</a> -->
							</div>
							<div class="card-body pb-2">
							<?php foreach ($payment as $row): ?>
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
                                    <div class="d-flex align-items-center mb-2">                                         
                                      
                                        <div class="ms-2 flex-fill">
       <?php $std = $this->CommonModal->getRowById('students', 'id', $row['student_id']);?>

                                            <h6 class="fs-medium text-truncate mb-1"><a href="javscript:void(0);"><?= $std[0]['name']?></a></h6>
                                            <p class="fs-13 d-inline-flex align-items-center">Tran Id -<span class="text-info"><?= $row['transaction_id']?></span></p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
                                        <h6 class="mb-1">Rs <?= $row['paid']?></h6>
                                        <p class="fs-13"><?= $row['date']?></p>
                                    </div>
                                </div>
								<?php endforeach;?>
								
							</div>
						</div>
					</div>
					<!-- /Recent Transactions -->

					<!-- Recently Registered -->
					<div class="col-xxl-4 col-xl-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
								<h5 class="mb-2">Recently Registered Students</h5>
								<a href="<?= base_url('Admin_Dashboard/view_student/'. encryptId($user[0]['id']))?>" class="btn btn-light btn-md mb-2">View All</a>
							</div>
							<div class="card-body pb-2">
							<?php foreach ($rec_student as $row1): ?>
								<div class="d-sm-flex justify-content-between flex-wrap mb-3">
								
                                    <div class="d-flex align-items-center mb-2">                                            
                                       
                                        <div class="ms-2 flex-fill">
                                            <h6 class="fs-medium text-truncate mb-1"><a href="<?php echo base_url() . 'Admin_Dashboard/student/' . encryptId($row1['id']) . '/' . encryptId($user[0]['id']) . '?tag=' . $row1['status']; ?>"><?= $row1['name']?></a></h6>
                                            <p class="fs-13">Roll no. - <?= $row1['roll_no']?></p>
                                        </div>
                                    </div>
                                    <div class="text-sm-end mb-2">
										<?php if($row1['status']=='0') {?>
									<span class="badge bg-success fw-normal mb-3">
										Active
									</span>
									<?php } else{?>
										<span class="badge bg-danger fw-normal mb-3">
										Deactive
									</span>
									<?php }?>
                                    </div>
                                </div>
								<?php endforeach;?>
								
							</div>
						</div>
					</div>
					<!-- /Recent Registered -->

					<!-- Recent Plan Expired -->
					<div class="col-xxl-4 col-xl-6 d-flex">
					
						<div class="card" style="width:100%">
							<div class="card-body">
								<div id="calendar"></div>
							</div>
						</div>
					
					</div>
					<!-- /Recent Plan Expired -->

				</div>

			</div>
		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->
	<?php include('includes2/footer.php') ?>
	 	<!-- Full Calendar JS -->
		 <script>
        $(document).ready(function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth' // Show monthly calendar view
            });
            calendar.render();
        });
    </script>
    <?php include('includes2/footer-links.php') ?>
</html>