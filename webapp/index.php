<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SCP Database</title>
    <style>
      .banner-bg .banner-bg-item img.img-responsive{
      max-width: 100%; 
      display:block; 
      height: auto;
      width:100%;
      }
  </style>
  </head>
  <body class="container">
    <?php include "app/connection.php" ?>
  <!-- Menu Row -->
    <div class="row">

      <div class="col">

        <ul class="nav navbar-light bg-light">
 
          <!-- run php loop through db and display page anems here -->
          <?php foreach($result as $page): ?>

            <li class="nav-item active">
            <a href="index.php?page='<?php echo $page['pg']; ?>'" class="nav-link"><?php echo $page['pg']; ?></a>
          </li>

          <?php endforeach; ?>

        <li class="nav-item active">
          <a href="form.php" class="nav-link">Enter a new page record</a>
        </li>

        </ul>

      </div>

    </div>

    <!-- Database content here -->
    <div class="row">

      <div class="col">
            <?php

              if(isset($_GET['page']))
              {
                  //remove single quotes ffrom page get value
                  $pg = trim($_GET['page'], "'");

                  //reun a sql command to select a record based on get value
                  $record = $connection->query("select * from pages where pg ='$pg'") or die($connection->error());

                  // convert $record into an array for us to echo out the individual fields on screen
                  $row = $record->fetch_assoc();

                  //create variables that hold data from all table fields
                  $h1 = $row['h1'];
                  $h2 = $row['h2'];
                  $h3 = $row['h3'];

                  $p1 = $row['p1'];
                  $p2 = $row['p2'];
                  $p3 = $row['p3'];

                  $img1 = $row['img1'];
                  $img2 = $row['img2'];
                  $img3 = $row['img3'];

                  //display information on screen
                  echo "

                      <h1>{$pg}</h1>
                      <h2>{$h1}</h2>
                      <p><img src='{$img1}'</p>
                      <p>{$p1}</p>
                      <p>{$p2}</p>
                      <p>{$p3}</p>
                  ";
              }
              else
              {
                  //if this is the first time this page has been accessed display content below
                  echo "
                    <h1 class='text-center'>SCP Foundation
                    Secure, Contain, Protect</h1>
                    <p class='text-center'>WARNING: THE FOUNDATION DATABASE IS

                    CLASSIFIED
                    
                    ACCESS BY UNAUTHORIZED PERSONNEL IS STRICTLY PROHIBITED
                    PERPETRATORS WILL BE TRACKED, LOCATED, AND DETAINED</p>
                    <p class='text-center'><img src='images/logo.png'></p>
                  
                  ";
              }


            ?>
      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>