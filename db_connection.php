<?php
$db_conn = mysqli_connect("localhost", "root", "g33k", "super_news")or die("can't connect database");
mysqli_query($db_conn,"SET CHARACTER SET utf8");
mysqli_query($db_conn,"SET NAMES 'utf8'");
?>
