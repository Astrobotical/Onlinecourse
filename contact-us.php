<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
<?php include('pagelayout/navagationbar.php');?>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Contact Us</h2>
                    <p></p>
                </div>
                <form method="post">
                    <div class="form-group"><label>Name</label><input class="form-control" type="text" name="name"></div>
                    <div class="form-group"><label>Subject</label><input class="form-control" type="text" name="subject"></div>
                    <div class="form-group"><label>Email</label><input class="form-control" type="email"name="Email"></div>
                    <div class="form-group"><label>Message</label><textarea class="form-control"name="Body"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" name="submit">Send</button></div>
                </form>
            </div>
        </section>
    </main>
    <?php include('pagelayout/footer.php');?>
    <script src="assests/js/Contact.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>