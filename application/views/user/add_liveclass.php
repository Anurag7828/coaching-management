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
                            <h5 class="fw-semibold">Add New Class</h5>

                        </div>
                        <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
                        <div class="offcanvas-body">
                            <form action="" method="Post" >
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
                                                            <select class="select2 form-control" name="batch_id"
                                                                >
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($liveclass[0]['batch_id']) && $liveclass[0]['batch_id'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <?php if (!empty($batch)): ?>
                                                                    <?php foreach ($batch as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($liveclass[0]['batch_id']) && $liveclass[0]['batch_id'] == $item['id']) ? 'selected' : '' ?> >
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                            <input type="hidden" class="form-control" name="inst_id" value="<?= ($tag == 'edit' && isset($liveclass[0]['inst_id'])) ? htmlspecialchars($liveclass[0]['inst_id']) : $user[0]['id'] ?>" required>
 <input type="hidden" class="form-control" name="emp_id" value="<?= ($tag == 'edit' && isset($liveclass[0]['emp_id'])) ? htmlspecialchars($liveclass[0]['emp_id']) : $emp_id ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                          <label class="col-form-label">Course</label>
											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_desg" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Add New</a>
                                                           <select class=" form-control" name="course_id" id="course_id">
    <option value="N/A">Choose</option>
    <?php if (!empty($course)): ?>
        <?php foreach ($course as $item): ?>
            <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($liveclass[0]['course_id']) && $liveclass[0]['course_id'] == $item['id']) ? 'selected' : '' ?>>
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
                                                           <div class="col-md-4">
                                                        <div class="mb-3">
                                                               <label class="col-form-label">Select Teacher</label>
											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_department" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Add New</a>
                                                            <select class="select2 form-control" name="emp_id"
                                                                >
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($liveclass[0]['emp_id']) && $liveclass[0]['emp_id'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <?php if (!empty($employee)): ?>
                                                                    <?php foreach ($employee as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($liveclass[0]['emp_id']) && $liveclass[0]['emp_id'] == $item['id']) ? 'selected' : '' ?> data-display="Please select">
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                               <label class="col-form-label">Select Platform</label>
											<a href="javascript:void(0);" data-bs-toggle="modal"
												data-bs-target="#add_department" class="com-add"><i
													class="ti ti-circle-plus me-1"></i>Add New</a>
                                                            <select class="select2 form-control" name="platform"
                                                                >
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <option value="Google Meet" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Google Meet') ? 'selected' : '' ?> data-display="Please select">
                                                                    Google Meet
                                                                </option>
                                                                <option value="Zoom" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Zoom') ? 'selected' : '' ?> data-display="Please select">
                                                                    Zoom
                                                                </option>
                                                                        <option value="Microsoft Teams" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Microsoft Teams') ? 'selected' : '' ?> data-display="Please select">
                                                                            Microsoft Teams
                                                                        </option>
                                                                        <option value="Skype" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Skype') ? 'selected' : '' ?> data-display="Please select">
                                                                            Skype
                                                                        </option>
                                                                        <option value="Cisco Webex" <?= ($tag == 'edit' && isset($liveclass[0]['platform']) && $liveclass[0]['platform'] == 'Cisco Webex') ? 'selected' : '' ?> data-display="Please select">
                                                                            Cisco Webex
                                                                        </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    
 <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Link<span
                                                            class="text-danger">*</span></label>
                                                            <input type="url" class="form-control" name="url" value="<?= ($tag == 'edit' && isset($liveclass[0]['url'])) ? htmlspecialchars($liveclass[0]['url']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Date<span
                                                            class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="date" value="<?= ($tag == 'edit' && isset($liveclass[0]['date'])) ? htmlspecialchars($liveclass[0]['date']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Start Timing<span
                                                            class="text-danger">*</span></label>
                                                            <input type="time" class="form-control" name="starting_time" value="<?= ($tag == 'edit' && isset($liveclass[0]['starting_time'])) ? htmlspecialchars($liveclass[0]['starting_time']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">End Timing<span
                                                            class="text-danger">*</span></label>
                                                            <input type="time" class="form-control" name="ending_time" value="<?= ($tag == 'edit' && isset($liveclass[0]['ending_time'])) ? htmlspecialchars($liveclass[0]['ending_time']) : '' ?>" required>
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

    <?php include('includes2/footer.php') ?>


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
    const selectedSubjectId = "<?= isset($liveclass[0]['subject_id']) ? $liveclass[0]['subject_id'] : '' ?>";

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
  

    <?php include('includes2/footer-links.php') ?>

   
