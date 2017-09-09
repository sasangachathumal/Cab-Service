<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//DB connection
include '../db/db_connection.php';
//Variables
$searchData = "";
//

if (isset($_POST['search'])) {
    $searchData = $_POST['search'];
    setSearchCookies();
} else {
    echo "400";
}

function setSearchCookies() {
    global $searchData;
    $format = 'Y-m-d';
    $date = DateTime::createFromFormat($format, $searchData['bookdate']);
//    echo "Format: $format; " . $date->format('Y-m-d');
//    $date = DateTime::createFromFormat('m-d-Y', $searchData['bookdate']);
    $searchDate = $date->format("Y-m-d");
//    $cookieValue = $searchData['startPoint'] + "//" + $searchData['endPoint'] + "//" + $searchDate + "//" + $searchData['vehicleType'];
    setcookie('reservationStart', $searchData['startPoint'], time() + (86400 * 30), "/");
    setcookie('reservationEnd', $searchData['endPoint'], time() + (86400 * 30), "/");
    setcookie('reservationDate', $searchDate, time() + (86400 * 30), "/");
    setcookie('reservationType', $searchData['vehicleType'], time() + (86400 * 30), "/");
    header('Location: ../../search.php');
    exit();
}
