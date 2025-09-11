<?php
// Displays list of registered users
require "db_conn.php";
$users = $conn->query("Select * from users");
$count = 1;
foreach ($users as $user) {
    echo $count . ". " . $user['name'] . " - " . $user['email'] . "<br>";
    $count++;
}