<!DOCTYPE html>
<html>
  <head>
  <body>
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  </head>
  <body>
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Login Form </h1>
          </div>
          <div class="panel-body">
            <form action="connect.php" method="post">
              <div class="form-group">
                <label for="Name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="Name"
                  name="Name"
                />
              </div>
              <div class="form-group">
                <label for="Username">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="Username"
                  name="Username"
                />
              </div>
              
              <div class="form-group">
                <label for="EmailAddress">EmailAddress</label>
                <input
                  type="text"
                  class="form-control"
                  id="EmailAddress"
                  name="EmailAddress"
                />
              </div>
              <div class="form-group">
                <label for="Password">Password</label>
                <input
                  type="Password"
                  class="form-control"
                  id="Password"
                  name="Password"
                />
              </div>
              
              <input type="submit" class="btn btn-primary" />
            </form>
          </div>
          <div class="panel-footer text-right">
            <small>&copy; From creators: Binda A & Tomopawiro B</small>
          </div>
        </div>
      </div>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
   
    
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  
</div>
  </body>
</html>
