<?php
session_start();
include_once 'functions.php';
$person_info_array = get_personal_info();
$group_name = get_group_name((int) $_GET['id']);
$group_members = get_group_members((int) $_GET['id']);
$result = get_group_details((int) $_GET['id']);
$group_details = mysqli_fetch_row($result);

//          
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
            $(function() {
                /* BOOTSNIPP FULLSCREEN FIX */
                if (window.location == window.parent.location) {
                    $('#back-to-bootsnipp').removeClass('hide');
                }


                $('[data-toggle="tooltip"]').tooltip();

                $('#fullscreen').on('click', function(event) {
                    event.preventDefault();
                    window.parent.location = "";
                });
                $('a[href="#cant-do-all-the-work-for-you"]').on('click', function(event) {
                    event.preventDefault();
                    $('#cant-do-all-the-work-for-you').modal('show');
                })

                $('[data-command="toggle-search"]').on('click', function(event) {
                    event.preventDefault();
                    $(this).toggleClass('hide-search');

                    if ($(this).hasClass('hide-search')) {
                        $('.c-search').closest('.row').slideUp(100);
                    } else {
                        $('.c-search').closest('.row').slideDown(100);
                    }
                })

                $('#contact-list').searchable({
                    searchField: '#contact-list-search',
                    selector: 'li',
                    childSelector: '.col-xs-12',
                    show: function(elem) {
                        elem.slideDown(100);
                    },
                    hide: function(elem) {
                        elem.slideUp(100);
                    }
                })
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

            body {
                padding: 30px 0px 60px;
            }
            .panel > .list-group .list-group-item:first-child {
                /*border-top: 1px solid rgb(204, 204, 204);*/
            }
            @media (max-width: 767px) {
                .visible-xs {
                    display: inline-block !important;
                }
                .block {
                    display: block !important;
                    width: 100%;
                    height: 1px !important;
                }
            }
            #back-to-bootsnipp {
                position: fixed;
                top: 10px; right: 10px;
            }


            .c-search > .form-control {
                border-radius: 0px;
                border-width: 0px;
                border-bottom-width: 1px;
                font-size: 1.3em;
                padding: 12px 12px;
                height: 44px;
                outline: none !important;
            }
            .c-search > .form-control:focus {
                outline:0px !important;
                -webkit-appearance:none;
                box-shadow: none;
            }
            .c-search > .input-group-btn .btn {
                border-radius: 0px;
                border-width: 0px;
                border-left-width: 1px;
                border-bottom-width: 1px;
                height: 44px;
            }


            .c-list {
                padding: 0px;
                min-height: 44px;
            }
            .title {
                display: inline-block;
                font-size: 1.7em;
                font-weight: bold;
                padding: 5px 15px;
            }
            ul.c-controls {
                list-style: none;
                margin: 0px;
                min-height: 44px;
            }

            ul.c-controls li {
                margin-top: 8px;
                float: left;
            }

            ul.c-controls li a {
                font-size: 1.7em;
                padding: 11px 10px 6px;   
            }
            ul.c-controls li a i {
                min-width: 24px;
                text-align: center;
            }

            ul.c-controls li a:hover {
                background-color: rgba(51, 51, 51, 0.2);
            }

            .c-toggle {
                font-size: 1.7em;
            }

            .name {
                font-size: 1.7em;
                font-weight: 700;
            }

            .c-info {
                padding: 5px 10px;
                font-size: 1.25em;
            }
        </style>
        <!-- Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href="css/styles.css" rel="stylesheet">
        <style>

            #main, #main>.row {
                height:100%;
            }

            #main>.row {
                overflow-y:scroll;
            }

            #left {
                height:100%;
            }

            #map-canvas {
                width:33.3333%;
                height:calc(100% - 0);
                position:absolute;
                right:16px;
                top:50px;
                bottom:0;
                overflow:hidden;
            }
        </style>

    </head>
    <body>
        <!-- begin template -->
        <nav class="navbar navbar-default navbar-fixed-top" color="#3063a3">
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
        <br/>

        <div id="map-canvas"></div>
        <div class="container-fluid" id="main">
            <div class="row">
                <div class="col-xs-4 ">
                    <div>
                        <?php if (!check_join()) { ?><a href="join.php?id=<?php echo $_GET['id']; ?>" style="color:white;" class="btn btn-primary btn-large title">Join</a>
                        <?php } ?></div>
                    <div class="panel panel-primary">
                        <div class="panel-heading c-list">
                            <span class="title">Group members</span>
                            <ul class="pull-right c-controls">
                                <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="Toggle Search"><i class="fa fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>

                        <div class="row" style="display: none;">
                            <div class="col-xs-12">
                                <div class="input-group c-search">
                                    <input type="text" class="form-control" id="contact-list-search">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group" id="contact-list">
                            <?php
                            for ($i = 0; $i < sizeof($group_members); $i++) {
                                $group_member_info = get_profile($group_members[$i]);
                                ?>
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-3">
                                        <img src="<?php echo $group_member_info['image_path']; ?>" alt="<?php echo $group_member_info['address'] . ',' . $group_member_info['country']; ?>" class="img-responsive img-circle" />
                                    </div>
                                    <div class="col-xs-12 col-sm-9">
                                        <span class="name"><?= $group_member_info['fname'] . ' ' . $group_member_info['lname'] ?></span><br/>
                                        <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="<?php echo $group_member_info['address'] . ',' . $group_member_info['country']; ?>"></span>
                                        <span class="visible-xs"> <span class="text-muted"><?php echo $group_member_info['address'] . ',' . $group_member_info['country']; ?></span><br/></span>
                                        <!--<span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="<?php // echo $group_member_info['email'];     ?>"></span>-->
                                        <!--<span class="visible-xs"> <span class="text-muted"><?php echo $group_member_info['email']; ?></span><br/></span>-->
                                        <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="<?php echo $group_member_info['email']; ?>"></span>
                                        <span class="visible-xs"> <span class="text-muted"><?php echo $group_member_info['email']; ?></span><br/></span>
                                        <a target="_blank" href="<?php echo $group_member_info['fb_google_id']; ?>">
                                            <span data-toggle="tooltip" title="<?php echo $group_member_info['fb_google_id']; ?>"><img src="fb.jpg" width="30px" height="30px"></span>
                                            <span class="visible-xs"> <span class="text-muted"><?php echo $group_member_info['fb_google_id']; ?></span><br/></span>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <?php
                            }
                            ?>
                            <!--                            <li class="list-group-item">
                                                            <div class="col-xs-12 col-sm-3">
                                                                <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                                                            </div>
                                                            <div class="col-xs-12 col-sm-9">
                                                                <span class="name">Scott Stevens</span><br/>
                                                                <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5842 Hillcrest Rd"></span>
                                                                <span class="visible-xs"> <span class="text-muted">5842 Hillcrest Rd</span><br/></span>
                                                                <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(870) 288-4149"></span>
                                                                <span class="visible-xs"> <span class="text-muted">(870) 288-4149</span><br/></span>
                                                                <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="scott.stevens@example.com"></span>
                                                                <span class="visible-xs"> <span class="text-muted">scott.stevens@example.com</span><br/></span>
                                                                <span data-toggle="tooltip" title="seth.frazier@example.com"><img src="fb.jpg" width="30px" height="30px"></span>
                                                                <span class="visible-xs"> <span class="text-muted">seth.frazier@example.com</span><br/></span>
                            
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="col-xs-12 col-sm-3">
                                                                <img src="http://api.randomuser.me/portraits/men/97.jpg" alt="Seth Frazier" class="img-responsive img-circle" />
                                                            </div>
                                                            <div class="col-xs-12 col-sm-9">
                                                                <span class="name">Seth Frazier</span><br/>
                                                                <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="7396 E North St"></span>
                                                                <span class="visible-xs"> <span class="text-muted">7396 E North St</span><br/></span>
                                                                <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(560) 180-4143"></span>
                                                                <span class="visible-xs"> <span class="text-muted">(560) 180-4143</span><br/></span>
                                                                <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="seth.frazier@example.com"></span>
                                                                <span class="visible-xs"> <span class="text-muted">seth.frazier@example.com</span><br/></span>
                                                                <span data-toggle="tooltip" title="seth.frazier@example.com"><img src="fb.jpg" width="30px" height="30px"></span>
                                                                <span class="visible-xs"> <span class="text-muted">seth.frazier@example.com</span><br/></span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="col-xs-12 col-sm-3">
                                                                <img src="http://api.randomuser.me/portraits/women/90.jpg" alt="Jean Myers" class="img-responsive img-circle" />
                                                            </div>
                                                            <div class="col-xs-12 col-sm-9">
                                                                <span class="name">Jean Myers</span><br/>
                                                                <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="4949 W Dallas St"></span>
                                                                <span class="visible-xs"> <span class="text-muted">4949 W Dallas St</span><br/></span>
                                                                <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(477) 792-2822"></span>
                                                                <span class="visible-xs"> <span class="text-muted">(477) 792-2822</span><br/></span>
                                                                <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="jean.myers@example.com"></span>
                                                                <span class="visible-xs"> <span class="text-muted">jean.myers@example.com</span><br/></span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="col-xs-12 col-sm-3">
                                                                <img src="http://api.randomuser.me/portraits/men/24.jpg" alt="Todd Shelton" class="img-responsive img-circle" />
                                                            </div>
                                                            <div class="col-xs-12 col-sm-9">
                                                                <span class="name">Todd Shelton</span><br/>
                                                                <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5133 Pecan Acres Ln"></span>
                                                                <span class="visible-xs"> <span class="text-muted">5133 Pecan Acres Ln</span><br/></span>
                                                                <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(522) 991-3367"></span>
                                                                <span class="visible-xs"> <span class="text-muted">(522) 991-3367</span><br/></span>
                                                                <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="todd.shelton@example.com"></span>
                                                                <span class="visible-xs"> <span class="text-muted">todd.shelton@example.com</span><br/></span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="col-xs-12 col-sm-3">
                                                                <img src="http://api.randomuser.me/portraits/women/34.jpg" alt="Rosemary Porter" class="img-responsive img-circle" />
                                                            </div>
                                                            <div class="col-xs-12 col-sm-9">
                                                                <span class="name">Rosemary Porter</span><br/>
                                                                <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5267 Cackson St"></span>
                                                                <span class="visible-xs"> <span class="text-muted">5267 Cackson St</span><br/></span>
                                                                <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(497) 160-9776"></span>
                                                                <span class="visible-xs"> <span class="text-muted">(497) 160-9776</span><br/></span>
                                                                <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="rosemary.porter@example.com"></span>
                                                                <span class="visible-xs"> <span class="text-muted">rosemary.porter@example.com</span><br/></span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="col-xs-12 col-sm-3">
                                                                <img src="http://api.randomuser.me/portraits/women/56.jpg" alt="Debbie Schmidt" class="img-responsive img-circle" />
                                                            </div>
                                                            <div class="col-xs-12 col-sm-9">
                                                                <span class="name">Debbie Schmidt</span><br/>
                                                                <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="3903 W Alexander Rd"></span>
                                                                <span class="visible-xs"> <span class="text-muted">3903 W Alexander Rd</span><br/></span>
                                                                <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(867) 322-1852"></span>
                                                                <span class="visible-xs"> <span class="text-muted">(867) 322-1852</span><br/></span>
                                                                <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="debbie.schmidt@example.com"></span>
                                                                <span class="visible-xs"> <span class="text-muted">debbie.schmidt@example.com</span><br/></span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="col-xs-12 col-sm-3">
                                                                <img src="http://api.randomuser.me/portraits/women/76.jpg" alt="Glenda Patterson" class="img-responsive img-circle" />
                                                            </div>
                                                            <div class="col-xs-12 col-sm-9">
                                                                <span class="name">Glenda Patterson</span><br/>
                                                                <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5020 Poplar Dr"></span>
                                                                <span class="visible-xs"> <span class="text-muted">5020 Poplar Dr</span><br/></span>
                                                                <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(538) 718-7548"></span>
                                                                <span class="visible-xs"> <span class="text-muted">(538) 718-7548</span><br/></span>
                                                                <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="glenda.patterson@example.com"></span>
                                                                <span class="visible-xs"> <span class="text-muted">glenda.patterson@example.com</span><br/></span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-xs-8 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a target="_blank" href="https://www.google.com.np/webhp?#q=<?php echo $group_name; ?>&safe=active" ><?= $group_name ?></a>
                        </div>
                        <div class="panel-body">
                            <table class="table">  
                                <tbody>  
                                    <tr>  
                                        <td>Destination</td>  
                                        <td><?php
//                                        print_r($group_details);
                                            echo $group_details['5'];
                                            ?></td>  
                                    </tr>
                                    <tr>  
                                        <td>Purpose</td>  
                                        <td><?php echo $group_details['4']; ?></td>  
                                    </tr>  
                                    <tr>  
                                        <td>Date</td>  
                                        <td><?php echo $group_details['2']; ?></td>  
                                    </tr>  
                                    <tr>  
                                        <td>Duration</td>  
                                        <td><?php echo $group_details['1']; ?>days</td>  
                                    </tr>

                                </tbody>  
                            </table>  
                            <iframe src="test.php?place=<?php echo $group_details['4'];?>+<?php echo $group_details['5'];?>" width="800px" height="600px"></iframe>

                        </div>

                    </div>
                </div>
            </div>

            <div id="cant-do-all-the-work-for-you" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="mySmallModalLabel">Ooops!!!</h4>
                        </div>
                        <div class="modal-body">
                            <p>I am being lazy and do not want to program an "Add User" section into this snippet... So it looks like you'll have to do that for yourself.</p><br/>
                            <p><strong>Sorry<br/>
                                    ~ Mouse0270</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JavaScrip Search Plugin -->
            <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>

        </div>
    </div>
    <div class="col-xs-4"><!--map-canvas will be postioned here--></div>

</div>
</div>
<!-- end template -->
<script type="text/javascript">
            $(function() {
                /* BOOTSNIPP FULLSCREEN FIX */
                if (window.location == window.parent.location) {
                    $('#back-to-bootsnipp').removeClass('hide');
                }


                $('[data-toggle="tooltip"]').tooltip();

                $('#fullscreen').on('click', function(event) {
                    event.preventDefault();
                    window.parent.location = "";
                });
                $('a[href="#cant-do-all-the-work-for-you"]').on('click', function(event) {
                    event.preventDefault();
                    $('#cant-do-all-the-work-for-you').modal('show');
                })

                $('[data-command="toggle-search"]').on('click', function(event) {
                    event.preventDefault();
                    $(this).toggleClass('hide-search');

                    if ($(this).hasClass('hide-search')) {
                        $('.c-search').closest('.row').slideUp(100);
                    } else {
                        $('.c-search').closest('.row').slideDown(100);
                    }
                })

                $('#contact-list').searchable({
                    searchField: '#contact-list-search',
                    selector: 'li',
                    childSelector: '.col-xs-12',
                    show: function(elem) {
                        elem.slideDown(100);
                    },
                    hide: function(elem) {
                        elem.slideUp(100);
                    }
                })
            });
</script>
<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
<script src="js/scripts.js"></script>
</body>
</html>