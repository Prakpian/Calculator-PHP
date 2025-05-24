<?php
$equal = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = (float)($_POST['num1'] ?? 0);
    $num2 = (float)($_POST['num2'] ?? 0);
    $operation = $_POST['operation'] ?? '';

    $equal = match ($operation) {
        'add' => $num1 + $num2,
        'subtract' => $num1 - $num2,
        'multiply' => $num1 * $num2,
        'divide' => $num2 != 0 ? $num1 / $num2 : "Can not divide by zero",
    };
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <form method="post" autocomplete="off">
        <input type="number" name="num1" value="" step="any" placeholder="First Number" required>
        <input type="number" name="num2" value="" step="any" placeholder="Second Number" required>
        <button type="submit" name="operation" value="add">+</button>
        <button type="submit" name="operation" value="subtract">-</button>
        <button type="submit" name="operation" value="multiply">×</button>
        <button type="submit" name="operation" value="divide">÷</button>
    </form>

    <?php if ($equal !== ''): ?>
        <output>Result: <?= $equal ?></output>
    <?php endif; ?>
</body>
</html>