<?php
    include("connection.php");


    /*if(!isset($_SESSION['username'])){

    header('location:login.php');
    
  }*/


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
* {
	padding: 0;
	margin: 0;
	text-decoration: none;
	list-style: none;
	box-sizing: border-box;
}
.menu-btn {
  background: linear-gradient(to right,  #2c3972, #8783ed);
   color: black;
   padding: 16px;
   font-size: 20px;
   font-weight: bolder;
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   border: none;
}
.dropdown-menu {
   position: relative;
   display: inline-block;
}
.menu-content {
   display: none;
   position: absolute;
   background: linear-gradient(to right,  #2c3972, #8783ed);   min-width: 160px;
   z-index: 1;
}
nav{
    background: linear-gradient(to right,  #2c3972, #8783ed);
   }
.links,.links-hidden{
   display: inline-block;
   color: black;
   padding: 12px 16px;
   text-decoration: none;
   font-size: 18px;
   font-weight: bold;
}
.links-hidden{
   display: block;
}
.links{
   display: inline-block;
}
.links-hidden:hover,.links:hover {
  border-radius: 5px;
   background-color: white;
}
.dropdown-menu:hover .menu-content {
   display: block;
}
.dropdown-menu:hover .menu-btn {
   background-color: white;
}

</style>
</head>
<body>
<nav>
<a class="links" href="home.php"><b>Profile</b></a>
<a class="links" href="papprove.php"><b>Approve Events</b></a>
<a class="links" href="logout.php"><b>Logout</b></a>
</nav>
</body>
</html>