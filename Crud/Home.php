<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD Movies - Homepage</title>
    <link rel="stylesheet" href="Home.css">
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
            <form id="search-form">
                <input type="text" id="search" placeholder="Search...">
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
        <div class="container">
            <h2>Watch Movies Online Free</h2>
            <p>BDmovies is one of the best free sites to watch movies online for free in 2021. With no registration or payment required, you can binge-watch tens of thousands of movies and TV shows in HD quality seamlessly and safely. New titles are updated on the site daily to make sure fun never ends on BDmovies. Should you not find your movie of interest, simply make a request and we will scour the Internet to provide you the content you have been longing for.</p>
            <p>BDmovies is where you can get exclusive premium features at the cost of nothing. We provide HD quality, superb streaming capabilities, safe and private source links, and the ad-free feature completely for free!</p>
            <h2>What is BDmovies?</h2>
            <p>BDmovies is a newly-created site that allows users to watch and download movies and TV shows online in HD quality for free. BDmovies' purpose is to become a free alternative to Netflix so movie enthusiasts can enjoy all the features that the giant streaming service offers without having to pay a dime. BDmovies is created in order for movie fans to watch movies safely and seamlessly no matter what their financial situation is. We might have a long way to go to reach our goal, but we believe, with your support, it can be achieved soon.</p>
        </div>
        
    </main>
    <footer>
        <p>&copy; 2024 BDmovies. All rights reserved.</p>
    </footer>
</body>
</html>