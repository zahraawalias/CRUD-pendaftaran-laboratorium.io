<?php

error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "labpsi";

$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["usertype"];
    $pass = $_POST["password"];
    $sql = "SELECT * FROM user WHERE usertype='" . $user . "' AND password='" . $pass . "' ";

    $result = mysqli_query($data, $sql);
    
    if ($result) {
        $row = mysqli_fetch_array($result);

        if ($row) {
            $_SESSION['usertype'] = $user;
            
            if ($user == "admin") {
                header("location: admindashboard.php");
                exit;
            } else {
                $message = "Usertype dan Password tidak cocok";
                $_SESSION['loginMessage'] = $message;
                header("location: loginform.php");
                exit;
            }
        } else {
            $message = "Usertype dan Password tidak cocok";
            $_SESSION['loginMessage'] = $message;
            header("location: loginform.php");
            exit;
        }
    } else {
        die("Query failed: " . mysqli_error($data));
    }
}
?>
