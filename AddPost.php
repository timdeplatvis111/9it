<?php
// Include header en de database connectie test
include "core/header.php";
include "core/inc_database.php";

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
?>

<div id="index-container">

    <div id="post">
            
        <form method="post" action="core/inc_AddPost.php">

            <label>Title</label>
            <input type="text" placeholder="Tim is gay" name="Titel" required>

            <label>Image</label>
            <input type="text" placeholder="TimIsGay.png" name="Image" required>

            <button type="submit" name="submit">Post your post!</button>
        </form>

        </div>

        <!-- Info -->
        <div id="info">

        <?php
            if (isset($_SESSION['Username'])) 
            {
                echo 'You are logged in as: '.$_SESSION['Username'];
                echo '<form action="core/inc_logout.php" method="POST">

                <button id="uitloggen" type="submit" name="submit">Logout</button>
                </form>';
            }
            else
            {
                echo 'You can create an account <a href="register.php">Here </a>- Its free!';
            
        ?>    
        <!-- Login form -->
            <div id="login">
                <div id="login-container">
                    <form method="POST" action="core/inc_login.php">

                    <label>Username</label>
                    <input type="text" placeholder="Enter Username" name="Username" required>

                    <label>Password</label>
                    <input type="password" placeholder="Enter Password" name="Password" required>

                    <button type="submit" name="submit">Login</button>

                    </form>
                </div>
            </div>
        </div>
</div>
        <?php

    }
}