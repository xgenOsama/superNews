<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include './db_connection.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include './include_style.php'; ?>
    </head>
    <body width="70%" style="clear:both;">
        <!-- begin of nav bar  -->
            <div id="my_nav">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed"
                                    data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Brand</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#" data-toggle="modal"
                                                      data-target=".bs-example-modal-lg">login<span
                                            class="sr-only">(current)</span></a></li>
                                <li><a href="#">Link</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle"
                                       data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Link</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.navbar-collapse -->
                    <!-- /.container-fluid -->
                </nav>
            </div>
            <!-- End of nav-->
            <!-- begin of model -->
            <div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content col-sm-8 center-block col-sm-offset-2">
                        <div class="login" style="margin-top: 20px">
                            <form class="form-horizontal" action="index.php" method="post">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="username ..">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-info">login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of the model -->
        <?php
        if (isset($_POST['submit'])) {
            $q_login = "Select * from users WHERE username='"
                . validate($_POST['username']) . "' AND password='" .
                    validate($_POST['password']) . "'";
            $q_result = mysqli_query($db_conn, $q_login);
            $user = mysqli_fetch_array($q_result);
            if ($user) {
                if ($user['role'] == 0) {
                    ?>
                    <script>window.location = "admin.php";</script>
                    <?php
                }
             else {
                ?>
                <script> window.location = "home.php";
                    document.writeln("hello");
                </script>
                <?php
            }
        }  else {
                echo "invalid username or password ... " ;
        }
        }
        function validate($data) {
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = stripcslashes($data);
            return $data;
        }
        ?>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
