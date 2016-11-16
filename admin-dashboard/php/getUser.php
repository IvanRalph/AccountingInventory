<?php
    session_start();
    $username = $_GET['username'];
    include('../../php/connectdb.php');
    if(!$conn){
        die();
    }
    
    $queryGetUser = "SELECT firstname FROM user WHERE USERNAME = '$username'";
    $result = mysqli_query($conn, $queryGetUser);
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['username'] = $username;
    header("Location: ../index.php?firstname=$firstname");
?>