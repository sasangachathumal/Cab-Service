<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Cab (GET YOUR CAB) - Register User</title>
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
                                Register New User</h4>
                        </div>
                        <form id="userRegesterFrom" method="post" action="../src/users/registerUsers.php">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input required id="email" type="email" class="form-control" name="user[email]" placeholder="E-mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6 col-md-6 col-sm-6">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input required id="name" type="text" class="form-control" name="user[name]" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6 col-md-6 col-sm-6">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input required id="phone" type="tel" class="form-control" name="user[phone]" placeholder="Phone No">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <textarea required id="address" class="form-control" name="user[address]" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                            <select class="form-control" onchange="getSelectedType()" required id="typeSelect">
                                                <option selected disabled="">Select User Type</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Driver</option>
                                            </select>
                                        </div>
                                        <input type="hidden" id="type" name="user[type]"/>
                                    </div>
                                </div>
                                <div id="registor_error" style="display: none; color: transparent; margin: 2em; text-align: center">
                                    <p class="text-danger text-lowercase">
                                        <i class="fa fa-fw fa-close"></i>
                                        new user registration fail. please try again.
                                    </p>
                                </div>
                                <div id="registor_success" style="display: none; color: transparent; margin: 2em; text-align: center">
                                    <p class="text-success text-lowercase">
                                        <i class="fa fa-fw fa-check"></i>
                                        new user successfully registered.
                                    </p>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary">Register</button>
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
                $("#userRegesterFrom").submit(function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var formDataSerialized = $(this).serialize();
                    console.log(formDataSerialized);
                    $.post("../src/users/registerUsers.php", formDataSerialized, function (data) {
                        if (data === '200') {
                            $('#registor_success').show();
                        } else {
                            $('#registor_error').show();
                        }
                    });
                });
            });

        </script>
    </body>
</html>