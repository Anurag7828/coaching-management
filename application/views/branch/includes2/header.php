	      <!-- Nav header start -->
         <div class="nav-header">
         
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line">
						<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.7468 5.58925C11.0722 5.26381 11.0722 4.73617 10.7468 4.41073C10.4213 4.0853 9.89369 4.0853 9.56826 4.41073L4.56826 9.41073C4.25277 9.72622 4.24174 10.2342 4.54322 10.5631L9.12655 15.5631C9.43754 15.9024 9.96468 15.9253 10.3039 15.6143C10.6432 15.3033 10.6661 14.7762 10.3551 14.4369L6.31096 10.0251L10.7468 5.58925Z" fill="#452B90"/>
							<path opacity="0.3" d="M16.5801 5.58924C16.9056 5.26381 16.9056 4.73617 16.5801 4.41073C16.2547 4.0853 15.727 4.0853 15.4016 4.41073L10.4016 9.41073C10.0861 9.72622 10.0751 10.2342 10.3766 10.5631L14.9599 15.5631C15.2709 15.9024 15.798 15.9253 16.1373 15.6143C16.4766 15.3033 16.4995 14.7762 16.1885 14.4369L12.1443 10.0251L16.5801 5.58924Z" fill="#452B90"/>
						</svg>
					</span>
                </div>
            </div>
        </div>
          
   
   
   <!-- Header start -->
   <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="navbar-collapse justify-between">
                        <div class="header-left">
							<div class="dashboard_bar max-md:hidden dark:text-white">
                                Dashboard
                            </div>
                        </div>
                        <div class="header-right flex items-center h-full">
						
							<ul class="flex flex-row">
							<li class="nav-item pl-4 flex items-center relative">
        <div id="google_translate_element"></div>
 </li>	
							
								
								<li class="nav-item pl-4 flex items-center relative">
									<div class="dropdown header-profile2">
										<a data-dz-dropdown="DzinfoDropdown" class="dz-dropdown nav-link relative p-2 max-sm:p-0 text-[#464a53] text-lg leading-[1] block duration-500 bg-transparent" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
											<div class="header-info2 flex items-center text-right">
												<div class="header-media">
													<img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" alt="" class="w-[45px] h-[45px] max-sm:w-[40px] max-sm:h-[40px] rounded-md">
												</div>
											</div>
										</a>
										<div id="DzinfoDropdown" class="dz-dropdown-menu dropdown-menu dropdown-menu-end bg-white dark:bg-[#182237] absolute rounded-md w-[275px] right-0 top-full z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] py-2 hidden">
											<div class="card border-0 mb-0">
												<div class="card-header relative flex items-center justify-between bg-transparent py-2 sm:px-[1.25rem] px-4 border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
													<div class="flex items-center">
														<img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" class="avatar avatar-md mr-2.5 h-[2.813rem] w-[2.813rem] inline-block object-cover rounded-md" alt="">
														<div>
															<h6 class="text-sm"><?= $user['0']['name'] ?></h6>
															<span class="text-xs text-body-color"><?= $user['0']['company_name'] ?></span>	
														</div>	
													</div>
												</div>
												<div class="card-body sm:py-2 border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
													<a href="<?= base_url('Branch_Dashboard/sub_admin/'.encryptId($user['0']['id'])) ?>" class="dropdown-item py-[0.6rem] px-[1.25rem] block w-full ai-icon hover:bg-primary-light group">
														<svg class="inline-block" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z" stroke="var(--primary)" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
	
														<span class="ml-2 text-[13px] text-body-color group-hover:text-primary">Profile</span>
													</a>
													
												</div>
												<div class="card-footer px-0 py-2">
													
													<a href="../../admin/logout" class="dropdown-item py-[0.6rem] px-[1.25rem] text-base block w-full ai-icon">
														<svg class="profle-logout inline-block" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ff7979" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
														<span class="ml-2 text-danger text-[13px]">Logout </span>
													</a>
												</div>
											</div>
											
										</div>
									</div>
								</li>
							</ul>
                        </div>
                    </div>
				</nav>
			</div>
		</div>
        <!-- Header end -->