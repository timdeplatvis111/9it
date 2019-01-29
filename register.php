<?php
// Include header!! 
include "core/header.php";
include "core/inc_database.php";
?>

<div id="index-container">

<!-- Every post -->
<div id="post">
    
<div id="register">
    <div id="register-container">
        <h1>Registreren</h1>

        <form method="POST" action="core/inc_register.php">

            <label>Username</label>
            <input type="text" placeholder="Username" name="Username" required>

            <label>E-mail</label>
            <input type="text" placeholder="E-mail" name="Email" required>

            <label>Description</label>
            <input type="text" placeholder="Description" name="Description" required>

            <label>Password</label>
            <input type="ww" placeholder="Password" name="Password">

            <button type="submit" name="submit">Registreren</button>

         </form>
     </div>
 </div>

</div>

<!-- Info -->
<div id="info"></div>

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