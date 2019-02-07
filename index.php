<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $isValid = true;

    $title = trim($_POST['title']);

    if (empty($title)) {
        $isValid = false;
        $errors['title'] = 'Заголовок обязателен для заполнения';
    }
    if (mb_strlen($title) > 255)  {
        $isValid = false;
        $errors['title'] = 'Поле заголовок не должно превышать 255 символов';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<br>
<div class="container">
    <div class="row">

        <form style="width: 100%" method="post">
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control <?php echo($errors['title'] ? 'is-invalid' : '') ?>"
                            id="title"
                            name="title"
                            value="<?php echo (isset($title) ? $title : ''); ?>"
                    >
                    <div class="invalid-feedback">
                        <?php echo (isset($errors['title']) ? $errors['title'] : ''); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
                <div class="col-md-3">
                    <?php if(isset($isValid) && $isValid): ?>
                        <div class="alert alert-success">Форма валидна</div>
                    <?php endif; ?>
                </div>
            </div>
        </form>

    </div>
</div>
</body>
</html>
