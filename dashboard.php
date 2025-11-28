<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>STRIMX</h1>
        <div>
            <span>Welcome, <?php echo $_SESSION['username']; ?></span>
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <div class="movie-grid">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="movie-card">';
                echo '<a href="movie.php?id=' . $row["id"] . '">';
                echo '<img src="' . $row["image_url"] . '" alt="' . $row["title"] . '">';
                echo '<h3>' . $row["title"] . '</h3>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo "No movies found.";
        }
        ?>
    </div>
</body>
</html