<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    if (addParticipant($name, $age, $gender, $contact, $email)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error adding participant.";
    }
}
?>
