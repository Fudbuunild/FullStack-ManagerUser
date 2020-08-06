<?php

include 'db_connection.php';


function getAllUsers() {
    global $db;
    $users = $db->query("SELECT * from `users`");
    return $users;
}
?>