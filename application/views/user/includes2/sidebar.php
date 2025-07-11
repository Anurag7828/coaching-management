<!-- Sidebar -->
<div class="sidebar" id="sidebar">
			<div class="modern-profile p-3 pb-0">
				
				
			</div>
			
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="clinicdropdown">
							<a href="">
								<img src="<?= base_url()?>uploads/institution/<?= $user[0]['logo']?>" class="img-fluid" alt="Profile">
								<div class="user-names">
									<h5><?= $user[0]['name']?></h5>
									
								</div>
							</a>
						</li>
					</ul>
					<ul>
						<li>
							<h6 class="submenu-hdr">Main Menu</h6>
							<ul>
							<li >
									<a href="<?= base_url('Admin_Dashboard/index/'. encryptId($user[0]['id']))?>" >
										<i class="ti ti-layout-2"></i><span>Dashboard</span>
									</a>
									
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-layout-2"></i><span>Students</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url('Admin_Dashboard/add_student/'. encryptId($user[0]['id']))?>">Add Students</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_student/'. encryptId($user[0]['id']))?>">View Students</a></li>
									
										<li><a href="<?= base_url('Admin_Dashboard/view_attendance/'. encryptId($user[0]['id']))?>">Student Attendance</a></li>


									
									</ul>
								</li>
								
								<li class="submenu">
									<a href="#" >
										<i class="ti ti-user-star"></i><span>Batchs</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url('Admin_Dashboard/add_batch/'. encryptId($user[0]['id']))?>">Add Batchs</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_batch/'. encryptId($user[0]['id']))?>">Active Batchs</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_batch/'. encryptId($user[0]['id']).'?tag=deactive')?>">Deactive Batchs</a></li>

			

									
									</ul>
								</li>
								
								<li class="submenu">
									<a href="#" >
										<i class="ti ti-user-star"></i><span>Courses</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url('Admin_Dashboard/add_Course/'. encryptId($user[0]['id']))?>">Add Courses</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_Course/'. encryptId($user[0]['id']))?>">Active Courses</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_Course/'. encryptId($user[0]['id']).'?tag=deactive')?>">Deactive Courses</a></li>

			

									
									</ul>
								</li>
								<li class="submenu">
									<a href="#" >
										<i class="ti ti-user-star"></i><span>Academic Resources</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url('Admin_Dashboard/add_assignment/'. encryptId($user[0]['id']))?>">Add Academic Resource</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_assignment/'. encryptId($user[0]['id']))?>">View Academic Resource</a></li>

			

									
									</ul>
								</li>
								<li class="submenu">
									<a href="#" >
										<i class="ti ti-user-star"></i><span>Live Classes</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url('Admin_Dashboard/add_liveclass/'. encryptId($user[0]['id']))?>">Add Live Class</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_liveclass/'. encryptId($user[0]['id']))?>">View Live Class</a></li>

			

									
									</ul>
								</li>
								<br>
								<h6 class="submenu-hdr">Employee Section</h6>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-layout-2"></i><span>Employee</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url('Admin_Dashboard/add_employee/'. encryptId($user[0]['id']))?>">Add Employee</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_employee/'. encryptId($user[0]['id']))?>">View Employee</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_emp_attendance/'. encryptId($user[0]['id']))?>">Employee Attendance</a></li>


									
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-layout-2"></i><span>Department</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url('Admin_Dashboard/add_department/'. encryptId($user[0]['id']))?>">Add Department</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_department/'. encryptId($user[0]['id']))?>">Active Department</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_department/'. encryptId($user[0]['id']).'?tag=deactive')?>">Deactive Department</a></li>

									


									
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-layout-2"></i><span>Designation</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url('Admin_Dashboard/add_desgination/'. encryptId($user[0]['id']))?>">Add Designation</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_desgination/'. encryptId($user[0]['id']))?>">Active Designation</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_desgination/'. encryptId($user[0]['id']).'?tag=deactive')?>">Deactive Designation</a></li>

									


									
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-layout-2"></i><span>Shift</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url('Admin_Dashboard/add_shift/'. encryptId($user[0]['id']))?>">Add Shift</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_shift/'. encryptId($user[0]['id']))?>">Active Shift</a></li>
										<li><a href="<?= base_url('Admin_Dashboard/view_shift/'. encryptId($user[0]['id']).'?tag=deactive')?>">Deactive Shift</a></li>

									


									
									</ul>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
