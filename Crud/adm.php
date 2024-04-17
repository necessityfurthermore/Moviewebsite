<?php
// Database connectie includen
include 'dbconn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Filmoverzicht</title>
    <link rel="stylesheet" href="adm.css">
</head>
<body>

    <h1>Filmoverzicht</h1>

    <h2>Films</h2>
    <?php
    // Read (Lezen) functie
    $sql = "SELECT FilmID, Title, ReleaseYear, Description, PosterURL, MoviePath
            FROM Movies";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . $row["Title"]. " (" . $row["ReleaseYear"]. ")<br>" . $row["Description"] . "<br>Poster: " . $row["PosterURL"] . "<br>Movie: " . $row["MoviePath"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Geen films gevonden.";
    }
    ?>

    <h2>Nieuwe film toevoegen</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        Titel: <input type="text" name="title" required><br>
        Releasejaar: <input type="number" name="releaseYear" required><br>
        Beschrijving: <textarea name="description" required></textarea><br>
        Poster: <input type="file" name="posterFile" required><br>
        Movie: <input type="file" name="movieFile" required><br>
        <input type="submit" name="create" value="Toevoegen">
    </form>

    <?php
    // Create (Insereren) functie
    if (isset($_POST['create'])) {
        $title = $_POST['title'];
        $releaseYear = $_POST['releaseYear'];
        $description = $_POST['description'];

        // Poster upload
        $posterFile = $_FILES['posterFile'];
        $posterFilePath = 'upload_posters/' . basename($posterFile['name']);
        move_uploaded_file($posterFile['tmp_name'], $posterFilePath);

        // Movie upload
        $movieFile = $_FILES['movieFile'];
        $movieFilePath = 'upload_movies/' . basename($movieFile['name']);
        move_uploaded_file($movieFile['tmp_name'], $movieFilePath);

        $sql = "INSERT INTO Movies (Title, ReleaseYear, Description, PosterURL, MoviePath)
                VALUES ('$title', $releaseYear, '$description', '$posterFilePath', '$movieFilePath')";

        if (mysqli_query($conn, $sql)) {
            echo "Nieuwe film is succesvol toegevoegd.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>

    <h2>Film bijwerken</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        Film ID: <input type="number" name="filmId" required><br>
        Nieuwe titel: <input type="text" name="newTitle" required><br>
        Nieuw releasejaar: <input type="number" name="newReleaseYear"><br>
        Nieuwe beschrijving: <textarea name="newDescription"></textarea><br>
        Nieuwe poster: <input type="file" name="newPosterFile"><br>
        Nieuwe movie: <input type="file" name="newMovieFile"><br>
        <input type="submit" name="update" value="Bijwerken">
    </form>

    <?php
    // Update (Bijwerken) functie
    if (isset($_POST['update'])) {
        $filmId = $_POST['filmId'];
        $newTitle = $_POST['newTitle'];
        $newReleaseYear = $_POST['newReleaseYear'];
        $newDescription = $_POST['newDescription'];

        $sql = "UPDATE Movies SET Title='$newTitle'";

        if(!empty($newReleaseYear)) {
            $sql .= ", ReleaseYear=$newReleaseYear";
        }

        if(!empty($newDescription)) {
            $sql .= ", Description='$newDescription'";
        }

        // Nieuwe poster upload
        if(!empty($_FILES['newPosterFile']['name'])) {
            $newPosterFile = $_FILES['newPosterFile'];
            $newPosterFilePath = 'upload_posters/' . basename($newPosterFile['name']);
            move_uploaded_file($newPosterFile['tmp_name'], $newPosterFilePath);
            $sql .= ", PosterURL='$newPosterFilePath'";
        }

        // Nieuwe movie upload
        if(!empty($_FILES['newMovieFile']['name'])) {
            $newMovieFile = $_FILES['newMovieFile'];
            $newMovieFilePath = 'upload_movies/' . basename($newMovieFile['name']);
            move_uploaded_file($newMovieFile['tmp_name'], $newMovieFilePath);
            $sql .= ", MoviePath='$newMovieFilePath'";
        }

        $sql .= " WHERE FilmID=$filmId";

        if (mysqli_query($conn, $sql)) {
            echo "Film is succesvol bijgewerkt.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>

    <h2>Film verwijderen</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Film ID: <input type="number" name="deleteId" required><br>
        <input type="submit" name="delete" value="Verwijderen">
    </form>

    <?php
    // Delete (Verwijderen) functie
    if (isset($_POST['delete'])) {
        $filmId = $_POST['deleteId'];

        $sql = "DELETE FROM Movies WHERE FilmID=$filmId";

        if (mysqli_query($conn, $sql)) {
            echo "Film is succesvol verwijderd.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>

</body>
</html>