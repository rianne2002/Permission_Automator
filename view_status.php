<?php

session_start();

include("connection.php");


if(!isset($_SESSION['username'])){

  
}
    $result=mysqli_query($conn, "select user_id from users where username='".$_SESSION['username']."'");

    $row=mysqli_fetch_array($result);

    $data=mysqli_query($conn,"select * from events where user_id=$row[0]");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>view_events</title>
        <link rel="stylesheet" href="vv.css">
    </head>
    <body>
    <?php include("nav_bar2.php");?>

    <br>
    <br>
    <div class="container">
        <table border="1px" align="center">
        <thead>
            <tr>
                <th>Event_id</th>
                <th>Event name</th>
                <th>Start Date</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; while($row = mysqli_fetch_array($data)){
                if ($row['status_2']=="accepted"){
                    $v_id=$row['event_id'];
                }
                else{
                    $v_id="0";
                }?>
                <tr>
                    <td><?php echo $v_id ?></td>
                    <td><?php echo $row['event_name']; ?></td>
                    <td><?php echo $row['start_date']; ?></td>
                    <td><?php echo $row['status_2']; ?></td>
                </tr>
            <?php $i++;}?>
        </tbody>
    </table>
    </div>
    </body>
</html>