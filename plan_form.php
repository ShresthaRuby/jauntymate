<?php
session_start();
include_once './functions.php';
//$first_name = mysql_prep($_POST['fname']);
//$last_name = mysql_prep($_POST['lname']);
//$address = mysql_prep($_POST['address']);
//$age = mysql_prep((int) $_POST['age']);
//$country = mysql_prep($_POST['country']);
//$fb_google_id = mysql_prep($_POST['fb_id']);
//$occupation = mysql_prep($_POST['occupation']);
//$organization = mysql_prep($_POST['organization']);
//$email = mysql_prep($_POST['email']);
//$password = mysql_prep($_POST['password']);
//
//echo ''.$first_name;
$id=insert_plan();
if ( $id!= null) {
    redirect_to('group.php?id='.$id);
} else {
    redirect_to('index.php?msg=error');
}
?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

