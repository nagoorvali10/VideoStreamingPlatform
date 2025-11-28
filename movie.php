<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Secure the input to preventSQL Injection
    $id = $conn->real_escape_string($id);
    $sql = "SELECT * FROM movies WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $movie = $result->fetch_assoc();
    } else {
        // Movie ID not found
        header("Location: dashboard.php");
        exit();
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Watch <?php echo htmlspecialchars($movie['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="movie-background-layer" style="background-image: url('<?php echo $movie['image_url']; ?>');"></div>

    <div class="content-wrapper">
        
       <div class="navbar movie-page-navbar">
    <div class="logo">STRIMX</div> 
</div>

        <div class="video-container">
            <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
            
            <h1><?php echo htmlspecialchars($movie['title']); ?></h1>

            <div class="video-responsive">
                <iframe src="<?php echo $movie['trailer_url']; ?>?autoplay=1&rel=0" allowfullscreen></iframe>
            </div>

            <p style="color: #e5e5e5; line-height: 1.6; font-size: 18px; margin-top: 30px; max-width: 800px;">
                <?php echo htmlspecialchars($movie['description']); ?>
            </p>
        </div>
        
    </div> </body>
</html>