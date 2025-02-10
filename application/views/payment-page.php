<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h3>Pay for <?= $plan['name'] ?></h3>
    <p>Amount: ₹<?= $plan['price'] ?></p>

    <button id="pay-btn">Pay Now</button>

    <script>
        var options = {
            "key": "<?= $razorpay_key ?>",
            "amount": "<?= $plan['price'] * 100 ?>",
            "currency": "INR",
            "name": "Your Company",
            "description": "Payment for <?= $plan['name'] ?>",
            "order_id": "<?= $order_id ?>",
            "handler": function (response) {
                window.location.href = "<?= base_url('Admin/process_payment?payment_id=') ?>" + response.razorpay_payment_id;
            },
            "theme": { "color": "#3399cc" }
        };

        var rzp = new Razorpay(options);
        document.getElementById('pay-btn').onclick = function () {
            rzp.open();
        };
    </script>
</body>
</html>
