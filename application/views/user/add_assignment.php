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
                            <h5 class="fw-semibold">Add New </h5>

                        </div>
                        <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
                        <div class="offcanvas-body">
                            <form action="" method="Post" enctype="multipart/form-data">
                                <div class="accordion" id="main_accordion">
                                    <!-- Basic Info -->
                                    <div class="accordion-item rounded mb-3">
                                        <div class="accordion-header">
                                            <a href="#"
                                                class="accordion-button accordion-custom-button bg-white rounded fw-medium text-dark"
                                                data-bs-toggle="collapse" data-bs-target="#basic">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-user-plus fs-20"></i></span>
                                                Basic Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="basic" data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                               <label class="col-form-label">Select Batch</label>
											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_department" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Add New</a>
                                                            <select class="select2 form-control" name="batch_id">
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($assignment[0]['batch_id']) && $assignment[0]['batch_id'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <?php if (!empty($batch)): ?>
                                                                    <?php foreach ($batch as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($assignment[0]['batch_id']) && $assignment[0]['batch_id'] == $item['id']) ? 'selected' : '' ?> data-display="Please select">
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                            <input type="hidden" class="form-control" name="inst_id" value="<?= ($tag == 'edit' && isset($assignment[0]['inst_id'])) ? htmlspecialchars($assignment[0]['inst_id']) : $user[0]['id'] ?>" required>
                                                        </div>
                                                    </div>


                                                   
                                                  <div class="col-md-4">
                                                        <div class="mb-3">
                                                          <label class="col-form-label">Course</label>
											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_desg" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Add New</a>
                                                    
<select name="course_id" id="course_id" class="form-control">
    <option value="N/A">Choose Course</option>
    <?php if (!empty($course)): ?>
        <?php foreach ($course as $item): ?>
            <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($assignment[0]['course_id']) && $assignment[0]['course_id'] == $item['id']) ? 'selected' : '' ?>>
                <?= $item['name'] ?>
            </option>
        <?php endforeach; ?>
    <?php endif; ?>
</select>



                                                        </div>
                                                    </div>
                                                      <div class="col-md-4">
                                                        <div class="mb-3">
                                                          <label class="col-form-label">Subjects</label>
				<select name="subject_id" id="subject_id" class=" select2 form-control">
    <option value="N/A">Choose Subject</option>
</select>
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Title<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="title" value="<?= ($tag == 'edit' && isset($assignment[0]['title'])) ? htmlspecialchars($assignment[0]['title']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">File (PDF Formate)<span
                                                                    class="text-danger">*</span></label>
                                                         <input type="file" class="form-control" name="file" accept=".pdf" <?= ($tag == 'edit') ? '' : 'required' ?>>

                                                              <?php if ($tag == 'edit' && !empty($assignment[0]['file'])): ?>
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
        </div>




    </div>

     
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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





 

    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?>

   
