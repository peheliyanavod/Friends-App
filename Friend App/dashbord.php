<?php
    @include_once 'connection.php';
    session_start();

    if(isset($_POST['addFriends'])){
        header('location:addFriend.php');
    }
    elseif(isset($_POST['logout'])){
        header('location:home.php');
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
    <section class="dashbord">
        <div class="form-container">
            <h1>
                <?php
                if(isset($_SESSION['profileName'])){
                    echo $_SESSION['profileName']."'s Friends Page";
                }
                ?>
            </h1>
            <h3>
            <?php
                if(isset($_SESSION['friendID'])){
                    $friendID = $_SESSION['friendID'];

                    $select = "SELECT * FROM friends where friendID = '$friendID'";
                    $result = mysqli_query($connect,$select);

                    if(mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_assoc($result);
                        $numberOfFriends = $row['numberOfFriends'];
                        echo "Total number of friends is ".$numberOfFriends;
                    }

                }
                ?>
            </h3>

            
            <form method="post">
                <input type="submit" name="addFriends" value="Add Friends">
                <input type="submit" name="logout" value="Log Out">
            </form>
        </div>
    </section>
    
</body>
</html>