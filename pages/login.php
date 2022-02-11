<?php
include('../data/globalsession.php');   
ob_start();
include('../data/db.php');
if(isset($_SESSION['SignedIn'])){
header("location:courses.php");
exit();
}


if(isset($_POST['submit'])){   
    //retrieve user data from the FORM
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //check if remember me checkbox is checked
    if($_POST["remember_me"] == '1' || $_POST["remember_me"] == 'on'){
       
        
       //if cookie not set then create cookie
       if(!$_COOKIE['emailC']){
            $hour = time() + 3600;
        setcookie('emailC', $email, $hour);
        
       }
       
    }else{
        //removes cookie if remember me checkbox is NOT checked
        $hour = time() - 3700;
        setcookie('emailC', '', $hour);
    }
    
    
    //Validating form data with PHP
    if($email == "" || $password == ""){
        
        echo "Fields cannot be left blank! Redirecting....";
        //Automatically redirects user back to login screen after 5 seconds
        header( "refresh:2;url=login.php" );
    }else{
        
        //hashing password
        $passwordHashed = $password;
        //SELECT QUERY (Using prepared Statements for security)
        $prestmt = $conn->prepare("SELECT id, first_name, last_name, password, email, Role FROM subscribers WHERE email = ? AND password = ?");
        
        $prestmt->bind_param("ss", $email, $passwordHashed);
        $prestmt->execute();
        $prestmt->store_result();
        $prestmt->bind_result($UserIdDB, $first_nameDB, $last_nameDB, $passwordDB, $emailDB, $roleDB);
        if($prestmt->num_rows > 0) {
            while($prestmt->fetch()){}
            
            if($email == $emailDB && $passwordHashed == $passwordDB){
                
                //Creating a session if user details are the same
                $_SESSION['SignedIn'] = '1';
                $_SESSION['USERID'] = $UserIdDB;
                $_SESSION['Name'] =  "$first_nameDB $last_nameDB" ;
                $_SESSION['Role'] = $roleDB;
                
                
               $var = '<script type="text/javascript">Swal.fire({icon: "success",title: "Logged in !",})</script>';
               header( "refresh:5;url=dashboard/dashboard.php" );
                
            }else{
                //user details are incorrect
                header("refresh:2;url=login.php");
                echo "<h2 style='background-color: red; color: white;'>Username or password is incorrect</h2>";
                
            }
            
           
        }else{
           //found no account at all in database
            echo "<h2 style='background-color: red; color: white;'>Username or password is incorrect</h2>";
            
            header( "refresh:2;url=login.php" );
        }
        
        
        
    }
}
//This is used to see if a session already exists
if(isset($_SESSION['SignedIn'])){
header("location:courses.php");
exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
<?php include('../pagelayout/css.php');?>
</head>

<body>
<?php include('../pagelayout/navagationbar.php');?>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Log In</h2>
                    
                </div>
                <?php echo $var;?>
                <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" id="email" name="email" value="<?php
                    //if a cookie is present and rmbr_me is selected then it will store it in the username field
                    if($_COOKIE['emailC']){
                        $cookieValue = $_COOKIE['emailC'];
                        echo $cookieValue;
                    }else{
                        echo "";
                    }
                    ?>"required></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control" type="password" id="password" name="password" required></div>
                    <div class="mb-3">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"name="remember_me"><label class="form-check-label" for="checkbox">Remember me</label></div>
                        
                    </div><button class="btn btn-primary" type="submit" id="submit" name="submit">Log In</button>
                    
                </form>
            </div>
        </section>
    </main>
    <?php include('../pagelayout/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <!--<script src="../assets/js/script.min.js?h=d28daa69ae332709e94e8243f638cce6"></script>-->
</body>

</html>