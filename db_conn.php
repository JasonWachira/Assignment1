<?php
require "conf.php";

$conn = new mysqli($conf['db_host'], $conf['db_user'], $conf['db_pass'], $conf['db_name']);

if($conn->connect_error){
    echo "Failed to cnnect to database";

}
else{
    echo "Connected successfully to database"."<br>";
}
