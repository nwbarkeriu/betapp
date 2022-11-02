<?php
$serverName = "66.216.52.75";
$dBUsername = "webencedev_bettapp";
$dBPassword = "6n77e;fn~+bz";
$dBName = "webencedev_bettapp";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection to DB Failed: " . mysqli_connect_error());
}