<section class="clean-block about-us">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div><?php
                include('../data/control.php');
                $Object = new GOBEYOND();
                $res = $Object -> Query('Select * FROM Tutors');
                ?>
                <div class="row justify-content-center">
                     <?php while($row1 = mysqli_fetch_array($res)):;?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="<?php echo $row1[1];?>">
                            <div class="card-body info">
                                <h4 class="card-title"><?php echo $row1[2];?> || Type: <?php echo $row1[3];?></h4>
                                <p class="card-text"><?php echo $row1[4];?></p></div>
                            </div>
                    </div>
                    <?php endwhile;?>
             </div>
         </div>
    </div>
</section>