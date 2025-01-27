<?php
include 'includes/db.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, gender) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $hash_password, $gender);
    if ($stmt->execute()) {
        // echo "User created successful. <a href='login.php'>Login here</a>";
        header('Location: login.php'); // Redirect to login page
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<form method="POST" action="">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    
    <label>
        <input type="radio" name="gender" value="Male" required> Male
    </label>
    <label>
        <input type="radio" name="gender" value="Female" required> Female
    </label>
    <label>
        <input type="radio" name="gender" value="Other" required> Other
    </label>
    
    <button type="submit">Register</button>
</form>
