<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "crud");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize search query variable
$searchQuery = '';

// Check if search query is provided
if (isset($_GET['query'])) {
    // Sanitize search query to prevent SQL injection
    $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);
}

// Prepare the SQL query
$sql = "SELECT FilmID, Title, PosterURL, GenreID, ReleaseYear, Description, Rating, MoviePath
        FROM Movies
        WHERE Title LIKE '%$searchQuery%'";

$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Display the search results
if (mysqli_num_rows($result) > 0) {
    echo "<h2>Search Results for: " . htmlspecialchars($searchQuery) . "</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        $filmId = $row['FilmID'];
        $title = $row['Title'];
        $posterUrl = $row['PosterURL'];
        $genreId = $row['GenreID'];
        $releaseYear = $row['ReleaseYear'];
        $description = $row['Description'];
        $rating = $row['Rating'];
        $moviePath = $row['MoviePath'];

        echo "<div class='movie-card'>";
        echo "<a href='movie-details.php?id=$filmId'><img src='$posterUrl' alt='" . htmlspecialchars($title) . "' class='movie-poster'></a>";
        echo "<h3>" . htmlspecialchars($title) . "</h3>";
        echo "<p>Genre ID: " . htmlspecialchars($genreId) . "</p>";
        echo "<p>Release Year: " . htmlspecialchars($releaseYear) . "</p>";
        echo "<p>Description: " . htmlspecialchars($description) . "</p>";
        echo "<p>Rating: " . htmlspecialchars($rating) . "</p>";
        echo "<p>Movie Path: " . htmlspecialchars($moviePath) . "</p>";
        echo "</div>";
    }
} else {
    echo "<h2>No results found for: " . htmlspecialchars($searchQuery) . "</h2>";
}

// Close the connection
mysqli_close($conn);
?>
