<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>
    <?php require_once 'form.php'; ?>
    <h1>Calculator</h1>
    <form action="" method="POST">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
        <label for="firstValue">First value :</label>
        <input type="text" name="firstValue" id="firstValue" value="<?= $data['firstValue'] ?? '' ?>" placeholder="42" required>
        <label for="operator">Operator :</label>
        <select name="operator" id="operator" required>
            <?php foreach (OPERATORS as $operator) : ?>
                <option value="<?= $operator ?>" <?php if (isset($data['operator']) && $operator === $data['operator']) : ?><?= 'selected' ?><?php endif; ?>><?= $operator ?></option>
            <?php endforeach; ?>
        </select>
        <label for="secondValue">Second value :</label>
        <input type="text" name="secondValue" id="secondValue" value="<?= $data['secondValue'] ?? '' ?>" placeholder="42" required>
        <button>Calculate</button>
    </form>
    <p>= <?= $result ?? '' ?></p>
</body>

</html>