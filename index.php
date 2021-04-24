<?php 
session_start();
//head da página
require_once 'header.php';


require_once './view/pages/navbar.php';
?>

<div class="container">
<?php
require_once './view/register/user.php';
require_once './view/pages/login.php';
require_once './view/register/team.php';
require_once './view/pages/contHome.php';
?>
</div>


<?php //footer da página
require_once 'footer.php';
?>