<?php 
require '../vendor/autoload.php';

use App\Helpers\App;

$user = App::getAuth()->user();
$role = $user->role ?: NULL;
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
    <!-- Navbar -->
    <nav class="w3-top">
        <div class="w3-bar w3-tblue w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-tblue" href="javascript:void(0);" onclick="nav()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 1</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 2</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 3</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 4</a>
            <?php if($role === 'user'): ?>
                <div id="user">
                    <a href="user.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-round">User</a>
                </div>
            <?php elseif($role === 'admin'): ?>
                <div id="admin">
                    <a href="admin.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-round">Admin</a>
                </div>
            <?php endif; ?>
            <?php if($user): ?>
                <div class="w3-right">
                    <a href="admin.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-round"><i class="fa fa-user"></i> Hello <?= $user->username ?></a>
                    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Logout</a>
                </div>
            <?php endif; ?>
        </div>
        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
            <?php if($role === 'user'): ?>
                <div id="user">
                    <a href="user.php" class="w3-bar-item w3-button w3-padding-large">User</a>
                </div>
            <?php elseif($role === 'admin'): ?>
                <div id="admin">
                    <a href="admin.php" class="w3-bar-item w3-button w3-padding-large">Admin</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <!-- Header -->
    <header class="w3-container w3-tblue w3-center" style="padding:128px 16px">
        <h1 class="w3-margin w3-jumbo">START PAGE</h1>
        <p class="w3-xlarge">authentification system</p>
        <a href="login.php" class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Connection</a>
    </header>
    <?php if(isset($_GET['login'])): ?>
        <div class="w3-panel w3-padding success">
            You are identified correctly
        </div>
    <?php endif ?>
    <script src="js/nav.js"></script>
</body>
</html>