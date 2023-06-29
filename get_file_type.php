<?php
include('db_connect.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $file = $conn->query("SELECT * FROM files WHERE id = $id");
    $row = $file->fetch_assoc();
    $type = strtolower($row['file_type']);
    if(in_array($type, array('pdf', 'image/png', 'image/jpg', 'image/jpeg', 'image/gif'))) {
        $response = array('type' => 'pdf');
    } else {
        $response = array('type' => 'download');
    }
    echo json_encode($response);
}
?>
