<?php

$pod = require 'database.php';

$sql = "SELECT message, user_id, user.username FROM chat INNER JOIN user ON chat.user_id = user.id";
$statement = $pdo->prepare($sql);
$statement->execute();
$messages = $statement->fetchAll(PDO::FETCH_ASSOC);

if (sizeof($messages)) {
    for($i = 0;  $i < sizeof($messages); $i++) {
        echo "<p style='color: #fff;'><span style = 'margin-right: 15px; color: #F66B0E;'>".$messages[$i]['username'].':</span> '.$messages[$i]['message']. "</p>";
    }
} else {
    echo "Nav nevienas ziņas!";
}
?>