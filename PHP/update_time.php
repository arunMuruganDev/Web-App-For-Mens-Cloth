<?php

include "db.php";
// Retrieve the time value from the AJAX request
$timeValue = $_POST['time'];


// Prepare the SQL statement
$sql = "UPDATE customer_login set time='$timeValue'";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
  echo "Time saved successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
