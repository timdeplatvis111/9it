<?php

$servernaam = "localhost";
$gebruiker = "root";
$wachtwoord = "";
$databasenaam = "9it";

$conn = new mysqli($servernaam, $gebruiker, $wachtwoord, $databasenaam);

if ($conn->connect_error)
{
    die("Fout: ".$conn->connect_error);
} 
else 
{

}

?>