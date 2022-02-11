<?php include('data/globalsession.php');?>
<!DOCTYPE html>
<html>

<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=4faeaacec36a5fa3686b42fd38ea3ce0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=2528b47b032341ce951bad4eb7bec58f">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
</head>

<body>
<?php include ('pagelayout/navagationbar.php');?>
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image:url(assets/img/avatars/images.png);color:#1B98E099;">
            <div class="text">
               <h2><font colour=#800080>Welcome To Williams Online Teaching Resources.</font></h2>
               <p>A Place where</p> <span id="Moving"></span>
            </div>
        </section>
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Info</h2>
                    <p>We are an online teaching institution. We offer courses on a specific needs basis. No more crowded semester with courses you do not need. Subscribe now for your specific courses and achive your dreams</p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-4"><img class="img-thumbnail" src="assets/img/scenery/college.jpg"></div>
                    <div class="col-md-4">
                        <h3>Come One Come All to WOTR</h3>
                        <div class="getting-started-info">
                            <p>The Online Resource with a difference. Join now and move one step further to your goals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <section class="clean-block slider dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info3">WE WELCOME YOU ALL</h2>
                    <p>TAKE THAT STEP TO GREATNESS.</p>
                </div>
                <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                    <div class="carousel-inner">
                        <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/scenery/bulb.jpg?h=323a7e5d8e12e9b60d93996156594f41" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/scenery/free.jpg?h=ae7b4d25adfdfa1581297908235a949d" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/scenery/education.jpg?h=26f762ae21fd9cce95e86763ac6154ca" alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </section>
      
    </main>
    <script>
    var element = document.getElementById("Moving");
        var options = {
  strings: ['You Learn', 'We Teach','We innovate for a brighter tomorrow.'],
  typeSpeed: 65,
  loop: true
};

var typed = new Typed(element, options);
    </script>
    <?php include('pagelayout/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js?h=d28daa69ae332709e94e8243f638cce6"></script>
</body>

</html>