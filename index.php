<?php

use App\Calc;

require_once __DIR__ . '/vendor/autoload.php';

$solution = null;
$errors = [];
$firstNumber = null;
$operation = null;
$secondNumber = null;

if (isset($_POST['first_number']) && isset($_POST['operation']) && isset($_POST['second_number'])) {
    $firstNumber = (float)$_POST['first_number'];
    $operation = (string)$_POST['operation'];
    $secondNumber = (float)$_POST['second_number'];

    $errors = Calc::validateOperation($operation, $secondNumber);

    if (count($errors) == 0) {
        $solution = Calc::calculate($firstNumber, $operation, $secondNumber);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <h2 align="center">PHP Form</h2>
    <br>
    <form class="form-inline" method="post">
        <div class="form-group mb-2">
            <input name="first_number" type="number" step="0.01" value="<?= $firstNumber ?>">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <select name="operation" class="custom-select">
                <?php foreach (Calc::AVAILABLE_OPERATIONS as $availableOperation) { ?>
                    <option
                        <?= $availableOperation == $operation ? 'selected' : '' ?>
                        value="<?= $availableOperation ?>"
                    >
                        <?= $availableOperation ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group mb-2">
            <input name="second_number" type="number" step="0.01" value="<?= $secondNumber ?>">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <button type="submit" class="btn btn-primary mb-2">=</button>
        </div>
        <?php if (!is_null($solution)) { ?>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" value="<?= $solution ?>">
            </div>
        <?php } ?>
    </form>

    <?php foreach ($errors as $error) { ?>
        <br>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php } ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
