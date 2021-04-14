<?php 
session_start();
//head da página
require_once 'header.php';
?>

<div class="container">
<?php
require_once './view/reg/user.php';
require_once './view/login.php';
require_once './view/reg/team.php';
require_once './view/contHome.php';
?>
</div>


<?php //footer da página
require_once 'footer.php';
?>