<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//DB connection
include '../db/db_connection.php';
include '../models/vehiclerModel.php';
//Variables
$vehicleData = "";
$query = "";
//

if (isset($_POST['vehicle'])) {
    $vehicleData = $_POST['vehicle'];
    updateVehicle();
} else {
    echo "400";
}
function updateVehicle() {
    $conn = OpenCon();
    global $vehicleData;
    $query = "UPDATE VEHICLE SET TYPE='" . $vehicleData['type'] . "', NO_OF_SEATS='" . $vehicleData['noOfSeats'] ."',
        DRIVER_EMAIL='" . $vehicleData['driverEmail'] . "' WHERE NUMBER='".$vehicleData['number']."'";
    if ($conn->query($query) === TRUE) {
        echo '200';
    } else {
        echo '500';
    }
}
