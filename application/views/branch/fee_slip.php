<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-4 border p-4 shadow" style="max-width: 800px; font-family: 'Segoe UI', sans-serif; background: #fff;">
    <div class="text-center mb-4">
        <img src="<?= base_url()?>uploads/institution/<?= $clg[0]['logo']?>" alt="Institute Logo" style="max-height: 70px;"><br>
        <h4 class="fw-bold mb-1"><?= $clg[0]['name'] ?></h4>
        <p class="mb-0"><?= $clg[0]['address'] ?></p>
        <h5 class="mt-3 border-bottom pb-2">FEE PAYMENT RECEIPT</h5>
    </div>

    <!-- Student & Receipt Info -->
    <div class="mb-4">
        <table class="table table-borderless small">
            <tbody>
                <tr>
                    <td><strong>Name:</strong> <?= $user['name'] ?></td>
                    <td><strong>Enrollment No:</strong> <?= $user['roll_no'] ?></td>
                </tr>
                <tr>
                    <td><strong>Course:</strong> <?= $course[0]['name'] ?></td>
                    <td><strong>Date:</strong> <?= date('d-m-Y', strtotime($payment_detail['date'])) ?></td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Transaction ID:</strong> <?= $payment_detail['transaction_id'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Fees Breakdown -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th style="width: 10%">S.No</th>
                <th>Particulars</th>
                <th class="text-end">Amount (₹)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><?= $course[0]['name'] ?></td>
                <td class="text-end"><?= number_format($course[0]['fees'], 2) ?></td>
            </tr>
            <?php
            $i = 2;
            foreach ($fees_type as $frow):
                $fees = $this->CommonModal->getRowById('fees', 'id', $frow['fees_type']);
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $fees[0]['name'] ?></td>
                    <td class="text-end"><?= number_format($fees[0]['amount'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
           
        </tbody>
        
    </table>
<?php
    // Fetch total previous payments
    $total_prev_paid = $this->CommonModal->getRowByIdSum('fees_payment', 'student_id', $payment_detail['student_id'], 'inst_id', $payment_detail['inst_id'], 'paid')[0]['total_sum'] - $payment_detail['paid'];

    $this_paid = $payment_detail['paid'];
    $total_paid = $total_prev_paid + $this_paid;
    $due = $payment_detail['due'];
?>

<!-- Fee Summary Section -->
<div class="mt-3">
    <div class="d-flex justify-content-between border-top pt-2">
        <span class="fw-bold">Previously Paid</span>
        <span>₹ <?= number_format($total_prev_paid, 2) ?></span>
    </div>
    <div class="d-flex justify-content-between">
        <span class="fw-bold">This Payment</span>
        <span>₹ <?= number_format($this_paid, 2) ?></span>
    </div>
    <div class="d-flex justify-content-between">
        <span class="fw-bold text-success">Total Paid</span>
        <span class="text-success fw-bold">₹ <?= number_format($total_paid, 2) ?></span>
    </div>
    <div class="d-flex justify-content-between">
        <span class="fw-bold text-danger">Remaining Due</span>
        <span class="text-danger fw-bold">₹ <?= number_format($due, 2) ?></span>
    </div>
</div>

    <!-- Mode of Payment -->
    <div class="mt-3">
        <p><strong>Payment Mode:</strong> <?= $payment_detail['mode'] ?></p>
        <?php if ($payment_detail['mode'] === 'Bank' && !empty($payment_detail['account_id'])):
            $bank = $this->CommonModal->getRowById('account', 'id', $payment_detail['account_id']);
        ?>
            <p><strong>Bank Name:</strong> <?= $bank[0]['bank_name'] ?></p>
        <?php elseif ($payment_detail['mode'] === 'Cheque'): ?>
            <p><strong>Cheque No:</strong> <?= $payment_detail['cheque_no'] ?></p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <div class="mt-4 text-center small fst-italic">
        This is a system-generated receipt. No signature required.
    </div>

    <!-- Print Button -->
    <div class="text-end mt-3">
        <button onclick="window.print();" class="btn btn-primary btn-sm">Print Receipt</button>
    </div>
</div>
