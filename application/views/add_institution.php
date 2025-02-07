<!DOCTYPE html>
<html lang="en">


<head>

    <?php include('includes/header-links.php') ?>

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <?php include('includes/header.php') ?>
        <?php include('includes/sidebar.php') ?>

        <div class="page-wrapper">
            <div class="content">

                <div class="row  mb-3">
                    <div class="col-md-12">
                        <div class="offcanvas-header mb-3">
                            <h5 class="fw-semibold">Add New Institution</h5>

                        </div>
                        <div class="offcanvas-body">
                            <form action="" method="Post">
                                <div class="accordion" id="main_accordion">
                                    <!-- Basic Info -->
                                    <div class="accordion-item rounded mb-3">
                                        <div class="accordion-header">
                                            <a href="#"
                                                class="accordion-button accordion-custom-button bg-white rounded fw-medium text-dark"
                                                data-bs-toggle="collapse" data-bs-target="#basic">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-user-plus fs-20"></i></span>
                                                Basic Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="basic" data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Institution Name <span
                                                            class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name" value="<?= ($tag == 'edit' && isset($institution[0]['name'])) ? htmlspecialchars($institution[0]['name']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Contact <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="phone" value="<?= ($tag == 'edit' && isset($institution[0]['phone'])) ? htmlspecialchars($institution[0]['phone']) : '' ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Alternate Contact</label>
                                                            <input type="text" class="form-control" name="alt_phone" value="<?= ($tag == 'edit' && isset($institution[0]['alt_phone'])) ? htmlspecialchars($institution[0]['alt_phone']) : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Email <span
                                                            class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" name="email" value="<?= ($tag == 'edit' && isset($institution[0]['email'])) ? htmlspecialchars($institution[0]['email']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Plan <span class="text-danger">*</span></label>
                                                            <select class="select2 form-control" name="plan_id" required>
                                                            <option value="N/A" <?= ($tag == 'edit' && isset($institution[0]['plan_id']) && $institution[0]['plan_id'] == 'N/A') ? 'selected' : '' ?> data-display="Please select">Choose</option>
                                                            <?php if (!empty($plan)) : ?>
                                                                <?php foreach ($plan as $item) : ?>

                                                                <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($institution[0]['plan_id']) && $institution[0]['plan_id'] == $item['id']) ? 'selected' : '' ?> data-display="Please select"> <?= $item['plan_name'] ?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                             
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Start Date <span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="date" value="<?= ($tag == 'edit' && isset($institution[0]['date'])) ? htmlspecialchars($institution[0]['date']) : date('Y-m-d') ?>" required>

                                                        </div>
                                                    </div>

                                  
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Basic Info -->

                                    <!-- Address Info -->
                                    <div class="accordion-item border-top rounded mb-3">
                                        <div class="accordion-header">
                                            <a href="#"
                                                class="accordion-button accordion-custom-button rounded bg-white fw-medium text-dark"
                                                data-bs-toggle="collapse" data-bs-target="#address">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-map-pin-cog fs-20"></i></span>
                                                Address Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="address" data-bs-parent="#main_accordion">
    <div class="accordion-body border-top">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="col-form-label">Street Address <span
                    class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" id="streetAddress" value="<?= ($tag == 'edit' && isset($institution[0]['address'])) ? htmlspecialchars($institution[0]['address']) : '' ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-0">
                    <label class="col-form-label">Pincode <span
                    class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="pincode" id="pincode" value="<?= ($tag == 'edit' && isset($institution[0]['pincode'])) ? htmlspecialchars($institution[0]['pincode']) : '' ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mb-md-0">
                    <label class="col-form-label">City</label>
                    <input type="text" class="form-control" name="city" id="city" value="<?= ($tag == 'edit' && isset($institution[0]['city'])) ? htmlspecialchars($institution[0]['city']) : '' ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="col-form-label">State</label>
                    <input type="text" class="form-control" name="state" id="state" value="<?= ($tag == 'edit' && isset($institution[0]['state'])) ? htmlspecialchars($institution[0]['state']) : '' ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="col-form-label">Country</label>
                    <input type="text" class="form-control" name="country" id="country" value="<?= ($tag == 'edit' && isset($institution[0]['country'])) ? htmlspecialchars($institution[0]['country']) : '' ?>">
                </div>
            </div>
        </div>
    </div>
</div>

                                    </div>
                                    <div class="accordion-item border-top rounded mb-3">
                                        <div class="accordion-header">
                                            <a href="#"
                                                class="accordion-button accordion-custom-button rounded bg-white fw-medium text-dark"
                                                data-bs-toggle="collapse" data-bs-target="#address">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-map-pin-cog fs-20"></i></span>
                                                Contact Person
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="address" data-bs-parent="#main_accordion">
    <div class="accordion-body border-top">
        <div class="row">
            
            <div class="col-md-6">
                <div class="mb-0">
                    <label class="col-form-label">Name</label>
                    <input type="text" class="form-control" name="contact_person_name"  value="<?= ($tag == 'edit' && isset($institution[0]['contact_person_name'])) ? htmlspecialchars($institution[0]['contact_person_name']) : '' ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mb-md-0">
                    <label class="col-form-label">Contact No.</label>
                    <input type="tel" class="form-control" name="contact_person_phone"  value="<?= ($tag == 'edit' && isset($institution[0]['contact_person_phone'])) ? htmlspecialchars($institution[0]['contact_person_phone']) : '' ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="col-form-label">Email</label>
                    <input type="email" class="form-control" name="contact_person_email" value="<?= ($tag == 'edit' && isset($institution[0]['contact_person_email'])) ? htmlspecialchars($institution[0]['contact_person_email']) : '' ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="col-form-label">Designation</label>
                    <input type="text" class="form-control" name="contact_person_des" value="<?= ($tag == 'edit' && isset($institution[0]['contact_person_des'])) ? htmlspecialchars($institution[0]['contact_person_des']) : '' ?>">


                </div>
            </div>
        </div>
    </div>
</div>

                                    </div>
                                <div class="d-flex align-items-center justify-content-end">

                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#create_success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

<script>
    // Get today's date in YYYY-MM-DD format
   
    document.getElementById('pincode').addEventListener('blur', function () {
    const pincode = this.value.trim();
    
    if (pincode.length === 6) { // Validate pincode length
        // Display a loading message or spinner here if needed
        fetch(`https://api.postalpincode.in/pincode/${pincode}`) // Replace with your API URL
            .then(response => response.json())
            .then(data => {
                if (data[0].Status === 'Success') {
                    const details = data[0].PostOffice[0];
                    document.getElementById('city').value = details.District || '';
                    document.getElementById('state').value = details.State || '';
                    document.getElementById('country').value = 'India'; // Assuming India for this API
                } else {
                    alert('Invalid pincode. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error fetching pincode details:', error);
                alert('Failed to fetch pincode details. Please check your internet connection or try again later.');
            });
    } else {
        alert('Please enter a valid 6-digit pincode.');
    }
});

</script>
    <?php include('includes/footer.php') ?>
    <?php include('includes/footer-links.php') ?>

   
