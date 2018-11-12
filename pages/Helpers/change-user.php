
<?php 

if(! empty($_SESSION['user_id'] || ! empty($_SESSION['admin_id']) || ! empty($_SESSION['user_fname']))){ ?>
    	
    	<script type="text/javascript">
        var user = document.getElementById('login-link');
            user.innerHTML = '<a id="login-text" class="nav-link" href="profile-page.php"><?php echo $_SESSION['user_fname'] ;?></a>';
    	    user = document.getElementById('footer-login-link');
            user.innerHTML = '<a class="nav-link footer-link p-1 m-0" href="profile-page.php"><?php echo $_SESSION['user_fname'] ?></a>';
    	</script>	
    <?php	} ?>