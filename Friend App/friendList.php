<?php
@include_once 'connection.php';
session_start();
if (isset($_SESSION['friendID'])) {
    $friendID = $_SESSION['friendID'];
    $select = "SELECT * FROM myfriends where friendID_1 = '$friendID'";
    $result = mysqli_query($connect, $select);
    $numberOfFriends = mysqli_num_rows($result);

    $update = "UPDATE friends SET numberOfFriends = '$numberOfFriends' WHERE friendID ='$friendID';";
    mysqli_query($connect, $update);

    $selectTotal = "SELECT * FROM friends WHERE friendID <> $friendID AND friendID IN 
                                (SELECT friendID_2 FROM myfriends where friendID_1 = $friendID);";

    $totalResult = mysqli_query($connect, $selectTotal);

    $totalFriends = mysqli_num_rows($totalResult);

    if ((!isset($_POST['prev'])) && (!isset($_POST['next'])) && (!isset($_GET['deleted']))) {
        $start = $_SESSION['start'] = 0;
    } else {
        $start = $_SESSION['start'];
    }

    if (isset($_POST['prev'])) {
        $start -= 5;
        if($start<0){
            $start=0;
        }
        $_SESSION['start'] = $start;
    }
    if (isset($_POST['next'])) {
        $start += 5;
        if($start>$totalFriends-1){
            $start=$totalFriends-1;
        }
        $_SESSION['start'] = $start;
    }
}




if (isset($_POST['addFriends'])) {
    header('location:addFriend.php');
} elseif (isset($_POST['logout'])) {
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
    <section class="friendList">
        <div class="table-container">
            <h1>
                <?php
                if (isset($_SESSION['profileName'])) {
                    echo $_SESSION['profileName'] . "'s Friend List";
                }
                ?>
            </h1>
            <h3>
                <?php
                echo "Total number of friends is " . $numberOfFriends;
                ?>
            </h3>



            <table>
                <?php

                $myFriends = "SELECT * FROM friends WHERE friendID <> $friendID AND friendID IN 
                     (SELECT friendID_2 FROM myfriends where friendID_1 = $friendID) 
                     LIMIT 5 OFFSET $start; ";

                $selectMyFriends = mysqli_query($connect, $myFriends);

                if ($totalFriends > 0) {
                    if (mysqli_num_rows($selectMyFriends) > 0) {
                        echo "  
                                <th>Name</th>
                                <th>Action</th>
                                ";
                        while ($row = mysqli_fetch_assoc($selectMyFriends)) {
                            $profileName = $row['profileName'];
                            $friendID2 = $row['friendID'];
                            echo "  <tr>
                                            <td>$profileName</td>
                                            <td>
                                            <a href='updateFriend.php?friendID_2=$friendID2'><button>Remove Friend</button></a>
                                            </td>
                                            
                                        </tr>   ";
                        }
                    }
                } else {
                    echo "<h1>No Friends Yet!</h1>";
                }


                ?>



            </table>
            <form method="post">
                <?php
                if ($start > 0) {
                    echo '<a href="addFriend.php"><input id="prevbtn" type="submit" name="prev" value="Prev"></a>';
                }
                if ($start <= $totalFriends - 5) {
                    echo '<a href="addFriend.php"><input id="nextbtn" type="submit" name="next" value="Next"></a>';
                }
                ?>
                <br><input type="submit" name="addFriends" value="Add Friends">
                <input type="submit" name="logout" value="Log Out">
            </form>
        </div>
    </section>

</body>

</html>