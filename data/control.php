<?php
   use PHPMailer\PHPMailer\PHPMailer as PHPMailer;
    use PHPMailer\PHPMailer\SMTP as SMTP;
    require __DIR__.'/../vendor/autoload.php';
class GOBEYOND{
    
private $hostname = "localhost";
private $Username = "u695548073_Burke";
private $Password = "?Py6[UFpNxn";
 private $databaseName = "u695548073_Web3";
    private $Connection;
    function __construct() {
        $this->Connection = $this->Connectionstring();
    }
    function Connectionstring(){

        $Connection = mysqli_connect($this->hostname, $this->Username, $this->Password, $this->databaseName);
        return $Connection;
    }
    function Query($Query){
        $result = mysqli_query($this->Connection, $Query);
        return $result;
    }
    function runQuery($query) {
        $result = mysqli_query($this->Connection,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }
     function Usersend($Firstname, $Lastname, $Email)
    {
       $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = false;
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->Username = 'noreply@wotr.romarioburke.com';
        $mail->Password = 'Katarina1';
        $mail->SMTPAuth = true;
        $Name = ".$Firstname.  .$Lastname.";
        $mail->setFrom('noreply@wotr.romarioburke.com', "William Online Teaching Resources");
        $mail->addAddress($Email, $Name);
        $mail->Subject = "Account created!";
        $mail->isHTML(true);
        $mail->Body =  <<<EOT

<!DOCTYPE html>
<html>
    <head></head>
    <body>
<h2> Account was succesfully made!</h2>
<p> Want to login? <a href="http://wotr.romarioburke.com/pages/login.php">Click me</a>
    </body>
</html>
EOT;
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
        }
    }
    function RedirectMSG($Name, $Email, $Subject,$Message)
    {
       $mail = new PHPMailer;
       $mail->isSMTP();
        $mail->SMTPDebug = false;
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->Username = 'noreply@wotr.romarioburke.com';                   
        $mail->Password = 'Katarina1';  
        $mail->SMTPAuth = true; 
        $mail->setFrom('noreply@wotr.romarioburke.com', 'WOTR Contact Form');
        $mail->addAddress('romarioburke190@gmail.com', 'Romario Burke');
        $mail ->addAddress('ruthannbrown2014@gmail.com', 'Ruth Ann Daley');
        $mail ->addAddress('lawrencekesha15@gmail.com', 'Serena Walcott');
        $mail->Subject = "New Submission";
        $mail->isHTML(true);
        $mail->Body = <<<EOT
        <!DOCTYPE html>
        <html>
        <head>
        </head>
        <body>
        <table>
        <tr><th colspan="2">
        <h2> Submission Details</h2>
        </tr><tr><td>Subject:</td><td>{$Subject}</td></tr>
        <tr><td>Name:</td><td>{$Name}</td></tr>
        <tr><td>Email:</td><td>{$Email}</td></tr>
        <tr><td>Message:</td><td> {$Message}</td></tr>
</table>
</body>
</html>
EOT;
        if (!$mail->send()) {
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            echo "<script> alertify.alert('The Form was submitted');</script>";
            
        }
    }
}
?>