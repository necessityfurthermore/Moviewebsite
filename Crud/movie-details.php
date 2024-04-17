<?php
// Database connectie includen
include 'dbconn.php';

// FilmID ophalen uit de URL
$filmId = isset($_GET['id']) ? $_GET['id'] : null;

// Als er geen FilmID is opgegeven, redirect naar de hoofdpagina
if (!$filmId) {
    header('Location: Movie.php');
    exit;
}

// Query om de filmgegevens op te halen
$sql = "SELECT * FROM Movies WHERE FilmID = $filmId";
$result = mysqli_query($conn, $sql);

// Controleer of er een resultaat is
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $title = $row['Title'];
    $releaseYear = $row['ReleaseYear'];
    $description = $row['Description'];
    $moviePath = $row['MoviePath'];
} else {
    // Als er geen resultaat is, redirect naar de hoofdpagina
    header('Location: Movie.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
<link rel="stylesheet" href="movie-details.css">
</head>
<body>
    <h1><?php echo $title; ?></h1>
    <p>Release Year: <?php echo $releaseYear; ?></p>
    <p><?php echo $description; ?></p>

    <video controls>
        <source src="<?php echo $moviePath; ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <a href="Movie.php">Terug naar Moviepagina</a>
</body>
</html>