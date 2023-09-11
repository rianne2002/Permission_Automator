<?php 
    session_start();

    include("connection.php");

    if(isset($_POST['submit'])){

        $username=mysqli_real_escape_string($conn,$_POST['username']);

        $password=mysqli_real_escape_string($conn, $_POST['password']); 

        $password=md5($password);

        $result=mysqli_query($conn, "select * from users where username='$username' and password='$password'");
    
        if(!empty($result)){

            if ($row = mysqli_fetch_array($result)) {

                if($row['role']=="student"){
            
                $_SESSION['username'] = $row['username'];
            
                $_SESSION['password'] = $row['password'];
            
                if(isset($_SESSION["password"])){

                    header("location: home.php");
                }
            }
            elseif($row['code']=="9999") {
            
                $_SESSION['username'] = $row['username'];
            
                $_SESSION['password'] = $row['password'];
            
                if(isset($_SESSION["password"])){

                    header("location: home3.php");
                }


            }
            else{
            
                $_SESSION['username'] = $row['username'];
            
                $_SESSION['password'] = $row['password'];
            
                if(isset($_SESSION["password"])){

                    header("location: home2.php");
                }


            }

            }
            
            
            else{
            
                $error_message="Invalid Details";
            
            }
        }
        
    }
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="log.css">
	<title>Sign In</title>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
				<h1>Sign In</h1>
				<input type="text" name="username" placeholder="Username" required/>
				<input type="password" name="password" placeholder="Password" required/>
				<button name="submit">Sign In</button>
                <?php if (isset($error_message)) echo $error_message; ?>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
                </div>
			</div>
		</div>
	</div>
</body>
</html>