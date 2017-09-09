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
    registerVehile();
} else {
    echo "400";
}
function registerVehile() {
    $conn = OpenCon();
    global $vehicleData;
    $vehicle = new Vehicle($vehicleData);
    $query = "INSERT INTO VEHICLE (NUMBER, DRIVER_EMAIL, TYPE, NO_OF_SEATS)
                VALUES ('" . $vehicle->getNumber() . "', '" . $vehicle->getDriverEmail() . "', '" . $vehicle->getType() . 
            "', '" . $vehicle->getNoOfSeats() . "')";
    if ($conn->query($query) === TRUE) {
        echo "200";
    } else {
        echo "500";
    }
}
