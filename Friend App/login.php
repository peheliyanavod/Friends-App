<?php
    @include_once 'connection.php';
    session_start();

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($connect,$_POST['email']);
        $password = mysqli_real_escape_string($connect,$_POST['password']);

        $userChecksql = "SELECT * FROM friends where friendEmail= '$email' and password ='$password';";
        $userCheck = mysqli_query($connect,$userChecksql);

        if(mysqli_num_rows($userCheck)>0){
            $row = mysqli_fetch_assoc($userCheck);
            $_SESSION['profileName']=$row['profileName'];
            $_SESSION['friendID']=$row['friendID'];
            header('location:dashbord.php');
            
        }
        else{
            $error[]="Invalid Email Or Password";
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
            <h1>Log In</h1>
            <?php
                if(isset($error)){
                    foreach($error as $e){
                        echo '<span class="error-msg">'.$e.'</span>';
                    }
                }
            ?>
            <form method="post">
                <table>
                    <tr>
                        <td><label for="email" >Email</label></td>
                        <td><input type="email" name="email"  required><br></td>
                    </tr>
                    <tr>
                        <td><label for="password" >Password</label></td>
                        <td><input type="password" name="password"  required><br></td>
                    </tr>  
                </table>
                <br>
                <input id="loginbtn" type="submit" name="login" value="Log In">
            </form>
        </div>
    </section>
    
</body>
</html>