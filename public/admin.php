<?php
require '../vendor/autoload.php';
use App\Helpers\App;

App::getAuth()->requireRole('admin');
?>
<h1>Hello Admin</h1>