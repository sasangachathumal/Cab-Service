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
    registerUser();
} else {
    echo "400";
}
function registerUser() {
    $conn = OpenCon();
    global $userData;
    $userData['password'] = 'qwerty';
    $user = new User($userData);
    $query = "INSERT INTO USERS (EMAIL, NAME, PHONENO, ADDRESS, TYPE, PASSWORD, ACTIVE)
                VALUES ('" . $user->getEmail() . "', '" . $user->getName() . "', '" . $user->getPhone() . 
            "', '" . $user->getAddress() . "', '" . $user->getType() . "', '" . $user->getPassword() . "', '0')";
    if ($conn->query($query) === TRUE) {
        echo "200";
    } else {
        echo "500";
    }
}
