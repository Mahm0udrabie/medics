<?php
include "init.php";
if(isset($_GET['search'])) {
    $city      = !empty($_GET['neighborhood']) ? mysqli_escape_string($con, trim($_GET['neighborhood'])) : "" ;
    $specialty = mysqli_escape_string($con,trim($_GET['Specialty']));
    $latitude  = mysqli_escape_string($con,trim($_GET['latitude']));
    $longitude = mysqli_escape_string($con,trim($_GET['longitude']));
    if(empty($longitude) || empty($latitude)){
        $latitude  = 29.953756400000003;
        $longitude = 31.5370003;
    }
        // $query="SELECT * , (3956 * 2 * ASIN(SQRT(POWER(SIN(( '$latitude' - lat) *  pi()/180 / 2), 2) + 
        //         COS( '$latitude' * pi()/180) * COS( lat * pi()/180) * 
        //         POWER(SIN(( '$longitude' - lng) * pi()/180 / 2), 2) )))  
        //         as distance from doctor where Specialty='$specialty' and Status = 1 and Area='$city' OR Area='$city' 
        //         having distance <= 10 order by distance ";
$query="SELECT * FROM doctor WHERE Specialty='$specialty' and Status = 1 AND Area='$city' OR Area='$city'";


    $result = mysqli_query($con, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }  else {

  
    while($row= mysqli_fetch_array($result)) {
        

         $firstName   = $row['F_Name'];
         $lastName    = $row['L_Name'];
         $phone       = $row['Phone_Number'];
         $address     = $row['Address'];
         $rate        = $row['Rating'];
         $degree      = $row['Scientific_Degree'];
         $specialist  = $row['Specialty'];
         $area        = $row['Area'];
         $lat         = $row['lat'];
         $long        = $row['lng'];
          ?>
        <div class="col-md-12 d-inline-flex"  >    
      
            <div class="container  "  id="search-result">
                <p class="text-success bg-warning"><?php isset($error) ? $error : "555" ?></p>
                <div class="row p-3 d-inline-block col-md-6">
                        <img src="images/dr.png" class="rounded-circle" width="100" height="100" alt="Image">
                        <span class="pl-3"><b><?=$degree." ".$firstName." ".$lastName?></b></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p> <?php 
                                for ($i=1; $i <=$rate; $i++) {  ?>
                                            <span class="fa fa-star fa-2x text-warning"></span>
                                <?php } ?>
                            </p>
                            <p><i class="fa fa-map-marker text-primary fa-2x"></i> <b>  <?= $area?> </b> <?= $address ?> </p> 
                            <p><i class="fa fa-stethoscope text-primary fa-2x"></i> <?= $specialist?> </p>
                            <p><i class="fa fa-phone text-primary fa-2x"></i> <?= $phone?> </p>

                        </div>
                        <div class="col-md-6 d-block">
                            <iframe src="includes/map.php?lat=<?=$lat?>&lng=<?=$long?>" frameborder="1" width="300" height="300"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

    }
}
}
else {
?>
<h3 class="text-warning text-center">no result</h3>

<?php  }
?>

<?php
include "includes/footer.php";