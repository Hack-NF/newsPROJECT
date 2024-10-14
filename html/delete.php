<?php
// Include the connection file
include('connection.php');

// Check if 'email' parameter is set in the URL
if (isset($_GET['email']) && !empty($_GET['email'])) {
    $email = $_GET['email'];

    // Prepare and execute delete query
    $que = "DELETE FROM news WHERE Email='$email'";
    $result = mysqli_query($conn, $que);

    if ($result) {
        echo "Record deleted successfully";
        // Optionally, you can redirect back to the display page after deleting
        header("Location: display.php"); // Redirect back to display_contacts.php
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

// Close the connection
mysqli_close($conn);
?>
