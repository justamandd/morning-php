<?php
    require_once 'controller/TeamController.php';
?>
<div id="content">
    <?php
        $teams = call_user_func(array('TeamController','listTeamsUser'));
        //print_r($teams);
        //var_dump($teams);
        if(isset($teams) && !empty($teams)){
            foreach($teams as $team){
    ?>
    <a href="">
        <div class="card card-body">
                <h6 id="name"><?php echo $team->getName(); ?></h6>
                <p id="desc"><?php echo $team->getDescription(); ?></p>
        </div>
    </a>
    <?php
            }
        }
    ?>
</div>