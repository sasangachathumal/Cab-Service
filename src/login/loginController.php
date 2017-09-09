<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//DB connection
include '../db/db_connection.php';
//Variables
$userEmail = "";
$password = "";
$query = "";
//

if (isset($_POST['userEmail']) && isset($_POST['password'])) {
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    login();
} else {
    echo "400";
}

//login();

function login() {
    $passwordMatch = FALSE;
    $conn = OpenCon();
    global $userEmail;
    global $password;
    $query = "SELECT * FROM USERS WHERE EMAIL='" . $userEmail . "'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if (strcmp($row["PASSWORD"], $password) == 0) {
                $passwordMatch = TRUE;
                break;
            }
        }
        setActive($passwordMatch, $conn);
    } else {
        echo "404";
    }
}

function setActive($passwordCheck, $conn) {
    global $userEmail;
    if ($passwordCheck) {
        $query = "UPDATE USERS SET ACTIVE=1 WHERE EMAIL='" . $userEmail . "'";
        if ($conn->query($query) === TRUE) {
            checkCookieEnable();
        } else {
            echo "500";
        }
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
    checkUserType();
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
            $useType = $row['TYPE'];
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
