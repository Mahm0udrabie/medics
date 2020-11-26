<div class="container p-5">
    <form action="search.php" method="get">
        <div class="form-row">

            <div class="form-group col-md-3">
                <select name="neighborhood" id='select' onchange="alertValue(this)" class="form-control" id="">
                    <option value="" selected disabled>Area</option>
                    <?php
                    $query = $db->prepare("SELECT * from city");
                    $sql   = $query->execute();
                    while ($row = $query->fetch()) { ?>
                        <option value="<?= $row['City'] ?>"><?= $row['City'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <script>
                function myFunction(id) {
                    alert(document.getElementById(id).value);
                }
            </script>

            <div class="form-group col-md-3">
                <select name="Specialty" class="form-control" id="" onchange="alertValue(this)">
                    <option value="All specialties">All specialties</option>
                    </option>
                    <?php
                    $query = $db->prepare("SELECT * from specialty ");
                    $sql   = $query->execute();
                    while ($row = $query->fetch($sql)) { ?>
                        <option value="<?= $row['Specialty'] ?>"><?= $row['Specialty'] ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="form-group col-md-3">
                <div class="form-group">
<button type="button" name="search" id="search"class="btn btn-primary btn-block" onclick="getLocation()"><b>Add Location</b>  <i class="fa fa-map-marker" id="location"></i></button>

                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                </div>
                   
            </div>


            <div class="form-group col-md-3">
                <button type="submit" name="search" id="search"class="btn btn-primary btn-block">Search <i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
</div>