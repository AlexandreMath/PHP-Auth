<?php
require '../vendor/autoload.php';
use App\Helpers\App;

App::getAuth()->requireRole('user', 'admin');
?>
<h1>Hello User</h1>