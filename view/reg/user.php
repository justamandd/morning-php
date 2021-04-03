<form action="" method="POST" name="frmPerson" id="frmPerson" style="margin: auto;" class="mt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="">Sign Up</h3>
            <input type="text" name="name" id="name" class="form-control mt-3" placeholder="Name" required value="<?php echo isset($user)?$user->getName():'' ?>">
            <input type="text" name="surname" id="surname" class="form-control mt-3" placeholder="Surname" required value="<?php echo isset($user)?$user->getSurname():'' ?>">
            <input type="email" name="email" id="email" class="form-control mt-3" placeholder="Email" required value="<?php echo isset($user)?$user->getEmail():'' ?>">
            <input type="date" name="dtBirthday" id="dtBirthday" class="form-control mt-3" required value="<?php echo isset($user)?$user->getDtBirth():'' ?>">
            <input type="text" name="user" id="user" class="form-control mt-3" placeholder="Username" required value="<?php echo isset($user)?$user->getUser():'' ?>">
            <input type="password" name="password" id="password" class="form-control mt-3" placeholder="Password" required>
            <input type="hidden" name="type" id="type" value="0">
            <button type="submit" name="confirmBtn" id="confirmBtn" class="btn btn-success mt-3">Sign Up</button>
        </div>
    </div>
</form>

<?php

if(isset($_POST['confirmBtn'])){
    require_once 'controller/UserController.php';
    call_user_func(array('UserController','save'));
}