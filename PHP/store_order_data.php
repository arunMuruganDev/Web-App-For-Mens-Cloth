<?php


session_start();

include "db.php";

if(isset($_SESSION['cid']))
{

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $size = $_POST['size'];
    $address = $_POST['address'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $pid = $_POST['pid'];
    $cid = $_POST['cid'];

    $current_date = date("Y-m-d");
    $sql = "INSERT INTO orders(cid,pid,name,mobile,pincode,state,address,size,quantity,price) VALUES($cid,$pid,'$name','$mobile',$pincode,'$state','$address','$size',$quantity,$price)";

   
    if($conn->query($sql)=== TRUE)
    {
        // Remove data from cart
        $sql = "DELETE FROM cart WHERE cid = $cid AND pid = $pid";
        $conn->query($sql);
       

        // Reduce Quantity
        $sql = "UPDATE products set quantity=quantity-1";
        $conn->query($sql);
        
        // Getting mobile number
        $sql = "SELECT mobile FROM customer_login WHERE cid = $cid";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $mobile = $row['mobile'];

        $tomobile = "+91".$mobile;

        // Getting product Name
        $sql = "SELECT pname FROM products WHERE pid = $pid";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $pname = $row['pname'];

        // Send Message to customer
        require_once '../twilio-php-main/src/Twilio/autoload.php';
        require_once '../twilio-php-main/src/Twilio/Rest/Client.php';

        // Your Twilio account SID and auth token
        $accountSid = 'ACd27d61a60a2dec8c4fc116afedb7d7f7';
        $authToken = '9396f6790541b1e7ff5e67df28bc6f75';

        // Create a new Twilio client
        $client = new Twilio\Rest\Client($accountSid, $authToken);

        // The recipient's phone number
        $to = $tomobile;

        // Your Twilio phone number
        $from = '+12707145051';

        // The message content
        $message = 'Order Placed 
                    Product : '.$pname.'
                    Quantity : '.$quantity.'
                    Price : '.$price.'
                    Your product will be deivered within 4 days.';

        // Send the SMS message
        $client->messages->create($to, [
            'from' => $from,
            'body' => $message
        ]);




        echo 1;
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   

}
else{
    header("location:../login.html");
}



?>