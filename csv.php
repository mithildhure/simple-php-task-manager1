<?php 

include 'db.php';
header('Content-type:text/csv');
header('Content-disposition:attachment; filename=task.csv');

$output = fopen("php://output",'w');
fputcsv($output,array('Task Id','Title','Description','Deadline'));
$result = $conn->query("select t_id, task_title, task_desc, task_deadline from tasks");
while ($row = $result->fetch_assoc()) {
    fputcsv($output,$row);
}

?>