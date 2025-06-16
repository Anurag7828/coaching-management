<!-- Sidebar -->
<div class="sidebar" id="sidebar">
			<div class="modern-profile p-3 pb-0">	
			</div>
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="clinicdropdown">
							<a href="<?= base_url('Admin_Dashboard/student_profile/'.encryptId($user[0]['id']))?>">
								<img src="<?= base_url()?>uploads/institution/<?= $clg[0]['logo']?>" class="img-fluid" alt="Profile">
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
							<li>
								<a href="<?php echo base_url() . 'Admin_Dashboard/student_login/' . encryptId($row['id']) . '/' . encryptId($user[0]['id']) . '?tag=' . $row['status']; ?>">
									<i class="ti ti-layout-2"></i><span>Your Details</span>
								</a>
									
								</li>
								
									<li>
									<a href="<?= base_url('Admin_Dashboard/View_student_attendance/' . encryptId($user[0]['id'])) ?>" >
										<i class="ti ti-user-star"></i><span>Attendance Report</span>
								    </a>
									
								</li>
								<!-- <li >
									<a href="<?= base_url('Admin_Dashboard/change_student_password/' . encryptId($user[0]['id'])) ?>" >
										<i class="ti ti-password"></i><span>Change Password</span>
							
									</a>
									
								</li>
								<li >
									<a href="<?= base_url('Admin/logout/') ?>" >
										<i class="ti ti-lock"></i><span>Log Out</span>
							
									</a> -->
									
								</li>
								
							
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
