<?php

if (isset($_POST["login"])){

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh-inc.php';
    require_once 'functions-inc.php';

    if(emptyInputLogin($username, $pwd) !== false){
        header("location: login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
    else{
        header("location: ../cities.php");
        exit();
    }
