<?php
//connectie maken met de database
include 'inc_database.php';

//get product id
if (isset ($_GET['id'])) {
    $PostID = $_GET['id'];
} else {
    echo "The apples have failed me!!";
}

if (isset($_POST['submit'])) {
    
                $sql = "SELECT * FROM posts WHERE PostID ='$PostID'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0) {
                    //delete product
                    $sql = "DELETE FROM `posts` WHERE PostID = '$PostID'";
                    mysqli_query($conn, $sql);
                    header("Location: ../profile.php?Post deletet");
                    exit();
                } else {
                    header("Location: ../profile.php?error.$PostID");
                    exit(); 
                    
                }
            }
    
 else {
    header("Location: ../profile.php?nietgesubmit");
    exit();
}