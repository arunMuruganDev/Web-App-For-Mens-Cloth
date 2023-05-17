<?php

session_start();

include "db.php";

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Animated Login Form</title>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>

<?php


if(isset($_POST["submit"]))
{
  
  $username = $_POST['username'];
  $password = $_POST['pass'];
  $sql = "SELECT * FROM admin WHERE name='$username' AND pass='$password' ";
  $result = $conn->query($sql);
  if($result->num_rows>0)
{
    $_SESSION['admin'] = $username;
    echo "<script>
    swal('WELCOME!','Login Successfully Completed','success')
    setTimeout(()=>{
      window.location.href='../admin_panel.php'
    },2000)
    </script>";
  }
  else{
    echo "<script>swal('OOPS!','Incorrect Username or Password','error')</script>";
  }

}

?>


    <!---<img class="wave" src="img/wave.png" />--->
    <div class="container">
      <!--<div class="img">
			<img src="img/bg.svg">
		</div>-->
      <div class="login-content">
        <form action="" method="POST">
          <img src="../img/avatar.svg" />
          <h2 class="title">ADMIN</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-phone"></i>
            </div>
            <div class="div">
              <h5>Username</h5>
              <input type="text" class="input" id="username" name="username"  required/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Password</h5>
              <input type="password" class="input" id="pass" name="pass"  required/>
            </div>
          </div>
          <input type="submit" class="btn" value="SIGN IN" name="submit" "/>
        </form>
      </div>

    </div>
    <script type="text/javascript" src="../js/main.js"></script>
    

    </body>
    </html>