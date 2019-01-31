<?php
// Include header!! 
include "core/header.php";

//checks if the user is logged in
if (!isset($_SESSION['ID'])) {
?>

    <!-- this is the page when you're logged out. -->
    <div id="index-container">

        <div id="post">
            <h1>You need to be logged in for this page.</h1>
        </div>

        <div id="info">
        </div>

    </div>

<?php
} else {

//getting UserID from user table
$UserID = $_SESSION['ID'];
?>

<!-- this is the page when you're logged in. -->
<div id="index-container">

    <!-- Every post -->
    <div id="post">
        
        <p> All your posts! </p>

        <?php
        include "core/inc_ProfilePosts.php";
        ?>

    </div>

    <!-- Info -->
    <div id="info">

        <?php

            //connectie maken met de database
            include 'core/inc_database.php';

            //juiste gegevens uit de database ophalen
            $sql = "SELECT * FROM user WHERE ID = '$UserID'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $username = $row["Username"];
                    $Email = $row["Email"];
                    $Description = $row["Description"];

                    echo '<p> username:'. $username . '</p>';
                    echo '<p> Email: '. $Email . '</p>';
                    echo '<p> Description:'. $Description . '</p>';
                }
            }
        ?>

    </div>
</div>

</body>

<?php
}
?>