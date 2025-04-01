<?php
include 'settings.php';  // Connect to database

// Initialize variables
$action = isset($_POST['action']) ? $_POST['action'] : '';
$message = '';
$result_table = '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // List all EOIs
    if ($action == "list_all") {
        $sql = "SELECT * FROM eoi";
        displayResults($conn, $sql);
    }
    
    // List EOIs for a particular position
    elseif ($action == "list_by_position") {
        $job_ref = mysqli_real_escape_string($conn, $_POST['job_ref']);
        $sql = "SELECT * FROM eoi WHERE job_ref = '$job_ref'";
        displayResults($conn, $sql);
    }
    
    // List EOIs for a particular applicant
    elseif ($action == "list_by_applicant") {
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        
        if (!empty($first_name) && !empty($last_name)) {
            $sql = "SELECT * FROM eoi WHERE first_name LIKE '%$first_name%' AND last_name LIKE '%$last_name%'";
        } elseif (!empty($first_name)) {
            $sql = "SELECT * FROM eoi WHERE first_name LIKE '%$first_name%'";
        } elseif (!empty($last_name)) {
            $sql = "SELECT * FROM eoi WHERE last_name LIKE '%$last_name%'";
        } else {
            $message = "Please enter at least one name.";
            $sql = "";
        }
        
        if (!empty($sql)) {
            displayResults($conn, $sql);
        }
    }
    
    // Delete EOIs with specified job reference
    elseif ($action == "delete_by_job") {
        $job_ref = mysqli_real_escape_string($conn, $_POST['job_ref']);
        $sql = "DELETE FROM eoi WHERE job_ref = '$job_ref'";
        
        if (mysqli_query($conn, $sql)) {
            $affected_rows = mysqli_affected_rows($conn);
            $message = "$affected_rows EOI(s) deleted successfully.";
        } else {
            $message = "Error deleting EOIs: " . mysqli_error($conn);
        }
    }
    
    // Change status of an EOI
    elseif ($action == "change_status") {
        $eoi_id = mysqli_real_escape_string($conn, $_POST['eoi_id']);
        $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
        
        $sql = "UPDATE eoi SET status = '$new_status' WHERE eoi_id = '$eoi_id'";
        
        if (mysqli_query($conn, $sql)) {
            $affected_rows = mysqli_affected_rows($conn);
            if ($affected_rows > 0) {
                $message = "Status updated successfully.";
            } else {
                $message = "No EOI found with ID: $eoi_id";
            }
        } else {
            $message = "Error updating status: " . mysqli_error($conn);
        }
    }
}

// Function to display results in a table
function displayResults($conn, $sql) {
    global $result_table, $message;
    
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        $message = "Error executing query: " . mysqli_error($conn);
        return;
    }
    
    if (mysqli_num_rows($result) > 0) {
        $result_table = "<table border='1'>
                        <tr>
                            <th>EOI ID</th>
                            <th>Job Reference</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Date Applied</th>
                        </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            $result_table .= "<tr>
                              <td>{$row['eoi_id']}</td>
                              <td>{$row['job_ref']}</td>
                              <td>{$row['first_name']}</td>
                              <td>{$row['last_name']}</td>
                              <td>{$row['email']}</td>
                              <td>{$row['phone']}</td>
                              <td>{$row['status']}</td>
                            </tr>";
        }
        
        $result_table .= "</table>";
        $message = mysqli_num_rows($result) . " record(s) found.";
    } else {
        $message = "No results found.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Manager - EOI Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h1, h2 {
            color: #333;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .query-form {
            flex: 1;
            min-width: 300px;
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="submit"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 20px;
            border-left: 5px solid #4CAF50;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>HR Manager - EOI Management System</h1>
    
    <?php if (!empty($message)): ?>
    <div class="message">
        <?php echo $message; ?>
    </div>
    <?php endif; ?>
    
    <div class="container">
        <!-- List All EOIs Form -->
        <div class="query-form">
            <h2>List All EOIs</h2>
            <form method="post" action="">
                <input type="hidden" name="action" value="list_all">
                <input type="submit" value="List All EOIs">
            </form>
        </div>
        
        <!-- List EOIs by Position Form -->
        <div class="query-form">
            <h2>List EOIs by Position</h2>
            <form method="post" action="">
                <input type="hidden" name="action" value="list_by_position">
                <label for="job_reference">Job Reference Number:</label>
                <input type="text" id="job_reference" name="job_reference" required>
                <input type="submit" value="Search">
            </form>
        </div>
        
        <!-- List EOIs by Applicant Form -->
        <div class="query-form">
            <h2>List EOIs by Applicant</h2>
            <form method="post" action="">
                <input type="hidden" name="action" value="list_by_applicant">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name">
                <input type="submit" value="Search">
            </form>
        </div>
        
        <!-- Delete EOIs by Job Reference Form -->
        <div class="query-form">
            <h2>Delete EOIs by Job Reference</h2>
            <form method="post" action="" onsubmit="return confirm('Are you sure you want to delete all EOIs with this job reference?');">
                <input type="hidden" name="action" value="delete_by_job">
                <label for="job_reference_delete">Job Reference Number:</label>
                <input type="text" id="job_reference_delete" name="job_reference" required>
                <input type="submit" value="Delete">
            </form>
        </div>
        
        <!-- Change EOI Status Form -->
        <div class="query-form">
            <h2>Change EOI Status</h2>
            <form method="post" action="">
                <input type="hidden" name="action" value="change_status">
                <label for="eoi_id">EOI ID:</label>
                <input type="text" id="eoi_id" name="eoi_id" required>
                <label for="new_status">New Status:</label>
                <select id="new_status" name="new_status" required>
                    <option value="">Select Status</option>
                    <option value="New">New</option>
                    <option value="Current">Current</option>
                    <option value="Interviewed">Interviewed</option>
                    <option value="Hired">Hired</option>
                    <option value="Rejected">Rejected</option>
                </select>
                <input type="submit" value="Update Status">
            </form>
        </div>
    </div>
    
    <!-- Display Results Table -->
    <?php echo $result_table; ?>
    
</body>
</html>