<?php
include 'functions.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    
    if (updateParticipant($id, $name, $age, $gender, $contact, $email)) {

        header("Location: index.php");
        exit();
    } else {
        echo "Error updating participant.";
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $participant = getParticipantById($id);
        if (!$participant) {
            echo "Participant not found.";
            exit();
        }
        
        $name = $participant['name'];
        $age = $participant['age'];
        $gender = $participant['gender'];
        $contact = $participant['contact'];
        $email = $participant['email'];
    } else {
        echo "Participant ID is missing.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Participant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        select,
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Update Participant</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $age; ?>" required><br><br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if ($gender == 'Other') echo 'selected'; ?>>Other</option>
        </select><br><br>
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="<?php echo $contact; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
        <button type="submit">Update Participant</button>
    </form>
</body>
</html>
