<footer class="pt-3">
        
                <div class="row w-100 m-0">
                        <div class="col-sm-4">
                            <h2 class="footer-logo-text bg-light">WS</h2>
                            <h4 class=" text-white">Working Solutions</h4>
                            <p class="footer-text  text-white">Your work is our priority</p>
                            
                        </div>
                        <div class="col-sm-4">
                            <h3 class="text-white">Links</h3>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link footer-link p-1 m-0" href="home.php">Home</a></li>
                                    <li class="nav-item"><a class="nav-link footer-link p-1 m-0" href="book-workshop.php">Book</a></li>
                                    <li class="nav-item"><a class="nav-link footer-link p-1 m-0" href="search-workshop.php">Search</a></li>
                                    <li class="nav-item"><a class="nav-link footer-link p-1 m-0" href="user-register.php">Register</a></li>
                                    <?php if(! empty($_SESSION['user_id']) || ! empty($_SESSION['admin_id'])) 
                                        echo '<li class="nav-item"><a class="nav-link footer-link p-1 m-0" href="rent-workshop.php">Rent</a></li>';
                                    ?>
                                    <li class="nav-item" id="footer-login-link"><a class="nav-link footer-link p-1 m-0" href="login.php">Login</a></li>
                                </ul>
                            
                        </div>
                        <div class="col-sm-4">
                            <h3 id="about-us"class="text-white">About us</h3>
                            <h4 class="mb-3 text-white">Working Solutions</h4>
                            
                            <p class="text-white mb-0">Raghavendra & Ramesh</p>
                            <p class="text-white mb-0">#123/1, food Street, 2nd stage,</p>
                            <p class="text-white mb-0">Rajajinagar, Bangalore - 560001</p>
                            <p class="text-white mb-0">E-mail : workingsolutions@ws.com</p>
                            <p class="text-white mb-0">Phone :+91 9876543210</p>
                        </div>
                    </div>
                    
        
        <div class="copyright-content mb-1" style="background:rgb(24, 43, 63);">
                <p class="mb-1">copyright 2018. All rights reserved. Working Solutions.</p>
            </div>
    </footer>
