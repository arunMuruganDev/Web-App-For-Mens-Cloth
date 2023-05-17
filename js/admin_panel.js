function tableChange(tablename) {
	
	
	if(tablename==="admin"){

		document.querySelector(".nav-admin").classList.add("active")
		document.querySelector(".nav-home").classList.remove("active")
		document.querySelector(".nav-customers").classList.remove("active")
		document.querySelector(".nav-messages").classList.remove("active")

	    document.querySelector(".nav-add_product").classList.remove("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-logout").classList.remove("active")

	}
    else if(tablename==="home")
    {
        document.querySelector(".nav-admin").classList.remove("active")
		document.querySelector(".nav-home").classList.add("active")
		document.querySelector(".nav-customers").classList.remove("active")
		document.querySelector(".nav-messages").classList.remove("active")

	    document.querySelector(".nav-add_product").classList.remove("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-logout").classList.remove("active")

        
        // for changing main content
        document.querySelector(".home").style.display = "block"
		document.querySelector(".customers").style.display = "none"
		document.querySelector(".messages").style.display = "none"
	    document.querySelector(".add_product").style.display = "none"
		document.querySelector(".orders").style.display = "none"
		document.querySelector(".delivered").style.display = "none"
		
    }
    else if(tablename==="customers")
    {
        document.querySelector(".nav-admin").classList.remove("active")
		document.querySelector(".nav-home").classList.remove("active")
		document.querySelector(".nav-customers").classList.add("active")
		document.querySelector(".nav-messages").classList.remove("active")

	    document.querySelector(".nav-add_product").classList.remove("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-logout").classList.remove("active")

        // for changing main content
        document.querySelector(".home").style.display = "none"
        document.querySelector(".customers").style.display = "block"
        document.querySelector(".messages").style.display = "none"
        document.querySelector(".add_product").style.display = "none"
        document.querySelector(".orders").style.display = "none"
        document.querySelector(".delivered").style.display = "none"
    }
    else if(tablename==="messages")
    {
        document.querySelector(".nav-admin").classList.remove("active")
		document.querySelector(".nav-home").classList.remove("active")
		document.querySelector(".nav-customers").classList.remove("active")
		document.querySelector(".nav-messages").classList.add("active")

	    document.querySelector(".nav-add_product").classList.remove("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-logout").classList.remove("active")

        // for changing main content
        document.querySelector(".home").style.display = "none"
        document.querySelector(".customers").style.display = "none"
        document.querySelector(".messages").style.display = "block"
        document.querySelector(".add_product").style.display = "none"
        document.querySelector(".orders").style.display = "none"
        document.querySelector(".delivered").style.display = "none"
    }
    else if(tablename==="add_product")
    {
        document.querySelector(".nav-admin").classList.remove("active")
		document.querySelector(".nav-home").classList.remove("active")
		document.querySelector(".nav-customers").classList.remove("active")
		document.querySelector(".nav-messages").classList.remove("active")

	    document.querySelector(".nav-add_product").classList.add("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-logout").classList.remove("active")

        // for changing main content
        document.querySelector(".home").style.display = "none"
        document.querySelector(".customers").style.display = "none"
        document.querySelector(".messages").style.display = "none"
        document.querySelector(".add_product").style.display = "block"
        document.querySelector(".orders").style.display = "none"
        document.querySelector(".delivered").style.display = "none"
    }
    else if(tablename==="orders")
    {
        document.querySelector(".nav-admin").classList.remove("active")
		document.querySelector(".nav-home").classList.remove("active")
		document.querySelector(".nav-customers").classList.remove("active")
		document.querySelector(".nav-messages").classList.remove("active")

	    document.querySelector(".nav-add_product").classList.remove("active")
		document.querySelector(".nav-orders").classList.add("active")
		document.querySelector(".nav-delivered").classList.remove("active")
		document.querySelector(".nav-logout").classList.remove("active")

        // for changing main content
        document.querySelector(".home").style.display = "none"
        document.querySelector(".customers").style.display = "none"
        document.querySelector(".messages").style.display = "none"
        document.querySelector(".add_product").style.display = "none"
        document.querySelector(".orders").style.display = "block"
        document.querySelector(".delivered").style.display = "none"
    }
    else if(tablename==="delivered")
    {
        document.querySelector(".nav-admin").classList.remove("active")
		document.querySelector(".nav-home").classList.remove("active")
		document.querySelector(".nav-customers").classList.remove("active")
		document.querySelector(".nav-messages").classList.remove("active")

	    document.querySelector(".nav-add_product").classList.remove("active")
		document.querySelector(".nav-orders").classList.remove("active")
		document.querySelector(".nav-delivered").classList.add("active")
		document.querySelector(".nav-logout").classList.remove("active")

        // for changing main content
        document.querySelector(".home").style.display = "none"
        document.querySelector(".customers").style.display = "none"
        document.querySelector(".messages").style.display = "none"
        document.querySelector(".add_product").style.display = "none"
        document.querySelector(".orders").style.display = "none"
        document.querySelector(".delivered").style.display = "block"
    }
   

}
function logout()
{
    window.location.href = 'PHP/admin_logout.php'
}