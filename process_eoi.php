<?php
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
    skills TEXT,
    other_skills TEXT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'eoi' created successfully or already exists.";
} else {
    echo "Error creating table: " . $conn->error;
}
// Step 2: Check if Form was Submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $job_ref = clean_input($_POST['job-ref']);
    $first_name = clean_input($_POST['first-name']);
    $last_name = clean_input($_POST['last-name']);
    $dob = clean_input($_POST['dob']);
    $gender = clean_input($_POST['gender']);
    $address = clean_input($_POST['address']);
    $suburb = clean_input($_POST['suburb']);
    $state = clean_input($_POST['state']);
    $postcode = clean_input($_POST['postcode']);
    $email = clean_input($_POST['email']);
    $phone = clean_input($_POST['phone']);
    $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : "";
    $other_skills = clean_input($_POST['other-skills']);

    if (!preg_match("/^[A-Za-z0-9]{5}$/", $job_ref) ||
        !preg_match("/^[A-Za-z ]{1,20}$/", $first_name) ||
        !preg_match("/^[A-Za-z ]{1,20}$/", $last_name) ||
        !preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob) ||
        !in_array($gender, ["male", "female", "other"]) ||
        strlen($address) > 40 || strlen($suburb) > 40 ||
        !preg_match("/^[0-9]{4}$/", $postcode) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        !preg_match("/^[0-9 ]{8,12}$/", $phone)) {
        die("Invalid input data. Please go back and correct your details.");
    }

    $stmt = $conn->prepare("INSERT INTO eoi (job_ref, first_name, last_name, dob, gender, address, suburb, state, postcode, email, phone, skills, other_skills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $job_ref, $first_name, $last_name, $dob, $gender, $address, $suburb, $state, $postcode, $email, $phone, $skills, $other_skills);
    
    if ($stmt->execute()) {
        $eoi_id = $stmt->insert_id;
        echo "<p>Application submitted successfully! Your EOI Number is: $eoi_id</p>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
$conn->close();
?>
