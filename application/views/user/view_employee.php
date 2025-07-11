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
                                    <h4 class="page-title">Employees</h4>
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
                                            <a href="<?= base_url('Admin_Dashboard/add_employee/' . encryptId($user[0]['id'])) ?>"
                                                class="btn btn-primary"><i
                                                    class="ti ti-square-rounded-plus me-2"></i>Add employee</a>
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
                                                <th >Emp Code.</th>

                                                <th>Employee Name</th>

                                                <th>Contact No.</th>

                                                <th>Gender</th>
                                                <th>Branch</th>
                                                <th>Shift</th>
                                                <th>Classes</th>

                                                <th>Status</th>
                                                <!-- <th>Add By</th> -->

                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($employee)): ?>
                                                <?php $i = 1;
                                                foreach ($employee as $row): ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row['emp_code']; ?></td>
                                                        <td><a href="<?php echo base_url() . 'Admin_Dashboard/employee/' . encryptId($row['id']) . '/' . encryptId($user[0]['id']) . '?tag=' . $row['status']; ?>" class="title-name"><?= $row['name']; ?></a></td>
                                                       
                                                        <td><?= $row['phone']; ?></td>
                                                        <td><?= $row['gender']; ?></td>
                                                        <?php if ($row['branch_id'] == '0') { ?>
                                                            <td>Main</td>
                                                        <?php } else { ?>
                                                            <td>Other</td>

                                                        <?php } ?>

                                                        <?php $shift = $this->CommonModal->getRowById('shifts', 'id', $row['shift_id']); ?>

                                                        <td><?= $shift[0]['name']; ?></td>
                                                        <td>  <a class="dropdown-item"
                                                                        href="<?php echo base_url() . 'Admin_Dashboard/view_timetable/' . encryptId($row['id']) . '/' . encryptId($user[0]['id']).'?tag=emp'; ?>">
                                                                <span class="badge badge-pill badge-status  bg-success">
                                                             Classes 
                                                                </span>
                                                            </a>
                                                        </td>

                                                        <td> <?php if ($row['status'] == '0') { ?>
                                                                <span class="badge badge-pill badge-status  bg-success">
                                                                    Active
                                                                </span>
                                                            <?php } else {
                                                            ?>
                                                                <span class="badge badge-pill badge-status  bg-danger">
                                                                    Dective
                                                                </span>
                                                            <?php } ?>
                                                        </td>



                                                        <td>
                                                            <div class="dropdown table-action">
                                                                <a href="#" class="action-icon" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo base_url() . 'Admin_Dashboard/employee/' . encryptId($row['id']) . '/' . encryptId($user[0]['id']) . '?tag=' . $row['status']; ?>"><i
                                                                            class="ti ti-eye text-blue"></i> View employee</a>
                                                                    <?php if ($row['status'] == '0') { ?>


                                                                        <a class="dropdown-item" href="
<?= base_url('Admin_Dashboard/deactiveemployee/' . $row['id'] . '/' . encryptId($user[0]['id'])); ?>"><i
                                                                                class="ti ti-eye text-danger"></i>Deactive</a>
                                                                    <?php } else { ?>
                                                                        <a class="dropdown-item" href="
<?= base_url('Admin_Dashboard/activeemployee/' . $row['id'] . '/' . encryptId($user[0]['id'])); ?>"><i
                                                                                class="ti ti-eye text-success"></i>Active</a>
                                                                    <?php } ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo base_url() . 'Admin_Dashboard/update_employee/' . encryptId($row['id']) . '/' . encryptId($user[0]['id']) . '?tag=' . $row['status']; ?>"><i
                                                                            class="ti ti-edit text-blue"></i> Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="
<?php echo base_url() . 'Admin_Dashbaord/view_employee/' . encryptId($user[0]['id']) . '?BdID=' . $row['id'] . '&tag=' . $row['status']; ?>"><i
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