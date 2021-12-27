<?php
// Start session
session_start();   
ob_start();
//Used to view errors while working on the project. Set to 0 to hide error notifications
error_reporting(E_ALL);
ini_set("display_errors", 1);
//Imports the database file
include('../data/db.php');
//This is used to see if a session already exists
if(isset($_SESSION['SignedIn'])){
header("location:courses.php");
exit();
}


if(isset($_POST['submit'])){   
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    //Validating form data with PHP
    if($email == "" || $password == ""){
        
        echo "Fields cannot be left blank! Redirecting....";
        //Automatically redirects user back to login screen after 5 seconds
        header( "refresh:2;url=login.php" );
    }else{
        
        //hashing password
        //$passwordHashed = md5($password);
        //SELECT QUERY (Using prepared Statements for security)
        $prestmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ? AND password = ?");
        
        $prestmt->bind_param("ss", $email, $password);
        $prestmt->execute();
        $prestmt->store_result();
        $prestmt->bind_result($UserIdDB, $nameDB, $emailDB, $passwordDB);
        if($prestmt->num_rows > 0) {
            while($prestmt->fetch()){}
            
            if($email == $emailDB && $password == $passwordDB){
                
                //Creating a session if user details are the same
                $_SESSION['SignedIn'] = '1';
                
                echo "
                <h2 style='padding: 20px;background-color: #04AA6D;color: white;'>Logged in Successfully! Redirecting....</h2>";
               header( "refresh:2;url=courses.php" );
                
            }else{
                
                header("location: login.php");
                echo "<h2 style='background-color: red; color: white;'>Username or password is incorrect</h2>";
                
            }
            
           
        }else{
            
            echo "<h2 style='background-color: red; color: white;'>Username or password is incorrect</h2>";
            
            header( "refresh:2;url=login.php" );
        }
        
        
        
    }
}



?>