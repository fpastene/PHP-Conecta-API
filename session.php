<?php
// Start the session
session_start();

// Include the database connection file
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get the user's favorite movies from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM favorite_movies WHERE user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$favorite_movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>  