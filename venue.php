<?php

if(!isset($_SESSION['username'])){


}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $ac = $_POST['ac'];
    $indoor = $_POST['indoor'];
    $lab_fac = $_POST['lab_fac'];
    $p_count = $_POST['p_count'];
    $projector=$_POST['projector'];

    if ($ac == '1' && $indoor == '1' && $lab_fac == '0' && $p_count == '1' && $projector == '1') {
        $recommendedVenue = 'Seminar Hall 1';
    } elseif ($ac == '1' && $indoor == '1' && $lab_fac == '0' && $p_count == '1' && $projector == '1') {
        $recommendedVenue = 'Seminar Hall 2';
    } elseif ($ac == '1' && $indoor == '1' && $lab_fac == '1' && $p_count == '1' && $projector == '1') {
        $recommendedVenue = 'IOT Lab';
    } else {
        $recommendedVenue = 'No suitable venue found.';
    }

    // Display the recommended venue within the form
    echo '<h2>Recommended Venue:</h2>';
    echo '<p>Recommended venue: ' . $recommendedVenue . '</p>';
}

// Display the form
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" href="venue.css">
</head>
<body>
<?php include("nav_bar2.php");?>
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="wifi">AC:</label>
    <select name="ac" id="ac">
        <option value="1">Available</option>
        <option value="0">Not available</option>
    </select>
    <br>
    <br>
    <label for="indoor">Indoor:</label>
    <select name="indoor" id="indoor">
        <option value="1">Available</option>
        <option value="0">Not available</option>
    </select>
    <br>
    <br>
    <label for="lab_fac">Lab Facilities:</label>
    <select name="lab_fac" id="lab_fac">
        <option value="1">YES</option>
        <option value="0">NO</option>
    </select>
    <br>
    <br>
    <label for="p_count">Participant Count Less than 150:</label>
    <select name="p_count" id="p_count">
        <option value="1">YES</option>
        <option value="0">NO</option>
    </select>
    <br>
    <br>
    <label for="projector">Projector:</label>
    <select name="projector" id="projector">
        <option value="1">Available</option>
        <option value="0">Not availble</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Submit">
</form>
</div>
</body>
</html>