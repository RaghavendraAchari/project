<footer class="pt-3">
        
                <div class="row w-100 m-0">
                        <div class="col-sm-4">
                            <h2 class="footer-logo-text bg-light">WS</h2>
                            <h4 class=" text-white">Workshop Rental System</h4>
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
                            <p class="mb-3 text-light" style="font-size : 1.4rem ;">Workshop Rental System</p>
                            <p class="text-white mb-0">E-mail : </p>
                            <p class="text-white mb-0"><a class="text-white ml-3"  href="mailto:raghav.achari.l@gmail.com">raghav.achari.l@gmail.com</a> <br> <a class=" ml-3 text-white" href="mailto:rameshjithan97@gmail.com">rameshjithan97@gmail.com</a></p>
                            
                            <p class="text-white mb-0">Phone :</p>
                            <p class="text-white mb-0"><a class="text-white ml-3" href="tel:+91 9731453933">+91 9731453933</a> <br> <a class="text-white  ml-3" href="tel:+91 6363707464">+91 6363707464</a></p>

                            
                        </div>
                    </div>
                    
        
        <div class="copyright-content mb-1" style="background:rgb(24, 43, 63);">
                <p class="mb-1">copyright 2018. All rights reserved. Working Solutions.</p>
            </div>
    </footer>
