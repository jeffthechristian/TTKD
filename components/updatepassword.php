<?php
if(isset($_POST['save-new-password'])){
    if(empty($_POST['password']) || empty($_POST['new-password']) || empty($_POST['re-new-password'])){
        echo '<div class="alert alert-danger" role="alert">
        Visi ievades lauki nav aizpildīti!
        </div>';
        return;
    }

    $password = $_POST['password']
    $newpassword = $_POST['new-password']
    $renewpassword = $_POST['re-new-password']
    $userid = $_SESSION['user-id'];
    

    if(strlen($newpassword) < 8){
        echo '<div class="alert alert-danger" role="alert">
        Parole ir pārāk īsa! Tai jābūt vismaz 8 simbolus garai!
        </div>';
        return;
    }

    if($newpassword != $renewpassword){
        echo '<div class="alert alert-danger" role="alert">
        Paroles nesakrīt!
        </div>';
        return;
    }

    $pdo = require 'database.php';

    try {
        $sql = "UPDATE user SET password = :password WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute(array(
            ':password' => md5($password),
            ':id' => $userid
        ));
        header('Location: profile.php?profileid='.$userid);
    } catch(PDOException $e) {
        echo $e->getMessage();
        echo '<div class="alert alert-danger" role="alert">
        Datubāzes kļūda!
        </div>';
    }
    
}
?>