
// Import the functions you need from the SDKs you need

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyBKNkoX9kJe_7jq14FWyFJHJshUTCwYKvM",
  authDomain: "fir-crud-72f83.firebaseapp.com",
  projectId: "fir-crud-72f83",
  storageBucket: "fir-crud-72f83.appspot.com",
  messagingSenderId: "924645571675",
  appId: "1:924645571675:web:d51fb8df3886bf66d3937e",
  measurementId: "G-V07KY49Y3T",
};

firebase.initializeApp(firebaseConfig);
render();
function render() {
  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
    "recaptcha-container"
  );
  recaptchaVerifier.render();
}
//Global variable for storing the mobile number
let mobileNumber = 0;

function phoneAuth() {
  //get the number
  var number = document.getElementById("mobile").value;

  if (number.length < 10 || number.length > 10) {
    swal("OOPS!", "Enter a valid mobile number!", "error");
  }
  else{
  $.post(
      "PHP/checkMobile.php",
      {
        mobile: number,
       
      },
      function (data) {
        if (data != 1) {
          
          var number1 = "+91" + number;
    mobileNumber = number;
    // alert(number);
    //it takes two parameter first one is number and second one is recaptcha
    firebase
      .auth()
      .signInWithPhoneNumber(number1, window.recaptchaVerifier)
      .then(function (confirmationResult) {
        //s is in lowercase
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);

        //alert("otp sent")
        document.querySelector("#first").style.display = "none";
        document.querySelector("#second").style.display = "block";
      })
      .catch(function (error) {
        alert(error.message);
        //alert("Invalid Mobile Number. Please Enter A Valid Mobile Number");
      });
  

        } else {
          swal("OOPS!", "Mobile number already exists!", "error");
        }
      }
    );
  }
}



function codeverify() {
  var code = document.getElementById("verificationCode").value;
  if (code.length < 1) {
    swal("OOPS!", "Enter your OTP!", "error");
  }

  coderesult
    .confirm(code)
    .then(function () {
      //alert("valid otp");
      document.querySelector("#second").style.display = "none";
      document.querySelector("#third").style.display = "block";
    })
    .catch(function () {
      swal("OOPS!", "Invalid OTP!", "error");
    });
}

function saveData() {
  let pass = document.getElementById("pass").value;
  let confirmPass = document.getElementById("confirmPass").value;

  if (pass.length < 8) {
    swal("OOPS!", "Password Should have atleast 8 characters!", "error");
  } else if (pass != confirmPass) {
    swal("OOPS!", "Incorrect Confirm Password", "error");
  } else {
    $.post(
      "PHP/storeLoginData.php",
      {
        mobile: mobileNumber,
        pass: pass,
      },
      function (data) {
        if (data == 1) {
          swal("Success!", "Account created successfully!", "success");
          setInterval(function () {
            location.href = "login.html";
          }, 2000);
        } else {
          alert(data);
        }
      }
    );
  }
}
