<?php
session_start();
include_once 'functions.php';
//confirm_log_in();
//print_r($_SESSION);
//echo $_SESSION['session_user_id'];
$person_info_array = get_personal_info();
$group_involved_array = get_joined_group();
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> JauntyMate: Travel Friend Finder</title>
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.icon-large.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap1.css" rel="stylesheet" type="text/css">
        <link href="css/freelancer.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
        <script src="js/login.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                // load index page when the page loads
                $("#home").click(function() {
                    // load home page on click
                    $("#response").load("plan.php");
                });
            });
        </script>
        <style>
            body {
                background:#f0f0f0;
            }
            .nav {
                left:75%;
                /*margin-right:150px;*/
                /*top:50px;*/
                position:absolute;
                width:300px;
                height:30px;
            }
            .nav>li>a:hover, .nav>li>a:focus, .nav .open>a, .nav .open>a:hover, .nav .open>a:focus {
                background:#fff;
            }
            .dropdown {
                background:#fff;
                border:1px solid #ccc;
                border-radius:4px;
                width:300px; 

            }
            .dropdown-menu>li>a {
                color:#428bca;
            }
            .dropdown ul.dropdown-menu {
                border-radius:4px;
                box-shadow:none;
                margin-top:20px;
                width:300px;
            }
            .dropdown ul.dropdown-menu:before {
                content: "";
                border-bottom: 10px solid #fff;
                border-right: 10px solid transparent;
                border-left: 10px solid transparent;
                position: absolute;
                top: -10px;
                right: 16px;
                z-index: 10;
            }
            .dropdown ul.dropdown-menu:after {
                content: "";
                border-bottom: 12px solid #ccc;
                border-right: 12px solid transparent;
                border-left: 12px solid transparent;
                position: absolute;
                top: -12px;
                right: 14px;
                z-index: 9;
            }
        </style>
        <!-- Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href="css/styles.css" rel="stylesheet">

    </head>
    <body id="page-top" class="index">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <a class="navbar-brand" style="color:white;" href="home.php">JauntyMate</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <!-- /.navbar-collapse -->

                <div class="col-sm-7 col-md-7 center-block">
                    <form class="navbar-form" role="search" action="search_results.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="keyword" id="srch-term">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <ul class="col-sm-3 col-md-3 nav navbar-nav ">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $person_info_array['fname'] . ' ' . $person_info_array['lname'] ?><span class="glyphicon glyphicon-user pull-right"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                            <li class="divider"></li>
                            <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                            <li class="divider"></li>
                            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <br/>
        <div class="container-fluid">
            <br/>
            <!--left-->
            <div class="col-sm-3">
                <br/>
                <div class="panel panel-primary">
                    <!--<div class="panel-heading"></div>-->
                    <div class="panel-body">
                        <a id="home" style="color:black;" class="home" >Share your plan</a>
                    </div>
                </div>
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Joined groups</div>
                    <div class="panel-body">
                        <div class="list-group">
                            <?php
                            for ($i = 0; $i < sizeof($group_involved_array); $i++) {
                                ?>
                                <a href="group.php?id=<?php echo $group_involved_array[$i]; ?>" class="list-group-item">
                                    <i class="glyphicon glyphicon-user "></i> <?= get_group_name($group_involved_array[$i]) ?>
                                </a>
                                <?php
                            }
                            ?>
                            <!--                            <a href="#" class="list-group-item">
                                                            <i class="glyphicon glyphicon-user "></i> Lorem ipsum
                                                        </a>
                                                        <a href="#" class="list-group-item">
                                                            <i class="glyphicon glyphicon-user "></i>Lorem ipsum
                                                        </a>
                                                        <a href="#" class="list-group-item">
                                                            <i class="fa fa-user"></i> Lorem ipsum
                                                        </a>
                                                        <a href="#" class="list-group-item">
                                                            <i class="glyphicon glyphicon-user "></i> Lorem ipsum 
                                                        </a>
                                                        <a href="#" class="list-group-item">
                                                            <i class="glyphicon glyphicon-user "></i>Lorem ipsumr 
                                                        </a>
                                                        <a href="#" class="list-group-item">
                                                            <i class="glyphicon glyphicon-user "></i> Lorem ipsum
                                                        </a>-->
                        </div>   
                    </div>
                </div><!--/left-->
            </div>

            <!--center-->
            <div class="col-sm-6 panel">
                <div class="row">
                    <div class="col-xs-12 ">
                        <h2>Search Results</h2>
                        <?php
                        $keywords = $_GET['keyword'];
                        $group_id_array = search_results($keywords);
//                      print_r($group_id_array);
                        if ($group_id_array != NULL) {
                            ?>
                            <ul class="list-inline">
                                <?php
                                for ($i = 0; $i < sizeof($group_id_array); $i++) {
//                                 echo get_group_name($group_id_array[$i]);
                                    ?>
                                    <li>
                                        <a style="color:black;" href="group.php?id=<?php echo $group_id_array[$i]; ?>"><?php echo get_group_name($group_id_array[$i]); ?></a>
                                    </li>
                                    <?php
//                                echo '<li><a href="group.php?id=' . $group_id_array[$i] . '">' . get_group_name($group_id_array[$i]) . '</a></li>';
                                }
                                ?>
                            </ul>
                            <?php
                        } else {
                            echo 'No results found';
                        }
                        ?>
                        <!--                        <h2>Group name</h2>
                                                <p>Destination: motive</p>
                                                <p class="lead"><button class="btn btn-default">View </button></p>-->
                                                <!--<ul class="list-inline"><li><a href="#">1 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li></ul>-->
                    </div>
                </div>
                <hr>

            </div><!--/center-->

            <!--right-->
            <div class="col-sm-3">
                <div class="panel">
                    <div class="panel-body">
                        <img src="ad.png" width="" height="">
                        <center> <a  style="color:black;" href="http://www.tripadvisor.com/Tourism-g293889-Nepal-Vacations.html" >Trip Advisor: plan your trip </a></center>
                        <hr/>
                       
                    </div>
                </div>

            </div><!--/right-->
            <hr>
        </div><!--/container-fluid-->
        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>