<?php
// Include the connection file
include('connection.php');

// Fetch all records from the 'news' table
$que = "SELECT * FROM news";
$result = mysqli_query($conn, $que);

if (mysqli_num_rows($result) > 0) {
    // Display records in a table
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th> <!-- Column for update and delete options -->
            </tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['Name'] . "</td>
                <td>" . $row['Email'] . "</td>
                <td>" . $row['Subject'] . "</td>
                <td>" . $row['Message'] . "</td>
                <td>
                    <a href='update.php?email=" . urlencode($row['Email']) . "'>Update</a> | 
                    <a href='delete.php?email=" . urlencode($row['Email']) . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found!";
}

// Close the connection
mysqli_close($conn);
?>
