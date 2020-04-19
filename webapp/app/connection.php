<?php

    //Database credentials
    $user = "a3002234_appuser";
    $pw = "Toiohomai12345";
    $db = "a3002234_app";

    //Database connection object (address, user, pw, db)
    $connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));

    // create a variable that stores all records from our database
    $result = $connection->query("select * from pages") or die($connection->error());

    // first check if form has been submitted with data
    if(isset($_POST['pg']))
    {
        //create variables from our posted form values
        $pg = $_POST['pg'];

        $h1 = $_POST['h1'];
        $h2 = $_POST['h2'];
        $h3 = $_POST['h3'];

        $p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        $p3 = $_POST['p3'];

        $img1 = $_POST['img3'];
        $img2 = $_POST['img2'];
        $img3 = $_POST['img3'];

        //create an insert command
        $sql = "insert into pages(pg, h1, h2, h3, p1, p2, p3, img1, img2, img3)
        values('$pg', '$h1', '$h2', '$h3', '$p1', '$p2', '$p3', '$img1', '$img2', '$img3')";

        //display success or error message on screen
        if($connection->query($sql) === TRUE)
        {
            echo "
                <h1>Record added successfully</h1>
                <p><a href='../index.php'>back to index page</p>
            ";
        }
        else
        {
            echo "
                <h1>Error submitting data</h1>
                <p>{$connection->error()}</p>
                <p><a href='../index.php'>back to index page</p>
            ";
        }
    }
?>