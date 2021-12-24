<?php
include('data/control.php');
$Object = new GOBEYOND();
 if (isset($_POST['submit'])){
     $Firstname=$Lastname=$Email=$Gender=$Age=$password=$Datetime=$FirstnameError=$LastnameError=$EmailError=$GenderError=$AgeError=$passwordError=null;
     $FirstnameError = "Check";
     if(empty ($_POST['First'])){$FirstnameError = " The First name is required";}else{$Firstname = $_POST['First'];};
     if(isset($_POST['Last'])){$Lastname = $_POST['Last'];}else{$LastnameError ="The Last name  is required";}
     if(isset($_POST['email'])){$Email = $_POST['email'];}else{$EmailError =" The email is required";}
     if(isset($_POST['age'])){$Email = $_POST['email'];}else{$EmailError =" The email is required";}
     if(isset($_POST['password'])){$password = $_POST['password'];}else{$passwordError =" The password is required";}
     $Accountcreation = date("Y-m-d H:i:s");
     $Currentday = date("Y-m-d H:i:s");
     $Gender = filter_input(INPUT_POST, 'Gender', FILTER_SANITIZE_STRING);
     $Age = filter_input(INPUT_POST, 'Age', FILTER_SANITIZE_STRING);
    if(!empty($Firstname || $Lastname || $Email || $Age || $password)){
     $Query = "INSERT INTO subscribers(first_name,Last_name,age,email,accountcreation,last_login,gender,password) VALUES ('$Firstname','$Lastname', '$Age','$Email','$Accountcreation','$Currentday','$Gender','$password')";
     $Queryresult = $Object->Query($Query);
     //$Mailer = $Object->Mailer($Email);
     if($Queryresult){
         echo  "Successfully Registered";
         //$Mailer;
         //header('Location: faq.php');

     }}else{
         echo "Error";
     } 
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=4faeaacec36a5fa3686b42fd38ea3ce0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=2528b47b032341ce951bad4eb7bec58f">
</head>

<body>
<?php include('pagelayout/navagationbar.php');?>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Registration</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <form  class="row g-3 needs-validation" novalidate action='registration.php' method='POST'>
                    <div class="mb-3"><label class="form-label" for="First">Name</label><input class="form-control item" type="text" name="First"id="Firt"><div class="invalid-feedback"><?php echo $FirstnameError;?></div></div>
                    <div class="mb-3"><label class="form-label" for="Last">Last</label><input class="form-control item" type="text" name="Last"id="Last"><div class="invalid-feedback"><?php echo $FirstnameError;?></div></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" name="email" id="email"><div class="invalid-feedback"><?php echo $FirstnameError;?></div></div>
                    <div class="input-group mb-3"><div class="input-group-prepend"><label class="input-group-text" for="Gender">Gender</label> </div>
                    <select class="custom-select" id="Gender" name="Gender">
                    <option selected disabled value="">Choose</option>
                    <option value="Male">Male </option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    </select>
                    </div>
                    <div class="input-group mb-3"><div class="input-group-prepend"><label class="input-group-text" for="Age">Age</label> </div>
                    <select class="custom-select" id="Gender" name="Age">
                    <option selected disabled value="">Choose</option>
                    <?php for($value = 13; $value <= 100; $value++){ 
                        echo('<option value="' . $value . '">' . $value . '</option>');}
                        ?></select><div class="invalid-feedback"></div></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" name="password"id="password"></div>
                    <button class="btn btn-primary" type="submit" name="submit">Register</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('pagelayout/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js?h=d28daa69ae332709e94e8243f638cce6"></script>
</body>

</html>