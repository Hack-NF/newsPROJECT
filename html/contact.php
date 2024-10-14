<?php
include('connection.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data and escape strings to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert query
    $query = "INSERT INTO news (Name, Email, Subject, Message) VALUES ('$name', '$email', '$subject', '$message')";

    // Execute the query and check if it was successful
    if (mysqli_query($conn, $query)) {
        echo "<p style='color:green;'>Message sent successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
