 <?php if( session_status() == 1 || session_status() == 0  ){ session_start(); } ?>
<div class="container">
       
    <ul class="pull-right list-inline">
       
       	<?php  if((isset($_COOKIE['member_login']) && $_COOKIE['member_login']!= "" && isset($_COOKIE['member_password']) && $_COOKIE['member_password']!= "") ||  isset($_SESSION['member_login']) && $_SESSION['member_login']!= "" && isset($_SESSION['member_password']) && $_SESSION['member_password']!= "") { ?>
        <li><a href="../user/changepw.php">My info</a></li>
        <li><a href="../login/logout.php">logout</a></li>
        <?php }else { ?>
         <li><a href="../register/register.php" class="active">Register</a></li>
        <li><a href="../login/login.php">login</a></li>
        <?php } ?>
    </ul>
</div>