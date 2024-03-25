document.addEventListener("DOMContentLoaded", function () {
    // Display tables
    fetchTables();

    // Add table button click event
    document.getElementById("add-table-btn").addEventListener("click", function () {
        document.getElementById("add-table-modal").style.display = "block";
    });

    // Close modal
    document.getElementsByClassName("close")[0].addEventListener("click", function () {
        document.getElementById("add-table-modal").style.display = "none";
    });
});

// Function to fetch tables and display them
function fetchTables() {
    fetch("get_tables.php")
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById("table-body");
            tableBody.innerHTML = "";
            data.forEach(table => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${table.meja_id}</td>
                    <td>${table.status}</td>
                    <td><button onclick="deleteTable(${table.meja_id})">Delete</button></td>
                `;
                tableBody.appendChild(row);
            });
        });
}

// Function to delete a table
function deleteTable(tableId) {
    if (confirm("Are you sure you want to delete this table?")) {
        fetch(`delete_table.php?table_id=${tableId}`, {
            method: "DELETE"
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    fetchTables();
                } else {
                    alert("Failed to delete table.");
                }
            });
    }
}
