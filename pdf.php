
<?php 
ob_clean();
ob_start();
require 'vendor/autoload.php';
include 'db.php';

$result = $conn->query("select t_id, task_title, task_desc, task_deadline from tasks");
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->Setfont('Times','B',12);
$pdf->Cell(0,10,'task',0,1,'C');
$html = '<table border = "1" cellpadding = 12>
<tr>
<td>Task ID</td>
<td>Title</td>
<td>Description</td>
<td>Deadline</td>
</tr>';

while ($row = $result->fetch_assoc()) {

    $html .= '<tr>
        <td>' .$row["t_id"]. '</td>
        <td>' .$row["task_title"]. '</td>
        <td>' .$row["task_desc"]. '</td>
        <td>' .$row["task_deadline"]. '</td>
    </tr>';
}
$html .= '</table>';
$pdf->writehtml($html,true,false, true,false,"");
ob_end_clean();
$pdf->output('task.pdf',"D");

?>

