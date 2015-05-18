<?php
    include 'db_connection.php';
    include 'include_style.php';
?>
<html >
    <head>
        <title>

        </title>
        <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″>
    </head>
        <body  style="background-color: #080808;">
        <div class="wrap " style="width: 70%;margin:0 auto ;">
    <div id="my_nav">
        <div style="margin-bottom: 55px;"></div>
        <nav class="navbar navbar-fixed-top" style="background-color: #d5d5d5;">
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
                        <li class="active"><a href="AddNews.php" >post News<span
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

    <!--End nav -->
        <?php
        header ('Content-Type: text/html; charset=UTF-8');
        echo '<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />';
        echo '<body dir="rtl">';
        $q_get_news = "SELECT * FROM news WHERE  approved = 1";
            $result = mysqli_query($db_conn,$q_get_news);
            while($news = mysqli_fetch_array($result)):
        ?>
                    <div class="content well col-lg-10" style="margin-left: 100px;margin-top:5px; margin-bottom: auto;border-radius: 10px;">
                    <h3 style="color: #c7254e;"><?php echo $news['title'] ;?></h3>
                    <footer style="color:gray; font-size: medium"><?php echo $news['create_at'] ;?></footer>
                    <div class="content_text">
                        <div class="news_body col-lg-6" style="float: right;" width="300px">
                        <p style="font-size: larger;" ><?php echo $news['body'];?></p>
                        </div>
                        <div class="news_photo col-lg-4" >
                        <img src="<?php echo $news['picture']; ?>" style="float: left;"
                             width="300px" height="250px"/>
                        </div>
                    </div>
                    </div>
     <?php endwhile; ?>
    </body>
    <script src="myscript.js" type="text/javascript"></script>
</html>
