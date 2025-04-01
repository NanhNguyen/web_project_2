<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EOI Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .menu {
            background-color: #f2f2f2;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .menu h2 {
            margin-top: 0;
        }
        .menu form {
            margin-bottom: 10px;
        }
        .menu label {
            margin-right: 10px;
        }
        input[type="text"], input[type="submit"] {
            padding: 5px;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <h1>EOI Management System</h1>
    
    <div class="menu">
        <h2>Select an Option</h2>
        <form method="get" action="">
            <input type="radio" id="list_all" name="action" value="list_all" checked>
            <label for="list_all">List All EOIs</label><br>
            
            <input type="radio" id="list_by_job" name="action" value="list_by_job">
            <label for="list_by_job">List EOIs by Job Reference</label>
            <input type="text" name="job_ref" placeholder="Enter Job Reference Number"><br>
            
            <input type="radio" id="list_by_name" name="action" value="list_by_name">
            <label for="list_by_name">List EOIs by Applicant Name</label>
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name" placeholder="Last Name"><br>
            
            <input type="radio" id="delete_by_job" name="action" value="delete_by_job">
            <label for="delete_by_job">Delete EOIs by Job Reference</label>
            <input type="text" name="delete_job_ref" placeholder="Enter Job Reference Number"><br>
            
            <input type="radio" id="change_status" name="action" value="change_status">
            <label for="change_status">Change EOI Status</label>
            <input type="text" name="eoi_id" placeholder="EOI ID">
            <select name="new_status">
                <option value="New">New</option>
                <option value="Current">Current</option>
                <option value="Final">Final</option>
                <option value="Rejected">Rejected</option>
            </select><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
    
    <?php
    require_once "settings.php";
    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
    // Function to display table
    function displayTable($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>EOI ID</th>";     
            echo "<th>Job Reference Number</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Date of Birth</th>";
            echo "<th>Gender</th>";     
            echo "<th>Address</th>";     
            echo "<th>Suburb</th>";
            echo "<th>State</th>";     
            echo "<th>Postcode</th>";     
            echo "<th>Email</th>";     
            echo "<th>Phone</th>";     
            echo "<th>Skills</th>";     
            echo "<th>Other skills</th>";
            echo "<th>Status</th>"; // Added Status column
            echo "</tr>";   
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['eoi_id'] . "</td>";
                echo "<td>" . $row['job_ref'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['suburb'] . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['postcode'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['skills'] . "</td>";
                echo "<td>" . $row['other_skills'] . "</td>";
                echo "<td>" . (isset($row['status']) ? $row['status'] : 'New') . "</td>"; // Added Status field
                echo "</tr>";
            }
            echo "</table>";
            echo "<p>Total records: " . mysqli_num_rows($result) . "</p>";
        } else {
            echo "<p class='message'>No records found.</p>";
        }
    }
    
    if ($dbconn) {
        // Check if status column exists, if not add it
        $checkColumn = "SHOW COLUMNS FROM eoi LIKE 'status'";
        $columnResult = mysqli_query($dbconn, $checkColumn);
        
        if (mysqli_num_rows($columnResult) == 0) {
            $addColumn = "ALTER TABLE eoi ADD status VARCHAR(20) DEFAULT 'New'";
            mysqli_query($dbconn, $addColumn);
        }
        
        // Process action
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            
            switch ($action) {
                case 'list_all':
                    $query = "SELECT * FROM eoi";
                    $result = mysqli_query($dbconn, $query);
                    if ($result) {
                        echo "<h2>All EOIs</h2>";
                        displayTable($result);
                    } else {
                        echo "<p class='message error'>Error executing query: " . mysqli_error($dbconn) . "</p>";
                    }
                    break;
                    
                case 'list_by_job':
                    if (!empty($_GET['job_ref'])) {
                        $job_ref = mysqli_real_escape_string($dbconn, $_GET['job_ref']);
                        $query = "SELECT * FROM eoi WHERE job_ref = '$job_ref'";
                        $result = mysqli_query($dbconn, $query);
                        if ($result) {
                            echo "<h2>EOIs for Job Reference: $job_ref</h2>";
                            displayTable($result);
                        } else {
                            echo "<p class='message error'>Error executing query: " . mysqli_error($dbconn) . "</p>";
                        }
                    } else {
                        echo "<p class='message error'>Please enter a job reference number.</p>";
                    }
                    break;
                    
                case 'list_by_name':
                    $conditions = [];
                    $first_name = !empty($_GET['first_name']) ? mysqli_real_escape_string($dbconn, $_GET['first_name']) : '';
                    $last_name = !empty($_GET['last_name']) ? mysqli_real_escape_string($dbconn, $_GET['last_name']) : '';
                    
                    if ($first_name) {
                        $conditions[] = "first_name = '$first_name'";
                    }
                    
                    if ($last_name) {
                        $conditions[] = "last_name = '$last_name'";
                    }
                    
                    if (!empty($conditions)) {
                        $where = implode(' AND ', $conditions);
                        $query = "SELECT * FROM eoi WHERE $where";
                        $result = mysqli_query($dbconn, $query);
                        
                        if ($result) {
                            $name_display = [];
                            if ($first_name) $name_display[] = "First Name: $first_name";
                            if ($last_name) $name_display[] = "Last Name: $last_name";
                            $name_str = implode(', ', $name_display);
                            
                            echo "<h2>EOIs for $name_str</h2>";
                            displayTable($result);
                        } else {
                            echo "<p class='message error'>Error executing query: " . mysqli_error($dbconn) . "</p>";
                        }
                    } else {
                        echo "<p class='message error'>Please enter a first name, last name, or both.</p>";
                    }
                    break;
                    
                case 'delete_by_job':
                    if (!empty($_GET['delete_job_ref'])) {
                        $job_ref = mysqli_real_escape_string($dbconn, $_GET['delete_job_ref']);
                        
                        // First select records to show what will be deleted
                        $selectQuery = "SELECT * FROM eoi WHERE job_ref = '$job_ref'";
                        $selectResult = mysqli_query($dbconn, $selectQuery);
                        
                        if (mysqli_num_rows($selectResult) > 0) {
                            echo "<h2>The following EOIs will be deleted:</h2>";
                            displayTable($selectResult);
                            
                            // Delete records
                            $deleteQuery = "DELETE FROM eoi WHERE job_ref = '$job_ref'";
                            $deleteResult = mysqli_query($dbconn, $deleteQuery);
                            
                            if ($deleteResult) {
                                $rows_deleted = mysqli_affected_rows($dbconn);
                                echo "<p class='message success'>Successfully deleted $rows_deleted EOI(s) with Job Reference Number: $job_ref</p>";
                            } else {
                                echo "<p class='message error'>Error deleting records: " . mysqli_error($dbconn) . "</p>";
                            }
                        } else {
                            echo "<p class='message'>No EOIs found with Job Reference Number: $job_ref</p>";
                        }
                    } else {
                        echo "<p class='message error'>Please enter a job reference number to delete.</p>";
                    }
                    break;
                    
                case 'change_status':
                    if (!empty($_GET['eoi_id']) && isset($_GET['new_status'])) {
                        $eoi_id = mysqli_real_escape_string($dbconn, $_GET['eoi_id']);
                        $new_status = mysqli_real_escape_string($dbconn, $_GET['new_status']);
                        
                        // Check if EOI exists
                        $checkQuery = "SELECT * FROM eoi WHERE eoi_id = '$eoi_id'";
                        $checkResult = mysqli_query($dbconn, $checkQuery);
                        
                        if (mysqli_num_rows($checkResult) > 0) {
                            // Update status
                            $updateQuery = "UPDATE eoi SET status = '$new_status' WHERE eoi_id = '$eoi_id'";
                            $updateResult = mysqli_query($dbconn, $updateQuery);
                            
                            if ($updateResult) {
                                echo "<p class='message success'>Successfully updated status of EOI #$eoi_id to '$new_status'</p>";
                                
                                // Show the updated record
                                $showQuery = "SELECT * FROM eoi WHERE eoi_id = '$eoi_id'";
                                $showResult = mysqli_query($dbconn, $showQuery);
                                if ($showResult) {
                                    echo "<h2>Updated EOI:</h2>";
                                    displayTable($showResult);
                                }
                            } else {
                                echo "<p class='message error'>Error updating status: " . mysqli_error($dbconn) . "</p>";
                            }
                        } else {
                            echo "<p class='message error'>No EOI found with ID: $eoi_id</p>";
                        }
                    } else {
                        echo "<p class='message error'>Please enter an EOI ID and select a status.</p>";
                    }
                    break;
            }
        } else {
            // Default action - show the menu without any results
            echo "<p>Please select an option and click Submit.</p>";
        }
        
        mysqli_close($dbconn);
    } else {
        echo "<p class='message error'>Unable to connect to the database. Please check your connection settings.</p>";
    }
    ?>
</body>
</html>