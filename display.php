<?php
include 'functions.php';

$participants = getParticipants();

foreach ($participants as $participant) {
    echo "<tr>";
    echo "<td>{$participant['name']}</td>";
    echo "<td>{$participant['age']}</td>";
    echo "<td>{$participant['gender']}</td>";
    echo "<td>{$participant['contact']}</td>";
    echo "<td>{$participant['email']}</td>";
    echo "<td><a href='delete.php?id={$participant['id']}'>Delete</a></td>";
    echo "<td><a href='update.php?id={$participant['id']}'>Edit</a></td>";
    echo "</tr>";
}
?>
