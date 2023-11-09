<?php
    @include_once 'connection.php';
    session_start();

    if(isset($_SESSION['friendID'])){
        $friendID = $_SESSION['friendID'];
        $select = "SELECT * FROM myfriends where friendID_1 = '$friendID'";
        $result = mysqli_query($connect,$select);
        $numberOfFriends = mysqli_num_rows($result);

        $update = "UPDATE friends SET numberOfFriends = '$numberOfFriends' WHERE friendID ='$friendID';";
        mysqli_query($connect,$update);

        $selectTotal = "SELECT * FROM friends WHERE friendID <> $friendID AND friendID NOT IN 
                                (SELECT friendID_2 FROM myfriends where friendID_1 = $friendID);";

        $totalResult = mysqli_query($connect,$selectTotal);
                    
        $totalFriends = mysqli_num_rows($totalResult);

        if( (!isset($_POST['prev'])) && (!isset($_POST['next'])) && (!isset($_GET['added'])) ){
            $start = $_SESSION['start'] = 0;
        }
        else{
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

    

    if(isset($_POST['friendList'])){
        header('location:friendList.php');
    }

    if(isset($_POST['logout'])){
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
    <section class="addFriend">
        <div class="table-container">
            <h1>
                <?php
                    if(isset($_SESSION['profileName'])){
                        echo $_SESSION['profileName']."'s Add Friends Page";
                    }
                ?>
            </h1>
            <h3>
                <?php
                    echo "You have ".$numberOfFriends." Friends";
                ?>
            </h3>



            <table>
                <?php
                    if($start<0 || $start> $totalFriends){
                        if($start<0){
                            $start=$_SESSION['start']=0;
                        }
                        else{
                            $start=$_SESSION['start']=$totalFriends;
                        }
                    }
                    $friends = "SELECT * FROM friends WHERE friendID <> $friendID AND friendID NOT IN 
                                (SELECT friendID_2 FROM myfriends where friendID_1 = $friendID) 
                                LIMIT 5 OFFSET $start;";

                    $selectFriends = mysqli_query($connect,$friends);


                    
                    if($totalFriends>0){
                        echo "  
                            <th>Name</th>
                            <th>Action</th>
                            ";
                        while($row= mysqli_fetch_assoc($selectFriends)){
                            echo "  <tr>
                                        <td>$row[profileName]</td>
                                        <td>
                                        <a href='updateFriend.php?friendID2=$row[friendID]'><button>Add Friend</button></a>
                                        </td>
                                    </tr>   ";
                        }
                    }
                ?>

                
                
                
            </table>

            <form method="post">
            <?php
                if($start>=5){
                    echo '<a href="addFriend.php"><input id="prevbtn" type="submit" name="prev" value="Prev"></a>';
                }
                if($start<=$totalFriends-5){
                    echo '<a href="addFriend.php"><input id="nextbtn" type="submit" name="next" value="Next"></a>';
                }
            ?>
                
                <br><input type="submit" name="friendList" value="Friend List">
                <input type="submit" name="logout" value="Log Out">
            </form>
        </div>
    </section>
    
</body>
</html>