<?php

session_start();

include("connection.php");
if(!isset($_SESSION['username'])){


}

if(isset($_POST['book'])){

  $venue = mysqli_real_escape_string($conn,$_POST['venue']);

  $date1=mysqli_real_escape_string($conn,$_POST['date1']);

  $date2=mysqli_real_escape_string($conn,$_POST['date2']);

  $id=mysqli_real_escape_string($conn,$_POST['id']);

    $deatils=mysqli_query($conn,"select * from events where event_id='$id'");

    $set=mysqli_fetch_array($deatils);

  $query = "SELECT * FROM booking WHERE venue = ? 
  AND start_date <= ? 
  AND end_date >= ?";

  $statement = $conn->prepare($query);
  $statement->bind_param("sss", $venue, $date1, $date2);
  $statement->execute();
  $conflictingBookings = $statement->get_result()->fetch_all(MYSQLI_ASSOC);


  // Determine if the venue is available
  if (empty($conflictingBookings)) {
    if ($set['status_1']=="accepted" and $set['status_2']=="accepted"){
        mysqli_query($conn,"insert into booking(venue, start_date, end_date) values('$venue', '$date1' ,'$date2')");
  $message="The venue is booked for you.";
}
else{
    $message="Status still pending";
}
  } else {
  $message="The venue is already booked for the selected date range.";
}

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Create Event</title>
    <link rel="stylesheet" href="create_event.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body>
<?php include("nav_bar2.php");?>
  <div class="container">
    <div class="title">Venue Booking</div>
    <div class="content">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="input-box">
          <select name="venue" required>
                <option value="">Select venue</option>
                <option value="s1">Seminar Hall 1</option>
                <option value="s2">Seminar Hall 2</option>
                <option value="i1">IOT LAb</option>
            </select>
          </div>
        <div class="user-details">
          <div class="input-box">
          <input type="date" id="date" name="date1" placeholder="Start Date" required>
          </div>
          </div>
          <div class="user-details">
          <div class="input-box">
          <input type="date" id="date" name="date2" placeholder="End Date" required>
          </div>
          </div>
          <div class="user-details">
          <div class="input-box">
          <input type="text" id="date" name="id" placeholder="Enter Event Id" required>
          </div>
          </div>
          <div class="button">
        <input type="submit" value="Book" name="book">
        <?php if (isset($message)) echo $message; ?>
        </div>
      </form>
    </div>
</body>
</html>