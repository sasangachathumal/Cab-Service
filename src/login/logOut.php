<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//DB connection
include '../db/db_connection.php';
//Variables
$userEmail = $_COOKIE['loginUser'];
$query = "";
//
function setActive($passwordCheck, $conn) {
    global $userEmail;
    if ($passwordCheck) {
        $query = "UPDATE USERS SET ACTIVE=0 WHERE EMAIL='" . $userEmail . "'";
        if ($conn->query($query) === TRUE) {
            removeCookie();
        } else {
            echo "500";
        }
    }
}

function removeCookie() {
    //remove browser cookie and rederect to index page.
    setcookie('loginUser', '', time() - 3600);
//    header('Location: ../index.php');
    header("Location: ../index.php"); /* Redirect browser */
    exit();
}