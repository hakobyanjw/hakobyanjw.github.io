<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('head.php'); ?>
</head>
<body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Company Tasks</div>
                <div class="list-group list-group-flush">
                    <img src="<?php static::doTask("img"); ?>">
                    <div class="shadow-none p-4 mb-4 bg-light">
                        <?php static::doTask("name"); ?>
                    <br>    
                    <a href="tel:<?php static::doTask("phone"); ?>" ><?php static::doTask("phone"); ?></a>
                    <br>
                    <a href="mailto:<?php static::doTask("email"); ?>"><?php static::doTask("email"); ?></a>
                    </div>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="task">Tasks</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="add">New Task</a>
                    <?php LogIn::checkLoginForEdit(); ?>
                    <?php LogIn::checkLogin(); ?>
                </div>
            </div>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        &nbsp;&nbsp;<b><?php static::doTask("header"); ?></b>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h1><b><?php static::doTask("description"); ?></b></h1>
                    <br>
                      <div>
                        <p><?php static::doTask("text"); ?></p>
                        <hr>
                        <div style='text-align:right;'>
                        <?php static::doTask("done"); ?>
                        | Created - <?php static::doTask("date_creat"); ?>
                        <?php static::doTask("date_mod"); ?>
                        | Deadline - <?php static::doTask("date_exp"); ?>
                        </div>
                      </div>           
                </div>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>

</body>
</html>
