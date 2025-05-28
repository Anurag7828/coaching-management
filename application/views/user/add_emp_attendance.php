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
                            <h5 class="fw-semibold"><?= $title ?></h5>

                        </div>

                        <form id="batchForm">

                            <div class="align-items-center justify-content-between flex-wrap mb-4 row-gap-2">
                                <div class="align-items-center flex-wrap row-gap-2">
                                    <div class="row">
                                        <!-- Select Customer -->
                                        <div class="col-sm-6">
                                            <div class="w-full mb-3">
                                                <label class="text-dark text-[13px] mb-2">Select Department</label>
                                                <select id="batch_id" name="department_id" class="form-control">
                                                    <?php foreach ($department as $departments): ?>
                                                        <option value="<?= $departments['id'] ?>"><?= $departments['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                    <div class="card ">
                        <div class="card-body">
                            <!-- Student List (Loaded via AJAX) -->
                            <div id="studentList"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let batchSelect = document.getElementById("batch_id");
            let userId = "<?= $user[0]['id'] ?>";

            function fetchStudents(batchId) {
                if (batchId) {
                    fetch("<?= base_url('Admin_Dashboard/get_emp_by_department/') ?>" + batchId + "/" + userId)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById("studentList").innerHTML = data;
                        });
                } else {
                    document.getElementById("studentList").innerHTML = "";
                }
            }

            // ✅ On change event (User selects batch)
            batchSelect.addEventListener("change", function () {
                fetchStudents(this.value);
            });

            // ✅ Fetch students on page load for default selected batch
            fetchStudents(batchSelect.value);
        });
    </script>

    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?>

</body>

</html>