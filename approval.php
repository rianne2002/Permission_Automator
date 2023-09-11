<?php
    
    session_start();

    include("connection.php");
    if(!isset($_SESSION['username'])){

    
    }

    $result3=mysqli_query($conn,"select code from users where username='".$_SESSION['username']."'");

    $row3 = mysqli_fetch_array($result3);

    $result=mysqli_query($conn, "select * from events where event_id='".$_GET['event_id']."'");

    $row = mysqli_fetch_array($result);

    if(isset($_POST['accept'])){

        $x="accepted";

        mysqli_query($conn, "update events set status_1='$x' where event_id='".$_GET['event_id']."'");

         echo $message="Modified successfully";

    }
    elseif(isset($_POST['reject'])){

        $x="rejected";

        mysqli_query($conn, "update events set status_1='$x' and status_2='$x' where event_id='".$_GET['event_id']."'");

         echo $message="Modified successfully";

    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>update request</title>
        <link rel="stylesheet" href="approval.css">
    </head>
    <body>
<?php include("nav_bar.php");?>
<div class="container">
        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
            <h1 align="center">Event Details</h1>

            <label>Event Name :</label>
            <?php echo $row["event_name"]; ?>
<br>
            <label>Event Host :</label>
            <?php echo $row['event_host'];?>
            <br>
            <label>Start Date :</label>
            <?php echo $row['start_date'];?>
            <br>
            <label>End Date :</label>
            <?php echo $row['end_date'];?>
            <br>
            <label>Start Time :</label>
            <?php echo $row['start_time'];?>
            <br>
            <label>End Time :</label>
            <?php echo $row['end_time'];?>
            <br>
            <label>Fee :</label>
            <?php echo $row['fee'];?>
            <br>
            <label>Participant Count :</label>
            <?php echo $row['p_count'];?>
            <br>
            <label>Speaker Name :</label>
            <?php echo $row['speaker'];?>
            <br>
            <label>Representative :</label>
            <?php echo $row['rep'];?>
            <br>
            <label>Contact Details :</label>
            <?php echo $row['acc'];?>
            <br>
            <label>Accompanying Faculty :</label>
            <?php echo $row['mobile'];?>
            <br>
            <label>Description :</label>
            <?php echo $row['descr'];?>
            <br>
            <input type="submit" value="accept" class="button" name="accept">
            <input type="submit" value="reject" class="button" name="reject">

            <br>
            <br>
            <a href="nav_bar.php" class="cancel">Cancel</a>
        </form>
</div>
    </body>
</html>