<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../db/db_connection.php';
include '../models/userModel.php';

$conn = OpenCon();
$email = $_GET['id'];
$query = "SELECT * FROM USERS WHERE EMAIL='".$email."'";
mysqli_query($conn, $query) or die('Error querying database.');

$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
    $sendValuesArray = array('token' => $change_token, 'password' => $conformPassword);
 echo $row['NAME'] . ' ' . $row['PHONENO'] . ': ' . $row['ADDRESS'] . ' ' . $row['PASSWORD'] .'<br />';
}