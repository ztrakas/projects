<?php

$id = $_GET['room'];
$range = $_GET['range'];

include('db.php');

$conn->query("INSERT INTO `reservations` (`id`, `room_id`, `date`) VALUES (NULL, '$id', '$range')");
header("Location: index.php?done=done");


?>