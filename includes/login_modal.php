<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      
      <form action="includes/login.php" method="post">
    
      <div class="modal-body">
      <?php if(isset($_SESSION['error'])){
            echo "
            <script>
              window.onload = function(){
              document.getElementById('login').click();
              };
            </script>".$_SESSION['error'];
            unset($_SESSION['error']);
            }
      ?>
        <div class="form-group">
          <input type="email" name="email" placeholder="Email Address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" name="remember_me[]" value="remember_me" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Remember me
      </label>
    </div>
  </div>


        
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>

    </div>
  </div>
</div>

