<?php

    session_start();

    include("connection.php");

    if(!isset($_SESSION['username'])){
    
        
    }
    $result=mysqli_query($conn, "select user_id from users where username='".$_SESSION['username']."'");

    $row=mysqli_fetch_array($result);

    $id=$row[0];

    if(isset($_POST['submit'])){
       
        $event_name = mysqli_real_escape_string($conn,$_POST['event_name']);

        $event_host = mysqli_real_escape_string($conn,$_POST['event_host']);
 
        $start_date=mysqli_real_escape_string($conn,$_POST['start_date']);
 
        $end_date=mysqli_real_escape_string($conn,$_POST['end_date']);
 
        $start_time=mysqli_real_escape_string($conn,$_POST['start_time']);

        $end_time=mysqli_real_escape_string($conn,$_POST['end_time']);
 
        $fee=mysqli_real_escape_string($conn,$_POST['fee']);    

        $p_count=mysqli_real_escape_string($conn,$_POST['p_count']);

        $speaker=mysqli_real_escape_string($conn,$_POST['speaker']);

        $rep=mysqli_real_escape_string($conn,$_POST['rep']);

        $mobile=mysqli_real_escape_string($conn,$_POST['mobile']);

        $acc=mysqli_real_escape_string($conn,$_POST['acc']);

        $society=mysqli_real_escape_string($conn,$_POST['society']);

        $descr=mysqli_real_escape_string($conn,$_POST['descr']);

        mysqli_query($conn,"insert into events(event_name, event_host, start_date, end_date, start_time, end_time, fee, p_count, speaker, rep, mobile, acc, society, descr,user_id) values('$event_name', '$event_host' , '$start_date' ,'$end_date', '$start_time', '$end_time', '$fee', '$p_count', '$speaker', '$rep', '$mobile', '$acc', '$society', '$descr','$id')");

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
    <div class="title">Event Request</div>
    <div class="content">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="user-details">
          <div class="input-box">
          <input type="text" id="event_name" name="event_name" placeholder="Event Name" required>
          </div>
          <div class="input-box">
          <input type="text" id="event_host" name="event_host" placeholder="Event Host" required>
          </div>
          <div class="input-box">
            Start Date
          <input type="date" id="start_date" name="start_date" required>
          </div>
          <div class="input-box">
            End Date
          <input type="date" id="end_date" name="end_date" required>
          </div>
          <div class="input-box">
            Start Time
          <input type="time" id="start_time" name="start_time" required>
          </div>
          <div class="input-box">
            End Time
          <input type="time" id="end_time" name="end_time" required>
          </div>
            <div class="input-box">
          <input type="text" id="fee" name="fee" placeholder="Registration Fee" required>
            </div>
            <div class="input-box">
          <input type="text" id="p_count" name="p_count" placeholder="Participants Count" required>
            </div>
            <div class="input-box">
          <input type="text" id="speaker" name="speaker" placeholder="Speaker(If Any)" required>
            </div>
            <div class="input-box">
          <input type="text" id="rep" name="rep" placeholder="Student Representative" required>
            </div>
            <div class="input-box">
          <input type="text" id="mobile" name="mobile" placeholder="Contact Details" required>
            </div>
            <div class="input-box">
          <input type="text" id="acc" name="acc" placeholder="Accompanying Faculty" required>
            </div>
          </div>
            <div class="input-box">
          <select name="society" required>
                <option value="">Select Society</option>
                <option value="1234">IEEE</option>
                <option value="2345">IEDC</option>
                <option value="3456">ASME</option>
                <option value="4567">SAE</option>
                <option value="5678">NETX</option>
                <option value="6789">GDSC</option>
            </select>
          </div>
          <br>
          <div class="input-box">
          <textarea id="descr" name="descr" rows="3" cols="93" placeholder=" Description "></textarea>
            </div>
          <div class="button">
        <input type="submit" value="Create" name="submit">
        </div>
        </div>
      </form>
    </div>
</body>
</html>