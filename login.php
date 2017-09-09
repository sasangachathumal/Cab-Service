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
        <title>My Cab (GET YOUR CAB) - Log In</title>
        <link href="res/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="res/css/font-awesome.css" rel="stylesheet" type="text/css">
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
                <!--                <ul class="nav navbar-nav navbar-right">
                                    <li><a style="color: #cccc00" href="login.php"><i class="fa fa-sign-in fa-fw"></i>Login</a></li>
                                </ul>-->
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2 class="text-uppercase text-warning" style="font-weight: bold;">Sign In</h2>
                            <form id="login_form" method="post" action="src/login/loginController.php">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input required id="userEmail" type="email" class="form-control" name="userEmail" placeholder="E-mail">
                                        </div>
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input required id="password" type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <input type="submit" class="btn btn-warning btn-block text-uppercase" value="Sign in">
                                    </div>
                                </div>
                            </form>
                            <div id="login_error" style="display: none; color: transparent; margin: 2em; text-align: center">
                                <p class="text-danger text-lowercase">
                                    <i class="fa fa-fw fa-close"></i>
                                    log in fail. please try again.
                                </p>
                            </div>
                            <div id="login_error_404" style="display: none; color: transparent; margin: 2em; text-align: center">
                                <p class="text-danger text-lowercase">
                                    <i class="fa fa-fw fa-close"></i>
                                    Entered email and password not match to our recodes.
                                </p>
                            </div>
                            <div id="login_error_401" style="display: none; color: transparent; margin: 2em; text-align: center">
                                <p class="text-danger text-lowercase">
                                    <i class="fa fa-fw fa-close"></i>
                                    Please check browser cookie enabled and try again.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <center>
                        <div style="height: 80%; width: 3px; background-color: whitesmoke; border-radius: 50%;"></div>
                    </center>
                </div>
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2 class="text-uppercase text-warning" style="font-weight: bold;">Sign Up</h2>
                            <h5 class="text-lowercase text-warning" style="font-weight: bold;">As Passenger</h5>
                            <form id="signUp_form" method="post" action="src/signUp.php">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input required id="email" type="email" class="form-control" name="user[email]" placeholder="E-mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input required id="name" type="text" class="form-control" name="user[name]" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input required id="phone" type="number" class="form-control" name="user[phone]" placeholder="Phone No">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <textarea required id="address" class="form-control" name="user[address]" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input required id="password" type="password" class="form-control" name="user[password]" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group" style="margin-bottom: 15px;">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input required id="conformPassword" type="password" class="form-control" name="userPassword" placeholder="Conform password">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-warning btn-block text-uppercase" value="Sign up">
                            </form>
                            <div id="password_error" style="display: none; color: transparent; margin: 2em; text-align: center">
                                <p class="text-danger text-lowercase">
                                    <i class="fa fa-fw fa-close"></i>
                                    password mismatch. please try again.
                                </p>
                            </div>
                            <div id="signUp_error" style="display: none; color: transparent; margin: 2em; text-align: center">
                                <p class="text-danger text-lowercase">
                                    <i class="fa fa-fw fa-close"></i>
                                    sign up fail. please try again.
                                </p>
                            </div>
                            <div id="signUp_error_404" style="display: none; color: transparent; margin: 2em; text-align: center">
                                <p class="text-danger text-lowercase">
                                    <i class="fa fa-fw fa-close"></i>
                                    Entered email and password not match to our recodes.
                                </p>
                            </div>
                            <div id="signUp_error_401" style="display: none; color: transparent; margin: 2em; text-align: center">
                                <p class="text-danger text-lowercase">
                                    <i class="fa fa-fw fa-close"></i>
                                    Please check browser cookie enabled and try again.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--        scripes-->
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $("#login_form").submit(function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var formDataSerialized = $(this).serialize();
                    console.log(formDataSerialized);
                    $.post("src/login/loginController.php", formDataSerialized, function (data) {
                        if (data === '200-Admin') {
                            $form.remove();
                               window.location.href='dashboardAdmin.php';
                        }else if (data === '200-Passenger') {
                            $form.remove();
                               window.location.href='dashboardPassenger.php';
                        } else if (data === '404') {
                            $('#login_error_404').show();
                        } else if (data === '401') {
                            $('#login_error_401').show();
                        } else {
                            $('#login_error').show();
                        }
                    });
                });
                
                $("#signUp_form").submit(function (e) {
                    e.preventDefault();
                    var $form = $(this);
                    var formDataSerialized = $(this).serialize();
                    console.log(formDataSerialized);
                    $.post("src/signUp.php", formDataSerialized, function (data) {
                        if (data === '200-Admin') {
                            $form.remove();
                               window.location.href='dashboardAdmin.php';
                        }else if (data === '200-Passenger') {
                            $form.remove();
                               window.location.href='dashboardPassenger.php';
                        } else if (data === '405') {
                            $('#password_error').show();
                        } else if (data === '404') {
                            $('#signUp_error_404').show();
                        } else if (data === '401') {
                            $('#signUp_error_401').show();
                        } else {
                            $('#signUp_error').show();
                        }
                    });
                });
                
            });
        </script>

    </body>
</html>