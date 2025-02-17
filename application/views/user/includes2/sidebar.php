<!-- Sidebar -->
<div class="sidebar" id="sidebar">
			<div class="modern-profile p-3 pb-0">
				
				
			</div>
			
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="clinicdropdown">
							<a href="<?= base_url()?>">
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
									<a href="<?= base_url()?>" >
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
										<li><a href="<?= base_url('Admin_Dashboard/view_batch/'. encryptId($user[0]['id'].'?tag=deactive'))?>">Deactive Batchs</a></li>

			

									
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
										<li><a href="<?= base_url('Admin_Dashboard/view_Course/'. encryptId($user[0]['id'].'?tag=deactive'))?>">Deactive Courses</a></li>

			

									
									</ul>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
