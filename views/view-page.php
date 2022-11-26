<?php
session_start();
include '../model/movie.php';

if (isset($_GET['id'])) {
    include "../includes/config/database.php";
    $id = mysqli_escape_string($conn, $_GET['id']);
    $sql = "SELECT `*` FROM `movies` WHERE `id` = $id";
    $result = $conn->query($sql);
    $movie = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Views Page</title>
    <link rel="stylesheet" href="../includes/css/view-page.css">
    <script src="https://kit.fontawesome.com/648e6e8434.js" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <div>
            <img src="../includes/images/similar-logo.png" alt="movie-recom-logo" id="logo">
        </div>
        <div>Home</div>
        <div>Search</div>
        <div></div>
    </header>
    <main>
        <section class="movie-container">
            <img src="<?php echo $movie['thumbnail'] ?>">
            <div class="description-container">
                <h2><?php echo $movie['name'] ?></h2>
                <div class="genre-date">

                    <span><?php echo $movie['genre'] ?></span>
                    |
                    <span><?php echo $movie['release_year'] ?></span>

                </div>

                <p><?php echo $movie['description'] ?></p>
                <p><strong>Director:</strong> <?php echo $movie['director'] ?> </p>
                <p><strong>Cast:</strong> <?php echo $movie['actors'] ?> </p>

                <div class="watch-movie-button"><a href="<?php echo $movie['movie_link'] ?>">Watch</a></div>

            </div>

        </section>
        <h2>Movies similar to <?php echo $movie['name'] ?></h2>
        <section class="similar-movies">
            </div>
    </main>
    <footer>
        This is the footer

    </footer>


</body>

</html>