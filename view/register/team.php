<form action="" method="post" id="frmTeam" name="frmTeam">
    <div class="card">
        <div class="card-header">
            <h3>Create a team</h3>
        </div>
        <div class="card-body">
            <input type="text" name="name" id="name" placeholder="Name" required class="form-control">
            <input type="text" name="description" id="description" placeholder="Description" class="form-control mt-3">
            <!-- 
            <input type="text" name="userAss" id="userAss" placeholder="Associate a user to your team" class="form-control mt-3">
            -->
        </div>
        <div class="card-footer">
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-success">Create</button>
            <input type="hidden" name="id" id="id" value="<?php echo isset($team)?$team->getId:''; ?>">
        </div>
    </div>
</form>
<?php

if(isset($_POST['btnSub'])){
    require_once 'controller/TeamController.php';
    call_user_func(array('TeamController','saveTeam'));
}