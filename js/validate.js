const btn = document.querySelector("#btn");

btn.addEventListener("click",(e)=>{

    // alert("hi")
const name = document.getElementById("name").value 
const mobile = document.getElementById("mobile").value 
const pincode = document.getElementById("pincode").value 
const state = document.getElementById("state").value 

const address = document.getElementById("address").value 

const quantity = document.getElementById("quantity").value 
const price = document.getElementById("price").value 

const pid = document.getElementById("pid").value 
const cid = document.getElementById('cid').value

const size = document.getElementById("size").value;

if(!name)
{
    swal("OOPS!","Enter your name","error")
}
else if(mobile.length<10 || mobile.length>10)
{
    swal("OOPS!","Enter a valid mobile number","error")
}
else if(!pincode)
{
    swal("OOPS!","Enter your pincode","error")
}
else if(!state)
{
    swal("OOPS!","Enter your State","error")
}

else if(!address)
{
    swal("OOPS!","Enter your address","error")
}
else{

    $.post(
        "store_order_data.php",
        {
            name : name,
            mobile: mobile,
            pincode : pincode,
            state : state,
            address : address,
            size : size,
            quantity : quantity,
            price : price,
            pid : pid,
            cid : cid 
        },
        function (data) {
          if (data == 1) {
            swal("CONGRATS!", "Order Placed Successfully!", "success");
            setInterval(function () {
              location.href = "search_products.php";
            }, 2000);
          } else {
            alert(data);
          }
        }
      );

}


 

})
