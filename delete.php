<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteParticipant($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting participant.";
    }
}
?>
