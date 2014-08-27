<?php
include_once 'functions.php';
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
$conn = connect_to_database();
$query = mysqli_query($conn, "select country_code,country_name from countries order by country_name asc");
confirm_query($query);
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

    <body id="page-top" class="index">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <a class="navbar-brand" style="color:white;" href="#page-top">JauntyMate</a>
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
        <section>

            <div style="position:relative;top:20px;">
                <form class="form-horizontal" role="form" action="sign_up_form.php" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="filename" class="col-sm-2 control-label"></label>
                        <div class="col-sm-8">
                            <h4>Register your account</h4>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="filename" class="col-sm-2 control-label">Image file</label>
                        <div class="col-sm-8">
                            <input type="file" name="imagefile"  id="file"><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="firstname" name="fname" placeholder="Enter First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lastname" name="lname" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-8">
                            <select id="countries" class="form-control" name="country">
                                <?php while ($result = mysqli_fetch_array($query)) {
                                    ?>  <option value="<?php echo $result['country_name']; ?>"><?php echo $result['country_name']; ?></option>>
                                    <?php
                                }
                                ?>
                            </select></div>
                    </div>
                    <div class="form-group">
                        <label for="occupation" class="col-sm-2 control-label">Occupation</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter occupation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="organisation" class="col-sm-2 control-label">Organization</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="organisation" name="organization" placeholder="Enter organisation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="age" class="col-sm-2 control-label">Age</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="country" name="age" placeholder="Enter Age">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fb_id" class="col-sm-2 control-label">Facebook url</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fb_id" name="fb_id" placeholder="Enter facebook url">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>