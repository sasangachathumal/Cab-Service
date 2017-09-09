<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../src/db/db_connection.php';

$conn = OpenCon();
$updateEmail = '';

if (isset($_POST['updateEmail'])) {
    $updateEmail = $_POST['updateEmail'];
}

$query = "SELECT * FROM USERS WHERE EMAIL='".$updateEmail."'";
mysqli_query($conn, $query) or die('Error querying database.');

$result = mysqli_query($conn, $query);
//while ($row = mysqli_fetch_array($result)) {
// echo $row['NAME'] . ' ' . $row['PHONENO'] . ': ' . $row['ADDRESS'] . ' ' . $row['PASSWORD'] .'<br />';
//}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Cab (GET YOUR CAB) - Update User</title>
        <link href="../res/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../res/css/font-awesome.css" rel="stylesheet" type="text/css">
        <script src="../res/js/jquery.js" type="text/javascript"></script>
        <script src=../"res/js/bootstrap.js" type="text/javascript"></script>
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
    <body style="background-color: whitesmoke">
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a style="color: #cccc00" class="navbar-brand" href="index.php">My Cab</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a style="color: #cccc00" class="dropdown-toggle" data-toggle="dropdown" href="dashboard.php">
                            <i class="fa fa-bars fa-fw"></i>Menu
<!--                            <span class="caret"></span>-->
                        </a>
                        <ul class="dropdown-menu">
                            <li><a style="padding: 10px;" href="#"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a></li>
                            <li class="active"><a style="padding: 10px;" href="users.php"><i class="fa fa-users fa-fw"></i>Users</a></li>
                            <li><a style="padding: 10px;" href="../vehical/vehicals.php"><i class="fa fa-car fa-fw"></i>Vehicles</a></li>
                            <li><a style="padding: 10px;" href="src/login/logOut.php"><i class="fa fa-sign-out fa-fw"></i>Sign out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row" style="margin-bottom: 25px;">
                <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-xs-2 col-md-2 col-sm-2"></div>
                <div class="col-lg-8 col-xs-8 col-md-8 col-sm-8">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="">
                            <h4 class="panel-title" style="font-size: 25px; font-weight: bold">
                                <a href="users.php" title="Go Back">
                                    <i class="fa fa-arrow-left fa-fw"></i>
                                </a>
                                Update User</h4>
                        </div>
                        <form id="updateUserFrom" method="post" action="../src/users/updateUser.php">
                            <div class="panel-body">
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <div class="row">
                                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input required id="email" readonly type="email" class="form-control" name="user[email]" value="<?php echo $row['EMAIL']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6 col-md-6 col-sm-6">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input required id="name" type="text" class="form-control" name="user[name]" name="user[email]" value="<?php echo $row['NAME']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6 col-md-6 col-sm-6">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input required id="phone" type="tel" class="form-control" name="user[phone]" name="user[email]" value="<?php echo $row['PHONENO']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <textarea required id="address" class="form-control" name="user[address]"><?php echo $row['ADDRESS']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                            <select class="form-control" onchange="getSelectedType()" required id="typeSelect">
                                                <option disabled>Select User Type</option>
                                                <?php  if ($row['TYPE'] == 1) {  ?>
                                                <option selected value="1">Admin</option>
                                                <option value="2">Driver</option>
                                                <?php } else if ($row['TYPE'] == 2) { ?>
                                                <option value="1">Admin</option>
                                                <option selected value="2">Driver</option>
                                                <?php } else { ?>
                                                <option value="1">Admin</option>
                                                <option value="2">Driver</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <input type="hidden" id="type" name="user[type]"/>
                                    </div>
                                </div>
                                <div id="update_error" style="display: none; color: transparent; margin: 2em; text-align: center">
                                    <p class="text-danger text-lowercase">
                                        <i class="fa fa-fw fa-close"></i>
                                        User update fail. please try again.
                                    </p>
                                </div>
                                <div id="update_success" style="display: none; color: transparent; margin: 2em; text-align: center">
                                    <p class="text-success text-lowercase">
                                        <i class="fa fa-fw fa-check"></i>
                                        User successfully updated.
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function getSelectedType() {
                document.getElementById('type').value = document.getElementById('typeSelect').value;
            }

            jQuery(document).ready(function ($) {
                $("#updateUserFrom").submit(function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var formDataSerialized = $(this).serialize();
                    console.log(formDataSerialized);
                    $.post("../src/users/updateUser.php", formDataSerialized, function (data) {
                        if (data === '200') {
                            $('#update_success').show();
                        } else {
                            $('#update_error').show();
                        }
                    });
                });
            });

        </script>
    </body>
</html>