<nav class="navbar navbar-expand-lg navbar-light  ">
    <div class="container">
        <a class="navbar-brand meta in html" href="index.php">
            <img src="images/logo2.png" style="width:100%;height:50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
          <ul class="navbar-nav ">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Suggest a doctor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Contact us</a>
              </li> 

          </ul>
          
            <ul class="navbar-nav ml-auto">
              <?php if(isset($_SESSION['username'])) { ?>
                <li class="nav-item d-inline-block">
                    <a class="nav-link" href="#"> 
                    <img class="rounded-circle" src="https://via.placeholder.com/150C/O https://placeholder.com/" width="35" height="35" alt="">
                    <span>
           
                    <?= $_SESSION['username'];?></span>
                    </a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link" href="includes/logout.php"> <i class="fa fa-sign-out  mr-2"></i>log out</a>
                </li>
              <?php } else { ?>
                <li class="nav-item ">
                    <a class="nav-link"  id="login" href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in mr-2"></i>Sign in </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php"> <i class="fa fa-user  mr-2"></i>Sign up</a>
                </li>
              <?php } ?>
            </ul>
        </div>

        </div>

</nav>