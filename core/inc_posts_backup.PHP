<?php

//connectie maken met de database
include 'inc_database.php';

//juiste gegevens uit de database ophalen
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    echo '<h1 id=message></h1>';
    $i = 0;
    $x = 0;

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

                //$sql = "select sum(VoteValue) from userpostlikes";

                //$q = mysqli_query($conn, $sql);
                //$row = mysqli_fetch_array($q);

                //echo 'Sum: ' . $row[0];

                ?>
       </div>
        <?php 
        
        $sqlVote = "SELECT `VoteValue` FROM `userpostlikes` WHERE `UserLikeID` = ". $_SESSION['ID'] ." AND `PostUserLikeID` = ". $PostID ." ";
        $resultVote = $conn->query($sqlVote);
        $rowVote = $resultVote->fetch_assoc();
        
        if ($resultVote->num_rows > 0) 
        {
            if($rowVote['VoteValue'] == "1") 
            {
                ?>
                <h1> YOOOOOOOOO </h1>
                <!--<form id="downvote-form-<?php //echo $x; ?>" method="post" action="core/downvote.php">
                    <input type="hidden" value="<?php //echo $PostID; ?>" name="PostID">
                    <input type="hidden" value="<?php //echo $_SESSION['ID']; ?>" name="ID">
                    <input name="downvote" value="Downvote" type="submit">
                </form>
                -->
                <!--
                <script> 
                $("#downvote-form-<?php //echo $x; ?>").submit(function(e) 
                {
                    var form = $(this);
                    var url = form.attr('action');
                    #$.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(), // serializes the form's elements.
                        success: function(data)
                        #{
                            $('#message').text(data); // show response from the php script.
                        #}
                        #});
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                });
                </script>
                -->
                <?php
            } elseif($rowVote['VoteValue'] == "-1") 
            {
                ?>
                <!--
                <form id="upvote-form-<?php echo $i; ?>" method="post" action="core/upvote.php">
                    <input type="hidden" value="<?php echo $PostID; ?>" name="PostID">
                    <input type="hidden" value="<?php echo $_SESSION['ID']; ?>" name="ID">
                    <input name="upvote" value="Upvote" type="submit">
                </form>
                -->
                <!--
                <script> 
            $("#upvote-form-<?php //echo $i; ?>").submit(function(e) 
            {
                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#message').text(data); // show response from the php script.
                    }
                    });
                e.preventDefault(); // avoid to execute the actual submit of the form.
            });
            </script>
            -->
                <?php
            }

        } else 
        {
            ?>
            <form id="upvote-form-<?php echo $i; ?>" method="post" action="core/upvote.php">
                <input type="hidden" value="<?php echo $PostID; ?>" name="PostID">
                <input type="hidden" value="<?php echo $_SESSION['ID']; ?>" name="ID">
                <input name="upvote" value="Upvote" type="submit">
            </form>

            <form id="downvote-form-<?php echo $x; ?>" method="post" action="core/downvote.php">
                <input type="hidden" value="<?php echo $PostID; ?>" name="PostID">
                <input type="hidden" value="<?php echo $_SESSION['ID']; ?>" name="ID">
                <input name="downvote" value="Downvote" type="submit">
            </form>

            <script> 
            $("#upvote-form-<?php echo $i; ?>").submit(function(e) 
            {
                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#message').text(data); // show response from the php script.
                    }
                    });
                e.preventDefault(); // avoid to execute the actual submit of the form.
            });

            $("#downvote-form-<?php echo $x; ?>").submit(function(e) 
            {
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $('#message').text(data); // show response from the php script.
                    }
                    });
                e.preventDefault(); // avoid to execute the actual submit of the form.
            });
            </script>

        </div>
        <?php
        }
        #$i++;
        #$x++;
    }
}
?>