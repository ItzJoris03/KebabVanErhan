<?php
session_start();
include "../db_management.php";
include "../debug/debug.php";

$db = new db;

$pwd = $_POST['password'];
$email = $_POST['email'];

if($pwdDB = $db->getPassword($email)) {
    if(password_verify($pwd, $pwdDB[0]["Password"])) {
        $_SESSION['admin'] = true;
        header("Location: ../../admin/");
    } else {
        header("Location: ../../login/?WrongPassword");
    }
} else {
    header("Location: ../../login/?WrongEmail");
}