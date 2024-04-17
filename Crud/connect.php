<?php
session_start(); // Start the session at the beginning of the script

$Name = $_POST['Name'];
$Username = $_POST['Username'];
$EmailAddress = $_POST['EmailAddress'];
$Password = $_POST['Password'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'crud');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO Users(Name, Username, EmailAddress, Password) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $Name, $Username, $EmailAddress, $Password);
    $execval = $stmt->execute();
    if ($execval) {
        echo "Registration successful...";
        // Store user data in the session
        $_SESSION['Name'] = $Name;
        $_SESSION['Username'] = $Username;
        $_SESSION['EmailAddress'] = $EmailAddress;
        // Redirect to the homepage
        header("Location: Movie.php");
        exit(); // Make sure to exit the script after the redirection
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>