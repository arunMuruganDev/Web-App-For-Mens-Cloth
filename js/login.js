
function checkUser() {
    let mobile = document.getElementById("mobile").value;
    let pass = document.getElementById("pass").value;
  
    if (mobile.length < 10 || mobile.length > 10) {
      swal("OOPS!", "Enter a valid mobile number!", "error");
    } else if (pass.length < 8) {
      swal("OOPS!", "Enter a valid password!", "error");
    } else {
      $.post(
        "PHP/checkLoginData.php",
        {
          mobile: mobile,
          pass: pass,
        },
        function (data) {
          if (data == 1) {
            swal("Success!", "Login Success!", "success");
            setInterval(function () {
              location.href = "index.php";
            }, 2000);
          } else {
          //   alert(data)
           swal("OOPS!", "Incorrect Username or Password!", "error");
          }
        }
      );
    }
  }
  
  