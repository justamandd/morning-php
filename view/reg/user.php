<form action="" method="POST" name="frmPerson" id="frmPerson" style="margin: auto;" class="mt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="">Sign Up</h3>
            <input type="text" name="name" id="name" class="form-control mt-3" placeholder="Name" required value="<?php echo isset($user)?$user->getName():'' ?>">
            <input type="text" name="surname" id="surname" class="form-control mt-3" placeholder="Surname" required value="<?php echo isset($user)?$user->getSurname():'' ?>">
            <input type="email" name="email" id="email" class="form-control mt-3" placeholder="Email" required value="<?php echo isset($user)?$user->getEmail():'' ?>">
            <input type="date" name="dtBirthday" id="dtBirthday" class="form-control mt-3" required value="<?php echo isset($user)?$user->getDtBirth():'' ?>">
            <input type="text" name="user" id="user" class="form-control mt-3" placeholder="Username" required value="<?php echo isset($user)?$user->getUser():'' ?>">
            <input type="password" name="password" id="password" class="form-control mt-3" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <input type="hidden" name="type" id="type" value="0">
            <div class="mt-2">
                <input type="checkbox" onclick="showPassword()" id="cbSPw">
                <label for="cbSPw">Show password</label>
            </div>
            <div class="alert mt-2" id="alert" style="display: none">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            <button type="submit" name="confirmBtn" id="confirmBtn" class="btn btn-success mt-2">Sign Up</button>
        </div>
    </div>
</form>
<script src="./public/scripts/validation.js">
</script>

<?php

if(isset($_POST['confirmBtn'])){
    require_once 'controller/UserController.php';
    call_user_func(array('UserController','save'));
}