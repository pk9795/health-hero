<?php

$servername		=	"localhost";
$username		=	"destinywealth_webhawkers";
$password		=	"Dante@007";
$dbname			=	"destinywealth_contact";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>