<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
      
      <?php include('head.php'); ?>
      
  </head>
  <body>
      <?php static::logout(); ?>
    <div class="d-flex" id="wrapper">
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="task">Tasks</a></li>
                                <li class="nav-item"><a class="nav-link" href="add">New Task</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="col-md-6 offset-md-3">Login Form</h1>
                    <hr class="col-md-6 offset-md-3"/>
                    <?php static::LogInRun(); ?>
                        <form action="login" method="POST">
                          <div class="col-md-6 offset-md-3">
                            <label for="username"><strong>Username</strong></label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
                            <br>
                            <label for="password"><strong>Password</strong></label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password" required><br>
                            <button type="submit" class="btn btn-primary">Login</button>
                          </div>
                        </form>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
      
  </body>
</html>