<?php
<<<<<<< HEAD
if(isset($_POST['save-new-password'])){
    if(empty($_POST['password']) || empty($_POST['new-password']) || empty($_POST['re-new-password'])){
=======
if(isset($_POST['update-password'])){
    if(empty($_POST['password'])){
>>>>>>> 39b13eab873cfa5d9c5a5af1db41c51e7df49611
        echo '<div class="alert alert-danger" role="alert">
        Visi ievades lauki nav aizpildīti!
        </div>';
        return;
    }

<<<<<<< HEAD
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
=======
    $password = $_POST['password'];    

    if(strlen($password) < 8){
        echo '<div class="alert alert-danger" role="alert">
        Jūsu parole ir pārāk īsa!
>>>>>>> 39b13eab873cfa5d9c5a5af1db41c51e7df49611
        </div>';
        return;
    }

    $pdo = require 'database.php';

    try {
        $sql = "UPDATE user SET password = :password WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute(array(
<<<<<<< HEAD
            ':password' => md5($password),
            ':id' => $userid
=======
            ':password' => $password,

>>>>>>> 39b13eab873cfa5d9c5a5af1db41c51e7df49611
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