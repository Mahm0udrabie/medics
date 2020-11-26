<?php require_once "init.php";
if(isset($_SESSION['username'])) {
  header("Location:index.php");
}


 ?>

<?php
if(isset($_POST["submit"])) {
  $fName     =   mysqli_escape_string($con,
                 trim($_POST['F_Name']));
  $lName     =   mysqli_escape_string($con, 
                 trim($_POST['L_Name']));
  $username  =   mysqli_escape_string($con, 
                 trim($_POST['username']));
  $password  =   mysqli_escape_string($con,
                 $_POST["password"]);
  $email     =   mysqli_escape_string($con, 
                 trim($_POST["email"]));
  $type      =   isset($_POST['type']) ? mysqli_escape_string($con, 
                 trim($_POST["type"])) : "" ;
  $phone     =   mysqli_escape_string($con, 
                 trim($_POST["phone"]));
 $gender     =   isset($_POST['gender']) ? mysqli_escape_string($con, 
                 trim($_POST["gender"])) : "" ;
  $birthday  =   mysqli_escape_string($con, 
                 trim($_POST["birthday"]));
  $area      =   isset($_POST['Area']) ? mysqli_escape_string($con, 
                 trim($_POST["Area"])) : "" ;
  $address   =   mysqli_escape_string($con, 
                 trim($_POST['address']));
if($type == "doctor") {
    $specialty = isset($_POST['Specialty']) ? mysqli_escape_string($con, 
                 trim($_POST["Specialty"])) : "" ;
    $degree    = isset($_POST['degree']) ? mysqli_escape_string($con, 
                 trim($_POST["degree"])) : "" ;
    $lat       =   mysqli_escape_string($con, 
                 $_POST['lat']);
    $lng       =   mysqli_escape_string($con, 
                 $_POST['lng']);
                    
    $dir       =   'uploads/';
    $verify    =   mysqli_escape_string($con,
                    $dir.basename($_FILES['verfiy']['name']));
            

} 
  $errors = array(
    'username'  => "",
    'password'  => "",
    'fName'     => "",
    'lName'     => "",
    'email'     => "",
    'type'      => "",
    'phone'     => "",
    'gender'    => "",
    'birthday'  => "",
    'area'      => "",
    'address'   => "",
    'specialty' => "",
    'degree'    => "",
    'verify'    => "",
    'location'  => "",
  );
  if(strlen($username) < 4)
  {
     $errors['username']='Username needs to be longer';
  }
  if(strlen($username) >  9)
  {
     $errors['username']='Username between 4 and 9 characters';
  }
  if($username=='')
  {
      $errors['username']='Username can not be empty';
  }
  if(user_exits($username,'account',"username"))
  {
     $errors['username']='Username already exists';
  }
  if($fName=='' )
  {
        $errors['fName']='Firstname can not be empty';
  }
  if($lName=='')
  {
        $errors['lName']='Lastname can not be empty';
  }
  if($email=='')
  {
        $errors['email']='Email can not be empty';
  }
  if(user_exits($email,'account',"Email"))
  {
       $errors['email']='Email already exists';
  }
  if(strlen($password) < 4)
  {
       $errors['password']='Password needs to be longer';
  }
  if($password=='')
  {
       $errors['password']='Password can not be empty';
  } 
  $tb = ($type == 'doctor') ? "doctor" : "patient";
  if(user_exits( $phone,$tb,"Phone_Number"))
  {
       $errors['phone']='phone number already exist';
  }
  if($phone=='')
  {
       $errors['phone']='phone can not be empty';
  }
  if($type=='')
  {
       $errors['type']='type can not be empty';
  }
  if($gender=='')
  {
       $errors['gender']='gender can not be empty';
  }
  if($birthday=='')
  {
       $errors['birthday']='birthday can not be empty';
  }
  if($area=='')
  {
       $errors['area']='area can not be empty';
  }
  if($address=='')
  {
       $errors['address']='address can not be empty';
  }
  if($type == 'doctor') {
    if($specialty=='')
    {
         $errors['specialty']='specialty can not be empty';
    }
    if($degree=='')
    {
         $errors['degree']='degree can not be empty';
    }
    if($verify=='')
    {
         $errors['verify']='verify can not be empty';
    }
    if($lat=='' || $lng = '')
    {
         $errors['location']='location can not be empty';
    }
  }
  
  foreach ($errors as $key => $value) {
    if(empty($value))
    {
        unset($errors[$key]);
    } 
}


if(empty($errors)) {
  $password =  md5($_POST["password"]);
$sql1 = "INSERT INTO account (username, password, Email, Type) VALUES ('$username', '$password', '$email' , '$type') " ;
$query1 = mysqli_query($con,$sql1);

if($type=="patient") {
$sql2 = "INSERT INTO patient (F_Name, L_Name, Phone_Number, Gender, Birth_Date, City, Address_Details) 
  VALUES ('$fName', '$lName', '$phone','$gender', '$birthday', '$area', '$address')";
  $query2 = mysqli_query($con,$sql2);
}
if($type == "doctor") {
  if (move_uploaded_file($_FILES["verfiy"]["tmp_name"], $verify)) {
    $upload_message =  "<p class='text-success text-center'>The file ". htmlspecialchars(basename( $_FILES["verfiy"]["name"])). " has been uploaded. </p?";
    } else {
      $upload_message = "<p class='text-danger text-center' >Sorry, there was an error uploading your file.</p>";
}  
$sql3 = "INSERT INTO doctor (F_Name, L_Name, Phone_Number, Gender, Birth_Date, Specialty, Scientific_Degree, Verification, Area, Address, lat, lng ) 
                    VALUES ('$fName', '$lName', '$phone', '$gender', '$birthday', '$specialty','$degree', '$verify', '$area', '$address', '$lat', '$lng') ";
$query3 = mysqli_query($con,$sql3);
  
  }
  if(!$query1 && !$query2 && !$query3)
  die("<p class='text-danger'>not inserted". mysqli_error($con)."</p>" );
  else  {
      echo "<p class='text-success text-center'>successfully registered as ".$type."</p>";
  }
}
}
?>
<div class="container mt-5" id="input">
<?php       echo isset($upload_message) ?   $upload_message: "";
 ?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-6" >
      <label for="inputFirstName4">First Name</label>
      <input type="text" name="F_Name" class="form-control" id="inputFirstName4" placeholder="First Name">
      <p class="text-danger"><?= isset($errors['fName']) ? $errors['fName'] : "";?></p>

    </div>
    <div class="form-group col-md-6">
      <label for="inputLastName4">Last Name</label>
      <input type="text" name="L_Name" class="form-control" id="inputLastName4" placeholder="Last Name">
      <p class="text-danger"><?= isset($errors['lName']) ? $errors['lName'] : "";?></p>
    </div>
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputUsername4">Username</label>

      <input type="text" name="username" v-on:input="checkError" class="form-control" id="inputUsername4" placeholder="Username">
      <p class="text-danger">{{error}}</p>

      <p class="text-danger"><?= isset($errors['username']) ? $errors['username'] : "";?></p>
    </div>
    <div class="form-group col-md-6">
    <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
      <p class="text-danger"><?= isset($errors['email']) ? $errors['email'] : "";?></p>

    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputMobile4">Mobile</label>
      <input type="number" name="phone" class="form-control" id="inputMobile4" placeholder="Phone Number">
      <p class="text-danger"><?= isset($errors['phone']) ? $errors['phone'] : "";?></p>

    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password"class="form-control" id="inputPassword4" placeholder="Password">
      <p class="text-danger"><?= isset($errors['password']) ? $errors['password'] : "";?></p>

    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      
      <select name="gender"  class="form-control">
        <option value="" selected disabled>Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
      <p class="text-danger"><?= isset($errors['gender']) ? $errors['gender'] : "";?></p>

    </div>
    <div class="form-group col-md-6">
      <input type="date" name="birthday"  class="form-control" >
      <p class="text-danger"><?= isset($errors['birthday']) ? $errors['birthday'] : "";?></p>
   
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputArea">Area</label>
      <select name="Area" id='inputArea' class="form-control" >
      <option value="" selected disabled>Area</option>
      <?php
      $query = "SELECT * from city ";
      $sql   = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($sql)) { ?>
      <option value="<?=$row['City']?>"><?=$row['City']?></option>
      <?php } ?>
    </select>
    <p class="text-danger"><?= isset($errors['area']) ? $errors['area'] : "";?></p>
    </div>
    <div class="form-group col-md-4">
     
      <label for="Type">Type</label>

      <select name="type" class="form-control" id="Type" onchange="showDiv('hidden_div', this)" >
        <option value="" selected disabled>Choose</option>
        <option value="doctor">Doctor</option>
        <option value="patient">Patient</option>
      </select>
      <p class="text-danger"><?= isset($errors['type']) ? $errors['type'] : "";?></p>

    </div>
    <div class="form-group col-md-4">     
    <div class="form-group">
      <label for="inputAddress">Address 15</label>
      <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
      <p class="text-danger"><?= isset($errors['address']) ? $errors['address'] : "";?></p>
  </div>
    </div>
  </div>




<section id="hidden_div">
  <div class="form-row">

    <div class="form-group col-md-6">
     
      <label for="specialties">All specialties</label>

      <select name="Specialty" class="form-control" id="specialties" >
        <option value="All specialties" selected disabled required>Choose ...</option>
        <?php
        $query = "SELECT * from specialty ";
        $sql   = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($sql)) { ?>
        <option value="<?=$row['Specialty']?>"><?=$row['Specialty']?></option>
        <?php } ?>
      </select>
      <p class="text-danger"><?= isset($errors['specialty']) ? $errors['specialty'] : "";?></p>
    </div>
    <div class="form-group col-md-6">
      <label for="degree">degree</label>
    <select name="degree" id="degree" class="form-control">
        <option value="" selected disabled>Choose</option>
        <option value="Prof">Prof</option>
        <option value="Supervisor">Supervisor</option>
        <option value="Doctor">Doctor</option>
    </select>
    <p class="text-danger"><?= isset($errors['degree']) ? $errors['degree'] : "";?></p>

    </div>
  </div>

  <div class="form-row">
<div class="col-md-6">
  <div class="form-group">
    <label for="verfiy">Verification </label>
    <input type="file"  class="form-control " id="verfiy" name="verfiy">
  </div>
  <div class="form-group">
    <label for="profile">Profile Image </label>
    <input type="file" @change="upload"  class="form-control" id="profile" name="profile">
  </div>
  <div class="form-group">
  <img v-if="url" :src="url" style="width:auto;height:auto" alt="">

  </div>
 
        <input type="hidden" class="form-control" name="lat"  id="lat" placeholder="lat">
        <input type="hidden" class="form-control" name="lng"  id="lng" placeholder="lng">
</div>
    <div class="form-group col-md-6">
          <iframe src="includes/mapAddress.php" frameborder="0" width="100%" height="300" ></iframe>
    </div>
  </div>
  </section>
  <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
</form>

</div>


<?php require_once "includes/footer.php"; ?>