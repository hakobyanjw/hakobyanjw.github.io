<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
      <?php include('head.php'); ?>
  </head>
  <body>
        <?php static::UpdateTask(); ?>
        <?php static::checkifisset(); ?> 
        <?php static::ErrorMessages(); ?> 
        
        <div class="d-flex" id="wrapper">
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Company Tasks</div>
                <div class="list-group list-group-flush">

                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="task">Tasks</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="add">New Task</a>
                    <?php LogIn::checkLogin(); ?>
                </div>
            </div>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    </div>
                </nav>
                <div class="container-fluid">
                       <div class="col-md-6 offset-md-3">
                                  <form action="edit" method="POST">
                                    <h1>Edit Task</h1>
                                    <div class="item">
                                      <p>Person Name</p>
                                      <div>
                                        <input type="hidden" name="id" value="<?php static::GetTask("id"); ?>"/>
                                        <input type="text" name="name" class="form-control" value="<?php static::GetTask("name"); ?>" required/>
                                      </div>
                                    </div>
                                    <div class="item">
                                      <p>Email</p>
                                      <input type="email" name="email" class="form-control" value="<?php static::GetTask("email"); ?>" required/>
                                    </div>
                                    <div class="item">
                                      <p>Phone number</p>
                                      <input type="text" name="phone" class="form-control" value="<?php static::GetTask("phone"); ?>" required/>
                                    </div>
                                    <div class="item">
                                      <p>Image link</p>
                                      <input type="text" name="img" class="form-control" value="<?php static::GetTask("img"); ?>" required/>
                                    </div>
                                    <div class="item">
                                      <p>Deadline</p>
                                      <input type="date" name="date_exp" class="form-control" value="<?php static::GetTask("date_exp"); ?>" required/>
                                      <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="item">
                                      <p>Title</p>
                                      <input type="text" name="header" class="form-control" value="<?php static::GetTask("header"); ?>" required/>
                                    </div>
                                    <div class="item">
                                      <p>Description</p>
                                      <input type="text" name="description" class="form-control" value="<?php static::GetTask("description"); ?>" required/>
                                    </div>
                                    <div class="item">
                                      <p>Text</p>
                                      <textarea rows="5" name="text" class="form-control" required><?php static::GetTask("text"); ?></textarea>
                                    </div>
                                    <div class="item">
                                        <br>
                                      <p>Is Done?</p>
                                      <input type="radio" name="done" value="true" style="width: 20px;"> Yes
                                      <input type="radio" name="done" value="false" style="width: 20px;" checked> No - /automaticly set not fulfilled/
                                    </div>
                                    <div class="btn-block">
                                      <br><button type="submit" class="btn btn-primary">Update Task</button><br><br>
                                    </div>
                                  </form>
                        </div>

                </div>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
  </body>
</html>