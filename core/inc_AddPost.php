<?php
session_start();
if (isset($_POST['submit'])) 
{
    include 'inc_database.php';
    
    $Titel = mysqli_real_escape_string($conn, $_POST["Titel"]);
    $Image = mysqli_real_escape_string($conn, $_POST["Image"]);
    $UserID = $_SESSION['ID'];
    
    //errorhandlers//
    //check for emty fields//
    
    if (empty($Titel) || empty($Image))
    {
        header("Location: ../index.php?input=emty");
        exit();
        
    }   
    
            else 
            {
                $sql = "SELECT * FROM posts WHERE Image='$Image'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0) 
                {
                    header("Location: ../index.php?Image=taken");
                    exit(); 
                } 
                else 
                {
                    //insert the Post into the database
                    $sql = "INSERT INTO `posts`(`PostUserID`, `Titel`, `Image`) VALUES ('$UserID', '$Titel', '$Image')";
                    mysqli_query($conn, $sql);
                    header("Location: ../index.php?AddPost=SUCC");
                    exit();
                }
            }
        }
    
 else 
 {
    header("Location: ../index.php?nietgesubmit");
    exit();
}