

document.addEventListener("DOMContentLoaded", function () {
    // Export to PDF
    document.getElementById("exportPdf").addEventListener("click", function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Title
        doc.text(" Report", 14, 15);

        let table = document.querySelector(".datatable");
        let rows = [];
        let headers = [];

        // Extract Headers (excluding "Action" column)
        table.querySelectorAll("thead tr th").forEach((th, index) => {
            if (!th.innerText.includes("Action")) {
                headers.push(th.innerText.trim());
            }
        });

        // Extract Table Data (excluding dropdowns, modals, and "Action" column)
        table.querySelectorAll("tbody tr").forEach((row) => {
            let rowData = [];
            row.querySelectorAll("td").forEach((td, index) => {
                if (!td.closest("td").querySelector(".dropdown, .modal")) {
                    rowData.push(td.innerText.trim());
                }
            });
            rows.push(rowData);
        });

        // Generate PDF
        doc.autoTable({
            head: [headers],
            body: rows,
            startY: 20,
            theme: "grid",
            headStyles: { fillColor: [52, 152, 219] }, // Blue Header
            styles: { fontSize: 10 },
        });

        doc.save("Report.pdf");
    });

    // Export to Excel
    document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("exportExcel").addEventListener("click", function () {
        let table = document.querySelector(".table"); // Ensure correct table selection

        // Clone table and remove the "Action" column
        let tableClone = table.cloneNode(true);
        tableClone.querySelectorAll("thead tr th:last-child, tbody tr td:last-child").forEach(el => el.remove());

        // Remove buttons, links, icons, dropdowns, and modals from table cells
        tableClone.querySelectorAll("td, th").forEach(cell => {
            cell.querySelectorAll("button, a, i, .dropdown, .modal").forEach(el => el.remove());
        });

        // Convert table to Excel file
        let wb = XLSX.utils.table_to_book(tableClone, { sheet: "Attendance Report" });
        XLSX.writeFile(wb, "Report.xlsx");
    });
});

});
$(document).ready(function() {
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();

        $(".table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

