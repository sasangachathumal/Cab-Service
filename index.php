<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include './src/db/db_connection.php';

$conn = OpenCon();

//Step2
$query = "SELECT * FROM VEHICLE";
mysqli_query($conn, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($conn, $query);
//while ($row = mysqli_fetch_array($result)) {
// echo $row['NAME'] . ' ' . $row['PHONENO'] . ': ' . $row['ADDRESS'] . ' ' . $row['PASSWORD'] .'<br />';
//}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Cab (GET YOUR CAB)</title>
        <link href="res/css/bootstrap.css" rel="stylesheet">
        <link href="res/css/font-awesome.css" rel="stylesheet">
        <script src="res/js/jquery.js" type="text/javascript"></script>
        <script src="res/js/bootstrap.js" type="text/javascript"></script>
        <style type="text/css">
            #backgroundImage{z-index: 1;}

            #backgroundImage:before {
                content: "";
                position: absolute;
                z-index: -1;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background-image: url(res/img/6487161_orig.jpg);
                background-repeat: no-repeat;
                background-size: 100%;
                opacity: 0.4;
                filter:alpha(opacity=40);
                height:100%;
                width:100%;
            }
        </style>
    </head>
    <body id="backgroundImage">

        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a style="color: #cccc00" class="navbar-brand" href="index.php">My Cab</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a style="color: #cccc00" href="login.php"><i class="fa fa-sign-in fa-fw"></i>Login</a></li>
                </ul>
            </div>
        </div>

        <div class="container" style="margin: 35px;vertical-align: middle">
            <div class="row" style="vertical-align: middle">
                <div class="col-lg-8" style="vertical-align: middle">
                    <img src="res/img/Mapa-Easy-Taxi.png" width="100%"/>
                </div>
                <div class="col-lg-4" style="vertical-align: middle; margin-top: 50px;">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form id="searchForm" method="post" action="search.php">
                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input id="startPoint" type="text" class="form-control" name="startPoint" placeholder="Starting point">
                                        </div>
                                    </div><div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input id="endPoint" type="text" class="form-control" name="endPoint" placeholder="Ending point">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input id="bookdate" type="date" class="form-control" name="bookdate" placeholder="Booking date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-cab"></i></span>
                                            <select class="form-control" onchange="getSelectedTypeForReservation()" name="vehicleType" id="vehicleTypeSelect">
                                                <option selected>Select a vehicle type</option>
                                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                    <option value="<?php echo $row['TYPE']; ?>"><?php echo $row['TYPE']; ?></option>
                                                    <?php
                                                }
                                                CloseCon($conn);
                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" id="vehicleType" name="vehicleType"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-warning btn-block">
                                            <span class="fa fa-search"></span> Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function getSelectedTypeForReservation() {
                document.getElementById('vehicleType').value = document.getElementById('vehicleTypeSelect').value;
            }

        </script>
    </body>
</html>
