<?php
include 'functions.php';
$login = true;
$msg = "";
if (isset($_POST['submit'])) {
    connect_to_database();
    $username = mysql_prep($_POST['username']);
    $password = mysql_prep($_POST['password']);

    if ($username != null && $password != null) {
        if (login($username, $password)) {
            redirect_to("home.php");
        } else {
            $login = false;
            $msg = "invalid username/password";
            echo $msg;
        }
    } else {
        $login = false;
        $msg = "Please enter your username and password";
        echo $msg;
    }
}
?>
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
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/freelancer.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
        <script src="js/login.js"></script>

        <!-- Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <!-- IE8 support for HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <table><tr><td> <img src="logo.jpg" width="200px" height="60px" ></td>
                            <td></td>
                        </tr></table>
                </div> 
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <form class="form-inline" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                <input type="email" name="username" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                            </div>
                            <input type="submit" class="btn btn-primary" value="SIGN IN" name="submit">
                            <a href="sign_up.php" class="btn btn-primary">Sign up</a>
                        </form>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <div id="wowslider-container1">
            <div class="ws_images"><ul>
                    <li><img src="data1/images/1.jpg" alt="1" title="LET THE ADVENTURE BEGIN..." id="wows1_0"/></li>
                    <li><img src="data1/images/2.jpg" alt="2" title="FRIENDS CAN BE FOUND ANYWHERE..." id="wows1_1"/></li>
                    <li><img src="data1/images/3.jpg" alt="3" title="FORM A GROUP AND ENJOY YOUR MOMENTS..." id="wows1_2"/></li>
                    <li><img src="data1/images/4.jpg" alt="6" title="DON'T WAIT FOR FUN..." id="wows1_4"/></li>
                    <li><img src="data1/images/5.jpg" alt="7" title="GO FOR IT...DO IT...HANG OUT.." id="wows1_5"/></li>
                </ul></div>
            <div class="ws_bullets"><div>
                    <a href="#" title="1"><img src="data1/tooltips/1.jpg" alt="1"/>1</a>
                    <a href="#" title="2"><img src="data1/tooltips/2.jpg" alt="2"/>2</a>
                    <a href="#" title="3"><img src="data1/tooltips/3.jpg" alt="3"/>3</a>
                    <a href="#" title="5"><img src="data1/tooltips/5.jpg" alt="5"/>4</a>
                    <a href="#" title="6"><img src="data1/tooltips/6.jpg" alt="6"/>5</a>
                    <a href="#" title="7"><img src="data1/tooltips/7.jpg" alt="7"/>6</a>
                </div></div>
            <div class="ws_shadow"></div>
        </div>


        <footer class="text-center">
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            Copyright &copy; 2014 - JauntyMate
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>
        <script src="js/freelancer.js"></script>
        <script type="text/javascript" src="engine1/wowslider.js"></script>
        <script type="text/javascript" src="engine1/script.js"></script>
    </body>

</html>

