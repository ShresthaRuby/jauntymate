<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//kishan
//remove html entities from the input
function mysql_prep($value) {

    $magic_quotes_active = get_magic_quotes_gpc();
    $new_enough_php = function_exists('mysql_real_escape_string');
    if ($new_enough_php) {
        if ($magic_quotes_active) {

            $value = stripslashes($value);
        }
        $value = mysql_real_escape_string($value);
    } else {
        if (!$magic_quotes_active) {
            $value = addslashes($value);
        }
    }
    return $value;
}

//check if queyr is executed properly
function confirm_query($query) {
    if (!$query) {
        die("Database selection failed: " . mysql_error());
    }
}

//redirect to next page
function redirect_to($location = NULL) {
    if ($location != NULL) {
        header("Location:{$location}");
        exit;
    }
}

//kishan
//Sanjeev Start

function connect_to_database() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jmate";

    // Creat connection
    $conn = mysqli_connect($host, $username, $password, $dbname);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return NULL;
    }
    return $conn;
//    else {
//        echo 'Connection successful';
//    }
}

//Kishan
//take user details and login
function login($name, $password) {
    // check in database 
    session_start();
    $conn = connect_to_database();
    $result = mysqli_query($conn, "select * from tbl_person where email='{$name}' and password ='{$password}'");
    echo mysql_num_rows($result);
    if (mysqli_num_rows($result) != null) {
        //login
        $member = mysqli_fetch_array($result);
        //print_r($member);
        $_SESSION['session_user_id'] = $member['id'];
        $_SESSION['session_user_email'] = $member['email'];
        // echo $_SESSION['SESS_MEMBER_ID'];
        return true;
        //redirect
    } else {
//        redirect_to login page
        return false;
    }
}

function log_out() {
    session_destroy();
}

function suggest($place, $motive) {
    //query to get places and motives to visit that places
    if ($place == null) {
        //search for places matching that motive
    } else if ($motive == null) {
        //search for places matching that place
    }
}

//Kishan
//Sanjeev

function sign_up() {
    $conn = connect_to_database();
    if ($conn != NULL) {
        //get information about the new user/person
        $new_person_id = get_new_id('tbl_person');

        $first_name = mysql_prep($_POST['fname']);
        $last_name = mysql_prep($_POST['lname']);
        $address = mysql_prep($_POST['address']);
        $age = mysql_prep((int) $_POST['age']);
        $country = mysql_prep($_POST['country']);
        $fb_google_id = mysql_prep($_POST['fb_id']);
        $occupation = mysql_prep($_POST['occupation']);
        $organization = mysql_prep($_POST['organization']);
        $email = mysql_prep($_POST['email']);
        $password = mysql_prep($_POST['password']);

//        echo $first_name;
//        echo '<br>'.$_FILES['imagefile']['name'];
        //upload image
        $image_path = upload_file($new_person_id);

//        echo $image_path;
//        $conn = connect_to_database();
        //query to insert to the database
        $sql = "INSERT INTO tbl_person(id, fname, lname, email, password, image, address, country, organization, profession, age, fb_id) VALUES($new_person_id,'$first_name', '$last_name', '$email', '$password', '$image_path', '$address', '$country', '$organization','$occupation', '$age', '$fb_google_id' )";

        $result = mysqli_query($conn, $sql);
        if ($result != NULL) {
            return true;
//            echo 'Data successfully inserted';
        } else {
            return false;
//            echo 'Unable to insert data due to: ' . mysql_error();
        }
    }
}

function get_profile($person_id) {
    //connect to database
    $conn = connect_to_database();
    if ($conn != NULL) {
//        $person_id = $_SESSION['session_user_id'];
        //query to retrieve the information about the user from database
        $sql = "SELECT * FROM tbl_person WHERE id = $person_id";
        $result = mysqli_query($conn, $sql);
        if ($result != NULL) {
            $row = mysqli_fetch_row($result);
            if ($row != NULL) {
                $array_profile = array(
                    "fname" => $row[1],
                    "lname" => $row[2],
                    "email" => $row[3],
                    "address" => $row[6],
                    "age" => $row[10],
                    "country" => $row[7],
                    "occupation" => $row[9],
                    "organization" => $row[8],
                    "fb_google_id" => "http://www." . $row[11],
                    "image_path" => $row[5]
                );
                return $array_profile;
            }
        }
    }
    return NULL;
}

function insert_plan() {
    //connect to database
    $conn = connect_to_database();
    if ($conn != NULL) {
        //obtain details of a trip plan
        $new_id = get_new_id('tbl_trip');
        $duration = mysql_prep($_POST['duration']);
        $starting_date = mysql_prep($_POST['start_date']);
        $motive = mysql_prep($_POST['motive']);
        $destination = mysql_prep($_POST['destination']);
        $description = mysql_prep($_POST['description']);
        $group_id = create_group($destination, $motive);

        echo $new_id . '<br>';
        echo $duration . '<br>';
        echo $starting_date . '<br>';
        echo $motive . '<br>';
        echo $destination . '<br>';
        echo $group_id . '<br>';


        //insert into database
        $sql = "INSERT INTO tbl_trip (id, duration, start_date, group_id, motive, destination,description) VALUES($new_id, '$duration', '$starting_date', $group_id, '$motive', '$destination','$description')";
        $result = mysqli_query($conn, $sql);

        if ($result != NULL) {
//            echo 'Data Insered';
            return $group_id;
        } else {
            echo '' . mysql_error();
        }
        //result 
    }
}

//create group
function create_group($destination, $motive) {
    $conn = connect_to_database();
    if ($conn != NULL) {
        //obtain data
        $group_id = get_new_id('tbl_group');
        $group_name = $destination . ': ' . $motive;
        $person_id = $_SESSION['session_user_id'];
//        $person_id = 7;
        //query 
        $sql = "INSERT INTO tbl_group (id, name, name_list) VALUES($group_id, '$group_name', '$person_id' )";
        mysqli_query($conn, $sql);
//        if ($result != NULL) {
//            echo 'Data Insered';
//        } else {
//            echo '' . mysql_error();
//        }
        //return the group_id
        return $group_id;
    }
    return 0;
}

//Sanjeev
//Ruby
function check_join() {
    $conn=  connect_to_database();
    $group = (int) $_GET['id'];
    $user = $_SESSION['session_user_id'];

    $sql = "SELECT name_list from tbl_group where id='$group'";
    $res = mysqli_query($conn, $sql);
    $val = $res->fetch_array(MYSQLI_ASSOC);
    $name = $val['name_list'];
    $value=explode(",",$name);
    if(in_array($user,$value))
    {
        return true;
    }
 else {
     return FALSE;
    }
}
//    for($i=0;$i<count($value);$i++)
//    {
//        if($value[$i]!=$user)
//        {
//            continue;
//        }
//        
//    }
    

function join_group() {
    $conn = connect_to_database();
    if ($conn != NULL) {
        $group = (int) $_GET['id'];
        $user = $_SESSION['session_user_id'];

        $sql = "SELECT name_list from tbl_group where id='$group'";
        $res = mysqli_query($conn, $sql);
        $val = $res->fetch_array(MYSQLI_ASSOC);
        $name = $val['name_list'];

        $name = $name . ',' . $user;
        echo $name;
        $sql1 = "UPDATE tbl_group SET name_list='$name' where id='$group'";
        if (mysqli_query($conn, $sql1)) {
            return "true";
        } else
            return "false";
//        echo "Successsful";
    }
}

//Ruby
//Sanjeev
function get_group_members($group_id) {
    $conn = connect_to_database();
    if ($conn != NULL) {
        $sql = "SELECT name_list FROM tbl_group WHERE id = $group_id";
        $result = mysqli_query($conn, $sql);
        if ($result != NULL) {
            $row = mysqli_fetch_row($result);
//            echo $row[0];
//            print_r($row);
            if ($row != null) {
                $array = explode(",", $row[0]);
            }
            return $array;
//            print_r($array);
        }
    }
}
function get_group_details($group_id) {
    $conn = connect_to_database();
    if ($conn != NULL) {
        $sql = "SELECT * FROM tbl_trip WHERE group_id = $group_id";
        $result = mysqli_query($conn, $sql);
        if ($result != NULL) {
//              echo $row[0];
//            print_r($row);
//            if ($row != null) {
                return $result;
                
            }
//              print_r($array);
        }
    }


function get_joined_group() {
//    ob_start();
//    session_start();
    $conn = connect_to_database();
    //confirm_log_in();
    $person_id = $_SESSION['session_user_id'];
    $sql = "SELECT id FROM tbl_group WHERE name_list LIKE '%$person_id%'";
    $result = mysqli_query($conn, $sql);
    if ($result != NULL) {
        $grp_array = array();
        while ($row = mysqli_fetch_array($result)) {
            $grp_array[] = $row[0];
        }
        return $grp_array;
    }
    return NULL;
}

//get group id
function get_group_name($group_id) {
    $conn = connect_to_database();
    if ($conn != NULL) {
        $sql = "SELECT name FROM tbl_group WHERE id = $group_id";
        $result = mysqli_query($conn, $sql);
        if ($result != NULL) {
            $row = mysqli_fetch_row($result);
            if ($row != null) {
                return $row[0];
            }
        }
    }
    return null;
}

//group information
function get_trip_information($group_id) {
    $conn = connect_to_database();
    if ($conn != NULL) {
        $sql = "SELECT * FROM tbl_group AS tg, tbl_trip AS tr WHERE tg.id = $group_id AND tg.id = tr.group_id";
        $result = mysqli_query($conn, $sql);
        if ($result != NULL) {
            $row = mysqli_fetch_row($result);
            if ($row != NULL) {
                $trip_info_array = array(
                    'name' => $row[1],
                    'member_list' => $row[2],
                    'destination' => $row[8],
                    'start_date' => $row[5],
                    'duration' => $row[4],
                    'motive' => $row[7],
                );
                return $trip_info_array;
            }
        }
    }
    return NULL;
}

//personal information
function get_personal_info() {
//    ob_start();
//    session_start();
    $conn = connect_to_database();
    if ($conn != NULL) {
        $person_id = $_SESSION['session_user_id'];
//        $person_id = 7;
        $sql = "SELECT * FROM tbl_person WHERE id = $person_id";
        $result = mysqli_query($conn, $sql);
        if ($result != NULL) {
            $row = mysqli_fetch_row($result);
            if ($row != NULL) {
                $personal_info_array = array(
                    'fname' => $row[1],
                    'lname' => $row[2],
                    'email' => $row[3],
                    'password' => $row[4],
                    'image_path' => $row[5],
                    'address' => $row[6],
                    'country' => $row[7],
                    'organization' => $row[8],
                    'occupation' => $row[9],
                    'age' => $row[10],
                    'fb_google_id' => $row[11]
                );
                return $personal_info_array;
            }
        }
    }
    return NULL;
}

//search query
function search_results($keywords) {
    $conn = connect_to_database();
    if ($conn != NULL) {
        $sql = "SELECT group_id FROM tbl_trip WHERE motive LIKE '%$keywords%' OR destination LIKE '%$keywords%'";
        $result = mysqli_query($conn, $sql);
        if ($result != null) {
            $group_id_array = array();
            while ($row = mysqli_fetch_array($result)) {
                $group_id_array[] = $row[0];
            }
            return $group_id_array;
        }
    }
    return NULL;
}

function get_new_id($table_name) {
    $conn = connect_to_database();
    $sql = "SELECT MAX(ID) FROM `$table_name`";
    $result = mysqli_query($conn, $sql);
    if ($result != NULL) {
        $row = mysqli_fetch_row($result);
        if ($row != NULL) {
            return $row[0] + 1;
        } else {
            return 1;
        }
    }
}

function upload_file($person_id) {
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["imagefile"]["name"]);
    $extension = end($temp);

    if ((($_FILES["imagefile"]["type"] == "image/gif") || ($_FILES["imagefile"]["type"] == "image/jpeg") || ($_FILES["imagefile"]["type"] == "image/jpg") || ($_FILES["imagefile"]["type"] == "image/pjpeg") || ($_FILES["imagefile"]["type"] == "image/x-png") || ($_FILES["imagefile"]["type"] == "image/png")) && ($_FILES["imagefile"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
        if ($_FILES["imagefile"]["error"] > 0) {
            echo "Return Code: " . $_FILES["imagefile"]["error"] . "<br>";
        } else {
//            echo "Upload: " . $_FILES["imagefile"]["name"] . "<br>";
//            echo "Type: " . $_FILES["imagefile"]["type"] . "<br>";
//            echo "Size: " . ($_FILES["imagefile"]["size"] / 1024) . " kB<br>";
//            echo "Temp imagefile: " . $_FILES["imagefile"]["tmp_name"] . "<br>";
//            $_FILES["imagefile"]["name"] = $person_id . "_" . $_FILES["imagefile"]["name"];
            move_uploaded_file($_FILES["imagefile"]["tmp_name"], "upload/" . $person_id . "_" . $_FILES["imagefile"]["name"]);
            return 'upload/' . $person_id . "_" . $_FILES["imagefile"]["name"];
        }
    } else {
        echo "Invalid file";
    }
    echo 'return null';
    return NULL;
}

//Sanjeev End