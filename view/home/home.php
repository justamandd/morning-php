<?php
    if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
        require_once 'widgets/list_home.php';
    }else{
        require_once 'landing_page.php';
    }
?>