<?php
// Get the form input attributes
if(isset($_POST["submit"])){


$attribute1 = $_POST['attribute1'];
$attribute2 = $_POST['attribute2'];
// ...

// Construct the command to execute the Python script
$command = "python3 recommendation.py '$attribute1' '$attribute2'";

// Execute the Python script and capture the output
$output = exec($command);
// Display the recommendations to the user
echo $output;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Venue Recommendation Form</title>
</head>
<body>
    <h1>Venue Recommendation Form</h1>

    <form action="recommendation.php" method="post">
        <label for="attribute1">Attribute 1:</label>
        <input type="text" name="attribute1" id="attribute1" required><br><br>

        <label for="attribute2">Attribute 2:</label>
        <input type="text" name="attribute2" id="attribute2" required><br><br>

        <!-- Add more attribute fields as needed -->

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>