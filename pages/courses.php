<?php
include('../data/globalsession.php');
include('../data/control.php');
$Object = new GOBEYOND();
$Query = "SELECT * FROM courses";
$results = $Object ->runQuery($Query);
$show = $results;
$currentstatus =null;
    if(isset($_POST['submit'])){
    $input = $_POST['Searchingforfood'];
    $Filters = filter_input(INPUT_POST,'Filters', FILTER_SANITIZE_STRING);
    $Categories = filter_input(INPUT_POST, 'Categories', FILTER_SANITIZE_STRING);
     $Price = filter_input(INPUT_POST, 'Price', FILTER_SANITIZE_STRING);
    global $show;
    $show = null;
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    /*
    $Query = "SELECT * FROM courses WHERE coursename LIKE '{$input}%'";
    $results = $Object ->runQuery($Query);
    $show = $results; */
        function Price()
    {
        global $Price,$Object,$show,$input;
        switch($Price)
        {
            case "none":
                break;
                case 1:
                 $Query = "SELECT * FROM courses ORDER BY price ASC";
              $results = $Object ->runQuery($Query);
                $show = $results;
                    break;
                    case 2:
              $Query = "SELECT * FROM courses ORDER BY price DESC";
              $results = $Object ->runQuery($Query);
                $show = $results;
                        break;
        }

    }
        function Type()
    {
        global $Categories, $Object,$show;
        switch  ($Categories)
        {
                case "none":
                break;
                case 1:
                $Query = "SELECT * FROM courses ORDER BY  c_type DESC";
              $results = $Object ->runQuery($Query);
                $show = $results;
                    break;
                    case 2:
              $Query = "SELECT * FROM courses ORDER BY  coursename DESC";
              $results = $Object ->runQuery($Query);
                $show = $results;
                        break;
                        case 3:
                            Price();
                            break;
        }
    }
    function Check()
    {
        global $Filters, $show,$Object,$input;
     
        switch ($Filters)
        {
            case "none":
                $Query = "SELECT * FROM courses WHERE coursename LIKE '{$input}%'OR c_type LIKE '{$input}%'OR lecturer LIKE '{$input}%'";
                $results = $Object ->runQuery($Query);
                $show = $results;
                break;
                case 1:
                    if(!empty($input)){
                    $Query = "SELECT * FROM courses WHERE coursename LIKE '{$input}%' ASC";
                    $results = $Object ->runQuery($Query);
                    $show = $results;
                    }
                    else{
                    $Query = "SELECT * FROM courses ORDER BY coursename ASC";
                    $results = $Object ->runQuery($Query);
                    $show = $results;
                    }
                    break;
                    case 2:
                         if(!empty($input)){
                    $Query = "SELECT * FROM courses WHERE coursename LIKE '{$input}%' DESC";
                    $results = $Object ->runQuery($Query);
                    $show = $results;
                    }
                    else{
                $Query = $Query = "SELECT * FROM courses ORDER BY coursename DESC";
              $results = $Object ->runQuery($Query);
                $show = $results;
                    }
                    break;
                        case 3: 
                            Type();
                            break;

        }
    }
    check();
  
}

    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   if (isset($_GET['add'])){
        $code = $_POST['courseid'];
        $result = $Object -> Query("SELECT * FROM `courses` WHERE `courseid`='$code'");
        $row = mysqli_fetch_assoc($result);
        $itemname = $row['coursename'];
        $itemcode = $row['courseid'];
        $itemprice = $row['price'];
        $newitemprice = $itemprice + 100;
        $itemimg = $row['Img'];
        $itemtype = $row['c_type'];
        $itemLecturer = $row['lecturer'];
        $cartArray = array($code=>array('name'=>$itemname,'code'=>$itemcode,'price'=>$newitemprice,'quantity'=>1,'image'=>$itemimg,'type'=>$itemtype,'lecturer'=>$itemLecturer));
    global $currentstatus;
    $location ="/pages/shopping-cart.php";
    $currentstatus = "<script type='text/javascript'>Swal.fire({icon: 'success',title: 'Course added to cart',text: 'Course was added to the shopping cart',footer: '<a href=$location>Check the cart to the cart</a>'})</script>";
if(empty($_SESSION["Cart"])) {
    $_SESSION["Cart"] = $cartArray;

    //'<script type="text/javascript">Swal.fire({icon: "success",title: "Account was registered",text: "Please check your email ",})</script>'
}else{
    $array_keys = array_keys($_SESSION["Cart"]);
    if(in_array($code,$array_keys)) {
            global $currentstatus;
    $location ="/pages/shopping-cart.php";
	$currentstatus  = "<script type='text/javascript'>Swal.fire({icon: 'warning',title: 'Course Already in Cart',text: ' the Course  is already in the shopping cart',footer: '<a  href=$location>Check the cart to the cart</a>'})</script>";
    } else {
    $_SESSION["Cart"] = array_merge(
    $_SESSION["Cart"],
    $cartArray
    );
   // $currentstatus = "<script type='text/javascript'>Swal.fire({icon: 'Success',title: 'Course added',text: 'Course was added to the shopping cart',footer: '<a href='/pages/shopping-cart.php'>Check the cart to the cart</a>'})</script>";
	}

	}
}?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" Services="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Courses</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
        <?php include('../pagelayout/css.php');
        include('../pagelayout/plugins.php');?>
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
img{
    height:180px;
}
    </style>

</head>

<body>
<?php include('../pagelayout/navagationbar.php');?>
    <main class="page courses">
        <?php echo $currentstatus; ?>
        <section class="clean-block clean-services dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Courses Page</h2>
                    <p>Available Courses</p>
                </div>
                <div class="container"><br>
                 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST">
                 <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-lg-8">
                            <div class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="text" id="Searchingforfood" name="Searchingforfood" autocomplete ="off"placeholder="Search for course or course type">
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select A" id="Filters" name="Filters"aria-label="Default select example" onchange="Category()">
                                            <option value="none" selected>Filters</option>
                                            <option value="1">Order by Ascending</option> 
                                            <option value="2">Order by Decending </option>
                                            <option value="3">By Category</option>
                                            </select>
                                            <br>
                                             <select class="B form-select " id="Categories" name="Categories" aria-label="Default select example" onchange="Type()">
                                            <option value="none" selected>Categories</option>
                                            <option value="1">Type</option> 
                                            <option value="2">Lecturer </option>
                                            <option value="3">Price</option>
                                            </select>
                                               <br>
                                             <select class="C form-select "id="Price" name="Price" aria-label="Default select example">
                                            <option value="none" selected>Price</option>
                                            <option value="1">Lowest to highest Price</option> 
                                            <option value="2">Highest to Lowest Price </option>
                                            </select>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-primary" type="submit" name="submit">Search</button>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <?php
                global $show;
                if (!empty($show)) { 
                    foreach($show as $key=>$value){ ?>
                                        
                    <div class="col-md-6 col-lg-4">
                        <form method="post"action ="courses.php?add=<?php echo $show[$key]['courseid'];?>">
                             <input type="hidden" id="courseid" name="courseid" value="<?php echo $show[$key]['courseid'];?>">
                        <div class="card"><img class="card-img-top w-100 d-block  display: flex; " src="<?php echo $show[$key]['Img'];?>">
                            <div class="card-body">
                                <h4 class="card-title text-success "><?php echo $show[$key]['coursename'];?></h4><h4 class="card-title text-warning font-weight-bold"> Type: <?php echo $show[$key]['c_type'];?> </h4>
                                <h4 class="card-title text-primary "> Lecturer : <?php echo $show[$key]['lecturer'];?></h4><br>
                                <p class="card-text text-danger"><i class="fas fa-clock"></i>:  <?php echo $show[$key]['duration'];?> Hours   <i class="fas fa-dollar-sign"></i> <?php echo $show[$key]['price'];?> USD </p>
                                
                            </div>
                            <?php  if(isset($_SESSION['SignedIn']))
                            { 
                                if(isset($_SESSION['USERID'])){ 
                                $id = $_SESSION['USERID'];
                                $courseid = $show[$key]['courseid'];
                                 $Second = "SELECT O.customers_id,O.Courseid,C.courseid FROM Orders as O LEFT JOIN courses as C on O.customers_id = '$id' WHERE O.Courseid = '$courseid'";
                                 $result = $Object ->runQuery($Second);
                                 if($result){
                                    echo '
                            <div><button class="btn btn-info btn-sm" type="button">Subscribed</button></div>
                        </div>' ;}else  echo '
                            <div><button class="btn btn-outline-success btn-sm" type="submit">Add to cart</button></div>
                        </div>' ;}} else{ echo '<button class=" no btn btn-outline-danger btn-sm" type="button" >Not logged in</button></div>';} ?>
                    </div>
                    </form>
                    <?php
                    
                }} else {
                    echo '<span class="label label-danger">No courses found!</span>';
                    }?>
                    </div>
            </div>
        </section>
    </main>
    <?php include('../pagelayout/footer.php');?>
    

     <!--<script  type="text/javascript">
    $(document).ready(function(){
    $('#Searchingforfood').keypress(function(){
     if(input != ""){
          var input = $(this).val();
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
    });
    </script> -->
        <script>
    document.querySelectorAll('.no').forEach(item => {
  item.addEventListener('click', event => {
      send()})});
            function send()
    {
        Swal.fire({icon: 'warning',title: 'Not logged in',text: 'Please login to be able to purchase this course',footer: '<a class="btn btn-info" href="/pages/login.php">Click this link to login</a>'});
    }
    </script>
    
    <script>

 var A =document.querySelectorAll(".A");
    var B = document.querySelectorAll(".B");
    var C = document.querySelectorAll(".C");
         window.onload = function() {
        $(A).show();
        $(B).hide();
        $(C).hide();
    }
    function Category(){
        const Filters = document.getElementById("Filters").selectedIndex;
        if(Filters === 0) {
            $(A).show();
            $(B).hide();
            $(C).hide();
            $(D).hide();
          
        }
        else
        if(Filters === 1) {
            $(A).show();
            $(B).hide();
            $(C).hide();
            $(D).hide();
         
        }else
        if(Filters === 2){
            $(A).show();
            $(B).hide();
            $(C).hide();
            $(D).hide();
           
        }else if(Filters === 3){
            $(A).show();
            $(B).show();
            $(C).hide();
            $(D).hide();
           
        }}
    function Type() {
        const Categories = document.getElementById("Categories").selectedIndex;
        if (Categories === 0) {
            $(A).hide();
            $(B).show();
            $(D).hide();
           
        } else if (Categories === 1) {
            $(A).show();
            $(B).show();
            $(C).hide();
            $(D).show();
           
        } else if (Categories === 2) {
            $(A).show();
            $(B).show();
            $(C).hide();
            $(D).show();
            
        } else if (Categories === 3) {
            $(A).show();
            $(B).show();
            $(C).show();
            $(D).show();
            
        }
    }
    function Price() {
        const Price = document.getElementById("Price").selectedIndex;
        if (Price === 0) {
            $(A).hide();
            $(B).show();
            $(D).hide();
           
        } else if (Price === 1) {
            $(A).hide();
            $(B).show();
            $(C).hide();
            $(D).show();
           
        } else if (Price === 2) {
            $(A).hide();
            $(B).show();
            $(C).show();
            $(D).show();
           
        }
    }

    </script> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="/assets/js/script.min.js?h=d28daa69ae332709e94e8243f638cce6"></script
    
</body>
</html>