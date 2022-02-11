<?php
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../data/globalsession.php');
include('../data/process.php');
if(isset($_SESSION['SignedIn'])){}else{header("refresh:1;url=http://wotr.romarioburke.com/pages/noaccess.php");}
$currentstatus ="";

//print_r($_SESSION["Cart"]);
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["Cart"])) {
    foreach($_SESSION["Cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["Cart"][$key]);
      global $currentstatus, $price_reduction;
    $currentstatus = "<script type='text/javascript'>Swal.fire({icon: 'success',title: 'Course was removed',text: ' Course has been removed from your cart!'})</script>";
      }
      if(empty($_SESSION["Cart"]))
      unset($_SESSION["Cart"]);
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["Cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = 1;
        break; // Stop the loop after we've found the product
    }
}
  	
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shopping Cart - Brand</title>
    <?php include('../pagelayout/css.php');?>
    <?php include('../pagelayout/plugins.php');?>
    
</head>

<body>
<?php include('../pagelayout/navagationbar.php');?>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Shopping Cart</h2>
                    <p>View the selected courses </p>
                </div>
            <?php echo $currentstatus;?>
                <div class="content">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                               
                                <?php
                                if(isset($_SESSION["Cart"])){
                                    global $total_price,$sum,$price_reduction ; $total_price = 0;$sum = 0;$price_reduction = 0;
                               foreach ($_SESSION["Cart"] as $item){
                                  $count =-100;
                                   $price_reduction -= $count;
                                ?>
                                <div class="product">
                                    <form method ="POST">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" name="itemcode" src="<?php echo $item['image']; ?>"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><p class="product-name"name="itemcode"value= "<?php echo $item['code'];?>" ></p><span class="product-name"><?php echo $item['name'];?></span>
                                        <input type='hidden' name='action' value="change" />
                                            <div class="product-specs">
                                                <div><span>Lecturer:&nbsp;</span><span class="value"><?php echo $item['lecturer'];?></span></div>
                                                <div><span>Type:&nbsp;</span><span class="value"><?php echo $item['type'];?></span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 price"><span><?php echo "$".$item["price"]*$item["quantity"]-100; ?></span></div>
                                        <div class ="col-6 col-md-2">
                                            <form method='post' action=''>
                                          <div class="row justify-content-center align-items-center">
                                        <input type='hidden' name='code' value="<?php echo $item["code"]; ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <div class="remove col-6"><button type='submit' class='remove btn btn-danger'>Remove Item</button></div>
                                          </div>
                                        </form>
                                       
                                </div>
                                        </div>
                                    </div>
                                    </form>
                                    
                                <?php
                                 $total_price += ($item["price"]*$item["quantity"]);
                                $new_total = $total_price - $price_reduction;
                                  }
                                } else{
                                    echo "<h3>No courses in the cart</h3>";
                                    
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <form action="/data/process.php" method ="POST">
                                <h3>Summary</h3>
                                <h4><span class="text">Subtotal</span><span class="price"><?php 
                                global $total_price; if(empty($total_price )){echo "No items";}else{ echo "$" .number_format($new_total, 2);}; ?></span></h4>
                                <h4><span class="text">Discount</span><span class="price">$0</span></h4>
                                <h4><span class="text">Total</span><span class="price"><?php 
                                global $total_price; if(empty($total_price )){echo "No items";}else{ echo "$" .number_format($new_total, 2);}; ?></span></h4><button class="btn btn-primary btn-lg d-block w-100" id="checkout-button" type="button">Checkout</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../pagelayout/payments.php');?>
    <script>
              var stripe = Stripe('pk_test_51JmAGrEHPx8SybWh5NCqLebwgrH6OBloGqKsSy14TKsCgACe0ZJYfDev2IiuwNSIFA4tZfF6IEdZpPpOcvLFLn8u00nI5nB2nQ');
      const btn = document.getElementById("checkout-button")
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        stripe.redirectToCheckout({
          sessionId: "<?php echo $session->id; ?>"
        });
      });
    </script>
    <?php include('../pagelayout/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="/assets/js/script.min.js?h=d28daa69ae332709e94e8243f638cce6"></script>
</body>

</html>