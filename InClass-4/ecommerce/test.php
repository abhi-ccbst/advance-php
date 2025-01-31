<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'] ?? '';
    $pattern = $_POST['pattern'] ?? '';
    $replacement = $_POST['replacement'] ?? '';
    
    $matchResult = [];
    $matchCount = preg_match($pattern, $text, $matchResult) ? "Match found!" : "No match.";
    
    // preg_match()	Returns 1 if the pattern was found in the string and 0 if not
    // preg_match_all()	Returns the number of times the pattern was found in the string, which may also be 0
    // preg_replace()	Returns a new string where matched patterns have been replaced with another string
    preg_match_all($pattern, $text, $allMatches);
    $replaceResult = preg_replace($pattern, $replacement, $text);
    $splitResult = preg_split($pattern, $text);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Regex Tester</title>
</head>
<body>
    <h2>PHP Regular Expression Tester</h2>
    <form method="post">
        <label>Enter Text:</label><br>
        <textarea name="text" rows="4" cols="50"><?= htmlspecialchars($text ?? '') ?></textarea><br><br>
        
        <label>Enter Regex Pattern:</label><br>
        <input type="text" name="pattern" value="<?= htmlspecialchars($pattern ?? '') ?>" required><br><br>
        
        <label>Replacement (for preg_replace):</label><br>
        <input type="text" name="replacement" value="<?= htmlspecialchars($replacement ?? '') ?>"><br><br>
        
        <button type="submit">Test Regex</button>
    </form>
    
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Results:</h3>
        <p><strong>Match Result:</strong> <?= $matchCount ?></p>
        <p><strong>All Matches:</strong> <?= htmlspecialchars(print_r($allMatches[0] ?? [], true)) ?></p>
        <p><strong>Replace Result:</strong> <?= htmlspecialchars($replaceResult ?? '') ?></p>
        <p><strong>Split Result:</strong> <?= htmlspecialchars(print_r($splitResult ?? [], true)) ?></p>
    <?php endif; ?>
</body>
</html>
