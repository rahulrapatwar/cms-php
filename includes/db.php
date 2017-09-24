<?php

// creating array 'db' of database parameters
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

//defining parameters as constants
foreach ($db as $key => $value) {
  define(strtoupper($key), $value);
}

// creating connection to database
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); //mysqli_connect(server, user, password, database)
// checking connection
if ($connection) {
  echo "Connection Successful";
} else {
  echo "Connection Unsuccessful";
}



 ?>
