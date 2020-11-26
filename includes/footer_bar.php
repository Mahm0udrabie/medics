 <!-- Star footer -->

 <footer class="footer1">
     <div class="container ">
         <div class="row">
             <!-- row -->
             <div class="col-lg-4 col-md-4">
                 <!-- widgets column left -->
                 <ul class="list-unstyled clear-margins">
                     <!-- widgets -->
                     <li class="widget-container widget_nav_menu">
                         <!-- widgets list -->
                         <h1 class="title-widget">Useful links</h1>
                         <ul>
                             <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                             <li><a href="#"><i class="fa fa-angle-double-right"></i>Posts</a></li>
                             <li><a href="#"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                             <li><a href="https://www.facebook.com/"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                             <li>
                                 <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-angle-double-right"></i> Feed Back</a>
                             </li>
                             <!-- <a href="#"> <i title="DOWNLOAD APP" class="fa fa-cloud-download" style="font-size:48px;color:#337ab7"></i> -->
                             <a href="https://play.google.com/store/"> <img src="images/Google_Play.png" height="40" width="130px"></a>
                             </a>
                     </li>
                 </ul>
             </div><!-- widgets column left end -->

             <div class="col-lg-4 col-md-4">
                 <!-- widgets column center -->
                 <ul class="list-unstyled clear-margins">
                     <!-- widgets -->
                     <li class="widget-container widget_recent_news">
                         <!-- widgets list -->
                         <h1 class="title-widget" id="abus">About Us</h1>
                     </li>
                     <div class="footerp">
                         <div>
                             <h5 style="font-family: 'Raleway', sans-serif;letter-spacing:1px;word-spacing:3px;line-height: 20px;font-size:17px;">
                                 Prevention, diagnosis, and treatment of disease,illness, injury, and other physical and mental impairments</h5>
                             <h5 style="font-size:17px;font-family: 'Raleway', sans-serif;letter-spacing:1px;word-spacing:3px;line-height: 20px;">in human beings. Healthcare is delivered by health professionals (providers or practitioners) in allied health fields
                             </h5>
                         </div>
                     </div>
             </div>

             <div class="col-lg-4 col-md-4">
                 <h1 class="title-widget">Feedback</h1>

                 <?php
                    if (isset($_POST['send'])) {
                        $arr  = send_feedback();
                    }
                    echo isset($_SESSION['feedback']) ? "<p class='text-success'>" . $_SESSION['feedback'] . "</p>" : "";
                    unset($_SESSION['feedback']);
                    ?>
                 <form action="" method="post">
                     <div class="" id="feedback">
                         <div class="form-group">
                             <input type="text" id="feed" name="name" placeholder="Name">
                             <?= isset($arr['name']) ? "<p class='text-danger'>". $arr['name']."</p>" : ""; ?>

                         </div>
                         <div class="form-group">
                             <input type="text" id="feed" name="email" placeholder="Email">
                             <?= isset( $arr['email']) ? "<p class='text-danger'>". $arr['email']."</p>" : ""; ?> 

                         </div>
                         <div class="form-group">
                             <textarea id="feed" cols="20" name="body" rows="4" placeholder="message"></textarea>
                             <?= isset( $arr['body']) ? "<p class='text-danger'>". $arr['body']."</p>" : ""; ?> 

                         </div>
                         <div class="form-group">
                             <input type="submit" name="send" class="btn btn-primary btn-block" id="send" value="Send">
                         </div>
                     </div>
                 </form>
             </div>
         </div>
 </footer>


 <div class=" footer-bottom">

     <div class="social-icons">

         <!-- strat Contacts Fb tw gm   -->
         <div class="container">
             <ul class="nomargin" id="soicalcontacts">

                 <a href="https://www.facebook.com/"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
                 <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
                 <a href="https://google.com/"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>

             </ul>
             <!-- End Contacts -->
             <div class="row">

                 <div class="copyright">
                     © 2020, Medics, All rights reserved
                 </div>
                 <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><i class="fa fa-arrow-up"></i></a>
             </div>


         </div>

     </div>
     <!-- End Fotter -->