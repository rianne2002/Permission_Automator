<?php 
    if(!isset($_SESSION['username'])){
    
        
    }
  ?>  
    
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #ccc;
}

.topnav {
  overflow: hidden;
  background: linear-gradient(to right,  #2c3972, #8783ed);

}

.topnav a {
  float: right;
  color: black;
  text-align: center;
  padding: 20px 16px;
  text-decoration: none;
  font-size: 17px;
  margin-right:30px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}
img{
    height:395px;
    padding-right: 30px;
 
}
.p1{
  padding-left: 20px;
  margin-right:650px;
  padding-top:50px;
  
}
.p2{
  padding-left: 20px;
  margin-right:650px;
}

</style>
</head>
<body>

<div class="topnav">

  <a href="logout.php"><b>Logout</b></a>

<a class="links" href="papprove.php"><b>Approve Events</b></a>

  <a class="active" href="home3.php"><b>Profile</b></a>

</div>

<div style="padding-left:16px">
  <h1>Hey Welcome!</h1>
  <img style="float: right" src="student.jpg" >
</div>
<p class="p1">With just a few clicks, you can easily create and manage your own events.  This feature allows you to fill out essential details such as event name, date, time, and duration. You can also specify the preferred venue, estimated number of attendees, and any special requirements you might have. Once submitted, your event will be reviewed and approved by the appropriate authorities.</p>
<p class="p2">Stay updated on the progress of your event by checking its status. You can find all the relevant information about your event, including its current approval stage, any pending requirements, and the status of the venue booking. Additionally, you can view any comments or feedback provided by the administrators, helping you stay informed and make necessary adjustments if needed.</p>
</body>
</html>