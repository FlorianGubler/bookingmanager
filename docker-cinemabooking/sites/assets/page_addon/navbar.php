<?php
    if(isset($_POST['login-submit'])){
        foreach($usersarr as $user){
            if($user->logincheck($_POST['login-usrname'],$_POST['login-passwd'])){
                setcookie("session-id", hash("sha256", $user->id), 0);
                header("Location: $location/pages/admin.php#");
            }
        }
    }
    $login = false;
    if(isset($_COOKIE['session-id'])){
        foreach($usersarr as $user){
            if(hash("sha256", $user->id) == $_COOKIE['session-id']){
                $login = true;
            }
        }
    }
?>
<div class="headinfo"><p>&copy 2021 by Nino Arisona, Jon Bunjaku und Florian Gubler</p><a target="_blank" href="https://www.zli.ch">zli.ch </a></div>
<div id="login" class="login">
    <form action="" method="post">
        <a href="#"><i class="fas fa-times"></i></a>
        <h2>Login</h2>
        <input placeholder="Username" name="login-usrname" type="username">
        <input placeholder="Password" name="login-passwd" type="password">
        <button name="login-submit" type="submit">Login</button>
    </form>
</div>
<nav class="navbar">
    <a href="<?php echo $location ?>/../index.php"><img src="<?php echo $location ?>/image/icons/icon_t.png" alt="Logo" width="160px" height="40px"></a>
    <ul>
        <li><a href="<?php echo $location ?>/../index.php">Home</a></li>
        <li> | </li>
        <?php 
        if($login == true){
            echo "<li><a href='$location/pages/admin.php'>Admin</a></li>";
        }
        else{
            echo "<li><a href='#login'>Login</a></li>";
        }
        ?>
    </ul>
</nav>