<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD Movies - Moviespage</title>
    <link rel="stylesheet" href="Movie.css">
    <style>
        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
        }
        .movie-card {
            text-align: center;
        }
        .movie-poster {
            width: 100%;
            height: auto;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>BDmovies</h1>
            <?php
            session_start(); // Start the session

            // Check if the user data is available in the session
            if (isset($_SESSION['Name']) && isset($_SESSION['Username']) && isset($_SESSION['EmailAddress'])) {
                $Name = $_SESSION['Name'];
                $Username = $_SESSION['Username'];
                $userEmail = $_SESSION['EmailAddress'];

                // Display the user data on the Moviepage
                echo "<p>Welcome, $Username !</p>";
            } else {
                echo "<p>User data not available.</p>";
            }
            ?>
            <form id="search-form" action="search.php" method="get">
                <input type="text" id="search" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
            <nav>
                <ul>
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="Movie.php">Movies</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="adm.php">Adminctr</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="movie-grid">
            <?php
            // Database connection
            include 'dbconn.php';

            // Check if a search query is present
            $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

            if (!empty($searchQuery)) {
                // Prepare the SQL query for search
                $sql = "SELECT FilmID, Title, PosterURL FROM Movies WHERE Title LIKE '%$searchQuery%'";
                $result = mysqli_query($conn, $sql);

                // Display the search results
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $filmId = $row['FilmID'];
                        $title = $row['Title'];
                        $posterUrl = $row['PosterURL'];

                        echo "<div class='movie-card'>";
                        echo "<a href='movie-details.php?id=$filmId'><img src='$posterUrl' alt='$title' class='movie-poster'></a>";
                        echo "<h3>$title</h3>";
                        echo "</div>";
                    }
                } else {
                    echo "No movies found for the search query: $searchQuery";
                }
            } else {
                // Query to get all movies (default behavior)
                $sql = "SELECT FilmID, Title, PosterURL FROM Movies";
                $result = mysqli_query($conn, $sql);

                // Display all movies
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $filmId = $row['FilmID'];
                        $title = $row['Title'];
                        $posterUrl = $row['PosterURL'];

                        echo "<div class='movie-card'>";
                        echo "<a href='movie-details.php?id=$filmId'><img src='$posterUrl' alt='$title' class='movie-poster'></a>";
                        echo "<h3>$title</h3>";
                        echo "</div>";
                    }
                } else {
                    echo "No movies found.";
                }
            }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 BDmovies. All rights reserved.</p>
    </footer>
</body>
</html>