<?php

session_start();

if (isset($_POST['submit'])) 
{
    include 'inc_database.php';

    $Username = mysqli_real_escape_string($conn , $_POST['Username']);
    $Password = mysqli_real_escape_string($conn , $_POST['Password']);
    
    if (empty($Username)||empty($Password))
	{
		header("Location: ../index.php?login=empty");
		exit();
    }
    else
    {
        $sql = "SELECT * FROM user WHERE Username='$Username'";
        $result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) 
		{
            // Checks if there's a result

			header("Location: ../index.php?login=ResultCheckFails");
			exit();
        } 
        else
        {
            if ($row = mysqli_fetch_assoc($result)) 
			{
                $hashedPwdCheck = password_verify($Password , $row['Password']);

				if ($hashedPwdCheck == false) 
				{
				    header("Location: ../index.php?login=HashedPwdCheckFailed");
				    exit();
				} 
				elseif ($hashedPwdCheck == true) 
				{
					$_SESSION['ID'] = $row['ID'];
                    $_SESSION['Username'] = $row['Username'];
                    
                    header("Location: ../index.php?login=SUCC");
					exit();
                }
            }
        }
    }
}
else
{
    //For if the intitial post fails

    header("Location: ../index.php?login=FailedAtPost");
	exit();
}


?>