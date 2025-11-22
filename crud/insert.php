<?php 
SESSION_START();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $deadline = $_POST["deadline"];
    $user_id = $_SESSION["u_id"];

    $sql = $conn->prepare("insert into tasks(user_id, task_title, task_desc, task_deadline) values(?,?,?,?)");
    $sql->bind_param("isss",$user_id,$title,$desc,$deadline);

    if ($sql->execute()) {
        echo "<script>alert('Task Added')</script>";
        header("Location:../home.php");
        exit();
    }
    else{
        echo "<script>alert('Failed to add task')</script>";
    }
}

?>