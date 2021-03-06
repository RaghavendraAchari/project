<nav class="navbar navbar-expand-md navbar-dark pt-0 pb-0">
            <a class="navbar-brand" href="home.php"><h1>WS</h1></a>
            <div class="navigation">
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item" id="home-link"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item" id="search-link"><a class="nav-link" href="search-workshop.php">Search</a></li>
                    <li class="nav-item" id="book-link"><a class="nav-link" href="book-workshop.php">Book</a></li>
                    <?php if(empty($_SESSION['user_id'])) 
                        echo '<li class="nav-item" id="register-link"><a class="nav-link" href="user-register.php">Register</a></li>';
                    ?>
                    <?php if(! empty($_SESSION['user_id']) || ! empty($_SESSION['admin_id'] ) )
                        echo '<li class="nav-item" id="rent-link"><a class="nav-link" href="rent-workshop.php">Rent</a></li>';
                    ?>
                    
                    <li class="nav-item" id="aboutus-link"><a class="nav-link" href="#about-us">About us</a></li>
                    <li class="nav-item " id="login-link"><a id="login-text" class="nav-link" href="login.php">Log in</a></li>
                </ul>
            </div>
            
    </nav>