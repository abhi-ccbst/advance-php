<?php

session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if XML input is provided
    $userXml = $_POST['userXml'] ?? '';

    // Validate and process XML input
    $xml = simplexml_load_string($userXml);
    if ($xml === false) {
        $error = "Invalid XML format.";
    } else {
        // Extract data from XML
        $name = (string)$xml->name;
        $email = (string)$xml->email;
        $theme = (string)$xml->preferences->theme;

        // Save data to session
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        // Save theme to cookies
        setcookie("theme", $theme, time() + (86400 * 7), "/"); // 7-day cookie

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();

        $success = "XML processed successfully!";
    }
    unset($_POST);
}

// Retrieve user data from the database
$result = $conn->query("SELECT * FROM users");

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP XML Input Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: <?php echo ($_COOKIE['theme'] ?? 'light') === 'dark' ? '#333' : '#fff'; ?>;
            color: <?php echo ($_COOKIE['theme'] ?? 'light') === 'dark' ? '#fff' : '#000'; ?>;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .message {
            text-align: center;
            font-weight: bold;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">PHP XML Input Project</h1>

    <!-- XML Input Form -->
    <form method="POST" style="text-align: center;">
        <textarea name="userXml" rows="10" cols="50" placeholder="Paste your XML here..."></textarea><br><br>
        <button type="submit">Submit XML</button>
    </form>

    <?php if (isset($error)): ?>
        <p class="message" style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <p class="message" style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <!-- Display Session Data -->
    <?php if (isset($_SESSION['name'])): ?>
        <h2 style="text-align: center;">Session Data</h2>
        <p style="text-align: center;">Name: <?php echo $_SESSION['name']; ?></p>
        <p style="text-align: center;">Email: <?php echo $_SESSION['email']; ?></p>
    <?php endif; ?>

    <!-- Display Users from Database -->
    <h2 style="text-align: center;">Users in Database</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
