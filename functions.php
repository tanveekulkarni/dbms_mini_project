<?php
include 'config.php'; 

function addParticipant($name, $age, $gender, $contact, $email) {
    global $connect;


    $check_sql = "SELECT * FROM participants WHERE email = '$email' OR contact = '$contact'";
    $check_result = mysqli_query($connect, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {

        return false;
    }

    $sql = "INSERT INTO participants (name, age, gender, contact, email) VALUES ('$name', $age, '$gender', '$contact', '$email')";
    return mysqli_query($connect, $sql);
}

function deleteParticipant($id) {
    global $connect;
    $sql = "DELETE FROM participants WHERE id = $id";
    return mysqli_query($connect, $sql);
}

function getParticipantById($id) {
    global $connect;
    $sql = "SELECT * FROM participants WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    return mysqli_fetch_assoc($result);
}

function updateParticipant($id, $name, $age, $gender, $contact, $email) {
    global $connect;
    $sql = "UPDATE participants SET name='$name', age=$age, gender='$gender', contact='$contact', email='$email' WHERE id=$id";
    return mysqli_query($connect, $sql);
}

function getParticipants() {
    global $connect;
    $sql = "SELECT * FROM participants";
    $result = mysqli_query($connect, $sql);
    $participants = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $participants;
}
?>
