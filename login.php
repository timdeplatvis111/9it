<?php
// Include header!! 
include "core/header.php";
?>

<div id="login">
    <div id="login-container">
        <h1>Login Form</h1>

        <form method="POST" action="core/inc_login.php">

            <label>Username</label>
            <input type="text" placeholder="Enter Username" name="Username" required>

            <label>Password</label>
            <input type="password" placeholder="Enter Password" name="Password" required>

            <button type="submit" name="submit">Login</button>
            
        </form>
    </div>
</div>