<?php
// Start session
include('../data/globalsession.php');   
ob_start();
//Used to view errors while working on the project. Set to 0 to hide error notifications
error_reporting(E_ALL);
ini_set("display_errors", 0);
//Imports the database file
include('../data/db.php');
//This is used to see if a session already exists
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
        $passwordHashed = md5($password);
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
                
                
               
                echo "
                <h2 style='padding: 20px;background-color: #04AA6D;color: white;'>Logged in Successfully! Redirecting....</h2>";
               header( "refresh:2;url=dashboard/dashboard.php" );
                
            }else{
                //user details are incorrect
                header("location: login.php");
                echo "<h2 style='background-color: red; color: white;'>Username or password is incorrect</h2>";
                
            }
            
           
        }else{
           //found no account at all in database
            echo "<h2 style='background-color: red; color: white;'>Username or password is incorrect</h2>";
            
            header( "refresh:2;url=login.php" );
        }
        
        
        
    }
}



?>