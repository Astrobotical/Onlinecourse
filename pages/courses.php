<?php 
session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" Services="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Courses</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=4faeaacec36a5fa3686b42fd38ea3ce0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=2528b47b032341ce951bad4eb7bec58f">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body{
background:#ddd;
}
.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
button{
    height :60px;
    margin:  20px;
}
    </style>
</head>

<body>
<?php include('../pagelayout/navagationbar.php');?>
    <main class="page courses">
        
        <section class="clean-block clean-services dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Courses Page</h2>
                    <p>Available Courses</p>
                </div>
                <div class="container"><br>
	     <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="text" id="Searchingforfood" autocomplete ="off"placeholder="Search for course or course type">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-primary" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </div>
                        </div>
                        <!--end of col-->
                    </div>
</div>
                <div class="row">
               <div id="results">
                   
               </div>
            </div>
            </div>
        </section>
    </main>
    <?php include('../pagelayout/footer.php');?>

    <script  type="text/javascript">
    $(document).ready(function(){
    $('#Searchingforfood').keyup(function(){
        var input = $(this).val();
        //alert(input);
     if(input != ""){
         $.ajax({
             url : "courseget.php",
             method:"POST",
             data:{input:input},
             success:function(data){
             $("#results").html(data);
             }
         });
         }else{
             $("#results").css("display", "none");
         }
    });
});</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="/assets/js/script.min.js?h=d28daa69ae332709e94e8243f638cce6"></script>
</body>

</html>