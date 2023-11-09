<?php
    @include_once 'connection.php';
    if(isset($_POST['register'])){
        $email = mysqli_real_escape_string($connect,$_POST['email']);
        $profileName = mysqli_real_escape_string($connect,$_POST['profileName']);
        $password = mysqli_real_escape_string($connect,$_POST['password']);
        $cpassword = mysqli_real_escape_string($connect,$_POST['cpassword']);


        $userChecksql = "SELECT * FROM friends where friendEmail= '$email';";
        $userCheck = mysqli_query($connect,$userChecksql);

        if(mysqli_num_rows($userCheck)>0){
            $error[]="Email Already Used";
        }
        elseif($password!=$cpassword){
            $error[]="Password Doesn't Match";
        }
        else{
            $insert = "INSERT INTO friends(friendEmail, profileName, password) VALUES ('$email','$profileName','$password');";
            mysqli_query($connect,$insert);
            header('location:home.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="register">
        <div class="form-container">
            <h1>Register</h1>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="email" >Email</label></td>
                        <td><input type="email" name="email"  required><br></td>
                    </tr>
                    <tr>
                        <td><label for="profileName" >Profile Name</label></td>
                        <td><input type="text" name="profileName"  required><br></td>
                    </tr>
                    <tr>
                        <td><label for="password" >Password</label></td>
                        <td><input type="password" name="password"  required><br></td>
                    </tr>
                    <tr>
                        <td><label for="cpassword" >Confirm Password</label></td>
                        <td><input type="password" name="cpassword"  required><br></td>
                    </tr>
                </table>
                <br>
                <input id="regbtn" type="submit" name="register" value="Register">
            </form>
        </div>
    </section>
    
</body>
</html>