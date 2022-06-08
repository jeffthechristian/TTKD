<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izveidot jaunu foruma ierakstu</title>
</head>
<?php session_start();

if(!isset($_SESSION['is-logged-in'])){
    header('Location: login.php');
}

?>
<body>
    <div class="banner"></div>
    <?php require './components/navigation.php'; ?>
    <div class="container">
        <div class="chat-widget f-widget">
            <div class="widget-header">
                <p>Pievienot jaunu foruma ierakstu</p>
            </div>
            <div class="widget-body">
                <div class="newpost">
                    <?php include './components/addpost.php'; ?>
                    <form action="" method="POST">
                        <label for="post-name">Virsraksts:</label>
                        <input type="text" name="post-name" id="post-name" required="true">
                        <label for="post-content">Ieraksta teksts:</label>
                        <textarea name="post-content" id="" cols="30" rows="10" resize="false" required="true"></textarea>
                        <button type="submit" id="submit-button" name="add-post">Pievienot ierakstu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>