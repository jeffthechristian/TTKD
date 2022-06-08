<?php
session_start();

$pdo = require 'database.php';

$id = $_GET['profileid'];
$sql = 'SELECT * FROM user WHERE id = :id;';

$statement = $pdo->prepare($sql);
$statement->execute(array(
    ':id' => $id,
));
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

$username = $users[0]['username'];
$firstname = $users[0]['firstname'];
$lastname = $users[0]['lastname'];
$email = $users[0]['email'];
$color = $users[0]['user_color'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profils</title>
</head>
<body>
    <div class="banner"></div>
    <?php require './components/navigation.php'; ?>
    <div class="container">
        <div class="profileinfo">
            <div class="chat-widget f-widget">
                <div class="widget-header">
                    <p><?php echo $username; ?> profils</p>
                </div>
                <div class="widget-body">
                    <div class="profileinfotext">
                        <div class="profile">
                            <p>Vārds: <?php echo $firstname; ?></p>
                            <p>Uzvārds: <?php echo $lastname; ?></p>
                            <p>Lietotājvārds: <?php echo $username; ?></p>
                        </div>
                        <div class="profilepicture" style="background-color: <?php echo $color; ?>;">
                            <p>Profila krāsa: <?php echo $color; ?></p>
                        </div>
                    </div>
                    <div class="profileinfotext-edit">
                        <div class="profile">
                            <?php include './components/updateprofile.php'; ?>
                            <form action="" method="POST">
                                <label for="firstname">Vārds:</label>
                                <input type="text"  value="<?php echo $firstname; ?>" name="firstname">
                                <label for="firstname">Uzvārds:</label>
                                <input type="text" value="<?php echo $lastname; ?>" name="lastname">
                                <label for="firstname">Lietotājvārds:</label>
                                <input type="text" value="<?php echo $username; ?>" name="username">
                                <label for="firstname">Profila krāsa:</label>
                                <input type="color" id="" value="<?php echo $color; ?>" name="color">
                                <button type="submit" name="save-new-info" class="thread-button" id="submit-button">Saglabāt</button>
                            </form>
                        </div>
                    </div>
                    <div class="profileinfotext-edit-password">
                        <div class="profile">
                            <?php include './components/updatepassword.php'; ?>
                            <form action="" method="POST">
                                <label for="firstname">Parole:</label>
                                <input type="password" name="password">
                                <label for="firstname">Jaunā parole:</label>
                                <input type="password" name="new-password">
                                <label for="firstname">Jaunā parole atkārtoti:</label>
                                <input type="password" name="re-new-password">
                                <button type="submit" name="save-new-password" class="thread-button" id="submit-button">Saglabāt</button>
                            </form>
                        </div>
                    </div>
                    <?php if(isset($_SESSION['user-id']) && $_SESSION['user-id'] == $_GET['profileid']): ?>
                    <div class="edit-profile">
                        <button class="thread-button" id="edit-button">Labot profila informāciju</button>
                    </div>
                    <div class="edit-password">
                        <button class="thread-button" id="password-button">Mainīt paroli</button>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./scripts/app.js"></script>
</html>