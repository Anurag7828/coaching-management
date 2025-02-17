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
									<h4 class="page-title">Attendence </h4>
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
                                                    <a href="<?= base_url('Admin_Dashboard/export_attendance_sheet') ?>" class="btn btn-success">
    <i class="ti ti-file-download me-2"></i> Download Excel Template
</a>

                                                    <a href="<?= base_url('Admin_Dashboard/add_attendance/'. encryptId($user[0]['id']))?>" class="btn btn-primary" ><i
													class="ti ti-file-download me-2"></i>Today Attendance</a>
										</div>
                                     
									</div>
								</div>

								<!-- Search -->

							</div>
						<div class="card-body">
							
								<!-- Filter Form -->
<form method="post" action="<?= base_url('Admin_Dashboard/view_attendance/'.encryptId($user[0]['id'])); ?>" id="filterForm">
    <div class="align-items-center justify-content-between flex-wrap mb-4 row-gap-2">
        <div class="align-items-center flex-wrap row-gap-2">
        <div class="row">
            <!-- Select Customer -->
            <div class="col-sm-4">
                <div class="w-full mb-3">
                    <label class="text-dark text-[13px] mb-2">Select Batch</label>
                    <select name="batch_id" id="student-name" class="form-control select2  text-[13px] border rounded-md py-1.5 px-3 w-full" required>
                        <option value="all" <?= ($selected_batch == "all") ? "selected" : "" ?>>All Sales Report</option>
                        <?php foreach ($batches as $batch_info) { ?>
                           <option value="<?= $batch_info['id']; ?>" selected>
    <?= $batch_info['name']; ?>
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
               
                <th>Student_Name</th>
                <th>Date</th>
                
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($attendence)) : ?>
                <?php $i = 1; foreach ($attendence as $row) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                       
                        <?php $studentname = $this->CommonModal->getRowById('students', 'id', $row['student_id']); ?>
                        <td><?= $studentname[0]['name']?></td>
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
    
    <script>
   

document.getElementById("removeFilter").addEventListener("click", function() {
    document.getElementById("student-name").value = "all";
    document.getElementById("fromDate").value = "";
    document.getElementById("toDate").value = "";
    document.getElementById("filterForm").submit(); // Auto-submit form
});

</script>


<script>
document.getElementById('exportExcel').addEventListener('click', function () {
    // Sample student data (You can fetch this from the backend using AJAX)
    let students = <?= json_encode($students); ?>;  // PHP array of students

    let wb = XLSX.utils.book_new();
    let ws_data = [['Student ID', 'Student Name', 'Date', 'Status (Present/Absent/Late)']];

    students.forEach(student => {
        ws_data.push([student.id, student.name, '', '']); // Empty Date & Status for input
    });

    let ws = XLSX.utils.aoa_to_sheet(ws_data);
    XLSX.utils.book_append_sheet(wb, ws, "Attendance");
    XLSX.writeFile(wb, "attendance_template.xlsx");
});

// Upload & Process Excel File
document.getElementById('uploadExcel').addEventListener('change', function (event) {
    let file = event.target.files[0];
    let reader = new FileReader();

    reader.onload = function (e) {
        let data = new Uint8Array(e.target.result);
        let workbook = XLSX.read(data, { type: 'array' });

        let sheet = workbook.Sheets[workbook.SheetNames[0]];
        let jsonData = XLSX.utils.sheet_to_json(sheet, { header: 1 });

        let tableBody = document.querySelector('#previewTable tbody');
        tableBody.innerHTML = '';

        let attendanceData = [];

        jsonData.slice(1).forEach(row => {
            if (row.length > 0) {
                let student = {
                    student_id: row[0],
                    date: row[2],
                    status: row[3]
                };
                attendanceData.push(student);

                let tr = document.createElement('tr');
                tr.innerHTML = `<td>${row[0]}</td><td>${row[1]}</td><td>${row[2]}</td><td>${row[3]}</td>`;
                tableBody.appendChild(tr);
            }
        });

        // Send to PHP via AJAX
        fetch('<?= base_url("Admin_Dashboard/upload_attendance") ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ attendance: attendanceData })
        })
        .then(response => response.json())
        .then(data => alert("Attendance Uploaded Successfully!"))
        .catch(error => console.error('Error:', error));
    };

    reader.readAsArrayBuffer(file);
});
</script>

<?php include('includes2/footer.php') ?>
<?php include('includes2/footer-links.php') ?>
	
</body>

</html>