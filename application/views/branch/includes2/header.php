<!-- <div class="preloader">
			<span class="loader"></span>
		</div> -->

		<!-- Header -->
		<div class="header">

			<!-- Logo -->
			<div class="header-left active">
				<a href="<?= base_url('Admin_Dashboard/student_login/'. encryptId($employee[0]['id']))?>" class="logo logo-normal">
                    <img src="<?= base_url()?>assets/img/logo.svg" alt="Logo">
                    <img src="<?= base_url()?>assets/img/white-logo.svg" class="white-logo" alt="Logo">
                </a>
				<a href="<?= base_url('Admin_Dashboard/student_login/'. encryptId($employee[0]['id']))?>" class="logo-small">
					<img src="<?= base_url()?>assets/img/logo-small.svg" alt="Logo">
				</a>
				<a id="toggle_btn" href="javascript:void(0);">
					<i class="ti ti-arrow-bar-to-left"></i>
				</a>
			</div>
			<!-- /Logo -->

			<a id="mobile_btn" class="mobile_btn" href="#sidebar">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>

			<div class="header-user">
				<ul class="nav user-menu">
					
					<!-- Search -->
					<li class="nav-item nav-search-inputs me-auto">
						<div class="top-nav-search">
							<a href="javascript:void(0);" class="responsive-search">
								<i class="fa fa-search"></i>
							</a>
							<form action="#" class="dropdown">
								<div class="searchinputs" id="dropdownMenuClickable">
									<input type="text" placeholder="Search">
									<div class="search-addon">
										<button type="submit"><i class="ti ti-command"></i></button>
									</div>
								</div>
							</form>
						</div>
					</li>
					

					<!-- Nav List -->
					<li class="nav-item nav-list">
						<ul class="nav">
							<li>
								<div>
									<a href="#" class="btn btn-icon border btn-menubar btnFullscreen">
										<i class="ti ti-maximize"></i>
									</a>
								</div>
							</li>
							<li class="dark-mode-list">
								<a href="javascript:void(0);" id="dark-mode-toggle" class="dark-mode-toggle">
									<i class="ti ti-sun light-mode active"></i>
									<i class="ti ti-moon dark-mode"></i>
								</a>
							</li>
							
						</ul>
					</li>
					<!-- /Nav List -->
					
			
				<!-- Profile Dropdown -->
<li class="nav-item dropdown has-arrow main-drop">
	<a href="javascript:void(0);" class="nav-link userset" data-bs-toggle="dropdown">
		<span class="user-info">
			<span class="user-letter">
					<?php if ($this->session->userdata('role') == 'student') { ?>
				<img src="<?= base_url()?>uploads/institution/<?= $clg[0]['logo']?>" alt="Profile" style="height: 36px;">
				<?php } elseif ($this->session->userdata('role') == 'teacher') { ?>
						<img src="<?= base_url()?>uploads/employee/<?= $user[0]['image']?>" alt="Profile" style="height: 36px;">
					<?php } ?>
			</span>
			<span class="badge badge-success rounded-pill"></span>
		</span>
	</a>
	<div class="dropdown-menu menu-drop-user">
		<div class="profilename">
			<?php if ($this->session->userdata('role') == 'student') { ?>
				<a class="dropdown-item" href="<?= base_url('Admin_Dashboard/student_login/'. encryptId($user[0]['id']))?>">
					<i class="ti ti-layout-2"></i> Dashboard
				</a>
				<a class="dropdown-item" href="<?= base_url('Admin_Dashboard/student_profile/'.encryptId($user[0]['id']))?>">
					<i class="ti ti-user-pin"></i> My Profile
				</a>
				<a class="dropdown-item" href="<?= base_url('Admin_Dashboard/View_student_attendance/' . encryptId($user[0]['id'])) ?>">
					<i class="ti ti-user-pin"></i> Attendance Report
				</a>
			<?php } elseif ($this->session->userdata('role') == 'teacher') { ?>
						<a class="dropdown-item" href="<?= base_url('Admin_Dashboard/teacher_login/'. encryptId($user[0]['id']))?>">
					<i class="ti ti-layout-2"></i> Dashboard
				</a>
				<a class="dropdown-item" href="<?= base_url('Admin_Dashboard/teacher_profile/' . encryptId($user[0]['id'])) ?>">
					<i class="ti ti-layout-2"></i> Teacher Profile
				</a>
		
				<a class="dropdown-item" href="<?= base_url('Admin_Dashboard/View_teacher_attendance/' . encryptId($user[0]['id'])) ?>">
					<i class="ti ti-user-pin"></i> Attendance Report
				</a>
				<!-- Add more teacher-specific links here if needed -->
			<?php } ?>
			
			<a class="dropdown-item" href="<?= base_url('Admin/logout')?>">
				<i class="ti ti-lock"></i> Logout
			</a>
		</div>
	</div>
</li>
<!-- /Profile Dropdown -->


				</ul>
			</div>

			<!-- Mobile Menu -->
			<div class="dropdown mobile-user-menu">
				<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?= base_url('Admin_Dashboard/student_login/'. encryptId($user[0]['id']))?>">
						<i class="ti ti-layout-2"></i> Dashboard
					</a>
					<a class="dropdown-item" href="<?= base_url('Admin_Dashboard/student_profile/'. encryptId($user[0]['id']))?>">
						<i class="ti ti-user-pin"></i> My Profile
					</a>
					<a class="dropdown-item" href="<?= base_url('Admin/logout')?>">
						<i class="ti ti-lock"></i> Logout
					</a>
				</div>
			</div>
			<!-- /Mobile Menu -->

		</div>
		<!-- /Header -->