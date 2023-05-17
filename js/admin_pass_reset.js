function resetPass() {
    let newPass = document.getElementById("new_pass").value;
    let confirmPass = document.getElementById("confirm_pass").value;

  
    if (newPass.length < 4) {
      swal("OOPS!", "Password must have atleast 4 characters!", "error");
    }  else if(newPass!=confirmPass){
        swal("OOPS!", "Incorrect confirm password!", "error");
    } else{
      $.post(
        "PHP/admin_pass_reset.php",
        {
          pass: confirmPass,
        },
        function (data) {
          if (data == 1) {
            swal("Success!", "Password Updated!", "success");
            
          } else {
          //   alert(data)
           swal("OOPS!", "Password Not updated!", "error");
          }
        }
      );
    }
  }
  
  