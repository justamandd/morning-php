<form action="" method="post" id="frmBoard" name="frmBoard">
    <div class="card mt-5">
        <div class="card-header">
            <h3>Create a Board</h3>
        </div>
        <div class="card-body">
            <input type="text" name="name" id="name" placeholder="Name" required class="form-control" value="<?php echo isset($boardR)?$boardR->getName():''?>">
            <input type="text" name="description" id="description" placeholder="Description" class="form-control mt-3"value="<?php echo isset($boardR)?$boardR->getDescription():''?>">
            <?php
                if(isset($_GET['id_team'])!=true){
                    $teams = call_user_func(array('TeamController','listTeamsUser'));
                ?>
                    <select name="teams" id="teams" class="custom-select mt-3" required>
                        <option selected>Select the team will be created</option>
                        <?php
                            if(isset($teams) && !empty($teams)){
                                foreach($teams as $team){
                                    ?>
                                    <option value="<?php echo $team->getId(); ?>"><?php echo $team->getName(); ?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                <?php
                }
            ?>
        </div>
        <div class="card-footer">
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-success">Create</button>
            <input type="hidden" name="id" id="id" value="<?php echo isset($boardR)?$boardR->getId():''; ?>">
        </div>
    </div>
</form>
<?php

if(isset($_POST['btnSub'])){
    require_once 'controller/BoardController.php';
    if(call_user_func(array('BoardController','saveBoard'))){
        echo '<script>window.location.href = "/morning-php/";</script>';
    };
}