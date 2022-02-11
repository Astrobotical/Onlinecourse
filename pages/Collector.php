<?php
include('../data/control.php');
$Object = new GOBEYOND();
$target_dir = "../assets/img";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
 if (isset($_REQUEST['submit'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $Datetime = date("Y-m-d H:i:s");
     $Photo=$_FILES["photo"]["name"];
     $Facebook = $_POST['facebook'];
     $Twitter = $_POST['twitter'];
     $Instagram = $_POST['instagram'];
           if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     $Query = "INSERT INTO users(name,email,password,accountcreation,photo,facebook,twitter,instagram) VALUES ('$name','$email', '$password', '$Datetime','$target_file','$Facebook','$Twitter','$Instagram)";
     $Queryresult = $Object->Query($Query);
        $var ="Swal.fire('Yes')";
     }else{
        $var ="Swal.fire('No')";
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
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
<?php include('../pagelayout/navagationbar.php');?>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Register a New Course</h2>
                </div>
                <form action='Collector.php' method='POST'>
                <div class="form-group">
    
<div class="form-group">
  </div>
                    <div class="mb-3"><label class="form-label" for="name">Name  of Course:</label><input class="form-control item" type="text" name="name"id="name"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" name="password"id="password"></div>
                    <div class="mb-3"><label class="form-label" for="Img">Image Link</label><input class="form-control item" type="text" name="Img"id="Img"></div>
                    <div class="mb"><label class="form-label" for="price">Course Price</label><input  class="form-control item" type="number" id="price" name="price" value="0"></div>
                    <div class="mb-3"><label class="form-label" for="duration">Duration</label><input class="form-control item" type="number" name="duration"id="duration" placeholder="How many hours"></div>
                    <div class="mb-3"><label class="form-label" for="credits">Credits</label><input class="form-control item" type="number" name="credits"id="credits"></div>
                                        <div class="input-group mb-3"><div class="input-group-prepend"><label class="input-group-text" for="Coursetype">Course Type</label> </div>
                    <select class="custom-select" id="Coursetype" name="Coursetype">
                    <option selected disabled value="">Choose</option>
                    <option value="Food">Food </option>
                    <option value="Math">Math</option>
                    <option value="Programming">Programming</option>
                    </select>
                    </div>
                    <div class="mb-3"><label class="form-label" for="Lecturer">Lecturer</label><input class="form-control item" type="text" name="Lecturer" id="Lecturer" value="<?php echo $_SESSION['Name'];?>"disabled></div><button class="btn btn-primary" type="submit" name="submit">Add course</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('../pagelayout/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="/assets/js/script.min.js?h=d28daa69ae332709e94e8243f638cce6"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>