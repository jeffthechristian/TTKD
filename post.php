<?php

session_start();

$pdo = require 'database.php';

$postid = $_GET['postid'];

try{
    $sql = "SELECT post_title, post_content, author_id FROM posts WHERE post_id=:postid";
    $statement = $pdo->prepare($sql);
    $statement->execute(array(
        ':postid' => $postid
    ));
}catch(PDOException $e) {
    echo $e->getMessage();
    echo '<div class="alert alert-danger" role="alert">
    Datubāzes kļūda!
    </div>';
}
$post = $statement->fetchAll(PDO::FETCH_ASSOC);

$post_title = $post[0]['post_title'];
$post_content = $post[0]['post_content'];
$author_id = $post[0]['author_id'];

try{
    $sql = "SELECT id, username, user_color FROM user WHERE id=:userid";
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
$usercolor = $user[0]['user_color'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./scripts/navigation.js" defer></script>
    <script src="./scripts/app.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post_title ?></title>
</head>
<body>
<div class="banner"></div>
    <?php require './components/navigation.php'; ?>
    <div class="container">
        <div class="chat-widget f-widget">
            <div class="widget-header">
                <p><?php echo $post_title ?></p>
            </div>
            <div class="widget-body">
                <div class="post-text">
                    <p><?php echo $post_content ?></p>
                </div>
                <div class="author-text">
                    <p>Pievienoja <a href="profile.php?profileid=<?php echo $profileid; ?>" style="color: <?php echo $usercolor; ?>"><?php echo $username; ?></a></p>
                </div>
            </div>
        </div>
        <div class="chat-widget f-widget">
            <div class="widget-header">
                <p>Komentāri</p>
            </div>
            <div class="widget-body">
                <?php if(isset($_SESSION['is-logged-in'])): ?>
                <div class="newpost">
                    <?php include './components/addcomment.php'; ?>
                    <form action="" method="POST">
                        <label for="comment-text">Pievienot komentāru:</label>
                        <input type="text" name="comment-text" id="">
                        <button type="submit" id="submit-button" name="add-comment">Pievienot komentāru</button>
                    </form>
                </div>
                <?php else: ?>
                <div class="login-alert" style="margin-top: 20px;">
                    <p><a href="login.php">Ielogojies</a> lai pievienotu jaunus komentārus!</p>
                </div>
                <?php endif; ?>
                <div class="comments">
                    <?php include './components/loadcomments.php';  ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>