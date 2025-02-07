<!-- Sidebar -->
<div class="sidebar" id="sidebar">
			<div class="modern-profile p-3 pb-0">
				
				<div class="sidebar-nav mb-3">
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent"
						role="tablist">
						<li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
						<li class="nav-item"><a class="nav-link border-0" href="chat.html">Chats</a></li>
						<li class="nav-item"><a class="nav-link border-0" href="email.html">Inbox</a></li>
					</ul>
				</div>
			</div>
			<div class="sidebar-header p-3 pb-0 pt-2">
				
				<div class="d-flex align-items-center justify-content-between menu-item mb-3">
					<div class="me-3">
						<a href="calendar.html" class="btn btn-icon border btn-menubar">
							<i class="ti ti-layout-grid-remove"></i>
						</a>
					</div>
					<div class="me-3">
						<a href="chat.html" class="btn btn-icon border btn-menubar position-relative">
							<i class="ti ti-brand-hipchat"></i>
						</a>
					</div>
					<div class="me-3 notification-item">
						<a href="activities.html" class="btn btn-icon border btn-menubar position-relative me-1">
							<i class="ti ti-bell"></i>
							<span class="notification-status-dot"></span>
						</a>
					</div>
					<div class="me-0">
						<a href="email.html" class="btn btn-icon border btn-menubar">
							<i class="ti ti-message"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="clinicdropdown">
							<a href="profile.html">
								<!-- <img src="assets/img/profiles/avatar-14.jpg" class="img-fluid" alt="Profile"> -->
								<div class="user-names">
									<h5><?= $admin['0']['name']?></h5>
									<h6><?= $admin['0']['company_name']?></h6>
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
										<i class="ti ti-layout-2"></i><span>Institutions</span><span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url()?>add_institution">Add Institution</a></li>
										<li><a href="<?= base_url('Home/view_institution?tag=active')?>">Active Institution</a></li>
										<li><a href="<?= base_url('Home/view_institution?tag=deactive')?>">Deactive Institution</a></li>

									
									</ul>
								</li>
								
								<li class="submenu">
									<a href="#" >
										<i class="ti ti-user-star"></i><span>Plan</span>
										<span class="menu-arrow"></span>
									</a>
									<ul>
										<li><a href="<?= base_url()?>add_plan" >Add Plan</a></li>
										<li><a href="<?= base_url('Home/view_plan?tag=active')?>">Active Plan</a></li>
										<li><a href="<?= base_url('Home/view_plan?tag=deactive')?>">Deactive Plan</a></li>

									
									</ul>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
