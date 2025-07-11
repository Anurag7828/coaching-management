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

                <div class="row">
                    <div class="col-md-12">

                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="page-title">Live Classes</h4>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="head-icons">
                                        <a href="companies.html" data-bs-toggle="tooltip" data-bs-placement="top"
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
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <div class="icon-form mb-3 mb-sm-0">
                                            <span class="form-icon"><i class="ti ti-search"></i></span>
                                            <input type="text" class="form-control" placeholder="Search Companies">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div
                                            class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                                            <div class="dropdown me-2">
                                                <a href="javascript:void(0);" class="dropdown-toggle"
                                                    data-bs-toggle="dropdown"><i
                                                        class="ti ti-package-export me-2"></i>Export</a>
                                                <div class="dropdown-menu  dropdown-menu-end">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                                    class="ti ti-file-type-pdf text-danger me-1"></i>Export
                                                                as PDF</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item"><i
                                                                    class="ti ti-file-type-xls text-green me-1"></i>Export
                                                                as Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <a href="<?= base_url('Admin_Dashboard/add_liveclass/' . encryptId($user[0]['id'])) ?>"
                                                class="btn btn-primary"><i
                                                    class="ti ti-square-rounded-plus me-2"></i>Add Class</a>

                                        </div>
                                    </div>
                                </div>
                                <!-- /Search -->
                            </div>
                            <div class="card-body">
                               
                                <!-- Contact List -->
                                <div class="table-responsive custom-table">
                                    <table class="table datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="no-sort">S No.</th>

                                                <th>Batch Name</th>



                                                <th>Course Name</th>
                                                <th>Subject Name</th>
                                                <th>Teacher Name</th>
                                                <th>Platform</th>
                                                <th>link</th>


                                                <th>Date</th>
                                                <th>Timing</th>


                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($liveclass)): ?>
                                                <?php $i = 1;
                                                foreach ($liveclass as $row): ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td>
                                                            <?php if (!empty($row['batch_id'])): ?>
                                                                <?php $batch = $this->CommonModal->getRowById('batchs', 'id', $row['batch_id']); ?>
                                                                <?= !empty($batch) ? $batch[0]['name'] : 'N/A'; ?>
                                                            <?php else: ?>
                                                                N/A
                                                            <?php endif; ?>
                                                        </td>



                                                        <td>
                                                            <?php if (!empty($row['course_id'])): ?>
                                                                <?php $course = $this->CommonModal->getRowById('courses', 'id', $row['course_id']); ?>
                                                                <?= !empty($course) ? $course[0]['name'] : 'N/A'; ?>
                                                            <?php else: ?>
                                                                N/A
                                                            <?php endif; ?>
                                                        </td>
                                                          <td>
                                                            <?php if (!empty($row['subject_id'])): ?>
                                                                <?php $subject = $this->CommonModal->getRowById('subjects', 'id', $row['subject_id']); ?>
                                                                <?= !empty($subject) ? $subject[0]['subject'] : 'N/A'; ?>
                                                            <?php else: ?>
                                                                N/A
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($row['emp_id'])): ?>
                                                                <?php $emp = $this->CommonModal->getRowById('employees', 'id', $row['emp_id']); ?>
                                                                <?= !empty($emp) ? $emp[0]['name'] : 'N/A'; ?>
                                                            <?php else: ?>
                                                                N/A
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($row['platform'])): ?>
                                                                <?= $row['platform']; ?>
                                                            <?php else: ?>
                                                                N/A
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <?php if (!empty($row['url'])): ?>
                                                              <a class="dropdown-item"
                                                                        href="<?= $row['url']; ?>" target="_blank">
                                                                <span class="badge badge-pill badge-status  bg-success">
                                                             Join Now
                                                                </span>
                                                            </a>
                                                            <?php else: ?>
                                                                N/A
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($row['date'])): ?>
                                                                <?= date("d-m-Y", strtotime($row['date'])); ?>
                                                            <?php else: ?>
                                                                N/A
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= date("h:i A", strtotime($row['starting_time'])); ?> To <?= date("h:i A", strtotime($row['ending_time'])); ?></td>
                                                        






                                                        <td>
                                                            <div class="dropdown table-action">
                                                                <a href="#" class="action-icon" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">

                                                                    <a class="dropdown-item"
                                                                        href="<?php echo base_url() . 'Admin_Dashboard/update_liveclass/' . encryptId($row['id']) . '/' . encryptId($user[0]['id']); ?>"><i
                                                                            class="ti ti-edit text-blue"></i> Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="
<?php echo base_url() . 'Admin_Dashboard/view_liveclass/' . encryptId($user[0]['id']) . '?BdID=' . $row['id'] ?>"><i
                                                                            class="ti ti-trash text-danger"></i>Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="datatable-length"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="datatable-paginate"></div>
                                    </div>
                                </div>
                                <!-- /Contact List -->

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?>