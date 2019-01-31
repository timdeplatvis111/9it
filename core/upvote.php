<?php

session_start();

#if (isset($_POST['PostID'])) 
#{
    include 'inc_database.php';

    $ID = $_POST['ID'];
    $PostID = $_POST['PostID'];
    
    //$Votevalue = $_SESSION['Votevalue'];
    
    $sql = "SELECT * FROM userpostlikes";
    $result = mysqli_query($conn, $sql);
                
    //insert the Post into the database
    $sql = "INSERT INTO userpostlikes (PostUserLikeID , UserLikeID, VoteValue) VALUES ('$PostID', '$ID', '1')";
    mysqli_query($conn, $sql);

    echo $PostID;
    echo $ID;
    header("Location: ../index.php?error");
    
    exit();
#}
#
#{
#    echo "Fuck off jew";
#   header("Location: ../index.php?nietgesubmit");
#   exit();
#}

// Uit de session halen welke user er nu is ingelogd
// 