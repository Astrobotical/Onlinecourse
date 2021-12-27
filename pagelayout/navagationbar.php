<?php 
session_start();
ob_start();
?>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="/index.php">Williams OTR</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/courses.php">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/Collector.php">Collector</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/about-us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/contact-us.php">Contact Us</a></a></li>
                    <?php 
                    
                    if(isset($_SESSION['SignedIn'])){
                        
                    echo'
                    
                    <li class="nav-item"><a class="nav-link" href="/pages/logoutProcess.php">Logout</a></li>';
                    
                    }else{
                        
                        echo'
                    
                    <li class="nav-item"><a class="nav-link" href="/pages/login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/registration.php">Register</a></li>';
                    }
                    
                    
                    ?>
                </ul>
            </div>
        </div>
</nav>
