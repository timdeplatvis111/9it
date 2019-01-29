<?php

if (isset($_POST['submit'])) 
{
    include 'inc_database.php';
    
    $ID = mysqli_real_escape_string( $conn , $_POST['ID']);
    $Username = mysqli_real_escape_string( $conn , $_POST['Username']);
    $Email= mysqli_real_escape_string( $conn , $_POST['Email']);
    $Description = mysqli_real_escape_string( $conn , $_POST['Description']);
    $Password= mysqli_real_escape_string( $conn , $_POST['Password']);

    if (empty($Username)||empty($Email)||empty($Description)||empty($Password))
    {
		header("Location: ../index.php?signup=EmptyCheckFailed");
		exit();
    }
    else
    {
        $sql = "SELECT * FROM User WHERE Username = '$username'";
		$result = mysqli_query($conn , $sql);
        $resultCheck = mysqli_num_rows($result);
        
        if ($resultCheck > 0)
        {
            header("Location: ../index.php?signup=UserTaken");
            exit();
        }  
        else
        {
            $HashedPwd = password_hash($Password, PASSWORD_DEFAULT);
					
            $sql = "INSERT INTO user (ID , Username , Email , Description , Password) VALUES ('$ID','$Username','$Email','$Description','$HashedPwd');";
            
            mysqli_query($conn , $sql);
			header("Location: ../index.php?signup=SUCC");
            exit();
        }
    }
}





?>