<?php

    session_start();

    include("connection.php");

    if(!isset($_SESSION['username'])){

    
    }

    $result=mysqli_query($conn, "select * from events where status_1='accepted' && status_2='pending'");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>	
    <link rel="stylesheet" href="vv.css">
</head>
<body>
<?php include("nav_bar3.php");?>

<div class="container">

    <table border="1px" class="center">
        <thead>
            <tr>
                <th>Event Id</th>
                <th>Event name</th>
                <th>Start Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(empty($result)){

                    echo '<tr>No data found</tr>';

                }
                else{

                    $i=0; while($row = mysqli_fetch_array($result)){
            
            ?>
            <tr>
                <td><?php echo $row['event_id']; ?></td>
                <td><?php echo $row['event_name']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><a href="papproval.php?event_id=<?php echo $row["event_id"]; ?>">Pending</a></td>
            </tr>

            <?php $i++;}}?>
              
        </tbody>
    </table>
</body>
</html>