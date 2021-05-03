<form action="" method="post" id="frmLogin" name="frmLogin">
    <div class="card mt-4">
        <div class="card-header">
            <h3>Sign In</h3>
        </div>
        <div class="card-body mt-3">
            <div class="form-group">
                <input type="text" name="user" id="user" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="mt-2">
                <input type="checkbox" onclick="showPassword()" id="cbSPw">
                <label for="cbSPw">Show password</label>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success justify-content-center" name="btnLogin" id="btnLogin">Login</button>
            <span>&nbsp;New at here?&nbsp;</span><a href="" class="font-weight-bold text-decoration-none">Sign Up!</a>
        </div>
    </div>
</form>
<script src="public/scripts/validation.js">
</script>

<?php
    if(isset($_POST['btnLogin'])){
        require_once 'controller/UserController.php';
        $user = call_user_func(array('UserController','signIn'));
        if($user == false){
            ?>
            <div class="alert h6 mt-5" role="alert" style="color: #856404;background-color: #fff3cd;border-color: #ffeeba;">
               User or password wrong.
            </div>
            <?php
            //tratar
        }else{
            $_SESSION['logged'] = true;
            $_SESSION['type'] = $user->getType();
            // print_r($usuario);
            $_SESSION['username'] = $_POST['user'];
            $_SESSION['id'] = $user->getId();

            echo "<script> window.location.href = '/morning-php/' </script>";
        }
    }
?>