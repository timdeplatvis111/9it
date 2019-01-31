<?php
// Include header!! 
include "core/header.php";
include "core/inc_database.php";

if (isset($_SESSION['ID'])) {
    ?>
    
        <!-- this is the page when you're logged uit. -->
        <div id="index-container">
    
            <div id="post">
                <h1>you're already logged in</h1>
            </div>
    
            <div id="info">
            </div>
    
        </div>
    
    <?php
    } else {
?>

<div id="index-container">

<!-- Every post -->
<div id="post">
    
<div id="register">
    <div id="register-container">
        <h1>Registreren</h1>

        <form method="POST" action="core/inc_register.php">

            <div id="UsernameInput">
                <input id="RegisterInputs" type="text" placeholder="Username" name="Username" required>
            </div>

            <div id="EmailInput">
                <input id="RegisterInputs" type="text" placeholder="E-mail" name="Email" required>
            </div>

            <div id="DescriptionInput">
                <input id="RegisterInputs" type="text" placeholder="Description" name="Description" required>
            </div>

            <div id="PasswordInput">
                <input id="RegisterInputs" type="ww" placeholder="Password" name="Password">
            </div>

            <button type="submit" name="submit">Registreren</button>

         </form>
     </div>
 </div>

</div>

    <!-- Info -->
    <div id="info">

        <a href="AddPost.php">Add your Post today!!!</a>

        <ul>
            <li>Hot</li>
            <li>Fresh</li>
        </ul>

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

    <?php

    }

?>

<?php
    }
?>