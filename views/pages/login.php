<link rel="stylesheet" href="<?=$dir?>/assets/styles/login/style.css">

<div class="login_form">
    <h2>Login</h2>
    <form action="<?=$dir?>/utils/auth/login_auth.php" method="post">
        <?php 
            if(isset($_GET['WrongEmail'])) {
                echo "<p><span>*</span> Wrong email address</p>";
            }
        ?>
        <div class="input">
            <i class="fas fa-user"></i>
            <input type="email" name="email" id="email" placeholder="Email..." required>
        </div>
        <?php 
            if(isset($_GET['WrongPassword'])) {
                echo "<p><span>*</span> Wrong password</p>";
            }
        ?>
        <div class="input pwd">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password..." required>
            <i class="fas fa-eye-slash"></i>
        </div>
        <input type="submit" value="login &#8594;">
    </form>
</div>

<script src="<?=$dir?>/assets/js/pwd-hidden.js"></script>