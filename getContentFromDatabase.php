<?php

    //Including the database connection
    require_once "core/init.php";

    //Getting the value from the jQuery POST request
    $search = $_POST["search"];

    //Querying the article's titles for a similar word as the input value
    $sql = "SELECT * FROM $tableName WHERE title LIKE '%$search%' LIMIT 0, 30 ";
    $pquery = $conn->query($sql);

    //If there are any similar words it will display the titles with a Hyperlink, it's used for showing the article
    while($articles = mysqli_fetch_assoc($pquery)): ?>

    <hr>
    <?php print"<a href='?article=".$articles["id"]."'>".$articles["title"]."</a>"; ?>
    <hr>

    <?php endwhile;
?>