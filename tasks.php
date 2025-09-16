<?php

require('func.php');

if(isset($_POST['save_task'])){
    
    $title = urlencode($_POST['title']);

    if(isset($_POST['edid'])) { 
        $edid = $_POST['edid'];
        $query = "UPDATE task SET title = :title WHERE id = :edid";
    }

    else $query = "INSERT INTO task(title, id) VALUES (:title, :id)";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param('ss', $title, $edid);
        $stmt->execute();
        $stmt->close();
    }
    if(!$result){
        die("Query failed");
    }
    
    $_SESSION['message'] = 'Task saved successfully';
    $_SESSION['message_type'] = 'success';

} elseif (isset($_GET['delid'])) {

        $id = $_GET['delid'];

    $stmt = $conn->prepare("DELETE FROM task WHERE id =?");
    if ($stmt) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Failed to prepare the statement.";
    }
        if(!$result){
            die("Query failed");
        }
        $_SESSION['message'] = 'Task removed successfully';
        $_SESSION['message_type'] = 'warning';

}

header('Location: index.php');

?>