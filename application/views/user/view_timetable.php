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
                                    <h4 class="page-title">Classes</h4>
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
                                            <?php if($tag == 'emp'): ?>
                                        <a href="<?= base_url('Admin_Dashboard/add_timetable/'. encryptId($user[0]['id']).'/'. encryptId($emp_id).'?tag=emp')?>" class="btn btn-primary"><i
                                                    class="ti ti-square-rounded-plus me-2"></i>Add Class</a>
                                            <?php else: ?>
                                            <a href="<?= base_url('Admin_Dashboard/add_timetable/'. encryptId($user[0]['id']).'/'. encryptId($emp_id).'?tag=batch')?>" class="btn btn-primary"><i
                                                    class="ti ti-square-rounded-plus me-2"></i>Add Class</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Search -->
                            </div>
                            <div class="card-body">
                                <!-- Filter -->
                                <!-- <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-4">
                                    <div class="d-flex align-items-center flex-wrap row-gap-2">
                                        <div class="dropdown me-2">
                                            <a href="javascript:void(0);" class="dropdown-toggle"
                                                data-bs-toggle="dropdown"><i
                                                    class="ti ti-sort-ascending-2 me-2"></i>Sort </a>
                                            <div class="dropdown-menu  dropdown-menu-start">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item">
                                                            <i class="ti ti-circle-chevron-right me-1"></i>Ascending
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item">
                                                            <i class="ti ti-circle-chevron-right me-1"></i>Descending
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item">
                                                            <i class="ti ti-circle-chevron-right me-1"></i>Recently
                                                            Viewed
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item">
                                                            <i class="ti ti-circle-chevron-right me-1"></i>Recently
                                                            Added
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div> -->
                                <!-- /Filter -->

                                <!-- Contact List -->
                                <div class="table-responsive custom-table">
                                <table class="table datatable">
    <thead class="thead-light">
        <tr>
            <th class="no-sort">S No.</th>
            <?php if($tag == 'emp'): ?>
              
                  <th>Batch Name</th>
            <?php else: ?>
            <th>Teacher Name</th>
            <?php endif; ?>
            <th>Course Name</th>
            <th>Subject Name</th>
            <th>Starting Time</th>
            <th>Ending Time</th>
            <!-- <th>Paid</th> -->
          
            <th>Status</th>
            <!-- <th>Add By</th> -->

            <th class="text-end">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($class)) : ?>
            <?php $i = 1; foreach ($class as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <?php if($tag == 'emp'): ?>
                        <td>
                            <?php if (!empty($row['batch_id'])): ?>
                                <?php $batch = $this->CommonModal->getRowById('batchs', 'id', $row['batch_id']); ?>
                                <?= !empty($batch) ? $batch[0]['name'] : 'N/A'; ?>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                    <?php else: ?>
                         <td>
                            <?php if (!empty($row['emp_id'])): ?>
                                <?php $emp = $this->CommonModal->getRowById('employees', 'id', $row['emp_id']); ?>
                                <?= !empty($emp) ? $emp[0]['name'] : 'N/A'; ?>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>

                    <?php endif; ?>
                   
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
                    <td><?= date("h:i A", strtotime($row['starting_time'])); ?></td>
                    <td><?= date("h:i A", strtotime($row['ending_time'])); ?></td>

                

                    <td> <?php if($row['status'] == '0') { ?>
                    <span class="badge badge-pill badge-status  bg-success">
    Active
</span>
<?php } else{
    ?>
                <span class="badge badge-pill badge-status  bg-danger">
    Dective
</span>
<?php } ?>
</td>



                    <td>
                        <div class="dropdown table-action">
                            <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                    <?php if($tag == 'emp'): ?>
                            
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo base_url() . 'Admin_Dashboard/update_timetable/' . $row['id'].'/'.encryptId($user[0]['id']).'?tag=emp'; ?>"><i
                                                                            class="ti ti-edit text-blue"></i> Edit</a>
                            <?php else: ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo base_url() . 'Admin_Dashboard/update_timetable/' . $row['id'].'/'.encryptId($user[0]['id']); ?>"><i
                                                                            class="ti ti-edit text-blue"></i> Edit</a>
                                                                            <?php endif; ?>
                                                                    <a class="dropdown-item" href="
<?php echo base_url() . 'Admin_Dashboard/view_timetable/' . encryptId($emp_id).'/'.encryptId($user[0]['id']). '?BdID=' . $row['id'] ?>"><i
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
