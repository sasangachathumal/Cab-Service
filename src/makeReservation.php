<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//DB connection
include './db/db_connection.php';
//Variables
$reservationInfo = "";
$query = "";

if (!isset($_COOKIE['loginUser'])) {
    header('Location: ./login.php');
    exit();
}

if (isset($_POST['reservation'])) {
    $reservationInfo = $_POST['reservation'];
    makeReservation();
} else {
    echo "400";
}

function makeReservation() {
    $conn = OpenCon();
    global $reservationInfo;
    $query = "INSERT INTO RESERVATION (PASSENGER_EMAIL, VEHICLE_ID, START_POINT, END_POINT, BOOK_DATE)
                VALUES ('" . $_COOKIE['loginUser'] . "', '" . $reservationInfo['number'] . "', '" . $reservationInfo['start'] .
            "', '" . $reservationInfo['end'] . "', '" . $reservationInfo['date'] . "')";
    if ($conn->query($query) === TRUE) {
        echo "200";
    } else {
        echo "500";
    }
}
