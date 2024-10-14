<?php
// Include the connection file
include('connection.php');

// Check if 'email' parameter is set in the URL
if (isset($_GET['email']) && !empty($_GET['email'])) {
    $email = $_GET['email'];

    // Fetch the existing data for the record
    $query = "SELECT * FROM news WHERE Email='$email'";
    $result = mysqli_query($conn, $query);

    // Check if the record exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<p style='color:red;'>Record not found!</p>";
        exit();
    }
} else {
    echo "<p style='color:red;'>No email provided for update!</p>";
    exit();
}

// Check if the update form has been submitted
if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Update query
    $update_query = "UPDATE news SET Name='$name', Subject='$subject', Message='$message' WHERE Email='$email'";

    if (mysqli_query($conn, $update_query)) {
        echo "<p style='color:green;'>Record updated successfully!</p>";
        // Redirect back to the display page after updating
        header("Location: display.php");
        exit();
    } else {
        echo "<p style='color:red;'>Error updating record: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!-- HTML Form to display existing data and update -->
<form method="POST" action="update.php?email=<?php echo $email; ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['Name']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $row['Subject']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="5" required><?php echo $row['Message']; ?></textarea>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
