<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//DB connection
include '../db/db_connection.php';
include '../models/userModel.php';
//Variables
$userData = "";
$query = "";
//

if (isset($_POST['user'])) {
    $userData = $_POST['user'];
    updateUser();
} else {
    echo "400";
}
function updateUser() {
    $conn = OpenCon();
    global $userData;
    $query = "UPDATE USERS SET NAME='" . $userData['name'] . "', PHONENO='" . $userData['phone'] ."',
        ADDRESS='" . $userData['address'] . "', TYPE='" . $userData['type'] . "' WHERE EMAIL='" . $userData['email'] . "'";
    if ($conn->query($query) === TRUE) {
        echo "200";
    } else {
        echo "500";
    }
}
