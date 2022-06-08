<?php

session_start();

$pdo = require 'database.php';

$newid = $_GET['postid'];

try{
    $sql = "SELECT new_title, new_content, author_id FROM news WHERE new_id=:newid";
    $statement = $pdo->prepare($sql);
    $statement->execute(array(
        ':newid' => $newid
    ));
}catch(PDOException $e) {
    echo $e->getMessage();
    echo '<div class="alert alert-danger" role="alert">
    Datubāzes kļūda!
    </div>';
}
$new = $statement->fetchAll(PDO::FETCH_ASSOC);

$new_title = $new[0]['new_title'];
$new_content = $new[0]['new_content'];
$author_id = $new[0]['author_id'];

try{
    $sql = "SELECT id, username FROM user WHERE id=:userid";
    $statement = $pdo->prepare($sql);
    $statement->execute(array(
        ':userid' => $author_id
    ));
}catch(PDOException $e) {
    echo $e->getMessage();
    echo '<div class="alert alert-danger" role="alert">
    Datubāzes kļūda!
    </div>';
}
$user = $statement->fetchAll(PDO::FETCH_ASSOC);
$username = $user[0]['username'];
$profileid = $user[0]['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $new_title ?></title>
</head>
<body>
<div class="banner"></div>
    <?php require './components/navigation.php'; ?>
    <div class="container">
        <div class="chat-widget" style="display: inline-block; margin: 35px;">
            <div class="widget-header">
                <p><?php echo $new_title ?></p>
            </div>
            <div class="widget-body">
                <div class="post-text">
                    <p><?php echo $new_content ?></p>
                </div>
                <div class="author-text">
                    <p>Pievienoja <a href="profile.php?profileid=<?php echo $profileid; ?>"><?php echo $username; ?></a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>