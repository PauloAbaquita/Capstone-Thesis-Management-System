<?php
include 'db_connect.php';

if(isset($_POST['id'])) {
    $user_id = $_POST['id'];

    // Perform the deletion query
    $delete_query = "DELETE FROM users WHERE id = $user_id";
    if ($conn->query($delete_query) === TRUE) {
        // Deletion successful
        echo 1;
    } else {
        // Error occurred during deletion
        echo 0;
    }
}

$conn->close();
?>
