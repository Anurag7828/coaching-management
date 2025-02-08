<!DOCTYPE html>
<html lang="en">

<head>

    <?php include('includes2/header-links.php') ?>

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

      

		<!-- Page Wrapper -->
		<div class="mt-5">
			<div class="content">

				<div class="row">
					<div class="col-md-12">

						
						
						<div class="d-block">
							
							<div class="row justify-content-center">
                            <?php if (!empty($plan)) : ?>
                                <?php $i = 1; foreach ($plan as $row) : ?>
                                    <?php if($row['price'] > '0'){ ?>
								<div class="col-lg-4 col-md-6">
									<div class="card border">
										<div class="card-body">
											<div class="text-center border-bottom pb-3 mb-3">
												<span><?= $row['plan_name']?></span>
												<h2 class="d-flex align-items-end justify-content-center mt-1"><?= $row['price']?> <span
														class="fs-14 fw-medium ms-2">/ <?= $row['numbers_of_days']?> Days</span></h2>
											</div>
											<div class="d-block">
												<div>
       <?php $plan_feature = $this->CommonModal->getRowById('plan_feature', 'plan_id', $row['id']); ?>
       <?php $i = 1; foreach ($plan_feature as $row1) : ?>
													<p class="d-flex align-items-center fs-16 fw-medium text-dark mb-2">
														<span
															class="bg-success d-flex align-items-center justify-content-center fs-12 wh-14 me-1 rounded"><i
																class="ti ti-check"></i>
														</span><?= $row1['feature']?>
													</p>
                                                    <?php endforeach; ?>
												</div>
												<div class="text-center mt-3">
													<a href="<?= base_url('Admin_Dashboard/upgrade_plan/'.encryptId($user[0]['id']).'/'.encryptId($row['id']))?>" class="btn btn-primary">Choose</a>
												</div>
											</div>
										</div>
									</div>
								</div>
                                <?php  } endforeach; ?>
       
       <?php endif; ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->
    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?></body>


</html>