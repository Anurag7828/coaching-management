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
                                    <h4 class="page-title">Subjects</h4>
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

                                            <a href="javascript:void(0)" 
                data-bs-toggle="modal" data-bs-target="#add_subject" class="btn btn-primary"><i
                                                    class="ti ti-square-rounded-plus me-2"></i>Add Subject</a>

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

                                                <th>Subject Name</th>
                                                


                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($subject)): ?>
                                                <?php $i = 1;
                                                foreach ($subject as $row): ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                       

                                                        <td>
                                                            <?php if (!empty($row['subject'])): ?>
                                                                <?= $row['subject']; ?>
                                                            <?php else: ?>
                                                                N/A
                                                            <?php endif; ?>
                                                        </td>



                                                        <td>
                                                            <div class="dropdown table-action">
                                                                <a href="#" class="action-icon" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
 <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_subject<?= $row['id']?>"><i
                                        class="fa-solid fa-pencil text-blue"></i>
                                    Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="
<?php echo base_url() . 'Admin_Dashboard/view_subject/'.encryptId($course).'/' . encryptId($user[0]['id']) . '?BdID=' . $row['id'] ?>"><i
                                                                            class="ti ti-trash text-danger"></i>Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                       <div class="modal fade" id="edit_subject<?= $row['id']?>" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Subject</h5>
						<div class="d-flex align-items-center">
							
							<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
								aria-label="Close">
								<i class="ti ti-x"></i>
							</button>
						</div>
					</div>
                    <form action="<?= base_url('Admin_Dashboard/edit_subject/'.$row['id'])?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="mb-3">
								<label class="col-form-label">Subject Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="subject" value="<?= $row['subject']?>" required>
								<input type="hidden" class="form-control" name="inst_id" value="<?=$user[0]['id']?>" required>
								<input type="hidden" class="form-control" name="course_id" value="<?=$course?>" required>

							</div>
							
							
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center justify-content-end m-0">
								<a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
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
    <div class="modal fade" id="add_subject" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Subject</h5>
						<div class="d-flex align-items-center">
							
							<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
								aria-label="Close">
								<i class="ti ti-x"></i>
							</button>
						</div>
					</div>
                    <form action="<?= base_url('Admin_Dashboard/add_subject/'.encryptId($user[0]['id']))?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="mb-3">
								<label class="col-form-label">Subject Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="subject" required>
								<input type="hidden" class="form-control" name="inst_id" value="<?=$user[0]['id']?>" required>
								<input type="hidden" class="form-control" name="course_id" value="<?=$course?>" required>

							</div>
							
							
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center justify-content-end m-0">
								<a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?>