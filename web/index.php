<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CandySort webapp</title>
</head>

<body>
    <h1>CandySort demo webapp v1.1</h1>
    <form action="result.php" method="post">
        <fieldset>
            <legend>Candidate answers</legend>
            <?php for ($i = 0; $i < 5; ++$i): ?>
                <p>
                Candidate <?= $i + 1 ?>:
                <?php for ($j = 0; $j < 4; ++$j): ?>
                    <select name="candidateAnswer[<?= $i ?>][<?= $j ?>]">
                    <?php for ($k = 0; $k < 5; ++$k): ?>
                        <option value="<?= $k ?>" <?php if (rand(0, 5) == $k) echo 'selected' ?>><?= chr(65 + $k) ?></option>
                    <?php endfor ?>
                    </select>
                <?php endfor ?>
                </p>
            <?php endfor ?>
        </fieldset>

        <fieldset>
            <legend>Filters</legend>
            <?php include_once 'filter_template.php.inc'; ?>
            <?php filter_template('name'); ?>
            <?php filter_template('email'); ?>
            <?php filter_template('state'); ?>
        </fieldset>

        <button type="submit">Sort and filter</button>
    </form>
</body>
</html>