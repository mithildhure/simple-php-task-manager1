<?php 

SESSION_START();
include '../db.php';

if (!isset($_SESSION["u_id"])) {
    header("Location:../login.php");
    exit();
}

if (isset($_GET["id"])) {
    
    $user_id = $_SESSION["u_id"];
    $task_id = $_GET["id"];

    $sql = $conn->prepare("delete from tasks where t_id = ? and user_id = ?");
    $sql->bind_param("ii",$task_id,$user_id);

    if ($sql->execute()) {
        echo "<script>
        alert('Task Deleted');
        window.location='../home.php';
        </script>";
        exit();
        
    }else {
        echo "<script>
        alert('Failed to delete task');
        window.location='../home.php';
        </script>";
        exit();
        
    }

}


?>