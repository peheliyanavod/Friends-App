<?php
    @include_once 'connection.php';
    if(isset($_SESSION['friendID'])){
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Friends</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="home">
        <div class="details-container">
            <div class="title">
                <h1>My Friend System</h1>
            </div>
            <div class="details">
                <h2>Practical Exam</h2>
                <p>Name : HWPD Navod</p>
                <p>Student Number : SE/2020/013</p><br>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam, amet consequatur distinctio, 
                    voluptate harum ipsa ex ab corporis possimus magni facere molestiae deleniti sequi expedita 
                    nulla illum. Rem, expedita fugiat.</p>
            </div>
            <a href="register.php"><input type="submit"  name="register" value="Register"></a>
            <a href="login.php"><input type="submit" name="login" value="Log In"></a>
                
            
            
        </div>
    </section>
</body>
</html>