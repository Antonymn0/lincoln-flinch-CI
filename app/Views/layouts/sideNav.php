
<div class="container  col-md-3 side-nav-mobile " id="sidenav1" >

    <div class="d-flex  flex-column  flex-shrink-0 p-2 pt-0 text-white bg-dark side-nav-mobile" id="sidenav2">   
          <p class=" p-0 row m-0 d-flex justify-content-start">
            <span class="p-0 m-0    navbarItem "></span>
            <span class="  mr-2 display-4 col-sm-2 float-right" style="cursor:pointer;" onclick="toggleMenu()"> &#8801;</span>
          </p> 

        <div class="d-flex navbar align-items-center align-content-center sidenav1 nabvbarItem-mobile">
            <a href="#" class="d-flex align-items-center text-center text-white text-decoration-none ml-3 nabvbarItem-mobile">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2 navbarItem nabvbarItem-mobile">  
                <span class="fs-4 navbarItem">
                 
                   <?= session()->get('name');?> 
                  
                </span>                
            </a>
        </div>     

    <hr class="navbarItem  nabvbarItem-mobile">
    
    <ul class="nav  nav-pills navbarItem nabvbarItem-mobile flex-column mb-auto sidenav1">
      <li class="nav-item">
        <a href="/admin/dashboard" class="nav-link text-white active" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/admin-new-user" class="nav-link text-white " >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          New user
        </a>
      </li>
      
      <li class="nav-item">
        <a href="/admin/users/all" class="nav-link text-white " >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          All Users
        </a>
      </li>
     <li>
        <a href="/admin/users/complete" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Registration complete
        </a>
      </li>
      <li>
        <a href="/admin/users/pending" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Registration Pending
        </a>
      </li>
       <li>
        <a href="/admin/trashed-users" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Trash
        </a>
      </li>
      <li>
          <hr class="navbarItem">
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Inbox
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Notifications
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Settings
        </a>
      </li>
       <hr class="navbarItem">
      <li>
       
        <a class="text-white nav-link " href="/admin/logout" onclick="logOut(event)">Sign out</a>
      </li>
    </ul>
    
    <div class=" navbarItem">     
     
    </div>
  </div>

</div>

<script>
// toggle mobile menu
  function toggleMenu() {
		var navbarItems = document.getElementsByClassName('navbarItem');
		for (var i = 0; i < navbarItems.length; i++) {
			var item = navbarItems[i];
			item.classList.toggle("hidden");
			item.classList.toggle("nabvbarItem-mobile");
		}
		document.getElementById('sidenav1').classList.toggle('side-nav');
		document.getElementById('sidenav2').classList.toggle('side-nav');
	}
    //  add click events to nav bar links
    var nav_bar_items = document.getElementsByClassName('nav-link');
    for (var i = 0; i < nav_bar_items.length; i++) {
          var item = nav_bar_items[i];
          item.addEventListener('click', toggleActiveClass);
        }

        // toggle navbar acive class 
    function toggleActiveClass(e) {       
        for (var i = 0; i < nav_bar_items.length; i++) {
          var item = nav_bar_items[i];
          item.classList.remove("active");
        }
        e.target.classList.toggle('active');
       
	  }
    // logout 
    function logOut(e) { 
        if(!confirm("Do you want to logout?") ){
            e.preventDefault();
        }
       
	  }


 </script>
