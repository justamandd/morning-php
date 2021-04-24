<?php
    require_once 'controller/TeamController.php';
?>
<div id="content">
    <?php
        $teams = call_user_func(array('TeamController','listTeamsUser'));
        if(isset($teams) && !empty($teams)){
            foreach($teams as $team){
    ?>
    <div class="card mt-4">
        <a href="" class="anc">
            <div id="<?php echo $team->getId(); ?>" class="card-header d-flex flex-wrap">
                <h6 id="name"><?php echo $team->getName(); ?></h6>
            </div>
        </a>
        <div class="card-body d-flex flex-wrap">
            <a href="" class="anc mx-3 my-3">
                <div class="card board-card">
                    <div class="card-header">
                        <small id="title-text">TITLE</small>
                    </div>
                    <div class="card-body">
                        <small id="desc-text">DESC</small>
                    </div>
                </div>
            </a>
            
        </div>
    </div>
    <?php
            }
        }
    ?>
</div>