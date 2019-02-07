<?php
$isValid = true;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $title = trim($_POST['title']);

    if (empty($title)) {
        $isValid = false;
        $errors['title'] = 'Заголовок обязателен для заполнения';
    }
    if (mb_strlen($title) > 255)  {
        $isValid = false;
        $errors['title'] = 'Поле заголовок не должно превышать 255 символов';
    }

    echo json_encode([
        'status' => $isValid,
        'errors' => $errors,
    ]);
}

?>