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
									<h4 class="page-title">Employee Attendence </h4>
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
                                                  
                                                    <a href="<?= base_url('Admin_Dashboard/upload_emp_excel_formate/'. encryptId($user[0]['id']))?>" class="btn btn-primary" ><i
													class="ti ti-file-download me-2"></i>Upload Excel File</a>
                                                    <a href="<?= base_url('Admin_Dashboard/add_emp_attendance/'. encryptId($user[0]['id']))?>" class="btn btn-primary" ><i
													class="ti ti-file-download me-2"></i>Today Attendance</a>
										</div>
                                     
									</div>
								</div>

								<!-- Search -->

							</div>
						<div class="card-body">
							
								<!-- Filter Form -->
<form method="post" action="<?= base_url('Admin_Dashboard/view_emp_attendance/'.encryptId($user[0]['id'])); ?>" id="filterForm">
    <div class="align-items-center justify-content-between flex-wrap mb-4 row-gap-2">
        <div class="align-items-center flex-wrap row-gap-2">
        <div class="row">
            <!-- Select Customer -->
            <div class="col-sm-4">
                <div class="w-full mb-3">
                    <label class="text-dark text-[13px] mb-2">Select Department</label>
                    <select name="department_id" id="student-name" class="form-control select2  text-[13px] border rounded-md py-1.5 px-3 w-full" required>
                        <option value="all" <?= ($selected_department == "all") ? "selected" : "" ?>>All Department</option>
                        <?php foreach ($department as $department_info) { ?>
                           <option value="<?= $department_info['id']; ?>" selected>
    <?= $department_info['name']; ?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

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


								<!-- Table -->
						<div class="table-responsive custom-table">
    <table class="table datatable" id="attendenceTable">
        <thead class="thead-light">
            <tr>
                <th class="no-sort">S No.</th>
                <th>Employee code</th>
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