<?php

    session_start();

    include("connection.php");

    if(isset($_POST['submit'])){

        $first_name = mysqli_real_escape_string($conn,$_POST['first_name']);

        $last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
 
        $username=mysqli_real_escape_string($conn,$_POST['username']);
 
        $code=mysqli_real_escape_string($conn,$_POST['code']);
 
        $email=mysqli_real_escape_string($conn,$_POST['email']);

        $role=mysqli_real_escape_string($conn,$_POST['role']);
 
        $password=mysqli_real_escape_string($conn,$_POST['password']);    

        $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);

        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

        $password_strong = preg_match($password_regex, $password);

        if($password_strong==0){

            $password_error2="Password must contain at least one number, one uppercase letter, one lowercase letter, one special character, and at least 8 or more characters";

        }

        $password=md5($password);

        $cpassword=md5($cpassword);

        if(!preg_match("/^[a-zA-Z]+$/",$first_name)){

            $first_name_error="Name must contain only alphabets and spaces";

        }
        if(!preg_match("/^[a-zA-Z]+$/",$last_name)){

            $last_name_error="Name must contain only alphabets and spaces";

        }
        if(strlen($username)<6){

            $username_error="Username must contain atleast 6 characters";

        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

            $email_error="Invalid Email";

        }
        if($password!=$cpassword){

            $cpassword_error="Password and confirm password do not match";
        
        }
        if($password_strong && $password==$cpassword && filter_var($email,FILTER_VALIDATE_EMAIL) && strlen($username)>6 && preg_match("/^[a-zA-Z]+$/",$last_name) && preg_match("/^[a-zA-Z]+$/",$first_name)){
            
            $query1 = mysqli_query($conn,"select username from users where username='$username'");

            $query2 = mysqli_query($conn,"select email from users where email='$email'");

            if(mysqli_num_rows($query1)!=0){

                $username_error2= "Username already exists";

            }

            elseif(mysqli_num_rows($query2)!=0){

                $email_error2= "Email already registered continue to login";

            }

            elseif($role=='faculty' && $code!='1234' && $code!='2345' && $code!='3456' && $code!='4567' && $code!='5678' && $code!='6789' && $code!='9999'){

              $code_error="Invalid Code";

            }

            else{

            mysqli_query($conn,"insert into users(first_name, last_name , username ,email, password, role,code) values('$first_name', '$last_name ', '$username', '$email','$password', '$role', '$code')");
            ?><h3 align="center">Registered Successfully<h3><?php

            }
        }

        mysqli_close($conn);

    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="user-details">
          <div class="input-box">
          <input type="text" id="fname" name="first_name" placeholder="First Name" required>
            <?php if (isset($first_name_error)) echo $first_name_error; ?>
          </div>
          <div class="input-box">
          <input type="text" id="lname" name="last_name" placeholder="Last Name" required>
            <?php if (isset($last_name_error)) echo $last_name_error; ?>
          </div>
          <div class="input-box">
          <input type="email" id="email" name="email" placeholder="Email" required>
            <?php if (isset($email_error)) echo $email_error; ?>
            <?php if (isset($email_error2)) echo $email_error2; ?>
          </div>
          <div class="input-box">
          <input type="text" id="uname" name="username" placeholder="Username" required>
            <?php if (isset($username_error)) echo $username_error; ?>
            <?php if (isset($username_error2)) echo $username_error2; ?>
            </div>
            <div class="input-box">
            <input type="password" id="pass" name="password"  placeholder="Password" required>
            <?php if (isset($password_error)) echo $password_error; ?>
            </div>
            <div class="input-box">
            <input type="password" id="cpass" name="cpassword" placeholder="Confirm Password" required>
            <?php if (isset($cpassword_error)) echo $cpassword_error; ?>
            </div>
            <div class="input-box">
          <select name="role" required>
                <option value="">Select Role</option>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
            </select>
          </div>
            <div class="input-box">
          <input type="password" id="code" name="code" placeholder="Enter secret code (Faculty Only)" required>
          <?php if (isset($code_error)) echo $code_error; ?>
            </div>
          </div>
          <div class="button">
        <input type="submit" value="Create" name="submit">
        </div>
        </div>
            <?php if (isset($password_error2)) echo $password_error2; ?>
      </form>
    </div>
</body>
</html>