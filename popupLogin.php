<div class="container">
  <!-- The Modal login form -->
  <div class="modal fade" id="loginPopupModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal contact Header -->

        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal login body -->
        <div class="modal-body">
          <form id="loginForm" name="loginForm" method="post" action="loginUser.php">
            <div class="row">
              <div class="col">
                <label for="loginName">Name</label>
                <input id="loginName"  class="form-control" name="loginName" placeholder=" " type="text">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="loginPW">Password</label>
                <input id="loginPW"  class="form-control" name="loginPW" placeholder=" " type="password">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input id="Reset" class="ch" name="Reset" type="reset" value="Reset">
              </div>
              <div class="col">
                <input style="float:right" class="ch" name="Submit" type="submit" value="Submit">
              </div>
                </div>

        </form>
      </div>
    </div>
  </div>

</div>
</div>
<!-- close the login form container -->
