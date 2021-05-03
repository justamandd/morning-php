<?php
    require_once 'controller/TeamController.php';
    require_once 'controller/BoardController.php';
?>
<div id="content">
    <?php
        $teams = call_user_func(array('TeamController','listTeamsUser'));
        if(isset($teams) && !empty($teams)){
            foreach($teams as $team){
                $boards = call_user_func(array('BoardController','listBoardsTeam'), $team->getId());
    ?>
    <div class="card mt-4">
        <div class="card-header p-0">
            <div class="row d-flex justify-content-between mx-1">
                <a href="?page=team&id_team=<?php echo $team->getId(); ?>" class="text-decoration-none text-dark anc col p-3">
                    <div id="<?php echo $team->getId(); ?>" class="d-flex flex-wrap ">
                        <h6 id="name"><?php echo $team->getName(); ?></h6>
                    </div>
                </a>
                <div class="d-flex p-3">
                    <a href="?action=create_board&id_team=<?php echo $team->getId(); ?>" class="button-header">
                        <div id="plus">
                            <img src="./public/img/add_black_24dp.svg" alt="" srcset="" class="" data-toggle="tooltip" data-placement="top" title='Create a new board into "<?php echo $team->getName(); ?>"'>
                        </div>
                    </a>
                    <a href="?action=edit_team&id_team=<?php echo $team->getId(); ?>" class="button-header ml-1">
                        <div id="edit">
                            <img src="./public/img/mode_edit_black_24dp.svg" alt="" srcset="" class="" data-toggle="tooltip" data-placement="top" title="Edit team">
                        </div>
                    </a>
                    <a href="?action=delete_team&id_team=<?php echo $team->getId(); ?>" class="button-header ml-1">
                        <div id="delete">
                            <img src="./public/img/close_black_24dp.svg" alt="" srcset="" class="" data-toggle="tooltip" data-placement="top" title="Delete team">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body d-flex flex-wrap">
        <?php 
        if(isset($boards) && !empty($boards)){
            foreach($boards as $board){ ?>
            <a href="?page=board&id_board=<?php echo $board->getId(); ?>" class="anc mx-sm-3 my-sm-3">
                <div class="card board-card">
                    <div class="card-header">
                        <small id="title-text"><?php echo $board->getName(); ?></small>
                    </div>
                    <div class="card-body">
                        <small id="desc-text"><?php echo $board->getDescription(); ?></small>
                    </div>
                </div>
            </a>
        <?php
            }
        }
        ?> 
        </div>
    </div>
    <?php
            }
        }
    ?>
</div>