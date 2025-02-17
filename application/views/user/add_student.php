<!DOCTYPE html>
<html lang="en">


<head>

    <?php include('includes2/header-links.php') ?>

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <?php include('includes2/header.php') ?>
        <?php include('includes2/sidebar.php') ?>

        <div class="page-wrapper">
            <div class="content">

                <div class="row  mb-3">
                    <div class="col-md-12">
                        <div class="offcanvas-header mb-3">
                            <h5 class="fw-semibold"><?= $title?></h5>

                        </div>
                        <div class="offcanvas-body">
                            <form
                                action="<?= ($tag == 'edit' && isset($Student[0]['id'])) ? base_url('Admin_Dashboard/update_student/' . encryptId($Student[0]['id']) . '/' . encryptId($user[0]['id'])) : base_url('Admin_Dashboard/add_student/' . encryptId($user[0]['id'])) ?>"
                                method="Post">
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
                                        <div class="accordion-collapse collapse show" id="basic"
                                            data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Student Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['name'])) ? htmlspecialchars($Student[0]['name']) : '' ?>"
                                                                required>
                                                            <input type="hidden" class="form-control" name="inst_id"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['inst_id'])) ? htmlspecialchars($Student[0]['inst_id']) : $user[0]['id'] ?>"
                                                                required>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Contact <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="phone"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['phone'])) ? htmlspecialchars($Student[0]['phone']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Alternate Contact</label>
                                                            <input type="text" class="form-control" name="alt_phone"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['alt_phone'])) ? htmlspecialchars($Student[0]['alt_phone']) : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" name="email"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['email'])) ? htmlspecialchars($Student[0]['email']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Gender <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="select2 form-control" name="gender" required>
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($Student[0]['gender']) && $Student[0]['gender'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <option value="Male" <?= ($tag == 'edit' && isset($Student[0]['gender']) && $Student[0]['gender'] == 'Male') ? 'selected' : '' ?>
                                                                    data-display="Please select">Male</option>
                                                                <option value="Female" <?= ($tag == 'edit' && isset($Student[0]['gender']) && $Student[0]['gender'] == 'Female') ? 'selected' : '' ?> data-display="Please select">Female</option>
                                                                <option value="Other" <?= ($tag == 'edit' && isset($Student[0]['gender']) && $Student[0]['gender'] == 'Other') ? 'selected' : '' ?>
                                                                    data-display="Please select">Other</option>


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Date of Birth<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="dob"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['dob'])) ? htmlspecialchars($Student[0]['dob']) : date('Y-m-d') ?>"
                                                                required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Batch <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="select2 form-control" name="batch_id"
                                                                required>
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($Student[0]['batch_id']) && $Student[0]['batch_id'] == 'N/A') ? 'selected' : '' ?>
                                                                    data-display="Please select">Choose</option>
                                                                <?php if (!empty($batch)): ?>
                                                                    <?php foreach ($batch as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($Student[0]['batch_id']) && $Student[0]['batch_id'] == $item['id']) ? 'selected' : '' ?> data-display="Please select">
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Joining Date <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="join_date"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['date'])) ? htmlspecialchars($Student[0]['date']) : date('Y-m-d') ?>"
                                                                required>

                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Basic Info -->
                                    <div class="accordion-item border-top rounded mb-3">
                                        <div class="accordion-header">
                                            <a href="#"
                                                class="accordion-button accordion-custom-button rounded bg-white fw-medium text-dark"
                                                data-bs-toggle="collapse" data-bs-target="#parent">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-map-pin-cog fs-20"></i></span>
                                                Parents Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="parent"
                                            data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Father Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="f_name"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['f_name'])) ? htmlspecialchars($Student[0]['f_name']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Mother Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="m_name"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['m_name'])) ? htmlspecialchars($Student[0]['m_name']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Contact <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="parents_phone"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['phone'])) ? htmlspecialchars($Student[0]['phone']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email" class="form-control"
                                                                name="parents_email"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['email'])) ? htmlspecialchars($Student[0]['email']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
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
                                        <div class="accordion-collapse collapse show" id="address"
                                            data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Street Address <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="address"
                                                                id="streetAddress"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['address'])) ? htmlspecialchars($Student[0]['address']) : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-0">
                                                            <label class="col-form-label">Pincode <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="pincode"
                                                                id="pincode"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['pincode'])) ? htmlspecialchars($Student[0]['pincode']) : '' ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3 mb-md-0">
                                                            <label class="col-form-label">City</label>
                                                            <input type="text" class="form-control" name="city"
                                                                id="city"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['city'])) ? htmlspecialchars($Student[0]['city']) : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">State</label>
                                                            <input type="text" class="form-control" name="state"
                                                                id="state"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['state'])) ? htmlspecialchars($Student[0]['state']) : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Country</label>
                                                            <input type="text" class="form-control" name="country"
                                                                id="country"
                                                                value="<?= ($tag == 'edit' && isset($Student[0]['country'])) ? htmlspecialchars($Student[0]['country']) : '' ?>">
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
                                                data-bs-toggle="collapse" data-bs-target="#course">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-map-pin-cog fs-20"></i></span>
                                                Course Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="course"
                                            data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Course <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="select2 form-control" name="course_id"
                                                                required>
                                                                <option value="N/A" <?= ($tag == 'edit' && isset($Student[0]['course_id']) && $Student[0]['course_id'] == 'N/A') ? 'selected' : '' ?> data-display="Please select">Choose</option>
                                                                <?php if (!empty($course)): ?>
                                                                    <?php foreach ($course as $item): ?>

                                                                        <option value="<?= $item['id'] ?>" <?= ($tag == 'edit' && isset($Student[0]['course_id']) && $Student[0]['course_id'] == $item['id']) ? 'selected' : '' ?> data-display="Please select">
                                                                            <?= $item['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Fees <span
                                                                    class="text-danger">*</span></label>
<?php if ($tag=='edit'){ ?>

    <?php if (!empty($fees)): ?>
    <?php
    // Fetch student fees **before** the loop to avoid multiple queries
    $Student_fees = $this->CommonModal->getRowById('student_fees', 'student_id', $Student[0]['id']);

    // Convert fees_type to an array if multiple entries exist, otherwise set as empty array
    $selected_fees = !empty($Student_fees) ? array_column($Student_fees, 'fees_type') : [];
    ?>

    <?php foreach ($fees as $item): ?>
        <div class="form-check">
            <?php if (!empty($selected_fees) && in_array($item['id'], $selected_fees)): ?>
                <!-- Agar fee already selected hai, toh sirf remove button dikhao -->
                <input class="form-check-input fee-checkbox" readonly 
                type="hidden" value="<?= $item['id'] ?>"
                id="flexCheck<?= $item['id'] ?>" 
                <?= ($tag == 'edit' && in_array($item['id'], $selected_fees)) ? 'checked' : '' ?>>
                <label class="form-check-label" >
                    <?= $item['name'] ?>
                </label>
                <a href="<?= base_url('Admin_Dashboard/remove_student_fee/' . encryptId($item['id']) . '/' . encryptId($Student[0]['id'])) ?>" 
                    type="button" class="btn btn-danger remove-fee" 
                    style="padding:0px; margin-left:10px;">X</a>
            <?php else: ?>
                <!-- Agar student fees empty hai ya fee selected nahi hai, toh checkbox dikhao -->
                <input class="form-check-input fee-checkbox" name="fees_type[]" 
                    type="checkbox" value="<?= $item['id'] ?>" 
                    id="flexCheck<?= $item['id'] ?>">
                
                <label class="form-check-label" for="flexCheck<?= $item['id'] ?>">
                    <?= $item['name'] ?>
                </label>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


<?php } else{ ?>
    <?php if (!empty($fees)) : ?>
                <?php foreach ($fees as $item) : ?>
           <div class="form-check">
									<input class="form-check-input" name="fees_type[]" type="checkbox" value="<?= $item['id'] ?>" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
                                    <?= $item['name'] ?>
									</label>
								</div>
                                <?php endforeach; ?>
                                                               <?php endif;?>
<?php } ?>



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
                                                data-bs-toggle="collapse" data-bs-target="#course">
                                                <span class="avatar avatar-md rounded text-dark border me-2"><i
                                                        class="ti ti-map-pin-cog fs-20"></i></span>
                                                Payment Info
                                            </a>
                                        </div>
                                        <div class="accordion-collapse collapse show" id="course"
                                            data-bs-parent="#main_accordion">
                                            <div class="accordion-body border-top">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Total Fees (Course Fees +
                                                                Other Fees)<span class="text-danger"> *</span></label>
                                                            <input type="number" class="form-control" name="total"
                                                                id="total" value="0" required>
                                                        </div>
                                                    </div>
                                                    <?php $Student_payment = $this->CommonModal->getRowByIdOrderByLimit('fees_payment', 'student_id', $Student[0]['id'], 'inst_id', $user[0]['id'], 'id', 'ASC', '1'); ?>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <label class="col-form-label">Payment Mode</label>

                                                            </div>
                                                            <select class="select" name="mode" id="paymentType" required
                                                                onchange="handlePaymentChange()">
                                                                <option Value="N/A">Choose</option>
                                                                <option Value="Cash" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'Cash') ? 'selected' : '' ?>>Cash</option>
                                                                <option value="UPI" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'UPI') ? 'selected' : '' ?>>UPI</option>
                                                                <option value="Card" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'Card') ? 'selected' : '' ?>>Created/Debit Card</option>

                                                                <option value="Bank" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'Bank') ? 'selected' : '' ?>>Bank</option>
                                                                <option value="Cheque" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'Cheque') ? 'selected' : '' ?>>Cheque</option>
                                                                <option value="None" <?= ($tag == 'edit' && isset($Student_payment[0]['mode']) && $Student_payment[0]['mode'] == 'None') ? 'selected' : '' ?>>None</option>


                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4 d-none" id="bankDetails">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Bank Name<span
                                                                    class="text-danger"> *</span></label>
                                                            <select class="form-control" name="account_id"
                                                                id="bankName">
                                                                <option>Choose</option>

                                                                <?php


                                                                foreach ($account as $account_info) { ?>
                                                                    <option value="<?= $account_info['id'] ?>"
                                                                        <?= ($tag == 'edit' && isset($Student_payment[0]['account_id']) && $Student_payment[0]['account_id'] == $account_info['id']) ? 'selected' : '' ?>>
                                                                        <?= $account_info['bank_name'] ?>-<?= $account_info['account_no'] ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4 d-none" id="chequeDetails">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Cheque Number<span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="text" class="form-control" name="cheque_no"
                                                                id="chequeNumber"
                                                                value="<?= $Student_payment[0]['cheque_no'] ?>">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="col-form-label">paid Amount<span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="number" class="form-control" name="paid"
                                                                id="paid" value="<?= $Student_payment[0]['paid'] ?>"
                                                                required oninput="validatePaidAmount()">
                                                            <input type="hidden" name="p_id"
                                                                value="<?= $Student_payment[0]['id'] ?>">
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
    <script>
        function handlePaymentChange() {
            var paymentType = document.getElementById("paymentType").value;
            var paidAmount = document.getElementById("paid");
            var bankDetails = document.getElementById("bankDetails");
            var chequeDetails = document.getElementById("chequeDetails");
            var bankName = document.getElementById("bankName");
            var chequeNumber = document.getElementById("chequeNumber");

            // Hide all optional fields initially
            bankDetails.classList.add("d-none");
            chequeDetails.classList.add("d-none");
            bankName.removeAttribute("required");
            chequeNumber.removeAttribute("required");

            if (paymentType === "Bank") {
                bankDetails.classList.remove("d-none");
                bankName.setAttribute("required", "true");
            } else if (paymentType === "Cheque") {
                chequeDetails.classList.remove("d-none");
                chequeNumber.setAttribute("required", "true");
            } else if (paymentType === "None") {
                paidAmount.value = 0;
            }
        }

        function validatePaidAmount() {
            var paidAmount = parseFloat(document.getElementById("paid").value) || 0;
            var totalAmount = parseFloat(document.getElementById("finalTotalInput").value) || 0; // Get actual final total

            if (paidAmount > totalAmount) {
                alert("Paid Amount cannot be greater than the Total Amount (₹" + totalAmount.toFixed(2) + ")");
                document.getElementById("paid").value = totalAmount;
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const courseSelect = document.querySelector('select[name="course_id"]');
            const feeCheckboxes = document.querySelectorAll('.form-check-input');
            const totalFeesInput = document.querySelector('input[name="total"]');

            // Sample data (Replace this with actual data from PHP)
            // Fetch course fees from the database and convert them into a JavaScript object
            const courseFees = <?= json_encode(array_column($course, 'fees', 'id')); ?>;

            // Fetch additional fees from the database and convert them into a JavaScript object
            const feeAmounts = <?= json_encode(array_column($fees, 'amount', 'id')); ?>;
            function calculateTotal() {
                let total = 0;

                // Get selected course fee
                const selectedCourse = courseSelect.value;
                if (courseFees[selectedCourse]) {
                    total += parseFloat(courseFees[selectedCourse]); // Convert to number
                }

                // Get selected additional fees
                feeCheckboxes.forEach(checkbox => {
                    if (checkbox.checked && feeAmounts[checkbox.value]) {
                        total += parseFloat(feeAmounts[checkbox.value]); // Convert to number
                    }
                });

                // Ensure total is updated correctly
                totalFeesInput.value = total.toFixed(2); // Show as two decimal places
            }

            // Event Listeners
            courseSelect.addEventListener("change", calculateTotal);
            feeCheckboxes.forEach(checkbox => {
                checkbox.addEventListener("change", calculateTotal);
            });

            // Initial Calculation on page load (if any selection exists)
            calculateTotal();
        });
    </script>
    <script>
        function handlePaymentChange() {
            var paymentType = document.getElementById("paymentType").value;
            var bankDetails = document.getElementById("bankDetails");
            var chequeDetails = document.getElementById("chequeDetails");
            var bankName = document.getElementById("bankName");
            var chequeNumber = document.getElementById("chequeNumber");

            // Hide all optional fields initially
            bankDetails.classList.add("d-none");
            chequeDetails.classList.add("d-none");
            bankName.removeAttribute("required");
            chequeNumber.removeAttribute("required");

            if (paymentType === "Bank") {
                bankDetails.classList.remove("d-none");
                bankName.setAttribute("required", "true");
            } else if (paymentType === "Cheque") {
                chequeDetails.classList.remove("d-none");
                chequeNumber.setAttribute("required", "true");
            }
        }

        // Run this function on page load to set the correct fields
        window.onload = function () {
            handlePaymentChange();
        };

        function validatePaidAmount() {
            var paidAmount = parseFloat(document.getElementById("paid").value) || 0;
            var totalAmount = parseFloat(document.getElementById("finalTotalInput").value) || 0; // Get actual final total

            if (paidAmount > totalAmount) {
                alert("Paid Amount cannot be greater than the Total Amount (₹" + totalAmount.toFixed(2) + ")");
                document.getElementById("paid").value = totalAmount;
            }
        }
    </script>
    <?php include('includes2/footer.php') ?>
    <?php include('includes2/footer-links.php') ?>

</body>

</html>