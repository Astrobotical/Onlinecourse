<?php    
include('../data/control.php');
$Object = new GOBEYOND();
	$errors = array();
	$var=null;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
     if(preg_match("/\S+/", $_POST['Name']) === 0){
		$errors['Name'] = " Your Name is required.";
	}
	if(preg_match("/\S+/", $_POST['Subject']) === 0){
		$errors['Subject'] = "Subject is required.";
	}
	if(preg_match("/.+@.+\..+/", $_POST['Email']) === 0){
		$errors['Email'] = " Not a valid e-mail address.";
	}
	if(preg_match("/\S+/", $_POST['Message']) === 0){
		$errors['Message'] = "Message  is required.";
	}
	  	if(count($errors) === 0){
	  	    global $var;
	  	    $Name = $_POST['Name'];
	  	    $Subject = $_POST['Subject'];
	  	    $Email  =  $_POST['Email'];
	  	    $Message =  $_POST['Message'];
	  	    $Query ="INSERT INTO ContactForm(Name,Subject,Email,Message) VALUES ('$Name','$Subject', '$Email','$Message')";
	  	    global $var;
	  	         $Formsend = $Object-> RedirectMSG($Name,$Email,$Subject,$Message);
	  	      $var = '<script type="text/javascript">Swal.fire({icon: "Success",title: "Contact Form Sent",text: "Please check your email for confirmation! ",})</script>';
	  	       $CCLOL = $Object->Query($Query);
	  	    }
	  	else{
	  	    $var = '<script type="text/javascript">Swal.fire({icon: "error",title: "Oops...",text: "Please check that   youve entered all information in the input fields ",})</script>';
	  	}
} ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Brand</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <style>
        h3 {
            color:red;
        }
    </style>
    <?php include('../pagelayout/plugins.php');?>
  
</head>

<body>
<?php include('../pagelayout/navagationbar.php');?>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Contact Us</h2>
                    <p></p>
                </div>
                <?php echo $var;?>
                <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group"><label class="form-label" for="name">Name</label><input class="form-control item" type="text" name="Name" id="Name"><?php if(isset($errors['Name'])){echo "<h3>" .$errors['Name']. "</h3>"; } ?></div>
                    <div  id="SubjectC" class="form-group"><label class="form-label" for="subject">Subject</label><input class="form-control item" type="text" name="Subject"id="Subject"><?php if(isset($errors['Subject'])){echo "<h3>" .$errors['Subject']. "</h3>"; } ?></div>
                    <div  id="EmailC"class="form-group"><label class="form-label" for="Email">Email</label><input class="form-control item" type="email"name="Email"id="Email"><?php if(isset($errors['Email'])){echo "<h3>" .$errors['Email']. "</h3>"; } ?></div>
                    <div id="MessageC"class="form-group"><label class="form-label" for="Body">Message</label><textarea class="form-control item"name="Message" id="Message"></textarea></div><?php if(isset($errors['Message'])){echo "<h3>" .$errors['Message']. "</h3>"; } ?><br>
                    <div class="form-group"><button class="btn btn-primary" name="submit">Send</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('../pagelayout/footer.php');?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
</body>

</html>