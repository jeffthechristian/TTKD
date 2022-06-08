<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>The Outpost</title>
</head>
<?php session_start(); ?>
<body>
    <div class="banner"></div>
    <?php require './components/navigation.php'; ?>
    <div class="container">
        <div class="namedays">
            <?php 
            
            $file = './assets/data/namedays.json';
            $data = file_get_contents($file);
            $namedays = json_decode($data, true);
            $names = '';
            $month = getdate()['mon'] - 1;
            $day = getdate()['mday'] - 1;

            for($i = 0; $i < sizeof($namedays[$month][$day]); $i++){
                $names .= $namedays[$month][$day][$i].' ';
            }

            echo '<p>Vārda dienas šodien: '.$names;

            ?>
        </div>
        <div class="main-content">
            <div class="content-container">
                <div class="chat-widget">
                    <div class="widget-header">
                        <p>Čats</p>
                    </div>
                    <div class="widget-body">
                        <iframe src="Page1.php" width="100%" height="350" scrolling="yes" frameBorder="0"></iframe>
                        <div class="message-input">
                            <?php if(isset($_SESSION['is-logged-in'])): ?>
                            <form method="POST" action="Page2.php">
                                <input type="textarea" name = "chat-input" autocomplete="off"/>
                                <button type="submit" name="send-message">Send</button>
                            </form>
                            <?php else: ?>
                                <div class="login-alert">
                                    <p><a href="login.php">Ielogojies</a> lai sūtītu ziņas čatā!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="chat-widget">
                    <div class="widget-header">
                        <p>Jaunumi</p>
                    </div>
                    <div class="widget-body">
                        <?php
                        
                        $pdo = require 'database.php';
                        try{
                            $sql = "SELECT new_id, new_title, author_id, user.id, user.username FROM posts INNER JOIN user ON news.author_id = user.id";
                            $statement = $pdo->prepare($sql);
                            $statement->execute();
                        }catch(PDOException $e) {
                            echo $e->getMessage();
                            echo '<div class="alert alert-danger" role="alert">
                            Datubāzes kļūda!
                            </div>';
                        }
                        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

                        for($i = 0; $i < sizeof($posts); $i++){
                            echo '
                            
                            <div class="forum-post">
                            <div class="image"></div>
                                <div class="post-info">
                                    <a href="post.php?postid='.$posts[sizeof($posts) - $i - 1]['post_id'].'">'.$posts[sizeof($posts) - $i - 1]['post_title'].'</a>
                                    <p>Pievienoja <a href="profile.php?profileid='.$posts[sizeof($posts) - $i - 1]['author_id'].'" id="user-link">'.$posts[sizeof($posts) - $i - 1]['username'].'</a></p>
                                </div>
                            </div>

                            ';
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
            <div class="side-container">
                <?php if (isset($_SESSION['is-logged-in'])): ?>
                <div class="new-thread">
                    <a href="newpost.php" class="thread-button">+ Pievienot jaunu ierakstu</a>
                </div>
                <?php endif; ?>
                <div class="side-widget">
                    <div class="widget-header">
                        <p>Jaunkākie ieraksti</p>
                    </div>
                    <div class="widget-body">
                        <?php for($i = 0; $i < sizeof($posts); $i++){
                            if($i == 4) break;
                            echo '<div class="mini-post"><a href="post.php?postid='.$posts[sizeof($posts) - $i - 1]['post_id'].'">'.$posts[sizeof($posts) - $i - 1]['post_title'].'</a></div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="advertisment">
                    <h2>Vieta reklāmai</h2>
                </div>
            </div>
        </div>
    </div>
</body>
</html>