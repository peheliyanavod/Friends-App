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
                    
    }




    if(isset($_GET['friendID2'])){
        $friendID2 = $_GET['friendID2'];
        
        $insert = "INSERT INTO myfriends(friendID_1, friendID_2) VALUES ('$friendID','$friendID2');";
        mysqli_query($connect,$insert);

        $update = "UPDATE friends SET numberOfFriends = '$numberOfFriends' WHERE friendID ='$friendID';";
        mysqli_query($connect,$update);

        header('location:addFriend.php?added');

    }

    if(isset($_GET['friendID_2'])){
        $friendID_2 = $_GET['friendID_2'];
        
        $delete = "DELETE FROM myfriends WHERE friendID_1 = '$friendID' AND friendID_2 = '$friendID_2' ;";
        mysqli_query($connect,$delete);

        $update = "UPDATE friends SET numberOfFriends = '$numberOfFriends' WHERE friendID ='$friendID';";
        mysqli_query($connect,$update);

        header('location:friendList.php?deleted');

    }

?>