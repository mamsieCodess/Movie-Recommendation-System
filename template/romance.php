<?php 

include "../model/movie.php";

$sql = "SELECT `*` FROM `movies` WHERE `genre`= `Romance`";

$result = $conn->query($sql);

//then use the rows as associative rows
$movies = $result->fetch_all(MYSQLI_ASSOC);

$_SESSION['movies'] = [];

foreach ($movies as $data) {

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

    array_push($_SESSION['movies'], $movie);
}
?>



