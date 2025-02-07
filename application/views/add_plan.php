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
                            <h5 class="fw-semibold">Add New Plan</h5>

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
                                                Plan Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="basic" data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Plan Name <span
                                                            class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="plan_name" value="<?= ($tag == 'edit' && isset($plan[0]['plan_name'])) ? htmlspecialchars($plan[0]['plan_name']) : '' ?>" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Number Of Days <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" name="numbers_of_days" value="<?= ($tag == 'edit' && isset($plan[0]['numbers_of_days'])) ? htmlspecialchars($plan[0]['numbers_of_days']) : '' ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Price</label>
                                                            <input type="number" class="form-control" name="price" value="<?= ($tag == 'edit' && isset($plan[0]['price'])) ? htmlspecialchars($plan[0]['price']) : '' ?>">
                                                        </div>
                                                    </div>
                                                   

                                  
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Basic Info -->

                                <div class="d-flex align-items-center justify-content-end">

                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#create_success">Create Plan</button>
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
    const today = new Date().toISOString().split('T')[0];

    // Set the 'min' attribute of the date input field to today's date
    document.getElementById('nextFollowUpDate').setAttribute('min', today);

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
