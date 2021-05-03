<?php 
session_start();
//head da página
require_once 'header.php';



$navbar = require_once './view/shared/navbar.php';
?>

<div class="container">
<?php
// dentro da home.php tem a condição que chama tanto a landing page ou a home
require_once './view/home/home.php'; 
if(isset($_GET['action'])){
    if($_GET['action'] == 'quit'){
        require_once './kill_session.php';
    }else if($_GET['action'] == 'signin'){
        require_once 'view/pages/login.php';
    }else if($_GET['action'] == 'signup'){
        require_once 'view/register/user.php';
    }else if($_GET['action'] == 'create_team'){
        require_once 'view/register/team.php';
    }else if($_GET['action'] == 'edit_team'){
        require_once 'view/register/team.php';
    }else if($_GET['action'] == 'delete_team'){
        if($team = call_user_func(array('TeamController','removeTeam'))){
            echo "<script> window.location.href = '/morning-php/' </script>";
        }
    }else if($_GET['action'] == 'create_board'){
        require_once './view/register/board.php'; 
    }
}


?>
</div>


<?php //footer da página
$url_atual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $url_atual;
require_once 'footer.php';
?>