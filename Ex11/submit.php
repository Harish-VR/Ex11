<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "","job_applications");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO job_applications (name, email, cv) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $cv);
    $name = $_POST["name"];
    $email = $_POST["email"];
    $cv = basename($_FILES["cv"]["name"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please enter a valid email address.";
    } else {
        if (move_uploaded_file($_FILES["cv"]["tmp_name"], "uploads/" . $cv)) {
            if ($stmt->execute()) {
                echo "Application submitted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Error uploading CV.";
        }
    }
    $stmt->close();
    $conn->close();
}
?>
