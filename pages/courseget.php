<?php
include('../data/control.php');
$Object = new GOBEYOND();
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $Query = "SELECT * FROM courses WHERE coursename LIKE '{$input}%'";
    $results = $Object ->Query($Query);
    if(mysqli_num_rows($results) > 0){?>
        <?php
        while ($rows = mysqli_fetch_assoc($results)){ ?>
                                 <div class="col-md-6 col-lg-4">
                        <div class="card"><img class="card-img-top w-100 d-block" src="/assets/img/scenery/image5.jpg?h=5a16d46fccd884924ce66752802d76c5">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $rows['coursename'];?></h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in.</p>
                            </div>
                            <div><button class="btn btn-outline-primary btn-sm" type="button">Learn More</button></div>
                        </div>
                    </div>
                    <?php
        }
                    ?>
         <?php
    }else {
        echo '<span class="label label-danger">No courses found!</span>';
    }
}
?>