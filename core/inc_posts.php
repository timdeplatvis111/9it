<?php

//connectie maken met de database
include 'inc_database.php';

//juiste gegevens uit de database ophalen
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    echo '<h1 id=message></h1>';

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
    
        $sqlVoten = "SELECT SUM(VoteValue) as sum FROM `userpostlikes` WHERE `PostUserLikeID` = ". $PostID ."";
        $count = $conn->query($sqlVoten);
        $rowcount = $count->fetch_assoc();

        $sum = $rowcount['sum'];
        echo '<p>' . $sum . '</p>';

        echo '<p id="PostContainerUserID"> UserID:'.$PostUserID.'</p> </div>';

        if (isset($_SESSION['Username'])) 
        {
        $sqlVote = "SELECT `VoteValue` FROM `userpostlikes` WHERE `UserLikeID` = ". $_SESSION['ID'] ." AND `PostUserLikeID` = ". $PostID ." ";
        $resultVote = $conn->query($sqlVote);
        $rowVote = $resultVote->fetch_assoc();
        
        if ($resultVote->num_rows > 0) 
        {   
            if($rowVote['VoteValue'] > 0) 
            {
                echo '<p> Upvoted! </p>';
            } 
            elseif ($rowVote['VoteValue'] < 0)
            {
                echo '<p> Downvoted! </p>';
            }
            echo '</div>';
            echo '</div>';
        } else
        {
            echo '<form action="core/upvote.php" method="POST">';
            echo '<input type="hidden" name="PostID" value='.$PostID.'">';
            echo '<input type="hidden" name="ID" value='.$_SESSION['ID'].'">';
            echo '<input type="submit" value="Upvote">';
            echo '</form>';
    
            echo '<form action="core/downvote.php" method="POST">';
            echo '<input type="hidden" name="PostID" value='.$PostID.'">';
            echo '<input type="hidden" name="ID" value='.$_SESSION['ID'].'">';
            echo '<input type="submit" value="Downvote">';
            echo '</form>';
        }
    }
}
}
?>