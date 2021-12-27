<?php
session_start();
// Deletes session
session_destroy();

echo "
      <h2 style='padding: 20px;background-color: #04AA6D;color: white;'>Logout Successful, Redirecting....</h2>";
header( "refresh:2;url=../index.php" );
                
            


?>