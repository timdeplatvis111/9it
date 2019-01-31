<html lang="nl">

<?php
//Starts the session
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta name="description" content="beschrijving">
    <meta name="author" content="Auteur">

    <title>9it</title>
    <!-- link the css -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/AddPost.css">

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <div id="header">

        <!-- left side of the header -->
        <div id="header-left">
        
            <ul>
                <a href="index.php"><li>Home</li></a>
                <?php

                //getting UserID from user table
                    
                    if (isset($_SESSION['Username'])) 
                    {
                        ?>
                        <a href="profile.php"><li><?php echo $_SESSION['Username']; ?></li></a>
                        <?php
                    }
                ?>
            </ul>

        </div>

        <!-- right side of the header -->
        <div id="header-right">
        
            <ul>
                <?php
                    if (isset($_SESSION['Username'])) 
                    {
                    
                    } else 
                    {
                        echo '<a href="register.php"><li>Register</li></a>';
                    }
                ?>
            </ul>
        
        </div>
    </div>