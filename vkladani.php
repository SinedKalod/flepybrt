<?php
session_start();
$con = mysqli_connect("localhost","dolakd04","TEST123TEST","ropdolak");
if($con && $_POST)
    {
        $username = $_SESSION["username"];
        $prispevek = $_POST['prispevek'];
        $sql = "INSERT INTO forum (username, prispevek) VALUES ('$username', '$prispevek')";
        mysqli_query($con, $sql);
        header('Location: forum.php');
    }
else echo("You have to be logged in to post a comment!");
?>