<?php
session_start();

if($_SESSION['admin'])
{


include_once "PHP/db.php";

?>
<html>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="CSS/admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>


        <div class="side-nav">

            <ul>
                <li onclick="tableChange('admin')"      class="nav-admin "><i class="fa fa-tachometer" aria-hidden="true"></i></i>Admin Dashboard</li>
                <li onclick="tableChange('home')"       class="nav-home "><i class="fa fa-home" aria-hidden="true"></i>Home</li>
                <li onclick="tableChange('customers')"  class="nav-customers "><i class="fa fa-users" aria-hidden="true"></i>Customers</li>
                <li onclick="tableChange('messages')"   class="nav-messages "><i class="fa fa-comments" aria-hidden="true"></i>Update Password</li>
                <li onclick="tableChange('add_product')" class="nav-add_product "><i class="fa fa-shopping-basket" aria-hidden="true"></i>Add Product</li>
                <li onclick="tableChange('orders')"      class="nav-orders "><i class="fa fa-shopping-bag" aria-hidden="true"></i>Orders</li>
                <li onclick="tableChange('delivered')"   class="nav-delivered "><i class="fa fa-truck" aria-hidden="true"></i>Order Details</li>
                <li onclick="logout()"      class="nav-logout "><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</li>
            </ul>

        </div>
        <!-- Main content -->
        <div class="main-content">
            <?php
            // Getting total users
$sql = "select count(*) as users from customer_login";
$result = mysqli_query($conn, $sql);

// Check if the query was successful

    $row = mysqli_fetch_assoc($result);
    $totalUsers = $row['users'];

    // Getting total Orders

    $sql1 = "SELECT quantity from orders";
    $result1 = $conn->query($sql1);
    
    $totalOrders = 0;
    if($result1->num_rows>0)
    {
        while($row1=$result1->fetch_assoc())
        {
            $quantity = $row1['quantity'];
            $totalOrders = $totalOrders+$quantity;
        }
    }    


?>

            <!-- Top Nav -->
            <div class="top-nav">
                <div class="nav-items">
                    <span><?php echo $totalUsers ?></span>
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="nav-items">
                    <span><?php echo $totalOrders ?></span>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="nav-items">
                    <span>4521</span>
                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                </div>
            </div>

            <!-- Home -->
            <div class="home">

                <div class="search">
                    <h1>Products</h1>
                    <form id="display_products">
                        <label for="category">Choose category :</label>
                        <select name="category">
                          <option value="shirts">Shirt</option>
                          <option value="pants">Pant</option>
                          <option value="t_shirts">T Shirts</option>
                          <option value="shorts">Shorts</option>
                          <option value="shoes">Shoes</option>
                          <option value="accessories">Accessories</option>
                        </select>

                        <input type="submit" value="Search">
                    </form>
                </div>
                
                <div class="table-content" >
 
                    <table>
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Orders</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody id="home-result">
                            
                        </tbody>
                    </table>
    

                </div>

            </div>
            <!-- Customers -->
            <div class="customers">

                <div class="head">
                    <h1>Customers</h1>
                </div>

                <div class="table-content">
                    <table>
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Mobile</th>
                                <th>Orders</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT DISTINCT customer_login.mobile,orders.cid FROM customer_login INNER JOIN orders ON customer_login.cid=orders.cid";
                            $result=$conn->query($sql);
                            
                            if($result->num_rows>0)
                            {
                                $i=1;
                                while($row=$result->fetch_assoc())
                                {
                                    $cid = $row['cid'];

                                $sql1 = "SELECT quantity from orders WHERE cid=$cid ";
                                $result1 = $conn->query($sql1);
                                
                                $total = 0;
                                if($result1->num_rows>0)
                                {
                                    while($row1=$result1->fetch_assoc())
                                    {
                                        $quantity = $row1['quantity'];
                                        $total = $total+$quantity;
                                    }
                                }    

                                
                                echo "<tr>";
                                echo "<td>".$i."</td>";
                                echo "<td>".$row['mobile']."</td>";
                                echo "<td>".$total."</td>";
                                echo "</tr>";
                                $i++;
                            }
                        }



        ?>
                        </tbody>
                    </table>

                    </div>

            </div>
            <!-- Messages -->
            <div class="messages">
                <div class="head">
                    <h1>RESET PASSWORD</h1>
                </div>

                <div class="update-pass">
                    <form >
                        <input type="text" id="new_pass" placeholder="Enter New Password" >
                        <input type="text" id="confirm_pass" placeholder="Confirm Password" >
                        <input type="button" onclick="resetPass()" value="Update">

                    </form>
                </div>

               
            </div>

    
             <!-- Add product -->
             <div class="add_product">
                <div class="head">
                    <h1>Add Products</h1>
                </div>
                <div class="table-content">

                    <div class="myform">
                    <form id="myForm" enctype="multipart/form-data" >
                       
                        <select name="category" id="category" required>
                            <option value="select">Select Category</option>
                            <option value="shirts">Shirt</option>
                            <option value="pants">Pant</option>
                            <option value="t_shirts">T Shirts</option>
                            <option value="shorts">Shorts</option>
                            <option value="shoes">Shoes</option>
                            <option value="accessories">Accessories</option>
                           
                          </select>
                          <input type="text" name="pname"  id="pname" placeholder="Product Name"required>
                          <input type="number" name="quantity" id="quantity" placeholder="Quantity" required>
                          <input type="text" name="price" id="price" placeholder="Price" oninput="validateNumber(event)" required> 
                          
                          <input type="file" id="fileInput" name="image" id="image" accept="image/*" required>
                          <input type="submit" value="Add" >

                    </form>
                </div>

                </div>
             </div>


              <!-- Order -->
            <div class="orders">
                <!-- <div class="head">
                    <h1>New Orders</h1>
                </div> -->
                <div class="search">
                    <h1>New Orders</h1>
                    <form id="display_orders">
                        <label for="cars">Choose category :</label>
                        <select name="category">
                          <option value="shirts">Shirt</option>
                          <option value="pants">Pant</option>
                          <option value="t_shirts">T Shirts</option>
                          <option value="shorts">Shorts</option>
                          <option value="shoes">Shoes</option>
                          <option value="accessories">Accessories</option>
                          
                        </select>

                        <input type="submit" value="Search">
                    </form>
                </div>
                <div class="table-content">
                    <table>
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>mobile</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody id="orders-result">
                            
                        </tbody>
                    </table>

                    </div>
            </div>
            <!-- Delivered -->
            <div class="delivered">
                <!-- <div class="head">
                    <h1>Order Details</h1>
                </div> -->
                <div class="search">
                    <h1>Order Details</h1>
                    <form id="display_delivered_orders">
                        <label for="cars">Choose category :</label>
                        <select name="category">
                          <option value="shirts">Shirt</option>
                          <option value="pants">Pant</option>
                          <option value="t_shirts">T Shirts</option>
                          <option value="shorts">Shorts</option>
                          <option value="shoes">Shoes</option>
                          <option value="accessories">Accessories</option>
                          
                        </select>

                        <input type="submit" value="Search">
                    </form>
                </div>
                <div class="table-content">
                <table>
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>mobile</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody id="delivered_orders-result">

                            
                        </tbody>
                    </table>


                    </div>
            </div>

        </div>

        <script src="js/admin_panel.js"></script>
        <script src="js/display_product.js"></script>
        <script src="js/add_product.js"></script>
        <script src="js/display_orders.js"></script>
        <script src="js/display_delivered_orders.js"></script>
        <script src="js/admin_pass_reset.js"></script>
        <?php

}
else{
    header("location:PHP/admin_login.php");
}
?>
    </body>
    </html>