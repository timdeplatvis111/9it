<?php
//getting UserID from user table
$UserID = $_SESSION['ID'];

//connectie maken met de database
include 'inc_database.php';

//juiste gegevens uit de database ophalen
$sql = "SELECT * FROM posts WHERE PostUserID = '$UserID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $PostID = $row["PostID"];
        $Image = $row["Image"];
        $Titel = $row["Titel"];
        $PostUserID = $row["PostUserID"];

        echo '<div id="PostContainer">';
            echo '<div id="PostTitelContainer">'; 
                echo '<p>' . $Titel . ' </p> </div>';
                echo '<div id="PostImageContainer"> <img src="image/'. $Image . '"</div>';
                echo '<div id="PostInfoContainer"> <p id="PostContainerPostID"> PostID: '. $PostID . '</p>';
                echo '<p id="PostContainerUserID"> UserID:'.$PostUserID.'</p> </div>';
            echo '</div>';
        echo '</div>';
    }
}