function tableChange(tablename) {
	
	
	if(tablename==="messages"){

		document.querySelector(".nav-messages").classList.add("active")
        document.querySelector(".nav-cancelled").classList.remove("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-settings").classList.remove("active")

         // for changing main content

         document.querySelector(".messages").style.display = "block"
         document.querySelector(".cancelled").style.display = "none"
         document.querySelector(".orders").style.display = "none"
         document.querySelector(".delivered").style.display = "none"
         document.querySelector(".settings").style.display = "none"

	}
    else if(tablename==="cancelled")
    {
        document.querySelector(".nav-messages").classList.remove("active")
        document.querySelector(".nav-cancelled").classList.add("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-settings").classList.remove("active")

         // for changing main content

         document.querySelector(".messages").style.display = "none"
         document.querySelector(".cancelled").style.display = "block"
         document.querySelector(".orders").style.display = "none"
         document.querySelector(".delivered").style.display = "none"
         document.querySelector(".settings").style.display = "none"
		
    }
    else if(tablename==="orders")
    {
        document.querySelector(".nav-messages").classList.remove("active")
        document.querySelector(".nav-cancelled").classList.remove("active")
		document.querySelector(".nav-orders").classList.add("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-settings").classList.remove("active")

         // for changing main content

         document.querySelector(".messages").style.display = "none"
         document.querySelector(".cancelled").style.display = "none"
         document.querySelector(".orders").style.display = "block"
         document.querySelector(".delivered").style.display = "none"
         document.querySelector(".settings").style.display = "none"
    }
    else if(tablename==="delivered")
    {
        document.querySelector(".nav-messages").classList.remove("active")
        document.querySelector(".nav-cancelled").classList.remove("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.add("active")
		document.querySelector(".nav-settings").classList.remove("active")

         // for changing main content

         document.querySelector(".messages").style.display = "none"
         document.querySelector(".cancelled").style.display = "none"
         document.querySelector(".orders").style.display = "none"
         document.querySelector(".delivered").style.display = "block"
         document.querySelector(".settings").style.display = "none"
    }
    else if(tablename==="settings")
    {
        document.querySelector(".nav-messages").classList.remove("active")
        document.querySelector(".nav-cancelled").classList.remove("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-settings").classList.add("active")

         // for changing main content

         document.querySelector(".messages").style.display = "none"
         document.querySelector(".cancelled").style.display = "none"
         document.querySelector(".orders").style.display = "none"
         document.querySelector(".delivered").style.display = "none"
         document.querySelector(".settings").style.display = "block"
    }
   

}
function logout()
{
    window.location.href = 'logout.php'
}