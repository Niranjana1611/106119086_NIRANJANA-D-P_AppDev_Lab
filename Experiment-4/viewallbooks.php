<?php 
include "db_conn.php";
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
$data = array();
while ($row = mysqli_fetch_object($result))
{
    $data[] = $row;
}
echo json_encode($data);
?>