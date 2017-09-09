<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//DB connection
include './db/db_connection.php';
include './models/userModel.php';
//Variables
$userData = "";
$userPassword = "";
$userEmail = "";
$query = "";
//

if (isset($_POST['user']) && isset($_POST['userPassword'])) {
    $userData = $_POST['user'];
    $userPassword = $_POST['userPassword'];
    checkPassword();
} else {
    echo "400";
}

function checkPassword() {
    global $userData;
    global $userPassword;
    if ($userData['password'] === $userPassword) {
        signUpUser();
    } else {
        echo '405';
    }
}

function signUpUser() {
    $conn = OpenCon();
    global $userData;
    global $userEmail;
    $query = "INSERT INTO USERS (EMAIL, NAME, PHONENO, ADDRESS, TYPE, PASSWORD, ACTIVE)
                VALUES ('" . $userData['email'] . "', '" . $userData['name'] . "', '" . $userData['phone'] .
            "', '" . $userData['address'] . "', '3', '" . $userData['password'] . "', '0')";
    if ($conn->query($query) === TRUE) {
        $userEmail = $userData['email'];
        setActive($conn);
    } else {
        echo "500";
    }
}

function setActive($conn) {
    global $userEmail;
    $query = "UPDATE USERS SET ACTIVE=1 WHERE EMAIL='" . $userEmail . "'";
    if ($conn->query($query) === TRUE) {
        checkCookieEnable();
    } else {
        echo "500";
    }
}

function checkCookieEnable() {
    if (count($_COOKIE) > 0) {
        setBrowserCookies();
    } else {
        echo '401';
    }
}

function setBrowserCookies() {
    global $userEmail;
    setcookie('loginUser', $userEmail, time() + (86400 * 30), "/");
    if (!isset($_COOKIE['loginUser'])) {
        echo '401';
    } else {
        echo '200';
    }
}

function checkUserType() {
    global $userEmail;
    $conn = OpenCon();
    $useType = 0;
    $query = "SELECT * FROM USERS WHERE EMAIL='" . $userEmail . "'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $useType = $row['type'];
            break;
        }
        if ($useType == 1) {
            echo '200-Admin';
        } else if ($useType == 3) {
            echo '200-Passenger';
        }
    } else {
        echo "404";
    }
}
