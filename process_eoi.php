<?php
session_start(); // Start session to store form data
include 'settings.php'; // Include database connection and table creation

// Step 1: Create Table if it Doesn't Exist
$table_sql = "CREATE TABLE IF NOT EXISTS eoi (
    eoi_id INT AUTO_INCREMENT PRIMARY KEY,
    job_ref VARCHAR(5) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    dob VARCHAR(10) NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    address VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state VARCHAR(50) NOT NULL,
    postcode CHAR(4) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    skills TEXT,  -- Stores multiple skills as a comma-separated string
    other_skills TEXT
)";

if ($conn->query($table_sql) === TRUE) {
    // Table creation success - not displaying message to users anymore
} else {
    echo "<div class='alert alert-danger'>Error creating table: " . $conn->error . "</div>";
}

function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Add HTML header with some basic styling
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .success {
            color: #28a745;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .error {
            color: #dc3545;
            font-size: 18px;
            margin-bottom: 15px;
        }
        .eoi-number {
            font-size: 20px;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            margin: 15px 0;
        }
        .redirect-message {
            color: #6c757d;
            font-style: italic;
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .loader {
            width: 100%;
            background-color: #e9ecef;
            height: 5px;
            position: relative;
            margin-top: 25px;
            overflow: hidden;
            border-radius: 10px;
        }
        .loader:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background-color: #007bff;
            animation: progress 5s linear forwards;
        }
        @keyframes progress {
            0% { width: 0; }
            100% { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="container">';

// Step 2: Check if Form was Submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store Form Data in Session
    $_SESSION['form_data'] = $_POST;

    // Retrieve Form Data from Session
    $job_ref = clean_input($_SESSION['form_data']['job-ref']);
    $first_name = clean_input($_SESSION['form_data']['first-name']);
    $last_name = clean_input($_SESSION['form_data']['last-name']);
    $dob = clean_input($_SESSION['form_data']['dob']);
    $gender = clean_input($_SESSION['form_data']['gender']);
    $address = clean_input($_SESSION['form_data']['address']);
    $suburb = clean_input($_SESSION['form_data']['suburb']);
    $state = clean_input($_SESSION['form_data']['state']);
    $postcode = clean_input($_SESSION['form_data']['postcode']);
    $email = clean_input($_SESSION['form_data']['email']);
    $phone = clean_input($_SESSION['form_data']['phone']);
    
    // Handling Checkboxes (Convert Array to String)
    $skills = isset($_SESSION['form_data']['skills']) && is_array($_SESSION['form_data']['skills']) ? implode(", ", array_map('clean_input', $_SESSION['form_data']['skills'])) : '';
    
    $other_skills = clean_input($_SESSION['form_data']['other-skills']);

    // Input Validation
    if (!preg_match("/^[A-Za-z0-9]{5}$/", $job_ref) ||
        !preg_match("/^[A-Za-z ]{1,20}$/", $first_name) ||
        !preg_match("/^[A-Za-z ]{1,20}$/", $last_name) ||
        !preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob) ||
        !in_array($gender, ["male", "female", "other"]) ||
        strlen($address) > 40 || strlen($suburb) > 40 ||
        !preg_match("/^[0-9]{4}$/", $postcode) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        !preg_match("/^[0-9 ]{8,12}$/", $phone)) {
        echo "<div class='error'>Invalid input data. Please go back and correct your details.</div>";
        echo "<a href='javascript:history.back()' class='btn'>Go Back</a>";
    } else {
        // Prepared Statement
        $stmt = $conn->prepare("INSERT INTO eoi (job_ref, first_name, last_name, dob, gender, address, suburb, state, postcode, email, phone, skills, other_skills) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
            echo "<div class='error'>Error preparing statement: " . $conn->error . "</div>";
        } else {
            $stmt->bind_param("sssssssssssss", $job_ref, $first_name, $last_name, $dob, $gender, $address, $suburb, $state, $postcode, $email, $phone, $skills, $other_skills);

            if ($stmt->execute()) {
                $eoi_id = $stmt->insert_id;
                echo "<div class='success'>Application Submitted Successfully!</div>";
                echo "<p>Thank you, $first_name, for your application.</p>";
                echo "<div class='eoi-number'>Your EOI Number is: <strong>$eoi_id</strong></div>";
                echo "<p>Please save this number for future reference.</p>";
                echo "<div class='redirect-message'>You will be redirected to the home page in 5 seconds...</div>";
                echo "<div class='loader'></div>";
                echo "<p><a href='index.php' class='btn'>Return to Home Page</a></p>";
                
                // Add redirect meta tag
                echo "<meta http-equiv='refresh' content='5;url=index.php'>";
                
                unset($_SESSION['form_data']); // Clear session data after successful submission
                
                $stmt->close();
            } else {
                echo "<div class='error'>Error: " . $stmt->error . "</div>";
                echo "<a href='javascript:history.back()' class='btn'>Go Back</a>";
            }
        }
    }
} else {
    // If someone accesses this page directly without submitting the form
    echo "<div class='error'>No form data submitted.</div>";
    echo "<a href='index.php' class='btn'>Go to Application Form</a>";
}

echo '</div></body></html>';

$conn->close();
?>