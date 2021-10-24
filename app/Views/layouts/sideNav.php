
<div class="container  col-md-3 " id="sidenav1" >

    <div class="d-flex  flex-column s flex-shrink-0 p-2 pt-0 text-white bg-dark" id="sidenav2">   
          <p class="  row mt-0">
            <span class="p-0 m-0   col-sm-9 navbarItem "></span>
            <span class=" p-2 mr-1 display-4 col-sm-2 " style="cursor:pointer;" onclick="toggleMenu()"> &#8801;</span>
          </p>  
        <div class="d-flex navbar align-items-center align-content-center">
            <a href="#" class="d-flex align-items-center text-center text-white text-decoration-none ml-3 ">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2 navbarItem">  
                <span class="fs-4 navbarItem">
                  
                   <?= session('user');?>
                  
                </span> 
                
            </a>
        </div>     

    <hr class="navbarItem">
    <h4 class="text-center navbarItem text-bold"> Users</h4>
    <ul class="nav nav-pills navbarItem flex-column mb-auto">
      <li class="nav-item">
        <a href="new-user" class="nav-link text-white active" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          New
        </a>
      </li>
      
      <li class="nav-item">
        <a href="/all-users" class="nav-link text-white " >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          All Users
        </a>
      </li>
     <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Registration complete
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Registration Pending
        </a>
      </li>
       <li>
        <a href="trashed-users" class="nav-link text-white">
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
    </ul>
    <hr class="navbarItem">
    <div class="text-center navbarItem">     
     <a class="text-white " href="/logout">Sign out</a>
    </div>
  </div>

</div>

<script>
    var nav_bar_items = document.getElementsByClassName('nav-link');
    for (var i = 0; i < nav_bar_items.length; i++) {
          var item = nav_bar_items[i];
          item.addEventListener('click', toggleActiveClass);
        }
    function toggleActiveClass(e) {       
        for (var i = 0; i < nav_bar_items.length; i++) {
          var item = nav_bar_items[i];
          item.classList.remove("active");
        }
        e.target.classList.toggle('active');
       
	  }

 </script>
