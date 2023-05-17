<?php

session_start();

include "db.php";

if(isset($_SESSION['cid']))
{

    $cid=$_SESSION['cid'];

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCOUNT</title>
    <link rel="stylesheet" href="../CSS/account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body>

    <div class="container">

        <nav>
            <h1>Classix</h1>
            <form action="search_products.php" method="GET" id="search_products">
                <!-- <label for="category">Choose category :</label> -->
                <select name="category">
                  <option>Choose category</option>
                  <option value="shirts">Shirt</option>
                  <option value="pants">Pant</option>
                  <option value="t_shirts">T Shirts</option>
                  <option value="shorts">Shorts</option>
                  <option value="shoes">Shoes</option>
                  <option value="accessories">Accessories</option>
                </select>

                <input type="submit" value="Search">
            </form>
            <a href="logout.PHP" style="color:red"><i class='fa fa-sign-out'></i></a>
        </nav>

        <div class="main">
        <!-- left-container -->
        <div class="left-section">

        <ul>

                
                <li onclick="tableChange('orders')"      class="nav-orders "><i class="fa fa-shopping-bag" aria-hidden="true"></i>Orders</li>
                <li onclick="tableChange('cancelled')"   class="nav-cancelled "><i class="fa fa-truck" aria-hidden="true"></i>Cancelled Orders</li>
                <li onclick="tableChange('delivered')"   class="nav-delivered "><i class="fa fa-truck" aria-hidden="true"></i>Delivered Orders</li>
                <li onclick="tableChange('messages')"   class="nav-messages "><i class="fa fa-comments" aria-hidden="true"></i>Help Desk</li>
                <li onclick="tableChange('settings')" class="nav-settings "><i class="fa fa-cog" aria-hidden="true"></i>Settings</li>
                <li onclick="logout()"      class="nav-logout "><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</li>
            </ul>

        </div>
        <!-- Right Section -->
        <div class="right-section">

        <div class="orders">

        <div class="table-content">
            <table>
                <thead>

                <tr>
                    <th>SNO</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Request</th>
                    <th>Status</th>
                </tr>

                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT orders.oid,orders.quantity,orders.size,orders.price,products.pname from orders INNER JOIN products ON orders.pid=products.pid WHERE cid=$cid AND status=0";
                    $result = $conn->query($sql);

                    if($result->num_rows>0)
                    {
                        $i=1;
                        while($row=$result->fetch_assoc())
                        {
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row['pname']." (".$row["size"].")</td>";
                            echo "<td>".$row['quantity']."</td>";
                            echo "<td>".$row['price']."</td>";
                            echo "<td><a href='cancel_product.php?oid=".$row["oid"]."'><button>CANCEL</button></a></td>";
                            echo "<td>Ordered</td>";
                            $i++;
                        }
                    }

                    ?>
        
</tbody>


</table>
        
        </div>

        

        </div>
        <!-- Cancelled Orders -->
        <div class="cancelled">

<div class="table-content">
    <table>
        <thead>

        <tr>
            <th>SNO</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
        </tr>

        </thead>
        <tbody>
            <?php

            $sql = "SELECT orders.pid,orders.quantity,orders.price,products.pname from orders INNER JOIN products ON orders.pid=products.pid WHERE cid=$cid AND status=2";
            $result = $conn->query($sql);

            if($result->num_rows>0)
            {
                $i=1;
                while($row=$result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row['pname']."</td>";
                    echo "<td>".$row['quantity']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>Cancelled</td>";
                    $i++;
                }
            }

            ?>

</tbody>


</table>

</div>

</div>
        <!-- Delivered Orders -->
        <div class="delivered">

        <div class="table-content">
            <table>
                <thead>

                <tr>
                    <th>SNO</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>

                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT orders.pid,orders.quantity,orders.price,products.pname from orders INNER JOIN products ON orders.pid=products.pid WHERE cid=$cid AND status=1";
                    $result = $conn->query($sql);

                    if($result->num_rows>0)
                    {
                        $i=1;
                        while($row=$result->fetch_assoc())
                        {
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row['pname']."</td>";
                            echo "<td>".$row['quantity']."</td>";
                            echo "<td>".$row['price']."</td>";
                            echo "<td>Delivered</td>";
                            $i++;
                        }
                    }

                    ?>
        
</tbody>


</table>
        
        </div>

</div>
<div class="messages">




</div>
<div class="settings">

<h1>Update Notification Time</h1>
<div id="result"></div>
<form id="timeForm">
  <label for="timeInput">Enter time:</label>
  <input type="time" id="timeInput" name="timeInput" required>
  <button type="submit">Submit</button>
</form>


</div>

        </div>
        </div>

       

    </div>

    <?php

}
else{
    header("location:../login.html");
}
    ?>
    <script src="../js/account.js"></script>
    <script src="../js/update_time.js"></script>
</body>
</html>