<?php

include_once "db.php";

$category = $_POST['category'];
// Prepare and execute the query
$sql = "SELECT * FROM products WHERE category='$category' ";
$result = $conn->query($sql);

// Process the query result
if ($result->num_rows > 0) {
    // Output data of each row
    $i=1;
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
                                <td>".$i."</td>
                                <td><img src='data:image;base64,{$row["img"]}'></td>
                                <td>".$row['pname']."</td>
                                <td>".$row['quantity']."</td>
                                <td>".$row['price']."</td>
                                <td>13000</td>
                                <td><a href='#delete'><button>Delete</button></a></td>
                            </tr>
        ";

        $i++;
    }
} else {
    echo "No results found.";
}

// Close the connection
$conn->close();
?>