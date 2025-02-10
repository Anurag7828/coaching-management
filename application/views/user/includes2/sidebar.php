<!-- Sidebar -->
<div class="sidebar" id="sidebar">
			<div class="modern-profile p-3 pb-0">
				
				
			</div>
			
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="clinicdropdown">
							<a href="profile.html">
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
									<a href="<?= base_url()?>index" >
										<i class="ti ti-layout-2"></i><span>Dashboard</span>
									</a>
									
								</li>
								<li class="submenu">
									<a href="javascript:void(0);">
										<i class="ti ti-layout-2"></i><span>Students</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url()?>add_institution">Add Students</a></li>
										<li><a href="<?= base_url('Home/view_institution?tag=active')?>">View Students</a></li>
										<li><a href="<?= base_url('Home/view_institution?tag=deactive')?>">Student Attendance</a></li>

									
									</ul>
								</li>
								
								<li class="submenu">
									<a href="#" >
										<i class="ti ti-user-star"></i><span>Batch</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url()?>add_plan" >Add Batch</a></li>
										<li><a href="<?= base_url('Home/view_plan?tag=active')?>">Active Batch</a></li>
										<li><a href="<?= base_url('Home/view_plan?tag=deactive')?>">Deactive Batch</a></li>

									
									</ul>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
