<?php

//Including the init.php, this is used to connect to the database
include_once "core/init.php";

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta name="description" content="RealTime Search using HTML, JavaScript, CSS, PHP, SQL, jQuery">
  <meta name="keywords" content="HTML, CSS, JavaScript, jQuery, PHP, SQL, Database">
  <meta name="author" content="Norbert Hajdu">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Realtime Search Bar</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img alt="RTS" src='images/logo.png' width="60px" height="60px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?category=health">Health</a>
          <a class="dropdown-item" href="?category=environment">Environment</a>
          <a class="dropdown-item" href="?category=tech">Tech</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2"  type="search" id="rtsInput" placeholder="Search" aria-label="Search">
    </form>
  </div>
</nav>

<div class="float-right pr-2 mr-1 border" id="articles"></div>

<script>

  //This script checks if the "rtsInput" field is changed
  $('#rtsInput').keyup(function(){
    //Setting a variable "s" to get the value of the "rtsInput" input field
    var s = document.getElementById('rtsInput').value;
    //If the value length is longer than 3, it will send out a jQuery request, that queries the database based on the input
    if(s.length > 2){
      $.ajax({
        method: 'POST',
        cache: false,
        data: { search: s },
        url: 'getContentFromDatabase.php',
        success:function(data){
          //If the request was successful, it will change the Content of the "articles" div
          document.getElementById("articles").innerHTML = data;
        }
      });
    }else{
      //If the value lenth is shorter than 3, it will set the Content of the "articles" div to Empty
      document.getElementById("articles").innerHTML = "";
    }
  });

</script>

<?php

//Including the file that loads the news
include_once("core/loadingNews.php");

?>

</body>

</html>