<?php
    include 'db_connection.php';
?>
<html>
    <head>
        <title>

        </title>
        <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″>
    </head>
    <body >
       <div class="well col-lg-8">
        <form action="AddNews.php" method="post" enctype="multipart/form-data" >
            Title :<input type="text" name="title" required="required" placeholder="title .."><br>
            Body :<textarea name="body" placeholder="enter the news body .." rows="4"
                cols="50"></textarea><br><br><br>
            date :<input type="datetime" name="date" ><br><br>
            Pic :<input type="file" name="my_pic"><br>
            <input type="submit" name="submit">
        </form>
       </div>
            <?php
            header ('Content-Type: text/html; charset=UTF-8');
            echo '<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />';
            echo '<body dir="rtl">';
            if(isset($_POST['submit'])){
               echo $title = validate($_POST['title']);
               echo $body = validate($_POST['body']);
              echo  $date = validate($_POST['date']);
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["my_pic"]["name"]);
                if (move_uploaded_file($_FILES["my_pic"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["my_pic"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                $q_insert_news = "INSERT INTO news (title,body,picture,create_at,user_id) VALUES('$title','$body','$target_file','$date',5)";
                mysqli_query($db_conn,$q_insert_news);
            }
            function validate($data)
            {
                $data = trim($data);
                $data = htmlspecialchars($data);
                $data = stripcslashes($data);
                return $data;
            }

            ?>
    </body>

</html>
