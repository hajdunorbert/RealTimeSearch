<?php

//Setting the SQL to Empty, it will be used to prevent errors when getting data from database
$sql="";

//Checking if there are a filter applied for searching

if(isset($_GET["author"])){
  $author  = $_GET["author"];
  $sql  = "SELECT * FROM $tableName WHERE author='$author'";   
}
if(isset($_GET["article"])){
  $id   = $_GET["article"];
  $sql  = "SELECT * FROM $tableName WHERE id=$id";   
}
if(isset($_GET["category"])){
    $category  = $_GET["category"];
    $sql  = "SELECT * FROM $tableName WHERE category='$category'";   
}
//If there are no filters, show all articles
if(!isset($_GET["article"]) and !isset($_GET["category"]) and !isset($_GET["author"])){
  $sql  = "SELECT * FROM $tableName";   
}

//Getting data from the database, based on the filters
if($sql != ""){
    //Querying the database to get the content
    $pquery = $conn->query($sql);

    //Going through all the content if there are any
    while($articles = mysqli_fetch_assoc($pquery)): ?>
      
<div class="News-Container mt-5">
<!-- Adding a Hyperlink to the Title based on the ID of the article from the database -->
<!-- The Hyperlink will give a GET request to the link, in this case the ID of the article -->
<div class="row">
    <div class="col-12 mb-2">
        <?php print"<a href='?article=".$articles["id"]."'>".$articles["title"]."</a>"; ?>
    </div>
</div>
<!-- Adding a Hyperlink to the Author name -->
<!-- The Hyperlink will give a GET request to the link, it can be used to show the articles from the author -->
<div class="row">
    <div class="col-2 mb-2">
        Author: 
        <a href="?author=<?php print$articles["author"]; ?>"><?php print$articles["author"]; ?></a>
    </div>
    <!-- Adding a Hyperlink to the Category name -->
    <!-- The Hyperlink will give a GET request to the link, it can be used to show similar articles based on the category -->
    <div class="col-2">
        Author: 
        <a href="?category=<?php print$articles["category"]; ?>"><?php print$articles["category"]; ?></a>
    </div>
</div>
   <!-- Displaying the content of the article -->
<div class="row">
    <div class="col-12">
        <?php print$articles["content"]; ?>
    </div>
</div>

</div>

  <?php endwhile; 
  
} ?>