<?php
include('../data/control.php');
$Object = new GOBEYOND();
	$errors = array();
	$var=null;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
     if(preg_match("/\S+/", $_POST['First']) === 0){
		$errors['First'] = " First Name is required.";
	}
	if(preg_match("/\S+/", $_POST['Last']) === 0){
		$errors['Last'] = " Last Name is required.";
	}
	if(preg_match("/.+@.+\..+/", $_POST['email']) === 0){
		$errors['email'] = " Not a valid e-mail address.";
	}
	if(preg_match("/.{8,}/", $_POST['password']) === 0){
		$errors['password'] = " Password Must Contain at least 8 Chanacters.";
	}
    	if(count($errors) === 0){
    	    $Accountcreation = date("Y-m-d H:i:s");
            $Currentday = date("Y-m-d H:i:s");
            $Gender = filter_input(INPUT_POST, 'Gender', FILTER_SANITIZE_STRING);
            $Age = filter_input(INPUT_POST, 'Age', FILTER_SANITIZE_STRING);
    	    $Firstname = $_POST['First'];
    	    $Lastname = $_POST['Last'];
    	    $password = $_POST['password'];
    	    $Email = $_POST['email'];
    	    $Usersend = $Object ->Usersend($Firstname,$Lastname, $Email);
     $Query = "INSERT INTO subscribers(first_name,Last_name,age,email,accountcreation,lastlogin,gender,password) VALUES ('$Firstname','$Lastname', '$Age','$Email','$Accountcreation','$Currentday','$Gender','$password')";
     $Queryresult = $Object->Query($Query);
     if($Queryresult){
    global $var;
    $var = '<script type="text/javascript">Swal.fire({icon: "success",title: "Account was registered",text: "Please check your email ",})</script>';
    $Usersend;
     }}else{
    $var = '<script type="text/javascript">Swal.fire({icon: "error",title: "Oops...",text: "Please check  youve entered all information in the input fields ",})</script>';
     } 
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=4faeaacec36a5fa3686b42fd38ea3ce0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=2528b47b032341ce951bad4eb7bec58f">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        h3 {
            color:red;
        }
    </style>
    <?php include('../pagelayout/plugins.php');?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php include('../pagelayout/navagationbar.php');?>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Registration</h2>
                    <p>Register for the account below</p>
                </div>
                <?php echo $var;?>
                <form  class="row g-3 needs-validation" novalidate action='registration.php' id="register" method='POST'>
                    <div class="mb-3"><label class="form-label" for="First">Name</label><input class="form-control item" type="text" name="First"id="First"> <?php if(isset($errors['First'])){echo "<h3>" .$errors['First']. "</h3>"; } ?></div>
                    <div class="mb-3"><label class="form-label" for="Last">Last</label><input class="form-control item" type="text" name="Last"id="Last"> <?php if(isset($errors['Last'])){echo "<h3>" .$errors['Last']. "</h3>"; } ?></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" name="email" id="email"><?php if(isset($errors['email'])){echo "<h3>" .$errors['email']. "</h3>"; } ?></div>
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
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" name="password"id="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>"></div>
                    <button class="btn btn-primary" type="submit" name="submit" >Register</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('../pagelayout/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="/assets/js/script.min.js?h=d28daa69ae332709e94e8243f638cce6"></script>
</body>

</html>