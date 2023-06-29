<?php
include('db_connect.php'); // assumes the file with database connection details is in the same directory

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM files WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$file = $stmt->get_result()->fetch_assoc();

// Get the file data and set the appropriate headers
$contentType = $file['file_type'];
header("Content-type: $contentType");
header('Content-Disposition: inline; filename="'. $file['name'] .'"');
header('Content-Transfer-Encoding: binary');
header('Pragma: no-cache');
header('Expires: 0');

// Output the file content to the browser
echo $file['file_path'];
//cho base64_decode($file['file_content']);
?>