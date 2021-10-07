<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <?php static::TaskAdded(); ?>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
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
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href='?sort=<?php static::sorttype("email"); ?>'>Email</a>
                                        <a class="dropdown-item" href='?sort=<?php static::sorttype("name"); ?>'>Name</a>
                                        <a class="dropdown-item" href='?sort=<?php static::sorttype("header"); ?>'>Title</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h1 class="mt-4">Task List</h1>
                    <br>
                    <table class="table">
                        <tr>
                            <td><b>Task</b></td>
                            <td><b>Description</b></td>
                            <td><b>Name</b></td>
                            <td><b>Email</b></td>
                            <td><b>Done</b></td>
                        </tr>
                        <tr>
                            <td><a href='/taskview?id=<?php static::doTaskList("0","id"); ?>'><?php static::doTaskList("0","header"); ?></a></td>
                            <td><?php static::doTaskList("0","description"); ?></td>
                            <td><?php static::doTaskList("0","name"); ?></td>
                            <td><?php static::doTaskList("0","email"); ?></td>
                            <td><?php static::doTaskList("0","done"); ?></td>
                        </tr>
                        <tr>
                            <td><a href='/taskview?id=<?php static::doTaskList("1","id"); ?>'><?php static::doTaskList("1","header"); ?></a></td>
                            <td><?php static::doTaskList("1","description"); ?></td>
                            <td><?php static::doTaskList("1","name"); ?></td>
                            <td><?php static::doTaskList("1","email"); ?></td>
                            <td><?php static::doTaskList("1","done"); ?></td>
                        </tr>
                        <tr>
                            <td><a href='/taskview?id=<?php static::doTaskList("2","id"); ?>'><?php static::doTaskList("2","header"); ?></a></td>
                            <td><?php static::doTaskList("2","description"); ?></td>
                            <td><?php static::doTaskList("2","name"); ?></td>
                            <td><?php static::doTaskList("2","email"); ?></td>
                            <td><?php static::doTaskList("2","done"); ?></td>
                        </tr>
                    </table>
                    <hr>
                    
                     <?php static::doTaskListPag(); ?>
                     
                </div>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>

</body>
</html>
