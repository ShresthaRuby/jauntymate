<?php

session_start();
require_once "functions.php";

function log_in($id, $email) {
    if ($_SESSION['session_user_id'] = $id and $_SESSION['session_user_email'] = $email) {
        return true;
    } else {
        return false;
    }
}

function confirm_log_in() {

    if (!log_in()) {
        redirect_to("index.php");
    }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
