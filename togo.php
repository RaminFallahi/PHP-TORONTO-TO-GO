<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HTTP5212: PHP Assignment 1: To Go</title>
  <link href="styles.css" type="text/css" rel="stylesheet">
  <!-- <link href="./style.css" type="text/css" rel="stylesheet"> -->
</head>
<body>
  <h1>Toronto To Go</h1>
  <?php
  // 1- making connection to the server.
    $connect = mysqli_connect(
      "sql201.epizy.com",//Host
      "epiz_33365978",//UserName
      "aSEkQewQXRM",//Password
      "epiz_33365978_togo" //Database
    );

  //5- connection error
    if(mysqli_connect_errno()) 
    {
        echo "Error: " . mysqli_connect_error();
        exit();
    }

  // 2- execute a query in a places table
    $query = "SELECT * FROM places
    ORDER BY name";

  //3- for running the execution of the query
    $result = mysqli_query($connect, $query)
    or die(mysqli_error($connect));

    //4-making sure the execution is running == console.log()
  //echo "number of rows: ".mysqli_num_rows($result);

  //6-loop through the data query records
    while($record = mysqli_fetch_assoc($result))
    {
      //7- debugging method to see the array of columns from the table in db
        // print_r($record);

      //8-
      echo '<div class="container">';
      echo '<img src="images/'.$record['picture'].'" width="500">';
        echo '<div class="places"></div>';
          echo '<a href="'.$record['link'].'"><h2>'.$record['name'].'</h2></a>';
          echo '<p>Category: '.$record['category'].'</p>';
          echo '<p>Best Season To Go: '.$record['season'].'</p>';
        echo '</div>';
      echo '</div>';
    }


  ?>
</body>
</html>