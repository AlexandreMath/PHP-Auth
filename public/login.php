<?php 
session_start();
require '../vendor/autoload.php';

use App\Auth;
use App\Helpers\App;

$auth = App::getAuth();
$error = FALSE;

/*if($auth->user() !== NULL){
    header('Location: index.php');
    exit();
}
*/
if(!empty($_POST)){
    $user = $auth->login($_POST['username'], $_POST['password']);
    if ($user) {
        header('Location: index.php?login=1');
        exit();
    }
    $error = TRUE;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Authentification</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="w3-top">
        <div class="w3-bar w3-tblue w3-card w3-left-align w3-large">
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
        </div>
        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
        </div>
    </nav>
    <main class="w3-main w3-container w3-margin" style="padding:128px 16px">
        <h1>Login</h1>
        <?php if($error): ?>
            <div class="w3-panel w3-padding danger">
                Sorry something wrong
            </div>
        <?php endif ?>
        <?php if(isset($_GET['forbid'])): ?>
            <div class="w3-panel w3-padding danger">
                You are not authorized to access this page
            </div>
        <?php endif ?>
        <form action="" method="post" class="w3-container w3-padding w3-card-4 w3-light-grey">
            <section class="w3-section">
                <label for="username">Nickname</label>
                <input type="text" name="username" id="username" class="w3-input w3-border" placeholder="Nickname">
            </section>
            <section class="w3-section">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="w3-input w3-border" placeholder="Password">
            </section>
            <button class="w3-btn w3-tblue w3-margin-top" type="submit">Se connecter</button>
        </form>
    </main>
</body>