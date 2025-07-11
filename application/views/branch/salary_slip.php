<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Salary Slip - <?= $salary['month'] ?></title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9f9f9;
            padding: 30px;
        }

        .slip-box {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 40px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            height: 70px;
        }

        .header h2 {
            margin: 0;
            text-align: right;
            font-size: 22px;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 2px solid #000;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 8px;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #aaa;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .footer .sign {
            width: 200px;
            border-top: 1px solid #000;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="slip-box">
     <div style="text-align: right; margin-bottom: 20px;">
    <button id="pdfDownloadBtn" onclick="downloadPDF()" style="padding: 8px 15px; background: #007bff; color: white; border: none; border-radius: 4px;">
        Download PDF
    </button>
</div>

        <div class="header">
            <div>
                <img src="<?= base_url('uploads/institution/' . $institution['logo']) ?>" alt="Institute Logo">
            </div>
            <div>
                <h2><?= $institution['name'] ?></h2>
                <small><?= $institution['address'] ?></small>
            </div>
        </div>

        <hr>

        <h3 style="text-align: center;">
            Salary Slip - <?= date("F Y", strtotime($salary['month'])) ?>
        </h3>

        <div class="section-title">Employee Details</div>
        <table>
            <tr>
                <th>Employee Name</th>
                <td><?= $employee['name'] ?></td>
                <th>Employee Code</th>
                <td><?= $employee['emp_code'] ?></td>
            </tr>
            <tr>
                <th>Department</th>
                <td><?= $employee['department_name'] ?></td>
                <th>Month</th>
                <td><?= $salary['month'] ?></td>
            </tr>
        </table>

        <div class="section-title">Salary Details</div>
        <table>
            <tr>
                <th>Basic Salary</th>
                <td class="text-right"><?= $employee['salary'] ?> Rs</td>
            </tr>
            <tr>
                <th>No. of Leaves</th>
                <td class="text-right"><?= $salary['leaves'] ?></td>
            </tr>
            <tr>
                <th>Deduction</th>
                <td class="text-right">
                    <?php
                    $less_salary = round(($employee['salary'] / 30) * $salary['leaves'], 2);
                    echo $less_salary . " Rs";
                    ?>
                </td>
            </tr>
            <tr>
                <th>Net Salary</th>
                <td class="text-right">
                    <?= round($employee['salary'] - $less_salary, 2) ?> Rs
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td class="text-right"><?= $salary['status'] ?></td>
            </tr>
        </table>

        <div class="footer">

            <div class="sign">Authorized Signatory</div>
        </div>
    </div>
  

   <!-- Add these before </body> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    async function downloadPDF() {
        const { jsPDF } = window.jspdf;

        const button = document.getElementById('pdfDownloadBtn');
        const slipBox = document.querySelector('.slip-box');

        // Hide button
        button.style.display = 'none';

        // Wait for DOM update
        await new Promise(resolve => setTimeout(resolve, 100));

        try {
            const canvas = await html2canvas(slipBox, { scale: 2 });
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jsPDF('p', 'pt', 'a4');

            const pageWidth = pdf.internal.pageSize.getWidth();
            const imgWidth = pageWidth - 40;
            const imgHeight = (canvas.height * imgWidth) / canvas.width;

            pdf.addImage(imgData, 'PNG', 20, 20, imgWidth, imgHeight);
            pdf.save('Salary-Slip-<?= date("F-Y", strtotime($salary["month"])) ?>.pdf');
        } catch (error) {
            alert("Failed to generate PDF: " + error.message);
        }

        // Show button again
        button.style.display = 'inline-block';
    }
</script>



</body>

</html>