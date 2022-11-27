<?php
session_start();

if (isset($_GET['id'])) {
    include "../includes/config/database.php";
    $id = mysqli_escape_string($conn, $_GET['id']);
    $sql = "SELECT `*` FROM `movies` WHERE `id` = $id";
    $result = $conn->query($sql);
    $movie = $result->fetch_assoc();
    $result->close();
    $conn->close();
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
        <div id="logo">

            <a href="../index.php"> <img src="../includes/images/movie 1.png" alt=""></a>
        </div>
        <div><input type="search" name="search" placeholder="Search another movie .."></div>

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
        <section class="similar-movies" style="color: white;">
            <?php
            include "../includes/config/database.php";
            include '../model/movie.php';
            $genre = $movie['genre'];
            $sql = "SELECT * FROM `movies` WHERE `genre` = '$genre'";
            $result = $conn->query($sql);
            $similar_movies = $result->fetch_all(MYSQLI_ASSOC);
            $_SESSION['movies'] = [];
            foreach ($similar_movies as $data) {
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
            <?php foreach ($_SESSION['movies'] as $movieObject) : ?>
                <div class="movie-wrapper">
                    <a href="view-page.php?id=<?php echo $movieObject->getId() ?>">
                        <img src="<?php echo $movieObject->getThumbnail() ?>" alt="movie-thumbnail">
                    </a>
                </div>
            <?php endforeach ?>

        </section>
    </main>
    <footer>
        <p>Copyright &copy; Mamo Moloi</p>

    </footer>


</body>

</html>