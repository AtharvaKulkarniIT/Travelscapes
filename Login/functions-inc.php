<?php

function emptyInputSignup($email, $username, $pwd, $pwdconfirm){
    $result;
    if (empty($email) || empty($username) || empty($pwd) || empty($pwdconfirm)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdconfirm){
    $result;
    if ($pwd !== $pwdconfirm){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
  $sql = "SELECT * FROM login WHERE usersuid = ? OR usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: login.php?error=usernametaken");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else{
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $username, $pwd){
    $sql = "INSERT INTO login (usersEmail, usersuid, userspwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("location: login.php?error=stmtfailed");
      exit();
    }

    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
  
    mysqli_stmt_bind_param($stmt, "sss", $email,  $username, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: login.php?error=none");
    exit();
  
  }

  function emptyInputLogin($username, $pwd){
    $result;
    if (empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: login.php?error=Invalid Credentials");
        exit();
    }

    $pwdHashed = $uidExists["userspwd"];
    $checkpwd = password_verify($pwd, $pwdHashed);

    if ($checkpwd === false){
        header("location: login.php?error=wrongpassword");
        exit();
    }
    else if ($checkpwd === true){
        session_start();
        $_SESSION["usersid"] = $uidExists["usersid"];
        $_SESSION["usersuid"] = $uidExists["usersuid"];
        header("location: loggedinhome.php");
        exit();
    }
}