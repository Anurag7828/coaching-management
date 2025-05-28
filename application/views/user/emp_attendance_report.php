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

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">

				<div class="row">
					<div class="col-md-12">

						<!-- Page Header -->
						<div class="page-header">
							<div class="row align-items-center">
								<div class="col-sm-8">
									<h4 class="page-title">Employee Attendence Report </h4>
								</div>
                                
								<div class="col-sm-4 text-sm-end">
									<div class="head-icons">
										<a href="lead-reports.html" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Collapse" id="collapse-header"><i
												class="ti ti-chevrons-up"></i></a>
									</div>
								</div>
							</div>
                            <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
						</div>
						<!-- /Page Header -->

						<div class="card ">
							<div class="card-header">

								<!-- Search -->
								<div class="row">
								<div class="col-md-5 col-sm-4">
                                <input type="text" id="searchInput" class="form-control" placeholder="Search..."> 
                                </div>
									<div class="col-md-7 col-sm-8">
                                     
										<div class="text-sm-end">
											<a href="javascript:void(0);" class="btn btn-primary" id="exportPdf" data-bs-toggle="modal"
												data-bs-target="#download_report"><i
													class="ti ti-file-download me-2"></i>Download Report</a>
                                            
										</div>
                                     
									</div>
								</div>

								<!-- Search -->

							</div>
						<div class="card-body">
							
								<!-- Filter Form -->
<form method="post" action="<?= base_url('Admin_Dashboard/emp_attendence_report/'.encryptId($user[0]['id']).'/'.encryptId($employee[0]['id'])); ?>" id="filterForm">
    <div class="align-items-center justify-content-between flex-wrap mb-4 row-gap-2">
        <div class="align-items-center flex-wrap row-gap-2">
        <div class="row">
           

            <!-- Date From -->
            <div class="col-sm-2">
                <div class="w-full mb-3">
                    <label class="text-dark text-[13px] mb-2">From</label>
                 <input type="date" name="from" id="fromDate" class="form-control" value="<?= isset($start) ? $start : ''; ?>"></div>
            </div>

            <!-- Date To -->
            <div class="col-sm-2">
                <div class="w-full mb-3">
                    <label class="text-dark text-[13px] mb-2">To</label>
                  <input type="date" name="to" id="toDate" class="form-control" value="<?= isset($end) ? $end : ''; ?>">
                </div>
            </div>
            <!-- Filter Button -->
            <div class="col-sm-2 " >
                <button type="submit" class="btn bg-soft-purple text-purple w-full" style="margin-top:30px; ">
                    <i class="ti ti-filter"></i> Apply Filter
                </button>
            </div>

            <!-- Remove Filter Button -->
            <div class="col-sm-2 ">
                <button type="button" id="removeFilter" class="btn bg-danger text-white w-full" style="margin-top: 30px;">
                    <i class="ti ti-filter"></i> Remove Filter
                </button>
            </div>
            </div>
        </div>
    </div>
</form>

<div class="border-bottom mb-3">
    <div class="row align-items-center">
        <div class="col-md-4">
            <div class="mb-3">
                <p class="fs-12 mb-0">Total Present</p>
                <p class="text-gray-9"><?= isset($total_present) ? $total_present : '0' ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <p class="fs-12 mb-0">Total Absent</p>
                <p class="text-gray-9"><?= isset($total_absent) ? $total_absent : '0' ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <p class="fs-12 mb-0">Total Late</p>
                <p class="text-gray-9"><?= isset($total_late) ? $total_late : '0' ?></p>
            </div>
        </div>
    </div>
</div>

								<!-- Table -->
						<div class="table-responsive custom-table">
    <table class="table datatable" id="attendenceTable">
        <thead class="thead-light">
            <tr>
                <th class="no-sort">S No.</th>
                <th>Employee Code</th>
                <th>Employee Name</th>
                <th>Date</th>
                
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($attendence)) : ?>
                <?php $i = 1; foreach ($attendence as $row) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                       
                        <?php $employeename = $this->CommonModal->getRowById('employees', 'id', $row['emp_id']); ?>
                        <td><?= $employeename[0]['emp_code']?></td>
                        <td><?= $employeename[0]['name']?></td>
                        <td><?= DateTime::createFromFormat('Y-m-d', $row['date'])->format('d-m-y') ?></td>
                        <td><?= $row['status']?></td>
           
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>

    </table>
</div>



								<!-- /Table -->
						</div>

					</div>
				</div>

			</div>
		</div>
	



	</div>
	
  
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   





<?php include('includes2/footer.php') ?>
<?php include('includes2/footer-links.php') ?>
	
</body>

</html>