<!-- <div class="preloader">
			<span class="loader"></span>
		</div> -->

		<!-- Header -->
		<div class="header">

			<!-- Logo -->
			<div class="header-left active">
				<a href="" class="logo logo-normal">
                    <img src="<?= base_url()?>assets/img/logo.svg" alt="Logo">
                    <img src="<?= base_url()?>assets/img/white-logo.svg" class="white-logo" alt="Logo">
                </a>
				<a href="" class="logo-small">
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
					<!-- /Search -->

					<!-- Horizontal Single -->
					<!-- <li>
						<div class="sidebar sidebar-horizontal" id="horizontal-single">
							<div class="sidebar-menu">
								<div class="main-menu">
									<ul class="nav-menu">
										<li class="menu-title">
											<span>Main</span>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);" class="active">
												<i class="ti ti-layout-2"></i><span>Dashboard</span><span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="">Deals Dashboard</a></li>
												<li><a href="leads-dashboard.html">Leads Dashboard</a></li>
												<li><a href="project-dashboard.html">Project Dashboard</a></li>
												<li class="submenu" aria-colcount="active">
													<a href="#">
														<i class="ti ti-user-star"></i><span>Super Admin</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="dashboard.html" class="active">Dashboard</a></li>
														<li><a href="company.html">Companies</a></li>
														<li><a href="subscription.html">Subscriptions</a></li>
														<li><a href="packages.html">Packages</a></li>
														<li><a href="domain.html">Domain</a></li>
														<li><a href="purchase-transaction.html">Purchase Transaction</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);"><i class="ti ti-brand-airtable"></i><span>Application</span>
												<span class="menu-arrow"></span></a>
											<ul>
												<li><a href="chat.html">Chat</a></li>
												<li class="submenu submenu-two">
													<a href="javascript:void(0);">Call<span class="menu-arrow inside-submenu"></span></a>
													<ul>
														<li><a href="video-call.html">Video Call</a></li>
														<li><a href="audio-call.html">Audio Call</a></li>
														<li><a href="call-history.html">Call History</a></li>
													</ul>
												</li>
												<li><a href="calendar.html">Calendar</a></li>
												<li><a href="email.html">Email</a></li>
												<li><a href="todo.html">To Do</a></li>
												<li><a href="notes.html">Notes</a></li>
												<li><a href="file-manager.html">File Manager</a></li>
												<li><a href="social-feed.html">Social Feed</a></li>
												<li><a href="kanban-view.html">Kanban</a></li>
												<li><a href="invoice.html">Invoices</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="javascript:void(0);">
												<i class="ti ti-layout-2"></i><span>layouts</span><span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="layout-mini.html">Mini</a></li>
												<li><a href="layout-horizontal-single.html">Horizontal Single</a></li>
												<li><a href="layout-without-header.html">Without Header</a></li>
												<li><a href="layout-rtl.html">RTL</a></li>
												<li><a href="layout-detached.html">Detached</a></li>
												<li><a href="layout-dark.html">Dark</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-ti ti-user-up"></i><span>Crm</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="contacts.html"><span>Contacts</span></a>
												</li>
												<li>
													<a href="companies.html"><span>Companies</span></a>
												</li>
												<li>
													<a href="deals.html"><span>Deals</span></a>
												</li>
												<li>
													<a href="leads.html"><span>Leads</span></a>
												</li>
												<li>
													<a href="pipeline.html"><span>Pipeline</span></a>
												</li>
												<li>
													<a href="campaign.html"><span>Campaign</span></a>
												</li>
												<li>
													<a href="projects.html"><span>Projects</span></a>
												</li>
												<li>
													<a href="tasks.html"><span>Tasks</span></a>
												</li>
												<li>
													<a href="proposals.html"><span>Proposals</span></a>
												</li>
												<li>
													<a href="contracts.html"><span>Contracts</span></a>
												</li>
												<li>
													<a href="estimations.html"><span>Estimations</span></a>
												</li>
												<li>
													<a href="invoices.html"><span>Invoices</span></a>
												</li>
												<li>
													<a href="payments.html"><span>Payments</span></a>
												</li>
												<li>
													<a href="analytics.html"><span>Analytics</span></a>
												</li>
												<li>
													<a href="activities.html"><span>Activities</span></a>
												</li>
												<li class="submenu">
													<a href="#">
														<span>Crm Settings</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="sources.html"><span>Sources</span></a></li>
														<li><a href="lost-reason.html"><span>Lost Reason</span></a></li>
														<li><a href="contact-stage.html"><span>Contact Stage</span></a></li>
														<li><a href="industry.html"><span>Industry</span></a></li>
														<li><a href="calls.html"><span>Calls</span></a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-file-invoice"></i><span>Reports</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="lead-reports.html">Lead Reports</a></li>
												<li><a href="deal-reports.html">Deal Reports</a></li>
												<li><a href="contact-reports.html">Contact Reports</a></li>
												<li><a href="company-reports.html">Company Reports</a></li>
												<li><a href="project-reports.html">Project Reports</a></li>
												<li><a href="task-reports.html">Task Reports</a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-page-break"></i><span>Pages</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="manage-users.html"><span>Manage Users</span></a></li>
												<li><a href="roles-permissions.html"><span>Roles & Permissions</span></a></li>
												<li><a href="delete-request.html"><span>Delete Request</span></a></li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Membership</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="membership-plans.html">Membership Plans</a></li>
														<li><a href="membership-addons.html">Membership Addons</a></li>
														<li><a href="membership-transactions.html">Transactions</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Location</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="countries.html">Countries</a></li>
														<li><a href="states.html">States</a></li>
														<li><a href="cities.html">Cities</a></li>
													</ul>
												</li>
												<li><a href="testimonials.html"><span>Testimonials</span></a></li>
												<li><a href="faq.html"><span>FAQ</span></a></li>
												<li><a href="contact-messages.html"><span>Contact Messages</span></a></li>
												<li><a href="tickets.html"><span>Tickets</span></a></li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Authentication</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="login.html">Login</a></li>
														<li><a href="register.html">Register</a></li>
														<li><a href="forgot-password.html">Forgot Password</a></li>
														<li><a href="reset-password.html">Reset Password</a></li>
														<li><a href="email-verification.html">Email Verification</a></li>
														<li><a href="two-step-verification.html">2 Step Verification</a></li>
														<li><a href="lock-screen.html">Lock Screen</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Error Pages</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="error-404.html">404 Error</a></li>
														<li><a href="error-500.html">500 Error</a></li>
													</ul>
												</li>
												<li><a href="blank-page.html"><span>Blank Page</span></a></li>
												<li><a href="coming-soon.html"><span>Coming Soon</span></a></li>
												<li><a href="under-maintenance.html"><span>Under Maintenance</span></a></li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Base UI</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="ui-alerts.html">Alerts</a></li>
														<li><a href="ui-accordion.html">Accordion</a></li>
														<li><a href="ui-avatar.html">Avatar</a></li>
														<li><a href="ui-badges.html">Badges</a></li>
														<li><a href="ui-borders.html">Border</a></li>
														<li><a href="ui-buttons.html">Buttons</a></li>
														<li><a href="ui-buttons-group.html">Button Group</a></li>
														<li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
														<li><a href="ui-cards.html">Card</a></li>
														<li><a href="ui-carousel.html">Carousel</a></li>
														<li><a href="ui-colors.html">Colors</a></li>
														<li><a href="ui-dropdowns.html">Dropdowns</a></li>
														<li><a href="ui-grid.html">Grid</a></li>
														<li><a href="ui-images.html">Images</a></li>
														<li><a href="ui-lightbox.html">Lightbox</a></li>
														<li><a href="ui-media.html">Media</a></li>
														<li><a href="ui-modals.html">Modals</a></li>
														<li><a href="ui-offcanvas.html">Offcanvas</a></li>
														<li><a href="ui-pagination.html">Pagination</a></li>
														<li><a href="ui-popovers.html">Popovers</a></li>
														<li><a href="ui-progress.html">Progress</a></li>
														<li><a href="ui-placeholders.html">Placeholders</a></li>
														<li><a href="ui-rangeslider.html">Range Slider</a></li>
														<li><a href="ui-spinner.html">Spinner</a></li>
														<li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
														<li><a href="ui-nav-tabs.html">Tabs</a></li>
														<li><a href="ui-toasts.html">Toasts</a></li>
														<li><a href="ui-tooltips.html">Tooltips</a></li>
														<li><a href="ui-typography.html">Typography</a></li>
														<li><a href="ui-video.html">Video</a></li>
														<li><a href="ui-sortable.html">Sortable</a></li>
														<li><a href="ui-swiperjs.html">Swiperjs</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Advanced UI</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="ui-ribbon.html">Ribbon</a></li>
														<li><a href="ui-clipboard.html">Clipboard</a></li>
														<li><a href="ui-drag-drop.html">Drag & Drop</a></li>
														<li><a href="ui-rangeslider.html">Range Slider</a></li>
														<li><a href="ui-rating.html">Rating</a></li>
														<li><a href="ui-text-editor.html">Text Editor</a></li>
														<li><a href="ui-counter.html">Counter</a></li>
														<li><a href="ui-scrollbar.html">Scrollbar</a></li>
														<li><a href="ui-stickynote.html">Sticky Note</a></li>
														<li><a href="ui-timeline.html">Timeline</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Charts</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="chart-apex.html">Apex Charts</a></li>
														<li><a href="chart-c3.html">Chart C3</a></li>
														<li><a href="chart-js.html">Chart Js</a></li>
														<li><a href="chart-morris.html">Morris Charts</a></li>
														<li><a href="chart-flot.html">Flot Charts</a></li>
														<li><a href="chart-peity.html">Peity Charts</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Icons</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
														<li><a href="icon-feather.html">Feather Icons</a></li>
														<li><a href="icon-ionic.html">Ionic Icons</a></li>
														<li><a href="icon-material.html">Material Icons</a></li>
														<li><a href="icon-pe7.html">Pe7 Icons</a></li>
														<li><a href="icon-simpleline.html">Simpleline Icons</a></li>
														<li><a href="icon-themify.html">Themify Icons</a></li>
														<li><a href="icon-weather.html">Weather Icons</a></li>
														<li><a href="icon-typicon.html">Typicon Icons</a></li>
														<li><a href="icon-flag.html">Flag Icons</a></li>
														<li><a href="icon-tabler.html">Tabler Icons</a></li>
														<li><a href="icon-bootstrap.html">Bootstrap Icons</a></li>
														<li><a href="icon-remix.html">Remix Icons</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Forms</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu submenu-two">
															<a href="javascript:void(0);">Form Elements<span class="menu-arrow inside-submenu"></span></a>
															<ul>
																<li><a href="form-basic-inputs.html">Basic Inputs</a></li>
																<li><a href="form-checkbox-radios.html">Checkbox & Radios</a></li>
																<li><a href="form-input-groups.html">Input Groups</a></li>
																<li><a href="form-grid-gutters.html">Grid & Gutters</a></li>
																<li><a href="form-select.html">Form Select</a></li>
																<li><a href="form-mask.html">Input Masks</a></li>
																<li><a href="form-fileupload.html">File Uploads</a></li>
															</ul>
														</li>
														<li class="submenu submenu-two">
															<a href="javascript:void(0);">Layouts<span
																	class="menu-arrow inside-submenu"></span></a>
															<ul>
																<li><a href="form-horizontal.html">Horizontal Form</a></li>
																<li><a href="form-vertical.html">Vertical Form</a></li>
																<li><a href="form-floating-labels.html">Floating Labels</a></li>
															</ul>
														</li>
														<li><a href="form-validation.html">Form Validation</a></li>
														<li><a href="form-select2.html">Select2</a></li>
														<li><a href="form-wizard.html">Form Wizard</a></li>
														<li><a href="form-pickers.html">Form Picker</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Tables</span><span class="menu-arrow"></span></a>
													<ul>
														<li><a href="tables-basic.html">Basic Tables </a></li>
														<li><a href="data-tables.html">Data Table </a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Maps</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li>
															<a href="maps-vector.html">Vector</a>
														</li>
														<li>
															<a href="maps-leaflet.html">Leaflet</a>
														</li>
													</ul>
												</li>
												<li><a href="javascript:void(0);"><span>Documentation</span></a></li>
												<li><a href="javascript:void(0);"><span>Changelog v2.2.2</span></a></li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Multi Level</span><span class="menu-arrow"></span></a>
													<ul>
													<li><a href="javascript:void(0);">Level 1.1</a></li>
													<li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span class="menu-arrow inside-submenu"></span></a>
													<ul>
														<li><a href="javascript:void(0);">Level 2.1</a></li>
														<li class="submenu submenu-two submenu-three"><a href="javascript:void(0);">Level 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
															<ul>
																<li><a href="javascript:void(0);">Level 3.1</a></li>
																<li><a href="javascript:void(0);">Level 3.2</a></li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-settings-cog"></i><span>Settings</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li class="submenu">
													<a href="javascript:void(0);"><span>General Settings</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="profile.html">Profile</a></li>
														<li><a href="security.html">Security</a></li>
														<li><a href="notifications.html">Notifications</a></li>
														<li><a href="connected-apps.html">Connected Apps</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Website Settings</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="company-settings.html">Company Settings</a></li>
														<li><a href="localization.html">Localization</a></li>
														<li><a href="prefixes.html">Prefixes</a></li>
														<li><a href="preference.html">Preference</a></li>
														<li><a href="appearance.html">Appearance</a></li>
														<li><a href="language.html">Language</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>App Settings</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="invoice-settings.html">Invoice Settings</a></li>
														<li><a href="printers.html">Printers</a></li>
														<li><a href="custom-fields.html">Custom Fields</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>System Settings</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="email-settings.html">Email Settings</a></li>
														<li><a href="sms-gateways.html">SMS Gateways</a></li>
														<li><a href="gdpr-cookies.html">GDPR Cookies</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Financial Settings</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="payment-gateways.html">Payment Gateways</a></li>
														<li><a href="bank-accounts.html">Bank Accounts</a></li>
														<li><a href="tax-rates.html">Tax Rates</a></li>
														<li><a href="currencies.html">Currencies</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);">
														<span>Other Settings</span><span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="storage.html">Storage</a></li>
														<li><a href="ban-ip-address.html">Ban IP Address</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</li> -->
					<!-- /Horizontal Single -->

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
							<!-- <li class="nav-item dropdown">
								<a href="javascript:void(0);" class="btn btn-header-list" data-bs-toggle="dropdown">
									<i class="ti ti-layout-grid-add"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end menus-info">
									<div class="row">
										<div class="col-md-6">
											<ul class="menu-list">
												<li>
													<a href="contacts.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-violet">
																<i class="ti ti-user-up"></i>
															</span>
															<div class="menu-details-content">
																<p>Contacts</p>
																<span>Add New Contact</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="pipeline.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-green">
																<i class="ti ti-timeline-event-exclamation"></i>
															</span>
															<div class="menu-details-content">
																<p>Pipline</p>
																<span>Add New Pipline</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="activities.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-pink">
																<i class="ti ti-bounce-right"></i>
															</span>
															<div class="menu-details-content">
																<p>Activities</p>
																<span>Add New Activity</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="analytics.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-info">
																<i class="ti ti-analyze"></i>
															</span>
															<div class="menu-details-content">
																<p>Analytics</p>
																<span>Shows All Information</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="projects.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-danger">
																<i class="ti ti-atom-2"></i>
															</span>
															<div class="menu-details-content">
																<p>Projects</p>
																<span>Add New Project</span>
															</div>
														</div>
													</a>
												</li>
											</ul>
										</div>
										<div class="col-md-6">
											<ul class="menu-list">
												<li>
													<a href="deals.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-info">
																<i class="ti ti-medal"></i>
															</span>
															<div class="menu-details-content">
																<p>Deals</p>
																<span>Add New Deals</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="leads.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-secondary">
																<i class="ti ti-chart-arcs"></i>
															</span>
															<div class="menu-details-content">
																<p>Leads</p>
																<span>Add New Leads</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="companies.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-tertiary">
																<i class="ti ti-building-community"></i>
															</span>
															<div class="menu-details-content">
																<p>Company</p>
																<span>Add New Company</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="tasks.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-success">
																<i class="ti ti-list-check"></i>
															</span>
															<div class="menu-details-content">
																<p>Tasks</p>
																<span>Add New Task</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="campaign.html">
														<div class="menu-details">
															<span class="menu-list-icon bg-purple">
																<i class="ti ti-brand-campaignmonitor"></i>
															</span>
															<div class="menu-details-content">
																<p>Campaign</p>
																<span>Add New Campaign</span>
															</div>
														</div>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</li> -->
							
						</ul>
					</li>
					<!-- /Nav List -->
					
			
					<!-- Profile Dropdown -->
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="javascript:void(0);" class="nav-link userset" data-bs-toggle="dropdown">
							<span class="user-info">
								<span class="user-letter">
									<img src="<?= base_url()?>uploads/institution/<?= $user[0]['logo']?>" alt="Profile" style="height: 36px;">
								
								</span>
								<span class="badge badge-success rounded-pill"></span>
							</span>
						</a>
						<div class="dropdown-menu menu-drop-user">
							<div class="profilename">
								<a class="dropdown-item" href="<?= base_url()?>">
									<i class="ti ti-layout-2"></i> Dashboard
								</a>
								<a class="dropdown-item" href="<?= base_url('Admin_Dashboard/profile/'.encryptId($user[0]['id']))?>">
									<i class="ti ti-user-pin"></i> My Profile
								</a>
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
					<a class="dropdown-item" href="index-2.">
						<i class="ti ti-layout-2"></i> Dashboard
					</a>
					<a class="dropdown-item" href="profile.html">
						<i class="ti ti-user-pin"></i> My Profile
					</a>
					<a class="dropdown-item" href="login.html">
						<i class="ti ti-lock"></i> Logout
					</a>
				</div>
			</div>
			<!-- /Mobile Menu -->

		</div>
		<!-- /Header -->