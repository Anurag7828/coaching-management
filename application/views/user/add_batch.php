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
                            <h5 class="fw-semibold">Add New Batch</h5>

                        </div>
                        <div class="offcanvas-body">
                            <form action="" method="Post">
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

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Batch Name <span
                                                            class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name" value="<?= ($tag == 'edit' && isset($batch[0]['name'])) ? htmlspecialchars($batch[0]['name']) : '' ?>" required>
                                                            <input type="hidden" class="form-control" name="inst_id" value="<?= ($tag == 'edit' && isset($batch[0]['inst_id'])) ? htmlspecialchars($batch[0]['inst_id']) : $user[0]['id'] ?>" required>

                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Starting Date <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="starting_date" value="<?= ($tag == 'edit' && isset($batch[0]['starting_date'])) ? htmlspecialchars($batch[0]['starting_date']) : '' ?>" required>
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Start Timing<span
                                                            class="text-danger">*</span></label>
                                                            <input type="time" class="form-control" name="starting_time" value="<?= ($tag == 'edit' && isset($batch[0]['starting_time'])) ? htmlspecialchars($batch[0]['starting_time']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">End Timing<span
                                                            class="text-danger">*</span></label>
                                                            <input type="time" class="form-control" name="ending_time" value="<?= ($tag == 'edit' && isset($batch[0]['ending_time'])) ? htmlspecialchars($batch[0]['ending_time']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Course Name <span class="text-danger">*</span></label>
                                                            <select class="select2 form-control" name="course_id" required>
                                                            <option value="N/A" <?= ($tag == 'edit' && isset($batch[0]['course_id']) && $batch[0]['course_id'] == 'N/A') ? 'selected' : '' ?> data-display="Please select">Choose</option>
                                                            <?php if (!empty($course)) : ?>
                                                                <?php foreach ($course as $item) : ?>

                                                                <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($batch[0]['course_id']) && $batch[0]['course_id'] == $item['id']) ? 'selected' : '' ?> data-display="Please select"> <?= $item['plan_name'] ?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                             
                                                            </select>
                                                        </div>
                                                    </div> -->
         

                                  
                                                   
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
    <?php include('includes2/footer-links.php') ?>

   
