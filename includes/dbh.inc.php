<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "scoreboard_php";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection to DB Failed: " . mysqli_connect_error());
}