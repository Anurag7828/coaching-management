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
                            <h5 class="fw-semibold">Upload CSV File Fromate</h5>

                        </div>
                        <div class="offcanvas-body">
                         
                                <div class="accordion" id="main_accordion">
                                    <!-- Basic Info -->
                                    <div class="accordion-item rounded mb-3">
                                        <div class="accordion-header">
                                           
                                          
                                            <div class="card-header">

								<!-- Search -->
								<div class="row">
								<div class="col-md-5 col-sm-4">
                                <a href="#"
                                                class="accordion-button accordion-custom-button bg-white rounded fw-medium text-dark"
                                                data-bs-toggle="collapse" data-bs-target="#basic">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-user-plus fs-20"></i></span>
                                                        (First Download Sample, Edit It, and Then Upload) 
                                            </a>
                                </div>
									<div class="col-md-7 col-sm-8">
                                     
										<div class="text-sm-end">
                                        <button id="downloadExcel" class="btn btn-primary">Download Sample Excel</button>
										</div>
                                     
									</div>
								</div>

								<!-- Search -->

							</div>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="basic" data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Upload CSV Format  <span
                                                            class="text-danger">*</span></label>
                                                            <input type="file" id="uploadCSV" accept=".csv" class="form-control">
                                                            
                                                        </div>
                                                    </div>
                                                   
                                                    
         
                                                    <div class="d-flex align-items-center justify-content-end">

<button id="uploadCSVBtn" class="btn btn-primary">Upload CSV</button>
</div>
                                  
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Basic Info -->
                                  
                    
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <script>
document.getElementById('uploadCSVBtn').addEventListener('click', function() {
    let fileInput = document.getElementById('uploadCSV');
    let file = fileInput.files[0];
    var base_url = "<?php echo base_url(); ?>";
    if (!file) {
        alert("Please select a CSV file to upload.");
        return;
    }

    let formData = new FormData();
    formData.append("csv_file", file);

    fetch(base_url + "Admin_Dashboard/upload_students_attendance_csv", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Failed to upload attendance!");
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>


<script>


document.getElementById("removeFilter").addEventListener("click", function() {
document.getElementById("student-name").value = "all";
document.getElementById("fromDate").value = "";
document.getElementById("toDate").value = "";
document.getElementById("filterForm").submit(); // Auto-submit form
});

</script>



<script>
document.getElementById('downloadExcel').addEventListener('click', function() {
var base_url = "<?php echo base_url(); ?>";

let user_id = <?= $user[0]['id'];?> // Replace with actual user ID

fetch(base_url + 'Admin_Dashboard/get_students?user_id=' + user_id)
    .then(response => response.json()) // Server se JSON format mein data lo
    .then(data => {
        if (data.status && Array.isArray(data.data) && data.data.length > 0) {
            // Convert JSON to CSV Format
            let csvContent = "data:text/csv;charset=utf-8,";

            // Add CSV Header
            csvContent += "Student ID,Student Name,Inst ID,Batch ID, Batch Name ,Date,Status\n";

            // Add Data Rows
            data.data.forEach(row => {
                let rowData = [
                    row.student_id,
                    row.student_name,
                    row.inst_id,
                    row.batch_id,
                    row.batch_name,
                    row.date,
                    row.status
                ].join(",");
                csvContent += rowData + "\n";
            });

            // Create a Downloadable CSV File
            let encodedUri = encodeURI(csvContent);
            let link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "students_data.csv");
            document.body.appendChild(link);

            // Auto Click to Download
            link.click();
            document.body.removeChild(link);
        } else {
            alert(data.message || "No data available to export!");
        }
    })
    .catch(error => {
        console.error('Error fetching students data:', error);
        alert("Failed to fetch data!");
    });
});
</script>

    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?>

   
