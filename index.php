<?php
session_start();
include "includes/config/database.php";
include "model/movie.php";

//create and make the query to the database
$sql = "SELECT `*` FROM `movies` ";
$result = $conn->query($sql);

//then use the rows as associative rows
$movies = $result->fetch_all(MYSQLI_ASSOC);

$_SESSION['movies'] = [];

foreach($movies as $data){

    $movie = new Movie(
        $data['id'],
        $data['name'],
        $data['description'],
        $data['thumbnail'],
        $data['genre'],
        $data['director'],
        $data['actors'],
        $data['release_year'],
        $data['movie_link']
    );

    array_push($_SESSION['movies'],$movie);

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="includes/css/index.css">
</head>
<body>
  
    <section class="movies">
        <h2>Movies</h2>              
        <div class="container">
            

            <?php foreach($_SESSION['movies'] as $movieObject) : ?> 
                <div class="movie-wrapper">
                 <a href="views/view-page.php?id=<?php echo $movieObject->getId()?>">
                <img src="<?php echo $movieObject->getThumbnail()?>" alt="movie-thumbnail">
                </a></div>
            <?php endforeach ?>


</div>
    </section>
</body>
</html>